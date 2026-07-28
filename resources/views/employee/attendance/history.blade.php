@extends('layouts.app')

@section('content')

<div class="container-fluid p-0 leave-content-scroll">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">{{ __('attendance.history_title') }}</h5>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light small">
                        <tr>
                            @if(app()->getLocale() == 'ur')
                                <th>{{ __('attendance.duration') }}</th>
                                <th>{{ __('attendance.check_out') }}</th>
                                <th>{{ __('attendance.check_in') }}</th>
                                <th>{{ __('attendance.date') }}</th>
                                <th>{{ __('attendance.name') }}</th>
                            @else
                                <th>{{ __('attendance.name') }}</th>
                                <th>{{ __('attendance.date') }}</th>
                                <th>{{ __('attendance.check_in') }}</th>
                                <th>{{ __('attendance.check_out') }}</th>
                                <th>{{ __('attendance.duration') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="small">

                        @forelse($attendanceLogs as $log)

                        <tr>
                            @if(app()->getLocale() == 'ur')
                                <td>
                                    @if($log->duration)
                                        {{ $log->duration }}
                                    @else
                                        <span class="badge bg-info text-dark">
                                            {{ __('attendance.in_progress') }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($log->check_out)
                                        {{ \Carbon\Carbon::parse($log->check_out)->format('h:i:s A') }}
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            {{ __('attendance.pending') }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($log->check_in)->format('h:i:s A') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($log->date)->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $log->user_name }}
                                </td>
                            @else
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
                                        <span class="badge bg-warning text-dark">
                                            {{ __('attendance.pending') }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($log->duration)
                                        {{ $log->duration }}
                                    @else
                                        <span class="badge bg-info text-dark">
                                            {{ __('attendance.in_progress') }}
                                        </span>
                                    @endif
                                </td>
                            @endif
                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                {{ __('attendance.no_history') }}
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

    .leave-content-scroll {
        max-height: calc(100vh - 120px); /* Top navbar ke hisab se height adjust karta hai */
        overflow-y: auto;
        padding-right: 5px;
    }
</style>

@endsection