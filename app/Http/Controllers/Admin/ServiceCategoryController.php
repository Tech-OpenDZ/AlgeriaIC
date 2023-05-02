<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DataTables;
use LaravelLocalization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategoryTranslate;
use DB;

class ServiceCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:service-category-list');
        $this->middleware('permission:service-category-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-category-delete', ['only' => ['destroy']]);
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $serviceCategories = ServiceCategory::with('localeAll');

            return Datatables::of($serviceCategories)
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
                ->addColumn('name', function($serviceCategories){

                    return $serviceCategories->localeAll[0]->name;
                })
                ->addColumn('description', function($serviceCategories){

                    return html_entity_decode( strip_tags($serviceCategories->localeAll[0]->description) );
                })
                ->editColumn('status', function($serviceCategories){
                    if($serviceCategories->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($serviceCategories) {
                    return [
                       'display' => e($serviceCategories->created_at->format('m/d/Y')),
                       'timestamp' => $serviceCategories->created_at->timestamp
                    ];
                 })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('service-category-edit')) { 
                        $btnEdit = '<a href="' . route('manage-service-category.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    } 
                    if (\Auth::user()->can('service-category-delete')) { 
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-service-category.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.servicecategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaultDisplayOrder = ServiceCategory::max('id');
        $defaultDisplayOrder++;
        return view('admin.servicecategory.edit', compact('defaultDisplayOrder'));
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
        ];
        $messages = [];
        $attributes = [
            'name_in_english'             => 'English name',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'description_in_arabic'       => 'Arabic description'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to insert data
        $serviceCategory                = new ServiceCategory;

        $userId                         = Auth::user()->id;
        $serviceCategory->display_order = $request->display_order;
        $serviceCategory->status        = isset($request->status) ? 1 : 0;
        $serviceCategory->created_by    = $userId;
        $serviceCategory->updated_by    = $userId;

        $serviceCategory->save();

        ServiceCategory::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$serviceCategory->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('service_categories');


        // Logic to insert translations
        $trans_service_category = [
            [
                "category_id"       => $serviceCategory->id,
                "name"              => $request->name_in_english,
                "description"       => $request->description_in_english,
                "locale"            => 'en'
            ],
            [
                "category_id"       => $serviceCategory->id,
                "name"              => $request->name_in_french,
                "description"       => $request->description_in_french,
                "locale"            => 'fr'
            ],
            [
                "category_id"       => $serviceCategory->id,
                "name"              => $request->name_in_arabic,
                "description"       => $request->description_in_arabic,
                "locale"            => 'ar'
            ],
        ];

        ServiceCategoryTranslate::insert($trans_service_category);
        $request->session()->flash('success', 'Service Category added successfully.');
        return redirect()->route('manage-service-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $serviceCategories = ServiceCategory::locale(1);
        // dd($serviceCategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        $defaultDisplayOrder = $id;
        return view('admin.servicecategory.edit', compact('serviceCategory','defaultDisplayOrder'));
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
            'display_order'                => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'name_in_english'             => 'English name',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'description_in_arabic'       => 'Arabic description'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $serviceCategory =  ServiceCategory::findOrFail($id);

        // Logic to update data

        $userId                         = Auth::user()->id;
        $serviceCategory->display_order = $request->display_order;
        $serviceCategory->status        = isset($request->status) ? 1 : 0;
        $serviceCategory->created_by    = $userId;
        $serviceCategory->updated_by    = $userId;

        $serviceCategory->save();

        ServiceCategory::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$serviceCategory->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('service_categories');
        
        // Logic to update translations
        $trans_service_category = [
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

            ServiceCategoryTranslate::where(
                [
                    [
                        'category_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_service_category[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'Service updated successfully.');
        return redirect()->route('manage-service-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);

        $serviceCategory->localeAll()->delete();

        $serviceCategory->delete();

        $request->session()->flash('success', 'Service Category deleted successfully.');
        return redirect()->route('manage-service-category.index');
    }
}
