<div class="d-flex">

    <div class="bg-light text-dark p-3 border-end d-flex flex-column" 
         style="width: 250px; min-height: 100vh;">

        <h5 class="text-center mb-4">
            HR Portal
        </h5>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="/dashboard" class="nav-link text-dark">
                    🏠 Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark">
                    👨‍💼 Employees
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark">
                    📅 Attendance
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark">
                    💰 Payroll
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark">
                    ⚙ Settings
                </a>
            </li>

        </ul>


        <!-- Logout Button -->
        <div class="mt-auto">
            <form action="/logout" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger w-100">
                    🚪 Logout
                </button>

            </form>
        </div>

    </div>

</div>