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
class MasterController extends Controller
{

    
  

    public function index()
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

        return view('frontend.layouts.master',compact('business_opportunities','news','header_news','home_news','premium_news','upcomingEvents'));


    }

    
}
