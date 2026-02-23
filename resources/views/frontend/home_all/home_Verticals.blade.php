<section class="section bg-light">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-title text-center mb-5">
                                    <h3 class="title mb-3">Our Verticals</h3>
                                    
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                        @foreach($verticals_all as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="blog-box card p-2 mt-3">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img src="{{ asset( $item->verticals_image) }}" alt="" class="img-fluid">
                                        
                                        <div class="bg-overlay"></div>
                                        <div class="author">
                                            <p class=" mb-0"><i class="mdi  text-light"></i> <a href="{{ route('verticals_detail', $item->id) }}" class="text-light">{{ $item->title }}</a></p>
                                            
                                        </div>
                                        <div class="card-body">
                                        <a href="{{ route('verticals_detail', $item->id) }}" class="primary-link">
                                            <h5 class="fs-17">{{ $item->title }}</h5>
                                        </a>
                                        </div>
                                        
                                    </div>
                                    
                                </div><!--end blog-box-->
                            </div><!--end col-->
                            @endforeach

                        </div>
                        <!--end row-->
                    </div>
                    <!--end container-->
                </section>