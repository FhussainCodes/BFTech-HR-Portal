@extends('layouts.hr')

@section('content')
<di class="container-fluid">
    <h3 class="dashboard-title mb-4">
        Employee Attendance
    </h3>

<div class="card shadow-sm mb-3">
    <div class="card-body">
        <form action="{{ route('hr.attendance.search') }}" method="GET">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Employee</label>
                    <input type="text"
                           name="employee_name"
                           value="{{ request('employee_name') }}"
                           class="form-control @error('employee_name') is-invalid @enderror"
                           placeholder="Search Employee by Name, Id, Designation">
                    @error('employee_name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Start Date</label>
                    <input type="date"
                           name="start_date"
                           value="{{ request('start_date') }}"
                           class="form-control @error('start_date') is-invalid @enderror">
                    @error('start_date')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">End Date</label>
                    <input type="date"
                           name="end_date"
                           value="{{ request('end_date') }}"
                           class="form-control @error('end_date') is-invalid @enderror">
                    @error('end_date')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-search"></i> Search
                    </button>

                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </a>
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
                        <th>#</th>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Duration</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendance as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->user_name }}</td>
                        <td>{{ $row->date }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($row->check_in)->format('h:i A') }}
                        </td>
                        <td>
                            {{ $row->check_out
                                ? \Carbon\Carbon::parse($row->check_out)->format('h:i A')
                                : '-' }}
                        </td>
                        <td>
                            {{ $row->duration ?? '-' }}
                        </td>
                        <td class="action-column">
                            <a href="{{ route('hr.attendance.edit',$row->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            No Attendance Found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $attendance->links() }}
        </div>
    </div>
</di
@endsection