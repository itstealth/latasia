@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Of Positions</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">List Of Positions</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Page Header -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-semibold">Position Management</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('add.position') }}" class="btn btn-primary">
                            <i class="fas fa-building me-1"></i> Add New Position
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
                                    <table id="datatable-buttons"
    class="table table-striped table-bordered align-middle w-100">

    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Position Title</th>
            <th>Project</th>
            <th>Employer</th>
            
            <th>Employment Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($positions as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>

                <!-- Position Title -->
                <td class="fw-semibold">{{ $item->title }}</td>

                <!-- Project Name -->
                <td>{{ $item->project->project_name ?? 'N/A' }}</td>

                <!-- Employer Name -->
                <td>{{ $item->project->employer->name ?? 'N/A' }}</td>

                <!-- Skills -->
               

                <!-- Employment Type -->
                <td class="text-capitalize">
                    {{ str_replace('_', ' ', $item->employment_type) }}
                </td>

                <!-- Status -->
                <td>
                                        <a href="{{ route('change.position.status', $item->id) }}"
                                           class="badge rounded-pill
                                           {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                            {{ $item->status ? 'Active' : 'Inactive' }}
                                        </a>
                                    </td>


                <!-- Actions -->
                <td>
                    <div class="btn-group">
                        <a href="{{ route('edit.position', $item->id) }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('delete.position', $item->id) }}"
                            class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center text-muted">
                    No positions found
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
