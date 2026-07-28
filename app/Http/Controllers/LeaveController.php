<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;
use App\Models\Leave;
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

        return redirect()->route('leave.index.show')->with('success', 'Leave applied successfully.');
    }
}
