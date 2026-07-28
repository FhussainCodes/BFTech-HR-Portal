@extends('layouts.leave')

@section('content')

<div class="container-fluid p-0">

    <div class="card shadow-sm border-0 mb-3">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">{{ __('leave.leave_system') }}</h5>
        </div>

        <div class="card-body">
            <!-- Action Buttons aligned according to locale -->
            <div class="d-flex gap-2 {{ app()->getLocale() == 'ur' ? 'flex-row-reverse' : '' }}">
                <a href="{{route('leave.index.show')}}" class="btn btn-primary">
                    {{ __('leave.show_leaves') }}
                </a>
                <a href="{{route('leave.apply.create')}}" class="btn btn-outline-primary">
                    {{ __('leave.apply_leave') }}
                </a>
            </div>
        </div>
    </div>

    <!-- History Table Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">{{ __('leave.my_leave_history') }}</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            @if(app()->getLocale() == 'ur')
                                <th>{{ __('leave.apply_date') }}</th>
                                <th>{{ __('leave.status') }}</th>
                                <th>{{ __('leave.reason') }}</th>
                                <th>{{ __('leave.to_date') }}</th>
                                <th>{{ __('leave.from_date') }}</th>
                                <th>{{ __('leave.leave_type') }}</th>
                                <th>#</th>
                            @else
                                <th>#</th>
                                <th>{{ __('leave.leave_type') }}</th>
                                <th>{{ __('leave.from_date') }}</th>
                                <th>{{ __('leave.to_date') }}</th>
                                <th>{{ __('leave.reason') }}</th>
                                <th>{{ __('leave.status') }}</th>
                                <th>{{ __('leave.apply_date') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="small">
                        @forelse($leaves ?? [] as $index => $leave)
                        <tr>
                            @if(app()->getLocale() == 'ur')
                                <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">{{ $leave->status }}</span>
                                </td>
                                <td>{{ $leave->reason ?? __('leave.no_reason') }}</td>
                                <td>{{ $leave->to_date }}</td>
                                <td>{{ $leave->from_date }}</td>
                                <td>{{ $leave->leave_type }}</td>
                                <td>{{ $index + 1 }}</td>
                            @else
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $leave->leave_type }}</td>
                                <td>{{ $leave->from_date }}</td>
                                <td>{{ $leave->to_date }}</td>
                                <td>{{ $leave->reason ?? __('leave.no_reason') }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">{{ $leave->status }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('d M Y') }}</td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                {{ __('leave.no_history') }}
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