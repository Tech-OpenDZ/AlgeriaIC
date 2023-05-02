<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tender,
    App\Models\TenderTranslate;
use App\Services\Slug;
use Auth;
use LaravelLocalization;
use DataTables;
use Carbon\Carbon;
use DB;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        function __construct()
        {
            $this->middleware('permission:tender-list');
            $this->middleware('permission:tender-create', ['only' => ['create','store']]);
            $this->middleware('permission:tender-edit', ['only' => ['edit','update']]);
            $this->middleware('permission:tender-delete', ['only' => ['destroy']]);
        } 

        if($request->ajax()){
            $tenders = Tender::with('localeAll');

             return Datatables::of($tenders)
                    ->addIndexColumn()
                    ->addColumn('publication_date', function($row){
                        return $row->publication_date;
                    })
                    ->addColumn('tender_type', function($row){
                        foreach($row->localeAll as $row_data) {
                            if($row_data->locale == "en") {
                                $row_tender_type = $row_data->tender_type;
                            }
                        return $row_tender_type ?? $row_data->tender_type;
                        }
                    })
                    ->addColumn('tendering_sector', function($row){
                        foreach($row->localeAll as $row_data) {
                            if($row_data->locale == "en") {
                                $row_sector = $row_data->tendering_sector;
                            }
                        return $row_sector ?? $row_data->tendering_sector;
                        }
                    })
                    ->addColumn('tender_detail', function($row){
                        $row_detail = "";
                        foreach($row->localeAll as $row_data) {
                            if($row_data->locale == "en") {
                                $row_detail = $row_data->tender_detail;
                            }
                        return str_limit($row_detail , 165, '....') ?? $row_data->tender_detail;
                        }
                    })
                    ->addColumn('deadline', function($row){
                        return $row->deadline;
                    })
                    ->addColumn('action', function($tenders){
                        if (\Auth::user()->can('tender-edit')) { 
                            $editBtn = '<a href="' . route('manage-tender.edit', [$tenders->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        }else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('tender-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-tender.destroy', [$tenders->id]) . '" rel="tooltip" title="Delete" class="delete_tender_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($tenders){
                         if($tenders->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($tenders) {
                        return [
                           'display' => e($tenders->created_at->format('m/d/Y')),
                           'timestamp' => $tenders->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('tender_type', 'LIKE', "%$search%")
                                ->orWhere('tendering_sector', 'LIKE', "%$search%")
                                ->orWhere('tender_detail', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.tender.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tender.edit');
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
            'tender_type_in_english'         => 'required',
            'tender_type_in_arabic'          => 'required',
            'tender_type_in_french'          => 'required',
            'tendering_sector_in_english'    => 'required',
            'tendering_sector_in_arabic'     => 'required',
            'tendering_sector_in_french'     => 'required',
            'tender_detail_in_english'       => 'required',
            'tender_detail_in_arabic'       => 'required',
            'tender_detail_in_french'       => 'required',
            'publication_date'              => 'required',
            'deadline'                      => 'required',
        ]
        );

        $tender_data = [
            [  'tender_type'        => $request->tender_type_in_english,
                'tendering_sector'  => $request->tendering_sector_in_english,
                'tender_detail'     => $request->tender_detail_in_english,
                'locale'            => "en"
            ],
            [  'tender_type'        => $request->tender_type_in_french,
                'tendering_sector'  => $request->tendering_sector_in_french,
                'tender_detail'     => $request->tender_detail_in_french,
                'locale'            => "fr"
            ],
            [  'tender_type'        => $request->tender_type_in_arabic,
                'tendering_sector'  => $request->tendering_sector_in_arabic,
                'tender_detail'     => $request->tender_detail_in_arabic,
                'locale'            => "ar"
            ],
            
        ];

        $tender = new Tender;
        $tender->status = isset($request->status)?1:0;
        $tender->created_by = Auth::user()->id;
        $tender->updated_by = Auth::user()->id;
        $tender->publication_date = Carbon::parse($request->publication_date);
        $tender->deadline = Carbon::parse($request->deadline);
        $res = $tender->save();

        if($res){
            foreach($tender_data as $key => $value) {
                $tender_tanslation = new TenderTranslate();
                $tender_tanslation->tender_id = $tender->id;
                $tender_tanslation->locale = $value['locale'];
                $tender_tanslation->tender_type = $value['tender_type'];
                $tender_tanslation->tendering_sector = $value['tendering_sector'];
                $tender_tanslation->tender_detail = $value['tender_detail'];
                $tender_tanslation->save();
            }

            $request->session()->flash('success', 'Tender added successfully.');
            return redirect()->route('manage-tender.index');
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
        $tender = Tender::with('localeAll')->find($id);
        return view('admin.tender.edit', compact('tender'));
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
            'tender_type_in_english'         => 'required',
            'tender_type_in_arabic'          => 'required',
            'tender_type_in_french'          => 'required',
            'tendering_sector_in_english'    => 'required',
            'tendering_sector_in_arabic'     => 'required',
            'tendering_sector_in_french'     => 'required',
            'tender_detail_in_english'       => 'required',
            'tender_detail_in_arabic'       => 'required',
            'tender_detail_in_french'       => 'required',
            'publication_date'              => 'required',
            'deadline'                      => 'required',
        ]
        );

        DB::beginTransaction();
        try {
            $tender = Tender::findOrFail($id);
            $tender->status = isset($request->status)?1:0;
            $tender->created_by = Auth::user()->id;
            $tender->updated_by = Auth::user()->id;
            $tender->publication_date = Carbon::parse($request->publication_date);
            $tender->deadline = Carbon::parse($request->deadline);
            $res = $tender->save();

            if($res){
                $tender_data = [
                    'en' => [
                        'tender_type'        => $request->tender_type_in_english,
                        'tendering_sector'  => $request->tendering_sector_in_english,
                        'tender_detail'     => $request->tender_detail_in_english
                    ],
                    'fr' => [
                        'tender_type'        => $request->tender_type_in_french,
                        'tendering_sector'  => $request->tendering_sector_in_french,
                        'tender_detail'     => $request->tender_detail_in_french
                    ],
                    'ar' => [
                        'tender_type'        => $request->tender_type_in_arabic,
                        'tendering_sector'  => $request->tendering_sector_in_arabic,
                        'tender_detail'     => $request->tender_detail_in_arabic
                    ],
                ];
                foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                    TenderTranslate::where(
                        [
                            [
                                'tender_id', '=', $id
                            ],
                            [
                                'locale', '=', $localeCode
                            ]
                        ])
                        ->update($tender_data[$localeCode]);
                }
                DB::commit();
                $request->session()->flash('success', 'Tender updated successfully.');
                return redirect()->route('manage-tender.index');
            } else {
                DB::rollback();
                $request->session()->flash('success', 'Something went wrong! Please try again.');
                return redirect()->route('manage-tender.index');
            }

        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('manage-tender.index')->with('error', json_encode($e->getMessage()));
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
        $tender= Tender::with('localeAll')->find($id);
        $tender->localeAll()->delete();
        $tender->delete();
        $request->session()->flash('success', 'Tender deleted successfully.');
        return redirect()->route('manage-tender.index');
    }
}
