@extends('layouts.hr')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="dashboard-title mb-0">
        Employee List
    </h2>
    <a href="{{ route('hr.employees.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>
        Add Employee
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="row mb-4">
<form action="{{ route('hr.employees.index') }}" method="GET">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control @error('search') is-invalid @enderror"
               placeholder="Search employee by Name, Id, Designation"
               value="{{ request('search') }}">


        <button class="btn btn-primary">

            <i class="bi bi-search"></i>

        </button>
        
    </div>
            @error('search')
                        <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

</form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>id</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>
                                <img 
                                src="{{ $employee->profile_image ? asset('storage/'.$employee->profile_image) : asset('images/default-profile.png') }}" 
                                width="45" 
                                height="45" 
                                class="rounded-circle" 
                                alt="Profile">
                            </td>
                            <td>
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </td>
                            <td>
                                {{ $employee->email }}
                            </td>
                                                        <td>
                                {{ $employee->age }}
                            </td>
                            <td>
                                {{ $employee->designation }}
                            </td>

                            <td>
                                <span class="badge bg-success">
                                    Active
                                </span>
                            </td>
                            <td>
            <div class="d-flex gap-2">

                <a href="{{ route('hr.employees.edit', $employee->id) }}"
                class="btn btn-sm btn-warning">
                    Edit
                    <i class="bi bi-pencil-square"></i>

                </a>

                <form action="{{ route('hr.employees.destroy', $employee->id) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this employee?')">
                            Delete
                        <i class="bi bi-trash"></i>

                    </button>

                </form>

            </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No Employees Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">
                Showing {{ $employees->firstItem() ?? 0 }} to {{ $employees->lastItem() ?? 0 }} of {{ $employees->total() }} entries
            </small>
            <nav>
                <div class="d-flex justify-content-end mt-3">
                    {{ $employees->links('pagination::bootstrap-5') }}
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection