@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add Job Wise Document</h4>
                        <form action="{{ route('store.job_documents') }}" method="post" enctype="multipart/form-data" class="auth-form">
                           
                            @csrf
                            <div class="row">
                                <!-- Project Name Dropdown -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Project Name</label>
                                        <select class="form-control select2" name="project_id" id="project_id">
                                            <option selected="">Select Project</option>
                                            @foreach($project_name as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <!-- Job Title Dropdown -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Job Title</label>
                                        <select class="form-control select2" name="job_title" id="job_title">
                                            <option selected="">Select Title</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <!-- Job Country Dropdown -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Job Country</label>
                                        <select class="form-control select2" name="country" id="job_country">
                                            <option selected="">Select Country</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        
                            <!-- New Section for Dynamic Text Boxes (Job Responsibility) -->
                            <div class="row">
                                <!-- Document Name Section -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="job_responsibility">Job Document Name</label>
                                        <div id="documentTextBox">
                                            <input type="text" class="form-control mb-2" name="document_name[]" placeholder="Enter Document Name">
                                        </div>
                                        <button type="button" id="addDocumentBox" class="btn btn-success">Add More Document</button>
                                    </div>
                                </div>
                            
                                <!-- Add Stage Section -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="job_responsibility">Add Stage</label>
                                        <div id="stageTextBox">
                                            <input type="text" class="form-control mb-2" name="job_stage[]" placeholder="Enter Add Stage">
                                        </div>
                                        <button type="button" id="addStageBox" class="btn btn-success">Add More Stage</button>
                                    </div>
                                </div>
                            </div>
                            
                        
                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <script>
                            document.getElementById('addTextBox').addEventListener('click', function() {
                                // Create a new input field
                                var newInput = document.createElement('input');
                                newInput.type = 'text';
                                newInput.name = 'document_name[]'; // Make sure this matches the existing name
                                newInput.className = 'form-control mb-2'; // Add Bootstrap classes
                                newInput.placeholder = 'Enter Document Name';
                        
                                // Append the new input to the div
                                document.getElementById('dynamicTextBox').appendChild(newInput);
                            });
                        </script>
                        
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
        // Add More Document Name
        $('#addDocumentBox').click(function() {
            $('#documentTextBox').append('<input type="text" class="form-control mb-2" name="document_name[]" placeholder="Enter Document Name">');
        });

        // Add More Stage
        $('#addStageBox').click(function() {
            $('#stageTextBox').append('<input type="text" class="form-control mb-2" name="job_stage[]" placeholder="Enter Add Stage">');
        });
    });
</script>
<script>
$(document).ready(function () {
    $('#project_id').change(function () {
        let projectId = $(this).val();
        if (projectId) {
            $.ajax({
                url: "{{ route('get.jobs.by.project') }}", // Define this route in your routes file
                type: "GET",
                data: { project_id: projectId },
                success: function (data) {
                    // Update job title dropdown
                    let jobTitleOptions = '<option selected="">Select Title</option>';
                    data.job_titles.forEach(item => {
                        jobTitleOptions += `<option value="${item.title}">${item.title}</option>`;
                    });
                    $('#job_title').html(jobTitleOptions);

                    // Update job country dropdown
                    let jobCountryOptions = '<option selected="">Select Country</option>';
                    data.job_countries.forEach(item => {
                        jobCountryOptions += `<option value="${item.country}">${item.country}</option>`;
                    });
                    $('#job_country').html(jobCountryOptions);
                }
            });
        } else {
            $('#job_title').html('<option selected="">Select Title</option>');
            $('#job_country').html('<option selected="">Select Country</option>');
        }
    });
});


</script>
@endsection