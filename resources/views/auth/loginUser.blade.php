@extends('layouts.auth')

@section('content')

@php
    $isRtl = app()->getLocale() == 'ur';
    $textAlign = $isRtl ? 'text-end' : 'text-start';
@endphp

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">

    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width:400px;" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

        <h4 class="text-center fw-bold mb-4">
            {{ __('auth.login_heading') }}
        </h4>

        <form action="{{ route('loginUser') }}" method="POST">

            @csrf

            {{-- Email --}}
            <div class="mb-3">

                <label class="form-label fw-semibold small d-block {{ $textAlign }}">
                    {{ __('auth.email') }}
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control form-control-sm {{ $textAlign }} @error('email') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_email') }}"
                >

                @error('email')
                    <div class="invalid-feedback small {{ $textAlign }}">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Password --}}
            <div class="mb-3">

                <label class="form-label fw-semibold small d-block {{ $textAlign }}">
                    {{ __('auth.password') }}
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control form-control-sm {{ $textAlign }} @error('password') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_password') }}"
                >

                @error('password')
                    <div class="invalid-feedback small {{ $textAlign }}">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                {{ __('auth.login') }}
            </button>

            <div class="text-center mt-3">

                <p class="text-muted small mb-1">

                    {{ __('auth.forgot_password') }}

                    <a href="{{ route('forgotPage') }}" class="text-decoration-none fw-semibold">
                        {{ __('auth.click_here') }}
                    </a>

                </p>

                <p class="text-muted small mb-0">

                    {{ __('auth.dont_have_account') }}

                    <a href="{{ route('registerUser') }}" class="text-decoration-none fw-semibold">
                        {{ __('auth.register') }}
                    </a>

                </p>

            </div>

        </form>

    </div>

</div>

@endsection