@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="dashboard-title mb-4">
        Total Leaves
    </h3>

    <div class="card shadow-sm mb-3">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label">Employee</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Search Employee">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Leave Type</label>

                        <select class="form-select">

                            <option value="">All</option>
                            <option>Annual</option>
                            <option>Medical</option>
                            <option>Casual</option>

                        </select>

                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Status</label>

                        <select class="form-select">

                            <option value="">All</option>
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Rejected</option>

                        </select>

                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button class="btn btn-primary me-2">
                            <i class="bi bi-search"></i> Search
                        </button>

                        <button class="btn btn-secondary">
                            Reset
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                                    <tbody>

@forelse($leaves as $leave)

<tr>

    <td>{{ $leave->id }}</td>

    <td>{{ $leave->employee->first_name }}</td>

    <td>{{ $leave->leave_type }}</td>

    <td>{{ $leave->from_date }}</td>

    <td>{{ $leave->to_date }}</td>

    <td>

        @if($leave->status == 'Pending')

            <span class="badge bg-warning">
                Pending
            </span>

        @elseif($leave->status == 'Approved')

            <span class="badge bg-success">
                Approved
            </span>

        @else

            <span class="badge bg-danger">
                Rejected
            </span>

        @endif

    </td>

    <td>

        <a href="{{route('hr.leave.show', $leave->id)}}" class="btn btn-info btn-sm">

            <i class="bi bi-eye"></i>

        </a>

    </td>

</tr>

@empty

<tr>

    <td colspan="7" class="text-center">

        No Leave Requests Found

    </td>

</tr>

@endforelse

</tbody>

            </table>

        </div>

    </div>

</div>

@endsection