@extends('admin.admin_master')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">List Job Documents</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">List Job Documents</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Job Documents Button -->
        <div class="mb-3">
            <a href="{{ route('job.document') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add Job Documents
            </a>
        </div>

        <!-- Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Job Documents List</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th style="white-space: nowrap;">Sr</th>
                                        <th style="white-space: nowrap;">Job Title</th>
                                        <th style="white-space: nowrap;">Country</th>
                                        <th style="white-space: nowrap;">Document Name</th>
                                        <th style="white-space: nowrap;">Stage</th>
                                        <th style="white-space: nowrap;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($job_document as $item)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>

                                        <!-- Job Title -->
                                        <td class="fw-semibold text-primary" style="white-space: nowrap;">
                                            {{ $item->job_title }}
                                        </td>

                                        <!-- Country -->
                                        <td style="white-space: nowrap;">
                                            {{ $item->country }}
                                        </td>

                                        <!-- Document Names -->
                                        <td style="white-space: nowrap;">
                                            @if(!empty($item->documents))
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach(explode(',', $item->documents) as $doc)
                                                        <span class="badge rounded-pill bg-primary text-white">
                                                            <i class="fas fa-file-alt me-1"></i>{{ $doc }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="badge rounded-pill bg-secondary text-white">
                                                    No documents
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Stages -->
                                        <td style="min-width: 300px;">
                                            @if(!empty($item->stages))
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach(explode(',', $item->stages) as $stage)
                                                        <span class="badge rounded-pill bg-success text-white">
                                                            <i class="fas fa-tasks me-1"></i>{{ $stage }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="badge rounded-pill bg-secondary text-white">
                                                    No stages
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Actions -->
                                        <td class="text-center" style="white-space: nowrap;">
                                            <a href="{{ route('job.documents.edit', ['job_title' => $item->job_title, 'country' => $item->country]) }}"
                                               class="btn btn-sm btn-warning me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('job.documents.delete', ['job_title' => $item->job_title, 'country' => $item->country]) }}"
                                               class="btn btn-sm btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- table-responsive -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-12 -->
        </div> <!-- row -->
    </div> <!-- container-fluid -->
</div> <!-- page-content -->

<!-- Additional CSS -->
<style>
    table {
        font-size: 14px;
    }
    .badge {
        font-size: 13px;
        padding: 6px 10px;
        line-height: 1.3;
        display: inline-flex;
        align-items: center;
    }
    .badge i {
        font-size: 12px;
    }
</style>

@endsection