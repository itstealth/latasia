<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Include Bootstrap JS -->

<div class="tab-pane active" id="compliance" role="tabpanel">
    &nbsp; &nbsp;
    &nbsp; &nbsp;
    <hr>
    @if (session('activeTab'))
        <script>
            window.onload = function() {
                var activeTab = '{{ session('activeTab') }}';
                console.log('Attempting to activate tab:', activeTab);

                // Activate the tab using jQuery
                $('.nav-link[href="#' + activeTab + '"]').tab('show');
            };
        </script>
    @endif
    <p class="mb-0">
        <!-- Overview Model Start -->


    <div class="row">

        <div class="tab-pane fade show active" id="compliance" role="tabpanel">

            @if($employee)
    <form action="{{ route('employees.compliance.store', $employee->id) }}" method="POST">
        @csrf
        <!-- form fields -->
   
@else
    <div class="alert alert-warning">
        Please create Employee first before adding Compliance.
    </div>
@endif

    <div class="row">

        {{-- ================= MEDICAL ================= --}}
        <div class="col-md-4 mb-3">
            <label class="form-label">Medical Status</label>
            <select name="medical_status" class="form-select">
                @foreach(['pending','fit','unfit'] as $status)
                    <option value="{{ $status }}"
                        @selected(old('medical_status', $compliance->medical_status ?? 'pending') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Medical Date</label>
            <input type="date" name="medical_date" class="form-control"
                value="{{ old('medical_date', $compliance->medical_date ?? '') }}">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Medical Report</label>
            <input type="file" name="medical_report" class="form-control">
            @if(!empty($compliance?->medical_report))
                <small>
                    <a href="{{ asset('storage/'.$compliance->medical_report) }}" target="_blank">
                        View Existing Report
                    </a>
                </small>
            @endif
        </div>

        <hr class="my-3">

        {{-- ================= TRADE TEST ================= --}}
        <div class="col-md-4 mb-3">
            <label class="form-label">Trade Test Status</label>
            <select name="trade_test_status" class="form-select">
                @foreach(['pending','pass','fail'] as $status)
                    <option value="{{ $status }}"
                        @selected(old('trade_test_status', $compliance->trade_test_status ?? 'pending') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Trade Test Date</label>
            <input type="date" name="trade_test_date" class="form-control"
                value="{{ old('trade_test_date', $compliance->trade_test_date ?? '') }}">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Police Verification</label>
            <select name="police_verification" class="form-select">
                @foreach(['pending','verified','rejected'] as $status)
                    <option value="{{ $status }}"
                        @selected(old('police_verification', $compliance->police_verification ?? 'pending') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <hr class="my-3">

        {{-- ================= VISA ================= --}}
        <div class="col-md-4 mb-3">
            <label class="form-label">Visa Status</label>
            <select name="visa_status" class="form-select">
                @foreach(['pending','approved','rejected'] as $status)
                    <option value="{{ $status }}"
                        @selected(old('visa_status', $compliance->visa_status ?? 'pending') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Visa Issue Date</label>
            <input type="date" name="visa_issue_date" class="form-control"
                value="{{ old('visa_issue_date', $compliance->visa_issue_date ?? '') }}">
        </div>

        <div class="col-md-12 mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" rows="3" class="form-control">{{ old('remarks', $compliance->remarks ?? '') }}</textarea>
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-success">
                Save Compliance Details
            </button>
        </div>

    </div>
</form>

        </div>


    </div>






</div>
