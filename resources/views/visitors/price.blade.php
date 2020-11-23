                        
                        <div class="card slide-title">
                            
                        </div>

                        <div class="title-head-subtitle text-center">
                            <p class="lead">Instant Profits Withdrawal</p><br>
                            <p class="lead">5% Active Referral Profits On All Plans</p>
                        </div>
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #1 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>{{$plans[0]['plan_name']}}</h2>
                                            <h2>GET {{$plans[0]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[0]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[0]['initial_minimum_fee']}} - ${{$plans[0]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[0]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #1 Ends -->
                                    <!-- Sell Pricing Table #1 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>{{$plans[4]['plan_name']}}</h2>
                                            <h2>GET {{$plans[4]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[4]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[4]['initial_minimum_fee']}} - ${{$plans[4]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[4]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #2 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>{{$plans[1]['plan_name']}}</h2>
                                            <h2>GET {{$plans[1]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[1]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[1]['initial_minimum_fee']}} - ${{$plans[1]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[1]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #2 Ends -->
                                    <!-- Sell Pricing Table #2 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>{{$plans[5]['plan_name']}}</h2>
                                            <h2>GET {{$plans[5]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[5]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[5]['initial_minimum_fee']}} - ${{$plans[5]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[5]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #2 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #3 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>{{$plans[2]['plan_name']}}</h2>
                                            <h2>GET {{$plans[2]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[2]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[2]['initial_minimum_fee']}} - ${{$plans[2]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[2]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #3 Ends -->
                                    <!-- Yearlt Pricing Table #3 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>{{$plans[6]['plan_name']}}</h2>
                                            <h2>GET {{$plans[6]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[6]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[6]['initial_minimum_fee']}} - ${{$plans[6]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[6]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #3 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #4 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>{{$plans[3]['plan_name']}}</h2>
                                            <h2>GET {{$plans[3]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[3]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[3]['initial_minimum_fee']}} - ${{$plans[3]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[3]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #4 Ends -->
                                    <!-- Sell Pricing Table #4 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>{{$plans[7]['plan_name']}}</h2>
                                            <h2>GET {{$plans[7]['ROI']}}% USD <span>After </span>
                                                <span>{{($plans[7]['time_rate']/ 3600)}} HOURS</span>
                                            </h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">{{$plans[7]['initial_minimum_fee']}} - ${{$plans[7]['initial_maximum_fee']}}</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{route('user.plan', $plans[7]['id'])}}" class="btn btn-primary">INVEST NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #4 Ends -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->