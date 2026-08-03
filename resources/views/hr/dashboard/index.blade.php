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
                        <h3 class="card-value fw-bold mb-0">120</h3>
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
                        <h3 class="card-value fw-bold mb-0">108</h3>
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
                        <h3 class="card-value fw-bold mb-0">08</h3>
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
                        <h3 class="card-value fw-bold mb-0">95%</h3>
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
                            <tr>
                                <td>Ali Raza</td>
                                <td>IT</td>
                                <td>01 Aug 2026</td>
                            </tr>
                            <tr>
                                <td>Ahmed Khan</td>
                                <td>HR</td>
                                <td>29 Jul 2026</td>
                            </tr>
                            <tr>
                                <td>Sara Malik</td>
                                <td>Accounts</td>
                                <td>28 Jul 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Leave -->
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h6 class="mb-0 fw-bold">Pending Leave</h6>
            </div>

            <div class="card-body p-0">
                <ul class="list-group list-group-flush custom-list">
                    <li class="list-group-item">Ali Raza</li>
                    <li class="list-group-item">Ahmed Khan</li>
                    <li class="list-group-item">Sara Malik</li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection