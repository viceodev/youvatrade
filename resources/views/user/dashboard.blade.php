@extends('layouts.app')


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
    <div class="media-body media-text-right">
    <h2 class="color-white text-white">$
        @if(auth()->user()->balance > 0)
            {{auth()->user()->balance}}
        @else
            0
        @endif
    </h2>
    <p class="m-b-0 text-white">Balance</p>
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
        @if($info['plan'])
            {{$info['plan']['plan_name']}}
        @else
            ----
        @endif
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
            {{count($info['referrals'])}}
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
    <h2 class="color-white text-white">278</h2>
    <p class="m-b-0 text-white">Total Visitor</p>
    </div>
    </div>
    </div>
    </div>
    </div>


    {{-- payments --}}
    <div class="row">
    <div class="col-lg-6">
        <div class="card">
        <div class="card-title">
        <h4>Your Recent Referrals</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
        <th>#</th>
        <th>Bonus</th>
        <th>Date</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @if(count($info['referrals']) > 0)
                @foreach($info['referrals'] as $referral)
                    <tr>
                        <td></td>
                        <td>{{$referral['bonus']}}</td>
                        <td><span>
                            {{$referral['created_at']}}
                        </span></td>
                        @if($referral['bonus'] > 0)
                            <td><span class="badge badge-success">Done</span></td>
                        @else
                            <td><span class="badge badge-danger">Unverified</span></td>
                        @endif
                    </tr>
                @endforeach

                
            @else
                <div class="card lead text-center text-danger">
                    <span><i class="fa fa-info-circle mx-1"></i>Opps,Nothing to show!</span>
                </div>
            @endif
        </tbody>
        </table>
        @if(count($info['referrals']) > 0)
        <div class="text-center">
           <a href="{{route('user.referrals')}}" class="btn btn-primary my-3">See All</a> 
        </div>
        @endif
        
        </div>
        </div>
        </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
            <div class="card-title">
            <h4>Your Recent Transactions</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th>Ref</th>
            <th>Item</th>
            <th>Date</th>
            <th>Status</th>
            </tr>
            </thead>
            <tbody>
            {{--     @if(count($info['payments']) > 0)
                    @foreach($info['payments'] as $payment)
                        <tr>
                            <td>{{$payment['ref']}}</td>
                            <td class="text-capitalize">{{$payment['purpose']}}</td>
                            <td>{{$payment['created_at']}}</td>
                            @if($payment['status'] == 0)
                                <td><span class="badge badge-danger">FAILED</span></td>
                            @else
                                <td><span class="badge badge-success">SUCCESSFUL</span></td>
                            @endif
                        </tr>
                    @endforeach
    
                    
                @else
                    <div class="card lead text-center text-danger">
                        <span><i class="fa fa-info-circle mx-1"></i>Opps,Nothing to show!</span>
                    </div>
                @endif--}}
            </tbody>
            </table>
            @if(count($info['referrals']) > 0)
            <div class="text-center">
               <a href="{{route('user.payments')}}" class="btn btn-primary my-3">See All</a> 
            </div>
            @endif
            
            </div>
            </div>
            </div>
            </div>
    </div>

    
@endsection

