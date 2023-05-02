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
use DB;
class NewsController extends Controller
{

    private function set_custom_array ($currentList = [])
    {

		$main_array 		= [];
		$premium_array 		= [];
		$remaining_array 	= [];

		// filtering data into different arrays
		foreach ($currentList as $listData) {
			if ($listData->is_premium == 1) {
				$premium_array[] 		= $listData;
			} else {
				$remaining_array[] 		= $listData;
			}
		}

		// Preparing new result array
		foreach ($currentList as $listData) {
			$sub_array 		= [];
			$premium 		= array_shift($premium_array);
			$non_premium 	= array_shift($remaining_array);

			if ($premium == '') {
				if ($non_premium != '') {
					$sub_array[] = $non_premium;
					for ($i=0; $i < 3; $i++) { 
						if (count($remaining_array) == 0) {
							break;
						}
						$sub_array[] = array_shift($remaining_array);
					}
				}
			} else {
				$sub_array[] = $premium;
				$premium = array_shift($premium_array);
				if ($premium == '' && $non_premium != '') {
					$sub_array[] = $non_premium;
					for ($i=2; $i < 3; $i++) { 
						if (count($remaining_array) == 0) {
							break;
						}
						$sub_array[] = array_shift($remaining_array);
					}
				} else {
					$sub_array[] = $premium;
				}	
			}
			$main_array[] = $sub_array;
			if ($premium_array == [] && $remaining_array == []) {
				break;
			}
		}


		/**
		 * Cases
		 * 1,1,2
		 * 2,1,1
		 * 1,1,1,1
		 * 2,2
		*/
		// echo "input array <br>";
		// print_r($currentList);
		// echo "<br>output array <br>";
		// echo '<pre>';
		return $main_array;
		// echo '</pre>';
    } 
    

    public function index(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('insertion_date') && !empty($request->get('insertion_date'))) {
            $newsCondition = [['status',1],['insertion_date', '=',$request->get('insertion_date')],['is_premium',0]];
        }
        else {
            $newsCondition = [['status',1],['insertion_date', '<=',Carbon::now()],['is_premium',0]];
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
                ->whereIn('id', $request->get('sector'));
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
                ->whereIn('id', $request->get('zone'));
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
                ->whereIn('id', $request->get('source'));
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
        ]);

        /**
         * Code for latest news is here.
        */
        $page                   = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $search_source          = $request->get('source');
        $search_keyword         = $request->get('keyword');
        $search_sector          = $request->get('sector');
        $search_zone            = $request->get('zone');
        $search_insertion_date  = $request->get('insertion_date');

        $isLatestNews =  false ;
        if ($page == 1 &&
            (
                $search_source == '' &&
                $search_keyword == '' &&
                $search_sector == '' &&
                $search_zone == '' &&
                $search_insertion_date == ''
            )
        ) {
            $latest_news = clone $news;
            $latest_news = $latest_news
            ->where($newsCondition)
            ->limit(6) 
            ->orderBy('created_at', 'desc')       
            ->get();
            $isLatestNews = $latest_news->isEmpty()? false : true ;
        }
        
        /**
         * Code for more news is here.
        */
        $ids = [];
        if ($isLatestNews) {
            foreach ($latest_news as $news) {
                $ids[] = $news->id;
            }
            $more_news = clone $news;
            $more_news = $more_news
            ->whereHas(
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
                        ->whereIn('id', $request->get('sector'));
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
                        ->whereIn('id', $request->get('zone'));
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
                        ->whereIn('id', $request->get('source'));
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
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(24);

        } else {

            $more_news = clone $news;
            $more_news = $more_news
                ->whereHas(
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
                        ->whereIn('id', $request->get('sector'));
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
                        ->whereIn('id', $request->get('zone'));
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
                        ->whereIn('id', $request->get('source'));
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
            ->orderBy('created_at', 'desc')
            ->simplePaginate(24);
        }
        
         /**
         * Setting variable for pagination
        */
        $news = $more_news;
        $more_news = $this->set_custom_array($more_news);
        // dd($more_news);
        /**
         * Setting HTML of latest news for view to render
        */
        if ($isLatestNews) {

            $latestNews = view('frontend.new_news.latest_news', compact('latest_news'))->render();
        }
        else {
            $latestNews = "";
        }
       

        /**
         * Setting HTML of more news for view to render
        */
       
        if ($page == 1 || !empty($more_news)) {
            
            $moreNews = view('frontend.new_news.more_news', compact('more_news','page','currentLocale'))->render();
        }
        else {
            $moreNews = "";
        }

        // fetching data for filters
        $sectors   = [];
        $sectors_arr = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
      
        foreach($sectors_arr as $sector){
            $sectors[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($sectors);

        $zone_arr = Zone::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        
        $zones = [];
        foreach($zone_arr as $zone){
            $zones[$zone->id] = $zone->localeAll[0]->name;
        }
        asort($zones);
           
        $sources = [];
        $source_arr = NewsSource::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        foreach($source_arr as $source){
            $sources[$source->id] = $source->localeAll[0]->title;
        }
        asort($sources);

        $popularNews = News::whereHas(

        'localeAll' , function($query) use($currentLocale) {
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
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->orderBy('total_views', 'desc')
        ->limit(5)
        ->get();

        $sidebar_key = 'news';
        return view(
            'frontend.new_news.index',
            compact(
                'latestNews',
                'moreNews',
                'ids',
                'news',
                'sectors',
                'zones',
                'sources',
                'popularNews',
                'sidebar_key'
            )
        );
    }





    public function show(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $newsCondition = [['status',1],['is_premium',0]];

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
        ->where('page_key',$request->slug)
        ->first();

        if($news == null){
            abort(404);
        } 
        if($news->is_premium == 1) {
            if (Auth::guard('customer')->check()) {
                $user = Auth::guard('customer')->user();
                if (!$user->can('has-permission', ['news_premium_news', $user])) {
                    return redirect('upgrade-plan');  
                }
            } else {
                return redirect()->back()->with('openLogin', true);
            }
        }

        /**
         * Logic to update total views
        */
        $news ->total_views += 1;
        $news->update();

        $newsCondition[] = ['page_key','<>', $request->slug];

        $sectorIds = [];
        foreach($news->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $popularNews = News::whereHas(

        'localeAll' , function($query) use($currentLocale) {
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
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where($newsCondition)
        ->orderBy('total_views', 'desc')
        ->limit(5)
        ->get();

        $sidebar_key = 'news_details';

        return view(
            'frontend.new_news.news_detail',
            compact(
                'news',
                'popularNews',
                'sidebar_key'
            )
        );
    }


    public function indexPremium(Request $request)
    {
        
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('insertion_date') && !empty($request->get('insertion_date'))) {
            $newsCondition = [['status',1],['insertion_date', '=',$request->get('insertion_date')],['is_premium',1]];
        }
        else {
            $newsCondition = [['status',1],['insertion_date', '<=',Carbon::now()],['is_premium',1]];
        }
        $news = News::where('is_premium',1)
        ->whereHas(
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
                ->whereIn('id', $request->get('sector'));
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
                ->whereIn('id', $request->get('zone'));
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
                ->whereIn('id', $request->get('source'));
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
        ]);
       
        /**
         * Code for latest news is here.
        */
        $page                   = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $search_source          = $request->get('source');
        $search_keyword         = $request->get('keyword');
        $search_sector          = $request->get('sector');
        $search_zone            = $request->get('zone');
        $search_insertion_date  = $request->get('insertion_date');


        $isLatestNews =  false ;
        if ($page == 1 &&
            (
                $search_source == '' &&
                $search_keyword == '' &&
                $search_sector == '' &&
                $search_zone == '' &&
                $search_insertion_date == ''
            )
        ) {
            $latest_news = clone $news;
            $latest_news = $latest_news
            ->where($newsCondition)
            ->where('is_premium',1) 
            ->limit(6) 
            ->orderBy('created_at', 'desc')       
            ->get();
            $isLatestNews = $latest_news->isEmpty()? false : true ;
        }
        
        /**
         * Code for more news is here.
        */
        $ids = [];
        if ($isLatestNews) {
            foreach ($latest_news as $news) {
                $ids[] = $news->id;
            }
            $more_news = clone $news;
            $more_news = $more_news
            ->whereHas(
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
                        ->whereIn('id', $request->get('sector'));
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
                        ->whereIn('id', $request->get('zone'));
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
                        ->whereIn('id', $request->get('source'));
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
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(24);

        } else {

            $more_news = clone $news;
            $more_news = $more_news
                ->whereHas(
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
                        ->whereIn('id', $request->get('sector'));
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
                        ->whereIn('id', $request->get('zone'));
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
                        ->whereIn('id', $request->get('source'));
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
            ->orderBy('created_at', 'desc')
            ->simplePaginate(24);
        }
        
         /**
         * Setting variable for pagination
        */
        $news = $more_news;
        $more_news = $this->set_custom_array($more_news);
        // dd($more_news);
        /**
         * Setting HTML of latest news for view to render
        */
        if ($isLatestNews) {

            $latestNews = view('frontend.new_news.latest_news', compact('latest_news'))->render();
        }
        else {
            $latestNews = "";
        }
       

        /**
         * Setting HTML of more news for view to render
        */
       
        if ($page == 1 || !empty($more_news)) {
            
            $moreNews = view('frontend.new_news.more_news', compact('more_news','page','currentLocale'))->render();
        }
        else {
            $moreNews = "";
        }

        // fetching data for filters
        $sectors   = [];
        $sectors_arr = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
      
        foreach($sectors_arr as $sector){
            $sectors[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($sectors);

        $zone_arr = Zone::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        
        $zones = [];
        foreach($zone_arr as $zone){
            $zones[$zone->id] = $zone->localeAll[0]->name;
        }
        asort($zones);
           
        $sources = [];
        $source_arr = NewsSource::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        foreach($source_arr as $source){
            $sources[$source->id] = $source->localeAll[0]->title;
        }
        asort($sources);

        $popularNews = News::whereHas(

        'localeAll' , function($query) use($currentLocale) {
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
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('is_premium',1)
        ->where('status',1)
        ->orderBy('total_views', 'desc')
        ->limit(5)
        ->get();

        $sidebar_key = 'news';
        return view(
            'frontend.new_news.premiumnews_index',
            compact(
                'latestNews',
                'moreNews',
                'ids',
                'news',
                'sectors',
                'zones',
                'sources',
                'popularNews',
                'sidebar_key'
            )
        );
    }

    public function showPremium(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $newsCondition = [['status',1],['is_premium',1]];

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
        ->where('page_key',$request->slug)
        ->first();

        if($news == null){
            abort(404);
        } 
        if($news->is_premium == 1) {
            if (Auth::guard('customer')->check()) {
                $user = Auth::guard('customer')->user();
                if (!$user->can('has-permission', ['news_premium_news', $user])) {
                    return redirect('upgrade-plan');  
                }
            } else {
                return redirect()->back()->with('openLogin', true);
            }
        }

        /**
         * Logic to update total views
        */
        $news ->total_views += 1;
        $news->update();

        $newsCondition[] = ['page_key','<>', $request->slug];

        $sectorIds = [];
        foreach($news->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $popularNews = News::whereHas(

        'localeAll' , function($query) use($currentLocale) {
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
        ->with([
            'localeAll' => function($query) use($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('is_premium',1)
        ->where('status',1)
        ->orderBy('total_views', 'desc')
        ->limit(5)
        ->get();

        $sidebar_key = 'news_details';

        return view(
            'frontend.new_news.news_detail',
            compact(
                'news',
                'popularNews',
                'sidebar_key'
            )
        );
    }


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

            return view('frontend.new_news.create_premiumnews', compact('sector_arr','selected_sectors','zone_arr','selected_zones','newsMaxId','source_arr'));

        } catch(\Throwable $th) {
            return redirect()->route('frontend.new_news.create_premiumnews')->with('error', 'Something went wrong!');
        }
    }



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
                //'externe'                     => 'required',
                //'news_title_in_english'     => 'required',
                //'news_title_in_arabic'      => 'required',
                'news_title_in_french'      => 'required',
                //'news_summary_in_english'   => 'required',
                //'news_summary_in_arabic'    => 'required',
                'news_summary_in_french'    => 'required',
                //'description_in_english'    => 'required',
                //'description_in_arabic'     => 'required',
                'description_in_french'     => 'required',
                'source_id'                 => 'required|numeric',
                'source_link'               => 'required|url',
                //'sectors'                   => 'required|array|min:1',
                //'zones'                     => 'required|array|min:1',
                //'insertion_date'            => 'required',
                //'display_order'             => 'required'
            ],
            [],
            [
                'source_id'                 => 'source',
               // 'insertion_date'            => 'publication date',
            ]
        );
        DB::beginTransaction();
        try {

            $news               = new News();

           // $user               = Auth::user();

            if ($request->hasFile('news_logo')) {

                $newsLogo               = $request->news_logo;
                $newsLogoSaveAsName     = rand(). "news_logo." . $newsLogo->getClientOriginalExtension();
                $upload_path            = storage_path('app/public/uploads/news_logos/');
                $success                = $newsLogo->move($upload_path, $newsLogoSaveAsName);
                $news_logo              = $newsLogoSaveAsName;
            }

            $news->news_logo        = $news_logo;
            $news->created_by       = 1;
            $news->updated_by       = 1;
            $news->page_key         = "1";
            $news->insertion_date   = $request->insertion_date;
            $news->name             = $request->name ;
            $news->company_name     = $request->company_name;
            $news->company_address  = $request->company_address;
            $news->job_title        = $request->job_title;
            $news->mobile_number    = $request->mobile_number;
            $news->email            = $request->email;
            
            $news->source_id        = $request->source_id;
            $news->source_link      = $request->source_link;
            $news->display_order    = $request->display_order;
            $news->is_premium       = 1;
            $news->status           = 0;
            $news->externe          = 1;

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
                    'title'         => $request->news_title_in_french,
                    'summary'       => "Aucun summaire",
                    'description'   => "Aucune description",
                    'locale'        => "en",
                    'news_id'       => $news->id
                ],
                [
                    'title'         => "Aucun titre",
                    'summary'       => "Aucun summaire",
                    'description'   => "Aucune description",
                    'locale'        => "ar",
                    'news_id'       => $news->id
                ],
                [
                    'title'         => $request->news_title_in_french,
                    'summary'       => $request->news_summary_in_french,
                    'description'   => $request->description_in_french,
                    'locale'        => "fr",
                    'news_id'       => $news->id
                ]
            ];

            $translated_result = NewsTranslate::insert($translated_news);

            if ($result && $translated_result) {
                DB::commit();
                return redirect('add-premium-news')->with('success', 'Contribution ajoutée avec succès.');
            } else {
                DB::rollback();
                return redirect('add-premium-news')->with('error', 'Something went wrong!1');
            }
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('add-premium-news')->with('error', json_encode($e->getMessage()));
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('add-premium-news')->with('error', 'Something went wrong!2'.json_encode($th));
        }
    }






}
