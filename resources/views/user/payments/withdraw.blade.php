@extends('layouts.app')

@section('content')

<div class="page-wrapper  p-1">
    <div class="page-header page-header-kyc mt-5 mt-lg-5 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center text-uppercase">
                <h2 class="page-title">{{__('Withdraw your earning to your crypto wallet')}}</h2>
                <p class="large">{{__('Please make sure you have a plan and a reasonable balance.')}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9">

            <div class="kyc-form-steps card mx-lg-4">

                <form  action="{{route('user.withdraw')}}" method="POST">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" placeholder="Please type in the amount you want to withdraw" class="form-control" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="address">Wallet Address</label>
                        <select name="address" id="address" class="form-control">
                            <option value="">Choose Address</option>
                            <option value="user">Use My Saved Wallet Address</option>
                            <option value="new">Use A New Wallet Address</option>
                        </select>
                    </div>

                    <div class="form-group" id="output"></div>

                    <script>
                        let select = document.querySelector('select#address');
                        let container =  document.querySelector('div#output');

                        let output =  function(){
                            if(select.value == 'new'){
                                container.innerHTML = `
                                <div class="form-group">
                                <label for="wallet_type">Wallet Type</label>
                                    <select name="wallet_type" id="wallet_type" class="form-control" required>
                                        <option value="{{null}}">Choose Type</option>
                                        @foreach($info['site_wallets'] as $wallet)
                                            <option value="{{$wallet['wallet_type']}}">{{strtoupper($wallet['wallet_type'])}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="wallet_address">Wallet Address</label>
                                <input type="text" class="form-control" name="wallet_address" required>
                                </div>`;
                            }else if(select.value == 'user'){
                                container.innerHTML = `
                                <div class="form-group">
                                <label class="my-2">Choose One Of your available wallets</label>
                                @foreach($info['wallets'] as $wallet)
                                    @if($wallet['status'] != 0)
                                        <div class="form-group px-lg-4 p-2">
                                        <input type="radio" name="wallet" value="{{$wallet['id']}}">
                                        <span class="mx-3">{{strtoupper($wallet['wallet_type'])}} --- {{$wallet['wallet_address']}}</span>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                                `;
                            }else{
                                container.innerHTML = "";
                            }
                            console.log('connected');
                        }

                        select.onclick = output;
                    </script>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Request Withdrawal</button>
                        <a href="{{route('wallets.index')}}" class="btn btn-success">Add New Wallet</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection