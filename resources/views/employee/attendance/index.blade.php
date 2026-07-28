@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">{{ __('attendance.title') }}</h5>
        </div>

        <div class="card-body">

            @if(!$todayAttendance)

                <div class="alert alert-warning">
                    {{ __('attendance.not_checked_in') }}
                </div>

                <form action="{{ route('checkInPage') }}" method="POST">
                    @csrf
                    <button class="btn btn-success">
                        <i class="bi bi-box-arrow-in-right me-1"></i> {{ __('attendance.check_in') }}
                    </button>
                </form>

            @elseif(!$todayAttendance->check_out)

                <div class="mb-3">

                    <p class="mb-2">
                        <strong>{{ __('attendance.name') }}:</strong>
                        <span>{{ $todayAttendance->user_name }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.date') }}:</strong>
                        <span>{{ \Carbon\Carbon::parse($todayAttendance->date)->format('d M Y') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.check_in_time') }}:</strong>
                        <span>{{ \Carbon\Carbon::parse($todayAttendance->check_in)->format('h:i:s A') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.check_out_time') }}:</strong>
                        <span class="text-warning fw-bold">{{ __('attendance.pending') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.duration') }}:</strong>
                        <span class="text-info fw-bold">{{ __('attendance.in_progress') }}</span>
                    </p>

                </div>

                <form action="{{ route('checkOutPage') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">
                        <i class="bi bi-box-arrow-left me-1"></i> {{ __('attendance.check_out') }}
                    </button>
                </form>

            @else

                <div class="mb-3">

                    <p class="mb-2">
                        <strong>{{ __('attendance.name') }}:</strong>
                        <span>{{ $todayAttendance->user_name }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.date') }}:</strong>
                        <span>{{ \Carbon\Carbon::parse($todayAttendance->date)->format('d M Y') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.check_in_time') }}:</strong>
                        <span>{{ \Carbon\Carbon::parse($todayAttendance->check_in)->format('h:i:s A') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.check_out_time') }}:</strong>
                        <span>{{ \Carbon\Carbon::parse($todayAttendance->check_out)->format('h:i:s A') }}</span>
                    </p>

                    <p class="mb-2">
                        <strong>{{ __('attendance.duration') }}:</strong>
                        <span>{{ $todayAttendance->duration }}</span>
                    </p>

                </div>

                <button class="btn btn-secondary" disabled>
                    <i class="bi bi-check-circle me-1"></i> {{ __('attendance.shift_completed') }}
                </button>

            @endif

        </div>

    </div>

</div>

@endsection