<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Models\Register;
use App\Http\Requests\Hr\UpdateEmployeeRequest;
use App\Http\Requests\Hr\StoreEmployeeRequest;
use App\Http\Requests\Hr\SearchEmployeeRequest;

class EmployeeController extends Controller
{
    // public function index(){
    //     $employees = Register::where('role','employee')->paginate(5);
    //     return view('hr.employees.index', compact('employees'));
    // }
public function index(SearchEmployeeRequest $request)
{
    $employees = Register::query()->where('role', 'employee')
        ->when($request->search, function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'LIKE', "%{$request->search}%")
                  ->orWhere('id', 'LIKE', "%{$request->search}%")
                  ->orWhere('designation', 'LIKE', "%{$request->search}%");
            });
        })
        ->paginate(5)
        ->withQueryString();

    return view('hr.employees.index', compact('employees'));
}

    public function create(){
        return view('hr.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
{
    $validatedData = $request->validated();

    $validatedData['password'] = Hash::make($validatedData['password']);

    $validatedData['confirm_password'] = $validatedData['password'];

    $validatedData['role'] = 'employee';

    $validatedData['profile_image'] = null;

    Register::create($validatedData);

    return redirect()
            ->route('hr.employees.index')
            ->with('success', 'Employee added successfully.');
}

    public function edit($id){
        $employee = Register::findOrFail($id);
        return view('hr.employees.edit',compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
{
    $employee = Register::findOrFail($id);

    $validatedData = $request->validated();

    if (!empty($validatedData['password'])) {

        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['confirm_password'] = $validatedData['password'];

    }else{
            unset($validatedData['password']);
            unset($validatedData['confirm_password']);
    }

    $employee->update($validatedData);

    return redirect()->route('hr.employees.index')->with('success', 'Employee updated successfully.');
}

    public function destroy($id){
            $employee = Register::findOrFail($id);
            $employee->delete();
            return redirect()->route('hr.employees.index')->with('success','Employee deleted successfully');
    }

    public function importPage()
{
    return view('hr.employees.import');
}

    public function importEmployees(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:2048'
        ]);

        Excel::import(
            new EmployeesImport,
            $request->file('file')
        );

        return redirect()->back()->with('success','File import successfully');

    }
}
