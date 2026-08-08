@extends('layouts.hr')

@section('content')

<h3 class="dashboard-title mb-3">
    HR Dashboard
</h3>

<div class="row g-3">

    <!-- Total Employees -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">Total Employees</h6>
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
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">Active Employees</h6>
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
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">On Leave</h6>
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

    <!-- Attendance -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm border-0 dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted fw-semibold">Attendance Today</h6>
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

    <!-- Recent Employees -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">Recent Employees</h6>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>
<tbody>

@forelse($recentEmployees as $employee)

    <tr>

        <td>
            {{ $employee->first_name }}
            {{ $employee->last_name }}
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
            No employees found.
        </td>
    </tr>

@endforelse

</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Leave -->
<ul class="list-group list-group-flush custom-list">

@forelse($pendingLeaves as $leave)

    <li class="list-group-item">

        {{ $leave->employee->first_name }}
        {{ $leave->employee->last_name }}

    </li>

@empty

    <li class="list-group-item text-center">
        No Pending Leaves
    </li>

@endforelse

</ul>

</div>

@endsection