@extends('frontend.main_master')
@section('main')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .page-title-box {
            background: linear-gradient(to right, #0d6efd, #0056b3);
            padding: 100px 0;
            color: #fff;
            text-align: center;
        }

        .page-title-box h3 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .breadcrumb {
            background: transparent;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item a {
            color: #fff;
            text-decoration: none;
        }

        .section {
            padding: 80px 0;
        }

        h4,
        h5,
        h6 {
            font-weight: 600;
            color: #0d6efd;
            margin-top: 0;
        }

        .highlight {
            color: #0d6efd;
            font-weight: 600;
        }

        .modern-circle-list {
            list-style: none;
            padding-left: 0;
        }

        .modern-circle-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 12px;
            font-size: 16px;
            color: #444;
        }

        .modern-circle-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 7px;
            width: 10px;
            height: 10px;
            background-color: #0d6efd;
            border-radius: 50%;
        }

        .tick-list p::before {
            content: "✔️ ";
            margin-right: 8px;
            color: green;
        }

        .tick-list p {
            margin-bottom: 8px;
            font-size: 16px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .text-muted {
            color: #666 !important;
        }

        .row-align {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            flex-wrap: wrap;
        }

        .row-align.reverse {
            flex-direction: row-reverse;
        }

        .col-half {
            flex: 1 1 48%;
        }

        @media (max-width: 768px) {
            .row-align {
                flex-direction: column;
            }

            .col-half {
                width: 100%;
            }

            .page-title-box h3 {
                font-size: 28px;
            }
        }
    </style>
    

    <div class="main-content">
        <div class="page-content">
    
            <!-- Hero Section -->
            <section class="page-title-box">
                <div class="container">
                    <h3>{{ $verticals_details->title }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ '/' }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $verticals_details->title }}</li>
                        </ol>
                    </nav>
                </div>
            </section>
    
            <!-- Vertical Details Section -->
            <section class="py-5 bg-light">
                <div class="container">
    
                    <!-- Title -->
                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-dark">{{ $verticals_details->title }}</h2>
                        <!--<p class="text-muted fs-5">Explore the project in depth below</p>-->
                    </div>
    
                    <!-- Image -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-12">
                            <img src="{{ asset($verticals_details->verticals_image) }}" class="slide-img-full" alt="Vertical Image" style="height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    </div>
    
                    <!-- Description -->
                    <div class="row mb-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                                <h4 class="fw-bold text-center text-primary mb-4 border-bottom pb-2">About This Vertical</h4>
                                <div class="text-dark fs-5 lh-lg" style="text-align: justify;">
                                    {!! $verticals_details->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Video Section Title -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark">🎥 Watch Our Skilled Workforce in Action</h2>
                        <p class="text-muted">Real moments captured in motion</p>
                    </div>
    
                    <!-- Video Carousel -->
                    @php
    if (!function_exists('getYoutubeVideoId')) {
        function getYoutubeVideoId($url) {
            if (strpos($url, 'youtu.be/') !== false) {
                return substr(parse_url($url, PHP_URL_PATH), 1);
            } elseif (strpos($url, 'v=') !== false) {
                parse_str(parse_url($url, PHP_URL_QUERY), $query);
                return $query['v'] ?? null;
            } elseif (strpos($url, '/embed/') !== false) {
                return \Illuminate\Support\Str::after($url, '/embed/');
            }
            return null;
        }
    }
@endphp

                    @if($videos->count() > 0)
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-10">
                            <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                                <div class="carousel-inner rounded shadow-sm">
                                    @foreach($videos as $index => $video)
                                        @php
                                            $videoId = getYoutubeVideoId($video->video_url);
                                        @endphp
                
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="ratio ratio-16x9">
                                                <iframe class="rounded video-frame"
                                                        src="https://www.youtube.com/embed/{{ $videoId }}?enablejsapi=1"
                                                        title="YouTube video"
                                                        allow="autoplay; encrypted-media"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                
                                @if($videos->count() > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                

                <script>
                    var tag = document.createElement('script');
                    tag.src = "https://www.youtube.com/iframe_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                
                    var players = [];
                
                    function onYouTubeIframeAPIReady() {
                        const frames = document.querySelectorAll('.video-frame');
                        frames.forEach((frame, index) => {
                            players[index] = new YT.Player(frame, {
                                events: {
                                    'onStateChange': onPlayerStateChange
                                }
                            });
                        });
                    }
                
                    function onPlayerStateChange(event) {
                        const carousel = bootstrap.Carousel.getOrCreateInstance(document.querySelector('#videoCarousel'));
                
                        if (event.data === YT.PlayerState.PLAYING) {
                            carousel.pause(); // pause carousel when video is playing
                        }
                
                        if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.ENDED) {
                            carousel.cycle(); // resume when video stops
                        }
                    }
                </script>
                
                

                    
                
                
    
                    <!-- Long Description -->
                    <div class="row mb-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                                <div class="text-dark fs-5 lh-lg" style="text-align: justify;">
                                    {!! $verticals_details->long_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </section>
    
            <!-- Contact Form -->
            <section class="py-5 bg-white">
                <div class="container">
                    <div class="card shadow border-0 p-5">
                        <h2 class="text-center fw-bold text-dark mb-4">Share Your Project Requirements</h2>
                        <form method="POST" action="{{ route('store.project_requirements') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Contact Person</label>
                                    <input type="text" name="contact_person" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Phone</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Project Type</label>
                                    <select name="project_type" class="form-select" required>
                                        <option value="" selected disabled>Select project type</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Industrial</option>
                                        <option>Infrastructure</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Roles Needed</label>
                                    <select name="roles_needed[]" class="form-select" multiple required>
                                        <option value="Masons">Masons</option>
                                        <option value="Electricians">Electricians</option>
                                        <option value="Plumbers">Plumbers</option>
                                        <option value="Carpenters">Carpenters</option>
                                        <option value="Welders">Welders</option>
                                        <option value="Crane Operators">Crane Operators</option>
                                        <option value="Scaffolders">Scaffolders</option>
                                        <option value="General Labor">General Labor</option>
                                        <option value="Supervisors">Supervisors</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Project Location</label>
                                    <input type="text" name="project_location" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Upload Job Description (Optional)</label>
                                    <input type="file" name="upload_file" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Additional Details</label>
                                    <textarea name="details" class="form-control" rows="4" placeholder="Describe your project needs..."></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    
        </div>
    </div>
    
    
@endsection