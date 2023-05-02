<?php

namespace App\Http\Controllers\Frontend;
use App\Models\CmsPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;

class ContentController extends Controller
{
    public function getSitemap() { 

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $content = CmsPage::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('page_key','sitemap')
                ->get();
                    
        // dd($content);
        $sidebar_key ='sitemap';
        return view('frontend.sitemap.index',compact('content','sidebar_key'));
    } 

    public function getPrivacyPolicy() { 

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $content = CmsPage::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('page_key','privacy_policy')
                ->get();
                    
        // dd($content);
        $sidebar_key ='privacy_policy';
        return view('frontend.privacy_policy.index',compact('content','sidebar_key'));
    } 

    public function getTermsOfService() { 

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $content = CmsPage::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('page_key','terms_of_service')
                ->get();
                    
        // dd($content);
        $sidebar_key ='terms_of_service';
        return view('frontend.terms_of_service.index',compact('content','sidebar_key'));
    }

    public function getLegalNotice() { 

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $content = CmsPage::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('page_key','legal_notice')
                ->get();
                    
        // dd($content);
        $sidebar_key ='legal_notice';
        return view('frontend.legal_notice.index',compact('content','sidebar_key'));
    }
}
