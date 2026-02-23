
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Include Bootstrap JS -->
 
<div class="tab-pane active" id="timesheets" role="tabpanel">
    &nbsp; &nbsp;
    &nbsp; &nbsp;
    <hr>
    @if(session('activeTab'))
    <script>
        window.onload = function () {
            var activeTab = '{{ session('activeTab') }}';
            console.log('Attempting to activate tab:', activeTab);

            // Activate the tab using jQuery
            $('.nav-link[href="#' + activeTab + '"]').tab('show');
        };
    </script>
@endif  <p class="mb-0">
        <!-- Overview Model Start -->
   

        <div class="row">

            

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Source of Lead</label>
                    <h4 class="card-title mb-4"> Partner </h4>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Partner Name</label>
                    <h4 class="card-title mb-4"> {{ $leads->partner_name }} </h4>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-firstname-input">Job Category</label>
                    <h4 class="card-title mb-4">
                        @if($leads->job_category)
                        {{ $leads->job_category }}
                        @else
                        NA
                      @endif
                     
                        </h4>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-firstname-input">Job Title</label>
                    <h4 class="card-title mb-4">
                         @if($leads->job_title)
                         {{ $leads->job_title }} 
                         @else
                         NA
                       @endif
                        </h4>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Passport Number</label>
                    <h4 class="card-title mb-4"> 
                        @if($leads->passport_number )
                        {{ $leads->passport_number }} 
                        @else
                         NA
                       @endif
                    </h4>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Passport Type</label>
                    <h4 class="card-title mb-4"> 
                        @if($leads->passport_type )
                        {{ $leads->passport_type }}
                        @else
                         NA
                       @endif
                     </h4>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Overseas Experience</label>
                    <h4 class="card-title mb-4">
                        @if($leads->overseas_experince)
                        {{ $leads->overseas_experince }}
                        @else
                        NA
                      @endif
                    </h4>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Indian Experience</label>
                    <h4 class="card-title mb-4"> 
                        @if($leads->experince)
                        {{ $leads->experince }}
                        @else
                        NA
                      @endif 
                    </h4>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Lead Stage</label>
                    <h4 class="card-title mb-4"> 
                        @if($leads->lead_stage)
                        {{ $leads->lead_stage }}
                           @else
                           NA
                         @endif
                    </h4>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Pending Tasks</label>
                    <h4 class="card-title mb-4"> 
                        @if($task->category ?? 'NA' )
                        {{ $task->category ?? 'NA'  }}
                           @else
                           NA
                         @endif
                    </h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label"
                        for="progress-basicpill-firstname-input">Desired Country</label>
                    <h4 class="card-title mb-4"> 
                        @if($leads->desiged_country)
                        {{ $leads->desiged_country }} 
                        @else
                        NA
                      @endif
                    </h4>
                </div>
            </div>
            
        </div>
          
        <hr>
        
            
              


                <!-- Additional code -->
               
            </div>
            
               

           
           
        </div>
        
        <script>
            $(document).ready(function() {
                // Attach click event to the toggle button
                $("#toggleButton").click(function() {
                    // Toggle the display of the textarea container
                    $("#textareaContainer").toggle();
                    // Toggle the display of the Bootstrap code container
                    $("#bootstrapCodeContainer").toggle();
                });
            });
        </script>
        <!-- Overview Model End -->
        </p>

</div>