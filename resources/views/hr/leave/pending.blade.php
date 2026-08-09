@extends('layouts.hr')

@section('content')

<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    <h3 class="dashboard-title mb-4 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
        {{ Lang::has('leave.pending_leaves') ? __('leave.pending_leaves') : 'Pending Leaves' }}
    </h3>

    {{-- Search Card --}}
    <div class="card shadow-sm mb-3 border-0">
        <div class="card-body">
            <form action="{{ route('hr.leave.pending') }}" method="GET">
                <div class="row g-3">

                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.employee') ? __('leave.employee') : 'Employee' }}
                        </label>
                        <input type="text"
                               name="employee_name"
                               class="form-control @error('employee_name') is-invalid @enderror"
                               value="{{ request('employee_name') }}"
                               placeholder="{{ Lang::has('leave.search_employee') ? __('leave.search_employee') : 'Search Employee' }}">

                        @error('employee_name')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.from_date') ? __('leave.from_date') : 'From Date' }}
                        </label>
                        <input type="date"
                               name="from_date"
                               class="form-control @error('from_date') is-invalid @enderror"
                               value="{{ request('from_date') }}">

                        @error('from_date')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.to_date') ? __('leave.to_date') : 'To Date' }}
                        </label>
                        <input type="date"
                               name="to_date"
                               class="form-control @error('to_date') is-invalid @enderror"
                               value="{{ request('to_date') }}">

                        @error('to_date')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-search {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.btn_search') ? __('leave.btn_search') : 'Search' }}
                        </button>

                        <a href="{{ route('hr.leave.pending') }}" class="btn btn-secondary d-inline-flex align-items-center">
                            <i class="bi bi-arrow-clockwise {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.btn_reset') ? __('leave.btn_reset') : 'Reset' }}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- Pending Leave Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                    <thead class="table-light">
                        <tr>
                            <th>{{ Lang::has('leave.id') ? __('leave.id') : 'ID' }}</th>
                            <th>{{ Lang::has('leave.employee') ? __('leave.employee') : 'Employee' }}</th>
                            <th>{{ Lang::has('leave.leave_type') ? __('leave.leave_type') : 'Leave Type' }}</th>
                            <th>{{ Lang::has('leave.from_date') ? __('leave.from_date') : 'From Date' }}</th>
                            <th>{{ Lang::has('leave.to_date') ? __('leave.to_date') : 'To Date' }}</th>
                            <th>{{ Lang::has('leave.status') ? __('leave.status') : 'Status' }}</th>
                            <th class="action-column text-center">{{ Lang::has('leave.action') ? __('leave.action') : 'Action' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaves as $leave)
                            <tr>
                                <td>{{ $leave->id }}</td>
                                <td>{{ $leave->employee->first_name ?? '' }} {{ $leave->employee->last_name ?? '' }}</td>
                                <td>
                                    @if($leave->leave_type == 'Annual')
                                        {{ Lang::has('leave.type_annual') ? __('leave.type_annual') : 'Annual' }}
                                    @elseif($leave->leave_type == 'Medical')
                                        {{ Lang::has('leave.type_medical') ? __('leave.type_medical') : 'Medical' }}
                                    @elseif($leave->leave_type == 'Casual')
                                        {{ Lang::has('leave.type_casual') ? __('leave.type_casual') : 'Casual' }}
                                    @else
                                        {{ $leave->leave_type }}
                                    @endif
                                </td>
                                <td>{{ $leave->from_date }}</td>
                                <td>{{ $leave->to_date }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        {{ Lang::has('leave.status_pending') ? __('leave.status_pending') : 'Pending' }}
                                    </span>
                                </td>
                                <td class="action-column text-center">
                                    <div class="d-inline-flex gap-1 align-items-center">
                                        {{-- View --}}
                                        <a href="{{ route('hr.leave.show', $leave->id) }}" class="btn btn-info btn-sm text-white" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        {{-- Approve --}}
                                        <form action="{{ route('hr.leave.approve', $leave->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm" title="Approve">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>

                                        {{-- Reject --}}
                                        <form action="{{ route('hr.leave.reject', $leave->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Reject">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    {{ Lang::has('leave.no_pending_records') ? __('leave.no_pending_records') : 'No Pending Leave Requests Found' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($leaves, 'links'))
                <div class="mt-3">
                    {{ $leaves->links() }}
                </div>
            @endif

        </div>
    </div>

</div>

@endsection