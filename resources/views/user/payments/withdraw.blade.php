@extends('layouts.app')

@section('content')

<div class="page-wrapper  p-1">
    <div class="page-header page-header-kyc mt-5 mt-lg-3 ">
        <div class="row justify-content-center pt-5 pt-lg-1 ">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title">{{__('Withdraw your earning to your crypto wallet')}}</h2>
                <p class="large">{{__('Please make sure you have plan and a reasonable balance.')}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9">

            <div class="kyc-form-steps card mx-lg-4">
                <input type="hidden" id="file_uploads" value="" />

                <form  action="{{route('user.kyc.upload')}}" method="POST" id="kyc_submit" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="amount">Amout</label>
                        <input type="number" name="amount" id="amount" placeholder="Please type in the amount you want to withdraw" class="form-control" required>
                    </div>

                    <div class="form-group my-2">
                        <label for="address">Wallet Address</label>
                        <select name="address" id="address" class="form-control">
                            <option value="">Choose Address</option>
                            <option value="user">Use My Kyc Wallet Address</option>
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
                                    <select name="type" id="wallet_type" class="form-control" required>
                                        <option value="{{null}}">Choose Type</option>
                                        <option value="all">All Currencies</option>
                                        <option value="ethereum">Ethereum</option>
                                        <option value="bitcoin">Bitcoin</option>
                                        <option value="litecoin">Litecoin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="wallet_address">Wallet Address</label>
                                <input type="text" class="form-control" name="wallet_address" required>
                                </div>`;
                            }else{
                                container.innerHTML = "";
                            }
                            console.log('connected');
                        }

                        select.onclick = output;
                    </script>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Request Withdrawal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection