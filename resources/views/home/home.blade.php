@php
    $verticals_all = App\Models\Verticals::latest()->get();
    $quick_all = App\Models\Quick::orderBy('id', 'DESC')->take(3)->get();
@endphp

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from thewebmax.org/jobzilla/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Dec 2023 08:50:39 GMT -->

<head>
    <style>
  
/* Remove extra space globally if still showing */
.section-full,
.bg-light,
.container {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

h6, h2 {
    margin-top: 0 !important;
}

        .twm-jobs-list-style1 {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .twm-media {
            flex-shrink: 0;
            width: 250px;
            /* Adjust width as needed */
            height: 150px;
            /* Adjust height as needed */
            overflow: hidden;
            border-radius: 5px;
        }

        .twm-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the entire box without distortion */
        }

        .twm-mid-content {
            flex: 1;
            margin-left: 15px;
        }

        .twm-right-content {
            text-align: right;
        }

        .btn-apply {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-apply:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }

        .slide-img-full img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .twm-banner-content-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            display: flex;
            align-items: center;
        }

        .twm-bnr-left-section {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 10px;
        }

        .twm-bnr-blocks-3 {
            margin-top: 50px;
        }

        .twm-bnr-left-section-wrapper {
            margin-top: 80px;
            /* adjust value as needed */
        }

        .twm-bnr-left-section-wrapper {
            position: absolute;
            left: 1px;
            bottom: 490px;
            /* reduce this to move it down */
            /* OR */
            top: 60%;
            /* if you're using top positioning */
            transform: translateY(-50%);
        }

        @media (min-width: 992px) {
            .twm-bnr-left-section-wrapper {
                margin-top: 100px;
            }
        }

        /* Forcefully reset margin and padding on header and banner wrapper */

        .hover-scale:hover {
            transform: scale(1.03);
        }

        .vertical-card:hover img {
            transform: scale(1.05);
        }

        .vertical-card:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        .stat-box {
    background: #f8f9fa;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.stat-box:hover {
    transform: scale(1.03);
}

.stat-title {
    font-size: 2.8rem;
    color: #2c3e50;
    margin-bottom: 10px;
}


.job-img-wrapper img {
    transition: transform 0.3s ease-in-out;
}
.job-img-wrapper:hover img {
    transform: scale(1.05);
}

.section-full {
    padding-top: 0 !important;
    margin-top: 0 !important;
}

@media (max-width: 767px) {
    .slide-img-full img {
        height: 60vh !important;
    }
}

.carousel-item img {
  width: 100%;
  height: 100vh; /* Full height for desktop */
  object-fit: cover;
  object-position: center center;
}

@media (max-width: 767px) {
  .carousel-item img {
    height: auto; /* Auto height for mobile */
    max-height: 500px; /* Limit max height on mobile */
    object-fit: contain; /* Show full image */
    object-position: center center;
    padding-top: 0; /* REMOVE extra top space */
    margin-top: 0; /* Also ensure no margin */
    display: block;
  }
}
    </style>


    <script>
        $('.twm-h1-bnr-carousal').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            animateOut: 'fadeOut',
            dots: false,
            nav: false
        });

        .twm - bnr - left - section - wrapper {
                position: absolute;
                bottom: 50 px;
                left: 50 px;
                z - index: 20;
                max - width: 800 px;
                background - color: rgba(255, 255, 255, 0.9);
                padding: 30 px;
                border - radius: 10 px;
                box - shadow: 0 10 px 30 px rgba(0, 0, 0, 0.15);
            }

            .twm - bnr - title - small {
                font - size: 18 px;
                font - weight: 500;
                margin - bottom: 10 px;
            }

            .twm - bnr - title - large {
                font - size: 32 px;
                font - weight: 700;
                margin - bottom: 15 px;
            }

            .twm - bnr - discription {
                font - size: 16 px;
                margin - bottom: 25 px;
            }

            .twm - bnr - search - bar.form - group label {
                font - size: 14 px;
                font - weight: 500;
                margin - bottom: 5 px;
            }

            .twm - bnr - search - bar.form - control,
            .twm - bnr - search - bar.form - select {
                border - radius: 5 px;
                height: 40 px;
            }
    </script>


    <!-- META -->
    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" /> --}}

    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/assets/images/favicon.ico') }}" />

    <!-- PAGE TITLE HERE -->
    <title>Home | latasia </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/bootstrap.min.css') }}">
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/font-awesome.min.css') }}">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/feather.css') }}"><!-- FEATHER ICON SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/owl.carousel.min.css') }}">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/magnific-popup.min.css') }}">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/lc_lightbox.css') }}">
    <!-- Lc light box popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/bootstrap-select.min.css') }}">
    <!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/dataTables.bootstrap5.min.css') }}">
    <!-- DATA table STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/select.bootstrap5.min.css') }}">
    <!-- DASHBOARD select bootstrap  STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/dropzone.css') }}">
    <!-- DROPZONE STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/scrollbar.css') }}">
    <!-- CUSTOM SCROLL BAR STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/datepicker.css') }}">
    <!-- DATEPICKER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/flaticon.css') }}"> <!-- Flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/swiper-bundle.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/style.css') }}"><!-- MAIN STYLE SHEET -->

    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('home/assets/css/skins-type/skin-6.css') }}">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/switcher.css') }}">

