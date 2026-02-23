@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit project</h4>
                           <form action="{{ route('update.project', $project->id) }}" method="POST" class="auth-form">
    @csrf
   

    {{-- ================= EMPLOYER & PROJECT BASIC ================= --}}
    <div class="row">
        <!-- Employer Dropdown -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Select Employer</label>
                <select name="employer_id" class="form-select" required>
                    <option value="">-- Select Employer --</option>
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}"
                            {{ $project->employer_id == $employer->id ? 'selected' : '' }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Project Name -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Project Name</label>
                <input type="text" name="project_name" class="form-control"
                       value="{{ old('project_name', $project->project_name) }}" required>
            </div>
        </div>
    </div>

    {{-- ================= PROJECT CODE & STATUS ================= --}}
    <div class="row">
        <!-- Project Code (Readonly) -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Project Code</label>
                <input type="text" name="project_code" class="form-control"
                       value="{{ $project->project_code }}" readonly>
            </div>
        </div>

        <!-- Status -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="on_hold" {{ $project->status == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= DATE RANGE ================= --}}
    <div class="row">
        <!-- Start Date -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control"
                       value="{{ old('start_date', $project->start_date) }}" required>
            </div>
        </div>

        <!-- End Date -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control"
                       value="{{ old('end_date', $project->end_date) }}">
            </div>
        </div>
    </div>

    {{-- ================= DESCRIPTION ================= --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Project Description</label>
                <textarea name="description" id="elm1" rows="4" class="form-control"
                    placeholder="Enter project details...">{{ old('description', $project->description) }}</textarea>
            </div>
        </div>
    </div>

    {{-- ================= SUBMIT ================= --}}
    <div class="row">
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary px-4" type="submit">
                Update Project
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
