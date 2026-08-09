@extends('layouts.hr')

@section('content')

<div class="container-fluid" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

    <h3 class="dashboard-title mb-4">
        {{ Lang::has('employee.import_employees') ? __('employee.import_employees') : 'Import Employees' }}
    </h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center">
            <i class="bi bi-check-circle {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center">
            <i class="bi bi-exclamation-circle {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">

            <strong>
                {{ Lang::has('employee.validation_error_title') ? __('employee.validation_error_title') : 'Please fix the following errors:' }}
            </strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="text-center mb-4">

                        <i class="bi bi-file-earmark-excel display-4 text-success"></i>

                        <h5 class="mt-3">
                            {{ Lang::has('employee.import_from_excel') ? __('employee.import_from_excel') : 'Import Employees from Excel' }}
                        </h5>

                        <p class="text-muted">
                            {{ Lang::has('employee.import_instruction') ? __('employee.import_instruction') : 'Upload an Excel file containing employee information.' }}
                        </p>

                    </div>

                    <form action="{{ route('hr.employee.import') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3 text-start">
                            <label class="form-label">
                                {{ Lang::has('employee.excel_file_label') ? __('employee.excel_file_label') : 'Import Employees Excel File' }}
                            </label>

                            <input type="file"
                                   name="file"
                                   class="form-control @error('file') is-invalid @enderror"
                                   accept=".xlsx,.xls">

                            @error('file')
                                <small class="text-danger mt-1 d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-upload {{ app()->getLocale() == 'ur' ? 'ms-2' : 'me-2' }}"></i>
                            {{ Lang::has('employee.btn_import') ? __('employee.btn_import') : 'Import Employees' }}
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection