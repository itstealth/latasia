@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Employer</h4>
                            <form action="{{ route('update.employer', $employer->id) }}" method="post"
                                enctype="multipart/form-data" class="auth-form">
                                @csrf

                                <input type="hidden" name="id" value="{{ $employer->id }}">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Employer
                                                Name</label>
                                            <input type="text" name="name" value="{{ $employer->name }}"
                                                placeholder="Employer Name" class="form-control"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Email</label>
                                            <input type="text" name="email" value="{{ $employer->email }}"
                                                class="form-control" placeholder="Email"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="progress-basicpill-firstname-input">Phone
                                                Number</label>
                                            <input type="text" name="phone" value="{{ $employer->phone }}"
                                                placeholder="Phone Number" class="form-control"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="progress-basicpill-firstname-input">Address</label>
                                            <input type="text" name="address" value="{{ $employer->address }}"
                                                class="form-control" placeholder="Address"
                                                id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
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
