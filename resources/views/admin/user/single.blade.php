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
    <h3 class="text-primary text-capitalize">{{$user['name']}}</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
    <li class="breadcrumb-item active">{{$user['name']}}</li>
    </ol>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-lg-4 m-1 card">
                <div class="card-header lead">Client Details</div>
                <div class="card-body my-2">
                    <p>Available Balance: 
                        @if($user['balance'] != null)
                            ${{$user['balance']}}
                        @else
                            $0
                        @endif
                    </p>
                    <p>Available Withdrawal: 
                        @if($user['balance'] != null)
                            ${{$user['balance']}}
                        @else
                            $0
                        @endif
                    </p>

                    <p>Total Returns:
                        @if($info['return'] != null)
                            ${{$info['return']}}
                        @else
                            $0
                        @endif
                    </p>
                    
                    <p>Total Deposit:
                        @if($info['deposit'] != null)
                            ${{$info['deposit']}}
                        @else
                            $0
                        @endif
                    </p>

                    <p>Total Bonus:
                        @if($user['bonus'] != null)
                            ${{$user['bonus']}}
                        @else
                            $0
                        @endif
                    </p>

                    <p>Total Withdrawal:
                        @if($user['withdrawal'] != null)
                            ${{$user['withdrawal']}}
                        @else
                            $0
                        @endif
                    </p>


                    <p>Total Investment: 
                        @if($user['invesment'] != null)
                            ${{$user['invesment']}}
                        @else
                            $0
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-lg-4 m-1 card text-capitalize">
                <div class="card-header lead">Profile Details</div>
                <div class="card-body my-2">
                    <p>Name: {{$user['name']}}</p>
                    <p>Email: {{$user['email']}}</p>
                    <p>Referral: @if($user['referral'] != null) {{$user['referral']}} @else None @endif</p>
                    <p>Member Since: {{$user['created_at']}}</p>
                    <p>Number Of Referral: 
                        @if(count($info['referrals']) > 0 )
                            {{count($info['referrals'])}}
                        @else
                            0
                        @endif
                    </p>
                    <p>Status: {{$user['status']}}</p>
                    <p>User Type: {{$user['role']}}</p>
                </div>
            </div>


            <div class="col-lg-3 m-1 card">
                <div class="card-header lead">Add Transaction</div>
                <form action="{{route('admin.user.transact', $user['id'])}}" class="form-group" method="POST">
                    @csrf 
                    <div class="input-group my-2">
                        <div class="input-group-addon bg-white"><i class="ti-money"></i></div>
                        <input name="amount" id="" class="form-control form-type" placeholder="amount" required value="{{old('amount')}}">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-addon"><i class="ti-book"></i></div>
                        <textarea name="description" id="" class="form-control form-type py-1" style="height: 150px;" required value="{{old('description')}}"></textarea>
                    </div>

                    <select class="form-control" required name="type" id="input"> 
                        <option value="">Select type</option>
                        <option value="deposit">Deposit</option>
                        <option value="investment">Investment</option>
                        <option value="withdrawal">Withdrawal</option>
                        <option value="charges">Charges</option>
                        <option value="referral bonus">Ref Bonus</option>
                        <option value="bonus">Bonus</option>
                        <option value="capital">Capital</option>
                        <option value="purchase">Purchase</option>
                    </select>    
                    
                    <div class="form-group my-2" id="output"></div>

                    <script>
                        let input = document.querySelector('select#input');

                        let data = function(){
                            let container = document.querySelector('div#output');

                            if(input.value == 'investment'){
                                container.innerHTML = `
                                    <select name="plan" class="form-control " required>
                                        <option>Select Plan</option>
                                        @foreach($info['plans'] as $plan)
                                            <option value="{{$plan['id']}}">{{strtoupper($plan['plan_name'])}}</option>
                                        @endforeach
                                    </select>
                                `;
                            }else{
                                container.innerHTML = "";
                            }
                        }

                        input.onclick = data;
                    </script>
                    
                    <div class="text-right my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container m-auto card">
        <div class="card-title">Send Personalized Email To User</div>
        <form action="{{route('admin.user.message',$user['email'])}}" method="POST" class="form-group p-1 my-1">
            @csrf 

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" required placeholder="Subject">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea type="text" name="message" id="subject" class="form-control" required placeholder="message" style="height: 400px;"></textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Send Email</button>
            </div>
        </form>
    </div>


    <div class="container-fluid custom">
    
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <h4 class="card-title">Transaction</h4>
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
            @if(count($info['transactions']) > 0)
            @foreach($info['transactions'] as $transaction)
                <tr>
                    <td>{{$transaction['ref']}}</td>
                    <td class="text-capitalize">{{$transaction['description']}} via
                        <span class="text-danger">{{$transaction['payment_address']}} </span>
                        <span class="text-info">-- User {{$user['name']}} -- Email {{$user['email']}} -- User-Type {{$user['role']}}</span></td>
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