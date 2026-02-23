@extends('frontend.main_master')
@section('main')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="main-content">

    <div class="page-content">
       
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Professional Profile Assessment </h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Evaluation </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

       

         <!-- START JOB-LIST -->
         <section class="section">
            <div class="container">
                

                    <div class="row align-items-center">
                    <div class="form-v10-content">
    <form class="form-detail" enctype="multipart/form-data" action="{{ route ('store.evaluation')}}" method="post" id="myform">
       @csrf
       <input type="hidden" name="owner_name" value="{{$vasper->name}}">
       <input type="hidden" name="vasper_code" value="{{$vasper->vasper_code}}">
       
        <div class="form-left">
            <h2>General Infomation</h2>
            <div class="form-row">
                <select name="job_title_id" id="job_title_id">
                    <option value="">Job Title</option>
                    @foreach ($job_title as $title)
                    <option value="{{ $title->title }}">{{ $title->title }}</option>
                    @endforeach
                
                </select>
                <span class="select-btn">
                      <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            <input type="hidden" name="job_id" value="{{$title->id}}">
            <div class="form-row">
                <select name="country" id="country" >
                    @php
                        $uniqueCountries = [];
                    @endphp
            
                    @foreach ($countries as $country)
                        @php
                            $countryData = json_decode($country, true);
            
                            // Check if the country is already in the unique list
                            if (!in_array($countryData['country'], $uniqueCountries)) {
                                $uniqueCountries[] = $countryData['country'];
                        @endphp
                                <option value="{{ $countryData['country'] }}" data-job-title="{{ $countryData['title'] }}" data-job-id="{{ $countryData['id'] }}">
                                    {{ $countryData['country'] }}
                                </option>
                        @php
                            }
                        @endphp
                    @endforeach
                </select>
            
                <span class="select-btn">
                    <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            <div class="form-row">
                <select name="experience_id">
                <option>Select Experience</option>
                
                @foreach ($job_experience as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                <span class="select-btn">
                      <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            <div class="form-group">
                <div class="form-row form-row-1">
                    <input type="text" name="passportnumber" id="" class="input-text" placeholder="Passport Number" required>
                </div>
                
                <div class="form-row form-row-2">
                    <input type="text" name="location" id="" class="input-text" placeholder="Current Location" >
                </div>
            </div>
            <div class="form-row">
                <select name="passport_type">
                <option>Select Passport Type</option>
                <option value="ECR">ECR</option>
                <option value="ECNR">ECNR</option>
                
                </select>
                <span class="select-btn">
                      <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            <div class="form-row">
                <select name="education">
                <option>Select Education</option>
                <option value="Intermediate">Intermediate</option>
                <option value="High School">High School</option>
                <option value="Diploma">Diploma</option>
                <option value="Graduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
                <option value="ITI">ITI</option>
                </select>
                <span class="select-btn">
                      <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            <div class="form-row">
            <label class="form-label" for="progress-basicpill-lastname-input">Upload Resume</label>
            <input type="file" name="resume" id="" class="input-text" placeholder="" required>
                <span class="select-btn">
                      <i class="zmdi zmdi-chevron-down"></i>
                </span>
            </div>
            

        </div>
        <div class="form-right">
            <h2>Contact Details</h2>
            <div class="form-row">
                <input type="text" name="name" class="street" id="street" placeholder="Name" >
            </div>
            <div class="form-row">
                <input type="email" name="email" class="additional" id="additional" placeholder="Your Email" >
            </div>
            <div class="form-row">
                <input type="text" name="phone" class="additional" id="additional" placeholder="Phone Number" >
            </div>
           
            {{-- <div class="form-group">
                <div class="form-row form-row-1">
                    <input type="text" name="zcode" class="zip" id="zip" placeholder="Pin Code" required>
                </div>
                <div class="form-row form-row-2">
                <input type="text" name="address" class="phone" id="phone" placeholder="Current Location" required>
                    <span class="select-btn">
                          <i class="zmdi zmdi-chevron-down"></i>
                    </span>
                </div>
            </div> --}}
            
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Register">
            </div>
        </div>
    </form>
</div>
                    </div>

               
            </div>
        </section>
        <!-- END JOB-LIST -->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#job_title_id').change(function () {
            $('#country').prop('disabled', false);
            var selectedJobId = $(this).val();

            // Find the option with the matching data-job-id attribute
            var $selectedCountryOption = $('#country').find('option[data-job-id="' + selectedJobId + '"]');

            // Update the selected country based on the selected job title
            if ($selectedCountryOption.length > 0) {
                // Set the selected attribute for the corresponding option
                $selectedCountryOption.prop('selected', true);
            }
        });
    });
</script>


@endsection