<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware('registercheck');
Route::get("/register",[RegisterController::class,'create']);

