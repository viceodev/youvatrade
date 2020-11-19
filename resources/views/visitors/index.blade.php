@extends('layouts.web')


@section('content')

        <!-- Slider Starts -->
        <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators visible-lg visible-md">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Carousel Inner Starts -->
            <div class="carousel-inner">
                <!-- Carousel Item Starts -->
                <div class="item active bg-parallax item-1">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br/> To Gain</h3>
                                <p>
                                    <a href="{{route('register')}}" class="slider btn btn-primary">Learn more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
                <!-- Carousel Item Starts -->
                <div class="item bg-parallax item-2">
                    <div class="slider-content">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="slider-text text-center">
                                    <h3 class="slide-title"><span>Crypto</span> Investement <br/>You can <span>Trust </span> </h3>
                                    <p>
                                    <a href="{{route('pricing')}}" class="slider btn btn-primary">our prices</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
            </div>
            <!-- Carousel Inner Ends -->
            <!-- Carousel Controlers Starts -->
            <a class="left carousel-control" href="/#main-slide" data-slide="prev">
				<span><i class="fa fa-angle-left"></i></span>
			</a>
            <a class="right carousel-control" href="/#main-slide" data-slide="next">
				<span><i class="fa fa-angle-right"></i></span>
			</a>
            <!-- Carousel Controlers Ends -->
        </div>

        <!-- Slider Ends -->
        <div class="currency-chart">
            <div class="container-fluid">
              <div class="row">
        
        
        
                <script>
                  baseUrl = "https://widgets.cryptocompare.com/";
                  var scripts = document.getElementsByTagName("script");
                  var embedder = scripts[scripts.length - 1];
                  var cccTheme = { "General": { "enableMarquee": true } };
                  (function() {
                      var appName = encodeURIComponent(window.location.hostname);
                      if (appName == "") { appName = "local"; }
                      var s = document.createElement("script");
                      s.type = "text/javascript";
                      s.async = true;
                      var theUrl = baseUrl + 'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC,DASH&tsyms=BTC,USD,CNY,EUR';
                      s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                      embedder.parentNode.appendChild(s);
                  })();
                </script>
              </div>
            </div>
          </div>
        <!-- Features Section Starts -->
        <section class="features">
            <div class="container">
                <div class="row features-row">
                    <!-- Feature Box Starts -->
                    <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="download-bitcoin" src="images/icons/orange/download-bitcoin.png" alt="download bitcoin">
						</span>
                        <div class="feature-box-content">
                            <h3>Be Safe and Secure</h3>
                            <p>our assets are secured with a multi-tier & multi-cluster system architecture. And with our ‘Secure Assets Fund for Users’ guarantee, you can rest assured that your funds are secure with Youva Trade.</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="add-bitcoins" src="images/icons/orange/add-bitcoins.png" alt="add bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Add coins to your Wallet</h3>
                            <p>Youva Trade is designed to offer investors a simple way to access the crypto investment market, with our unrivalled experience in the sector of finance and investment.</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="buy-sell-bitcoins" src="images/icons/orange/buy-sell-bitcoins.png" alt="buy and sell bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Experiened Team</h3>
                            <p>Our team members are very experienced in traditional investment and cryptofinance. Unrivalled analytic and research crypto capabilities. Also, 24/7 Support team always online!</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                </div>
            </div>
        </section>
        <!-- Features Section Ends -->
        <!--  chart -->
 
