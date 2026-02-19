<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/jobcy/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 10:51:05 GMT -->
<head>
        
        
        <meta charset="utf-8" />
        <title>Latasia | International </title>
        @if(isset($job_single))
        <meta property="og:url" content="{{ route('job_detail', $job_single->id) }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $job_single->socal_media_name  }}" />
        <meta property="og:description" content="{{ $job_single->description }}" />
        <meta property="og:image" content="{{ asset($job_single->job_image) }}" />
        @endif
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}">

        <!-- Choise Css -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

        <!-- Swiper Css -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/libs/swiper/swiper-bundle.min.css') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" id="" rel="stylesheet"/>
        <link href="{{ asset('frontend/assets/css/forms.css') }}" id="" rel="stylesheet"/>
        <!-- Icons Css -->
        <link href="{{ asset('frontend/assets/css/icons.css') }}" rel="stylesheet" />
        <!-- App Css-->
        <link href="{{ asset('frontend/assets/css/app.min.css') }}" id="" rel="stylesheet" />
        <!--Custom Css-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    </head>

    <body >
         <!--start page Loader -->
         
        <!--end page Loader -->

        <!-- Begin page -->
        <div>

            <!-- START TOP-BAR -->
            <div class="top-bar">
                <div class="container-fluid custom-container">
                    
                </div>
                <!--end container-->
            </div>
            <!-- END TOP-BAR -->

            <!--Navbar Start-->
             @include('frontend.body.header')
            <!-- Navbar End -->


           
            <div class="main-content">
            <div class="page-content">
            @yield('main')

            </div>
            </div>
        </div>
        @include('frontend.body.footer')
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('frontend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/pages/bundle.js') }}"></script>


        <!-- Choice Js -->
        <script src="{{ asset('frontend/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        
        <!-- Swiper Js -->
        <script src="{{ asset('frontend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Index Js -->
        <script src="{{ asset('frontend/assets/js/pages/job-list.init.js') }}"></script>

        <!-- Switcher Js -->
        <script src="{{ asset('frontend/assets/js/pages/switcher.init.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/pages/index.init.js') }}"></script>
        
        <!-- App Js -->
        <script src="{{ asset('frontend/assets/js/app.js') }}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

    </body>

<!-- Mirrored from themesdesign.in/jobcy/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 10:51:24 GMT -->
</html>
