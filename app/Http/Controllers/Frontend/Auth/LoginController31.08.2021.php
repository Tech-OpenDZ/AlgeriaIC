<?php

namespace App\Http\Controllers\Frontend\Auth;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomersSubscription;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mail\SendSuccessfulRegistrationNotification;
use App\Models\Customer;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:customer')->except('logout');
    }

    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $input = $request->all();
        // echo "<pre>";print_r($input);exit();
         $validator = \Validator::make($request->all(), [
            'customer_username'   => 'required',
            'customer_password' => 'required',
        ],['customer_username.required' => 'Username or Email is required.','customer_password.required' => 'The password field is required.']);


         if ($validator->fails()){

             return response()->json(['errors'=>$validator->errors()]);
         }
         else{
            $fieldType = filter_var($request->customer_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $remember_me = $request->has('remember_me') ? true : false;
            $status = Customer::where('username',$request->customer_username)
                        ->orWhere('email',$request->customer_username)
                        ->first(); 
            
                        
            if($status != null) {
                if($status->is_deactivated == 1) {
                return response()->json(['login_error'=>__('login.deactve')]);
                }  
            }else {
                return response()->json(['login_error' => __('login.loginerror')]);
            }
            if (Auth::guard('customer')->attempt(
                [
                    $fieldType => $request->customer_username,
                    'password' => $request->customer_password
                ],
                $remember_me
            )){
                    
                    $request->session()->regenerate();
                    $customer = Auth::guard('customer')->user();
                    // return $customer;
                    $locale = $customer->default_locale;

                    $url = Session::has('previous_url_for_login') ? Session::get('previous_url_for_login'):url()->previous();
                    Session::forget('previous_url_for_login');
                 
    
                    $previous_url_segments = explode('/',$url);
                    $guest_url_array = [
                        'admin',
                        'customer-register',
                        'customer-reset-password',
                        'email-activation',
                        'reset-password',
                        'customerlogin',
                        'customer-logout',
                        'link-expired',
                        'customer.password.reset',
                        'customer-change-password',
                        
                    ];
                    foreach ($previous_url_segments as $key => $previous_url_segment) {
                        if (in_array($previous_url_segment, $guest_url_array)) {
                            $url = route('customer-home');
                            break;
                        }
                    }

                    if($url == "{{route('contact_post')}}" || route('contact_post')) {
                        
                        $url = route('customer-home');
                    }
                       

                    if ($url == route('press-review')){
                        $url = route('generate');
                    }

                    if ($url == route('contact-file')){
                        $url = route('contact-file-estimation');
                    }

                    $locale = str_replace('/'.$request->segment(1).'/', '/'.$locale.'/', $url);
                    
                    $activation_at  = Carbon::parse($customer->activation_at);
                    $now            = Carbon::now();
                    $timeInterval   = $activation_at->diffInMinutes($now);

                    if ( $customer->status == 0 && $timeInterval > 1440) {
                        Auth::guard('customer')->logout();
                        $token                          = Str::random(60);
                        $customer->activation_token     = $token;
                        $customer->activation_at        = Carbon::now();

                        if ($customer -> save()) {
                            $signupUserData                     = $customer;
                            $signupUserData['email_customer']   = $customer->email;
                            $signupUserData['token']            = $token;

                            Mail::to($signupUserData['email_customer'])
                            ->send(new SendSuccessfulRegistrationNotification($signupUserData));
                            return response()->json(['mail_sent' => __('signup.successContentNext')]);
                        } else {
                            return response()->json(['login_error' => __('signup.errorOccurredLogin')]);
                        }
                    } else if( $customer->status == 0 && $timeInterval < 1440) {
                        Auth::guard('customer')->logout();
                        return response()->json(['mail_sent' => __('signup.successContentNext')]);
                    }


                    if($customer->subscription_id > 1) {
                        if ($customer->payment_status == 'pending') {
                            Session::put('subscription_id' , 1);
                        }
                        else {
                            $customer_subscription = CustomersSubscription::find(CustomersSubscription::where('customer_id',$customer->parent_id)->where('status','completed')->max('id'));
                            $customer_subscription->end_date =  Carbon::parse($customer_subscription->end_date);
                            $customer_subscription_end_date = clone $customer_subscription->end_date;
                            if (Carbon::now()->greaterThan($customer_subscription_end_date)) {

                                if ($customer->parent_id == $customer->id) {
                                    Session::put('subscription_id' , 1);
                                }
                                else {
                                    Auth::guard('customer')->logout();
                                    return response()->json(['login_error' => __('signup.yourPlanExpired')]);
                                }
                            }
                            else {

                                Session::put('subscription_id' , $customer->subscription_id);
                            }
                        }
                    }

                    return response()->json(['success'=>'1', 'prev_route' => $locale, 'userData' => Auth::guard('customer')->user()]);

                    // return redirect()->route('customer-home');
            }
            else {
                return response()->json(['login_error'=>'Log in failed. Please check email or password']);
                //  return redirect()
                // ->back()
                // ->withInput()
                // ->with('login_error','Log in failed. Please check email or password');
            }
            
         }

        // return $this->loginFailed();
    }
    

    private function validator(Request $request) {
        //validate the form...
        $data = $request->all();


            $rules = [
            'username'    => 'required|exists:customers',
            'password' => 'required',
            ];

            $messages = [
            'username.exists' => 'These credentials do not match our records.',
           ];
           $request->validate($rules,$messages);



    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('login_error','Log in failed. Please verify email or password');
    }

    public function logout(Request $request) {
        Auth::guard('customer')->logout();
        Session::forget('previous_url_for_login');
        Session::forget('subscription_id');
        Session::forget('openLoginCount');
        Session::forget('openLogin');
        return redirect()
            ->route('customer-home');

    }

}
