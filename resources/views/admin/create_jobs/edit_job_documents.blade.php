@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Job Wise Document</h4>
                            <!-- View File -->
                            <form action="{{ route('update.job_documents') }}" method="post" enctype="multipart/form-data"
                                class="auth-form">
                                @csrf

                                <div class="row">

                                    <!-- Project Name -->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="project_id">Project Name</label>
                                            <select class="form-control select2" name="project_id">
                                                <option disabled>Select Project</option>
                                                @foreach ($project_name as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('project_id', $selected_project_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>



                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="job_title">Job Title</label>
                                            <select class="form-control select2" name="job_title">
                                                <option disabled>Select Title</option>
                                                @foreach ($job_titles as $item)
                                                    <option value="{{ $item->job_title }}"
                                                        {{ old('job_title', $selected_job_title) == trim($item->job_title) ? 'selected' : '' }}>
                                                        {{ $item->job_title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <!-- Job Country -->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="country">Job Country</label>
                                            <select class="form-control select2" name="country">
                                                <option disabled>Select Country</option>
                                                @foreach ($job_countries as $item)
                                                    <option value="{{ $item->desiged_country }}"
                                                        {{ old('country', $selected_country) == trim($item->desiged_country) ? 'selected' : '' }}>
                                                        {{ $item->desiged_country }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>



                                    <!-- Existing Documents Section for Editing -->
                                    <div class="row">


                                        <!-- Job Document Name Section -->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Job Documents with Stage</label>
                                                <div id="documentStageBox">
                                                    @foreach ($job_documents as $doc)
                                                        <div class="row document-stage-row mb-2"
                                                            data-document-id="{{ $doc->id }}">
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control"
                                                                    name="document_name[]"
                                                                    value="{{ $doc->document_name }}"
                                                                    placeholder="Enter Document Name">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control"
                                                                    name="job_stage[]" value="{{ $doc->job_stage }}"
                                                                    placeholder="Enter Job Stage">
                                                                <input type="hidden" name="document_id[]"
                                                                    value="{{ $doc->id }}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm deleteDocumentBtn"
                                                                    data-id="{{ $doc->id }}">Delete</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <button type="button" id="addDocumentStageBtn"
                                                    class="btn btn-success mt-2">Add More Document & Stage</button>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <button class="btn btn-primary" name="submit"
                                                    type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>

                            <!-- Add More Documents and Delete Documents Script -->
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('addDocumentStageBtn').addEventListener('click', function() {
                                        const newRow = document.createElement('div');
                                        newRow.className = 'row document-stage-row mb-2';
                                        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="job_stage[]" placeholder="Enter Job Stage">
                <input type="hidden" name="document_id[]" value="">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm deleteDocumentBtn">Delete</button>
            </div>
        `;
                                        document.getElementById('documentStageBox').appendChild(newRow);
                                    });

                                    document.getElementById('documentStageBox').addEventListener('click', function(e) {
                                        if (e.target.classList.contains('deleteDocumentBtn')) {
                                            const row = e.target.closest('.document-stage-row');
                                            const id = e.target.dataset.id;

                                            if (id) {
                                                if (confirm('Are you sure you want to delete this document?')) {
                                                    fetch(`/job-documents/delete1/${id}`, {
                                                            method: 'DELETE',
                                                            headers: {
                                                                'X-CSRF-TOKEN': document.querySelector(
                                                                    'meta[name="csrf-token"]').getAttribute('content'),
                                                                'Content-Type': 'application/json',
                                                            }
                                                        })
                                                        .then(res => res.json())
                                                        .then(data => {
                                                            if (data.success) {
                                                                row.remove();
                                                                alert('Deleted successfully.');
                                                            } else {
                                                                alert('Error: ' + data.message);
                                                            }
                                                        });
                                                }
                                            } else {
                                                row.remove();
                                            }
                                        }
                                    });
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
        $(document).ready(function() {
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
