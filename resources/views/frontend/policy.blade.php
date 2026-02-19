@extends('frontend.main_master')
@section('main')

<div class="page-content">

                    <!-- Start home -->
                    <section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">Privacy & Policy</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"> Privacy & Policy </li>
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
                                    <div class="card shadow-sm border-0 p-4 rounded-4">
                                        <h2 class="mb-4 text-center">Privacy Policy</h2>
                    
                                        <!-- Welcome Section -->
                                        <div class="mb-5">
                                            <!--<h5 class="mb-3"><i class="fas fa-comments text-primary me-2"></i>Comments</h5>-->
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>Welcome to Latasia International.</strong></li>
                                                <li>We respect your privacy and are committed to protecting your personal data. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <b>[www.latasia.eu]</b> or use our services.</li>
                                            </ul>
                                        </div>
                    
                                        <!-- Information We Collect -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-database text-primary me-2"></i>Information We Collect</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>We may collect and process the following types of information:</strong></li>
                                                <li>Personal Information: Name, Email address, Phone number, Location, Resume/CV, and other job-related data.</li>
                                                <li>Usage Information: Details about your visits to our website, including traffic data, logs, and other communication data.</li>
                                                <li>Cookies and Tracking Technologies: We may use cookies to enhance your experience on our site.</li>
                                            </ul>
                                        </div>
                    
                                        <!-- How We Use Your Information -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-briefcase text-primary me-2"></i>How We Use Your Information</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>We use the information we collect to:</strong></li>
                                                <li>Provide staffing and recruitment services.</li>
                                                <li>Match candidates with job opportunities.</li>
                                                <li>Communicate with you regarding your inquiries or applications.</li>
                                                <li>Improve our website and services.</li>
                                                <li>Send you newsletters or promotional materials (only if you opt-in).</li>
                                            </ul>
                                        </div>
                    
                                        <!-- Sharing Information -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-share-alt text-primary me-2"></i>Sharing Your Information</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>We may share your information with:</strong></li>
                                                <li>Employers and clients seeking staffing solutions.</li>
                                                <li>Affiliates and trusted service providers (e.g., background check services).</li>
                                                <li>Government authorities when required by law.</li>
                                                <li><strong>Note:</strong> We do not sell or rent your personal data to third parties for marketing purposes.</li>
                                            </ul>
                                        </div>
                    
                                        <!-- Data Security -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-shield-alt text-primary me-2"></i>Data Security</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li>We implement appropriate security measures to protect your data from unauthorized access, misuse, or disclosure.</li>
                                                <li>However, no method of Internet transmission is 100% secure. We strive to protect your information but cannot guarantee absolute security.</li>
                                            </ul>
                                        </div>
                    
                                        <!-- Your Data Rights -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-user-shield text-primary me-2"></i>Your Data Rights</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>You have the right to:</strong></li>
                                                <li>Access, update, or delete your personal information.</li>
                                                <li>Withdraw consent at any time.</li>
                                                <li>Object to or restrict certain processing activities.</li>
                                                <li>Contact us at <b>[info@latasia.eu]</b> to exercise these rights.</li>
                                            </ul>
                                        </div>
                    
                                        <!-- Retention of Information -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-archive text-primary me-2"></i>Retention of Information</h5>
                                            <p class="text-muted">We will retain your personal data as long as necessary to fulfill the purposes outlined in this policy unless longer retention is required by law.</p>
                                        </div>
                    
                                        <!-- Third-Party Websites -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-external-link-alt text-primary me-2"></i>Third-Party Websites</h5>
                                            <p class="text-muted">Our website may contain links to external websites. We are not responsible for their content or privacy practices.</p>
                                        </div>
                    
                                        <!-- Updates to Policy -->
                                        <div class="mb-5">
                                            <h5 class="mb-3"><i class="fas fa-sync-alt text-primary me-2"></i>Updates to This Privacy Policy</h5>
                                            <p class="text-muted">We may update this Privacy Policy periodically. Please review this page regularly. Continued use of our services indicates your acceptance of the changes.</p>
                                        </div>
                    
                                        <!-- Contact Us -->
                                        <div class="mb-4">
                                            <h5 class="mb-3"><i class="fas fa-envelope text-primary me-2"></i>Contact Us</h5>
                                            <ul class="list-unstyled text-muted">
                                                <li><strong>Latasia International</strong></li>
                                                <li><strong>Email:</strong> info@latasia.eu
</li>
                                                <li><strong>Phone:</strong> +39 339 186 0672
</li>
                                                <li><strong>Address:</strong> Latvia</li>
                                            </ul>
                                        </div>
                    
                                        <div class="text-end">
                                            <button onclick="window.print();" class="btn btn-primary"><i class="fas fa-print me-2"></i>Print</button>
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