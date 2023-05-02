<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Customer;
use App\Models\Subscription;
use App\Models\Company;
use App\Models\PaymentTransaction;
use App\Models\Newsletter;
use App\Models\PressReviewRequest;
use App\Models\ContactFile;
use App\Models\BusinessIntelligenceDashboard;
use App\Models\ BusinessIntelligenceSubDashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomersSubscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeactivateUserMail,
    App\Mail\ActivateUserMail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $customers = Customer::select('*');
            return Datatables::of($customers)
                ->addIndexColumn()
                ->editColumn('status', function($customers){
                    if($customers->status == 1) {
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('is_deactivated', function($customers){
                    if($customers->is_deactivated == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Yes</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">No</span>';
                        return $status;
                    }
                })
                ->editColumn('payment_status', function($customers){
                    if($customers->payment_status == 'completed'){
                        $payment_status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Completed</span>';
                        return $payment_status;
                    }else if($customers->payment_status == 'pending'){
                        $payment_status = '<span class="label label-inline label-light-danger font-weight-bold">Pending</span>';
                        return $payment_status;
                    }else {
                        $payment_status = '<span class="label label-inline label-light-danger font-weight-bold">Cancel</span>';
                        return $payment_status;
                    }
                })
                ->editColumn('created_at', function ($customers) {
                    return [
                        'display' => e($customers->created_at->format('m/d/Y')),
                        'timestamp' => $customers->created_at->timestamp
                    ];
                })
                ->editColumn('action', function ($customers) {
                    if (\Auth::user()->can('user-view')) {
                        $view = '<center> <a href="' . route('manage-user-detail', [$customers->id]) . '" title="Afficher"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a> </center>';
                    } else {
                        $view = '';
                    }
                    if (\Auth::user()->can('user-active-deactive')) {
                        if($customers->is_deactivated ==0) {
                            $active = '';
                            $deactive = ' <center>  <a class="deactive_user_btn" rel="tooltip" title="Désactiver" href="javascript:;" data-href="' . route('deactive-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="fas fa-ban" style="color: #F64E60;"></i></a> </center>';
                        } else {
                            $deactive = '';
                            $active = ' <center>  <a class="active_user_btn" rel="tooltip" title="activer" href="javascript:;" data-href="' . route('active-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-dot-circle" style="color:#3699FF;"></i></a> </center>';
                        }
                        $delete = ' <center>  <a class="delete_user_btn" rel="tooltip" title="Supprimer" href="javascript:;" data-href="' . route('delete-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-trash-alt" style="color:#F64E60;"></i></a> </center> ';
                        //$edit = ' <center>  <a class="edit_user_btn" rel="tooltip" title="Modifier" href="update" data-href="' . route('update-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-edit" style="color:#3699FF;"></i></a> </center> ';
                        // $edit = ' <center>  <a class="edit_user_btn" rel="tooltip" title="Modifier" href="list"><i class="far fa-edit" style="color:#3699FF;"></i></a> </center>';
                        $edit =  '<center> <a href="' . route('update-user', [$customers->id]) . '"data-id="'.$customers->id.'"  title="Modifier" ><i class="far fa-edit" style="color:#3699FF;"></i></a> </center>';

                    } else {
                        $active = '';
                        $deactive = '';
                        $delete = '';
                        $edit= '';
                    }
                    return  $view.$deactive.$active.$edit.$delete;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('is_deactivated') == '0' || $request->get('is_deactivated') == '1') {
                        $instance->where('is_deactivated', $request->get('is_deactivated'));
                    }
                    if (!empty($request->get('payment_status'))) {
                        $instance->where('payment_status', $request->get('payment_status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($innerQuery) use($request) {
                            $search = $request->get('search');
                            $innerQuery->where('name', 'LIKE', "%$search%")
                                ->orWhere('company_name', 'LIKE', "%$search%")
                                ->orWhere('job_title', 'LIKE', "%$search%")
                                ->orWhere('mobile_number', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('note', 'LIKE', "%$search%")
                                ->orWhere('username', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['payment_status','status', 'action','is_deactivated'])
                ->make(true);
        }
        $subscription = [];
        return view('admin.subscription.subscriber_list', compact('subscription'));
    }

    public function getUserDetail($id)
    {
        $user = Customer::find($id);
        $subscription = Subscription:: with(['localeAll' => function($query) {
            return $query->where('locale', 'en')->get();
        }])
            ->find($user->subscription_id);
        $is_parent  = ($user->id == $user->parent_id) ? true : false;

        if ($is_parent) {

            $parent_data    = $user;
        } else {

            $parent_data    = Customer::where('id',$user->parent_id)
                ->with([
                    'subscription' => function($query) {
                        return $query->with([
                            'localeAll' => function($query) {
                                return $query->where('locale', 'en')->get();
                            }
                        ])->get();
                    }
                ])
                ->first();
        }

        if ( $parent_data->payment_status == 'completed' && $user->subscription_id > 1) {

            $plan_data              = CustomersSubscription::find(CustomersSubscription::where('customer_id',$user->parent_id)->where('status','completed')->max('id'));
            $is_plan_confirmed      = CustomersSubscription::find(CustomersSubscription::where('customer_id',$user->parent_id)->max('id'))->status == 'completed';
        } else {

            $plan_data              = '';
            $is_plan_confirmed      = '';
        }

        $child_data     = Customer::where('parent_id',$user->parent_id)->where('id','<>',$id)->get();

        return view('admin.subscription.subscriber_detail', compact('user','subscription','is_parent', 'parent_data', 'plan_data', 'is_plan_confirmed', 'child_data'));
    }

    public function deactivateUser(Request $request,$id) {
        $result = Customer::where('id',$id)
            ->update([
                'is_deactivated' =>1
            ]);
        $customer = Customer::select('email','default_locale')->where('id',$id)->first();
        if($result) {
            // Mail::to($customer->email)
            // ->send(new DeactivateUserMail($customer->default_locale));

            return redirect()->back()->with('success','User deactivated successfully.');
        } else{
            return redirect()->back()->with('error','Something went wrong.');
        }


    }

    public function activateUser(Request $request,$id) {
        $result = Customer::where('id',$id)
            ->update([
                'is_deactivated' =>0
            ]);
        $customer = Customer::select('email','default_locale')->where('id',$id)->first();
        if($result){
            // Mail::to($customer->email)
            // ->send(new ActivateUserMail($customer->default_locale));
            return redirect()->back()->with('success','User activated successfully.');
        } else{
            return redirect()->back()->with('error','Something went wrong.');

        }
    }

    public function deleteUser(Request $request,$id) {
        $company = Company::where('customer_id',$id)->forcedelete();
        $payment_transaction = PaymentTransaction::where('customer_id',$id)->forcedelete();
        $newsletter = Newsletter::where('customer_id',$id)->forcedelete();
        $press_review_request = PressReviewRequest::where('customer_id',$id)->forcedelete();
        $contact_file_request = ContactFile::where('customer_id',$id)->forcedelete();
        $bi_main_dashboard = BusinessIntelligenceDashboard::where('customer_id',$id)->forcedelete();
        $bi_sub_dashboard = BusinessIntelligenceSubDashboard::where('customer_id',$id)->forcedelete();
        $customer = Customer::find($id);
        $customer->update([
            'email'=> time() . '::' .$customer->email,
            'username'=> time() . '::' .$customer->username,
        ]);
        $result = Customer::where('id',$id)->forcedelete();

        if($result) {
            return redirect()->back()->with('success','User deleted successfully.');
        } else{
            return redirect()->back()->with('error','Something went wrong.');
        }


    }



    function update_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            DB::table('customers')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }
}
