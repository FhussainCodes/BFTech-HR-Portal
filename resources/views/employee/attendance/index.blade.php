@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4>Today's Attendance</h4>
        </div>

        <div class="card-body">

            @if(!$todayAttendance)

                <div class="alert alert-warning">
                    You have not checked in today.
                </div>

                <form action="{{ route('checkInPage') }}" method="POST">
                    @csrf

                    <button class="btn btn-success">
                        Check In
                    </button>
                </form>

            @elseif(!$todayAttendance->check_out)

                <div class="mb-3">

                    <p>
                        <strong>Name:</strong>
                        {{ $todayAttendance->user_name }}
                    </p>

                    <p>
                        <strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($todayAttendance->date)->format('d M Y') }}
                    </p>

                    <p>
                        <strong>Check In Time:</strong>
                        {{ \Carbon\Carbon::parse($todayAttendance->check_in)->format('h:i:s A') }}
                    </p>

                    <p>
                        <strong>Check Out Time:</strong>
                        Pending
                    </p>

                    <p>
                        <strong>Duration:</strong>
                        In Progress
                    </p>

                </div>

                <form action="{{ route('checkOutPage') }}" method="POST">
                    @csrf

                    <button class="btn btn-danger">
                        Check Out
                    </button>
                </form>

            @else

                <div class="mb-3">

                    <p>
                        <strong>Name:</strong>
                        {{ $todayAttendance->user_name }}
                    </p>

                    <p>
                        <strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($todayAttendance->date)->format('d M Y') }}
                    </p>

                    <p>
                        <strong>Check In Time:</strong>
                        {{ \Carbon\Carbon::parse($todayAttendance->check_in)->format('h:i:s A') }}
                    </p>

                    <p>
                        <strong>Check Out Time:</strong>
                        {{ \Carbon\Carbon::parse($todayAttendance->check_out)->format('h:i:s A') }}
                    </p>

                    <p>
                        <strong>Duration:</strong>
                        {{ $todayAttendance->duration }}
                    </p>

                </div>

                <button class="btn btn-secondary" disabled>
                    Shift Completed
                </button>

            @endif

        </div>

    </div>

</div>

@endsection