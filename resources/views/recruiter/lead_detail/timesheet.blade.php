<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Include Bootstrap JS -->

<div class="tab-pane active" id="timesheets" role="tabpanel">
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

    <form action="" method="POST">
        @csrf 

        <div class="row">

            <div class="col-12">
                <h5 class="mb-3 border-bottom pb-2">Work Details POJI</h5>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Deployment GG</label>
                <select name="deployment_id" class="form-select" required>
                    <option value="">Select Deployment</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Work Date</label>
                <input type="date" name="work_date" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Hours Worked</label>
                <input type="number" step="0.01" name="hours_worked" class="form-control calc" value="0">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Overtime Hours</label>
                <input type="number" step="0.01" name="overtime_hours" class="form-control calc" value="0">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Rate / Hour</label>
                <input type="number" step="0.01" name="rate_per_hour" class="form-control calc" value="0">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">OT Rate / Hour</label>
                <input type="number" step="0.01" name="overtime_rate" class="form-control calc" value="0">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Total Amount</label>
                <input type="text" name="total_amount" class="form-control" readonly>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" rows="2" class="form-control"></textarea>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success">
                    Save Timesheet
                </button>
            </div>

        </div>
    </form>
    <script>
        document.addEventListener('input', function(e) {
            if (!e.target.classList.contains('calc')) return;

            let hours = parseFloat(document.querySelector('[name="hours_worked"]').value) || 0;
            let otHours = parseFloat(document.querySelector('[name="overtime_hours"]').value) || 0;
            let rate = parseFloat(document.querySelector('[name="rate_per_hour"]').value) || 0;
            let otRate = parseFloat(document.querySelector('[name="overtime_rate"]').value) || 0;

            let total = (hours * rate) + (otHours * otRate);
            document.querySelector('[name="total_amount"]').value = total.toFixed(2);
        });
    </script>
