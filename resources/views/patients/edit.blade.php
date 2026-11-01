
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px;">
    <div class="mb-4">
        <h1 class="fw-bold">Edit Patient</h1>
        <p class="text-secondary">Update the patient's information below.</p>
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

        <form action="{{ route('patients.update', $patient) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Patient Number *</label>
                    <input type="text" name="patient_number"
                           class="form-control" maxlength="50"
                           value="{{ old('patient_number', $patient->patient_number) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Birth Date *</label>
                    <input type="date" name="birth_date"
                           class="form-control" max="{{ date('Y-m-d') }}"
                           value="{{ old('birth_date', $patient->birth_date->format('Y-m-d')) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">First Name *</label>
                    <input type="text" name="first_name"
                           class="form-control" maxlength="100"
                           value="{{ old('first_name', $patient->first_name) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Last Name *</label>
                    <input type="text" name="last_name"
                           class="form-control" maxlength="100"
                           value="{{ old('last_name', $patient->last_name) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sex *</label>
                    <select name="sex" class="form-select" required>
                        <option value="">Select sex</option>
                        <option value="Male" @selected(old('sex', $patient->sex) === 'Male')>Male</option>
                        <option value="Female" @selected(old('sex', $patient->sex) === 'Female')>Female</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number"
                           class="form-control" maxlength="30"
                           value="{{ old('contact_number', $patient->contact_number) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3">{{ old('address', $patient->address) }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-clinic">Update Patient</button>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
