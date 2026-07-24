@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">
        My Profile
    </h3>

    <!-- Profile Image Card -->

    <div class="card shadow-sm mb-4">

        <div class="card-body text-center">

            @if($user->profile_image)

                <img
                    src="{{ asset('storage/'.$user->profile_image) }}"
                    class="rounded-circle mb-3"
                    width="150"
                    height="150"
                    style="object-fit:cover;"
                >
                <!-- {{ $user->profile_image }} -->

            @else

                <img
                    src="{{ asset('images/default-profile.png') }}"
                    class="rounded-circle mb-3"
                    width="150"
                    height="150"
                    style="object-fit:cover;"
                >

            @endif

            <form action="{{ route('profileImage') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input
                    type="file"
                    name="profile_image"
                    class="form-control mb-3"
                >
                @error('profile_image')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <button class="btn btn-primary">
                    Upload Image
                </button>

            </form>

        </div>

    </div>

    <!-- Personal Information -->

    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between">

            <strong>
                Personal Information
            </strong>

            <a
                href="#"
                class="btn btn-sm btn-warning"
            >
                Edit
            </a>

        </div>

        <div class="card-body">

            <p><strong>First Name:</strong> {{ $user->first_name }}</p>

            <p><strong>Last Name:</strong> {{ $user->last_name }}</p>

        </div>

    </div>

    <!-- Contact Information -->

    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between">

            <strong>
                Contact Information
            </strong>

            <a
                href="#"
                class="btn btn-sm btn-warning"
            >
                Edit
            </a>

        </div>

        <div class="card-body">

            <p><strong>Email:</strong> {{ $user->email }}</p>

            <p><strong>Phone:</strong> {{ $user->phone_number }}</p>

        </div>

    </div>

    <!-- Other Information -->

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between">

            <strong>
                Other Information
            </strong>

            <a
                href="#"
                class="btn btn-sm btn-warning"
            >
                Edit
            </a>

        </div>

        <div class="card-body">

            <p><strong>Age:</strong> {{ $user->age }}</p>

            <p><strong>Designation:</strong> {{ $user->designation }}</p>

            <p><strong>City:</strong> {{ $user->city }}</p>

            <p><strong>Country:</strong> {{ $user->country }}</p>

        </div>

    </div>

</div>

@endsection