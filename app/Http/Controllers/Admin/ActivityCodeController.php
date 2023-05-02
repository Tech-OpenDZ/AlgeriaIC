<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityCode;
use App\Exports\NewsletterExport;
use DataTables;
use Auth;
use App\Imports\ActivityCodeImport;
use App\Imports\CodeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ActivityCodeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:activity-code-list');
        $this->middleware('permission:activity-code-create', ['only' => ['create','store']]);
        $this->middleware('permission:activity-code-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:activity-code-delete', ['only' => ['destroy']]);
    } 
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $codes = ActivityCode::select('*');
            return Datatables::of($codes)
                ->addColumn('action', function($codes){ 
                    if (\Auth::user()->can('activity-code-edit')) { 
                        $editBtn = '<a href="' . route('manage-code.edit', [$codes->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editBtn = '';
                    } 
                    if (\Auth::user()->can('activity-code-delete')) { 
                        $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-code.destroy', [$codes->id]) . '" rel="tooltip" title="Delete" class="delete_zone_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $deleteBtn = '';
                    }   
                    return $editBtn.$deleteBtn;
                })
                ->editColumn('created_at', function ($codes) {
                    if($codes->created_at != null) {
                        return [
                        'display' => e($codes->created_at->format('m/d/Y')),
                        'timestamp' => $codes->created_at->timestamp
                        ];
                    } else {
                        return [
                            'display' => '',
                            'timestamp' => ''
                        ];
                    }
                 })
                ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('activity_code', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%");
                            });
                        }
                    })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('admin.code.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.code.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'activity_code'    => 'required|unique:activity_codes',
            'description'    => 'required',
        ],['activity_code.unique'=>'Activity Code already exist.']);

        $codes = new ActivityCode();
        $codes->activity_code = $request->activity_code;
        $codes->description = $request->description;
        $codes->created_by = Auth::user()->id;
        $codes->updated_by = Auth::user()->id;
        $result = $codes->save();


        if($result) {
            return redirect('admin/manage-code')->with('success', 'Activity Code added successfully.');
        }
    }

     public function edit($id)
    {
        $codes = ActivityCode::findOrFail($id);
        // Setting the translated fields to edit
        return view('admin.code.edit', compact('codes'));
    }

     public function update(Request $request, $id)
    {
        // echo "<pre>";print_r($id);exit();
        $validatedData = $request->validate([
            'activity_code'    => 'required',
            'description'    => 'required',
        ]);

        $code = ActivityCode::findOrFail($id);
        $code->activity_code = $request->activity_code;
        $code->description = $request->description;
        $code->created_by = Auth::user()->id;
        $code->updated_by = Auth::user()->id;
        $result = $code->Update();


        if($result) {
            return redirect('admin/manage-code')->with('success', 'Code updated successfully.');
        }
    }

    public function destroy(Request $request,$id)
    {
        $codes= ActivityCode::find($id);
        $codes->delete();
        $request->session()->flash('success', 'Code deleted successfully.');
        return redirect()->route('manage-code.index');
    }

    public function create_code(){
        $error_msg = '';
        return view('admin.code.import',compact('error_msg'));
    }

    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file'    => 'required']);
        if($request->file('file')){
            $err_msg_array = [];
            $path = $request->file('file')->getRealPath();
            //Import Excel
            $code_import = new CodeImport();
            $import_data =  Excel::toCollection($code_import, $request->file('file'))[0];
            $import_data_filter = array_filter($import_data->toArray());
            if(!empty($import_data_filter)){
                $export_error_data = $import_data_filter;
                $data_filter = array_filter($export_error_data);
                $err_msg_array = [];
                $insert = [];
                $datacount = sizeof($export_error_data);
                $user_data = ActivityCode::all()->toArray();
                $codes = ActivityCode::all()->pluck('activity_code')->toArray();
                for($i=0;$i<$datacount;$i++){
                    if(isset($export_error_data[$i]['activity_code'])){
                        foreach ($export_error_data as $import_value) {
                            $filter_import = array_filter($import_value);
                            if (in_array($filter_import['activity_code'], $codes)){
                                continue;
                            }
                            $insert[] =['activity_code' =>$filter_import['activity_code'],'description'=>$filter_import['description'],'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()] ;
                        }
                    }
                    // --*Code is used for display validation for duplicate records---
                    // if(isset($export_error_data[$i]['activity_code'])){
                    //     foreach ($user_data as $key => $value) {
                    //         if($value['activity_code'] == $export_error_data[$i]['activity_code']){
                    //             $err_msg_array[$i][] = 'The Activity Code is already exist.';
                    //         }else{
                    //             $code = $export_error_data[$i]['activity_code'];
                    //         }
                    //     }

                    // }else{
                    //     $code = '';
                    // }
                    // ------------------**********-----------
                    $rules = [
                        'activity_code'=>'required|numeric',
                        'description'=>'required'
                    ];
                    $new_array = array_filter($export_error_data[$i]);

                    $validator = Validator::make($new_array,$rules);
                    $messages = $validator->messages();

                    foreach ($messages->all() as $message) {
                       $err_msg_array[$i][] = $message;
                    }
                    $errormessage = [];
                    $errorrow = [];

                    foreach ($err_msg_array as $key => $value) {
                        for($k=0;$k<count($value);$k++){
                            $errList = $value[$k]."\r\n";
                            // $errList = $value[$k].'in row'.($key+2)."\r\n";
                            array_push($errormessage, $errList);
                            array_push($errorrow, $errList);
                        }
                    }
                    if(empty($err_msg_array[$i])){
                        // $dataImported = $export_error_data[$i];
                        if(!empty($insert)){
                            $dataImported = $insert[$i];
                            $Import_new_arrayData = array_filter($dataImported);
                            unset($insert[$i]);
                            ActivityCode::insert($Import_new_arrayData);
                        }
                    }
                }
                if(empty($errormessage)){
                    return redirect('admin/manage-code')->with('success', 'Code Imported successfully.');
                }
                else{
                    // $err_List = preg_replace("/\r|\n/", "", htmlentities(implode(" , ",$errormessage)));
                    // $error_msg = explode(',', $err_List);
                    // return view('admin.code.import',compact('error_msg'));
                    return redirect()->back()->withInput()->withErrors(['error_msg' => 'Please check your imported excel (Activity code and description are required).']);
                }

            } else{
                return redirect()->back() ->withInput()->withErrors(['error_msg' => 'Please check your imported excel (Activity code and description are required).']);
            }

        }

    }
}
