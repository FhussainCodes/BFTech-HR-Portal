<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
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
            PasswordResetOtp::update([
                    'otp' => $otp,
                    'expires_at' => now()->addMinutes(5),
            ]);
        }

        Mail::to($email)->queue(new OptMail($otp));
        
        session([
            'reset_email' => $email
        ]);        

        return redirect()->route('verifyOtpPage')->with('success', 'OTP has been sent to your email.');
    }

    public function showVerifyOtp(){
        return view('auth.verifyOtp');
    }

    public function verifyOtp(VerifyOtpRequest $request){

        $email = session('reset_email');
        $passwordReset = PasswordResetOtp::where('email',$email)->first();
        
        if(!$passwordReset){
            return redirect()->route('forgotPasswordPage')->withErrors(['email' => 'Please request a new OTP.']);
        }

        if($request->otp !=$passwordReset->otp ){
            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }

        if(now->hasGreaterThan($passwordReset->expires_at)){
            return back()->withErrors(['otp' => 'The OTP you entered is expired.']);
        }

        session([
            'reset_email' => $email,
            'otp_vrified' => true,
        ]);

        return redirect()->route('resetPasswordPage');

    }

    public function showResetPassword(){
        
    }
    public function resetPassword(){}
}
