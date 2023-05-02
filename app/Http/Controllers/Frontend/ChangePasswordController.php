<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Customer;
use Hash;
class ChangePasswordController extends Controller
{
    //

    public function show(){
    	$user = Auth::guard('customer')->user();
    	return view('frontend.change_password');
    }


    /**
     * change the user password
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function changePassword(Request $request)
    {
    	$data = $request->all();
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required_with:new_password|same:new_password'
        ]);
    
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        if ( !Hash::check($request->current_password, $customer->password )) { 
            return \Redirect::back()->with('error', 'Existing Password does not match');
        }else {
            $customer->password = Hash::make( $request->confirm_password);
            $customer->update();
            return \Redirect::back()->with('success', 'Your Password changed succesfully!');
        }
    }
}
