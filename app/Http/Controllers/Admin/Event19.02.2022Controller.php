<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event,
    App\Models\EventTranslate,
    App\Models\Sector,
    App\Models\EventSector,
    App\Models\EventReference,
    App\Models\EventDocument,
    App\Models\EventImage,
    App\Models\Exhibitor,
    App\Models\ExhibitorTranslate,
    App\Models\Zone,
    App\Models\Source,
    App\User;
use Auth;
use DB;
use App\Services\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use Carbon\Carbon;

class EventController extends Controller
{
    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:event-list');
        $this->middleware('permission:event-create', ['only' => ['create','store']]);
        $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:event-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if($request->ajax()){
            $events = Event::with('localeAll','eventSector','eventSector.sector.localeAll')->orderByDesc('created_at');

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
                foreach($events->eventSector as $eventSector) {
                    foreach($eventSector->sector->localeAll as $translate){
                        if($translate->locale == "en") {
                            $sector_name[] = $translate->name;
                        }
                    }
                }
                return $sector_name;
            })
            // ->addColumn('description', function($events){
            //     foreach($events->localeAll as $events_data) {
            //         if($events_data->locale == "en") {
            //             $event_description = $events_data->description;
            //         }
            //     }
            //     return strip_tags(str_replace("&nbsp;", "",$event_description));

            // })
            ->addColumn('place', function($events){
                foreach($events->localeAll as $events_data) {
                    if($events_data->locale == "en") {
                        $event_place = $events_data->place;
                    }
                }
                return $event_place;
            })
            ->addColumn('action', function($events){
                if (\Auth::user()->can('event-edit')) {
                    $editBtn = '<a href="' . route('manage-event.edit', [$events->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                } else {
                    $editBtn = '';
                }
                if (\Auth::user()->can('event-delete')) {
                    $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-event.destroy', [$events->id]) . '" rel="tooltip" title="Delete" class="delete_subscription_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
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
            ->editColumn('type', function($events){
                if($events->start_date > date("Y-m-d")) {
                    $type = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Upcoming</span>';
                    return $type;

                }else  if($events->start_date < date("Y-m-d") && ($events->end_date >= date("Y-m-d")) ) {
                    $type = '<span class="label label-inline label-light-success font-weight-bold">En Cours</span>';
                    return $type;

                }else  {
                    $type = '<span class="label label-inline label-light-danger font-weight-bold">Past</span>';
                    return $type;
                }
            })
            ->editColumn('created_at', function ($events) {
                return [
                   'display' => e($events->created_at->format('m/d/Y')),
                   'timestamp' => $events->created_at->timestamp
                ];
             })

             ->editColumn('is_actif', function($newsAll){
                if ($newsAll->is_actif == 1) {
                    $is_actif = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                    return $is_actif;
                }
                else {
                    $is_actif = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                    return $is_actif;
                }
            })

            ->editColumn('status', function($newsAll){
                if ($newsAll->status == "Maintenu") {
                    $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Maintenu</span>';
                    return $status;
                }
                else  if ($newsAll->status == "Reporté") {
                    $status = '<span class="label label-lg font-weight-bold label-light-warning label-inline">Reporté</span>';
                    return $status;
                }
                else {
                    $status = '<span class="label label-inline label-light-danger font-weight-bold">Annulé</span>';
                    return $status;
                }
            })
            ->filter(function ($instance) use ($request) {
                if ($request->get('is_featured') == '0' || $request->get('is_featured') == '1') {
                    $instance->where('is_featured', $request->get('is_featured'));
                }
                if ($request->get('is_actif') == '0' || $request->get('is_actif') == '1') {
                    $instance->where('is_actif', $request->get('is_actif'));
                }
                if ($request->get('status') == 'Maintenu' || $request->get('status') == 'Reporté' || $request->get('status') == 'Annulé') {
                    $instance->where('status', $request->get('status'));
                }
                if ($request->get('type') == 'upcoming' || $request->get('type') == 'past') {
                    if($request->get('type') == 'upcoming') {
                        $instance->where('start_date', '>', date('Y-m-d'))->where('end_date', '>', date('Y-m-d'));
                    } else {
                        $instance->where('start_date', '<', date('Y-m-d'))->where('end_date', '<', date('Y-m-d'));
                    }
                }
                

                

                if ($request->get('type') == 'encours') {
                    if($request->get('type') == 'encours') {
                        $instance->where('end_date', '>=', date('Y-m-d'))
                            ->where('start_date', '<=', date('Y-m-d'));
                    }
                }
                if (!empty($request->get('search'))) {
                    $instance->whereHas('localeAll', function($w) use($request){
                        $search = $request->get('search');
                        $w->where('title', 'LIKE', "%$search%");
                    });
                }

            })
            ->rawColumns(['action','is_featured','is_actif','status','type'])
            ->make(true);
        }
        return view('admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        try {
            $sectors    = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }
            $selected_sectors = null;
            $zones      = Zone::all();
            $zone_arr   = new \stdClass();
            foreach ($zones as $zone) {
                foreach ($zone->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $zone_arr->{$translate->zone_id} = $translate->name;
                    }
                }
            }
            $display_order = Exhibitor::max('display_order');
            if($display_order == 0)
                $display_order = 1;
            else
                $display_order++;
            $selected_zones = null;
            $exhibitor = view('admin.event.exhibitors')->render();
            return view('admin.event.create',compact('sector_arr','selected_sectors','selected_zones','zone_arr','display_order','exhibitor'));

        } catch(\Throwable $th) {
            return redirect()->route('manage-event.create')->with('error', 'Something went wrong!');
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
        $rules = [
            'event_logo'                    => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'event_name_in_english'         => 'required',
            'event_name_in_arabic'          => 'required',
            'event_name_in_french'          => 'required',
            'description_in_english'        => 'required',
            'description_in_arabic'         => 'required',
            'description_in_french'         => 'required',
            'place_name_in_english'         => 'required',
            'place_name_in_arabic'          => 'required',
            'place_name_in_french'          => 'required',
            'sectors'                       => 'required|array|min:1',
            'zones'                         => 'required|array|min:1',
            'start_date'                    => 'required',
            'price_in_square_meter'         => 'required',
            'organizer_agency_in_english'   => 'required',
            'organizer_agency_in_arabic'    => 'required',
            'organizer_agency_in_french'    => 'required',
            'organizer_address_in_english'  => 'required',
            'organizer_address_in_arabic'   => 'required',
            'organizer_address_in_french'   => 'required',
            'organizer_contact'             => 'required',
            'organizer_email'               => 'required',
            'event_image.*'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'event_reference.*'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'exhibitor_logo.*'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'organizer_website'             => 'nullable|url',
            // 'exhibitor_name_in_english'     => 'required|array|min:1',
            // 'exhibitor_name_in_english.0'   => 'required|string|distinct|min:1',
            // 'exhibitor_name_in_arabic'      => 'required|array|min:1',
            // 'exhibitor_name_in_arabic.0'    => 'required|string|distinct|min:1',
            // 'exhibitor_name_in_french'      => 'required|array|min:1',
            // 'exhibitor_name_in_french.0'    => 'required|string|distinct|min:1',
            // 'contact'                       => 'required|array|min:1',
            // 'contact.0'                     => 'required|string|distinct|min:1',
            // 'display_order'                 => 'required|array|min:1',
            // 'display_order.0'               => 'required|string|distinct|min:1',
            // 'exhibitor_logo'                => 'required|array|min:1',
            // 'exhibitor_logo.0'              => 'required|min:1',
            // 'source_name_in_english'        => 'required',
            // 'source_name_in_arabic'         => 'required',
            // 'source_name_in_french'         => 'required',
        ];
        $customMessages = [
            'event_image.*'                 => 'The event image must be image',
            'event_reference.*'             => 'The event reference must be image',
            'exhibitor_name_in_english.0.required'  => 'The exhibitor name in english field is required.',
            'exhibitor_name_in_arabic.0.required'   => 'The exhibitor name in english field is required.',
            'exhibitor_name_in_french.0.required'   => 'The exhibitor name in english field is required.',
            'contact.0.required'                    => 'The contact no is required.',
            'display_order.0.required'              => 'The display order field is required.',
            'exhibitor_logo.0.required'             => 'The exhibitor logo field is required.',
        ];
        $this->validate($request, $rules, $customMessages);

        if($request->event_type_in_english == null || $request->event_type_in_arabic == null || $request->event_type_in_french == null){
            $request->event_type_in_english = null;
            $request->event_type_in_arabic  = null;
            $request->event_type_in_french  = null;
        }
        if($request->event_edition_in_english == null || $request->event_edition_in_arabic == null || $request->event_edition_in_french == null){
            $request->event_edition_in_english  = null;
            $request->event_edition_in_arabic   = null;
            $request->event_edition_in_french   = null;
        }
        if($request->summary_in_english == null || $request->summary_in_arabic == null || $request->summary_in_french == null){
            $request->summary_in_english    = null;
            $request->summary_in_arabic     = null;
            $request->summary_in_french     = null;
        }

        $exhibitorId                = [];
        $exhibitor_name_in_english  = [];
        $exhibitor_name_in_arabic   = [];
        $exhibitor_name_in_french   = [];
        $contact                    = [];
        $display_order              = [];

        if($request->exhibitor_id != null) {
            $count_of_id = count($request->exhibitor_id);
            if($count_of_id > 0){

                for($iteration = 0 ; $iteration < $count_of_id; $iteration++ ) {
                    if (empty($request->exhibitor_name_in_english[$iteration])) {
                        continue;
                    }
                    if (empty($request->exhibitor_name_in_arabic[$iteration])) {
                        continue;
                    }
                    if (empty($request->exhibitor_name_in_french[$iteration])) {
                        continue;
                    }
                    if (empty($request->contact[$iteration])) {
                        continue;
                    }
                    if (empty($request->display_order[$iteration])) {
                        continue;
                    }

                    $exhibitorId[]               = $request->exhibitor_id[$iteration];
                    $exhibitor_name_in_english[] = $request->exhibitor_name_in_english[$iteration];
                    $exhibitor_name_in_arabic[]  = $request->exhibitor_name_in_arabic[$iteration];
                    $exhibitor_name_in_french[]  = $request->exhibitor_name_in_french[$iteration];
                    $email[]                     = $request->email[$iteration];
                    $contact[]                   = $request->contact[$iteration];
                    $display_order[]             = $request->display_order[$iteration];
                }
            }
            $request->exhibitor_id                  = $exhibitorId;
            $request->exhibitor_name_in_english     = $exhibitor_name_in_english;
            $request->exhibitor_name_in_arabic      = $exhibitor_name_in_arabic;
            $request->exhibitor_name_in_french      = $exhibitor_name_in_french;
            $request->contact                       = $contact;
            $request->display_order                 = $display_order;
        }

        DB::beginTransaction();
        try {
            $event_data = [
                [
                    'event_name'            => $request->event_name_in_english,
                    'event_type'            => $request->event_type_in_english,
                    'event_edition'         => $request->event_edition_in_english,
                    'description'           => $request->description_in_english,
                    'summary'               => $request->summary_in_english,
                    'place_name'            => $request->place_name_in_english,
                    'source_name'           => isset($request->source_name_in_english) ? $request->source_name_in_english : ' ',
                    'organizer_agency'      => $request->organizer_agency_in_english,
                    'organizer_address'     => $request->organizer_address_in_english,
                    'organizer_job_title'   => $request->organizer_job_title_in_english,
                    'locale'            => "en"
                ],
                [
                    'event_name'            => $request->event_name_in_arabic,
                    'event_type'            => $request->event_type_in_arabic,
                    'event_edition'         => $request->event_edition_in_arabic,
                    'description'           => $request->description_in_arabic,
                    'summary'               => $request->summary_in_arabic,
                    'place_name'            => $request->place_name_in_arabic,
                    'source_name'           => isset($request->source_name_in_arabic) ? $request->source_name_in_arabic : ' ',
                    'organizer_agency'      => $request->organizer_agency_in_arabic,
                    'organizer_address'     => $request->organizer_address_in_arabic,
                    'organizer_job_title'   => $request->organizer_job_title_in_arabic,
                    'locale'            => "ar"
                ],
                [
                    'event_name'            => $request->event_name_in_french,
                    'event_type'            => $request->event_type_in_french,
                    'event_edition'         => $request->event_edition_in_french,
                    'description'           => $request->description_in_french,
                    'summary'               => $request->summary_in_french,
                    'place_name'            => $request->place_name_in_french,
                    'source_name'           => isset($request->source_name_in_french) ? $request->source_name_in_french : ' ',
                    'organizer_agency'      => $request->organizer_agency_in_french,
                    'organizer_address'     => $request->organizer_address_in_french,
                    'organizer_job_title'   => $request->organizer_job_title_in_french,
                    'locale'            => "fr"
                ],
            ];
            $loop = 0;
            if($request->exhibitor_name_in_english != null) {
                foreach($request->exhibitor_name_in_english as $translate) {
                    $exhibitor_data[$loop] =
                    [
                        [
                            'name'          => $request->exhibitor_name_in_english[$loop],
                            'locale'        => "en",
                        ],
                        [
                            'name'          => $request->exhibitor_name_in_arabic[$loop],
                            'locale'        => "ar",
                        ],
                        [
                            'name'          => $request->exhibitor_name_in_french[$loop],
                            'locale'        => "fr",
                        ],
                    ];
                    $loop++;
                }
            }

            $image_array = [];
            $explode_removedImage = explode(",", $request->event_image_removed);
            if ($request->event_image) {
                foreach ($request->event_image as $value) {
                    $Image_name = $value->getClientOriginalName();
                    if(!in_array($Image_name, $explode_removedImage)){
                        $image_array[] =$value;
                    }
                }
            }

            $reference_image_array = [];
            $explode_removedReferenceImage = explode(",", $request->reference_image_removed);
            if($request->event_reference) {
                foreach ($request->event_reference as $value) {
                    $Image_name = $value->getClientOriginalName();
                    if(!in_array($Image_name, $explode_removedReferenceImage)){
                        $reference_image_array[] = $value;
                    }
                }
            }

            $start_date = Carbon::parse($request->start_date);
            $end_date   = Carbon::parse($request->end_date);
            $old_start_date          = Carbon::parse($request->old_start_date);
            $old_end_date          = Carbon::parse($request->old_end_date);
         

            $event = new Event();
            if ($request->hasFile('event_logo')) {
                $eventLogo              = $request->event_logo;
                $eventLogoSaveAsName    = time(). "_event_logo." . $eventLogo->getClientOriginalExtension();
                $upload_path            = storage_path('app/public/uploads/event_logos/');
                $event_image_url        = $eventLogoSaveAsName;
                $success                = $eventLogo->move($upload_path, $eventLogoSaveAsName);
                $event->event_logo      = $eventLogoSaveAsName;
            }
            $event->created_by              = Auth::user()->id;
            $event->updated_by              = Auth::user()->id;
            $event->page_key                = $this->slug->createSlug('event',$request->event_name_in_english);
            $event->start_date              = $start_date;
            $event->end_date                = $end_date;
            $event->old_start_date          = $old_start_date;
            $event->old_end_date            = $old_end_date;
            $event->old_zone                = $request->old_zone;

            $event->is_featured             = isset($request->is_featured)?1:0;
            $event->is_actif                = isset($request->is_actif)?1:0;
            $event->status                  = $request->status;
            $event->price_per_square_meter  = $request->price_in_square_meter;
            $event->organizer_contact       = $request->organizer_contact;
            $event->organizer_telephone     = $request->organizer_telephone;
            $event->organizer_mobile        = $request->organizer_mobile;
            $event->organizer_fax           = $request->organizer_fax;
            $event->organizer_email         = $request->organizer_email;
            $event->organizer_website       = $request->organizer_website;

            $result = $event->save();

            if($image_array != null) {
                foreach($image_array as $event_image) {
                    $event_images = new EventImage();
                    if ($request->hasFile('event_image')) {
                        $eventImage                 = $event_image;
                        $eventImageSaveAsName       = rand(). "_event_image." . $event_image->getClientOriginalExtension();
                        $upload_path                = storage_path('app/public/uploads/event_images/');
                        $event_image_url            = $eventImageSaveAsName;
                        $success                    = $eventImage->move($upload_path, $eventImageSaveAsName);
                        $event_images->image        = $eventImageSaveAsName;
                    }
                    $event_images->event_id  = $event->id;
                    $event_images->save();
                }
            }
            $fileSaveAsNameEnglish = '';
            $fileSaveAsNameArabic = '';
            $fileSaveAsNameFrench = '';
            if ($request->participation_file_english != null) {

                $file = $request->participation_file_english;
                $fileSaveAsNameEnglish = $file->getClientOriginalName();
                $fileSaveAsNameInEnglish = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInEnglish);
            }
            if ($request->participation_file_arabic != null) {

                $file = $request->participation_file_arabic;
                $fileSaveAsNameArabic = $file->getClientOriginalName();
                $fileSaveAsNameInArabic = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInArabic);
            }
            if ($request->participation_file_french != null) {

                $file = $request->participation_file_french;
                $fileSaveAsNameFrench = $file->getClientOriginalName();
                $fileSaveAsNameInFrench = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInFrench);
            }
            if($request->participation_file_english != null || $request->participation_file_arabic != null || $request->participation_file_french != null) {
                $fileSaveAsNameInEnglish = isset($fileSaveAsNameInEnglish) ? $fileSaveAsNameInEnglish : '';
                $fileSaveAsNameInArabic = isset($fileSaveAsNameInArabic) ? $fileSaveAsNameInArabic: '';
                $fileSaveAsNameInFrench = isset($fileSaveAsNameInFrench) ? $fileSaveAsNameInFrench: '';
                $event_document = new EventDocument();
                $event_document->event_id  = $event->id;
                $event_document->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'ar'=>$fileSaveAsNameArabic,'fr'=>$fileSaveAsNameFrench]);
                $event_document->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'ar'=>$fileSaveAsNameInArabic,'fr'=>$fileSaveAsNameInFrench]);
                $event_document->document_type = "participation_file";
                $event_document->save();
            }

            if ($request->first_event_document_english != null) {

                $file = $request->first_event_document_english;
                $fileSaveAsNameEnglish = $file->getClientOriginalName();
                $fileSaveAsNameInEnglish = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInEnglish);
            }
            if ($request->first_event_document_arabic != null) {

                $file = $request->first_event_document_arabic;
                $fileSaveAsNameArabic = $file->getClientOriginalName();
                $fileSaveAsNameInArabic = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInArabic);
            }
            if ($request->first_event_document_french != null) {

                $file = $request->first_event_document_french;
                $fileSaveAsNameFrench = $file->getClientOriginalName();
                $fileSaveAsNameInFrench = time()."-".$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInFrench);
            }
            if($request->first_event_document_english != null || $request->first_event_document_arabic != null || $request->first_event_document_french != null) {
                $fileSaveAsNameInEnglish = isset($fileSaveAsNameInEnglish) ? $fileSaveAsNameInEnglish : '';
                $fileSaveAsNameInArabic = isset($fileSaveAsNameInArabic) ? $fileSaveAsNameInArabic: '';
                $fileSaveAsNameInFrench = isset($fileSaveAsNameInFrench) ? $fileSaveAsNameInFrench: '';
                $event_document = new EventDocument();
                $event_document->event_id  = $event->id;
                $event_document->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'ar'=>$fileSaveAsNameArabic,'fr'=>$fileSaveAsNameFrench]);
                $event_document->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'ar'=>$fileSaveAsNameInArabic,'fr'=>$fileSaveAsNameInFrench]);
                $event_document->document_type = "first_document";
                $event_document->save();
            }
            $second_fileSaveAsNameEnglish = '';
            $second_fileSaveAsNameArabic = '';
            $second_fileSaveAsNameFrench = '';
            if ($request->second_event_document_english != null) {

                $second_file = $request->second_event_document_english;
                $second_fileSaveAsNameEnglish = $second_file->getClientOriginalName();
                $second_fileSaveAsNameInEnglish = time()."-".$second_file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $second_file->move($upload_path, $second_fileSaveAsNameInEnglish);
            }
            if ($request->second_event_document_arabic != null) {

                $second_file = $request->second_event_document_arabic;
                $second_fileSaveAsNameArabic = $second_file->getClientOriginalName();
                $second_fileSaveAsNameInArabic = time()."-".$second_file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $second_file->move($upload_path, $second_fileSaveAsNameInArabic);
            }
            if ($request->second_event_document_french != null) {

                $second_file = $request->second_event_document_french;
                $second_fileSaveAsNameFrench = $second_file->getClientOriginalName();
                $second_fileSaveAsNameInFrench = time()."-".$second_file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/event_documents/');
                $success = $second_file->move($upload_path, $second_fileSaveAsNameInFrench);
            }
            if($request->second_event_document_english != null || $request->second_event_document_arabic != null || $request->second_event_document_french != null) {
                $second_fileSaveAsNameInEnglish = isset($second_fileSaveAsNameInEnglish) ? $second_fileSaveAsNameInEnglish : '';
                $second_fileSaveAsNameInArabic = isset($second_fileSaveAsNameInArabic) ? $second_fileSaveAsNameInArabic: '';
                $second_fileSaveAsNameInFrench = isset($second_fileSaveAsNameInFrench) ? $second_fileSaveAsNameInFrench: '';
                $event_document = new EventDocument();
                $event_document->event_id  = $event->id;
                $event_document->document_name = json_encode(['en'=>$second_fileSaveAsNameEnglish,'ar'=>$second_fileSaveAsNameArabic,'fr'=>$second_fileSaveAsNameFrench]);
                $event_document->document =  json_encode(['en'=>$second_fileSaveAsNameInEnglish,'ar'=>$second_fileSaveAsNameInArabic,'fr'=>$second_fileSaveAsNameInFrench]);
                $event_document->document_type = "second_document";
                $event_document->save();
            }


            $event->sectors()->sync($request->sectors);
            $event->zones()->sync($request->zones);

            foreach($event_data as $key => $value) {
                $event_translation                       = new EventTranslate();

                $event_translation->title                = $value['event_name'];
                $event_translation->event_type           = $value['event_type'];
                $event_translation->event_edition        = $value['event_edition'];
                $event_translation->description          = $value['description'];
                $event_translation->event_summary        = $value['summary'];
                $event_translation->organizer_agency     = $value['organizer_agency'];
                $event_translation->organizer_address    = $value['organizer_address'];
                $event_translation->organizer_job_title  = $value['organizer_job_title'];
                $event_translation->place                = $value['place_name'];
                $event_translation->source               = $value['source_name'];
                $event_translation->event_id             = $event->id;
                $event_translation->locale               = $value['locale'];

                $event_translation->save();
            }
            $count = 0;
            if($request->email) {
                foreach($request->email as $exhibitors){
                    $exhibitor = new Exhibitor();
                    if($request->exhibitor_logo != null) {
                        $exhibitorLogo                  = $request->exhibitor_logo[$count];
                        $exhibitorLogoSaveAsName        = rand(). "_exhibitor_logo." . $exhibitorLogo->getClientOriginalExtension();
                        $upload_path                    = storage_path('app/public/uploads/exhibitor_logos/');
                        $exhibitor_image_url            = $eventLogoSaveAsName;
                        $success                        = $exhibitorLogo->move($upload_path, $exhibitorLogoSaveAsName);
                        $exhibitor->exhibitors_logo     = $exhibitorLogoSaveAsName;
                    }
                    $exhibitor->created_by      = Auth::user()->id;
                    $exhibitor->updated_by      = Auth::user()->id;
                    $exhibitor->event_id        = $event->id;
                    $exhibitor->email_address   = $exhibitors;
                    $exhibitor->contact         = $request->contact[$count];
                    $exhibitor->display_order   = $request->display_order[$count];
                    $exhibitor->status          = isset($request->status[$count])?1:0;
                    $exhibitor->save();

                    Exhibitor::where('display_order','>=',$request->display_order[$count])
                                ->where('id','!=',$exhibitor->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

                    foreach($exhibitor_data[$count] as $key => $value){
                        $exhibitor_translate                = new ExhibitorTranslate();

                        $exhibitor_translate->exhibitor_id  = $exhibitor->id;
                        $exhibitor_translate->name          = $value['name'];
                        $exhibitor_translate->locale        = $value['locale'];

                        $exhibitor_translate->save();
                    }
                    $count ++;
                }
            }

            if($result) {
                DB::commit();
                return redirect('admin/manage-event')->with('success', 'Event added succsessfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-event')->with('error', 'Something went wrong!');
            }
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
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
            $event = Event::with('sectors', 'zones','eventExhibitor','eventExhibitor.localeAll')->findOrFail($id);
            // Setting the translated fields to edit
            foreach ($event->localeAll as $translate) {
                switch ($translate->locale) {
                    case 'en':
                        $event->event_name_in_english           = $translate->title ;
                        $event->event_type_in_english           = $translate->event_type;
                        $event->event_edition_in_english        = $translate->event_edition;
                        $event->description_in_english          = $translate->description;
                        $event->summary_in_english              = $translate->event_summary ;
                        $event->place_name_in_english           = $translate->place;
                        $event->source_name_in_english          = $translate->source;
                        $event->organizer_agency_in_english     = $translate->organizer_agency;
                        $event->organizer_address_in_english    = $translate->organizer_address;
                        $event->organizer_job_title_in_english  = $translate->organizer_job_title;

                        break;
                    case 'ar':
                        $event->event_name_in_arabic            = $translate->title;
                        $event->event_type_in_arabic            = $translate->event_type;
                        $event->event_edition_in_arabic         = $translate->event_edition;
                        $event->description_in_arabic           = $translate->description;
                        $event->summary_in_arabic               = $translate->event_summary;
                        $event->place_name_in_arabic            = $translate->place;
                        $event->source_name_in_arabic           = $translate->source;
                        $event->organizer_agency_in_arabic      = $translate->organizer_agency;
                        $event->organizer_address_in_arabic     = $translate->organizer_address;
                        $event->organizer_job_title_in_arabic   = $translate->organizer_job_title;

                        break;
                    case 'fr':
                        $event->event_name_in_french            = $translate->title ;
                        $event->event_type_in_french            = $translate->event_type;
                        $event->event_edition_in_french         = $translate->event_edition;
                        $event->description_in_french           = $translate->description;
                        $event->summary_in_french               = $translate->event_summary;
                        $event->place_name_in_french            = $translate->place;
                        $event->source_name_in_french           = $translate->source;
                        $event->organizer_agency_in_french      = $translate->organizer_agency;
                        $event->organizer_address_in_french     = $translate->organizer_address;
                        $event->organizer_job_title_in_french   = $translate->organizer_job_title;

                        break;
                }
            }

            $selected_sectors = [];
            $selected_zones = [];
            foreach ($event->sectors as $sector) {
                $selected_sectors[]= (string)$sector->id;
            }

            foreach ($event->zones as $zone) {
                $selected_zones[]= (string)$zone->id;
            }

            $sectors    = Sector::all();
            $sector_arr = new \stdClass();
            foreach ($sectors as $sector) {
                foreach ($sector->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $sector_arr->{$translate->sector_id} = $translate->name;
                    }
                }
            }
            $zones      = Zone::all();
            $zone_arr   = new \stdClass();

            foreach ($zones as $zone) {
                foreach ($zone->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $zone_arr->{$translate->zone_id} = $translate->name;
                    }
                }
            }

            $display_order = Exhibitor::max('display_order');
            if($display_order == 0)
                $display_order = 1;
            else
                $display_order;
            $exhibitor = view('admin.event.exhibitors')->render();
            return view('admin.event.edit', compact('event','sector_arr','selected_sectors','zone_arr','selected_zones','exhibitor','display_order'));

        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
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

        $rules = [
            'event_logo'                    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'event_name_in_english'         => 'required',
            'event_name_in_arabic'          => 'required',
            'event_name_in_french'          => 'required',
            'description_in_english'        => 'required',
            'description_in_arabic'         => 'required',
            'description_in_french'         => 'required',
            'place_name_in_english'         => 'required',
            'place_name_in_arabic'          => 'required',
            'place_name_in_french'          => 'required',
            'sectors'                       => 'required|array|min:1',
            'zones'                         => 'required|array|min:1',
            'start_date'                    => 'required',
            'price_in_square_meter'         => 'required',
            'organizer_agency_in_english'   => 'required',
            'organizer_agency_in_arabic'    => 'required',
            'organizer_agency_in_french'    => 'required',
            'organizer_address_in_english'  => 'required',
            'organizer_address_in_arabic'   => 'required',
            'organizer_address_in_french'   => 'required',
            'organizer_contact'             => 'required',
            'organizer_email'               => 'required',
            'event_image.*'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'event_reference.*'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'exhibitor_logo.*'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'organizer_website'             => 'nullable|url',
            // 'exhibitor_name_in_english'     => 'required|array|min:1',
            // 'exhibitor_name_in_english.0'   => 'required|string|distinct|min:1',
            // 'exhibitor_name_in_arabic'      => 'required|array|min:1',
            // 'exhibitor_name_in_arabic.0'    => 'required|string|distinct|min:1',
            // 'exhibitor_name_in_french'      => 'required|array|min:1',
            // 'exhibitor_name_in_french.0'    => 'required|string|distinct|min:1',
            // 'contact'                       => 'required|array|min:1',
            // 'contact.0'                     => 'required|string|distinct|min:1',
            // 'display_order'                 => 'required|array|min:1',
            // 'display_order.0'               => 'required|string|distinct|min:1',
            // 'source_name_in_english'        => 'required',
            // 'source_name_in_arabic'         => 'required',
            // 'source_name_in_french'         => 'required',
        ];
        $customMessages = [
            'exhibitor_name_in_english.0.required'  => 'The exhibitor name in english field is required.',
            'exhibitor_name_in_arabic.0.required'   => 'The exhibitor name in english field is required.',
            'exhibitor_name_in_french.0.required'   => 'The exhibitor name in english field is required.',
            'email.0.required'                      => 'The email field is required.',
            'contact.0.required'                    => 'The contact no is required.',
            'display_order.0.required'              => 'The display order field is required.',
        ];
        $this->validate($request, $rules, $customMessages);
        if($request->event_type_in_english == null || $request->event_type_in_arabic == null || $request->event_type_in_french == null){
            $request->event_type_in_english     = null;
            $request->event_type_in_arabic      = null;
            $request->event_type_in_french      = null;
        }
        if($request->event_edition_in_english == null || $request->event_edition_in_arabic == null || $request->event_edition_in_french == null){
            $request->event_edition_in_english  = null;
            $request->event_edition_in_arabic   = null;
            $request->event_edition_in_french   = null;
        }
        if($request->summary_in_english == null || $request->summary_in_arabic == null || $request->summary_in_french == null){
            $request->summary_in_english    = null;
            $request->summary_in_arabic     = null;
            $request->summary_in_french     = null;
        }

        $exhibitorId                = [];
        $exhibitor_name_in_english  = [];
        $exhibitor_name_in_arabic   = [];
        $exhibitor_name_in_french   = [];
        $contact                    = [];
        $display_order              = [];

        if($request->exhibitor_id !=null) {
            $count_of_id =count($request->exhibitor_id);
            if($count_of_id > 0){

                for($iteration = 0 ; $iteration < $count_of_id; $iteration++ ) {
                    if (empty($request->exhibitor_name_in_english[$iteration])) {
                        continue;
                    }
                    if (empty($request->exhibitor_name_in_arabic[$iteration])) {
                        continue;
                    }
                    if (empty($request->exhibitor_name_in_french[$iteration])) {
                        continue;
                    }
                    if (empty($request->contact[$iteration])) {
                        continue;
                    }
                    if (empty($request->display_order[$iteration])) {
                        continue;
                    }

                    $exhibitorId[]               = $request->exhibitor_id[$iteration];
                    $exhibitor_name_in_english[] = $request->exhibitor_name_in_english[$iteration];
                    $exhibitor_name_in_arabic[]  = $request->exhibitor_name_in_arabic[$iteration];
                    $exhibitor_name_in_french[]  = $request->exhibitor_name_in_french[$iteration];
                    $email[]                     = $request->email[$iteration];
                    $contact[]                   = $request->contact[$iteration];
                    $display_order[]             = $request->display_order[$iteration];


                }
            }
            $request->exhibitor_id                  = $exhibitorId;
            $request->exhibitor_name_in_english     = $exhibitor_name_in_english;
            $request->exhibitor_name_in_arabic      = $exhibitor_name_in_arabic;
            $request->exhibitor_name_in_french      = $exhibitor_name_in_french;
            $request->email                         = $email;
            $request->contact                       = $contact;
            $request->display_order                 = $display_order;
        }

        DB::beginTransaction();
        try {
            $event = Event::findOrFail($id);
            if ($request->hasFile('event_logo')) {
                if(file_exists('storage/uploads/event_logos/'.$event->event_logo)) {
                    unlink('storage/uploads/event_logos/'.$event->event_logo);
                }
                $eventLogo              = $request->event_logo;
                $eventLogoSaveAsName    = time(). "_event_logo." . $eventLogo->getClientOriginalExtension();
                $upload_path            = storage_path('app/public/uploads/event_logos/');
                $event_image_url        = $eventLogoSaveAsName;
                $success                = $eventLogo->move($upload_path, $eventLogoSaveAsName);
                $event->event_logo      = $eventLogoSaveAsName;
            }

            $image_array = [];
            $explode_removedImage = explode(",", $request->event_image_removed);
            if ($request->event_image) {

                foreach ($request->event_image as $value) {
                    $Image_name = $value->getClientOriginalName();
                    if(!in_array($Image_name, $explode_removedImage)){
                        $image_array[] =$value;
                    }
                }
            }
            $reference_image_array = [];
            $explode_removedReferenceImage = explode(",", $request->reference_image_removed);
            if ($request->event_reference) {

                foreach ($request->event_reference as $value) {
                    $Image_name = $value->getClientOriginalName();
                    if(!in_array($Image_name, $explode_removedReferenceImage)){
                        $reference_image_array[] =$value;
                    }
                }
            }

            $start_date         = Carbon::parse($request->start_date);
            $end_date           = Carbon::parse($request->end_date);
            $old_start_date          = Carbon::parse($request->old_start_date);
            $old_end_date          = Carbon::parse($request->old_end_date);

            $event->created_by  = Auth::user()->id;
            $event->updated_by  = Auth::user()->id;

            if($request->englishTitle != $request->event_name_in_english)
            {
                $event->page_key = $this->slug->createSlug('event',$request->event_name_in_english);
            }
            $event->old_start_date          = $old_start_date;
            $event->old_end_date            = $old_end_date;
            $event->old_zone                = $request->old_zone;

            $event->start_date              = $start_date;
            $event->end_date                = $end_date;
            $event->is_featured             = isset($request->is_featured)?1:0;
            $event->is_actif                = isset($request->is_actif)?1:0;
            $event->status                  = $request->status;
            $event->price_per_square_meter  = $request->price_in_square_meter;
            $event->organizer_contact       = $request->organizer_contact;
            $event->organizer_telephone     = $request->organizer_telephone;
            $event->organizer_mobile        = $request->organizer_mobile;
            $event->organizer_fax           = $request->organizer_fax;
            $event->organizer_email         = $request->organizer_email;
            $event->organizer_website       = $request->organizer_website;

            $result = $event->update();



            $fileSaveAsNameEnglish = '';
            $fileSaveAsNameArabic = '';
            $fileSaveAsNameFrench = '';
            if($request->first_event_document_english != null || $request->first_event_document_arabic != null || $request->first_event_document_french != null){
                $document_id = $request->document_first_id;
                if($document_id != null){
                    $event_document = EventDocument::where('id',$document_id)->first();
                    $document_name = json_decode($event_document->document_name);
                    $fileSaveAsNameEnglish = $document_name->en;
                    $fileSaveAsNameArabic = $document_name->ar;
                    $fileSaveAsNameFrench = $document_name->fr;

                }else {
                    $event_document = new EventDocument();
                }
                if ($request->first_event_document_english != null) {

                    $file = $request->first_event_document_english;
                    $fileSaveAsNameEnglish = $file->getClientOriginalName();
                    $fileSaveAsNameInEnglish = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInEnglish);
                }
                if ($request->first_event_document_arabic != null) {

                    $file = $request->first_event_document_arabic;
                    $fileSaveAsNameArabic = $file->getClientOriginalName();
                    $fileSaveAsNameInArabic = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInArabic);
                }
                if ($request->first_event_document_french != null) {

                    $file = $request->first_event_document_french;
                    $fileSaveAsNameFrench = $file->getClientOriginalName();
                    $fileSaveAsNameInFrench = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInFrench);
                }
                if($request->first_event_document_english != null || $request->first_event_document_arabic != null || $request->first_event_document_french != null) {
                    $fileSaveAsNameInEnglish = isset($fileSaveAsNameInEnglish) ? $fileSaveAsNameInEnglish : '';
                    $fileSaveAsNameInArabic = isset($fileSaveAsNameInArabic) ? $fileSaveAsNameInArabic: '';
                    $fileSaveAsNameInFrench = isset($fileSaveAsNameInFrench) ? $fileSaveAsNameInFrench: '';
                    $event_document->event_id  = $event->id;
                    $event_document->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'ar'=>$fileSaveAsNameArabic,'fr'=>$fileSaveAsNameFrench]);
                    $event_document->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'ar'=>$fileSaveAsNameInArabic,'fr'=>$fileSaveAsNameInFrench]);
                    $event_document->document_type = "first_document";
                    $event_document->save();
                }

            }
            $second_fileSaveAsNameEnglish = '';
            $second_fileSaveAsNameArabic = '';
            $second_fileSaveAsNameFrench = '';
            if($request->second_event_document_english != null || $request->second_event_document_arabic != null || $request->second_event_document_french != null){
                $document_id = $request->document_second_id;
                if($document_id != null){
                    $event_document = EventDocument::where('id',$document_id)->first();
                    $document_name = json_decode($event_document->document_name);
                    $second_fileSaveAsNameEnglish = $document_name->en;
                    $second_fileSaveAsNameArabic = $document_name->ar;
                    $second_fileSaveAsNameFrench = $document_name->fr;

                }else {
                    $event_document = new EventDocument();
                }
                if ($request->second_event_document_english != null) {

                    $second_file = $request->second_event_document_english;
                    $second_fileSaveAsNameEnglish = $second_file->getClientOriginalName();
                    $second_fileSaveAsNameInEnglish = time()."-".$second_file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $second_file->move($upload_path, $second_fileSaveAsNameInEnglish);
                }
                if ($request->second_event_document_arabic != null) {

                    $second_file = $request->second_event_document_arabic;
                    $second_fileSaveAsNameArabic = $second_file->getClientOriginalName();
                    $second_fileSaveAsNameInArabic = time()."-".$second_file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $second_file->move($upload_path, $second_fileSaveAsNameInArabic);
                }
                if ($request->second_event_document_french != null) {

                    $second_file = $request->second_event_document_french;
                    $second_fileSaveAsNameFrench = $second_file->getClientOriginalName();
                    $second_fileSaveAsNameInFrench = time()."-".$second_file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $second_file->move($upload_path, $second_fileSaveAsNameInFrench);
                }
                if($request->second_event_document_english != null || $request->second_event_document_arabic != null || $request->second_event_document_french != null) {
                    $second_fileSaveAsNameInEnglish = isset($second_fileSaveAsNameInEnglish) ? $second_fileSaveAsNameInEnglish : '';
                    $second_fileSaveAsNameInArabic = isset($second_fileSaveAsNameInArabic) ? $second_fileSaveAsNameInArabic: '';
                    $second_fileSaveAsNameInFrench = isset($second_fileSaveAsNameInFrench) ? $second_fileSaveAsNameInFrench: '';
                    $event_document->event_id  = $event->id;
                    $event_document->document_name = json_encode(['en'=>$second_fileSaveAsNameEnglish,'ar'=>$second_fileSaveAsNameArabic,'fr'=>$second_fileSaveAsNameFrench]);
                    $event_document->document =  json_encode(['en'=>$second_fileSaveAsNameInEnglish,'ar'=>$second_fileSaveAsNameInArabic,'fr'=>$second_fileSaveAsNameInFrench]);
                    $event_document->document_type = "second_document";
                    $event_document->save();
                }

            }


            if($request->participation_file_english != null || $request->participation_file_arabic != null || $request->participation_file_french != null){
                $document_id = $request->participation_file_id;
                if($document_id != null){
                    $event_document = EventDocument::where('id',$document_id)->first();
                    $document_name = json_decode($event_document->document_name);
                    $fileSaveAsNameEnglish = $document_name->en;
                    $fileSaveAsNameArabic = $document_name->ar;
                    $fileSaveAsNameFrench = $document_name->fr;

                }else {
                    $event_document = new EventDocument();
                }
                if ($request->participation_file_english != null) {

                    $file = $request->participation_file_english;
                    $fileSaveAsNameEnglish = $file->getClientOriginalName();
                    $fileSaveAsNameInEnglish = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInEnglish);
                }
                if ($request->participation_file_arabic != null) {

                    $file = $request->participation_file_arabic;
                    $fileSaveAsNameArabic = $file->getClientOriginalName();
                    $fileSaveAsNameInArabic = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInArabic);
                }
                if ($request->participation_file_french != null) {

                    $file = $request->participation_file_french;
                    $fileSaveAsNameFrench = $file->getClientOriginalName();
                    $fileSaveAsNameInFrench = time()."-".$file->getClientOriginalName();
                    $upload_path = storage_path('app/public/uploads/event_documents/');
                    $success = $file->move($upload_path, $fileSaveAsNameInFrench);
                }
                if($request->participation_file_english != null || $request->participation_file_arabic != null || $request->participation_file_french != null) {
                    $fileSaveAsNameInEnglish = isset($fileSaveAsNameInEnglish) ? $fileSaveAsNameInEnglish : '';
                    $fileSaveAsNameInArabic = isset($fileSaveAsNameInArabic) ? $fileSaveAsNameInArabic: '';
                    $fileSaveAsNameInFrench = isset($fileSaveAsNameInFrench) ? $fileSaveAsNameInFrench: '';
                    $event_document->event_id  = $event->id;
                    $event_document->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'ar'=>$fileSaveAsNameArabic,'fr'=>$fileSaveAsNameFrench]);
                    $event_document->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'ar'=>$fileSaveAsNameInArabic,'fr'=>$fileSaveAsNameInFrench]);
                    $event_document->document_type = "participation_file";
                    $event_document->save();
                }
            }



            $trans_events = [
                'en' => [
                    "title"             => $request->event_name_in_english,
                    "description"       => $request->description_in_english,
                    "place"             => $request->place_name_in_english,
                    "event_type"        => $request->event_type_in_english,
                    "event_edition"     => $request->event_edition_in_english,
                    "event_summary"     => $request->summary_in_english,
                    "organizer_agency"  => $request->organizer_agency_in_english,
                    "organizer_address" => $request->organizer_address_in_english,
                    "organizer_job_title" => $request->organizer_job_title_in_english,

                ],
                'fr' => [
                    "title"                 => $request->event_name_in_french,
                    "description"           => $request->description_in_french,
                    "place"                 => $request->place_name_in_french,
                    "event_type"            => $request->event_type_in_french,
                    "event_edition"         => $request->event_edition_in_french,
                    "event_summary"         => $request->summary_in_french,
                    "organizer_agency"      => $request->organizer_agency_in_french,
                    "organizer_address"     => $request->organizer_address_in_french,
                    "organizer_job_title"   =>$request->organizer_job_title_in_french,

                ],
                'ar' => [
                    "title"                 => $request->event_name_in_arabic,
                    "description"           => $request->description_in_arabic,
                    "place"                 => $request->place_name_in_arabic,
                    "event_type"            => $request->event_type_in_arabic,
                    "event_edition"         => $request->event_edition_in_arabic,
                    "event_summary"         => $request->summary_in_arabic,
                    "organizer_agency"      => $request->organizer_agency_in_arabic,
                    "organizer_address"     => $request->organizer_address_in_arabic,
                    "organizer_job_title"   => $request->organizer_job_title_in_arabic,
                ],
            ];
            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                EventTranslate::where(
                    [
                        [
                            'event_id', '=', $id
                        ],
                        [
                            'locale', '=', $localeCode
                        ]
                    ])
                    ->update($trans_events[$localeCode]);
            }

            $loop = 0;
            if($request->exhibitor_name_in_english != null) {
                foreach($request->exhibitor_name_in_english as $translate) {
                    $exhibitor_data[$loop] =
                    [
                        [
                            'name'          => $request->exhibitor_name_in_english[$loop],
                            'locale'        => "en",
                        ],
                        [
                            'name'          => $request->exhibitor_name_in_arabic[$loop],
                            'locale'        => "ar",
                        ],
                        [
                            'name'          => $request->exhibitor_name_in_french[$loop],
                            'locale'        => "fr",
                        ],
                    ];
                    $loop++;
                }
            }

            $loop=0;
            if($request->exhibitor_id != null) {
                foreach($request->exhibitor_id as $exhibitor_id) {
                    if($exhibitor_id != null) {

                        $exhibitor = Exhibitor::with('localeAll')->findOrFail($exhibitor_id);
                        $trans_exhibitors = [
                            'en' => [
                                "name"         => $request->exhibitor_name_in_english[$loop],
                            ],
                            'fr' => [
                                "name"         => $request->exhibitor_name_in_arabic[$loop],
                            ],
                            'ar' => [
                                "name"         => $request->exhibitor_name_in_french[$loop],
                            ],
                        ];
                        if($request->exhibitor_logo != null) {
                            if(array_key_exists($loop, $request->exhibitor_logo)) {
                                if(file_exists('storage/uploads/exhibitor_logos/'.$exhibitor->exhibitors_logo)) {
                                    unlink('storage/uploads/exhibitor_logos/'.$exhibitor->exhibitors_logo);
                                }
                                $exhibitorLogo                  = $request->exhibitor_logo[$loop];
                                $exhibitorLogoSaveAsName        = rand(). "_exhibitor_logo." . $exhibitorLogo->getClientOriginalExtension();
                                $upload_path                    = storage_path('app/public/uploads/exhibitor_logos/');
                                $exhibitor_image_url            = $exhibitorLogoSaveAsName;
                                $success                        = $exhibitorLogo->move($upload_path, $exhibitorLogoSaveAsName);
                                $exhibitor->exhibitors_logo     = $exhibitorLogoSaveAsName;
                            }
                        }
                        $exhibitor->email_address  =  $request->email[$loop];
                        $exhibitor->contact        =  $request->contact[$loop];
                        $exhibitor->display_order  =  $request->display_order[$loop];
                        $exhibitor->status         =  isset($request->status[$loop])?1:0;

                        $exhibitor->update();

                        Exhibitor::where('display_order','>=',$request->display_order[$loop])
                                    ->where('id','!=',$exhibitor->id)
                                    ->update(['display_order' => DB::raw('display_order + 1')]);

                        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                            ExhibitorTranslate::where(
                                [
                                    [
                                        'exhibitor_id', '=', $exhibitor_id
                                    ],
                                    [
                                        'locale', '=', $localeCode
                                    ]
                                ])
                                ->update($trans_exhibitors[$localeCode]);
                        }

                    }else if($exhibitor_id == null) {
                        $exhibitor = new Exhibitor();
                        if(array_key_exists($loop, $request->exhibitor_logo)) {
                            $exhibitorLogo                  = $request->exhibitor_logo[$loop];
                            $exhibitorLogoSaveAsName        = rand(). "_exhibitor_logo." . $exhibitorLogo->getClientOriginalExtension();
                            $upload_path                    = storage_path('app/public/uploads/exhibitor_logos/');
                            $exhibitor_image_url            = $exhibitorLogoSaveAsName;
                            $success                        = $exhibitorLogo->move($upload_path, $exhibitorLogoSaveAsName);
                            $exhibitor->exhibitors_logo     = $exhibitorLogoSaveAsName;
                        }

                        $exhibitor->created_by      = Auth::user()->id;
                        $exhibitor->updated_by      = Auth::user()->id;
                        $exhibitor->event_id        = $id;
                        $exhibitor->email_address   = $request->email[$loop];
                        $exhibitor->contact         = $request->contact[$loop];
                        $exhibitor->display_order   = $request->display_order[$loop];
                        $exhibitor->status          = isset($request->status[$loop])?1:0;

                        $exhibitor->save();

                        Exhibitor::where('display_order','>=',$request->display_order[$loop])
                                    ->where('id','!=',$exhibitor->id)
                                    ->update(['display_order' => DB::raw('display_order + 1')]);

                        foreach($exhibitor_data[$loop] as $key => $value){
                            $exhibitor_translate                = new ExhibitorTranslate();

                            $exhibitor_translate->exhibitor_id  = $exhibitor->id;
                            $exhibitor_translate->name          = $value['name'];
                            $exhibitor_translate->locale        = $value['locale'];

                            $exhibitor_translate->save();
                        }
                    }
                    $loop++;
                }
            }

            $event->sectors()->sync($request->sectors);
            $event->zones()->sync($request->zones);

            if ($request->hasFile('event_image')) {
                foreach($image_array as $event_image) {
                    $event_images = new EventImage();
                    if ($request->hasFile('event_image')) {
                        $eventImage             = $event_image;
                        $eventImageSaveAsName   = rand(). "_event_image." . $event_image->getClientOriginalExtension();
                        $upload_path            = storage_path('app/public/uploads/event_images/');
                        $event_image_url        = $eventImageSaveAsName;
                        $success                = $eventImage->move($upload_path, $eventImageSaveAsName);
                        $event_images->image    = $eventImageSaveAsName;
                    }
                    $event_images->event_id  = $id;
                    $event_images->save();
                }
            }

            if($request->event_reference != null) {
                foreach($reference_image_array as $event_reference) {
                    $event_references = new EventReference();
                    if ($request->hasFile('event_reference')) {
                        $eventImage                  = $event_reference;
                        $eventImageSaveAsName        = rand(). "_event_reference." . $event_reference->getClientOriginalExtension();
                        $upload_path                 = storage_path('app/public/uploads/event_references/');
                        $event_reference_url         = $eventImageSaveAsName;
                        $success                     = $eventImage->move($upload_path, $eventImageSaveAsName);
                        $event_references->image     = $eventImageSaveAsName;
                    }
                    $event_references->event_id  = $id;
                    $event_references->save();
                }
            }

            if($result) {
                DB::commit();
                return redirect('admin/manage-event')->with('success', 'Event updated successfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-event')->with('error', 'Something went wrong!');
            }
        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
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
            $eventImage= EventImage::find($request->delete);
            if(file_exists('storage/uploads/event_images/'.$eventImage->image)) {
                unlink('storage/uploads/event_images/'.$eventImage->image);
            }
            $eventImage->delete();

            return redirect()->back()->with('success', 'Event Image deleted successfully.');

        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource reference from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function referenceDestroy(Request $request)
    {
        try {
            $eventReference= EventReference::find($request->delete);
            if(file_exists('storage/uploads/event_references/'.$eventReference->image)) {
                unlink('storage/uploads/event_references/'.$eventReference->image);
            }
            $eventReference->delete();

            return redirect()->back()->with('success', 'Event Reference deleted successfully.');

        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
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
            $event = Event::with('localeAll','eventImage','eventSector')->find($id);
            $event = Event::with('sectors', 'zones','eventExhibitor','eventExhibitor.localeAll')->findOrFail($id);

            foreach($event->eventImage as $eventImage) {
                if(file_exists('storage/uploads/event_images/'.$eventImage->image)) {
                    unlink('storage/uploads/event_images/'.$eventImage->image);
                }
            }
            $event->localeAll()->delete();
            $event->eventImage()->delete();
            $event->sectors()->detach();
            $event->zones()->detach();
            $event->eventExhibitor()->delete();
            $event->delete();
            $request->session()->flash('success', 'Event deleted successfully.');
            return redirect()->route('manage-event.index');

        } catch(\Throwable $th) {
            return redirect()->route('manage-event.index')->with('error', 'Something went wrong!');
        }
    }

     /**
     * Remove the specified resource image from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteExhibitor(Request $request)
    {
        try {
            $exhibitor= Exhibitor::with('localeAll')->find($request->delete);
            $exhibitor->localeAll()->delete();
            $exhibitor->delete();
            return redirect()->back()->with('success', 'Exhibitor deleted successfully.');
        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
        }
    }

     /**
     * Show the form for uploading the upcoming events.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function upload()
    {
        return view('admin.event.upload');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function uploadDocument(Request $request)
    {

            $rules = [
                'document_in_english'          => 'file|mimes:pdf',
                'document_in_arabic'           => 'file|mimes:pdf',
                'document_in_french'           => 'file|mimes:pdf',
            ];
            $customMessages = [
                'document_in_english'         => 'The document type must be pdf.',
                'document_in_arabic'          => 'The document type must be pdf.',
                'document_in_french'          => 'The document type must be pdf.',
            ];
            $this->validate($request, $rules, $customMessages);

        try {
            if($request->document_in_english != null){
                if(file_exists('storage/uploads/upcoming_event/en_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/en_download.pdf');
                }
                $file                           = $request->document_in_english;
                $imageSaveAsName                = "en_download.". $file->getClientOriginalExtension();
                $upload_path                    = storage_path('app/public/uploads/upcoming_event/');
                $success                        = $file->move($upload_path, $imageSaveAsName);
            }

            if($request->document_in_arabic != null){
                if(file_exists('storage/uploads/upcoming_event/ar_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/ar_download.pdf');
                }
                $file                           = $request->document_in_arabic;
                $imageSaveAsName                = "ar_download." . $file->getClientOriginalExtension();
                $upload_path                    = storage_path('app/public/uploads/upcoming_event/');
                $success                        = $file->move($upload_path, $imageSaveAsName);
            }

            if($request->document_in_french != null){
                if(file_exists('storage/uploads/upcoming_event/fr_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/fr_download.pdf');
                }
                $file                           = $request->document_in_french;
                $imageSaveAsName                = "fr_download." . $file->getClientOriginalExtension();
                $upload_path                    = storage_path('app/public/uploads/upcoming_event/');
                $success                        = $file->move($upload_path, $imageSaveAsName);
            }
            return redirect('admin/manage-event')->with('success', 'Upcoming event document uolpaded successfully.');

        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
        }

    }

     /**
     * Remove the specified resource image from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteDocument(Request $request,$locale)
    {

        try {
            if($locale == 'en') {
                if(file_exists('storage/uploads/upcoming_event/en_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/en_download.pdf');
                }
            }
            if($locale == 'fr') {
                if(file_exists('storage/uploads/upcoming_event/fr_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/fr_download.pdf');
                }
            }
            if($locale == 'ar') {
                if(file_exists('storage/uploads/upcoming_event/ar_download.pdf')) {
                    unlink('storage/uploads/upcoming_event/ar_download.pdf');
                }
            }
            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
        }
    }

     /**
     * Remove the specified resource image from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteEventDocument(Request $request)
    {
        try {
            $event_document = EventDocument::find($request->delete);
            $event_document->delete();
            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch(\Exception $e) {
            return redirect()->route('manage-event.index')->with('error', json_encode($e->getMessage()));
        }
    }
}
