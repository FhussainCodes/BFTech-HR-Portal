<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkIn(){
        session([
            'attendanceStatus' => 'checkIn',
            'checkInTime' => now(),
        ]);

        return back();
    }

    public function checkOut(){
        session([
            'attendanceStatus' => 'checkOut',
            'checkOutTime' => now(),
        ]);
        return back();
    }
}
