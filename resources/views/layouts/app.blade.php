<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title', 'Adpia Publisher Center')</title>

	<!-- Bootstrap -->
	<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
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
    <link rel="manifest" href="/manifest.webmanifest" />
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	{{-- <link rel="stylesheet" href="{{ url("css/academy/styles.css") }}"> --}}
	@yield('academy_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
	<script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/DrawSVGPlugin.js?r=12"></script>
	<script type="text/javascript" src="{{ url("js/particles.js-master/particles.js") }}"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166902618-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-166902618-1');
    </script>
	<style>
		.close__popup {outline: none;border:none;position: absolute;top: 12px;right: 12px;background: none;color:#a7a5a5;font-size:20px; padding: 0 5px;}
		.close__popup:hover{background: none; color:white}
		footer .profile {display: none;}
		@media screen and (max-width: 768px) {
			.img-event {height: 300px !important;}
			footer .profile {display: block;}
			.modal-body p, .modal-body ul,
			.modal-footer p{font-size: 13px;}
			.modal-header h4{font-size:14px !important;}
		}
		.in {background-color: rgba(0, 0, 0, 0.7);}
		.tick__yes {position: absolute;top: -20px;left: 40%;background: #ffffff;font-weight: 600;border-radius:25px;color: red !important;padding: 5px 22px;}
		#notice{overflow: scroll;}
		/*#popup-notifi .modal-dialog{*/
		/*	background: white;*/
		/*	padding: 3px 26px 26px 26px;*/
		/*	border-radius: 14px;*/
		/*}*/
		.step_7_detail{display: none;}
		.step__guide__8_detail{display: none;}
		/*.fb-customerchat iframe{top:75px !important;}*/
		.exist__mail__parent{position: fixed;z-index: 99999;overflow: hidden;margin: auto;top: 0;left: 0;bottom: 0;right: 0;text-shadow: none;background-color: rgba(0,0,0,.42);border: 0;width: 100%;height: 100%;}
		.top_nav .navbar-right {
			width: 60%;
		}
		@media (max-width: 768px) {
			.newpub-extension {
				display: none !important;
			}
		}
		.ex-modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 99999; /* Sit on top */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.ex-modal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			top: 50%;
			transform: translateY(-50%);
			border: 1px solid #888;
			width: 600px;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 1s;
			border-radius: 10px;
			overflow: hidden;
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {top:-300px; opacity:0} 
			to {top:50%; opacity:1}
		}

		@keyframes animatetop {
			from {top:-300px; opacity:0}
			to {top:50%; opacity:1}
		}

		/* The Close Button */
		.ex-close {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.ex-close:hover,
		.ex-close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		.ex-modal-header {
			padding: 2px 16px;
			background-color: #a91720;
			color: white;
			text-align: center;
		}

		.ex-modal-body {padding: 2px 16px;}

		.ex-modal-footer {
			padding: 6px 16px 2px 16px;
			background-color: transparent;
			text-align: center;
		}   
	</style>
	@yield('style')
</head>
@php
	$popup = \App\Http\Helpers\Helper::getPupup();
	$emailNotExist = getAccountEmailNotExist(auth()->user()->contact_mail);
@endphp

<body class="nav-md">
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
@if(!empty($emailNotExist) == true)
<style>
	body{overflow: hidden;}
	.form__mail__show{background-color: white; margin:auto;float: unset !important;padding: 35px; margin-top: 8%; border-radius: 30px}
</style>
<div class="exist__mail__parent">
	@if(!empty(Session::get('status_sent_code')))
	<div class="form__mail__show col-md-5 col-sm-12 col-xs-12 m-auto">
		<p style="font-size: 18px;color: #b90414;">Ch??ng t??i ???? g???i cho b???n m?? x??c nh???n qua email ({{ Session::get('email_active_code') }}). H??y nh???p m?? ch??ng t??i cung c???p ????? x??c th???c:</p>
		<span style="color:red; font-size:12px">
            @if (session('status_code'))
                {{ session('status_code') }}
            @endif
            &nbsp;
        </span>
		<form action="{{ url('/check-code-active') }}" class="form-group" method="post"  accept-charset="UTF-8">
			@csrf()
			<span style="position: relative;">
				<input type="text" placeholder="Nh???p m?? x??c nh???n" name="code" class="form-control">
				<span class="check__code" style="color: red; display: inline-block;float: right; position: absolute;top: 9px;left: -20px;">*</span>
			</span>
			<input type="submit" class="btn btn-success" value="X??c th???c" name="submit__code" style="margin-top: 30px;">
			<a href="{{  action('ActiveMailContactController@reSentCode')}}"	class="btn btn-warning text-right re_sent_code"  style="margin-top: 30px;">G???i l???i m?? <span id="count_sent"></span></a>
			<a href="{{  action('ActiveMailContactController@changeContactMail')}}" class="btn btn-danger"  style="margin-top: 30px;">?????i email</a>
		</form>
	</div>
	@else
	<div class="form__mail__show col-md-5 col-sm-12 col-xs-12 m-auto">
		<p style="font-size: 18px;color: #b90414;">Ch??ng t??i nh???n th???y ?????a ch??? email c???a b???n c?? v???n ?????. B???n h??y c???p nh???t l???i ?????a ch??? email ????? ti???p t???c s??? d???ng d???ch v??? c???a ch??ng t??i:</p>
		<span style="color:red; font-size:12px">
            @if ($errors->has('contact_mail'))
                {{ $errors->first('contact_mail') }}
            @endif
            &nbsp;
        </span>
		<form action="{{ url('/render-code-mail') }}" class="form-group" method="post"  accept-charset="UTF-8">
			@csrf()
			<span style="position: relative;">
				<input type="email" placeholder="Email" name="contact_mail" class="form-control">
				<span class="check__email" style="color: red; display: inline-block;float: right; position: absolute;top: 9px;left: -20px;">*</span>
			</span>
			<input type="submit" class="btn btn-danger" value="X??c th???c" name="submit__contact__mail" style="margin-top: 30px;">
		</form>
	</div>
	@endif
</div>
@endif
<div class="loading" style="display: none"></div>
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col menu_fixed" id="parent__steps">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="{{ url('dashboard') }}" class="site_title">
						<i>
							<img src="{{ asset('images/adpia-icon.png') }}" alt="">
						</i>
						<span>ADPIA.VN</span>
					</a>
				</div>

				<div class="clearfix"></div>
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="{{ auth()->user()->avatar == null? asset('assets/images/user.png') : url(auth()->user()->avatar) }}" alt="{{ auth()->user()->contact_name }}"class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Xin ch??o,</span>
						<h2>{{ auth()->user()->contact_name }}</h2>
					</div>
				</div>
				<br/>
				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>General</h3>
						<ul class="nav side-menu">
							<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
							<li><a><i class="fa fa-edit"></i> Offer <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('offer.index') }}">Danh S??ch Offer</a></li>
									<li><a href="{{ url('offer?offer_category=nation') }}">Global Offer</a></li>
									<li><a href="{{ route('offer.myoffer') }}">Danh S??ch ???? Li??n K???t</a></li>
									<li>
										<a href="{{ url('offer/cpo') }}" onclick="document.getElementById('form-cpo').submit(); return false;">Chi???n d???ch CPO
											<span class="label label-danger pull-right">hot</span>
										</a>
										<form action="{{ env('CPO_AUTH_LINK') }}" id="form-cpo" method="POST">
											<input type="hidden" name="token" value="{{ generateJWT() }}">
										</form>
									</li>
								</ul>
							</li>
							<li  id="step8" class="rm_border">
								<p class="step__guide__8_detail" id="detail_step8"><span style="display: block;">Xem b??o c??o chi ti???t v??? hi???u qu??? c??c chi???n d???ch c???a b???n. </span>  <a class="cancel__step" pre='step8' style="display: inline-block; ">???? hi???u!</a><a  class="next__step" pre='step8' step='step9' style="display: inline-block;color: green;float: right;">Ti???p t???c</a></p>
								<a><i class="fa fa-line-chart"></i> B??o C??o<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('report') }}"> B??o C??o Hi???u Qu???</a></li>
									<li><a href="{{ route('report.detail') }}">B??o C??o Chi Ti???t</a></li>
								</ul>
							</li>
							<li id="step9" class="rm_border">
								<p class="step__guide__8_detail" id="detail_step9"><span style="display: block;">????? g???i y??u c???u thanh to??n hoa h???ng.</span><a class="cancel__step" pre='step9' style="display: inline-block; ">???? hi???u!</a> <a pre='step9' step='step10' class="next__step" style="display: inline-block;color: green;float: right;">Ti???p t???c</a> </p>
								<a><i class="fa fa-usd"></i> Thanh To??n<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('billing.request') }}"> Y??u C???u Thanh To??n</a></li>
									<li><a href="{{ route('billing.history') }}">L???ch S??? Thanh To??n</a></li>
								</ul>
							</li>
							<li>
								<a>
									<i class="fa fa-newspaper-o"></i> Tin T???c
									<span class="fa fa-chevron-down"></span>
								</a>
								<ul class="nav child_menu">
									<li><a href="{{ route('event.index') }}"> Chi???n D???ch M???i</a></li>
									<li><a href="{{ route('board.index') }}">Tin Khuy???n M???i</a></li>
									<li><a href="{{ route('discount.index') }}">M?? Gi???m Gi??</a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-code"></i> Developer<span class="fa fa-chevron-down"></span> <span class="label label-success pull-right">new</span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('api.coupon') }}"> Coupon API</a></li>
									<li><a href="{{ route('api.deeplink') }}"> DeepLink API</a></li>
									<li><a target="_blank" href="https://github.com/technicaladpia/Api_Adpia">Conversions API</a></li>
									<li><a href="{{ route('postback') }}"> PostBack</a></li>
								</ul>
							</li>
							<li id="step10" class="rm_border">
								<p class="step__guide__8_detail" id="detail_step10"><span style="display: block;">C??c tool c???c h???u ??ch cho qu?? tr??nh l??m affiliate marketing. </span>  <a class="cancel__step" pre='step10' style="display: inline-block; ">???? hi???u!</a><a class="next__step" pre='step10' step='step11' style="display: inline-block;color: green;float: right;">Ti???p t???c</a></p>
								<a><i class="fa fa-magic"></i> C??ng c???<span class="fa fa-chevron-down"></span> <span class="label label-success pull-right">new</span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('tool.deeplink') }}"> Adpia DeepLink</a></li>
									<li><a href="{{ url('tool/roll-banner')}}">Rolling Banner</a></li>
									<li><a href="{{ route('tool.smart-carousel') }}">Smart Carousel</a></li>
									{{-- <li><a href="{{ route('banner-product') }}"> Banner product</a></li> --}}
									<li><a href="{{ route('register-minishop') }}"> Minishop</a></li>
								</ul>
							</li>
							<li class="{{ url()->current() == route('banner-event')?"active":""}}">
								<a href="{{ route('banner-event') }}"><i class="fa fa-volume-off" aria-hidden="true"></i>S??? ki???n </a>
							</li>
							<!-- =========================================================================== -->
							<li class=" rm_border {{ url()->current() == route('huong-dan')?"active":""}}" id='step12' style="background-color: #DC143C;">
								<p class="step__guide__8_detail" id="detail_step12"><span style="display: block;">N???u c??n b???t c??? th???c m???c g?? v??? s??? d???ng Newpub, h??y b???m v??o ????y nh??!</span> <a id="done_guide" class="cancel__step" style="display: inline-block; color: green;float: right;">Ho??n th??nh!</a></p>
								<a target="_blank" href="{{ route('academy.index') }}">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i> Academy
								</a>
							</li>
							<!-- =========================================================================== -->
							{{-- <li class=" rm_border {{ url()->current() == route('huong-dan')?"active":""}}" id='step12'>
								<p class="step__guide__8_detail" id="detail_step12" ><span style="display: block;">N???u c??n b???t c??? th???c m???c g?? v??? s??? d???ng Newpub, h??y b???m v??o ????y nh??!</span> <a id="done_guide" class="cancel__step" style="display: inline-block; color: green;float: right;">Ho??n th??nh!</a></p>
								<a href="{{ route('huong-dan') }}"><i class="fa fa-book" aria-hidden="true"></i> H?????ng d???n </a>
							</li> --}}
							@if (getReferral())
								<li><a><i class="fa fa-users"></i> Gi???i thi???u<span class="fa fa-chevron-down"></span> <span class="label label-danger pull-right">hot</span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('referral.getlink') }}">L???y link</a></li>
										<li><a href="{{ route('referral.index') }}">T???ng quan</a></li>
										<li><a href="{{ route('referral.report') }}">B??o c??o</a></li>
									</ul>
								</li>
							@endif
							<li style="background:#1D3C78">
								<a target="_blank" href="https://www.facebook.com/affiliateadpia/">
									<i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook
								</a>
							</li>
							<li style="background:darkgoldenrod;">
								<a href="{{ asset('/') }}">
									<i class="fa fa-desktop" aria-hidden="true"></i> S??? d???ng giao di???n m???i
								</a>
							</li>
						</ul>
					</div>
				</div>
				@php $user = \App\Http\Helpers\Helper::getManagerInfor()->toArray();

				@endphp
				<div class="clearfix"></div>
				<div class="profile rm_border" style="margin-top: -35px; position: relative;" id="step11">
					<p class="step__guide__8_detail" id="detail_step11"><span style="display: block;">Th??ng tin li??n h??? v???i ng?????i qu???n l??, h??? tr??? b???n trong qu?? tr??nh ch???y chi???n d???ch. </span> <a pre='step11' class="cancel__step" style="display: inline-block; ">???? hi???u!</a><a class="next__step" pre='step11' step='step12' style="display: inline-block;color: green; float: right;">Ti???p t???c</a> </p>
					<div><img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="{{$user[0]['contact_name'] }}" class="img-circle profile_img"></div>
					<div style="text-align: center; color: white;">
						<h5>Ng?????i qu???n l??</h5>
						<h5>T??n: {{ $user[0]['contact_name'] }}</h5>
						<h5>Email: {{ $user[0]['email'] }}</h5>
						<h5>Phone: {{ $user[0]['phone'] }}</h5>
						<h5>Skype: {{ $user[0]['skype'] }}</h5>
						<div>
							@if ($user[0]['zalo'] != null)
								<a href="{{ $user[0]['zalo'] }}" target="_blank"><img src="https://brasol.vn/public/ckeditor/uploads/tin-tuc/brasol.vn-logo-zalo-vector-logo-zalo-vector.png" style="width: 25px;" alt=""></a>
							@endif
							@if ($user[0]['messenger'] != null)
								<a href="{{ $user[0]['messenger'] }}" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Facebook_icon_2013.svg/300px-Facebook_icon_2013.svg.png" style="width: 25px;" alt=""></a>
							@endif
						</div>
					</div>
				</div>
				<br/>

			</div>
		</div>

		<!-- top navigation -->
		<div class="top_nav">
			<div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<ul class="nav navbar-nav navbar-left hidden-xs">
						<li style="padding-top: 10px">
							<select name="selected-site" class="form-control select-site" id="select-site" style="max-width: 200px">
								@foreach(App\Http\Helpers\Helper::getListSite() as $site)
									@if($site->delete_flag == 'N')
										<option value="{{ $site->affiliate_id }}" {{ auth()->user()->last_contact_affiliate_id == $site->affiliate_id ? 'selected' : '' }}>
											{{ $site->site_name }}
										</option>
									@endif
								@endforeach
							</select>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="" style="position: relative; background-color: #ededed" id='step7'>
							<p class="step_7_detail" id="detail__step7"><span style="display: block;">Qu???n l?? v?? thay ?????i th??ng tin t??i kho???n c???a b???n. </span> <a class="cancel__step" pre='step7' style="display: inline-block; ">???? hi???u!</a><a pre='step7' step='step8' style="display: inline-block;color: green;">Ti???p t???c</a> </p>
							<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<img src="{{ auth()->user()->avatar == null? asset('assets/images/user.png') : url(auth()->user()->avatar) }}" alt=""> <span class="text-capitalize">{{ auth()->user()->contact_name }}</span>
								<span class=" fa fa-angle-down"></span>
							</a>
							<ul class="dropdown-menu dropdown-usermenu pull-right">
								<li><a href="{{ route('user.index') }}"> Profile</a></li>
								<li>
									<a href="{{ route('user.index') }}">
										<span>Settings</span>
									</a>
								</li>
								<li><a href="javascript:;">Help</a></li>
								<li>
									<a href="{{route('auth.logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
									<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
								</li>
							</ul>
						</li>
						<li role="presentation">
							<a href="{{ route('mail.index') }}" class="dropdown-toggle info-number">
								<i class="fa fa-bell-o"></i>
								<span class="badge bg-green">
                                    {{ \App\Http\Helpers\MailHelper::getUnreadMail(auth()->id()) }}
                                </span>
							</a>
						</li>
						<li role="presentation" class="newpub-extension">
							<a onclick="showPopupExtension()" style="cursor: pointer;">
								<div style="background-color: #ffffff; border-radius: 20px; padding: 0 5px;">
									<img src="https://ac.adpia.vn/upload/images/newpub-generate-icon.png" alt="" style="width: 22px;">
									<span>Newpub Generate Link</span>
								</div>
							</a>
						</li> 
					</ul>
				</nav>
			</div>
		</div>
		<!-- /top navigation -->
		<!-- page content -->

		@yield('content')
		<!-- /page content -->
		<!-- footer content -->
		<footer>
			<div class="profile " style="margin-top: -35px; ">
				<div style="margin-left: 67px">
					<img style="width: 50%" src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="{{$user[0]['contact_name'] }}" class="img-circle profile_img">
				</div>
				<div style="text-align: center; color: #73879c;">
					<h5>Ng?????i qu???n l??</h5>
					<h5>T??n: {{ $user[0]['contact_name']}}</h5>
					<h5>Email: {{ $user[0]['email']}}</h5>
					<h5>Phone: {{ $user[0]['phone']}}</h5>
					<h5>Skype: {{ $user[0]['skype']}}</h5>
				</div>
			</div>
			<div class="pull-right">
				C??ng ty c??? ph???n ADPIA - Copy right by adpia ?? 2019 <a href="https://adpia.vn">adpia.vn</a>
			</div>
			<div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
	</div>
