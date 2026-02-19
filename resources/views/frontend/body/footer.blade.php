<style>
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 100;
    cursor: pointer;
    background-color: #25D366;
    padding: 10px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
}

.whatsapp-float:hover {
    transform: scale(1.1);
}

.whatsapp-float img {
    width: 40px;
    height: 40px;
}

    </style>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<section class="bg-footer py-5">
    <div class="container">
        <div class="row">
            <!-- Vasper Staffing Section -->
            <div class="col-lg-4">
                <div class="footer-item mb-4 mb-lg-0">
                    <h4 class="text-white mb-3">Latasia International</h4>
                    <p class="text-white-50 mb-3">At Latasia International, every candidate we support, and every employer we serve, is a partnership in success</p>
                    <p class="text-white mt-3">Follow Us on:</p>
                    <ul class="footer-social-menu list-inline mb-0">
                        <li class="list-inline-item"><a href="#" target="_blank" class="text-white"><i class="uil uil-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="text-white"><i class="uil uil-linkedin-alt"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="text-white"><i class="uil uil-instagram"></i></a></li>
                        <!--<li class="list-inline-item"><a href="#" target="_blank" class="text-white"><i class="uil uil-twitter"></i></a></li>-->
                    </ul>
                </div>
            </div>

            <!-- Company Links Section -->
            <div class="col-lg-2 col-6">
                <div class="footer-item mb-4 mb-lg-0">
                    <p class="fs-16 text-white mb-3">Company</p>
                    <ul class="list-unstyled footer-list mb-0">
                        <li><a href="{{'/about'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                         <!--<li><a href="{{ url('/team') }}" class="text-white"><i class="mdi mdi-chevron-right"></i> Team</a></li>-->
                       
                        
                        <li><a href="{{'/contact'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- For Jobs Section -->
            <div class="col-lg-2 col-6">
                <div class="footer-item mb-4 mb-lg-0">
                    <p class="fs-16 text-white mb-3">For Jobs</p>
                    <ul class="list-unstyled footer-list mb-0">
                        <li><a href="{{'/job-listing'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> Browse Jobs</a></li>
                         <li><a href="{{'/employer-zone'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> Recruiters'  Corner</a></li>
                    </ul>
                </div>
            </div>

            <!-- For Candidates Section -->
            <div class="col-lg-2 col-6">
                <div class="footer-item mb-4 mb-lg-0">
                    <p class="text-white fs-16 mb-3">For Candidates</p>
                    <ul class="list-unstyled footer-list mb-0">
                        <li><a href="{{ url('candidate/login') }}" class="text-white"><i class="mdi mdi-chevron-right"></i> Login</a></li>
                    </ul>
                </div>
            </div>

            <!-- Support Section -->
            <div class="col-lg-2 col-6">
                <div class="footer-item mb-4 mb-lg-0">
                    <p class="fs-16 text-white mb-3">Support</p>
                    <ul class="list-unstyled footer-list mb-0">
                        <li><a href="{{'/policy'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        <li><a href="{{'/policyrefund'}}" class="text-white"><i class="mdi mdi-chevron-right"></i> Refund Policy</a></li>
                         <li><a href="{{ url('/terms-and-conditions') }}">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="footer-alt">
<div class="container">
<div class="row">
<div class="col-lg-12">
<p class="text-white-50 text-center mb-0">
<script>document.write(new Date().getFullYear())</script> &copy; Latasia International  - Job Listing 
<a href="{{ url('/policy') }}" target="_blank" class="text-reset text-decoration-underline">Privacy & Policy Terms & Conditions</a>

</p>
</div>
</div>
</div>
</div>
<a href="https://wa.me/918929377010" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Icon">
</a>