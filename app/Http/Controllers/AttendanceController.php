<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // Dashboard Page Load Function
public function index()
{
    $userId = session('user')['id'] ?? null;

    // Sabse aakhri (latest) record
    $latestAttendance = Attendance::where('user_id', $userId)
                                  ->where('date', Carbon::today())
                                  ->latest()
                                  ->first();

    // Check karein ke kya active (unclosed) attendance hai
    // Agar active attendance nahi hai (yani check_out ho chuka hai ya koi entry hi nahi hai), toh $todayAttendance null rahega (tatke Check-In button dikhe)
    $todayAttendance = ($latestAttendance && $latestAttendance->check_out == null) ? $latestAttendance : null;

    $attendanceLogs = Attendance::where('user_id', $userId)
                                ->orderBy('date', 'desc')
                                ->orderBy('id', 'desc')
                                ->get();

    return view('employee.dashboard', compact('todayAttendance', 'attendanceLogs'));
}

    // Check In Function
    public function checkIn()
    {
        $userId = session('user')['id'] ?? null;
        $userName = session('user')['first_name'] ?? 'Employee';

        if (!$userId) {
            return back()->with('error', 'Session expired. Please login again.');
        }

        Attendance::create([
            'user_id'   => $userId,
            'user_name' => $userName,
            'date'      => Carbon::today(),
            'check_in'  => Carbon::now()->format('H:i:s'),
        ]);

        return back();
    }

    // Check Out Function
public function checkOut()
{
    $userId = session('user')['id'] ?? null;

    // Active pending attendance retrieve karein
    $attendance = Attendance::where('user_id', $userId)
                            ->where('date', Carbon::today())
                            ->whereNotNull('check_in')
                            ->whereNull('check_out')
                            ->latest()
                            ->first();

    if ($attendance) {
        $checkInTime = Carbon::parse($attendance->check_in);
        $checkOutTime = Carbon::now();

        // Check In aur Check Out ka difference calculate karna
        $diff = $checkInTime->diff($checkOutTime);
        $durationText = $diff->format('%h hrs %i mins'); // e.g. "8 hrs 30 mins" ya "0 hrs 2 mins"

        // Update Check-Out Time and Duration in Database
        $attendance->update([
            'check_out' => $checkOutTime->format('H:i:s'),
            'duration'  => $durationText
        ]);
    }

    return back();
}
}