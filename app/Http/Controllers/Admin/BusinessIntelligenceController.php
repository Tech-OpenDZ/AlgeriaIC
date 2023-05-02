<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessIntelligence;
use App\Models\BusinessIntelligenceTranslate;
use LaravelLocalization;
use DataTables;
use Auth;
use DB;

class BusinessIntelligenceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:business-intelligence-list');
        $this->middleware('permission:business-intelligence-create', ['only' => ['create','store']]);
        $this->middleware('permission:business-intelligence-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:business-intelligence-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
    	if($request->ajax()){
    		$business = BusinessIntelligence::with('localeAll');
    		return Datatables::of($business)
                    ->addIndexColumn()
                    ->addColumn('title', function($business){
                    foreach($business->localeAll as $business_data) {
                        if($business_data->locale == "en") {
                            $title = $business_data->title;
                        } 
                    }
                    return $title;
                	})
                	->addColumn('description', function($business){
                    foreach($business->localeAll as $business_data) {
                        if($business_data->locale == "en") {
                            $description = $business_data->description;
                        }
                    }
                    return $description;
                	})
                    ->addColumn('action', function($business){ 
                        if (\Auth::user()->can('business-intelligence-edit')) { 
                            $editBtn = '<a href="' . route('manage-business-intelligences.edit', [$business->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        } 
                        if (\Auth::user()->can('business-intelligence-delete')) {
                            $deleteBtn = '<a href="javascript:void(0)" data-id="'.$business->id.'" data-href="' . route('manage-business-intelligences.destroy', [$business->id]) . '" rel="tooltip" title="Delete" class="delete_partner_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } 
                        else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($economic){
                         if($economic->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($economic) {
                        return [
                           'display' => e($economic->created_at->format('m/d/Y')),
                           'timestamp' => $economic->created_at->timestamp
                        ];
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
                     ->rawColumns(['action','status','title','description'])
                     ->make(true);
    	}
    	return view('admin.businessintelligence.index');
    }

    public function create(){
    	$display_order = BusinessIntelligence::max('display_order');
            if($display_order ==0)
                $display_order = 1;
            else
                $display_order++;
    	return view('admin.businessintelligence.create',compact('display_order'));
    }

    public function store(Request $request){
        // echo "<pre>";print_r($request->all());exit();
    	$validatedData = $request->validate([
            'title_in_english'   => 'required',
            'title_in_arabic'    => 'required',
            'title_in_french'    => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]
        );

        $business_data = [
            [  'title' => $request->title_in_english,
               'description'=> $request->description_in_english,
                'locale'      => "en"
            ],
            [  'title' => $request->title_in_arabic,
               'description'=> $request->description_in_arabic,
                'locale'      => "ar"
            ],
            [  'title' => $request->title_in_french,
               'description'=> $request->description_in_french,
                'locale'      => "fr"
            ],
        ];
        $business = new BusinessIntelligence();
        $business->display_order = $request->display_order;
        $business->status = isset($request->status)?1:0;
        $business->services = isset($request->services)?1:0;
        $business->created_by = Auth::user()->id;
        $business->updated_by = Auth::user()->id;
        $result = $business->save();

        BusinessIntelligence::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$business->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        foreach($business_data as $key => $value) {
            $business_tanslation = new BusinessIntelligenceTranslate();
            $business_tanslation->title = $value['title'];
            $business_tanslation->description = $value['description'];
            $business_tanslation->b_intelligence_id = $business->id;
            $business_tanslation->locale = $value['locale'];
            $business_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-business-intelligences')->with('success', 'Data added succsessfully.');
        }

    }

    public function edit($id)
    {
        $business_data = BusinessIntelligence::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($business_data->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $business_data->title_in_english = $translate->title;
                    $business_data->description_in_english = $translate->description;
                    break;
                case 'fr':
                    $business_data->title_in_french = $translate->title;
                    $business_data->description_in_french = $translate->description;
                    break;
                case 'ar':
                    $business_data->title_in_arabic = $translate->title;
                    $business_data->description_in_arabic = $translate->description;
                    break;
            }
        }
        return view('admin.businessintelligence.edit', compact('business_data'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title_in_english'   => 'required',
            'title_in_arabic'    => 'required',
            'title_in_french'    => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]
        );


        $business = BusinessIntelligence::findOrFail($id);
        $business->display_order = $request->display_order;
        $business->status = isset($request->status)?1:0;
        $business->services = isset($request->services)?1:0;
        $business->created_by = Auth::user()->id;
        $business->updated_by = Auth::user()->id;
        $result = $business->Update();

        BusinessIntelligence::where('display_order','>=',$request->display_order)
                            ->where('id','!=',$business->id)
                            ->update(['display_order' => DB::raw('display_order + 1')]);

        $trans_business = [
            'en' => [
                "title"  => $request->title_in_english,
                "description"  => $request->description_in_english,
            ],
            'fr' => [
                "title"  => $request->title_in_french,
                "description"  => $request->description_in_french,
            ],
            'ar' => [
                "title"  => $request->title_in_arabic,
                "description"  => $request->description_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            BusinessIntelligenceTranslate::where(
                [
                    [
                        'b_intelligence_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_business[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-business-intelligences')->with('success', 'Data updated successfully.');
        }
    }

      public function destroy(Request $request,$id)
    {
        $business= BusinessIntelligence::with('localeAll')->find($id);
        $business->localeAll()->delete();
        $business->delete();
        $request->session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('manage-business-intelligences.index');
    }

}
