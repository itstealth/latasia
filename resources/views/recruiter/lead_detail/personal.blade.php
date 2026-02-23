<div class="tab-pane fade show active" id="personal" role="tabpanel">

    {{-- ================= SHORTLIST LEAD ================= --}}
    <div class="card mb-4">
        <div class="card-header fw-semibold">
            Shortlist Lead to Vacancy
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('leads.mapToVacancy', $lead->id) }}">
                @csrf

                <div class="row g-3">

                    {{-- Employer --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Employer</label>
                        <select id="employer_id" name="employer_id" class="form-select" required>
                            <option value="">Select Employer</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}"
                                    {{ old('employer_id', $lead->employer_id) == $employer->id ? 'selected' : '' }}>
<<<<<<< HEAD
                                    {{ $employer->name }}
=======
                                    {{ $employer->company_name }}
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                                </option>
                            @endforeach
                        </select>

                    </div>

                    {{-- Project --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Project</label>
                        <select id="project_id" name="project_id" class="form-select" required>
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id', $lead->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    {{-- Vacancy --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Vacancy</label>
                        <select id="vacancy_id" name="vacancy_id" class="form-select" required>
                            <option value="">Select Vacancy</option>
                            @foreach ($vacancies as $vacancy)
                                <option value="{{ $vacancy->id }}"
                                    {{ old('vacancy_id', $lead->vacancy_id) == $vacancy->id ? 'selected' : '' }}>
                                    {{ $vacancy->openings }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Shortlist Lead
                    </button>
                </div>
            </form>

        </div>
    </div>

    {{-- ================= CREATE EMPLOYEE ================= --}}
    <div class="card">
        <div class="card-header fw-semibold">
            Create Employee
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf


                <input type="hidden" name="lead_id" value="{{ $lead->id }}">

                {{-- ================= BASIC INFO ================= --}}
                <div class="card mb-3">
                    <div class="card-header fw-bold">Employee Basic Information</div>
                    <div class="card-body row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Employee Code</label>
                            <input type="text" class="form-control"
                                value="{{ $employee->employee_code ?? 'Auto Generated' }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">First Name *</label>
                            <input type="text" name="first_name" class="form-control" required
                                value="{{ old('first_name', $employee->first_name ?? $lead->name) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control"
                                value="{{ old('middle_name', $employee->middle_name ?? '') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name', $employee->last_name ?? '') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select</option>
                                <option value="male" @selected(old('gender', $employee->gender ?? '') == 'male')>Male</option>
                                <option value="female" @selected(old('gender', $employee->gender ?? '') == 'female')>Female</option>
                                <option value="other" @selected(old('gender', $employee->gender ?? '') == 'other')>Other</option>
                            </select>
                        </div>

                    </div>
                </div>

                {{-- ================= CONTACT ================= --}}
                <div class="card mb-3">
                    <div class="card-header fw-bold">Contact Details</div>
                    <div class="card-body row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Phone *</label>
                            <input type="text" name="phone" class="form-control" required
                                value="{{ old('phone', $employee->phone ?? $lead->phone) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $employee->email ?? $lead->email) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Current Location</label>
                            <input type="text" name="current_location" class="form-control"
                                value="{{ old('current_location', $employee->current_location ?? $lead->current_location) }}">
                        </div>

                    </div>
                </div>

                {{-- ================= PASSPORT ================= --}}
                <div class="card mb-3">
                    <div class="card-header fw-bold">Passport Details</div>
                    <div class="card-body row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Passport Number</label>
                            <input type="text" name="passport_number" class="form-control"
                                value="{{ old('passport_number', $employee->passport_number ?? $lead->passport_number) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Passport Type</label>
                            <select name="passport_type" class="form-select">
                                <option value="">Select</option>
                                <option value="normal" @selected(old('passport_type', $employee->passport_type ?? '') == 'normal')>
                                    Normal
                                </option>
                                <option value="tatkal" @selected(old('passport_type', $employee->passport_type ?? '') == 'tatkal')>
                                    Tatkal
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Passport Expiry</label>
                            <input type="date" name="passport_expiry" class="form-control"
                                value="{{ old('passport_expiry', $employee->passport_expiry ?? '') }}">
                        </div>

                    </div>
                </div>

                {{-- ================= STATUS ================= --}}
                <div class="row g-3">

                    <!-- Deployment Status -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Deployment Status</label>
                        <select name="deployment_status" class="form-select" required>
                            <option value="">-- Select Deployment Status --</option>

                            @php
                                $deploymentStatuses = [
                                    'lead_collected' => 'Lead Collected',
                                    'profile_under_review' => 'Profile Under Review',
                                    'shortlisted_for_project' => 'Shortlisted for Project',
                                    'test_pending' => 'Test Pending',
                                    'test_cleared' => 'Test Cleared',
                                    'test_not_required' => 'Test Not Required – Direct Shortlisting',
                                    'immigration_readiness_check' => 'Immigration Readiness Check',
                                    'eligible_for_deployment' => 'Eligible for Deployment',
                                    'deployment_on_hold' => 'Deployment On Hold',
                                    'deployed' => 'Deployed',
                                    'dropped' => 'Dropped / Not Proceeding',
                                ];
                            @endphp

                            @foreach ($deploymentStatuses as $value => $label)
                                <option value="{{ $value }}" @selected(old('deployment_status', $employee->deployment_status ?? '') == $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Employee Status -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Employee Status</label>
                        <select name="status" class="form-select">
                            <option value="active" @selected(old('status', $employee->status ?? 'active') == 'active')>
                                Active
                            </option>
                            <option value="on_hold" @selected(old('status', $employee->status ?? '') == 'on_hold')>
                                On Hold
                            </option>
                            <option value="blacklisted" @selected(old('status', $employee->status ?? '') == 'blacklisted')>
                                Blacklisted
                            </option>
                        </select>
                    </div>

                </div>


                {{-- ================= SUBMIT ================= --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        {{ $employee ? 'Update Employee' : 'Create Employee' }}
                    </button>
                </div>

            </form>


        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const employerSelect = document.getElementById('employer_id');
        const projectSelect = document.getElementById('project_id');
        const vacancySelect = document.getElementById('vacancy_id');

        const selectedEmployer = "{{ $lead->employer_id }}";
        const selectedProject = "{{ $lead->project_id }}";
        const selectedVacancy = "{{ $lead->vacancy_id }}";

        if (selectedEmployer) {
            fetch(`/employer/${selectedEmployer}/projects`)
                .then(res => res.json())
                .then(projects => {

                    projectSelect.innerHTML = '<option value="">Select Project</option>';

                    projects.forEach(project => {
                        projectSelect.innerHTML += `
                        <option value="${project.id}" 
                            ${project.id == selectedProject ? 'selected' : ''}>
                            ${project.project_name}
                        </option>`;
                    });

                    projectSelect.disabled = false;

                    if (selectedProject) {
                        fetch(`/project/${selectedProject}/vacancies`)
                            .then(res => res.json())
                            .then(vacancies => {

                                vacancySelect.innerHTML = '<option value="">Select Vacancy</option>';

                                vacancies.forEach(vacancy => {
                                    vacancySelect.innerHTML += `
                                    <option value="${vacancy.id}" 
                                        ${vacancy.id == selectedVacancy ? 'selected' : ''}>
                                        ${vacancy.openings}
                                    </option>`;
                                });

                                vacancySelect.disabled = false;
                            });
                    }
                });
        }
    });
</script>
