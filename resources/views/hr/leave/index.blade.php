@extends('layouts.hr')

@section('content')

<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    {{-- Title --}}
    <h3 class="dashboard-title mb-4 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
        {{ Lang::has('leave.total_leaves') ? __('leave.total_leaves') : 'Total Leaves' }}
    </h3>

    {{-- Filter / Search Form --}}
    <div class="card shadow-sm mb-3 border-0">
        <div class="card-body">
            <form action="{{ route('hr.leave.index') }}" method="GET">
                <div class="row g-3">

                    {{-- Employee Search --}}
                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.employee') ? __('leave.employee') : 'Employee' }}
                        </label>
                        <input type="text"
                               name="employee"
                               value="{{ request('employee') }}"
                               class="form-control @error('employee') is-invalid @enderror"
                               placeholder="{{ Lang::has('leave.search_employee') ? __('leave.search_employee') : 'Search Employee' }}">
                        @error('employee')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Leave Type --}}
                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.leave_type') ? __('leave.leave_type') : 'Leave Type' }}
                        </label>
                        <select name="leave_type" class="form-select">
                            <option value="">{{ Lang::has('leave.all') ? __('leave.all') : 'All' }}</option>
                            <option value="Annual" {{ request('leave_type') == 'Annual' ? 'selected' : '' }}>
                                {{ Lang::has('leave.type_annual') ? __('leave.type_annual') : 'Annual' }}
                            </option>
                            <option value="Medical" {{ request('leave_type') == 'Medical' ? 'selected' : '' }}>
                                {{ Lang::has('leave.type_medical') ? __('leave.type_medical') : 'Medical' }}
                            </option>
                            <option value="Casual" {{ request('leave_type') == 'Casual' ? 'selected' : '' }}>
                                {{ Lang::has('leave.type_casual') ? __('leave.type_casual') : 'Casual' }}
                            </option>
                        </select>
                        @error('leave_type')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('leave.status') ? __('leave.status') : 'Status' }}
                        </label>
                        <select name="status" class="form-select">
                            <option value="">{{ Lang::has('leave.all') ? __('leave.all') : 'All' }}</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                {{ Lang::has('leave.status_pending') ? __('leave.status_pending') : 'Pending' }}
                            </option>
                            <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>
                                {{ Lang::has('leave.status_approved') ? __('leave.status_approved') : 'Approved' }}
                            </option>
                            <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>
                                {{ Lang::has('leave.status_rejected') ? __('leave.status_rejected') : 'Rejected' }}
                            </option>
                        </select>
                        @error('status')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="col-md-3 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-search {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.btn_search') ? __('leave.btn_search') : 'Search' }}
                        </button>

                        <a href="{{ route('hr.leave.index') }}" class="btn btn-secondary d-inline-flex align-items-center">
                            <i class="bi bi-arrow-clockwise {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('leave.btn_reset') ? __('leave.btn_reset') : 'Reset' }}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- Leaves Data Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                    <thead class="table-light">
                        <tr>
                            <th>{{ Lang::has('leave.id') ? __('leave.id') : 'ID' }}</th>
                            <th>{{ Lang::has('leave.employee') ? __('leave.employee') : 'Employee' }}</th>
                            <th>{{ Lang::has('leave.leave_type') ? __('leave.leave_type') : 'Leave Type' }}</th>
                            <th>{{ Lang::has('leave.from_date') ? __('leave.from_date') : 'From' }}</th>
                            <th>{{ Lang::has('leave.to_date') ? __('leave.to_date') : 'To' }}</th>
                            <th>{{ Lang::has('leave.status') ? __('leave.status') : 'Status' }}</th>
                            <th class="text-center">{{ Lang::has('leave.action') ? __('leave.action') : 'Action' }}</th>
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
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('hr.leave.show', $leave->id) }}" class="btn btn-info btn-sm text-white" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    {{ Lang::has('leave.no_records') ? __('leave.no_records') : 'No Leave Requests Found' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Links --}}
            @if(method_exists($leaves, 'links'))
                <div class="mt-3">
                    {{ $leaves->links() }}
                </div>
            @endif

        </div>
    </div>

</div>

@endsection