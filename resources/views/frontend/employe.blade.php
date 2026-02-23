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

    <!-- TITLE SECTION -->
    <section class="page-title-box">
        <div class="container">
            <h3>Recruiters' Corner</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Recruiters' Corner</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- SECTION 1: Skilled Indian Talent -->
    <section class="section">
        <div class="container">
            <div class="row-align">
                <div class="col-half">
                    <h4>Skilled Indian Talent for Europe’s Workforce</h4>
                    <p>
                        At <strong class="highlight">Latasia International</strong>, we connect European employers
                        with India’s skilled manpower — ethically, efficiently, and in full compliance with EU labor
                        standards.
                    </p>
                    <p>
                        Whether scaling projects, filling trade positions, or building workforce pipelines, we ensure the
                        <strong class="highlight">right people arrive, right on time.</strong>
                    </p>

                    <h5 class="mt-4">Who We Help You Hire</h5>
                    <h6 class="mt-3">Construction & Civil Trades</h6>
                    <ul class="modern-circle-list">
                        <li>Welders, Pipefitters, Masons</li>
                        <li>Electricians, Plumbers, Shuttering Carpenters</li>
                        <li>Steel Fixers, Scaffolders</li>
                    </ul>
                </div>
                <div class="col-half text-center">
                    <img src="{{ asset('frontend/assets/images/emp.png') }}" alt="Employer Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: Logistics & Transport -->
    <section class="section">
        <div class="container">
            <div class="row-align reverse">
                <div class="col-half">
                    <h4>Logistics & Transport</h4>
                    <ul class="modern-circle-list">
                        <li>Forklift Operators</li>
                        <li>Loaders, Pickers, Warehouse Staff</li>
                        <li>Delivery Drivers, Long-Haul Drivers</li>
                    </ul>

                    <h4 class="mt-4">Manufacturing & Industrial</h4>
                    <ul class="modern-circle-list">
                        <li>CNC Operators, Machine Operators</li>
                        <li>General Factory Workers, Assemblers</li>
                        <li>Maintenance Technicians</li>
                    </ul>
                    <p class="mt-2 text-muted">Need something specific? We’ll find and prepare the right candidates.</p>
                </div>
                <div class="col-half text-center">
                    <img src="{{ asset('frontend/assets/images/logistics.png') }}" alt="Logistics Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: Europe-Focused. Process-Driven -->
    <section class="section">
        <div class="container">
            <div class="row-align">
                <div class="col-half">
                    <h4>Europe-Focused. Process-Driven</h4>
                    <p class="text-muted">
                        We currently recruit for <strong>Germany, Poland, Latvia, Romania, Czech Republic, Hungary</strong>
                        and other EU nations under authorized programs and employer-sponsored categories.
                    </p>

                    <h5 class="mt-4">We handle:</h5>
                    <ul class="modern-circle-list">
                        <li>Candidate sourcing & screening</li>
                        <li>Trade tests & documentation</li>
                        <li>Work permit & visa processing</li>
                        <li>Pre-departure orientation</li>
                        <li>Deployment logistics</li>
                    </ul>

                    <h4 class="mt-5">Why European Employers Choose Us</h4>
                    <div class="tick-list">
                        <p>India’s Skilled Talent – Delivered Legally</p>
                        <p>100% Europe-Focused Approach</p>
                        <p>Strict Screening + Trade-Tested Profiles</p>
                        <p>Compliant, Transparent, and Fast</p>
                        <p>Dedicated Employer Account Manager</p>
                    </div>
                    <p class="text-muted">We may be young—but we bring fresh energy, digital systems, and a deep
                        understanding of how to move skilled people into jobs that matter.</p>
                </div>
                <div class="col-half text-center">
                    <img src="{{ asset('frontend/assets/images/manufacturing.png') }}" alt="Europe Workforce"
                        class="img-fluid">
                    <br><br><br>
                    <img src="{{ asset('frontend/assets/images/rrr.png') }}" alt="Europe Workforce" class="img-fluid">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <!-- Container for centering content -->
        <div class="container">
            <!-- Card container with shadow and padding -->
            <div class="card shadow border-0 p-5">
                <!-- Title of the form -->
                <h2 class="text-center fw-bold text-dark mb-4">Share Your Project Requirements</h2>
                
                <!-- Form starts here -->
                <form method="POST" action="{{ route('store.project_requirements') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Row for form fields -->
                    <div class="row g-4">
                        <!-- Company Name Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company Name</label>
                            <input type="text" name="company_name" class="form-control" required>
                        </div>
    
                        <!-- Contact Person Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Contact Person</label>
                            <input type="text" name="contact_person" class="form-control" required>
                        </div>
    
                        <!-- Email Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
    
                        <!-- Phone Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
    
                        <!-- Project Type Dropdown -->
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
    
                        <!-- Roles Needed Multi-select -->
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
    
                        <!-- Project Location Input -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Project Location</label>
                            <input type="text" name="project_location" class="form-control" required>
                        </div>
    
                        <!-- Start Date Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
    
                        <!-- File Upload Input -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Job Description (Optional)</label>
                            <input type="file" name="upload_file" class="form-control">
                        </div>
    
                        <!-- Additional Details Textarea -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Additional Details</label>
                            <textarea name="details" class="form-control" rows="4" placeholder="Describe your project needs..."></textarea>
                        </div>
                    </div>
    
                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
