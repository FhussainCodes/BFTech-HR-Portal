<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // public function checkIn(){
    //     session([
    //         'attendanceStatus' => 'checkIn',
    //         'checkInTime' => now(),
    //     ]);

    //     return back();
    // }

    // public function checkOut(){
    //     session([
    //         'attendanceStatus' => 'checkOut',
    //         'checkOutTime' => now(),
    //     ]);
    //     return back();
    // }

    public function checkIn(){

    $attendance = Attendance::create([
        'user_id'   => Auth::id(),
        'user_name' => Auth::user()->first_name,
        'date'      => Carbon::today(),
        'check_in'  => Carbon::now()->format('H:i:s'),
    ]);

     return response()->json(['message' => 'Checked in successfully', 'data' => $attendance]);
    }

}
