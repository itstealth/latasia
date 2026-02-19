@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add commission Rules</h4>
                            <form action="{{ route('store.recruiter.commission.rule') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Recruiter</label>
                                        <select name="recruiter_id" class="form-select" required>
                                            @foreach ($recruiters as $r)
                                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Employer</label>
                                        <select name="employer_id" class="form-select" required>
                                            @foreach ($employers as $e)
                                                <option value="{{ $e->id }}">{{ $e->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Vacancy (Optional)</label>
                                        <select name="vacancy_id" class="form-select">
                                            <option value="">All Vacancies</option>
                                            @foreach ($vacancies as $v)
                                                <option value="{{ $v->id }}">
                                                    Vacancy #{{ $v->id }} ({{ $v->billing_model }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Commission Type</label>
                                        <select name="commission_type" class="form-select" required>
                                            <option value="percentage">Percentage</option>
                                            <option value="per_hour">Per Hour</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Commission Value</label>
                                        <input type="number" step="0.01" name="commission_value" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Valid Months</label>
                                        <input type="number" name="valid_months" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="form-select">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <button class="btn btn-success">Save Commission Rule</button>
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
