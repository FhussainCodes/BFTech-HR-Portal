@extends('layouts.hr')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 flex-row text-start" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
    <h2 class="dashboard-title mb-0">
        {{ Lang::has('employee.employee_list') ? __('employee.employee_list') : 'Employee List' }}
    </h2>
    <a href="{{ route('hr.employees.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
        {{ Lang::has('employee.add_employee') ? __('employee.add_employee') : 'Add Employee' }}
    </a>
</div>

<div class="card shadow-sm border-0" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
    <div class="card-body">
        <div class="row mb-4">
            <form action="{{ route('hr.employees.index') }}" method="GET">
                <div class="input-group">
                    <input type="text"
                           name="search"
                           class="form-control @error('search') is-invalid @enderror"
                           placeholder="{{ Lang::has('employee.search_placeholder') ? __('employee.search_placeholder') : 'Search employee by Name, Id, Designation' }}"
                           value="{{ request('search') }}">

                    <button class="btn btn-primary" type="submit">
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
                        <th>{{ Lang::has('employee.th_id') ? __('employee.th_id') : 'ID' }}</th>
                        <th>{{ Lang::has('employee.th_profile') ? __('employee.th_profile') : 'Profile Image' }}</th>
                        <th>{{ Lang::has('employee.th_name') ? __('employee.th_name') : 'Name' }}</th>
                        <th>{{ Lang::has('employee.th_email') ? __('employee.th_email') : 'Email' }}</th>
                        <th>{{ Lang::has('employee.th_age') ? __('employee.th_age') : 'Age' }}</th>
                        <th>{{ Lang::has('employee.th_designation') ? __('employee.th_designation') : 'Designation' }}</th>
                        <th>{{ Lang::has('employee.th_status') ? __('employee.th_status') : 'Status' }}</th>
                        <th width="200" class="text-center">{{ Lang::has('employee.th_actions') ? __('employee.th_actions') : 'Actions' }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
<td>
    @if($employee->profile_image)
        <img src="{{ asset('storage/'.$employee->profile_image) }}" 
             width="40" 
             height="40" 
             class="rounded-circle border" 
             style="object-fit: cover;"
             alt="Profile">
    @else
        <div class="rounded-circle bg-light border d-inline-flex align-items-center justify-content-center text-primary" 
             style="width: 40px; height: 40px;">
            <i class="bi bi-person-fill fs-5"></i>
        </div>
    @endif
</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ $employee->designation }}</td>
                            <td>
                                <span class="badge bg-success">
                                    {{ Lang::has('employee.status_active') ? __('employee.status_active') : 'Active' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('hr.employees.edit', $employee->id) }}"
                                       class="btn btn-sm btn-warning d-inline-flex align-items-center">
                                        {{ Lang::has('employee.btn_edit') ? __('employee.btn_edit') : 'Edit' }}
                                        <i class="bi bi-pencil-square {{ app()->getLocale() == 'ur' ? 'me-1' : 'ms-1' }}"></i>
                                    </a>

                                    <form action="{{ route('hr.employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger d-inline-flex align-items-center"
                                                onclick="return confirm('{{ Lang::has('employee.confirm_delete') ? __('employee.confirm_delete') : 'Are you sure you want to delete this employee?' }}')">
                                            {{ Lang::has('employee.btn_delete') ? __('employee.btn_delete') : 'Delete' }}
                                            <i class="bi bi-trash {{ app()->getLocale() == 'ur' ? 'me-1' : 'ms-1' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                {{ Lang::has('employee.no_records') ? __('employee.no_records') : 'No Employees Found' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <small class="text-muted">
                @if(Lang::has('employee.showing_entries'))
                    {{ __('employee.showing_entries', [
                        'first' => $employees->firstItem() ?? 0,
                        'last' => $employees->lastItem() ?? 0,
                        'total' => $employees->total()
                    ]) }}
                @else
                    Showing {{ $employees->firstItem() ?? 0 }} to {{ $employees->lastItem() ?? 0 }} of {{ $employees->total() }} entries
                @endif
            </small>
            <nav>
                <div class="d-flex justify-content-end mt-2">
                    {{ $employees->links('pagination::bootstrap-5') }}
                </div>
            </nav>
        </div>
    </div>
</div>

@endsection