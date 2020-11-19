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

                                        <a href="" class="btn btn-outline border my-1">
                                            <span><i class="ti-wallet mb-1 mr-1"></i>
                                                <h5 style="display: inline;">Saved  Credentials</h5>
                                            </span>
                                        </a>

                    <form method="post" action="https://payeer.com/merchant/">
                        <input type="hidden" name="m_shop" value="{{$secret['m_shop']}}">
                        <input type="hidden" name="m_orderid" value="{{$secret['m_orderid']}}">
                        <input type="hidden" name="m_amount" value="{{$secret['m_amount']}}">
                        <input type="hidden" name="m_curr" value="{{$secret['m_curr']}}">
                        <input type="hidden" name="m_desc" value="{{$secret['m_desc']}}">
                        {{-- <input type="hidden" name="m_sign" value="{{$secret['m_sign']}}"> --}}
                        <?php /*
                        <input type="hidden" name="form[ps]" value="2609">
                        <input type="hidden" name="form[curr[2609]]" value="USD">
                        */ ?>
                        <?php /*
                        <input type="hidden" name="m_params" value="<?=$m_params?>">
                        <input type="hidden" name="m_cipher_method" value="AES-256-CBC-IV">
                        */ ?>
                                    <button type="submit" class="btn btn-outline border my-1">
                                            <span><i class="cc BTC mb-1 mr-1"></i></span>
                                                <h5 style="display: inline;">Bitcoin Wallet</h5>
                                    </button>
                        </form>

                                        

                                        <a href="" class="btn btn-outline border my-1">
                                            <span><i class="cc LTC mb-1 mr-1"></i></span>
                                                <h5 style="display: inline;">Litecoin Wallet</h5>
                                           
                                        </a>

                                        <a href="" class="btn btn-outline border my-1">
                                            <span class=""><i class="cc ETH f-s-20"></i></span>
                                                <h5 style="display: inline;">Ethereum  Wallet</h5>
                                        </a>

                                        <a href="" class="btn btn-outline border my-1">
                                            <span class=""><i class="mdi mdi-account-card-details f-s-20"></i></span>
                                                <h5 style="display: inline;">Debit Card</h5>
                                        </a>
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