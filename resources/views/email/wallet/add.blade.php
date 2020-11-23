@component('mail::message')
Dear {{strtoupper(auth()->user()->name)}},

You have successfully added a wallet address to your list of wallets on your dashboard. <br>

Wallet Type: {{strtoupper($wallet['wallet_type'])}} <br>
Wallet Address: {{$wallet['wallet_address']}} <br>

@component('mail::button', ['url' => route('wallets.index')])
SEE ALL WALLETS
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('wallets.index')}}">{{route('wallets.index')}}</a>

If you did not make this action, your account might have been compromised. Please change your password in your dashboard next time you login.

If you are not logged in, You can change your password by clicking the button below.

@component('mail::button', ['url' => route('password.request')])
CHANGE PASSWORD
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('password.request')}}">{{route('password.request')}}</a>

You can also contact our 24/7 customer service via <br><a href="mailto:support@youvatrade.com">Support@youvatrade.com</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
