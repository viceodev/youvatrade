@component('mail::message')
Dear {{strtoupper($user['name'])}},

Youvatrade thanks you for you patronage and co-operation. We have a little message, view details below;


@component('mail::panel')
    <h1>SUBJECT</h1>
    <p>{{strtoupper($intro)}} </p>
     
@endcomponent

@component('mail::panel')
<h1>MESSAGE</h1>
<p>{{strtoupper($message)}}</p>
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
