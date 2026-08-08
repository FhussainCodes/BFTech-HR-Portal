<nav class="navbar navbar-expand-lg bg-white shadow-sm hr-navbar">
@php

    $hr = \App\Models\Register::where('role', 'hr')->first();

    $unreadNotifications = $hr
        ? $hr->unreadNotifications()->latest()->get()
        : collect();

@endphp
    <div class="container-fluid">

        <h3 class="fw-bold text-primary mb-0">

            HR Dashboard

        </h3>

        <ul class="navbar-nav ms-auto align-items-center">

            <li class="nav-item dropdown me-3">

                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                    🌐 English

                </a>

                <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="#">English</a></li>

                    <li><a class="dropdown-item" href="#">Urdu</a></li>

                </ul>

            </li>

<div class="dropdown">

    <button class="btn position-relative"
            type="button"
            data-bs-toggle="dropdown">

        <i class="bi bi-bell fs-5"></i>

        @if($unreadNotifications->count() > 0)

            <span class="position-absolute top-0 start-100
                         translate-middle badge rounded-pill bg-danger">

                {{ $unreadNotifications->count() }}

            </span>

        @endif

    </button>


    <ul class="dropdown-menu dropdown-menu-end">

        <li>
            <h6 class="dropdown-header">
                Notifications
            </h6>
        </li>

        @forelse($unreadNotifications->take(5) as $notification)

            <li>

                <a class="dropdown-item"
                   href="{{ route('hr.notifications.read', $notification->id) }}">

                    {{ $notification->data['message'] }}

                    <small class="text-muted d-block">

                        {{ $notification->created_at->diffForHumans() }}

                    </small>

                </a>

            </li>

        @empty

            <li>
                <span class="dropdown-item text-muted">
                    No new notifications
                </span>
            </li>

        @endforelse


        <li>
            <hr class="dropdown-divider">
        </li>

        <li>

            <a class="dropdown-item text-center"
               href="{{ route('hr.notifications.index') }}">

                View All Notifications

            </a>

        </li>

    </ul>

</div>

            <li class="nav-item dropdown">

                                @php
    $user = \App\Models\Register::find(session('user')['id']);
@endphp

<a class="nav-link dropdown-toggle d-flex align-items-center"
    href="#"
    data-bs-toggle="dropdown">

    @if($user && $user->profile_image)
        <img src="{{ asset('storage/'.$user->profile_image) }}"
             width="35"
             height="35"
             class="rounded-circle me-2"
             style="object-fit:cover;">
    @else
        <img src="{{ asset('images/default-profile.png') }}"
             width="35"
             height="35"
             class="rounded-circle me-2">
    @endif

    {{ $user->first_name }}

</a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item" href="{{route('hr.profile.index')}}">

                            Profile

                        </a>

                    </li>

                    <li>

                        <a class="dropdown-item" href="#">

                            Settings

                        </a>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

<form action="{{ route('logoutPage') }}" method="POST">

    @csrf

    <button type="submit"
            class="dropdown-item text-danger">

        Logout

    </button>

</form>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>