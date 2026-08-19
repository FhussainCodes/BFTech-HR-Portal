<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Http\Requests\Hr\SearchLeaveRequest;

class LeaveController extends Controller
{
        public function index(SearchLeaveRequest $request)
        {


            $leaves = $this->filterLeaves($request);

            return view('hr.leave.index', compact('leaves'));
        }

        public function pending(SearchLeaveRequest $request)
        {
            
            // $leaves = Leave::with('employee')
            //             ->where('status', 'Pending')
            //             ->latest()
            //             ->paginate(10);
            $leaves = $this->filterLeaves($request,'Pending');
            
            return view('hr.leave.pending', compact('leaves'));
        }

        public function approved(SearchLeaveRequest $request)
        {
            // $leaves = Leave::with('employee')
            //             ->where('status', 'Approved')
            //             ->latest()
            //             ->paginate(10);
            $leaves = $this->filterLeaves($request,'Approved');

            return view('hr.leave.approved', compact('leaves'));
        }

        public function rejected(SearchLeaveRequest $request)
        {
            // $leaves = Leave::with('employee')
            //             ->where('status', 'Rejected')
            //             ->latest()
            //             ->paginate(10);
            $leaves = $this->filterLeaves($request,'Rejected');

            return view('hr.leave.rejected', compact('leaves'));
        }

            public function show($id){
                $leave = Leave::with('employee')->findOrFail($id);
                return view('hr.leave.show',compact('leave'));
            }

            public function approve($id)
        {
            $leave = Leave::findOrFail($id);

            $leave->status = 'Approved';

            $leave->save();

            // return redirect()->route('hr.leave.pending')->with('success', 'Leave Approved Successfully.');
                return response()->json([
                    'success' => true,
                    'message' => 'Leave Approved Successfully.',
                    'status' => 'Approved'
                ]);
        }

            public function reject($id)
        {
            $leave = Leave::findOrFail($id);

            $leave->status = 'Rejected';

            $leave->save();

            // return redirect()->route('hr.leave.pending')->with('success', 'Leave Rejected Successfully.');
                    return response()->json([
                    'success' => true,
                    'message' => 'Leave Approved Successfully.',
                    'status' => 'Rejected'
                ]);
        }

 private function filterLeaves(SearchLeaveRequest $request, $status = null)
{
    return Leave::query()

        ->with('employee')

        ->when($status, function ($query) use ($status) {

            $query->where('status', $status);

        })

        ->when(!$status && $request->status, function ($query) use ($request) {

            $query->where('status', $request->status);

        })

        ->when($request->employee, function ($query) use ($request) {

            $query->whereHas('employee', function ($q) use ($request) {

                $q->where('first_name', 'LIKE', "%{$request->employee}%")
                  ->orWhere('last_name', 'LIKE', "%{$request->employee}%");

            });

        })

        ->when($request->leave_type, function ($query) use ($request) {

            $query->where('leave_type', $request->leave_type);

        })

        ->when($request->from_date, function ($query) use ($request) {

            $query->whereDate('from_date', '>=', $request->from_date);

        })

        ->when($request->to_date, function ($query) use ($request) {

            $query->whereDate('to_date', '<=', $request->to_date);

        })

        ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                $query->whereDate('from_date', '<=', $request->to_date)
              ->whereDate('to_date', '>=', $request->from_date);

    })

        ->latest()

        ->paginate(5)

        ->withQueryString();
}

}
