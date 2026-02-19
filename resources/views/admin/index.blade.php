@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

           <div class="row g-3">

    <!-- Total Recruiters -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Total Recruiters</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-tie fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Employers -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Total Employers</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-building fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Employees -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Total Employees</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Leads -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Total Leads</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-chart-line fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Recruiters -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-dark text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Active Recruiters</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Employers -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-secondary text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Active Employers</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-building-circle-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Leads -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-danger text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Pending Leads</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-hourglass-half fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Completed Leads -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-1 fw-semibold">Completed Leads</p>
                        <h3 class="mb-0">0</h3>
                    </div>
                    <div class="avatar-sm bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-check-circle fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


            <div class="row">

                <!-- end col -->

                <!-- end col -->
            </div>
            <!-- end row -->


            <!-- end row -->
        </div>

    </div>
@endsection
