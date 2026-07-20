<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;

class RegisterController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(RegisterRequest $request){
        dd("error");
        // $validatedData = $request->validated();

        // $validatedData['password'] = Hash::make($validatedData['password']);

        // Register::create($validatedData);
        // return("data created successfully");
    }
}

