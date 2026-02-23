<style>
    .hover-dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; /* optional: removes jump effect */
}
</style>
<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container-fluid custom-container">
        <a class="navbar-brand text-dark fw-bold me-auto" href="{{'/'}}">
            
           <img src="{{ asset('frontend/assets/images/Latasia_sia.png') }}" 
     alt="Latasia Logo"
     class="logo-light"
     style="height:70px; width:auto; object-fit:contain; max-height:70px; display:block;">

        </a>
        <div>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto navbar-center">
                <!--<li class="nav-item"><a href="{{'/'}}" class="nav-link">Home</a>-->
                <!--<li class="nav-item"><a href="{{'/about'}}" class="nav-link">About us</a>-->
                <li class="nav-item"><a href="{{'/employer-zone'}}" class="nav-link">Recruiters' Corner</a>
                <li class="nav-item"><a href="{{'/job-listing'}}" class="nav-link">Jobs</a></li>
                <!--<li class="nav-item"><a href="{{'/careers'}}" class="nav-link">Careers</a></li>-->
                <li class="nav-item"><a href="{{'/blog'}}" class="nav-link">Weekly Journal</a></li>
                <li class="nav-item dropdown hover-dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="videoDropdown" role="button">
                        Library
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Welder']) }}">Welder</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Construction']) }}">Construction</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Transportation']) }}">Transportation</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item"> <a href="{{'/contact'}}" class="nav-link">Contact</a></li>
                <!--<li class="nav-item"> <a href="{{'candidate/login'}}" class="nav-link">Candidate Login</a></li>-->
                <!-- <li class="nav-item"> <a href="{{'/sign-up'}}" class="nav-link">Sign Up</a></li> -->
            </ul><!--end navbar-nav-->
        </div>
        <!--end navabar-collapse-->

    </div>
    <!--end container-->
</nav>