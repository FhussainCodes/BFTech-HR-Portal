<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
        public function index()
        {
            $leaves = Leave::with('employee')
                        ->latest()
                        ->paginate(10);

            return view('hr.leave.index', compact('leaves'));
        }

        public function pending()
        {
            $leaves = Leave::with('employee')
                        ->where('status', 'Pending')
                        ->latest()
                        ->paginate(10);

            return view('hr.leave.pending', compact('leaves'));
        }

        public function approved()
        {
            $leaves = Leave::with('employee')
                        ->where('status', 'Approved')
                        ->latest()
                        ->paginate(10);

            return view('hr.leave.approved', compact('leaves'));
        }

        public function rejected()
        {
            $leaves = Leave::with('employee')
                        ->where('status', 'Rejected')
                        ->latest()
                        ->paginate(10);

            return view('hr.leave.rejected', compact('leaves'));
        }

            public function search(){}
            public function pendingSearch(){}
            public function approvedSearch(){}
            public function rejectedSearch(){}

            public function show($id){
                $leave = Leave::with('employee')->findOrFail($id);
                return view('hr.leave.show',compact('leave'));
            }

            public function approve($id)
{
    $leave = Leave::findOrFail($id);

    $leave->status = 'Approved';

    $leave->save();

    return redirect()->route('hr.leave.pending')->with('success', 'Leave Approved Successfully.');
}
            public function reject($id)
{
    $leave = Leave::findOrFail($id);

    $leave->status = 'Rejected';

    $leave->save();

    return redirect()->route('hr.leave.pending')->with('success', 'Leave Rejected Successfully.');
}
}
