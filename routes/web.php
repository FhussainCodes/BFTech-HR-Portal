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
use App\Http\Controllers\HR\HrProfileController;
use App\Http\Controllers\HR\AttendanceController as HrAttendanceController;
use App\Http\Controllers\HR\LeaveController as HrLeaveController;
use App\Http\Controllers\HR\NotificationController;
use App\Http\Controllers\YouTubeController;

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

// For Get Attendance Index Page
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

// -------------------------------------- For Employee Profile Edit Routes -------------------------------------- //

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

// -------------------------------------- For Employee Leave -------------------------------------- //

Route::prefix('leave')->group(function(){

    // For Employee Profile Leave Index Page
Route::get('/index/show',[LeaveController::class,'index'])->name('leave.index.show');

    // For Employee Profile Leave Create Page and Store Method 
Route::get('/apply/create',[LeaveController::class,'create'])->name('leave.apply.create');
Route::post('/apply/store',[LeaveController::class,'store'])->name('leave.apply.store');
});

}); // End of Employee Middleware for check that login or not

// -------------------------------------- For HR -------------------------------------- //

Route::prefix('hr')->middleware('hr.auth')->group(function(){

    // For HR Dashboard Page
    Route::get('/dashboard/index',[DashboardController::class,'index'])->name('hr.dashboard.index');

    // For Employee Details 
    Route::get('/employees/index',[EmployeeController::class,'index'])->name('hr.employees.index');
    Route::get('/employees/create',[EmployeeController::class,'create'])->name('hr.employees.create');
    Route::post('/employees/store',[EmployeeController::class,'store'])->name('hr.employees.store');
    Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('hr.employees.edit');
    Route::put('/employees/{id}',[EmployeeController::class,'update'])->name('hr.employees.update');
    Route::delete('/employees/{id}',[EmployeeController::class,'destroy'])->name('hr.employees.destroy');

    // For Hr Personal Details 
    Route::get('/profile/index',[HrProfileController::class,'index'] )->name('hr.profile.index');
    Route::get('/profile/editpersonal',[HrProfileController::class,'editPersonal'] )->name('hr.profile.editPersonal');
    Route::put('/profile/updatepersonal',[HrProfileController::class,'updatePersonal' ])->name('hr.profile.updatePersonal');
    Route::get('/profile/editcontact',[HrProfileController::class,'editContact'] )->name('hr.profile.editContact');
    Route::put('/profile/updatecontact',[HrProfileController::class,'updateContact'] )->name('hr.profile.updateContact');
    Route::get('/profile/editdesignation',[HrProfileController::class,'editDesignation'] )->name('hr.profile.editDesignation');
    Route::put('/profile/updatedesignation',[HrProfileController::class,'updateDesignation' ])->name('hr.profile.updateDesignation');
    Route::get('/profile/editother',[HrProfileController::class,'editOther' ])->name('hr.profile.editOther');
    Route::put('/profile/updateother',[HrProfileController::class,'updateOther' ])->name('hr.profile.updateOther');
    Route::get('/profile/editpassword',[HrProfileController::class,'editPassword' ])->name('hr.profile.editPassword');
    Route::put('/profile/updatepassword',[HrProfileController::class,'updatePassword' ])->name('hr.profile.updatePassword');
    Route::post('/profile/uploadimage',[HrProfileController::class,'uploadImage' ])->name('hr.profile.uploadImage');
    Route::delete('/profile/deleteimage',[HrProfileController::class,'deleteImage' ])->name('hr.profile.deleteImage');
    
    // For Attendance Details
    Route::get('/attendance/index',[HrAttendanceController::class,'index'])->name('hr.attendance.index');
    Route::get('/attendance/{id}/edit',[HrAttendanceController::class,'edit'])->name('hr.attendance.edit');
    Route::put('/attendance/{id}',[HrAttendanceController::class,'update'])->name('hr.attendance.update');
    Route::delete('/attendance/{id}',[HrAttendanceController::class,'destroy'])->name('hr.attendance.destroy');
    Route::get('/attendance/search', [HrAttendanceController::class, 'search'])->name('hr.attendance.search');

    // For Leave
    Route::get('/leave/index',[HrLeaveController::class,'index'])->name('hr.leave.index');
    Route::get('/leave/pending',[HrLeaveController::class,'pending'])->name('hr.leave.pending');
    Route::get('/leave/approved',[HrLeaveController::class,'approved'])->name('hr.leave.approved');
    Route::get('/leave/rejected',[HrLeaveController::class,'rejected'])->name('hr.leave.rejected');
    Route::get('/leave/show/{id}', [HrLeaveController::class, 'show'])->name('hr.leave.show');
    Route::post('/leave/{id}/approve', [HrLeaveController::class, 'approve'])->name('hr.leave.approve');
    Route::post('/leave/{id}/reject', [HrLeaveController::class, 'reject'])->name('hr.leave.reject');
    // Route::get('/leave/search', [HrLeaveController::class, 'filterLeaves'])->name('hr.leave.search');
    
    // For Import Employee
    Route::get('/employee/import', [EmployeeController::class, 'importPage'])->name('hr.employee.importPage');
    Route::post('/employee/import', [EmployeeController::class, 'importEmployees'])->name('hr.employee.import');
    
    // For Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('hr.notifications.index');
    Route::get('/notifications/{id}/read', [NotificationController::class, 'read'])->name('hr.notifications.read');
    Route::post('/notifications/readall', [NotificationController::class, 'markAllAsRead'])->name('hr.notifications.readAll');

    // For Search Data From Youtube
    

});

// Route::get('/youtube-test', [YouTubeController::class, 'youtubeData']);
Route::get('/youtube-test', [YouTubeController::class, 'search'])->name('youtube');


