<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentTransaction,
    App\User,
    App\Models\Customer,
    App\Models\Subscription,
    App\Models\CustomersSubscription;
use DB;
use Auth;
use Session;
use Carbon\Carbon;

use DataTables;
use LaravelLocalization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionPaymentConfirmed,
    App\Mail\SubscriptionPaymentCanceled;
use App\Mail\RenewPlanPaymentConfirmed;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:payment-list');
        $this->middleware('permission:payment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $payment = PaymentTransaction::with('customer')->whereIn('module_type',['Signup', 'Renew Subscription Plan', 'Upgrade Subscription Plan']);

            return Datatables::of($payment)
                ->addIndexColumn()
                ->addColumn('email', function ($payment) {
                    return $payment->customer?$payment->customer->email:'Customer deleted';
                })
                ->addColumn('username', function ($payment) {

                    return $payment->customer?$payment->customer->username:'';
                })
                ->editColumn('created_at', function ($payment) {
                    return [
                        'display' => e($payment->created_at->format('m/d/Y')),
                        'timestamp' => $payment->created_at->timestamp
                    ];
                })
                ->editColumn('status', function ($payment) {
                    if ($payment->status == "completed") {
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Completed</span>';
                        return $status;
                    } else if ($payment->status == "pending") {
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Pending</span>';
                        return $status;
                    } else {
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Cancel</span>';
                        return $status;
                    }
                })
                ->editColumn('currency', function ($payment) {
                    if ($payment->currency == "euro") {
                        return 'EURO';
                    } else if ($payment->currency == "usd") {
                        return 'USD';
                    } else {
                        return 'DZD';
                    }
                })
                ->addColumn('action', function ($payment) {
                    if (\Auth::user()->can('payment-edit')) {
                        $editBtn = '<a href="' . route('manage-payment.edit', [$payment->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editBtn = '';
                    }
                    if (\Auth::user()->can('payment-delete') && $payment->status != 'pending') {
                        $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-payment.destroy', [$payment->id]) . '" rel="tooltip" title="Delete" class="delete_payment_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $deleteBtn = '';
                    }
                    return $editBtn . $deleteBtn;
                })
                ->filter(function ($instance) use ($request) {
                    //dd($request->get('status'), $request->get('search'), $request->get('currency'));
                    if ($request->get('status') == 'pending' || $request->get('status') == 'completed' || $request->get('status') == 'cancel') {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('currency'))) {
                        $search = $request->get('currency');
                        $instance->where('currency', 'LIKE', "%$search%");
                    }
                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->whereHas('customer', function ($w) use ($request, $search) {
                            $w->where('username', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                        })
                            ->orWhere('transaction_id', 'LIKE', "%$search%")
                            ->orWhere('module_type', 'LIKE', "%$search%")
                            ->orWhere('price', 'LIKE', "%$search%")
                            ->orWhere('status', 'LIKE', "%$search%");
                    }
                })
                ->rawColumns(['action', 'status', 'currency'])
                ->make(true);
        }
        return view('admin.payment.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $payment = PaymentTransaction::findOrFail($id);
        $payment_type = PaymentTransaction::payment_type[$payment->payment_type];
        $payment_mode = PaymentTransaction::payment_mode[$payment->payment_mode];
        $currency = PaymentTransaction::currency[$payment->currency];
        return view('admin.payment.edit', compact('payment', 'payment_type', 'payment_mode', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'transaction_id' => 'required',
            'module_type' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'payment_mode' => 'required',
            'payment_type' => 'required',
            'status' => 'required',
            'note' => 'required',
        ]);
        try {


            DB::beginTransaction();
            /**
             * Starting DB Transaction so that we can rollback it if any error occurred
             * 1. We will update payment transaction table.
             * 2. If we updating Signup module payment or upgrading subscription plan then will update corresponding tables also.
             */

            $payment = PaymentTransaction::findOrFail($id);

            /*
            $payment->transaction_id    = $request->transaction_id;
            $payment->module_type       = $request->module_type;
            $payment->price             = $request->price;
            $payment->currency          = $request->currency;
            $payment->payment_mode      = $request->payment_mode;
            $payment->payment_type      = $request->payment_type; */
            $payment->price             = $request->price;
            $payment->status = $request->status;
            $payment->note = $request->note;

            $customerId = $payment->customer_id;

            $result = $payment->Update();

            /**
             * Updating customers_subscriptions table.
             */
            $subscription_modules = [
                PaymentTransaction::module_type['signup'],
                PaymentTransaction::module_type['upgrade_plan'],
                PaymentTransaction::module_type['renew_plan'],
            ];
            if (in_array($request->module_type, $subscription_modules)) {

                $max_customers_subscriptions = CustomersSubscription::where('customer_id', $customerId)->max('id');

                $customers_subscriptions = CustomersSubscription::where('id', $max_customers_subscriptions)->first();

                $customers_subscriptions->payment_transaction_id = $request->transaction_id;
                $customers_subscriptions->status = $request->status;
                $customer_data = Customer::find($payment->customer_id);
                $currLocale = $customer_data->default_locale;
                $subscription = Subscription::with([
                    'localeAll' => function ($query) use ($currLocale) {
                        return $query->where('locale', $currLocale)
                            ->get();
                    }
                ])
                    ->where('id', $customers_subscriptions->subscription_id)->first();
                /**
                 * Calculating start date and end date for plan expiration.
                 */
                if ($request->status == 'completed') {


                    if ($request->module_type == PaymentTransaction::module_type['renew_plan']) {

                        $customer_completed_subscription = CustomersSubscription::find(CustomersSubscription::where('customer_id', $customerId)->where('status', 'completed')->max('id'));
                        $customer_completed_subscription->end_date = Carbon::parse($customer_completed_subscription->end_date);
                        $customer_completed_subscription_end_date = clone $customer_completed_subscription->end_date;

                        if (!Carbon::now()->greaterThan($customer_completed_subscription_end_date)) {

                            $customers_subscriptions->start_date = Carbon::now();
                            $customers_subscriptions->end_date = $customer_completed_subscription->end_date->addYears($subscription->duration);
                        } else {

                            $customers_subscriptions->start_date = Carbon::now();
                            $customers_subscriptions->end_date = Carbon::now()->addYears($subscription->duration);
                        }
                    } else {

                        $customers_subscriptions->start_date = Carbon::now();
                        $customers_subscriptions->end_date = Carbon::now()->addYears($subscription->duration);
                    }


                    Session::put('signupUserData', $customer_data);
                    $signupUserData = Session::get('signupUserData');
                    $signupUserData['subscription'] = $subscription;
                    if ($request->module_type == PaymentTransaction::module_type['renew_plan']) {

                        //Mail::to($customer_data->email)
                           // ->send(new RenewPlanPaymentConfirmed($signupUserData));

                    } else {
                       // Mail::to($customer_data->email)
                          //  ->send(new SubscriptionPaymentConfirmed($signupUserData));
                    }
                } else if ($request->status == 'cancel') {
                    if (PaymentTransaction::module_type['signup'] || PaymentTransaction::module_type['upgrade_plan'] || PaymentTransaction::module_type['renew_plan']) {
                        $signupUserData = Customer::find($payment->customer_id);
                        $signupUserData['subscription'] = $subscription;

                       // Mail::to($customer_data->email)
                           // ->send(new SubscriptionPaymentCanceled($signupUserData));
                    }

                }
                $customers_subscriptions->Update();

                /**
                 * Updating customers table.
                 */
                $customer = Customer::find($customerId);
                if ($request->module_type == PaymentTransaction::module_type['signup']) {

                    $customer->payment_status = $request->status;
                } elseif ($request->module_type == PaymentTransaction::module_type['upgrade_plan'] && $request->status == 'completed') {

                    $customer->subscription_id = $subscription->id;
                    $customer->payment_status = $request->status;
                }
                $customer->Update();
            }

            if ($result) {
                DB::commit();
                return redirect('admin/manage-payment')->with('success', 'Payment updated successfully.');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/manage-payment')->with('error', 'Something went wrong.' . $th->getMessage());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/manage-payment')->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $payment = PaymentTransaction::find($id);
        $payment->delete();
        $request->session()->flash('success', 'Payment deleted successfully.');
        return redirect()->route('manage-payment.index');
    }
}
