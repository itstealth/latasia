@extends('recruiter.recruiter_master')
@section('recruiter')
    <style>
        table.dataTable td,
        table.dataTable th {
            white-space: nowrap;
            /* Prevent line breaks */
            vertical-align: middle;
        }

        table.dataTable {
            border-collapse: collapse;
            /* Clean table structure */
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem;
            /* Add space above pagination */
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All leads</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">All leads</li>
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 text-primary fw-semibold">
                                <i class="fas fa-filter me-1"></i> Filter Leads
                            </h5>

                            <div class="d-flex gap-2">
                                <button id="applyFilters" class="btn btn-primary btn-sm">
                                    <i class="fas fa-search me-1"></i> Apply
                                </button>

                                <button id="resetFilters" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-undo me-1"></i> Reset
                                </button>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="row g-3">

                            <!-- Country -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Country</label>
                                <select id="filterCountry" class="form-select form-select-sm">
                                    <option value="">All</option>
                                    @foreach ($countryList as $country)
                                        <option value="{{ $country->id }}"
                                            {{ request('country') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Location -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Location</label>
                                <select id="filterLocation" class="form-select form-select-sm">
                                    <option value="">All</option>
                                    @foreach ($locations as $loc)
                                        <option value="{{ $loc }}"
                                            {{ request('location') == $loc ? 'selected' : '' }}>
                                            {{ $loc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Disposition -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Disposition</label>
                                <select id="filterDisposition" class="form-select form-select-sm">
                                    <option value="">All</option>
                                    <option value="interested"
                                        {{ request('disposition') == 'interested' ? 'selected' : '' }}>Interested</option>
                                    <option value="callback" {{ request('disposition') == 'callback' ? 'selected' : '' }}>
                                        Callback</option>
                                    <option value="converted" {{ request('disposition') == 'converted' ? 'selected' : '' }}>
                                        Converted</option>
                                </select>
                            </div>

                            <!-- Job Title -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Job Title</label>
                                <select id="filterJob" class="form-select form-select-sm">
                                    <option value="">All</option>
                                    @foreach ($jobTitles as $job)
                                        <option value="{{ $job }}"
                                            {{ request('job_title') == $job ? 'selected' : '' }}>
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Project -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Project</label>
                                <select id="filterProject" class="form-select form-select-sm">
                                    <option value="">All</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ request('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Start Date -->
                            <div class="col-lg-1 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">Start</label>
                                <input type="date" id="startDate" value="{{ request('start_date') }}"
                                    class="form-control form-control-sm">
                            </div>

                            <!-- End Date -->
                            <div class="col-lg-1 col-md-4 col-sm-6">
                                <label class="form-label small text-muted">End</label>
                                <input type="date" id="endDate" value="{{ request('end_date') }}"
                                    class="form-control form-control-sm">
                            </div>

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">All Leads</h4>


                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Lead Code</th>
                                                <th>Job Title</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Disposition</th>
                                                <th>Country</th>
                                                <th>Action</th>
                                                <th>WhatsApp</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp

                                            @forelse ($all_leads as $item)
                                                <tr>

                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->lead_code ?? 'N/A' }}</td>
                                                    <td>{{ $item->job_title ?? 'N/A' }}</td>
                                                    <td>{{ $item->name ?? 'N/A' }}</td>
                                                    <td>{{ $item->phone ?? 'N/A' }}</td>
                                                    <td>{{ $item->lead_disposition ?? 'N/A' }}</td>
                                                    <td>{{ $item->countryRelation?->name ?? 'N/A' }}</td>

                                                    <!-- View Button -->
                                                    <td class="text-center">
                                                        <a href="{{ route('recruiter.lead.fulldetails', $item->id) }}"
                                                            target="_blank" class="btn btn-primary btn-sm">
                                                            View Details
                                                        </a>
                                                    </td>

                                                    <!-- WhatsApp Button -->

                                                    <td class="text-center">

                                                        @php
                                                            $phone = $item->phone ?? '';
                                                            $cleanNumber = preg_replace('/[^0-9]/', '', $phone);

                                                            if (strlen($cleanNumber) == 10) {
                                                                $cleanNumber = '91' . $cleanNumber;
                                                            }

                                                            $companyName = 'Latasia Recruitment Solutions';
                                                            $recruiterName = 'HR Team';
                                                            $companyPhone = '+39 339 186 0672';

                                                            $fileUrl = asset('storage/job_files/sample.pdf');

                                                            $message =
                                                                '*Dear ' .
                                                                ($item->name ?? 'Candidate') .
                                                                ",*\n\n" .
                                                                'Greetings from *' .
                                                                $companyName .
                                                                "*!\n\n" .
                                                                "We reviewed your profile for the following opportunity:\n\n" .
                                                                '*Job Title:* ' .
                                                                ($item->job_title ?? 'N/A') .
                                                                "\n" .
                                                                '*Disposition:* ' .
                                                                ($item->lead_disposition ?? 'N/A') .
                                                                "\n" .
                                                                '*Country:* ' .
                                                                ($item->countryRelation?->name ?? 'N/A') .
                                                                "\n\n" .
                                                                "Job Details:\n" .
                                                                $fileUrl .
                                                                "\n\n" .
                                                                "Kindly confirm your interest.\n\n" .
                                                                "Best Regards,\n" .
                                                                '*' .
                                                                $recruiterName .
                                                                "*\n" .
                                                                $companyName .
                                                                "\n" .
                                                                'Contact: ' .
                                                                $companyPhone;

                                                            $encodedMessage = urlencode($message);
                                                        @endphp


                                                        @if (!empty($cleanNumber))
                                                            @if ($item->whatsapp_sent)
                                                                <span class="badge bg-success">
                                                                    Sent<br>
                                                                    {{ $item->whatsapp_sent_at ? $item->whatsapp_sent_at->format('d M Y ') : '' }}
                                                                </span>
                                                            @else
                                                                <button class="btn btn-success btn-sm send-whatsapp-btn"
                                                                    data-id="{{ $item->id }}"
                                                                    data-number="{{ $cleanNumber }}"
                                                                    data-message="{{ $encodedMessage }}">
                                                                    <i class="fab fa-whatsapp"></i> Send
                                                                </button>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">No Number</span>
                                                        @endif



                                                    </td>





                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center text-danger">
                                                        No leads found
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>



                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->

        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const applyBtn = document.getElementById('applyFilters');
        const resetBtn = document.getElementById('resetFilters');

        if (applyBtn) {
            applyBtn.addEventListener('click', function() {

                let params = new URLSearchParams();

                let country = document.getElementById('filterCountry')?.value;
                let location = document.getElementById('filterLocation')?.value;
                let disposition = document.getElementById('filterDisposition')?.value;
                let job = document.getElementById('filterJob')?.value;
                let project = document.getElementById('filterProject')?.value;
                let start = document.getElementById('startDate')?.value;
                let end = document.getElementById('endDate')?.value;

                if (country) params.append('country', country);
                if (location) params.append('location', location);
                if (disposition) params.append('disposition', disposition);
                if (job) params.append('job_title', job);
                if (project) params.append('project_id', project);
                if (start) params.append('start_date', start);
                if (end) params.append('end_date', end);

                window.location.href =
                    "{{ route('recruiter_all.leads') }}" +
                    (params.toString() ? '?' + params.toString() : '');
            });
        }

        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                window.location.href = "{{ route('recruiter_all.leads') }}";
            });
        }

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.send-whatsapp-btn').forEach(button => {

            button.addEventListener('click', function() {

                let btn = this;
                let leadId = btn.dataset.id;
                let number = btn.dataset.number;
                let message = btn.dataset.message;

                // Disable button immediately
                btn.disabled = true;
                btn.innerHTML = "Sending...";

                // 1️⃣ Open WhatsApp
                window.open(`https://wa.me/${number}?text=${message}`, '_blank');

                // 2️⃣ Save status in database
                fetch(`/recruiter/send-whatsapp/${leadId}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {

                        if (data.success) {

                            btn.outerHTML = `
                        <span class="badge bg-success">
                            Sent<br>
                            ${data.sent_at}
                        </span>
                    `;

                        } else {

                            btn.outerHTML = `
                        <span class="badge bg-danger">
                            Already Sent
                        </span>
                    `;

                        }

                    })
                    .catch(error => {

                        btn.disabled = false;
                        btn.innerHTML = "Send";
                        alert("Something went wrong!");

                    });

            });

        });

    });
</script>
