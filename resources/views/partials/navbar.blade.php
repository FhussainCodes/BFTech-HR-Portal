<nav class="navbar navbar-expand-lg bg-white border-bottom px-3 py-2">
    <div class="container-fluid p-0 d-flex align-items-center justify-content-between {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">

        <!-- Title -->
        <div>
            <h6 class="mb-0 fw-bold">
                {{ __('navbar.employee_dashboard') }}
            </h6>
        </div>

        <!-- Controls (Check-in/out, Language, Bell, Settings) -->
        <div class="d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">

            <!-- Check In / Check Out Buttons -->
            <div class="me-2">
                @if(!$todayAttendance)
                    <form action="{{ route('checkInPage') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success fw-semibold d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>{{ Lang::has('navbar.check_in') ? __('navbar.check_in') : 'چیک ان' }}</span>
                        </button>
                    </form>
                @elseif(!$todayAttendance->check_out)
                    <form action="{{ route('checkOutPage') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger fw-semibold d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>{{ Lang::has('navbar.check_out') ? __('navbar.check_out') : 'چیک آؤٹ' }}</span>
                        </button>
                    </form>
                @else
                    <span class="badge bg-secondary px-2 py-2 fw-semibold">
                        <i class="bi bi-check-circle me-1"></i> {{ Lang::has('navbar.shift_completed') ? __('navbar.shift_completed') : 'شفٹ مکمل' }}
                    </span>
                @endif
            </div>

            <!-- Language Switcher Dropdown -->
            <div class="dropdown me-1">
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
            </div>

            <!-- Notifications -->
            <a href="#" class="text-dark p-1">
                <i class="bi bi-bell fs-5"></i>
            </a>

            <!-- Settings / Profile Dropdown -->
            <div class="dropdown">
                <a href="#" class="text-dark p-1 d-inline-block" data-bs-toggle="dropdown">
                    <i class="bi bi-gear fs-5"></i>
                </a>

                <ul class="dropdown-menu {{ app()->getLocale() == 'ur' ? 'dropdown-menu-start' : 'dropdown-menu-end' }} shadow-sm">
                    <li>
                        <a class="dropdown-item small" href="{{ route('emp-profile-index') }}">
                            <i class="bi bi-person me-2"></i> {{ __('navbar.profile') }}
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logoutPage') }}" method="POST">
                            @csrf
                            <button class="dropdown-item small text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> {{ __('navbar.logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>