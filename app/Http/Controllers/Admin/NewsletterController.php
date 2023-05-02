<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
class NewsletterController extends Controller
{
    function __construct()
    {
        
        $this->middleware('permission:newsletter-list');
        $this->middleware('permission:newsletter-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:newsletter-delete', ['only' => ['destroy']]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $newsletters = Newsletter::select('*')->orderBy('id','desc');

            return Datatables::of($newsletters)
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        if($search == 'NA'){
                            $search = '';
                            // echo "<pre>";print_r($search);exit();
                            $search = '';
                            return $instance->where('name', 'LIKE', "%$search%")
                            ->orWhere('company_name', '=', null)
                            ->orWhere('job_title', '=', null)
                            ->orWhere('cell_phone', '=', null);

                        }
                        else{
                             return $instance->where('name', 'LIKE', "%$search%")
                            ->orWhere('company_name', 'LIKE', "%$search%")
                            ->orWhere('job_title', 'LIKE', "%$search%")
                            ->orWhere('cell_phone', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%");
                        }
                    }
                    if (!empty($request->get('newsletterType'))) {
                        $newsletterType = $request->get('newsletterType');
                        return $instance->where('type', 'LIKE', "%$newsletterType%");
                    }
                })
                ->editColumn('type', function($newsletters){
                    return ucfirst($newsletters->type);
                })
                ->editColumn('name', function($row){
                    if($row->name == ''){
                            return 'NA';
                    }else{
                        return $row->name;
                    }
                })
                ->editColumn('company_name', function($row){
                    if($row->company_name == ''){
                            return 'NA';
                    }else{
                        return $row->company_name;
                    }
                })
                ->editColumn('job_title', function($row){
                    if($row->job_title == ''){
                            return 'NA';
                    }else{
                        return $row->job_title;
                    }
                })
                ->editColumn('cell_phone', function($row){
                    if($row->cell_phone == ''){
                            return 'NA';
                    }else{
                        return $row->cell_phone;
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return [
                       'display' => e($row->created_at->format('m/d/Y')),
                       'timestamp' => $row->created_at->timestamp
                    ];
                 })
                ->addColumn('action', function($newsletters){ 
                    if (\Auth::user()->can('newsletter-edit')) {
                        $editBtn = '<a href="' . route('manage-newsletter.edit', [$newsletters->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } 
                    else {
                        $editBtn = '';
                    }
                    if (\Auth::user()->can('newsletter-delete')) { 

                        $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-newsletter.destroy', [$newsletters->id]) . '" rel="tooltip" title="Delete" class="delete_zone_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';  
                    } 
                    else {
                        $deleteBtn = '';
                    }
                    return $editBtn.$deleteBtn;
                })
                ->rawColumns(['type','action'])
                ->make(true);
        }

        return view('admin.newsletter.index');
    }

    public function exportToExcel(Request $request)
    {
        $search         =  $request->input('exportSearch');
        $newsletterType =  $request->input('exportNewsletterType');
        if ($search && empty($newsletterType)) {
            $newsletters    = Newsletter::select('id')->where('name', 'LIKE', "%$search%")
            ->orWhere('company_name', 'LIKE', "%$search%")
            ->orWhere('job_title', 'LIKE', "%$search%")
            ->orWhere('cell_phone', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%");
        } elseif (empty($search) && $newsletterType) {
            $newsletters    = Newsletter::select('id')->where('type', 'LIKE', "%$newsletterType%");
        } else {
            $newsletters    = Newsletter::select('id');
        }
        $idArray = $newsletters->pluck('id');

        if (!count($idArray)) {
            $request->session()->flash('error', 'There is no data to export.');
            return redirect()->route('manage-newsletter.index');
        }
        return Excel::download(new NewsletterExport(
            $idArray,
            [
                'company_name',
                'name',
                'job_title',
                'cell_phone',
                'email',
                'type'
            ]),
            'newsletter.xlsx'
        );
    }


    public function edit($id)
    {
        $newsletters = Newsletter::findOrFail($id);
        // Setting the translated fields to edit
        return view('admin.newsletter.edit', compact('newsletters'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'email'    => 'required',
        ]);

        $newsletter = Newsletter::findOrFail($id);
        $newsletter->company_name = $request->company_name;
        $newsletter->name = $request->name;
        $newsletter->job_title = $request->job_title;
        $newsletter->email = $request->email;
        $newsletter->cell_phone = $request->cell_phone;
        $newsletter->created_by = Auth::user()->id;
        $newsletter->updated_by = Auth::user()->id;
        $result = $newsletter->Update();


        if($result) {
            return redirect('admin/manage-newsletter')->with('success', 'Newsletter updated successfully.');
        }
    }

    public function destroy(Request $request,$id)
    {
        $newsletters= Newsletter::find($id);
        $newsletters->delete();
        $request->session()->flash('success', 'Newsletters deleted successfully.');
        return redirect()->route('manage-newsletter.index');
    }

}
