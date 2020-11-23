@extends('layouts.adminapp')


@section('content')


<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Single Kyc</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Kyc</a></li>
    <li class="breadcrumb-item active">Single Kyc</li>
    </ol>
    </div>
    </div>

    <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title text-uppercase">{{__('VIEW SINGLE KYC')}}</h2>
            </div>
        </div>
    </div>

    <div class=" container m-auto card text-uppercase text-center">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">First-Name: {{$kyc['firstname']}}</div>
                <div class="card">Email: {{$kyc['email']}}</div>
                <div class="card">First-Name: {{$kyc['firstname']}}</div>
                <div class="card">Date Of Birth: {{$kyc['dob']}}</div>
                <div class="card">City: {{$kyc['city']}}</div>
                <div class="card">Zip-code: {{$kyc['zip']}}</div>
                <div class="card">Document-TYPE: {{$kyc['type']}}</div>
            </div>

            <div class="col-lg-6">
                <div class="card">Last-Name: {{$kyc['lastname']}}</div>
                <div class="card">Phone: {{$kyc['phone']}}</div>
                <div class="card">Gender: {{$kyc['gender']}}</div>
                <div class="card">Address: {{$kyc['address']}}</div>
                <div class="card">state: {{$kyc['state']}}</div>
                <div class="card">Country: {{$kyc['country']}}</div>
            </div>

            <div class="col-lg-12">
                <p class="card lead">Available Uploaded Files</p>

                <div class="d-lg-flex justify-content-around align-items-center">
                    @for($i = 0; $i < count($info['storage']); $i++)
                        <form method="POST" action="{{route('admin.kyc.download')}}">
                            @csrf
                        <input type="hidden" name="file" value="{{$info['storage'][$i]}}">
                        <button class="btn btn-dark m-1">Download File {{$i + 1}}</button>
                        </form>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
