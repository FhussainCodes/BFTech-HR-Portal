@extends('layouts.hr')

@section('content')
@include('partials.alerts')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="dashboard-title mb-0">

        Edit Personal Information

    </h2>

    <a href="{{ route('hr.profile.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left me-2"></i>

        Back

    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('hr.profile.updatePersonal') }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- First Name --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        First Name

                    </label>

                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name', $user->first_name) }}">

                    @error('first_name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                {{-- Last Name --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Last Name

                    </label>

                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           value="{{ old('last_name', $user->last_name) }}">

                    @error('last_name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                {{-- Age --}}

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Age

                    </label>

                    <input type="number"
                           name="age"
                           class="form-control @error('age') is-invalid @enderror"
                           value="{{ old('age', $user->age) }}">

                    @error('age')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>

            <button class="btn btn-primary">

                <i class="bi bi-check-circle me-2"></i>

                Update Information

            </button>

        </form>

    </div>

</div>

@endsection