</head>

<body>


    <div class="page-wraper">


        <!--template buy button-->


        <!-- HEADER START -->
        @include ('home.body.header')
        <!-- HEADER END -->

        <!-- CONTENT START -->
        <div class="page-content">

          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('home/assets/images/main-slider/slider1/9.png') }}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('home/assets/images/main-slider/slider1/10.png') }}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('home/assets/images/main-slider/slider1/11.png') }}" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('home/assets/images/main-slider/slider1/12.png') }}" alt="Fourth slide">
                  </div>
                </div>
              
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            

            <!--Banner End-->



            <!-- JOBS CATEGORIES SECTION START -->
            <div class="section-full p-t120 p-b90 site-bg-gray twm-job-categories-area2">
                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        {{-- <div>Jobs by Categories</div> --}}
                    </div>
                    <h2 class="wt-title">Choose Your Desire Category</h2>
                </div>
                <!-- TITLE END-->
            
                <div class="container">
                    <div class="twm-job-categories-section-2">
                        <div class="job-categories-style1 m-b30">
                            <div class="row">
                                @foreach ($jobCategories as $item)
                                    @php
                                        $category = $item->rcategory;
                                        $categoryName = $category->name ?? 'None';
                                        $categoryId = $category->id ?? '';
                                        $iconPath = $category->icon ?? null;
                                        $bgImage = $iconPath ? asset($iconPath) : asset('default-category.jpg'); // fallback image
                                    @endphp
            
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="category-card" style="
                                            background-image: url('{{ $bgImage }}');
                                            background-size: cover;
                                            background-position: center;
                                            height: 240px;
                                            border-radius: 16px;
                                            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
                                            position: relative;
                                            overflow: hidden;
                                            transition: transform 0.4s ease;
                                        ">
                                            <!-- Overlay -->
                                            <div style="
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                right: 0;
                                                bottom: 0;
                                                background-color: rgba(0, 0, 0, 0.55);
                                                z-index: 1;
                                            "></div>
            
                                            <!-- Content -->
                                            <div style="
                                                position: relative;
                                                z-index: 2;
                                                height: 100%;
                                                display: flex;
                                                flex-direction: column;
                                                justify-content: center;
                                                align-items: center;
                                                text-align: center;
                                                padding: 20px;
                                                color: #ffffff;
                                            ">
                                                <div style="font-size: 15px; font-weight: 600; color: #FFD700; margin-bottom: 10px;">
                                                    {{ $item->totalVacancy ?? 0 }} Vacancies
                                                </div>
                                                <a href="{{ url('job-listing?category=' . $categoryId) }}" style="
                                                    font-size: 22px;
                                                    font-weight: bold;
                                                    color: #ffffff;
                                                    text-decoration: none;
                                                    transition: color 0.3s;
                                                ">
                                                    {{ $categoryName }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
            
                        <div class="text-center job-categories-btn">
                            <a href="{{ url('job-listing') }}" class="site-button">All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            


            <!-- VIDEO GALLERY SECTION START -->
            @php
            function convertYoutubeUrlToEmbed($url) {
                if (strpos($url, 'watch?v=') !== false) {
                    preg_match('/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches);
                    return 'https://www.youtube.com/embed/' . $matches[1];
                }
                if (strpos($url, 'youtu.be/') !== false) {
                    preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches);
                    return 'https://www.youtube.com/embed/' . $matches[1];
                }
                return $url;
            }
        @endphp
        
        <!-- Video Gallery Section -->
        <section class="bg-light py-5">
            <div class="container">
                <div class="text-center mb-5">
                    {{-- <h6 class="text-primary fw-bold text-uppercase mb-1">Video Gallery</h6> --}}
                    <h2 class="wt-title">Latasia International
 Action Files</h2>
                </div>
        
                <!-- Category Tabs -->
                <ul class="nav nav-pills justify-content-center mb-4 gap-2 flex-wrap" id="videoTab" role="tablist">
                    @php $active = 'active'; @endphp
                    @foreach ($videoGallery as $category => $videos)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $active }} rounded-pill px-3 py-2 text-capitalize"
                                    id="tab-{{ Str::slug($category) }}-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#tab-{{ Str::slug($category) }}"
                                    type="button" role="tab"
                                    style="font-weight: 500; font-size: 14px;">
                                {{ ucfirst($category) }}
                            </button>
                            @php $active = ''; @endphp
                        </li>
                    @endforeach
                </ul>
        
                <!-- Tab Contents -->
                <div class="tab-content" id="videoTabContent">
                    @php $active = 'show active'; @endphp
                    @foreach ($videoGallery as $category => $videos)
                        <div class="tab-pane fade {{ $active }}" id="tab-{{ Str::slug($category) }}" role="tabpanel">
                            <div class="row g-4">
                                @foreach ($videos as $video)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-0 shadow-sm h-100 rounded-3">
                                            
                                                <iframe
                                                    src="{{ convertYoutubeUrlToEmbed($video->video_url) }}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen
                                                    title="{{ $video->title }}">
                                                </iframe>
                                            
                                            <div class="card-body bg-white text-center p-3">
                                                <h6 class="card-title mb-0 text-dark" style="font-size: 15px;">
                                                    {{ $video->title }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @php $active = ''; @endphp
                    @endforeach
                </div>
            </div>
        </section>
        
        <!-- Stats Section -->
        <div style="background-color: #ffffff; padding: 80px 20px 60px; margin-top: -30px;">
            <div style="text-align: center; max-width: 900px; margin: 0 auto 60px;">
                <h2 class="wt-title">Numbers That Speak of Dreams Delivered.</h2>
                <p style="font-size: 1.1rem; color: #555; line-height: 1.6; max-width: 700px; margin: 0 auto;">
                    <!-- Add any description here if needed -->
                </p>
            </div>
        
            @php
                $stats = [
                    ['count' => '1+', 'title' => 'Years in Operations', 'desc' => 'A young and driven player in the global recruitment space — committed to building a legacy of trust, quality, and human connection.'],
                    ['count' => '5+', 'title' => 'Countries and Counting', 'desc' => 'Our journey has already taken us across five countries, with footprints expanding steadily through strategic alliances and successful placements.'],
                    ['count' => '7+', 'title' => 'Valued Clients', 'desc' => 'We are proud to partner with a growing list of esteemed clients who believe in our potential and appreciate our hands-on, transparent approach.'],
                    ['count' => '65+', 'title' => 'Dreams Set in Motion', 'desc' => 'Every placement is a milestone — and a story of ambition realized. We’ve proudly helped 65 individuals step into life-changing opportunities around the world.'],
                ];
            @endphp
        
            <div style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); 
                gap: 2rem; 
                text-align: center;
                max-width: 1200px;
                margin: 0 auto;
            ">
                @foreach ($stats as $stat)
                    <div style="
                        background: #f8f9fa;
                        padding: 40px 25px;
                        border-radius: 16px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    " onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 12px 25px rgba(0,0,0,0.12)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.08)'">
                        <h2 style="font-size: 3rem; color: #1e272e; margin-bottom: 15px;">{{ $stat['count'] }}</h2>
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 10px; color: #34495e;">
                            {{ $stat['title'] }}
                        </h4>
                        <p style="font-size: 0.95rem; color: #555; line-height: 1.6;">
                            {{ $stat['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        
            <!-- JOB POST START -->
            <div class="section-full p-t120 p-b90 site-bg-light-purple twm-bg-ring-wrap">
                <div class="twm-bg-ring-right"></div>
                <div class="twm-bg-ring-left"></div>
                <div class="container">
            
                    <!-- Section Title -->
                    <div class="section-head center wt-small-separator-outer mb-5">
                        <div class="wt-small-separator site-text-primary">
                            {{-- <div>All Jobs Post</div> --}}
                        </div>
                        <h2 class="wt-title">We’ll Get You There</h2>
                    </div>
            
                    <!-- Jobs Grid -->
                    <div class="section-content">
                        <div class="row g-4">
                            @foreach ($recentJobs as $item)
                                <div class="col-md-6 col-lg-4">
                                    <div class="job-card shadow border rounded-4 overflow-hidden bg-white h-100 d-flex flex-column">
                                        
                                        <!-- Job Image -->
                                        <div class="position-relative">
                                            <img src="{{ asset($item->job_image) }}" alt="{{ $item->title }}" class="w-100" style="height: 220px; object-fit: cover;">
                                            
                                            @if ($item->is_featured)
                                                <span class="badge bg-info position-absolute top-0 start-0 m-2">Featured</span>
                                            @endif
                                            @if ($item->is_urgent)
                                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Urgent</span>
                                            @endif
                                        </div>
                    
                                        <!-- Job Details -->
                                        <div class="p-4 d-flex flex-column h-100">
                                            <a href="{{ route('job_detail', $item->id) }}" class="text-decoration-none text-dark">
                                                <h5 class="fw-semibold text-primary mb-1">{{ $item->title }}</h5>
                                                <p class="mb-2 text-muted small">
                                                    <i class="ri-timer-line me-1"></i> {{ $item->rexperince->name ?? 'N/A' }} Experience
                                                </p>
                                            </a>
                    
                                            <!-- Job Info -->
                                            <ul class="list-unstyled mb-3 text-muted small">
                                                <li><i class="fas fa-users me-2 text-secondary"></i><strong>Vacancies:</strong> {{ $item->vacancy }}</li>
                                                <li><i class="fas fa-map-marker-alt me-2 text-secondary"></i><strong>Location:</strong> {{ $item->rlocation->name ?? 'N/A' }}</li>
                                                <li><i class="fas fa-venus-mars me-2 text-secondary"></i><strong>Gender:</strong> {{ $item->rgender->name ?? 'N/A' }}</li>
                                                <li><i class="far fa-calendar-alt me-2 text-secondary"></i><strong>Posted:</strong> {{ $item->created_at->diffForHumans() }}</li>
                                            </ul>
                    
                                            <!-- Tags -->
                                            <div class="d-flex flex-wrap gap-2 mb-3">
                                                <span class="badge bg-success-subtle text-success">Type: {{ $item->rjobtype->name ?? 'N/A' }}</span>
                                               <span class="badge bg-warning-subtle text-dark">Salary:&nbsp;{{ optional($item->rsalary)->name ?? 'N/A' }}/Monthly</span>
                                            </div>
                    
                                            <!-- Actions -->
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="ri-login-box-line me-1"></i> Apply Now
                                                </a>
                                                <a href="{{ route('job_detail', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="ri-eye-line me-1"></i> View Details
                                                </a>
                                            </div>
                    
                                             <!-- Share Links -->
                                            <div class="d-flex gap-3 mt-3 fs-5 z-3 position-relative ">
                                                <!-- Facebook -->
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('job_detail', $item->id)) }}" target="_blank" class="text-primary">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('job_detail', $item->id)) }}" target="_blank" class="text-primary">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                <!-- WhatsApp -->
                                                <a 
    href="https://api.whatsapp.com/send?text={{ urlencode($item->title . ' - ' . route('job_detail', $item->id)) }}" 
    target="_blank" 
    class="text-success" 
    title="Share on WhatsApp"
    style="text-decoration: none;"
