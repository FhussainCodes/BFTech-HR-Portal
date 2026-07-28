<div class="bg-white border-end d-flex flex-column justify-content-between" style="width: 210px; min-height: 100vh;">

    <!-- Top Section -->
    <div>

        <!-- User Profile -->
        <div class="text-center py-3 px-2">
            <i class="bi bi-person-circle fs-1 text-primary"></i>

            <h6 class="mt-2 mb-0 fw-bold text-truncate">
                {{ session('user')['first_name'] }}
            </h6>

            <small class="text-muted" style="font-size: 0.75rem;">
                Employee
            </small>
        </div>

        <hr class="my-2 text-secondary opacity-25">

        <!-- Sidebar Menu -->
        <ul class="nav flex-column px-2">

            <li class="nav-item">
                <a href="{{ route('dashboardPage') }}" class="nav-link sidebar-link text-dark rounded small py-2">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('emp-profile-index') }}" class="nav-link sidebar-link text-dark rounded small py-2">
                    <i class="bi bi-person me-2"></i>
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('attendancePage') }}" class="nav-link sidebar-link text-dark rounded small py-2">
                    <i class="bi bi-person-check me-2"></i>
                    Attendance
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('attendanceHistoryPage') }}" class="nav-link sidebar-link text-dark rounded small py-2">
                    <i class="bi bi-clock-history me-2"></i>
                    Attendance History
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('leave.index.show') }}" class="nav-link sidebar-link text-dark rounded small py-2">
                    <i class="bi bi-calendar2-check me-2"></i>
                    Leave
                </a>
            </li>

        </ul>

    </div>

    <!-- Bottom Section -->
    <div class="p-2 border-top">
        <form action="{{ route('logoutPage') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </button>

        </form>
    </div>

</div>

<style>
.sidebar-link{
    transition: all .3s ease;
}

.sidebar-link:hover{
    background-color: #0d6efd;
    color: #fff !important;
    transform: translateX(6px);
    box-shadow: 0 5px 12px rgba(0,0,0,.15);
}

.sidebar-link:hover i{
    color: #fff;
}
</style>