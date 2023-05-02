<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Setting;
use App\Models\SettingTranslate;
use LaravelLocalization;
use DB;



class InquiryController extends Controller
{
    public function index()
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $setting = Setting::select('id','key','value')->where('status',1)
            ->where('category','contact_details')
            ->with(['localeAll' => function($w) use($currentLocale){
                return $w->where('locale', $currentLocale)->select('setting_id','value')->get();
            }])->get();
        $sidebar_key = 'contact_us';
        return view('frontend.inquiry.index',compact('sidebar_key'))->withSetting($setting);
    }

    public function store(Request $request)
    {
        error_reporting(    E_ALL);
        //return $request;
        // Logic to validate form data
        $rules = [
            'username'   		=> 'required|max:191',
            'company'           => 'required|max:191',
            'job_title'          => 'required|max:191',
            'phone_number'      => 'required|numeric',
            'email'    			=> 'required|email|max:255',
            'subject'           => 'required|max:191',
            'message'           => 'required',
            //'note_inquiry'           => 'required',
            'g-recaptcha-response' => 'required',
        ];
        $messages = [

        ];
        $attributes = [
            'job_title'             => 'Job title',
            'phone_number'             => 'Phone number',
        ];


        $this->validate($request, $rules, $messages, $attributes);

        $inquiry = new Inquiry;

        $inquiry->username     = $request->username;
        $inquiry->company      = $request->company;
        $inquiry->job_title    = $request->job_title;
        $inquiry->phone_number = $request->phone_number;
        $inquiry->email        = $request->email;
        $inquiry->subject      = $request->subject;
        $inquiry->message      = $request->message;
        $inquiry->note_inquiry = 'R.A.S';
        $inquiry->status      = 1;
        $uri = 'contactus';
        $url = url()->previous() ;
        $url2 = url()->current() ;
        if(strpos($url, 'contact_post')== true)
        {
            $uri = 'contact_post';
        }
        if(strpos($url,  route('customer-home'))== true)
        {
            $uri = route('customer-home');
        }
      

        if ($inquiry -> save()) {
            $request->session()->flash('success', __('inquiry.thanku_for_contact_us'));
            return redirect()->route($uri);
        } else {
            $request->session()->flash('error', __('contactfile_step_one.something_went_wrong'));

            return redirect()->route($uri);
        }
    }


    public function getRowsDetail($id){
    $row = Inquiry::findOrFail($id);

    return view('admin.inquiry.update-row', compact('row'));

}

    public function getInquiryRowsDetail($id){
        $row = Inquiry::findOrFail($id);

        return view('admin.inquiry.inquiry-row-detail', compact('row'));

    }


    public function updateRow($id){
        $row = Inquiry::findOrFail($id);

        return view('admin.inquiry.update-row', compact('row'));

    }

    public function rowUpdate( Request $request , Inquiry $row)
    {
        $rowUpdate = [
            'id'                          => $request->id,
            'username'                    =>  $request->username,
            'company'                     =>  $request->company,
            'job_title'                   =>  $request->job_title,
            'phone_number'                =>  $request->phone_number,
            'email'                       =>  $request->email,
            'phone_number'               =>  $request->phone_number,
            'subject'                     =>  $request->subject,
            'message'                     =>  $request->message,
            'note_inquiry'                =>  $request->note_inquiry,

        ];
        //return dd($rowUpdate);
        DB::table('inquiries')->where('id',$request->id)->update($rowUpdate);
        return redirect()->back()->with('success',"Commentaire ajouté avec succès !!! ");
    }


}
