<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function click(Request $request)
    {
        $ad = Advertisement::where('ad_id',$request->ad_id)->first();

        if($ad)
        {
            $ad->actual_number_of_clicks = $ad->actual_number_of_clicks + 1;
            $ad->save();
            return "true";
        }

        return "false";
    }
}
