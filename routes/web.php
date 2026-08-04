<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HR\DashboardController;
use App\Http\Controllers\HR\EmployeeController;


Route::get('/', function () {
    return view('auth.loginUser');
});

// For Localization Switch Button
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ur'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('change.lang');

// For Register Page
Route::get("/register",[RegisterController::class,'create']);
Route::post("/register",[RegisterController::class,'store'])->name('registerUser')->middleware(['age.check','city.check']);

// For Login Page
Route::get('/login',[LoginController::class,'create'])->name('loginPage');
Route::post('/login',[LoginController::class,'checkLogin'])->name('loginUser');

// For Forget Password
Route::get('/forgot',[ForgotPasswordController::class,'create'])->name('forgotPage');
Route::post('/forgot',[ForgotPasswordController::class,'sendOtp'])->name('sendOtpEmail');

// For Verify OTP
Route::get('/verifyOTP',[ForgotPasswordController::class,'showVerifyOtp'])->name('VerifyOtpPage');
Route::post('/verifyOTP',[ForgotPasswordController::class,'verifyOtp'])->name('verifyotp');

// For Verify OTP
Route::get('/resetPassword',[ForgotPasswordController::class,'showResetPassword'])->name('ResetPasswordPage');
Route::post('/resetPassword',[ForgotPasswordController::class,'resetPassword'])->name('ResetPassword');

// For Logout 
Route::post('/logout',[LoginController::class,'logout'])->name('logoutPage');

// For Cheking that User has Login or not
Route::middleware('user.auth')->group(function(){

// For Dashboard
Route::get('/dashboard',function(){
    return view('employee.dashboard.index');
})->name('dashboardPage');

Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboardPage');

// For Attendance Check In & Check Out Page
Route::post('/check-in',[AttendanceController::class,'checkIn'])->name('checkInPage');
Route::post('/check-out',[AttendanceController::class,'checkOut'])->name('checkOutPage');

// For Get Attendance and Attendance Histroy Page
Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendancePage');
Route::get('/attendance-history', [AttendanceController::class, 'history'])->name('attendanceHistoryPage');

// For Employee Profile Index Page
Route::get('/emp-profile',[ProfileController::class,'show'])->name('emp-profile-index');
Route::post('/upl-image',[ProfileController::class,'uploadImage'])->name('profileImage');

// Employee Profile Edit Routes
Route::prefix('profile')->group(function(){
    // For Employee Profile Personal Info Edit Page
Route::get('/personal/edit',[ProfileController::class,'editPersonal'])->name('profile.personal.edit');
Route::put('/personal/update',[ProfileController::class,'updatePersonal'])->name('profile.personal.update')->middleware('age.check');

    // For Employee Profile Contact Info Edit Page
Route::get('/contact/edit',[ProfileController::class,'editContact'])->name('profile.contact.edit');
Route::put('/contact/update',[ProfileController::class,'updateContact'])->name('profile.contact.update');
    
    // For Employee Profile Designation Info Edit Page
Route::get('/designation/edit',[ProfileController::class,'editDesignation'])->name('profile.designation.edit');
Route::put('/designation/update',[ProfileController::class,'updateDesignation'])->name('profile.designation.update');
    
    // For Employee Profile Other Info Edit Page
Route::get('/other/edit',[ProfileController::class,'editOther'])->name('profile.other.edit');
Route::put('/other/update',[ProfileController::class,'updateOther'])->name('profile.other.update')->middleware('city.check');
});

// For Leave
Route::prefix('leave')->group(function(){

    // For Employee Profile Leave Index Page
Route::get('/index/show',[LeaveController::class,'index'])->name('leave.index.show');

    // For Employee Profile Leave Create Page and Store Method 
Route::get('/apply/create',[LeaveController::class,'create'])->name('leave.apply.create');
Route::post('/apply/store',[LeaveController::class,'store'])->name('leave.apply.store');
});

});

// ----------------------------- For HR --------------------------------------//

Route::prefix('hr')->middleware('hr.auth')->group(function(){

    // For HR Dashboard Page
    Route::get('/dashboard/index',[DashboardController::class,'index'])->name('hr.dashboard.index');

    // For Employee Details 
    Route::get('/employees/index',[EmployeeController::class,'index'])->name('hr.employees.index');
    Route::get('/employees/create',[EmployeeController::class,'create'])->name('hr.employees.create');
    Route::post('/employees/store',[EmployeeController::class,'store'])->name('hr.employees.store');
    Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('hr.employees.edit');
    Route::put('/employees/{id}',[EmployeeController::class,'store'])->name('hr.employees.update');

});