</div>

<!--<div class="modal fade" id="notice" style="padding-top: 18px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-red" style="padding: 3px !important; border-radius:5px 5px 0 0">
				<h4 class=" text-center" style="color: #ffea00; font-size: 16px;">CH??NH S??CH X??? PH???T ?????I V???I C??C
					H??NH VI GIAN L???N</h4>
			</div>
			<div class="modal-body">
				<p class="text-center">Nh???m m???c ????ch x??y d???ng c???ng ?????ng Affiliate trong s???ch, b???n v???ng, trong th???i gian t???i Adpia s???
					tri???n khai c??c ch??? t??i x??? ph???t m???nh tay ?????i v???i c??c
					<span class="text-danger" style="font-weight:600 ;">H??NH VI GIAN L???N.</span>
					V?? quy???n l???i c???a c??c Publisher v?? c???ng ?????ng Affiliate, y??u c???u c??c b???n tu??n th??? c??c quy ?????nh sau:</p>
				<ul style="color:red">
					<li>
						<p style="color:black; font-weight: 600;">Cung c???p th??ng tin trung th???c, ch??nh x??c (th??ng tin c?? nh??n, ngu???n traffic,???)
						</p>
					</li>
					<li> <p style="color:black; font-weight: 600;">Tu??n th??? c??c ch??nh s??ch c???a Merchant v??? vi???c ch???y
						qu???ng c??o (xem chi ti???t trong ph???n th??ng
							tin chi???n d???ch)</p></li>
					<li>
						<p style="color:black; font-weight: 600;">Nghi??m c???m c??c h??nh vi gian l???n trong vi???c qu???ng
							b??, gian l???n ????n h??ng ho???c c??c h??nh th???c gian l???n kh??c.</p>
					</li>
				</ul>
			</div>
			<div class="modal-header bg-red" style="padding: 3px !important;">
				<h4 class=" text-center" style="color: #ffea00; font-size: 16px;">C??C PUBLISHER VI PH???M S??? B??? X??? PH???T
					NH?? SAU:</h4>
			</div>
			<div class="modal-body">
				<ul style="color:red">
					<li>
						<p style="color:black; font-weight: 600;">T???t c??? c??c tr?????ng h???p gian l???n ho???c nghi ng??? gian l???n s??? b???
							ng??ng quy???n ch???y chi???n d???ch ngay l???p t???c, Account Manager s??? li??n h??? ????? th??ng b??o v?? x??c minh h??nh
							vi vi ph???m.</p>
					</li>
					<li>
						<p style="color:black; font-weight: 600;">C??n c??? v??o m???c ????? vi ph???m, Adpia s??? h???y m???i hoa h???ng ph??t sinh tr?????c ???? c???a Publisher
							ho???c kh??a t??i kho???n v??nh vi???n.</p>
					</li>
				</ul>
				<p class="text-center">Adpia r???t mong nh???n ???????c s??? ph???i h???p v?? h???p t??c t??? Publisher nh???m m???c ????ch chung
					l?? ph??t
					tri???n m???ng l?????i Affiliate trong s???ch, b???n v???ng.</p>
			</div>
			<div class="modal-footer " style="background:#a1a1a1; border-radius:0 0 5px 5px; position: relative; ">
				<button class="btn tick__yes"  data-dismiss="modal"><i class="fa fa-check" aria-hidden="true"></i> T??I ?????NG ??</button>
				<p style="color:white; text-align: center; font-style: italic; margin-bottom: 0px !important">????? ???????c duy???t chi???n d???ch, b???n c???n tu??n th??? ch??nh
					s??ch ch???ng gian l???n c???a ch??ng t??i.</p>
				<p style="color:white;margin-bottom: 0px !important; text-align: center; font-style: italic;"> Xin c???m ??n!</p>
			</div>
		</div>
	</div>
