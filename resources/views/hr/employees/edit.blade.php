@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    <h2 class="dashboard-title mb-0">
        {{ Lang::has('employee.edit_employee') ? __('employee.edit_employee') : 'Edit Employee' }}
    </h2>

    <a href="{{ route('hr.employees.index') }}" class="btn btn-secondary">
        <i class="bi {{ app()->getLocale() == 'ur' ? 'bi-arrow-right ms-2' : 'bi-arrow-left me-2' }}"></i>
        {{ Lang::has('employee.back') ? __('employee.back') : 'Back' }}
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('hr.employees.update', $employee->id) }}"
              method="POST"
              enctype="multipart/form-data"
              dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- First Name --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.first_name') ? __('employee.first_name') : 'First Name' }}
                    </label>
                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_first_name') ? __('employee.placeholder_first_name') : 'Please enter first name' }}"
                           value="{{ old('first_name', $employee->first_name) }}">

                    @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Last Name --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.last_name') ? __('employee.last_name') : 'Last Name' }}
                    </label>
                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_last_name') ? __('employee.placeholder_last_name') : 'Please enter last name' }}"
                           value="{{ old('last_name', $employee->last_name) }}">

                    @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.email') ? __('employee.email') : 'Email' }}
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_email') ? __('employee.placeholder_email') : 'Please enter email' }}"
                           value="{{ old('email', $employee->email) }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Age --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.age') ? __('employee.age') : 'Age' }}
                    </label>
                    <input type="number"
                           name="age"
                           class="form-control @error('age') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_age') ? __('employee.placeholder_age') : 'Please enter age' }}"
                           value="{{ old('age', $employee->age) }}">

                    @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Designation --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.designation') ? __('employee.designation') : 'Designation' }}
                    </label>
                    <input type="text"
                           name="designation"
                           class="form-control @error('designation') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_designation') ? __('employee.placeholder_designation') : 'Please enter designation' }}"
                           value="{{ old('designation', $employee->designation) }}">

                    @error('designation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Phone Number --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.phone_number') ? __('employee.phone_number') : 'Phone Number' }}
                    </label>
                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_phone_number') ? __('employee.placeholder_phone_number') : 'Please enter phone number' }}"
                           value="{{ old('phone_number', $employee->phone_number) }}">

                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- City --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.city') ? __('employee.city') : 'City' }}
                    </label>
                    <input type="text"
                           name="city"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_city') ? __('employee.placeholder_city') : 'Please enter city' }}"
                           value="{{ old('city', $employee->city) }}">

                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Country --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.country') ? __('employee.country') : 'Country' }}
                    </label>
                    <input type="text"
                           name="country"
                           class="form-control @error('country') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_country') ? __('employee.placeholder_country') : 'Please enter country' }}"
                           value="{{ old('country', $employee->country) }}">

                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.password') ? __('employee.password') : 'Password' }}
                    </label>
                    <input type="password"
                           name="password"
                           autocomplete="new-password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_edit_password') ? __('employee.placeholder_edit_password') : 'Leave blank to keep current password' }}">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ Lang::has('employee.confirm_password') ? __('employee.confirm_password') : 'Confirm Password' }}
                    </label>
                    <input type="password"
                           name="confirm_password"
                           autocomplete="new-password"
                           class="form-control @error('confirm_password') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.placeholder_edit_confirm_password') ? __('employee.placeholder_edit_confirm_password') : 'Re-enter new password' }}">

                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <small class="text-muted">
                        {{ Lang::has('employee.password_help') ? __('employee.password_help') : 'Leave the password fields empty if you don\'t want to change the employee\'s password.' }}
                    </small>
                </div>

            </div>

            <button type="submit" class="btn btn-primary mt-2">
                <i class="bi bi-check-circle {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
                {{ Lang::has('employee.btn_update') ? __('employee.btn_update') : 'Update Employee' }}
            </button>

        </form>

    </div>

</div>

@endsection