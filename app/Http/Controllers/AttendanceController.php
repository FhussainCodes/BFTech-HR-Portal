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

    public function checkOut()
    {
        $attendance = Attendance::where('user_id', Auth::id())
            ->where('date', Carbon::today())
            ->whereNotNull('check_in')
            ->whereNull('check_out')
            ->first();

        if ($attendance) {
            $attendance->update(['check_out' => Carbon::now()]);
            return response()->json(['message' => 'Checked out successfully', 'data' => $attendance]);
        }

        return response()->json(['message' => 'No active check-in found'], 404);
    }

    public function index(){
        
    $todayAttendance = Attendance::where('user_id', Auth::id())
                                 ->where('date', Carbon::today())
                                 ->first();

    $attendanceLogs = Attendance::where('user_id', Auth::id())
                                ->orderBy('date', 'desc')
                                ->get();

    return view('employee.dashboard', compact('todayAttendance', 'attendanceLogs'));
    }

}
