<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use DB;
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
use Illuminate\Support\Facades\Hash;
use App\Mail\DeactivateUserMail,
    App\Mail\ActivateUserMail;


class User2Controller extends Controller
{
  /*function __construct()
    {
        
       // $this->middleware('permission:manage-user-list');
       // $this->middleware('permission:validate-update-user', ['only' => ['edit','update']]);
       // $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        $this->middleware('permission:manage-user', ['only' => ['edit','update']]);
        $this->middleware('permission:manage-user-update', ['only' => ['edit','update']]);
        $this->middleware('permission:manage-user-delete', ['only' => ['destroy']]);
    } */

   /* protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:manage-user-list');
        $this->middleware('permission:manage-user-create', ['only' => ['create','store']]);
        $this->middleware('permission:manage-user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:manage-user-delete', ['only' => ['destroy']]);
    }*/


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
                    $view = '<a href="' . route('manage-user-detail', [$customers->id]) . '" title="subscribers"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a>&nbsp;';
                } else {
                    $view = '';
                }
                if (\Auth::user()->can('user-active-deactive')) { 
                    if($customers->is_deactivated ==0) {
                        $active = '';
                        $deactive = '<a class="deactive_user_btn" rel="tooltip" title="deactive" href="javascript:;" data-href="' . route('deactive-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="fas fa-ban" style="color: #F64E60;"></i></a>';
                    } else {
                        $deactive = '';
                        $active = '<a class="active_user_btn" rel="tooltip" title="active" href="javascript:;" data-href="' . route('active-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-dot-circle" style="color:#3699FF;"></i></a>&nbsp';
                    }
                    $delete = '<a class="delete_user_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('delete-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-trash-alt" style="color:#F64E60;"></i></a>';
                } else {
                    $active = '';
                    $deactive = '';
                    $delete = '';
                }
                return  $view.$deactive.$active.$delete;
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



    public function indexNew(Request $request)
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
                        $view = '<a href="' . route('manage-user-detail', [$customers->id]) . '" title="subscribers"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a>&nbsp;';
                    } else {
                        $view = '';
                    }
                    if (\Auth::user()->can('user-active-deactive')) {
                        if($customers->is_deactivated ==0) {
                            $active = '';
                            $deactive = '<a class="deactive_user_btn" rel="tooltip" title="deactive" href="javascript:;" data-href="' . route('deactive-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="fas fa-ban" style="color: #F64E60;"></i></a>';
                        } else {
                            $deactive = '';
                            $active = '<a class="active_user_btn" rel="tooltip" title="active" href="javascript:;" data-href="' . route('active-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-dot-circle" style="color:#3699FF;"></i></a>';
                        }
                    } else {
                        $active = '';
                        $deactive = '';
                    }
                    return  $view.$deactive.$active;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
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
                                ->orWhere('username', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['payment_status','status', 'action','is_deactivated'])
                ->make(true);
        }
        $subscription = [];
        return view('admin.subscription.new_subscriber_list', compact('subscription'));
    }


    public function indexActive(Request $request)
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
                        $view = '<a href="' . route('manage-user-detail', [$customers->id]) . '" title="subscribers"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a>&nbsp;';
                    } else {
                        $view = '';
                    }
                    if (\Auth::user()->can('user-active-deactive')) {
                        if($customers->is_deactivated ==0) {
                            $active = '';
                            $deactive = '<a class="deactive_user_btn" rel="tooltip" title="deactive" href="javascript:;" data-href="' . route('deactive-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="fas fa-ban" style="color: #F64E60;"></i></a>';
                        } else {
                            $deactive = '';
                            $active = '<a class="active_user_btn" rel="tooltip" title="active" href="javascript:;" data-href="' . route('active-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-dot-circle" style="color:#3699FF;"></i></a>';
                        }
                    } else {
                        $active = '';
                        $deactive = '';
                    }
                    return  $view.$deactive.$active;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
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
                                ->orWhere('username', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['payment_status','status', 'action','is_deactivated'])
                ->make(true);
        }
        $subscription = [];
        return view('admin.subscription.actif_subscriber_list', compact('subscription'));
    }



    public function indexSuspended(Request $request)
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
                        $view = '<a href="' . route('manage-user-detail', [$customers->id]) . '" title="subscribers"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a>&nbsp;';
                    } else {
                        $view = '';
                    }
                    if (\Auth::user()->can('user-active-deactive')) {
                        if($customers->is_deactivated ==0) {
                            $active = '';
                            $deactive = '<a class="deactive_user_btn" rel="tooltip" title="deactive" href="javascript:;" data-href="' . route('deactive-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="fas fa-ban" style="color: #F64E60;"></i></a>';
                        } else {
                            $deactive = '';
                            $active = '<a class="active_user_btn" rel="tooltip" title="active" href="javascript:;" data-href="' . route('active-user', [$customers->id]) . '"  data-id="'.$customers->id.'"><i class="far fa-dot-circle" style="color:#3699FF;"></i></a>';
                        }
                    } else {
                        $active = '';
                        $deactive = '';
                    }
                    return  $view.$deactive.$active;
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
                                ->orWhere('username', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['payment_status','status','is_deactivated', 'action'])
                ->make(true);
        }
        $subscription = [];
        return view('admin.subscription.suspended_subscriber_list', compact('subscription'));
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

        return view('admin.subscription.subscriber_detailupd', compact('user','subscription','is_parent', 'parent_data', 'plan_data', 'is_plan_confirmed', 'child_data'));
    }

    public function deactivateUser(Request $request,$id) {
        $result = Customer::where('id',$id)
            ->update([
                'is_deactivated' =>1
            ]);
        $customer = Customer::select('email','default_locale')->where('id',$id)->first();
        if($result) {
                Mail::to($customer->email)
                ->send(new DeactivateUserMail($customer->default_locale));

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
                Mail::to($customer->email)
                ->send(new ActivateUserMail($customer->default_locale));
            return redirect()->back()->with('success','User activated successfully.');
        } else{
            return redirect()->back()->with('error','Something went wrong.');

        }
    }

    public function deleteUser(Request $request,$id) { 
        $company = Company::where('customer_id',$id)->delete();
        $payment_transaction = PaymentTransaction::where('customer_id',$id)->delete();
        $newsletter = Newsletter::where('customer_id',$id)->delete();
        $press_review_request = PressReviewRequest::where('customer_id',$id)->delete();
        $contact_file_request = ContactFile::where('customer_id',$id)->delete();
        $bi_main_dashboard = BusinessIntelligenceDashboard::where('customer_id',$id)->delete();
        $bi_sub_dashboard = BusinessIntelligenceSubDashboard::where('customer_id',$id)->delete();
        $customer = Customer::find($id);
        $customer->update([
                    'email'=> time() . '::' .$customer->email,
                    'username'=> time() . '::' .$customer->username,
                ]);
        $result = Customer::where('id',$id)->delete();
                  
        if($result) {
            return redirect()->back()->with('success','User deleted successfully.');
        } else{
            return redirect()->back()->with('error','Something went wrong.');
        }


    }



    public function statisticsVisitors()
    {
        return view('admin.subscription.statistics');

    }



    public function userUpdate( Request $request , Customer $customer)
    {
        $userUpdate = [
            'id'                           => $request->id,
            'subscription_id'              =>  $request->subscription_id,
            'name'                         =>  $request->name,
            'company_name'                 =>  $request->companyName,
            'company_address'              =>  $request->address,
            'pays'                         =>  $request->pays,
            'wilaya'                       =>  $request->wilaya,
            'job_title'                    =>  $request->jobTitle,
            'mobile_number'                =>  $request->phone,
            'email'                        =>  $request->email_customer,
            'username'                     =>  $request->username,
            'note'                         =>  $request->note,
            'password'                     =>  Hash::make($request->password),
            'terms_accepted'               =>  $request->general_condition,


        ];

        if ($userUpdate['pays']  != 'Algérie'){
            $userUpdate['wilaya'] =$userUpdate['pays'];
           // update($userUpdate);
        }else{
            $userUpdate['wilaya'] =$userUpdate['wilaya'];
        }


        //return dd($userUpdate);
        DB::table('customers')->where('id',$request->id)->update($userUpdate);
        return redirect()->back()->with('success',"L'enregistrement a été mis à jour avec succès");
    }


}
