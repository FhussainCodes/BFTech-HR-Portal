@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="dashboard-title">
            Leave Details
        </h3>

        <a href="{{ url()->previous() }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header bg-light">

            <h5 class="mb-0">

                Employee Leave Information

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Employee ID
                    </label>

                    <p class="mb-0">

                        {{ $leave->employee->id }}

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Employee Name
                    </label>

                    <p class="mb-0">

                        {{ $leave->employee->first_name }}
                        {{ $leave->employee->last_name }}

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Leave Type
                    </label>

                    <p class="mb-0">

                        {{ $leave->leave_type }}

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Status
                    </label>

                    <p class="mb-0">

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

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        From Date
                    </label>

                    <p class="mb-0">

                        {{ $leave->from_date }}

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        To Date
                    </label>

                    <p class="mb-0">

                        {{ $leave->to_date }}

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Total Days
                    </label>

                    <p class="mb-0">

                        {{
                            \Carbon\Carbon::parse($leave->from_date)
                            ->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1
                        }}
                        Days

                    </p>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">
                        Applied On
                    </label>

                    <p class="mb-0">

                        {{ $leave->created_at->format('d M Y') }}

                    </p>

                </div>

                <div class="col-md-12 mb-3">

                    <label class="fw-bold">
                        Reason
                    </label>

                    <div class="border rounded p-3 bg-light">

                        {{ $leave->reason ?? 'No Reason Provided' }}

                    </div>

                </div>

            </div>

            @if($leave->status == 'Pending')

            <hr>

            <div class="d-flex gap-2">

<form action="{{ route('hr.leave.approve', $leave->id) }}"
      method="POST">

    @csrf

    <button class="btn btn-success">

        <i class="bi bi-check-lg"></i>

        Approve

    </button>

</form>

<form action="{{ route('hr.leave.reject', $leave->id) }}"
      method="POST">

    @csrf

    <button class="btn btn-danger">

        <i class="bi bi-x-lg"></i>

        Reject

    </button>

</form>

            </div>

            @endif

        </div>

    </div>

</div>

@endsection