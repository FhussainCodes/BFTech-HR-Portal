@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-white">
            <h4 class="mb-0">Leave Management</h4>
        </div>

        <div class="card-body">

            <div class="mb-4">

                <a href="{{route('leave.index.show')}}"
                   class="btn leave-btn {{ request()->routeIs('leave.index.show') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Show Leaves
                </a>

                <a href="{{route('leave.apply.create')}}"
                   class="btn leave-btn {{ request()->routeIs('leave.apply.create') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Apply Leave
                </a>



            </div>

            @yield('leave-content')

        </div>

    </div>

</div>

<style>
    .leave-btn{
        min-width: 140px;
        margin-right: 10px;
        transition: all .3s ease;
    }

    .leave-btn:hover{
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,.15);
    }
</style>

@endsection