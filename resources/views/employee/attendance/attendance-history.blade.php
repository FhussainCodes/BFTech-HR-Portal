@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">

            <h4 class="mb-0">
                Attendance History
            </h4>

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

                            <td>

                                {{ $log->user_name }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($log->date)->format('d M Y') }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($log->check_in)->format('h:i:s A') }}

                            </td>

                            <td>

                                @if($log->check_out)

                                    {{ \Carbon\Carbon::parse($log->check_out)->format('h:i:s A') }}

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

                                No Attendance History Found

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