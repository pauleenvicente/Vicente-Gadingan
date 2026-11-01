@extends('layouts.app')

@section('content')
<div class="container-fluid px-lg-4">

    <div class="mb-4">
        <h1 class="fw-bold">Patient Records</h1>
        <p class="text-secondary">Manage registered clinic patients</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="total-card mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                
            </div>
            <div>
                <div class="text-secondary">Total Registered Patients</div>
                <div class="fs-2 fw-bold">{{ $totalPatients }}</div>
            </div>
        </div>
    </div>

    <div class="content-card">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <h3 class="fw-bold mb-0">Patient List</h3>

            <form action="{{ route('patients.index') }}" method="GET" class="d-flex gap-2">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search patient number or name..."
                    value="{{ $search }}"
                >
                <button type="submit" class="btn btn-clinic">Search</button>
                @if ($search)
                    <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Patient Number</th>
                        <th>Full Name</th>
                        <th>Birth Date</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        
                    <tr>
                        <td>{{ $patient->patient_number }}</td>
                        <td class="fw-semibold">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                        <td>{{ $patient->birth_date->format('M d, Y') }}</td>
                        <td>{{ $patient->sex }}</td>
                        <td>{{ $patient->address ?: '—' }}</td>
                        <td>{{ $patient->contact_number ?: '—' }}</td>
                    <td>
        <div class="d-flex align-items-center justify-content-center gap-2">
            <a href="{{ route('patients.show', $patient) }}"
               class="btn btn-sm btn-outline-info">
                View
            </a>

            <a href="{{ route('patients.edit', $patient) }}"
               class="btn btn-sm btn-outline-primary">
                Edit
            </a>

            <form action="{{ route('patients.destroy', $patient) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this patient?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-4">
                                @if ($search)
                                    No patients found matching your search.
                                @else
                                    No patients registered yet. Click “Register Patient” to add one.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-3">
            <small class="text-secondary">
                Showing {{ $patients->firstItem() ?? 0 }} to
                {{ $patients->lastItem() ?? 0 }} of {{ $patients->total() }} patients
            </small>

            {{ $patients->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
