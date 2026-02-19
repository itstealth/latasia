@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Of Commission Rule</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">List Of Commission Rule</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Page Header -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-semibold">Commission Rule Management</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('add.recruiter.commission.rule') }}" class="btn btn-primary">
                            <i class="fas fa-building me-1"></i> Add New Commission Rule
                        </a>
                    </div>
                </div>

                <!-- Project Table -->
                <div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="card-title mb-3 text-muted">
                    Recruiter Commission Rules
                </h5>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-nowrap">
                            <tr>
                                <th style="width:50px">#</th>
                                <th>Recruiter</th>
                                <th>Employer</th>
                                <th>Vacancy</th>
                                <th>Commission Type</th>
                                <th>Commission Value</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($rules as $key => $rule)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    {{-- Recruiter --}}
                                    <td class="fw-semibold">
                                        {{ $rule->recruiter->name ?? 'N/A' }}
                                    </td>

                                    {{-- Employer --}}
                                    <td>
                                        {{ $rule->employer->company_name ?? $rule->employer->name ?? 'N/A' }}
                                    </td>

                                    {{-- Vacancy --}}
                                    <td>
                                        {{ $rule->vacancy->position->title ?? 'N/A' }}
                                    </td>

                                    {{-- Commission Type --}}
                                    <td class="text-capitalize">
                                        {{ $rule->commission_type }}
                                    </td>

                                    {{-- Commission Value --}}
                                    <td class="fw-semibold">
                                        @if ($rule->commission_type === 'percentage')
                                            {{ $rule->commission_value }}%
                                        @else
                                            ₹{{ number_format($rule->commission_value, 2) }}
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        <span class="badge rounded-pill
                                            {{ $rule->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($rule->status) }}
                                        </span>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('edit.recruiter.commission.rule', $rule->id) }}"
                                               class="btn btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('delete.recruiter.commission.rule', $rule->id) }}"
                                               class="btn btn-outline-danger"
                                               onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-percent fa-3x mb-3"></i>
                                            <p class="mb-0 fw-semibold">
                                                No recruiter commission rules found
                                            </p>
                                            <small>Create rules to calculate recruiter payouts</small>
                                        </div>
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

            </div>
        </div>
    @endsection
