@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        Edit Other Information
    </h2>

    <a href="{{ route('hr.profile.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        Back
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('hr.profile.updateOther') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- City --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        City
                    </label>

                    <input type="text"
                           name="city"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="Please enter city"
                           value="{{ old('city', $user->city) }}">

                    @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Country --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Country
                    </label>

                    <input type="text"
                           name="country"
                           class="form-control @error('country') is-invalid @enderror"
                           placeholder="Please enter country"
                           value="{{ old('country', $user->country) }}">

                    @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-2"></i>
                Update Other Information
            </button>

        </form>

    </div>
</div>

@endsection