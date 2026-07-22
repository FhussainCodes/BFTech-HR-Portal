<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('auth.loginUser');
});

// For Dashboard
// Route::get('/dashboard',function(){
//     return view('employee.dashboard');
// })->name('dashboardPage');

Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboardPage');

// For Register Page
Route::get("/register",[RegisterController::class,'create']);
Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware('registercheck');

// For Login Page
Route::get('/login',[LoginController::class,'create'])->name('loginPage');
Route::post('/login',[LoginController::class,'checkLogin'])->name('loginUser');

// For Logout 
Route::post('/logout',[LoginController::class,'logout'])->name('logoutPage');

// For Attendance Page
Route::post('/check-in',[AttendanceController::class,'checkIn'])->name('checkInPage');
Route::post('/check-out',[AttendanceController::class,'checkOut'])->name('checkOutPage');