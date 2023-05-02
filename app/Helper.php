<?php
use LaravelLocalization as LaravelLocalization;
use App\Models\Advertisement;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\AdvertisementPages;
use NumberToWords\NumberToWords;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

// this function will return the partners array
function getPartners(){
    return App\Models\Partner::where('status',1)->get();
}
/**
 * This function will return Images Array for particular page.
*/
function getBannerImages($keys='home'){
    $currentLocale = LaravelLocalization::getCurrentLocale();
    return App\Models\ Banner::where('key', '=' ,$keys)->with(['bannerImages'=>function($query){ return $query->where('status',1)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
    },'bannerImages.localeAll'=>function($query) use($currentLocale){
        return $query->where('locale',$currentLocale)->get();
    }])->first();
}

// This function will return the contact us information
function getContactInfo()
{
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $setting = App\Models\Setting::select('id','key','value')->where('status',1)
        ->where('category','contact_details')
        ->with(['localeAll' => function($w) use($currentLocale){
            return $w->where('locale', $currentLocale)->select('setting_id','value')->get();
    }])->get();
    return $setting;
}

// This function will return the social media and general information
function getHeaderInfo()
{
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $settings = App\Models\Setting::where('status',1)
        ->where(function ($innerQuery) {
            $innerQuery->where('category','general')
                       ->orWhere('category','social_media');
        })->get();
    $locale_id = [];
    foreach($settings as $setting){
        if ($setting->is_locale == 1){
            $locale_id[] = $setting->id;
        }
    }

    $translates = App\Models\SettingTranslate::whereIn('setting_id',$locale_id)
                                            ->where('locale',$currentLocale)->get();
    foreach($translates as $translate)  {
        foreach($settings as $setting){
            if ($setting->is_locale == 1 && $setting->id == $translate->setting_id){
                $setting->value = $translate->value;
            }
        }
    }
    return $settings;
}

//this function return the discover algeria content
function getDiscoverAlgeriaContent() {
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $algeria_content = App\Models\DiscoverAlgeriaContent::with([
        'localeAll' => function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale)
            ->get();
        }
    ])->where('status',1)
      ->orderBy('display_order')
      ->get();

    return $algeria_content;
}

//(previous function) this function return the resource content 
/*
function getResourcesContent() {
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $resource = App\Models\Resource::with([
        'localeAll' => function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale)
            ->get();
        },
        'subPages' => function($query) use($currentLocale) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)

                    ->get();
                }
            ])->where('status',1)
                ->orderBy('display_order')
                ->get();
        }
    ])->where('status',1)
    ->where('parent_id',null)
    ->orderBy('display_order')
    ->first();

    return $resource;

}*/

function getResourcesContent() {
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $resource = App\Models\Resource::with([
        'localeAll' => function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale)
            ->get();
        }
    ])->where('status',1)
    ->where('parent_id',0)
    ->orderBy('display_order')
    ->get();

    return $resource;

}

function getPages()
{
    $pages = [
        'home' => 'Home',
        'discover_algeria' => 'Discover Algeria',
        'algeria_business_business' => 'Algeria Business Network',
        'testimonials'  => 'Testimonials',
        'contact_us' => 'Contact Us',
        'news'      => 'News',
        'news_details' => 'News Details',
        'events'       => 'Events',
        'business_opportunity' => 'Business Opportunity',
        'resource' => 'Resources',
        'business_directory' => 'Business Directory',
        'contact_list' => 'Contact List',
        'business_intelligence'=>'Business Intelligence',
        'press-review'=>'Press Review',
        'company'=>'Company',
        'sitemap'=> 'Sitemap',
        'terms_of_service'=>'Terms of service',
        'legal_notice'  => 'Legal Notice',
        'privacy_policy'   =>'Privacy Policy',
    ];
    return $pages;
}

function getAdvertisement($location,$page,$keyword='')
{
    $p_ad = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
        $q->where('page',$page);
    })->with('pages')->where('advertisement_type','permanent')->get();


    // $p_ad = $ads;
    $date = Carbon::now();
    $d_ad = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
        $q->where('page',$page);
    })->where('formula_type','date')->whereDate('start_date','<=',$date)->whereDate('end_date','>=',$date)->get();

    $c_ad = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
        $q->where('page',$page);
    })->where('formula_type','clicks')->whereColumn('number_of_clicks','>','actual_number_of_clicks')->get();

    $dp_ad = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
        $q->where('page',$page);
    })->where('formula_type','displays')->whereColumn('number_of_display','>','actual_number_of_displays')->get();

    // dd($keyword);

    if($keyword != '')
    {
        $keywords = explode(',',$keyword);

        $k_ad = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
            $q->where('page',$page);
        })->where('formula_type','keyword')
        ->where(function ($query) use($keywords) {
            for ($i = 0; $i < count($keywords); $i++){
               $query->orwhere('keywords', 'like',  '%' . $keywords[$i] .'%');
            }
       })->where('for_keyword','clicks')->whereColumn('number_of_clicks','>','actual_number_of_clicks')->get();

        $k_ad1 = Advertisement::active()->where('location',$location)->whereHas('pages',function($q) use($page){
            $q->where('page',$page);
        })->where('formula_type','keyword')
        ->where(function ($query) use($keywords) {
            for ($i = 0; $i < count($keywords); $i++){
               $query->orwhere('keywords', 'like',  '%' . $keywords[$i] .'%');
            }
       })->where('for_keyword','displays')->whereColumn('number_of_display','>','actual_number_of_displays')->get();

        $k_ad->merge($k_ad1);
    }
    else{
        $k_ad = [];
    }

    // dd($p_ad,$d_ad,$c_ad,$dp_ad,$k_ad);
    $adv = $p_ad->merge($d_ad)->merge($c_ad)->merge($dp_ad)->merge($k_ad);
    // dd( $adv);


    if(count($adv) > 0)
        $ad = $adv->random();

    // dd($ad->id);
    if(isset($ad))
    {
        $ad->actual_number_of_displays = $ad->actual_number_of_displays + 1;
        $ad->save();

        $adv = [
            'ad_id' => $ad->ad_id,
            'url' => $ad->sponsorised_link,
            'image' => asset('storage/uploads/advertisement/'.$ad->ad)
        ];
    }
    else{
        // if($location == 'top-header')
        //     $img = asset('css/images/business-banner.png');
        // else
        //     $img = asset('css/images/way-of-success.png');
        // $adv = [
        //     'ad_id' => 0,
        //     'url' => '#',
        //     'image' => $img
        // ];
        $adv = null;
    }


    return $adv;
}

// number to words
function numberToWords($totalprice) {

    $currentLocale = LaravelLocalization::getCurrentLocale();
    $numberToWords = new NumberToWords();
        if($currentLocale == 'ar'){
            $currentLocale = 'en';
        }
    $numberTransformer = $numberToWords->getNumberTransformer($currentLocale);
    $words = $numberTransformer->toWords($totalprice);
    return $words;
}

// GREENBOX COUNTS FOR BUSINESS dIRECTORY & CONTACT LIST PAGE
function getCompanyDataCount()
{
    // GREEN BOX COUNTS
    // ---------Comapny data-----------
    $company_count = Company::where('status', 1)->where('is_approved', 1)->count();
    $contact_emailcount = Company::where('status', 1)->where('is_approved', 1)->get();
    $contact_email = 0;
    foreach ($contact_emailcount as $key => $value) {
        $count = $value->contacts->count();
        $contact_email += $count;
    }
    $totalEmailContact = $company_count + $contact_email;
    // ---------contact mobile count-----
    $contact_mobilecount = Company::where('status', 1)->where('is_approved', 1)->get();
    $contact_mobile = 0;
    foreach ($contact_mobilecount as $key => $value) {
        $count = $value->contacts->count();
        $contact_mobile += $count;
    }
    $totalMobileContact = $company_count + $contact_mobile;

    // IS FEATURED SECTION
    $featured_companies = Company::where('status', 1)->where('is_approved', 1)->where('is_featured', 1)->orderBy('created_at', 'desc')->limit(10)->get();
    $result = [
        'mobile_count' => $totalMobileContact,
        'email_count' => $totalEmailContact,
        'company_count' => $company_count,
        'featured_companies' => $featured_companies,
    ];

    return $result;
}

function getSelectedPaymentData($page)
{
    $paymentAmountArray = [];
    switch ($page) {
        case 'upgrade-plan':
            $subscriptionData = Subscription::find(Session::get('upgrade_subscription_id'));
            $paymentAmountArray = [
                'price_dzd' => $subscriptionData->price_dzd,
                'price_usd' => $subscriptionData->price_dollar,
                'price_euro' => $subscriptionData->price_euro
            ];
            break;
        case 'press-review':
            $paymentAmountArray = [
                'price_dzd' => Session::get('price_dzd'),
                'price_usd' => Session::get('price_dollar'),
                'price_euro' => Session::get('price_euro')
            ];
            break;
        case 'contact-file':
            $paymentAmountArray = [
                'price_dzd' => Session::get('final_price_USD'),
                'price_usd' => Session::get('final_price_DZD'),
                'price_euro' => Session::get('final_price_Euro')
            ];
            break;
    }
    return  $paymentAmountArray;
}

//get messanger app id
function getMessangerAppId(){
    $appId = App\Models\Setting::where('key','facebook_messanger')->select('value')->first();
    return $appId->value;
}

//get testimonial status from setting table
function getTestimonialStatus() {
    $status = App\Models\Setting::where('key','want_to_show_testimonials_on_home_page')->select('status')->first();
    return $status;
}

//get the business intelligence dashboard and report 
function getBusinessIntelligenceData() {

    if (Auth::guard('customer')->check()) {
        $user = Auth::guard('customer')->user();

        if($user->id != $user->parant_id) {
            $customer_id = $user->parent_id;
        } else {
            $customer_id = $user->id;
        }
        $dashboard = App\Models\BusinessIntelligenceDashboard::where('customer_id',$customer_id)->where('status',1)->get();

        $report = App\Models\BusinessIntelligenceReport::where('customer_id',$customer_id)->where('status',1)->get();
        if ($dashboard->count() > 0 || $report->count() > 0){
            return true;
        } else {
            return false;
        }
    }
} 


// function to set the display order 
function setDisplayOrder($table) { 

    DB::statement("SET @r=0");
    
    $query = 'UPDATE '.$table.' AS t1
                INNER JOIN (
                SELECT id,@r:= (@r+1) AS rn
                FROM '.$table.'
                WHERE deleted_at IS NULL
                ORDER BY display_order ASC 
                ) AS t2
            ON t1.id = t2.id SET t1.display_order = t2.rn WHERE deleted_at IS NULL';

    DB::statement($query);
}

// function to redirect on upgrade plan
function upgradePlan() { 

    $currentLocale          = LaravelLocalization::getCurrentLocale();

    $subscriptions          = Subscription::with([
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
    ->where('status',1)
    ->get();
    // dd($currentLocale);
    $page = 'upgrade_plan';
    Session::put('payment_initiated_from','upgrade_plan');
    return ['subscriptions'=>$subscriptions,'page'=>$page];
}
?>
