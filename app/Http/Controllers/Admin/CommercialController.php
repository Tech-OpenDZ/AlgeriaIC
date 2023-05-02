<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Carbon\Carbon;
use DataTables;
use Auth;
use DB;

class CommercialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:commercial-quotes-list');
        $this->middleware('permission:commercial-quotes-create', ['only' => ['create','store']]);
        $this->middleware('permission:commercial-quotes-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:commercial-quotes-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {  

    	if ($request->ajax()){
    		 $commercial = Commercial::select('*');
	            return Datatables::of($commercial)
	                ->addColumn('action', function($commercial){ 
                        if (\Auth::user()->can('commercial-quotes-edit')) {  
                            $editBtn = '<a href="javascript:void(0)" title="edit" data-id="'.$commercial->id.'" class="editCommercial"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn ='';
                        } 
                        if (\Auth::user()->can('commercial-quotes-delete')) { 
	                        $deleteBtn ='<a href="javascript:void(0)" data-href="' . route('manage-code.destroy', [$commercial->id]) . '" rel="tooltip" title="Delete" class="delete_admin_btn" data-id="'.$commercial->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        }  else {
                            $deleteBtn ='';
                        } 
                        return $editBtn.$deleteBtn; 

	                })
	                ->editColumn('status',function($commercial){
                        if($commercial->status == 1){
                        $status = '<span class="label label-inline label-light-primary font-weight-bold">Active</span>';
                        return $status;
                        }else{
                        $status = '<span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>';
                        return $status;
                        }
                    })
                    ->editColumn('created_at', function ($commercial) {
                        return [
                            'display' => e($commercial->created_at->format('m/d/Y')),
                            'timestamp' => $commercial->created_at->timestamp
                        ];
                    })
	                ->filter(function ($instance) use ($request) {
	                	if ($request->get('status') == '0' || $request->get('status') == '1') {
                        	$instance->where('status', $request->get('status'));
                    		}
	                        if (!empty($request->get('search'))) {
	                             $instance->where(function($w) use($request){
	                                $search = $request->get('search');
	                                $w->orWhere('base', 'LIKE', "%$search%")
	                                ->orWhere('devis', 'LIKE', "%$search%")
	                                ->orWhere('cours_achat', 'LIKE', "%$search%")
	                                ->orWhere('cours_vente', 'LIKE', "%$search%");
	                            });
	                        }
	                    })
	                ->rawColumns(['action','status'])
	                ->make(true);

    	}
    	return view('admin.commercial.index');
    }


    public function store(Request $request){
    	$data = $request->all();
         $validation = \Validator::make($request->all(),['base'=> 'required|numeric','devis'=>'required','cours_achat'=>'required|numeric','cours_vente'=>'required|numeric','start_date'=>'required','end_date'=>'required','display_order'=>'required'
        ]);

    	$start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

    	if ($validation->passes()){
            $commercial = new Commercial;
            $commercial->base = $request->base;
            $commercial->devis = $request->devis;
            $commercial->cours_achat = $request->cours_achat;
            $commercial->cours_vente = $request->cours_vente;
            $commercial->status = isset($request->status)?1:0;
            $commercial->start_date = $start_date;
            $commercial->end_date = $end_date;
            $commercial->display_order = $request->display_order;
            $commercial->created_by = Auth::user()->id;
            $commercial->updated_by = Auth::user()->id;
            $result = $commercial->save();

            Commercial::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$commercial->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);


            if($result){
                return response()->json(['success'=>'Commercial saved successfully.']);
            }

        }
        else{
            return response()->json(['errors'=>$validation->getMessageBag()->toArray()]);

        }
    }

    public function edit($id)
    {
    	// echo "<pre>";print_r($id);exit();
        $commercial = Commercial::find($id);
        $view = view("admin.commercial.edit",compact('commercial'))->render();
         return response()->json(['html'=>$view]);
    }

     public function update(Request $request, $id)
    {
         $validation = \Validator::make($request->all(),['base'=> 'required|numeric','devis'=>'required','cours_achat'=>'required|numeric','cours_vente'=>'required|numeric','start_date'=>'required','end_date'=>'required','display_order'=>'required'
        ]);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        if ($validation->passes()){
            $commercial = Commercial::findOrFail($id);
            $commercial->base = $request->base;
            $commercial->devis = $request->devis;
            $commercial->cours_achat = $request->cours_achat;
            $commercial->cours_vente = $request->cours_vente;
            $commercial->status = isset($request->status)?1:0;
            $commercial->start_date = $start_date;
            $commercial->end_date = $end_date;
            $commercial->display_order = $request->display_order;
            $commercial->created_by = Auth::user()->id;
            $commercial->updated_by = Auth::user()->id;
            $result = $commercial->Update();

            Commercial::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$commercial->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

            if($result) {
                return response()->json(['success'=>'Commercial update successfully.']);
            }
        }else{
            return response()->json(['errors'=>$validation->getMessageBag()->toArray()]);

        }
    }

    public function create(){
        $display_order = Commercial::max('display_order');
            if($display_order ==0)
                $display_order = 1;
            else
                $display_order++;
        $view = view("admin.commercial.create",compact('display_order'))->render();
        return response()->json(['html'=>$view]);
    }

    public function delete($id){
        $delete_id = $id;
        return view('admin.commercial.action',compact('delete_id'));
    }

     public function destroy(Request $request,$id)
    {
        $commercial= Commercial::find($id);
        $commercial->delete();
        $request->session()->flash('success', 'Commercial deleted successfully.');
        return redirect()->route('manage-commercial-quotes.index');
    }
}
