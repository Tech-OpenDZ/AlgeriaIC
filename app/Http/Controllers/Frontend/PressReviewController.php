<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News,
    App\Models\NewsTranslate,
    App\Models\Zone,
    App\Models\Sector,
    App\Models\Customer,
    App\Models\PressReviewRequest,
    App\Models\PaymentConfiguration,
    App\Models\PaymentTransaction,
    App\Models\NewsSource;
use LaravelLocalization;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Jobs\GenerateFile;
use AUth;
use Session;
use PDF;
use Mail;
use Carbon\Carbon;

class PressReviewController extends Controller
{

    private $data;

    public function index()
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
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
        foreach($zone_arr as $zone){
            $zones[$zone->id] = $zone->localeAll[0]->name;
        }
        asort($zones);



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

        $sidebar_key = 'press-review';
        return view('frontend.press_review.press_review',compact('sectors','zones','sources','sidebar_key'));
    }

    public function generate(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();


        if(Auth::guard('customer')->check())
        {
            $user = Auth::guard('customer')->user();

             if(!$user->can('has-permission', ['news_press_review', $user])) {
                 return redirect('upgrade-plan');
             }

            if((!Session::has('request_data')) && ($request->input() == [])) {
                return redirect()->back()->with('error','Please enter the search criteria.');
            }
            // if(Session::has('request_data')){
            //     $request_data = Session::get('request_data');
            // } else{
            //     $request_data = $request->input();
            // }
            if($request->input('start') && $request->input('end')){
                $request_data = $request->input();
            }else {
                $request_data = Session::get('request_data');
            }
            $keywords                   = explode (",",$request_data['keyword']);
            $sectorIds                  = isset($request_data['sector'])?$request_data['sector']:"";
            $zoneIds                    = isset($request_data['zone'])?$request_data['zone']:"";
            $sourceIds                  = isset($request_data['sources'])?$request_data['sources']:"";
            $newsCountBySectors         = [];
            $newsCountByZone            = [];
            $newsCountBySource          = [];
            $newsCountByKeyword         = [];
            $sectorArr                  = [];
            $uniquenews_id              = [];
            $sectors = Sector::whereHas('news',function ($query) use($request_data) {
                return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']));
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'news' => function($query) use($request_data) {
                    return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                    ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']))
                    ->get();
                },
            ])
            ->withCount('news')
            ->get();

            $zones = Zone::whereHas('news',function ($query) use($request_data) {
                return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']));
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'news' => function($query) use($request_data) {
                    return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                    ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']))
                    ->get();
                },
            ])
            ->withCount('news')
            ->get();

            $sources = NewsSource::whereHas('news',function ($query) use($request_data) {
                return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']));
            })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'news' => function($query) use($request_data) {
                    return $query->whereDate('insertion_date','>=',Carbon::parse($request_data['start']))
                    ->whereDate('insertion_date','<=',Carbon::parse($request_data['end']))
                    ->get();
                },
            ])
            ->withCount('news')
            ->get();
            $i=0;
            if($sectorIds != ""){
                foreach($sectorIds as $sectorId){
                    $sector = Sector::with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->where('id',$sectorId)
                    ->get();

                    $sectorArr[$i] = $sector[0]->localeAll[0]->name;

                    $i++;
                }
                foreach($sectors as $sector){
                    foreach($sectorIds as $sectorId){
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
            if($zoneIds != ""){
                foreach($zoneIds as $zoneId){
                    $zone = Zone::with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->where('id',$zoneId)
                    ->get();

                    $zoneArr[$i] = $zone[0]->localeAll[0]->name;
                    $i++;
                }
                foreach($zones as $zone){
                    foreach($zoneIds as $zoneId){
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
            $j=0;
            if($sourceIds != ""){
                foreach($sourceIds as $sourceId){
                    $source = NewsSource::with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        }
                    ])
                    ->where('id',$sourceId)
                    ->get();
                    $sourceArr[$j] = $source[0]->localeAll[0]->title;
                    $j++;
                }
                foreach($sources as $source){
                    foreach($sourceIds as $sourceId){
                        if($source->id == $sourceId){
                            foreach($source->news as $news) {
                                if(!in_array($news->id,$uniquenews_id) && ($news->source_id == $sourceId)){
                                    $uniquenews_id[] = $news->id;
                                }
                            }
                            $newsCountBySource[$sourceId] = ['name'=> $source->localeAll[0]->title, 'count'=> $source->news_count];
                        }
                    }
                }
            }
            if($keywords[0] != "") {
                foreach($keywords as $keyword) {
                    $keywordData =  News::whereHas('localeAll', function($query) use ($currentLocale,$keyword) {
                        $query->where('title', 'LIKE',"%$keyword%")
                              ->orwhere('description','LIKE',"%$keyword%")
                              ->where('locale',$currentLocale);
                    })
                    ->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                            ->get();
                        },
                    ])
                    ->whereBetween('insertion_date',[$request_data['start'], $request_data['end']])
                    ->get()
                    ->toArray();

                foreach($keywordData as $keyword_data) {
                    $news_id = $keyword_data['locale_all'][0]['news_id'];
                    if(!in_array($news_id,$uniquenews_id)) {
                        $uniquenews_id[] = $news_id;
                    }
                }
                    $newsCountByKeyword[$keyword] = count($keywordData);
                }
            }
            $countAsPerPeriod = News::whereBetween('insertion_date',[$request_data['start'], $request_data['end']])->count('id');
            $dataAsPerPeriods = News::whereBetween('insertion_date',[$request_data['start'], $request_data['end']])->get();
            foreach($dataAsPerPeriods as $dataAsPerPeriod) {
                if(!in_array($dataAsPerPeriod->id,$uniquenews_id)){
                    $uniquenews_id[] = $dataAsPerPeriod->id;
                }
            }
            $totalCount = count($uniquenews_id);
            if($totalCount > 0) {
                $press_review_request = new PressReviewRequest();
                $press_review_request->customer_id = Auth::guard('customer')->user()->id;
                $press_review_request->keyword      = isset($request_data['keyword'])?$request_data['keyword']:null;
                $press_review_request->sector_id    = isset($request_data['sector'])?json_encode($request_data['sector']):null;
                $press_review_request->zone_id      = isset($request_data['zone'])?json_encode($request_data['zone']):null;
                $press_review_request->source       = isset($request_data['sources'])?json_encode($request_data['sources']):null;
                $press_review_request->start_date   = $request_data['start'];
                $press_review_request->end_date     = $request_data['end'];
                $press_review_request->status       = "inactive";
                $press_review_request->token        = Str::random(60);
                $press_review_request->save();
                Session::put('request_data',$request_data);
                Session::put('press_review_request_id',$press_review_request->id);
            }else{
                Session::forget('request_data');
                return redirect('press-review')->with('error', true);

            }
            Session::put('news_ids', $uniquenews_id);
            $searched_criteria = [
                'keywords'     => $request_data['keyword'],
                'sectors'      => isset($sectorArr)?implode(", ",$sectorArr):"",
                'zones'        => isset($zoneArr)?implode(", ",$zoneArr):"",
                'source'       => isset($sourceArr)?implode(", ",$sourceArr):"",
                'start_date'   => $request_data['start'],
                'end_date'     => $request_data['end'],

            ];

            $dataAsPerDate = PressReviewRequest::where('id',Session::get('press_review_request_id'))->first();

            $price_values   = PaymentConfiguration::where('module_type','press-review')->get();
            $VAT_values   = PaymentConfiguration::where('key','VAT_value')->first();

            // Declare and define two dates

            $date1 =  strtotime($dataAsPerDate->start_date);
            $date2 =  strtotime($dataAsPerDate->end_date);

            // Formulate the Difference between two dates
            $diff = abs($date2 - $date1);

            // To get the year divide the resultant date into
            // total seconds in a year (365*60*60*24)
            $years = floor($diff / (365*60*60*24));

            // To get the month, subtract it with years and
            // divide the resultant date into
            // total seconds in a month (30*60*60*24)
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

            // To get the day, subtract it with years and
            // months and divide the resultant date into
            // total seconds in a days (60*60*24)
            $days = floor(($diff - $years * 365*60*60*24 -
            $months*30*60*60*24)/ (60*60*24));

            $daysvalue = $months*30.417;
            $daysvalue = $daysvalue+$days;
            $month = $months.'.'.$days;
            $month = (float)$month;
            $month = ceil($month);
            $finalPrice = 0;
            $vatprice= 0;
            $per_month_price_dzd =0;
            $per_month_price_usd =0;
            $per_month_price_euro =0;
            $vatPercent  =0;

            foreach($price_values as $price_value){
                if($price_value->key == "press_review_key"){
                    $per_month_price_dzd = $price_value->value_DZD;
                    $per_month_price_usd = $price_value->value_USD;
                    $per_month_price_euro = $price_value->value_Euro;
                    $price = $price_value->value/30.417;
                    $finalPrice_in_dzd = $totalCount * $price_value->value_DZD;
                    $finalPrice_in_usd = $totalCount * $price_value->value_USD;
                    $finalPrice_in_euro = $totalCount * $price_value->value_Euro;
                }
            }

            $vatprice_in_dzd = ($VAT_values->value_DZD/100)*$finalPrice_in_dzd;
            $vatprice_in_usd = ($VAT_values->value_USD/100)*$finalPrice_in_usd;
            $vatprice_in_euro = ($VAT_values->value_Euro/100)*$finalPrice_in_euro;
            $vat_percent_usd = $VAT_values->value_USD;
            $vat_percent_dzd = $VAT_values->value_DZD;
            $vat_percent_euro = $VAT_values->value_Euro;

            $customer = Customer::where('id',Auth::guard('customer')->user()->id)->first();
            $totalprice_in_dzd  = $finalPrice_in_dzd + $vatprice_in_dzd;
            $totalprice_in_usd  = $finalPrice_in_usd + $vatprice_in_usd;
            $totalprice_in_euro = $finalPrice_in_euro + $vatprice_in_euro;
            $words = numberToWords($totalprice_in_dzd);

            $data = [
                'articles' => $totalCount,
                'price_per_month' => ['dzd'=>$per_month_price_dzd, 'usd'=>$per_month_price_usd, 'euro'=>$per_month_price_euro],
                'quantity' => $month,
                'final_price' => ['dzd'=>$finalPrice_in_dzd, 'usd'=>$finalPrice_in_usd, 'euro'=>$finalPrice_in_euro],
                'vat_price'   => ['dzd'=>$vatprice_in_dzd, 'usd'=>$vatprice_in_usd, 'euro'=>$vatprice_in_euro],
                'vat_percent' => ['dzd'=>$vat_percent_dzd, 'usd'=>$vat_percent_usd, 'euro'=>$vat_percent_euro],
                'price'       => ['dzd'=>$totalprice_in_dzd, 'usd'=>$totalprice_in_usd, 'euro'=>$totalprice_in_euro],
                'words'       => $words,
                'name'        => $customer->name,
                'address'     =>  $customer->company_address,
            ];

            Session::put('user_currency',$user->currency);
            Session::put('price_dzd',$totalprice_in_dzd);
            Session::put('price_dollar',$totalprice_in_usd);
            Session::put('price_euro',$totalprice_in_euro);
            // Session::put('finalPrice',$totalprice);
            Session::put('months',$month);
            $sidebar_key = 'press-review';
            return view('frontend.press_review.press_review_step_two',compact('data','newsCountBySectors','newsCountByZone','searched_criteria','newsCountBySource','newsCountByKeyword','totalCount','sidebar_key','user'));
        }
        else {

            Session::put('request_data',$request->input());
            return redirect()->back()->with('openLogin',true);
        }
    }

    public function confirmEstimation(Request $request)
    {
        $this->data['currency'] = PaymentConfiguration::where('module_type','press-review')->get()->toArray();
        $this->data['month']    = Session::get('months');
        foreach($this->data['currency'] as $currency){
            if($currency['key'] == 'DZD'){
                $this->data['value'] = $currency['value'];

            }
        }
        return view('frontend.press_review.press_review_payment',$this->data);
    }

    public function confirmPayment(Request $request)
    {
        if(!Session::has('press_review_request_id')) {
            return redirect()->route('press-review');
        }
        $user= auth()->guard('customer')->user();


        $currentLocale  = LaravelLocalization::getCurrentLocale();
        $paymentMode    = ($request->chooseOffline) ? 'offline' : 'online' ;
        $paymentType    = ($paymentMode == 'offline') ? $request->chooseOffline : $request->chooseOnline;
        $payment        = new PaymentTransaction();
        $payment->customer_id       = Auth::guard('customer')->user()->id;
        $payment->transaction_id    = "T-".date('Ymd').'-'.date('His').'-'.Auth::guard('customer')->user()->id;
        $payment->module_type       = PaymentTransaction::module_type['press-review'];
        $payment->price             = (float)$request->price;
        $payment->currency          = $request->currency;
        $payment->payment_mode      = $paymentMode;
        $payment->payment_type      = $paymentType;
        $payment->status            = 'pending';
        $payment->note              = "";

        $result = $payment->save();

        if($result) {
            PressReviewRequest::where('id',Session::get('press_review_request_id'))
                ->update([
                    'transaction_id' =>  $payment->transaction_id,
                    'status'=> 'pending',
                ]);
        }
        // dd($currentLocale);
        $news_id = Session::get('news_ids');

        // dd($news_details);
        $request_data = Session::get('request_data');
        $user = Customer::select('email','name')->where('id',Auth::guard('customer')->user()->id)->first();
        $sectorIds  = isset($request_data['sector'])?$request_data['sector']:"";
        $i=0;
        if($sectorIds != ""){
            foreach($sectorIds as $sectorId){
                $sector = Sector::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('id',$sectorId)
                ->get();

                $sectorArr[$i] = $sector[0]->localeAll[0]->name;
                $i++;
            }
        }
        $searched_criteria = [
            'sectors'           => isset($sectorArr)?implode(", ",$sectorArr):"",
            'source'            => isset($request_data['source'])?implode(", ",$request_data['source']):"",
            'start_date'        => date('F jS Y',strtotime($request_data['start'])),
            'end_date'          => date('F jS Y',strtotime($request_data['end'])),
            'price'             => (float)$request->price." ".$request->currency,
            'payment_method'    => $paymentType,
            'articles'          => count(Session::get('news_ids')),
        ];
        Mail::send('frontend.press_review.press_review_admin_email',['user' => $user->name,'user_email'=>$user->email,'searched_criteria'=>$searched_criteria], function($message) use ($user) {
            $message->from('noreply@algeriainvest.com');
            $message->to('contact@algeriainvest.com');
            $message->subject('New Press Review added.');
        });

        Mail::send('frontend.press_review.press_review_customer_email',['user' => $user->name,'locale'=>$currentLocale,'searched_criteria'=>$searched_criteria], function($message) use ($user) {
            $message->from('noreply@algeriainvest.com');
            $message->to($user->email);
            $message->subject('Press review request sent successfully!');
        });

        $press_review_request_id = Session::get('press_review_request_id');
        GenerateFile::dispatch($press_review_request_id, $news_id);
        Session::forget('press_review_request_id');
        Session::forget('articles');
        Session::forget('finalPrice');
        Session::forget('request_data');
        Session::forget('price_dzd');
        Session::forget('price_dollar');
        Session::forget('price_euro');
        Session::forget('news_ids');
        Session::forget('user_currency');

        $sidebar_key = 'press-review';

        return view('frontend.press_review.press_review_confirmation',compact('sidebar_key'));

    }

    public function downloadPDF(Request $request)
    {
        $sidebar_key = 'press-review';
        $token = $request->token;
        $pressReviewRequest = PressReviewRequest::where('token',$token)->first();
        if($pressReviewRequest->customer_id != Auth::guard('customer')->user()->id){
            return view('frontend.press_review.invalid_url');
        }
        return view('frontend.press_review.press_review_download_file',compact('token','sidebar_key'));
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
}
