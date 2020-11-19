@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h3 class="text-primary text-capitalize">Wallet Management</h3> </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Funds</a></li>
        <li class="breadcrumb-item active text-capitalize">Wallet Management</li>
        </ol>
        </div>
    </div>


    <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title text-uppercase">{{__('Add Wallets to your account')}}</h2>
                <p class="large">{{__('Please make sure you input your correct address.')}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9">

            <div class="kyc-form-steps card mx-lg-4">
                <form  action="{{route('wallets.store')}}" method="POST">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="wallet_type">Wallet Type</label>
                        <select name="wallet_type" id="wallet_type" class="form-control text-uppercase" required>
                            <option value="{{null}}">Choose Wallet Type</option>
                            @foreach($info['site_wallets'] as $wallet)
                                <option value="{{$wallet['wallet_type']}}" style="text-transform: uppercase;">{{strtoupper($wallet['wallet_type'])}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-2">
                        <label for="address">Wallet Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="type in your wallet address" required>
                    </div>

                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <h4 class="card-title">Wallets Table</h4>
        <h6 class="card-subtitle">You can add as many wallet addresses as you want.Please make sure they are the correct addresses</h6>
        <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr class="text-uppercase">
            <th>Wallet Type</th>
            <th>Wallet Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr class="text-uppercase">
            <th>Wallet Type</th>
            <th>Wallet Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
    
        <tbody>
            @if(count($info['user_wallets']) > 0)
            @foreach($info['user_wallets'] as $wallet)
                <tr class="text-uppercase">
                    <td>{{$wallet['wallet_type']}}</td>
                    <td>{{$wallet['wallet_address']}}</td>
                    <td>
                        @if($wallet['status'] == 0)
                            <span class="btn btn-danger">DISABLED</span>
                        @else
                            <span class="btn btn-success">ACTIVE</span>
                        @endif
                    </td>

                    <td class="d-flex justify-content-around">
                        @if($wallet['status'] == 0)
                            <form action="{{route('wallets.update', $wallet['id'])}}" method="POST">
                                @csrf
                                @method('PUT')                            
                                <input type="hidden" name="action" value="activate">
                                <button  type="submit" class="btn btn-success">ACTIVATE</button>
                            </form>    
                        @endif

                        @if($wallet['status'] == 1)
                            <form action="{{route('wallets.update', $wallet['id'])}}" method="POST">
                                @csrf
                                @method('PUT')   
                                <input type="hidden" name="action" value="deactivate">
                                <input type="submit" class="btn btn-danger" value="DEACTIVATE">
                            </form>
                        @endif
                        

                        <form action="{{route('wallets.destroy', $wallet['id'])}}" method="POST" class="mx-3">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="action" value="delete">
                            <button class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
    
            @endforeach
            @else
                <div class="card lead text-danger">
                    <span><i class="fa fa-info-circle m-1"></i>Opp!, Nothing to show</span>
                </div>
            @endif
        </tbody>
        </table>
    
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
</div>

@section('customJs')
<script src="{{asset('./dashboard/js/lib/datatables/datatables.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
{{-- <script src="{{asset('./dashboard/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script> --}}
<script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/datatables/datatables-init.js')}}"></script>
@endsection

@endsection