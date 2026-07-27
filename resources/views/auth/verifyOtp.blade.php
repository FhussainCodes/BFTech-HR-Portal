@extends('layouts.auth')

@section('content')

<div class="card shadow">

    <div class="card-header">
        <h4>Verify OTP</h4>
    </div>

    <div class="card-body">

        <p>
            We have sent a 6-digit OTP to your email.
        </p>

        <form action="{{ route('verifyOtp') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Enter OTP
                </label>

                <input
                    type="text"
                    name="otp"
                    class="form-control @error('otp') is-invalid @enderror"
                    placeholder="Enter 6-digit OTP"
                    value="{{ old('otp') }}"
                >

                @error('otp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Verify OTP

            </button>

        </form>

    </div>

</div>

@endsection