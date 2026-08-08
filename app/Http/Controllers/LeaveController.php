<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;
use App\Models\Leave;
use App\Models\Register;
use App\Notifications\LeaveAppliedNotification;
class LeaveController extends Controller
{
    public function index(){

    $currUserId = session('user')['id'];

    $leaves = Leave::where('employee_id',$currUserId)->latest()->get();

    return view('leave.index',compact('leaves'));    
    }

    public function create(){
        return view('leave.create');
    }

    public function store(LeaveRequest $request){

        $validatedData = $request->validated();
        $validatedData['employee_id'] = session('user')['id'];

        $leaves = Leave::create($validatedData);
        $hrUsers = Register::where('role', 'hr')->get();

        foreach ($hrUsers as $hr) {
            $hr->notify(new LeaveAppliedNotification($leaves));
        }

        return redirect()->route('leave.index.show')->with('success', 'Leave applied successfully.');
    }
}
