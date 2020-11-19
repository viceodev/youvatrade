@extends('layouts.app')

@section('content')

<style>
    .status-icon{
        position: relative;
        height: 90px;
        width: 90px;
        background: #fff;
        border-radius: 50%;
        text-align: center;
        margin: 0 auto 20px;
        border: 2px solid #b1becc;
        font-size: 36px;
        line-height: 86px;
    }

    .status-icon::after, .status-icon::before{
        box-sizing: border-box;
    }
</style>

<div class="page-wrapper  p-1">
    <div class="row mt-5 mt-lg-0">
        <section class="col-lg-2"></section>
        <section class="col-lg">
            <section class="text-center mt-5 mt-lg-5">
                <p class="display-6 text-dark">KYC Verification</p>
                <p class="lg">To comply with regulations each participant is required to go through identity verification (KYC/AML) to prevent fraud, money laundering operations, transactions banned under the sanctions regime or those which fund terrorism. Please, complete our fast and secure verification process to participate in token offerings.</p>            
            </section>

            <section class="card my-5 text-center" style="height: 330px;">
                <div class="status-icon">
                    <em class="ti ti-files"></em>
                </div>

                <span class="text-dark lead">You have not submitted your necessary documents to verify your identity.</span>

                <p class="px-md-5 text-dark my-2">It would be great if you please submit the form. If you have any question, please feel free to contact our support team.</p>

                {{-- continue here --}}
                <div class="text-center mt-3">
                    <a href="{{route('user.kyc.new')}}" class="btn btn-primary btn-outline btn-rounded">
                        @if(count($kyc) > 0)
                            Update Your K.Y.C Application
                        @else
                            Complete your K.Y.C Application
                        @endif
                    </a>                    
                </div>

            </section>
        </section>
        <section class="col-lg-2"></section>
    </div>
</div>

    
@endsection