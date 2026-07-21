<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\LoginRequest;
use App\Models\Register;
use App\Mail\LoginMail;

class LoginController extends Controller
{
    public function create(){
        return view('auth.loginUser');
    }

    public function checkLogin(LoginRequest $request){

        $validatedData = $request->validated();

        $user = Register::where('email',$validatedData['email'])->first();
  
         if (!$user) {
            return back()
                ->withErrors(['email' => 'Email does not exist.'])
                ->withInput();
        }

         if (!Hash::check($validatedData['password'], $user->password)) {
            return back()
                ->withErrors(['password' => 'Incorrect password.'])
                ->withInput();
        }
        
        Mail::to($user->email)->queue(new LoginMail($user));

        session([
            'user' => $user
        ]);

        return redirect()->route('dashboardPage');

    }
}


