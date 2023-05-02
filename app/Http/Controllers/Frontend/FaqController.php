<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use LaravelLocalization;


class FaqController extends Controller
{
    public function index(Request $request)
    {
    	$currentLocale = LaravelLocalization::getCurrentLocale();

    	$faqs = Faq::select('id')->where('status',1)
    		->orderBy('display_order','asc')
    		->orderBy('created_at', 'asc')
    		->with(['localeAll' => function($w) use($currentLocale){
    			return $w->where('locale', $currentLocale)->select('faq_id','question','answer')->get();
    	}])->get();
		$sidebar_key = 'faq';
        return view('frontend.faq.index',compact('sidebar_key'))->with('faqs', $faqs);
    }
}
