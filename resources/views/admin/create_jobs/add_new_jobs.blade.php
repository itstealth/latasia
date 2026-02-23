@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">New Job Add</h4>
                            <form action="{{ route('store.new_job') }}" method="post" enctype="multipart/form-data"
                                class="auth-form">
                                @csrf
                                <div class="row">
                                    

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Tital</label>
                                            <input type="text" name="title" placeholder="Job Tital"
                                                class="form-control" id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Social Media
                                                Tag Name</label>
                                            <input type="text" name="socal_media_name"
                                                placeholder="Social Media Tag Name" class="form-control"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Country</label>
                                            <input type="text" name="country" placeholder="Country" class="form-control"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Category</label>
                                            <select class="form-control select2" name="job_category_id">
                                                <option selected="">Select Category</option>
                                                @foreach ($job_cat as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Location</label>
                                            <select class="form-control select2" name="job_location_id">
                                                <option selected="">Select Job Location</option>
                                                @foreach ($job_location as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Salary Per
                                                Month / Hours</label>
                                            <input type="text" name="salary_duration"
                                                placeholder="Salary Per Month / Hours" class="form-control"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Type</label>
                                            <select class="form-control select2" name="job_type_id">
                                                <option selected="">Select Job Type</option>
                                                @foreach ($job_type as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Experince</label>
                                            <select class="form-control select2" name="job_experince_id">
                                                <option selected="">Select job Experince</option>
                                                @foreach ($job_exp as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Gender</label>
                                            <select class="form-control select2" name="job_gender_id">
                                                <option selected="">Select Gender</option>
                                                @foreach ($job_gender as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Salary</label>
                                            <select class="form-control select2" name="job_salary_id">
                                                <option selected="">Select Job Salary</option>
                                                @foreach ($job_salary as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Total
                                                Vacancy</label>
                                            <input type="text" name="vacancy" placeholder="Total Vacancy"
                                                class="form-control" id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Dead Line
                                                Date</label>
                                            <input type="date" name="deadline" class="form-control"
                                                id="example-date-input">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Is
                                                Featured</label>
                                            <select class="form-control select2" name="is_featured">
                                                <option selected="">Select Featured</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Is
                                                Urgent</label>
                                            <select class="form-control select2" name="is_urgent">
                                                <option selected="">Select Urgent</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Upload
                                                Image</label>
                                            <input type="file" name="job_image" placeholder="Country"
                                                class="form-control" id="image">
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                <img class="rounded-circle avatar-xl"
                                                    src="{{ url('upload/no_image.jpg') }}" id="showImage"
                                                    alt="Card image cap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Social
                                                Media Image</label>
                                            <input type="file" name="social_image" placeholder="Country"
                                                class="form-control" id="image1">
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                <img class="rounded-circle avatar-xl"
                                                    src="{{ url('upload/no_image.jpg') }}" id="showImage1"
                                                    alt="Card image cap">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Job
                                                Description</label>
                                            <textarea class="form-control" id="elm1" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Responsibility</label>

                                            <textarea class="form-control" id="event-content" name='responsibility'></textarea>
                                        </div>
                                    </div>

                                </div>




                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Skill</label>
                                            <textarea class="form-control" id="event-content1" name="skill"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Benefit</label>
                                            <textarea class="form-control" id="event-content2" name="benefit"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Education</label>
                                            <textarea class="form-control editor" id="event-content4" name="education"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Location
                                                Map</label>
                                            <textarea class="form-control editor" id="event-content3" name="map_code"></textarea>
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
