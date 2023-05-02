<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Press;

class PressController extends Controller
{
    //

 


    public function index(Request $request){
    	$currentLocale = LaravelLocalization::getCurrentLocale();
    
    
    	
    	// -------------------*****-----------------------
        $press = Press::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale);
            })
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->get();
               
        }])
        ->where('status',1)
        ->orderBy('publication_date','desc')
        ->get();

        $press = Press::orderBy('publication_date', 'DESC')->paginate(6);

        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page'): 1;
  
      

        

    	return view('frontend.press.index',compact('press'));
    }
}
