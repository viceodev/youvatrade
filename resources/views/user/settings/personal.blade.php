 <div class="tab-pane active" id="home" role="tabpanel">
                    <form action="{{route('user.update.personal')}}" method="POST">
                        @csrf 
                    <div class="row"> 
                        
                        <div class="col-lg-6">
                           <div class="my-4">
                               <label for="name">Full Name</label>
                               <input type="text" name="name" id="name" class="form-control" required value="{{auth()->user()->name}}">
                           </div>

                           <div class="my-4">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" required value="{{auth()->user()->phone}}">
                            </div>

                            <div class="my-4">
                                <label for="nationality">Nationality</label>
                                <select name="nationality" id="nationality" class="form-control">
                                    <option value="null">Select Nationality</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country}}" class="text-capitalize" @if((auth()->user()->nationality) == $country) selected  @endif>{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="col-lg-6">
                            <div class="my-4">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" disabled value="{{auth()->user()->email}}">
                            </div>

                            <div class="my-4">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" required value="{{auth()->user()->dob}}">
                            </div>

                            <div class="my-4">
                                <label for="dob">Referral Link</label>
                                <input type="text" name="dob" id="dob" class="form-control text-lowercase" disabled value="{{ "https://"."$_SERVER[HTTP_HOST]"."/auth/register/".auth()->user()->referral_code}}">
                            </div>

                        </div>

                        <div class="text-right container-fluid my-4">
                            <button type="submit" class="btn btn-info btn-rounded">Update Settings</button>                            
                        </div>

                    </div>
                </form>
                    </div>
