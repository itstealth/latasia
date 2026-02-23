<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 11px;
            color: #000;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: top;
        }

        .logo img {
            width: 140px;
            margin-bottom: 10px;
        }

        .bank {
            font-size: 10px;
            line-height: 1.6;
        }

        .bank-title {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .company {
            text-align: right;
            line-height: 1.6;
            font-size: 11px;
        }

        .invoice-title {
            font-size: 22px;
            font-weight: bold;
        }

        .serial {
            font-size: 11px;
        }

        .divider {
            border-top: 3px solid #2fa4e7;
            margin: 14px 0;
        }

        .info td {
            vertical-align: top;
            line-height: 1.6;
        }

        .right {
            text-align: right;
        }

        .deadline {
            background: #2fa4e7;
            color: #fff;
            padding: 6px 10px;
            display: inline-block;
            font-weight: bold;
            margin-top: 6px;
        }

        .items th {
            border-bottom: 2px solid #000;
            padding: 6px;
            font-size: 11px;
            text-align: left;
        }

        .items td {
            padding: 6px;
            font-size: 11px;
        }

        .items tr:last-child td {
            border-bottom: 2px solid #000;
        }

        .totals td {
            padding: 6px;
            font-weight: bold;
            font-size: 12px;
        }

        .footer {
            margin-top: 12px;
            font-size: 10px;
            color: #444;
        }
    </style>
</head>

<body>

<!-- ================= HEADER ================= -->
<table class="header">
<tr>
    <!-- LEFT: LOGO + BANK DETAILS -->
    <td width="50%">
        <div class="logo">
            <img src="{{ $logoPath }}" alt="Logo">
        </div>

        <div class="bank">
            <div class="bank-title">BANK DETAILS</div>

            <b>Account Holder:</b> PUJA SALUJA<br>
            <b>IBAN:</b> DE65 1001 1001 2425 7316 73<br>
            <b>BIC:</b> NTSBDEB1XXX
        </div>
    </td>

    <!-- RIGHT: COMPANY DETAILS -->
    <td width="50%" class="company">
        <b>LATASIA INTERNATIONAL SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ (PUJA SALUJA)</b><br>
        Grzybowska 2<br>
        00-131 Warszawa<br>
        Poland<br><br>

        <div class="invoice-title">INVOICE</div>
        <div class="serial">
            Serial number: {{ $invoice->invoice_number }}
        </div>
    </td>
</tr>
</table>

<div class="divider"></div>

<!-- ================= CUSTOMER & DATES ================= -->
<table class="info">
<tr>
    <td width="55%">
        <b>CUSTOMER:</b><br>
        {{ $invoice->customer_name }}<br>
        {!! nl2br(e($invoice->customer_address)) !!}
    </td>

    <td width="45%" class="right">
        Fulfillment Date: {{ $invoice->fulfillment_date }}<br>
        Date of Issue: {{ $invoice->issue_date }}<br>

        <div class="deadline">
            Payment Deadline: {{ $invoice->payment_deadline }}
        </div>
    </td>
</tr>
</table>

<!-- ================= ITEMS ================= -->
<table class="items" style="margin-top:14px;">
<thead>
<tr>
    <th>Description</th>
    <th>Qty</th>
    <th>Unit Price</th>
    <th>Net Price</th>
    <th>VAT</th>
    <th>VAT Value</th>
    <th>Gross Price</th>
</tr>
</thead>

<tbody>
<tr>
    <td>{{ $invoice->description }}</td>
    <td>{{ $invoice->quantity }}</td>
    <td>{{ number_format($invoice->unit_price, 2) }}</td>
    <td>{{ number_format($invoice->net_price, 2) }}</td>
    <td>{{ $invoice->vat_type }}</td>
    <td>{{ number_format($invoice->vat_value, 2) }}</td>
    <td>{{ number_format($invoice->gross_price, 2) }}</td>
</tr>
</tbody>
</table>

<!-- ================= TOTALS ================= -->
<table class="totals">
<tr>
    <td width="70%"></td>
    <td width="15%">Net Total:</td>
    <td width="15%" class="right">{{ number_format($invoice->net_price, 2) }}</td>
</tr>
<tr>
    <td></td>
    <td>VAT:</td>
    <td class="right">{{ number_format($invoice->vat_value, 2) }}</td>
</tr>
<tr>
    <td></td>
    <td>Grand Total:</td>
    <td class="right">{{ number_format($invoice->gross_price, 2) }}</td>
</tr>
</table>

<!-- ================= FOOTER ================= -->
<div class="footer">
    <b>VAT Note:</b> VAT exempt supply (AAM).<br>
    This invoice was generated electronically and is valid without signature.
</div>

</body>
</html>
