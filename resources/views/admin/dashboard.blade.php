@extends('layouts.adminapp')


@section('content')

<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Dashboard</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </div>
    </div>
    
    
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-md-3">
    <div class="card bg-primary p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-money f-s-40"></i></span>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card bg-warning p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-pencil f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white text-capitalize">
        'ThiS'
    </h2>
    <p class="m-b-0 text-white">Current Plan</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card bg-success p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-vector f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white">
            'Referrals'
    </h2>
    <p class="m-b-0 text-white">Referrals</p>
    </div>
     </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card bg-danger p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-location-pin f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white">{{count($users)}}</h2>
    <p class="m-b-0 text-white">Total Visitor</p>
    </div>
    </div>
    </div>
    </div>
    </div>

</div>
@endsection