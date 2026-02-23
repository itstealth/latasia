@extends('recruiter.recruiter_master')

@section('recruiter')
    <style>
        table.dataTable td,
        table.dataTable th {
            white-space: nowrap;
            vertical-align: middle;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Interested Leads</h4>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    
                                    <th>Lead Code</th>
                                    <th>Employer</th>
                                    <th>Job Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    
                                    <th>Disposition</th>

                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @forelse ($leads as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->lead_code ?? 'N/A' }}</td>
                                        <td> {{ $item->employer->name ?? 'N/A' }}</td>
                                           
                                        
                                        
                                        <td>{{ $item->job_title ?? 'N/A' }}</td>
                                            <td>{{ $item->name ?? 'N/A' }}</td>
                                            <td>{{ $item->email ?? 'N/A' }}</td>
                                        <td>{{ $item->phone ?? 'N/A' }}</td>
                                         <td>{{ $item->countryRelation?->name ?? 'N/A' }}</td>
                                         
                                        <td>
                                            <span class="badge bg-success">
                                                {{ ucfirst($item->lead_disposition) }}
                                            </span>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">
                                            No leads found
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
@endsection
