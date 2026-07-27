<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OtpMail;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\PasswordResetOtp;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\VerifyOtpRequest;


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
            $passwordReset->update([
                    'otp' => $otp,
                    'expires_at' => now()->addMinutes(5),
            ]);
        }

        Mail::to($email)->queue(new OtpMail($otp));
        
        session([
            'reset_email' => $email
        ]);        

        return redirect()->route('VerifyOtpPage')->with('success', 'OTP has been sent to your email.');
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

        if($request->otp != $passwordReset->otp ){
            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }

        if(now()->isAfter($passwordReset->expires_at)){
            return back()->withErrors(['otp' => 'The OTP you entered is expired.']);
        }

        session([
            'reset_email' => $email,
            'otp_verified' => true,
        ]);

        return redirect()->route('ResetPasswordPage');

    }

    public function showResetPassword(){

        if(!session('reset_email') || !session('otp_verified') ){
            return redirect()->route('forgotPage')->withErrors(['email' => 'please enter your otp first']);
            }

        return view('auth.resetPassword');
    }

    public function resetPassword(ResetPasswordRequest $request){

        if(!session('reset_email') || !session('otp_verified')){
            return redirect()->route('forgotPage')->with([
                'errors' => 'please enter your otp first'
            ]);
        }

        $email = session('reset_email');
        $user = Register::where('email',$email)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        PasswordResetOtp::where('email',$email)->delete();
        session()->forget([
            'reset_email',
            'otp_verified'
        ]);

        return redirect()->route('loginPage')->with('success','Password reset successfully. Please login.');

    }
}
