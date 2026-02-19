@extends('recruiter.recruiter_master')
@section('recruiter')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add Lead</h4>
                            <form method="POST" action="{{ route('recruiter.leads.store') }}">
                                @csrf

                                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Candidate Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Current Location</label>
                                        <input type="text" name="current_city" class="form-control"
                                            placeholder="Ahmedabad">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Current Country</label>
                                        <select name="current_country" class="form-select">
                                            <option>India</option>
                                            <option>UAE</option>
                                            <option>Saudi Arabia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Applying Country</label>
                                        <select name="apply_country" class="form-select" required>
                                            <option value="">Select Country</option>
                                            <option>UAE</option>
                                            <option>Qatar</option>
                                            <option>Saudi Arabia</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Experience (Years)</label>
                                        <input type="number" name="experience" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Skills</label>
                                        <input type="text" name="skills" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Expected Salary</label>
                                        <input type="number" name="expected_salary" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Passport Available?</label>
                                        <select name="passport_available" class="form-select">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Notice Period (Days)</label>
                                        <input type="number" name="notice_period" class="form-control">
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <button class="btn btn-primary">Submit Application</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            width: '100%',
            height: 250,
        });
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#content1',
            width: '100%',
            height: 250,
        });
    </script>
@endsection
