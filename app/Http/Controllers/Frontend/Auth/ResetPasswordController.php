<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Models\Customer;
class ResetPasswordController extends Controller
{
    //

   public function showResetForm($token) {
       return view('frontend.password.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request){
    	$request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['token' => $request->token])
                            ->first();
              
        if(!$updatePassword){
        	return back()->withInput()->with('error', 'Invalid token!');
        }else{
        	$email = $updatePassword->email;
        	$user = Customer::where('email', $email)
                      ->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=> $email])->delete();
            return back()->with('reset_success', 'You password has been reset successfully!');
        
        }
    }
    
}
