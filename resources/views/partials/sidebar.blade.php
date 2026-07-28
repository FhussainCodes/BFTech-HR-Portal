<div class="bg-white border-end d-flex flex-column justify-content-between sidebar-container">

    <!-- Top Section -->
    <div>

        <!-- User Profile -->
        <div class="text-center py-3 px-2">
            <i class="bi bi-person-circle fs-1 text-primary"></i>

            <h6 class="mt-2 mb-0 fw-bold text-truncate">
                {{ session('user')['first_name'] ?? __('sidebar.guest') }}
            </h6>

            <small class="text-muted" style="font-size: 0.75rem;">
                {{ session('user')['designation'] ?? __('sidebar.employee') }}
            </small>
        </div>

        <hr class="my-2 text-secondary opacity-25">

        <!-- Sidebar Menu -->
        <ul class="nav flex-column px-2 gap-1 list-unstyled">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('dashboardPage') }}" 
                   class="nav-link sidebar-link text-dark rounded small py-2 d-flex align-items-center {{ request()->routeIs('dashboardPage') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span>{{ __('sidebar.dashboard') }}</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a href="{{ route('emp-profile-index') }}" 
                   class="nav-link sidebar-link text-dark rounded small py-2 d-flex align-items-center {{ request()->routeIs('emp-profile-index') ? 'active' : '' }}">
                    <i class="bi bi-person me-2"></i>
                    <span>{{ __('sidebar.profile') }}</span>
                </a>
            </li>

            <!-- Attendance -->
            <li class="nav-item">
                <a href="{{ route('attendancePage') }}" 
                   class="nav-link sidebar-link text-dark rounded small py-2 d-flex align-items-center {{ request()->routeIs('attendancePage') ? 'active' : '' }}">
                    <i class="bi bi-person-check me-2"></i>
                    <span>{{ __('sidebar.attendance') }}</span>
                </a>
            </li>

            <!-- Attendance History -->
            <li class="nav-item">
                <a href="{{ route('attendanceHistoryPage') }}" 
                   class="nav-link sidebar-link text-dark rounded small py-2 d-flex align-items-center {{ request()->routeIs('attendanceHistoryPage') ? 'active' : '' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    <span>{{ __('sidebar.attendance_history') }}</span>
                </a>
            </li>

            <!-- Leave -->
            <li class="nav-item">
                <a href="{{ route('leave.index.show') }}" 
                   class="nav-link sidebar-link text-dark rounded small py-2 d-flex align-items-center {{ request()->routeIs('leave.index.show*') || request()->routeIs('leave.apply*') ? 'active' : '' }}">
                    <i class="bi bi-calendar2-check me-2"></i>
                    <span>{{ __('sidebar.leave') }}</span>
                </a>
            </li>

        </ul>

    </div>

    <!-- Bottom Section -->
    <div class="p-2 border-top">
        <form action="{{ route('logoutPage') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center fixed">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>{{ __('sidebar.logout') }}</span>
            </button>

        </form>
    </div>

</div>

<style>
.sidebar-link {
    transition: all .25s ease-in-out;
    color: #495057;
}

.sidebar-link:hover, 
.sidebar-link.active {
    background-color: #0d6efd;
    color: #fff !important;
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
}

.sidebar-link:hover i,
.sidebar-link.active i {
    color: #fff;
}
</style>