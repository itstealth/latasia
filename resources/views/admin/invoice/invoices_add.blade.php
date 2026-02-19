@extends('admin.admin_master')

@section('admin')

<div style="
    max-width: 1000px;
    margin: 30px auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
">

    <h2 style="margin-bottom:25px; color:#222; font-weight:600;">
        🧾 Create Invoice
    </h2>

    <form method="POST" action="{{ route('invoice.save') }}">
        @csrf

        <!-- ================= CUSTOMER DETAILS ================= -->
        <div style="margin-bottom:30px;">
            <h4 style="border-bottom:2px solid #e9ecef; padding-bottom:8px;">
                Customer Details
            </h4>

            <div style="margin-top:15px;">
                <label>Customer Name</label>
                <input type="text" name="customer_name" required
                    class="form-control mt-1">
            </div>

            <div style="margin-top:15px;">
                <label>Customer Address</label>
                <textarea name="customer_address" rows="3" required
                    class="form-control mt-1"></textarea>
            </div>
        </div>

        <!-- ================= INVOICE DATES ================= -->
        <div style="margin-bottom:30px;">
            <h4 style="border-bottom:2px solid #e9ecef; padding-bottom:8px;">
                Invoice Dates
            </h4>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Issue Date</label>
                    <input type="date" name="issue_date"
                        value="{{ date('Y-m-d') }}"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Fulfillment Date</label>
                    <input type="date" name="fulfillment_date"
                        value="{{ date('Y-m-d') }}"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Payment Deadline</label>
                    <input type="date" name="payment_deadline"
                        value="{{ date('Y-m-d') }}"
                        class="form-control">
                </div>
            </div>
        </div>

        <!-- ================= SERVICE DETAILS ================= -->
        <div style="margin-bottom:30px;">
            <h4 style="border-bottom:2px solid #e9ecef; padding-bottom:8px;">
                Service / Item Details
            </h4>

            <div style="margin-top:15px;">
                <label>Description</label>
                <input type="text" name="description" required
                    class="form-control mt-1">
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Unit Price</label>
                    <input type="number" name="unit_price" id="unit_price"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>VAT Type</label>
                    <input type="text" name="vat_type" value="AAM" readonly
                        class="form-control bg-light">
                </div>
            </div>
        </div>

        <!-- ================= PRICE CALCULATION ================= -->
        <div style="margin-bottom:30px;">
            <h4 style="border-bottom:2px solid #e9ecef; padding-bottom:8px;">
                Price Calculation
            </h4>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Net Price</label>
                    <input type="number" name="net_price" id="net_price" readonly
                        class="form-control bg-light">
                </div>

                <div class="col-md-4">
                    <label>VAT Value</label>
                    <input type="number" name="vat_value" id="vat_value"
                        value="0" 
                        class="form-control bg-light">
                </div>

                <div class="col-md-4">
                    <label>Gross Price</label>
                    <input type="number" name="gross_price" id="gross_price" readonly
                        class="form-control bg-light">
                </div>
            </div>
        </div>

        <!-- ================= SUBMIT ================= -->
        <div class="text-end">
            <button type="submit"
                class="btn btn-primary px-4 py-2">
                💾 Save & Download Invoice
            </button>
        </div>

    </form>
</div>

<!-- ================= JS CALCULATION ================= -->
<script>
function calculateInvoice() {
    let qty = document.getElementById('quantity').value || 0;
    let unit = document.getElementById('unit_price').value || 0;

    let net = qty * unit;

    document.getElementById('net_price').value = net.toFixed(2);
    document.getElementById('gross_price').value = net.toFixed(2);
}

document.getElementById('quantity').addEventListener('input', calculateInvoice);
document.getElementById('unit_price').addEventListener('input', calculateInvoice);
</script>

@endsection
