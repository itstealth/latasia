@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Position</h4>
                           <form action="{{ route('update.position', $position->id) }}" method="POST" class="auth-form">
    @csrf
   
    
    {{-- ================= PROJECT & POSITION ================= --}}
    <div class="row">
        <!-- Project Dropdown -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Select Project</label>
                <select name="project_id" class="form-select" required>
                    <option value="">-- Select Project --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" 
                            {{ $position->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }} ({{ $project->project_code }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Position Title -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Position Name</label>
                <input type="text" name="title" class="form-control"
                       placeholder="PHP Developer" value="{{ old('title', $position->title) }}" required>
            </div>
        </div>
    </div>

    {{-- ================= SKILLS & EXPERIENCE ================= --}}
    <div class="row">
        <!-- Skills -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Skills (Optional)</label>
                <input type="text" name="skills" class="form-control"
                       placeholder="Laravel, MySQL, REST API" 
                       value="{{ old('skills', $position->skills) }}">
            </div>
        </div>

        <!-- Experience -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Experience (Years)</label>
                <input type="number" name="experience" class="form-control" 
                       placeholder="3" min="0" 
                       value="{{ old('experience', $position->experience) }}" required>
            </div>
        </div>
    </div>

    {{-- ================= EMPLOYMENT TYPE & STATUS ================= --}}
    <div class="row">
        <!-- Employment Type -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Employment Type</label>
                <select name="employment_type" class="form-select" required>
                    <option value="">-- Select Type --</option>
                    <option value="full_time" {{ $position->employment_type == 'full_time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part_time" {{ $position->employment_type == 'part_time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ $position->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="hourly" {{ $position->employment_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
                </select>
            </div>
        </div>

        <!-- Status -->
        
    </div>

    {{-- ================= SUBMIT BUTTON ================= --}}
    <div class="row">
        <div class="col-lg-12 text-end">
            <button class="btn btn-success px-4" type="submit">
                Update Position
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
