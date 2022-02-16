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
		<p style="font-size: 18px;color: #b90414;">Chúng tôi đã gửi cho bạn mã xác nhận qua email ({{ Session::get('email_active_code') }}). Hãy nhập mã chúng tôi cung cấp để xác thực:</p>
		<span style="color:red; font-size:12px">
            @if (session('status_code'))
                {{ session('status_code') }}
            @endif
            &nbsp;
        </span>
		<form action="{{ url('/check-code-active') }}" class="form-group" method="post"  accept-charset="UTF-8">
			@csrf()
			<span style="position: relative;">
				<input type="text" placeholder="Nhập mã xác nhận" name="code" class="form-control">
				<span class="check__code" style="color: red; display: inline-block;float: right; position: absolute;top: 9px;left: -20px;">*</span>
			</span>
			<input type="submit" class="btn btn-success" value="Xác thực" name="submit__code" style="margin-top: 30px;">
			<a href="{{  action('ActiveMailContactController@reSentCode')}}"	class="btn btn-warning text-right re_sent_code"  style="margin-top: 30px;">Gửi lại mã <span id="count_sent"></span></a>
			<a href="{{  action('ActiveMailContactController@changeContactMail')}}" class="btn btn-danger"  style="margin-top: 30px;">Đổi email</a>
		</form>
	</div>
	@else
	<div class="form__mail__show col-md-5 col-sm-12 col-xs-12 m-auto">
		<p style="font-size: 18px;color: #b90414;">Chúng tôi nhận thấy địa chỉ email của bạn có vấn đề. Bạn hãy cập nhật lại địa chỉ email để tiếp tục sử dụng dịch vụ của chúng tôi:</p>
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
			<input type="submit" class="btn btn-danger" value="Xác thực" name="submit__contact__mail" style="margin-top: 30px;">
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
						<span>Xin chào,</span>
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
									<li><a href="{{ route('offer.index') }}">Danh Sách Offer</a></li>
									<li><a href="{{ url('offer?offer_category=nation') }}">Global Offer</a></li>
									<li><a href="{{ route('offer.myoffer') }}">Danh Sách Đã Liên Kết</a></li>
									<li>
										<a href="{{ url('offer/cpo') }}" onclick="document.getElementById('form-cpo').submit(); return false;">Chiến dịch CPO
											<span class="label label-danger pull-right">hot</span>
										</a>
										<form action="{{ env('CPO_AUTH_LINK') }}" id="form-cpo" method="POST">
											<input type="hidden" name="token" value="{{ generateJWT() }}">
										</form>
									</li>
								</ul>
							</li>
							<li  id="step8" class="rm_border">
								<p class="step__guide__8_detail" id="detail_step8"><span style="display: block;">Xem báo cáo chi tiết về hiệu quả các chiến dịch của bạn. </span>  <a class="cancel__step" pre='step8' style="display: inline-block; ">Đã hiểu!</a><a  class="next__step" pre='step8' step='step9' style="display: inline-block;color: green;float: right;">Tiếp tục</a></p>
								<a><i class="fa fa-line-chart"></i> Báo Cáo<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('report') }}"> Báo Cáo Hiệu Quả</a></li>
									<li><a href="{{ route('report.detail') }}">Báo Cáo Chi Tiết</a></li>
								</ul>
							</li>
							<li id="step9" class="rm_border">
								<p class="step__guide__8_detail" id="detail_step9"><span style="display: block;">Để gửi yêu cầu thanh toán hoa hồng.</span><a class="cancel__step" pre='step9' style="display: inline-block; ">Đã hiểu!</a> <a pre='step9' step='step10' class="next__step" style="display: inline-block;color: green;float: right;">Tiếp tục</a> </p>
								<a><i class="fa fa-usd"></i> Thanh Toán<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('billing.request') }}"> Yêu Cầu Thanh Toán</a></li>
									<li><a href="{{ route('billing.history') }}">Lịch Sử Thanh Toán</a></li>
								</ul>
							</li>
							<li>
								<a>
									<i class="fa fa-newspaper-o"></i> Tin Tức
									<span class="fa fa-chevron-down"></span>
								</a>
								<ul class="nav child_menu">
									<li><a href="{{ route('event.index') }}"> Chiến Dịch Mới</a></li>
									<li><a href="{{ route('board.index') }}">Tin Khuyến Mại</a></li>
									<li><a href="{{ route('discount.index') }}">Mã Giảm Giá</a></li>
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
								<p class="step__guide__8_detail" id="detail_step10"><span style="display: block;">Các tool cực hữu ích cho quá trình làm affiliate marketing. </span>  <a class="cancel__step" pre='step10' style="display: inline-block; ">Đã hiểu!</a><a class="next__step" pre='step10' step='step11' style="display: inline-block;color: green;float: right;">Tiếp tục</a></p>
								<a><i class="fa fa-magic"></i> Công cụ<span class="fa fa-chevron-down"></span> <span class="label label-success pull-right">new</span></a>
								<ul class="nav child_menu">
									<li><a href="{{ route('tool.deeplink') }}"> Adpia DeepLink</a></li>
									<li><a href="{{ url('tool/roll-banner')}}">Rolling Banner</a></li>
									<li><a href="{{ route('tool.smart-carousel') }}">Smart Carousel</a></li>
									{{-- <li><a href="{{ route('banner-product') }}"> Banner product</a></li> --}}
									<li><a href="{{ route('register-minishop') }}"> Minishop</a></li>
								</ul>
							</li>
							<li class="{{ url()->current() == route('banner-event')?"active":""}}">
								<a href="{{ route('banner-event') }}"><i class="fa fa-volume-off" aria-hidden="true"></i>Sự kiện </a>
							</li>
							<!-- =========================================================================== -->
							<li class=" rm_border {{ url()->current() == route('huong-dan')?"active":""}}" id='step12' style="background-color: #DC143C;">
								<p class="step__guide__8_detail" id="detail_step12"><span style="display: block;">Nếu còn bất cứ thắc mắc gì về sử dụng Newpub, hãy bấm vào đây nhé!</span> <a id="done_guide" class="cancel__step" style="display: inline-block; color: green;float: right;">Hoàn thành!</a></p>
								<a target="_blank" href="{{ route('academy.index') }}">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i> Academy
								</a>
							</li>
							<!-- =========================================================================== -->
							{{-- <li class=" rm_border {{ url()->current() == route('huong-dan')?"active":""}}" id='step12'>
								<p class="step__guide__8_detail" id="detail_step12" ><span style="display: block;">Nếu còn bất cứ thắc mắc gì về sử dụng Newpub, hãy bấm vào đây nhé!</span> <a id="done_guide" class="cancel__step" style="display: inline-block; color: green;float: right;">Hoàn thành!</a></p>
								<a href="{{ route('huong-dan') }}"><i class="fa fa-book" aria-hidden="true"></i> Hướng dẫn </a>
							</li> --}}
							@if (getReferral())
								<li><a><i class="fa fa-users"></i> Giới thiệu<span class="fa fa-chevron-down"></span> <span class="label label-danger pull-right">hot</span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('referral.getlink') }}">Lấy link</a></li>
										<li><a href="{{ route('referral.index') }}">Tổng quan</a></li>
										<li><a href="{{ route('referral.report') }}">Báo cáo</a></li>
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
									<i class="fa fa-desktop" aria-hidden="true"></i> Sử dụng giao diện mới
								</a>
							</li>
						</ul>
					</div>
				</div>
				@php $user = \App\Http\Helpers\Helper::getManagerInfor()->toArray();

				@endphp
				<div class="clearfix"></div>
				<div class="profile rm_border" style="margin-top: -35px; position: relative;" id="step11">
					<p class="step__guide__8_detail" id="detail_step11"><span style="display: block;">Thông tin liên hệ với người quản lý, hỗ trợ bạn trong quá trình chạy chiến dịch. </span> <a pre='step11' class="cancel__step" style="display: inline-block; ">Đã hiểu!</a><a class="next__step" pre='step11' step='step12' style="display: inline-block;color: green; float: right;">Tiếp tục</a> </p>
					<div><img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="{{$user[0]['contact_name'] }}" class="img-circle profile_img"></div>
					<div style="text-align: center; color: white;">
						<h5>Người quản lý</h5>
						<h5>Tên: {{ $user[0]['contact_name'] }}</h5>
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
							<p class="step_7_detail" id="detail__step7"><span style="display: block;">Quản lý và thay đổi thông tin tài khoản của bạn. </span> <a class="cancel__step" pre='step7' style="display: inline-block; ">Đã hiểu!</a><a pre='step7' step='step8' style="display: inline-block;color: green;">Tiếp tục</a> </p>
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
					<h5>Người quản lý</h5>
					<h5>Tên: {{ $user[0]['contact_name']}}</h5>
					<h5>Email: {{ $user[0]['email']}}</h5>
					<h5>Phone: {{ $user[0]['phone']}}</h5>
					<h5>Skype: {{ $user[0]['skype']}}</h5>
				</div>
			</div>
			<div class="pull-right">
				Công ty cổ phần ADPIA - Copy right by adpia © 2019 <a href="https://adpia.vn">adpia.vn</a>
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
				<h4 class=" text-center" style="color: #ffea00; font-size: 16px;">CHÍNH SÁCH XỬ PHẠT ĐỐI VỚI CÁC
					HÀNH VI GIAN LẬN</h4>
			</div>
			<div class="modal-body">
				<p class="text-center">Nhằm mục đích xây dựng cộng đồng Affiliate trong sạch, bền vững, trong thời gian tới Adpia sẽ
					triển khai các chế tài xử phạt mạnh tay đối với các
					<span class="text-danger" style="font-weight:600 ;">HÀNH VI GIAN LẬN.</span>
					Vì quyền lợi của các Publisher và cộng đồng Affiliate, yêu cầu các bạn tuân thủ các quy định sau:</p>
				<ul style="color:red">
					<li>
						<p style="color:black; font-weight: 600;">Cung cấp thông tin trung thực, chính xác (thông tin cá nhân, nguồn traffic,…)
						</p>
					</li>
					<li> <p style="color:black; font-weight: 600;">Tuân thủ các chính sách của Merchant về việc chạy
						quảng cáo (xem chi tiết trong phần thông
							tin chiến dịch)</p></li>
					<li>
						<p style="color:black; font-weight: 600;">Nghiêm cấm các hành vi gian lận trong việc quảng
							bá, gian lận đơn hàng hoặc các hình thức gian lận khác.</p>
					</li>
				</ul>
			</div>
			<div class="modal-header bg-red" style="padding: 3px !important;">
				<h4 class=" text-center" style="color: #ffea00; font-size: 16px;">CÁC PUBLISHER VI PHẠM SẼ BỊ XỬ PHẠT
					NHƯ SAU:</h4>
			</div>
			<div class="modal-body">
				<ul style="color:red">
					<li>
						<p style="color:black; font-weight: 600;">Tất cả các trường hợp gian lận hoặc nghi ngờ gian lận sẽ bị
							ngưng quyền chạy chiến dịch ngay lập tức, Account Manager sẽ liên hệ để thông báo và xác minh hành
							vi vi phạm.</p>
					</li>
					<li>
						<p style="color:black; font-weight: 600;">Căn cứ vào mức độ vi phạm, Adpia sẽ hủy mọi hoa hồng phát sinh trước đó của Publisher
							hoặc khóa tài khoản vĩnh viễn.</p>
					</li>
				</ul>
				<p class="text-center">Adpia rất mong nhận được sự phối hợp và hợp tác từ Publisher nhằm mục đích chung
					là phát
					triển mạng lưới Affiliate trong sạch, bền vững.</p>
			</div>
			<div class="modal-footer " style="background:#a1a1a1; border-radius:0 0 5px 5px; position: relative; ">
				<button class="btn tick__yes"  data-dismiss="modal"><i class="fa fa-check" aria-hidden="true"></i> TÔI ĐỒNG Ý</button>
				<p style="color:white; text-align: center; font-style: italic; margin-bottom: 0px !important">Để được duyệt chiến dịch, bạn cần tuân thủ chính
					sách chống gian lận của chúng tôi.</p>
				<p style="color:white;margin-bottom: 0px !important; text-align: center; font-style: italic;"> Xin cảm ơn!</p>
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
					<p>Do vấn đề về kỹ thuật từ phía Shopee, toàn bộ đơn
						hàng phát sinh của Merchant này trong tháng 9 vẫn
						chưa được đối soát.  ADPIA rất lấy làm tiếc phải
						thông báo về sự chậm trễ thanh toán hoa hồng Shopee
						cho các đơn hàng phát sinh trong khoảng thời gian
						nêu trên. </p>
					<p>ADPIA đang nỗ lực làm việc với phía Shopee để cố
						gắng hoàn thành việc đối soát trong thời gian
						sớm nhất có thể. Rất mong nhận được sự cảm thông
						chia sẻ từ các bạn.</p>
					<p>Cuối tháng 11 và trong tháng 12 tới sẽ liên tục có
						các chiến dịch giảm giá sâu và tỷ lệ chuyển đổi tốt
						từ phía các Merchant (Shopee, Lazada, FPTshop…) Các
						Affiliate hãy thường xuyên cập nhật thông tin từ
						ADPIA và tập trung quảng cáo thật tốt nhé để gia
						tăng thu nhập cuối năm nhé.</p>
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
                    <h4 class="modal-title">Tạo link nhanh</h4>
                </div>
                <form action="" method="post" role="form" id="create_link_form">
                    <div class="modal-body">
                        <span class="help-block green">*(Hướng dẫn: Truy cập website nhà cung cấp, tìm sản phẩm hoặc danh mục sản phẩm bạn muốn tạo link và copy link sản phẩm đó)</span>
                        <div class="form-group">
                            <label for="product_link">Link Sản phẩm, danh mục</label>
                            <input type="url" class="form-control" name="product_link" id="product_link" required placeholder="https://shopee.vn/M%C3%8C-T%C3%94M-TR%E1%BA%BA-EM-AN-B%C3%8CNH-(1-b%E1%BB%8Bch-50-g%C3%B3i)-i.66204356.1622524494">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="shortlink" id="shortlink" value="true"> <label for="shortlink">Rútsz gọn link</label>
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
                    <button type="submit" class="btn btn-success">Rút gọn</button>
                </div>
            </form>
        </div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="fb-root"></div>
