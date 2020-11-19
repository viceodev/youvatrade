@component('mail::message')

<div class="header">
    <img src="{{asset('images/logo.png')}}" alt="Youvatrade Logo" class="logo">
    <h1 class="panel header" style="text-transform: uppercase;">WELCOME TO THE WORLD OF DIGITAL ASSETS {{$data['name']}}</h1>
</div>


<div class="inner-body">
    YouvaTrade is a renowned international investment company which was incorporated on the 22 of July 2010, located at 150 Minories, Tower, London EC3N 1LS, United Kingdom, United Kingdom with Company Number: 17833900 With our digital investment platform, you invest and enjoy a very flexible ROI never offered elsewhere. We have differentiated strategy to create sustainable value for stakeholders. We actively trade and manage your investment with the aim to generate better-than-market returns. Our group is active in both providing flexible financing to other investors as well as acquiring mid-size private companies.<br><br> We offer a variety of flexible plan, click the button below to choose a plan and be on your way to acquiring digital assets   
</div>


@component('mail::button', ['url' => ''])
Choose a Plan
@endcomponent

<div class="subcopy">
    <p>
       If you are having issues clicking the button above. Please copy the link below and paste in your browser to choose a plan if you haven't. <br> 
    </p>
</div>



<div class="footer">
Thanks,<br>
{{ config('app.name') }}    
</div>

@endcomponent
