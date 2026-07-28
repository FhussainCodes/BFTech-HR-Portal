@extends('layouts.auth')

@section('title', __('auth.reset_password_heading'))

@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">

    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width:400px;">

        <h4 class="text-center fw-bold mb-4">
            {{ __('auth.reset_password_heading') }}
        </h4>

        <form action="{{ route('ResetPassword') }}" method="POST" autocomplete="off">

            @csrf

            {{-- New Password --}}
            <div class="mb-3">

                <label class="form-label fw-semibold small d-block">
                    {{ __('auth.new_password_label') }}
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_new_password') }}"
                    autocomplete="new-password"
                >

                @error('password')
                    <div class="invalid-feedback small">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold small d-block">
                    {{ __('auth.confirm_password_label') }}
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="password"
                    name="confirm_password"
                    class="form-control form-control-sm @error('confirm_password') is-invalid @enderror"
                    placeholder="{{ __('auth.confirm_password_placeholder') }}"
                    autocomplete="new-password"
                >

                @error('confirm_password')
                    <div class="invalid-feedback small">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                {{ __('auth.reset_password_btn') }}
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