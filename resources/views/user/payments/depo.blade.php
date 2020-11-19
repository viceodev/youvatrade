@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h3 class="text-primary text-capitalize">DEPOSIT</h3> </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Funds</a></li>
        <li class="breadcrumb-item active text-capitalize">DEPOSIT</li>
        </ol>
        </div>
    </div>

@if(isset($wallet))
    <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title text-uppercase">{{strtoupper($wallet['wallet_type'])}} DEPOSIT</h2>
                <p class="lead">Payment Reference: {{$ref}}</p>
                <p class="lead">Send Exact Payment To This Address: </p><br>
                <p class="lead">{{$wallet['wallet_address']}}</p>
                <img src="{{asset($wallet['qr_code'])}}" alt="{{$wallet['wallet_address']}}" style="width: 50%;">
                <p class="card lead text-info">{{__('After successful deposit, send us notification to deposits@youvatrade.com with your deposit details, payment reference  and amount. ')}}</p>
            </div>
        </div>
    </div>

</div>
@endif

@endsection