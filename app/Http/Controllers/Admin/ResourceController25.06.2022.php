<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resource,
    App\Models\ResourceTranslate,
    App\Models\ResourceImage;
use App\Services\Slug;

use Auth;
use LaravelLocalization;
use DataTables;
use DB;
use Session;
use URL;

class ResourceController extends Controller
{

    protected $slug;
    protected $display_order;

    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:business-environment-list');
        $this->middleware('permission:business-environment-create', ['only' => ['create','store']]);
        $this->middleware('permission:business-environment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:business-environment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $resource = Resource::with('localeAll')
                       ->where('parent_id',0);
             return Datatables::of($resource)
                    ->addIndexColumn()
                    ->addColumn('title', function($resource){
                        foreach($resource->localeAll as $resource_data) {
                            if($resource_data->locale == "en") {
                                $resource_title = $resource_data->title;
                            }
                        return $resource_title ?? $resource_data->title;
                        }
                    })
                    ->addColumn('action', function($resource){
                        if (\Auth::user()->can('business-environment-edit')) { 
                            $editBtn ='<a href="' . route('manage-business-environment.edit', [$resource->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        }
                        else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('business-environment-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-business-environment.destroy', [$resource->id]) . '" rel="tooltip" title="Delete" class="delete_resource_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>&nbsp';
                        } else {
                            $deleteBtn = '';

                        }
                        if (\Auth::user()->can('business-environment-create')) {
                            $btn = '<a href="' . route('business-environment-index',['id' =>$resource->id,'level'=>1]) . '" data-id="'.$resource->parent_id.'" title="manage content" class="resource_btn"><i class="fas fa-bars" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $btn = '';
                        }
                        return $editBtn.$deleteBtn.$btn;
                     })
                     ->editColumn('status', function($resource){
                         if($resource->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($resource) {
                        return [
                           'display' => e($resource->created_at->format('m/d/Y')),
                           'timestamp' => $resource->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('title', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.resources.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function indexContent(Request $request)
    {
        Session::put('parent_id', $request->id);
        $parent = Resource::select('parent_id')->where('id',$request->id)->first();
        
        $parent =$parent->parent_id;
        if($request->ajax()){
            $resource = Resource::with('localeAll')
                        ->where('parent_id',$request->get('id'));
            
             return Datatables::of($resource)
                    ->addIndexColumn()
                    ->addColumn('title', function($resource){
                        foreach($resource->localeAll as $resource_data) {
                            if($resource_data->locale == "en") {
                                $resource_title = $resource_data->title;
                            }
                        return $resource_title ?? $resource_data->title;
                        }
                    })
                    ->addColumn('action', function($resource) use ($request){
                        if (\Auth::user()->can('business-environment-edit')) { 
                            $editBtn ='<a href="' . route('manage-business-environment.edit', [$resource->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        }
                        else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('business-environment-delete')) { 
                           
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-business-environment.destroy', [$resource->id]) . '" rel="tooltip" title="Delete" class="delete_resource_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>&nbsp';
                        } else {
                            $deleteBtn = '';

                        }
                        if (\Auth::user()->can('business-environment-create')) {
                            if($request->get('level') != 2)
                            $btn = '<a href="' . route('business-environment-index',['id' =>$resource->id,'level'=>2]) . '" data-id="'.$resource->parent_id.'" title="manage content" class="resource_btn"><i class="fas fa-bars" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                            else 
                            $btn = '';
                        } else {
                            $btn = '';
                        }
                        return $editBtn.$deleteBtn.$btn;
                     })
                     ->editColumn('status', function($resource){
                         if($resource->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($resource) {
                        return [
                           'display' => e($resource->created_at->format('m/d/Y')),
                           'timestamp' => $resource->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('title', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.resources.index_subcontent',compact('parent'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $resource = Resource::with('localeAll')->get();
        // dd($resources);
        $parent_id = new \stdClass();
        if($resource->isEmpty()){
            $resource->is_page = 1;
            $resource->page_type = 1;
        }
        $parent_id->{null} = "No parent page";
        foreach ($resource as $resource_data) {

            foreach ($resource_data->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $parent_id->{$translate->resource_id} = $translate->title;
                }
            }
        }
        $level = 1;
        $display_order = Resource::where('parent_id',$request->id)->count('id');
        $display_order++;
        return view('admin.resources.create',compact('display_order','parent_id','resource','level'));
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
        $rules = [
            'title_in_english'     => 'required',
            'title_in_arabic'      => 'required',
            'title_in_french'      => 'required',
            'display_order'        => 'required',
            'link'                 => 'nullable|url',
         
        ]; 
        $customMessages = [
            'link.url'  => 'The page link is invalid, please enter the URL.',
        ];
        $this->validate($request, $rules, $customMessages);


        $this->display_order = Resource::count('id');
        
        if($request->display_order > $this->display_order+1) { 

            return redirect()->back()->with(['error'=> 'true']);
        }

        $resource_data  = [
            [
               'title'              => $request->title_in_english,
               'description'        => $request->description_in_english,
               'short_description'  => $request->short_description_in_english,
               'locale'             => "en"
            ],
            [
               'title'              => $request->title_in_arabic,
               'description'        => $request->description_in_arabic,
               'short_description'  => $request->short_description_in_arabic,
               'locale'             => "ar"
            ],
            [
                'title'              => $request->title_in_french,
                'description'        => $request->description_in_french,
                'short_description'  => $request->short_description_in_french,
                'locale'             => "fr"
            ],
        ];
       
        $resource = new Resource();
        $resource->parent_id = $request->parent_id;
        $resource->page_key  = $this->slug->createSlug('resources',$request->title_in_english,$request->parent_page_id);
        $resource->display_order = $request->display_order;
        $resource->status = isset($request->status)?1:0;
     

     
        $resource->created_by = Auth::user()->id;
        $resource->updated_by = Auth::user()->id;
        $result = $resource->save(); 


       
        if($request->resource_image != []){

            foreach($request->resource_image as $resource_image) {

                $resource_images = new ResourceImage();

                if ($request->hasFile('resource_image')) {

                    $resourceImage              = $resource_image;
                    $resourceImageSaveAsName    = rand(). "_resource_image." . $resource_image->getClientOriginalExtension();
                    $upload_path                = storage_path('app/public/uploads/business_environnement/');
                    $success                    = $resourceImage->move($upload_path, $resourceImageSaveAsName);
                    $resource_images->image     = $resourceImageSaveAsName;
                }
               
                $resource_images->resource_id           = $resource->id;
                $resource_images->display_order         =  $resource->id;

                $resource_images->save();
            }
        }



        Resource::where('display_order','>=',$request->display_order)
                    ->where('display_order','<=',$this->display_order+1)
                    ->where('id','!=',$resource->id)
                    ->where('parent_id',$request->parent_id)
                    ->update(['display_order' => DB::raw('display_order + 1')]);

       
        DB::statement("SET @r=0");
        $query = 'UPDATE resources AS t1
        INNER JOIN (
        SELECT id,@r:= (@r+1) AS rn
        FROM resources
        WHERE (deleted_at IS NULL) AND (parent_id ='.$request->parent_id.')
        ORDER BY display_order ASC 
        ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE (deleted_at IS NULL) AND (parent_id ='.$request->parent_id.')';

        DB::statement($query);

        foreach($resource_data as $key => $value) {
            $resource_tanslation = new ResourceTranslate();
            $resource_tanslation->title = $value['title'];
            $resource_tanslation->description = $value['description'];
            $resource_tanslation->short_description = $value['short_description'];
            $resource_tanslation->resource_id = $resource->id;
            $resource_tanslation->locale = $value['locale'];
            $resource_tanslation->save();
        }



      

        if($result) {
            if($request->parent_id == 0) 
                return redirect('admin/manage-business-environment')->with('success', 'Business Environment page added succsessfully.');
            else 
                return redirect()->route('business-environment-index',['id'=> $request->parent_id,'level'=>$request->level])->with('success', 'Business Environment page added succsessfully.');
            
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request,$id)
    {
        Session::put('previous_url',URL::previous());
        $level = substr(URL::previous(),-1);
        
        $resource = Resource::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($resource->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $resource->title_in_english = $translate->title;
                    $resource->description_in_english = $translate->description;
                    $resource->short_description_in_english = $translate->short_description;
                   
                    break;
                case 'fr':
                    $resource->title_in_french = $translate->title;
                    $resource->description_in_french = $translate->description;
                    $resource->short_description_in_french = $translate->short_description;
                    break;
                case 'ar':
                    $resource->title_in_arabic = $translate->title;
                    $resource->description_in_arabic = $translate->description;
                    $resource->short_description_in_arabic = $translate->short_description;
                    break;
            }
        }
        $resources = Resource::with('localeAll')->get();

        
        $resource = Resource::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/business_environnement/'.$id.'/logo/');
            $logo_image_url = $logoImageSaveAsName;
            if ($resource->logo) {
                try {
                    unlink($upload_path . $resource->logo);
                } catch (\Throwable $th) {

                }
            }
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            $resource->logo = $logoImageSaveAsName;
        }

        $parent_id = new \stdClass();

        $parent_id->{null} = "No parent page";
        foreach ($resources as $resource_data) {

            foreach ($resource_data->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $parent_id->{$translate->resource_id} = $translate->title;
                }
            }
        }
        $defaultDisplayOrder = $id;
        $defaultDisplayOrder++;
        return view('admin.resources.edit', compact('level','resource','parent_id','defaultDisplayOrder'));
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
       
        $url = Session::get('previous_url');
        $rules = [
            'title_in_english'     => 'required',
            'title_in_arabic'      => 'required',
            'title_in_french'      => 'required',
            'display_order'        => 'required',
            'link'                 => 'nullable|url',
        ]; 
        $customMessages = [
            'link.url'  => 'The page link is invalid, please enter the URL.',
        ];
        $this->validate($request, $rules, $customMessages);

        $this->display_order = Resource::count('id');

        if($request->display_order >= $this->display_order+1) {
            return redirect()->back()->with(['error'=> 'true']);
        }
       
        $resource = Resource::findOrFail($id);
        $resource->parent_id = $request->parent_id;       
        if($request->englishTitle != $request->title_in_english){

            $resource->page_key      = $this->slug->createSlug('resources',$request->title_in_english);
        }
        $resource->display_order = $request->display_order;
        $resource->status = isset($request->status)?1:0;
      
        $resource->created_by = Auth::user()->id;
        $resource->updated_by = Auth::user()->id;
        $result = $resource->Update();

        Resource::where('display_order','>=',$request->display_order)
                ->where('display_order','<=',$this->display_order+1)
                ->where('id','!=',$resource->id)
                ->where('parent_id',$request->parent_id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        DB::statement("SET @r=0");
        $query = 'UPDATE resources AS t1
        INNER JOIN (
        SELECT id,@r:= (@r+1) AS rn
        FROM resources
        WHERE (deleted_at IS NULL) AND (parent_id ='.$request->parent_id.')
        ORDER BY display_order ASC 
        ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE (deleted_at IS NULL) AND (parent_id ='.$request->parent_id.')';

        DB::statement($query);
        
        $trans_resource = [
            'en' => [
                "title"                   => $request->title_in_english,
                "description"             => $request->description_in_english,
                "short_description"       => $request->short_description_in_english,

            ],
            'fr' => [
                "title"                   =>$request->title_in_french,
                "description"             =>$request->description_in_french,
                "short_description"       =>$request->short_description_in_french,
            ],
            'ar' => [
                "title"              => $request->title_in_arabic,
                "description"        => $request->description_in_arabic,
                "short_description"  => $request->short_description_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            ResourceTranslate::where(
                [
                    [
                        'resource_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_resource[$localeCode]);
        }

        $resource = Resource::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/business_environnement/'.$id.'/logo/');
            $logo_image_url = $logoImageSaveAsName;
            if ($resource->logo) {
                try {
                    unlink($upload_path . $resource->logo);
                } catch (\Throwable $th) {

                }
            }
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            $resource->logo = $logoImageSaveAsName;
        }
        if($result) {
            if($request->parent_id == 0) 
                return redirect('admin/manage-business-environment')->with('success', 'Business Environment page updated succsessfully.');
            else 
            return redirect($url)->with('success', 'Business Environment page updated succsessfully.');
                // return redirect()->back()->with('success', 'Business Environment page updated succsessfully.');
            
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
        $resource= Resource::with('localeAll')->find($id);
        if ($request->type == "logo") {
            $resource = Resource::findOrFail($request->resource_id);
            try {
                unlink('storage/uploads/business_environnement/' . $boDocument->resource_id . '/documents/' . $boDocument->document);
            } catch (\Throwable $th) {

            }
            $resource->reference_no_of_opportunity = $request->reference_no_of_resource;
            $result = $resource->update();
            $boDocument->delete();
        $resource->localeAll()->delete();
        $resource->delete();
        $request->session()->flash('success', 'Business Environment page deleted successfully.');
        return redirect()->back();
    }

}
}



