@component('mail::message')
Dear {{$user['name']}},

You have successfully logged into your trading account. If you think it wasn't from you, kindly change your password in your dashboard when you login next.

If you are not logged into your account, you can change your password by clicking the button below.


@component('mail::button', ['url' => route('password.request')])
Change Password
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('password.request')}}">{{route('password.request')}}</a>

You can also contact our 24/7 customer service via <br><a href="mailto:support@youvatrade.com">Support@youvatrade.com</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
