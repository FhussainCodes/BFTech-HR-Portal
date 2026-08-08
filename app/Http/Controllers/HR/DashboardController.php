<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Leave;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index()
{
    $today = Carbon::today();

    $totalEmployees = Register::where('role', 'employee')->count();

    $activeEmployees = $totalEmployees;

    $onLeave = Leave::where('status', 'Approved')
        ->whereDate('from_date', '<=', $today)
        ->whereDate('to_date', '>=', $today)
        ->distinct('employee_id')
        ->count('employee_id');

    // Attendance ka logic baad mein exact schema ke according
    $attendancePercentage = 0;

    $recentEmployees = Register::where('role', 'employee')
        ->latest()
        ->take(3)
        ->get();

    $pendingLeaves = Leave::with('employee')
        ->where('status', 'Pending')
        ->latest()
        ->take(3)
        ->get();

    return view('hr.dashboard.index', compact(
        'totalEmployees',
        'activeEmployees',
        'onLeave',
        'attendancePercentage',
        'recentEmployees',
        'pendingLeaves'
    ));
}
}

