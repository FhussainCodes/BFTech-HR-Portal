@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <h4 class="fw-bold fs-4 ">
                Welcome,
                {{ session('user')['first_name'] }} 👋
            </h4>

            <p class="text-muted mb-0 fs-">
                {{ now()->format('l, d F Y') }}
            </p>

        </div>

    </div>

    <!-- Summary Cards -->
    <div class="row">

        <!-- Attendance -->
        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body ">

                    <h6 class="text-muted">
                        Attendance
                    </h6>

                    @if(session('attendanceStatus') == 'checkIn')

                        <h4 class="text-success">
                            Checked In
                        </h4>

                    @elseif(session('attendanceStatus') == 'checkOut')

                        <h4 class="text-danger">
                            Checked Out
                        </h4>

                    @else

                        <h4 class="text-secondary">
                            Not Checked In
                        </h4>

                    @endif

                </div>

            </div>

        </div>

        <!-- Time -->
        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Time
                    </h6>

                    @if(session('attendanceStatus') == 'checkIn')

                        <h4>

                            {{ \Carbon\Carbon::parse(session('checkInTime'))->format('h:i A') }}

                        </h4>

                    @elseif(session('attendanceStatus') == 'checkOut')

                        <h4>

                            {{ \Carbon\Carbon::parse(session('checkOutTime'))->format('h:i A') }}

                        </h4>

                    @else

                        <h4>--:--</h4>

                    @endif

                </div>

            </div>

        </div>

        <!-- Current Status -->
        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Current Status
                    </h6>

                    @if(session('attendanceStatus') == 'checkIn')

                        <h4 class="text-success">
                            Present
                        </h4>

                    @else

                        <h4 class="text-danger">
                            Absent
                        </h4>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection