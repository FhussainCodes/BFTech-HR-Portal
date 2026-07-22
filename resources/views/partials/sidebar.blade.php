    <div class="bg-white border-end shadow-sm d-flex flex-column justify-content-between"
     style="width: 250px; min-height: 100vh;">

    <!-- Top Section -->
    <div>

        <!-- User Profile -->
        <div class="text-center py-4">

            <i class="bi bi-person-circle display-1 text-primary"></i>

            <h5 class="mt-3 mb-1 fw-bold">
                {{ session('user')['first_name'] }}
            </h5>

            <small class="text-muted">
                Employee
            </small>

        </div>

        <hr>

        <!-- Sidebar Menu -->
        <ul class="nav flex-column px-2">

            <li class="nav-item mb-2">
                <a href="{{ route('dashboardPage') }}"
                   class="nav-link text-dark rounded">

                    <i class="bi bi-speedometer2 me-2"></i>

                    Dashboard
                </a>
            </li>

        </ul>

    </div>

    <!-- Bottom Section -->
    <div class="p-3 border-top">

        <form action="{{ route('logoutPage') }}" method="POST">

            @csrf

            <button type="submit" class="btn btn-danger w-100">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>