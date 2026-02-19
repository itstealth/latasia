@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Of Employer Contracts</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">List Of Employer Contracts</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Page Header -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-semibold">Employer Contract Management</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('add.employer.contract') }}" class="btn btn-primary">
                            <i class="fas fa-building me-1"></i> Add New Employer Contract
                        </a>
                    </div>
                </div>

                <!-- Project Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="card-title mb-3 text-muted">Employer List</h5>

                                <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light text-nowrap">
            <tr>
                <th style="width:50px">#</th>
                <th>Employer</th>
                <th>Contract Code</th>
                <th>Contract Name</th>
                <th>Billing Model</th>
                <th>Billing Cycle</th>
                <th>Payment Terms</th>
                <th>Rate / Amount</th>
                <th>Validity</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
@forelse ($employerContracts as $key => $contract)
<tr>
    <td>{{ $key + 1 }}</td>

    <td>
        <div class="fw-semibold">
            {{ $contract->employer->company_name ?? $contract->employer->name }}
        </div>
        <small class="text-muted">
            {{ $contract->employer->email ?? '' }}
        </small>
    </td>

    <td class="fw-semibold text-primary">
        {{ $contract->contract_code }}
    </td>

    <td>
        {{ $contract->contract_name ?? '-' }}
    </td>

    <td class="text-capitalize">
        {{ str_replace('_',' ', $contract->billing_model) }}
    </td>

    <td>
        {{ ucfirst($contract->billing_cycle ?? '-') }}
    </td>

    <td class="text-uppercase">
        {{ str_replace('_',' ', $contract->payment_terms) }}
    </td>

    <td class="fw-semibold">
        @if ($contract->billing_model === 'hourly_leasing')
            ₹{{ number_format($contract->hourly_rate, 2) }}/hr
        @elseif ($contract->billing_model === 'fixed')
            ₹{{ number_format($contract->fixed_amount, 2) }}
        @else
            Monthly
        @endif
    </td>

    <td>
        <small>
            {{ \Carbon\Carbon::parse($contract->start_date)->format('d M Y') }}
            <br>
            <span class="text-muted">
                {{ $contract->end_date
                    ? \Carbon\Carbon::parse($contract->end_date)->format('d M Y')
                    : 'Ongoing' }}
            </span>
        </small>
    </td>

    <td>
        <span class="badge rounded-pill
            @if($contract->status === 'active') bg-success
            @elseif($contract->status === 'expired') bg-secondary
            @else bg-danger @endif">
            {{ ucfirst($contract->status) }}
        </span>
    </td>

    <td class="text-end">
        <div class="btn-group btn-group-sm">
            <a href="{{ route('edit.employer.contract', $contract->id) }}"
               class="btn btn-outline-primary">
                <i class="fas fa-edit"></i>
            </a>

            <a href="{{ route('delete.employer.contract', $contract->id) }}"
               class="btn btn-outline-danger"
               onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="11" class="text-center py-5">
        <div class="text-muted">
            <i class="fas fa-file-contract fa-3x mb-3"></i>
            <p class="mb-0 fw-semibold">No employer contracts found</p>
            <small>Create a contract to start billing</small>
        </div>
    </td>
</tr>
@endforelse


                            </div>
                        </div>
                    </div>
                </div>












            </div> <!-- container-fluid -->

        </div>
    </div>
@endsection
