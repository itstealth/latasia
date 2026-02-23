@extends('frontend.main_master')
@section('main')

<div class="page-content">

                    <!-- Start home -->
                    <section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">Terms and Conditions</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"> Terms and Conditions </li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->
                    </section>
                    <!-- end home -->

                    <!-- START SHAPE -->
                    <div class="position-relative" style="z-index: 1">
                        <div class="shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                                <path fill="#FFFFFF" fill-opacity="1"
                                    d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- END SHAPE -->


                    <!-- START PRIVACY-POLICY -->
                    <section class="section bg-light py-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card shadow-sm border-0 p-5 rounded-4">
                                        <h2 class="mb-5 text-center text-primary" style="font-weight: 700;">Terms and Conditions</h2>
                    
                                        <!-- Policy Sections -->
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-comments text-primary me-2"></i> Candidate Refund Policy
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li><strong>Application & Service Fees:</strong> All application or service fees paid by candidates to Latasia International are non-refundable unless specifically stated otherwise in the service agreement.</li>
                                                <li class="mt-2">Refunds will only be considered in cases where latasia is unable to deliver the service explicitly promised in writing (such as interview scheduling, documentation processing, or employer shortlisting).</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-database text-primary me-2"></i> Visa/Work Permit Processing
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li>If a candidate's visa/work permit application is rejected due to latasia's error, we will refund up to 70% of the service fee, after deducting administrative charges.</li>
                                                <li class="mt-2">If rejection is due to candidate-provided incorrect/incomplete documents or personal profile issues, no refund will be provided.</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-briefcase text-primary me-2"></i> Job Offer Withdrawal
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li>If an employer withdraws a job offer before visa processing has begun and no alternative job is provided within 60 days, a full refund minus administrative charges (10–15%) will be issued.</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-share-alt text-primary me-2"></i> Candidate Withdrawal
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li>If a candidate voluntarily withdraws after acceptance of a job offer or visa processing initiation, no refund will be issued.</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-shield-alt text-primary me-2"></i> Processing Delays
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li>Processing times may vary due to employer, government, and embassy timelines. Delays do not constitute grounds for a refund unless expressly specified.</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-user-shield text-primary me-2"></i> Refund Procedure
                                            </h4>
                                            <ul class="list-unstyled text-muted ps-3">
                                                <li>Submit a formal refund request in writing with supporting documents.</li>
                                                <li class="mt-2">Approved refunds will be processed within 30 to 45 working days from approval.</li>
                                            </ul>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-archive text-primary me-2"></i> Non-Refundable Expenses
                                            </h4>
                                            <p class="text-muted ps-3">
                                                Government fees, embassy visa fees, translations, notarizations, verifications, and courier charges are non-refundable.
                                            </p>
                                        </div>
                    
                                        <hr>
                    
                                        <div class="mb-5">
                                            <h4 class="text-dark mb-3">
                                                <i class="fas fa-external-link-alt text-primary me-2"></i> Important
                                            </h4>
                                            <p class="text-muted ps-3">
                                                Latasia International maintains transparency and fairness. Candidates should carefully read their individual service agreements to understand refund rights.
                                            </p>
                                        </div>
                    
                                        <div class="text-center">
                                            <button onclick="window.print();" class="btn btn-primary btn-lg mt-4">
                                                <i class="fas fa-print me-2"></i> Print
                                            </button>
                                        </div>
                    
                                    </div> <!-- End Card -->
                                </div> <!-- End Col -->
                            </div> <!-- End Row -->
                        </div> <!-- End Container -->
                    </section>
                    
                    
                    <!-- FontAwesome Link for icons (Add in your <head> if not already) -->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
                    
                    <!-- END PRIVACY-POLICY -->

                </div>
                <!-- End Page-content -->

                

@endsection