<?php

namespace App\Http\Controllers\Frontend\Auth;
use DB;
use Mail;
use Password;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendSuccessfulRegistrationNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }


    /**
     * password broker for customer guard.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker(){
        return Password::broker('customers');
    }

      /**
     * Get the guard to be used during authentication
     * after password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(){
        return Auth::guard('customer');
    }



    public function showLinkRequestForm() {
        return view('frontend.password.email');
    }

     public function sendResetLinkEmail(Request $request)
    {
    	$data  = $request->all();
    	$validator = \Validator::make($request->all(), [
            'email'   => 'required|exists:customers',
        ],['email.exists' => 'Email is not exists.']);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $customer = Customer::where('email', '=',$request->email)->first();

        if ( $customer->status == 0 ) {

            $token                          = Str::random(60);
            $customer->activation_token     = $token;
            $customer->activation_at        = Carbon::now();

            if ($customer -> save()) {
                $signupUserData                     = $customer;
                $signupUserData['email_customer']   = $customer->email;
                $signupUserData['token']            = $token;

                Mail::to($signupUserData['email_customer'])
                ->send(new SendSuccessfulRegistrationNotification($signupUserData));
                return response()->json(['success'=> __('signup.successContentNext')]);
            } else {
                return response()->json(['errors' => 'Something went wrong.']);
            }
        } else {

        	$token = Str::random(60);

	          DB::table('password_resets')->insert(
	            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
	        );
          Mail::send('frontend.password.forgotPasswordVerify',['token' => $token], function($message) use ($request) {
                  $message->to($request->email);
                  $message->subject('Reset Password Link');
               });
          return response()->json(['success'=>__('forgetpassword.Form_successMessage')]);
        }


    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['customer_email' => 'required|email']);
    }
}