</div> -->

@if(isset($popup[0]->link) && isset($popup[0]->image))
	<div class="modal fade" id="popup-notifi" style="padding-top: 50px   ">
		<div class="modal-dialog">
			<a href="#" target="_blank" id="popup-link">
				<img src="" id="img-popup" alt="" class="img-responsive">
			</a>
			<!--<div class="model-content">
				<div class="modal-header">
					<img src="https://adpia.vn/images/logo-1.png" alt="">
					<button type="button" class="close__popup btn btn-default" data-dismiss="modal">X</button>
				</div>
				<h4>Dear Affiliate,</h4>-->
				<!-- /.model-header -->
				<!--<div class="modal-body">
					<p>Do v???n ????? v??? k??? thu???t t??? ph??a Shopee, to??n b??? ????n
						h??ng ph??t sinh c???a Merchant n??y trong th??ng 9 v???n
						ch??a ???????c ?????i so??t.  ADPIA r???t l???y l??m ti???c ph???i
						th??ng b??o v??? s??? ch???m tr??? thanh to??n hoa h???ng Shopee
						cho c??c ????n h??ng ph??t sinh trong kho???ng th???i gian
						n??u tr??n. </p>
					<p>ADPIA ??ang n??? l???c l??m vi???c v???i ph??a Shopee ????? c???
						g???ng ho??n th??nh vi???c ?????i so??t trong th???i gian
						s???m nh???t c?? th???. R???t mong nh???n ???????c s??? c???m th??ng
						chia s??? t??? c??c b???n.</p>
					<p>Cu???i th??ng 11 v?? trong th??ng 12 t???i s??? li??n t???c c??
						c??c chi???n d???ch gi???m gi?? s??u v?? t??? l??? chuy???n ?????i t???t
						t??? ph??a c??c Merchant (Shopee, Lazada, FPTshop???) C??c
						Affiliate h??y th?????ng xuy??n c???p nh???t th??ng tin t???
						ADPIA v?? t???p trung qu???ng c??o th???t t???t nh?? ????? gia
						t??ng thu nh???p cu???i n??m nh??.</p>
				</div>
				<div class="model-footer">
					Thanks !
				</div>-->
				<!-- /.model-footer -->
				<!-- /.modal-body -->
			<!--</div>-->
			<button type="button" class="close__popup btn btn-default" data-dismiss="modal">X</button>
			<!-- /.model-content -->
		</div>
	</div>
