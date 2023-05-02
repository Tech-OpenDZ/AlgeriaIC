<?php

namespace App\Http\Controllers\Frontend;


use DB;

use Carbon\Carbon;
use App\Models\Customer;
use App\Services\OnlinePaymentService;
use LaravelLocalization;
use App\Mail\InviteSubUser;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\PaymentTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomersSubscription;
use Illuminate\Support\Facades\Session;
use App\Mail\RenewPlanPaymentSuccess;
use App\Mail\UpgradePlanPaymentSuccess;
use App\Mail\SubscriptionPaymentSuccess;
use App\Mail\SendSuccessfulRegistrationNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:customer');
    }



    public function index()
    {
        Session::put('signupUserData', []);
        if(Session::has('email_activation')) {

            $email_activation = Session::get('email_activation');
            if ($email_activation) {

                Session::put('email_activation', false);
            }
        }
        else {
            $email_activation = false;
        }
        $currentLocale          = LaravelLocalization::getCurrentLocale();

        $subscriptions          = Subscription::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            },
            'permissions'=> function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            }
        ])
            ->where('status',1)->orderBy('ordering','asc')
            ->get();

        return view('frontend.signup.index', compact(
            'subscriptions',
            'email_activation'
        ));
    }



    public function subs_pack()
    {


        return view('frontend.signup.subscription_pack');

    }

    public function storeCustomer(Request $request)
    {
        // Logic to validate form data
        $rules = [
            'subscription_id'      => 'required',

            'name'                 => 'required',
            'companyName'          => 'required',
            'address'              => 'required',
            'jobTitle'             => 'required',
            'phone'                => 'required',
            'email_customer'       => 'required|email|max:255|unique:customers,email,NULL,id,deleted_at,NULL',
            'username'             => 'required|unique:customers,username,NULL,id,deleted_at,NULL',
            //'note'                 => 'required',
            'pays'                 => 'required',
            //'wilaya'               => 'required',
            'provenance'           => 'required',
            'other_provenance'     => 'required',
            'password'             => 'required|min:8|confirmed',
            'general_condition'    => 'required',
            'g-recaptcha-response' => 'required',
            /*'payment_mode'         => 'NULL',
            'payment_status'       => 'NULL',
            'payment_type'         => 'NULL',
            'status'               => 'NULL',
            'currency'             => 'NULL',
            'receive_promotions'   => 'NULL',
            'company_type'         => 'NULL',*/

        ];

        $messages = [
            'username.regex' => __('signup.signup_form_username_regex')
        ];

        $attributes = [
            'subscription_id'   => __('signup.signup_form_subscription_id'),
            'name'              => __('signup.signup_form_name'),
            'companyName'       => __('signup.signup_form_companyName'),
            'address'           => __('signup.signup_form_address'),
            'jobTitle'          => __('signup.signup_form_jobTitle'),
            'phone'             => __('signup.signup_form_phone'),
            'email_customer'    => __('signup.signup_form_email_customer'),
            'username'          => __('signup.signup_form_username'),
            //'note'              => __('signup.signup_form_note'),
            'pays'              => __('signup.signup_form_pays'),
            //'wilaya'              => __('signup.signup_form_wilaya'),
            'password'          => __('signup.signup_form_password'),
            'general_condition' => __('signup.signup_form_general_condition'),
        ];

        //$this->validate($request, $rules, $messages, $attributes);

        $validator = Validator::make($request->all(),$rules, $messages, $attributes);
        if ($validator->fails()) {
            return redirect('signup')
                ->withInput()
                ->withErrors($validator);
        } else{
            $data = $request->input();
            $signupUserData = $request->all();
            /*$extra = [
                'payment_type'=>  "cash",
                'payment_status'=>  "pending",
                'receive_promotions'=> 1,
                'status'=>  0,
                'is_deactivated'=>  0,
                'currency' => 'dzd',
                'payment_mode' => 'offline',
                'company_type' => 'algerian',
            ];*/
            //$data = array_merge($signupUserData, $extra);
            if ($data['subscription_id'] == 1) {
                $paymentMode = null;
                $paymentType = null;
            }
            else {
                $paymentMode = ($request->chooseOffline) ? 'offline' : 'online' ;
                $paymentType = ($paymentMode == 'offline') ? $request->chooseOffline : $request->chooseOnline;
            }
            try{

                $customer                       = new Customer;

                $customer ->subscription_id     = $data['subscription_id'];
                $customer ->name                = $data['name'];
                $customer ->company_name        = $data['companyName'];
                $customer ->company_address     = $data['address'];
                $customer ->job_title           = $data['jobTitle'];
                $customer ->mobile_number       = $data['phone'];
                $customer ->email               = $data['email_customer'];
                $customer ->username            = $data['username'];
                $customer ->note                = 'R.A.S';
                $customer ->pays                = $data['pays'];
                $customer ->wilaya              = $data['wilaya'];
                $customer ->provenance          = $data['provenance'];
                $customer ->other_provenance    = $data['other_provenance'];
                $customer ->password            = Hash::make($data['password']);
                $customer ->payment_status      = 'pending' ;

                $customer ->payment_mode        = $paymentMode;
                $customer ->payment_type        = $paymentType;
                $customer ->is_deactivated      = 1;
                $customer ->currency            = 'DZD';

                //$customer ->company_type        = $data['company_type'];
                $customer ->terms_accepted      = 1;
                $customer ->receive_promotions  = 1;
                $customer ->receive_newsletters  =  isset($data['receive_newsletters']) ? 1 : 0;
                $customer ->status              = 1;
                $customer ->default_locale      = 'fr';
                $customer ->save();

                if ($customer -> save()) {
                    $customer->parent_id        = $customer->id;
                    $customer -> update();
                }

             
                if ( $customer ->subscription_id  != 1) {

                    /**
                     * adding data to Payment table
                     */
                    DB::beginTransaction();
                    /**
                     * adding data to Customer table
                     */
                    $currentLocale                  = LaravelLocalization::getCurrentLocale();
                    $payment = new PaymentTransaction;
                    $subscription = Subscription::with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                                ->get();
                        },
                        'permissions'=> function($query) use($currentLocale) {
                            return $query->with([
                                'localeAll' => function($query) use($currentLocale) {
                                    return $query->where('locale', $currentLocale)->get();
                                }
                            ])->get();
                        }
                    ])
                        ->find($signupUserData['subscription_id']);

                    $payment->customer_id       = $customer->id;
                    $payment->transaction_id    = 'T-'.date('Ymd').'-'.date('His').'-'.$customer->id;
                    $payment->module_type       = PaymentTransaction::module_type['signup'];
                    $payment->price             = "59381";
                    $payment->currency          = "dzd";
                    $payment->payment_mode      = $paymentMode;
                    $payment->payment_type      = $paymentType;
                    $payment->status            = 'pending';
                    $payment->note              = '';

                    if($payment->payment_type == null){
                        $payment->payment_type ="NULL";

                    }

                    $payment->save();
                }



                if ( $customer ->receive_newsletters  != 0) {

                    $email_exist = DB::table('newsletters')
                        ->where(['email' => $request->email])
                        ->first();

                    if($email_exist){
                        $request->session()->flash('subscribed', 'You have already subscribed.');
                        // return redirect()->route('subscribe.create');
                    }else{
                        $newsletters = new Newsletter;

                        $newsletters->company_name     = $customer ->company_name;
                        $newsletters->name             = $request->name;
                        $newsletters->job_title        = $customer ->job_title;
                        $newsletters->email            =  $customer ->email;
                        $newsletters->cell_phone       = $customer ->mobile_number;
                        $newsletters->type             = "event";

                        if ($newsletters->save()) {
                            Mail::send('frontend.newsletters.mail.mail',[], function($message) use ($newsletters) {
                                $message->to($newsletters->email);
                                $message->subject(__('newsletter.email_subject'));
                            });
                            $request->session()->flash('success', 'Thank you for subscribing.');
                            //  return redirect()->route('subscribe.create');
                        } else {
                            $request->session()->flash('error', 'Something went wrong.');
                            // return redirect()->route('subscribe.create');
                        }
                    }
                    $customer -> update();


                    if ($customer->pays        != "Algérie") {

                        $customer->wilaya   = $customer->wilaya  ;
                        //$customer -> update();
                    }else{
                        $customer->wilaya   = $data['wilaya'] ;

                    }
                    $customer -> update();

                }

                if($customer->payment_type == "carteCIB"){
                    // return redirect('https://algeriainvest.com/')->with('success',__('signup.registration_succes'));
                    // $uri = 'https://test.satim.dz/payment/rest/register.do?currency=012&amount=49900&language=fr&orderNumber=1538298192&userName=SAT2202090327&password=satim120&returnUrl=https://algeriainvest.com/callback&failUrl=https://algeriainvest.com/failUrl&jsonParams={"force_terminal_id":"E010900426"}';


                    $currency = "012";
                    $amount = "5938100";
                    $language= "fr";
                    $orderNumber = "$customer->id";
                    $user= "i2b9hfgsd54qs821qs95qs4";
                    $userName= htmlspecialchars($user);
                    $password= "3Hqsq54qsHeqsP85sdFh";
                    $returnUrl = "https://algeriainvest.com/checkout_succes";
                    $failUrl = "https://algeriainvest.com/checkout_failed";
                    $udf1 = $customer ->email;
                    // $force_terminal_id = "E010900426";






                    $response = file_get_contents('https://cib.satim.dz/payment/rest/register.do?currency='.$currency.'&amount='.$amount.'&language='.$language.'&orderNumber='.$orderNumber.'&userName='.$userName.'&password='.$password.'&returnUrl='.$returnUrl.'&failUrl='.$failUrl.'&jsonParams={"force_terminal_id":"E002000013"}');
                    $response = json_decode($response);


                    return redirect($response->{'formUrl'});

                }
                else{
                    return redirect('signup')->with('success',__('signup.registration_succes'));

                }










            }
            catch(Exception $e){
                return redirect('signup')->with('error',"Opération echoué");
            }
        }
        /*$signupUserData = $request->all();
        $extra = [
            'payment_type'=>  "cash",
            'payment_status'=>  "pending",
            'receive_promotions'=> 1,
            'status'=>  0,
            'is_deactivated'=>  0,
            'currency' => 'dzd',
            'payment_mode' => 'offline',
            'company_type' => 'algerian',
        ];*/
        //$signupUserData = array_merge($signupUserData, $extra);

        Session::put('signupUserData', $signupUserData);
        return response()->json(['success' => true]);
        //var_dump($signupUserData);die;
        //return back()->with('success', 'User created successfully.');
        //DB::beginTransaction();
        /**
         * adding data to Customer table
         */
        /* $currentLocale                  = LaravelLocalization::getCurrentLocale();

         $customer                       = new Customer;
         $customer ->subscription_id     = $signupUserData['subscription_id'];
         $customer ->name                = $signupUserData['name'];
         $customer ->company_name        = $signupUserData['companyName'];
         $customer ->company_address     = $signupUserData['address'];
         $customer ->job_title           = $signupUserData['jobTitle'];
         $customer ->mobile_number       = $signupUserData['phone'];
         $customer ->email               = $signupUserData['email_customer'];
         $customer ->username            = $signupUserData['username'];
         $customer ->password            = Hash::make($signupUserData['password']);
         $customer ->terms_accepted      = isset($signupUserData['general_condition']) ? 1 : 0;
         $customer ->payment_status      = ($signupUserData['subscription_id'] == 0);
         $customer ->default_locale      = $currentLocale;

         $customer->save();*/







    }
    public function storePayment(Request $request)
    {
        try {
            $signupUserData   = Session::get('signupUserData');

            if(!isset($request->company_type) || !in_array($request->company_type,['algerian', 'foreign'])) {
                return response()->json(['error' => __('signup.signup_form_company_type')]);
            }
            if(!isset($request->price) || !isset($request->currency)) {
                return response()->json(['error' =>  __('payment.paymentErrorMSG'),'jdjdjdj'=>'jdjdj']);
            }

            DB::beginTransaction();
            /**
             * adding data to Customer table
             */
            $currentLocale                  = LaravelLocalization::getCurrentLocale();

            $customer                       = new Customer;
            $customer ->subscription_id     = $signupUserData['subscription_id'];
            $customer ->name                = $signupUserData['name'];
            $customer ->company_name        = $signupUserData['companyName'];
            $customer ->company_address     = $signupUserData['address'];
            $customer ->job_title           = $signupUserData['jobTitle'];
            $customer ->mobile_number       = $signupUserData['phone'];
            $customer ->email               = $signupUserData['email_customer'];
            $customer ->username            = $signupUserData['username'];
            $customer ->note                = 'R.A.S';
            $customer ->pays                = $signupUserData['pays'];
            $customer ->wilaya              = $signupUserData['wilaya'];
            $customer ->provenance          = $signupUserData['provenance'];
            $customer ->other_provenance    = $signupUserData['other_provenance'];
            $customer ->password            = Hash::make($signupUserData['password']);
            $customer ->payment_status      = ($signupUserData['subscription_id'] == 1) ? 'completed' :'pending';
            $customer ->terms_accepted      = isset($signupUserData['general_condition']) ? 1 : 0;
            $customer ->receive_promotions  = isset($signupUserData['promotions']) ? 1 : 0;
            $customer ->receive_newsletters  = isset($signupUserData['receive_newsletters']) ? 1 : 0;
            $customer ->status              = 0;
            $customer ->default_locale      = $currentLocale;

            if ($signupUserData['subscription_id'] == 1) {
                $paymentMode = null;
                $paymentType = null;
            }
            else {
                $paymentMode = ($request->chooseOffline) ? 'offline' : 'online' ;
                $paymentType = ($paymentMode == 'offline') ? $request->chooseOffline : $request->chooseOnline;
            }

            $customer ->company_type        = ($signupUserData['subscription_id'] == 1) ? null : $request->company_type;
            $customer ->payment_mode        = $paymentMode;
            $customer ->payment_type        = $paymentType;
            $token                          = Str::random(60);
            $customer->activation_token     = $token;
            $customer->activation_at        = Carbon::now();
            $customer ->currency            = $request->currency;

            if ($customer -> save()) {
                $customer->parent_id     = $customer->id;
                $customer -> update();

                $signupUserData['token'] = $token;
                Mail::to($signupUserData['email_customer'])
                    ->send(new SendSuccessfulRegistrationNotification($signupUserData));

                if ($signupUserData['subscription_id'] != 1) {

                    /**
                     * adding data to Payment table
                     */
                    $payment = new PaymentTransaction;
                    $subscription = Subscription::with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                                ->get();
                        },
                        'permissions'=> function($query) use($currentLocale) {
                            return $query->with([
                                'localeAll' => function($query) use($currentLocale) {
                                    return $query->where('locale', $currentLocale)->get();
                                }
                            ])->get();
                        }
                    ])
                        ->find($signupUserData['subscription_id']);

                    $payment->customer_id       = $customer->id;
                    $payment->transaction_id    = 'T-'.date('Ymd').'-'.date('His').'-'.$customer->id;
                    $payment->module_type       = PaymentTransaction::module_type['signup'];
                    $payment->price             = $request->price;
                    $payment->currency          = $request->currency;
                    $payment->payment_mode      = $paymentMode;
                    $payment->payment_type      = $paymentType;
                    $payment->status            = 'pending';
                    $payment->note              = '';

                    $payment->save();

                    /**
                     * adding data to Customers Subscription table
                     */
                    $customers_subscriptions    = new CustomersSubscription;

                    $customers_subscriptions->customer_id       = $customer->id;
                    $customers_subscriptions->subscription_id   = $signupUserData['subscription_id'];
                    $customers_subscriptions->status            = 'pending';

                    $customers_subscriptions->save();

                    $signupUserData['paymentType']      = 'payment.'.$paymentType;
                    $signupUserData['subscription']     = $subscription;
                    $signupUserData['currency']         = PaymentTransaction::currency[$request->currency];
                    $signupUserData['price']            = $request->price;

                    Mail::to($signupUserData['email_customer'])
                        ->send(new SubscriptionPaymentSuccess($signupUserData));
                }

                DB::commit();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['error' => __('payment.paymentErrorMSG')]);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => __('payment.paymentErrorMSG'), 'message' => $th->getMessage()]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['error' => __('payment.paymentErrorMSG')]);
        }
    }

    public function activateEmail(Request $request, $token)
    {
        try {
            $customer = Customer::where('activation_token', '=',$token)->first();
            if ( !$customer) {
                return redirect()->route('link-expired');
            }

            $activation_at  = Carbon::parse($customer->activation_at);
            $now            = Carbon::now();
            $timeInterval   = $activation_at->diffInMinutes($now);

            // 1440 (Minutes) == 24 (Hours)
            if($timeInterval < 1440) {
                if ($customer->status == 1) {
                    return redirect()->route('customer-home');
                }

                $customer->activation_token     = null;
                $customer->activation_at        = null;
                $customer->status               = 1;

                if ($customer-> save()) {
                    Session::put('email_activation', true);
                    return redirect()->route('customer-register');
                }
                else {
                    return redirect()->route('link-expired');
                }
            }
            else {
                return redirect()->route('link-expired');
            }
        } catch (\Throwable $th) {
            return redirect()->route('link-expired');
        } catch (\Exception $exception) {
            return redirect()->route('link-expired');
        }
    }

    public function linkExpired()
    {
        return view('frontend.signup.link_expired');
    }

    public function myAccount()
    {
        $currentLocale          = LaravelLocalization::getCurrentLocale();
        $id                     = Auth::guard('customer')->user()->id;

        $my_data                = Customer::with([
            'subscription' => function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            }
        ])
            ->findOrFail($id);
        $is_parent  = ($my_data->id == $my_data->parent_id) ? true : false;

        if ($is_parent) {

            $parent_data    = $my_data;
        } else {

            $parent_data    = Customer::where('id',$my_data->parent_id)
                ->with([
                    'subscription' => function($query) use($currentLocale) {
                        return $query->with([
                            'localeAll' => function($query) use($currentLocale) {
                                return $query->where('locale', $currentLocale)->get();
                            }
                        ])->get();
                    }
                ])
                ->first();
        }

        if ( $parent_data->payment_status == 'completed' && $my_data->subscription_id > 1) {

            $plan_data              = CustomersSubscription::find(CustomersSubscription::where('customer_id',$my_data->parent_id)->where('status','completed')->max('id'));
            $last_plan              = CustomersSubscription::find(CustomersSubscription::where('customer_id',$my_data->parent_id)->max('id'))->status ;
            $is_plan_confirmed      = ($last_plan == 'completed' || $last_plan == 'cancel' ) ? true : false;
        } else {

            $plan_data              = '';
            $is_plan_confirmed      = '';
        }

        $child_data     = Customer::where('parent_id',$my_data->parent_id)->where('id','<>',$id)->get();
        return view('frontend.my_account.index', compact('my_data','parent_data','child_data','is_parent','plan_data','is_plan_confirmed'));
    }

    public function updateCustomerData(Request $request)
    {
        // Logic to validate form data
        $rules = [
            'email'             => 'email|max:255|unique:customers,email',
            'username'          => 'regex:/^[a-z0-9_]*$/|unique:customers',
            'old_password'      => 'nullable|min:8',
            'password'          => 'nullable|min:8|confirmed',
        ];
        $messages = [
            'username.regex' => __('signup.signup_form_username_regex')
        ];
        $attributes = [
            'email'             => __('signup.signup_form_email_customer'),
            'username'          => __('signup.signup_form_username'),
            'old_password'      => __('signup.signup_form_old_password'),
            'password'          => __('signup.signup_form_password'),
        ];

        $this->validate($request, $rules, $messages, $attributes);

        try {
            $customer = Customer::findOrFail(Auth::guard('customer')->user()->id);

            if ($request->old_password != null) {

                if(!Hash::check($request->old_password, $customer->password)) {
                    return redirect()->route('customer-account')->with('error',__('my_account.old_password_err'));
                }
            }

            if (($request->old_password != '' && $request->password != '')&&(Hash::check($request->old_password, $customer->password))) {
                $customer->password = Hash::make($request->password);
            }

            if ($request->name != ''){
                $customer->name                 = $request->name;
            }

            if ($request->username != ''){
                $customer->username             = $request->username;
            }

            if ($request->job_title != ''){
                $customer->job_title            = $request->job_title;
            }

            if ($request->email != ''){
                $customer->email                = $request->email;
            }

            if ($request->phone != ''){
                $customer->mobile_number        = $request->phone;
            }

            if ($customer->update()) {
                if($request->password != null || $request->name != null || $request->username != null || $request->job_title != null || $request->email!= null || $request->phone != null) {
                    return redirect()->route('customer-account')->with('success', __('signup.registrationSuccessMSG'));
                } else {
                    return redirect()->route('customer-account');
                }
            }
            else {

                return redirect()->route('customer-account')->with('error', __('signup.registrationErrorMSG'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('customer-account')->with('error', __('signup.registrationErrorMSG'));
        } catch (\Exception $exception) {
            return redirect()->route('customer-account')->with('error', __('signup.registrationErrorMSG'));
        }
    }

    public function addSubUser(Request $request)
    {
        if ($request->ajax()) {
            // Logic to validate form data
            $rules = [
                'email'    => 'required|email|max:255|unique:customers,email'
            ];
            $messages = [];
            $attributes = [
                'email'             => __('signup.signup_form_email_customer')
            ];
            $this->validate($request, $rules, $messages, $attributes);


            try {
                $authUserData = Auth::guard('customer')->user();

                DB::beginTransaction();
                /**
                 * adding data to Customer table
                 */
                $customer                       = new Customer;
                $customer ->subscription_id     = $authUserData['subscription_id'];
                $customer->parent_id            = $authUserData['id'];
                $customer ->name                = $authUserData['name'];
                $customer ->company_name        = $authUserData['company_name'];
                $customer ->company_address     = $authUserData['company_address'];
                $customer ->job_title           = $authUserData['job_title'];
                $customer ->mobile_number       = $authUserData['mobile_number'];
                $customer ->pays                = $authUserData['pays'];
                $customer ->wilaya              = $authUserData['wilaya'];
                $customer ->email               = $request->email;
                $customer ->username            = $authUserData['username'].date('Ymd_his');
                $customer ->password            = $authUserData['password'];
                $customer ->payment_status      = 'completed';
                $customer ->terms_accepted      = $authUserData['terms_accepted'];
                $customer ->receive_promotions  = $authUserData['receive_promotions'];
                $customer ->receive_newsletters  = $authUserData['receive_newsletters'];
                $customer ->status              = 0;
                $customer ->default_locale      = $authUserData['default_locale'];

                $customer ->company_type        = $authUserData['company_type'];
                $customer ->payment_mode        = $authUserData['payment_mode'];
                $customer ->payment_type        = $authUserData['payment_type'];
                $token                          = Str::random(60);
                $customer->activation_token     = $token;
                $customer->activation_at        = Carbon::now();
                $customer ->currency            = $authUserData['currency'];

                if ($customer -> save()) {

                    $authUserData          = $customer;
                    $authUserData['token'] = $token;
                    Mail::to($request->email)
                        ->send(new InviteSubUser($authUserData));

                    DB::commit();
                    return response()->json(['success' => true, 'id' => $customer->id]);
                } else {
                    return response()->json(['error' => __('payment.paymentErrorMSG')]);
                }
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['error' => __('payment.paymentErrorMSG'), 'message' => $th->getMessage()]);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json(['error' => __('payment.paymentErrorMSG')]);
            }
        }
    }

    public function acceptInvitation(Request $request, $token)
    {
        try {
            $customer = Customer::where('activation_token', '=',$token)->first();
            if ( !$customer) {
                return redirect()->route('link-expired');
            }

            if ($customer->status == 1) {
                return redirect()->route('customer-home');
            }
            else {
                $email = $customer->email;
                return view('frontend.my_account.register_sub_user',compact('token', 'email'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('link-expired');
        } catch (\Exception $exception) {
            return redirect()->route('link-expired');
        }
    }

    public function registerSubUser(Request $request, $token)
    {
        // Logic to validate form data
        $rules = [
            'name'              => 'required',
            'username'          => 'required|regex:/^[a-z0-9_]*$/|unique:customers',
            'password'          => 'required|min:8|confirmed',
        ];
        $messages = [
            'username.regex' => __('signup.signup_form_username_regex')
        ];
        $attributes = [
            'name'              => __('signup.signup_form_name'),
            'username'          => __('signup.signup_form_username'),
            'password'          => __('signup.signup_form_password'),
        ];

        $this->validate($request, $rules, $messages, $attributes);
        try {
            $customer = Customer::where('activation_token', '=',$token)->first();
            if ( !$customer) {
                return redirect()->route('link-expired');
            }

            if ($customer->status == 1) {
                return redirect()->route('customer-home');
            }

            $customer->name                 = $request->name;
            $customer->username             = $request->username;
            $customer->password             = Hash::make($request->password);
            $customer->activation_token     = null;
            $customer->activation_at        = null;
            $customer->status               = 1;

            if ($customer-> save()) {
                Auth::guard('customer')->attempt(['email' => $customer->email, 'password' => $request->password]);
                return redirect()->route('customer-home')->with('success', __('register_sub_user.registrationSuccessMSG'));
            }
            else {
                return redirect()->route('link-expired');
            }
        } catch (\Throwable $th) {
            return redirect()->route('link-expired');
        } catch (\Exception $exception) {
            return redirect()->route('link-expired');
        }
    }

    public function removeSubUser(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->forceDelete();
        return redirect()->back();
    }

    public function upgradeSubscriptionPlan()
    {
        $currentLocale          = LaravelLocalization::getCurrentLocale();

        $subscriptions          = Subscription::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            },
            'permissions'=> function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            }
        ])
            ->get();
        $page = 'upgrade_plan';
        Session::put('payment_initiated_from','upgrade_plan');
        return view('frontend.upgrade_plan.index',compact('subscriptions','page'));
    }

    public function paymentPage(Request $request)
    {
        // Logic to validate form data
        $rules = [
            'subscription_id'   => 'required'
        ];
        $messages = [];
        $attributes = [];

        $this->validate($request, $rules, $messages, $attributes);
        Session::put('upgrade_subscription_id',$request->subscription_id);
        if (Session::has('payment_initiated_from') && Session::get('payment_initiated_from') == 'upgrade_plan') {

            Session::put('payment_initiated_from','upgrade_plan');
        }
        else {

            Session::put('payment_initiated_from','renew_plan');
        }

        $page = 'payment';
        return view('frontend.upgrade_plan.index',compact('page'));
    }

    public function paymentConfirm(Request $request)
    {
        try {
            if (Session::get('upgrade_subscription_id') == 1) {
                $paymentMode = null;
                $paymentType = null;
            }
            else {
                $paymentMode = ($request->chooseOffline) ? 'offline' : 'online' ;
                $paymentType = ($paymentMode == 'offline') ? $request->chooseOffline : $request->chooseOnline;
            }
            // dd ($request->input());
            DB::beginTransaction();

            $currentLocale = LaravelLocalization::getCurrentLocale();

            /**
             * adding data to Payment table
             */
            $payment = new PaymentTransaction;
            $subscription = Subscription::with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                        ->get();
                },
                'permissions'=> function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)->get();
                        }
                    ])->get();
                }
            ])
                ->find(Session::get('upgrade_subscription_id'));

            if (Session::has('payment_initiated_from') && Session::get('payment_initiated_from') == 'upgrade_plan') {

                $module = PaymentTransaction::module_type['upgrade_plan'];
            }
            else {

                $module = PaymentTransaction::module_type['renew_plan'];
            }

            $payment->customer_id       = Auth::guard('customer')->user()->id;
            $payment->transaction_id    = 'T-'.date('Ymd').'-'.date('His').'-'.Auth::guard('customer')->user()->id;
            $payment->module_type       = $module;
            $payment->price             = $request->price;
            $payment->currency          = $request->currency;
            $payment->payment_mode      = $paymentMode;
            $payment->payment_type      = $paymentType;
            $payment->status            = 'pending';
            $payment->note              = '';

            $payment->save();

            /**
             * adding data to Customers Subscription table
             */
            $customers_subscriptions    = new CustomersSubscription;

            $customers_subscriptions->customer_id       = Auth::guard('customer')->user()->id;
            $customers_subscriptions->subscription_id   = Session::get('upgrade_subscription_id');
            $customers_subscriptions->status            = 'pending';

            $customers_subscriptions->save();

            /**
             * Sending mail for upgrade / renew plan.
             */
            Session::put('signupUserData', Auth::guard('customer')->user());
            $signupUserData = Session::get('signupUserData');
            foreach ($signupUserData->subscription->localeAll as  $localeArr) {
                if($localeArr->locale == $currentLocale){

                    $signupUserData['prev_subs']        = $localeArr->name;
                }
            }

            if (Session::has('payment_initiated_from') && Session::get('payment_initiated_from') == 'upgrade_plan') {
                $signupUserData['paymentType']      = 'payment.'.$paymentType;
                $signupUserData['subscription']     = $subscription;
                $signupUserData['currency']         = PaymentTransaction::currency[$request->currency];
                $signupUserData['price']            = $request->price;

                Mail::to(Auth::guard('customer')->user()->email)
                    ->send(new UpgradePlanPaymentSuccess($signupUserData));
            }

            if (Session::has('payment_initiated_from') && Session::get('payment_initiated_from') == 'renew_plan') {

                Mail::to(Auth::guard('customer')->user()->email)
                    ->send(new RenewPlanPaymentSuccess($signupUserData));
            }

            DB::commit();
            Session::forget('upgrade_subscription_id');
            Session::forget('payment_initiated_from');
            return redirect()->route('payment-success');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('customer-account')->with(['error' => __('payment.paymentErrorMSG')." ". $th->getMessage()]);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->route('customer-account')->with(['error' => __('payment.paymentErrorMSG')]);
        }
    }

    public function paymentSuccess()
    {
        $message = __('payment.paymentSuccessMSGOne').'<br>'.__('payment.paymentSuccessMSGTwo');
        return view('frontend.payment.payment_success',compact('message'));
    }


    public function sendMail()
    {
        //
    }
}
