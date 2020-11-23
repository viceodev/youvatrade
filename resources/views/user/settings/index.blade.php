@extends('layouts.app')


@section('content')
    <div class="page-wrapper p-1">
        <section class="col-lg-2"></section>
        <style>
            @media screen and (max-width: 600px){
                .settings-container{
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }                
            }

        </style>

        <section class="col-lg-12 container-fluid p-md-0 p-lg-5 settings-container">
            <div class="container-fluid settings-container">

                <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                <h4 class="card-title">Profile Details</h4>
                <ul class="nav nav-tabs" role="tablist"> 
                    <li class="nav-item"> <a class="nav-link  active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">PERSONAL DATA</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-lock"></i></span> <span class="hidden-xs-down">Password</span></a> </li>
                </ul>

                <div class="tab-content tabcontent-border">
                    @include('user.settings.personal')
                    @include('user.settings.password')
                </div>

                </div>
                </div>
                </div>
                </div>
            </div>
        </section>


        <section class="col-lg-2"></section>
    </div>
@endsection