@endif
	<!-- /.modal-dialog -->
     <div class="modal fade" id="create-link" style="padding-top: 50px   ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">T???o link nhanh</h4>
                </div>
                <form action="" method="post" role="form" id="create_link_form">
                    <div class="modal-body">
                        <span class="help-block green">*(H?????ng d???n: Truy c???p website nh?? cung c???p, t??m s???n ph???m ho???c danh m???c s???n ph???m b???n mu???n t???o link v?? copy link s???n ph???m ????)</span>
                        <div class="form-group">
                            <label for="product_link">Link S???n ph???m, danh m???c</label>
                            <input type="url" class="form-control" name="product_link" id="product_link" required placeholder="https://shopee.vn/M%C3%8C-T%C3%94M-TR%E1%BA%BA-EM-AN-B%C3%8CNH-(1-b%E1%BB%8Bch-50-g%C3%B3i)-i.66204356.1622524494">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="shortlink" id="shortlink" value="true"> <label for="shortlink">R??tsz g???n link</label>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="input-group box-result" style="display: none">
                            <input type="url" id="ip_result_link" readonly class="form-control">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-success" onclick="copyToClipboard($('#create_link_form #ip_result_link').val())">Copy</button>
                          </span>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">R??t g???n</button>
                </div>
            </form>
        </div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="fb-root"></div>
