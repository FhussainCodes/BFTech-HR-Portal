@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <!-- Card Header -->
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bi bi-person-lines-fill me-2"></i>
                {{ __('profile.edit_contact_info') }}
            </h4>

            <a href="{{ route('emp-profile-index') }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-x-circle me-1"></i>
                {{ __('profile.close') }}
            </a>

        </div>

        <!-- Card Body -->
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>

            <form action="{{ route('profile.contact.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            {{ __('profile.email') }}
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('profile.placeholder_email') }}">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            {{ __('profile.phone_number') }}
                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            value="{{ old('phone_number', $user->phone_number) }}"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="{{ __('profile.placeholder_phone') }}">

                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="{{ app()->getLocale() == 'ur' ? 'text-start' : 'text-end' }}">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>

                        {{ __('profile.save_changes') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection