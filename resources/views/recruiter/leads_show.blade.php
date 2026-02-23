@extends('recruiter.recruiter_master')
@section('recruiter')
    <div class="page-content">

<div class="card">
    <div class="card-header">
        <h5>Lead Details – {{ $lead->lead_code }}</h5>
    </div>

    <div class="card-body">

        <p><strong>Name:</strong> {{ $lead->name }}</p>
        <p><strong>Phone:</strong> {{ $lead->phone }}</p>
        <p><strong>Job Title:</strong> {{ $lead->job_title }}</p>

        <hr>

        <form method="POST" action="{{ route('recruiter.leads.map', $lead->id) }}">
            @csrf

            {{-- Employer --}}
            <div class="mb-3">
                <label>Employer</label>
                <select name="employer_id" class="form-control" required>
                    <option value="">Select Employer</option>
                    @foreach($employers as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Project --}}
            <div class="mb-3">
                <label>Project</label>
                <select name="project_id" class="form-control" required>
                    <option value="">Select Project</option>
                </select>
            </div>

            {{-- Vacancy --}}
            <div class="mb-3">
                <label>Vacancy</label>
                <select name="vacancy_id" class="form-control" required>
                    <option value="">Select Vacancy</option>
                </select>
            </div>

            <button class="btn btn-success">
                Shortlist Lead
            </button>
        </form>

    </div>
</div>

    </div>
    @endsection