<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Economic;
use App\Models\EconomicTranslate;
use Carbon\Carbon;
use DataTables;
use Auth;
use LaravelLocalization;
use DB;

class EconomicController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:economical-indicator-list');
        $this->middleware('permission:economical-indicator-create', ['only' => ['create','store']]);
        $this->middleware('permission:economical-indicator-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:economical-indicator-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
    	if($request->ajax()){
    		$economic = Economic::with('localeAll');
    		return Datatables::of($economic)
                    ->addIndexColumn()
                    ->addColumn('indicator', function($economic){
                    foreach($economic->localeAll as $economic_data) {
                        if($economic_data->locale == "en") {
                            $economic_name = $economic_data->indicator;
                        }
                    }
                    return $economic_name;
                	})
                    ->addColumn('action', function($economic) { 
                        if (\Auth::user()->can('economical-indicator-edit')) {
                            $editBtn = '<a href="javascript:void(0)" title="edit" class="editEconomic" data-id="'.$economic->id.'"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('economical-indicator-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-economical.destroy', [$economic->id]) . '" rel="tooltip" title="Delete" class="delete_admin_btn" data-id="'.$economic->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
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
                                $w->where('indicator', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status','indicator'])
                     ->make(true);
    	}
    	return view('admin.economic.index');
    }



    public function create(){
    	$display_order = Economic::max('display_order');
            if($display_order ==0)
                $display_order = 1;
            else
                $display_order++;
    	$view = view("admin.economic.create",compact('display_order'))->render();
        return response()->json(['html'=>$view]);
    }

    public function store(Request $request){
    	$data = $request->all();
    	$validation = \Validator::make($request->all(),['indicator_name_in_english'=> 'required','indicator_name_in_arabic'=>'required','indicator_name_in_french'=>'required','value'=>'required','date'=>'required','display_order'=>'required'
        ]);

    	// echo "<pre>";print_r($data);exit();
    	$economic_data = [
            [  'indicator' => $request->indicator_name_in_english,
                'locale'      => "en"
            ],
            [  'indicator' => $request->indicator_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'indicator' => $request->indicator_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $date = Carbon::parse($request->date);

        if ($validation->passes()){
              $economic = new Economic();
              $economic->value = $request->value;
              $economic->date = $date;
              $economic->status = isset($request->status)?1:0;
              $economic->display_order = $request->display_order;
              $economic->created_by = Auth::user()->id;
              $economic->updated_by = Auth::user()->id;
              $result = $economic->save();

              Economic::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$economic->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);




        foreach($economic_data as $key => $value) {
            $economic_tanslation = new EconomicTranslate();
            $economic_tanslation->indicator = $value['indicator'];
            $economic_tanslation->economic_id = $economic->id;
            $economic_tanslation->locale = $value['locale'];
            $economic_tanslation->save();
        }

         if($result) {
            return response()->json(['success'=>'Economic added successfully.']);
            }

        }
         else{
            return response()->json(['errors'=>$validation->getMessageBag()->toArray()]);

        }

    }

      public function edit($id)
    {
    	// echo "<pre>";print_r($id);exit();
        $economic = Economic::find($id);
        foreach ($economic->localeAll as $translate) {
            switch ($translate->locale) {
                case 'en':
                    $economic->indicator_in_english = $translate->indicator;
                    break;
                case 'fr':
                    $economic->indicator_in_french = $translate->indicator;
                    break;
                case 'ar':
                    $economic->indicator_in_arabic = $translate->indicator;
                    break;
            }
        }
        // echo "<pre>";print_r($economic);exit();
        $view = view("admin.economic.edit",compact('economic'))->render();
         return response()->json(['html'=>$view]);
    }

    public function update(Request $request,$id){
    	$data = $request->all();
    	// echo "<pre>";print_r($data);exit();
        $validation = \Validator::make($request->all(),['indicator_name_in_english'=> 'required','indicator_name_in_arabic'=>'required','indicator_name_in_french'=>'required','value'=>'required','date'=>'required','display_order'=>'required'
        ]);
    	$date = Carbon::parse($request->date);
        if ($validation->passes()){
            $economic = Economic::findOrFail($id);

            $economic->value = $request->value;
            $economic->date = $date;
            $economic->status = isset($request->status)?1:0;
            $economic->display_order = $request->display_order;
            $economic->created_by = Auth::user()->id;
            $economic->updated_by = Auth::user()->id;
            $result = $economic->Update(); 

            Economic::where('display_order','>=',$request->display_order)
                        ->where('id','!=',$economic->id)
                        ->update(['display_order' => DB::raw('display_order + 1')]);

            $economic_data = [
                'en' => [
                    'indicator' => $request->indicator_name_in_english,
                ],
                'fr' => [
                    'indicator' => $request->indicator_name_in_french,
                ],
                'ar' => [
                    'indicator' => $request->indicator_name_in_arabic,
                ],
            ];

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                EconomicTranslate::where(
                    [
                        [
                            'economic_id', '=', $id
                        ],
                        [
                            'locale', '=', $localeCode
                        ]
                    ])
                    ->update($economic_data[$localeCode]);
            }
            if($result) {
            return response()->json(['success'=>'Economic indicator updated successfully.']);
            }

        }
        else{
            return response()->json(['errors'=>$validation->getMessageBag()->toArray()]);

        }


    }

    public function delete($id){
        $delete_id = $id;
        return view('admin.economic.action',compact('delete_id'));
    }

    public function destroy(Request $request,$id)
    {
        $economic= Economic::with('localeAll')->find($id);
        $economic->localeAll()->delete();
        $economic->delete();
        $request->session()->flash('success', 'Economic indicator deleted successfully.');
        return redirect()->route('manage-economical.index');
    }
}
