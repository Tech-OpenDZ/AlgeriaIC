<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use DataTables;
use App\Services\Slug;
use LaravelLocalization;
use App\Models\News,
    App\Models\Zone,
    App\Models\Sector,
    App\Models\NewsImage,
    App\Models\NewsSource,
    App\Models\NewsTranslate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:news-list');
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $newsAll = News::whereHas('localeAll',function($query) {
                                $query->where('locale',"en");
                            })->with(['localeAll' => function($query) {
                                $query->where('locale',"en");
                            },
                            'sectors',
                            'sectors.localeAll',
                            'zones',
                            'zones.localeAll'
                            ])->orderByDesc('created_at');

            return Datatables::eloquent($newsAll)
                ->addIndexColumn()
                ->addColumn('title', function($newsAll){
                    foreach($newsAll->localeAll as $newsAll_data) {
                        if($newsAll_data->locale == "en") {
                            $title = $newsAll_data->title;
                        }
                    }
                    return isset($title) ? $title : " ";
                })
                ->addColumn('sectors', function($newsAll) {
                    $separator = '';
                    $sector_name = [];
                    foreach($newsAll->sectors as $sector) {
                        foreach($sector->localeAll as $translate){
                            if($translate->locale == "en") {
                                $sector_name[] = $separator.$translate->name;
                            }
                        }
                        $separator = ' ';
                    }
                    return $sector_name;
                })
                ->addColumn('zones', function($newsAll) {
                    $separator = '';
                    $zone_name = [];
                    foreach ($newsAll->zones as $zone) {
                        foreach ($zone->localeAll as $translate) {
                            if ($translate->locale == "en") {
                                $zone_name[] = $separator.$translate->name;
                            }
                        }
                        $separator = ' ';
                    }
                    return $zone_name;
                })
                ->addColumn('action', function($newsAll){
                    if (\Auth::user()->can('news-edit')) {
                        $editBtn = '<a href="' . route('manage-news.edit', [$newsAll->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editBtn = '';
                    }
                    if (\Auth::user()->can('news-delete')) {
                        $deleteBtn =   '<a href="javascript:void(0)" data-href="' . route('manage-news.destroy', [$newsAll->id]) . '" rel="tooltip" title="Delete" class="delete_news_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $deleteBtn = '';
                    }

                    return $editBtn.$deleteBtn;
                })
                ->editColumn('status', function($newsAll){
                    if ($newsAll->status == 1) {
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }
                    else {
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('is_premium', function($newsAll){
                    if ($newsAll->is_premium == 1) {
                        $is_premium = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Yes</span>';
                        return $is_premium;
                    }
                    else {
                        $is_premium = '<span class="label label-inline label-light-danger font-weight-bold">NO</span>';
                        return $is_premium;
                    }
                })
        
                ->editColumn('created_at', function ($newsAll) {
                    return [
                       'display' => e($newsAll->created_at->format('m/d/Y')),
                       'timestamp' => $newsAll->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('is_premium') == '0' || $request->get('is_premium') == '1') {
                        $instance->where('is_premium', $request->get('is_premium'));
                    }
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('externe') == '0' || $request->get('externe') == '1') {
                        $instance->where('externe', $request->get('externe'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('title', 'LIKE', "%$search%");
                        });
                    }
                })
            ->rawColumns(['action','status','is_premium'])
            ->make(true);
        }
        return view('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        try {
            $newsMaxId = News::max('id');
            $newsMaxId++;
            $keys = array('title','id');
            $sectors = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }

            $sources = NewsSource::where('status','<>',0)->get();
            $source_arr = new \stdClass();
            $source_arr->{null} = '-- Select News Source --';
            foreach ($sources as $source) {
                foreach ($source->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $source_arr->{$translate->news_source_id} = $translate->title;
                    }
                }
            }

            $selected_sectors = null;

            $zones = Zone::all();
            $zone_arr = new \stdClass();

            foreach ($zones as $zone) {
                foreach ($zone->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $zone_arr->{$translate->zone_id} = $translate->name;
                    }
                }
            }
            $selected_zones = null;

            return view('admin.news.create', compact('sector_arr','selected_sectors','zone_arr','selected_zones','newsMaxId','source_arr'));

        } catch(\Throwable $th) {
            return redirect()->route('manage-news.create')->with('error', 'Something went wrong!');
        }
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

        $validatedData = $request->validate(
            [
                'news_logo'                 => 'required',
                'name'                      => 'required',
                'company_name'              => 'required',
                'company_address'           => 'required',
                'job_title'                 => 'required',
                'mobile_number'             => 'required',
                'email'                     => 'required',
                //'editor'                    => 'required',
                'news_title_in_english'     => 'required',
                'news_title_in_arabic'      => 'required',
                'news_title_in_french'      => 'required',
                'news_summary_in_english'   => 'required',
                'news_summary_in_arabic'    => 'required',
                'news_summary_in_french'    => 'required',
                'description_in_english'    => 'required',
                'description_in_arabic'     => 'required',
                'description_in_french'     => 'required',
                'source_id'                 => 'required|numeric',
                'source_link'               => 'required|url',
                'sectors'                   => 'required|array|min:1',
                'zones'                     => 'required|array|min:1',
                'insertion_date'            => 'required',
                'display_order'             => 'required'
            ],
            [],
            [
                'source_id'                 => 'source',
                'insertion_date'            => 'publication date',
            ]
        );
        DB::beginTransaction();
        try {

            $news               = new News();

            $user               = Auth::user();

            if ($request->hasFile('news_logo')) {

                $newsLogo               = $request->news_logo;
                $newsLogoSaveAsName     = rand(). "news_logo." . $newsLogo->getClientOriginalExtension();
                $upload_path            = storage_path('app/public/uploads/news_logos/');
                $success                = $newsLogo->move($upload_path, $newsLogoSaveAsName);
                $news_logo              = $newsLogoSaveAsName;
            }

            $news->news_logo        = $news_logo;
            $news->created_by       = $user->id;
            $news->updated_by       = $user->id;
            $news->page_key         = $this->slug->createSlug('news',$request->news_title_in_english);
            $news->insertion_date   = $request->insertion_date;
            $news->source_id        = $request->source_id;
            $news->source_link      = $request->source_link;
            $news->display_order    = $request->display_order;
            $news->is_premium       = isset($request->is_premium)?1:0;
            $news->status           = isset($request->status)?1:0;
            $news->name             = $request->name ;
            $news->company_name     = $request->company_name;
            $news->company_address  = $request->company_address;
            $news->job_title        = $request->job_title;
            $news->mobile_number    = $request->mobile_number;
            $news->email            = $request->email;
            $news->editor            = $request->editor;
            $news->externe          = 0;

            $result                 = $news->save();

            if($request->news_image != []){

                foreach($request->news_image as $news_image) {

                    $news_images = new NewsImage();

                    if ($request->hasFile('news_image')) {

                        $newsImage              = $news_image;
                        $newsImageSaveAsName    = rand(). "_news_image." . $news_image->getClientOriginalExtension();
                        $upload_path            = storage_path('app/public/uploads/news_images/');
                        $success                = $newsImage->move($upload_path, $newsImageSaveAsName);
                        $news_images->image     = $newsImageSaveAsName;
                    }

                    $news_images->news_id           = $news->id;
                    $news_images->display_order     =  $news->id;

                    $news_images->save();
                }
            }

            $news->sectors()->sync($request->sectors);
            $news->zones()->sync($request->zones);

            $translated_news = [
                [
                    'title'         => $request->news_title_in_english,
                    'editor'         => $request->editor_in_english,
                    'summary'       => $request->news_summary_in_english,
                    'description'   => $request->description_in_english,
                    'locale'        => "en",
                    'news_id'       => $news->id
                ],
                [
                    'title'         => $request->news_title_in_arabic,
                    'editor'         => $request->editor_in_arabic,
                    'summary'       => $request->news_summary_in_arabic,
                    'description'   => $request->description_in_arabic,
                    'locale'        => "ar",
                    'news_id'       => $news->id
                ],
                [
                    'title'         => $request->news_title_in_french,
                    'editor'         => $request->editor_in_french,
                    'summary'       => $request->news_summary_in_french,
                    'description'   => $request->description_in_french,
                    'locale'        => "fr",
                    'news_id'       => $news->id
                ]
            ];

            $translated_result = NewsTranslate::insert($translated_news);

            if ($result && $translated_result) {
                DB::commit();
                return redirect('admin/manage-news')->with('success', 'News added successfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-news')->with('error', 'Something went wrong!1');
            }
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('manage-news.index')->with('error', json_encode($e->getMessage()));
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-news.index')->with('error', 'Something went wrong!2'.json_encode($th));
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
        try {

            $news = News::with('sectors', 'zones', 'newsImages', 'localeAll')->findOrFail($id);

            // Setting the translated fields to edit
            foreach ($news->localeAll as $translate) {
                switch ($translate->locale) {
                    case 'en':
                        $news->news_title_in_english    = $translate->title ;
                        $news->editor_in_english    = $translate->editor ;
                        $news->news_summary_in_english  = $translate->summary ;
                        $news->description_in_english   = $translate->description;
                        $news->source_in_english        = $translate->source;
                    break;
                    case 'ar':
                        $news->news_title_in_arabic     = $translate->title ;
                        $news->editor_in_arabic     = $translate->editor ;
                        $news->news_summary_in_arabic   = $translate->summary ;
                        $news->description_in_arabic    = $translate->description;
                        $news->source_in_arabic         = $translate->source;
                    break;
                    case 'fr':
                        $news->news_title_in_french     = $translate->title ;
                        $news->editor_in_french    = $translate->editor ;
                        $news->news_summary_in_french   = $translate->summary ;
                        $news->description_in_french    = $translate->description;
                        $news->source_in_french         = $translate->source;
                    break;
                }
            }

            $sources = NewsSource::where('status','<>',0)->get();
            $source_arr = new \stdClass();
            $source_arr->{null} = '-- Select News Source --';
            foreach ($sources as $source) {
                foreach ($source->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $source_arr->{$translate->news_source_id} = $translate->title;
                    }
                }
            }

            $newsMaxId = $id;
            $newsMaxId++;
            $selected_sectors = [];
            foreach ($news->sectors as $sector) {
                $selected_sectors[]= (string)$sector->id;
            }

            $selected_zones = [];
            foreach ($news->zones as $zone) {
                $selected_zones[]= (string)$zone->id;
            }

            $sectors = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }

            $zones = Zone::all();
            $zone_arr = new \stdClass();

            foreach ($zones as $zone) {
                foreach ($zone->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $zone_arr->{$translate->zone_id} = $translate->name;
                    }
                }
            }

            return view('admin.news.edit', compact('news','sector_arr','selected_sectors','zone_arr','selected_zones','newsMaxId','source_arr'));

        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('manage-news.index')->with('error', json_encode($e->getMessage()));
        }
        catch(\Throwable $th) {
            return redirect()->route('manage-news.index')->with('error', 'Something went wrong!');
        }
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
        $validatedData = $request->validate(
            [
                'news_title_in_english'     => 'required',
                'news_title_in_arabic'      => 'required',
                'news_title_in_french'      => 'required',
                'news_summary_in_english'   => 'required',
                'news_summary_in_arabic'    => 'required',
                'news_summary_in_french'    => 'required',
                'description_in_english'    => 'required',
                'description_in_arabic'     => 'required',
                'description_in_french'     => 'required',
                'source_id'                 => 'required|numeric',
                'source_link'               => 'required|url',
                'sectors'                   => 'required|array|min:1',
                'zones'                     => 'required|array|min:1',
                'insertion_date'            => 'required',
                'display_order'             => 'required',
            ],
            [],
            [
                'source_id'                 => 'source',
                'insertion_date'            => 'publication date',
            ]
        );
        DB::beginTransaction();
        try {

            $news               = News::findOrFail($id);

            $user               = Auth::user();

            if ($request->hasFile('news_logo')) {
                try {
                    unlink('storage/uploads/news_logos/'.$news->news_logo);
                } catch (\Throwable $th) {

                }
                $newsLogo               = $request->news_logo;
                $newsLogoSaveAsName     = rand(). "news_logo." . $newsLogo->getClientOriginalExtension();
                $upload_path            = storage_path('app/public/uploads/news_logos/');
                $success                = $newsLogo->move($upload_path, $newsLogoSaveAsName);
                $news_logo              = $newsLogoSaveAsName;
                $news->news_logo        = $news_logo;
            }

            $news->created_by       = $user->id;
            $news->updated_by       = $user->id;

            if($request->englishTitle != $request->news_title_in_english)
            {
                $news->page_key = $this->slug->createSlug('news',$request->news_title_in_english);
            }

            $news->insertion_date   = $request->insertion_date;
            $news->display_order    = $request->display_order;
            $news->source_id        = $request->source_id;
            //$news->editor        = $request->editor;
            $news->source_link      = $request->source_link;
            $news->is_premium       = isset($request->is_premium)?1:0;
            $news->status           = isset($request->status)?1:0;
            $result                 = $news->update();

            $translated_news = [
                'en' => [
                    "title"         => $request->news_title_in_english,
                    "summary"       => $request->news_summary_in_english,
                    "description"   => $request->description_in_english,
                    "editor"        => $request->editor_in_english
                ],
                'fr' => [
                    "title"         => $request->news_title_in_french,
                    "summary"       => $request->news_summary_in_french,
                    "description"   => $request->description_in_french,
                    "editor"        => $request->editor_in_french
                ],
                'ar' => [
                    "title"         => $request->news_title_in_arabic,
                    "summary"       => $request->news_summary_in_arabic,
                    "description"   => $request->description_in_arabic,
                    "editor"        => $request->editor_in_arabic
                ],
            ];

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                NewsTranslate::where(
                [
                    [
                        'news_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($translated_news[$localeCode]);
            }

            $news->sectors()->sync($request->sectors);
            $news->zones()->sync($request->zones);

            if ($request->hasFile('news_image')) {

                foreach($request->news_image as $news_image) {

                    $news_images        = new NewsImage();

                    if ($request->hasFile('news_image')) {

                        $newsImage              = $news_image;
                        $newsImageSaveAsName    = rand(). "_news_image." . $news_image->getClientOriginalExtension();
                        $upload_path            = storage_path('app/public/uploads/news_images/');
                        $success                = $newsImage->move($upload_path, $newsImageSaveAsName);
                        $news_images->image     = $newsImageSaveAsName;
                    }

                    $news_images->news_id  = $id;
                    $news_images->display_order  = $id;
                    $news_images->save();
                }
            }
            if($result) {
                DB::commit();
                return redirect('admin/manage-news')->with('success', 'News updated successfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-news')->with('error', 'Something went wrong!');
            }
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-news.index')->with('error', 'Something went wrong!'. $th->getMessage());
        }
    }

     /**
     * Remove the specified resource image from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function imageDestroy(Request $request)
    {
        try {
            $newsImage = NewsImage::find($request->delete);
            try {
                unlink('storage/uploads/news_images/'.$newsImage->image);
            } catch (\Throwable $th) {

            }
            $newsImage->delete();
            return redirect()->back()->with('success', 'News Image deleted successfully.');

        } catch(\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
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
        try {

            $news= News::with('sectors', 'zones', 'newsImages', 'localeAll')->find($id);

            foreach($news->newsImages as $newsImage) {
                try {
                    unlink('storage/uploads/news_images/'.$newsImage->image);
                } catch (\Throwable $th) {

                }
            }

            $news->localeAll()->delete();
            $news->newsImages()->delete();
            $news->sectors()->detach();
            $news->zones()->detach();
            $news->delete();
            $request->session()->flash('success', 'News deleted successfully.');

            return redirect()->route('manage-news.index');

        } catch(\Throwable $th) {
            return redirect()->route('manage-news.index')->with('error', 'Something went wrong! '.$th->getMessage());
        }
    }
}
