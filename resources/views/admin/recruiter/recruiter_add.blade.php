@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="card shadow-sm border-0">
            
            <!-- Card Header -->
            <div class="card-header bg-light border-bottom">
                <h4 class="mb-0 fw-semibold text-primary">
                    <i class="fas fa-user-tie me-2"></i> Add New Recruiter
                </h4>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <form action="{{ route('store.recruiter') }}" method="POST">
                    @csrf

                    <div class="row g-4">

                        <!-- Recruiter Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                Recruiter Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="Enter recruiter full name" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                Email Address <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" class="form-control"
                                   placeholder="example@email.com" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                Phone Number <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="phone" class="form-control"
                                   placeholder="Enter mobile number" required>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" class="form-control"
                                   placeholder="Create strong password" required>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <label class="form-label fw-medium">Address</label>
                            <textarea name="address" rows="3" class="form-control"
                                      placeholder="Enter full address (optional)"></textarea>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-times-circle"></i> Clear
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Recruiter
                        </button>
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
