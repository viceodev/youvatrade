<div class="form-step form-step1">
    <hr>
    <div class="form-step-head card-innr">
        <div class="d-flex  ">
            <div class="step-number">01</div>
            <div class="step-head-text">
                <h4>{{__('Personal Details')}}</h4>
                <p>{{__('Your basic personal information is  for identification purposes.')}}</p>
            </div>
        </div>
    </div>{{-- .step-head --}}

    <hr>
    <div class="form-step-fields card-innr">
        <div class="p-3 rounded alert alert-info shadow-lg alert-dismissable d-flex align-items-center justify-content-center">
            <i class="fa fa-info-circle" style="font-size: 30px;"></i>
            <span class="mx-2">{{__('Please type carefully and fill out the form with your personal details. You are not allowed to edit the details once you have submitted the application.')}}</span>
        </div>
        <div class="row">
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="first-name" class="input-item-label">{{__('First Name')}}  
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                    <input class=" input-focus form-control rounded shadow" type="text" value = "{{ old('first_name') }}" id="first-name" name="first_name" placeholder="First Name" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="last-name" class="input-item-label">{{__('Last Name')}} 
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" value = "{{old('last_name')}}" type="text" id="last-name" name="last_name" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="email" class="input-item-label">{{__('Email Address')}} 
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" value = "{{auth()->user()->email}}" type="email" id="email" name="email">
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            

            
            {{-- <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="password" class="input-item-label">{{__('Password')}} 
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <input  class="input-focus form-control rounded shadow" placeholder="*******" type="password" minlength="6" id="password" name="password">
                    </div>
                </div>{
            </div>.col --}}
            

            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="phone-number" class="input-item-label">{{__('Phone Number ')}}
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="text" value = "{{old('phone')}}" id="phone-number" name="phone" >
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="date-of-birth" class="input-item-label">{{__('Date of Birth')}}
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="date" value = "{{old('dob')}}" id="date-of-birth" name="dob" >
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="gender" class="input-item-label">{{__('Gender')}} 
                        <span class="text-require text-danger">*</span>
                    </label>
                    <div class="input-wrap">
                        <select class="input-focus form-control rounded shadow" name="gender" id="gender">
                            <option value="{{null}}">{{__('Select Gender')}}</option>
                            <option value="male" @if(old('gender') == 'male') selected @endif>{{__('Male')}}</option>
                            <option  value="female" @if(old('gender') == 'female') selected @endif>{{__('Female')}}</option>
                            <option  value="other" @if(old('gender') == 'other') selected @endif>{{__('Other')}}</option>
                        </select>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            
        </div>{{-- .row --}}
        <hr>
        <h4 class="display-7 text-center my-3 mgt-0-5x">{{__('Your Address')}}</h4>
        <hr>
        <div class="row">
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="country" class="input-item-label">{{__('Country')}} </label>
                    <span class="text-require text-danger">*</span>
                    <div class="input-wrap">
                        <select class="input-focus form-control rounded shadow" name="country" id="country" data-dd-class="search-on" required>
                            <option value="{{null}}">{{__('Select Country')}}</option>
                            @foreach($countries as $country)
                            <option value="{{ $country }}" @if(old('country') == $country) selected @endif>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="state" class="input-item-label">{{__('State')}} </label>
                    <span class="text-require text-danger">*</span>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="text" value = "{{old('state')}}" id="state" name="state" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="city" class="input-item-label">{{__('City')}} </label>
                    <span class="text-require text-danger">*</span>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="text" value = "{{old('city')}}" id="city" name="city" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="zip" class="input-item-label">{{__('Zip / Postal Code')}} </label>
                    <span class="text-require text-danger">*</span>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="text" value = "{{old('zip')}}" id="zip" name="zip" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            <div class="col-md-6 my-4">
                <div class="input-item input-with-label">
                    <label for="address" class="input-item-label">{{__('Address')}} </label>
                    <span class="text-require text-danger">*</span>
                    <div class="input-wrap">
                        <input class="input-focus form-control rounded shadow" type="text" value = "{{old('address')}}" id="address" name="address" required>
                    </div>
                </div>{{-- .input-item --}}
            </div>{{-- .col --}}
            
            
            
        </div>{{-- .row --}}
    </div>{{-- .step-fields --}}
</div>
<hr>

<div class="form-step form-step2">
    <div class="form-step-head card-innr">
        <div class="d-flex">
            <div class="step-number">02</div>
            <div class="step-head-text">
                <h4>{{__('Document Upload')}}</h4>
                <p>{{__('To verify your identity, we ask you to upload high-quality scans or photos of your official identification documents issued by the government.')}}</p>
            </div>
        </div>
    </div>{{-- .step-head --}}

    <hr>
        
        <div class="doc-upload-area container">
            <dt class="text-dark bold my-2">{{__('To avoid delays with verification process, please double-check to ensure the below requirements are fully met:')}}</dt>
            <ul class="">
                <li>- &nbsp; {{__('Chosen credential must not be expired.')}}</li>
                <li>- &nbsp; {{__('Document should be in good condition and clearly visible.')}}</li>
                <li>- &nbsp; {{__('There is no light glare or reflections on the card.')}}</li>
                <li>- &nbsp; {{__('File should not be larger than 10mb each.')}}</li>
            </ul>
        </div>
            <div class="gaps-2x"></div>


    <div class="card">

        <div class="form-group">
            <label for="doc">Upload the rear view of your document</label>
            <span class="text-require text-danger">*</span>
            <input type="file" name="front_doc" id="doc" class="form-control " value="{{old('front_doc')}}">            
        </div>

        <div class="form-group">
            <label for="doc">Upload the back-side view of your document</label>
            <span class="text-require text-danger">*</span>
            <input type="file" name="back_doc" id="doc" class="form-control" value="{{old('back_doc')}}">            
        </div>

        <div class="form-group">
            <label for="doc">Upload a picture of you holding the document</label>
            <span class="text-require text-danger">*</span>
            <input type="file" name="user_doc" id="doc" class="form-control" value="{{old('user_doc')}}">            
        </div>


        <label for="type">What file type is this</label>
        <select name="type" id="type" class="form-control" value="{{old('type')}}">
            <option value="{{null}}">Type</option>
            <option value="passport">PASSPORT</option>
            <option value="national_id">NATIONAL ID CARD</option>
            <option value="driver_license">DRIVER'S LICENSE</option>
        </select>
    </div>
           

<hr>

<div class="form-step form-step-final">
    <div class="p-2">

        <div class="my-2">
            <input type="checkbox" name="read" id="read"  class="mr-2" required>
            <label for="read">I have read the Terms and Condition and Privacy and Policy.</label>
            <span class="text-require text-danger">*</span>
        </div>

        <div class="my-2">
            <input type="checkbox" name="correct" id="correct"  class="mr-2" required>
            <label for="correct">All the personal information I have entered is correct.</label>
            <span class="text-require text-danger">*</span>
        </div>

        <div class="my-2">
            <input type="checkbox" name="consent" id="consent"  class="mr-2" required>
            <label for="consent" style="display: inline;">I certify that, I am registering to participate in the digital investment  event(s) in the capacity of an individual (and beneficial owner) and not as an agent or representative of a third party corporate entity.</label>
            <span class="text-require text-danger">*</span>
        </div>

        <div class="my-2">
            <input type="checkbox" name="understand" id="understand"  class="mr-2" required>
            <label for="understand" style="display: inline;">I understand that, I can participate in the token distribution event(s) only with the wallet address that was entered in the application form.</label>
            <span class="text-require text-danger">*</span>
        </div>

        <div class="my-2">
            <input type="checkbox" name="use" id="use"  class="mr-2">
            <label for="use" style="display: inline;">Use details from my KYC Application to update my account</label>
        </div>

        <div class="text-right">
            <button class="btn btn-primary" type="submit">{{__('Proceed to Verify')}}</button>            
        </div>

    </div>{{-- .step-fields --}}
</div>