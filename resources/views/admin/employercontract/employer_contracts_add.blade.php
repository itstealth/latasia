@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add EmployerContract</h4>
                            <form action="{{ route('store.employer.contract') }}" method="POST" class="auth-form">
                                @csrf

                                {{-- ================= EMPLOYER ================= --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Select Employer</label>
                                            <select name="employer_id" class="form-select" required>
                                                <option value="">-- Select Employer --</option>
                                                @foreach ($employers as $employer)
                                                    <option value="{{ $employer->id }}">
                                                        {{ $employer->company_name ?? $employer->name }}
                                                        ({{ $employer->employer_code }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= CONTRACT INFO ================= --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contract Code</label>
                                            <input type="text" name="contract_code" class="form-control"
                                                value="CNT-EMP-{{ rand(1000, 9999) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contract Name</label>
                                            <input type="text" name="contract_name" class="form-control"
                                                placeholder="Annual Staffing Contract">
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= BILLING RULES ================= --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Billing Model</label>
                                            <select name="billing_model" class="form-select" required>
                                                <option value="">-- Select Model --</option>
                                                <option value="monthly_staffing">Monthly Staffing</option>
                                                <option value="hourly_leasing">Hourly Leasing</option>
                                                <option value="fixed">Fixed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Billing Cycle</label>
                                            <select name="billing_cycle" class="form-select">
                                                <option value="">-- Optional --</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Payment Terms</label>
                                            <select name="payment_terms" class="form-select" required>
                                                <option value="net_7">Net 7</option>
                                                <option value="net_15">Net 15</option>
                                                <option value="net_30" selected>Net 30</option>
                                                <option value="net_45">Net 45</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= PRICING ================= --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Minimum Billable Hours</label>
                                            <input type="number" name="minimum_billable_hours" class="form-control"
                                                placeholder="160">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Hourly Rate (₹)</label>
                                            <input type="number" step="0.01" name="hourly_rate" class="form-control"
                                                placeholder="500">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fixed Amount (₹)</label>
                                            <input type="number" step="0.01" name="fixed_amount" class="form-control"
                                                placeholder="250000">
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= TAX & VALIDITY ================= --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tax Percentage (%)</label>
                                            <input type="number" step="0.01" name="tax_percentage" class="form-control"
                                                value="0">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">End Date</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= STATUS ================= --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="active" selected>Active</option>
                                                <option value="expired">Expired</option>
                                                <option value="terminated">Terminated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- ================= SUBMIT ================= --}}
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button class="btn btn-primary px-4" type="submit">
                                            <i class="fas fa-save me-1"></i> Save Contract
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
