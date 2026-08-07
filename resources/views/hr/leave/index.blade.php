@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="dashboard-title mb-4">
        Total Leaves
    </h3>

    <div class="card shadow-sm mb-3">

        <div class="card-body">

            <form action="{{ route('hr.leave.index') }}" method="GET">

                <div class="row g-3">

                    {{-- Employee --}}
                    <div class="col-md-3">

                        <label class="form-label">
                            Employee
                        </label>

                        <input type="text"
                               name="employee"
                               value="{{ request('employee') }}"
                               class="form-control @error('employee') is-invalid @enderror"
                               placeholder="Search Employee">

                        @error('employee')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    {{-- Leave Type --}}
                    <div class="col-md-3">

                        <label class="form-label">
                            Leave Type
                        </label>

                        <select name="leave_type" class="form-select">

                            <option value="">All</option>

                            <option value="Annual"
                                {{ request('leave_type') == 'Annual' ? 'selected' : '' }}>
                                Annual
                            </option>

                            <option value="Medical"
                                {{ request('leave_type') == 'Medical' ? 'selected' : '' }}>
                                Medical
                            </option>

                            <option value="Casual"
                                {{ request('leave_type') == 'Casual' ? 'selected' : '' }}>
                                Casual
                            </option>

                        </select>

                        @error('leave_type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="col-md-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="">All</option>

                            <option value="Pending"
                                {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Approved"
                                {{ request('status') == 'Approved' ? 'selected' : '' }}>
                                Approved
                            </option>

                            <option value="Rejected"
                                {{ request('status') == 'Rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>

                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-3 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary me-2">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                        <a href="{{ route('hr.leave.index') }}"
                           class="btn btn-secondary">

                            Reset

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

                        <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>

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

                            <a href="{{ route('hr.leave.show', $leave->id) }}"
                               class="btn btn-info btn-sm">

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