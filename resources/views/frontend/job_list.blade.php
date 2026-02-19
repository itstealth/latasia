@extends('frontend.main_master')
@section('main')

    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Job List</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Job List</a></li>
                                    
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

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="me-lg-5">

                        <div class="job-list-header">
                            <form action="{{ route('job_listing') }}" method="get">
                                <div class="row g-2">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="filler-job-form">
                                            <i class="uil uil-briefcase-alt"></i>
                                            <input type="search" class="form-control filter-job-input-box" name="title"
                                                id="exampleFormControlInput1" placeholder="Job Title... ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="filler-job-form">

                                            <select class="form-select" data-trigger name="category" id=""
                                                aria-label="Default select example">

                                                <option value="">Select Job Category</option>
                                                @foreach ($job_category as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($form_category == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="filler-job-form">

                                            <select class="form-select" data-trigger name="location" id=""
                                                aria-label="Default select example">
                                                <option value="">Select Job Location</option>
                                                @foreach ($job_location as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($form_location == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary submit-btn w-100 h-100" type="submit"><i
                                                class="uil uil-search me-1"></i> Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- -->
                        <!-- Job-list -->
                        @if (!$jobs->count())
                            <div class="text-danger">No Result Found</div>
                        @else
                            @foreach ($jobs as $item)
                                
                                    <div class="container my-5">
                                <div class="card border-0 shadow rounded-4 overflow-hidden mb-4">
                                    <div class="row g-0">
                                        <!-- Job Image -->
                                        <div class="col-md-4">
                                            <a href="{{ route('job_detail', $item->id) }}">
                                                <img src="{{ asset($item->job_image) }}" alt="Job Image" 
                                                     class="img-fluid w-100 h-100 object-fit-cover" 
                                                     style="min-height: 250px; max-height: 250px; object-fit: cover;">
                                            </a>
                                        </div>
                            
                                        <!-- Job Content -->
                                        <div class="col-md-8 p-4 d-flex flex-column justify-content-between">
                                            
                                            <!-- Header -->
                                            <div>
                                                <h5 class="fw-bold mb-2">
                                                    <a href="{{ route('job_detail', $item->id) }}" class="text-dark text-decoration-none">
                                                        {{ $item->title }}
                                                    </a>
                                                </h5>
                                                <small class="text-muted">
                                                    <i class="fas fa-briefcase me-1 text-primary"></i> {{ $item->rexperince->name }} Experience
                                                </small>
                            
                                                <div class="mt-3 d-flex flex-wrap gap-2">
                                                    <span class="badge bg-light text-dark border">Type: {{ $item->rjobtype->name }}</span>
                                                    @if ($item->is_featured)
                                                        <span class="badge bg-info text-white">Featured</span>
                                                    @endif
                                                    @if ($item->is_urgent)
                                                        <span class="badge bg-danger text-white">Urgent</span>
                                                    @endif
                                                </div>
                                            </div>
                            
                                            <!-- Job Info -->
                                            <div class="row g-2 mt-4 text-muted small">
                                                <div class="col-sm-6 col-md-6">
                                                    <i class="fas fa-users me-2 text-success"></i> Gender: <strong>{{ $item->rgender->name }}</strong>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i> Location: <strong>{{ $item->rlocation->name ?? 'None' }}</strong>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <i class="fas fa-wallet me-2 text-warning"></i> Salary: <strong>{{ $item->rsalary->name ?? 'None' }}</strong>/mo
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <i class="fas fa-user-plus me-2 text-primary"></i> Vacancy: <strong>{{ $item->vacancy }}</strong>
                                                </div>
                                            </div>
                            
                                            <!-- Footer -->
                                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                                <!-- Social Share -->
                                                <div class="d-flex gap-3">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('job_detail', $item->id)) }}" 
                                                       target="_blank" title="Share on Facebook" class="text-primary fs-5">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('job_detail', $item->id)) }}" 
                                                       target="_blank" title="Share on LinkedIn" class="text-primary fs-5">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($item->title . ' - ' . route('job_detail', $item->id)) }}" 
                                                       target="_blank" title="Share on WhatsApp" class="text-success fs-5">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </a>
                                                </div>
                            
                                                <!-- Apply Button -->
                                                <a href="" class="btn btn-primary rounded-pill px-4">
                                                    <i class="fas fa-paper-plane me-2"></i> Apply Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Updated Styles -->
                            <style>
                                .card {
                                    background-color: #fff;
                                    border-radius: 1rem;
                                }
                                .card img {
                                    border-radius: 0;
                                    transition: transform 0.3s ease;
                                }
                                .card img:hover {
                                    transform: scale(1.03);
                                }
                                .badge {
                                    font-size: 0.85rem;
                                    padding: 5px 10px;
                                }
                                .btn-primary {
                                    font-size: 1rem;
                                    font-weight: 500;
                                }
                                .row.g-2 {
                                    font-size: 0.95rem;
                                }
                                a.text-dark:hover {
                                    color: #0d6efd !important;
                                }
                                .social-share a {
                                    transition: transform 0.2s ease;
                                }
                                .social-share a:hover {
                                    transform: scale(1.1);
                                }
                            </style>



                            @endforeach
                        @endif
                        <!-- End Job-list -->
                        <!-- Pagination  -->
                        <div class="row">
                            <div class="col-lg-12 mt-4 pt-2">

                                {{ $jobs->links() }}

                                {{-- {{ $data->links('pagination.custom') }} --}}

                            </div><!--end col-->
                        </div><!-- end row -->
                    </div>

                </div>
                <!-- START SIDE-BAR -->
                
        </div>
    </section>



@endsection
