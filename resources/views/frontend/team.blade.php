@extends('frontend.main_master')
@section('main')

<div class="page-content">

     <!-- Start home -->
     <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Team</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Team </li>
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
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold">Meet Our Team</h2>
            </div>
        </div>

        @php
            $topLeaders = [
                ['name' => 'Puja Saluja', 'title' => 'CEO & Founder', 'image' => 'Puja.png'],
            ];

            $indiaTeam = [
                ['name' => 'Zuber Mansuri', 'title' => 'Application Development Manager', 'image' => 'Zuber.png'],
                ['name' => 'Disha Shah', 'title' => 'Digital Marketing Manager', 'image' => 'Disha.png'],
                ['name' => 'Shubham Shimpi', 'title' => 'Operations Manager', 'image' => 'Shubham.png'],
                ['name' => 'Vishal Kumar', 'title' => 'Office Manager', 'image' => 'Vishal.png'],
            ];

            $europeTeam = [
                ['name' => 'Harleen Prabhakar', 'title' => 'International Relationship Specialist, Europe', 'image' => 'Harleen.png'],
                ['name' => 'Naqshatra Singh Bains', 'title' => 'Business Relationship Manager, Europe', 'image' => 'Naqshatra.png'],
                ['name' => 'Prakirti Sisodia', 'title' => 'International Recruitment Specialist, Europe', 'image' => 'Prakirti.png'],
            ];
        @endphp

        {{-- Top Leaders Section --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h4 class="text-primary mb-3">Leading with Vision and Integrity</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            @foreach ($topLeaders as $leader)
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow text-center p-4 h-100">
                        <img src="{{ asset('frontend/assets/images/team/' . $leader['image']) }}"
                             alt="{{ $leader['name'] }}"
                             class="rounded-circle mx-auto mb-3"
                             style="width: 180px; height: 180px; object-fit: cover;">
                        <h5 class="fw-bold mb-1">{{ $leader['name'] }}</h5>
                        <p class="text-muted mb-0">{{ $leader['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- India Team Section --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h4 class="text-success mb-3">Driving Innovation and Operations in India</h4>
            </div>
        </div>
        <div class="row mb-5">
            @foreach ($indiaTeam as $member)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card border-0 text-center p-3 h-100 shadow-sm">
                        <img src="{{ asset('frontend/assets/images/team/' . $member['image']) }}"
                             alt="{{ $member['name'] }}"
                             class="rounded-circle mx-auto mb-3"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <h6 class="fw-semibold mb-1">{{ $member['name'] }}</h6>
                        <p class="text-muted small mb-0">{{ $member['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Europe Team Section --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h4 class="text-info mb-3">Expanding Global Relationships Across Europe</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($europeTeam as $member)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 text-center p-3 h-100 shadow-sm">
                        <img src="{{ asset('frontend/assets/images/team/' . $member['image']) }}"
                             alt="{{ $member['name'] }}"
                             class="rounded-circle mx-auto mb-3"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <h6 class="fw-semibold mb-1">{{ $member['name'] }}</h6>
                        <p class="text-muted small mb-0">{{ $member['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    
    

</div>
<!-- End Page-content -->



@endsection