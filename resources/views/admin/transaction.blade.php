@extends('layouts.adminapp')


@section('content')

<style>
    .btn-success{
        background-color: #218838!important;
        border-color: #218838!important;
    }

    .text-wrap{
        white-space: normal;
    }

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
    <h3 class="text-primary">Transactions</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active">Transactions</li>
    </ol>
    </div>
    </div>


    <div class="container-fluid custom">
    
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Export</h4>
        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
        <div class="table-responsive m-t-40">
        <table id="example23" class="text-wrap display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Ref No.</th>
            <th>Description</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Channel</th>        
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th> Ref No.</th>
            <th>Description</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Channel</th>        
            <th>Date</th>
            <th>Action</th>
        </tr>
        </tfoot>
    
        <tbody>
            @if(count($transactions) > 0)
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction['ref']}}</td>
                    <td class="text-capitalize">{{$transaction['description']}} via
                        <span class="text-danger">{{$transaction['payment_address']}} </span>
                        <span class="text-info">-- User {{$users[$transaction['ref']]['name']}} -- Email {{$users[$transaction['ref']]['email']}} -- User-Type {{$users[$transaction['ref']]['role']}}</span></td>
                    <td class="text-capitalize">{{$transaction['type']}}</td>
                    <td>{{$transaction['amount']}}</td>
                    <td>
                        @if($transaction['status'] == 0)
                            <span class="btn btn-danger btn-sm">FAILED</span>
                        @elseif($transaction['status'] == 1)
                            <span class="btn btn-success btn-sm">SUCCESSFUL</span>
                        @elseif($transaction['status'] == 2)
                            <span class="btn btn-danger btn-sm">PENDING</span>
                        @endif
                    </td>
                    <td>{{strtoupper($transaction['payment_channel'])}}</td>
                    <td>{{$transaction['created_at']}}</td>

                    <td class="text-center" >
                        <table>
                            <tbody>
                                <tr>
                                    <td style="background-color:transparent!important; border:none!important;">
                                        <form action="{{route('transaction.destroy', $transaction['id'])}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-default  btn-xs">
                                                <span class="fa fa-pause text-info"></span>
                                            </button>
                                        </form>    
                                    </td>

                                    <td style="background-color:transparent!important; border:none!important;">    
                                        <form action="{{route('transaction.update', $transaction['id'])}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-default  btn-xs">
                                                <span class="fa fa-times text-danger"></span>
                                            </button>
                                        </form>                                        
                                    </td>

                                    <td style="background-color:transparent!important; border:none!important;">
                                        <form action="{{route('transaction.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$transaction['id']}}" ">

                                            <button class="btn btn-default  btn-xs">
                                                <span class="fa fa-check text-success"></span>
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            <script src="{{asset('./dashboard/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/datatables-init.js')}}"></script>
        @endsection
</div>

@endsection