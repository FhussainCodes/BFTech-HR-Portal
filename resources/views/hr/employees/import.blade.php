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

                    <form action="{{ route('hr.employee.import') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">
            Import Employees Excel File
        </label>

        <input type="file"
               name="file"
               class="form-control"
               accept=".xlsx,.xls">

        @error('file')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-upload"></i>
        Import Employees
    </button>

</form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection