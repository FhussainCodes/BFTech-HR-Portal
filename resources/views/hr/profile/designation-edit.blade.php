@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        {{ __('profile.edit_designation_title') }}
    </h2>

    <a href="{{ route('hr.profile.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        {{ __('profile.back') }}
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('hr.profile.updateDesignation') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        {{ __('profile.designation') }}
                    </label>

                    <input type="text"
                           name="designation"
                           class="form-control @error('designation') is-invalid @enderror"
                           placeholder="{{ __('profile.enter_designation') }}"
                           value="{{ old('designation', $user->designation) }}">

                    @error('designation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-2"></i>
                {{ __('profile.update_designation_button') }}
            </button>

        </form>

    </div>
</div>

@endsection