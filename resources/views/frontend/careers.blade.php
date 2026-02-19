@extends('frontend.main_master')
@section('main')

    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Careers</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Careers </li>
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
            <form action="#">
                <div class="row g-2">
                    
                    
                </div><!--end row-->
            </form>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h6 class="fs-16 mb-3">Vasper Careers </h6>
                    
                </div><!--end col-->
                <div class="col-lg-12">
                   
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="job-box bookmark-post card mt-4">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-3">
                                    <a href="company-details.html"><img src="assets/images/featured-job/img-01.png" alt="" class="img-fluid rounded-3"></a>
                                </div>
                                <div class="col-9">
                                    <div class="mt-3 mt-md-0">
                                        <h5 class="fs-17 mb-1"><a href="job-details.html" class="text-dark">Magento Developer</a> <small class="text-muted fw-normal">(0-2 Yrs Exp.)</small></h5>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <p class="text-muted fs-14 mb-0">Jobcy Technology Pvt.Ltd</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> California</p>
                                            </li>
                                            
                                        </ul>
                                        <div class="mt-2">
                                            <span class="badge bg-success-subtle text-success mt-1">Full Time</span>
                                            <span class="badge bg-warning-subtle text-warning mt-1">Urgent</span>
                                            <span class="badge bg-info-subtle text-info mt-1">Private</span>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            
                        </div>
                        <div class="p-3 bg-light">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="uil uil-tag"></i> Keywords :</li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">Ui designer</a>,</li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">developer</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-md-end">
                                        <a href="#applyNow" data-bs-toggle="modal" class="primary-link">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end job-box-->
                </div><!--end col-->
            
               
            </div><!--end row-->
            
           
    
        </div><!--end container-->
    </section>


    <div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="text-center mb-4">
                        <h5 class="modal-title" id="staticBackdropLabel">Apply For This Job</h5>
                    </div>
                    <div class="position-absolute end-0 top-0 p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                        <label for="nameControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameControlInput" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="emailControlInput2" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailControlInput2" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="messageControlTextarea" class="form-label">Message</label>
                        <textarea class="form-control" id="messageControlTextarea" rows="4" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Application</button>
                </div>
            </div>
        </div>
    </div><!-- END APPLY MODAL -->
@endsection
