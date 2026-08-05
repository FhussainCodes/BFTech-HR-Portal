@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        Edit Contact Information
    </h2>

    <a href="{{ route('hr.profile.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        Back
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
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Please enter email"
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
                        Phone Number
                    </label>

                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="Please enter phone number"
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
                Update Contact Information
            </button>

        </form>

    </div>
</div>

@endsection