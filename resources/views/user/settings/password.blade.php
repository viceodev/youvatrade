<div class="tab-pane p-20" id="messages" role="tabpanel">
    <form action="{{route('user.update.password')}}" method="POST">
        @csrf 
        <div class="row">
            <div class="col-lg-6">
                <div class="my-4">
                    <label for="old">Old Password</label>
                    <input type="password" name="old" id="old" class="form-control" required placeholder="Type in your old password">
                </div>
            </div>
        </div>    
        
        <div class="row">
            <div class="col-lg-6">
                <div class="my-4">
                    <label for="new">New Password</label>
                    <input type="password" name="new" id="new" class="form-control" placeholder="Type in your new password" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="my-4">
                    <label for="new_confirm">Confirm New Password</label>
                    <input type="password" name="new_confirm" id="new_confirm" class="form-control" placeholder="Type in your new password again" required>
                </div>
            </div>
        </div>

        <div class="card">
            <p class="text-info"><span><i class="fa fa-info-circle mr-1"></i></span>Password should be a minimum of 8 digits and include lower and uppercase letter together with alteast one special character.</p>

            <p class="text-info"><span><i class="fa fa-info-circle mr-1"></i></span>You will be required to login again.</p>
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-rounded">Update Password</button>
        </div>
    </form>

</div>