@extends('layouts.web')

@section('content')

		<!-- Banner Area Starts -->
		<section class="banner-area">
			<div class="banner-overlay">
				<div class="banner-text text-center">
					<div class="container">
						<!-- Section Title Starts -->
						<div class="row text-center">
							<div class="col-xs-12">
								<!-- Title Starts -->
								<h2 class="title-head">About <span>Us</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="/"> home</a></li>
									<li>About</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Starts -->
        <!-- About Section Starts -->
        <section class="about-page">
            <div class="container">
				<!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img id="about-us" class="img-responsive img-about-us" src="images/about-us.png" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
						<div class="feature-about">
							<h3 class="title-about">WE ARE VictorTrade</h3>
							<p>A place for everyone who wants to simply invest Cryptocurrency. Deposit funds using your Visa/MasterCard or Cryptocurrency. 
                                 Nothing extra. Join over 700,000 users from all over the world satisfied with our services.</p>
						</div>
						<div class="feature-about">
							<h3 class="title-about risk-title"><i class="fa fa-warning"></i> risk warning</h3>
							<p>Cryptocurrency is not legal tender and is not backed by any government. Accounts and value balances are not subject to any government backed deposit insurance or any other government protections.</p>
						</div>
						<a class="btn btn-primary btn-services" href="{{route('services')}}">Our services</a>
                    </div>
                    <!-- Content Ends -->
					
                </div>
                <!-- Section Content Ends -->
			</div><!--/ Content row end -->
        </section>
        <!-- About Section Ends -->
		<!-- Facts Section Starts -->
        <section class="facts">
			<!-- Container Starts -->
			<div class="container">
				<!-- Fact Badges Starts -->
				<div class="row text-center facts-content">
					<div class="text-center heading-facts">
						<h2>VictorTrade<span> numbers</span></h2>
						<p>leading cryptocurrency exchange since day one of Bitcoin distribution</p>
					</div>
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact">
						<h3>$77.45B</h3>
						<h4>market cap</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact fact-clear">
						<h3>165k</h3>
						<h4>daily transactions</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact">
						<h3>1726</h3>
						<h4>active accounts</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6">
						<h3>17</h3>
						<h4>years on the market</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<div class="col-xs-12 buttons">
						<a class="btn btn-primary btn-pricing" href="{{route('pricing')}}">See pricing</a>
						<span class="or"> or </span>
						@if(Auth::check())
							<a class="btn btn-primary btn-register" href="{{route(auth()->user()->role.".dashboard")}}">Dashboard</a>
						@else
							<a class="btn btn-primary btn-register" href="{{route('register')}}">Register Now</a>
						@endif
							
					</div>
				</div>
				<!-- Fact Badges Ends -->
			</div>
			<!-- Container Ends -->
        </section>
        <!-- facts Section Ends -->
        <!-- Team Section Starts -->
       
        <!-- Team Section Ends -->


@endsection