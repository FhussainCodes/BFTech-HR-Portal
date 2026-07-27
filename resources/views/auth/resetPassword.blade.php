@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

<div class="card shadow">
    <div class="card-body">

        <h3 class="text-center mb-4">Reset Password</h3>

        <form action="{{ route('ResetPassword') }}" method="POST" autocomplete="off">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">New Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter New Password"
                    autocomplete="new-password"
                    >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    class="form-control @error('confirm_password') is-invalid @enderror"
                    placeholder="Confirm Password"
                    autocomplete="new-password"
                    >

                @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Reset Password
            </button>

        </form>

    </div>
</div>

@endsection