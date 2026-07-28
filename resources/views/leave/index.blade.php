@extends('layouts.leave')

@section('leave-content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show small text-start" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0 text-start">

    <div class="card-header bg-white py-3 text-start">
        <h5 class="mb-0 fw-bold text-start">{{ __('leave.history_heading') }}</h5>
    </div>

    <div class="card-body text-start">

        @if($leaves->count())

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-start">

                    <thead class="table-light small text-start">
                        <tr>
                            <th class="text-start">#</th>
                            <th class="text-start">{{ __('leave.leave_type') }}</th>
                            <th class="text-start">{{ __('leave.from_date') }}</th>
                            <th class="text-start">{{ __('leave.to_date') }}</th>
                            <th class="text-start">{{ __('leave.reason') }}</th>
                            <th class="text-start">{{ __('leave.status') }}</th>
                            <th class="text-start">{{ __('leave.applied_on') }}</th>
                        </tr>
                    </thead>

                    <tbody class="small text-start">
                        @foreach($leaves as $leave)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>

                                <td class="text-start">
                                    {{ __('leave.type_' . strtolower($leave->leave_type)) }}
                                </td>

                                <td class="text-start">{{ $leave->from_date }}</td>

                                <td class="text-start">{{ $leave->to_date }}</td>

                                <td class="text-start">
                                    {{ $leave->reason ?? __('leave.not_available') }}
                                </td>

                                <td class="text-start">
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

                                <td class="text-start">
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