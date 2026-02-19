@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Commission Rule</h4>
                            <form action="{{ route('update.recruiter.commission.rule', $recruiterCommissionRule->id) }}"
      method="POST">
    @csrf
   

    {{-- Row 1 --}}
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Recruiter</label>
            <select name="recruiter_id" class="form-select" required>
                @foreach ($recruiters as $r)
                    <option value="{{ $r->id }}"
                        {{ old('recruiter_id', $recruiterCommissionRule->recruiter_id) == $r->id ? 'selected' : '' }}>
                        {{ $r->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Employer</label>
            <select name="employer_id" class="form-select" required>
                @foreach ($employers as $e)
                    <option value="{{ $e->id }}"
                        {{ old('employer_id', $recruiterCommissionRule->employer_id) == $e->id ? 'selected' : '' }}>
                        {{ $e->company_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Row 2 --}}
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label">Vacancy (Optional)</label>
            <select name="vacancy_id" class="form-select">
                <option value="">All Vacancies</option>
                @foreach ($vacancies as $v)
                    <option value="{{ $v->id }}"
                        {{ old('vacancy_id', $recruiterCommissionRule->vacancy_id) == $v->id ? 'selected' : '' }}>
                        Vacancy #{{ $v->id }}
                        ({{ str_replace('_', ' ', $v->billing_model) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Commission Type</label>
            <select name="commission_type" class="form-select" required>
                <option value="percentage"
                    {{ old('commission_type', $recruiterCommissionRule->commission_type) == 'percentage' ? 'selected' : '' }}>
                    Percentage
                </option>
                <option value="per_hour"
                    {{ old('commission_type', $recruiterCommissionRule->commission_type) == 'per_hour' ? 'selected' : '' }}>
                    Per Hour
                </option>
            </select>
        </div>
    </div>

    {{-- Row 3 --}}
    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label">Commission Value</label>
            <input type="number"
                   step="0.01"
                   name="commission_value"
                   class="form-control"
                   value="{{ old('commission_value', $recruiterCommissionRule->commission_value) }}"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Valid Months</label>
            <input type="number"
                   name="valid_months"
                   class="form-control"
                   value="{{ old('valid_months', $recruiterCommissionRule->valid_months) }}">
        </div>

        <div class="col-md-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active"
                    {{ old('status', $recruiterCommissionRule->status) == 'active' ? 'selected' : '' }}>
                    Active
                </option>
                <option value="inactive"
                    {{ old('status', $recruiterCommissionRule->status) == 'inactive' ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>
    </div>

    {{-- Submit --}}
    <div class="mt-4 text-end">
        <button class="btn btn-success">
            Update Commission Rule
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
