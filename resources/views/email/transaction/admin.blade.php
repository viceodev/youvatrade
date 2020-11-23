@component('mail::message')
Dear {{strtoupper($user['name'])}},

Your trading account balance has just been updated by Youvatrade Admin. You can view the transaction in your transactions page with the Specific ref {{$transaction['ref']}}.

@component('mail::panel')
    <h1>Admin Message:</h1>
    <p>{{strtoupper($message)}}</p>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
