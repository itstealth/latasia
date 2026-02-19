@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Of Employer</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">List Of Employer</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Page Header -->
<div class="row mb-3 align-items-center">
    <div class="col-md-6">
        <h4 class="mb-0 fw-semibold">Employer Management</h4>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('add.employer') }}" class="btn btn-primary">
            <i class="fas fa-building me-1"></i> Add New Employer
        </a>
    </div>
</div>

<!-- Employer Table -->
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
                                <th style="width:5%">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="width:12%">Status</th>
                                <th style="width:15%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($employers as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="fw-semibold">{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>

                                    <!-- Status Badge -->
                                    <td>
                                        <a href="{{ route('change.employer.status', $item->id) }}"
                                           class="badge rounded-pill
                                           {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                            {{ $item->status ? 'Active' : 'Inactive' }}
                                        </a>
                                    </td>

                                    <!-- Action Buttons -->
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('edit.employer', $item->id) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit Employer">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('delete.employer', $item->id) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               title="Delete Employer"
                                               onclick="return confirm('Are you sure you want to delete this employer?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
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
