@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">

    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body py-3 px-4">
            <h5 class="fw-bold mb-1">
                Welcome, {{ session('user')['first_name'] }} 👋
            </h5>
            <p class="text-muted mb-0 small">
                {{ now()->format('l, d F Y') }}
            </p>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3">

        <!-- Attendance -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">Attendance</span>
                    @if(session('attendanceStatus') == 'checkIn')
                        <h5 class="text-success mb-0 fw-bold">Checked In</h5>
                    @elseif(session('attendanceStatus') == 'checkOut')
                        <h5 class="text-danger mb-0 fw-bold">Checked Out</h5>
                    @else
                        <h5 class="text-secondary mb-0 fw-bold">Not Checked In</h5>
                    @endif
                </div>
            </div>
        </div>

        <!-- Time -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">Time</span>
                    <h5 class="mb-0 fw-bold">
                        @if(session('attendanceStatus') == 'checkIn')
                            {{ \Carbon\Carbon::parse(session('checkInTime'))->format('h:i A') }}
                        @elseif(session('attendanceStatus') == 'checkOut')
                            {{ \Carbon\Carbon::parse(session('checkOutTime'))->format('h:i A') }}
                        @else
                            --:--
                        @endif
                    </h5>
                </div>
            </div>
        </div>

        <!-- Current Status -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">Current Status</span>
                    @if(session('attendanceStatus') == 'checkIn')
                        <h5 class="text-success mb-0 fw-bold">Present</h5>
                    @else
                        <h5 class="text-danger mb-0 fw-bold">Absent</h5>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection