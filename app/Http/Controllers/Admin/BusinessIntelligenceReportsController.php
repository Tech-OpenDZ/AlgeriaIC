<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessIntelligenceReports as BI_reports,
    App\Models\BusinessIntelligenceReportsTranslate as BI_reports_translate;
use App\Services\Slug;
use Auth;
use LaravelLocalization;
use DataTables;
use Carbon\Carbon;
use DB;

class BusinessIntelligenceReportsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:business-intelligence-report-list');
        $this->middleware('permission:business-intelligence-report-create', ['only' => ['create','store']]);
        $this->middleware('permission:business-intelligence-report-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:business-intelligence-report-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $sections = BI_reports::with('localeAll');

             return Datatables::of($sections)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        foreach($row->localeAll as $row_data) {
                            if($row_data->locale == "en") {
                                $row_title = $row_data->title;
                            }
                        return $row_title;
                        }
                    })
                    ->addColumn('description', function($row){
                        foreach($row->localeAll as $row_data) {
                            if($row_data->locale == "en") {
                                $row_description = $row_data->description;
                            }
                            return str_limit($row_description, 165, '....');
                        }
                    })
                    ->addColumn('image', function($row){
                        $url= asset('storage/uploads/bi_report_section/'.$row->image);
                        foreach($row->localeAll as $section) {
                            if($section->locale == "en") {
                                $title = $section->title;
                            }
                        }
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" title="'.$title.'"/>';
                    })
                    ->addColumn('action', function($sections){ 
                        if (\Auth::user()->can('business-intelligence-report-edit')) {
                            $editBtn = '<a href="' . route('manage-bi-report.edit', [$sections->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('business-intelligence-report-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-bi-report.destroy', [$sections->id]) . '" rel="tooltip" title="Delete" class="delete_bi_report_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
                            $deleteBtn = '';
                        }

                        return $editBtn.$deleteBtn;

                     })
                     ->editColumn('status', function($sections){
                         if($sections->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                    ->editColumn('created_at', function ($row) {
                        return [
                           'display' => e($row->created_at->format('m/d/Y')),
                           'timestamp' => $row->created_at->timestamp
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
                     ->rawColumns(['action','status', 'image'])
                     ->make(true);
         }
         return view('admin.bi_reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bi_reports.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_in_english'         => 'required',
            'title_in_arabic'          => 'required',
            'title_in_french'          => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
            'image'             => 'required|image|dimensions:max_width=500,max_height=500',
        ],
        [
            'image.dimensions'  => 'Plese select the image of max width and height of 500 pixels.'
        ]
        );

        $bi_report_data = [
            [  'title' => $request->title_in_english,
                'description' => $request->description_in_english,
                'locale'      => "en"
            ],
            [  'title' => $request->title_in_arabic,
                'description' => $request->description_in_arabic,
                'locale'      => "ar"
            ],
            [  'title' => $request->title_in_french,
                'description' => $request->description_in_french,
                'locale'      => "fr"
            ],
        ];

        $section = new BI_reports();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageSaveAsName = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/bi_report_section/');
            $logo_image_url = $imageSaveAsName;
            if($request->image){
                if(file_exists($upload_path.$request->image)) {
                    unlink($upload_path.$request->image);
                }
            }
            $success = $image->move($upload_path, $imageSaveAsName);
            $section->image = $imageSaveAsName;
        }

        $section->status = isset($request->status)?1:0;
        $section->created_by = Auth::user()->id;
        $section->updated_by = Auth::user()->id;
        $result = $section->save();

         foreach($bi_report_data as $key => $value) {
            $section_tanslation = new BI_reports_translate;
            $section_tanslation->title = $value['title'];
            $section_tanslation->bi_report_id = $section->id;
            $section_tanslation->description = $value['description'];
            $section_tanslation->locale = $value['locale'];
            $section_tanslation->save();
        }
        if($result) {
            $request->session()->flash('success', 'Report added successfully.');
            return redirect()->route('manage-bi-report.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = BI_reports::with('localeAll')->find($id);
        return view('admin.bi_reports.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title_in_english'         => 'required',
            'title_in_arabic'          => 'required',
            'title_in_french'          => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]);
        if($request->hasFile('image')){
            $validatedData = $request->validate(
                [
                    'image'             => 'image|dimensions:max_width=500,max_height=500',
                ],
                [
                    'image.dimensions'  => 'Plese select the image of max width and height of 500 pixels.'
                ]
            );
        }

        $section = BI_reports::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageSaveAsName = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/bi_report_section');
            $logo_image_url = $imageSaveAsName;
            if($request->image){ 
                try { 
                    unlink($upload_path.$section->image); 
                } catch(\Throwable $th) {

                }
            }
            $success = $image->move($upload_path, $imageSaveAsName);
            $section->image = $imageSaveAsName;
        }
        $section->status = isset($request->status)?1:0;
        $section->created_by = Auth::user()->id;
        $section->updated_by = Auth::user()->id;
        $result = $section->Update();

        $trans_section = [
            'en' => [
                "title"       => $request->title_in_english,
                "description" => $request->description_in_english,
            ],
            'fr' => [
                "title"       => $request->title_in_french,
                "description" => $request->description_in_french,
            ],
            'ar' => [
                "title"       => $request->title_in_arabic,
                "description" => $request->description_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            BI_reports_translate::where(
                [
                    [
                        'bi_report_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_section[$localeCode]);
        }
        if($result) {
            $request->session()->flash('success', 'Report updated successfully.');
            return redirect()->route('manage-bi-report.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $section= BI_reports::with('localeAll')->find($id);
        try {
            unlink('storage/uploads/bi_report_section/'.$section->image);
        } catch (\Throwable $th) {

        }
        $section->localeAll()->delete();
        $section->delete();
        $request->session()->flash('success', 'Report deleted successfully.');
        return redirect()->route('manage-bi-report.index');
    }
}
