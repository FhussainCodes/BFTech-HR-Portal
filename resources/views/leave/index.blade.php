@extends('layouts.leave')

@section('leave-content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show small" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">

    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">{{ __('leave.history_heading') }}</h5>
    </div>

    <div class="card-body">

        @if($leaves->count())

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light small">
                        <tr>
                            <th>#</th>
                            <th>{{ __('leave.leave_type') }}</th>
                            <th>{{ __('leave.from_date') }}</th>
                            <th>{{ __('leave.to_date') }}</th>
                            <th>{{ __('leave.reason') }}</th>
                            <th>{{ __('leave.status') }}</th>
                            <th>{{ __('leave.applied_on') }}</th>
                        </tr>
                    </thead>

                    <tbody class="small">
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ __('leave.type_' . strtolower($leave->leave_type)) }}
                                </td>

                                <td>{{ $leave->from_date }}</td>

                                <td>{{ $leave->to_date }}</td>

                                <td>
                                    {{ $leave->reason ?? __('leave.not_available') }}
                                </td>

                                <td>
                                    @if($leave->status == 'Pending')
                                        <span class="badge bg-warning text-dark">
                                            {{ __('leave.status_pending') }}
                                        </span>
                                    @elseif($leave->status == 'Approved')
                                        <span class="badge bg-success">
                                            {{ __('leave.status_approved') }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            {{ __('leave.status_rejected') }}
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

            <div class="alert alert-light border text-center my-3 py-4">
                <i class="bi bi-calendar-x fs-2 text-muted d-block mb-2"></i>
                <h6 class="fw-bold mb-1">
                    {{ __('leave.no_records_title') }}
                </h6>
                <small class="text-muted">
                    {{ __('leave.no_records_subtitle') }}
                </small>
            </div>

        @endif

    </div>

</div>

@endsection