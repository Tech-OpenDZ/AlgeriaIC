<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsPage;
use App\Models\CmsPageTranslate;
use Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use App\Services\Slug;
use DB;

class ContentController extends Controller
{

    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:page-content-list');
        $this->middleware('permission:page-content-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-content-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-content-delete', ['only' => ['destroy']]); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cms_pages = CmsPage::with('localeAll');

            return Datatables::of($cms_pages)
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {

                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            return $w->where('title', 'LIKE', "%$search%")
                            ->orWhere('content', 'LIKE', "%$search%");
                        });
                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->addColumn('title', function($cms_pages){

                    return $cms_pages->localeAll[0]->title;
                })
                ->editColumn('created_at', function ($cms_pages) {
                    return [
                       'display' => e($cms_pages->created_at->format('m/d/Y')),
                       'timestamp' => $cms_pages->created_at->timestamp
                    ];
                 })
                ->addColumn('content', function($cms_pages){

                    return html_entity_decode( strip_tags($cms_pages->localeAll[0]->content) );
                })
                ->editColumn('status', function($cms_pages){
                    if($cms_pages->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('page-content-edit')){
                        $btnEdit = '<a href="' . route('manage-content.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('page-content-delete')){
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-content.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaultDisplayOrder = CmsPage::max('id');
        $defaultDisplayOrder++;
        return view('admin.content.edit',compact('defaultDisplayOrder'));
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
            'content_in_english'       => 'required',
            'title_in_english'         => 'required',
            'content_in_french'        => 'required',
            'title_in_french'          => 'required',
            'content_in_arabic'        => 'required',
            'title_in_arabic'          => 'required',
            'display_order'            => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'title_in_english'        => 'English title',
            'content_in_english'      => 'English content',
            'title_in_french'         => 'French title',
            'content_in_french'       => 'French content',
            'title_in_arabic'         => 'Arabic title',
            'content_in_arabic'       => 'Arabic content'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to insert data
        $cms_page                = new CmsPage;
        $userId                  = Auth::user()->id;
        if($request->englishTitle != $request->title_in_english){

            $cms_page->page_key      = $this->slug->createSlug('cms_pages',$request->title_in_english);
        }
        $cms_page->display_order = $request->display_order;
        $cms_page->status        = isset($request->status) ? 1 : 0;
        $cms_page->created_by    = $userId;
        $cms_page->updated_by    = $userId;

        $cms_page->save();

        CmsPage::where('display_order','>=',$request->display_order)
                ->where('id','!=',$cms_page->id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('cms_pages');
        

        // Logic to insert translations
        $trans_cms_page = [
            [
                "cms_page_id"       => $cms_page->id,
                "title"             => $request->title_in_english,
                "content"           => $request->content_in_english,
                "locale"            => 'en'
            ],
            [
                "cms_page_id"       => $cms_page->id,
                "title"             => $request->title_in_french,
                "content"           => $request->content_in_french,
                "locale"            => 'fr'
            ],
            [
                "cms_page_id"       => $cms_page->id,
                "title"             => $request->title_in_arabic,
                "content"           => $request->content_in_arabic,
                "locale"            => 'ar'
            ],
        ];

        CmsPageTranslate::insert($trans_cms_page);
        $request->session()->flash('success', 'Content added successfully.');
        return redirect()->route('manage-content.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cms_page = CmsPage::findOrFail($id);
        $defaultDisplayOrder = $id;
        return view('admin.content.edit',compact('cms_page','defaultDisplayOrder'));
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
            'content_in_english'       => 'required',
            'title_in_english'         => 'required',
            'content_in_french'        => 'required',
            'title_in_french'          => 'required',
            'content_in_arabic'        => 'required',
            'title_in_arabic'          => 'required',
            'display_order'            => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'title_in_english'        => 'English title',
            'content_in_english'      => 'English content',
            'title_in_french'         => 'French title',
            'content_in_french'       => 'French content',
            'title_in_arabic'         => 'Arabic title',
            'content_in_arabic'       => 'Arabic content'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $cms_page =  CmsPage::findOrFail($id);
       

        // Logic to update data

        $userId                  = Auth::user()->id;
        if($request->englishTitle != $request->title_in_english){

            $cms_page->page_key      = $this->slug->createSlug('cms_pages',$request->title_in_english);
        }
        $cms_page->display_order = $request->display_order;
        $cms_page->status        = isset($request->status) ? 1 : 0;
        $cms_page->created_by    = $userId;
        $cms_page->updated_by    = $userId;

        $cms_page->save();

        CmsPage::where('display_order','>=',$request->display_order)
                ->where('id','!=',$cms_page->id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('cms_pages');
        

        // Logic to update translations
        $trans_cms_page = [
            'en' => [
                "title"             => $request->title_in_english,
                "content"           => $request->content_in_english
            ],
            'fr' => [
                "title"             => $request->title_in_french,
                "content"           => $request->content_in_french
            ],
            'ar' => [
                "title"             => $request->title_in_arabic,
                "content"           => $request->content_in_arabic
            ],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            CmsPageTranslate::where(
                [
                    [
                        'cms_page_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_cms_page[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'Content updated successfully.');
        return redirect()->route('manage-content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cms_page = CmsPage::findOrFail($id);

        $cms_page->localeAll()->delete();

        $cms_page->delete();

        $request->session()->flash('success', 'Content deleted successfully.');
        return redirect()->route('manage-content.index');
    }
}
