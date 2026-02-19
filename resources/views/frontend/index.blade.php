@extends('frontend.main_master')
@section('main')
@php
$verticals_all =App\Models\Verticals::latest()->get();
$quick_all = App\Models\Quick::orderBy('id', 'DESC')->take(3)->get();

@endphp
<!-- START HOME -->
<section class="bg-home2" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="mb-4 pb-3 me-lg-5">
                   
                    <h1 class="display-5 fw-semibold mb-3">Find your dream jobs with <span style="color: #1D649E">Vasper</span></h1>
                    <p class="lead text-muted mb-0">Find jobs, create trackable resumes and enrich your applications.Carefully crafted after analyzing the needs of different industries.</p>
                </div>
                <form action="{{ route('job_listing') }}" method="get">

                    <div class="registration-form">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="filter-search-form filter-border mt-3 mt-md-0">
                                    <i class="uil uil-briefcase-alt"></i>
                                    <input type="search" id="job-title" name="title" class="form-control filter-input-box" placeholder="Job Title...">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="filter-search-form mt-3 mt-md-0">
                                    <i class="uil uil-map-marker"></i>
                                    <select class="form-select" data-trigger name="location" id="choices-single-location" aria-label="Default select example">
                                        <option value="">Job Location</option>
                                        @foreach ($job_location as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <input type="hidden" name="category" value="">
                                <input type="hidden" name="type" value="">
                                <input type="hidden" name="experince" value="">
                                <input type="hidden" name="gender" value="">
                                <input type="hidden" name="salary" value="">
                                <div class="mt-3 mt-md-0 h-100">
                                    <button class="btn btn-primary submit-btn w-100 h-100" type="submit"><i class="uil uil-search me-1"></i> Find Job</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </form>
            </div>
            <!--end col-->
            <div class="col-lg-5">
                <div class="mt-5 mt-md-0">
                    <img src="{{ asset('frontend/assets/images/12.png') }}" alt="" class="home-img" />
                </div>
            </div><!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- End Home -->

<!-- START SHAPE -->
<div class="position-relative">
    <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 220">
            <g mask="url(&quot;#SvgjsMask1004&quot;)" fill="none">
                <path d="M 0,213 C 288,186.4 1152,106.6 1440,80L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
            </g>
            <defs>
                <mask id="SvgjsMask1004">
                    <rect width="1440" height="250" fill="#ffffff"></rect>
                </mask>
            </defs>
        </svg>
    </div>
</div>
<!-- END SHAPE -->

<!-- START CATEGORY -->

<!-- END CATEGORY -->
<section class="py-20 dark:bg-neutral-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Browser Jobs Categories</h3>

            </div>
        </div>
        <div class="row">
            @foreach($jobCategories as $item)
           
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
                <div class="popu-category-box rounded text-center">
                    <div class="popu-category-icon icons-md">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <div class="popu-category-content mt-4">
                        <a href="{{ url('job-listing?category='.$item->id) }}" class="text-dark stretched-link">
                            <h5 class="fs-18">{{ $item->name }}</h5>
                        </a>
                         <p class="text-muted mb-0">{{ $item->rjob_count }}  Jobs</p> 
                    </div>
                </div><!--end popu-category-box-->
            </div>
            @endforeach
            
        </div>
        <div class="grid grid-cols-1">
            <div class="mt-5 text-center">
                <a href="{{ url('job-listing?category='.$item->id) }}" class="text-white border-transparent group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 btn hover:-translate-y-2">Browse All Categories <i class="uil uil-arrow-right ms-1"></i></a>
            </div>
        </div>


    </div>
</section>
<!-- START JOB-LIST -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title">New & Random Jobs</h4>
                    
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <ul class="job-list-menu nav nav-pills nav-justified flex-column flex-sm-row mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="recent-jobs-tab" data-bs-toggle="pill" data-bs-target="#recent-jobs" type="button" role="tab" aria-controls="recent-jobs" aria-selected="true">Recent Jobs</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="featured-jobs-tab" data-bs-toggle="pill" data-bs-target="#featured-jobs" type="button" role="tab" aria-controls="featured-jobs" aria-selected="false">Featured Jobs</button>

                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="full-time-tab" data-bs-toggle="pill" data-bs-target="#full-time" type="button" role="tab" aria-controls="full-time" aria-selected="false">Full Time</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="freelancer-tab" data-bs-toggle="pill" data-bs-target="#freelancer" type="button" role="tab" aria-controls="freelancer" aria-selected="false">Freelancer</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="part-time-tab" data-bs-toggle="pill" data-bs-target="#part-time" type="button" role="tab" aria-controls="part-time" aria-selected="false">Part Time</button>
                    </li>
                   
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="recent-jobs" role="tabpanel" aria-labelledby="recent-jobs-tab">
                        @foreach($recentJobs as $item)
                        <div>
                            <div class="job-box bookmark-post card mt-5">

                                <div class="p-4">

                                    <div class="row">

                                        <div class="col-lg-1">
                                            <a href="{{ route('job_detail', $item->id) }}"><img src="{{ asset($item->job_image) }}" alt="" class="img-fluid rounded-3"></a>
                                        </div><!--end col-->
                                        <div class="col-lg-10">
                                            <div class="mt-3 mt-lg-0">
                                                <h5 class="fs-17 mb-1"><a href="{{ route('job_detail', $item->id) }}" class="text-dark">{{ $item->title}}</a> <small class="text-muted fw-normal">({{$item->rexperince->name}} Exp.)</small></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><b>Vacancy</b> :{{ $item->vacancy }}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i>{{ $item->rlocation->name ?? 'None' }}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> {{$item->rsalary->name ?? 'None'}} / month</p>
                                                    </li>
                                                </ul>
                                                <div class="mt-2">

                                                    <span class="badge bg-success-subtle text-success  mt-1"><b>Job Type</b> : {{$item->rjobtype->name}}</span>
                                                    @if( $item->is_featured == 1)
                                                    <span class="badge bg-info-subtle text-info fs-13 mt">Feature</span>
                                                    @endif
                                                    @if($item->is_urgent == 1)
                                                    <span class="badge bg-danger-subtle text-danger fs-13 mt-1">Urgent</span>
                                                    @endif
                                                </div>


                                                <div class="mt-2">
                                                    <p class="text-muted fs-14 mb-0"><i class="fas fa-users"></i>: {{$item->rgender->name}} </p>

                                                </div>
                                                <div class="mt-2">
                                                    <p class="text-muted fs-14 mb-0"><i class="far fa-calendar"></i>: {{$item->created_at->diffForHumans()}} </p>

                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <!-- Start BookMark -->
                                    <div class="favorite-icon">
                                        <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                                    </div>
                                    <!-- End BookMark -->
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row justify-content-between">
                                        <div class="col-md-8">

                                        </div>
                                        <!--end col-->
                                        <div class="col-md-3">
                                            <div class="text-md-end">
                                            <a href="{{ route('candidate.signup') }}" class="btn btn-primary w-100" data-bs-toggle=""><i class="uil uil-lock"></i>Apply</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                </div>

                            </div>


                        </div>
                        @endforeach
                        <!--end job-box-->
                        <div class="text-center mt-4 pt-2">
                            <a href="{{ route('job_listing') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                        </div>

                    </div>
                    <!--end recent-jobs-tab-->

                    <div class="tab-pane fade" id="featured-jobs" role="tabpanel" aria-labelledby="featured-jobs-tab">
                        @foreach($featured as $item)
                        <div>
                            <div class="job-box bookmark-post card mt-5">

                                <div class="p-4">

                                    <div class="row">

                                        <div class="col-lg-1">
                                            <a href="{{ route('job_detail', $item->id) }}"><img src="{{ asset($item->job_image) }}" alt="" class="img-fluid rounded-3"></a>
                                        </div><!--end col-->
                                        <div class="col-lg-10">
                                            <div class="mt-3 mt-lg-0">
                                                <h5 class="fs-17 mb-1"><a href="{{ route('job_detail', $item->id) }}" class="text-dark">{{ $item->title}}</a> <small class="text-muted fw-normal">({{$item->rexperince->name}} Exp.)</small></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><b>Vacancy</b> :{{ $item->vacancy }}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{$item->rlocation->name}} </p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> {{$item->rsalary->name}} / month</p>
                                                    </li>
                                                </ul>
                                                <div class="mt-2">

                                                    <span class="badge bg-success-subtle text-success  mt-1"><b>Job Type</b> : {{$item->rjobtype->name}}</span>
                                                    @if( $item->is_featured == 1)
                                                    <span class="badge bg-info-subtle text-info fs-13 mt">Feature</span>
                                                    @endif
                                                    @if($item->is_urgent == 1)
                                                    <span class="badge bg-danger-subtle text-danger fs-13 mt-1">Urgent</span>
                                                    @endif
                                                </div>


                                                <div class="mt-2">
                                                    <p class="text-muted fs-14 mb-0"><i class="fas fa-users"></i>: {{$item->rgender->name}} </p>

                                                </div>
                                                <div class="mt-2">
                                                    <p class="text-muted fs-14 mb-0"><i class="far fa-calendar"></i>: {{$item->created_at->diffForHumans()}} </p>

                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <div class="favorite-icon">
                                        <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                                    </div>
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row justify-content-between">
                                        <div class="col-md-8">

                                        </div>
                                        <!--end col-->
                                        <div class="col-md-3">
                                            <div class="text-md-end">
                                            <a href="{{ route('candidate.signup') }}" class="btn btn-primary w-100" data-bs-toggle=""><i class="uil uil-lock"></i>Apply</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                </div>

                            </div>


                        </div>
                        @endforeach

                        <div class="text-center mt-4 pt-2">
                            <a href="{{ route('job_listing') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                    <!--end featured-jobs-tab-->
                 <!--Start  freelancer-jobs-tab-->
                    <div class="tab-pane fade" id="freelancer" role="tabpanel" aria-labelledby="freelancer-tab">

                        <div class="text-center mt-4 pt-2">
                            <a href="{{ route('job_listing') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                    <!--end freelancer-tab-->

               <!--Start part-time-jobs-tab-->
                    <div class="tab-pane fade" id="part-time" role="tabpanel" aria-labelledby="part-time-tab">
                        
                    <div class="text-center mt-4 pt-2">
                            <a href="{{ route('job_listing') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                    <!--end part-time-tab-->
                 <!--start  full-time-tab-->
                    <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="full-time-tab">
                       
                    @foreach($fulltime as $item)
                        <div>
                            <div class="job-box bookmark-post card mt-5">

                                <div class="p-4">

                                    <div class="row">

                                        <div class="col-lg-1">
                                            <a href="{{ route('job_detail', $item->id) }}"><img src="{{ asset($item->job_image) }}" alt="" class="img-fluid rounded-3"></a>
                                        </div><!--end col-->
    <div class="col-lg-10">
        <div class="mt-3 mt-lg-0">
            <h5 class="fs-17 mb-1"><a href="{{ route('job_detail', $item->id) }}" class="text-dark">{{ $item->title}}</a> <small class="text-muted fw-normal">({{$item->rexperince->name}} Exp.)</small></h5>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <p class="text-muted fs-14 mb-0"><b>Vacancy</b> :{{ $item->vacancy }}</p>
                </li>
                <li class="list-inline-item">
                    <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{$item->rlocation->name}} </p>
                </li>
                <li class="list-inline-item">
                    <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> {{$item->rsalary->name}} / month</p>
                </li>
            </ul>
            <div class="mt-2">

                <span class="badge bg-success-subtle text-success  mt-1"><b>Job Type</b> : {{$item->rjobtype->name}}</span>
                @if( $item->is_featured == 1)
                <span class="badge bg-info-subtle text-info fs-13 mt">Feature</span>
                @endif
                @if($item->is_urgent == 1)
                <span class="badge bg-danger-subtle text-danger fs-13 mt-1">Urgent</span>
                @endif
            </div>


            <div class="mt-2">
                <p class="text-muted fs-14 mb-0"><i class="fas fa-users"></i>: {{$item->rgender->name}} </p>

            </div>
            <div class="mt-2">
                <p class="text-muted fs-14 mb-0"><i class="far fa-calendar"></i>: {{$item->created_at->diffForHumans()}} </p>

            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->
