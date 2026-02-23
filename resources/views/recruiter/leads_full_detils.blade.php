@extends('recruiter.recruiter_master')
@section('recruiter')
    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lead Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                <li class="breadcrumb-item active">Lead Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4>


                            </h4>
                            <hr>
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#lead_overview">Overview</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#candidate_profile">MapToVacancy</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#compliance">Compliance</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#deployment">Deployment</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#timesheets">Timesheets</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#billing_1">Billing</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#commission">Commission</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                                </li>
                            </ul>

                            <div class="tab-content pt-4">

                                <div class="tab-pane fade show active" id="lead_overview">
                                    @include('recruiter.lead_detail.overview')
                                </div>

                                <div class="tab-pane fade" id="candidate_profile">
                                    @include('recruiter.lead_detail.personal')
                                </div>

                                <div class="tab-pane fade" id="compliance">
                                    @include('recruiter.lead_detail.compliance')
                                </div>

                                <div class="tab-pane fade" id="deployment">
                                    @include('recruiter.lead_detail.deployment')
                                </div>

                                <div class="tab-pane fade" id="timesheets">
                                    @include('recruiter.lead_detail.work_timesheet')
                                </div>
                                 

                                <div class="tab-pane fade" id="billing_1">

                                    @include('recruiter.lead_detail.billing')
                                </div>

                                <div class="tab-pane fade" id="commission">
                                    @include('recruiter.lead_detail.commission')
                                </div>

                                <div class="tab-pane fade" id="notes">
                                    @include('recruiter.lead_detail.note')
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Note  Start -->
            <!-- Model Start    -->


            <!-- Model End    -->
            <!-- Note End -->



            <!-- Collapse -->

        </div> <!-- container-fluid -->
    </div>
@endsection
