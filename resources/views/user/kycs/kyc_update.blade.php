@extends('layouts.app')

@section('content')
<style>
    .step-number{
        flex-shrink: 0;
        height: 48px;
        width: 48px;
        font-size: 16px;
        color: #758698;
        border: 2px solid #b1becc;
        text-align: center;
        line-height: 45px;
        border-radius: 50%;
        margin-right: 12px;
        margin-top: 4px;
        margin-bottom: 4px;
    }
</style>

<div class="page-wrapper  p-1">
    <div class="page-header page-header-kyc mt-5 mt-lg-4 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title">{{__('Know Your Customer Verification Form')}}</h2>
                <p class="large text-info">{{__('Update your KYC Application')}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9">

            <div class="kyc-form-steps card mx-lg-4">
                <input type="hidden" id="file_uploads" value="" />
                
                <form  action="{{route('user.kyc.update')}}" method="POST" id="kyc_submit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @include('user.kycs.kyc_update_form')
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection