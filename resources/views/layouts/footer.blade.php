            <!-- Call To Action Section Starts -->
            <section class="call-action-all">
                <div class="call-action-all-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- Call To Action Text Starts -->
                                <div class="action-text">
                                    <h2>Get Started Today With Bitcoin</h2>
                                    <p class="lead">Open account for free and start trading Bitcoins!</p>
                                </div>
                                <!-- Call To Action Text Ends -->
                                <!-- Call To Action Button Starts -->
                                @if(auth()->check())
                                <p class="action-btn"><a class="btn btn-primary" href="{{route('user.dashboard')}}">Dashboard</a></p>
                                @else
                                <p class="action-btn"><a class="btn btn-primary" href="{{route('register')}}">Register Now</a></p>
                                @endif
                                <!-- Call To Action Button Ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Call To Action Section Ends -->
       
       
       <!-- Footer Starts -->
        <footer class="footer">
            <!-- Footer Top Area Starts -->
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Our Company</h4>
                            <div class="menu">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('services')}}">Services</a></li>
                                    <li><a href="{{route('pricing')}}">Pricing</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Help & Support</h4>
                            <div class="menu">
                                <ul>
                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                    <li><a href="{{route('terms')}}">Terms of Services</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-3">
                            <h4>Contact Us </h4>
                            <div class="contacts">
                                <div>
                                    <span>profviceo@gmail.com</span>
                                </div>
                                <div>
                                    <span>+234(0)-8142077283</span>
                                </div>
                                <div>
                                    <span>Jarin Lake, Carlifornia</span>
                                </div>
                            </div>
							<!-- Social Media Profiles Starts -->
                            <div class="social-footer">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
							<!-- Social Media Profiles Ends -->
                        </div>
                        <!-- Footer Widget Ends -->
						<!-- Footer Widget Starts -->
                        <div class="col-sm-12 col-md-5">
							<!-- Facts Starts -->
							<div class="facts-footer">
								<div>
									<h5>$198.76B</h5>
									<span>Market cap</span>
								</div>
								<div>
									<h5>243K</h5>
									<span>daily transactions</span>
								</div>
								<div>
									<h5>369K</h5>
									<span>active accounts</span>
								</div>
								<div>
									<h5>127</h5>
									<span>supported countries</span>
								</div>
							</div>
							<!-- Facts Ends -->
							<hr>
							<!-- Supported Payment Cards Logo Starts -->
							<div class="payment-logos">
								<h4 class="payment-title">supported payment methods</h4>
								<img src="{{asset('images/icons/payment/american-express.png')}}" alt="american-express">
								<img src="{{asset('images/icons/payment/mastercard.png')}}" alt="mastercard">
								<img src="{{asset('images/icons/payment/visa.png')}}" alt="visa">
								<img src="{{asset('images/icons/payment/paypal.png')}}" alt="paypal">
								<img class="last" src="{{asset('images/icons/payment/maestro.png')}}" alt="maestro">
							</div>
							<!-- Supported Payment Cards Logo Ends -->
                        </div>
                        <!-- Footer Widget Ends -->
                    </div>
                </div>
            </div>
            <!-- Footer Top Area Ends -->
            <!-- Footer Bottom Area Starts -->
            <div class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Copyright Text Starts -->
                            <p class="text-center"><a href="/" target="_blank">&copy; 2020 VictorTrade</a></p>
                            <!-- Copyright Text Ends -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom Area Ends -->
        </footer>
        <!-- Footer Ends -->
		<!-- Back To Top Starts  -->
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
		<!-- Back To Top Ends  -->
		
        <!-- Template JS Files -->
        <script src="{{asset('js/modernizr.js')}}"></script>
        <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
		
		<script src="{{asset('js/styleswitcher.js')}}"></script>

    </div>
    <!-- Wrapper Ends -->
</body>


</html>