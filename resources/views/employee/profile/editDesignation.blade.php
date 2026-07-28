@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <!-- Card Header -->
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">

            <h4 class="mb-0 d-flex align-items-center">
                <i class="bi bi-person-lines-fill me-2"></i>
                {{ __('profile.edit_designation_info') }}
            </h4>

            <a href="{{ route('emp-profile-index') }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-x-circle me-1"></i>
                {{ __('profile.close') }}
            </a>

        </div>

        <!-- Card Body -->
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>

            <form action="{{ route('profile.designation.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Designation -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            {{ __('profile.designation') }}
                        </label>

                        <input
                            type="text"
                            name="designation"
                            value="{{ old('designation', $user->designation) }}"
                            class="form-control @error('designation') is-invalid @enderror"
                            placeholder="{{ __('profile.placeholder_designation') }}">

                        @error('designation')
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