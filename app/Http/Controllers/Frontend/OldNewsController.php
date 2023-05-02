<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Zone;
use App\Models\Sector;
use LaravelLocalization;
use App\Models\NewsSource;
use Illuminate\Http\Request;
use App\Models\NewsTranslate;
use App\Models\NewsSourceTranslate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OldNewsController extends Controller
{
    public function index(Request $request)
    {

        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('insertion_date') && !empty($request->get('insertion_date'))) {
            $newsCondition = [['status',1],['insertion_date', '=',$request->get('insertion_date')]];
        }
        else {
            $newsCondition = [['status',1],['insertion_date', '<=',Carbon::now()]];
        }

        if(Auth::guard('customer')->check())
        {
            $user = Auth::guard('customer')->user();
            if (!$user->can('has-permission', ['news_premium_news', $user])) {
                $newsCondition[] = ['is_premium', 0];
            }
        } else {
            $newsCondition[] = ['is_premium', 0];
        }

        $news = News::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {

            if ($request->has('keyword') && !empty($request->get('keyword'))) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%')
                    ->orWhere('description', 'LIKE', '%'.$request->get('keyword').'%');
                });
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
                ->where('id', $request->get('sector'));
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
                ->where('id', $request->get('zone'));
            } else {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ]);
            }
        })
        ->whereHas(
        'newsSource' , function($query) use($currentLocale, $request) {
            if ($request->has('source') && !empty($request->get('source'))) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale);
                    }
                ])
                ->where('id', $request->get('source'));
            } else {

                return $query->where('status', '<>',0);
            }
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
            'newsSource'
        ])
        ->where($newsCondition)
        ->orderBy('display_order', 'desc')
        ->simplePaginate(5);

        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        if ($page == 1 || !$news->isEmpty()) {
            $nextNews = view('frontend.news.news_next_carousel', compact('news','page'))->render();
        }
        else {
            $nextNews = "";
        }

        // fetching data for filters
        $sectors = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $zones = Zone::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $sources = [];
        $sources = NewsSourceTranslate::select('title','news_source_id')
        ->distinct('title')
        ->where('locale', $currentLocale)
        ->get();

         $sidebar_key = 'news';
        return view(
            'frontend.news.index',
            compact(
                'nextNews',
                'news',
                'sectors',
                'zones',
                'sources',
                'sidebar_key'
            )
        );
    }

    public function show(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $newsCondition = [['status',1]];
        if (!(Session::has('subscription_id') && Session::get('subscription_id') > 1 &&Auth::guard('customer')->check() && Auth::guard('customer')->user()->payment_status == 'completed')) {
            $newsCondition[] = ['is_premium', 0];
        }

        $news = News::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {
            return $query->where('locale', $currentLocale);
        })
        ->whereHas(
        'sectors' , function($query) use($currentLocale, $request) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
                }
            ]);
        })
        ->whereHas(
        'zones' , function($query) use($currentLocale, $request) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
                }
            ]);
        })
        ->whereHas(
            'newsSource' , function($query) {
                return $query->where('status', '<>',0);
            })
        ->with([
            'newsImages' => function($query) {
                return $query->get();
            },
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
            'newsSource'
        ])
        ->where($newsCondition)
        ->where('page_key',$request->slug)
        ->first();

        $date = Carbon::parse($news->insertion_date);
        $newsCondition[] = ['page_key','<>', $request->slug];
        $footerNews = News::with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'sectors' => function($query) use($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->get();
            },
        ])
        ->where('id','>',$news->id)
        // ->whereBetween(
        //     'insertion_date',
        //     [
        //         $date->startOfWeek()->isoFormat('YYYY-MM-DD HH:mm:ss'),
        //         $date->endOfWeek()->isoFormat('YYYY-MM-DD HH:mm:ss')
        //     ]
        // )
        ->orderBy('display_order')
        ->limit(6)
        ->get();

        $sectorIds = [];
        foreach($news->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $similarNews = News::whereHas(

        'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
        })
        ->whereHas(

            'sectors' , function($query) use($currentLocale, $sectorIds) {
                return $query->whereHas(
                    'localeAll' , function($query) use($currentLocale, $sectorIds) {
                        return $query->where('locale', $currentLocale)
                        ->whereIn('sector_id', $sectorIds);
                    }
                );
            }
        )
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where($newsCondition)
        ->orderBy('display_order')
        ->limit(5)
        ->get();

        $sectors = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $zones = Zone::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();

        $sources = [];
        $sources = NewsSourceTranslate::select('title','news_source_id')
        ->distinct('title')
        ->where('locale', $currentLocale)
        ->get();

        $sidebar_key = 'news_details';

        return view(
            'frontend.news.news_detail',
            compact(
                'news',
                'footerNews',
                'similarNews',
                'sectors',
                'zones',
                'sources',
                'sidebar_key'
            )
        );
    }
}
