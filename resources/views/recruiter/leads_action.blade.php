@extends('recruiter.recruiter_master')
@section('recruiter')
    <div class="page-content">

        <form action="{{ route('recruiter.social-leads.store') }}" method="POST">
            @csrf

            <input type="hidden" name="social_lead_id" value="{{ $socialLead->id }}">

            <div class="card">
                <div class="card-header">
                    <h5>Recruiter Lead Action</h5>
                </div>

                <div class="card-body">

                    {{-- Candidate Info --}}
                    <div class="row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $socialLead->name }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $socialLead->email }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{ $socialLead->phone }}" readonly>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Country</label>
                            <input type="text" class="form-control" value="{{ $socialLead->country }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>City</label>
                            <input type="text" class="form-control" value="{{ $socialLead->city }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Current Location</label>
                            <input type="text" class="form-control" value="{{ $socialLead->current_location }}" readonly>
                        </div>
                    </div>

                    {{-- Job --}}
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Job Title</label>
                            <input type="text" class="form-control" value="{{ $socialLead->job_title }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Skills</label>
                            <input type="text" class="form-control" value="{{ $socialLead->skills }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Experience</label>
                            <input type="text" class="form-control" value="{{ $socialLead->experience }}" readonly>
                        </div>
                    </div>

                    {{-- PASSPORT --}}
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Passport Number</label>
                            <input type="text" class="form-control" value="{{ $socialLead->passport_number }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Passport Type</label>
                            <input type="text" class="form-control" value="{{ $socialLead->passport_type }}" readonly>
                        </div>
                    </div>

                    {{-- DISPOSITION --}}
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label class="text-danger fw-bold">Disposition</label>
                            <select name="lead_disposition" class="form-control" required>
                                <option value="">-- Select --</option>
                                <option value="not_connected">Not Connected</option>
                                <option value="wrong_number">Wrong Number</option>
                                <option value="not_interested">Not Interested</option>
                                <option value="interested">Interested</option>
                                <option value="callback">Callback</option>
                                <option value="converted">Converted</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">
                        Save Lead
                    </button>
                </div>
            </div>
        </form>


    </div>
@endsection
