<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Auth Page- YouvaTrade Investments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="//code.jivosite.com/widget/7CDRbLoqaE" async></script><!--jivo-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{asset('./css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('./css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('./css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
	<link rel="stylesheet" href="{{asset('./css/skins/orange.css')}}">
	
	<!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="orange" href="{{asset('./css/skins/orange.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="{{asset('./css/skins/green.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="blue" href="{{asset('./css/skins/blue.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./css/styleswitcher.css')}}" />

    <!-- Template JS Files -->
    <script src="{{asset('./js/modernizr.js')}}"></script>
   

</head>

<body class="auth-page">

	<!-- Live Style Switcher Starts - demo only -->
    <div id="switcher" class="">
        <div class="content-switcher">
            <h4>STYLE SWITCHER</h4>
            <ul>
                <li>
                    <a id="orange-css" href="#" title="orange" class="color"><img src="{{asset('images/styleswitcher/colors/orange.png')}}" alt="" width="30" height="30" /></a>
                </li>
                <li>
                    <a id="green-css" href="#" title="green" class="color"><img src="{{asset('images/styleswitcher/colors/green.png')}}" alt="" width="30" height="30" /></a>
                </li>
                <li>
                    <a id="blue-css" href="#" title="blue" class="color"><img src="{{asset('images/styleswitcher/colors/blue.png')}}" alt="" width="30" height="30" /></a>
                </li>
            </ul>

            <p>BODY SKIN</p>
			
			<label><input class="dark_switch" type="radio" name="color_style" id="is_dark" value="dark" checked="checked" /> Dark</label>
            <label><input class="dark_switch" type="radio" name="color_style" id="is_light" value="light" /> Light</label>

            <hr />

            <p>LAYOUT STYLE</p>
            <label><input class="boxed_switch" type="radio" name="layout_style" id="is_wide" value="wide" checked="checked" /> Wide</label>
            <label><input class="boxed_switch" type="radio" name="layout_style" id="is_boxed" value="boxed" /> Boxed</label>

            <hr />
            <div id="hideSwitcher">&times;</div>

        </div>
    </div>
    <div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="/">
					<img id="logo-user" class="img-responsive" src="{{asset('images/logo.png')}}" alt="logo">
				</a>
                <!-- Logo Ends -->

                

                @yield('content')



	<!-- Copyright Text Starts -->
    <p class="text-center copyright-text"><a href="/">&copy; 2020 Youva Trade</a></p>
    <!-- Copyright Text Ends -->
</div>
</div>
@include('layouts.message')
<!-- Template JS Files -->
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{-- <script src="{{asset('js/select2.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/custom.js')}}"></script> --}}

<!-- Live Style Switcher JS File - only demo -->
{{-- <script src="{{asset('js/styleswitcher.js')}}"></script> --}}

</div>
<!-- Wrapper Ends -->
</body>

</html>