<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\OurService;
use App\Models\AssistanceService;
use App\Models\Subscription;
use App\Models\BusinessIntelligence;
class OurServicesController extends Controller
{
    //

    public function index(){
    	$currentLocale = LaravelLocalization::getCurrentLocale();
    	// ------Display Our services--------------------------
    	$our_services = OurService::whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->get();
        }])->first();
    	
    	// -------------------*****-----------------------
        $assistance_services = AssistanceService::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->get();
        }])->get();

        // ---------Display Subscription plan---------
             $subscriptions  = Subscription::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            },
            'permissions'=> function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            }
        ])
        ->get();

         // Display Business Intelligence data
        $b_intelligence = BusinessIntelligence::whereHas('localeAll',function($q) use($currentLocale){
                     return $q->where('locale', $currentLocale);
        })->with(['localeAll'=> function($q) use($currentLocale){
                     return $q->where('locale',$currentLocale)->get();
        }])
        ->where('status',1)
        ->where('services',1)
        ->orderBy('created_at','desc')
        ->orderBy('display_order','desc')
        ->limit(2)
        ->get();
    	// echo "<pre>";print_r($subscriptions);exit();
    	return view('frontend.our_services.index',compact('our_services','assistance_services','subscriptions','b_intelligence'));
    }
}
