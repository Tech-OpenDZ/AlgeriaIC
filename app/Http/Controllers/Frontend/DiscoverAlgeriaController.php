<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiscoverAlgeriaContent,
    App\Models\DiscoverAlgeriaContentTranslate,
    App\Models\DiscoverAlgeriaSubcontent,
    App\Models\DiscoverAlgeriaSubcontentTranslate;

use LaravelLocalization;

class DiscoverAlgeriaController extends Controller
{
    public function index(Request $request)
    {

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $algeria_content = DiscoverAlgeriaContent::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])->where('status',1)
          ->orderBy('display_order')
          ->get(); 


        $algeria_content_as_per_key = DiscoverAlgeriaContent::with([
        'localeAll' => function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale)
            ->get();
        },
        'subContents' => function($query) use($currentLocale) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'document'
            ])->where('status',1)
                ->orderBy('display_order')
                ->get();  
        }
        ])->where('status',1) 
        ->where('content_key',$request->key)
        ->orderBy('display_order')
        ->get(); 

        $sidebar_key = 'discover_algeria';
        $title = isset($algeria_content_as_per_key[0]->localeAll[0]->title)? $algeria_content_as_per_key[0]->localeAll[0]->title:"";
        
        // $algeria_content = DiscoverAlgeriaContent::with('localeAll')->get();
        return view('frontend.discover_algeria.index', compact('title','algeria_content','algeria_content_as_per_key','sidebar_key'));
    }
}
