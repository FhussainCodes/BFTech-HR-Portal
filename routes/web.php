<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('auth.loginUser');
});

Route::get("/register",[RegisterController::class,'create']);
Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware('registercheck');

Route::get('/login',[LoginController::class,'create'])->name('loginPage');
Route::post('/login',[LoginController::class,'checkLogin'])->name('loginUser');

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->name('dashboardPage');