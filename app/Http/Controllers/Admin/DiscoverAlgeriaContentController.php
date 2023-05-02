<?php

namespace App\Http\Controllers\Admin;
use App\Models\DiscoverAlgeriaContent,
    App\Models\DiscoverAlgeriaContentTranslate,
    App\Models\DiscoverAlgeriaSubcontent,
    App\Models\DiscoverAlgeriaSubcontentTranslate,
    App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Slug;
use LaravelLocalization;
use DataTables;
use DB;

class DiscoverAlgeriaContentController extends Controller
{
    protected $slug;
    protected $display_order;

    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:discover-algeria-list');
        $this->middleware('permission:discover-algeria-create', ['only' => ['create','store']]);
        $this->middleware('permission:discover-algeria-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:discover-algeria-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $algeria_contents = DiscoverAlgeriaContent::with('localeAll');
             return Datatables::of($algeria_contents)
                    ->addIndexColumn()
                    ->addColumn('title', function($algeria_contents){
                        foreach($algeria_contents->localeAll as $algeria_contents_data) {
                            if($algeria_contents_data->locale == "en") {
                                $title = $algeria_contents_data->title;
                            }
                        }
                        return $title;
                    })
                    ->addColumn('action', function($algeria_contents){

                        if (\Auth::user()->can('discover-algeria-edit')) {
                            $editBtn = '<a href="' . route('manage-discover-algeria-content.edit', [$algeria_contents->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        } 

                        if (\Auth::user()->can('discover-algeria-delete')) {
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-discover-algeria-content.destroy', [$algeria_contents->id]) . '" rel="tooltip" title="Delete" class="delete_algeria_content_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>&nbsp';
                        } else {
                            $deleteBtn = '';
                        }
                        if (\Auth::user()->can('discover-algeria-subcontent-list')) {
                            $btn = '<a href="' . route('manage-algeria-subcontent.index',['id' =>$algeria_contents->id]) . '" title="manage subcontent"><i class="fas fa-bars" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $btn = '';
                        }
                        return $editBtn.$deleteBtn.$btn;
                     })
                     ->editColumn('status', function($algeria_contents){
                         if($algeria_contents->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                    ->editColumn('created_at', function ($algeria_contents) {
                        return [
                           'display' => e($algeria_contents->created_at->format('m/d/Y')),
                           'timestamp' => $algeria_contents->created_at->timestamp
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
         return view('admin.discover_algeria_content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $display_order = DiscoverAlgeriaContent::count('id');
        if($display_order == 0)
            $this->display_order = 1;
        else
            $this->display_order = $display_order + 1;
        return view('admin.discover_algeria_content.create',['display_order' => $this->display_order]);
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
            'title_name_in_english'    => 'required',
            'title_name_in_arabic'     => 'required',
            'title_name_in_french'     => 'required',
            'display_order'            => 'required',
        ]);

        $this->display_order = DiscoverAlgeriaContent::count('id');
        

        $content_data = [
            [  'title_name' => $request->title_name_in_english,
                'locale'      => "en"
            ],
            [  'title_name' => $request->title_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'title_name' => $request->title_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $algeria_content = new DiscoverAlgeriaContent();
        $algeria_content->content_key = $this->slug->createSlug('discover_algeria',$request->title_name_in_english);
        $algeria_content->display_order = $request->display_order;
        $algeria_content->status = isset($request->status)?1:0;
        $algeria_content->created_by = Auth::user()->id;
        $algeria_content->updated_by = Auth::user()->id;
        $result = $algeria_content->save();

        DiscoverAlgeriaContent::where('display_order','>=',$request->display_order)
        ->where('display_order','<=',$this->display_order+1)
        ->where('id','!=',$algeria_content->id)
        ->update(['display_order' => DB::raw('display_order + 1')]);

        DB::statement("SET @r=0");
        $query = 'UPDATE discover_algeria_contents AS t1
                    INNER JOIN (
                    SELECT id,@r:= (@r+1) AS rn
                    FROM discover_algeria_contents
                    WHERE deleted_at IS NULL
                    ORDER BY display_order ASC 
                    ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE deleted_at IS NULL';

        DB::statement($query);


        foreach($content_data as $key => $value) {
            $algeria_content_tanslation = new DiscoverAlgeriaContentTranslate();
            $algeria_content_tanslation->title = $value['title_name'];
            $algeria_content_tanslation->content_id = $algeria_content->id;
            $algeria_content_tanslation->locale = $value['locale'];
            $algeria_content_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-discover-algeria-content')->with('success', 'Content added succsessfully.');
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
        $algeria_content = DiscoverAlgeriaContent::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($algeria_content->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $algeria_content->title_name_in_english = $translate->title;
                    break;
                case 'fr':
                    $algeria_content->title_name_in_french = $translate->title;
                    break;
                case 'ar':
                    $algeria_content->title_name_in_arabic = $translate->title;
                    break;
            }
        }
        return view('admin.discover_algeria_content.edit', compact('algeria_content'));
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
            'title_name_in_english'    => 'required',
            'title_name_in_arabic'     => 'required',
            'title_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]); 
        
        $this->display_order = DiscoverAlgeriaContent::count('id');

        $algeria_content = DiscoverAlgeriaContent::findOrFail($id);

        if($request->englishTitle != $request->title_name_in_english){
            $algeria_content->content_key = $this->slug->createSlug('discover_algeria',$request->title_name_in_english);
        }
        
        

        $algeria_content->display_order =  $request->display_order;
        $algeria_content->status = isset($request->status)?1:0;
        $algeria_content->created_by = Auth::user()->id;
        $algeria_content->updated_by = Auth::user()->id;
        $result = $algeria_content->Update();


        DiscoverAlgeriaContent::where('display_order','>=',$request->display_order)
        ->where('display_order','<=',$this->display_order)
        ->where('id','!=',$algeria_content->id)
        ->update(['display_order' => DB::raw('display_order + 1')]);
 
        DB::statement("SET @r=0");
        $query = 'UPDATE discover_algeria_contents AS t1
                    INNER JOIN (
                    SELECT id,@r:= (@r+1) AS rn
                    FROM discover_algeria_contents
                    WHERE deleted_at IS NULL
                    ORDER BY display_order ASC 
                    ) AS t2
                    ON t1.id = t2.id SET t1.display_order = t2.rn WHERE deleted_at IS NULL';
            
        DB::statement($query);


       

        $trans_algeria_content = [
            'en' => [
                "title"  => $request->title_name_in_english,
            ],
            'fr' => [
                "title"  => $request->title_name_in_french,
            ],
            'ar' => [
                "title"  => $request->title_name_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            DiscoverAlgeriaContentTranslate::where(
                [
                    [
                        'content_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_algeria_content[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-discover-algeria-content')->with('success', 'Discover algeria Content updated successfully.');
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
        $algeria_content= DiscoverAlgeriaContent::with('localeAll')->find($id);
        DiscoverAlgeriaContent::where('display_order','>=',$algeria_content->display_order)
        ->update(['display_order' => DB::raw('display_order - 1')]);

        $algeria_content->localeAll()->delete();
        $algeria_content->delete();
        $algeria_subcontent= DiscoverAlgeriaSubcontent::with('localeAll')
                                                      ->where('content_id',$id)
                                                      ->delete();

        DB::statement("SET @r=0");
        $query = 'UPDATE discover_algeria_contents AS t1
                    INNER JOIN (
                    SELECT id,@r:= (@r+1) AS rn
                    FROM discover_algeria_contents
                    WHERE deleted_at IS NULL
                    ORDER BY display_order ASC 
                    ) AS t2
                    ON t1.id = t2.id SET t1.display_order = t2.rn WHERE deleted_at IS NULL';
            
        DB::statement($query);

        $request->session()->flash('success', 'Discover algeria content deleted successfully.');
        return redirect()->route('manage-discover-algeria-content.index');
    }
}
