@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Of Invoices</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">List Of Invoices</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Page Header -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-semibold">Invoice Management</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('invoices.add') }}" class="btn btn-primary">
                            <i class="fas fa-building me-1"></i> Add New Invoice
                        </a>
                    </div>
                </div>

                <!-- Invoice Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="card-title mb-3 text-muted">Invoice List</h5>

                                <div class="table-responsive">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered align-middle w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width:5%">#</th>
                                                <th>Customer Name</th>
                                                 <th>Invoice Amount</th>
                                                 <th>Issue Date</th>
                                                <th>Due Date</th>

                                                <th style="width:15%">Download</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($invoices as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="fw-semibold">{{ $item->customer_name }}</td>
                                                    <td>{{ $item->gross_price }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->issue_date)->format('m-d-y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->due_date)->format('m-d-y') }}</td>


                                                    <td>
                                                        <a href="{{ route('admin.invoice.pdf', $item->id) }}"
                                                            class="btn btn-sm btn-outline-success" title="Download Invoice PDF">
                                                            <i class="fas fa-download"></i>
                                                        </a>


                                                    <!-- Action Buttons -->
                                                    
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">
                                                        No employers found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>












            </div> <!-- container-fluid -->

        </div>
    </div>
@endsection
