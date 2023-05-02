<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        return "test";
    }

    public function create()
    {
       return view('frontend.newsletters.subscribe');
    }

    public function subscribe_store(Request $request){
    	$data = $request->all();
    	$this->validate($request,[
    			'name' => 'required',
    			'company_name' => 'required',
    			'email' => 'required|email',
    			'job_title' => 'required',
    			'cell_phone' => 'required|numeric'
            ]);
         $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email])
                            ->first();

        if($email_exist){
            $request->session()->flash('subscribed', 'You have already subscribed.');
            return redirect()->route('subscribe.create');
        }else{
            $newsletters = new Newsletter;

            $newsletters->company_name     = $request->company_name;
            $newsletters->name             = $request->name;
            $newsletters->job_title        = $request->job_title;
            $newsletters->email            = $request->email;
            $newsletters->cell_phone       = $request->cell_phone;
            $newsletters->type             = $request->type;

            if ($newsletters->save()) {
                Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                    $message->to($newsletters->email);
                    $message->subject(__('newsletter.email_subject'));
                });
                $request->session()->flash('success', 'Thank you for subscribing.');
                return redirect()->route('subscribe.create');
            } else {
                $request->session()->flash('error', 'Something went wrong.');
                return redirect()->route('subscribe.create');
            }
        }
    	
        // $newsletters->user_id      = 1;
    }

    public function event_create(){
    	return view('frontend.newsletters.event');
    }

    public function event_store(Request $request){
    	$data = $request->all();
    	$this->validate($request,[
    			'name' => 'required',
    			'company_name' => 'required',
    			'email' => 'required|email',
    			'job_title' => 'required',
    			'cell_phone' => 'required|numeric'
    		]);
        $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email])
                            ->first();
        if($email_exist){
            $request->session()->flash('subscribed', 'You have already subscribed.');
            return redirect()->route('event.create');
        }else{
            $newsletters = new Newsletter;

            $newsletters->company_name     = $request->company_name;
            $newsletters->name      = $request->name;
            $newsletters->job_title    = $request->job_title;
            $newsletters->email        = $request->email;
            $newsletters->cell_phone      = $request->cell_phone;
            $newsletters->type      = $request->type;
            // $newsletters->user_id      = 1;

            if ($newsletters->save()) {
                Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                    $message->to($newsletters->email);
                    $message->subject(__('newsletter.email_subject'));
                });
                $request->session()->flash('success', 'Thank you for subscribeing');
                return redirect()->route('event.create');
            } else {
                $request->session()->flash('error', 'Something went wrong.');
                return redirect()->route('event.create');
            } 
        }
    	

    }

    public function business_create(){
    	return view('frontend.newsletters.business');
    }

    public function business_store(Request $request){
    	$data = $request->all();
    	$this->validate($request,[
    			'name' => 'required',
    			'company_name' => 'required',
    			'email' => 'required|email',
    			'job_title' => 'required',
    			'cell_phone' => 'required|numeric'
    		]);
        $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email])
                            ->first();
        if($email_exist){
            $request->session()->flash('subscribed', 'You have already subscribed.');
            return redirect()->route('business.create');
        }else{
            $newsletters = new Newsletter;

            $newsletters->company_name     = $request->company_name;
            $newsletters->name      = $request->name;
            $newsletters->job_title    = $request->job_title;
            $newsletters->email        = $request->email;
            $newsletters->cell_phone      = $request->cell_phone;
            $newsletters->type      = $request->type;

            if ($newsletters->save()) {
                Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                    $message->to($newsletters->email);
                    $message->subject(__('newsletter.email_subject'));
                });
                $request->session()->flash('success', 'Thank you for subscribing.');
                return redirect()->route('business.create');
            } else {
                $request->session()->flash('error', 'Something went wrong.');
                return redirect()->route('business.create');
            }
        }
    	

    }


    public function resources_create(){
    	return view('frontend.newsletters.resources');
    }

    public function resource_store(Request $request){
    	$data = $request->all();
    	$this->validate($request,[
    			'name' => 'required',
    			'company_name' => 'required',
    			'email' => 'required|email',
    			'job_title' => 'required',
    			'cell_phone' => 'required|numeric'
    		]);
        $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email])
                            ->first();
        if($email_exist){
            $request->session()->flash('subscribed', 'You have already subscribed.');
            return redirect()->route('resource.create');
        }else{
            $newsletters = new Newsletter;

            $newsletters->company_name     = $request->company_name;
            $newsletters->name      = $request->name;
            $newsletters->job_title    = $request->job_title;
            $newsletters->email        = $request->email;
            $newsletters->cell_phone      = $request->cell_phone;
            $newsletters->type      = $request->type;

            if ($newsletters->save()) {
                Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                    $message->to($newsletters->email);
                    $message->subject(__('newsletter.email_subject'));
                });
                $request->session()->flash('success', 'Thank you for subscribing.');
                return redirect()->route('resource.create');
            } else {
                $request->session()->flash('error', 'Something went wrong.');
                return redirect()->route('resource.create');
            }
        }
    	

    }

    public function subscribe_newsletters(Request $request){
        $data = $request->all();
         // echo "<pre>";print_r($data);exit();
         $validator = \Validator::make($request->all(),['email'   => 'required|email']);
         if ($validator->fails()){
             return response()->json(['errors'=>$validator->errors()]);
         }

         else{
            $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email,'type'=> $request->type])
                            ->first();
            if($email_exist != null){
                return response()->json(['subscribed'=>__('newsletter.subscribed')]);
            }else{
                if(Auth::guard('customer')->check()){
                    $newsletters = new Newsletter;
                    $newsletters->company_name     = Auth::guard('customer')->user()->company_name;
                    $newsletters->name = Auth::guard('customer')->user()->name;
                    $newsletters->customer_id = Auth::guard('customer')->user()->id;
                    $newsletters->job_title = Auth::guard('customer')->user()->job_title;
                    $newsletters->cell_phone = Auth::guard('customer')->user()->mobile_number;
                    $newsletters->email = $request->email;
                    $newsletters->type  = $request->type;
                    if ($newsletters->save()){
                        Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                            $message->to($newsletters->email);
                            $message->subject(__('newsletter.email_subject'));
                        });
                        return response()->json(['success'=>__('newsletter.Form_successMessage')]);
                    }else{
                        return response()->json(['error'=>'Something went wrong.']);
                    }
                }else{
                    $newsletters = new Newsletter;
                    $newsletters->email = $request->email;
                    $newsletters->type  = $request->type;
                    if ($newsletters->save()){
                        Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                            $message->to($newsletters->email);
                            $message->subject(__('newsletter.email_subject'));
                        });
                        return response()->json(['success'=>__('newsletter.Form_successMessage')]);
                    }else{
                        return response()->json(['error'=>'Something went wrong.']);
                    }
                }
            }
         }
       
    }

    public function economic_newsletters(Request $request){
        $data = $request->all();
        $validator = \Validator::make($request->all(),['email'   => 'required']);
         if ($validator->fails()){
             return response()->json(['errors'=>$validator->errors()]);
         }
        else{
            $email_exist = DB::table('newsletters')
                            ->where(['email' => $request->email])
                            ->first();
            
            if($email_exist){
                return response()->json(['subscribed'=>'You have already subscribed.']);
            }else{
                if(Auth::guard('customer')->check()){
                    $newsletters = new Newsletter;
                    $newsletters->company_name     = Auth::guard('customer')->user()->company_name;
                    $newsletters->name = Auth::guard('customer')->user()->name;
                    $newsletters->customer_id = Auth::guard('customer')->user()->id;
                    $newsletters->job_title = Auth::guard('customer')->user()->job_title;
                    $newsletters->cell_phone = Auth::guard('customer')->user()->mobile_number;
                    $newsletters->email = $request->email;
                    $newsletters->type  = $request->type;
                    if ($newsletters->save()){
                        Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                            $message->to($newsletters->email);
                            $message->subject(__('newsletter.email_subject'));
                        });
                        return response()->json(['success'=>'Thank you for subscribing.']);
                    }else{
                        return response()->json(['error'=>'Something went wrong.']);
                    }
                }else{
                    $newsletters = new Newsletter;
                    $newsletters->email = $request->email;
                    $newsletters->type  = $request->type;
                    if ($newsletters->save()){
                        Mail::send('frontend.newsletters.mail', function($message) use ($newsletters) {
                            $message->to($newsletters->email);
                            $message->subject(__('newsletter.email_subject'));
                        });
                        return response()->json(['success'=>'Thank you for subscribing.']);
                    }else{
                        return response()->json(['error'=>'Something went wrong.']);
                    }
                }
            }
         }
    } 
}
