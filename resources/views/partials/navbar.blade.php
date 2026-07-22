<nav class="navbar navbar-expand-lg bg-white border-bottom px-3 py-2">
    <div class="container-fluid p-0">

        <!-- Left Side -->
        <div>
            <h6 class="mb-0 fw-bold">
                Employee Dashboard
            </h6>
        </div>

        <!-- Center -->
        <div class="mx-auto">
            @if(session('attendanceStatus') == 'checkIn')
                <form action="{{ route('checkOutPage') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm px-3 fw-medium">
                        Check Out
                    </button>
                </form>
            @else
                <form action="{{ route('checkInPage') }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm px-3 fw-medium">
                        Check In
                    </button>
                </form>
            @endif
        </div>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-2">

            <!-- Notification -->
            <a href="#" class="text-dark p-1">
                <i class="bi bi-bell fs-5"></i>
            </a>

            <!-- Settings Dropdown -->
            <div class="dropdown">
                <a href="#" class="text-dark p-1 d-inline-block" data-bs-toggle="dropdown">
                    <i class="bi bi-gear fs-5"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <a class="dropdown-item small" href="#">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logoutPage') }}" method="POST">
                            @csrf
                            <button class="dropdown-item small text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>