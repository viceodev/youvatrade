@extends('layouts.app')

@section('content')
<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Payments</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
        <th>User's Name</th>
        <th>Bonus</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>User's Name</th>
        <th>Bonus</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </tfoot>

    <tbody>
        @if(count($info['referrals']) > 0)
        @for($i = 0; $i < count($info['referrals']); $i++)
            <tr>
                <td>{{$info['users'][$i]['name']}}</td>
                <td class="text-capitalize">{{$info['referrals'][$i]['bonus']}}</td>
                <td>{{$info['referrals'][$i]['created_at']}}</td>
                <td>
                    @if($info['referrals'][$i]['bonus'] == 0)
                        <span class="btn btn-danger">PENDING</span>
                    @else
                        <span class="btn btn-success">SUCCESSFUL</span>
                    @endif
                </td>
            </tr>

        @endfor
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