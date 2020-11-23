@extends('layouts.adminapp')


@section('content')

<style>
    .btn-success{
        background-color: #218838!important;
        border-color: #218838!important;
    }

    /* .text-wrap{
        white-space: normal;
    } */

    .fa{
        font-weight: 400!important;
        font-size: 12px!important;
    }

    @media screen and (max-width: 768px){
        .custom{
            margin: 0!important;
            padding: 0!important;
        }
    }
</style>

<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary text-capitalize">Add Wallet</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Wallet Management</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
    <li class="breadcrumb-item active">New Wallet</li>
    </ol>
    </div>
    </div>

    <div class="container mx-auto card">
        <form action="{{route('site_wallets.store')}}" method="POST" enctype="multipart/form-data">
            @csrf           

            <div class="row">
                <div class="col-12 mt-3">
                    <div class="form-group">
                        <label for="type">Wallet Type</label>
                        <input type="text" name="type" id="type" class="form-control" placeholder="Type in new wallet type">
                    </div>

                    <div class="form-group">
                        <label for="address">Wallet Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Type in new wallet address">
                    </div>        
                    
                    <div class="form-group">
                        <label for="qr">Upload New QR Code Image</label>
                        <input type="file" name="qr" id="qr" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="text-center my-3">
                <button type="submit" class="btn btn-dark">ADD WALLET</button>
            </div>
        </form>

    </div>
</div>

@endsection