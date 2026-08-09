@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        {{ __('profile.edit_contact_title') }}
    </h2>

    <a href="{{ route('hr.profile.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        {{ __('profile.back') }}
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('hr.profile.updateContact') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ __('profile.email') }}
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="{{ __('profile.enter_email') }}"
                           value="{{ old('email', $user->email) }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Phone Number --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ __('profile.phone') }}
                    </label>

                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="{{ __('profile.enter_phone') }}"
                           value="{{ old('phone_number', $user->phone_number) }}">

                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-2"></i>
                {{ __('profile.update_contact_button') }}
            </button>

        </form>

    </div>
</div>

@endsection