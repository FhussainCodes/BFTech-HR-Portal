@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">{{ __('profile.my_profile') }}</h3>

    <!-- Profile Image Card -->
    <div class="card shadow-sm mb-3">
        <div class="card-body text-center">

            @if($user->profile_image)
                <img
                    src="{{ asset('storage/'.$user->profile_image) }}"
                    class="rounded-circle mb-3"
                    width="150"
                    height="150"
                    style="object-fit:cover;"
                >
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

                <!-- Custom Localized File Input -->
                <div class="mb-3">
                    <div class="input-group {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                        <label class="btn btn-outline-secondary" for="profile_image_input">
                            {{ __('profile.choose_file') }}
                        </label>
                        <span class="form-control text-muted d-flex align-items-center" id="file-name-display">
                            {{ __('profile.no_file') }}
                        </span>
                        <input 
                            type="file" 
                            name="profile_image" 
                            id="profile_image_input" 
                            class="d-none" 
                            onchange="document.getElementById('file-name-display').innerText = this.files[0] ? this.files[0].name : '{{ __('profile.no_file') }}'"
                        >
                    </div>
                </div>

                @error('profile_image')
                <div class="text-danger mb-2">{{ $message }}</div>
                @enderror

                <button class="btn btn-primary">
                    {{ __('profile.upload_image') }}
                </button>
            </form>

        </div>
    </div>

    <!-- Personal Information -->
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">
            <strong>{{ __('profile.personal_info') }}</strong>
            <a href="{{route('profile.personal.edit')}}" class="btn btn-sm btn-warning">{{ __('profile.edit') }}</a>
        </div>
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>
            <p class="mb-1"><strong>{{ __('profile.first_name') }}:</strong> {{ $user->first_name }}</p>
            <p class="mb-1"><strong>{{ __('profile.last_name') }}:</strong> {{ $user->last_name }}</p>
            <p class="mb-0"><strong>{{ __('profile.age') }}:</strong> {{ $user->age }}</p>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">
            <strong>{{ __('profile.contact_info') }}</strong>
            <a href="{{route('profile.contact.edit')}}" class="btn btn-sm btn-warning">{{ __('profile.edit') }}</a>
        </div>
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>
            <p class="mb-1"><strong>{{ __('profile.email') }}:</strong> {{ $user->email }}</p>
            <p class="mb-0"><strong>{{ __('profile.phone') }}:</strong> {{ $user->phone_number }}</p>
        </div>
    </div>

    <!-- Designation Information -->
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">
            <strong>{{ __('profile.designation') }}</strong>
            <a href="{{route('profile.designation.edit')}}" class="btn btn-sm btn-warning">{{ __('profile.edit') }}</a>
        </div>
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>
            <p class="mb-0"><strong>{{ __('profile.designation') }}:</strong> {{ $user->designation }}</p>
        </div>
    </div>

    <!-- Other Information -->
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }} justify-content-between align-items-center">
            <strong>{{ __('profile.other_info') }}</strong>
            <a href="{{route('profile.other.edit')}}" class="btn btn-sm btn-warning">{{ __('profile.edit') }}</a>
        </div>
        <div class="card-body {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}" {{ app()->getLocale() == 'ur' ? 'dir=rtl' : '' }}>
            <p class="mb-1"><strong>{{ __('profile.city') }}:</strong> {{ $user->city }}</p>
            <p class="mb-0"><strong>{{ __('profile.country') }}:</strong> {{ $user->country }}</p>
        </div>
    </div>

</div>

@endsection