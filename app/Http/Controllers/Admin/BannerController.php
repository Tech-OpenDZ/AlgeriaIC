<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;
use Auth;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\BannerTranslate;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use LaravelLocalization;


class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:banner-list');
        $this->middleware('permission:banner-create', ['only' => ['create','store']]);
        $this->middleware('permission:banner-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){

        if($request->ajax()){
           $banners = Banner::select('*');
           return Datatables::of($banners)
                    ->addColumn('action', function($row){
                        if (\Auth::user()->can('banner-edit')) { 
                            $btn = '<a href="' . route('manage-banner.edit', [$row->id]) . '" class="btn btn-primary">Manage Banner</a>';
                        } else {
                            $btn = '';
                        }
                        return $btn;
                    })
                    ->editColumn('created_at', function ($row) {
                        return [
                           'display' => e($row->created_at->format('m/d/Y')),
                           'timestamp' => $row->created_at->timestamp
                        ];
                     })
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.banner.index');
    }


    public function edit(Request $request,$id) {
    	$categoryId = $id;
        $bannerHeading = Banner::select('name')->where('id','=',$id)->get();
        $banners = BannerImage::where('banner_id','=',$id)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
    	if ($request->ajax()) {
    		$banners = BannerImage::where('banner_id','=',$id)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
            return Datatables::of($banners)
                    ->addColumn('banner_img', function($banners){
                        $url= asset('storage/uploads/banner/'.$banners->banner_img);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" title=""/>';
                    })
                    ->editColumn('status', function($banners){
                         if($banners->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                    ->addColumn('action', function($row){
                        if (\Auth::user()->can('banner-edit')) {  

                            $editBtn = '<a href="' . route('edit-banner', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp'; 

                            
                            // $editBtn = '<a href="javascript:void(0)" title="edit" data-id="'.$row->id.'" class="editbanner"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';

                        } else {
                            $editBtn = '';
                        }

                        if (\Auth::user()->can('banner-delete')) {
                            $btn = '<a href="javascript:void(0)" rel="tooltip" title="Delete" class="delete_admin_btn" data-id="'.$row->id.'" data-href="' . route('manage-banner.destroy', [$row->id]) . '"  aria-hidden="true" data-modal="modal"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } else {
                            $btn = '';
                        }
                        return $editBtn.$btn;
                    })
                    ->rawColumns(['banner_img','status','action'])
                    ->make(true);
        }
    	return view('admin.banner.edit',compact('categoryId','banners','bannerHeading'));
    }


    public function create(Request $request){
        $categoryId = $request['cat_id'];
        $display_order = BannerImage::max('display_order');
        if($display_order ==0){
             $display_order = 1;
        }
        else{
            $display_order++;
        }           
        // echo "<pre>";print_r($display_order);exit();
    	return view('admin.banner.create',compact('categoryId','display_order'));
    }



    public function store(Request $request){
        $data = $request->all();
        $validation = \Validator::make($request->all(),
        [ 
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=750,max_height=254,min_width=750,min-height=254,',
          'display_order' =>'required|numeric',
          'header_in_english' => 'nullable|max:54',
          'header_in_arabic' => 'nullable|max:54',
          'header_in_french' => 'nullable|max:54',
          'content_in_english' => 'nullable|max:191',
          'content_in_arabic' => 'nullable|max:191',
          'content_in_french' => 'nullable|max:191'
        ]);

        $banner_data = [
            [  'header_text' => $request->header_in_english,
               'content' =>     $request->content_in_english,
               'locale'      => "en"
            ],
            [  'header_text' => $request->header_in_arabic,
               'content' =>     $request->content_in_arabic,
                'locale'      => "ar"
            ],
            [  'header_text' => $request->header_in_french,
               'content' => $request->content_in_french,
               'locale'  => "fr"
            ],
        ];
        // echo "<pre>";print_r($banner_data);exit();

        if ($validation->passes())
        {
            $banner = new BannerImage();
            if ($request->hasFile('image')){
                $bannerImage = $request->file('image');
                $bannerImageSaveAsName = time() . "_banner." . $bannerImage->getClientOriginalExtension();
                $upload_path = storage_path('app/public/uploads/banner/');
                $banner_image_url = $bannerImageSaveAsName;
                if($request->logo){
                    if(file_exists($upload_path.$request->image)) {
                        unlink($upload_path.$request->image);
                    }
                }
                $success = $bannerImage->move($upload_path, $bannerImageSaveAsName);
                $banner->banner_img = $bannerImageSaveAsName;
            }
            $user_id = Auth::user()->id;
            $banner->status = 1;
            $banner->link = $request->link;
            $banner->display_order = $request->display_order;
            $banner->banner_id = $request->category;
            $banner->created_by = $user_id;
            $banner->updated_by = $user_id;
            $result = $banner->save(); 

            BannerImage::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$banner->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

            setDisplayOrder('banner_images');

            foreach($banner_data as $key => $value) {
                if($value['header_text'] !="" || $value['content'] !="" ){
                    $banner_tanslation = new BannerTranslate();
                    $banner_tanslation->header_text = $value['header_text'];
                    $banner_tanslation->content = $value['content'];
                    $banner_tanslation->banner_image_id = $banner->id;
                    $banner_tanslation->locale = $value['locale'];
                    $banner_tanslation->save(); 
                }
            }

            if($result) {
                // return Redirect::back()->with('success','Banners added succsessfully.!');
                // return redirect('admin/manage-banner')->with('success', 'Banner added succsessfully.');
                return response()->json(['success'=>'Banners added successfully.']);
            }
        }
        else{
            return response()->json(['errors'=>$validation->getMessageBag()->toArray()]);

        }
    }

    public function editBanner($id) {
        $banners = BannerTranslate::where('banner_image_id','=',$id)->get();
        
        $bannerImage = BannerImage::where('id','=',$id)->first();
        foreach ($banners as  $banner) {
            switch ($banner->locale) {
                case 'en':
                    $banners->header_in_english = $banner->header_text;
                    $banners->content_in_english = $banner->content;
                    break;
                case 'fr':
                    $banners->header_in_french = $banner->header_text;
                    $banners->content_in_french = $banner->content;
                    break;
                case 'ar':
                    $banners->header_in_arabic = $banner->header_text;
                    $banners->content_in_arabic = $banner->content;
                    break;
            }
        }
        
        return  view('admin.banner.edit_banner',compact('banners','bannerImage'));
        // return response()->json(['html'=>$view]);
    }

    public function updateBanner(Request $request,$id) 
    {
        
        $request->validate([
            'image' => 'image|dimensions:max_width=728,max_height=90,min_width=728,min-height=90,',
            'display_order' =>'required|numeric',
            'header_in_english' => 'nullable|max:54',
            'header_in_arabic' => 'nullable|max:54',
            'header_in_french' => 'nullable|max:54',
            'content_in_english' => 'nullable|max:191',
            'content_in_arabic' => 'nullable|max:191',
            'content_in_french' => 'nullable|max:191'
        ]);

        $banner = BannerImage::findOrFail($id);
        if ($request->hasFile('image')){
            $bannerImage = $request->file('image');
            $bannerImageSaveAsName = time() . "_banner." . $bannerImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/banner/');
            $banner_image_url = $bannerImageSaveAsName;
            if($request->image){
                if(file_exists($upload_path.$request->image)) {
                    unlink($upload_path.$request->image);
                }
            }
            $success = $bannerImage->move($upload_path, $bannerImageSaveAsName);
            $banner->banner_img = $bannerImageSaveAsName;
        }
        /**
         * Code to update record in banner tables
        */
        $user_id = Auth::user()->id;
        $banner->status = isset($request->status)?1:0;
        $banner->display_order = isset($request->display_order) ? $request->display_order : 1;
        $banner->created_by = $user_id;
        $banner->updated_by = $user_id;
        $result = $banner->update();

        $categoryId = $banner->banner_id; 
        $banners = BannerImage::where('banner_id',$categoryId)->get();
        $bannerHeading ="test";

        $banner_info = [
            'en' => [
                "header_text"  => $request->header_in_english,
                "content"      => $request->content_in_english
            ],
            'ar' => [
                "header_text"  => $request->header_in_arabic,
                "content"      => $request->content_in_arabic
            ],
            'fr' => [
                "header_text"  => $request->header_in_french,
                "content"      => $request->content_in_french
            ]
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            BannerTranslate::where(
                [
                    [
                        'banner_image_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                    
                ])
                ->update($banner_info[$localeCode]);
        }
        if($result) {
            return view('admin.banner.edit',compact('categoryId','banners','bannerHeading'))->with('success','Banner updated successfully.');
        } 
    
    }

    public function Bannerdisplay($id){
        $categories = BannerImage::where('banner_id',$id)->where('status',1)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
       return view('admin.banner.banner',compact('categories'));
    }

    public function destroy(Request $request,$id)
    {
        $id = $request['delete'];
        $banner = BannerImage::find($id);
        if(file_exists('storage/uploads/banner/'.$banner->banner_img)){
            unlink('storage/uploads/banner/'.$banner->banner_img);
        }
        $banner->delete(); 
        return Redirect::back()->with('success','Banners Deleted succsessfully.!');
    }
    public function delete($id){
        $delete_id = $id;
        return view('admin.banner.action',compact('delete_id'));
    }
}
