<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">

    <div class="container-fluid">

        <!-- Left Side -->
        <div>
            <h5 class="mb-0 fw-bold">
                Employee Dashboard
            </h5>
        </div>

        <!-- Center -->
        <div class="mx-auto">

            @if(session('attendanceStatus') == 'checkIn')

<form action="{{ route('checkOutPage') }}" method="POST">
    @csrf

    <button class="btn btn-danger">
        Check Out
    </button>
</form>

@else

<form action="{{ route('checkInPage') }}" method="POST">
    @csrf

    <button class="btn btn-success">
        Check In
    </button>
</form>

@endif

        </div>

        <!-- Right Side -->
        <div class="d-flex align-items-center">

            <!-- Notification -->
            <a href="#" class="text-dark me-3">

                <i class="bi bi-bell fs-4"></i>

            </a>

            <!-- Settings Dropdown -->
            <div class="dropdown">

                <a href="#"
                   class="text-dark text-decoration-none"
                   data-bs-toggle="dropdown">

                    <i class="bi bi-gear fs-4"></i>

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form action="{{ route('logoutPage') }}" method="POST">

                            @csrf

                            <button class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>