@extends('layouts.leave')

@section('leave-content')

<div class="card">
    <div class="card-body">

        <h5 class="mb-4">Apply Leave</h5>

        <form action="{{ route('leave.apply.store') }}" method="POST">

            @csrf

            <!-- Leave Type -->
            <div class="mb-3">
                <label class="form-label">
                    Leave Type <span class="text-danger">*</span>
                </label>

                <select
                    name="leave_type"
                    class="form-select @error('leave_type') is-invalid @enderror"
                >
                    <option value="">-- Select Leave Type --</option>

                    <option value="Annual" {{ old('leave_type') == 'Annual' ? 'selected' : '' }}>
                        Annual Leave
                    </option>

                    <option value="Casual" {{ old('leave_type') == 'Casual' ? 'selected' : '' }}>
                        Casual Leave
                    </option>

                    <option value="Medical" {{ old('leave_type') == 'Medical' ? 'selected' : '' }}>
                        Medical Leave
                    </option>

                </select>

                @error('leave_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- From Date -->
            <div class="mb-3">
                <label class="form-label">
                    From Date <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="from_date"
                    value="{{ old('from_date') }}"
                    class="form-control @error('from_date') is-invalid @enderror"
                >

                @error('from_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- To Date -->
            <div class="mb-3">
                <label class="form-label">
                    To Date <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="to_date"
                    value="{{ old('to_date') }}"
                    class="form-control @error('to_date') is-invalid @enderror"
                >

                @error('to_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Reason -->
            <div class="mb-3">
                <label class="form-label">
                    Reason <small class="text-muted">(Optional)</small>
                </label>

                <textarea
                    name="reason"
                    rows="4"
                    class="form-control @error('reason') is-invalid @enderror"
                >
                {{ old('reason') }}
                </textarea>

                @error('reason')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
                Apply Leave
            </button>

        </form>

    </div>
</div>

@endsection