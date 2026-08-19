@extends('layouts.hr')

@section('content')

<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="dashboard-title">
            {{ Lang::has('leave.leave_details') ? __('leave.leave_details') : 'Leave Details' }}
        </h3>

        <a href="{{ url()->previous() }}" class="btn btn-secondary d-inline-flex align-items-center">
            <i class="bi {{ app()->getLocale() == 'ur' ? 'bi-arrow-right ms-1' : 'bi-arrow-left me-1' }}"></i>
            {{ Lang::has('leave.back') ? __('leave.back') : 'Back' }}
        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-light">
            <h5 class="mb-0 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                {{ Lang::has('leave.emp_info') ? __('leave.emp_info') : 'Employee Leave Information' }}
            </h5>
        </div>

        <div class="card-body">

            <div class="row {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">

                {{-- Employee ID --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.employee_id') ? __('leave.employee_id') : 'Employee ID' }}
                    </label>
                    <p class="mb-0 fs-6 fw-semibold">
                        {{ $leave->employee->id ?? '-' }}
                    </p>
                </div>

                {{-- Employee Name --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.employee') ? __('leave.employee') : 'Employee Name' }}
                    </label>
                    <p class="mb-0 fs-6 fw-semibold">
                        {{ $leave->employee->first_name ?? '' }} {{ $leave->employee->last_name ?? '' }}
                    </p>
                </div>

                {{-- Leave Type --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.leave_type') ? __('leave.leave_type') : 'Leave Type' }}
                    </label>
                    <p class="mb-0 fs-6">
                        @if($leave->leave_type == 'Annual')
                            {{ Lang::has('leave.type_annual') ? __('leave.type_annual') : 'Annual' }}
                        @elseif($leave->leave_type == 'Medical')
                            {{ Lang::has('leave.type_medical') ? __('leave.type_medical') : 'Medical' }}
                        @elseif($leave->leave_type == 'Casual')
                            {{ Lang::has('leave.type_casual') ? __('leave.type_casual') : 'Casual' }}
                        @else
                            {{ $leave->leave_type }}
                        @endif
                    </p>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.status') ? __('leave.status') : 'Status' }}
                    </label>
                    <p class="mb-0" id="leaveStatus">
                        @if($leave->status == 'Pending')
                            <span class="badge bg-warning text-dark">
                                {{ Lang::has('leave.status_pending') ? __('leave.status_pending') : 'Pending' }}
                            </span>
                        @elseif($leave->status == 'Approved')
                            <span class="badge bg-success">
                                {{ Lang::has('leave.status_approved') ? __('leave.status_approved') : 'Approved' }}
                            </span>
                        @else
                            <span class="badge bg-danger">
                                {{ Lang::has('leave.status_rejected') ? __('leave.status_rejected') : 'Rejected' }}
                            </span>
                        @endif
                    </p>
                </div>

                {{-- From Date --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.from_date') ? __('leave.from_date') : 'From Date' }}
                    </label>
                    <p class="mb-0 fs-6">
                        {{ $leave->from_date }}
                    </p>
                </div>

                {{-- To Date --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.to_date') ? __('leave.to_date') : 'To Date' }}
                    </label>
                    <p class="mb-0 fs-6">
                        {{ $leave->to_date }}
                    </p>
                </div>

                {{-- Total Days --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.total_days') ? __('leave.total_days') : 'Total Days' }}
                    </label>
                    <p class="mb-0 fs-6">
                        {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }}
                        {{ Lang::has('leave.days') ? __('leave.days') : 'Days' }}
                    </p>
                </div>

                {{-- Applied On --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.applied_on') ? __('leave.applied_on') : 'Applied On' }}
                    </label>
                    <p class="mb-0 fs-6">
                        {{ $leave->created_at ? $leave->created_at->format('d M Y') : '-' }}
                    </p>
                </div>

                {{-- Reason --}}
                <div class="col-md-12 mb-3">
                    <label class="fw-bold text-muted">
                        {{ Lang::has('leave.reason') ? __('leave.reason') : 'Reason' }}
                    </label>
                    <div class="border rounded p-3 bg-light">
                        {{ $leave->reason ?? (Lang::has('leave.no_reason') ? __('leave.no_reason') : 'No Reason Provided') }}
                    </div>
                </div>

            </div>

            {{-- Action Buttons for Pending Requests --}}
            @if($leave->status == 'Pending')
                <hr>

                <div class="d-flex gap-2">
                    <form id="approveForm" action="{{ route('hr.leave.approve', $leave->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success d-inline-flex align-items-center">
                            <i class="bi bi-check-lg {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.approve') ? __('leave.approve') : 'Approve' }}
                        </button>
                    </form>

                    <form id="rejectForm"  action="{{ route('hr.leave.reject', $leave->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger d-inline-flex align-items-center">
                            <i class="bi bi-x-lg {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.reject') ? __('leave.reject') : 'Reject' }}
                        </button>
                    </form>
                </div>
            @endif

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function () {

    $('#approveForm, #rejectForm').on('submit', function (e) {

        e.preventDefault();

        const form = this;

        $.ajax({
            url: form.action,
            type: 'POST',

            headers: {
                'X-CSRF-TOKEN': $(form).find('input[name="_token"]').val(),
                'Accept': 'application/json'
            },

            success: function (data) {

                console.log(data);

                if (data.success) {

                    if (data.status === 'Approved') {

                        $('#leaveStatus').html(`
                            <span class="badge bg-success">
                                Approved
                            </span>
                        `);

                    } else if (data.status === 'Rejected') {

                        $('#leaveStatus').html(`
                            <span class="badge bg-danger">
                                Rejected
                            </span>
                        `);

                    }

                    $('#approveForm').remove();
                    $('#rejectForm').remove();

                    alert(data.message);
                }
            },

            error: function (xhr) {

                console.error(xhr.responseText);

                alert('Something went wrong.');
            }
        });

    });

});
</script>
@endsection