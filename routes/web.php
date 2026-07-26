<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.loginUser');
});

// For Dashboard
Route::get('/dashboard',function(){
    return view('employee.dashboard.index');
})->name('dashboardPage');

Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboardPage');

// For Register Page
Route::get("/register",[RegisterController::class,'create']);
Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware('registercheck');

// For Login Page
Route::get('/login',[LoginController::class,'create'])->name('loginPage');
Route::post('/login',[LoginController::class,'checkLogin'])->name('loginUser');

// For Logout 
Route::post('/logout',[LoginController::class,'logout'])->name('logoutPage');

// For Attendance Mark Page
Route::post('/check-in',[AttendanceController::class,'checkIn'])->name('checkInPage');
Route::post('/check-out',[AttendanceController::class,'checkOut'])->name('checkOutPage');

// For Get Attendance and Attendance Histroy Page
Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendancePage');
Route::get('/attendance-history', [AttendanceController::class, 'history'])->name('attendanceHistoryPage');

// For Employee Profile Index Page
Route::get('/emp-profile',[ProfileController::class,'show'])->name('emp-profile-index');
Route::post('/upl-image',[ProfileController::class,'uploadImage'])->name('profileImage');

// Employee Profile Edit Routes
Rout::prefix('profile')->group(function(){
    // For Employee Profile Personal Info Edit Page
Route::get('/profile/personal/edit',[ProfileController::class,'editPersonal'])->name('');
Route::put('/profile/personal/update',[ProfileController::class,'updatePersonal'])->name('');

    // For Employee Profile Contact Info Edit Page
Route::put('/profile/contact/edit',[ProfileController::class,'editContact'])->name('');
Route::put('/profile/contact/update',[ProfileController::class,'updateContact'])->name('');
    
    // For Employee Profile Designation Info Edit Page
Route::put('/profile/designation/edit',[ProfileController::class,'editDesignation'])->name('');
Route::put('/profile/designation/update',[ProfileController::class,'updateDesignation'])->name('');
    
    // For Employee Profile Other Info Edit Page
Route::put('/profile/other/edit',[ProfileController::class,'editOther'])->name('');
Route::put('/profile/other/update',[ProfileController::class,'updateOther'])->name('');
    
});
