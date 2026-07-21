<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.registerUser');
    }

    public function store(RegisterRequest $request){
        // dd($request->all());
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['confirm_password'] = Hash::make($validatedData['confirm_password']);

        Register::create($validatedData);
        return redirect()->route('loginUser');
    }
}

