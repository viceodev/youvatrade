@component('mail::message')
<div class="header">SUBJECT: {{strtoupper($intro)}}</div>

@component('mail::panel')
    <h1>Admin Message:</h1>
    <p>{{strtoupper($message)}}</p>
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
