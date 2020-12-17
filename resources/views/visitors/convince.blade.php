                <style>
                    .custom{
                        background-color: whitesmoke;
                        color: black;
                        border-radius: 10px;
                    }

                    .custom thead{
                        background-color: black;
                        color: white;;
                    }

                    .custom td,th{
                        text-align: center;
                    }

                    .custom th{
                        padding: 10px 0px;
                    }

                    ul#custom{
                        display: flex!important;
                        justify-content: center!important;
                        align-items: center!important;
                        margin: 20px;
                    }

                    ul#custom li{
                        padding: 20px;
                        background-color: white;
                        border-radius: 20px;
                    }

                    ul#custom li{
                        background-color: white;
                        border-radius: 20px;
                    }


                    ul#custom a li.active {
                        color: white!important;
                        background-color: #fd961a;
                        color: white!important;
                    }


                </style>            
            
            <div class="container">
                <ul class="nav nav-tabs" id="custom">
                    <a data-toggle="tab" href="#withdraw">
                        <li class="active">Withdrawals</li>
                    </a>

                    <a data-toggle="tab" href="#deposit">
                        <li>Deposits</li>
                    </a>
                
                </ul>

                <div class="tab-content custom rounded">
                    <div id="withdraw" class="tab-pane fade in active">
                        <div class="row ">
                            <div class="col-lg-12 p-lg-4">
                                        <table class="table table-responsive-lg transaction-table ">
                                            <thead class="">
                                            <tr>
                                                <th>NAME</th>
                                                <th>DATE</th>
                                                <th>AMOUNT</th>
                                                <th>CURRENCY</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($info['withdrawals']))
                                                @foreach($info['withdrawals'] as $transact)
                                                    <tr class="bg-light p-lg-3">
                                                        <td>
                                                            {{$info['users'][$transact['ref']]['name']}}
                                                        </td> 
                                                        <td scope="row" class="d-flex">
                                                            <h4>{{$transact['created_at']}}</h4>
                                                        </td>
                                                        
                                                        
                                                        <td>${{$transact['amount']}}</td>
                                                        
                                                        <td>{{strtoupper($transact['payment_channel'])}}</td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                    <div id="deposit" class="tab-pane fade">
                        <div class="row ">
                            <div class="col-lg-12">
                                        <table class="table table-responsive-lg transaction-table table-striped  ">
                                            <thead class="">
                                            <tr>
                                                <th>NAME</th>
                                                <th>DATE</th>
                                                <th>DEPOSITED AMOUNT</th>
                                                <th>CURRENCY</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($info['deposits']))
                                                @foreach($info['deposits'] as $transact)
                                                    <tr class="bg-light p-lg-3">
                                                        <td>
                                                            {{$info['users'][$transact['ref']]['name']}}
                                                        </td> 
                                                        <td scope="row" class="d-flex">
                                                            <h4>{{$transact['created_at']}}</h4>
                                                        </td>
                                                        
                                                        
                                                        <td>${{$transact['amount']}}</td>
                                                        
                                                        <td>{{strtoupper($transact['payment_channel'])}}</td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

