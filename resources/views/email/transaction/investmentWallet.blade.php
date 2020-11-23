@component('mail::message')
Dear {{strtoupper(auth()->user()->name)}},

An Investment request with the Reference Number {{$transaction['ref']}} has just been made on your trading account. The investment plan charges of ${{$transaction['amount']}} was deducted from your account balance. <br>


@component('mail::button', ['url' => route('user.investments')])
SEE ALL TRANSACTION
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('user.investments')}}">{{route('user.investments')}}</a>

If you did not make this request, your account might have been compromised. Please change your password in your dashboard next time you login.

If you are not logged in, You can change your password by clicking the button below.

@component('mail::button', ['url' => route('password.request')])
Change Password
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('password.request')}}">{{route('password.request')}}</a>

You can also contact our 24/7 customer service via <br><a href="mailto:support@youvatrade.com">Support@youvatrade.com</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
