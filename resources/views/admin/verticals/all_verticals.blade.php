@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-primary mb-0">List Verticals</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-decoration-none text-secondary">
                                Tables
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">
                            List Verticals
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Add Button -->
        <div class="row mb-3">
            <div class="col-12 text-end">
                <a href="{{ route('add.verticals') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Add Verticals
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3 text-secondary">
                            Verticals Data
                        </h5>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-hover align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th>Title</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @forelse($verticals_all as $item)
                                        <tr>
                                            <td class="fw-semibold text-dark">{{ $i++ }}</td>
                                            <td class="text-dark">{{ $item->title }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('eidt.verticals', $item->id) }}"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                    <a href="{{ route('delete.verticals', $item->id) }}"
                                                        class="btn btn-sm btn-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this vertical?')">
                                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">
                                                No verticals found.
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


@endsection