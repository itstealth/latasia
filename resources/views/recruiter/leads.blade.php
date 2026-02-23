@extends('recruiter.recruiter_master')
@section('recruiter')
    <style>
        table.dataTable td,
        table.dataTable th {
            white-space: nowrap;
            /* Prevent line breaks */
            vertical-align: middle;
        }

        table.dataTable {
            border-collapse: collapse;
            /* Clean table structure */
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem;
            /* Add space above pagination */
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Facebook leads</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Facebook leads</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">All Leads</h4>


                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Date</th>
                                                <th>Job Title</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Apply Country</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @forelse ($partnerData as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->job_title ?? 'N/A' }}</td>
                                                    <td>{{ $item->name ?? 'N/A' }}</td>
                                                    <td>{{ $item->phone ?? 'N/A' }}</td>
                                                    <td>{{ $item->email ?? 'N/A' }}</td>
                                                    <td>{{ $item->country ?? 'N/A' }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ route('recruiter.social-leads.action', $item->id) }}" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-users"></i> Action
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-danger">
                                                        No leads assigned
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>

                                </div>



                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->













            </div> <!-- container-fluid -->

        </div>
    </div>
@endsection
