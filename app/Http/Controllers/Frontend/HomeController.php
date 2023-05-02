<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\Event;
use App\Models\Partner;
use DB;
use App\Models\Inquiry;
use App\Models\Press;
use Carbon\Carbon;
use App\Models\News;
use LaravelLocalization;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\BusinessOpportunity;
use App\Models\Company;
use App\Models\AlgeriaBusinessNetwork;
use Illuminate\Support\Facades\Session;
use App\Models\Economic;
use App\Models\BusinessIntelligence;
use App\Models\Commercial;
use App\Models\Tender;
use App\Models\BusinessIntelligenceReports;
use App\Models\AssistanceService;
use App\Models\Resource;
class HomeController extends Controller
{


    public function index()
    {
        $banners = Banner::where('key', '=' ,'home')->with(['bannerImages'=>function($query){ return $query->where('status',1)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
            }])->get();
    	$currentLocale = LaravelLocalization::getCurrentLocale();
    	///Display only 4 events on home page
    	DB::enableQueryLog();
    	//get first 3 testimonials to display
        $testimonials = Testimonial::select('id', 'image')->where('status',1)
            ->orderBy('display_order','desc')
            ->orderBy('created_at', 'desc')
            ->limit(3)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();
        $partner = Partner::all();
       //get first 8 News to display
        $news = News::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->whereHas('sectors' , function($query) use($currentLocale) {
                    return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
        })
        ->whereHas('zones' , function($query) use($currentLocale) {
            return $query->with(['localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
        })
        ->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'sectors' => function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->get();
            },
            'zones' => function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->get();
            },
        ]);
        // if (!(Session::has('subscription_id') && Session::get('subscription_id') > 1 &&Auth::guard('customer')->check() && Auth::guard('customer')->user()->payment_status == 'completed')) {
        //     $news = $news->where('is_premium',0);
        // }
        
        $news = $news->limit(8)->orderBy('created_at','desc')->orderBy('display_order','desc')->get();
       
        // ---------Comapny data-----------
        $company_count = Company::where('status',1)->where('is_approved',1)->count();

        $contact_emailcount = Company::where('status',1)->where('is_approved',1)->get();

        $contact_email = 0;
        foreach ($contact_emailcount as $key => $value) {
            $count = $value->contacts->count();
            $contact_email += $count;
        }
        $totalEmailContact = $company_count + $contact_email;
        
        // ---------contact mobile count-----
        $contact_mobilecount = Company::where('status',1)->where('is_approved',1)->get();

        $contact_mobile = 0;
        foreach ($contact_mobilecount as $key => $value) {
            $count = $value->contacts->count();
            $contact_mobile += $count;
        }
        $totalMobileContact = $company_count + $contact_mobile;

        // ---------------Display Featured Company data----------

        $companies = Company::where('status',1)->where('is_approved',1)->where('is_featured',1)->whereHas('localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->whereHas('sectors' , function($query) use($currentLocale) {
                        return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->whereHas('zones' , function($query) use($currentLocale) {
                return $query->with(['localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->with([
                'localeAll'=> function($q) use($currentLocale){
                    return $q->where('locale',$currentLocale)->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->get();
                },
                'zones' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->get();
                }
            ])->orderBy('created_at','desc')->limit(3)->get();
        // ---------- company data end-----------
        //--- business network----
        $business_network = AlgeriaBusinessNetwork::whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with(['localeAll'=> function($q) use($currentLocale){
            return $q->where('locale',$currentLocale)->get();
        }])->first();
        // echo "<pre>";print_r($business_network);exit();

        // -----Upcoming Event List----
       $eventCondition = [['start_date', '>=', Carbon::now()]];

       $pastCondition =  [['start_date', '<', Carbon::now()]];

       $upcomingEvents = Event::whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->whereHas(
            'sectors' , function($query) use($currentLocale) {
                return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->whereHas(
            'zones' , function($query) use($currentLocale) {
               return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)->get();
                        }
                    ])->get();
                },
                'zones' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->get();
                },
            ])
            ->where($eventCondition)
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();
        
        $pastEvents = Event::whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->whereHas(
            'sectors' , function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->whereHas(
            'zones' , function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)->get();
                        }
                    ])->get();
                },
                'zones' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->get();
                },
            ])
            ->where($pastCondition)
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();

        $events = '';
        if(count($upcomingEvents)){
            $events = $upcomingEvents;
        }else{
            $events = $pastEvents;
        }
        // -----Display Business Opportunities---
        $business_opportunity = BusinessOpportunity::where('activated',1)->limit(5)->orderBy('created_at','desc')->orderBy('display_order','desc')->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with(['localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        },'sectors.localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        }])->get();

        // Display economical indicator
        $economic = Economic::whereHas('localeAll',function($q) use($currentLocale){
                     return $q->where('locale', $currentLocale);
        })->with(['localeAll'=> function($q) use($currentLocale){
                     return $q->where('locale',$currentLocale)->get();
        }])
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->orderBy('display_order','desc')
        ->limit(9)
        ->get();

        // Display Business Intelligence data
        $b_intelligence = BusinessIntelligence::whereHas('localeAll',function($q) use($currentLocale){
                     return $q->where('locale', $currentLocale);
        })->with(['localeAll'=> function($q) use($currentLocale){
                     return $q->where('locale',$currentLocale)->get();
        }])
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->orderBy('display_order','desc')
        ->limit(6)
        ->get();

        // Display Commercial Quotes
        $current_Date =  Carbon::today()->toDateString();

        $commercial = Commercial::whereDate('start_date','<=',$current_Date)->whereDate('end_date','>=',$current_Date)->where('status',1)->orderBy('created_at','desc')->orderBy('display_order','desc')->limit(2)->get();
        // dd($commercial);
        // Display Tenders
        $tenders = Tender::whereHas('localeAll',function($q) use($currentLocale){
                    return $q->where('locale', $currentLocale);
        })->with(['localeAll'=> function($q) use($currentLocale){
                     return $q->where('locale',$currentLocale)->get();
        }])
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->limit(9)
        ->get();
        // Display Business Reports
        $b_i_reports = BusinessIntelligenceReports::whereHas('localeAll',function($q) use($currentLocale){
            return $q->where('locale', $currentLocale);
        })->with(['localeAll'=> function($q) use($currentLocale){
                     return $q->where('locale',$currentLocale)->get();
        }])
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->limit(3)
        ->get();

        // echo "<pre>";print_r($tenders);exit();

        $assistance_services = AssistanceService::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->get();
        }])->get();

         $sidebar_key = 'home';

        $resource = Resource::with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                }
            ])->whereIn('page_key',['invest-in-algeria','legal-legislative-framework'])
            ->get(); 

            // dd($resource);
        return view('frontend.new_customerhome',compact('banners','news','events','testimonials','business_opportunity','company_count','companies','business_network','totalEmailContact','totalMobileContact','economic','b_intelligence','commercial','tenders','b_i_reports','assistance_services','sidebar_key','resource'));

    }

    public function indexNew()
    { 
        $currentLocale = LaravelLocalization::getCurrentLocale();
        // -----Display Business Opportunities---
        $business_opportunities = BusinessOpportunity::where('activated',1)->limit(5)->orderBy('created_at','desc')->orderBy('display_order','desc')->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with(['localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        },'sectors.localeAll'=> function($q) use($currentLocale){
                return $q->where('locale',$currentLocale)->get();
        }])->get(); 


        /*$news = News::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
        ])
        ->orderBy('created_at','desc')
            ->limit(5)
        ->where('is_premium',0)
        ->get()*/



        $news = News::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
        })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                        ->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                                ->get();
                        }
                    ])
                        ->get();
                },
            ])
            ->orderBy('created_at','desc')
            ->where('is_premium',0)
            ->limit(5)
            ->orderBy('created_at','desc')
            ->get();



            $header_news = News::where('status',1)->whereHas(
                'localeAll' , function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale);
            })
                ->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    },
                    'sectors' => function($query) use($currentLocale) {
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                                return $query->where('locale', $currentLocale)
                                    ->get();
                            }
                        ])
                            ->get();
                    },
                ])
                ->orderBy('created_at','desc')
                ->where('is_premium',0)
                ->limit(5)
                ->orderBy('created_at','desc')
                ->get();    



        

                $home_news = News::where('status',1)->whereHas(
                    'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
                })
                    ->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                                ->get();
                        },
                        'sectors' => function($query) use($currentLocale) {
                            return $query->with([
                                'localeAll' => function($query) use($currentLocale) {
                                    return $query->where('locale', $currentLocale)
                                        ->get();
                                }
                            ])
                                ->get();
                        },
                    ])
                    ->orderBy('created_at','desc')
                    ->where('is_premium',0)
                    ->limit(20)
                    ->orderBy('created_at','desc')
                    ->get();  

        $premium_news = News::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
        })
        ->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'sectors' => function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->get();
            },
        ])
        ->orderBy('insertion_date','desc')
        ->where('is_premium',1)
        ->limit(4)
       
        ->get();


        $press_home = Press::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->get();
               
        }])
        ->where('status',1)
        ->orderBy('publication_date','desc')
        ->limit(8)
        ->get();

        $upcomingEvents = Event::whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)->get();
                        }
                    ])->get();
                },
                'zones' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->get();
                },
            ])
            ->where('start_date', '>=', Carbon::now())
            ->orderBy('start_date','asc')
            ->limit(4)
            ->get();

        return view('frontend.home',compact('business_opportunities','news','header_news','home_news','premium_news','upcomingEvents','press_home'));


    }

    public function storeInquiry(Request $request)
    {
        error_reporting(E_ALL);
        //return $request;
        // Logic to validate form data
        $rules = [
            'username'   		=> 'required|max:191',
            'company'           => 'required|max:191',
            'job_title'          => 'required|max:191',
            'phone_number'      => 'required|numeric',
            'email'    			=> 'required|email|max:255',
            'subject'           => 'required|max:191',
            'message'           => 'required',
            //'note_inquiry'           => 'required',
            'g-recaptcha-response' => 'required',
        ];
        $messages = [

        ];
        $attributes = [
            'job_title'             => 'Job title',
            'phone_number'             => 'Phone number',
        ];


        $this->validate($request, $rules, $messages, $attributes);

        $inquiry = new Inquiry;

        $inquiry->username     = $request->username;
        $inquiry->company      = $request->company;
        $inquiry->job_title    = $request->job_title;
        $inquiry->phone_number = $request->phone_number;
        $inquiry->email        = $request->email;
        $inquiry->subject      = $request->subject;
        $inquiry->message      = $request->message;
        $inquiry->note_inquiry = 'R.A.S';
        $inquiry->status      = 1;
        $uri = url()->previous() ;
       

        if ($inquiry -> save()) {
            $request->session();
            return redirect('/')->with('success', __('inquiry.thanku_for_contact_us'));
        } else {
            $request->session();

            return redirect('/')->with('error', __('contactfile_step_one.something_went_wrong'));
        }
    }
    public function readmoredata(Request $request){


    	$id = $request['id'];

    	$currentLocale = LaravelLocalization::getCurrentLocale();
    	$testimonials = Testimonial::select('id', 'image')->where('id',$id)
    		->where('status',1)
            ->orderBy('display_order','asc')
            ->orderBy('created_at', 'asc')
            ->limit(3)
            ->with(['localeAll' => function($w) use($currentLocale,$id){
                return $w->where('locale', $currentLocale)->where('testimonial_id',$id)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();

        return view('frontend.testimonial.readmoredata',compact('testimonials'));

    }
}
