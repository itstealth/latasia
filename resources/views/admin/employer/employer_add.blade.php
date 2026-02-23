@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add Employer</h4>
                            <form action="{{ route('store.employer') }}" method="post" class="auth-form">
    @csrf

    {{-- ================= BASIC LOGIN INFO ================= --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Employer Name</label>
                <input type="text" name="name" class="form-control" placeholder="Employer Name" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
    </div>

    {{-- ================= COMPANY DETAILS ================= --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control"
                       placeholder="Company / Organization Name" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="City">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control" placeholder="State">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="India">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Full Address">
            </div>
        </div>
    </div>

    {{-- ================= CONTACT PERSON ================= --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Contact Person</label>
                <input type="text" name="contact_person" class="form-control"
                       placeholder="HR / Manager Name">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Contact Phone</label>
                <input type="text" name="contact_phone" class="form-control"
                       placeholder="Contact Person Phone">
            </div>
        </div>
    </div>

    {{-- ================= SUBMIT ================= --}}
    <div class="row">
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary px-4" type="submit">
                Create Employer
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
