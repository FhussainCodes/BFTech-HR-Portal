@extends('layouts.auth')

@section('content')

@php
    $isRtl = app()->getLocale() == 'ur';
    $textAlign = $isRtl ? 'text-end' : 'text-start';
@endphp

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="card shadow-sm border-0 rounded-3 p-4 w-100" style="max-width: 650px;" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
        
        <h4 class="text-center fw-bold mb-4">
            {{ __('auth.register_heading') }}
        </h4>

        <form action="{{ route('registerUser') }}" method="POST">
            @csrf

            <div class="row g-2">

                <!-- First Name -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.first_name') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="{{ __('auth.enter_first_name') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('first_name') is-invalid @enderror"
                        required
                    >
                    @error('first_name')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.last_name') }}
                    </label>
                    <input 
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="{{ __('auth.enter_last_name') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('last_name') is-invalid @enderror"
                    >
                    @error('last_name')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-8 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.email') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="{{ __('auth.enter_email') }}" 
                        class="form-control form-control-sm {{ $textAlign }} @error('email') is-invalid @enderror"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Age -->
                <div class="col-md-4 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.age') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="age"
                        value="{{ old('age') }}"
                        placeholder="{{ __('auth.enter_age') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('age') is-invalid @enderror"
                    >
                    @error('age')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Designation -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.designation') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="designation"
                        value="{{ old('designation') }}"
                        placeholder="{{ __('auth.enter_designation') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('designation') is-invalid @enderror"
                        required
                    >
                    @error('designation')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.phone') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="phone_number"
                        value="{{ old('phone_number') }}"
                        placeholder="{{ __('auth.enter_phone') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('phone_number') is-invalid @enderror"
                        required
                    >
                    @error('phone_number')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- City -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.city') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="city"
                        value="{{ old('city') }}"
                        placeholder="{{ __('auth.enter_city') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('city') is-invalid @enderror"
                        required
                    >
                    @error('city')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Country -->
                <div class="col-md-6 mb-2">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.country') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text"
                        name="country"
                        value="{{ old('country') }}"
                        placeholder="{{ __('auth.enter_country') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('country') is-invalid @enderror"
                        required
                    >
                    @error('country')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.password') }} <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="password"
                        name="password"
                        value="{{ old('password') }}"
                        placeholder="{{ __('auth.enter_password') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold small mb-1 d-block {{ $textAlign }}">
                        {{ __('auth.confirm_password') }}
                    </label>
                    <input 
                        type="password"
                        name="confirm_password"
                        value="{{ old('confirm_password') }}"
                        placeholder="{{ __('auth.re_enter_password') }}"
                        class="form-control form-control-sm {{ $textAlign }} @error('confirm_password') is-invalid @enderror"
                    >
                    @error('confirm_password')
                        <div class="invalid-feedback small {{ $textAlign }}">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold py-2 mt-2">
                {{ __('auth.register') }}
            </button>

            <!-- Bottom Link -->
            <div class="text-center mt-3">
                <p class="text-muted small mb-0">
                    {{ __('auth.already_have_account') }} 
                    <a href="{{ route('loginPage') }}" class="text-decoration-none fw-semibold">
                        {{ __('auth.login') }}
                    </a>
                </p>
            </div>

        </form>

    </div>
</div>

@endsection