>
    <i class="fab fa-whatsapp fa-lg"></i>
</a>

                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                        <!-- Browse All Jobs Button -->
                        <div class="text-center mt-5">
                            <a href="{{ route('job_listing') }}" class="btn btn-lg btn-outline-primary">
                                <i class="ri-briefcase-line me-1"></i> Browse All Jobs
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
            


            <script>
                function shareJobOnFacebook(jobTitle, jobDescription, jobImage) {
                    var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('{{ Request::url() }}');
                    window.open(shareUrl, '_blank');
                }
            </script>
            <!-- JOB POST END -->

            <div class="section-full p-t120 p-b90 site-bg-white twm-candidate-h-page7-wrap pos-relative">
                <div class="container">
            
                    <!-- Section Title -->
                    <div class="section-head text-center mb-5">
                        <div class="wt-small-separator site-text-primary d-inline-block mb-2">
                            <span class="d-block" style="margin-top: 40px; font-size: 40px; font-weight: 500; color: #0d6efd; letter-spacing: 1px;">
                                Our Verticals
                            </span>
                        </div>
                        
                    </div>
            
                </div>
            
                <div class="container-fluid">
                    <div class="section-content">
                        <div class="twm-candidate-h-page7">
                            <div class="row justify-content-center">
                                @foreach ($verticals_all as $item)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                        <div class="vertical-card shadow-sm"
                                             style="
                                                 background: #fff;
                                                 border-radius: 16px;
                                                 overflow: hidden;
                                                 transition: all 0.3s ease-in-out;
                                                 height: 100%;
                                                 box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                                             ">
                                            <!-- Image -->
                                            <div class="vertical-image" style="height: 220px; overflow: hidden;">
                                                <img src="{{ asset($item->verticals_image) }}"
                                                     alt="{{ $item->title }}"
                                                     style="
                                                         width: 100%;
                                                         height: 100%;
                                                         object-fit: cover;
                                                         transition: transform 0.4s ease;
                                                     ">
                                            </div>
            
                                            <!-- Content -->
                                            <div class="vertical-content text-center p-4">
                                                <a href="{{ route('verticals_detail', $item->id) }}"
                                                   class="text-decoration-none">
                                                    <h5 style="font-weight: 600; font-size: 18px; color: #333;">
                                                        {{ $item->title }}
                                                    </h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="twm-bg-candi-pattern"></div>
            </div>
            

            <!-- EXPLORE NEW LIFE END -->

            <!-- HOW IT WORK SECTION START -->
            <div class="section-full p-t120 p-b90 site-bg-white twm-how-it-work-area">

                <div class="container">

                    <!-- TITLE START-->
                    <div class="section-head center wt-small-separator-outer">
                        <div class="wt-small-separator site-text-primary">
                            <div>Working Process</div>
                        </div>
                        <h2 class="wt-title">How It Works</h2>

                    </div>
                    <!-- TITLE END-->

                    <div class="twm-how-it-work-section">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">01</span>
                                    <div class="twm-w-pro-top bg-clr-sky">
                                        <div class="twm-media">
                                            <span><img src="{{ asset('home/assets/images/work-process/icon1.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <a href="{{ url('/employer-zone') }}">
                                            <h4 class="twm-title"> Register <br>as an Employer</h4>
                                        </a>
                                    </div>
                                    <p>Submit your company details and hiring needs to gain access to skilled and verified candidates.</p>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">02</span>
                                    <div class="twm-w-pro-top bg-clr-pink">
                                        <div class="twm-media">
                                            <span><img src="{{ asset('home/assets/images/work-process/icon2.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <a href="{{ route('video.category', ['category' => 'Welder']) }}">
                                            <h4 class="twm-title">See Our Workers <br>
                                                in Action</h4>
                                        </a>
                                    </div>
                                    <p>Visit our trade test facility to assess skills firsthand and select the right candidates with confidence.</p>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">03</span>
                                    <div class="twm-w-pro-top bg-clr-green">
                                        <div class="twm-media">
                                            <span><img src="{{ asset('home/assets/images/work-process/icon3.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <a href="{{ url('/employer-zone') }}">
                                            <h4 class="twm-title">Hire <br>& Deploy</h4>
                                        </a>
                                    </div>
                                    <p>Finalize selections and let us handle documentation, visa processing, and smooth worker departure to your location.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- HOW IT WORK SECTION END -->





            <!-- OUR BLOG START -->
            <div class="section-full p-t120 p-b90 site-bg-gray">
                <div class="container">

                    <!-- TITLE START-->
                    <div class="section-head center wt-small-separator-outer">
                        <div class="wt-small-separator site-text-primary">
                            <span class="d-block" style="margin-top: 40px; letter-spacing: 1px; color: #0d6efd;">
                                <span style="font-size: 24px; font-weight: 600; display: block; margin-bottom: 5px;">
                                    Weekly Journal
                                </span>
                                <span style="font-size: 17px; font-weight: 500;">
                                    Inside the World of Ethical Recruitment & Opportunity
                                </span>
                            </span>
                            
                            
                        </div>
                        <p>
                        </p>

                    </div>
                    <!-- TITLE END-->



                     <div class="section-content">
                        <div class="twm-jobs-grid-wrap">
                            <div class="row masonry-wrap" style="position: relative; height: 828.75px;">
                                @foreach ($quick_all as $item)
                                    <div class="masonry-item col-lg-4 col-md-6 m-b30"
                                        style="position: absolute; left: 0px; top: 0px;">
                                        <!--Block one-->

                                        <div class="blog-post twm-blog-post-h-page6">
                                            <div class="wt-post-media">
                                                <a href="{{ route('carrer.details', $item->id) }}"><img
                                                        src="{{ asset($item->quick_image) }}" alt=""></a>
                                            </div>
                                            <div class="wt-post-info">

                                                <div class="wt-post-title ">
                                                    <h4 class="post-title">
                                                        <a
                                                            href="{{ route('carrer.details', $item->id) }}">{{ $item->title }}</a>
                                                    </h4>
                                                </div>
                                                <div class="wt-post-text ">
                                                    <p>
                                                        {!! Illuminate\Support\Str::limit($item->description, 100) !!}
                                                    </p>
                                                </div>
                                                <div class="wt-post-readmore ">
                                                    <a href="{{ route('carrer.details', $item->id) }}"
                                                        class="site-button-link site-text-primary">Read More</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- OUR BLOG END -->


        </div>
        <!-- CONTENT END -->
        <div class="container">
            @if ($showAdvertisement)
                <div class="alert alert-info">
                    <h4>Special Offer Just for You!</h4>
                    <p>Exclusive deals available only for our valued visitors.</p>
                    <!-- Add more advertisement content here -->
                </div>
            @endif

            <!-- Other content of the page -->
        </div>
        <!-- FOOTER START -->
        @include ('home.body.footer')
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>




    </div>

    <!-- Bootstrap 5 CSS -->


