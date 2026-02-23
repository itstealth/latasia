@extends('frontend.main_master')
@section('main')
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LcUU34pAAAAAIhYO49bCrwmHUSGSoTIY2WfZbmK"></script>

    <div class="main-content">

        <div class="page-content">


            <section class="bg-auth">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card auth-box">
                                <div class="row align-items-center">

                                    <div class="col-lg-6">
                                        <div class="auth-content card-body p-5 text-white">
                                            <div class="w-100">
                                                <div class="text-center">
                                                    <h5>Let's Get Started</h5>
                                                    <p class="text-white-70">Sign Up and Apply For all Avalable Job
                                                        Positions of Vasper</p>
                                                </div>
                                                <form action="{{ route('add.signup', ['job' => $job_single->id]) }}"
                                                    method="POST" id="candidate_signup_form" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" placeholder="Enter your username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="passwordInput" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="Enter your email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Contact Number</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            id="phone" placeholder="Enter your Phone Number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Current
                                                            Location</label>
                                                        <input type="text" name="location" class="form-control"
                                                            id="location" placeholder="Current Location">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Select Country
                                                            </label>
                                                        <select  class="form-control" name="country">
                                                            <option disabled selected value="">Select Country</option>
                                                            @foreach ($country as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Current
                                                            City</label>
                                                        <input type="text" name="city" class="form-control"
                                                            id="location" placeholder="Current City">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="usernameInput" class="form-label">Upload Resume</label>
                                                        <input type="file" name="photo" class="form-control"
                                                            id="phone">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="emailInput" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Enter your password">
                                                    </div>

                                                    <div class="g-recaptcha"
                                                        data-sitekey="6LcUU34pAAAAAIhYO49bCrwmHUSGSoTIY2WfZbmK">
                                                        @error('g-recaptcha-response')
                                                            -->
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary w-100">Sign Up</button>
                                                    </div>
                                                    <br>
                                                    <a href="{{ route('candidate.login') }}" class="btn btn-primary">Login
                                                        Link</a>
                                                </form>
                                                <!-- <div class="mt-3 text-center">
                                                    <p class="mb-0">Already a member ? <a href="login.php" class="fw-medium text-white text-decoration-underline"> Sign In </a></p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 text-center">
                                        <div class="card-body p-4">
                                            <a href="index.php">

                                            </a>
                                            <div class="mt-5">

                                                <img src="{{ asset('frontend/assets/images/auth/large-pic-1.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end auth-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section>

        </div>
    </div>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6LdFS34pAAAAAEqnX6skqHW8aDmu78LMEv46tJ8A', {
                    action: 'LOGIN'
                });
            });
        }
    </script>
    <script>
        function onSubmit(token) {
            document.getElementById("auth-form").submit();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('candidate_signup_form').addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                
                // Perform form submission using AJAX
                let form = this;
                let formData = new FormData(form);
                let xhr = new XMLHttpRequest();
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Form submission successful
                            showSuccessMessage();
                            form.reset(); // Reset form fields
                        } else {
                            // Form submission failed
                            alert('Error: ' + xhr.responseText);
                        }
                    }
                };
                
                xhr.open(form.method, form.action, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.send(formData);
            });
        });
        
        function showSuccessMessage() {
            // Display popup or alert for successful signup
            alert('Signup successful!'); // You can replace this with your custom popup implementation
        }
    </script>
@endsection
