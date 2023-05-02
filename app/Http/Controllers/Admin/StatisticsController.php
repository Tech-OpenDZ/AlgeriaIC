<?php

namespace App\Http\Controllers\Admin;


use App\Models\Statistics;
use Illuminate\Http\Request;
use Auth;
use App\Services\Slug;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use Illuminate\Support\Str;
use Mail;
use DB;

class StatisticsController extends Controller
{


    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
       // $this->middleware('permission:manage-statistics-list');

    }
    public function index(Request $request){
    	if($request->ajax()){
           $statistics = Statistics::select('*');
           return Datatables::of($statistics)
               //->addIndexColumn()

                    ->editColumn('created_at', function ($row) {
                        return [
                            'display' => e($row->created_at->format('d/m/Y')),
                            'timestamp' => $row->created_at->timestamp
                        ];
                    })
                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                //$w->orWhere('ip', 'LIKE', "%$search%")
                                $w->orWhere('date_visite', 'LIKE', "%$search%")
                                ->orWhere('pages_vues', 'LIKE', "%$search%")
                                ->orWhere('pays', 'LIKE', "%$search%");
                                 //->orWhere('created_at', 'LIKE', "%$search%");
                                //->orWhere('subject', 'LIKE', "%$search%");

                            });
                        };

                        if (!empty($request->get('search_ip'))) {
                            $instance->where(function($w) use($request){
                                $search_ip = $request->get('search_ip');
                                $w->orWhere('ip', 'LIKE', "%$search_ip%");
                                   // ->orWhere('date_visite', 'LIKE', "%$search%")
                                   // ->orWhere('pages_vues', 'LIKE', "%$search%");
                                //->orWhere('created_at', 'LIKE', "%$search%");
                                //->orWhere('subject', 'LIKE', "%$search%");

                            });
                        }

                        if (!empty($request->get('search_pays'))) {
                            $instance->where(function($w) use($request){
                                $search_pays = $request->get('search_pays');
                                $w->orWhere('pays', 'LIKE', "%$search_pays%");
                                   // ->orWhere('date_visite', 'LIKE', "%$search%")
                                   // ->orWhere('pages_vues', 'LIKE', "%$search%");
                                //->orWhere('created_at', 'LIKE', "%$search%");
                                //->orWhere('subject', 'LIKE', "%$search%");

                            });
                        }
                       
                    })


                  // ->rawColumns(['date_visite'])
                    ->make(true);

        }

        //$statistics = [];
        return view('admin.statistics.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

   
}
