@extends('layouts.leave')

@section('leave-content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">

    <div class="card-header bg-white">
        <h5 class="mb-0">My Leave History</h5>
    </div>

    <div class="card-body">

        @if($leaves->count())

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Leave Type</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Applied On</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($leaves as $leave)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $leave->leave_type }}</td>

                                <td>{{ $leave->from_date }}</td>

                                <td>{{ $leave->to_date }}</td>

                                <td>
                                    {{ $leave->reason ?? 'N/A' }}
                                </td>

                                <td>

                                    @if($leave->status == 'Pending')

                                        <span class="badge bg-warning text-dark">
                                            {{ $leave->status }}
                                        </span>

                                    @elseif($leave->status == 'Approved')

                                        <span class="badge bg-success">
                                            {{ $leave->status }}
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            {{ $leave->status }}
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $leave->created_at->format('d M Y') }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-info text-center mb-0">

                <h6 class="mb-1">
                    No Leave Applications Found
                </h6>

                <small>
                    You haven't applied for any leave yet.
                </small>

            </div>

        @endif

    </div>

</div>

@endsection