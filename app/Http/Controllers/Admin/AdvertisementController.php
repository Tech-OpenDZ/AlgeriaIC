<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendReportToClientMail;
use App\Models\Advertisement;
use App\Models\AdvertisementPages;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdvertisementController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:advertisement-list');
        // $this->middleware('permission:advertisement-report');
        $this->middleware('permission:advertisement-create', ['only' => ['create','store']]);
        $this->middleware('permission:advertisement-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:advertisement-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $advertisement = Advertisement::with('pages');

            return DataTables::of($advertisement)
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {

                        return $instance->where('title','like','%'.$request->get('search').'%');

                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->orderColumns(['title','created_at','location','number_of_views'], '-:column $1')
                ->addColumn('title', function($advertisement){

                    return $advertisement->title;
                })
                ->addColumn('created_at', function($advertisement){

                    return $advertisement->created_at;
                })

                ->addColumn('location', function($advertisement){

                    return Advertisement::location[$advertisement->location];
                })
                ->addColumn('number_of_views', function($advertisement){

                    return $advertisement->actual_number_of_displays;
                })
                ->addColumn('number_of_clicks', function($advertisement){

                    return $advertisement->actual_number_of_clicks;
                })
                ->addColumn('ctr', function($advertisement){

                    if($advertisement->actual_number_of_displays == 0)
                        return '0 %';
                    $ctr = $advertisement->actual_number_of_clicks / $advertisement->actual_number_of_displays * 100;

                    return round($ctr,2).' %';
                })
                ->editColumn('status', function($advertisement){
                    if($advertisement->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->addColumn('action', function($row){

                    if (\Auth::user()->can('advertisement-edit')){ 

                        $btnEdit = '<a href="' . route('manage-advertisement.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('advertisement-delete')) {

                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-advertisement.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>&nbsp;&nbsp;';
                    } else {
                        $btnDelete = '';
                    } 
                    if (\Auth::user()->can('advertisement-report')) {

                        $btnReport = '<a href="' . route('manage-advertisement.show', [$row->id]) . '" title="report"><i class="far fa-chart-bar" aria-hidden="true" style="color: #3699FF;"></i></a>';
                    } else {
                        $btnReport = '';
                    }
                    return $btnEdit.$btnDelete.$btnReport;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin.advertisement.index');
    }


    public function create()
    {
        $pages_arr = getPages();
        $selected_pages = null;
        return view('admin.advertisement.edit',compact('pages_arr','selected_pages'));
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
            'title'         => 'required',
            'publication_order'            => 'required|numeric',
            'ad' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'pages' => 'required',
            'sponsorised_link' => 'required',
        ];
        if($request->advertisement_type == 'temporary' && $request->formula_type == 'date')
        {
            $rules['start_date'] = 'required';
        }
        if($request->advertisement_type == 'temporary' && $request->formula_type == 'clicks')
        {
            $rules['number_of_clicks'] = 'required';
        }
        if($request->advertisement_type == 'temporary' && $request->formula_type == 'displays')
        {
            $rules['number_of_display'] = 'required';
        }
        if($request->advertisement_type == 'temporary' && $request->formula_type == 'keyword')
        {
            $rules['keywords'] = 'required';

            if($request->for_keyword == 'displays')
            {
                $rules['number_of_display'] = 'required|min:1';
            }
            elseif($request->for_keyword == 'clicks')
            {
                $rules['number_of_clicks'] = 'required|min:1';
            }
        }

        $messages = [];
        $attributes = [
            'start_date'          => 'Date',
            'end_date'          => 'Date',
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to insert data
        $userId                  = Auth::user()->id;

        if(isset($request->id))
        {
            $advertisement  = Advertisement::find($request->id);
            $advertisement->updated_by    = $userId;
            $advertisement->pages()->delete();


        }
        else{
            $advertisement  = new Advertisement();
            $advertisement->created_by    = $userId;
            $advertisement->updated_by    = $userId;
            $advertisement->ad_id = uniqid();

        }

        $advertisement->title = $request->title;
        $advertisement->location = $request->location;

        if ($request->hasFile('ad')){
            $image = $request->file('ad');
            $imageSaveAsName = time() . "_logo." . $image->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/advertisement/');
            $banner_image_url = $imageSaveAsName;
            if($request->logo){
                if(file_exists($upload_path.$request->image)) {
                    unlink($upload_path.$request->image);
                }
            }
            $success = $image->move($upload_path, $imageSaveAsName);
            // $banner->banner_img = $bannerImageSaveAsName;
            $advertisement->ad = $imageSaveAsName;

        }

        $advertisement->publication_order = $request->publication_order;


        $advertisement->advertisement_type = $request->advertisement_type;
        if($request->advertisement_type == 'temporary')
            $advertisement->formula_type = $request->formula_type;
        else
        $advertisement->formula_type = NULL;
        $advertisement->sponsorised_link = $request->sponsorised_link;
        $advertisement->calculation_by = $request->calculation_by;

        if($request->formula_type == 'date')
        {
            $advertisement->start_date =  Carbon::parse($request->start_date);
            $advertisement->end_date =  Carbon::parse($request->end_date);
        }
        elseif($request->formula_type == 'displays')
        {
            $advertisement->number_of_display = $request->number_of_display ?? 0;
        }
        elseif($request->formula_type == 'clicks')
        {
            $advertisement->number_of_clicks = $request->number_of_clicks ?? 0;
        }
        else{
            if($request->for_keyword == 'displays')
            {
                $advertisement->number_of_display = $request->number_of_display ?? 0;
            }
            elseif($request->for_keyword == 'clicks')
            {
                $advertisement->number_of_clicks = $request->number_of_clicks ?? 0;
            }
            $advertisement->for_keyword = $request->for_keyword;
            $advertisement->keywords = $request->keywords;

        }

        $advertisement->status        = isset($request->status) ? 1 : 0;


        $advertisement->save();

        foreach($request->pages as $page)
        {
            AdvertisementPages::create([
                'ad_id' => $advertisement->ad_id,
                'page' => $page,
            ]);
        }

        $request->session()->flash('success', 'Advertisement added successfully.');
        return redirect()->route('manage-advertisement.index');
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $pages_arr = getPages();
        $selected_pages = null;
        foreach ($advertisement->pages as $page) {
            $selected_pages[]= (string)$page->page;
        }
        return view('admin.advertisement.edit',compact('advertisement','pages_arr','selected_pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $pages_arr = getPages();
        $selected_pages = null;
        foreach ($advertisement->pages as $page) {
            $selected_pages[]= (string)$page->page;
        }
        return view('admin.advertisement.show',compact('advertisement','pages_arr','selected_pages'));
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

            $advertisement= Advertisement::with('pages')->find($id);

            try{
                unlink('storage/uploads/advertisement/'.$advertisement->ad);
            }catch(\Throwable $th){

            }

            $advertisement->pages()->delete();
            $advertisement->delete();
            $request->session()->flash('success', 'Advertisement deleted successfully.');

            return redirect()->route('manage-advertisement.index');

        } catch(\Throwable $th) {
            return redirect()->route('manage-advertisement.index')->with('error', 'Something went wrong!');
        }
    }

    public function sendReport(Request $request)
    {
        $email = $request->email;
        $adv = Advertisement::findOrFail($request->ad_id);

        \Mail::to($email)->send(new SendReportToClientMail($adv));

        return redirect()->back();
    }

}
