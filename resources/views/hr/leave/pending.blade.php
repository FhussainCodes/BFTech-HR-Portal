@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="dashboard-title mb-4">
        Pending Leaves
    </h3>

    {{-- Search Card --}}
    <div class="card shadow-sm mb-3">

        <div class="card-body">

            <form action="{{ route('hr.leave.pending') }}" method="GET">

                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label">Employee</label>
                        <input type="text"
                               name="employee_name"
                               class="form-control"
                               value="{{ request('employee_name') }}"
                               placeholder="Search Employee">
                        @error('employee_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">From Date</label>
                        <input type="date"
                               name="from_date"
                               class="form-control"
                               value="{{ request('from_date') }}">
                        @error('from_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">To Date</label>
                        <input type="date"
                               name="to_date"
                               class="form-control"
                               value="{{ request('to_date') }}">
                        @error('to_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-search"></i>
                            Search
                        </button>

                        <a href="{{ route('hr.leave.pending') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i>
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Pending Leave Table --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Id</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Status</th>
                        <th class="action-column">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($leaves as $leave)

                    <tr>

                        <td>{{ $leave->id }}</td>

                        <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>

                        <td>{{ $leave->leave_type }}</td>

                        <td>{{ $leave->from_date }}</td>

                        <td>{{ $leave->to_date }}</td>

                        <td>

                            <span class="badge bg-warning">
                                Pending
                            </span>

                        </td>

                        <td class="action-column">

                            <a href="{{route('hr.leave.show',$leave->id)}}"
                               class="btn btn-info btn-sm">

                                <i class="bi bi-eye"></i>

                            </a>

    <form action="{{ route('hr.leave.approve', $leave->id) }}"
          method="POST">

        @csrf

        <button type="submit"
                class="btn btn-success btn-sm">

            <i class="bi bi-check-lg"></i>

        </button>

    </form>

    {{-- Reject --}}
    <form action="{{ route('hr.leave.reject', $leave->id) }}"
          method="POST">

        @csrf

        <button type="submit"
                class="btn btn-danger btn-sm">

            <i class="bi bi-x-lg"></i>

        </button>

    </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No Pending Leave Requests Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $leaves->links() }}

        </div>

    </div>

</div>

@endsection