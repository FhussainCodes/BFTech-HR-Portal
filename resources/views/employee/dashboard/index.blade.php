@extends('layouts.app')

@section('content')

<div class="container-fluid px-3">

    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body py-3 px-4">
            <h5 class="fw-bold mb-1">
                {{ __('dashboard.welcome') }},
                {{ session('user')['first_name'] }} 👋
            </h5>

            <p class="text-muted mb-0 small">
                {{ now()->format('l, d F Y') }}
            </p>
        </div>
    </div>

    <!-- Stats Cards Row (Reversed for Urdu RTL) -->
    <div class="row g-3 mb-4 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">

        <!-- Status Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">
                        {{ __('dashboard.current_status') }}
                    </small>

                    @if($todayAttendance && !$todayAttendance->check_out)

                        <h5 class="text-success fw-bold mb-0">
                            {{ __('dashboard.checked_in') }}
                        </h5>

                    @elseif($todayAttendance && $todayAttendance->check_out)

                        <h5 class="text-secondary fw-bold mb-0">
                            {{ __('dashboard.checked_out') }}
                        </h5>

                    @else

                        <h5 class="text-danger fw-bold mb-0">
                            {{ __('dashboard.not_checked_in') }}
                        </h5>

                    @endif

                </div>

            </div>
        </div>

        <!-- Time Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">

                        @if($todayAttendance && $todayAttendance->check_out)

                            {{ __('dashboard.check_out_time') }}

                        @elseif($todayAttendance)

                            {{ __('dashboard.check_in_time') }}

                        @else

                            {{ __('dashboard.time') }}

                        @endif

                    </small>

                    <h5 class="fw-bold mb-0">

                        @if($todayAttendance && $todayAttendance->check_out)

                            {{ \Carbon\Carbon::parse($todayAttendance->check_out)->format('h:i A') }}

                        @elseif($todayAttendance)

                            {{ \Carbon\Carbon::parse($todayAttendance->check_in)->format('h:i A') }}

                        @else

                            --:--

                        @endif

                    </h5>

                </div>

            </div>
        </div>

        <!-- Attendance Action Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">
                        {{ __('dashboard.attendance_action') }}
                    </small>

                    @if(!$todayAttendance)

                        <form action="{{ route('checkInPage') }}" method="POST">
                            @csrf
                            <button class="btn btn-success w-100">
                                {{ __('dashboard.check_in') }}
                            </button>
                        </form>

                    @elseif(!$todayAttendance->check_out)

                        <form action="{{ route('checkOutPage') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger w-100">
                                {{ __('dashboard.check_out') }}
                            </button>
                        </form>

                    @else

                        <div class="alert alert-success text-center mb-0 py-2 small">
                            {{ __('dashboard.shift_completed') }}
                        </div>

                    @endif

                </div>

            </div>
        </div>

    </div>

</div>

@endsection