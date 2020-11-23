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
    <h3 class="text-primary">Index</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">User Management</a></li>
    <li class="breadcrumb-item active">Index</li>
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
            <th>Banned</th>
            <th>Balance</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>User</th>
            <th>Contact </th>
            <th>Banned</th>
            <th>Balance</th>
            <th>Action</th>
        </tr>
        </tfoot>
    
        <tbody>
            @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td>{{strtoupper($user['name'])}}</td>
                    <td>{{$user['email']}}</td>
                    <td class="text-capitalize">
                        @if($user['banned'] == true)
                            <a href="" class="btn btn-danger btn-sm">banned</a>
                        @else
                            <a href="" class="btn btn-success btn-sm">Not Banned</a>
                        @endif
                    </td>
                    <td>${{$user['balance']}}</td>

                    <td class="d-flex justify-content-center">
                        <table>
                            <tbody>
                                <tr>
                                    <td style="background-color:transparent!important; border:none!important;">
                                       <a href="{{route('users.edit', $user['id'])}}">
                                            <button class="btn btn-default  btn-xs">
                                                <span class="fa fa-edit text-success"></span>
                                            </button> 
                                        </a>                                    
                                    </td>

                                    
                                    <td style="background-color:transparent!important; border:none!important;">
                                        <a href="{{route('users.show', $user['id'])}}">
                                            <button class="btn btn-default  btn-xs">
                                                <span class="fa fa-eye text-dark"></span>
                                            </button>
                                        </a>                                       
                                    </td>

                                    <td style="background-color:transparent!important; border:none!important;">
                                        <form action="{{route('users.destroy', $user['id'])}}" method="post">
                                            @csrf
                                            @method('delete')

                                            @if($user['banned'] != true)
                                                <input type="hidden" name="action" value="ban">
                                                <button class="btn btn-default  btn-xs">
                                                    <span class="fa fa-user-md text-danger"></span>
                                                </button>
                                            @elseif($user['banned'] == true)
                                                <input type="hidden" name="action" value="unban">
                                                <button class="btn btn-default  btn-xs">
                                                    <span class="fa fa-user-md text-success"></span>
                                                </button>
                                            @endif
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