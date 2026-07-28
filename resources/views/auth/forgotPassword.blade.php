@extends('layouts.auth')

@section('content')

@php
    $isRtl = app()->getLocale() == 'ur';
@endphp

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">

    <div class="card shadow" style="width:450px;" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">
                {{ __('auth.forgot_password_heading') }}
            </h4>
        </div>

        <div class="card-body">

            <p class="text-muted {{ $isRtl ? 'text-end' : 'text-start' }} mb-4">
                {{ __('auth.forgot_password_description') }}
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

                    <label class="form-label fw-semibold d-block {{ $isRtl ? 'text-end' : 'text-start' }}">
                        {{ __('auth.email_address') }}
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control {{ $isRtl ? 'text-end' : 'text-start' }} @error('email') is-invalid @enderror"
                        placeholder="{{ __('auth.enter_registered_email') }}"
                        dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

                    @error('email')
                        <div class="invalid-feedback {{ $isRtl ? 'text-end' : 'text-start' }}">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100">

                    {{ __('auth.send_otp') }}

                </button>

            </form>

        </div>

        <div class="card-footer text-center">

            <a href="{{ route('loginPage') }}" class="text-decoration-none">
                @if($isRtl)
                    {{ __('auth.back_to_login') }} &rarr;
                @else
                    &larr; {{ __('auth.back_to_login') }}
                @endif
            </a>

        </div>

    </div>

</div>

@endsection