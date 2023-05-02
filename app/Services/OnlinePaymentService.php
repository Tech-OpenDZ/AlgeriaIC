<?php
namespace App\Services;


use DB;
use Carbon\Carbon;
use App\Models\Customer;
use LaravelLocalization;
use App\Mail\InviteSubUser;
use Illuminate\Support\Str;
use App\Models\Subscription;
//use Illuminate\Http\Request;
use Illuminate\GuzzlzHttp\Request;
use App\Models\PaymentTransaction;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\AuthController;
use App\GuzzlHttp\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomersSubscription;
use Illuminate\Support\Facades\Session;
use App\Mail\RenewPlanPaymentSuccess;
use App\Mail\UpgradePlanPaymentSuccess;
use App\Mail\SubscriptionPaymentSuccess;
use App\Mail\SendSuccessfulRegistrationNotification;




class OnlinePaymentServices
{



    private $base_url;
    private $headers;
    private $request_customer;
    /**
     
     * OnlinePayment services
     * @param Customer $request_customer
     */
    public function __construct(Customer $request_customer)
    {
        $this->request_customer = $request_customer;
        $this->base_url =env('cib_base_url');
        $this->headers = [
            'Content-Type' => 'application/json' ,
            'authorization' => 'Bearer' .env('cib_token')

        ];




    }

    /**
     * @param $uri
     * @param $method
     * @param array $body
     * @return false|mixed
     * @throws \GuzzlHttp\Exception\GuzzleException
     */

    private function buildRequest($uri, $method, $body = [])
    {
        $request = new Request($method, $this->base_url.$uri, $this->headers);
        if(!$body)
            return false;
        $response = $this->request_customer->send($request, [
            'json' => $body
        ]);

        if($response->getStatusCode() !=200){
            return false;
        }







    }
}
