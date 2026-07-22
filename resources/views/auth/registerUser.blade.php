@extends('layouts.auth')
@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width: 650px;">
        
        <h4 class="text-center fw-bold mb-4">
            Create an Account
        </h4>

        <form action="{{ route('registerUser') }}" method="POST">
            @csrf

            <div class="row g-2">

                <!-- First Name -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        First Name <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="first_name"
                        placeholder="e.g. Austin"
                        class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                        required
                    >
                    @error('first_name')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Last Name
                    </label>
                    <input 
                        type="text"
                        name="last_name"
                        placeholder="e.g. Jane"
                        class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                    >
                    @error('last_name')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-8 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="email"
                        name="email"
                        placeholder="name@example.com" 
                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Age -->
                <div class="col-md-4 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Age <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="age"
                        placeholder="e.g. 20"
                        class="form-control form-control-sm @error('age') is-invalid @enderror"
                    >
                    @error('age')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Designation -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Designation <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="designation"
                        placeholder="e.g. Software Engineer"
                        class="form-control form-control-sm @error('designation') is-invalid @enderror"
                        required
                    >
                    @error('designation')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Phone Number <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="phone_number"
                        placeholder="03001234567"
                        class="form-control form-control-sm @error('phone_number') is-invalid @enderror"
                        required
                    >
                    @error('phone_number')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- City -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        City <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="city"
                        placeholder="Enter your city"
                        class="form-control form-control-sm @error('city') is-invalid @enderror"
                        required
                    >
                    @error('city')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Country -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1">
                        Country <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="country"
                        placeholder="Enter your country"
                        class="form-control form-control-sm @error('country') is-invalid @enderror"
                        required
                    >
                    @error('country')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold small mb-1">
                        Password <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold small mb-1">
                        Confirm Password
                    </label>
                    <input 
                        type="password"
                        name="confirm_password"
                        placeholder="Re-enter password"
                        class="form-control form-control-sm @error('confirm_password') is-invalid @enderror"
                    >
                    @error('confirm_password')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                Register
            </button>

            <!-- Bottom Link -->
            <div class="text-center mt-3">
                <p class="text-muted small mb-0">
                    Already have an account? 
                    <a href="/login" class="text-decoration-none fw-semibold">Login here</a>
                </p>
            </div>

        </form>

    </div>
</div>

@endsection