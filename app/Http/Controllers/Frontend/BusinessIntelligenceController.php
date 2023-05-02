<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\BusinessIntelligenceDashboard,
    App\Models\BusinessIntelligenceSubDashboard,
    App\Models\BusinessIntelligenceReport,
    App\Models\ShuttleSheet;
    
use LaravelLocalization;

class BusinessIntelligenceController extends Controller
{
    // display the dashboard for business intelligence

    public function index()
    {
        $customer_id;
        $shuttle_sheet = null;
    	$sidebar_key = 'business_intelligence';
        $user = Auth::guard('customer')->user();
        $currentLocale = LaravelLocalization::getCurrentLocale();
        if(Auth::guard('customer')->check())
        {
            if(!$user->can('has-permission', ['business_intelligence_notification_of_new_reports', $user])) { 
                $customer_id = null;
                $main_dashboard = BusinessIntelligenceDashboard::with([
                                    'localeAll' => function($query) use($currentLocale) {
                                        return $query->where('locale', $currentLocale)
                                        ->get();
                                    }
                                ])
                                ->where('customer_id',null)
                                ->where('status',1)
                                ->get(); 
                
            } else {
            
                if($user->id != $user->parent_id){
                    $customer_id = $user->parent_id;
                } else {
                    $customer_id = $user->id;
                }
            
                $main_dashboard = BusinessIntelligenceDashboard::with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                        ->get();
                    }
                ])
                ->where('customer_id',$customer_id)
                ->where('status',1)
                ->get(); 
    
                $shuttle_sheet =  ShuttleSheet::where('status',1)->where('customer_id',$customer_id)->orderBy('id', 'DESC')->first();; 
            }
        }else {
            $customer_id = null;
            $main_dashboard = BusinessIntelligenceDashboard::with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                }
            ])
            ->where('customer_id',null)
            ->where('status',1)
            ->get(); 
        }
        
        return view('frontend.business_intelligence.main_dashboard',compact('main_dashboard','sidebar_key','shuttle_sheet','customer_id'));
    } 

    // display the sub dashboard and report for business intelligence

    public function subDashboard(Request $request) 
    {
        $sidebar_key = 'business_intelligence';
        $user = Auth::guard('customer')->user();

        if(!$user->can('has-permission', ['business_intelligence_notification_of_new_reports', $user])) { 
            return redirect('upgrade-plan');
        }
        $report_id = 0;
        $report_title = "";
        $customer_id ;

        if($user->id != $user->parent_id){
            $customer_id = $user->parent_id;
        } else {
            $customer_id = $user->id;
        } 
        switch($request->key) {
            case "sector-reports":
                $report_id =  1;
                $report_title = __('business_intelligence.sector_reports');
                break;
            case "pr-monitoring":
                $report_id =  2;
                $report_title = __('business_intelligence.pr_monitoring');
                break;
            case "e-reputation":
                $report_id =  3;
                $report_title = __('business_intelligence.e_reputation');
                break;
            case "competitive-intelligence":
                $report_id =  4;
                $report_title = __('business_intelligence.competitive_intelligence');
                break;
            case "legal-monitoring":
                $report_id =  5;
                $report_title = __('business_intelligence.legal_monitoring');
                break;
            case "events":
                $report_id =  6;
                $report_title = __('business_intelligence.events');
                break;     
        } 

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $sub_dashboard = BusinessIntelligenceSubDashboard::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('customer_id',$customer_id)
        ->where('report_id',$report_id)
        ->where('status',1)
        ->get();

        $reports = BusinessIntelligenceReport::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->where('customer_id',$customer_id)
        ->where('report_id',$report_id)
        ->where('status',1)
        ->get();

        

        $shuttle_sheet =  ShuttleSheet::where('status',1)->where('customer_id',$customer_id)->orderBy('id', 'DESC')->first();; 


        return view('frontend.business_intelligence.sub_dashboard',compact('sub_dashboard','reports','report_title','sidebar_key','shuttle_sheet'));
        
    }


    public function download(Request $request)
    {
        $report = BusinessIntelligenceReport::where('id',$request->id)
                                                        ->first();
        $myFile = public_path('storage/uploads/business_intelligence/files/'.$report->report);
    	$headers = ['Content-Type: application/pdf'];
        $newName = $report->file_name;
        
    	return response()->download($myFile, $newName, $headers);
    }

    public function downloadSheet(Request $request)
    {
        $sheet = ShuttleSheet::where('id',$request->id)
                             ->first();
        $myFile = public_path('storage/uploads/business_intelligence/files/'.$sheet->shuttle_sheet);
    	$headers = ['Content-Type: application/pdf'];
        $newName = $sheet->file_name;
        
    	return response()->download($myFile, $newName, $headers);
    }
}
