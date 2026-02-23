<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<style>
    .navbar-nav .nav-link {
        font-weight: 500;
        color: #333;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .dropdown-toggle:hover {
        color: #111214;
    }

    .navbar-nav .dropdown-menu {
        border-radius: 0.3rem;
        padding: 0.5rem;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }
</style>

<!-- HEADER START -->
<header class="shadow-sm bg-white sticky-top site-header">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between py-2">

            <!-- Logo -->
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('home/assets/images/website.jpg') }}" alt="Vasper Logo" style="height: 80px;">
                </a>
            </div>

            <!-- Mobile Toggle (Offcanvas trigger) -->
            <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <span style="font-size: 24px; color: #0d6efd;">&#9776;</span>
            </button>

            <!-- Desktop Navigation -->
           <!-- Desktop Navigation -->
<nav class="navbar navbar-expand-lg d-none d-lg-flex ms-3 flex-grow-1">
    <div class="d-flex align-items-center justify-content-between w-100">
        <!-- Centered Nav Links -->
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-1 align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="{{ url('/employer-zone') }}">Recruiters' Corner</a></li>
            <!--<li class="nav-item"><a class="nav-link" href="{{ url('/employer-zone') }}">Team</a></li>-->
            <li class="nav-item"><a class="nav-link" href="{{ url('/job-listing') }}">Jobs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Weekly Journal</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="videoDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Library
                </a>
                <ul class="dropdown-menu" aria-labelledby="videoDropdown">
                    <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Welder']) }}">Welder</a></li>
                    <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Construction']) }}">Construction</a></li>
                    <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Transportation']) }}">Transportation</a></li>
                </ul>
            </li>
            <!--<li class="nav-item"><a class="nav-link" href="{{ url('candidate/login') }}">Candidate Login</a></li>-->
        </ul>

        <!-- Button aligned to right -->
        <!--<div class="ms-auto">-->
        <!--    <a href="{{ asset('public/upload/Document/Manpower Recruitment Brochure.pdf') }}" target="_blank" class="btn btn-primary fw-semibold px-3">-->
        <!--        Download Brochure-->
        <!--    </a>-->
        <!--</div>-->
    </div>
</nav>

        </div>
    </div>

    <!-- Mobile Offcanvas Menu -->
    <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav text-start">
                <li class="nav-item"><a class="nav-link" href="{{ url('/employer-zone') }}">Employer Zone</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/job-listing') }}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Weekly Journal</a></li>

                <!-- Dropdown in Offcanvas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Library
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="offcanvasDropdown">
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Welder']) }}">Welder</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Construction']) }}">Construction</a></li>
                        <li><a class="dropdown-item" href="{{ route('video.category', ['category' => 'Transportation']) }}">Transportation</a></li>
                    </ul>
                </li>

                <!--<li class="nav-item"><a class="nav-link" href="{{ url('candidate/login') }}">Candidate Login</a></li>-->

                <!-- Brochure Button (Mobile) -->
                <li class="mt-3">
                    <a href="{{ asset('public/upload/Document/Manpower Recruitment Brochure.pdf') }}" target="_blank" class="btn btn-primary fw-semibold w-100">
                        Download Brochure
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- JS to close offcanvas on nav link click -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const offcanvasEl = document.getElementById('mobileMenu');
        const offcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);

        document.querySelectorAll('#mobileMenu .nav-link').forEach(link => {
            link.addEventListener('click', () => offcanvas.hide());
        });
    });
</script>