<aside class="hr-sidebar d-flex flex-column">

<div class="text-center mt-4">

@php
    $user = \App\Models\Register::find(session('user')['id']);
@endphp

@if($user->profile_image)
    <img src="{{ asset('storage/'.$user->profile_image) }}"
         class="rounded-circle profile-image"
         alt="Profile">
@else
    <img src="{{ asset('images/default-profile.png') }}"
         class="rounded-circle profile-image"
         alt="Profile">
@endif

<h5 class="text-white mt-3 profile-name">
    {{ $user->first_name }} {{ $user->last_name }}
</h5>

<span class="badge bg-primary profile-role">
    {{ $user->role }}
</span>

</div>

<hr class="sidebar-divider">

{{-- Scrollable Menu --}}
<div class="flex-grow-1 overflow-auto">

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
           aria-expanded="employeeMenu"
           aria-controls="leaveMenu">

            <span>
                <i class="bi bi-people"></i>
                Employees
            </span>

            <i class="bi bi-chevron-down employee-arrow"></i>

        </a>

        <div class="collapse " id="employeeMenu">

            <ul class="nav flex-column submenu">

                <li class="nav-item">
                    <a href="{{ route('hr.employees.index') }}" class="nav-link">
                        <i class="bi bi-list-ul me-2"></i>
                        Employee List
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('hr.employees.create') }}" class="nav-link">
                        <i class="bi bi-person-plus me-2"></i>
                        Add Employee
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('hr.employee.importPage') }}" class="nav-link">
                        <i class="bi bi-file-earmark-arrow-up me-2"></i>
                        Import Employees
                    </a>
                </li>

            </ul>

        </div>

    </li>

    <li class="nav-item">
        <a href="{{ route('hr.attendance.index') }}" class="nav-link">
            <i class="bi bi-calendar-check"></i>
            <span>Attendance</span>
        </a>
    </li>

    <li class="nav-item">

        <a class="nav-link d-flex justify-content-between align-items-center"
           data-bs-toggle="collapse"
           href="#leaveMenu"
           role="button"
           aria-expanded="true"
           aria-controls="leaveMenu">

            <span>
                <i class="bi bi-journal-text"></i>
                Leave Management
            </span>

            <i class="bi bi-chevron-down leave-arrow"></i>

        </a>

        <div class="collapse " id="leaveMenu">

            <ul class="nav flex-column submenu">

                <li class="nav-item">
                    <a href="{{route('hr.leave.index')}}" class="nav-link">
                        <i class="bi bi-list-ul me-2"></i>
                        Total Leaves
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('hr.leave.pending')}}" class="nav-link">
                        <i class="bi bi-hourglass-split me-2"></i>
                        Pending Leaves
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('hr.leave.approved')}}" class="nav-link">
                        <i class="bi bi-check-circle me-2"></i>
                        Approved Leaves
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('hr.leave.rejected')}}" class="nav-link">
                        <i class="bi bi-x-circle me-2"></i>
                        Rejected Leaves
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
                class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center">

            <i class="bi bi-box-arrow-right me-2"></i>
            Logout

        </button>

    </form>

</div>

</aside>