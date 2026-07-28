@extends('layouts.auth')

@section('title', __('auth.verify_otp_heading'))

@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">

    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width:400px;">

        <h4 class="text-center fw-bold mb-3">
            {{ __('auth.verify_otp_heading') }}
        </h4>

        <p class="text-muted small text-center mb-4">
            {{ __('auth.verify_otp_description') }}
        </p>

        <form action="{{ route('verifyotp') }}" method="POST">

            @csrf

            {{-- OTP Input --}}
            <div class="mb-3">

                <label class="form-label fw-semibold small d-block">
                    {{ __('auth.enter_otp_label') }}
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="otp"
                    value="{{ old('otp') }}"
                    class="form-control form-control-sm @error('otp') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_6_digit_otp') }}"
                >

                @error('otp')
                    <div class="invalid-feedback small">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                {{ __('auth.verify_otp_btn') }}
            </button>

            <div class="text-center mt-3">
                <a href="{{ route('loginUser') }}" class="text-decoration-none small fw-semibold">
                    {{ __('auth.back_to_login') }}
                </a>
            </div>

        </form>

    </div>

</div>

@endsection