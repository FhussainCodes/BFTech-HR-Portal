<aside class="hr-sidebar">
    <div class="text-center mt-4">
        <img src="{{ asset('images/default-profile.png') }}" class="rounded-circle profile-image" alt="Profile">
        <h5 class="text-white mt-3 profile-name">Farrukh Hussain</h5>
        <span class="badge bg-primary profile-role">HR</span>
    </div>

    <hr class="sidebar-divider">

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('hr.dashboard.index') }}" class="nav-link {{ request()->routeIs('hr.dashboard.index') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse"
               href="#employeeMenu"
               role="button"
               aria-expanded="true">
                <span>
                    <i class="bi bi-people"></i>
                    Employees
                </span>
                <i class="bi bi-chevron-down employee-arrow"></i>
            </a>

            <div class="collapse show" id="employeeMenu">
                <ul class="nav flex-column submenu">
                    <li class="nav-item">
                        <a href="{{ route('hr.employee.index') }}" class="nav-link">
                            Employee List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hr.employee.create') }}" class="nav-link">
                            Add Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Import Employees
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span>Attendance</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-journal-text"></i>
                <span>Leave Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>