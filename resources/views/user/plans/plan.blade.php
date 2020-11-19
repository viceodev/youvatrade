@extends('layouts.app')


@section('content')
    <section class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            <h3 class="text-primary text-capitalize">{{$product['plan_name']}}</h3> </div>
            <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Plans</a></li>
            <li class="breadcrumb-item active text-capitalize">{{$product['plan_name']}}</li>
            </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row p-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row p-lg-1 p-0">
                                    <div class="col-12 my-2">
                                        <h2 class="text-center">Plans Details</h2>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="bg-dark rounded shadow p-2">
                                            <p class="lead text-capitalize">Plan Name: {{$product['plan_name']}}</p>

                                            <p class="lead">Return On Investment (R.O.I): {{$product['ROI']}}%</p>  

                                            <p class="lead">Payment Fee: ${{$product['initial_minimum_fee']}} - ${{$product['initial_maximum_fee']}}</p>  

                                            <div class="alert alert-info">
                                                Please make sure your investment amount is within the range of the payment fee.
                                            </div>

                                            <p class="lead">Payment Rate: {{($product['time_rate']/ 3600)}}HOURS</p>
                                        </div>        
                                    </div>

                                    <div class="col-lg-3 shadow-lg">
                                       <form action="{{route('user.plan.post')}}" method="POST">
                                            @csrf 

                                          

                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                                    <input type="text" class="form-control form-type" id="amount" name="amount" placeholder="{{$product['initial_maximum_fee']}}">

                                                    <input type="hidden" name="product" value="{{$product['id']}}">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-dark">Proceed To Checkout</button>
                                        </form> 
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection