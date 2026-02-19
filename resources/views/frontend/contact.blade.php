@extends('frontend.main_master')
@section('main')


<div class="main-content">
    
                <div class="page-content">

                    <!-- Start home -->
                    <section class="page-title-box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="text-center text-white">
                                        <h3 class="mb-4">Contact</h3>
                                        <div class="page-next">
                                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                                <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Contact</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"> Contact </li>
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

                    <section class="section">
                        <div class="container">
                            <div class="row align-items-center mt-5">
                                <div class="col-lg-6">
                                    <div class="section-title mt-4 mt-lg-0">
                                        <h3 class="title">Get in touch</h3>
                                         <p class="text-muted">Connect with  <span style="color: #1D649E">Vasper Staffing</span> Where talent meets opportunity, and businesses grow stronger.</p>
                                            <form method="post" action="{{ route('store.contactus') }}" class="contact-form mt-4" name="myForm" id="myForm">
                                                @csrf
                                                <span id="error-msg" class="text-danger"></span>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nameInput" class="form-label">Name</label>
                                                            <input type="text" name="name" id="nameInput" class="form-control" placeholder="Enter your name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter your email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="phoneInput" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="phoneInput" name="phone" placeholder="Enter your Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="subjectInput" class="form-label">Subject</label>
                                                            <input type="text" class="form-control" id="subjectInput" name="subject" placeholder="Enter your subject">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="messageInput" class="form-label">Your Message</label>
                                                            <textarea class="form-control" id="messageInput" placeholder="Enter your message" name="description" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-12 mb-3">
                                                        <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                                                    </div> --}}
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" name="submit" class="btn btn-primary">Send Message <i class="uil uil-message ms-1"></i></button>
                                                </div>
                                            </form>
                                            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                            <script>
                                                document.getElementById('myForm').addEventListener('submit', function(e) {
                                                    var errorMsg = document.getElementById('error-msg');
                                                    errorMsg.innerHTML = '';
                                            
                                                    var name = document.getElementById('nameInput').value.trim();
                                                    var email = document.getElementById('emailInput').value.trim();
                                                    var phone = document.getElementById('phoneInput').value.trim();
                                                    var subject = document.getElementById('subjectInput').value.trim();
                                                    var message = document.getElementById('messageInput').value.trim();
                                            
                                                    var isValid = true;
                                            
                                                    // Basic validation checks
                                                    if (!name) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please enter your name.<br>';
                                                    }
                                                    if (!email || !validateEmail(email)) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please enter a valid email address.<br>';
                                                    }
                                                    if (!phone || !validatePhone(phone)) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please enter a valid phone number.<br>';
                                                    }
                                                    if (!subject) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please enter the subject.<br>';
                                                    }
                                                    if (!message) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please enter your message.<br>';
                                                    }
                                                    if (!grecaptcha.getResponse()) {
                                                        isValid = false;
                                                        errorMsg.innerHTML += 'Please verify that you are not a robot.<br>';
                                                    }
                                            
                                                    if (!isValid) {
                                                        e.preventDefault(); // Prevent form submission if there are validation errors
                                                    }
                                                });
                                            
                                                function validateEmail(email) {
                                                    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                    return re.test(email);
                                                }
                                            
                                                function validatePhone(phone) {
                                                    var re = /^[0-9]{10}$/; // Simple validation for 10 digit numbers
                                                    return re.test(phone);
                                                }
                                            </script>
                                            
                                            
                                            
                                            
                                            
                                            
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-5 ms-auto order-first order-lg-last">
    <div class="text-center">
        <img src="{{ asset('frontend/assets/images/3.png') }}" alt="Vasper Staffing Office" class="img-fluid rounded shadow-sm">
    </div>

    <div class="mt-5 pt-4">
        <!-- Latvia Office -->
        <div class="d-flex align-items-start mb-4 p-3 border rounded shadow-sm bg-white">
            <div class="text-primary fs-4">
                <i class="uil uil-map-marker"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-2 fw-semibold text-dark">Head Office - Latvia</h6>
                <p class="mb-1 text-muted">
                    Riga, Latvia
                </p>
                <p class="mb-0 text-muted">
                    <strong>Email:</strong> info@latasia.eu<br>
                    <strong>Phone:</strong> +39 339 186 0672
                </p>
            </div>
        </div>

        <!-- Email -->
        <div class="d-flex align-items-start mb-4 p-3 border rounded shadow-sm bg-white">
            <div class="text-primary fs-4">
                <i class="uil uil-envelope"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-2 fw-semibold text-dark">Email</h6>
                <p class="mb-0 text-muted">info@latasia.eu</p>
            </div>
        </div>

        <!-- Phone -->
        <div class="d-flex align-items-start mb-4 p-3 border rounded shadow-sm bg-white">
            <div class="text-primary fs-4">
                <i class="uil uil-phone-alt"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-2 fw-semibold text-dark">Phone</h6>
                <p class="mb-0 text-muted">+39 339 186 0672</p>
            </div>
        </div>
    </div>

    <!-- Custom CSS for spacing & style -->
    <style>
        .d-flex.align-items-start i {
            min-width: 36px;
            text-align: center;
        }

        .ms-3 p {
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .border {
            border-color: #e5e5e5 !important;
        }

        .shadow-sm {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05) !important;
        }

        .bg-white {
            background-color: #fff;
        }

        h6.fw-semibold {
            color: #002147;
            font-weight: 600 !important;
        }
    </style>
</div>

                                

                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->
                    </section>
                </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('store.contactus') }}",
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