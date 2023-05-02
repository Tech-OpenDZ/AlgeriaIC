<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessOpportunity;
use App\Models\BusinessOpportunityTranslate;
use App\Models\BusinessOpportunityDocument;
use App\Models\Sector;
use App\User;
use Auth;
use LaravelLocalization;
use App\Models\Zone;
use Carbon\Carbon;
use App\Services\Slug;



class BusinessOpportunityController extends Controller
{
    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
    }

    public function index(Request $request)
    {
       /* $user = Auth::guard('customer')->user();
        if(!$user->can('has-permission', ['business_opportunities_business_opportunities', $user])) {
           
            $result = upgradePlan();
            $subscriptions = $result['subscriptions'];
            $page = $result['page'];

            return view('frontend.upgrade_plan.index',compact('subscriptions','page'));
        } */
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('date') && !empty($request->get('date'))) {
            $boCondition = [['activated', 1],['created_at', 'LIKE', '%' . $request->get('date') . '%']];
        } else {
            $boCondition = [['activated', 1]];
        }

        $business_opportunities = BusinessOpportunity::
        whereHas(
            'localeAll',
            function ($query) use ($currentLocale, $request) {

                if ($request->has('company') && !empty($request->get('company'))) {
                    return $query->where('locale', $currentLocale)
                        ->where(function ($innerQuery) use ($request) {
                            $innerQuery->where('company_name', 'LIKE', '%' . $request->get('company') . '%')
                                        ->orWhere('project_title', 'LIKE', '%' . $request->get('company') . '%');
                        });
                }else {
                    return $query->where('locale', $currentLocale);
                }
            }
        )
        ->whereHas(
            'sectors',
            function ($query) use ($currentLocale, $request) {
                if ($request->has('sector') && !empty($request->get('sector'))) {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ])
                        ->whereIn('sectors.id', $request->get('sector'));
                } else {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
                }
            }
        )
        ->whereHas(
            'zones',
            function ($query) use ($currentLocale, $request) {
                if ($request->has('zone') && !empty($request->get('zone'))) {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ])
                        ->whereIn('zones.id', $request->get('zone'));
                } else {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
                }
            }
        )
        ->with([
            'localeAll' => function ($query) use ($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'sectors' => function ($query) use ($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    }
                ])
                ->get();
            },
            'zones' => function ($query) use ($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    }
                ])
                ->get();
            }
        ])

        ->where($boCondition);
        $business_opportunities = $business_opportunities->orderBy('created_at','desc');
        $business_opportunities = $business_opportunities->paginate(8);

        $listFor = 'Upcoming business opportunity';
        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $newsCount = count($business_opportunities);

        $businessOpportunityList = $business_opportunities;

        if ($page == 1 || !$businessOpportunityList->isEmpty() ) {
            $next_business_opportunity = view('frontend.business_opportunity.next_business_opportunity', compact('businessOpportunityList', 'page', 'listFor'))->render();
        }
        else {
            $next_business_opportunity = "";
        } 

        $sectors_arr = Sector::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
            ->where('status', 1)
            ->get();

        foreach($sectors_arr as $sector){
            $sectors[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($sectors);

        $zone_arr = Zone::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
            ->where('status', 1)
            ->get();

        $zones = [];
        foreach($zone_arr as $zone){
            $zones[$zone->id] = $zone->localeAll[0]->name;
        }
        asort($zones);

        $business_opportunities = BusinessOpportunity::where('activated',1)->limit(6)->orderBy('created_at','desc')->orderBy('display_order','desc')->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with(['localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        },'sectors.localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        }])->get(); 
        
        
        $sidebar_key = 'business_opportunity';
        return view(
            'frontend.business_opportunity.index',
            compact(
                'next_business_opportunity',
                'sidebar_key',
                'sectors',
                'zones',
                'newsCount',
                'business_opportunities',
                'businessOpportunityList'
            )
        );

       
    }

    public function create()
    {
        /*$user = Auth::guard('customer')->user();
        if(!$user->can('has-permission', ['business_opportunities_business_opportunities', $user])) {
            return redirect('upgrade-plan');
        }
        $sidebar_key = 'business_opportunity';
        $user = Auth::guard('customer')->user();

        if(!$user->can('has-permission', ['business_opportunities_business_opportunities', $user])) {
            return redirect('upgrade-plan');
        }
*/
        //return view('frontend.business_opportunity.create',compact('sidebar_key'));   =>  je l'aurai besoin  de tout ca quand on remettra add-opportunity avec autentification
        return view('frontend.business_opportunity.create');
    }

    public function show($sector_id,$id)
    {
       /* $user = Auth::guard('customer')->user();
        if(!$user->can('has-permission', ['business_opportunities_business_opportunities', $user])) {
            return redirect('upgrade-plan');
        }*/    // Je vais décommenter ca quand ca sera avec authentification
        $currentLocale = LaravelLocalization::getCurrentLocale();

        
        $sector = Sector::where('page_key', $sector_id)
        ->orWhere('id', $sector_id)
        ->with(['localeAll' => function ($query) use ($currentLocale) {
            return $query->where('locale', $currentLocale)->select('sector_id', 'name')->get();
        }])
        ->first();

        if($sector == null) {
            abort(404);
        }
        $sector_id = $sector->id;
        // $sector_id = $sector->page_key;


        $business_opportunity = BusinessOpportunity::
        with(['localeAll' => function ($query) use ($currentLocale) {
            return $query->where('locale', $currentLocale)->select('*')->get();
        }])
        ->whereHas(
            'sectors',
            function ($query) use ($currentLocale) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        )
        ->where('page_key',$id)
        ->orWhere('id',$id)
        ->first();
      

        if($business_opportunity == null) {
            abort(404);
        }
        // dd($business_opportunity->sectors[0]->localeAll);
        $next = BusinessOpportunity::
        whereHas(
            'sectors',
            function ($query) use ($currentLocale, $sector_id) {
                return $query->where('sector_id', $sector_id)->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        )
        ->where('id', '>', $business_opportunity->id)->orderBy('id', 'asc')->first();

        $previous = BusinessOpportunity::
        whereHas(
            'sectors',
            function ($query) use ($currentLocale, $sector_id) {
                return $query->where('sector_id', $sector_id)->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        )
        ->where('id', '<', $business_opportunity->id)->orderBy('id', 'desc')->first();

        $similar_announcements = BusinessOpportunity::where('activated', 1)
        ->where('page_key','!=',$id)
        ->with(['localeAll' => function ($query) use ($currentLocale) {
            return $query->where('locale', $currentLocale)->select('*')->get();
        }])
        ->whereHas(
            'sectors',
            function ($query) use ($currentLocale, $sector_id) {
                return $query->where('sector_id', $sector_id)->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        )
        ->take(10)
        ->get();

        $sidebar_key = 'business_opportunity';
        return view('frontend.business_opportunity.show', compact('sector', 'business_opportunity', 'similar_announcements', 'next','previous', 'sector_id','sidebar_key'));
    }

    public function sector_details($id)
    {
        $user = Auth::guard('customer')->user();
        if(!$user->can('has-permission', ['business_opportunities_business_opportunities', $user])) {
            return redirect('upgrade-plan');
        }
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $sector = Sector::where('page_key',$id)
        ->with(['localeAll' => function ($query) use ($currentLocale) {
            return $query->where('locale', $currentLocale)->select('sector_id', 'name')->get();
        }])
        ->first();

        $sector_id = $sector->id;

        $business_opportunities = BusinessOpportunity::where('activated', 1)
        ->with(['localeAll' => function ($query) use ($currentLocale) {
            return $query->where('locale', $currentLocale)->select('business_opportunity_id', 'project_description','project_title')->get();
        }])
        ->whereHas(
            'sectors',
            function ($query) use ($currentLocale,$sector_id) {
                return $query->where('sector_id', $sector_id)->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        )
        ->paginate(10);

        $pagination = $business_opportunities->links(
            'frontend.business_opportunity.pagination',
            [
                'previousPageUrl'   => $business_opportunities->previousPageUrl(),
                'listPageUrl'       => $business_opportunities->links(),
                'nextPageUrl'       => $business_opportunities->nextPageUrl()
            ]
        );

        //return $business_opportunities;
        $sidebar_key = 'business_opportunity';
        return view('frontend.business_opportunity.sector_details',compact('business_opportunities','sector','pagination','sidebar_key'));
    }


    public function store(Request $request)
    {

        // Logic to validate form data
         $validatedData = $request->validate(
            [

                'project_title'                 => 'required',
                'company_name'                  => 'required',
                'contact_person'                => 'required',
                'company_email'                =>  'email|required',
                'company_contact'                => 'required',
                'project_description'           => 'required',
                
                
               

                'logo'                          => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
                'image'                         => 'image|mimes:jpeg,png,jpg,gif|max:1024',
                'company_presentation_file'     => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:1024',
                'documents.*'                   => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:1024'
            ],
            [
                'documents.*.mimes'             => 'Only ppt,pptx,doc,docx,pdf,xls,xlsx files are allowed',
                'documents.*.max'               => 'Sorry! Maximum 1 MB file are allowed to upload',
                'image.image'                   => 'Only jpeg,png,jpg,gif files are allowed',
                'company_presentation_file.max' => 'Sorry! Maximum 1 MB file are allowed to upload',
            ]

        );

        $business_opportunity = new BusinessOpportunity;
        if ($request->hasFile('image')) {
            $Image                          = $request->file('image');
            $ImageSaveAsName                = time() . "_image." . $Image->getClientOriginalExtension();
            $business_opportunity->image    = $ImageSaveAsName;
        }
        if ($request->hasFile('logo')) {
            $logoImage                      = $request->file('logo');
            $logoImageSaveAsName            = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $business_opportunity->logo     = $logoImageSaveAsName;
        }
        if ($request->hasFile('company_presentation_file')) {
            $company_presentation_file                          = $request->file('company_presentation_file');
            $fileSaveAsName                                     = time() . "_presentation_file." . $company_presentation_file->getClientOriginalExtension();
            $business_opportunity->company_presentation_file    = $fileSaveAsName;
        }

        $business_opportunity->created_by                   = 1;
        $business_opportunity->updated_by                   = 1;
        $business_opportunity->company_email = $request->company_email;
        $business_opportunity->company_contact = $request->company_contact;

        $business_opportunity->reference_no_of_opportunity  = date("Y") . rand(1000, 9999);
        $business_opportunity->page_key                     = $this->slug->createSlug('business_opportunity', $request->project_title);

        $result = $business_opportunity->save();

        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($result) {
            // insert data in translate table
            $business_opportunity_translation                           = new BusinessOpportunityTranslate();

            $business_opportunity_translation->business_opportunity_id  = $business_opportunity->id;
            $business_opportunity_translation->locale                   = $currentLocale;
            $business_opportunity_translation->project_title            = $request->project_title;
            $business_opportunity_translation->company_name             = $request->company_name;
            $business_opportunity_translation->contact_person           = $request->contact_person;
           
            $business_opportunity_translation->project_description      = $request->project_description;
            

            $business_opportunity_translation->save();

            // insert data in documents table
            if ($request->hasFile('documents')) {
                foreach ($request->documents as $document) {
                    $bo_documents = new BusinessOpportunityDocument();
                    if ($request->hasFile('documents')) {
                        $temp                       = $document;
                        $boDocumentSaveAsName       = rand() . "_document." . $document->getClientOriginalExtension();
                        $upload_path                = storage_path('app/public/uploads/business_opportunity/' . $business_opportunity->id . '/documents/');
                        $success                    = $temp->move($upload_path, $boDocumentSaveAsName);
                        $bo_documents->document     = $boDocumentSaveAsName;
                    }
                    $bo_documents->business_opportunity_id  = $business_opportunity->id;
                    $bo_documents->save();
                }
            }

            //Finally move LOGO,Image,Presentation file in respective folders.
            // can check db field for the same.
            if (isset($business_opportunity->logo)) {

                $upload_path = storage_path('app/public/uploads/business_opportunity/' . $business_opportunity->id . '/logo/');
                $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            }
            if (isset($business_opportunity->image)) {

                $upload_path = storage_path('app/public/uploads/business_opportunity/' . $business_opportunity->id . '/image/');
                $success = $Image->move($upload_path, $ImageSaveAsName);
            }
            if (isset($business_opportunity->company_presentation_file)) {

                $upload_path = storage_path('app/public/uploads/business_opportunity/' . $business_opportunity->id . '/presentation/');
                $success = $company_presentation_file->move($upload_path, $fileSaveAsName);
            }
        }

        if ($result) {
            $request->session()->flash('success', __('contactfile_step_one.form_submitted_successfully'));
            return redirect()->route('add-business-opportunity');
        } else {
            $request->session()->flash('error', __('contactfile_step_one.something_went_wrong'));
            return redirect()->route('add-business-opportunity');
        }

    } 

    public function listUpcomingBusinessOpportunity(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('start_date') && $request->get('start_date') != '') {
            $start_date = Carbon::parse($request->get('start_date'));
        } else {
            $start_date = Carbon::now();
        }

        $upcoming_business_opportunity = BusinessOpportunity::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {

            if (($request->has('keyword') && !empty($request->get('keyword'))) && ($request->has('source') && !empty($request->get('source')) ) ) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                })
                ->where('source', '=', $request->get('source'));
            }
            elseif ($request->has('keyword') && !empty($request->get('keyword'))) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                });
            }
            elseif ($request->has('source') && !empty($request->get('source')) )  {
                return $query->where('locale', $currentLocale)
                ->where('source', '=', $request->get('source'));
            }
            else {
                return $query->where('locale', $currentLocale);
            }
        })
        ->whereHas(
        'sectors' , function($query) use($currentLocale, $request) {
            if ($request->has('sector') && !empty($request->get('sector'))) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ])
                ->where('sector_id', $request->get('sector'));
            } else {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        })
        ->whereHas(
        'zones' , function($query) use($currentLocale, $request) {
            if ($request->has('zone') && !empty($request->get('zone'))) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ])
                ->where('zone_id', $request->get('zone'));
            } else {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        })
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'sectors' => function($query) use($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            },
            'zones' => function($query) use($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->get();
            },
        ]);

        if ($request->get('action') == 'search-by-dates') {

            if ( $request->has('sort_by') && $request->get('sort_by') == 'Week') {

                $upcoming_business_opportunity = $upcoming_business_opportunity->whereDate('start_date', '>=', $start_date)
                ->whereDate('start_date', '<', $start_date->addDays(7));
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Year') {

                $upcoming_business_opportunity = $upcoming_business_opportunity->whereYear('start_date', '=', $start_date->format('Y'))
                ->whereDate('start_date', '>=', $start_date);
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Month') {

                $upcoming_business_opportunity = $upcoming_business_opportunity->whereMonth('start_date', '=', $start_date->format('MM'))
                ->whereDate('start_date', '>=', $start_date);
            } else {
                $upcoming_business_opportunity = $upcoming_business_opportunity->whereDate('start_date', '>=', $start_date);
            }
        } else {
            $upcoming_business_opportunity = $upcoming_business_opportunity->whereDate('start_date', '>=', $start_date);
        }

        $upcoming_business_opportunity = $upcoming_business_opportunity->paginate(8);
        $listFor = 'Upcoming business opportunity';
        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $businessOpportunityList = $upcoming_business_opportunity;

        if ($page == 1 || !$upcoming_business_opportunity->isEmpty() ) {
            $next_business_opportunity = view('frontend.event.next_page_event', compact('businessOpportunityList', 'page', 'listFor'))->render();
        }
        else {
            $next_business_opportunity = "";
        }


        $sectors = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $zones = [];
        $zones = Zone::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $sidebar_key = '';

        return view(
            'frontend.business_opportunity.next_business_opportunity',
            compact(
                'nextBusinessOpportunity',
                'pastBusinessOpportunity',
                'sectors',
                'zones',
                'sidebar_key'
            )
        );
    }

}
