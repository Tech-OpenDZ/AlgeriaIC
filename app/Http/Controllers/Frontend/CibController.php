<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CibController extends Controller
{
    public function payOrder()
    {
        $data =  [
            'userName'=>  "SAT2202090327",
            'password'=>  "satim120",
            'orderNumber'=> "E010900426",
            'amount'=>  49900,
            'currency'=>  012,
            'returnUrl' => 'algeriainvest.com/signup',
            'failUrl' => 'algeriainvest.com/signup',
            'description' => 'payment',
            'language' => 'fr',
        ];
    }
}
