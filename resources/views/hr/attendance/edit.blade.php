@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Edit Attendance</h4>

    <a href="{{ route('hr.attendance.index') }}"
       class="btn btn-warning">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

        <div class="card-body">

            <form action="{{ route('hr.attendance.update',$attendance->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Employee Name

                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $attendance->user_name }}"
                           readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Attendance Date

                    </label>

                    <input type="date"
                           class="form-control"
                           value="{{ $attendance->date }}"
                           readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Check In

                    </label>

                    <input type="datetime-local"
                           name="check_in"
                           class="form-control"
                           value="{{ old('check_in', \Carbon\Carbon::parse($attendance->check_in)->format('Y-m-d\TH:i')) }}">

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Check Out

                    </label>

                    <input type="datetime-local"
                           name="check_out"
                           class="form-control"
                           value="{{ $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('Y-m-d\TH:i') : '' }}">

                </div>

                <button class="btn btn-success">

                    Update Attendance

                </button>

                <a href="{{ route('hr.attendance.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection