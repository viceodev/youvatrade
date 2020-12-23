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


    <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title text-uppercase">{{__('Fund Your Trading  account')}}</h2>
                <p class="card lead text-info">{{__('After successful deposit, send us notification to deposits@victortrade.com with your deposit details and amount. ')}}</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9">

            <div class="kyc-form-steps card mx-lg-4">

                <form  action="{{route('user.deposit')}}" method="POST">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="method">PAYMENT METHOD</label>
                        <select name="method" id="method" class="form-control" style="text-transform: uppercase;" required>
                            <option value="{{null}}">CHOOSE PAYMENT METHOD</option>
                            @foreach($infos as $info)
                                <option value="{{$info['wallet_type']}}">{{strtoupper($info['wallet_type'])}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="500"  required>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">PROCEED</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection