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
								<h2 class="title-head">Our <span>Prices</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="/"> home</a></li>
									<li>pricing</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Ends -->
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
                        @include('visitors.price')


@endsection