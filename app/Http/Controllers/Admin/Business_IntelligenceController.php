<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer,
    App\Models\BusinessIntelligenceDashboard,
    App\Models\BusinessIntelligenceDashboardTranslate;
use LaravelLocalization;
use DataTables;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\CustomersSubscription;
use App\Models\Subscription;

class Business_IntelligenceController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) 
    {
       
    	if($request->ajax()){
            $users = Customer::whereColumn('parent_id','=','id')
                    ->where('subscription_id',4);
            
    		return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('company_name', function($users) {

                    $btn = '<a href="' . route('dashboard-list', ['id' => $users->id]) . '" >'.$users->company_name.'</a>';       
                    return $btn;      
                    
                })
                ->addColumn('customer_name', function($users) {
       
                    return $users->name;
                    
                })
                ->addColumn('no_of_users', function($users){
                    
                    $customer = Customer::where('parent_id',$users->id)->where('id','<>',$users->id)->count();
                    $no_of_users = Subscription::where('id',$users->subscription_id)->first();
                    return isset($no_of_users->no_of_users) ? $customer."/".$no_of_users->no_of_users : '';
                    
                })
                ->addColumn('end_of_subscription', function($users){
                    
                    $plan_data = CustomersSubscription::where('id',CustomersSubscription::where('customer_id',$users->id)->where('status','completed')->max('id'))->first();
                    return isset($plan_data['end_date']) ? date("d. m. Y",strtotime($plan_data['end_date'])) : '';

                })
                ->filter(function ($instance) use ($request) {
                    
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                           $search = $request->get('search');
                           $w->orWhere('company_name', 'LIKE', "%$search%")
                            ->orWhere('name', 'LIKE', "%$search%");
                        });
                   }
                })
                ->rawColumns(['company_name'])
                ->make(true);
    	}
    	return view('admin.business_intelligence.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function dashboardList(Request $request) 
    {
        $user = Customer::where('id',request()->segment(3))->first();
        
    	if($request->ajax()){
            $dashboard = BusinessIntelligenceDashboard::with('localeAll')
                                            ->where('customer_id',$request->get('id'));

    		return Datatables::of($dashboard)
                ->addIndexColumn()
                ->addColumn('description', function($dashboard) {
                    foreach($dashboard->localeAll as $dashboard_data){
                        if($dashboard_data->locale == "en"){
                            return strip_tags(str_replace("&nbsp;", "",$dashboard_data->description));
                        }
                        else {
                            return "";
                        }
                    }
                  
                })
                ->addColumn('date_of_uploading', function($dashboard) {
                  
                    return $dashboard->created_at;

                })
                ->addColumn('action', function($dashboard) {
                    
                    $editBtn = '<a href="'. route('edit-dashboard', [$dashboard->id]) .'" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    $btnDelete = '<a class="delete_dashboard_btn" rel="tooltip" title="Delete dashboard" href="javascript:;" data-href="' . route('delete-dashboard', [$dashboard->id]) . '"  title="Delete"  data-id="'.$dashboard->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    return $editBtn.$btnDelete;
                    
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('title', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['company_name','action'])
                ->make(true);
    	}
    	return view('admin.business_intelligence.dashboard_list',compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function dashboardLists(Request $request) 
    {
       
    	if($request->ajax()){
            $dashboard = BusinessIntelligenceDashboard::with('localeAll')
                                            ->where('customer_id',null);

    		return Datatables::of($dashboard)
                ->addIndexColumn()
                ->addColumn('description', function($dashboard) {
                    foreach($dashboard->localeAll as $dashboard_data){
                        if($dashboard_data->locale == "en"){
                            return strip_tags(str_replace("&nbsp;", "",$dashboard_data->description));
                        }
                        else {
                            return "";
                        }
                    }
                  
                })
                ->addColumn('date_of_uploading', function($dashboard) {
                  
                    return $dashboard->created_at;

                })
                ->addColumn('action', function($dashboard) {
                    
                    $editBtn = '<a href="'. route('edit-dashboard', [$dashboard->id]) .'" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    $btnDelete = '<a class="delete_dashboard_btn" rel="tooltip" title="Delete dashboard" href="javascript:;" data-href="' . route('delete-dashboard', [$dashboard->id]) . '"  title="Delete"  data-id="'.$dashboard->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    return $editBtn.$btnDelete;
                    
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('title', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['company_name','action'])
                ->make(true);
    	}
    	return view('admin.business_intelligence.dashboard_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */

    public function createDashboard() 
    {  
        
        $display_order = BusinessIntelligenceDashboard::where('customer_id',request()->segment(3))
                                                        ->max('display_order');
        $display_order++;
        return view('admin.business_intelligence.create_dashboard',compact('display_order'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function storeDashboard(Request $request) 
    {  
        $validatedData = $request->validate([
            'image'                    => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]);

        $business_data = [
            [  
               'description'=> $request->description_in_english,
                'locale'      => "en"
            ],
            [  
               'description'=> $request->description_in_arabic,
                'locale'      => "ar"
            ],
            [  
               'description'=> $request->description_in_french,
                'locale'      => "fr"
            ],
        ]; 

        $business = new BusinessIntelligenceDashboard();

         // Logic to upload the file
         if ($request->hasFile('image')) {

            $image              = $request->file('image');
            $imageSaveAsName    = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/images/');

            if(file_exists($upload_path.$request->image)) {
                unlink($upload_path.$request->image);
            }
            $success = $image->move($upload_path, $imageSaveAsName);
        }

        $business->display_order    = $request->display_order;
        $business->status           = isset($request->status)?1:0;
        $business->image            = $imageSaveAsName;
        $business->customer_id      = isset($request->customer_id) ? $request->customer_id : null;
        $business->created_by       = Auth::user()->id;
        $business->updated_by       = Auth::user()->id;
        $result                     = $business->save();

        BusinessIntelligenceDashboard::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$business->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        foreach($business_data as $key => $value) {
            $business_tanslation = new BusinessIntelligenceDashboardTranslate();
            $business_tanslation->description = $value['description'];
            $business_tanslation->dashboard_id = $business->id;
            $business_tanslation->locale = $value['locale'];
            $business_tanslation->save(); 
        } 

        if($result) {
            $request->session()->flash('success', 'Dashboard added successfully.');
            if(isset($request->customer_id))
                return redirect()->route('dashboard-list',['id'=> $request->customer_id]);
            else 
                return redirect()->route('dashboard-list',['id'=> null]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

    public function editDashboard($id) 
    {  
        $business_data = BusinessIntelligenceDashboard::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($business_data->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $business_data->description_in_english = $translate->description;
                    break;
                case 'fr':
                    $business_data->description_in_french = $translate->description;
                    break;
                case 'ar':
                    $business_data->description_in_arabic = $translate->description;
                    break;
            }
        }
        return view('admin.business_intelligence.edit_dashboard', compact('business_data'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function updateDashboard($id, Request $request) 
    {
        // Logic to validate form data
        $validatedData = $request->validate([
            
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]);

        $business =  BusinessIntelligenceDashboard::findOrFail($id);

        // Logic to upload the file
        if ($request->hasFile('image')) {

            $image              = $request->file('image');
            $imageSaveAsName    = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/images/');

            if(file_exists($upload_path.$request->image)) {
                unlink($upload_path.$request->image);
            }
            $success             = $image->move($upload_path, $imageSaveAsName);
            $business->image     = $imageSaveAsName;
        }

        // Logic to update data

        $userId                     = Auth::user()->id;
        $business->display_order = $request->display_order;
        $business->status        = isset($request->status) ? 1 : 0;
        $business->customer_id   = isset($request->customer_id) ? $request->customer_id : null;
        $business->created_by    = $userId;
        $business->updated_by    = $userId;
        $business->save(); 

        BusinessIntelligenceDashboard::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$business->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);


        // Logic to update translations
        $trans_business = [
            'en' => [
                "description"       => $request->description_in_english
            ],
            'fr' => [
                "description"       => $request->description_in_french
            ],
            'ar' => [
                "description"       => $request->description_in_arabic
            ],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            BusinessIntelligenceDashboardTranslate::where(
                [
                    [
                        'dashboard_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_business[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'Dashboard updated successfully.');
        if(isset($request->customer_id))
            return redirect()->route('dashboard-list',['id'=> $request->customer_id]);
        else 
            return redirect()->route('dashboard-list',['id'=> null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $dashboard = BusinessIntelligenceDashboard::findOrFail($request->delete);
        $dashboard->localeAll()->delete();
        $dashboard->delete();
        
        return redirect()->back()->with('success', 'Dashboard deleted successfully.');
    }
    

}
