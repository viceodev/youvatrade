@component('mail::message')
<h1 class="header success">New Contact Us Form Submit Alert</h1>

<p>User First Name: {{$data['firstName']}}</p>
<p>User Last Name: {{$data['lastName']}}</p>
<p>User Email: {{$data['email']}}</p>
<p>Subject : {{$data['subject']}}</p><br><br>

@component('mail::panel')
<p>Message:<br>{{$data['message']}}</p><br>    
@endcomponent


<p>Submission-date: {{$data['created_at']}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent


