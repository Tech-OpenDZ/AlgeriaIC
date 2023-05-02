<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\AlgeriaBusinessNetwork,
    App\Models\AlgeriaBusinessNetworkTranslate,
    App\Models\Banner; 

use LaravelLocalization;

class AlgeriaBusinessNetworkController extends Controller
{
    public function index()
    {
        $banner = Banner::where('key', '=' ,'algeria_business_network')->with(['bannerImages'=>function($query){ return $query->where('status',1)->orderBy('display_order', 'asc')->orderBy('created_at', 'asc')->get();
        }])->get();
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $algeria_business_network = AlgeriaBusinessNetwork::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->orderBy('network_id')
                ->get();
            }
        ])->first(); 
        $sidebar_key = 'algeria_business_business';
        return view('frontend.algeria_business_network.index', compact('algeria_business_network','banner','sidebar_key'));
    }
}
