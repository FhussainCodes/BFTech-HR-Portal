@extends('layouts.auth')
@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">

    <div class="card shadow" style="width:450px;">

        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Forgot Password</h4>
        </div>

        <div class="card-body">

            <p class="text-muted text-center mb-4">
                Enter your registered email address to receive a verification code.
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="#" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your registered email">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100">
                    Send OTP
                </button>

            </form>

        </div>

        <div class="card-footer text-center">

            <a href="{{ route('loginPage') }}" class="text-decoration-none">
                ← Back to Login
            </a>

        </div>

    </div>

</div>

@endsection