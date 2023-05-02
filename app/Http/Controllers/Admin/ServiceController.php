<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DataTables;
use App\Models\Service;
use LaravelLocalization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceTranslate;
use App\Http\Controllers\Controller;
use DB;

class ServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:service-list');
        $this->middleware('permission:service-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::with('localeAll');

            return Datatables::of($services)
                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search'))) {

                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            return $w->where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%");
                        });
                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->addColumn('name', function($services){

                    return $services->localeAll[0]->name;
                })
                ->addColumn('description', function($services){

                    return html_entity_decode( strip_tags($services->localeAll[0]->description) );
                })
                ->editColumn('status', function($services){
                    if($services->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($services) {
                    return [
                       'display' => e($services->created_at->format('m/d/Y')),
                       'timestamp' => $services->created_at->timestamp
                    ];
                 })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('service-edit')) {
                        $btnEdit = '<a href="' . route('manage-service.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('service-delete')) {
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-service.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::all();
        $categories = new \stdClass();

        foreach ($serviceCategories as $serviceCategory) {
            foreach ($serviceCategory->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $categories ->{$translate->category_id} = $translate->name;
                }
            }
        }

        $defaultDisplayOrder = Service::max('id');
        $defaultDisplayOrder++;

        if (!count((array)$categories)) {
            $categories ->{null} = 'No service category found';
        }
        return view('admin.service.edit',compact('categories','defaultDisplayOrder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Logic to validate form data
        $rules = [
            'name_in_english'              => 'required',
            'description_in_english'       => 'required',
            'name_in_french'               => 'required',
            'description_in_french'        => 'required',
            'name_in_arabic'               => 'required',
            'description_in_arabic'        => 'required',
            'display_order'                => 'required|numeric',
            'category_id'                  => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'name_in_english'             => 'English name',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'description_in_arabic'       => 'Arabic description',
            'category_id'                 => 'Service Category'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to insert data
        $service                = new Service;

        $userId                 = Auth::user()->id;
        $service->category_id   = $request->category_id;
        $service->display_order = $request->display_order;
        $service->status        = isset($request->status) ? 1 : 0;
        $service->created_by    = $userId;
        $service->updated_by    = $userId;

        $service->save();

        Service::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$service->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('services');

        // Logic to insert translations
        $trans_service = [
            [
                "service_id"        => $service->id,
                "name"              => $request->name_in_english,
                "description"       => $request->description_in_english,
                "locale"            => 'en'
            ],
            [
                "service_id"        => $service->id,
                "name"              => $request->name_in_french,
                "description"       => $request->description_in_french,
                "locale"            => 'fr'
            ],
            [
                "service_id"        => $service->id,
                "name"              => $request->name_in_arabic,
                "description"       => $request->description_in_arabic,
                "locale"            => 'ar'
            ],
        ];

        ServiceTranslate::insert($trans_service);
        $request->session()->flash('success', 'Service added successfully.');
        return redirect()->route('manage-service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $services = Service::locale(1);
        // dd($services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $serviceCategories = ServiceCategory::all();
        $categories = new \stdClass();
        foreach ($serviceCategories as $serviceCategory) {
            foreach ($serviceCategory->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $categories ->{$translate->category_id} = $translate->name;
                }
            }
        }

        $defaultDisplayOrder = $id;

        if (!count((array)$categories)) {
            $categories ->{null} = 'No service category found';
        }
        return view('admin.service.edit', compact('defaultDisplayOrder','categories', 'service'));
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
        // Logic to validate form data
        $rules = [
            'name_in_english'              => 'required',
            'description_in_english'       => 'required',
            'name_in_french'               => 'required',
            'description_in_french'        => 'required',
            'name_in_arabic'               => 'required',
            'description_in_arabic'        => 'required',
            'category_id'                  => 'required|numeric',
            'display_order'                => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'name_in_english'             => 'English name',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'description_in_arabic'       => 'Arabic description',
            'category_id'                 => 'Service Category'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $service =  Service::findOrFail($id);

        // Logic to update data

        $userId                 = Auth::user()->id;
        $service->category_id   = $request->category_id;
        $service->display_order = $request->display_order;
        $service->status        = isset($request->status) ? 1 : 0;
        $service->created_by    = $userId;
        $service->updated_by    = $userId;

        $service->save();

        Service::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$service->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('services');


        // Logic to update translations
        $trans_service = [
            'en' => [
                "name"              => $request->name_in_english,
                "description"       => $request->description_in_english
            ],
            'fr' => [
                "name"              => $request->name_in_french,
                "description"       => $request->description_in_french
            ],
            'ar' => [
                "name"              => $request->name_in_arabic,
                "description"       => $request->description_in_arabic
            ],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            ServiceTranslate::where(
                [
                    [
                        'service_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_service[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'Service updated successfully.');
        return redirect()->route('manage-service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->localeAll()->delete();

        $service->delete();

        $request->session()->flash('success', 'Service deleted successfully.');
        return redirect()->route('manage-service.index');
    }
}
