@extends('frontend.main_master')
@section('main')

<div class="main-content">

<div class="page-content">
<section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">About Us</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                    <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"> About Us </li>
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
                    <!-- ABOUT US SECTION -->
                    <section class="py-5 bg-light position-relative z-1">
                        <div class="container">
                            <div class="row align-items-center g-lg-5 g-4">
                                <!-- IMAGE SECTION -->
                                <div class="col-lg-6 order-2 order-lg-1">
                                    <div class="position-relative">
                                        <img src="{{ asset('frontend/assets/images/2.png') }}" alt="About Vasper" class="img-fluid rounded-4 shadow-lg w-100">
                    
                                        <!-- Decorative Circles -->
                                        <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle opacity-50" style="width: 70px; height: 70px;"></span>
                                        <span class="position-absolute bottom-0 end-0 translate-middle bg-warning rounded-circle opacity-50" style="width: 40px; height: 40px;"></span>
                                    </div>
                                </div>
                    
                                <!-- TEXT CONTENT -->
                                <div class="col-lg-6 order-1 order-lg-2">
                                    <div class="mb-4">
                                        <h6 class="text-uppercase text-primary fw-bold mb-3" style="font-size: 14px;">About Us</h6>
                                        <h2 class="fw-bold mb-4" style="font-size: 25px; color: #212529; line-height: 1.3;">
                                            At Latasia International <span class="text-primary"></span> it’s not about numbers - it’s about the impact we create.
                                        </h2>
                                        
                                        
                                    </div>
                                    <div class="text-muted" style="font-size: 18px; color: #495057;">
                                        <p class="mb-3">
                                            At <strong style="color:#000;">Latasia International</strong>, we believe every skilled worker deserves a global stage.
                                            We're committed to empowering lives through <strong style="color:#000;">ethical, transparent, and practical recruitment</strong>.
                                        </p>
                                        <p class="mb-3">
                                            From <strong style="color:#000;">construction sites to the shipping industry</strong> to <strong style="color:#000;">across Europe, our talent builds, moves, and powers the world.
                                        </p>
                                        <p>
                                            Whether you're a job-seeker or a global employer, <strong style="color:#000;">we make dreams work.</strong>
                                        </p>
                                    </div>
                    
                                    <!-- Call To Action Button -->
                                    <a href="{{'/contact'}}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm mt-3" style="font-size: 16px;">
                                        Join the Movement
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                    
                    

<!-- OUR MISSION SECTION -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- OUR MISSION SECTION -->
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Our Mission</h2>
            <p class="text-muted mx-auto" style="max-width: 720px;">
                Empowering lives by connecting skilled talent from underserved communities with ethical global employers who value <strong>skill, integrity</strong> and <strong>hard work</strong>.
            </p>
        </div>

        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <img src="{{ asset('frontend/assets/images/blog/mission.jpg') }}" alt="Our Mission" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-lg-6">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-4 d-flex">
                            <i class="fa fa-check-circle text-primary fs-4 me-3"></i>
                            <div>
                                <strong>Skill-Verified Placements</strong><br>
                                Every candidate undergoes practical trade testing for real-world job readiness.
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <i class="fa fa-check-circle text-primary fs-4 me-3"></i>
                            <div>
                                <strong>Transparent Recruitment</strong><br>
                                No hidden charges — we uphold ethical practices from start to finish.
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <i class="fa fa-check-circle text-primary fs-4 me-3"></i>
                            <div>
                                <strong>Cross-Border Expertise</strong><br>
                                From visas to onboarding — we guide every step of the global journey.
                            </div>
                        </li>
                        <li class="d-flex">
                            <i class="fa fa-check-circle text-primary fs-4 me-3"></i>
                            <div>
                                <strong>Stories That Matter</strong><br>
                                Each placement is a journey — from dream to reality, from local to global.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- OUR IMPACT SECTION -->
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <h3 class="fw-bold mb-4">Our Impact So Far</h3>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-3 d-flex">
                            <i class="fa fa-star text-success fs-4 me-3"></i>
                            <div><strong>65+ candidates</strong> placed in <strong>5+ countries</strong></div>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="fa fa-handshake text-success fs-4 me-3"></i>
                            <div><strong>7+ long-term partnerships</strong> with global employers</div>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="fa fa-globe text-success fs-4 me-3"></i>
                            <div><strong>Real transformation stories</strong> from rural towns to thriving global cities</div>
                        </li>
                    </ul>
                    <p class="text-muted mt-3">
                        🤝 <strong>Let’s Build the Future of Work — Together.</strong><br>
                        Whether you’re a skilled worker or an employer, Vasper Staffing is your trusted recruitment partner.
                    </p>
                    <p class="fw-semibold text-primary mt-2">
                        Empowering Talent. Connecting Borders. Changing Lives.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="{{ asset('frontend/assets/images/blog/vision1.jpg') }}" alt="Our Vision" class="img-fluid rounded-4 shadow-sm">
            </div>
        </div>
    </div>
</section>




</div>
</div>
