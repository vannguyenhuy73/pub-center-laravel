<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng kí tài khoản Adpia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('assets/config_register/bootstrap.min.css')}}">   <!-- link boostrap css -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('favicon/manifest.json') }}?{{ config('const.asset.version') }}">
	<link rel="stylesheet" href="{{asset('assets/config_register/dangki.css')}}">    <!-- link css -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- Global site tag (gtag.js) - Google Ads: 961847409 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-961847409"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'AW-961847409');
	</script>
	<!-- Event snippet for NewPublisher conversion page -->
	<script>
		gtag('event', 'conversion', {'send_to': 'AW-961847409/C6C_CL_N-LkBEPHA0soD'});
	</script>
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '407474910089854');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=407474910089854&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
</head>
<body>
<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}
	input[type=number] {
		-moz-appearance:textfield;
		}
	.suggest-email-domain {
		box-shadow: 0 2px 4px 0 rgb(0 0 0 / 16%), 0 2px 8px 0 rgb(0 0 0 / 12%);
		position: absolute;
		left: 0;
		width: 100%;
		border-radius: 5px;
		top: calc(100% + 5px);
		z-index: 9;
		background: #ffffff;
	}
	.suggest-email-domain div {
		padding: 10px;
		cursor: pointer;
	}
	.suggest-email-domain .selected, 
	.suggest-email-domain div:hover {
		background: #ebebeb;
	}
</style>
<div class="big-background">
	<div class="container">
		<img src="{{asset('assets/config_register/img/logo-adpia.png')}}" alt="" class="img-logo_adpia">
		<img src="{{asset('assets/config_register/img/text-logo.png')}}" alt="" class="img-text-logo">
		<div class="center-frames">
			@yield('content')
		</div>  <!-- end center-frames -->
	</div>  <!-- end container -->
</div>  <!-- end showPC -->

<script src="{{asset('assets/config_register/jquery.3.3.1.min.js')}}"></script>   <!-- link jquery js -->
<script src="{{asset('assets/config_register/bootstrap.min.js')}}"></script>  <!-- link boostrap js -->
<script src="{{asset('assets/config_register/all.js')}}"></script>  <!-- link boostrap js -->
<script src="{{asset('js/toastr.min.js')}}"></script>  <!-- link boostrap js -->
<script>
	toastr.options = {
		"debug": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"fadeIn": 300,
		"fadeOut": 1000,
		"timeOut": 5000,
		"extendedTimeOut": 1000
	};
</script>
@yield('script')
</body>
</html>