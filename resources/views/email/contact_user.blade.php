@component('mail::message')
<div class="header">
<img src="{{asset('images/logo1.png')}}" alt="" class="logo">
<h1 class="success header">Thank you for getting in touch {{$data['firstName']}}</h1>    
</div>

<p>We will reply your message as soon as possible. Please check your email constantly.</p>

<p>If you didn't send in any message to YouvaTrade Investments. Please ignore this message</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