<div class="fb-customerchat" attribution=setup_tool page_id="317623908403313"logged_in_greeting="Ch??o b???n, B???n c???n h??? tr??? g???" logged_out_greeting="Ch??o b???n, B???n c???n h??? tr??? g???"></div>
@if($_SERVER['REQUEST_URI'] == "/academy")
<div class="loading-page-icon">
	<img src="uploads/academy/page_loading.gif" alt="" style="max-width: 100%; align-self: center; margin: auto;">
</div>
@endif
@if($_SERVER['REQUEST_URI'] == "/academy")
<div id="modal-video-box" class="adpia_academy modal-video">
	<div class="modal-video-content">
		<span class="close-modal-video">&times;</span>
		<iframe width="1519" height="554" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</div>
@endif
@if($_SERVER['REQUEST_URI'] == "/academy")
<div class="ios-error-mess" style="position: fixed;
		left: 0;
		top: 50%;
		transform: translateY(-50%);
		height: 100%;
		z-index: 9998;
		width: 100%;
		text-align: center;
		display: none;">
	<div style="width: 100%;margin: auto;padding: 0 20px;">
		<h2 style="color: #f00; font-size: 30px; text-align: justify;">Giao di???n Academy t???m th???i ch??a h??? h??? ??i???u h??nh IOS, h??? th???ng s??? c???p nh???t trong th???i gian s???m nh???t. Ch??ng t??i xin l???i v??? s??? b???t ti???n n??y!</h2>
	</div>
