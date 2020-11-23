@extends('layouts.app')

@section('content')
<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Payments</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Funds</a></li>
    <li class="breadcrumb-item active">Payments</li>
    </ol>
    </div>
    </div>
    
    
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Data Export</h4>
    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    <div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Transaction Ref</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Status</th>        
        <th>Date</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Transaction Ref</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Status</th>        
        <th>Date</th>
    </tr>
    </tfoot>

    <tbody>
        @if(count($payments) > 0)
        @foreach($payments as $payment)
            <tr>
                <td>{{$payment['ref']}}</td>
                <td class="text-capitalize">{{$payment['type']}}</td>
                <td>{{$payment['amount']}}</td>
                <td>
                    @if($payment['status'] == 0)
                        <span class="btn btn-danger">FAILED</span>
                    @elseif($payment['status'] == 1)
                        <span class="btn btn-success">SUCCESSFUL</span>
                    @elseif($payment['status'] == 2)
                        <span class="btn btn-danger">PENDING</span>
                    @endif
                </td>
                <td>{{$payment['created_at']}}</td>
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
        {{-- <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script> --}}
        <script src="{{asset('./dashboard/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
        <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('./dashboard/js/lib/datatables/datatables-init.js')}}"></script>
    @endsection
@endsection