<div class="fb-customerchat" attribution=setup_tool page_id="317623908403313"logged_in_greeting="Chào bạn, Bạn cần hỗ trợ gì?" logged_out_greeting="Chào bạn, Bạn cần hỗ trợ gì?"></div>
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
		<h2 style="color: #f00; font-size: 30px; text-align: justify;">Giao diện Academy tạm thời chưa hỗ hệ điều hành IOS, hệ thống sẽ cập nhật trong thời gian sớm nhất. Chúng tôi xin lỗi về sự bất tiện này!</h2>
	</div>
</div>
@endif
<!-- The Modal -->
<div id="exModal" class="ex-modal">

  <!-- Modal content -->
  <div class="ex-modal-content">
    <div class="ex-modal-header">
      <span class="ex-close" onclick="closeExPopup()">&times;</span>
      <h2>HƯỚNG DẪN CÀI TIỆN ÍCH TẠO LINK AFFILIATE NHANH</h2>
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
					toastr.warning('Bạn cần điền đầy đủ thông tin tài khoản <a href="{{ route('user.index') }}">Cập nhật ngay</a>');
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
		toastr.warning('Vui lòng tắt adblock để có thể sử dụng được tất cả các chức năng!');
	}

	$('#create_link_form').submit(function (e) {
		showLoading();
		var value = $('#create_link_form #product_link').val();
		var shortLink = $('#create_link_form #shortlink').prop('checked');

		if (!value) {
			toastr.error("Mời nhập link sản phẩm");
			e.preventDefault();
		}

		if (!value.match(/(http:\/\/|https:\/\/)/g)) {
			toastr.error("Mời nhập đúng định dạng URL");
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
						toastr.success("Tạo link thành công!");
					}
					hideLoading();
					return false;
				},
				error: function (e) {
					if (e.status === 501) {
						toastr.error('Link này không thuộc trên hệ thống của chúng tôi!');
						hideLoading();
						return false;
					}

					toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
					hideLoading();
					return false;
				}
			});
		} else {
			$('.box-result').show();
			$('#ip_result_link').val(origin);
			toastr.success("Tạo link thành công!");
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
					toastr.success("Tạo thành công shortlink");
				} else {
					toastr.error("Có lỗi xảy ra, xin vui lòng thử lại sau!");
				}

				hideLoading();
			},
			error: function (e) {
				if (e.status === 501) {
					toastr.error('Link này không thuộc trên hệ thống của chúng tôi!');
					hideLoading();

					return;
				}

				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
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
