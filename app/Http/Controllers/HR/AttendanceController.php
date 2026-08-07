<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Http\Requests\Hr\SearchAttendanceRequest;

class AttendanceController extends Controller
{
public function index()
    {
        $attendance = Attendance::latest()->paginate(10);

        return view('hr.attendance.index', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        return view('hr.attendance.edit', compact('attendance'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'check_in' => 'required',
        'check_out' => 'required',
    ]);

    $attendance = Attendance::findOrFail($id);
    $checkin = Carbon::parse($request->check_in);
    $checkout = Carbon::parse($request->check_out);

    if ($checkin > $checkout) {
    return back()->with('error','Check Out time must be greater than Check In time.');
}

    $attendance->check_in = $request->check_in;
    $attendance->check_out = $request->check_out;

    $attendance->duration = Carbon::parse($request->check_in)
                        ->diff(Carbon::parse($request->check_out))
                        ->format('%h Hours %i Minutes %s Seconds');

    $attendance->save();

    return redirect()->route('hr.attendance.index')
            ->with('success','Attendance updated successfully.');
}

    // public function destroy($id)
    // {
    //     $attendance = Attendance::findOrFail($id);

    //     $attendance->delete();

    //     return redirect()->route('hr.attendance.index')
    //         ->with('success','Attendance deleted successfully.');
    // }

    public function search(SearchAttendanceRequest $request)
{
    $query = Attendance::query();

    $query->when($request->employee, function ($q) use ($request) {
        $q->where('user_name', 'like', '%' . $request->employee . '%');
    });

    $query->when($request->from_date, function ($q) use ($request) {
        $q->whereDate('date', '>=', $request->from_date);
    });

    $query->when($request->to_date, function ($q) use ($request) {
        $q->whereDate('date', '<=', $request->to_date);
    });

    $attendance = $query->latest()->paginate(10)->withQueryString();

    return view('hr.attendance.index', compact('attendance'));
}
    
}
