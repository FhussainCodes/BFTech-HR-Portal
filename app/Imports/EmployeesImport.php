<?php

namespace App\Imports;

use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Register([
            'first_name'        => $row['first_name'],
            'last_name'         => $row['last_name'],
            'email'             => $row['email'],
            'age'               => $row['age'],
            'designation'       => $row['designation'],
            'phone_number'      => $row['phone_number'],
            'city'              => $row['city'],
            'country'           => $row['country'],
            'password'          => Hash::make($row['password']),
            'confirm_password'  => $row['password'],
            'role'              => $row['role']
        ]);
    }

        public function rules(): array
    {
        return [
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:register,email',
            'age'          => 'required',
            'designation'  => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'city'         => 'required|string|max:255',
            'country'      => 'required|string|max:255',
            'password'     => 'required|string|min:8',
            'role'         => 'required|in:employee,hr',
        ];
    }
}
