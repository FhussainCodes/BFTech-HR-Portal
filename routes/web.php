<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/register",[RegisterController::class,'create']);
Route::post("/register",[RegisterController::class,'store'])->name('registerUser');
// Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware('registercheck');

Route::get('/login',[LoginController::class,'create']);