</div>
@endif
<!-- The Modal -->
<div id="exModal" class="ex-modal">

  <!-- Modal content -->
  <div class="ex-modal-content">
    <div class="ex-modal-header">
      <span class="ex-close" onclick="closeExPopup()">&times;</span>
      <h2>H?????NG D???N C??I TI???N ??CH T???O LINK AFFILIATE NHANH</h2>
    </div>
    <div class="ex-modal-body">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/F8eVFxBH4HA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="ex-modal-footer">
      <a href="https://adpia.vn/info/adpia-newpub-extension.zip" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
      <a class="btn btn-warning" onclick="closeExPopup()">Cancel</a>
    </div>
  </div>

</div>

<script src="{{ asset('js/bundle.js') }}"></script>
<link rel="manifest" href="/manifest.json"/>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script async src="https://unpkg.com/pwacompat" crossorigin="anonymous"></script>
    <script type="module">
        // detect iOS Safari
        if (('standalone' in navigator) && (!navigator.standalone)) {
            import('https://unpkg.com/pwacompat');
        }
    </script>
<!-- Load Facebook SDK for JavaScript -->

      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>

      <!-- Your customer chat code -->

<script>
	$(document).ready(function () {
		$.ajax({
			url: '{{ route('user.checkpoint') }}',
			method: 'POST',
			data: {_token: '{{ csrf_token() }}'},
			success: function (data) {
				if (data.status == 403) {
					toastr.warning('B???n c???n ??i???n ?????y ????? th??ng tin t??i kho???n <a href="{{ route('user.index') }}">C???p nh???t ngay</a>');
				}
			}
		});
	});

	var baseUrl = '{{ url('dashboard') }}';

	@if(\Session::has('error'))
	toastr.error('{{ \Session::get('error') }}');
	@endif
	@if(\Session::has('success'))
	toastr.success('{{ \Session::get('success') }}');
	@endif

	if (typeof adsense === "undefined") {
		toastr.warning('Vui l??ng t???t adblock ????? c?? th??? s??? d???ng ???????c t???t c??? c??c ch???c n??ng!');
	}

	$('#create_link_form').submit(function (e) {
		showLoading();
		var value = $('#create_link_form #product_link').val();
		var shortLink = $('#create_link_form #shortlink').prop('checked');

		if (!value) {
			toastr.error("M???i nh???p link s???n ph???m");
			e.preventDefault();
		}

		if (!value.match(/(http:\/\/|https:\/\/)/g)) {
			toastr.error("M???i nh???p ????ng ?????nh d???ng URL");
			e.preventDefault();
		}

		var origin = 'https://adpia.vn/api/v1/deeplink?aff={{ App\Http\Helpers\Helper::getCurrentAff() }}&url=' + encodeURIComponent(value);

		if (shortLink) {
			$.ajax({
				url: '{{ route('shortlink') }}',
				method: 'POST',
				data: {_token: '{{ csrf_token() }}', url: origin},
				success: function (data) {
					if (data && data.status === 200) {
						$('.box-result').show();
						$('#ip_result_link').val(data.data);
						toastr.success("T???o link th??nh c??ng!");
					}
					hideLoading();
					return false;
				},
				error: function (e) {
					if (e.status === 501) {
						toastr.error('Link n??y kh??ng thu???c tr??n h??? th???ng c???a ch??ng t??i!');
						hideLoading();
						return false;
					}

					toastr.error('C?? l???i x???y ra, xin vui l??ng th??? l???i sau!');
					hideLoading();
					return false;
				}
			});
		} else {
			$('.box-result').show();
			$('#ip_result_link').val(origin);
			toastr.success("T???o link th??nh c??ng!");
			hideLoading();
		}


		e.preventDefault();
	});

	function shortLink(url) {
		showLoading();
		$.ajax({
			url: '{{ route('shortlink') }}',
			method: 'POST',
			data: {_token: '{{ csrf_token() }}', url: url},
			success: function (data) {
				if (data && data.status === 200) {
					$('#short-result').val(data.data);
					toastr.success("T???o th??nh c??ng shortlink");
				} else {
					toastr.error("C?? l???i x???y ra, xin vui l??ng th??? l???i sau!");
				}

				hideLoading();
			},
			error: function (e) {
				if (e.status === 501) {
					toastr.error('Link n??y kh??ng thu???c tr??n h??? th???ng c???a ch??ng t??i!');
					hideLoading();

					return;
				}

				toastr.error('C?? l???i x???y ra, xin vui l??ng th??? l???i sau!');
				hideLoading();

				return;
			}
		})
	}

	@if(isset($popup[0]->link) && isset($popup[0]->image))
		var popups = [
				[
					'{{ $popup[0]->link}}',
					'{{ $popup[0]->image}}',
				],
			];
		var active = Math.floor(Math.random() * popups.length);
		$('#img-popup').attr('src', popups[active][1]);
		$('#popup-link').attr('href', popups[active][0]);

		// $('#popup-notifi').modal('show');
	@endif
	// start model
	var cookie = document.cookie;
	var curDate = (new Date()).getDate();

	$('#popup-notifi').on('hidden.bs.modal', function () {
		document.cookie = 'modalshow' + curDate + '=false; expires=Thu, 20 Jan 2029 00:00:00 UTC; path=/;';
	});

	var re = new RegExp('modalshow' + curDate + '=false', "g");

	if (!document.cookie.match(re)) {
		$('#popup-notifi').modal('show');
	}
	var cookie = document.cookie;
	var curDate = (new Date()).getDate();

	$('#notice').on('hidden.bs.modal', function () {
		document.cookie = 'modalshow' + curDate + '=false; expires=Thu, 20 Jan 2029 00:00:00 UTC; path=/;';
	});

	//end model
	$(".close__popup, #popup-notifi").click(function() {
		// start popup notice
		if(!document.cookie.match("agree_modal")) {
			$('#notice').modal('show');
		}
	})
	$('.tick__yes').click(() => {
		document.cookie = 'agree_modal = true;expires=Thu, 20 Jan 2029 00:00:00 UTC; path=/;';
	});

	$("input[name='submit__contact__mail']").attr("disabled", true);
	$( "input[name='contact_mail']").keyup(function() {
		value = $(this).val();
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		$(this).css({'border':'1px solid red'});
		if( value.length > 5 && regex.test(value) == true ){
		    $( "input[name='contact_mail']").css({'border':'1px solid green'});
		    $('.form__mail__show span.check__email').html('<i style="color: green" class="fa fa-check" aria-hidden="true"></i>')
		    $("input[name='submit__contact__mail']").removeAttr("disabled");
		}else {
		    $('.form__mail__show span.check__email').html('<i class="fa fa-times" aria-hidden="true"></i>')
		    $("input[name='submit__contact__mail']").attr("disabled", true);
		}
	})

	$("input[name='submit__code']").attr("disabled", true);
	$("input[name='code']").keyup(function() {
		vl = $(this).val();
		console.log(vl)
		$(this).css({'border':'1px solid red'});

		if(vl.length == 6){
			$( "input[name='code']").css({'border':'1px solid green'});
		    $('.form__mail__show span.check__code').html('<i style="color: green" class="fa fa-check" aria-hidden="true"></i>')
		    $("input[name='submit__code']").removeAttr("disabled");
		}else {
			$('.form__mail__show span.check__code').html('<i class="fa fa-times" aria-hidden="true"></i>')
		    $("input[name='submit__code']").attr("disabled", true);
		}
	})

	$('.re_sent_code').attr("disabled", true);
	var time = 60;
	function explode(){
	  	time--;
	  	if(time <= 0) {
	  		$('#count_sent').text('');
	  		clearInterval(tm);
	  		$('.re_sent_code').removeAttr("disabled");
	  	}else {
	  		$('#count_sent').text('('+time+')');
	  	}
	}
	tm = setInterval(explode, 1000);
	
	function showPopupExtension() {
		var modal = document.getElementById("exModal");
		var span = document.getElementsByClassName("ex-close")[0];
		modal.style.display = "block";
	}
	function closeExPopup() {
		var modal = document.getElementById("exModal");
		modal.style.display = "none";
	}
</script>
@yield('script')
</body>
</html>
