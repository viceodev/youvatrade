<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashboard/images/favicon.png')}}">
<title>Youvatrade Investments</title>

<link href="{{asset('./dashboard/css/style.css')}}" rel="stylesheet">
<link href="{{asset('./dashboard/css/custom.css')}}" rel="stylesheet">

</head>
<body class="header-fix fix-sidebar ">
    @include('layouts.message')

<div id="main-wrapper">

<div class="header header-custom">
<nav class="navbar top-navbar navbar-expand-md">

<div class="navbar-header">
    <a class="navbar-brand" href="{{route('user.dashboard')}}">
    
    <b><img src="{{asset('./dashboard/images/favicon.png')}}" alt="homepage" class="dark-logo" style="max-width: 80px;"></b>
    
    
    <span><img src="{{asset('./dashboard/images/logo-text.png')}}" alt="homepage" class="dark-logo" style="width: 50%;"></span>
    </a>
</div>

<div class="navbar-collapse">

<ul class="navbar-nav mr-auto mt-md-0">

<li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
<li class="nav-item m-l-10"> <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

</ul>

<ul class="navbar-nav my-lg-0">


    
<li class="nav-item dropdown mega-menu"> <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-wallet m-r-5"></i> Balance: $
    @if(auth()->user()->balance == null)
        0
    @else
        {{auth()->user()->balance}}</a>
    @endif
</a></li>
    

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-shopping-cart"></i>
@if(session()->get('cart'))
<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
@endif
</a>
<div class="dropdown-menu dropdown-menu-right mailbox animated slideInRight">
<ul>
<li>
<div class="drop-title">Notifications</div>
</li>
<li>
<div class="header-notify">
    @if(session()->get('cart'))
        <a href="{{route('user.checkout')}}" class="bg-light">
        <i class="cc BTC m-r-10 f-s-40" title="BTC"></i>
        <div class="notification-content">
            <h5 class="text-uppercase">{{session()->get('cart')['plan_name']}}</h5> <span class="mail-desc">${{session()->get('cart')['amount']}}</span>
        </div>
        </a>

    @else
        <div class="notification-content lead text-danger text-center">
            <span><i class="fa fa-info-circle mx-1"></i></span> Opps,Nothing to show!
        </div>
    @endif
</div>
</li>
<li>
<a class="nav-link text-center" href="javascript:void(0);"> Check all notifications <i class="fa fa-angle-right"></i> </a>
</li>
</ul>
</div>
</li>




<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
<div class="dropdown-menu dropdown-menu-right animated slideInRight">
<ul class="dropdown-user">
<li role="separator" class="divider"></li>
<li><a href="{{route('user.settings')}}"> Profile</a></li>
<li role="separator" class="divider"></li>
<li  id="logout"><a href="#"> Logout</a></li>
</ul>
</div>
</li>
</ul>
</div>
</nav>
</div>


<div class="left-sidebar">

<div class="scroll-sidebar">

<nav class="sidebar-nav">
<ul id="sidebar-menu">
<li class="nav-devider"></li>
<li class="nav-label">User Dashboard</li>
<li class="nav-desc">
    
</li>

<li class="li-custom"> <a class="" href="{{route('user.dashboard')}}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a></li>

<li class="li-custom"> <a class="has-arrow" href="#" aria-expanded="false"><i class="ti ti-wallet"></i><span class="hide-menu">Funds</span></a>
    <ul aria-expanded="false" class="collapse">
        <li> <a class="" href="{{route('user.withdraw')}}"><span class="hide-menu">Withdraw</span></a></li>

        <li> <a class="" href="{{route('user.deposit')}}"><span class="hide-menu">Deposit</span></a></li>

        <li> <a class="" href="{{route('wallets.index')}}"><span class="hide-menu">Wallet</span></a></li>

        <li> <a class="" href="{{route('user.payments')}}" ><span class="hide-menu">Transactions</span></a></li>
    </ul>
</li>

<li class="li-custom"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-pie-chart"></i><span class="hide-menu">Investment</span></a>
    <ul aria-expanded="false" class="collapse">
        <li> <a class="" href="{{route('user.plans')}}"><span class="hide-menu">Invest Now</span></a></li>

        <li> <a class="" href="{{route('user.investments')}}" ><span class="hide-menu">History</span></a></li>
    </ul>
</li>

<li class="li-custom"> <a class="" href="{{route('user.referrals')}}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Referrals</span></a></li>

<li class="li-custom"> <a class="" href="{{route('user.kyc.new')}}"><i class="ti ti-files"></i><span class="hide-menu">KYC Application</span></a></li>


<li class="li-custom"> <a class="" href="{{route('user.settings')}}"><i class="ti ti-user"></i><span class="hide-menu">Profile</span></a></li>

<li class="li-custom" id="logout"> <a class="" href="#"><i class="fa fa-power-off"></i><span class="hide-menu">Logout</span></a></li>

{{ csrf_field() }}

<script>

    let logout =  function(){
        let xhr =  new XMLHttpRequest();
        let param = "_token={{csrf_token()}}";
        let url = `{{route('logout')}}`;
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload =  function(){
            location.reload();
        }
        xhr.send(param);
        
    }

    let logs = document.querySelectorAll('li#logout');
    logs.forEach(log => {
        log.addEventListener('click', logout);
    });
</script>

</ul>
</nav>

</div>

</div>


