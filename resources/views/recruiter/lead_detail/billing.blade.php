<hr>

<div class="card-body">
    <form method="POST" action="{{ route('recruiter.invoice.store') }}">
        @csrf

        <!-- HIDDEN REQUIRED FIELDS -->
        <input type="hidden" name="employer_id" value="{{ $lead->employer_id }}">
        <input type="hidden" name="project_id" value="{{ $projectId }}">

        <div class="row">

            <!-- Invoice Date -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Invoice Date</label>
                <input type="date" name="invoice_date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Subtotal -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Subtotal</label>
                <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" required>
            </div>

            <!-- Tax -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Tax</label>
                <input type="number" step="0.01" name="tax" id="tax" class="form-control" value="0">
            </div>

            <!-- Total -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" step="0.01" id="total_amount" class="form-control" readonly>
            </div>

        </div>

        <button class="btn btn-primary">
            Create Invoice
        </button>
    </form>
</div>
<script>
document.addEventListener('input', function () {
    let subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
    let tax = parseFloat(document.getElementById('tax').value) || 0;

    document.getElementById('total_amount').value =
        (subtotal + tax).toFixed(2);
});
</script>
