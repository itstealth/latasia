@extends('admin.admin_master')

@section('admin')

<div class="page-content">
  <div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="mb-0 text-primary"><i class="fas fa-briefcase me-2"></i>List New Jobs</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">List New Jobs</li>
            </ol>
          </nav>
        </div>
        <a href="{{ route('add.new_jobs') }}" class="btn btn-success rounded-pill px-4 py-2">
          <i class="fas fa-plus-circle me-1"></i> Add New Job
        </a>
      </div>
    </div>

    <!-- Data Table -->
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body">
            <h4 class="card-title mb-3 text-dark">Export Job Data</h4>
            <div class="table-responsive">
              <table id="datatable-buttons" class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light text-center">
                  <tr>
                    <th>Sr</th>
                    <th>Job Name</th>
                    <th>Job Category</th>
                    <th>Job Type</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($i = 1)
                  @foreach($jobs as $item)
                  <tr class="text-center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->rcategory?->name ?? 'N/A' }}</td>
                    <td>{{ $item->rjobtype->name }}</td>
                    <td>{{ $item->country }}</td>
                    <td>
                      <a href="{{ route('eidt.job_status', $item->id) }}" class="badge rounded-pill bg-{{ $item->status ? 'success' : 'danger' }} px-3 py-2">
                        {{ $item->status ? 'Active' : 'De-Active' }}
                      </a>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('eidt.new_jobs', $item->id) }}" class="btn btn-outline-primary btn-sm rounded-circle" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('delete.new_jobs', $item->id) }}" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<style>
  .card-title {
    font-weight: 600;
  }
  .table th, .table td {
    vertical-align: middle !important;
  }
  .btn-sm.rounded-circle {
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    font-size: 14px;
  }
</style>


@endsection