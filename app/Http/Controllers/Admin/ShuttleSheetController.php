<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShuttleSheet;
use LaravelLocalization;
use DataTables;
use Auth;

class ShuttleSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) 
    {
    	if($request->ajax()){
            $sheet = ShuttleSheet::where('customer_id',$request->get('id'));
    		return Datatables::of($sheet)
                ->addIndexColumn()
                
                ->addColumn('date_of_uploading', function($sheet) {
                  
                    return $sheet->created_at;

                })
                ->addColumn('action', function($sheet) {
                    
                    $editBtn = '<a href="'. route('manage-shuttle-sheet.edit', [$sheet->id]) .'" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    $btnDelete = '<a class="delete_sheet_btn" rel="tooltip" title="Delete sheet" href="javascript:;" data-href="' . route('manage-shuttle-sheet.delete', [$sheet->id]) . '"  title="Delete"  data-id="'.$sheet->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    
                    return $editBtn.$btnDelete;
                    
                })
                
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('admin.business_intelligence.dashboard-list',compact('user'));
    } 

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() 
    {  
        return view('admin.business_intelligence.create_shuttle_sheet');
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
        $validatedData = $request->validate([
            'file'                    => 'required',
        ]);

        $business = new ShuttleSheet();

         // Logic to upload the file
         if ($request->hasFile('file')) {

            $file              = $request->file('file');
            $fileName          = $file->getClientOriginalName();
            $fileSaveAsName    = time() . "_file." . $file->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/files/');

            if(file_exists($upload_path.$request->file)) {
                unlink($upload_path.$request->file);
            }
            $success = $file->move($upload_path, $fileSaveAsName);
        }

        $business->status           = isset($request->status)?1:0;
        $business->shuttle_sheet    = $fileSaveAsName;
        $business->file_name        = $fileName;
        $business->customer_id      = $request->customer_id;
        $business->created_by       = Auth::user()->id;
        $business->updated_by       = Auth::user()->id;
        $result                     = $business->save();

        if($result) {
            $request->session()->flash('success', ' Shuttle sheet added successfully.');
            return redirect()->route('dashboard-list',['id'=> $request->customer_id]);
        }

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
        $sheet_data = ShuttleSheet::findOrFail($id);
        // Setting the translated fields to edit
        return view('admin.business_intelligence.edit_shuttle_sheet', compact('sheet_data'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request) 
    {
        // Logic to validate form data
       
        $business =  ShuttleSheet::findOrFail($id);

        // Logic to upload the file
        if ($request->hasFile('file')) {

            $file              = $request->file('file');
            $fileName          = $file->getClientOriginalName();
            $fileSaveAsName    = time() . "_file." . $file->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/files/');

            if(file_exists($upload_path.$request->file)) {
                unlink($upload_path.$request->file);
            }
            $success             = $file->move($upload_path, $fileSaveAsName);
            $business->shuttle_sheet    = $fileSaveAsName;
            $business->file_name        = $fileName;
        }

        // Logic to update data

        $userId                     = Auth::user()->id;
        $business->status           = isset($request->status) ? 1 : 0;
        $business->created_by       = $userId;
        $business->updated_by       = $userId;
        $business->save(); 

        // Setting success message and return
        $request->session()->flash('success', 'Shuttle sheet updated successfully.');
        return redirect()->route('dashboard-list',['id'=> $business->customer_id,'report_id' => $business->report_id]);
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
        $sheet = ShuttleSheet::findOrFail($request->delete);
        if(file_exists($sheet->shuttle_sheet)) {
            unlink('storage/uploads/business_intelligence/files/'.$sheet->shuttle_sheet);
        }
        $sheet->delete();        
        return redirect()->back()->with('success', 'shuttle sheet deleted successfully.');
    }
}
