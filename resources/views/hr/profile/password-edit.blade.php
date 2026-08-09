@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        {{ __('profile.change_password_title') }}
    </h2>

    <a href="{{ route('hr.profile.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        {{ __('profile.back') }}
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('hr.profile.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- New Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ __('profile.new_password') }}
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('profile.enter_new_password') }}">

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ __('profile.confirm_password') }}
                    </label>

                    <input type="password"
                           name="confirm_password"
                           class="form-control @error('confirm_password') is-invalid @enderror"
                           placeholder="{{ __('profile.enter_confirm_password') }}">

                    @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-2"></i>
                {{ __('profile.update_password_button') }}
            </button>

        </form>

    </div>
</div>

@endsection