<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="{{ asset('home/assets/js/jquery-3.6.0.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ asset('home/assets/js/popper.min.js') }}"></script><!-- POPPER.MIN JS -->
    <script src="{{ asset('home/assets/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('home/assets/js/magnific-popup.min.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
    <script src="{{ asset('home/assets/js/waypoints.min.js') }}"></script><!-- WAYPOINTS JS -->
    <script src="{{ asset('home/assets/js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ asset('home/assets/js/waypoints-sticky.min.js') }}"></script><!-- STICKY HEADER -->
    <script src="{{ asset('home/assets/js/isotope.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ asset('home/assets/js/imagesloaded.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ asset('home/assets/js/owl.carousel.min.js') }}"></script><!-- OWL  SLIDER  -->
    <script src="{{ asset('home/assets/js/jquery.owl-filter.js') }}"></script>
    <script src="{{ asset('home/assets/js/theia-sticky-sidebar.js') }}"></script><!-- STICKY SIDEBAR  -->
    <script src="{{ asset('home/assets/js/lc_lightbox.lite.js') }}"></script><!-- IMAGE POPUP -->
    <script src="{{ asset('home/assets/js/bootstrap-select.min.js') }}"></script><!-- Form js -->
    <script src="{{ asset('home/assets/js/dropzone.js') }}"></script><!-- IMAGE UPLOAD  -->
    <script src="{{ asset('home/assets/js/jquery.scrollbar.js') }}"></script><!-- scroller -->
    <script src="{{ asset('home/assets/js/bootstrap-datepicker.js') }}"></script><!-- scroller -->
    <script src="{{ asset('home/assets/js/jquery.dataTables.min.js') }}"></script><!-- Datatable -->
    <script src="{{ asset('home/assets/js/dataTables.bootstrap5.min.js') }}"></script><!-- Datatable -->
    <script src="{{ asset('home/assets/js/chart.js') }}"></script><!-- Chart -->
    <script src="{{ asset('home/assets/js/bootstrap-slider.min.js') }}"></script><!-- Price range slider -->
    <script src="{{ asset('home/assets/js/swiper-bundle.min.js') }}"></script><!-- Swiper JS -->
    <script src="{{ asset('home/assets/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ asset('home/assets/js/switcher.js') }}"></script><!-- SHORTCODE FUCTIONS  -->


    <!-- STYLE SWITCHER  ======= -->



</body>


<!-- Mirrored from thewebmax.org/jobzilla/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Dec 2023 08:51:22 GMT -->

</html>
