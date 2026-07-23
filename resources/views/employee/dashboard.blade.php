@extends('layouts.app')

@section('content')

<div class="container-fluid px-3">

    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body py-3 px-4">
            <h5 class="fw-bold mb-1">
                Welcome,
                {{ session('user')['first_name'] }} 👋
            </h5>

            <p class="text-muted mb-0 small">
                {{ now()->format('l, d F Y') }}
            </p>
        </div>
    </div>

    <div class="row g-3 mb-4">

        <!-- Attendance Action -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">
                        Attendance Action
                    </small>

                    @if(!$todayAttendance)

                        <form action="{{ route('checkInPage') }}" method="POST">
                            @csrf
                            <button class="btn btn-success w-100">
                                Check In
                            </button>
                        </form>

                    @elseif(!$todayAttendance->check_out)

                        <form action="{{ route('checkOutPage') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger w-100">
                                Check Out
                            </button>
                        </form>

                    @else

                        <div class="alert alert-success text-center mb-0">
                            Shift Completed ✅
                        </div>

                    @endif

                </div>

            </div>
        </div>

        <!-- Time -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">

                        @if($todayAttendance && $todayAttendance->check_out)

                            Check Out Time

                        @elseif($todayAttendance)

                            Check In Time

                        @else

                            Time

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

        <!-- Status -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <small class="text-muted d-block mb-2">
                        Current Status
                    </small>

                    @if($todayAttendance && !$todayAttendance->check_out)

                        <h5 class="text-success fw-bold">
                            Checked In
                        </h5>

                    @elseif($todayAttendance && $todayAttendance->check_out)

                        <h5 class="text-secondary fw-bold">
                            Checked Out
                        </h5>

                    @else

                        <h5 class="text-danger fw-bold">
                            Not Checked In
                        </h5>

                    @endif

                </div>

            </div>
        </div>

    </div>

    <!-- Attendance History -->

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Attendance History
            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>Name</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Duration</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($attendanceLogs as $log)

                        <tr>

                            <td>{{ $log->user_name }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($log->date)->format('d M Y') }}
                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($log->check_in)->format('h:i A') }}

                            </td>

                            <td>

                                @if($log->check_out)

                                    {{ \Carbon\Carbon::parse($log->check_out)->format('h:i A') }}

                                @else

                                    <span class="text-warning">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($log->duration)

                                    {{ $log->duration }}

                                @else

                                    <span class="text-info">
                                        In Progress
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                No Attendance Record Found

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