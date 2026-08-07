@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="dashboard-title mb-4">
        Import Employees
    </h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>
    @endif


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="text-center mb-4">

                        <i class="bi bi-file-earmark-excel display-4 text-success"></i>

                        <h5 class="mt-3">
                            Import Employees from Excel
                        </h5>

                        <p class="text-muted">
                            Upload an Excel file containing employee information.
                        </p>

                    </div>


                    <form action="{{ route('hr.employees.import') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf


                        <div class="mb-3">

                            <label for="excel_file" class="form-label">

                                Excel File

                            </label>

                            <input type="file"
                                   name="excel_file"
                                   id="excel_file"
                                   class="form-control @error('excel_file') is-invalid @enderror"
                                   accept=".xlsx,.xls,.csv"
                                   required>

                            @error('excel_file')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="alert alert-info">

                            <div class="d-flex">

                                <i class="bi bi-info-circle me-2"></i>

                                <div>

                                    <strong>Excel file format:</strong>

                                    <p class="mb-1 mt-2">
                                        Your Excel file should contain the following columns:
                                    </p>

                                    <code>
                                        first_name, last_name, email, age,
                                        designation, phone_number, city,
                                        country, role
                                    </code>

                                </div>

                            </div>

                        </div>


                        <div class="d-flex justify-content-between">

                            <a href="{{ route('hr.employees.index') }}"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left me-1"></i>

                                Back

                            </a>


                            <button type="submit"
                                    class="btn btn-success">

                                <i class="bi bi-upload me-1"></i>

                                Import Employees

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection