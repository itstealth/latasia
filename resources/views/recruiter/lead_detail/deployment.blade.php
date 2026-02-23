<div class="row">
    <div class="tab-pane fade show active" id="deployment" role="tabpanel">

        @if ($employee)
            <form method="POST" action="{{ route('deployment.store', $employee->id) }}">
                @csrf

                <div class="row">

                    <!-- Employer -->
                    <div class="col-md-3 mb-3">
                        <label>Employer</label>
                        <select name="employer_id" class="form-select" required>
                            <option value="">Select Employer</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}"
                                    {{ old('employer_id', $deployment->employer_id ?? '') == $employer->id ? 'selected' : '' }}>
                                    {{ $employer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Project -->
                    <div class="col-md-3 mb-3">
                        <label>Project</label>
                        <select name="project_id" class="form-select" required>
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id', $lead->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Vacancy -->
                    <div class="col-md-3 mb-3">
                        <label>Vacancy</label>
                        <select name="vacancy_id" class="form-select" required>
                            <option value="">Select Vacancy</option>
                            @foreach ($vacancies as $vacancy)
                                <option value="{{ $vacancy->id }}"
                                    {{ old('vacancy_id', $lead->vacancy_id) == $vacancy->id ? 'selected' : '' }}>
                                    {{ $vacancy->openings }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <select name="deployment_status" class="form-select" required>
                            @foreach (['planned', 'departed', 'joined', 'on_hold', 'cancelled', 'completed'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('deployment_status', $deployment->deployment_status ?? 'planned') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dates -->
                    <div class="col-md-4 mb-3">
                        <label>Departure Date</label>
                        <input type="date" name="departure_date" class="form-control"
                            value="{{ old('departure_date', $deployment->departure_date ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Joining Date</label>
                        <input type="date" name="joining_date" class="form-control"
                            value="{{ old('joining_date', $deployment->joining_date ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Return Date</label>
                        <input type="date" name="return_date" class="form-control"
                            value="{{ old('return_date', $deployment->return_date ?? '') }}">
                    </div>

                    <!-- Location -->
                    
                   <div class="col-md-4 mb-3">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="form-select">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $deployment->country == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                    <div class="col-md-4 mb-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control"
                            value="{{ old('city', $deployment->city ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Site Location</label>
                        <input type="text" name="site_location" class="form-control"
                            value="{{ old('site_location', $deployment->site_location ?? '') }}">
                    </div>

                    <!-- Remarks -->
                    <div class="col-md-12 mb-3">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control">{{ old('remarks', $deployment->remarks ?? '') }}</textarea>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ $deployment ? 'Update Deployment' : 'Save Deployment' }}
                        </button>
                    </div>

                </div>
            </form>
        @else
            <div class="alert alert-warning">
                Employee not created yet. Please create employee first.
            </div>
        @endif


    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const employerSelect = document.getElementById('employer_id');
        const projectSelect = document.getElementById('project_id');
        const vacancySelect = document.getElementById('vacancy_id');

        if (!employerSelect) return; // safety

        employerSelect.addEventListener('change', function() {

            const employerId = this.value;

            projectSelect.innerHTML = '<option value="">Select Project</option>';
            vacancySelect.innerHTML = '<option value="">Select Vacancy</option>';

            projectSelect.disabled = true;
            vacancySelect.disabled = true;

            if (!employerId) return;

            fetch(`/employer/${employerId}/projects`)
                .then(res => res.json())
                .then(projects => {

                    projects.forEach(project => {
                        projectSelect.innerHTML +=
                            `<option value="${project.id}">${project.project_name}</option>`;
                    });

                    projectSelect.disabled = false;
                })
                .catch(err => console.error('Project load error:', err));
        });

        projectSelect.addEventListener('change', function() {

            const projectId = this.value;

            vacancySelect.innerHTML = '<option value="">Select Vacancy</option>';
            vacancySelect.disabled = true;

            if (!projectId) return;

            fetch(`/project/${projectId}/vacancies`)
                .then(res => res.json())
                .then(vacancies => {

                    vacancies.forEach(vacancy => {
                        vacancySelect.innerHTML +=
                            `<option value="${vacancy.id}">${vacancy.openings}</option>`;
                    });

                    vacancySelect.disabled = false;
                })
                .catch(err => console.error('Vacancy load error:', err));
        });

    });
</script>