<nav class="navbar navbar-expand-lg bg-white border-bottom px-3 py-2">
    <div class="container-fluid p-0">

        <div>
            <h6 class="mb-0 fw-bold">
                Employee Dashboard
            </h6>
        </div>

        <div class="d-flex align-items-center gap-2">

            <a href="#" class="text-dark p-1">
                <i class="bi bi-bell fs-5"></i>
            </a>

            <div class="dropdown">
                <a href="#" class="text-dark p-1 d-inline-block" data-bs-toggle="dropdown">
                    <i class="bi bi-gear fs-5"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <a class="dropdown-item small" href="{{ route('emp-profile-index') }}">
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