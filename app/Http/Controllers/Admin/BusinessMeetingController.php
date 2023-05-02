<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\BusinessMeeting;
use App\Models\BusinessSector;
use App\Models\BusinessTranslate;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use LaravelLocalization;
use DataTables;

class BusinessMeetingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:business-meeting-list');
        $this->middleware('permission:business-meeting-create', ['only' => ['create','store']]);
        $this->middleware('permission:business-meeting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:business-meeting-delete', ['only' => ['destroy']]);
    } 
    
    public function index(Request $request){
    	if($request->ajax()){
    		$events = BusinessMeeting::with('localeAll','businessSector','businessSector.sector.localeAll');
    		return Datatables::eloquent($events)
                ->addIndexColumn()
                ->addColumn('title', function($events){
                    foreach($events->localeAll as $events_data) {
                        if($events_data->locale == "en") {
                            $event_name = $events_data->title;
                        }
                    }
                    return $event_name;
                })
                ->addColumn('sector', function($events) {
                    foreach($events->businessSector as $eventSector) {
                        foreach($eventSector->sector->localeAll as $translate){
                            if($translate->locale == "en") {
                                $sector_name[] = $translate->name;
                            }
                        }
                    }
                    return $sector_name;
                })

                ->addColumn('place', function($events){
                    foreach($events->localeAll as $events_data) {
                        if($events_data->locale == "en") {
                            $event_place = $events_data->place;
                        }
                    }
                    return $event_place;
                })
                ->addColumn('action', function($events){
                    if (\Auth::user()->can('business-meeting-edit')) { 
                        $editBtn = '<a href="' . route('manage-business-meeting.edit', [$events->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editBtn = '';
                    }
                    if (\Auth::user()->can('business-meeting-delete')) {
                        $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-business-meeting.destroy', [$events->id]) . '" rel="tooltip" title="Delete" class="delete_subscription_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else { 
                        $deleteBtn = '';
                    }
                    return $editBtn.$deleteBtn;
                })
                ->editColumn('is_featured', function($events){
                    if($events->is_featured == 1) {
                        $is_featured = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Yes</span>';
                        return $is_featured;
                    }else {
                        $is_featured = '<span class="label label-inline label-light-danger font-weight-bold">NO</span>';
                        return $is_featured;
                    }
                })
                ->editColumn('created_at', function ($events) {
                    return [
                       'display' => e($events->created_at->format('m/d/Y')),
                       'timestamp' => $events->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('is_featured') == '0' || $request->get('is_featured') == '1') {
                        $instance->where('is_featured', $request->get('is_featured'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('title', 'LIKE', "%$search%");
                        });
                    }

                })
            ->rawColumns(['action','is_featured'])
            ->make(true);
    	}
        return view('admin.businessmeeting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        try {
            $keys = array('name','id');
            $sectors = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }
            $selected_sectors = null;
            return view('admin.businessmeeting.create',compact('sector_arr','selected_sectors'));

        } catch(\Throwable $th) {
            return redirect()->route('manage-business-meeting.create')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
    	$data = $request->all();
    	$validatedData = $request->validate(
            [
                'event_name_in_english'     => 'required',
                'event_name_in_arabic'      => 'required',
                'event_name_in_french'      => 'required',
                'place_name_in_english'     => 'required',
                'place_name_in_arabic'      => 'required',
                'place_name_in_french'      => 'required',
                'sectors'                   => 'required|array|min:1',
                'start_date'                => 'required',
                'price_in_square_meter'     => 'required',
            ]);
    	DB::beginTransaction();
    	try{
    		$event_data = [
                [
                    'event_name'    => $request->event_name_in_english,
                    'place_name'    => $request->place_name_in_english,
                    'locale'        => "en"
                ],
                [
                    'event_name'    => $request->event_name_in_arabic,
                    'place_name'    => $request->place_name_in_arabic,
                    'locale'        => "ar"
                ],
                [
                    'event_name'    => $request->event_name_in_french,
                    'place_name'    => $request->place_name_in_french,
                    'locale'        => "fr"
                ],
            ];

            $event = new BusinessMeeting();
            $event->created_by = Auth::user()->id;
            $event->updated_by = Auth::user()->id;
            $event->start_date = $request->start_date;
            $event->end_date = null;
            $event->is_featured = isset($request->is_featured)?1:0;
            $event->price_per_square_meter = $request->price_in_square_meter;
            $result = $event->save();
    	// echo "<pre>";print_r($data);exit();

            foreach($request->sectors as $sectors) {
                $event_sector = new BusinessSector();
                $event_sector->business_id    = $event->id;
                $event_sector->sector_id   = (int)$sectors;
                $event_sector->save();
            }

             foreach($event_data as $key => $value) {
                $event_tanslation = new BusinessTranslate();
                $event_tanslation->title = $value['event_name'];
                $event_tanslation->place = $value['place_name'];
                $event_tanslation->business_id = $event->id;
                $event_tanslation->locale = $value['locale'];
                $event_tanslation->save();
            }

             if($result) {
                DB::commit();
                return redirect('admin/manage-business-meeting')->with('success', 'Meeting Event added succsessfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-business-meeting')->with('error', 'Something went wrong!');
            }
    	}catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-business-meeting.index')->with('error', 'Something went wrong!');
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
            $event = BusinessMeeting::with('businessSector')->findOrFail($id);
            // Setting the translated fields to edit
            foreach ($event->localeAll as $translate) {
                switch ($translate->locale) {
                    case 'en':
                        $event->event_name_in_english   = $translate->title ;
                        $event->place_name_in_english   = $translate->place;
                        break;
                    case 'ar':
                        $event->event_name_in_arabic    = $translate->title ;
                        $event->place_name_in_arabic    = $translate->place;
                        break;
                    case 'fr':
                        $event->event_name_in_french    = $translate->title ;
                        $event->place_name_in_french    = $translate->place;
                        break;
                }
            }

            foreach ($event->businessSector as $sector) {
                $selected_sectors[]= (string)$sector->sector_id;
            }

            $keys = array('name','id');
            $sectors = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }
            return view('admin.businessmeeting.edit', compact('event','sector_arr','selected_sectors'));

        } catch(\Throwable $th) {
            return redirect()->route('manage-business-meeting.edit')->with('error', 'Something went wrong!');
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
                'event_name_in_english'     => 'required',
                'event_name_in_arabic'      => 'required',
                'event_name_in_french'      => 'required',
                'place_name_in_english'     => 'required',
                'place_name_in_arabic'      => 'required',
                'place_name_in_french'      => 'required',
                'sectors'                   => 'required|array|min:1',
                'start_date'                => 'required',
                'price_in_square_meter'     => 'required',
            ]);
        DB::beginTransaction();
        try {
            $event = BusinessMeeting::findOrFail($id);
            $event->created_by = Auth::user()->id;
            $event->updated_by = Auth::user()->id;
            $event->start_date = $request->start_date;
            $event->end_date = null;
            $event->is_featured = isset($request->is_featured)?1:0;
            $event->price_per_square_meter = $request->price_in_square_meter;
            $result = $event->update();

            $trans_partners = [
                'en' => [
                    "title"         => $request->event_name_in_english,
                    "place"         => $request->place_name_in_english,
                ],
                'fr' => [
                    "title"         => $request->event_name_in_french,
                    "place"         => $request->place_name_in_french,
                ],
                'ar' => [
                    "title"         => $request->event_name_in_arabic,
                    "place"         => $request->place_name_in_arabic,
                ],
            ];
            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                BusinessTranslate::where(
                    [
                        [
                            'business_id', '=', $id
                        ],
                        [
                            'locale', '=', $localeCode
                        ]
                    ])
                    ->update($trans_partners[$localeCode]);
            }

            foreach($request->sectors as $sector_id) {
                $selected_sector = BusinessSector::where([['sector_id',$sector_id],['business_id',$id]])->delete();
                $event_sector = new BusinessSector();
                $event_sector->business_id    = $id;
                $event_sector->sector_id   = (int)$sector_id;
                $event_sector->save();
            }
            if($result) {
                DB::commit();
                return redirect('admin/manage-business-meeting')->with('success', 'Meeting Event updated successfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-business-meeting')->with('error', 'Something went wrong!');
            }
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-business-meeting.index')->with('error', 'Something went wrong!');
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
            $event= BusinessMeeting::with('localeAll','businessSector')->find($id);


            $event->localeAll()->delete();
            $event->businessSector()->delete();
            $event->delete();
            $request->session()->flash('success', 'Event deleted successfully.');
            return redirect()->route('manage-business-meeting.index');

        } catch(\Throwable $th) {
            return redirect()->route('manage-business-meeting.index')->with('error', 'Something went wrong!');
        }
    }
}
