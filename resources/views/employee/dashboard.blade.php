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
    <div class="row g-3 mb-3">

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
                    <span class="text-muted small fw-medium d-block mb-1">
                        @if(session('attendanceStatus') == 'checkIn')
                            Check-In Time
                        @elseif(session('attendanceStatus') == 'checkOut')
                            Check-Out Time
                        @else
                            Time
                        @endif
                    </span>
                    <h5 class="mb-0 fw-bold">
                        @if(session('attendanceStatus') == 'checkIn')
                            {{ \Carbon\Carbon::parse(session('checkInTime'))->timezone('Asia/Karachi')->format('h:i A') }}
                        @elseif(session('attendanceStatus') == 'checkOut')
                            {{ \Carbon\Carbon::parse(session('checkOutTime'))->timezone('Asia/Karachi')->format('h:i A') }}
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
                        <h5 class="text-success mb-0 fw-bold">Available</h5>
                    @elseif(session('attendanceStatus') == 'checkOut')
                        <h5 class="text-danger mb-0 fw-bold">Unavailable</h5>
                    @else
                        <h5 class="text-danger mb-0 fw-bold">--:--</h5>

                    @endif
                </div>
            </div>
        </div>

    </div>

    <!-- Attendance Details Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="fw-bold mb-0">Attendance Log</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-nowrap small">
                    <thead class="table-light text-muted">
                        <tr>
                            <th class="ps-4" scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Check In Time</th>
                            <th scope="col">Check Out Time</th>
                            <th scope="col">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendanceLogs ?? [] as $log)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $log->user_name }}</td>
                                <td>{{ $log->date }}</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        {{ $log->check_in }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                        {{ $log->check_out ?? '--:--' }}
                                    </span>
                                </td>
                                <td>{{ $log->duration ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4 ps-4">
                                    No attendance logs found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection