<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer,
    App\Models\BusinessIntelligenceReport,
    App\Models\BusinessIntelligenceReportTranslate;
use DataTables;
use Auth;
use DB;
use Carbon\Carbon;
use LaravelLocalization;
use Mail;

class BIReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) 
    {
    	if($request->ajax()){
            $report = BusinessIntelligenceReport::with('localeAll')
                                            ->where('customer_id',$request->get('id'))
                                            ->where('report_id',$request->get('report_id'));
    		return Datatables::of($report)
                ->addIndexColumn()
                ->addColumn('title', function($report) {
                    foreach($report->localeAll as $report_data){
                        if($report_data->locale == "en"){
                            return strip_tags(str_replace("&nbsp;", "",$report_data->title));
                        }
                        else {
                            return "";
                        }
                }
                  
                })
                ->addColumn('description', function($report) {
                    foreach($report->localeAll as $report_data){
                        if($report_data->locale == "en"){
                            return strip_tags(str_replace("&nbsp;", "",$report_data->description));
                        }
                        else {
                            return "";
                        }
                }
                })
                ->addColumn('date_of_uploading', function($report) {
                  
                    return $report->created_at;

                })
                ->addColumn('action', function($report) {
                    
                    $editBtn = '<a href="'. route('manage-report.edit', [$report->id]) .'" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    $btnDelete = '<a class="delete_report_btn" rel="tooltip" title="Delete report" href="javascript:;" data-href="' . route('manage-report.delete', [$report->id]) . '"  title="Delete"  data-id="'.$report->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    
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
    	return view('admin.business_intelligence.subdashboard_list');
    } 

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() 
    {  
        $display_order = BusinessIntelligenceReport::where('customer_id',request()->segment(3))
                                                    ->max('display_order');
        $display_order++;
        return view('admin.business_intelligence.create_report',compact('display_order'));
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
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]);
    
        $report_data = [
            [  
                'title'             => $request->title_in_english,
                'period'            => $request->period_in_english,
                'description'       => $request->description_in_english,
                'locale'            => "en"
            ],
            [  
                'title'             => $request->title_in_arabic,
                'period'            => $request->period_in_arabic,
                'description'       => $request->description_in_arabic,              
                'locale'            => "ar"
            ],
            [  
                'title'              => $request->title_in_french,
               'period'             => $request->period_in_french,
               'description'        => $request->description_in_french,
               'locale'             => "fr"
            ],
        ]; 
        $report = new BusinessIntelligenceReport();

         // Logic to upload the file
         if ($request->hasFile('file')) {

            $file              = $request->file('file');
            $fileName          = $file->getClientOriginalName();
            $fileSaveAsName    = time() . "_report." . $file->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/files/');

            if(file_exists($upload_path.$request->file)) {
                unlink($upload_path.$request->file);
            }
            $success = $file->move($upload_path, $fileSaveAsName);
        }

        $report->display_order    = $request->display_order;
        $report->status           = isset($request->status)?1:0;
        $report->report_id        = $request->report_id;
        $report->report           = $fileSaveAsName;
        $report->file_name        = $fileName;
        $report->customer_id      = $request->customer_id;
        $report->report_id        = $request->report_id;
        $report->created_by       = Auth::user()->id;
        $report->updated_by       = Auth::user()->id;
        $result                   = $report->save(); 

       

        BusinessIntelligenceReport::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$report->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        foreach($report_data as $key => $value) {
            $report_tanslation = new BusinessIntelligenceReportTranslate();
            $report_tanslation->title = $value['title'];
            $report_tanslation->period = $value['period'];
            $report_tanslation->description = $value['description'];
            $report_tanslation->report_id = $report->id;
            $report_tanslation->locale = $value['locale'];
            $report_tanslation->save(); 
        } 

        if($result) {
            $customer =  Customer::where('id',$request->customer_id)->select('email')->first();
        
            // Mail::send('frontend.business_intelligence.report_notification',[], function($message) use ($customer) {
            //     $message->from('admin@gmail.com');
            //     $message->to($customer->email);
            //     $message->subject('New report added.');
            // });

            $request->session()->flash('success', 'Report added successfully.');
            return redirect()->route('manage-sub-dashboard.index',['id'=> $request->customer_id,'report_id'=>$request->report_id]);
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
        $report_data = BusinessIntelligenceReport::findOrFail($id);
        // Setting the translated fields to edit

        foreach ($report_data->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $report_data->description_in_english = $translate->description;
                    $report_data->title_in_english      = $translate->title;
                    $report_data->period_in_english     = $translate->period;
                    break;
                case 'fr':
                    $report_data->description_in_french = $translate->description;
                    $report_data->title_in_french      = $translate->title;
                    $report_data->period_in_french     = $translate->period;
                    break;
                case 'ar':
                    $report_data->description_in_arabic = $translate->description;
                    $report_data->title_in_arabic      = $translate->title;
                    $report_data->period_in_arabic     = $translate->period;
                    break;
            }
        } 
        return view('admin.business_intelligence.edit_report', compact('report_data'));
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
        $validatedData = $request->validate([
            'title_in_english'          => 'required',
            'title_in_arabic'           => 'required',
            'title_in_french'           => 'required',
            'period_in_english'         => 'required',
            'period_in_arabic'          => 'required',
            'period_in_french'          => 'required',
            'description_in_english'   => 'required',
            'description_in_arabic'    => 'required',
            'description_in_french'    => 'required',
        ]);

        $report =  BusinessIntelligenceReport::findOrFail($id);

        // Logic to upload the file
       
        if ($request->hasFile('file')) {

            $file              = $request->file('file');
            $fileName          = $file->getClientOriginalName();
            $fileSaveAsName    = time() . "_report." . $file->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/business_intelligence/files/');

            if(file_exists($upload_path.$request->file)) {
                unlink($upload_path.$request->file);
            }
            $success = $file->move($upload_path, $fileSaveAsName);
            $report->report = $fileSaveAsName;
            $report->file_name = $fileName;
        }
        // Logic to update data

        $userId                     = Auth::user()->id;
        $report->display_order    = $request->display_order;
        $report->status           = isset($request->status) ? 1 : 0;
        $report->created_by       = $userId;
        $report->updated_by       = $userId;
        $report->save(); 

        BusinessIntelligenceReport::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$report->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);


        // Logic to update translations
        $trans_report = [
            'en' => [
                "description"       => $request->description_in_english,
                "title"             => $request->title_in_english,
                "period"            => $request->period_in_english
            ],
            'fr' => [
                "description"       => $request->description_in_french,
                "title"             => $request->title_in_french,
                "period"            => $request->period_in_french
            ],
            'ar' => [
                "description"       => $request->description_in_arabic,
                "title"             => $request->title_in_arabic,
                "period"            => $request->period_in_arabic
            ],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            BusinessIntelligenceReportTranslate::where(
                [
                    [
                        'report_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_report[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'sub-ashboard updated successfully.');
        return redirect()->route('manage-sub-dashboard.index',['id'=> $report->customer_id,'report_id' => $report->report_id]);
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
        $report = BusinessIntelligenceReport::findOrFail($request->delete);
        $report->localeAll()->delete();
        $report->delete();
        
        return redirect()->back()->with('success', 'Report deleted successfully.');
    }
}
