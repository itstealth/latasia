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
    .footer-links a {
    color: #d1d1d1;
    display: block;
    margin-bottom: 10px;
    transition: all 0.3s ease;
    font-size: 15px;
}

.footer-links a:hover {
    color: #ffc107; /* Gold Highlight on Hover */
    padding-left: 5px;
    text-decoration: none;
}

.widget h5 {
    font-size: 17px;
    letter-spacing: 0.5px;
}


        </style>
<footer class="footer-dark" style="background-image: url(images/f-bg.jpg);">
            <div class="container">


                <!-- FOOTER BLOCKES START -->
                <div class="footer-top">
                    <div class="row">

                        <div class="col-lg-3 col-md-12">
                            <div class="widget widget_about">
                                <!-- Logo -->
                                <div class="logo-footer mb-3">
                                    <a href="{{'/'}}">
                                        <img src="{{ asset('home/assets/images/website.jpg') }}" alt="Vasper Global Logo" class="img-fluid" style="max-height: 50px;">
                                    </a>
                                </div>
                        
                                <!-- About Text -->
                                <p class="text-muted mb-4" style="font-size: 0.95rem;">
                                    At Latasia International, test every candidate we support, and every employer we serve, is a partnership in success.
                                </p>
                        
                                <!-- Contact Info -->
                                <ul class="list-unstyled ftr-list">
                                    <li class="mb-3 d-flex">
                                        <i class="fas fa-map-marker-alt text-primary me-2 mt-1"></i>
                                        <p class="mb-0" style="font-size: 0.9rem;">
                                            <strong>Address:</strong><br>
                                            Latasia International 
                                            Address: 38, Grzybowska 2, 00-131 Warsaw, Poland
                                            NIP:5253073931</br>
                                            KRS:0001215381

                                        </p>
                                    </li>
                        
                                    <li class="mb-3 d-flex">
                                        <i class="fas fa-envelope text-primary me-2 mt-1"></i>
                                        <p class="mb-0" style="font-size: 0.9rem;">
                                            <strong>Email:</strong><br>
                                            <a href="mailto:info@vasperstaffing.com" class="text-muted">info@latasia.eu</a>
                                        </p>
                                    </li>
                        
                                    <li class="d-flex">
                                        <i class="fas fa-phone-alt text-primary me-2 mt-1"></i>
                                        <p class="mb-0" style="font-size: 0.9rem;">
                                            <strong>Call:</strong><br>
                                           +48 731 552 047
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        

                        <div class="col-lg-9 col-md-12">
                            <div class="row gy-4">
                        
                                <!-- Company -->
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget">
                                        <h5 class="text-white fw-semibold mb-4">Company</h5>
                                        <ul class="list-unstyled footer-links">
                                            <li><a href="{{ '/about' }}">About Us</a></li>
                                            <!--<li><a href="{{ url('/team') }}">Team</a></li>-->
                                            
                                            <li><a href="{{ '/contact' }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                                <!-- For Jobs -->
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget">
                                        <h5 class="text-white fw-semibold mb-4">For Jobs</h5>
                                        <ul class="list-unstyled footer-links">
                                            <li><a href="{{ '/job-listing' }}">Browse Jobs</a></li>
                                            <li><a href="{{ '/employer-zone' }}">Recruiters' Corner</a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                                <!-- For Candidates -->
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget">
                                        <h5 class="text-white fw-semibold mb-4">For Candidates</h5>
                                        <ul class="list-unstyled footer-links">
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                                <!-- Support -->
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget">
                                        <h5 class="text-white fw-semibold mb-4">Support</h5>
                                        <ul class="list-unstyled footer-links">
                                            <li><a href="{{ '/policy' }}">Privacy Policy</a></li>
                                            <li><a href="{{ '/policyrefund' }}">Refund policy</a></li>
                                           <li><a href="{{ url('/terms-and-conditions') }}">Terms and Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                        
                        

                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="footer-bottom">

                    <div class="footer-bottom-info">

                        <div class="footer-copy-right">
                            <span class="copyrights-text">Copyright © 2025 by latasia.eu All Rights Reserved.</span>
                        </div>
                        <ul class="social-icons">
                            <li><a href="#" target="_blank" class="fab fa-facebook-f"></a></li>
                            <li><a href="#" target="_blank" class="fab fa-linkedin-in" style="color: #0077B5;"></a></li>
                            <li><a href="#" target="_blank" class="fab fa-instagram"></a></li>
                            <!--<li><a href="#" target="_blank" class="fab fa-twitter"></a></li>-->
                           
                          
                        </ul> 

                    </div>

                </div>

            </div>
           <a href="https://wa.me/918929377010" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Icon">
</a>
        </footer>