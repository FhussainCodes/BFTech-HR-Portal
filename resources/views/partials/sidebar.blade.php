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
                <a href="{{ route('dashboardPage') }}" class="nav-link text-dark rounded small active py-2">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
        </ul>
    </div>

    <!-- Bottom Section -->
    <div class="p-2 border-top">
        <form action="{{ route('logoutPage') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </div>

</div>