<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginContrller extends Controller
{
    public function create(){
        return view('auth.loginUser');
    }
}
