@extends('recruiter.recruiter_master')
@section('recruiter')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- Example Cards -->
            @php
                $cards = [
                    ['title' => 'Total Jobs', 'value' => 0, 'icon' => 'mdi-briefcase-outline', 'color' => 'bg-primary'],
                    ['title' => 'Applications', 'value' => 0, 'icon' => 'mdi-file-document-outline', 'color' => 'bg-success'],
                    ['title' => 'Shortlisted', 'value' => 0, 'icon' => 'mdi-account-check-outline', 'color' => 'bg-warning'],
                    ['title' => 'Closed Jobs', 'value' => 0, 'icon' => 'mdi-close-circle-outline', 'color' => 'bg-danger'],
                    ['title' => 'Pending Interviews', 'value' => 0, 'icon' => 'mdi-calendar-clock', 'color' => 'bg-info'],
                    ['title' => 'Hired', 'value' => 0, 'icon' => 'mdi-account-tie', 'color' => 'bg-secondary'],
                    ['title' => 'Rejected', 'value' => 0, 'icon' => 'mdi-account-remove', 'color' => 'bg-dark'],
                    ['title' => 'Active Recruiters', 'value' => 0, 'icon' => 'mdi-account-group-outline', 'color' => 'bg-indigo']
                ];
            @endphp

            @foreach($cards as $card)
            <div class="col-xl-3 col-md-6">
                <div class="card text-white {{ $card['color'] }} mb-4 shadow-sm border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 font-size-14">{{ $card['title'] }}</p>
                            <h4 class="mb-0">{{ $card['value'] }}</h4>
                        </div>
                        <div class="avatar-sm rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center">
                            <i class="mdi {{ $card['icon'] }} text-white font-size-20"></i>
                        </div>
                    </div>
                    <div class="card-footer text-white-50">
                        Updated just now
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- end row -->

    </div>
</div>

<style>
    /* Card hover effect */
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    /* Rounded footer */
    .card-footer {
        border-top: 1px solid rgba(255,255,255,0.15);
        font-size: 12px;
    }
</style>
@endsection
