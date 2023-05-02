<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PressReviewRequest,
    App\Models\Sector,
    App\Models\SectorTranslate,
    App\Models\Zone,
    App\Models\ZoneTranslate,
    App\Models\PaymentTransaction,
    App\Models\NewsTranslate,
    App\Models\Customer,
    App\Models\News,
    App\Models\NewsSourceTranslate;
use DataTables;
use Mail;

class PressReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $press_review_requests = PressReviewRequest::with('customer','transaction')
                                                        ->where('verified_at',null)
                                                        ->where('status','pending');
            return Datatables::eloquent($press_review_requests)
                ->addIndexColumn()
                ->addColumn('user', function($press_review_requests) {
                    return $press_review_requests->customer->name;
                })
                ->addColumn('transaction', function($press_review_requests) {
                    if(isset($press_review_requests->transaction))
                    return $press_review_requests->transaction->transaction_id."<br>".$press_review_requests->transaction->status;
                    else
                    return '';
                })
                ->addColumn('estimation', function($press_review_requests) {
                    if(isset($press_review_requests->transaction))
                    return $press_review_requests->transaction->price."<br>".$press_review_requests->transaction->currency;
                    else
                    return '';
                })
                ->addColumn('search_criteria', function($press_review_requests) {
                    $sectors = "";
                    $zones ="";
                    $sources= "";
                    if($press_review_requests->source != null) {
                        foreach(json_decode($press_review_requests->source) as $source_id){
                            $source_name = NewsSourceTranslate::where('locale','en')
                                                        ->where('news_source_id',$source_id)
                                                        ->select('title')->first();
                            $sources = $sources.$source_name['title']."," ;

                        }
                    }
                    if($press_review_requests->sector_id != null) {
                        foreach(json_decode($press_review_requests->sector_id) as $sector_id){
                            $sector_name = SectorTranslate::where('locale','en')
                                                        ->where('sector_id',$sector_id)
                                                        ->select('name')->first();
                            $sectors = $sectors.$sector_name['name']."," ;

                        }
                    }
                    if($press_review_requests->zone_id != null) {
                        foreach(json_decode($press_review_requests->zone_id) as $zone_id){
                            $zone_name = ZoneTranslate::where('locale','en')
                                                        ->where('zone_id',$zone_id)
                                                        ->select('name')->first();
                            $zones = $zones.$zone_name['name']."," ;

                        }
                    }
                    $search_criteria = '<p>Keyword:'.$press_review_requests->keyword.'<br>Source:'.$sources.'<br>sector:'.$sectors.'<br>zone:'.$zones.'<br>Period of time: <br> from '.$press_review_requests->start_date.' to '.$press_review_requests->end_date.'</p>';
                    return $search_criteria;
                })
                ->addColumn('action', function($press_review_requests){
                    if (\Auth::user()->can('press-review-validate-request')) {
                        $validatebtn = '<a href="javascript:void(0)" data-id="'.$press_review_requests->transaction->transaction_id.'" class="btn btn-primary validate_btn">Validate</a><br>';
                    } else {
                        $validatebtn = '';
                    }
                    if (\Auth::user()->can('press-review-cancel-request')) {
                        $cancelbtn = '<br><a href="' . route('cancel-request', [$press_review_requests->token]).'" class="btn btn-danger">Cancel</button>';
                    } else {
                        $cancelbtn = '';
                    }
                    return $validatebtn.$cancelbtn;
                })
                ->filter(function ($instance) use ($request) {
                    $search = $request->get('search');
                    $instance->where(function($w) use($request,$search){
                        $w->orWhere('Keyword', 'LIKE', "%$search%")
                          ->orWhere('start_date', 'LIKE', "%$search%")
                          ->orWhere('end_date', 'LIKE', "%$search%")
                          ->orWhere('transaction_id', 'LIKE', "%$search%")
                          ->orWhere('created_at', 'LIKE', "%$search%")
                          ->orWhereHas('customer', function($w) use($request,$search){
                            $w->where('name', 'LIKE', "%$search%");
                          })
                          ->orWhereHas('transaction', function($w) use($request,$search){
                            $w->where('price', 'LIKE', "%$search%")
                              ->orWhere('currency', 'LIKE', "%$search%");
                          });
                    });
                })
            ->rawColumns(['transaction','estimation','action','search_criteria'])
            ->make(true);
        }
        return view('admin.press_review.pending_request');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function canceledRequest(Request $request)
    {

        if($request->ajax()) {
            $press_review_request = PressReviewRequest::with('customer','transaction')
                                                        ->where('status','cancel');

            return Datatables::eloquent($press_review_request)
                ->addIndexColumn()
                ->addColumn('user', function($press_review_request){
                    return $press_review_request->customer->name;
                })
                ->addColumn('search_criteria', function($press_review_request){
                    $sectors = "";
                    $zones ="";
                    $sources= "";
                    if($press_review_request->source != null) {
                        foreach(json_decode($press_review_request->source) as $source_id){
                            $source_name = NewsSourceTranslate::where('locale','en')
                                                        ->where('news_source_id',$source_id)
                                                        ->select('title')->first();
                            $sources = $sources.$source_name['title']."," ;

                        }
                    }
                    if($press_review_request->sector_id != null) {
                        foreach(json_decode($press_review_request->sector_id) as $sector_id){
                            $sector_name = SectorTranslate::where('locale','en')
                                                        ->where('sector_id',$sector_id)
                                                        ->select('name')->first();
                            $sectors = $sectors.$sector_name['name']."," ;

                        }
                    }
                    if($press_review_request->zone_id != null) {
                        foreach(json_decode($press_review_request->zone_id) as $zone_id){
                            $zone_name = ZoneTranslate::where('locale','en')
                                                        ->where('zone_id',$zone_id)
                                                        ->select('name')->first();
                            $zones = $zones.$zone_name['name']."," ;

                        }
                    }
                    $search_criteria = '<p>Keyword:'.$press_review_request->keyword.'<br>Source:'.$sources.'<br>sector:'.$sectors.'<br>zone:'.$zones.'<br>Period of time: <br> from '.$press_review_request->start_date.' to '.$press_review_request->end_date.'</p>';
                    return $search_criteria;
                })
                ->addColumn('estimation', function($press_review_request){
                    return $press_review_request->transaction->price."<br>".$press_review_request->transaction->currency;
                })
                ->filter(function ($instance) use ($request) {
                    $search = $request->get('search');
                    $instance->where(function($w) use($request,$search){
                        $w->orWhere('Keyword', 'LIKE', "%$search%")
                          ->orWhere('start_date', 'LIKE', "%$search%")
                          ->orWhere('end_date', 'LIKE', "%$search%")
                          ->orWhere('transaction_id', 'LIKE', "%$search%")
                          ->orWhere('created_at', 'LIKE', "%$search%")
                          ->orWhereHas('customer', function($w) use($request,$search){
                            $w->where('name', 'LIKE', "%$search%");
                          })
                          ->orWhereHas('transaction', function($w) use($request,$search){
                            $w->where('price', 'LIKE', "%$search%")
                              ->orWhere('currency', 'LIKE', "%$search%");
                          });
                    });
                })
            ->rawColumns(['is_featured','search_criteria','estimation'])
            ->make(true);
        }
        return view('admin.press_review.cancel_request');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function ValidatedRequest(Request $request)
    {
        if($request->ajax()) {
            $press_review_request = PressReviewRequest::where('verified_at','!=',null);

            return Datatables::eloquent($press_review_request)
                ->addIndexColumn()
                ->addColumn('user', function($press_review_request){
                    return $press_review_request->customer->name;
                })
                ->addColumn('search_criteria', function($press_review_request){
                    $sectors = "";
                    $zones ="";
                    $sources= "";
                    if($press_review_request->source != null) {
                        foreach(json_decode($press_review_request->source) as $source_id){
                            $source_name = NewsSourceTranslate::where('locale','en')
                                                        ->where('news_source_id',$source_id)
                                                        ->select('title')->first();
                            $sources = $sources.$source_name['title']."," ;

                        }
                    }
                    if($press_review_request->sector_id != null) {
                        foreach(json_decode($press_review_request->sector_id) as $sector_id){
                            $sector_name = SectorTranslate::where('locale','en')
                                                        ->where('sector_id',$sector_id)
                                                        ->select('name')->first();
                            $sectors = $sectors.$sector_name['name']."," ;

                        }
                    }
                    if($press_review_request->zone_id != null) {
                        foreach(json_decode($press_review_request->zone_id) as $zone_id){
                            $zone_name = ZoneTranslate::where('locale','en')
                                                        ->where('zone_id',$zone_id)
                                                        ->select('name')->first();
                            if (!is_null($zone_name))
                                $zones = $zones.$zone_name['name']."," ;

                        }
                    }
                    $search_criteria = '<p>Keyword:'.$press_review_request->keyword.'<br>Source:'.$sources.'<br>sector:'.$sectors.'<br>zone:'.$zones.'<br>Period of time: <br> from '.$press_review_request->start_date.' to '.$press_review_request->end_date.'</p>';
                    return $search_criteria;
                })
                ->addColumn('estimation', function($press_review_request){
                    return $press_review_request->transaction->price."<br>".$press_review_request->transaction->currency;
                })
                ->filter(function ($instance) use ($request) {
                    $search = $request->get('search');
                    $instance->where(function($w) use($request,$search){
                        $w->orWhere('Keyword', 'LIKE', "%$search%")
                          ->orWhere('start_date', 'LIKE', "%$search%")
                          ->orWhere('end_date', 'LIKE', "%$search%")
                          ->orWhere('transaction_id', 'LIKE', "%$search%")
                          ->orWhere('created_at', 'LIKE', "%$search%")
                          ->orWhereHas('customer', function($w) use($request,$search){
                            $w->where('name', 'LIKE', "%$search%");
                          })
                          ->orWhereHas('transaction', function($w) use($request,$search){
                            $w->where('price', 'LIKE', "%$search%")
                              ->orWhere('currency', 'LIKE', "%$search%");
                          });
                    });
                })
            ->rawColumns(['is_featured','search_criteria','estimation'])
            ->make(true);
        }
        return view('admin.press_review.validated_request');
    }

    public function validateRequest(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'note'   => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $user = Customer::select('name','email','default_locale')->where('id',$request->get('customer_id'))->first();
        $token = $request->token;
        $result = PressReviewRequest::where('token',$token)
                    ->update([
                        'verified_at' => date('Ymd'),
                        'status'      => 'completed',
                    ]);

        $paymentResult = PaymentTransaction::where('transaction_id',$request->get('transaction_id'))
                        ->update([
                            'status'      => 'completed',
                            'note'        => $request->get('note'),
                        ]);

        $press_review_request = PressReviewRequest::where('token',$token)->first();
        $sectors = "";
        $zones ="";
        $sources= "";
        if($press_review_request->source != null) {
            foreach(json_decode($press_review_request->source) as $source){
                $sources = $sources.$source.",";

            }
        }
        if($press_review_request->sector_id != null) {
            foreach(json_decode($press_review_request->sector_id) as $sector_id){
                $sector_name = SectorTranslate::where('locale','en')
                                            ->where('sector_id',$sector_id)
                                            ->select('name')->first();
                $sectors = $sectors.$sector_name['name']."," ;

            }
        }
        if($press_review_request->zone_id != null) {
            foreach(json_decode($press_review_request->zone_id) as $zone_id){
                $zone_name = ZoneTranslate::where('locale','en')
                                            ->where('zone_id',$zone_id)
                                            ->select('name')->first();
                $zones = $zones.$zone_name['name']."," ;

            }
        }

        $newsCountBySectors         = [];
        $newsCountByZone            = [];
        $newsCountBySource          = [];
        $newsCountByKeyword         = [];
        $sectorArr                  = [];
        $uniquenews_id              = [];
        $keywords                   = explode (",",$press_review_request->keyword);
        $sectorsData = Sector::with([
            'localeAll' => function($query) {
                return $query->where('locale', "en")
                ->get();
            },
            'news'
        ])
        ->withCount('news')
        ->get();

        $zoneData = Zone::with([
            'localeAll' => function($query) {
                return $query->where('locale', 'en')
                ->get();
            },
            'news'
        ])
        ->withCount('news')
        ->get();

        $i=0;

        $sectors = json_decode($press_review_request->sector_id);
        $zones   = json_decode($press_review_request->zone_id);
        if($sectors != null) {
            foreach($sectorsData as $sector){
                foreach($sectors as $sectorId){
                    if($sector->id == $sectorId){
                        foreach($sector->news as $news){
                            if(!in_array($news->pivot->news_id,$uniquenews_id)&& ($news->pivot->sector_id == $sectorId)){
                                $uniquenews_id[] = $news->pivot->news_id;
                            }
                        }
                        $newsCountBySectors[$sectorId] = ['name'=> $sector->localeAll[0]->name, 'count'=> $sector->news_count];
                    }
                }
            }
        }

        if($zones != null) {
            foreach($zoneData as $zone){
                foreach($zones   as $zoneId){
                    if($zone->id == $zoneId){
                        foreach($zone->news as $news) {
                            if(!in_array($news->pivot->news_id,$uniquenews_id) && ($news->pivot->zone_id == $zoneId)){
                                $uniquenews_id[] = $news->pivot->news_id;
                            }
                        }
                        $newsCountByZone[$zoneId] = ['name'=> $zone->localeAll[0]->name, 'count'=> $zone->news_count];
                    }
                }
            }
        }

        if($keywords[0] != "") {
            foreach($keywords as $keyword) {
                $countByKeyword = NewsTranslate::where('title', 'LIKE',"%$keyword%")
                                            ->orwhere('description','LIKE',"%$keyword%")
                                            ->where('locale','en')
                                            ->distinct('news_id')
                                            ->count('news_id');

                $newsCountByKeyword[$keyword] = $countByKeyword;
            }
        }

        $countAsPerPeriod = News::whereBetween('insertion_date',[$press_review_request->start_date, $press_review_request->end_date])->count('id');
        $dataAsPerPeriods = News::whereBetween('insertion_date',[$press_review_request->start_date, $press_review_request->end_date])->get();

        foreach($dataAsPerPeriods as $dataAsPerPeriod) {
            if(!in_array($dataAsPerPeriod->id,$uniquenews_id)){
                $uniquenews_id[] = $dataAsPerPeriod->id;
            }
        }

        $totalCount = count($uniquenews_id);

        $data = [
            'keyword'       => $press_review_request->keyword,
            'sector'        => $sectors,
            'source'        => $sources,
            'zone'          => $zones,
            'start_date'    => $press_review_request->start_date,
            'end_date'      => $press_review_request->end_date,
        ];
        Mail::send('frontend.press_review.press_review_email',['token' => $token,'locale' => $user->default_locale,'user_name'=>$user->name], function($message) use ($user) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($user->email);
            $message->subject('Press review Document link');
         });
        return ['result' => true, 'detail' => 'Mail sent successfully'];
    }

    public function download($token)
    {
        $pressReviewRequest = PressReviewRequest::where('token',$token)->first();
        if($pressReviewRequest)
        {
            return response()->download(public_path($pressReviewRequest->file_path));
        }
        abort(404);
    }

    public function cancelRequest($token) {
        $result = PressReviewRequest::where('token',$token)
                    ->update([
                        'status' => 'cancel',
                    ]);
        return redirect()->back()->with('success','Request Canceled');
    }

    public function transactionDetails(Request $request)
    {
        $paymentTranaction = PaymentTransaction::where('transaction_id',$request->get('transaction_id'))->first();
        $paymentReviewRequest = PressReviewRequest::where('transaction_id',$request->get('transaction_id'))->first();
        $paymentTranaction->token = $paymentReviewRequest->token;
        $paymentTranaction->customer_id = $paymentReviewRequest->customer_id;
        return \Response::json($paymentTranaction);
    }
}
