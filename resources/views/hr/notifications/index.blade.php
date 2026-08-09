@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="dashboard-title mb-0">
            {{ __('notification.title') }}
        </h3>

        @if($notifications->count() > 0)
            <form action="{{ route('hr.notifications.readAll') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">
                    {{ __('notification.mark_all_read') }}
                </button>
            </form>
        @endif

    </div>

    <div class="card shadow-sm">

        <div class="card-body p-0">

            @forelse($notifications as $notification)

                <a href="{{ route('hr.notifications.read', $notification->id) }}"
                   class="text-decoration-none text-dark">

                    <div class="notification-item p-3 border-bottom {{ is_null($notification->read_at) ? 'bg-light' : '' }}">

                        <div class="d-flex justify-content-between">

                            <div>

                                <strong>
                                    {{ __($notification->data['message']) }}
                                </strong>

                                <div class="text-muted small mt-1">
                                    {{ $notification->created_at->locale(app()->getLocale())->diffForHumans() }}
                                </div>

                            </div>

                            @if(is_null($notification->read_at))

                                <span class="badge bg-primary">
                                    {{ __('notification.new_badge') }}
                                </span>

                            @endif

                        </div>

                    </div>

                </a>

            @empty

                <div class="text-center p-4">

                    <p class="text-muted mb-0">
                        {{ __('notification.no_notifications') }}
                    </p>

                </div>

            @endforelse

        </div>

    </div>

    <div class="mt-3">

        {{ $notifications->links() }}

    </div>

</div>

@endsection