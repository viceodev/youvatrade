
<div class="tab-pane" id="profile" role="tabpanel">
    <form action="{{route('user.update.payment')}}" method="POST">
        @csrf 
    <div class="row mt-3"> 

        <div class="col-lg-6">
            <h4>Digital Wallet Details</h4>
            <div class="my-4">
                <label for="type">Wallet Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="null">Choose Type</option>
                    <option value="all" @if(strtolower(auth()->user()->wallet_type) == 'all') selected  @endif>All Currencies</option>
                    <option value="ethereum" @if(strtolower(auth()->user()->wallet_type) == 'ethereum') selected  @endif>Ethereum</option>
                    <option value="bitcoin" @if(strtolower(auth()->user()->wallet_type) == 'bitcoin') selected  @endif>Bitcoin</option>
                    <option value="litecoin" @if(strtolower(auth()->user()->wallet_type) == 'litecoin') selected  @endif>Litecoin</option>
                </select>
            </div>

            <div class="my-4">
                <label for="address">Wallet Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{auth()->user()->wallet_address}}">
            </div>

            <div class="alert alert-info">
                Please note that updating your wallet address here does not change your wallet address in your K.Y.C Application. If you want to change your address also in  your kyc application. <br>
                <a href="{{route('user.kyc.new')}}" class="btn btn-dark">Update KYC</a>
            </div>
        </div>

        <div class="text-right container-fluid my-4">
            <button type="submit" class="btn btn-info btn-rounded">Update Settings</button>                            
        </div>

    </div>
</form>
    </div>