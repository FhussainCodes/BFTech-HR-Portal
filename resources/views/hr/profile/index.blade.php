@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">{{ __('profile.my_profile') }}</h3>

{{-- Profile Card --}}
<div class="card shadow-sm mb-3">
    <div class="card-body text-center">

        {{-- Profile Image --}}
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


        {{-- Name --}}
        <h4 class="mb-1">
            {{ $user->first_name }} {{ $user->last_name }}
        </h4>


        {{-- Role --}}
        <p class="text-muted mb-3">
            {{ $user->role }}
        </p>


        {{-- Upload Image --}}
        <form action="{{ route('hr.profile.uploadImage') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <input type="file"
                       name="profile_image"
                       class="form-control @error('profile_image') is-invalid @enderror">
            </div>

            @error('profile_image')
                <div class="text-danger mb-3">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">
                {{ __('profile.upload_image') }}
            </button>

        </form>


        {{-- Actions only when image exists --}}
        @if($user->profile_image)

            <div class="mt-2 d-flex justify-content-center gap-2">

                {{-- Delete Image --}}
                <form action="{{ route('hr.profile.deleteImage') }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('{{ __('profile.delete_confirm') }}')">

                        {{ __('profile.delete_image') }}

                    </button>

                </form>


                {{-- Share on Facebook --}}
                <button type="button"
                        id="facebookShareBtn"
                        class="btn btn-primary">

                    Share on Facebook

                </button>

            </div>

        @endif

    </div>
</div>

    {{-- Personal Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>{{ __('profile.personal_information') }}</strong>

            <a href="{{ route('hr.profile.editPersonal') }}"
               class="btn btn-warning btn-sm">
                {{ __('profile.edit') }}
            </a>

        </div>

        <div class="card-body">

            <p><strong>{{ __('profile.first_name') }} :</strong> {{ $user->first_name }}</p>

            <p><strong>{{ __('profile.last_name') }} :</strong> {{ $user->last_name }}</p>

            <p class="mb-0"><strong>{{ __('profile.age') }} :</strong> {{ $user->age }}</p>

        </div>

    </div>

    {{-- Contact Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>{{ __('profile.contact_information') }}</strong>

            <a href="{{ route('hr.profile.editContact') }}"
               class="btn btn-warning btn-sm">
                {{ __('profile.edit') }}
            </a>

        </div>

        <div class="card-body">

            <p><strong>{{ __('profile.email') }} :</strong> {{ $user->email }}</p>

            <p class="mb-0"><strong>{{ __('profile.phone') }} :</strong> {{ $user->phone_number }}</p>

        </div>

    </div>

    {{-- Designation --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>{{ __('profile.designation') }}</strong>

            <a href="{{ route('hr.profile.editDesignation') }}"
               class="btn btn-warning btn-sm">
                {{ __('profile.edit') }}
            </a>

        </div>

        <div class="card-body">

            <p class="mb-0">
                <strong>{{ __('profile.designation') }} :</strong>
                {{ $user->designation }}
            </p>

        </div>

    </div>

    {{-- Other Information --}}
    <div class="card shadow-sm mb-3">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>{{ __('profile.other_information') }}</strong>

            <a href="{{ route('hr.profile.editOther') }}"
               class="btn btn-warning btn-sm">
                {{ __('profile.edit') }}
            </a>

        </div>

        <div class="card-body">

            <p><strong>{{ __('profile.city') }} :</strong> {{ $user->city }}</p>

            <p class="mb-0"><strong>{{ __('profile.country') }} :</strong> {{ $user->country }}</p>

        </div>

    </div>

    {{-- Password --}}
    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>{{ __('profile.password') }}</strong>

            <a href="{{ route('hr.profile.editPassword') }}"
               class="btn btn-warning btn-sm">
                {{ __('profile.change_password') }}
            </a>

        </div>

        <div class="card-body">

            <p class="mb-0 text-muted">
                {{ __('profile.password_hidden_notice') }}
            </p>

        </div>

    </div>

</div>

@if($user->profile_image)

<script>

document.getElementById('facebookShareBtn').addEventListener('click', function () {

    const shareUrl =
        "https://fragrance-legroom-bannister.ngrok-free.dev/profile/{{ $user->id }}";

    const facebookShareUrl =
        "https://www.facebook.com/sharer/sharer.php?u=" +
        encodeURIComponent(shareUrl);

    window.open(
        facebookShareUrl,
        'facebook-share-dialog',
        'width=800,height=600'
    );

});

</script>

@endif
@endsection