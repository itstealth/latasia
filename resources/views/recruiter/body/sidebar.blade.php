<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('recruiter.dashboard') }}" class="waves-effect">
                        <i class=" ri-home-2-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Leads</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>All Leads</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('recruiter.leads') }}">Facebook Leads Recruiter</a></li>
                        <li><a href="{{ route('recruiter.leads.assign') }}">Assign Leads </a></li>
                       
                        


                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Working Leads</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                       <li><a href="{{ route('recruiter_interested.leads') }}"> Interested Leads</a></li>
                        <li><a href="{{ route('recruiter_all.leads') }}"> All Leads</a></li>


                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-2-line"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                       <li><a href="{{ route('reports.leads.employer') }}">Leads by Employer </a></li>
                        <li><a href="{{ route('recruiter_all.leads') }}"> Leads by Country</a></li>


                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
