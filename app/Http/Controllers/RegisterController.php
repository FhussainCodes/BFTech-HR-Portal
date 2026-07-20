<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;

class RegisterController extends Controller
{
    public function create(){
        return "register page";
    }

    public function store(RegisterRequest $request){
        
    }
}
