<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;
use App\Mail\RegisterMail;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.registerUser');
    }

    public function store(RegisterRequest $request){

        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'employee';

        $user = Register::create($validatedData);
        Mail::to($user->email)->queue(new RegisterMail($user));

        return redirect()->route('loginPage');
    }
}

