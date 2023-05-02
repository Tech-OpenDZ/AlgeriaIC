<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription,
    App\Models\Permission,
    App\Models\Customer,
    App\Models\SubscriptionTranslate;
use Auth;
use DataTables;
use LaravelLocalization;


class SubscriptionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subscription-list');
        $this->middleware('permission:subscription-create', ['only' => ['create','store']]);
        $this->middleware('permission:subscription-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subscription-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subscribers-list', ['only' => ['getSubscriberList']]);
    }
    /**
     * Author : Aparna Rawal
     * Subscription index page action
     */
    public function index(Request $request)
    {
        if($request->ajax()){
           $subscription = Subscription::with('localeAll');
             return Datatables::of($subscription)
                    ->addIndexColumn()
                    ->addColumn('name', function($subscription){
                        foreach($subscription->localeAll as $subscription_data){
                            if($subscription_data->locale == "en"){
                                return $subscription_data->name;
                            }
                        }

                    })
                    // ->addColumn('description', function($subscription){
                    //     foreach($subscription->localeAll as $subscription_data){
                    //         if($subscription_data->locale == "en"){
                    //             return strip_tags(str_replace("&nbsp;", "",$subscription_data->description));
                    //         }
                    //     }
                    // })
                    ->addColumn('action', function($subscription) {
                        if (\Auth::user()->can('subscription-edit')) {
                            $editBtn = '<a href="' . route('manage-subscription.edit', [$subscription->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color:#3699FF" ></i></a>';
                        } else {
                            $editBtn = '';
                        }
                         if (\Auth::user()->can('subscription-delete')) {

                             $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-subscription.destroy', [$subscription->id]) . '" rel="tooltip" title="Delete" class="delete_subscription_btn"><i class="far fa-trash-alt" style="color:#F64E60;"></i></a>';
                         } else {
                             $deleteBtn = '';
                         }
                        if (\Auth::user()->can('subscribers-list')) {
                            $subscribers = '<a href="' . route('manage-subscription.subscribers', [$subscription->id]) . '" title="subscribers"><i class="fas fa-users" aria-hidden="true" style="color:#3699FF" ></i></a>';
                        } else {
                            $subscribers = '';
                        }
                        return $editBtn.$subscribers;
                     })
                     ->editColumn('status', function($subscription){
                         if($subscription->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($subscription) {
                        return [
                           'display' => e($subscription->created_at->format('m/d/Y')),
                           'timestamp' => $subscription->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('name', 'LIKE', "%$search%")
                                //   ->orWhere('description', 'LIKE', "%$search%")
                                  ->orWhere('duration', 'LIKE', "%$search%")
                                  ->orWhere('price_dzd', 'LIKE', "%$search%")
                                  ->orWhere('no_of_users', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.subscription.index');
    }

    /**
     * Author : Aparna Rawal
     * Subscription create page action
     */
    public function create(){
        $permissions = Permission::all();
        $permission_arr = new \stdClass();
        foreach ($permissions as $permission) {
            $permission_arr->{$permission->id} = $permission->name;
        }
        $selected_permissions = null;
        return view('admin.subscription.create', compact('permission_arr','selected_permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'plan_name_in_english'   => 'required',
                'plan_name_in_arabic'    => 'required',
                'plan_name_in_french'    => 'required',
                'description_in_english' => 'required',
                'description_in_arabic'  => 'required',
                'description_in_french'  => 'required',
                'duration'               => 'required',
                'price_dollar'           => 'required',
                'price_dzd'              => 'required',
                'price_euro'             => 'required',
                'no_of_users'            => 'required',
                'permissions'            => 'required|array|min:1'
            ]
        );

        $subscription_data = [
            [
                'plan_name'      => $request->plan_name_in_english,
                'description'    => $request->description_in_english,
                'locale'                    => "en"
            ],
            [
                'plan_name'       => $request->plan_name_in_arabic,
                'description'     => $request->description_in_arabic,
                'locale'                    => "ar"
            ],
            [
                'plan_name'       => $request->plan_name_in_french,
                'description'     => $request->description_in_french,
                'locale'                    => "fr"
            ]
        ];

        $subscription               = new Subscription();
        $subscription->duration     = $request->duration;
        $subscription->no_of_users  = $request->no_of_users;
        $subscription->price_dollar = $request->price_dollar;
        $subscription->price_dzd    = $request->price_dzd;
        $subscription->price_euro   = $request->price_euro;
        $subscription->ordering   = $request->ordering? $request->ordering :0;
        $subscription->status       = isset($request->status)?1:0;
        $subscription->created_by   = Auth::user()->id;
        $subscription->updated_by   = Auth::user()->id;
        $result = $subscription->save();

        $subscription->permissions()->sync($request->permissions);

        foreach($subscription_data as $key => $value) {
            $subscription_translation = new SubscriptionTranslate;
            $subscription_translation->name = $value['plan_name'];
            $subscription_translation->description = $value['description'];
            $subscription_translation->subscription_id = $subscription->id;
            $subscription_translation->locale = $value['locale'];
            $subscription_translation->save();
        }

        if($result) {
            return redirect('admin/manage-subscription')->with('success', 'Subscription plan added succsessfully');
        }
    }

    public function show(){
        // return view('admin.subscription.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        foreach ($subscription->localeAll as $translate) {
            switch ($translate->locale) {
                case 'en':
                    $subscription->plan_name_in_english     = $translate->name ;
                    $subscription->description_in_english   = $translate->description;

                    break;
                case 'fr':
                    $subscription->plan_name_in_french      = $translate->name ;
                    $subscription->description_in_french   = $translate->description;

                    break;
                case 'ar':
                    $subscription->plan_name_in_arabic = $translate->name ;
                    $subscription->description_in_arabic   = $translate->description;

                    break;
            }
        }
        $selected_permissions = [];
        foreach ($subscription->permissions as $permission) {
            $selected_permissions[]= (string)$permission->pivot->permission_id;
        }

        $permissions = Permission::all();
        $permission_arr = new \stdClass();
        foreach ($permissions as $permission) {
            $permission_arr->{$permission->id} = $permission->name;
        }
        return view('admin.subscription.edit', compact('subscription','permission_arr','selected_permissions'));
    }

        /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'plan_name_in_english'   => 'required',
            'plan_name_in_arabic'    => 'required',
            'plan_name_in_french'    => 'required',
            'description_in_english' => 'required',
            'description_in_arabic'  => 'required',
            'description_in_french'  => 'required',
            'duration'               => 'required',
            'price_dollar'           => 'required',
            'price_dzd'              => 'required',
            'price_euro'             => 'required',
            'no_of_users'            => 'required',
            'permissions'            => 'required|array|min:1'
        ]);

        $subscription                   = Subscription::findOrFail($id);

        $subscription->duration         = $request->duration;
        $subscription->price_dollar     = $request->price_dollar;
        $subscription->price_dzd        = $request->price_dzd;
        $subscription->price_euro       = $request->price_euro;
        $subscription->no_of_users      = $request->no_of_users;
        $subscription->ordering      = $request->ordering? $request->ordering :0;
        $subscription->status           = isset($request->status)?1:0;
        $subscription->created_by       = Auth::user()->id;
        $subscription->updated_by       = Auth::user()->id;

        $result                         = $subscription->Update();

        $subscription->permissions()->sync($request->permissions);

        $trans_subscription = [
            'en' => [
                "name"          => $request->plan_name_in_english,
                "description"   => $request->description_in_english,
            ],
            'fr' => [
                "name"          => $request->plan_name_in_french,
                "description"   => $request->description_in_french,
            ],
            'ar' => [
                "name"          => $request->plan_name_in_arabic,
                "description"   => $request->description_in_arabic,
            ]
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            SubscriptionTranslate::where(
                [
                    [
                        'subscription_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_subscription[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-subscription')->with('success', 'Subscription plan updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request,$id)
    {
        $subscription= Subscription::with('localeAll')->find($id);
        $subscription->localeAll()->delete();
        $subscription->delete();

        $request->session()->flash('success', 'Subscription deleted successfully!');
        return redirect()->route('manage-subscription.index');
    }

    public function getSubscriberList(Request $request, $subscription_id)
    {
        if($request->ajax()){
            $customers = Customer::where('subscription_id', $subscription_id);
            return Datatables::of($customers,$subscription_id)
            ->addIndexColumn()
            ->editColumn('status', function($customers){
                if($customers->status == 1){
                    $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                    return $status;
                }else{
                    $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                    return $status;
                }
            })
            ->editColumn('payment_status', function($customers){
                if($customers->payment_status == 'completed'){
                    $payment_status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Completed</span>';
                    return $payment_status;
                }else{
                    $payment_status = '<span class="label label-inline label-light-danger font-weight-bold">Pending</span>';
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
                if (\Auth::user()->can('subscribers-view')) {
                    $action = '<a href="' . route('manage-user-detail', [$customers->id]) . '" title="subscribers"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF" ></i></a>';

                } else {
                    $action = '';
                }
                    return $action;
            })
            ->filter(function ($instance) use ($request, $subscription_id) {
                if ($request->get('status') == '0' || $request->get('status') == '1') {
                    $instance->where('subscription_id', $subscription_id)
                    ->where('status', $request->get('status'));
                }
                if (!empty($request->get('payment_status'))) {
                    $instance->where('subscription_id', $subscription_id)
                    ->where('payment_status', $request->get('payment_status'));
                }
                if (!empty($request->get('search'))) {
                    $instance->where('subscription_id', $subscription_id)
                    ->where(function ($innerQuery) use($request) {
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
            ->rawColumns(['payment_status','status', 'action'])
            ->make(true);
        }
        $subscription = Subscription:: with(['localeAll' => function($query) {
            return $query->where('locale', 'en')->get();
        }])
        ->find($subscription_id);
        return view('admin.subscription.subscriber_list', compact('subscription'));
    }
}
