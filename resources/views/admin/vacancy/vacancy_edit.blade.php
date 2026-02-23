@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Vacancy</h4>
                           <form action="{{ route('update.vacancy', $vacancy->id) }}" method="POST" class="auth-form">
    @csrf
 

    <!-- Row 1: Employer and Project -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Select Employer</label>
            <select name="employer_id" class="form-select" required>
                <option value="">-- Select Employer --</option>
                @foreach ($employers as $employer)
                    <option value="{{ $employer->id }}"
                        {{ $vacancy->employer_id == $employer->id ? 'selected' : '' }}>
                        {{ $employer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label">Select Project</label>
            <select name="project_id" class="form-select" required>
                <option value="">-- Select Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ $vacancy->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->project_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Row 2: Position and Recruiter -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Select Position</label>
            <select name="position_id" class="form-select" required>
                <option value="">-- Select Position --</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}"
                        {{ $vacancy->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label">Assign Recruiter</label>
            <select name="recruiter_id" class="form-select" required>
                <option value="">-- Select Recruiter --</option>
                @foreach ($recruiters as $recruiter)
                    <option value="{{ $recruiter->id }}"
                        {{ $vacancy->recruiter_id == $recruiter->id ? 'selected' : '' }}>
                        {{ $recruiter->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Row 3: Openings and Billing Rate -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Openings</label>
            <input type="number" name="openings" class="form-control" min="1"
                value="{{ old('openings', $vacancy->openings) }}" required>
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label">Billing Rate</label>
            <input type="number" name="billing_rate" class="form-control" min="1"
                value="{{ old('billing_rate', $vacancy->billing_rate) }}" required>
        </div>
    </div>

    <!-- Row 4: Billing Model -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Billing Model</label>
            <select name="billing_model" class="form-select" required>
                <option value="monthly"
                    {{ $vacancy->billing_model == 'monthly' ? 'selected' : '' }}>
                    Monthly
                </option>
                <option value="hourly"
                    {{ $vacancy->billing_model == 'hourly' ? 'selected' : '' }}>
                    Hourly
                </option>
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mt-4">
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary" type="submit">
                Update Vacancy
            </button>
        </div>
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

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script>
        // Assuming you have the getCode function defined
        function getCode(weccode) {
            var strURL = "{{ url('/findrecruitercode') }}/" + encodeURIComponent(weccode);

            var req = new XMLHttpRequest();
            if (req) {
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // Only if "OK"
                        if (req.status == 200) {
                            document.getElementById('codediv').innerHTML = req.responseText;
                        } else {
                            alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }
                };

                req.open("GET", strURL, true);
                req.send(null);
            }
        }

        // Assuming you have an event listener for the dropdown change
        document.querySelector('select[name="designation"]').addEventListener('change', function() {
            getCode(this.value);
        });
    </script>
@endsection
