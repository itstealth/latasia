<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class=" ri-home-2-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Home page</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Home Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.verticals') }}">Verticals</a></li>
                        <li><a href="{{ route('all.quick') }}">Weekly Journal</a></li>
                        <li><a href="{{ route('all.videoGallery') }}">Video Gallery</a></li>
                        


                    </ul>
                </li>
                <li class="menu-title">Invoice</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('invoices.add') }}">Add Invoice</a></li>
                         <li><a href="{{ route('invoices.list') }}">List Invoice</a></li>
                       
                        


                    </ul>
                </li>
          <li class="menu-title">Job Section</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Job Section</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.job') }}">Job Category</a></li>
                        <li><a href="{{ route('all.job_location') }}">Location</a></li>
                        <li><a href="{{ route('all.types_job') }}">Job Type</a></li>
                        <li><a href="{{ route('all.job_experience') }}">Job Experience</a></li>
                        <li><a href="{{ route('all.job_gender') }}">Job Gender</a></li>
                         <li><a href="{{ route('all.job_salary') }}">Job Salary</a></li>



                    </ul>
                </li>

                <li class="menu-title">Job Create</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Job Create</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.new_jobs') }}">Add New Job</a></li>
                        <li><a href="{{ route('all.new_jobs') }}">All New Jobs</a></li>
                        


                    </ul>
                </li>

             <li class="menu-title">Project</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Project</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.project') }}">Project</a></li>
                        <li><a href="{{ route('all.position') }}">Position</a></li>
                        <li><a href="{{ route('all.vacancy') }}">Vacancy</a></li>



                    </ul>
                </li>

                <li class="menu-title">Employer Contract</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Employer Contract</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.employer.contract') }}">All Contracts</a></li>
                        



                    </ul>
                </li>
                <li class="menu-title">Commission Rule</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Commission Rule</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.recruiter.commission.rules') }}">All Rules</a></li>



                    </ul>
                </li>
                <li class="menu-title">Lead Assign</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Lead Assign</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('lead.assign') }}">Facebook Lead Assign</a></li>
                        <li><a href="{{ route('lead.employer') }}">Employer Lead Assign</a></li>



                    </ul>
                </li>
                
                <li class="menu-title">Recruiter</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>All Login</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.recruiter') }}">All Recruiter</a></li>
                        <li><a href="{{ route('all.employer') }}">All Employer </a></li>
                        <li><a href="{{ route('all.employee') }}">All Employee </a></li>



                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
