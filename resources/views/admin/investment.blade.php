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
    <h3 class="text-primary">Investments</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active">Investments</li>
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
            <th>User</th>
            <th>Contact</th>
            <th>Capital</th>
            <th>Return</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>User</th>
            <th>Contact </th>
            <th>Capital</th>
            <th>Return</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
        </tr>
        </tfoot>
    
        <tbody>
            @if(count($info['transactions']))
                @foreach($info['transactions'] as $transaction)
                    <tr>
                        <td class="text-capitalize">
                            <span class="text-info">{{strtoupper($info['plans'][$transaction['plan']]['plan_name'])}}</span><br>
                            {{$info['users'][$transaction['user_id']]['name']}}
                        </td>

                        <td>{{$info['users'][$transaction['user_id']]['email']}}</td>
                        <td>${{$transaction['amount']}}</td>
                        <td>${{(($info['plans'][$transaction['plan']]['ROI']) / 100) * $transaction['amount']}}</td>
                        <td>{{$transaction['created_at']}}</td>
                        <td>
                            <?php
                                $start = strtotime($transaction['created_at']);
                                $end = $start + $info['plans'][$transaction['plan']]['time_rate'];
                                echo date("Y-m-d h:i:sa", $end);
                            ?>
                        </td>
                        <td>
                            <?php 
                                $time = strtotime($transaction['created_at']);

                                if(($time + $info['plans'][$transaction['plan']]['time_rate']) < strtotime('now')){
                                    echo 'Expired';
                                }else{
                                    echo 'Running';
                                }
                            ?>
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