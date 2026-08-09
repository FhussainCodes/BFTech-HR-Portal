<nav class="navbar navbar-expand-lg bg-white shadow-sm hr-navbar">
@php
    $hr = \App\Models\Register::where('role', 'hr')->first();
    $unreadNotifications = $hr
        ? $hr->unreadNotifications()->latest()->get()
        : collect();
@endphp
    <div class="container-fluid d-flex align-items-center justify-content-between {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">

        <!-- Title -->
        <div>
            <h3 class="fw-bold text-primary mb-0">
                {{ Lang::has('navbar.hr_dashboard') ? __('navbar.hr_dashboard') : 'HR Dashboard' }}
            </h3>
        </div>

        <!-- Controls (Language Switcher, Notifications, Profile Dropdown) -->
        <ul class="navbar-nav ms-auto align-items-center d-flex flex-row gap-2 gap-md-3 mb-0 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">

            <!-- Language Switcher Dropdown -->
            <li class="nav-item dropdown">
                <button class="btn btn-sm btn-light border dropdown-toggle d-flex align-items-center gap-1" 
                        type="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                    <i class="bi bi-globe fs-6"></i>
                    <span class="small fw-semibold">
                        {{ app()->getLocale() == 'ur' ? 'اردو' : 'English' }}
                    </span>
                </button>
                <ul class="dropdown-menu {{ app()->getLocale() == 'ur' ? 'dropdown-menu-start' : 'dropdown-menu-end' }} shadow-sm">
                    <li>
                        <a class="dropdown-item small d-flex align-items-center justify-content-between {{ app()->getLocale() == 'en' ? 'active fw-bold' : '' }}" 
                           href="{{ route('change.lang', 'en') }}">
                            <span>🇬🇧 English</span>
                            @if(app()->getLocale() == 'en') <i class="bi bi-check2"></i> @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small d-flex align-items-center justify-content-between {{ app()->getLocale() == 'ur' ? 'active fw-bold' : '' }}" 
                           href="{{ route('change.lang', 'ur') }}">
                            <span>🇵🇰 اردو</span>
                            @if(app()->getLocale() == 'ur') <i class="bi bi-check2"></i> @endif
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown">
                <button class="btn position-relative p-1"
                        type="button"
                        data-bs-toggle="dropdown">
                    <i class="bi bi-bell fs-5"></i>
                    @if($unreadNotifications->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $unreadNotifications->count() }}
                        </span>
                    @endif
                </button>

                <ul class="dropdown-menu {{ app()->getLocale() == 'ur' ? 'dropdown-menu-start' : 'dropdown-menu-end' }} shadow-sm">
                    <li>
                        <h6 class="dropdown-header">
                            {{ Lang::has('navbar.notifications') ? __('navbar.notifications') : 'Notifications' }}
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
                                {{ Lang::has('navbar.no_new_notifications') ? __('navbar.no_new_notifications') : 'No new notifications' }}
                            </span>
                        </li>
                    @endforelse

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item text-center"
                           href="{{ route('hr.notifications.index') }}">
                            {{ Lang::has('navbar.view_all_notifications') ? __('navbar.view_all_notifications') : 'View All Notifications' }}
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">
                @php
                    $user = \App\Models\Register::find(session('user')['id']);
                @endphp

                <a class="nav-link dropdown-toggle d-flex align-items-center p-0"
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

                    <span>{{ $user->first_name }}</span>
                </a>

                <ul class="dropdown-menu {{ app()->getLocale() == 'ur' ? 'dropdown-menu-start' : 'dropdown-menu-end' }} shadow-sm">
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