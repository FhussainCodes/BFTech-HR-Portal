@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">My Profile</h3>

    {{-- Profile Card --}}
    <div class="card shadow-sm mb-3">

        <div class="card-body text-center">

            @if($user->profile_image)

                <img src="{{ asset('storage/'.$user->profile_image) }}"
                     class="rounded-circle mb-3"
                     width="150"
                     height="150"
                     style="object-fit:cover;">

            @else

                <img src="{{ asset('images/default-profile.png') }}"
                     class="rounded-circle mb-3"
                     width="150"
                     height="150"
                     style="object-fit:cover;">

            @endif

            <h4 class="mb-1">
                {{ $user->first_name }} {{ $user->last_name }}
            </h4>

            <p class="text-muted mb-0">
                {{ ucfirst($user->role) }}
            </p>

        </div>

    </div>

    {{-- Personal Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Personal Information</strong>

            <a href="{{ route('hr.profile.editPersonal') }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

        </div>

        <div class="card-body">

            <p><strong>First Name :</strong> {{ $user->first_name }}</p>

            <p><strong>Last Name :</strong> {{ $user->last_name }}</p>

            <p class="mb-0"><strong>Age :</strong> {{ $user->age }}</p>

        </div>

    </div>

    {{-- Contact Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Contact Information</strong>

            <a href="{{ route('hr.profile.editContact') }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

        </div>

        <div class="card-body">

            <p><strong>Email :</strong> {{ $user->email }}</p>

            <p class="mb-0"><strong>Phone :</strong> {{ $user->phone_number }}</p>

        </div>

    </div>

    {{-- Designation --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Designation</strong>

            <a href="{{ route('hr.profile.editDesignation') }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

        </div>

        <div class="card-body">

            <p class="mb-0">
                <strong>Designation :</strong>
                {{ $user->designation }}
            </p>

        </div>

    </div>

    {{-- Other Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Other Information</strong>

            <a href="{{ route('hr.profile.editOther') }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

        </div>

        <div class="card-body">

            <p><strong>City :</strong> {{ $user->city }}</p>

            <p class="mb-0"><strong>Country :</strong> {{ $user->country }}</p>

        </div>

    </div>

    {{-- Password --}}
    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Password</strong>

            <a href="{{ route('hr.profile.editPassword') }}"
               class="btn btn-warning btn-sm">

                Change Password

            </a>

        </div>

        <div class="card-body">

            <p class="mb-0 text-muted">

                For security reasons, your password is hidden.

            </p>

        </div>

    </div>

</div>

@endsection