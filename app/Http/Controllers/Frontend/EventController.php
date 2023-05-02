<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Carbon\Carbon;
use App\Models\Zone;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Sector;
use LaravelLocalization;
use App\Models\Exhibitor;
use Illuminate\Http\Request;
use App\Exports\ExhibitorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\EventTranslate;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $events = Event::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {

            if (($request->has('keyword') && !empty($request->get('keyword'))) && ($request->has('source') && !empty($request->get('source')) ) ) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                })
                ->whereIn('source', '=', $request->get('source'));
            }
            elseif ($request->has('keyword') && !empty($request->get('keyword'))) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                });
            }
            elseif ($request->has('source') && !empty($request->get('source')) )  {
                return $query->where('locale', $currentLocale)
                ->whereIn('source', '=', $request->get('source'));
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
                ->whereIn('sector_id', $request->get('sector'));
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
                ->whereIn('zone_id', $request->get('zone'));
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

        $upcomingEvents = clone $events;


        /**
         * Upcoming Event listing end form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $upcomingEvents = $upcomingEvents->limit(8)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();
        

        $pastEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('end_date') && !empty($request->get('end_date'))) {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('end_date', '<', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $pastEvents = $pastEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();

        /**
         * Past Event listing ends form here.
        */





        $encoursEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
            ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'==','Maintenu')*/
            ->whereDate('start_date', '<=', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }
        else {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
                                        ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }

        $encoursEvents = $encoursEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();





        /*     Les evenements reportées     */


        $postponedEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }

        $postponedEvents = $postponedEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        
        /*     Les evenements annulés    */


        $canceledEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé')
            ->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé');
        }

        $canceledEvents = $canceledEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        $upcomingList = $upcomingEvents;
        $pastList = $pastEvents;
        $encoursList = $encoursEvents;
        $postponedList =$postponedEvents; 
        $canceledList =$canceledEvents; 




        $featuredEvents = Event::where('is_featured', 1)
        ->whereDate('start_date', '>', Carbon::now())
