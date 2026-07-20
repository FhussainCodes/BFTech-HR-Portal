<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return "register page";
    }

    public function store(Request $request){
        return "store function";
    }
}
