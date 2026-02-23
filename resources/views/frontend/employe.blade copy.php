@extends('frontend.main_master')
@section('main')



<div class="main-content">


   

    <div class="container mt-5">
        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-message">
                        <!-- Success message will be injected here by JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Start home -->
    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Employer-Zone</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Employer-Zone</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Employer-Zone </li>
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


    <section class="section overflow-hidden">
                        <div class="container">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-6">
                                    <div class="section-title me-lg-5">
                                        
                                    <h2 class="title">Employer Solutions: Discover Why Top Companies Trust <span style="color: #1D649E">Vasper</span></span></h2>

                                        <p class="text-muted">When it comes to finding the right talent for your organization, trust the experts at Vasper. With over 35,000 successful placements and 150,000+ live jobs, we have the experience and resources to help you build a team that drives success.  </p>
                                        <p class="text-muted">Trust the experts at Vasper to help you build a winning team. Contact us today to learn more about our employer solutions.</p>
                                        <p class="text-muted">Our services don't just stop at matching you with the right talent. We also offer in-house counseling and training to ensure that your project runs smoothly from start to finish. Our experienced team is dedicated to providing you with the support you need to achieve your goals.</p>
                                        <p class="text-muted">In addition, our recruitment centres are designed to help streamline the hiring process. We understand that finding the right candidates can be time-consuming and challenging. That's why we've created a system that makes the process as efficient and effective as possible.</p>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="section-title mt-4 mt-lg-0">
                                        <h3 class="title">Get in touch</h3>
                                        
                                        <form method="post" action="{{ route('store.employe') }}" class="contact-form mt-4" name="myForm" id="myForm">
                                            @csrf
                                            <span id="error-msg" style="color: red; display: none;"></span>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="nameInput" class="form-label">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name" required>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailInput" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phoneInput" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your Phone" required>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="companyInput" class="form-label">Company</label>
                                                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter your Company Name">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="positionInput" class="form-label">Position</label>
                                                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter your Position Title">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="messageInput" class="form-label">Your Message</label>
                                                        <textarea class="form-control" id="messageInput" placeholder="Enter your message" name="description" rows="3"></textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="text-end">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Send Message <i class="uil uil-message ms-1"></i></button>
                                                </div>
                                            </div><!--end row-->
                                        </form><!--end form-->
                                        
                                        <script>
                                        document.getElementById('myForm').addEventListener('submit', function(event) {
                                            event.preventDefault(); // Prevent form from submitting
                                        
                                            // Clear previous errors
                                            const errorMsg = document.getElementById('error-msg');
                                            errorMsg.textContent = '';
                                            errorMsg.style.display = 'none';
                                        
                                            // Get form values
                                            const name = document.getElementById('name').value.trim();
                                            const email = document.getElementById('email').value.trim();
                                            const phone = document.getElementById('phone').value.trim();
                                            const company = document.getElementById('company').value.trim();
                                            const position = document.getElementById('position').value.trim();
                                            const description = document.getElementById('messageInput').value.trim();
                                        
                                            // Validation
                                            let isValid = true;
                                        
                                            if (!name) {
                                                errorMsg.textContent += 'Name is required. ';
                                                isValid = false;
                                            }
                                        
                                            if (!email || !validateEmail(email)) {
                                                errorMsg.textContent += 'Valid email is required. ';
                                                isValid = false;
                                            }
                                        
                                            if (!phone || !validatePhone(phone)) {
                                                errorMsg.textContent += 'Valid phone number is required. ';
                                                isValid = false;
                                            }
                                        
                                            if (!description) {
                                                errorMsg.textContent += 'Message is required. ';
                                                isValid = false;
                                            }
                                        
                                            if (isValid) {
                                                document.getElementById('myForm').submit(); // Submit form if all validations pass
                                            } else {
                                                errorMsg.style.display = 'block'; // Show error message
                                            }
                                        });
                                        
                                        function validateEmail(email) {
                                            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                            return re.test(email);
                                        }
                                        
                                        function validatePhone(phone) {
                                            const re = /^[0-9]{10}$/; // Example for a 10-digit phone number
                                            return re.test(phone);
                                        }
                                        </script>
                                        
                                  
                                </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </section>

                    <section class="section">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="section-title me-5">
                                        <h3 class="title">We are committed to your success</h3>
                                        <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                                            right freelancers.</p>
                                        <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        1
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">In-house Counselling</h5>
                                                        <p class="text-muted mb-0">Start by creating an account with us. This will enable you to post your job proposals which will reach qualified professionals.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        2
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">In-house Training</h5>
                                                        <p class="text-muted mb-0">Once your account is set up, post a job description detailing your project needs. Our platform will quickly match you with specialists who have the right skills and experience.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                                <div class=" d-flex">
                                                    <div class="number flex-shrink-0">
                                                        3
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Vasper Centres</h5>
                                                        <p class="text-muted mb-0">Browse through the list of potential candidates and evaluate their profiles, work history, and reviews from other clients to find the best fit for your project.</p>
                                                        <p class="text-muted mb-0">It's as simple as that.
Recruitory is committed to simplify your Vasper journey.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            
                                            <img src="{{ asset('frontend/assets/images/process-01.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                           
                                            <img src="{{ asset('frontend/assets/images/process-02.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <img src="{{ asset('frontend/assets/images/process-03.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div> <!--end row-->
                        </div><!--end container-->
                    </section>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('store.employe') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Display the success message in the modal
                    $('#modal-body-message').text(response.success);
                    // Show the modal
                    $('#successModal').modal('show');
                    // Reset the form
                    $('#myForm')[0].reset();
                },
                error: function(response) {
                    // Handle the error (you can show an error message in a similar way)
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>

@endsection