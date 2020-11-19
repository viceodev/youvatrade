@extends('layouts.app')

@section('content')

<div class="page-wrapper p-1">
    <div class="row mt-5 mt-lg-0">
        <section class="col-lg-2"></section>

        <section class="col-lg">
            <section class="text-center mt-5 mt-lg-5">
                <p class="display-6 text-dark">Welcome {{auth()->user()->name}}</p>
                <p class="lead">welcome to Youvatrade Investments where you get the best plans on investment that anywhere else.</p>            
            </section>


            @if(auth()->user()->email_verified_at != null)
                <section class="card my-5 text-success">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="ti ti-email" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Verify Your email through the link sent to your email at the time of your registration.</p>
                    <span class="badge badge-success">Verified</span>
                    </a>
                </section>
            @else
                <section class="card my-5 text-danger">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="ti ti-email" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Verify Your email through the link sent to your email at the time of your registration.</p>
                    <span class="badge badge-danger">not-verified</span>
                    </a>
                </section>
            @endif


            @if(auth()->user()->status != 'active')
                <section class="card my-5 text-success">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="ti ti-files" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Complete your Know Your Customer Form (K.Y.C) for quick verification.</p>
                    <span class="badge badge-success mx-auto">Completed</span>
                    </a>
                </section>
            @else
                <section class="card my-5 text-danger">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="ti ti-files" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Complete your Know Your Customer Form (K.Y.C) for quick verification.</p>
                    <span class="badge badge-danger">Uncompleted</span>
                    </a>
                </section>
            @endif


            @if(auth()->user()->plan != null)
                <section class="card my-5 text-success">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="fa fa-pie-chart" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Choose a plan to invest in to start getting return.</p>
                    <span class="badge badge-success">Done</span>
                    </a>
                </section>
            @else
                <section class="card my-5 text-danger">
                    <a class="d-flex align-items-center justify-content-between has-arrow"><i class="fa fa-pie-chart" style="font-size: 70px;"></i>
                    <p class="lead mb-0 ml-3">Choose a plan to invest in to start getting return.</p>
                    <span class="badge badge-danger">Not Done</span>
                    </a>
                </section>
            @endif

            <section class="card my-5 text-success">
                <a class="d-flex align-items-center justify-content-between has-arrow"><i class="ti ti-user" style="font-size: 70px;"></i>
                <p class="lead mb-0 ml-3">You are good to go</p>
                <span class="badge badge-success">></span>
                </a>
            </section>

        </section>

        <section class="col-lg-2"></section>
    </div>
</div>

@endsection