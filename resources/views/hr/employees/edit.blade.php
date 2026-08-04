@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="dashboard-title mb-0">
        Edit Employee
    </h2>

    <a href="{{ route('hr.employees.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left me-2"></i>

        Back

    </a>

</div>


<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('hr.employees.update', $employee->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- First Name --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        First Name

                    </label>

                    <input type="text"
                           name="first_name"
                           class="form-control"
                           value="{{ old('first_name', $employee->first_name) }}">

                </div>

                {{-- Last Name --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Last Name

                    </label>

                    <input type="text"
                           name="last_name"
                           class="form-control"
                           value="{{ old('last_name', $employee->last_name) }}">

                </div>

                {{-- Email --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Email

                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $employee->email) }}">

                </div>

                {{-- Age --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Age

                    </label>

                    <input type="number"
                           name="age"
                           class="form-control"
                           value="{{ old('age', $employee->age) }}">

                </div>

                {{-- Designation --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Designation

                    </label>

                    <input type="text"
                           name="designation"
                           class="form-control"
                           value="{{ old('designation', $employee->designation) }}">

                </div>

                {{-- Phone --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Phone Number

                    </label>

                    <input type="text"
                           name="phone_number"
                           class="form-control"
                           value="{{ old('phone_number', $employee->phone_number) }}">

                </div>

                {{-- City --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        City

                    </label>

                    <input type="text"
                           name="city"
                           class="form-control"
                           value="{{ old('city', $employee->city) }}">

                </div>

                {{-- Country --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Country

                    </label>

                    <input type="text"
                           name="country"
                           class="form-control"
                           value="{{ old('country', $employee->country) }}">

                </div>

                {{-- Profile Image --}}

                <div class="col-md-12 mb-4">

                    <label class="form-label">

                        Profile Image

                    </label>

                    <input type="file"
                           name="profile_image"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-primary">

                <i class="bi bi-check-circle me-2"></i>

                Update Employee

            </button>

        </form>

    </div>

</div>

@endsection