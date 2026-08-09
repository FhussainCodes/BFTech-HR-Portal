@extends('layouts.hr')

@section('content')
<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
    
    {{-- Heading shifted to Right in Urdu (text-end when RTL) --}}
    <h3 class="dashboard-title mb-4 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
        {{ Lang::has('attendance.title') ? __('attendance.title') : 'Employee Attendance' }}
    </h3>

    {{-- Filter/Search Form --}}
    <div class="card shadow-sm mb-3 border-0">
        <div class="card-body">
            <form action="{{ route('hr.attendance.search') }}" method="GET">
                <div class="row g-3">

                    <div class="col-md-4 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('attendance.employee') ? __('attendance.employee') : 'Employee' }}
                        </label>
                        <input type="text"
                               name="employee_name"
                               value="{{ request('employee_name') }}"
                               class="form-control @error('employee_name') is-invalid @enderror"
                               placeholder="{{ Lang::has('attendance.search_employee') ? __('attendance.search_employee') : 'Search Employee' }}">
                        @error('employee_name')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('attendance.start_date') ? __('attendance.start_date') : 'Start Date' }}
                        </label>
                        <input type="date"
                               name="start_date"
                               value="{{ request('start_date') }}"
                               class="form-control @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                        <label class="form-label">
                            {{ Lang::has('attendance.end_date') ? __('attendance.end_date') : 'End Date' }}
                        </label>
                        <input type="date"
                               name="end_date"
                               value="{{ request('end_date') }}"
                               class="form-control @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-search {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('attendance.btn_search') ? __('attendance.btn_search') : 'Search' }}
                        </button>

                        <a href="{{ route('hr.attendance.index') }}" class="btn btn-secondary d-inline-flex align-items-center">
                            <i class="bi bi-arrow-clockwise {{ app()->getLocale() == 'ur' ? 'ms-1' : 'me-1' }}"></i>
                            {{ Lang::has('attendance.btn_reset') ? __('attendance.btn_reset') : 'Reset' }}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- Attendance Data Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle {{ app()->getLocale() == 'ur' ? 'text-end' : 'text-start' }}">
                    <thead class="table-light">
                        <tr>
                            <th>{{ Lang::has('attendance.id') ? __('attendance.id') : 'ID' }}</th>
                            <th>{{ Lang::has('attendance.employee') ? __('attendance.employee') : 'Employee' }}</th>
                            <th>{{ Lang::has('attendance.date') ? __('attendance.date') : 'Date' }}</th>
                            <th>{{ Lang::has('attendance.check_in') ? __('attendance.check_in') : 'Check In' }}</th>
                            <th>{{ Lang::has('attendance.check_out') ? __('attendance.check_out') : 'Check Out' }}</th>
                            <th>{{ Lang::has('attendance.duration') ? __('attendance.duration') : 'Duration' }}</th>
                            <th class="action-column text-center">{{ Lang::has('attendance.action') ? __('attendance.action') : 'Action' }}</th>
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
                            <td class="action-column text-center">
                                <a href="{{ route('hr.attendance.edit', $row->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                {{ Lang::has('attendance.no_records') ? __('attendance.no_records') : 'No Attendance Found' }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $attendance->links() }}
            </div>
        </div>
    </div>

</div>
@endsection