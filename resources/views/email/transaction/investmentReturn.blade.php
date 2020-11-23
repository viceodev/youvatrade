@component('mail::message')
<h2>Hurray! Your account has been credited</h2>

<p>Your account has successfully been credited with ${{$transaction['amount']}} as regards to your investment. You can always withdraw your balance at any time.</p>



@component('mail::button', ['url' => route('user.investments'), 'color' => 'success'])
SEE INVESTMENT HISTORY
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('user.investments')}}">{{route('user.investments')}}</a>

<p>Your token has expired, you can invest again to get more returns.</p>

@component('mail::button', ['url' => route('user.investments')])
SEE PLANS
@endcomponent

If the button above does not work, here is the link <br><a href="{{route('user.investments')}}">{{route('user.investments')}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
