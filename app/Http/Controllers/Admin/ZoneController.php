<?php

namespace App\Http\Controllers\Admin;
use App\Models\Zone,
    App\Models\ZoneTranslate,
    App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use DB;

class ZoneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:zone-list');
        $this->middleware('permission:zone-create', ['only' => ['create','store']]);
        $this->middleware('permission:zone-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:zone-delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $zones = Zone::with('localeAll');
             return Datatables::of($zones)
                    ->addIndexColumn()
                    ->addColumn('name', function($zones){
                        foreach($zones->localeAll as $zones_data) {
                            if($zones_data->locale == "en") {
                                $zones_name = $zones_data->name;
                            }
                        }
                        return $zones_name;
                    })
                    ->addColumn('action', function($zones){
                        if (\Auth::user()->can('zone-edit')) { 
                            $editBtn = '<a href="' . route('manage-zone.edit', [$zones->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('zone-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-zone.destroy', [$zones->id]) . '" rel="tooltip" title="Delete" class="delete_zone_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($zones){
                         if($zones->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($zones) {
                        return [
                           'display' => e($zones->created_at->format('m/d/Y')),
                           'timestamp' => $zones->created_at->timestamp
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
         return view('admin.zone.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $defaultDisplayOrder = Zone::max('id');
        $defaultDisplayOrder++;
        return view('admin.zone.create', compact('defaultDisplayOrder'));
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
            'zone_name_in_english'    => 'required',
            'zone_name_in_arabic'     => 'required',
            'zone_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);


        $zone_data = [
            [  'zone_name' => $request->zone_name_in_english,
                'locale'      => "en"
            ],
            [  'zone_name' => $request->zone_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'zone_name' => $request->zone_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $zone = new Zone();
        $zone->display_order = $request->display_order;
        $zone->status = isset($request->status)?1:0;
        $zone->created_by = Auth::user()->id;
        $zone->updated_by = Auth::user()->id;
        $result = $zone->save(); 

        Zone::where('display_order','>=',$request->display_order)
                ->where('id','!=',$zone->id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('zones');


         foreach($zone_data as $key => $value) {
            $zone_tanslation = new ZoneTranslate();
            $zone_tanslation->name = $value['zone_name'];
            $zone_tanslation->zone_id = $zone->id;
            $zone_tanslation->locale = $value['locale'];
            $zone_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-zone')->with('success', 'Zone added succsessfully.');
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
        $zone = Zone::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($zone->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $zone->zone_name_in_english = $translate->name ;
                    break;
                case 'fr':
                    $zone->zone_name_in_french = $translate->name ;
                    break;
                case 'ar':
                    $zone->zone_name_in_arabic = $translate->name ;
                    break;
            }
        }
        $defaultDisplayOrder = $id;
        $defaultDisplayOrder++;
        return view('admin.zone.edit', compact('zone', 'defaultDisplayOrder'));
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
            'zone_name_in_english'    => 'required',
            'zone_name_in_arabic'     => 'required',
            'zone_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);

        $zone = Zone::findOrFail($id);
        $zone->display_order = $request->display_order;
        $zone->status = isset($request->status)?1:0;
        $zone->created_by = Auth::user()->id;
        $zone->updated_by = Auth::user()->id;
        $result = $zone->Update();

        Zone::where('display_order','>=',$request->display_order)
            ->where('id','!=',$zone->id)
            ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('zones');
        


        $trans_zones = [
            'en' => [
                "name"  => $request->zone_name_in_english,
            ],
            'fr' => [
                "name"  => $request->zone_name_in_french,
            ],
            'ar' => [
                "name"  => $request->zone_name_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            ZoneTranslate::where(
                [
                    [
                        'zone_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_zones[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-zone')->with('success', 'Zone updated successfully.');
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
        $zone= Zone::with('localeAll')->find($id);
        $zone->localeAll()->delete();
        $zone->delete();
        $request->session()->flash('success', 'Zone deleted successfully.');
        return redirect()->route('manage-zone.index');
    }
}
