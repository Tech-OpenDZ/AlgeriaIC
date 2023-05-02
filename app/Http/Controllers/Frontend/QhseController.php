<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Setting;
use App\Models\SettingTranslate;
use LaravelLocalization;
use DB;



class QhseController extends Controller
{
    public function index()
    {

        return view('frontend.qhse.index');
    }

    public function index_new()
    {

        return view('frontend.qhse.index_new');
    }










}
