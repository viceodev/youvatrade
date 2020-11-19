@extends('layouts.app')


@section('content')

    <section class="page-wrapper">
        <section class="container p-lg-3">
            <section class="card">
                <h1 class="text-uppercase text-center display-6 p-lg-3">affordable packages</h1>
                <p class="lead text-uppercase text-center">Embark on the billionaires journey, creating an ultra-moderm wealth</p>


                <div class="row">
                    @foreach($plans as $plan)
                    <div class="col-md-4 text-uppercase">
                    <div class="card text-center bg-dark">
                    <div class="m-t-10">
                    <p class="color-white">{{$plan['plan_name']}}</p>
                    <h2 class="color-white text-white">${{$plan['initial_minimum_fee']}} - ${{$plan['initial_maximum_fee']}}</h2>
                    </div>
                    <ul class="widget-line-list m-b-15">
                    <li class="border-right">{{$plan['ROI']}}% <br><span class="color-white"><i class="ti-hand-point-up m-r-5"></i> ROI</span></li>
                    <li>{{($plan['time_rate'] / 3600)}}HOURS <br><span class="color-white f-s-14"><i class="ti-hand-point-down m-r-5"></i>PAYMENT TIME</span></li>
                    </ul>
                    <a href="{{route('user.plan', $plan['id'])}}" class="btn btn-secondary">use this plan</a>
                    </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </section>
    </section>
    
@endsection