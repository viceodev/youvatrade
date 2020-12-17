@component('mail::message')
This is a withdrawal Notice!

A user with the following details; <br>
User Name: {{$user['name']}} <br>
User Email: {{$user['email']}} <br>
User Type: {{$user['role']}} <br>




Just made a withdrawal request worth ${{$transaction['amount']}} with the Reference Number {{$transaction['ref']}}

@component('mail::button', ['url' => route('transaction.index')])
VIEW ALL TRANSACTION
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
