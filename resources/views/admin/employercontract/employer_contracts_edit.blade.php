@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit EmployerContract</h4>
                           <form action="{{ route('update.employer.contract', $employerContract->id) }}"
      method="POST" class="auth-form">
    @csrf
    

    {{-- ================= EMPLOYER ================= --}}
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Select Employer</label>
            <select name="employer_id" class="form-select" required>
                <option value="">-- Select Employer --</option>
                @foreach ($employers as $employer)
                    <option value="{{ $employer->id }}"
                        {{ $employerContract->employer_id == $employer->id ? 'selected' : '' }}>
                        {{ $employer->company_name ?? $employer->name }}
                        ({{ $employer->employer_code }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- ================= CONTRACT INFO ================= --}}
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label">Contract Code</label>
            <input type="text" name="contract_code" class="form-control"
                   value="{{ old('contract_code', $employerContract->contract_code) }}" readonly>
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label">Contract Name</label>
            <input type="text" name="contract_name" class="form-control"
                   value="{{ old('contract_name', $employerContract->contract_name) }}"
                   placeholder="Annual Staffing Contract">
        </div>
    </div>

    {{-- ================= BILLING RULES ================= --}}
    <div class="row">
        <div class="col-lg-4 mb-3">
            <label class="form-label">Billing Model</label>
            <select name="billing_model" class="form-select" required>
                <option value="">-- Select Model --</option>
                <option value="monthly_staffing"
                    {{ $employerContract->billing_model == 'monthly_staffing' ? 'selected' : '' }}>
                    Monthly Staffing
                </option>
                <option value="hourly_leasing"
                    {{ $employerContract->billing_model == 'hourly_leasing' ? 'selected' : '' }}>
                    Hourly Leasing
                </option>
                <option value="fixed"
                    {{ $employerContract->billing_model == 'fixed' ? 'selected' : '' }}>
                    Fixed
                </option>
            </select>
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">Billing Cycle</label>
            <select name="billing_cycle" class="form-select">
                <option value="">-- Optional --</option>
                <option value="weekly"
                    {{ $employerContract->billing_cycle == 'weekly' ? 'selected' : '' }}>
                    Weekly
                </option>
                <option value="monthly"
                    {{ $employerContract->billing_cycle == 'monthly' ? 'selected' : '' }}>
                    Monthly
                </option>
            </select>
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">Payment Terms</label>
            <select name="payment_terms" class="form-select" required>
                @foreach (['net_7','net_15','net_30','net_45'] as $term)
                    <option value="{{ $term }}"
                        {{ $employerContract->payment_terms == $term ? 'selected' : '' }}>
                        {{ strtoupper(str_replace('_', ' ', $term)) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- ================= PRICING ================= --}}
    <div class="row">
        <div class="col-lg-4 mb-3">
            <label class="form-label">Minimum Billable Hours</label>
            <input type="number" name="minimum_billable_hours" class="form-control"
                   value="{{ old('minimum_billable_hours', $employerContract->minimum_billable_hours) }}">
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">Hourly Rate (₹)</label>
            <input type="number" step="0.01" name="hourly_rate" class="form-control"
                   value="{{ old('hourly_rate', $employerContract->hourly_rate) }}">
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">Fixed Amount (₹)</label>
            <input type="number" step="0.01" name="fixed_amount" class="form-control"
                   value="{{ old('fixed_amount', $employerContract->fixed_amount) }}">
        </div>
    </div>

    {{-- ================= TAX & VALIDITY ================= --}}
    <div class="row">
        <div class="col-lg-4 mb-3">
            <label class="form-label">Tax Percentage (%)</label>
            <input type="number" step="0.01" name="tax_percentage" class="form-control"
                   value="{{ old('tax_percentage', $employerContract->tax_percentage) }}">
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ old('start_date', $employerContract->start_date) }}" required>
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ old('end_date', $employerContract->end_date) }}">
        </div>
    </div>

    {{-- ================= STATUS ================= --}}
    <div class="row">
        <div class="col-lg-4 mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active"
                    {{ $employerContract->status == 'active' ? 'selected' : '' }}>
                    Active
                </option>
                <option value="expired"
                    {{ $employerContract->status == 'expired' ? 'selected' : '' }}>
                    Expired
                </option>
                <option value="terminated"
                    {{ $employerContract->status == 'terminated' ? 'selected' : '' }}>
                    Terminated
                </option>
            </select>
        </div>
    </div>

    {{-- ================= SUBMIT ================= --}}
    <div class="row mt-4">
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary px-4" type="submit">
                <i class="fas fa-save me-1"></i> Update Contract
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
