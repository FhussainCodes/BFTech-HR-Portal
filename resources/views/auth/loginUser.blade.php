@extends('layouts.auth')
@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width: 400px;">
        
        <h4 class="text-center fw-bold mb-4">
            Login
        </h4>

        <form action="{{ route('loginUser') }}" method="POST">
            @csrf   

            <div class="mb-3">
                <label class="form-label fw-semibold small">
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
                <div class="invalid-feedback small">
                    {{ $message }}
                </div>
                @enderror
            </div>     

            <div class="mb-3">
                <label class="form-label fw-semibold small">
                    Password <span class="text-danger">*</span>
                </label>

                <input 
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                    required
                >

                @error('password')
                <div class="invalid-feedback small">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                LOG IN
            </button>

            <div class="text-center mt-3">
                <p class="text-muted small mb-1">
                    Forgot password? 
                    <a href="{{route('forgotPage')}}" class="text-decoration-none fw-semibold">Click here</a>
                </p>
                <p class="text-muted small mb-0">
                    Don't have an account? 
                    <a href="/register" class="text-decoration-none fw-semibold">Register</a>
                </p>
            </div>

        </form>

    </div>
</div>

@endsection