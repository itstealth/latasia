@extends('frontend.main_master')
@section('main')
    @php
        $video_all = App\Models\VideoGallery::latest()->get();

    @endphp
    <div class="main-content">

        <div class="page-content">
            <section class="page-title-box">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="text-center text-white">
                                <h3 class="mb-4">Masters in Motion</h3>
                                <div class="page-next">
                                    <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"> Library </li>
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

            <section class="video-gallery-section py-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2>Videos: {{ $category }}</h2>
                        <!--<p class="text-muted">Watch our latest videos and updates</p>-->
                    </div>
            
                    <div class="row">
                        @if ($videos->count() > 0)
                            @foreach ($videos as $item)
                                @php
                                    $videoUrl = $item->video_url;
                                    $videoId = '';
            
                                    // Extract YouTube Video ID properly
                                    if (strpos($videoUrl, 'watch?v=') !== false) {
                                        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $urlParams);
                                        $videoId = $urlParams['v'] ?? '';
                                    } elseif (strpos($videoUrl, 'youtu.be/') !== false) {
                                        $videoId = substr(parse_url($videoUrl, PHP_URL_PATH), 1);
                                    } elseif (strpos($videoUrl, 'youtube.com/embed/') !== false) {
                                        $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
                                    }
            
                                    $embedUrl = $videoId ? 'https://www.youtube.com/embed/' . $videoId : '';
                                @endphp
            
                                @if ($embedUrl)
                                    <div class="col-md-4 mb-4">
                                        <div class="card shadow-sm border-0 h-100">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="{{ $embedUrl }}" title="{{ $item->title }}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                                <p class="card-text text-muted">{{ $item->videocategory }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <p class="text-danger">Invalid Video URL for "{{ $item->title }}"</p>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p class="text-danger">No videos available in the "{{ $category }}" category.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </section>


        </div>
    </div>

@endsection
