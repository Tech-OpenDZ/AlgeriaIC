<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registrant;
use App\Models\Setting;
use App\Models\SettingTranslate;
use LaravelLocalization;
use DB;



class RegistrantController extends Controller
{
    public function index()
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $setting = Setting::select('id','key','value')->where('status',1)
            ->where('category','contact_details')
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->select('setting_id','value')->get();
            }])->get();
        $sidebar_key = 'registrant_page';
        return view('frontend.registrants.index',compact('sidebar_key'))->withSetting($setting);
    }

    public function store(Request $request)
    {
        error_reporting(    E_ALL);
        //return $request;
        // Logic to validate form data
        $rules = [
            'username'   		=> 'required|max:191',
            'email'    			=> 'required|email|max:255',
            'company'           => 'required|max:191',
            'job_title'          => 'required|max:191',
            'phone_number'      => 'required|numeric',
            
            //'subject'           => 'required|max:191',
            //'message'           => 'required',
            //'note_events'     => 'required',
            'g-recaptcha-response' => 'required',
        ];
        $messages = [

        ];
        $attributes = [
            'job_title'             => 'Job title',
            'phone_number'          => 'Phone number',
        ];


        $this->validate($request, $rules, $messages, $attributes);

        $registrant = new Registrant;

        $registrant->username     = $request->username;
        $registrant->company      = $request->company;
        $registrant->job_title    = $request->job_title;
        $registrant->phone_number = $request->phone_number;
        $registrant->email        = $request->email;
       
        $registrant->message      = $request->message;
        $registrant->note_events = 'R.A.S';
        
        
     
        

       if ($registrant -> save()) {
             return redirect()->back()->with('success',"Votre inscription a été envoyé avec succès !!! ");
         
        } else {
           //  return redirect()->back()->with('success',"Enregistrement mis à jour avec succès !!! ");

            
        }
    }
	
	
	
	public function storeAdmin(Request $request)
    {
        error_reporting(    E_ALL);
        //return $request;
        // Logic to validate form data
        $rules = [
            'username'   		=> 'required|max:191',
            'email'    			=> 'required|email|max:255',
            'company'           => 'required|max:191',
            'job_title'          => 'required|max:191',
            'phone_number'      => 'required|numeric',
            
            //'subject'           => 'required|max:191',
            //'message'           => 'required',
            'note_events'     => 'required',
            //'g-recaptcha-response' => 'required',
        ];
        $messages = [

        ];
        $attributes = [
            'job_title'             => 'Job title',
            'phone_number'          => 'Phone number',
        ];


        $this->validate($request, $rules, $messages, $attributes);

        $registrant = new Registrant;

        $registrant->username     = $request->username;
        $registrant->company      = $request->company;
        $registrant->job_title    = $request->job_title;
        $registrant->phone_number = $request->phone_number;
        $registrant->email        = $request->email;
       
        $registrant->message      = $request->message;
        $registrant->note_events = $request->note_events;
        
        
     
        

        if ($registrant -> save()) {
             return redirect()->back()->with('success',"Enregistrement ajouté avec succès !!! ");
         
        } else {
           //  return redirect()->back()->with('success',"Enregistrement mis à jour avec succès !!! ");

            
        }
    }


    public function getRegistrantDetail($id){
    $row = Registrant::findOrFail($id);

    return view('admin.registrant.update-registrant', compact('row'));

}


    public function updateRegistrant(Request $request , $id){
        $row = Registrant::findOrFail($id);

        return view('admin.registrant.update-registrant', compact('row'));

    }

    public function registrantUpdate( Request $request , Registrant $row)
    {
        $registrantUpdate = [
            'id'                          => $request->id,
            'username'                    =>  $request->username,
            'company'                     =>  $request->company,
            'job_title'                   =>  $request->job_title,
            'phone_number'                =>  $request->phone_number,
            'email'                       =>  $request->email,
            'phone_number'                =>  $request->phone_number,
            'message'                     =>  $request->message,
            'note_events'                 =>  $request->note_events,

        ];
        //return dd($rowUpdate);
        DB::table('events_registrants')->where('id',$request->id)->update($registrantUpdate);
        return redirect()->back()->with('success',"Enregistrement mis à jour avec succès !!! ");
    }


}
