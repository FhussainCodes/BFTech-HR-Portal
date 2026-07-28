@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">
            <h4 class="mb-0 fw-bold">{{ __('leave.leave_management') }}</h4>
        </div>

        <div class="card-body">

            <div class="d-flex gap-2 mb-4">

                <a href="{{ route('leave.index.show') }}"
                   class="btn leave-btn {{ request()->routeIs('leave.index.show') ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ __('leave.show_leaves') }}
                </a>

                <a href="{{ route('leave.apply.create') }}"
                   class="btn leave-btn {{ request()->routeIs('leave.apply.create') ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ __('leave.apply_leave') }}
                </a>

            </div>

            @yield('leave-content')

        </div>

    </div>

</div>

<style>
    .leave-btn {
        min-width: 140px;
        transition: all .25s ease-in-out;
    }

    .leave-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,.12);
    }
</style>

@endsection