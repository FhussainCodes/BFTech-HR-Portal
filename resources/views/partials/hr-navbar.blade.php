<nav class="navbar navbar-expand-lg bg-white shadow-sm hr-navbar">
@php
    $hr = \App\Models\Register::where('role', 'hr')->first();
    $unreadNotifications = $hr
        ? $hr->unreadNotifications()->latest()->get()
        : collect();
    $isUrdu = app()->getLocale() == 'ur';
    $dropdownAlign = $isUrdu ? 'dropdown-menu-start' : 'dropdown-menu-end';
@endphp
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Title -->
        <div class="navbar-brand-wrapper">
            <h3 class="fw-bold text-primary mb-0 fs-5">
                {{ Lang::has('navbar.hr_dashboard') ? __('navbar.hr_dashboard') : 'HR Dashboard' }}
            </h3>
        </div>

        <!-- Controls -->
        <ul class="navbar-nav {{ $isUrdu ? 'me-auto' : 'ms-auto' }} align-items-center d-flex flex-row gap-3 mb-0">

            <!-- Language Switcher Dropdown -->
            <li class="nav-item dropdown">
                <button class="btn btn-sm btn-light border dropdown-toggle d-flex align-items-center gap-1" 
                        type="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                    <i class="bi bi-globe fs-6"></i>
                    <span class="small fw-semibold">
                        {{ $isUrdu ? 'اردو' : 'English' }}
                    </span>
                </button>
                <ul class="dropdown-menu {{ $dropdownAlign }} shadow-sm">
                    <li>
                        <a class="dropdown-item small d-flex align-items-center justify-content-between {{ app()->getLocale() == 'en' ? 'active fw-bold' : '' }}" 
                           href="{{ route('change.lang', 'en') }}">
                            <span>🇬🇧 English</span>
                            @if(app()->getLocale() == 'en') <i class="bi bi-check2"></i> @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small d-flex align-items-center justify-content-between {{ $isUrdu ? 'active fw-bold' : '' }}" 
                           href="{{ route('change.lang', 'ur') }}">
                            <span>🇵🇰 اردو</span>
                            @if($isUrdu) <i class="bi bi-check2"></i> @endif
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown">
                <button class="btn btn-light btn-sm rounded-circle position-relative p-2 d-flex align-items-center justify-content-center"
                        type="button"
                        data-bs-toggle="dropdown" style="width: 35px; height: 35px;">
                    <i class="bi bi-bell fs-6"></i>
                    @if($unreadNotifications->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    @endif
                </button>

                <ul class="dropdown-menu {{ $dropdownAlign }} shadow-sm" style="width: 260px;">
                    <li>
                        <h6 class="dropdown-header">
                            {{ Lang::has('navbar.notifications') ? __('navbar.notifications') : 'Notifications' }}
                        </h6>
                    </li>

                    @forelse($unreadNotifications->take(5) as $notification)
                        <li>
                            <a class="dropdown-item small text-wrap"
                               href="{{ route('hr.notifications.read', $notification->id) }}">
                                {{ $notification->data['message'] }}
                                <small class="text-muted d-block mt-1">
                                    {{ $notification->created_at->diffForHumans() }}
                                </small>
                            </a>
                        </li>
                    @empty
                        <li>
                            <span class="dropdown-item text-muted small">
                                {{ Lang::has('navbar.no_new_notifications') ? __('navbar.no_new_notifications') : 'No new notifications' }}
                            </span>
                        </li>
                    @endforelse

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item text-center small text-primary fw-semibold"
                           href="{{ route('hr.notifications.index') }}">
                            {{ Lang::has('navbar.view_all_notifications') ? __('navbar.view_all_notifications') : 'View All Notifications' }}
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">
                @php
                    $user = \App\Models\Register::find(session('user')['id'] ?? null);
                @endphp

                <a class="nav-link dropdown-toggle d-flex align-items-center p-0 gap-2"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    @if($user && $user->profile_image)
                        <img src="{{ asset('storage/'.$user->profile_image) }}"
                             width="32"
                             height="32"
                             class="rounded-circle border"
                             style="object-fit:cover;">
                    @else
                        <i class="bi bi-person-circle text-primary fs-4"></i>
                    @endif

                    <span class="fw-semibold text-dark small">{{ $user->first_name ?? 'HR' }}</span>
                </a>

                <ul class="dropdown-menu {{ $dropdownAlign }} shadow-sm">
                    <li>
                        <a class="dropdown-item small" href="{{ route('hr.profile.index') }}">
                            <i class="bi bi-person me-2"></i> {{ Lang::has('navbar.profile') ? __('navbar.profile') : 'Profile' }}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <i class="bi bi-gear me-2"></i> {{ Lang::has('navbar.settings') ? __('navbar.settings') : 'Settings' }}
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logoutPage') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item small text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> {{ Lang::has('navbar.logout') ? __('navbar.logout') : 'Logout' }}
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>