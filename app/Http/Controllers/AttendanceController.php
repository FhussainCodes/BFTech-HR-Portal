<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{

public function index()
{
    $user = session('user');

    $todayAttendance = Attendance::where('user_id', $user['id'])
                        ->whereDate('date', Carbon::today())
                        ->first();

    $attendanceLogs = Attendance::where('user_id', $user['id'])
                        ->latest()
                        ->get();

    return view('employee.dashboard.index', compact(
        'todayAttendance',
        'attendanceLogs'
    ));
}

public function checkIn()
{
    $user = session('user');

    $attendance = Attendance::where('user_id', $user['id'])
                    ->whereDate('date', Carbon::today())
                    ->first();

    if ($attendance) {
        return back()->with('error', 'You have already checked in today.');
    }

    Attendance::create([
        'user_id'   => $user['id'],
        'user_name' => $user['first_name'],
        'date'      => Carbon::today(),
        'check_in'  => Carbon::now(),
    ]);

    return back()->with('success', 'Checked In Successfully.');
}

public function checkOut()
{
    $user = session('user');

    $attendance = Attendance::where('user_id', $user['id'])
                    ->whereDate('date', Carbon::today())
                    ->first();

    if (!$attendance) {
        return back()->with('error', 'Please Check In First.');
    }

    if ($attendance->check_out) {
        return back()->with('error', 'You have already checked out today.');
    }

    $attendance->check_out = Carbon::now();

    $attendance->duration = Carbon::parse($attendance->check_in)
                        ->diff(Carbon::now())
                        ->format('%h Hours %i Minutes %s Seconds');

    $attendance->save();

    return back()->with('success', 'Checked Out Successfully.');
}

public function attendance()
{
    $user = session('user');

    $todayAttendance = Attendance::where('user_id', $user['id'])
                        ->whereDate('date', Carbon::today())
                        ->first();

    return view('employee.attendance.index', compact('todayAttendance'));
}

public function history()
{
    $user = session('user');

    $attendanceLogs = Attendance::where('user_id', $user['id'])
                        ->latest()
                        ->get();

    return view('employee.attendance.history', compact('attendanceLogs'));
}
}