@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">

    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body py-3 px-4">
            <h5 class="fw-bold mb-1">
                Welcome, {{ session('user')['first_name'] ?? Auth::user()->first_name ?? 'Employee' }} 👋
            </h5>
            <p class="text-muted mb-0 small">
                {{ now()->format('l, d F Y') }}
            </p>
        </div>
    </div>

    <div class="row g-3 mb-3">

        <!-- 1. Attendance Action Button Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">Attendance Action</span>

                    @if(!$todayAttendance)
                        <form action="{{ route('checkInPage') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg w-100">Check In</button>
                        </form>

                    @elseif($todayAttendance && !$todayAttendance->check_out)
                        <form action="{{ route('checkOutPage') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg w-100">Check Out</button>
                        </form>

                    @else
                        <div class="alert alert-info mb-0 text-center py-2 fw-medium">
                            Shift Complete Today 🎉
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 2. Time Card (Database Dynamic) -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">
                        @if($todayAttendance && $todayAttendance->check_out)
                            Check-Out Time
                        @elseif($todayAttendance)
                            Check-In Time
                        @else
                            Time
                        @endif
                    </span>
                    <h5 class="mb-0 fw-bold">
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

        <!-- 3. Current Status Card (Database Dynamic) -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-medium d-block mb-1">Current Status</span>
                    @if($todayAttendance && !$todayAttendance->check_out)
                        <h5 class="text-success mb-0 fw-bold">Available (Checked In)</h5>
                    @elseif($todayAttendance && $todayAttendance->check_out)
                        <h5 class="text-secondary mb-0 fw-bold">Shift Ended</h5>
                    @else
                        <h5 class="text-danger mb-0 fw-bold">Unavailable</h5>
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
                            <th scope="col">Total Duration</th> <!-- 1. New Column Header -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendanceLogs ?? [] as $log)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $log->user_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->date)->format('d M, Y') }}</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        {{ \Carbon\Carbon::parse($log->check_in)->format('h:i A') }}
                                    </span>
                                </td>
                                <td>
                                    @if($log->check_out)
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                            {{ \Carbon\Carbon::parse($log->check_out)->format('h:i A') }}
                                        </span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <!-- 2. Display Duration -->
                    <td>
    @if($log->check_out)
        <span class="fw-semibold text-dark">
            {{ $log->duration ?? '0 hrs 0 mins' }}
        </span>
    @else
        <span class="badge bg-info-subtle text-info border border-info-subtle">
            In Progress
        </span>
    @endif
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4 ps-4">
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