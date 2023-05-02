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
            ->orderBy('insertion_date', 'desc')       
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
            ->orderBy('insertion_date', 'desc')
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
            ->orderBy('insertion_date', 'desc')
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
            ->orderBy('insertion_date', 'desc')       
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
            ->orderBy('insertion_date', 'desc')
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
            ->orderBy('insertion_date', 'desc')
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
}
