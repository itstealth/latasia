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
                            <h4 class="mb-sm-0">Agent leads</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Agent leads</li>
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
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Sr</th>
                                                <th>Date</th>
                                                <th>Employer</th>
                                                <th>Project</th>
                                                <th>Position</th>
                                                <th>Openings</th>
                                                <th>Billing Model</th>
                                                <th>Billing Rate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($vacancies as $key => $vacancy)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>
                                                        {{ $vacancy->created_at->format('d-m-Y') }}
                                                    </td>

                                                    <td>
                                                        <strong>
                                                            {{ $vacancy->employer->company_name ?? $vacancy->employer->name }}
                                                        </strong>
                                                    </td>

                                                    <td>
                                                        {{ $vacancy->project->project_name ?? 'N/A' }}
                                                    </td>

                                                    <td>
                                                        {{ $vacancy->position->title ?? 'N/A' }}
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-info">
                                                            {{ $vacancy->openings }}
                                                        </span>
                                                    </td>

                                                    <td class="text-capitalize">
                                                        {{ str_replace('_', ' ', $vacancy->billing_model) }}
                                                    </td>

                                                    <td>
                                                        ₹{{ number_format($vacancy->billing_rate, 2) }}
                                                    </td>

                                                    <td>
                                                        <span
                                                            class="badge rounded-pill
                            @if ($vacancy->status === 'Open') bg-success
                            @elseif($vacancy->status === 'Filled') bg-primary
                            @else bg-danger @endif">
                                                            {{ $vacancy->status }}
                                                        </span>
                                                    </td>

                                                    {{-- ACTION --}}
                                                    <td>
                                                        <a href="{{ route('recruiter.add.candidates', $vacancy->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-users"></i>
                                                            Add Candidates
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center text-danger">
                                                        No vacancies assigned to you
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
