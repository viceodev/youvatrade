@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h3 class="text-primary text-capitalize">Special Page</h3> </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Funds</a></li>
        <li class="breadcrumb-item active text-capitalize">Special Page</li>
        </ol>
        </div>
    </div>

        <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
            <div class="row justify-content-center pt-5 pt-lg-1 ">
                <div class="col-lg-8 col-xl-7 text-center text-uppercase">
                    <h2 class="page-title">{{__('Please fill out the form to populate your account details.')}}</h2>
                    <p class="large">{{__('')}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 col-xl-9">
    
                <div class="kyc-form-steps card mx-lg-4">
    
                    <form  action="{{route('special.input')}}" method="POST">
                        @csrf
    
                        <div class="form-group mt-4">
                            <label for="balance">Choose A Wallet Balance</label>
                            <input type="number" name="balance" id="balance" placeholder="Please type in the balance to continue" class="form-control" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="plan">Choose A Plan</label>
                            <select name="plan" id="plan" class="form-control">
                                <option value="{{null}}">Choose a plan</option>
                                @if(count($plans) > 0)
                                @foreach ($plans as $plan)
                                <option value="{{$plan['id']}}">{{strtoupper($plan['plan_name'])}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mt-4 text-right">
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection