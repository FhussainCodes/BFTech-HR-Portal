@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="dashboard-title mb-0">
            Notifications
        </h3>

        <form action="{{ route('hr.notifications.readAll') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="btn btn-secondary btn-sm">

                Mark All as Read

            </button>

        </form>

    </div>


    <div class="card shadow-sm">

        <div class="card-body p-0">

            @forelse($notifications as $notification)

                <a href="{{ route('hr.notifications.read', $notification->id) }}"
                   class="text-decoration-none text-dark">

                    <div class="notification-item p-3 border-bottom
                        {{ is_null($notification->read_at) ? 'bg-light' : '' }}">

                        <div class="d-flex justify-content-between">

                            <div>

                                <strong>
                                    {{ $notification->data['message'] }}
                                </strong>

                                <div class="text-muted small mt-1">

                                    {{ $notification->created_at->diffForHumans() }}

                                </div>

                            </div>

                            @if(is_null($notification->read_at))

                                <span class="badge bg-primary">
                                    New
                                </span>

                            @endif

                        </div>

                    </div>

                </a>

            @empty

                <div class="text-center p-4">

                    <p class="text-muted mb-0">
                        No notifications found.
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