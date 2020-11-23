@extends('layouts.adminapp')


@section('content')

<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Dashboard</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </div>
    </div>
    
    
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-md-3">
    <div class="card bg-primary p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-money f-s-40"></i></span> 
    </div>

    <div class="media-body media-text-right">
        <h2 class="color-white text-white text-capitalize">
            {{$info['withdrawals']}}
        </h2>
        <p class="m-b-0 text-white">TOTAL WITHDRAWALS</p>
    </div>
    </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card bg-warning p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-money f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white text-capitalize">
        {{$info['deposit']}}
    </h2>
    <p class="m-b-0 text-white">TOTAL DEPOSIT</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card bg-success p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="ti-vector f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white">
            {{$info['returns']}}
    </h2>
    <p class="m-b-0 text-white">TOTAL PAYOUTS</p>
    </div>
     </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card bg-danger p-20">
    <div class="media widget-ten">
    <div class="media-left meida media-middle">
    <span><i class="fa fa-users f-s-40"></i></span>
    </div>
    <div class="media-body media-text-right">
    <h2 class="color-white text-white">{{count($info['users'])}}</h2>
    <p class="m-b-0 text-white">Total Visitor</p>
    </div>
    </div>
    </div>
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
            <th>S/N</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Referral</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Referral</th>
            <th>Action</th>
        </tr>
        </tfoot>
    
        <tbody>
            @if(count($info['users']) > 0)
                @for($i = 0; $i < count($info['users']); $i++)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$info['users'][$i]['name']}}</td>
                        <td>{{$info['users'][$i]['email']}}</td>
                        <td>
                            @if($info['users'][$i]['status'] == 'unverified' || $info['users'][$i]['status'] == 'active')
                                <p class="badge badge-danger">UNVERIFIED</p>
                            @else
                                <p class="badge badge-success">VERIFIED</p>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->referral == null)
                                NONE
                            @else
                                {{auth()->user()->referral}}
                            @endif
                            
                        </td>
                        <td class="d-flex justify-content-around align-items-center">

                            <a href="{{route('users.show', $info['users'][$i]['id'])}}" class="btn btn-primary mx-2">VIEW DETAILS</a>
                            <a href="{{route('users.edit', $info['users'][$i]['id'])}}" class="btn btn-primary">EDIT DETAILS</a>
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
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
            {{-- <script src="{{asset('./dashboard/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script> --}}
            <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
           <script src="{{asset('./dashboard/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('./dashboard/js/lib/datatables/datatables-init.js')}}"></script>
        @endsection

</div>
@endsection