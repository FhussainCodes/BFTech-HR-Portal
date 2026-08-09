@extends('layouts.hr')

@section('content')

<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    <div class="card shadow-sm border-0">

        <div class="card-header d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
            <h4 class="mb-0">
                {{ Lang::has('attendance.edit_attendance') ? __('attendance.edit_attendance') : 'Edit Attendance' }}
            </h4>

            <a href="{{ route('hr.attendance.index') }}" class="btn btn-warning">
                <i class="bi {{ app()->getLocale() == 'ur' ? 'bi-arrow-right ms-1' : 'bi-arrow-left me-1' }}"></i>
                {{ Lang::has('attendance.back') ? __('attendance.back') : 'Back' }}
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('hr.attendance.update', $attendance->id) }}" method="POST">

                @csrf
                @method('PUT')

                {{-- Employee Name --}}
                <div class="mb-3 text-start">
                    <label class="form-label">
                        {{ Lang::has('attendance.employee_name') ? __('attendance.employee_name') : 'Employee Name' }}
                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $attendance->user_name }}"
                           readonly>
                </div>

                {{-- Attendance Date --}}
                <div class="mb-3 text-start">
                    <label class="form-label">
                        {{ Lang::has('attendance.attendance_date') ? __('attendance.attendance_date') : 'Attendance Date' }}
                    </label>

                    <input type="date"
                           class="form-control"
                           value="{{ $attendance->date }}"
                           readonly>
                </div>

                {{-- Check In --}}
                <div class="mb-3 text-start">
                    <label class="form-label">
                        {{ Lang::has('attendance.check_in') ? __('attendance.check_in') : 'Check In' }}
                    </label>

                    <input type="datetime-local"
                           name="check_in"
                           class="form-control @error('check_in') is-invalid @enderror"
                           value="{{ old('check_in', \Carbon\Carbon::parse($attendance->check_in)->format('Y-m-d\TH:i')) }}">

                    @error('check_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Check Out --}}
                <div class="mb-4 text-start">
                    <label class="form-label">
                        {{ Lang::has('attendance.check_out') ? __('attendance.check_out') : 'Check Out' }}
                    </label>

                    <input type="datetime-local"
                           name="check_out"
                           class="form-control @error('check_out') is-invalid @enderror"
                           value="{{ old('check_out', $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('Y-m-d\TH:i') : '') }}">

                    @error('check_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit & Cancel Buttons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success d-inline-flex align-items-center">
                        <i class="bi bi-check-circle {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
                        {{ Lang::has('attendance.btn_update') ? __('attendance.btn_update') : 'Update Attendance' }}
                    </button>

                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-secondary">
                        {{ Lang::has('attendance.btn_cancel') ? __('attendance.btn_cancel') : 'Cancel' }}
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection