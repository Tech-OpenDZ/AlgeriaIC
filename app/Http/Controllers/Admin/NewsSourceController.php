<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use DataTables;
use LaravelLocalization;
use App\Models\NewsSource;
use Illuminate\Http\Request;
use App\Models\NewsSourceTranslate;
use App\Http\Controllers\Controller;

class NewsSourceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:news-source-list');
        $this->middleware('permission:news-source-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-source-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-source-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        // $news_source = NewsSource::with('localeAll')->get();
        // echo "<pre>";
        // dd($news_source);
        // return ;
    	if($request->ajax()){
            $news_source = NewsSource::with('localeAll');
             return Datatables::eloquent($news_source)
                    ->addIndexColumn()
                    ->addColumn('title', function($news_source){
                        $title = "";
                        foreach($news_source->localeAll as $news_source_data) {
                            if($news_source_data->locale == "en") {
                                $title = $news_source_data->title;
                            }
                        }
                        return $title;
                    })
                    ->addColumn('action', function($news_source){ 
                        if (\Auth::user()->can('news-source-edit')) {
                            $editBtn = '<a href="' . route('manage-news_source.edit', [$news_source->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('news-source-delete')) {
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-news_source.destroy', [$news_source->id]) . '" rel="tooltip" title="Delete" class="delete_sector_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        } 
                        else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                    })
                    ->editColumn('status', function($news_source){
                        if($news_source->status == 1){
                            $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                            return $status;
                        }else{
                            $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                            return $status;
                        }
                    })
                    ->addColumn('logo', function($news_source){
                        $logo = '<img src="'.asset('storage/uploads/news_source/logo/'.$news_source->logo).'" height="50px" width="50px"/>';
                        return $logo;

                    })
                    ->editColumn('created_at', function ($news_source) {
                        return [
                           'display' => e($news_source->created_at->format('m/d/Y')),
                           'timestamp' => $news_source->created_at->timestamp
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
                    ->rawColumns(['title','action','status','logo'])
                    ->make(true);
         }
    	return view('admin.news_source.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news_source.create');
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
        // dd($request->all());
        $rules = [
            'title_in_english'      => 'required',
            'title_in_arabic'       => 'required',
            'title_in_french'       => 'required',
            'logo'                  => 'required|image|dimensions:max_width=500,max_height=500'
        ];
        $messages = [
            'logo.dimensions'  => 'Please select the image of max width and height of 500 pixels.'
        ];
        $attributes = [];

        $this->validate($request, $rules, $messages, $attributes);

        try{
            DB::beginTransaction();

            $news_source = new NewsSource();

            /**
             * Code to upload image
            */

            $logoImage = $request->file('logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/news_source/logo/');
            $logo_image_url = $logoImageSaveAsName;
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);

            /**
             * Code to insert record in News Source table
            */

            $news_source->logo = $logoImageSaveAsName;
            $news_source->status = isset($request->status)?1:0;
            $news_source->created_by = Auth::user()->id;
            $news_source->updated_by = Auth::user()->id;
            $result = $news_source->save();

            /**
             * Inserting translated data in translate table
            */
            $translated_news_source = [
                [
                    'title'                     => $request->title_in_english,
                    'locale'                    => "en",
                    'news_source_id'            => $news_source->id
                ],
                [
                    'title'                     => $request->title_in_arabic,
                    'locale'                    => "ar",
                    'news_source_id'            => $news_source->id
                ],
                [
                    'title'                     => $request->title_in_french,
                    'locale'                    => "fr",
                    'news_source_id'            => $news_source->id
                ]
            ];
            // dd($translated_news_source);
            NewsSourceTranslate::insert($translated_news_source);

            if($result) {
                DB::commit();
                return redirect('admin/manage-news_source')->with('success', 'News Source added successfully.');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/manage-news_source')->with('error', 'Error : '.$th->getMessage());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/manage-news_source')->with('error', 'Error : '.$e->getMessage());
        }

    }

    public function edit($id)
    {
        $news_source = NewsSource::with('localeAll')->findOrFail($id);
        return view('admin.news_source.edit', compact('news_source'));
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
        $rules = [
            'title_in_english'      => 'required',
            'title_in_arabic'       => 'required',
            'title_in_french'       => 'required',
        ];
        $messages = [];

        if ($request->hasFile('logo')) {
            $rules = [
                'logo'                  => 'required|image|dimensions:max_width=500,max_height=500'
            ];
            $messages = [
                'logo.dimensions'       => 'Please select the image of max width and height of 500 pixels.'
            ];
        }

        $attributes = [];

        $this->validate($request, $rules, $messages, $attributes);

        try{
            DB::beginTransaction();

            $news_source = NewsSource::findOrFail($id);

            /**
             * Code to upload image
            */
            if ($request->hasFile('logo')) {

                $logoImage = $request->file('logo');
                $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
                $upload_path = storage_path('app/public/uploads/news_source/logo/');
                $logo_image_url = $logoImageSaveAsName;
                $success = $logoImage->move($upload_path, $logoImageSaveAsName);
                $news_source->logo = $logoImageSaveAsName;
            }

            /**
             * Code to update record in News Source table
            */
            $news_source->status = isset($request->status)?1:0;
            $news_source->created_by = Auth::user()->id;
            $news_source->updated_by = Auth::user()->id;
            $result = $news_source->update();

            /**
             * Updating translated data in translate table
            */

            $translated_news = [
                'en' => [
                    "title"         => $request->title_in_english,
                ],
                'fr' => [
                    "title"         => $request->title_in_french,
                ],
                'ar' => [
                    "title"         => $request->title_in_arabic,
                ],
            ];

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                NewsSourceTranslate::where(
                [
                    [
                        'news_source_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($translated_news[$localeCode]);
            }

            if($result) {
                DB::commit();
                return redirect('admin/manage-news_source')->with('success', 'News Source updated successfully.');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/manage-news_source')->with('error', 'Error : '.$th->getMessage());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/manage-news_source')->with('error', 'Error : '.$e->getMessage());
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
        $news_source= NewsSource::find($id);
        $news_source->delete();
        $request->session()->flash('success', 'News Source deleted successfully.');
        return redirect()->route('manage-news_source.index');
    }
}
