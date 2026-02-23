@extends('frontend.main_master')
@section('main')

<section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">Weekly Journal</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Weekly Journal</a></li>
                                                   
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
                    
                    <section class="section bg-light py-5">
                        <div class="container">
                            <div class="row justify-content-center mb-4">
                                <div class="col-lg-8 text-center">
                                    <h2 class="fw-bold mb-3">Latasia International Weekly Journal</h2>
                                    <!--<p class="text-muted">Explore our journey each week — real success stories, career milestones, and global opportunities that inspire dreams to take flight.</p>-->
                                </div>
                            </div>
                    
                            <div class="row">
                                @foreach($front_all_blogs as $item)
                                    <div class="col-md-6 mb-5">
                                        <article class="post shadow-sm rounded-4 overflow-hidden h-100 border">
                                            <div class="post-preview">
                                                <a href="{{ route('blog_detail', $item->id) }}">
                                                    <img src="{{ asset($item->quick_image) }}" alt="{{ $item->title }}" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                                                </a>
                                            </div>
                                            <div class="p-4">
                                                <p class="text-muted small mb-2">
                                                    {{ $item->created_at->format('d M, Y') }} • {{ $item->created_at->diffForHumans() }}
                                                </p>
                                                <h5 class="fw-semibold mb-3">
                                                    <a href="{{ route('blog_detail', $item->id) }}" class="text-dark text-decoration-none">
                                                        {{ $item->title }}
                                                    </a>
                                                </h5>
                                                <p class="text-muted mb-3" style="text-align: justify;">
                                                    {!! Illuminate\Support\Str::limit($item->description, 200) !!}
                                                </p>
                                                <a href="{{ route('blog_detail', $item->id) }}" class="text-primary fw-medium">
                                                    Read More &rarr;
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                    
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4 pt-3">
                                    {{ $front_all_blogs->links() }}
                                </div>
                            </div>
                        </div>
                    </section>
                    

@endsection