<div class="favorite-icon">
    <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
</div>
</div>
    <div class="p-3 bg-light">
        <div class="row justify-content-between">
            <div class="col-md-8">

            </div>
            <!--end col-->
            <div class="col-md-3">
                <div class="text-md-end">
                <a href="{{ route('candidate.signup') }}" class="btn btn-primary w-100" data-bs-toggle=""><i class="uil uil-lock"></i>Apply</a>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>

</div>
</div>
 @endforeach
<div class="text-center mt-4 pt-2">
    <a href="j{{ route('job_listing') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
</div>
</div>
<!--end full-time-tab-->
</div>
</div>
<!--end col-->
</div>
        <!--end row-->
    </div>
    <!--end container-->
</section>


@include ('frontend.home_all.home_Verticals')

<section class="section">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="section-title me-5">
                                        <h3 class="title">How It Works ?</h3>
                                        <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                                            right freelancers.</p>
                                        <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        1
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Register an account</h5>
                                                        <p class="text-muted mb-0">Register your account  By simply  putting in your mail id, contact number, and attaching your resume.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        2
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Find your Job</h5>
                                                        <p class="text-muted mb-0">Select your dream destination country to find current openings in the country or browse by skills.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                                <div class=" d-flex">
                                                    <div class="number flex-shrink-0">
                                                        3
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Apply for Job</h5>
                                                        <p class="text-muted mb-0">Apply to selected positions by punching in your details.
 our team will connect with you within 48 hours to get you going to achieve your dream to settle abroad.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <img src="{{ asset('frontend/assets/images/3r.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <img src="{{ asset('frontend/assets/images/2r.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <img src="{{ asset('frontend/assets/images/1r.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div> <!--end row-->
                        </div><!--end container-->
                    </section>
<!-- END PROCESS -->




<!-- START BLOG -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-5">
                    <h3 class="title mb-3">Quick Career Tips</h3>
                    <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                        right freelancers.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            @foreach($quick_all as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-box card p-2 mt-3">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="{{ asset( $item->quick_image) }}" alt="" class="img-fluid">
                        <div class="bg-overlay"></div>
                        
                       
                    </div>
                    <div class="card-body">
                        <a href="{{ route('carrer.details', $item->id) }}" class="primary-link">
                            <h5 class="fs-17">{{ $item->title }}</h5>
                        </a>
                        <p class="text-muted">
                        {!! Illuminate\Support\Str::limit($item->description, 100) !!}
                        </p>
                        <a href="{{ route('carrer.details', $item->id) }}" class="form-text text-primary">Read more <i class="mdi mdi-chevron-right align-middle"></i></a>
                    </div>
                </div><!--end blog-box-->
            </div><!--end col-->

            @endforeach

            
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END BLOG -->

<!-- START CLIENT -->

<!-- END CLIENT -->






<div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
    <div>
        <h6>Select your color</h6>
        <ul class="pattern list-unstyled mb-0">
            <li>
                <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
            </li>
            <li>
                <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
            </li>
            <li>
                <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
            </li>
        </ul>
        <div class="mt-3">
            <h6>Light/dark Layout</h6>
            <div class="text-center mt-3">
                <!-- light-dark mode -->
                <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                    <i class="uil uil-brightness mode-dark mx-auto"></i>
                    <i class="uil uil-moon mode-light"></i>
                </a>
                <!-- END light-dark Mode -->
            </div>
        </div>
    </div>

</div>
<!-- end switcher-->

<!--start back-to-top-->
<button onclick="topFunction()" id="back-to-top">
    <i class="mdi mdi-arrow-up"></i>
</button>
<!--end back-to-top-->


@endsection