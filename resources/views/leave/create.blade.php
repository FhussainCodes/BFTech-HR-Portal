@extends('layouts.leave')

@section('leave-content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <h5 class="mb-4 fw-bold">
            {{ __('leave.apply_leave_heading') }}
        </h5>

        <form action="{{ route('leave.apply.store') }}" method="POST">
            @csrf

            <!-- Leave Type -->
            <div class="mb-3">
                <label class="form-label fw-semibold small d-block">
                    {{ __('leave.leave_type') }} <span class="text-danger">*</span>
                </label>

                <select
                    name="leave_type"
                    class="form-select form-select-sm @error('leave_type') is-invalid @enderror"
                >
                    <option value="">{{ __('leave.select_type') }}</option>

                    <option value="Annual" {{ old('leave_type') == 'Annual' ? 'selected' : '' }}>
                        {{ __('leave.type_annual') }}
                    </option>

                    <option value="Casual" {{ old('leave_type') == 'Casual' ? 'selected' : '' }}>
                        {{ __('leave.type_casual') }}
                    </option>

                    <option value="Medical" {{ old('leave_type') == 'Medical' ? 'selected' : '' }}>
                        {{ __('leave.type_medical') }}
                    </option>
                </select>

                @error('leave_type')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- From Date -->
            <div class="mb-3">
                <label class="form-label fw-semibold small d-block">
                    {{ __('leave.from_date') }} <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="from_date"
                    value="{{ old('from_date') }}"
                    class="form-control form-control-sm @error('from_date') is-invalid @enderror"
                >

                @error('from_date')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- To Date -->
            <div class="mb-3">
                <label class="form-label fw-semibold small d-block">
                    {{ __('leave.to_date') }} <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="to_date"
                    value="{{ old('to_date') }}"
                    class="form-control form-control-sm @error('to_date') is-invalid @enderror"
                >

                @error('to_date')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Reason -->
            <div class="mb-4">
                <label class="form-label fw-semibold small d-block">
                    {{ __('leave.reason') }} <small class="text-muted">({{ __('leave.optional') }})</small>
                </label>

                <textarea
                    name="reason"
                    rows="4"
                    placeholder="{{ __('leave.reason_placeholder') }}"
                    class="form-control form-control-sm @error('reason') is-invalid @enderror"
                >{{ old('reason') }}</textarea>

                @error('reason')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="btn btn-primary btn-sm px-4 fw-semibold">
                    {{ __('leave.submit_button') }}
                </button>
            </div>

        </form>

    </div>
</div>

@endsection