->where('is_actif' ,'<>',0)
        ->limit(5)
        ->get();

        $sectors_arr = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        $eventSector = [];
        foreach($sectors_arr as $sector){
            $eventSector[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($eventSector);


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

        $sources = EventTranslate::select('source')
        ->distinct('source')
        ->where('locale', $currentLocale)
        ->get();


        $sidebar_key = 'events';
        return view(
            'frontend.event.event_main_page',
            compact(
                'eventSector',
                'upcomingList',
                'featuredEvents',
                'pastList',
                'encoursList',
                'postponedList',
                'canceledList',
                'zones',
                'sources',
                'sidebar_key'

            )
        );
    }

    public function listPastEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('start_date') && $request->get('start_date') != '') {
            $start_date = Carbon::parse($request->get('start_date'));
        } else {
            $start_date = Carbon::now();
        }

        $pastEvents = Event::whereHas(
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
        ])->orderBy('start_date', 'desc');

        if ($request->get('action') == 'search-by-dates') {

            if ( $request->has('sort_by') && $request->get('sort_by') == 'Week') {

                $pastEvents = $pastEvents->whereDate('end_date', '<', $start_date)
                ->whereDate('end_date', '<', $start_date->subDays(7));
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Year') {

                $pastEvents = $pastEvents->whereYear('start_date', '=', $start_date->format('Y'))
                ->whereDate('end_date', '<', $start_date);
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Month') {

                $pastEvents = $pastEvents->whereMonth('start_date', '=', $start_date->format('MM'))
                ->whereDate('end_date', '<', $start_date);
            } else {
                $pastEvents = $pastEvents->whereDate('end_date', '<', $start_date);
            }
        } else {
            $pastEvents = $pastEvents->whereDate('end_date', '<', $start_date);
        }

        $pastEvents = $pastEvents->paginate(8);

        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $eventList = $pastEvents;
        $listFor = 'Past event';
        if ($page == 1 || !$pastEvents->isEmpty() ) {
            $nextEvent = view('frontend.event.next_page_event', compact('eventList', 'page', 'listFor'))->render();
        }
        else {
            $nextEvent = "";
        }

        $banner = Banner::where('key', '=' ,'past_events')
        ->with(
            [
                'bannerImages' => function($query){
                    return $query->where('status',1)
                    ->orderBy('display_order', 'asc')
                    ->orderBy('created_at', 'asc')
                    ->get();
                }
            ]
        )->get();

        $eventSector = Sector::with([
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

        $sources = [];
        $sources = EventTranslate::select('source')
        ->distinct('source')
        ->where('locale', $currentLocale)
        ->get();

        $sidebar_key = 'events';

        return view(
            'frontend.event.event_past_list',
            compact(
                'nextEvent',
                'pastEvents',
                'eventSector',
                'zones',
                'sources',
                'banner',
                'sidebar_key'
            )
        );
    }




    public function listEnCoursEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $events = Event::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {

            if (($request->has('keyword') && !empty($request->get('keyword'))) && ($request->has('source') && !empty($request->get('source')) ) ) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                })
                ->whereIn('source', '=', $request->get('source'));
            }
            elseif ($request->has('keyword') && !empty($request->get('keyword'))) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                });
            }
            elseif ($request->has('source') && !empty($request->get('source')) )  {
                return $query->where('locale', $currentLocale)
                ->whereIn('source', '=', $request->get('source'));
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
                ->whereIn('sector_id', $request->get('sector'));
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
                ->whereIn('zone_id', $request->get('zone'));
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

        $upcomingEvents = clone $events;


        /**
         * Upcoming Event listing end form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $upcomingEvents = $upcomingEvents->limit(8)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();
        

        $pastEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('end_date') && !empty($request->get('end_date'))) {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('end_date', '<', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $pastEvents = $pastEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();

        /**
         * Past Event listing ends form here.
        */





        $encoursEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
            ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'==','Maintenu')
            ->whereDate('start_date', '<=', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }
        else {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
                                        ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }

        $encoursEvents = $encoursEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();





        /*     Les evenements reportées     */


        $postponedEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }

        $postponedEvents = $postponedEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        
        /*     Les evenements annulés    */


        $canceledEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé')
            ->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé');
        }

        $canceledEvents = $canceledEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        $upcomingList = $upcomingEvents;
        $pastList = $pastEvents;
        $encoursList = $encoursEvents;
        $postponedList =$postponedEvents; 
        $canceledList =$canceledEvents; 




        $featuredEvents = Event::where('is_featured', 1)
        ->whereDate('start_date', '>', Carbon::now())
->where('is_actif' ,'<>',0)
        ->limit(5)
        ->get();

        $sectors_arr = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        $eventSector = [];
        foreach($sectors_arr as $sector){
            $eventSector[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($eventSector);


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

        $sources = EventTranslate::select('source')
        ->distinct('source')
        ->where('locale', $currentLocale)
        ->get();


        $sidebar_key = 'events';
        return view(
            'frontend.event.event_encours_list',
            compact(
                'eventSector',
                'upcomingList',
                'featuredEvents',
                'pastList',
                'encoursList',
                'postponedList',
                'canceledList',
                'zones',
                'sources',
                'sidebar_key'

            )
        );
    }





    public function listCanceledEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $events = Event::whereHas(
        'localeAll' , function($query) use($currentLocale, $request) {

            if (($request->has('keyword') && !empty($request->get('keyword'))) && ($request->has('source') && !empty($request->get('source')) ) ) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                })
                ->whereIn('source', '=', $request->get('source'));
            }
            elseif ($request->has('keyword') && !empty($request->get('keyword'))) {
                return $query->where('locale', $currentLocale)
                ->where(function ($innerQuery) use($request) {
                    $innerQuery->where('title', 'LIKE', '%'.$request->get('keyword').'%');
                });
            }
            elseif ($request->has('source') && !empty($request->get('source')) )  {
                return $query->where('locale', $currentLocale)
                ->whereIn('source', '=', $request->get('source'));
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
                ->whereIn('sector_id', $request->get('sector'));
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
                ->whereIn('zone_id', $request->get('zone'));
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

        $upcomingEvents = clone $events;


        /**
         * Upcoming Event listing end form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $upcomingEvents = $upcomingEvents->limit(8)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();
        

        $pastEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('end_date') && !empty($request->get('end_date'))) {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu')
            ->whereDate('end_date', '<', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }
        else {
            $pastEvents = $pastEvents->whereDate('end_date', '<', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Maintenu');
        }

        $pastEvents = $pastEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();

        /**
         * Past Event listing ends form here.
        */





        $encoursEvents = clone $events;

        /**
         * Upcoming Event listing end form here.
        */

        /**
         * Past Event listing starts form here.
        */

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
            ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'==','Maintenu')
            ->whereDate('start_date', '<=', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }
        else {
            $encoursEvents = $encoursEvents->whereDate('start_date', '<=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/
                                        ->whereDate('end_date', '>=', Carbon::now())->where('is_actif' ,'<>',0)/*->where('status' ,'=','Maintenu')*/;
        }

        $encoursEvents = $encoursEvents->limit(4)
        ->orderBy('start_date','desc')
        ->get();





        /*     Les evenements reportées     */


        $postponedEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté')
            ->whereDate('start_date', '>', Carbon::parse($request->get('start_date')))->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $postponedEvents = $postponedEvents->whereDate('start_date', '>', Carbon::now())->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }

        $postponedEvents = $postponedEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        
        /*     Les evenements annulés    */


        $canceledEvents = clone $events;


    

        if ($request->has('start_date') && !empty($request->get('start_date'))) {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé')
            ->where('is_actif' ,'<>',0)->where('status' ,'=','Reporté');
        }
        else {
            $canceledEvents = $canceledEvents->where('is_actif' ,'<>',0)->where('status' ,'=','Annulé');
        }

        $canceledEvents = $canceledEvents->limit(6)
        ->orderBy('start_date','asc')
            ->orderBy('created_at','asc')
        ->get();



        $upcomingList = $upcomingEvents;
        $pastList = $pastEvents;
        $encoursList = $encoursEvents;
        $postponedList =$postponedEvents; 
        $canceledList =$canceledEvents; 




        $featuredEvents = Event::where('is_featured', 1)
        ->whereDate('start_date', '>', Carbon::now())
