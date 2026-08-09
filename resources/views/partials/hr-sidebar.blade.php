<aside class="hr-sidebar d-flex flex-column {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}">

    <!-- User Profile Header -->
    <div class="text-center mt-4">
        @php
            $user = \App\Models\Register::find(session('user')['id']);
        @endphp

        @if($user && $user->profile_image)
            <img src="{{ asset('storage/'.$user->profile_image) }}"
                 class="rounded-circle profile-image"
                 alt="Profile">
        @else
            <img src="{{ asset('images/default-profile.png') }}"
                 class="rounded-circle profile-image"
                 alt="Profile">
        @endif

        <h5 class="text-white mt-3 profile-name">
            {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}
        </h5>

        <span class="badge bg-primary profile-role">
            {{ $user->role ?? 'hr' }}
        </span>
    </div>

    <hr class="sidebar-divider">

    {{-- Scrollable Menu --}}
    <div class="flex-grow-1 overflow-auto">
        <ul class="nav flex-column">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('hr.dashboard.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('hr.dashboard.index') ? 'active' : '' }} {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>{{ Lang::has('sidebar.dashboard') ? __('sidebar.dashboard') : 'Dashboard' }}</span>
                </a>
            </li>

            <!-- Employees Dropdown -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}"
                   data-bs-toggle="collapse"
                   href="#employeeMenu"
                   role="button"
                   aria-expanded="false"
                   aria-controls="employeeMenu">

                    <span class="d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>{{ Lang::has('sidebar.employees') ? __('sidebar.employees') : 'Employees' }}</span>
                    </span>

                    <i class="bi bi-chevron-down employee-arrow"></i>
                </a>

                <div class="collapse" id="employeeMenu">
                    <ul class="nav flex-column submenu">
                        <li class="nav-item">
                            <a href="{{ route('hr.employees.index') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-list-ul"></i>
                                <span>{{ Lang::has('sidebar.employee_list') ? __('sidebar.employee_list') : 'Employee List' }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hr.employees.create') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-person-plus"></i>
                                <span>{{ Lang::has('sidebar.add_employee') ? __('sidebar.add_employee') : 'Add Employee' }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hr.employee.importPage') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-file-earmark-arrow-up"></i>
                                <span>{{ Lang::has('sidebar.import_employees') ? __('sidebar.import_employees') : 'Import Employees' }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Attendance -->
            <li class="nav-item">
                <a href="{{ route('hr.attendance.index') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>{{ Lang::has('sidebar.attendance') ? __('sidebar.attendance') : 'Attendance' }}</span>
                </a>
            </li>

            <!-- Leave Management Dropdown -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}"
                   data-bs-toggle="collapse"
                   href="#leaveMenu"
                   role="button"
                   aria-expanded="false"
                   aria-controls="leaveMenu">

                    <span class="d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                        <i class="bi bi-journal-text"></i>
                        <span>{{ Lang::has('sidebar.leave_management') ? __('sidebar.leave_management') : 'Leave Management' }}</span>
                    </span>

                    <i class="bi bi-chevron-down leave-arrow"></i>
                </a>

                <div class="collapse" id="leaveMenu">
                    <ul class="nav flex-column submenu">
                        <li class="nav-item">
                            <a href="{{ route('hr.leave.index') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-list-ul"></i>
                                <span>{{ Lang::has('sidebar.total_leaves') ? __('sidebar.total_leaves') : 'Total Leaves' }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hr.leave.pending') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-hourglass-split"></i>
                                <span>{{ Lang::has('sidebar.pending_leaves') ? __('sidebar.pending_leaves') : 'Pending Leaves' }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hr.leave.approved') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-check-circle"></i>
                                <span>{{ Lang::has('sidebar.approved_leaves') ? __('sidebar.approved_leaves') : 'Approved Leaves' }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hr.leave.rejected') }}" class="nav-link d-flex align-items-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                                <i class="bi bi-x-circle"></i>
                                <span>{{ Lang::has('sidebar.rejected_leaves') ? __('sidebar.rejected_leaves') : 'Rejected Leaves' }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

    {{-- Logout --}}
    <div class="p-3">
        <form action="{{ route('logoutPage') }}" method="POST">
            @csrf
            <button type="submit"
                    class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ Lang::has('sidebar.logout') ? __('sidebar.logout') : 'Logout' }}</span>
            </button>
        </form>
    </div>

</aside>