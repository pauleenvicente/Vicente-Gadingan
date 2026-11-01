
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 px-lg-5">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
        <div>
            <h1 class="fw-bold mb-2">Patient Details</h1>
            <p class="text-secondary mb-0">
                Patient Number: {{ $patient->patient_number }}
            </p>
        </div>

        <a href="{{ route('patients.index') }}"
           class="btn btn-outline-success mt-3 mt-md-0">
            Back to List
        </a>
    </div>

    <div class="content-card">

        <h4 class="fw-bold mb-4">Personal Information</h4>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="text-secondary mb-1">Patient Number</div>
                <div class="fw-semibold">{{ $patient->patient_number }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Full Name</div>
                <div class="fw-semibold">
                    {{ $patient->first_name }} {{ $patient->last_name }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Date of Birth</div>
                <div>{{ $patient->birth_date->format('F d, Y') }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Sex</div>
                <div>{{ $patient->sex }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Contact Number</div>
                <div>{{ $patient->contact_number ?: 'Not provided' }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Address</div>
                <div>{{ $patient->address ?: 'Not provided' }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Date Registered</div>
                <div>{{ $patient->created_at->format('F d, Y h:i A') }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-secondary mb-1">Last Updated</div>
                <div>{{ $patient->updated_at->format('F d, Y h:i A') }}</div>
            </div>

        </div>

        <hr class="my-4">

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('patients.edit', $patient) }}"
               class="btn btn-clinic">
                Edit Patient
            </a>

            <form action="{{ route('patients.destroy', $patient) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this patient?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-danger">
                    Delete Patient
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
