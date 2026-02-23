@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Employer Media lead</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Employer Media lead</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
    <div class="col-12">

       


        <!-- ================= ASSIGN LEADS ================= -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title mb-3">Assign Employer Media Leads</h4>

                <form action="{{ route('social.assign.store') }}" method="POST">
                    @csrf

                    <div class="row align-items-end mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Select Recruiter</label>
                            <select class="form-control select2" name="recruiter_id" required>
                                <option value="">-- Select Recruiter --</option>
                                @foreach($recruiter as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">
                                Assign Selected Leads
                            </button>
                        </div>
                    </div>


                    <!-- ================= LEADS TABLE ================= -->
                    <div class="table-responsive">
                        <table id="selection-datatable"
                            class="table table-bordered table-striped nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Partner</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($partner_leads as $key => $item)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                            class="lead-checkbox"
                                            name="lead_ids[]"
                                            value="{{ $item->id }}">
                                    </td>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->vasper_code)
                                            {{ \App\Models\Partner::where('vasper_code', $item->vasper_code)->value('name') }}
                                        @else
                                            <span class="text-muted">Not Assigned</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
   <!-- Add this script at the end of your view, after including jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
    // Handle "Select All" checkbox click event
    $('#select-all').click(function () {
        $('.chk').prop('checked', $(this).prop('checked'));
        $('#submit').prop('disabled', !$(this).prop('checked'));
    });

    // Handle individual checkbox click event
    $('.chk').click(function () {
        var anyCheckboxChecked = $('.chk:checked').length > 0;
        $('#submit').prop('disabled', !anyCheckboxChecked);
        $('#select-all').prop('checked', $('.chk:checked').length === $('.chk').length);
    });

    // Handle form submission
    $('#assign-form').submit(function (e) {
        e.preventDefault();
        // Your custom logic for form submission
        $('#submit').prop('disabled', true);
    });
});

</script>
<script>
    document.getElementById('selectAll').addEventListener('click', function () {
        let checkboxes = document.querySelectorAll('.lead-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>

@endsection
