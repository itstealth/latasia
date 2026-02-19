{{-- ================= TIMESHEET TAB ================= --}}
<div class="tab-pane active" id="timesheets" role="tabpanel">
    <hr>

    {{-- ================= ERROR HANDLING ================= --}}
    @if (!$employee || !$deployment)
        <div class="alert alert-danger">
            Employee or Deployment not found.
        </div>
    @else

    {{-- ================= TIMESHEET FORM ================= --}}
    <form method="POST" action="{{ route('timesheet.store', $employee->id) }}">
        @csrf

        {{-- ================= HIDDEN FIELDS ================= --}}
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
        <input type="hidden" name="deployment_id" value="{{ $deployment->id }}">
        <input type="hidden" name="timesheet_id" value="{{ $currentTimesheet?->id }}">

        <div class="row">

            {{-- ================= WORK DATE ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Work Date</label>
                <input type="date" name="work_date"
                    value="{{ old('work_date', $workDate ?? $currentTimesheet?->work_date) }}"
                    class="form-control" required>
            </div>

            {{-- ================= HOURS WORKED ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Hours Worked</label>
                <input type="number" step="0.01" name="hours_worked"
                    value="{{ old('hours_worked', $currentTimesheet?->hours_worked ?? 0) }}"
                    class="form-control calc">
            </div>

            {{-- ================= OT HOURS ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Overtime Hours</label>
                <input type="number" step="0.01" name="overtime_hours"
                    value="{{ old('overtime_hours', $currentTimesheet?->overtime_hours ?? 0) }}"
                    class="form-control calc">
            </div>

            {{-- ================= RATE PER HOUR ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Rate / Hour</label>
                <input type="number" step="0.01" name="rate_per_hour"
                    value="{{ old('rate_per_hour', $currentTimesheet?->rate_per_hour ?? 0) }}"
                    class="form-control calc">
            </div>

            {{-- ================= OT RATE ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">OT Rate</label>
                <input type="number" step="0.01" name="overtime_rate"
                    value="{{ old('overtime_rate', $currentTimesheet?->overtime_rate ?? 0) }}"
                    class="form-control calc">
            </div>

            {{-- ================= TOTAL AMOUNT ================= --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Total Amount</label>
                <input type="text" name="total_amount"
                    value="{{ $currentTimesheet?->total_amount ?? 0 }}"
                    class="form-control" readonly>
            </div>

            {{-- ================= REMARKS ================= --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" class="form-control"
                    rows="3">{{ old('remarks', $currentTimesheet?->remarks) }}</textarea>
            </div>

            {{-- ================= SUBMIT BUTTON ================= --}}
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success px-4">
                    {{ $currentTimesheet ? 'Update Timesheet' : 'Save Timesheet' }}
                </button>
            </div>

        </div>
    </form>
    @endif
</div>

{{-- ================= AUTO CALCULATION SCRIPT ================= --}}
<script>
document.addEventListener('input', function (e) {

    if (!e.target.classList.contains('calc')) return;

    let hours   = parseFloat(document.querySelector('[name="hours_worked"]').value) || 0;
    let otHours = parseFloat(document.querySelector('[name="overtime_hours"]').value) || 0;
    let rate    = parseFloat(document.querySelector('[name="rate_per_hour"]').value) || 0;
    let otRate  = parseFloat(document.querySelector('[name="overtime_rate"]').value) || 0;

    let total = (hours * rate) + (otHours * otRate);

    document.querySelector('[name="total_amount"]').value = total.toFixed(2);
});
</script>
