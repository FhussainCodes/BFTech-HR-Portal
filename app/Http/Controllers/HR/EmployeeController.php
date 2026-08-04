<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Register::where('role','employee')->paginate(5);
        return view('hr.employees.index', compact('employees'));
    }

    public function create(){
        return view('hr.employees.create');
    }

    public function store(){}
}
