<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\Register;
use App\Models\PasswordResetOtp;

class ForgotPasswordController extends Controller
{
    public function create(){
        
        return view('auth.forgotPassword');
    }

    public function sendOtp(ForgotPasswordRequest $request){

        $email = $request->email;
        $user = Register::where('email',$email)->first();
        if(!$user){
            return back()->withErrors([
                'email' => "No account found with this Email address"
            ])->withInput();
        }

        $otp = random_int(100000,999999);
        $passwordReset = PasswordResetOtp::where('email',$email)->first();

        if(!$passwordReset){
            PasswordResetOtp::create([
                'email' => $email,
                'otp' => $otp,
                'expires_at' => now()->addMinutes(5),
            ]);
        }else{
            // $passwordReset->otp = $otp;
            // $passwordReset->expires_at = now()->addMinutes(5);
            // $passwordReset->save();
            $PasswordResetOtp::update([
                    'otp' => $otp,
                    'expires_at' => now()->addMinutes(5),
            ]);
        }

        Mail::to($email)->queue(new OptMail($otp));


    }
}
