@extends('layouts.auth')

@section('title', __('auth.verify_otp_heading'))

@section('content')

<div class="card shadow">

    <div class="card-header text-start">
        <h4 class="mb-0">{{ __('auth.verify_otp_heading') }}</h4>
    </div>

    <div class="card-body">

        <p class="text-start">
            {{ __('auth.verify_otp_description') }}
        </p>

        <form action="{{ route('verifyotp') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label text-start d-block">
                    {{ __('auth.enter_otp_label') }}
                </label>

                <input
                    type="text"
                    name="otp"
                    class="form-control @error('otp') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_6_digit_otp') }}"
                    value="{{ old('otp') }}"
                >

                @error('otp')
                    <div class="invalid-feedback text-start">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                {{ __('auth.verify_otp_btn') }}

            </button>

        </form>

    </div>

</div>

@endsection