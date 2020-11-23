@extends('layouts.app')


@section('content')
    <section class="page-wrapper">
        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Checkout</h3> </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Payments</a></li>
        <li class="breadcrumb-item active">Checkout</li>
        </ol>
        </div>
        </div>

        <div class="container-fluid">
            <div class="row p-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">

                                <div class="row">
                                    <div class="col-lg-9 card">
                                        <h3 class="text-primary">Checkout Page</h3>
                                        <div class="table-responsive m-t-40">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Item Ref</th>
                                                    <th>Item Name</th>
                                                    <th>Item Description</th>
                                                    <th>Item Amount</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                    @if($cart)
                                                        <tr>
                                                            <td>{{$cart['ref']}}</td>
                                                            <td class="text-uppercase">{{$cart['plan_name']}}</td>
                                                            <td>
                                                                ROI: {{$cart['ROI']}}% <br>
                                                                PAYMENT RATE: {{($cart['time_rate']) / 3600}}HOURS <br>
                                                            </td>
                                                            <td>$ {{$cart['amount']}}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 card">
                                        <a class="btn btn-primary btn-flat btn-addon btn-lg btn-block" href="#">Pay With</a>

                    <form method="post" action="{{route('user.checkout.wallet')}}" class="form-group">
                        @csrf
                        <input type="hidden" name="ref" value="{{$cart['ref']}}">
                        <input type="hidden" name="amount" value="{{$cart['amount']}}">
                        <button type="submit" class="btn btn-secondary border my-1 container-fluid">
                                    WALLET BALANCE
                        </button>
                    </form>

                    @if(count($wallets) > 0)
                    @foreach($wallets as $wallet)
                    <form method="post" action="{{route('user.checkout.crypto')}}" class="form-group">
                        @csrf
                        <input type="hidden" name="ref" value="{{$cart['ref']}}">
                        <input type="hidden" name="amount" value="{{$cart['amount']}}">
                        <input type="hidden" name="method" value="{{$wallet['wallet_type']}}">
                        <button type="submit" class="btn btn-secondary border mb-1 container-fluid">
                                    {{strtoupper($wallet['wallet_type'])}} WALLET
                        </button>
                    </form>
                    @endforeach
                    @endif
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