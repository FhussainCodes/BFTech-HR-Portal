@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="dashboard-title mb-0">
        Edit Employee
    </h2>

    <a href="{{ route('hr.employees.index') }}" class="btn btn-secondary">
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

                    <label class="form-label">First Name</label>

                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           placeholder="Please enter first name"
                           value="{{ old('first_name', $employee->first_name) }}">

                    @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Last Name --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Last Name</label>

                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           placeholder="Please enter last name"
                           value="{{ old('last_name', $employee->last_name) }}">

                    @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Email --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Please enter email"
                           value="{{ old('email', $employee->email) }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Age --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Age</label>

                    <input type="number"
                           name="age"
                           class="form-control @error('age') is-invalid @enderror"
                           placeholder="Please enter age"
                           value="{{ old('age', $employee->age) }}">

                    @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Designation --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Designation</label>

                    <input type="text"
                           name="designation"
                           class="form-control @error('designation') is-invalid @enderror"
                           placeholder="Please enter designation"
                           value="{{ old('designation', $employee->designation) }}">

                    @error('designation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Phone Number --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Phone Number</label>

                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="Please enter phone number"
                           value="{{ old('phone_number', $employee->phone_number) }}">

                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- City --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">City</label>

                    <input type="text"
                           name="city"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="Please enter city"
                           value="{{ old('city', $employee->city) }}">

                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Country --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Country</label>

                    <input type="text"
                           name="country"
                           class="form-control @error('country') is-invalid @enderror"
                           placeholder="Please enter country"
                           value="{{ old('country', $employee->country) }}">

                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Password --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           autocomplete="new-password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Leave blank to keep current password">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Confirm Password --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">Confirm Password</label>

                    <input type="password"
                           name="confirm_password"
                           autocomplete="new-password"
                           class="form-control @error('confirm_password') is-invalid @enderror"
                           placeholder="Re-enter new password">

                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-3">

                    <small class="text-muted">
                        Leave the password fields empty if you don't want to change the employee's password.
                    </small>

                </div>

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="bi bi-check-circle me-2"></i>

                Update Employee

            </button>
            

        </form>

    </div>

</div>

@endsection