->where('is_actif' ,'<>',0)
        ->limit(5)
        ->get();

        $sectors_arr = Sector::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('status',1)
        ->get();
        $eventSector = [];
        foreach($sectors_arr as $sector){
            $eventSector[$sector->id] = $sector->localeAll[0]->name;
        }
        asort($eventSector);


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

        $sources = EventTranslate::select('source')
        ->distinct('source')
        ->where('locale', $currentLocale)
        ->get();


        $sidebar_key = 'events';
        return view(
            'frontend.event.event_canceled_list',
            compact(
                'eventSector',
                'upcomingList',
                'featuredEvents',
                'pastList',
                'encoursList',
                'postponedList',
                'canceledList',
                'zones',
                'sources',
                'sidebar_key'

            )
        );
    }





    







    public function listUpcomingEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($request->has('start_date') && $request->get('start_date') != '') {
            $start_date = Carbon::parse($request->get('start_date'));
        } else {
            $start_date = Carbon::now();
        }

        $upcomingEvents = Event::whereHas(
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
        ])->orderBy('start_date', 'asc');

        if ($request->get('action') == 'search-by-dates') {

            if ( $request->has('sort_by') && $request->get('sort_by') == 'Week') {

                $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', $start_date)
                ->whereDate('start_date', '<', $start_date->addDays(7));
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Year') {

                $upcomingEvents = $upcomingEvents->whereYear('start_date', '=', $start_date->format('Y'))
                ->whereDate('start_date', '>', $start_date);
            } elseif ( $request->has('sort_by') && $request->get('sort_by') == 'Month') {

                $upcomingEvents = $upcomingEvents->whereMonth('start_date', '=', $start_date->format('MM'))
                ->whereDate('start_date', '>', $start_date);
            } else {
                $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', $start_date);
            }
        } else {
            $upcomingEvents = $upcomingEvents->whereDate('start_date', '>', $start_date);
        }

        $upcomingEvents = $upcomingEvents->paginate(8);
        $listFor = 'Upcoming event';
        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
        $eventList = $upcomingEvents;

        if ($page == 1 || !$upcomingEvents->isEmpty() ) {
            $nextEvent = view('frontend.event.next_page_event', compact('eventList', 'page', 'listFor'))->render();
        }
        else {
            $nextEvent = "";
        }

        $banner = Banner::where('key', '=' ,'upcoming_events')
        ->with(
            [
                'bannerImages' => function($query){
                    return $query->where('status',1)
                    ->orderBy('display_order', 'asc')
                    ->orderBy('created_at', 'asc')
                    ->get();
                }
            ]
        )
            ->get();

        $eventSector = Sector::with([
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

        $sources = [];
        $sources = EventTranslate::select('source')
        ->distinct('source')
        ->where('locale', $currentLocale)
        ->get();

        $sidebar_key = 'events';

        return view(
            'frontend.event.event_upcoming_list',
            compact(
                'nextEvent',
                'upcomingEvents',
                'eventSector',
                'zones',
                'sources',
                'banner',
                'sidebar_key'
            )
        );
    }

    public function showPastEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $pastEvent = Event::whereHas(
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
            'eventImage' => function($query) {
                return $query->get();
            },
            'eventReference' => function($query) {
                return $query->get();
            },
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
        ->where('page_key',$request->slug)

        ->first(); 

        if($pastEvent == null) {
            abort(404);
        }

        $sectorIds = [];
        foreach($pastEvent->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $eventsInSameSector = [];
        $eventsInSameSector = Event::whereHas(
        'sectors' , function($query) use($currentLocale, $sectorIds) {
            return $query->whereHas(
                'localeAll' , function($query) use($currentLocale, $sectorIds) {
                    return $query->where('locale', $currentLocale)
                    ->whereIn('sector_id', $sectorIds);
                }
            );
        })
        ->where('page_key','<>',$request->slug)
        ->limit(6)
        ->get();

        $banner = Banner::where('key', '=' ,'event_detail')
        ->with([
            'bannerImages' => function($query){
                return $query->where('status',1)
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get();
            }
        ])
        ->get();
        $sidebar_key = 'events';

        return view(
            'frontend.event.event_past_detail',
            compact(
                'banner',
                'pastEvent',
                'eventsInSameSector',
                'sidebar_key'
            )
        );
    }



    
    public function showPostponedEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $pastEvent = Event::whereHas(
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
            'eventImage' => function($query) {
                return $query->get();
            },
            'eventReference' => function($query) {
                return $query->get();
            },
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
        ->where('page_key',$request->slug)

        ->first(); 

        if($postponedEvent == null) {
            abort(404);
        }

        $sectorIds = [];
        foreach($postponedEvent->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $eventsInSameSector = [];
        $eventsInSameSector = Event::whereHas(
        'sectors' , function($query) use($currentLocale, $sectorIds) {
            return $query->whereHas(
                'localeAll' , function($query) use($currentLocale, $sectorIds) {
                    return $query->where('locale', $currentLocale)
                    ->whereIn('sector_id', $sectorIds);
                }
            );
        })
        ->where('page_key','<>',$request->slug)
        ->limit(6)
        ->get();

        $banner = Banner::where('key', '=' ,'event_detail')
        ->with([
            'bannerImages' => function($query){
                return $query->where('status',1)
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get();
            }
        ])
        ->get();
        $sidebar_key = 'events';

        return view(
            'frontend.event.event_past_detail',
            compact(
                'banner',
                'postponedEventEvent',
                'eventsInSameSector',
                'sidebar_key'
            )
        );
    }




    public function showCanceledEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $canceledEvent = Event::whereHas(
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
            'eventImage' => function($query) {
                return $query->get();
            },
            'eventReference' => function($query) {
                return $query->get();
            },
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
        ->where('page_key',$request->slug)

        ->first(); 

        if($canceledEvent == null) {
            abort(404);
        }

        $sectorIds = [];
        foreach($canceledEvent->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $eventsInSameSector = [];
        $eventsInSameSector = Event::whereHas(
        'sectors' , function($query) use($currentLocale, $sectorIds) {
            return $query->whereHas(
                'localeAll' , function($query) use($currentLocale, $sectorIds) {
                    return $query->where('locale', $currentLocale)
                    ->whereIn('sector_id', $sectorIds);
                }
            );
        })
        ->where('page_key','<>',$request->slug)
        ->limit(6)
        ->get();

        $banner = Banner::where('key', '=' ,'event_detail')
        ->with([
            'bannerImages' => function($query){
                return $query->where('status',1)
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get();
            }
        ])
        ->get();
        $sidebar_key = 'events';

        return view(
            'frontend.event.event_past_detail',
            compact(
                'banner',
                'canceledEvent',
                'eventsInSameSector',
                'sidebar_key'
            )
        );
    }





    public function showEnCoursEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $encoursEvent = Event::whereHas(
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
            'eventImage' => function($query) {
                return $query->get();
            },
            'eventReference' => function($query) {
                return $query->get();
            },
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
        ->where('page_key',$request->slug)

        ->first(); 

        if($encoursEvent == null) {
            abort(404);
        }
        

        $sectorIds = [];
        foreach($encoursEvent->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $eventsInSameSector = [];
        $eventsInSameSector = Event::whereHas(
        'sectors' , function($query) use($currentLocale, $sectorIds) {
            return $query->whereHas(
                'localeAll' , function($query) use($currentLocale, $sectorIds) {
                    return $query->where('locale', $currentLocale)
                    ->whereIn('sector_id', $sectorIds);
                }
            );
        })
        ->where('page_key','<>',$request->slug)
        ->limit(6)
        ->get();

        $banner = Banner::where('key', '=' ,'event_detail')
        ->with([
            'bannerImages' => function($query){
                return $query->where('status',1)
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get();
            }
        ])
        ->get();
        $sidebar_key = 'events';

        return view(
            'frontend.event.event_encours_list',
            compact(
                'banner',
                'encoursEvent',
                'eventsInSameSector',
                'sidebar_key'
            )
        );
    }






    public function showUpcomingEvent(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $upcomingEvent = Event::whereHas(
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
            'eventImage' => function($query) {
                return $query->get();
            },
            'eventReference' => function($query) {
                return $query->get();
            },
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
        ->where('page_key',$request->slug)
        ->first();

        if($upcomingEvent == null) {
            abort(404);
        }

        $sectorIds = [];
        foreach($upcomingEvent->sectors as $sector){
            $sectorIds[] = $sector->id;
        }

        $eventsInSameSector = [];
        $eventsInSameSector = Event::whereHas(
        'sectors' , function($query) use($currentLocale, $sectorIds) {
            return $query->whereHas(
                'localeAll' , function($query) use($currentLocale, $sectorIds) {
                    return $query->where('locale', $currentLocale)
                    ->whereIn('sector_id', $sectorIds);
                }
            );
        })
        ->where('page_key','<>',$request->slug)
        ->limit(6)
        ->get();

        $banner = Banner::where('key', '=' ,'event_detail')
        ->with([
            'bannerImages' => function($query){
                return $query->where('status',1)
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get();
            }
        ])
        ->get();
        $sidebar_key = 'events';
        return view(
            'frontend.event.event_upcoming_detail',
            compact(
                'banner',
                'upcomingEvent',
                'eventsInSameSector',
                'sidebar_key'
            )
        );
    }

    public function exportExhibitor($id)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $exhibitors =  Exhibitor::where('event_id', $id)
        ->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->select('exhibitor_id','name')
                ->get();
            }
        ])
        ->select('id', 'event_id','email_address','contact')
        ->get();
        $exhibitorsArray = [
            [
                __('event.exhibitor_export_sr_no'),
                __('event.exhibitor_export_name'),
                __('event.exhibitor_export_email'),
                __('event.exhibitor_export_contact'),
            ]
        ];

        foreach ($exhibitors as $exhibitorIndex => $exhibitor) {

            foreach ($exhibitor->localeAll as $locale) {
                $exhibitorsArray[] = [
                    $exhibitor->id,
                    $locale->name,
                    $exhibitor->email_address,
                    $exhibitor->contact
                ];
            }
        }

        $export = new ExhibitorExport([$exhibitorsArray]);
        return Excel::download($export, 'participants.xlsx');
    }
}
