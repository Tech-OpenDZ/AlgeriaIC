<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use LaravelLocalization;
use App\User;
use Auth;


class ResourceController extends Controller
{
    public function getResources(Request $request, $key = null,$subkey = null)
    {
    if (!auth()->guard('customer')->check()){
            return redirect()->back()->with('openLogin',true);
        } 
        $resource = null;
        $subcontent = null;
        $currentLocale = LaravelLocalization::getCurrentLocale();
        
        if($key){
          
            $resource_key = Resource::where('page_key',$key)->first();

            if($resource_key == null){
                return redirect()->route('business-environment');

            } else {
             
                $resource = Resource::with([
                    
                    'localeAll' => function($query) use($currentLocale) {
                       
                        return $query->where('locale', $currentLocale)
                        ->get();
                    },
                    'subPages' => function($query) use($currentLocale,$resource_key) {
                      
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                             
                                return $query->where('locale', $currentLocale)
                                            ->get();
                            },
                            'subPages' => function($query) use($currentLocale) {
                              
                                return $query->with([
                                    'localeAll' => function($query) use($currentLocale) {
                                        return $query->where('locale', $currentLocale)
                                                    ->get();
                                    },

                                ])->where('status',1)
                                ->orderBy('display_order')
                                ->get();
                            }

                        ])->where('status',1)
                        ->orderBy('display_order')
                        ->get();
                    },

                ])->where('page_key',$resource_key->page_key)
                ->first();
             

                if($subkey) {
                    
                  
                    $subkey = $subkey;
                }else {
                   if(!$resource->subPages->isEmpty()){
                  
                    $subkey = $resource->subPages[0]->page_key;
                   }
                }
         

                $subcontent =  Resource::with([
                    'subPages' => function($query) use($currentLocale) {
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                             
                                return $query->where('locale', $currentLocale)
                                            ->get();
                            },

                        ])->where('status',1)
                        ->orderBy('display_order')
                        ->get();
                    }
                ])->where('status',1)
                ->where('page_key',$subkey)
                ->orderBy('display_order')
                ->first();

            }
        } else {

        }

        
        
            $sidebar_key = 'resource';
            return view('frontend.resources.index_tab',compact('resource','subcontent','sidebar_key'));

         

       

    }


    public function getResources2(Request $request, $key = null,$subkey = null)
    {
    /* if (!auth()->guard('customer')->check()){
            return redirect()->back()->with('openLogin',true);
        } */
        $resource = null;
        $subcontent = null;
        $currentLocale = LaravelLocalization::getCurrentLocale();
        
        if($key){
          
            $resource_key = Resource::where('page_key',$key)->first();

            if($resource_key == null){
                return redirect()->route('business-environment2');

            } else {
             
                $resource = Resource::with([
                    
                    'localeAll' => function($query) use($currentLocale) {
                       
                        return $query->where('locale', $currentLocale)
                        ->get();
                    },
                    'subPages' => function($query) use($currentLocale,$resource_key) {
                      
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                             
                                return $query->where('locale', $currentLocale)
                                            ->get();
                            },
                            'subPages' => function($query) use($currentLocale) {
                              
                                return $query->with([
                                    'localeAll' => function($query) use($currentLocale) {
                                        return $query->where('locale', $currentLocale)
                                                    ->get();
                                    },

                                ])->where('status',1)
                                ->orderBy('display_order')
                                ->get();
                            }

                        ])->where('status',1)
                        ->orderBy('display_order')
                        ->get();
                    },

                ])->where('page_key',$resource_key->page_key)
                ->first();
             

                if($subkey) {
                    
                  
                    $subkey = $subkey;
                }else {
                   if(!$resource->subPages->isEmpty()){
                  
                    $subkey = $resource->subPages[0]->page_key;
                   }
                }
         

                $subcontent =  Resource::with([
                    'subPages' => function($query) use($currentLocale) {
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                             
                                return $query->where('locale', $currentLocale)
                                            ->get();
                            },

                        ])->where('status',1)
                        ->orderBy('display_order')
                        ->get();
                    }
                ])->where('status',1)
                ->where('page_key',$subkey)
                ->orderBy('display_order')
                ->first();

            }
        } else {

        }

        
        
            $sidebar_key = 'resource';
            return view('frontend.resources.index_tab_free',compact('resource','subcontent','sidebar_key'));

         

       

    }
}
