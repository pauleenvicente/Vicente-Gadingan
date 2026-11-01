
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px;">
    <div class="mb-4">
        <h1 class="fw-bold">Register Patient</h1>
        <p class="text-secondary">Enter the patient's information below.</p>
    </div>

    <div class="content-card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Patient Number *</label>
                    <input type="text" name="patient_number"
                           class="form-control" maxlength="50"
                           value="{{ old('patient_number') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Birth Date *</label>
                    <input type="date" name="birth_date"
                           class="form-control" max="{{ date('Y-m-d') }}"
                           value="{{ old('birth_date') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">First Name *</label>
                    <input type="text" name="first_name"
                           class="form-control" maxlength="100"
                           value="{{ old('first_name') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Last Name *</label>
                    <input type="text" name="last_name"
                           class="form-control" maxlength="100"
                           value="{{ old('last_name') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sex *</label>
                    <select name="sex" class="form-select" required>
                        <option value="">Select sex</option>
                        <option value="Male" @selected(old('sex') === 'Male')>Male</option>
                        <option value="Female" @selected(old('sex') === 'Female')>Female</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number"
                           class="form-control" maxlength="30"
                           value="{{ old('contact_number') }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-clinic">Register Patient</button>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
