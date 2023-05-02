<?php

namespace App\Http\Controllers\Admin;
use App\Models\Sector,
    App\Models\SectorTranslate,
    App\User;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use App\Services\Slug;
use DB;


class SectorController extends Controller
{
    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:sector-list');
        $this->middleware('permission:sector-create', ['only' => ['create','store']]);
        $this->middleware('permission:sector-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sector-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $sectors = Sector::with('localeAll');
             return Datatables::of($sectors)
                    ->addIndexColumn()
                    ->addColumn('name', function($sectors){
                        foreach($sectors->localeAll as $sectors_data) {
                            if($sectors_data->locale == "en") {
                                $sectors_name = $sectors_data->name;
                            }
                        }
                        return $sectors_name;
                    })
                    ->addColumn('action', function($sectors){
                        if (\Auth::user()->can('sector-edit')) { 
                            $editBtn = '<a href="' . route('manage-sector.edit', [$sectors->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('sector-delete')) { 

                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-sector.destroy', [$sectors->id]) . '" rel="tooltip" title="Delete" class="delete_sector_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($sectors){
                         if($sectors->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($sectors) {
                        return [
                           'display' => e($sectors->created_at->format('m/d/Y')),
                           'timestamp' => $sectors->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('name', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.sector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $defaultDisplayOrder = Sector::max('id');
        $defaultDisplayOrder++;
        return view('admin.sector.create', compact('defaultDisplayOrder'));
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
            'sector_name_in_english'    => 'required',
            'sector_name_in_arabic'     => 'required',
            'sector_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);


        $sector_data = [
            [  'sector_name' => $request->sector_name_in_english,
                'locale'      => "en"
            ],
            [  'sector_name' => $request->sector_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'sector_name' => $request->sector_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $sector = new Sector();
        $sector->display_order = $request->display_order;
        $sector->status = isset($request->status)?1:0;
        $sector->created_by = Auth::user()->id;
        $sector->updated_by = Auth::user()->id;
        $sector->page_key         = $this->slug->createSlug('sector', $request->sector_name_in_english);
        $result = $sector->save(); 

        Sector::where('display_order','>=',$request->display_order)
                ->where('id','!=',$sector->id)
                ->update(['display_order' => DB::raw('display_order + 1')]); 

        setDisplayOrder('sectors');


         foreach($sector_data as $key => $value) {
            $sector_tanslation = new SectorTranslate();
            $sector_tanslation->name = $value['sector_name'];
            $sector_tanslation->sector_id = $sector->id;
            $sector_tanslation->locale = $value['locale'];
            $sector_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-sector')->with('success', 'Sector added succsessfully.');
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
        $sector = Sector::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($sector->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $sector->sector_name_in_english = $translate->name ;
                    break;
                case 'fr':
                    $sector->sector_name_in_french = $translate->name ;
                    break;
                case 'ar':
                    $sector->sector_name_in_arabic = $translate->name ;
                    break;
            }
        }
        $defaultDisplayOrder = $id;
        $defaultDisplayOrder++;
        return view('admin.sector.edit', compact('sector', 'defaultDisplayOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'sector_name_in_english'    => 'required',
            'sector_name_in_arabic'     => 'required',
            'sector_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);

        $sector = Sector::findOrFail($id);
        $sector->display_order = $request->display_order;
        $sector->status = isset($request->status)?1:0;
        $sector->created_by = Auth::user()->id;
        $sector->updated_by = Auth::user()->id;
        if($request->englishTitle != $request->sector_name_in_english){

            $sector->page_key = $this->slug->createSlug('sector', $request->sector_name_in_english);
        }
    
        $result = $sector->Update(); 
        Sector::where('display_order','>=',$request->display_order)
                ->where('id','!=',$sector->id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('sectors');


        $trans_sectors = [
            'en' => [
                "name"  => $request->sector_name_in_english,
            ],
            'fr' => [
                "name"  => $request->sector_name_in_french,
            ],
            'ar' => [
                "name"  => $request->sector_name_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            SectorTranslate::where(
                [
                    [
                        'sector_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_sectors[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-sector')->with('success', 'Sector updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request,$id)
    {
        $sector= Sector::with('localeAll')->find($id);
        $sector->localeAll()->delete();
        $sector->delete();
        $request->session()->flash('success', 'Sector deleted successfully.');
        return redirect()->route('manage-sector.index');
    }
}
