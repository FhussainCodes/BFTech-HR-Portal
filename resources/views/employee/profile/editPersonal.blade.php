@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bi bi-person-lines-fill me-2"></i>
                Edit Personal Information
            </h4>

            <a href="{{ route('emp-profile-index') }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-x-circle me-1"></i>
                Close
            </a>

        </div>

        <!-- Card Body -->
        <div class="card-body">

            <form action="{{ route('profile.personal.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- First Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ old('first_name', $user->first_name) }}"
                            class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="e.g. Farrukh">

                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            value="{{ old('last_name', $user->last_name) }}"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="e.g. Hussain">

                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Age
                        </label>

                        <input
                            type="number"
                            name="age"
                            value="{{ old('age', $user->age) }}"
                            class="form-control @error('age') is-invalid @enderror"
                            placeholder="e.g. 25">

                        @error('age')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection