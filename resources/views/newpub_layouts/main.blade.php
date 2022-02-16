	<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Adpia Affiliate Newpub')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/newpub.css') }}?{{ config('const.asset.version') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/Chart.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/guide_dashboard.css') }}">
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
@yield('newpub_style')
<style>
.noti-popup-box ::-webkit-scrollbar {
	width: 8px;
}
.noti-popup-box ::-webkit-scrollbar-track {
	background: #f1f1f1;
}
.noti-popup-box ::-webkit-scrollbar-thumb {
	background: #888;
}
.noti-popup-box ::-webkit-scrollbar-thumb:hover {
	background: #555;
}
/*===============================================*/
.nav-left-side-550 {
	display: none;
}
.am-avatar-550, .am-name-550 {
	display: none;
}
.svg-path-withdraw {
	animation-name:  infinitiColors;
	animation-duration: 4s;
	animation-iteration-count: infinite;
}
.svg-path-get-link {
	animation-name:  infinitiColors;
	animation-duration: 4s;
	animation-iteration-count: infinite;
	animation-delay: 1.3s;
}
.svg-path-use-guide {
	animation-name:  infinitiColors;
	animation-duration: 4s;
	animation-iteration-count: infinite;
	animation-delay: 2.6s;
}
@keyframes infinitiColors {
	0% {fill: rgb(172, 150, 58); color: rgb(172, 150, 58);}
	14% {fill: #ff0000; color: #ff0000;}
	28% {fill: rgb(189, 171, 20); color: rgb(189, 171, 20);}
	42% {fill: rgb(44, 129, 96); color: rgb(44, 129, 96);}
	57% {fill: rgb(99, 206, 196); color: rgb(99, 206, 196);}
	71% {fill: rgb(179, 190, 194); color: rgb(179, 190, 194);}
	85% {fill: #ee82ee; color: #ee82ee;}
	100% {fill: rgb(172, 150, 58); color: rgb(172, 150, 58);}
}

@media (max-width: 1500px) {
	.nav-guide-bar-item-text {
		display: none;
	}
}
@media (max-width: 1300px) and (min-width: 1100px) {
	.nav-guide-bar-outer {
		display: none
	}
}
@media (max-width: 1180px) {
	.am-avatar-550, .am-name-550 {
		display: block !important;
	}
}
@media (max-width: 1100px) {
	.newpub-nav-left-side {
		flex-direction: column;
	}
	.nav-guide-bar-item-text {
		display: block;
	}
	.nav-guide-bar-outer {
		padding: 10px 10px 0 !important;
	}
}
@media (max-width: 550px) {
	.nav-left-side-550 {
		display: block;
		width: 100%;
	}
	.am-info-550 {
		margin: auto;
	}
	.am-avatar-550:hover {
		cursor: pointer;
	}
	.nav-guide-bar-inner a {
		flex:  0 0 calc(100% / 3);
		max-width: calc(100% / 3);
	}
	.nav-guide-bar-item-inner {
		display: block !important;
		 text-align: center;
	}
}
@media (max-width: 380px) {
	.nav-show-drop span {
		font-size: 12px;
	}
	.nav-show-drop i {
		font-size: 10px;
	}
}
/*.newpub-zalo-group-contact {
	animation-name: zaloGroupAnimation;
	animation-duration: 4s;
	animation-timing-function: ease;
	animation-iteration-count: infinite;

	-webkit-animation-name: zaloGroupAnimation;
	-webkit-animation-duration: 4s;
	-webkit-animation-timing-function: ease;
	-webkit-animation-iteration-count: infinite;
}
.newpub-zalo-group-contact:hover {
	animation-play-state: paused;
}
.newpub-zalo-group-contact-inner:hover {
	transform: scale(1.05);
}*/
@keyframes zaloGroupAnimation {
	0% { transform: rotateY(0deg); }
	25% { transform: rotateY(180deg); }
	50% { transform: rotateY(0deg); }
	100% { transform: rotateY(0deg); }
}
@-webkit-keyframes zaloGroupAnimation {
	0% { transform: rotateY(0deg); }
	25% { transform: rotateY(180deg); }
	50% { transform: rotateY(0deg); }
	100% { transform: rotateY(0deg); }
}
.newpub-zalo-group-contact.zalo-group-hidden {
	animation-name: zaloGroupHiddenAnimation;
	animation-duration: 1s;
	animation-timing-function: ease;
	animation-fill-mode: forwards;

	-webkit-animation-name: zaloGroupHiddenAnimation;
	-webkit-animation-duration: 1s;
	-webkit-animation-timing-function: ease;
	-webkit-animation-fill-mode: forwards;
}
.zalo-group-hidden-button {
    width: 20px;
    height: 20px;
    text-align: center;
    border-radius: 50%;
    line-height: 20px;
}
@keyframes zaloGroupHiddenAnimation {
	0% { bottom: -25px; }
	100% { bottom: -200px; }
}
@-webkit-keyframes zaloGroupHiddenAnimation {
	0% { bottom: -25px; }
	100% { bottom: -200px; }
}
</style>
<body>

	<div class="loading" style="display: none"></div>
	@php
	function getCurController()
	{
		$routeArray = app('request')->route()->getAction();

		$controllerAction = class_basename($routeArray['controller']);
		list($controller, $action) = explode('@', $controllerAction);
		return $controller;
	}
	function getCurMethod()

	{
		$routeArray = app('request')->route()->getAction();
		$controllerAction = class_basename($routeArray['controller']);
		list($controller, $action) = explode('@', $controllerAction);
		return $action;
	}
	@endphp
	<div class="newpub-wrapper">
		<div class="newpub-container">
			<div class="newpub-left-bar">
				<div class="newpub-menu-area">
					<div class="newpub-menu-logo" style="padding-bottom: 10px;">
						<div class="newpub-menu-logo-box">
							<a href="{{ asset('newpub') }}"><img src="{{ asset('images/logo-newpub.png') }}" alt=""></a>
						</div>
					</div>
					<div class="nav-drop" style="direction: ltr;">
						<div class="nav-show-drop newpub-custom-drop">
							<span class="newpub-custom-drop">
								@foreach(App\Http\Helpers\Helper::getListSite() as $site)
								@if($site->delete_flag == 'N')
								@if (auth()->user()->last_contact_affiliate_id == $site->affiliate_id)
								{{ strlen($site->site_name) > 20 ? substr($site->site_name, 0, 20).'...' : $site->site_name }}
								@endif
								@if (auth()->user()->last_contact_affiliate_id == '')
								{{ strlen($site->site_name) > 20 ? substr($site->site_name, 0, 20).'...' : $site->site_name }}
								@endif
								@endif
								@endforeach
							</span><i class="fa fa-chevron-down newpub-custom-drop" aria-hidden="true"></i>
						</div>
						<div class="drop-content">
							<div class="drop-content-box">
								@foreach(App\Http\Helpers\Helper::getListSite() as $site)
								@if($site->delete_flag == 'N')
								@if (auth()->user()->last_contact_affiliate_id != $site->affiliate_id)
								<a href="{{ route('newpub.switch_site', ['affiliate_id' => $site->affiliate_id]) }}">
									<div class="drop-item">
										{{ $site->site_name }}
									</div>
								</a>
								@endif
								@endif
								@endforeach
							</div>
						</div>
					</div>
					<hr>
					<div class="newpub-menu-option">
						<div class="newpub-menu-option-box">
							<a href="{{ asset('newpub') }}"><div class="newpub-menu-option-item {{ getCurController() == 'NewpubController' ? 'newpub-item-active' : '' }}">
								<i class="fa fa-pie-chart" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Tổng quan</span>
							</div></a>
							<div class="newpub-menu-option-item step_9_head {{ getCurController() == 'NewpubOfferController' || getCurController() == 'HistoryLinkController' ? 'newpub-item-active' : '' }}">
								<a href="{{ asset('newpub/offer_list') }}">
									<div><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Chiến dịch</span></div>
								</a>
								<div class="newpub-guide right-guide step_9_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_9') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="10">Tiếp tục</button>
									</div>
								</div>
							</div>
							<div class="newpub-menu-option-item step_10_head {{ getCurController() == 'NewpubReportController' ? 'newpub-item-active' : '' }}">
								<a href="{{ asset('newpub/report') }}">
									<div><i class="fa fa-line-chart" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Báo cáo</span></div>
								</a>
								<div class="newpub-guide right-guide step_10_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_10') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="11">Tiếp tục</button>
									</div>
								</div>
							</div>
							<div class="newpub-menu-option-item step_11_head {{ getCurController() == 'NewpubBillingController' ? 'newpub-item-active' : '' }}">
								<a href="{{ asset('newpub/billing/request') }}">
									<div><i class="fa fa-usd" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Thanh toán</span></div>
								</a>
								<div class="newpub-guide right-guide step_11_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_11') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="12">Tiếp tục</button>
									</div>
								</div>
							</div>
							<div class="newpub-menu-option-item step_12_head {{ getCurController() == 'NewpubBoardController' || getCurController() == 'NewpubEventController' || getCurController() == 'NewpubDiscountController' ? 'newpub-item-active' : '' }}">
								<a href="#" onclick="setShowHideChild(this)">
									<div><i class="fa fa-newspaper-o" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Tin tức</span></div>
								</a>
								<div class="newpub-guide right-guide step_12_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_12') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="13">Tiếp tục</button>
									</div>
								</div>
							</div>
							<ul style="{{ getCurController() == 'NewpubBoardController' || getCurController() == 'NewpubEventController' || getCurController() == 'NewpubDiscountController' ? '' : 'display: none;' }}" id="news-child">
								<a href="{{ asset('newpub/event') }}" style="{{ getCurController() == 'NewpubEventController' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-file-text" aria-hidden="true"></i> Chiến dịch mới</li></a>
								<a href="{{ asset('newpub/board') }}" style="{{ getCurController() == 'NewpubBoardController' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-file-text" aria-hidden="true"></i> Tin khuyến mại</li></a>
								<a href="{{ asset('newpub/discount') }}" style="{{ getCurController() == 'NewpubDiscountController' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-file-text" aria-hidden="true"></i> Mã giảm giá</li></a>
							</ul>
							<div class="newpub-menu-option-item step_13_head {{ (getCurController() == 'NewpubToolController' && getCurMethod() != "generateMultipartLink") || getCurController() == 'NewpubRollingBannerController' || getCurController() == 'NewpubApiController' || getCurController() == 'NewpubPostBackController' ? 'newpub-item-active' : '' }}">
								<a href="#" onclick="toolsShowHideChild(this)">
									<div><i class="fa fa-magic" aria-hidden="true"></i><span class="newpub-menu-option-item-name">Công cụ</span></div>
								</a>
								<div class="newpub-guide right-guide step_13_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_13') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="14">Tiếp tục</button>
									</div>
								</div>
							</div>
							<ul style="{{ (getCurController() == 'NewpubToolController' && getCurMethod() != "generateMultipartLink") || getCurController() == 'NewpubRollingBannerController' || getCurController() == 'NewpubApiController' || getCurController() == 'NewpubPostBackController' ? '' : 'display: none;' }}" id="tools-child">
								<a href="{{ asset('newpub/api/coupon') }}" style="{{ getCurController() == 'NewpubApiController' && getCurMethod() == 'coupon' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Coupon API</li></a>
								<a href="{{ asset('newpub/api/deeplink') }}" style="{{ getCurController() == 'NewpubApiController' && getCurMethod() == 'deeplink' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Deeplink API</li></a>
								<a href="https://github.com/technicaladpia/Api_Adpia" target="_blank"><li><i class="fa fa-wrench" aria-hidden="true"></i> Conversions API</li></a>
								<a href="{{ asset('newpub/postback') }}" style="{{ getCurController() == 'NewpubPostBackController' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> PostBack</li></a>
								<a href="{{ asset('newpub/tool/adpia-deeplink') }}" style="{{ getCurController() == 'NewpubToolController' && getCurMethod() == 'deepLink' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Adpia Deeplink</li></a>
								<a href="{{ asset('newpub/tool/roll-banner') }}" style="{{ getCurController() == 'NewpubRollingBannerController'  && getCurMethod() == 'createBanner' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Rolling Banner</li></a>
								<a href="{{ asset('newpub/tool/smart-carousel') }}" style="{{ getCurController() == 'NewpubRollingBannerController' && getCurMethod() == 'createCarousel' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Smart Carousel</li></a>
								<a href="{{ asset('newpub/tool/smart-url') }}" style="{{ getCurController() == 'NewpubToolController' && getCurMethod() == 'smartUrl' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Smart Url</li></a>
								<a href="{{ asset('newpub/tool/promo-code') }}" style="{{ getCurController() == 'NewpubToolController' && getCurMethod() == 'promoCode' ? 'color: #FF4500 !important;' : '' }}"><li><i class="fa fa-wrench" aria-hidden="true"></i> Promo Code</li></a>
							</ul>
							<div class="newpub-menu-option-item {{ getCurController() == 'NewpubToolController' && getCurMethod() == "generateMultipartLink" ? 'newpub-item-active' : '' }}">
								<a href="{{ asset('newpub/tool/generate-multipart-link') }}">
									<div><i class="fa fa-link" aria-hidden="true" style="transform: rotate(90deg);"></i><span class="newpub-menu-option-item-name">Tạo link</span> <span style="display: inline-block; color: #fff; background: #ff0000; padding: 2px 6px 0; border-radius: 4px; margin-left: 5px; font-size: 10px;">NEW</span></div>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="newpub-menu-special-option">
						<div class="newpub-menu-special-option-box">
							<div class="newpub-menu-special-item step_14_head">
								<a href="{{ route('newpub.academy.index') }}"><div class="newpub-special-button newpub-button-academy {{ getCurController() == 'NewpubAcademyController' ? 'focus' : '' }}">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									<span class="newpub-special-button-text">Adpia ACADEMY</span>
								</div></a>
								<div class="newpub-special-button-caption">
									<div class="newpub-special-button-caption-box">
										<span>Cung cấp kiến thức Affiliate marketing từ cơ bản đến nâng cao</span>
									</div>
								</div>
								<div class="newpub-guide top-guide step_14_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_14') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="15">Tiếp tục</button>
									</div>
								</div>
							</div>
							<div class="newpub-menu-special-item step_15_head">
								<a href="{{ url('newpub/offer_list/cpo') }}" onclick="document.getElementById('form-cpo').submit(); return false;"><div class="newpub-special-button newpub-button-cpo">
									<i class="fa fa-leaf" aria-hidden="true"></i>
									<span class="newpub-special-button-text">Chiến dịch CPO</span>
								</div></a>
								<div class="newpub-special-button-caption">
									<div class="newpub-special-button-caption-box">
										<span>Tổng hợp các chiến dịch CPO hoa hồng hấp dẫn lên đến <span style="color: rgb(15, 162, 91);">40%</span></span>
									</div>
								</div>
								<form action="{{ env('CPO_AUTH_LINK') }}" id="form-cpo" method="POST">
									<input type="hidden" name="token" value="{{ generateJWT() }}">
								</form>
								<div class="newpub-guide top-guide step_15_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_15') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="16">Tiếp tục</button>
									</div>
								</div>
							</div>
							<div class="newpub-menu-special-item step_16_head">
								<a href="{{ route('newpub.minishop.index') }}"><div class="newpub-special-button newpub-button-minishop {{ getCurController() == 'NewpubMinishopController' ? 'focus' : '' }}">
									<i class="fa fa-shopping-bag" aria-hidden="true"></i>
									<span class="newpub-special-button-text">Adpia MINISHOP</span>
								</div></a>
								<div class="newpub-special-button-caption">
									<div class="newpub-special-button-caption-box">
										<span>Công cụ tạo website bán hàng dành riêng cho bạn</span>
									</div>
								</div>
								<div class="newpub-guide top-guide step_16_detail">
									<div class="newpub-guide-box">
										<span>{{ trans('guide_newbie_detail.step_16') }}</span>
										<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
										<button class="btn btn-success btn-guide-next" data-step="17">Tiếp tục</button>
									</div>
								</div>
							</div>
						</div>
						<hr>
					</div>
					@php 
						$user = \App\Http\Helpers\Helper::getManagerInfor()->toArray();
					@endphp
					<div class="newpub-menu-am-info step_8_head" style="position: relative; direction: ltr;">
						<div class="newpub-menu-am-info-inner" style="padding: 0 20px 20px;">
							<div class="newpub-menu-am-avatar" style="max-width: 100%;border-radius: 50%;overflow: auto;">
								<img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" style="width: 100%;">
							</div>
							<div class="newpub-menu-am-text" style="padding: 10px 0 0; text-align: center; font-size: 12px;">
								<span style="color: #fff;">AM </span>
								<span style="color: orange;">(Người quản lý)</span>
							</div>
							<div class="newpub-menu-am-name" style="text-align: center; color: #fff;">
								<span>{{ $user[0]['contact_name'] ? $user[0]['contact_name'] : 'manager'}}</span>
							</div>
							<div class="newpub-menu-am-contact" style="color: #fff; font-size: 12px; text-align: center;">
								<i class="fa fa-envelope" aria-hidden="true"></i> {{ $user[0]['email']}}<br /> 
								<i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user[0]['phone']}}<br />
								<i class="fa fa-skype" aria-hidden="true"></i> {{ $user[0]['skype']}}
							</div>
						</div>
						<div class="newpub-guide top-guide step_8_detail">
							<div class="newpub-guide-box">
								<span>{{ trans('guide_newbie_detail.step_8') }}</span>
								<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
								<button class="btn btn-success btn-guide-next" data-step="9">Tiếp tục</button>
							</div>
						</div>
					</div>
					
					<div class="newpub-social-button">
						<div class="newpub-social-button-box">
							<div class="newpub-social-main-icon">
								<img src="{{ asset('images/social-main-logo.png') }}" alt="">
							</div>
							<div class="social-child-zalo-icon">
								<a href="{{ $user[0]['zalo'] != null ? $user[0]['zalo'] : '#' }}" target="_blank"><img src="{{ asset('images/newpub-zalo-icon.png') }}" alt=""></a>
							</div>
							<div class="social-child-messenger-icon">
								<a href="{{ $user[0]['messenger'] != null ? $user[0]['messenger'] : '#' }}" target="_blank"><img src="{{ asset('images/newpub-messenger-icon.png') }}" alt=""></a>
							</div>
						</div>
					</div>
				</div>
				<div style="">
					<div class="btn-show-hide-left-menu">
						<div class="btn-show-hide-left-menu-box">
							<img src="{{ asset('images/arrows.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="newpub-right-bar">
				<div class="newpub-right-content-area">
					<div class="newpub-nav-bar">
						<div class="newpub-nav-top-bar">
							<div class="newpub-nav-top-bar-box">
								<div class="nav-top-bar-left">
									<i class="fa fa-bars" aria-hidden="true" onclick="showMenuMobile()"></i>
								</div>
								<div class="nav-top-bar-right">
									<div class="nav-top-bar-icon">
										<a href="{{ asset('newpub') }}"><img src="{{ asset('images/logo-newpub.png') }}" alt=""></a>
									</div>
								</div>
							</div>
						</div>
						<div class="newpub-nav-special-button">
							<div class="newpub-nav-special-button-box">
								<div class="newpub-nav-special-button-item special-button-active-mb" onclick="showButtonCaptionMb(this, 'academy')">
									<div class="newpub-nav-special-button-logo academy-logo-mb">
										<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									</div>
									<div class="newpub-nav-special-button-name">
										Adpia ACADEMY
									</div>
								</div>
								<div class="newpub-nav-special-button-item" onclick="showButtonCaptionMb(this, 'cpo')">
									<div class="newpub-nav-special-button-logo cpo-logo-mb">
										<i class="fa fa-leaf" aria-hidden="true"></i>
									</div>
									<div class="newpub-nav-special-button-name">
										Chiến dịch CPO
									</div>
								</div>
								<div class="newpub-nav-special-button-item" onclick="showButtonCaptionMb(this, 'minishop')">
									<div class="newpub-nav-special-button-logo minishop-logo-mb">
										<i class="fa fa-shopping-bag" aria-hidden="true"></i>
									</div>
									<div class="newpub-nav-special-button-name">
										Adpia MINISHOP
									</div>
								</div>
							</div>
							<div class="newpub-nav-special-button-caption-box">
								<div class="newpub-nav-special-button-caption-item academy-caption-item{{ class_basename(\Route::current()->controller) == 'NewpubMinishopController' ? '' : ' caption-item-active' }}">
									<div class="newpub-nav-special-button-caption-item-text">
										<span>Cung cấp kiến thức Affiliate marketing từ cơ bản đến nâng cao</span>
									</div>
									<div class="newpub-nav-special-button-caption-item-button">
										<a href="{{ route('newpub.academy.index') }}"><div>CLICK</div></a>
									</div>
								</div>
								<div class="newpub-nav-special-button-caption-item cpo-caption-item">
									<div class="newpub-nav-special-button-caption-item-text">
										<span>Tổng hợp các chiến dịch CPO hoa hồng hấp dẫn lên đến <span style="color: rgb(23, 165, 91)">40%</span></span>
									</div>
									<div class="newpub-nav-special-button-caption-item-button">
										<a href="{{ url('newpub/offer_list/cpo') }}" onclick="document.getElementById('form-cpo').submit(); return false;"><div>CLICK</div></a>
									</div>
								</div>
								<div class="newpub-nav-special-button-caption-item minishop-caption-item{{ class_basename(\Route::current()->controller) == 'NewpubMinishopController' ? ' caption-item-active' : '' }}">
									<div class="newpub-nav-special-button-caption-item-text">
										<span>Công cụ tạo website bán hàng dành riêng cho bạn</span>
									</div>
									<div class="newpub-nav-special-button-caption-item-button">
										<a href="{{ route('newpub.minishop.index') }}"><div>CLICK</div></a>
									</div>
								</div>
							</div>
						</div>
						<div class="newpub-nav-box">
							<div class="newpub-nav-left-side">
								<!--<div class="nav-am-info step_8_head">
									
									<div class="nav-am-avatar">
										<img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="">
									</div>
									<div class="nav-am-name newpub-custom-drop">
										<span class="newpub-custom-drop">Quản lý (AM)</span>
									</div>

									<div class="nav-am-avatar am-avatar-550" onclick="showHide_AMInfo_550()">
										<img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="">
									</div>
									<div class="nav-am-name am-name-550" onclick="showHide_AMInfo_550()">
										<span>AM</span>
									</div>
									<div id="am-contact-info-1180" style="position: absolute; width: 290px; left: 0; z-index: 1; display: none;">
										<div style="background-color: #ffffff; width: 100%; height: 100%; border-radius: 10px;-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); padding: 10px;">
											<div>
												<span>
													<i class="fa fa-user" aria-hidden="true"></i> {{ $user[0]['contact_name']}} | 
													<i class="fa fa-envelope" aria-hidden="true"></i> {{ $user[0]['email']}}<br> 
													<i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user[0]['phone']}} | 
													<i class="fa fa-skype" aria-hidden="true"></i> {{ $user[0]['skype']}}
												</span>
											</div>
										</div>
									</div>

									<div class="newpub-guide bottom-guide step_8_detail">
										<div class="newpub-guide-box">
											<span>{{ trans('guide_newbie_detail.step_8') }}</span>
											<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
											<button class="btn btn-success btn-guide-next" data-step="9">Tiếp tục</button>
										</div>
									</div>
								</div>
								<div class="nav-am-contact">
									<div class="am-contact-box">
										<span>
											<i class="fa fa-user" aria-hidden="true"></i> {{ $user[0]['contact_name']}} | 
											<i class="fa fa-envelope" aria-hidden="true"></i> {{ $user[0]['email']}}
											@if ($user[0]['contact_name'] != 'DiGi')
											<br>
											@endif
											<i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user[0]['phone']}} | 
											<i class="fa fa-skype" aria-hidden="true"></i> {{ $user[0]['skype']}}
										</span>
									</div>
								</div>-->
								<div class="nav-guide-bar-outer" style="align-self: center; padding: 0 10px; margin: auto;">
									<div class="nav-guide-bar-inner" style="display: flex;">
										<a href="https://drive.google.com/file/d/1sNtOwhGA2wxy44ZgdtKOiwDjNnJictbZ/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex; align-items: center;">
													<div class="nav-guide-bar-item-icon" style="height: 40px;" title="Hướng dẫn rút tiền">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.482cm" height="1.446cm" viewBox=" 0 0 50 50" style="height: 40px; width: 40px;">
															<path fill-rule="evenodd"  fill="#193759" class="svg-path-withdraw"
															d="M41.044,32.717 C37.589,34.812 34.168,36.963 30.705,39.043 C29.672,39.663 28.574,40.176 27.467,40.658 C27.063,40.833 26.629,40.855 26.222,40.995 L24.916,40.995 C23.436,40.814 22.341,40.402 21.005,39.830 C19.115,39.020 17.080,38.289 15.170,37.531 C13.838,37.003 12.466,37.198 11.186,37.745 C9.222,38.585 7.317,39.715 5.421,40.703 C5.293,40.770 5.175,40.857 5.044,40.920 C4.662,41.105 4.205,40.890 4.037,40.495 C3.150,38.408 0.541,33.181 0.141,31.850 C-0.255,30.532 0.245,29.713 1.526,29.367 C2.165,29.194 12.568,27.413 13.924,27.151 C16.211,26.710 18.180,27.526 20.120,28.563 C21.773,29.445 23.432,30.314 25.292,30.707 C26.128,30.884 26.972,30.733 27.816,30.592 C28.722,30.440 29.404,30.644 29.701,31.355 C29.851,31.712 29.934,32.272 29.659,32.510 C28.556,33.463 27.215,33.814 25.852,34.150 C24.638,34.449 23.573,33.941 22.477,33.599 C21.716,33.362 20.967,33.083 20.224,32.792 C19.462,32.493 18.860,32.669 18.643,33.235 C18.413,33.833 18.706,34.418 19.413,34.693 C20.824,35.243 22.248,35.761 23.707,36.157 C24.881,36.477 26.056,36.327 27.202,35.956 C28.666,35.482 30.100,34.945 31.189,33.767 C31.254,33.696 31.381,33.487 31.502,33.276 C31.734,32.871 32.084,32.547 32.510,32.367 C32.622,32.320 32.741,32.275 32.862,32.238 C35.395,31.462 37.927,30.684 40.460,29.911 C40.843,29.795 41.136,29.785 41.399,29.898 C41.785,30.065 42.002,30.487 42.002,30.912 L42.002,31.496 C41.905,32.082 41.512,32.433 41.044,32.717 ZM38.349,28.388 C36.188,29.035 34.036,29.712 31.884,30.383 C31.593,30.474 31.395,30.489 31.152,30.178 C30.119,28.870 28.828,28.173 27.116,28.604 C25.662,28.970 24.366,28.408 23.085,27.822 C21.358,27.030 19.716,26.042 17.911,25.416 C17.020,25.105 17.006,25.095 17.025,24.127 C17.060,22.548 16.872,20.959 17.198,19.400 C17.945,15.856 20.028,13.475 23.386,12.272 C23.881,12.092 23.975,11.405 23.975,11.405 L23.980,9.064 C23.980,9.064 24.208,7.460 23.411,6.613 C22.664,5.816 22.120,5.209 21.581,4.472 C21.180,3.921 21.200,3.129 21.670,2.628 C22.254,2.001 23.208,0.963 23.802,0.317 C24.109,-0.014 24.603,-0.099 25.004,0.111 L27.616,1.560 C27.868,1.700 28.170,1.705 28.427,1.570 L31.128,0.166 C31.528,-0.009 31.993,0.091 32.280,0.422 C32.859,1.084 33.809,2.167 34.288,2.683 C34.788,3.234 34.833,3.926 34.422,4.548 C33.858,5.390 33.457,5.941 32.711,6.813 C31.865,7.801 32.023,9.074 32.023,9.074 L32.028,11.716 C32.028,11.716 32.132,12.157 32.414,12.257 C36.406,13.696 38.795,17.135 38.800,21.416 C38.800,23.521 38.795,25.626 38.814,27.727 C38.819,28.098 38.740,28.273 38.349,28.388 ZM24.321,18.814 C24.331,20.248 25.350,21.300 26.770,21.330 C27.126,21.340 27.482,21.330 27.838,21.330 L28.076,21.330 C29.906,21.320 29.772,21.205 29.772,23.115 C29.767,23.586 29.555,23.817 29.090,23.817 C28.437,23.817 27.784,23.807 27.136,23.822 C26.666,23.832 26.359,23.736 26.295,23.155 C26.231,22.558 25.741,22.273 25.123,22.353 C24.638,22.408 24.336,22.794 24.321,23.366 C24.297,24.574 25.182,25.626 26.389,25.827 C26.676,25.877 27.081,25.706 27.225,25.922 C27.368,26.148 27.279,26.534 27.289,26.854 C27.309,27.391 27.675,27.832 28.189,27.857 C28.684,27.882 29.050,27.646 29.228,27.145 C29.322,26.889 29.288,26.629 29.283,26.373 C29.283,26.062 29.273,25.872 29.713,25.802 C30.861,25.621 31.558,24.809 31.726,23.616 C31.820,22.980 31.820,22.338 31.741,21.701 C31.553,20.122 30.663,19.340 29.095,19.340 C28.442,19.340 27.789,19.345 27.136,19.335 C26.493,19.330 26.330,19.165 26.325,18.528 C26.320,18.167 26.335,17.806 26.320,17.445 C26.305,17.014 26.503,16.824 26.923,16.824 C27.631,16.829 28.343,16.839 29.055,16.824 C29.485,16.814 29.703,17.004 29.777,17.430 C29.891,18.062 30.321,18.388 30.890,18.323 C31.444,18.252 31.781,17.791 31.741,17.155 C31.667,15.977 30.955,15.130 29.772,14.869 C29.421,14.789 29.263,14.693 29.278,14.272 C29.312,13.275 28.976,12.814 28.298,12.804 C27.601,12.794 27.274,13.240 27.299,14.292 C27.309,14.723 27.190,14.814 26.780,14.814 C25.365,14.814 24.331,15.886 24.321,17.310 L24.321,18.814 ZM30.480,8.628 L30.480,8.031 C30.480,7.515 30.064,7.094 29.555,7.094 L26.562,7.094 C26.053,7.094 25.637,7.515 25.637,8.031 L25.637,8.628 C25.637,9.144 26.053,9.565 26.562,9.565 L29.555,9.565 C30.064,9.565 30.480,9.144 30.480,8.628 ZM31.924,2.563 C31.701,2.217 31.241,2.116 30.900,2.342 L27.957,4.282 C27.917,4.307 27.863,4.307 27.818,4.282 L24.865,2.522 C24.514,2.312 24.059,2.427 23.851,2.788 C23.644,3.144 23.757,3.605 24.114,3.816 L27.067,5.580 C27.319,5.731 27.606,5.806 27.888,5.806 C28.194,5.806 28.501,5.721 28.768,5.540 L31.706,3.605 C32.053,3.375 32.147,2.908 31.924,2.563 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-withdraw" style="font-size: 10px; font-weight: 600; color: #193759;">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">RÚT TIỀN</span>
													</div>
												</div>
											</div>
										</a>
										<a href="https://drive.google.com/file/d/1IdQgWUMKob18tDpcpnapZ-yexSsFWKp0/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex; align-items: center;">
													<div class="nav-guide-bar-item-icon" style="height: 40px;" title="Hướng dẫn lấy link">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.764cm" height="1.199cm" viewBox=" 0 0 50 50" style="height: 48px; width: 60px;">
															<path fill-rule="evenodd"  fill="#193759" class="svg-path-get-link"
															d="M49.633,5.429 C49.183,5.884 48.717,6.321 48.257,6.765 C47.380,7.610 46.503,8.455 45.623,9.297 C45.314,9.593 44.972,9.743 44.567,9.531 C44.205,9.342 44.006,9.038 44.017,8.592 C44.016,8.278 44.146,8.032 44.356,7.829 C45.706,6.524 47.050,5.212 48.408,3.917 C48.849,3.496 49.392,3.524 49.750,3.937 C50.119,4.362 50.080,4.977 49.633,5.429 ZM39.299,7.382 C38.759,7.379 38.377,6.939 38.368,6.273 C38.357,5.419 38.366,4.565 38.366,3.711 C38.366,2.836 38.356,1.961 38.369,1.087 C38.379,0.395 38.734,0.000 39.305,0.001 C39.864,0.002 40.233,0.416 40.237,1.096 C40.246,2.825 40.246,4.553 40.237,6.282 C40.233,6.946 39.842,7.385 39.299,7.382 ZM32.994,9.302 C31.649,8.022 30.318,6.726 28.981,5.438 C28.754,5.219 28.612,4.961 28.612,4.622 C28.622,4.212 28.791,3.902 29.135,3.725 C29.522,3.526 29.886,3.603 30.202,3.908 C31.553,5.210 32.907,6.511 34.247,7.827 C34.683,8.255 34.716,8.858 34.375,9.271 C33.995,9.732 33.476,9.761 32.994,9.302 ZM23.760,27.746 C23.657,28.102 23.481,28.245 23.174,28.312 C21.269,28.727 19.365,29.147 17.463,29.575 C17.164,29.642 16.995,29.596 16.830,29.259 C16.078,27.727 14.885,26.947 13.270,26.950 C11.920,26.953 10.571,26.951 9.096,26.951 C9.768,25.953 10.370,25.065 10.966,24.173 C11.419,23.496 11.409,22.903 10.947,22.514 C10.490,22.128 9.938,22.281 9.473,22.930 C8.552,24.216 7.638,25.508 6.711,26.789 C6.413,27.200 6.155,27.615 6.382,28.152 C6.620,28.714 7.091,28.792 7.599,28.794 C9.393,28.802 11.186,28.821 12.980,28.833 C14.354,28.843 15.374,29.916 15.391,31.372 C15.408,32.823 14.398,33.978 13.043,33.985 C9.629,34.002 6.215,34.003 2.801,33.984 C1.235,33.976 -0.038,32.501 0.000,30.805 C0.054,28.420 0.711,26.254 2.045,24.349 C2.849,23.202 3.692,22.087 4.507,20.949 C5.550,19.493 6.645,18.110 8.141,17.148 C9.902,16.017 11.895,15.700 13.817,15.124 C14.021,15.063 14.143,15.189 14.289,15.283 C17.362,17.268 20.474,17.345 23.613,15.481 C23.886,15.318 24.072,15.295 24.336,15.482 C25.045,15.984 25.769,16.462 26.499,16.927 C26.780,17.106 26.838,17.276 26.733,17.630 C25.725,20.996 24.734,24.368 23.760,27.746 ZM19.407,14.792 C15.655,14.885 12.729,11.890 12.640,7.866 C12.555,4.065 15.412,0.850 18.955,0.759 C22.523,0.667 25.475,3.718 25.570,7.596 C25.664,11.416 22.846,14.707 19.407,14.792 ZM18.173,31.482 C20.357,30.989 22.538,30.476 24.731,30.029 C25.238,29.925 25.411,29.669 25.557,29.185 C26.930,24.638 28.325,20.098 29.718,15.559 C30.048,14.484 30.357,14.247 31.406,14.247 C36.922,14.244 42.439,14.243 47.955,14.248 C49.313,14.249 49.806,14.978 49.407,16.383 C47.913,21.656 46.414,26.928 44.917,32.200 C44.526,33.575 44.019,33.989 42.701,33.990 C38.690,33.993 34.678,33.991 30.666,33.991 C30.666,33.992 30.666,33.993 30.666,33.994 C29.104,33.994 27.541,33.995 25.979,33.994 C23.414,33.993 20.849,33.997 18.283,33.988 C17.489,33.985 16.983,33.467 17.000,32.722 C17.015,32.084 17.414,31.654 18.173,31.482 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-get-link" style="font-size: 10px; font-weight: 600; color: #193759;">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">LẤY LINK</span>
													</div>
												</div>
											</div>
										</a>
										<a href="https://drive.google.com/file/d/1HovSskoGjCR6Y3v6_KKJW95qyZzUGFtY/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex; align-items: center;">
													<div class="nav-guide-bar-item-icon" style="height: 40px;" title="Hướng dẫn sử dụng">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.517cm" height= "1.023cm" viewBox=" 0 0 50 50" style="height: 56px; width: 56px;">
															<path fill-rule="evenodd"  fill="#193759" class="svg-path-use-guide"
															d="M42.194,16.331 L19.178,28.717 C18.614,29.071 17.865,29.080 17.290,28.740 L8.761,24.012 L8.761,28.052 L6.474,24.851 L4.074,25.627 L4.074,21.414 L0.621,19.500 C0.231,19.270 -0.004,18.879 -0.004,18.461 L-0.004,12.223 C-0.004,11.759 0.278,11.332 0.731,11.107 L25.781,0.225 C26.410,-0.088 27.177,-0.081 27.800,0.243 L42.262,7.045 C42.714,7.280 42.992,7.712 42.992,8.180 L42.992,14.957 C42.992,15.504 42.694,16.017 42.194,16.331 ZM2.127,14.127 L2.089,17.481 C2.084,17.905 2.321,18.302 2.717,18.535 L4.074,19.268 L4.074,18.503 C4.074,18.127 4.718,17.925 5.206,18.147 L5.782,18.409 L5.782,14.832 L3.273,13.541 C2.767,13.279 2.133,13.603 2.127,14.127 ZM41.206,9.786 C41.206,9.251 40.537,8.936 40.045,9.239 L19.204,20.485 C18.526,20.903 17.639,20.934 16.925,20.566 L7.311,15.619 L7.311,19.105 L8.117,19.472 C8.519,19.654 8.761,19.951 8.761,20.260 L8.761,21.798 L17.209,26.359 C17.780,26.695 18.522,26.687 19.084,26.339 L40.398,15.193 C40.904,14.880 41.206,14.364 41.206,13.813 L41.206,9.786 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-use-guide" style="font-size: 10px; font-weight: 600; color: #193759;">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">SỬ DỤNG</span>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="newpub-nav-event">
								<div class="newpub-nav-event-box newpub-custom-drop">
									<div class="nav-month-event-text" data-url='{{ config('const.adpia_homepage') }}/work-from-home-cac-chuong-trinh-tiep-thi-hot-nhat-thang/		'>
										<span>THÁNG 7</span> <div class="nav-month-event-carret-down newpub-custom-drop">&#9660</div>
									</div>
									<div class="nav-month-event-wall"></div>
									<div class="nav-month-event-drop-content">
										<div class="nav-month-event-drop-content-box">
											<div class="nav-month-event-drop-content-row">
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/chao-he-soi-dong-hoa-hong-hap-dan/')">THÁNG 5</div>
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/sale-giua-nam-ngap-tran-hoa-hong/')">THÁNG 6</div>
											</div>
											<div class="nav-month-event-drop-content-row">
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/thang-cua-nang-Sale-ngap-tran/')">THÁNG 3</div>
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/chay-nhanh-dang-ky-tien-ve-ngay-vi/')">THÁNG 4</div>
											</div>
											<div class="nav-month-event-drop-content-row">
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/chi-em-lam-dep-publisher-day-so/')">THÁNG 1</div>
												<div class="nav-month-event-drop-content-item" onclick="javascript:window.open('{{ config('const.adpia_homepage') }}/vui-xuan-sang-ruoc-loc-vang/')">THÁNG 2</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="newpub-nav-right-side">
								<div class="nav-right-box step_7_head">
									<div class="nav-right-show">
										<div class="nav-user-avatar newpub-custom-drop">
											<img class="newpub-custom-drop" src="{{ auth()->user()->avatar == null ? '/assets/images/user.png' : url(auth()->user()->avatar) }}" alt="">
										</div>
										<div class="nav-user-name newpub-custom-drop" style="position: relative;">
											<span class="newpub-custom-drop">{{ auth()->user()->contact_name }}</span><i class="fa fa-chevron-down newpub-custom-drop" aria-hidden="true"></i>
											<div id="drop-user-menu" style="position: absolute; top: 40px; right: 0; width: 100%; border-radius: 10px; padding: 5px; background-color: #ffffff; display: none;">
												<a href="{{ route('newpub.user.index') }}"><div class="user-menu-child">Thông tin cá nhân</div></a>
												<a href="{{route('auth.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><div class="user-menu-child">Đăng xuất</div></a>
												<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
											</div>
										</div>
										<a onclick="showNotiPopup()"><div class="nav-notification-bell">
											<img src="{{ asset('images/bell.png') }}" alt="">
											<div class="notification-new">
												<img src="{{ asset('images/new-noti-icon.png') }}" alt="">
											</div>
										</div></a>
										<div class="nav-notification-mail">
											<a href="{{ route('newpub.mail.index') }}"><img src="{{ asset('images/mail.png') }}" alt=""></a>
										</div>
									</div>
									<div class="newpub-nav-left-side nav-left-side-550">
										<div class="nav-am-info am-info-550">
											<div class="nav-drop">
												<div class="nav-show-drop show-drop-550 newpub-custom-drop">
													<span class="newpub-custom-drop">
														@foreach(App\Http\Helpers\Helper::getListSite() as $site)
														@if($site->delete_flag == 'N')
														@if (auth()->user()->last_contact_affiliate_id == $site->affiliate_id)
														{{ $site->site_name }}
														@endif
														@endif
														@endforeach
													</span><i class="fa fa-chevron-down newpub-custom-drop" aria-hidden="true"></i>
												</div>
												<div class="drop-content drop-content-550">
													<div class="drop-content-box">
														@foreach(App\Http\Helpers\Helper::getListSite() as $site)
														@if($site->delete_flag == 'N')
														@if (auth()->user()->last_contact_affiliate_id != $site->affiliate_id)
														<a href="{{ route('newpub.switch_site', ['affiliate_id' => $site->affiliate_id]) }}">
															<div class="drop-item">
																{{ $site->site_name }}
															</div>
														</a>
														@endif
														@endif
														@endforeach
													</div>
												</div>
											</div>

											<div class="nav-am-avatar am-avatar-550" onclick="showHide_AMInfo_550()">
												<img src="{{ $user[0]['avatar'] == null? asset('assets/images/user.png') : $user[0]['avatar'] }}" alt="">
											</div>
											<div class="nav-am-name am-name-550" onclick="showHide_AMInfo_550()">
												<span>AM</span>
											</div>
											<div id="am-contact-info-550" style="position: absolute; width: 290px; left: 0; z-index: 1; display: none;"	>
												<div style="background-color: #ffffff; width: 100%; height: 100%; border-radius: 10px;-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); padding: 10px;">
													<div>
														<span>
															<i class="fa fa-user" aria-hidden="true"></i> {{ $user[0]['contact_name']}} | 
															<i class="fa fa-envelope" aria-hidden="true"></i> {{ $user[0]['email']}}<br> 
															<i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user[0]['phone']}} | 
															<i class="fa fa-skype" aria-hidden="true"></i> {{ $user[0]['skype']}}
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="nav-am-contact">
											<div class="am-contact-box">
												<span>
													<i class="fa fa-user" aria-hidden="true"></i> {{ $user[0]['contact_name']}} | 
													<i class="fa fa-envelope" aria-hidden="true"></i> {{ $user[0]['email']}}<br> 
													<i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user[0]['phone']}} | 
													<i class="fa fa-skype" aria-hidden="true"></i> {{ $user[0]['skype']}}
												</span>
											</div>
										</div>
										<div class="nav-guide-bar-outer" style="align-self: center; padding: 0 10px;">
									<div class="nav-guide-bar-inner" style="display: flex;">
										<a href="https://drive.google.com/file/d/1sNtOwhGA2wxy44ZgdtKOiwDjNnJictbZ/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex;">
													<div class="nav-guide-bar-item-icon" style="height: 30px;" title="Hướng dẫn rút tiền">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.482cm" height="1.446cm" viewBox=" 0 0 50 50" style="height: 30px; width: 35px;">
															<path fill-rule="evenodd"  fill="rgb(172, 150, 58)" class="svg-path-withdraw"
															d="M41.044,32.717 C37.589,34.812 34.168,36.963 30.705,39.043 C29.672,39.663 28.574,40.176 27.467,40.658 C27.063,40.833 26.629,40.855 26.222,40.995 L24.916,40.995 C23.436,40.814 22.341,40.402 21.005,39.830 C19.115,39.020 17.080,38.289 15.170,37.531 C13.838,37.003 12.466,37.198 11.186,37.745 C9.222,38.585 7.317,39.715 5.421,40.703 C5.293,40.770 5.175,40.857 5.044,40.920 C4.662,41.105 4.205,40.890 4.037,40.495 C3.150,38.408 0.541,33.181 0.141,31.850 C-0.255,30.532 0.245,29.713 1.526,29.367 C2.165,29.194 12.568,27.413 13.924,27.151 C16.211,26.710 18.180,27.526 20.120,28.563 C21.773,29.445 23.432,30.314 25.292,30.707 C26.128,30.884 26.972,30.733 27.816,30.592 C28.722,30.440 29.404,30.644 29.701,31.355 C29.851,31.712 29.934,32.272 29.659,32.510 C28.556,33.463 27.215,33.814 25.852,34.150 C24.638,34.449 23.573,33.941 22.477,33.599 C21.716,33.362 20.967,33.083 20.224,32.792 C19.462,32.493 18.860,32.669 18.643,33.235 C18.413,33.833 18.706,34.418 19.413,34.693 C20.824,35.243 22.248,35.761 23.707,36.157 C24.881,36.477 26.056,36.327 27.202,35.956 C28.666,35.482 30.100,34.945 31.189,33.767 C31.254,33.696 31.381,33.487 31.502,33.276 C31.734,32.871 32.084,32.547 32.510,32.367 C32.622,32.320 32.741,32.275 32.862,32.238 C35.395,31.462 37.927,30.684 40.460,29.911 C40.843,29.795 41.136,29.785 41.399,29.898 C41.785,30.065 42.002,30.487 42.002,30.912 L42.002,31.496 C41.905,32.082 41.512,32.433 41.044,32.717 ZM38.349,28.388 C36.188,29.035 34.036,29.712 31.884,30.383 C31.593,30.474 31.395,30.489 31.152,30.178 C30.119,28.870 28.828,28.173 27.116,28.604 C25.662,28.970 24.366,28.408 23.085,27.822 C21.358,27.030 19.716,26.042 17.911,25.416 C17.020,25.105 17.006,25.095 17.025,24.127 C17.060,22.548 16.872,20.959 17.198,19.400 C17.945,15.856 20.028,13.475 23.386,12.272 C23.881,12.092 23.975,11.405 23.975,11.405 L23.980,9.064 C23.980,9.064 24.208,7.460 23.411,6.613 C22.664,5.816 22.120,5.209 21.581,4.472 C21.180,3.921 21.200,3.129 21.670,2.628 C22.254,2.001 23.208,0.963 23.802,0.317 C24.109,-0.014 24.603,-0.099 25.004,0.111 L27.616,1.560 C27.868,1.700 28.170,1.705 28.427,1.570 L31.128,0.166 C31.528,-0.009 31.993,0.091 32.280,0.422 C32.859,1.084 33.809,2.167 34.288,2.683 C34.788,3.234 34.833,3.926 34.422,4.548 C33.858,5.390 33.457,5.941 32.711,6.813 C31.865,7.801 32.023,9.074 32.023,9.074 L32.028,11.716 C32.028,11.716 32.132,12.157 32.414,12.257 C36.406,13.696 38.795,17.135 38.800,21.416 C38.800,23.521 38.795,25.626 38.814,27.727 C38.819,28.098 38.740,28.273 38.349,28.388 ZM24.321,18.814 C24.331,20.248 25.350,21.300 26.770,21.330 C27.126,21.340 27.482,21.330 27.838,21.330 L28.076,21.330 C29.906,21.320 29.772,21.205 29.772,23.115 C29.767,23.586 29.555,23.817 29.090,23.817 C28.437,23.817 27.784,23.807 27.136,23.822 C26.666,23.832 26.359,23.736 26.295,23.155 C26.231,22.558 25.741,22.273 25.123,22.353 C24.638,22.408 24.336,22.794 24.321,23.366 C24.297,24.574 25.182,25.626 26.389,25.827 C26.676,25.877 27.081,25.706 27.225,25.922 C27.368,26.148 27.279,26.534 27.289,26.854 C27.309,27.391 27.675,27.832 28.189,27.857 C28.684,27.882 29.050,27.646 29.228,27.145 C29.322,26.889 29.288,26.629 29.283,26.373 C29.283,26.062 29.273,25.872 29.713,25.802 C30.861,25.621 31.558,24.809 31.726,23.616 C31.820,22.980 31.820,22.338 31.741,21.701 C31.553,20.122 30.663,19.340 29.095,19.340 C28.442,19.340 27.789,19.345 27.136,19.335 C26.493,19.330 26.330,19.165 26.325,18.528 C26.320,18.167 26.335,17.806 26.320,17.445 C26.305,17.014 26.503,16.824 26.923,16.824 C27.631,16.829 28.343,16.839 29.055,16.824 C29.485,16.814 29.703,17.004 29.777,17.430 C29.891,18.062 30.321,18.388 30.890,18.323 C31.444,18.252 31.781,17.791 31.741,17.155 C31.667,15.977 30.955,15.130 29.772,14.869 C29.421,14.789 29.263,14.693 29.278,14.272 C29.312,13.275 28.976,12.814 28.298,12.804 C27.601,12.794 27.274,13.240 27.299,14.292 C27.309,14.723 27.190,14.814 26.780,14.814 C25.365,14.814 24.331,15.886 24.321,17.310 L24.321,18.814 ZM30.480,8.628 L30.480,8.031 C30.480,7.515 30.064,7.094 29.555,7.094 L26.562,7.094 C26.053,7.094 25.637,7.515 25.637,8.031 L25.637,8.628 C25.637,9.144 26.053,9.565 26.562,9.565 L29.555,9.565 C30.064,9.565 30.480,9.144 30.480,8.628 ZM31.924,2.563 C31.701,2.217 31.241,2.116 30.900,2.342 L27.957,4.282 C27.917,4.307 27.863,4.307 27.818,4.282 L24.865,2.522 C24.514,2.312 24.059,2.427 23.851,2.788 C23.644,3.144 23.757,3.605 24.114,3.816 L27.067,5.580 C27.319,5.731 27.606,5.806 27.888,5.806 C28.194,5.806 28.501,5.721 28.768,5.540 L31.706,3.605 C32.053,3.375 32.147,2.908 31.924,2.563 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-withdraw" style="font-size: 10px; font-weight: 600; color: rgb(172, 150, 58);">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">RÚT TIỀN</span>
													</div>
												</div>
											</div>
										</a>
										<a href="https://drive.google.com/file/d/1IdQgWUMKob18tDpcpnapZ-yexSsFWKp0/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex;">
													<div class="nav-guide-bar-item-icon" style="height: 30px;" title="Hướng dẫn lấy link">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.764cm" height="1.199cm" viewBox=" 0 0 50 50" style="height: 35px; width: 45px;">
															<path fill-rule="evenodd"  fill="rgb(172, 150, 58)" class="svg-path-get-link"
															d="M49.633,5.429 C49.183,5.884 48.717,6.321 48.257,6.765 C47.380,7.610 46.503,8.455 45.623,9.297 C45.314,9.593 44.972,9.743 44.567,9.531 C44.205,9.342 44.006,9.038 44.017,8.592 C44.016,8.278 44.146,8.032 44.356,7.829 C45.706,6.524 47.050,5.212 48.408,3.917 C48.849,3.496 49.392,3.524 49.750,3.937 C50.119,4.362 50.080,4.977 49.633,5.429 ZM39.299,7.382 C38.759,7.379 38.377,6.939 38.368,6.273 C38.357,5.419 38.366,4.565 38.366,3.711 C38.366,2.836 38.356,1.961 38.369,1.087 C38.379,0.395 38.734,0.000 39.305,0.001 C39.864,0.002 40.233,0.416 40.237,1.096 C40.246,2.825 40.246,4.553 40.237,6.282 C40.233,6.946 39.842,7.385 39.299,7.382 ZM32.994,9.302 C31.649,8.022 30.318,6.726 28.981,5.438 C28.754,5.219 28.612,4.961 28.612,4.622 C28.622,4.212 28.791,3.902 29.135,3.725 C29.522,3.526 29.886,3.603 30.202,3.908 C31.553,5.210 32.907,6.511 34.247,7.827 C34.683,8.255 34.716,8.858 34.375,9.271 C33.995,9.732 33.476,9.761 32.994,9.302 ZM23.760,27.746 C23.657,28.102 23.481,28.245 23.174,28.312 C21.269,28.727 19.365,29.147 17.463,29.575 C17.164,29.642 16.995,29.596 16.830,29.259 C16.078,27.727 14.885,26.947 13.270,26.950 C11.920,26.953 10.571,26.951 9.096,26.951 C9.768,25.953 10.370,25.065 10.966,24.173 C11.419,23.496 11.409,22.903 10.947,22.514 C10.490,22.128 9.938,22.281 9.473,22.930 C8.552,24.216 7.638,25.508 6.711,26.789 C6.413,27.200 6.155,27.615 6.382,28.152 C6.620,28.714 7.091,28.792 7.599,28.794 C9.393,28.802 11.186,28.821 12.980,28.833 C14.354,28.843 15.374,29.916 15.391,31.372 C15.408,32.823 14.398,33.978 13.043,33.985 C9.629,34.002 6.215,34.003 2.801,33.984 C1.235,33.976 -0.038,32.501 0.000,30.805 C0.054,28.420 0.711,26.254 2.045,24.349 C2.849,23.202 3.692,22.087 4.507,20.949 C5.550,19.493 6.645,18.110 8.141,17.148 C9.902,16.017 11.895,15.700 13.817,15.124 C14.021,15.063 14.143,15.189 14.289,15.283 C17.362,17.268 20.474,17.345 23.613,15.481 C23.886,15.318 24.072,15.295 24.336,15.482 C25.045,15.984 25.769,16.462 26.499,16.927 C26.780,17.106 26.838,17.276 26.733,17.630 C25.725,20.996 24.734,24.368 23.760,27.746 ZM19.407,14.792 C15.655,14.885 12.729,11.890 12.640,7.866 C12.555,4.065 15.412,0.850 18.955,0.759 C22.523,0.667 25.475,3.718 25.570,7.596 C25.664,11.416 22.846,14.707 19.407,14.792 ZM18.173,31.482 C20.357,30.989 22.538,30.476 24.731,30.029 C25.238,29.925 25.411,29.669 25.557,29.185 C26.930,24.638 28.325,20.098 29.718,15.559 C30.048,14.484 30.357,14.247 31.406,14.247 C36.922,14.244 42.439,14.243 47.955,14.248 C49.313,14.249 49.806,14.978 49.407,16.383 C47.913,21.656 46.414,26.928 44.917,32.200 C44.526,33.575 44.019,33.989 42.701,33.990 C38.690,33.993 34.678,33.991 30.666,33.991 C30.666,33.992 30.666,33.993 30.666,33.994 C29.104,33.994 27.541,33.995 25.979,33.994 C23.414,33.993 20.849,33.997 18.283,33.988 C17.489,33.985 16.983,33.467 17.000,32.722 C17.015,32.084 17.414,31.654 18.173,31.482 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-get-link" style="font-size: 10px; font-weight: 600; color: rgb(172, 150, 58);">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">LẤY LINK</span>
													</div>
												</div>
											</div>
										</a>
										<a href="https://drive.google.com/file/d/1HovSskoGjCR6Y3v6_KKJW95qyZzUGFtY/view?usp=sharing" target="_blank">
											<div class="nav-guide-bar-item" style="padding: 0 8px;">
												<div class="nav-guide-bar-item-inner" style="display: flex;">
													<div class="nav-guide-bar-item-icon" style="height: 30px;" title="Hướng dẫn sử dụng">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1.517cm" height= "1.023cm" viewBox=" 0 0 50 50" style="height: 40px; width: 40px;">
															<path fill-rule="evenodd"  fill="rgb(172, 150, 58)" class="svg-path-use-guide"
															d="M42.194,16.331 L19.178,28.717 C18.614,29.071 17.865,29.080 17.290,28.740 L8.761,24.012 L8.761,28.052 L6.474,24.851 L4.074,25.627 L4.074,21.414 L0.621,19.500 C0.231,19.270 -0.004,18.879 -0.004,18.461 L-0.004,12.223 C-0.004,11.759 0.278,11.332 0.731,11.107 L25.781,0.225 C26.410,-0.088 27.177,-0.081 27.800,0.243 L42.262,7.045 C42.714,7.280 42.992,7.712 42.992,8.180 L42.992,14.957 C42.992,15.504 42.694,16.017 42.194,16.331 ZM2.127,14.127 L2.089,17.481 C2.084,17.905 2.321,18.302 2.717,18.535 L4.074,19.268 L4.074,18.503 C4.074,18.127 4.718,17.925 5.206,18.147 L5.782,18.409 L5.782,14.832 L3.273,13.541 C2.767,13.279 2.133,13.603 2.127,14.127 ZM41.206,9.786 C41.206,9.251 40.537,8.936 40.045,9.239 L19.204,20.485 C18.526,20.903 17.639,20.934 16.925,20.566 L7.311,15.619 L7.311,19.105 L8.117,19.472 C8.519,19.654 8.761,19.951 8.761,20.260 L8.761,21.798 L17.209,26.359 C17.780,26.695 18.522,26.687 19.084,26.339 L40.398,15.193 C40.904,14.880 41.206,14.364 41.206,13.813 L41.206,9.786 Z"/>
														</svg>
													</div>
													<div class="nav-guide-bar-item-text svg-path-use-guide" style="font-size: 10px; font-weight: 600; color: rgb(172, 150, 58);">
														<span style="font-size: 9px;">Hướng dẫn</span><br><span style="font-size: 12px;">SỬ DỤNG</span>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
									</div>
									<div class="nav-right-noti-popup">
										<div class="noti-popup-box">
											<div class="noti-popup-title">
												<span><i class="fa fa-bell" aria-hidden="true"></i> THÔNG BÁO</span>
												<i class="fa fa-times" aria-hidden="true" style="cursor: pointer; margin-right: 10px; float: right;" onclick="showNotiPopup()"></i>
											</div>
											<div class="noti-popup-content">
												@if (App\Http\Helpers\Helper::getNoticeList())
												@foreach (App\Http\Helpers\Helper::getNoticeList() as $nl)
												<a href="{{ $nl['link'] }}" target="_blank"><div class="noti-pop-item">
													<div class="noti-pop-item-text">
														<span>{{ $nl['title'] }}</span>
													</div>
													<div class="noti-pop-item-date">
														<span>{{ $nl['date_display'] }}</span>
													</div>
												</div></a>
												@endforeach
												@endif
											</div>
										</div>
									</div>
									<div class="newpub-guide bottom-guide step_7_detail">
										<div class="newpub-guide-box">
											<span>{{ trans('guide_newbie_detail.step_7') }}</span>
											<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
											<button class="btn btn-success btn-guide-next" data-step="8">Tiếp tục</button>
										</div>
									</div>
								</div>
							</div>
							<div class="newpub-nav-half-bg">
							</div>
						</div>
					</div>
					<div class="newpub-page-main-content">
						<div class="newpub-page-main-content-box">
							<div class="good-night-layer"></div>
							@yield('newpub_main_content')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if($_SERVER['REQUEST_URI'] == "/academy" || $_SERVER['REQUEST_URI'] == "/newpub/academy")
	<div class="loading-page-icon">
		<img src="{{ asset('/uploads/academy/page_loading.gif') }}" alt="" style="max-width: 100%; align-self: center; margin: auto;">
	</div>
	@endif
	@if($_SERVER['REQUEST_URI'] == "/academy" || $_SERVER['REQUEST_URI'] == "/newpub/academy")
	<div id="modal-video-box" class="adpia_academy modal-video">
		<div class="modal-video-content">
			<span class="close-modal-video">&times;</span>
			<iframe width="1519" height="554" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-image: url('{{ config('const.ac_adpia') }}/upload/images/academy-wait-loading.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;"></iframe>
		</div>
	</div>
	@endif
	<div class="newpub-generate-link-mobile">
		<div class="newpub-generate-link-mobile-box">
			<div class="newpub-generate-link-mobile-icon">
				<img src="{{ asset('images/extension_icon.png') }}" alt="">
			</div>
			<div class="newpub-generate-link-mobile-text">
				<span>Newpub Generate Link</span>
			</div>
		</div>
	</div>
	<div style="position: fixed; bottom: -10px; right: 0; z-index: 999;" class="newpub-zalo-group-contact">
			<div style="display: flex; border-radius: 8px; align-items: center; width: fit-content; margin: auto; margin-top: 5px; direction: ltr; position: relative;" class="newpub-zalo-group-contact-inner">
				<a href="{{ $user[0]['zalo_group'] ? $user[0]['zalo_group'] : '#' }}" target="_blank">
					<lottie-player src="{{ asset('images/zalo_group/zalo.json') }}"  background="transparent"  speed="1"  style="width: 120px; height: auto;"  loop autoplay></lottie-player>
				</a>
				<div style="position: absolute; top: -20px; right: 5px; cursor: pointer;" onclick="handleHidenZaloGroup(event)">
					<div class="zalo-group-hidden-button"><i class="fa fa-times" style="color: red;"></i></div>
				</div>
			</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/TweenMax.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/DrawSVGPlugin.js') }}"></script>
	<script type="text/javascript" src="{{ url("js/particles.js-master/particles.js") }}"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176720486-1"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.js') }}"></script>
	<script src="{{ asset('js/chart.core.js') }}"></script>
	<script src="{{ asset('js/chart.charts.js') }}"></script>
	<script src="{{ asset('js/chart.material.js') }}"></script>
	<script src="{{ asset('js/chart.animated.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script src="{{ asset('js/clipboard.js') }}"></script>
	<script src="{{ asset('js/slick.js') }}"></script>

	<script src="{{ asset('assets/build/js/custom.js') }}"></script>

	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-176720486-1');
	</script>
	
	@yield('newpub_script')
	<script>
		jQuery(document).ready(function($) {
			setWidthSchema();
			var userAgent = navigator.userAgent || navigator.vendor || window.opera;
			if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        		$(".newpub-zalo-group-contact").css('animation-name', 'none');
    		}
		});
		$(window).resize(function(event) {
			setWidthSchema();
		});
		function setWidthSchema(argument) {
			if(window.innerWidth > 750) {
				$(".newpub-right-bar").css('max-width',  (window.innerWidth - 210 - 20 + 3));
			} else if(window.innerWidth > 550 && window.innerWidth < 750) {
				$(".newpub-right-bar").css('max-width',  (window.innerWidth - 20 + 3));
			} else {
				$(".newpub-right-bar").css('max-width',  window.innerWidth);
			}
			$(".list-offer-cate-mb-box").css('max-width', window.innerWidth - 20);
			if(window.innerWidth > 1360) {
				$(".banner-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - 280 - $(".detail-get-product-link-offer").width() - 20 - 20 - 20 - 20 - 20);
				$(".video-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - 280 - $(".detail-get-product-link-offer").width() - 20 - 20 - 20 - 20 - 20);
			} else if(window.innerWidth > 860 && window.innerWidth <= 1360) {
				$(".banner-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - $(".detail-get-product-link-offer").width() - 20 - 20 - 20 - 20 - 20);
				$(".video-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - $(".detail-get-product-link-offer").width() - 20 - 20 - 20 - 20 - 20);
			} else if(window.innerWidth > 750 && window.innerWidth <= 860) {
				$(".banner-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - 20 - 20 - 20 - 20 + 3);
				$(".video-link-offer-content").css('max-width', window.innerWidth - 20 - 210 - 20 - 20 - 20 - 20 + 3);
			} else if(window.innerWidth > 550 && window.innerWidth <= 750) {
				$(".banner-link-offer-content").css('max-width', window.innerWidth - 20 - 20 - 20 - 20 - 20 + 3);
				$(".video-link-offer-content").css('max-width', window.innerWidth - 20 - 20 - 20 - 20 - 20 + 3);
			}
			$(".nav-am-contact").css({
				width: $(".nav-am-info").innerWidth() - 20,
				height: $(".nav-am-info").innerHeight()
			});
			$(".drop-content").css({
				width: $(".nav-show-drop").innerWidth(),
				top: $(".nav-show-drop").innerHeight()
			});
			$(".drop-content-550").css({
				width: $(".show-drop-550").innerWidth(),
				top: $(".show-drop-550").innerHeight()
			});
			$("#am-contact-info-550").css({
				width: $(".am-info-550").innerWidth(),
				top: $(".am-info-550").innerHeight() + 5,
			});
			$("#am-contact-info-1180").css({
				width: $(".nav-am-info").eq(0).innerWidth(),
				top: $(".nav-am-info").eq(0).innerHeight() + 5,
			});
			if(window.innerWidth > 550) {
				$(".nav-right-noti-popup").css({
					width: $(".nav-right-box").innerWidth(),
					top: $(".nav-right-box").innerHeight()
				});
			} else {
				$(".nav-right-noti-popup").css({
					width: '100%',
					top: $(".nav-right-box").innerHeight()
				});
			}
			if(window.innerWidth <= 550) {
				$(".newpub-nav-special-button").css('margin-top', $(".newpub-nav-top-bar").innerHeight());
			} else {
				$(".newpub-nav-special-button").css('margin-top', '0');
			}
		}
	</script>
	<script>
		$(function() {
			$(".newpub-nav-half-bg").css('height', ($(".newpub-nav-box").innerHeight() / 2));

			$(".nav-show-drop").click(function(event) {
				if($(".drop-content").hasClass('active'))
				{
					$(this).css('border-radius', '20px');
					$(".drop-content").removeClass('active');
					$(".drop-content").css('display', 'none');
				} else {
					hiddenAllDropdownViewer();
					$(this).css('border-radius', '13px 13px 0 0');
					$(".drop-content").addClass('active');
					$(".drop-content").css('display', 'block');
				}
			});

			$(".nav-am-name").click(function(event) {
				if($(".nav-am-contact").css('left') == '0px') {
					hiddenAllDropdownViewer();
					$(".nav-am-contact").animate({
						left: $(".nav-am-info").innerWidth() - 50
					}, 500);
				} else {
					$(".nav-am-contact").stop(true, true).animate({
						left: 0
					}, 500);
				}
			});

			$("#drop-user-menu").css('width', $(".nav-user-avatar").width() + $(".nav-user-name").width() + 10);

		});
		function showNotiPopup() {
			if($(".nav-right-noti-popup").css('display') === 'none') {
				$(".nav-right-noti-popup").css('display', 'block');
				$(".good-night-layer").css('display', 'block');
				if($(window).width() > 550) {
					$(".nav-user-name").css('color', '#ffffff');
					$(".nav-right-box").css('background-color', 'transparent');
				}
			} else {
				$(".nav-right-noti-popup").css('display', 'none');
				$(".good-night-layer").css('display', 'none');
				$(".nav-user-name").css('color', '#000000');
			}
		}
		$(".btn-show-hide-left-menu-box").click(function(event) {
			if($(window).width() > 550) {
				if($(".newpub-left-bar").css("left") == '-210px') {
					$(".newpub-left-bar").animate({
						left: 0
					},
					1000, function() {
						$(".btn-show-hide-left-menu-box img").css('transform', 'rotate(180deg)');
					});
				} else {
					$(".newpub-left-bar").animate({
						left: -210
					},
					1000, function() {
						$(".btn-show-hide-left-menu-box img").css('transform', 'rotate(0deg)');
					});
				}
			} else {
				if($(".newpub-left-bar").css("left") == '-260px') {
					$(".newpub-left-bar").animate({
						left: 0
					},
					1000, function() {
						$(".btn-show-hide-left-menu-box img").css('transform', 'rotate(180deg)');
					});
				} else {
					$(".newpub-left-bar").animate({
						left: -260
					},
					1000, function() {
						$(".btn-show-hide-left-menu-box img").css('transform', 'rotate(0deg)');
					});
				}	
			}
		});

		function showPopupExtension() {
			window.open('https://chrome.google.com/webstore/detail/adpia-newpub-generate-lin/danlckphhegpacocoiceolhljkcnnpbo?hl=vi');
		}

		function setShowHideChild(obj) {
			if($("#news-child").css('display') == 'none') {
				$("#news-child").css('display', 'block');
				$(obj).children('div').addClass('newpub-item-active');
			} else {
				$("#news-child").css('display', 'none');
				$(obj).children('div').removeClass('newpub-item-active');
			}
		}

		function toolsShowHideChild(obj) {
			if($(window).width() > 550) {
				if($("#tools-child").css('display') == 'none') {
					$("#tools-child").css('display', 'block');
					$(obj).children('div').addClass('newpub-item-active');
				} else {
					$("#tools-child").css('display', 'none');
					$(obj).children('div').removeClass('newpub-item-active');
				}
			} else {
				toastr.warning('Bạn cần sử dụng pc để có thế sử dụng được chức năng này!');
			}
		}
	</script>
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
    	var baseUrl = '{{ url('/') }}';

    	@if(\Session::has('error'))
    	toastr.error('{{ \Session::get('error') }}');
    	@endif
    	@if(\Session::has('success'))
    	toastr.success('{{ \Session::get('success') }}');
    	@endif

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
    				url: '{{ route('newpub.shortlink') }}',
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
    			url: '{{ route('newpub.shortlink') }}',
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

	function hideMobileMenu() {
		$("#newpub-main-menu-mobile").stop().animate({
			left: -550
		}, 1000, function () {
			$("#newpub-main-menu-mobile").css('display', 'none');
		});
	}
	function showMenuMobile() {
		$(".btn-show-hide-left-menu-box").click();
	}
	function showHideNewsChildMb() {
		if($("#news-child-mobile").css('display') == 'none') {
			$("#news-child-mobile").css('display', 'block');
		} else {
			$("#news-child-mobile").css('display', 'none');
		}
	}
	function showHideToolsChildMb() {
		if($("#tools-child-mobile").css('display') == 'none') {
			$("#tools-child-mobile").css('display', 'block');
		} else {
			$("#tools-child-mobile").css('display', 'none');
		}
	}

	$(".nav-user-name").click(function(event) {
		if($("#drop-user-menu").css('display') == 'none') {
			hiddenAllDropdownViewer();
			$("#drop-user-menu").css('display', 'block');
		} else {
			$("#drop-user-menu").css('display', 'none');
		}
	});
	$(".nav-user-avatar").click(function(event) {
		if($("#drop-user-menu").css('display') == 'none') {
			hiddenAllDropdownViewer();
			$("#drop-user-menu").css('display', 'block');
		} else {
			$("#drop-user-menu").css('display', 'none');
		}
	});

	window.onclick = function(event) {
		if (event.target == document.getElementsByClassName("good-night-layer")[0]) {
			showNotiPopup();
		}
		if(!$(event.target).hasClass('newpub-custom-drop')) {
			hiddenAllDropdownViewer();
		}
	}

	$(".newpub-social-button-box").click(function(event) {
		if($(event.target).hasClass('newpub-social-button-box') || event.target.tagName == 'IMG') {
			$(".social-child-zalo-icon").finish();
			$(".social-child-messenger-icon").finish();
			if($(".social-child-zalo-icon").css('top') == '50px') {
				$(".social-child-zalo-icon").stop(true, true).animate({
					top: -30,
					left: 0
				}, 500);
			} else {
				$(".social-child-zalo-icon").stop(true, true).animate({
					top: '50px',
					left: '50px'
				}, 500);
			}

			if($(".social-child-messenger-icon").css('left') == '50px') {
				$(".social-child-messenger-icon").stop(true, true).delay(200).animate({
					left: 82,
					top: -30
				}, 500);
			} else {
				$(".social-child-messenger-icon").stop(true, true).delay(200).animate({
					left: '50px',
					top: '50px'
				}, 500);
			}
		}
	});

	function showHide_AMInfo_550() {
		if($(window).width() > 550) {
			if($("#am-contact-info-1180").css('display') == 'none') {
				$("#am-contact-info-1180").css('display', 'block');
			} else {
				$("#am-contact-info-1180").css('display', 'none');
			}
		} else {
			if($("#am-contact-info-550").css('display') == 'none') {
				$("#am-contact-info-550").css('display', 'block');
			} else {
				$("#am-contact-info-550").css('display', 'none');
			}
		}
	}

	$("#am-contact-info-550").click(function(event) {
		$("#am-contact-info-550").css('display', 'none');
	});

	$("#am-contact-info-1180").click(function(event) {
		$("#am-contact-info-1180").css('display', 'none');
	});

	function hiddenAllDropdownViewer() {
		$(".nav-am-contact").stop(true, true).animate({
			left: 0
		}, 500);

		$(".nav-show-drop").css('border-radius', '20px');
		$(".drop-content").removeClass('active');
		$(".drop-content").css('display', 'none');

		$("#drop-user-menu").css('display', 'none');

		$(".filter-commissipn-drop").removeClass('active');
		$(".filter-commissipn-drop").css('display', 'none');

		$(".nav-month-event-drop-content").css('display', 'none');
	}

	function showButtonCaptionMb(obj, child) {
		$(".newpub-nav-special-button-item").removeClass('special-button-active-mb');
		$(obj).addClass('special-button-active-mb');
		$(".newpub-nav-special-button-caption-item").removeClass('caption-item-active');
		$("." + child + "-caption-item").addClass('caption-item-active');
	}

	$(".nav-month-event-carret-down, .newpub-nav-event-box").click(function(event) {
		event.stopPropagation();
		if($(".nav-month-event-drop-content").css('display') == 'none') {
			hiddenAllDropdownViewer();
			$(".nav-month-event-drop-content").css('display', 'block');
		} else {
			$(".nav-month-event-drop-content").css('display', 'none');
		}
	});

	$(document).click(function(event) {
		if(!$(event.target).closest(".nav-month-event-carret-down").length) {
			$(".nav-month-event-drop-content").css('display', 'none');
		}
	});

	$(".nav-month-event-text").click(function(event) {
		event.stopPropagation();
		$(".nav-month-event-drop-content").css('display', 'none');
		var url = $(this).attr('data-url');
		window.open(url, '_blank');
	});

	function handleHidenZaloGroup(e) {
		e.stopPropagation();
		$(".newpub-zalo-group-contact").addClass('zalo-group-hidden');
	}
</script>
</body>
</html>
