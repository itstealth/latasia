@extends('frontend.main_master')
@section('main')

<style>
    @media (max-width: 767px) {
        .side-bar {
            margin-left: 0;
        }
        .job-overview {
            padding: 15px;
        }
        .job-overview h6 {
            font-size: 16px;
        }
        .job-overview .icon {
            font-size: 18px;
            padding: 10px;
        }
        .job-overview .ms-3 h6 {
            font-size: 14px;
        }
        .job-overview .ms-3 p {
            font-size: 12px;
        }
        .btn.btn-primary {
            font-size: 14px;
            padding: 10px;
        }
    }
    </style>
    
    <!-- Page Title -->
    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center text-white">
                    <h3 class="mb-4">Job Details</h3>
                    <nav class="breadcrumb justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active">Job Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SVG Shape -->
    <div class="position-relative" style="z-index: 1">
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                <path fill="" fill-opacity="1"
                    d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
    
    <!-- Job Details Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <div class="card job-detail overflow-hidden">
                        <div>
                            <img src="{{ asset($job_single->job_image) }}" class="img-fluid w-100" style="height: 300px; object-fit: cover; border-bottom: 1px solid #eee;" alt="Job Image">
                        </div>
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-1">{{ $job_single->title }}</h4>
                                    <ul class="list-inline text-muted mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-account"></i> {{ $job_single->vacancy }} Vacancy</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                    <a href="#" class="me-2 text-danger"><i class="uil uil-heart-alt fs-5"></i></a>
                                    <a href="#"><i class="uil uil-setting fs-5"></i></a>
                                </div>
                            </div>
    
                            <!-- Job Meta -->
                            <div class="row mt-4 g-3">
                                @php
                                    $meta = [
                                        ['title' => 'Experience', 'value' => $job_single->rexperince->name],
                                        ['title' => 'Employee type', 'value' => $job_single->rjobtype->name],
                                        ['title' => 'Job Title', 'value' => $job_single->title],
                                        ['title' => 'Salary', 'value' => ($job_single->rsalary->name ?? 'None') . ' / ' . ($job_single->salary_duration ?? 'Negotiable')],
                                    ];
                                @endphp
                                @foreach ($meta as $item)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="border p-3 h-100 rounded">
                                            <p class="text-muted fs-13 mb-1">{{ $item['title'] }}</p>
                                            <p class="fw-semibold mb-0">{{ $item['value'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
    
                            <!-- Job Details -->
                            @foreach ([
                                'Job Description' => $job_single->description,
                                'Responsibilities' => $job_single->responsibility,
                                'Qualification' => $job_single->education,
                                'Skill & Experience' => $job_single->skill,
                                'Benefit' => $job_single->benefit
                            ] as $heading => $content)
                                <div class="mt-4">
                                    <h5>{{ $heading }}</h5>
                                    <p class="text-muted" style="text-align: justify">{!! $content !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
    
                    <!-- Related Jobs -->
                    <div class="mt-5">
                        <h5>Related Jobs</h5>
                        @forelse ($jobs as $item)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-1 col-2">
                                            <img src="{{ asset($item->job_image) }}" class="img-fluid rounded" style="max-height: 50px;" alt="">
                                        </div>
                                        <div class="col-lg-11 col-10">
                                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                <div>
                                                    <h6 class="mb-1">
                                                        <a href="#" class="text-dark">{{ $item->title }}</a>
                                                        <small class="text-muted">({{ $item->rexperince->name ?? 'N/A' }} Exp.)</small>
                                                    </h6>
                                                    <ul class="list-inline mb-1">
                                                        <li class="list-inline-item me-3">
                                                            <i class="mdi mdi-map-marker"></i> {{ $item->rlocation->name ?? 'None' }}
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <i class="uil uil-wallet"></i> {{ $item->rsalary->name ?? 'None' }} / month
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <strong>Vacancy:</strong> {{ $item->vacancy }}
                                                        </li>
                                                    </ul>
                                                    <div class="d-flex flex-wrap gap-2 mt-1">
                                                        <span class="badge bg-light text-success"><b>Job Type:</b> {{ $item->rjobtype->name ?? 'N/A' }}</span>
                                                        @if ($item->is_featured)
                                                            <span class="badge bg-info text-white">Featured</span>
                                                        @endif
                                                        @if ($item->is_urgent)
                                                            <span class="badge bg-danger text-white">Urgent</span>
                                                        @endif
                                                    </div>
                                                    <div class="text-muted mt-1">
                                                        <i class="fas fa-users me-1"></i>{{ $item->rgender->name ?? 'N/A' }}
                                                        <span class="ms-3"><i class="far fa-calendar me-1"></i>{{ $item->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-100">
                                                    <a href="{{ route('candidate.login') }}" class="btn btn-outline-primary w-100 mt-2">
                                                        <i class="uil uil-lock"></i> Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mt-3">No related jobs found.</p>
                        @endforelse
    
                        <div class="text-center mt-4">
                            <a href="{{ route('job_listing') }}" class="btn btn-link">View More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
    
                <!-- Right Sidebar -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card job-overview shadow-sm">
                        <div class="card-body p-4">
                            <h6 class="fs-17 mb-4">Job Overview</h6>
                            @php
                                $overview = [
                                    ['icon' => 'uil-user', 'label' => 'Job Title', 'value' => $job_single->title],
                                    ['icon' => 'uil-location-point', 'label' => 'Location', 'value' => $job_single->rlocation->name ?? 'N/A'],
                                    ['icon' => 'uil-money-withdraw', 'label' => 'Salary', 'value' => $job_single->rsalary->name ?? 'None'],
                                    ['icon' => 'uil-briefcase-alt', 'label' => 'Experience', 'value' => $job_single->rexperince->name],
                                    ['icon' => 'uil-users-alt', 'label' => 'Gender', 'value' => $job_single->rgender->name],
                                    ['icon' => 'uil-calendar-alt', 'label' => 'Posted', 'value' => $job_single->created_at->diffForHumans()],
                                ];
                            @endphp
                            <ul class="list-unstyled">
                                @foreach ($overview as $item)
                                    <li class="d-flex mt-3">
                                        <i class="uil {{ $item['icon'] }} icon bg-primary-subtle text-primary rounded-circle p-2"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-1">{{ $item['label'] }}</h6>
                                            <p class="text-muted mb-0">{{ $item['value'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-4">
                                <a href="{{ route('candidate.login') }}" class="btn btn-primary w-100"><i class="uil uil-lock"></i> Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </section>
    
    
    <!--end back-to-top-->
@endsection
