<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\Register;

class ForgotPasswordController extends Controller
{
    public function create(){
        
        return view('auth.forgotPassword');
    }

    public function sendOtp(ForgotPasswordRequest $request){

        $email = $request0->email;
        $user = Register::where('email',$email)->first();
        if(!$user){
            return back()->withErrors([
                'email' => "No account found with this Email address"
            ])->withInput();
        }

        $otp = random_int(100000,999999);

    }
}