<!-- end chart -->
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>a commercial website that lists plans, investments and other crypto related info</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img id="about-us" class="img-responsive img-about-us" src="images/about-us.png" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE Youva Trade</h3>
                        <p class="about-text">Youva Trade is a renowned international investment company which was incorporated on the 22 of July 2010, located at 150 Minories, Tower, London EC3N 1LS, United Kingdom, United Kingdom with Company Number: 17833900

                            With our digital investment platform, you invest and enjoy a very flexible ROI never offered elsewhere. We have differentiated strategy to create sustainable value for stakeholders. We actively trade and manage your investment with the aim to generate better-than-market returns.
                            
                            Our group is active in both providing flexible financing to other investors as well as acquiring mid-size private companies.</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>Creating an ultra moderm wealth, through crypto investment.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>Our mission as an official partner of Cryptocurrency Foundation is to help you enter and better understand the world of #1 cryptocurrency and avoid any issues you may encounter.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are the first and the best in cryptocurrency. </p>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{route('about')}}">Read More</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="strong-security" src="images/icons/orange/strong-security.png" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Protection against DDoS attacks, <br>full data encryption</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="world-coverage" src="images/icons/orange/world-coverage.png" alt="world coverage"/>
									</span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="payment-options" src="images/icons/orange/payment-options.png" alt="payment options"/>
									</span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: paypal, Payeer, <br>cryptocurrency</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="mobile-app" src="images/icons/orange/mobile-app.png" alt="mobile app"/>
									</span>
                                    <h3 class="feature-title">Mobile App</h3>
                                    <p>Trading via our Mobile App, Available<br> in for you! coming soon...</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="cost-efficiency" src="images/icons/orange/cost-efficiency.png" alt="cost efficiency"/>
									</span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Reasonable investment plans for takers<br> and all market makers</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="high-liquidity" src="images/icons/orange/high-liquidity.png" alt="high liquidity"/>
									</span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=zSzOFG356c0"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        <section class="pricing">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">affordable <span>packages</span></h2>
                    <div class="title-head-subtitle">
                        <p>Embark on the billionaires journey, creating an ultra-moderm wealth</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <!-- Pricing Switcher Starts -->
                        <div class="pricing-switcher">
                            <p>
                                <input type="radio" name="switch" value="buy" id="buy-1" checked>
                                <label for="buy-1">REGULAR</label>
                                <input type="radio" name="switch" value="sell" id="sell-1">
                                <label for="sell-1">VIP</label>
                                <span class="switch"></span>
                            </p>
                        </div>
                        <!-- Pricing Switcher Ends -->
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert"> 
                            @include('visitors.price')
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- Bitcoin Calculator Section Starts -->
        <section class="bitcoin-calculator-section">
            <div class="container">
                <div class="row">
                    <!-- Section Heading Starts -->
                    <div class="col-md-12">
                        <h2 class="title-head text-center"><span>Bitcoin</span> Calculator</h2>
                        <p class="message text-center">Find out the current Bitcoin value with our easy-to-use converter</p>
                    </div>
                    <!-- Section Heading Ends -->
                    <!-- Bitcoin Calculator Form Starts -->
                    <div class="col-md-12 text-center">
                        <form class="bitcoin-calculator" id="bitcoin-calculator">
                            <!-- Input #1 Starts -->
                            <input class="form-input" name="btc-calculator-value" value="1">
                            <!-- Input #1 Ends -->
                            <div class="form-info"><i class="fa fa-bitcoin"></i></div>
                            <div class="form-equal">=</div>
                            <!-- Input/Result Starts -->
                            <input class="form-input form-input-result" name="btc-calculator-result">
                            <!-- Input/Result Ends -->
                            <!-- Select Currency Starts -->
                            <div class="form-wrap">
                                <select id="currency-select" class="form-input select-currency select-primary" name="btc-calculator-currency" data-dropdown-class="select-primary-dropdown"></select>
                            </div>
                            <!-- Select Currency Ends -->
                        </form>
                        <p class="info"><i>* Data updated every 15 minutes</i></p>
                    </div>
                    <!-- Bitcoin Calculator Form Ends -->
                </div>
            </div>
        </section>
        <!-- Bitcoin Calculator Section Ends -->
        <!-- Team Section Starts -->
        <section class="team">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">Latest <span> Transaction</span></h2>
                    <div class="title-head-subtitle">
                        <p>  Our goal is to simplify investing so that anyone can be an investor.Withthis in mind, we hand-pick the investments we offer on our platform.</p>
                    </div>
                </div>
            </div>
            <!-- transaction section begin -->
            <section class="transaction-section">
                <div class="container">
                    
                    <div class="row d-flex ">
                        <div class="col-lg-7 col-md-11 justify-content-center">
            
                            <ul class="nav nav-pills mb-3 transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                                <li class="nav-item transaction-nav-item ">
                                    <a class="nav-link transaction-nav-link active" id="transaction-pills-deposits-tab" data-toggle="pill" href="#pills-deposits" role="tab" aria-controls="pills-deposits" aria-selected="true">
                                        <span class="d-flex align-items-center"><i class="ren-deposits d-flex align-items-center"></i>LAST<br>DEPOSITS</span>
                                    </a>
                                </li>
                                <li class="nav-item transaction-nav-item justify-content-center">
                                    <a class="nav-link transaction-nav-link-responsive-lg" id="transaction-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawal" aria-selected="false">
                                        <span class="d-flex align-items-center"><i class="ren-investo d-flex align-items-center"></i>TOP<br>WITHDRAWALS</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
            
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="tab-content transaction-tab-content " id="transaction-pills-tabContent ">
                                <div class="tab-pane fade show active transaction-tab-pane" id="pills-deposits" role="tabpanel" aria-labelledby="transaction-pills-deposits-tab">
                                    <table class="table table-responsive-lg transaction-table table-striped  ">
                                        <thead class="">
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col">Name</th>
                                           
                                            <th scope="col">Amounts</th>
                                            
                                            <th scope="col">Method</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row" class="d-flex">
                                                
                                                <h5>1.</h5>
                                            </th> 
                                            <th scope="row" class="d-flex">
                                                
                                                <h4>Jim Adams</h4>
                                            </th>
                                            
                                            
                                            <td>$12000</td>
                                            
                                            <td><i class="ren-bitcoins">
                                                <img src="image/paypal.png">
                                            </i></td>
                                        </tr>
                                       
                                        <tr class="bg-info">
                                            <th scope="row" class="d-flex ">
                                                
                                                <h5>2.</h5>
                                            </th> 
                                            <th scope="row" class="d-flex">
                                                
                                                <h4>Edward Eneh</h4>
                                            </th>
                                            
                                            
                                            <td>$400</td>
                                            
                                            <td><i class="ren-bitcoins">
                                                <img src="image/litecoin.png">
                                            </i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="d-flex">
                                                
                                                <h5>3.</h5>
                                            </th> 
                                            <th scope="row" class="d-flex">
                                                
                                                <h4>Amaka Ozoh</h4>
                                            </th>
                                            
                                            
                                            <td>$50</td>
                                            
                                            <td><i class="ren-bitcoins">
                                                <img src="image/paypal.png">
                                            </i></td>
                                        </tr>
                                        <tr class="bg-info">
                                            <th scope="row" class="d-flex">
                                                
                                                <h5>4.</h5>
                                            </th> 
                                            <th scope="row" class="d-flex">
                                                
                                                <h4>Favour Ola</h4>
                                            </th>
                                            
                                            
                                            <td>$200</td>
                                            
                                            <td><i class="ren-bitcoins">
                                                <img src="image/ethereum.png">
                                            </i></td>
                                        </tr>
                                        <tr >
                                            <th scope="row" class="d-flex">
                                                
                                                <h5>5.</h5>
                                            </th> 
                                            <th scope="row" class="d-flex">
                                                
                                                <h4>Musa Anard</h4>
                                            </th>
                                            
                                            
                                            <td>$600</td>
                                            
                                            <td><i class="ren-bitcoins">
                                                <img src="image/bitcoin.png">
                                            </i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
            
                                <div class="tab-pane fade transaction-tab-pane" id="pills-withdrawals" role="tabpanel" aria-labelledby="transaction-pills-withdrawal-tab">
                                    <table class="table table-responsive-lg  transaction-table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Name</th>
                                               
                                                <th scope="col">Amounts</th>
                                                
                                                <th scope="col">Method</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h5>1.</h5>
                                                </th> 
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h4>Luke Shivam</h4>
                                                </th>
                                                
                                                
                                                <td>$84</td>
                                                
                                                <td><i class="ren-bitcoins">
                                                    <img src="image/paypal.png">
                                                </i></td>
                                            </tr>
                                           
                                            <tr class="bg-info">
                                                <th scope="row" class="d-flex ">
                                                    
                                                    <h5>2.</h5>
                                                </th> 
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h4>Elijah Uche</h4>
                                                </th>
                                                
                                                
                                                <td>$800</td>
                                                
                                                <td><i class="ren-bitcoins">
                                                    <img src="image/ethereum.png">
                                                </i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h5>3.</h5>
                                                </th> 
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h4>Loveth Ogunobi</h4>
                                                </th>
                                                
                                                
                                                <td>$1000</td>
                                                
                                                <td><i class="ren-bitcoins">
                                                    <img src="image/paypal.png">
                                                </i></td>
                                            </tr>
                                            <tr class="bg-info">
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h5>4.</h5>
                                                </th> 
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h4>Joshua Sunday</h4>
                                                </th>
                                                
                                                
                                                <td>$300</td>
                                                
                                                <td><i class="ren-bitcoins">
                                                    <img src="image/bitcoin.png">
                                                </i></td>
                                            </tr>
                                            <tr >
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h5>5.</h5>
                                                </th> 
                                                <th scope="row" class="d-flex">
                                                    
                                                    <h4>Soft  Lizy</h4>
                                                </th>
                                                
                                                
                                                <td>$200</td>
                                                
                                                <td><i class="ren-bitcoins">
                                                    <img src="{{asset('image/paypal.png')}}">
                                                </i></td>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
            
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-12 text-center">
            
                            <div class="btn-area">
                                <a class="start-now-btn global-btn" href="{{route('register')}}">Browse More</a>
                            </div>
            
                        </div>
                    </div>
                </div>
            </section>
            <!-- transaction section end -->
        </section>

                <!-- Section Title Ends -->
                


              
        <!-- Quote and Chart Section Starts -->
        <section class="image-block2">
            <div class="container-fluid">
                <div class="row">
                    <!-- Quote Starts -->
                    <div class="col-md-4 img-block-quote bg-image-2">
                        <blockquote>
                            <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                            <footer><img src="images/ceo.jpg" alt="ceo" /> <span>Marc Smith</span> - CEO</footer>
                        </blockquote>
                    </div>
                    <!-- Quote Ends -->
                    <!-- Chart Starts -->
                    <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            </div>
                        </div>
						<div class="chart-widget light-chart chart-2">
                            <div>
                                <div class="btcwdgt-chart" bw-theme="light"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Ends -->
                </div>
            </div>
        </section>
        <!-- Quote and Chart Section Ends -->
        <!-- Blog Section Starts -->
        <section class="blog">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">Bitcoin <span>News</span></h2>
                    <div class="title-head-subtitle">
                        <p>Discover latest news about Bitcoin on our blog</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row latest-posts-content">
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="images/blog/blog-post-small-1.jpg" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">How Cryptocurrency Begun and Its Impact To Financial Transactions</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>01</span>
                                <span>JAN</span>
                            </div>
							<a href="blog-post.html" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="images/blog/blog-post-small-2.jpg" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">Cryptocurrency - Who Are Involved With It? Words about members</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>17</span>
                                <span>MAR</span>
                            </div>
							<a href="blog-post.html" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Start -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="images/blog/blog-post-small-3.jpg" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">Risks & Rewards Of Investing In Bitcoin. Pros and Cons</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>25</span>
                                <span>FEB</span>
                            </div>
							<a href="blog-post.html" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                </div>
				<!-- Section Content Ends -->
            </div>
        </section>
        <!-- Blog Section Ends -->

@endsection