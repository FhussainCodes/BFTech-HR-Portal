@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bi bi-person-lines-fill me-2"></i>
                Edit Other Information
            </h4>

            <a href="{{ route('emp-profile-index') }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-x-circle me-1"></i>
                Close
            </a>

        </div>

        <!-- Card Body -->
        <div class="card-body">

            <form action="{{ route('profile.other.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- First Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city', $user->city) }}"
                            class="form-control @error('city') is-invalid @enderror"
                            placeholder="name@example.com">

                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Country
                        </label>

                        <input
                            type="text"
                            name="country"
                            value="{{ old('country', $user->country) }}"
                            class="form-control @error('country') is-invalid @enderror"
                            placeholder="e.g.03004300000 ">

                        @error('country')
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