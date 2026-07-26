@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Edit Personal Information
            </h4>

            <a href="{{ route('emp-profile-index') }}"
               class="btn btn-outline-secondary btn-sm">
                Close
            </a>

        </div>

        <div class="card-body">

            <form
                action="{{ route('profile.personal.update') }}"
                method="POST">

                @csrf
                @method('PUT')

                {{-- Form Fields yahan add honge --}}

                <button
                    type="submit"
                    class="btn btn-primary">
                    Save Changes
                </button>

            </form>

        </div>

    </div>

</div>

@endsection