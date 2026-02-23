<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .detail-card {
        border: 0;
        border-radius: 10px;
    }

    .detail-card .card-header {
        background: #f8f9fa;
        font-size: 15px;
        font-weight: 600;
        color: #212529;
        padding: 12px 18px;
        border-bottom: 1px solid #e9ecef;
    }

    .detail-item {
        margin-bottom: 20px;
    }

    .detail-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    /* 🔥 HIGHLIGHTED VALUE */
    .detail-value {
        font-size: 16px;
        font-weight: 600;
        color: #0d6efd;
        /* Highlight color */
        margin-top: 4px;
        word-break: break-word;
    }
</style>


<div class="row">

    <!-- Lead Information -->
    <div class="col-lg-12">
        <div class="card detail-card mb-4 shadow-sm">
            <div class="card-header">Lead Information</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Lead Code</div>
                        <div class="detail-value">{{ $lead->lead_code ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Source of Lead</div>
                        <div class="detail-value text-highlight">
                            {{ $lead->lead_source_name ?? 'NA' }}
                        </div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Lead Disposition</div>
                        <div class="detail-value">
                            {{ ucfirst($lead->lead_disposition ?? 'NA') }}
                        </div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Recruiter</div>
                        <div class="detail-value">
                            {{ $lead->recruiter->name ?? 'NA' }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Candidate Profile -->
    <div class="col-lg-12">
        <div class="card detail-card mb-4 shadow-sm">
            <div class="card-header">Candidate Profile</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Candidate Name</div>
                        <div class="detail-value">{{ $lead->name ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">{{ $lead->email ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Phone Number</div>
                        <div class="detail-value">{{ $lead->phone ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Current Location</div>
                        <div class="detail-value">{{ $lead->current_location ?? 'NA' }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Passport & Experience -->
    <div class="col-lg-12">
        <div class="card detail-card mb-4 shadow-sm">
            <div class="card-header">Passport & Experience</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Passport Number</div>
                        <div class="detail-value">{{ $lead->passport_number ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Passport Type</div>
                        <div class="detail-value">{{ ucfirst($lead->passport_type ?? 'NA') }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Overseas Experience (Years)</div>
                        <div class="detail-value">{{ $lead->overseas_experience ?? 'NA' }}</div>
                    </div>

                    <div class="col-md-3 detail-item">
                        <div class="detail-label">Indian Experience (Years)</div>
                        <div class="detail-value">{{ $lead->experience ?? 'NA' }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Job Details -->
    <div class="col-lg-12">
        <div class="card detail-card mb-4 shadow-sm">
            <div class="card-header">Job Details</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-4 detail-item">
                        <div class="detail-label">Job Title</div>
                        <div class="detail-value">{{ $lead->job_title ?? 'NA' }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="col-lg-12 text-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateLeadModal">
        <i class="fa fa-edit"></i> Update Lead
    </button>
</div>



<!-- Update Lead Modal -->
<!-- Update Lead Modal -->
<div class="modal fade" id="updateLeadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">

            <form action="{{ route('leadsoverview.update', $lead->id) }}" method="POST">
                @csrf

                <!-- ================= HEADER ================= -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-semibold">
                        <i class="fa fa-edit me-2"></i> Update Lead Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- ================= BODY ================= -->
                <div class="modal-body p-4" style="max-height:70vh; overflow-y:auto;">

                    <!-- Lead Information -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-light fw-semibold">
                            Lead Information
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-3">
                                    <label class="form-label">Lead Code</label>
                                    <input type="text" class="form-control" name="lead_code"
                                        value="{{ old('lead_code', $lead->lead_code) }}" readonly>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Lead Source</label>
                                    <input type="text" class="form-control" name="lead_source_name"
                                        value="{{ old('lead_source_name', $lead->lead_source_name) }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Lead Disposition</label>
                                    <select name="lead_disposition" class="form-select">
                                        @foreach (['not_connected', 'wrong_number', 'not_interested', 'interested', 'callback', 'converted'] as $status)
                                            <option value="{{ $status }}"
                                                {{ $lead->lead_disposition === $status ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Recruiter</label>
                                    <select name="recruiter_id" class="form-select">
                                        @foreach ($recruiters as $recruiter)
                                            <option value="{{ $recruiter->id }}"
                                                {{ $lead->recruiter_id == $recruiter->id ? 'selected' : '' }}>
                                                {{ $recruiter->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Candidate Profile -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-light fw-semibold">
                            Candidate Profile
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $lead->name) }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $lead->email) }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone', $lead->phone) }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Current Location</label>
                                    <input type="text" class="form-control" name="current_location"
                                        value="{{ old('current_location', $lead->current_location) }}">
                                </div>

<<<<<<< HEAD

=======
                                
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                                <div class="col-md-3">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="form-select">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $lead->country == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Employer</label>
                                    <select name="employer_id" class="form-select">
                                        @foreach ($employers as $employer)
                                            <option value="{{ $employer->id }}"
                                                {{ $lead->employer_id == $employer->id ? 'selected' : '' }}>
                                                {{ $employer->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
<<<<<<< HEAD

=======
                                
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                                <div class="col-md-3">
                                    <label class="form-label">Current City</label>
                                    <input type="text" class="form-control" name="city"
                                        value="{{ old('city', $lead->city) }}">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Passport & Experience -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-light fw-semibold">
                            Passport & Experience
                        </div>

                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-3">
                                    <label class="form-label">Passport Number</label>
                                    <input type="text" class="form-control" name="passport_number"
                                        value="{{ old('passport_number') ?? $lead->passport_number }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Passport Type</label>
                                    <input type="text" class="form-control" name="passport_type"
                                        value="{{ old('passport_type') ?? $lead->passport_type }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Overseas Experience b</label>
                                    <input type="text" class="form-control" name="overseas_experience"
                                        value="{{ old('overseas_experience') ?? $lead->overseas_experience }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Indian Experience</label>
                                    <input type="text" class="form-control" name="experience"
                                        value="{{ old('experience') ?? $lead->experience }}">
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Job Details -->
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-header bg-light fw-semibold">
                            Job Details
                        </div>

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Project -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Project</label>
                                    <input type="text" class="form-control"
                                        value="{{ $lead->project->project_name ?? 'N/A' }}" readonly>
                                </div>

                                <!-- Job Title -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Job Title</label>
                                    <input type="text" class="form-control" name="job_title"
                                        value="{{ old('job_title', $lead->job_title) }}">
                                </div>

                                <!-- Job Skill -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Job Skill</label>
                                    <input type="text" class="form-control" name="skills"
                                        value="{{ old('skills', $lead->skills) }}">
                                </div>

                                <!-- Job Category -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Job Category</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($jobCategories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id', $lead->category_id ?? '') == $category->id)>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Salary -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Salary</label>
                                    <select name="salary_id" class="form-select">
                                        <option value="">-- Select Salary --</option>
                                        @foreach ($jobSalaries as $salary)
                                            <option value="{{ $salary->id }}" @selected(old('salary_id', $lead->salary_id ?? '') == $salary->id)>
                                                {{ $salary->label ?? $salary->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
<<<<<<< HEAD


=======
                    
                    
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                    <!-- TRC Details -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-light fw-semibold">
                            TRC Details
                        </div>

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- TRC Status -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">TRC Status</label>
                                    <select name="trc_status" id="trc_status" class="form-select">
                                        <option value="">-- Select TRC Status --</option>

                                        @php
                                            $trcStatuses = [
                                                'available' => 'Available',
                                                'awaited' => 'Awaited',
                                                'yellow_card' => 'Yellow Card',
                                                'under_renewal' => 'Under Renewal',
                                            ];
                                        @endphp

                                        @foreach ($trcStatuses as $value => $label)
                                            <option value="{{ $value }}" @selected(old('trc_status', $lead->trc_status ?? '') == $value)>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 d-none" id="yellowCardStampingDate">
                                    <label class="form-label fw-semibold">Date of Stamping</label>
<<<<<<< HEAD
                                    <input type="date" name="yellow_card_stamping_date" class="form-control"
                                        value="{{ old('yellow_card_stamping_date', $lead->yellow_card_stamping_date ?? '') }}">
=======
                                    <input type="date" name="yellowcard_stamping_date" class="form-control"
                                        value="{{ old('yellowcard_stamping_date', $lead->yellowcard_stamping_date ?? '') }}">
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                                </div>

                                <!-- TRC Country -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">TRC Country</label>
                                    <select name="trc_country" class="form-select">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @selected(old('trc_country', $lead->trc_country ?? '') == $country->id)>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- TRC Validity -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">TRC Validity</label>
                                    <input type="text" name="trc_validity" class="form-control"
                                        placeholder="e.g. 2 Years"
                                        value="{{ old('trc_validity', $lead->trc_validity ?? '') }}">
                                </div>

                                <!-- TRC Expiry Date -->
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">TRC Expiry Date</label>
<<<<<<< HEAD
                                    <input type="date" name="trc_expriry_date" class="form-control"
                                        value="{{ old('trc_expriry_date', $lead->trc_expriry_date ?? '') }}">
=======
                                    <input type="date" name="trc_expiry_date" class="form-control"
                                        value="{{ old('trc_expiry_datetrc_expiry_date', $lead->trc_expiry_date ?? '') }}">
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <!-- ================= FOOTER (STICKY) ================= -->
                <div class="modal-footer bg-light position-sticky bottom-0">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="fa fa-save me-1"></i> Update Lead
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trcStatus = document.getElementById('trc_status');
        const yellowCardField = document.getElementById('yellowCardStampingDate');

        function toggleYellowCardField() {
            if (trcStatus.value === 'yellow_card') {
                yellowCardField.classList.remove('d-none');
            } else {
                yellowCardField.classList.add('d-none');
            }
        }

        // On load (edit mode)
        toggleYellowCardField();

        // On change
        trcStatus.addEventListener('change', toggleYellowCardField);
    });
<<<<<<< HEAD
</script>
=======
</script>
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
