@extends('layouts.auth')

@section('title', __('auth.reset_password_heading'))

@section('content')

<div class="card shadow">
    <div class="card-body">

        <h3 class="text-center mb-4">{{ __('auth.reset_password_heading') }}</h3>

        <form action="{{ route('ResetPassword') }}" method="POST" autocomplete="off">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label text-start d-block">{{ __('auth.new_password_label') }}</label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('auth.enter_new_password') }}"
                    autocomplete="new-password"
                >

                @error('password')
                    <div class="invalid-feedback text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label text-start d-block">{{ __('auth.confirm_password_label') }}</label>

                <input
                    type="password"
                    name="confirm_password"
                    class="form-control @error('confirm_password') is-invalid @enderror"
                    placeholder="{{ __('auth.confirm_password_placeholder') }}"
                    autocomplete="new-password"
                >

                @error('confirm_password')
                    <div class="invalid-feedback text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                {{ __('auth.reset_password_btn') }}
            </button>

        </form>

    </div>
</div>

@endsection