@extends('layouts.hr')

@section('content')

<h3 class="dashboard-title mb-3 {{ app()->getLocale() == 'ur' ? 'text-end' : '' }}">
    {{ Lang::has('dashboard.title') ? __('dashboard.title') : 'HR Dashboard' }}
</h3>

<div class="row g-3">

    <!-- Total Employees -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">
                            {{ Lang::has('dashboard.total_employees') ? __('dashboard.total_employees') : 'Total Employees' }}
                        </h6>
                        <h3 class="card-value fw-bold mb-0">
                            {{ $totalEmployees }}
                        </h3>
                    </div>

                    <div class="dashboard-icon bg-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Employees -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">
                            {{ Lang::has('dashboard.active_employees') ? __('dashboard.active_employees') : 'Active Employees' }}
                        </h6>
                        <h3 class="card-value fw-bold mb-0">
                            {{ $activeEmployees }}
                        </h3>                    
                    </div>

                    <div class="dashboard-icon bg-success">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- On Leave -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">
                            {{ Lang::has('dashboard.on_leave') ? __('dashboard.on_leave') : 'On Leave' }}
                        </h6>
                        <h3 class="card-value fw-bold mb-0">
                            {{ $onLeave }}
                        </h3>                   
                     </div>

                    <div class="dashboard-icon bg-warning">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Today -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">
                            {{ Lang::has('dashboard.attendance_today') ? __('dashboard.attendance_today') : 'Attendance Today' }}
                        </h6>
                        <h3 class="card-value fw-bold mb-0">
                            {{ $attendancePercentage }}%
                        </h3>                  
                    </div>

                    <div class="dashboard-icon bg-danger">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row g-3 mt-1">

    <!-- Recent Employees Table -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">
                    {{ Lang::has('dashboard.recent_employees') ? __('dashboard.recent_employees') : 'Recent Employees' }}
                </h6>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 custom-table">
                        <thead>
                            <tr>
                                <th>{{ Lang::has('dashboard.name') ? __('dashboard.name') : 'Name' }}</th>
                                <th>{{ Lang::has('dashboard.department') ? __('dashboard.department') : 'Department' }}</th>
                                <th>{{ Lang::has('dashboard.joining_date') ? __('dashboard.joining_date') : 'Joining Date' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentEmployees as $employee)
                                <tr>
                                    <td>
                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                    </td>
                                    <td>
                                        {{ $employee->designation }}
                                    </td>
                                    <td>
                                        {{ $employee->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        {{ Lang::has('dashboard.no_employees') ? __('dashboard.no_employees') : 'No employees found.' }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Leave List -->
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">
                    {{ Lang::has('dashboard.pending_leaves') ? __('dashboard.pending_leaves') : 'Pending Leaves' }}
                </h6>
            </div>
            <ul class="list-group list-group-flush custom-list">
                @forelse($pendingLeaves as $leave)
                    <li class="list-group-item">
                        {{ $leave->employee->first_name }} {{ $leave->employee->last_name }}
                    </li>
                @empty
                    <li class="list-group-item text-center">
                        {{ Lang::has('dashboard.no_pending_leaves') ? __('dashboard.no_pending_leaves') : 'No Pending Leaves' }}
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

</div>

@endsection