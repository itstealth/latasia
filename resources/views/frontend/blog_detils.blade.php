@extends('frontend.main_master')
@section('main')
<style>
.blog-content p {
    margin-bottom: 1.5rem;
    color: #444;
    font-family: 'Segoe UI', sans-serif;
}

.blog-content h2, .blog-content h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #222;
}

.fst-italic {
    font-style: italic;
}

    </style>
<section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">Weekly Journal Details</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Weekly Journal</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"> Weekly Journal Details </li>
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
                                <path fill="" fill-opacity="1"
                                    d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                            </svg>
                        </div>
                    </div>

                    <section class="py-5" style="background-color: #f9f9f9;">
                        <div class="container">
                            <!-- Blog Header -->
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-center">
                                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; color: #333;">
                                        {{ $blogs_details->title }}
                                    </h1>
                                    <p class="text-muted fst-italic">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        {{ $blogs_details->created_at->format('F j, Y') }}
                                    </p>
                    
                                    <!-- Post By Info -->
                                    <!--<p class="fst-italic text-muted mb-0">-->
                                    <!--    By Puja Saluja, CEO and Founder – Vasper Staffing-->
                                    <!--</p>-->
                    
                                    <!-- LinkedIn Share Button -->
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                       target="_blank"
                                       class="btn btn-primary rounded-pill mt-3 px-4 py-2"
                                       style="font-size: 0.95rem;">
                                        <i class="fab fa-linkedin me-2"></i> Share on LinkedIn
                                    </a>
                                </div>
                            </div>
                    
                            <!-- Blog Image -->
                            <div class="row justify-content-center mt-5">
                                <div class="col-lg-10">
                                    <div class="overflow-hidden rounded-4 shadow-sm">
                                        <img src="{{ asset($blogs_details->quick_image) }}"
                                             alt="{{ $blogs_details->title }}"
                                             class="img-fluid w-100"
                                             style="max-height: 450px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Blog Content -->
                            <div class="row justify-content-center mt-5">
                                <div class="col-lg-10">
                                    <div class="bg-white p-5 rounded-4 shadow-sm" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                                        {!! $blogs_details->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                    
                    
                    
                    

@endsection