@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate Academy')
@section('newpub_style')
<link rel="stylesheet" href="{{ url("css/academy/styles.css") }}">
<style>
	html {
		scroll-behavior: unset;
	}
	.newpub-container {
		opacity: 0;
	}
	.right_col {
		background: linear-gradient(rgb(39, 44, 95), rgb(73, 45, 120)) !important;
		padding: 10px 0 60px 0 !important;
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 999;
		padding: 15px 0;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.4);
	}

	.modal-content {
		position: relative;
		background-color: rgb(17, 19, 40);
		margin: auto;
		padding: 0;
		border: 1px solid #888;
		width: 90%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		-webkit-animation-name: animatetop;
		-webkit-animation-duration: 0.4s;
		animation-name: animatetop;
		animation-duration: 0.4s;
		border-radius: 20px;
		overflow: hidden;
	}

	/* Add Animation */
	@-webkit-keyframes animatetop {
		from {top:-300px; opacity:0} 
		to {top:0; opacity:1}
	}

	@keyframes animatetop {
		from {top:-300px; opacity:0}
		to {top:0; opacity:1}
	}

	/* The Close Button */
	.close {
		color: white;
		float: right;
		font-size: 28px;
		font-weight: bold;
		background-color: #f00;
		padding: 0 3px;
		border-radius: 50%;
		font-size: 16px;
		opacity: 1;
		margin-right: 5px;
		margin-top: 5px !important
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}

	.modal-header {
		padding: 2px 0px;
		background-color: rgb(17, 19, 40);
		color: white;
		display: flex;
		border-bottom: none;
		margin-bottom: 20px;
	}

	.modal-body {padding: 2px 16px; padding-bottom: 15px;}

	.modal-footer {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
	}
	.loading-page-icon {	
		position: fixed;
		left: 0;
		top: 50%;
		transform: translateY(-50%);
		height: 100%;
		z-index: 9999;
		width: 100%;
		text-align: center;
		background: rgb(247, 198, 19);
		display: flex;
	}
	/*====================================*/
	.academy-flex-item {
		padding: 10px;
		text-align: center;
	}
	.academy-flex-item .academy-flex-main-background {
		background-color: rgb(9, 15, 66);
		box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
	}
	.academy-flex-item.academy-right-flex {
		width: 30%;
	}
	.academy-flex-item.academy-left-flex {
		width: 70%;
	}
	.academy-flex-row {
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
		flex: 1 0 auto;
	}
	.academy-flex-container {
		padding-left: 8px;
		padding-right: 8px;
	}
	.academy-flex-row:nth-child(2) .academy-flex-item:nth-child(1) {
		order: 1;
	}
	.academy-flex-row:nth-child(2) .academy-flex-item:nth-child(2) {
		order: 2;
	}
	@media (max-width: 1240px) {
		.academy-flex-row:nth-child(1) .academy-flex-item:nth-child(2) {
			display: none;
		}
		.academy-flex-row:nth-child(1) .academy-flex-item:nth-child(1) {
			width: 100%;
		}
	}
	@media (max-width: 900px) {
		.modal-video-content iframe {
			height: 400px !important;
		}
	}
	@media (max-width: 768px) {
		.academy-flex-row:nth-child(1) .academy-flex-item:nth-child(1) {
			display: none;
		}
		.academy-flex-row:nth-child(1) .academy-flex-item:nth-child(2) {
			display: block;
			width: 100%;
		}
		.academy-flex-row:nth-child(2) .academy-flex-item:nth-child(1) {
			width: 100%;
		}
		.academy-flex-item.academy-right-flex {
			width: 100%;
		}
		.adpia_academy .bottom-light-rank {
			max-height: 100%;
		}
		.modal-video-content iframe {
			height: 350px !important;
		}
	}
	@media (max-width: 550px) {
		.modal-video-content iframe {
			height: 250px !important;
		}
	}
	@media (max-width: 414px) {
		.academy-flex-row:nth-child(2) .academy-flex-item:nth-child(2) {
			display: block;
			width: 100%;
			order: 1;
		}
		.academy-flex-row:nth-child(2) .academy-flex-item:nth-child(1) {
			display: block;
			width: 100%;
			order: 2;
		}
		.academy-flex-row:nth-child(2) {
			flex-direction: column;
		}
		.academy-flex-container {
			padding: 0;
		}
		.adpia_academy .bottom-light-rank {
			width: unset;
		}
		.adpia_academy .flag-rank {
			transform: translateX(-15%);
		}
	}
	@media (max-width: 375px) {
		.adpia_academy .flag-rank {
			transform: translateX(-25%);
		}
	}
	@media (max-width: 375px) {
		.adpia_academy .flag-rank {
			transform: translateX(-30%);
		}
	}
	.newpub-page-main-content-box {
		flex-direction: column;
	}
</style>
@stop
@section('newpub_main_content')
@php
$dUrl = 'https://devnewpub.adpia.vn:6443/';
@endphp
<div class="adpia_academy right_col" role="main">
	<div class="academy-flex-container">
		<div class="academy-flex-row">
			<div class="academy-flex-item academy-left-flex">
				<div class="list-ranking">
					@if($ranks)
					@foreach($ranks as $rank)
					@if($yourRank == $rank->name)
					<div class="rank-item active">
						@else
						<div class="rank-item">
							@endif
							<div class="rank-icon">
								@if($rank->id <= $yourRankID)
								<img src="/uploads/academy/{{ $rank->icon }}" alt="">
								@else
								<img src="/uploads/academy/rank-hidden.png" alt="">
								@endif
							</div>
							<div class="rank-point">
								<span>{{ number_format($rank->point, 0, ',', '.') }} ??I????M</span>
							</div>
							<div class="rank-name">
								<span>{{ $rank->name }}</span>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<div class="academy-flex-item academy-right-flex">
					<div class="slide-smaller">
						<div class="owl-carousel owl-theme">
							@if(isset($onlineEvents))
							@foreach($onlineEvents as $ev)
							<div class="item">
								<a href="{{ $ev->event_link }}">
									<img src="/uploads/academy/{{ $ev->event_banner }}" alt="">
								</a>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="academy-flex-row">
				<div class="academy-flex-item academy-main-item academy-left-flex">
					<div class="academy-flex-main-background">
						<div class="content-ranking" style="position: relative;">
							<div class="row-info-content">
								<div class="row-info-left">
									<div class="rank-info-mobile">
										<div class="rank-name-mb"><span>{{ mb_strtoupper($yourRank) }}</span></div>
										<div class="view-all-mb-area"><button class="btn-view-all-rank-mb" id="myBtn">XEM T???T C??? TH??? H???NG</button></div>
									</div>
									<div class="info-user-name">
										<span>{{ auth()->user()->account_id }}</span>
									</div>
									<div class="info-user-commission">
										<span>Hoa h????ng ta??m duy????t: {{ $yourselCom }} vn??</span>
									</div>
									<div class="info-user-point">
										??I????M BA??N CO??: <span>{{ $yourselPoint }}</span> ??I????M
									</div>
									<div class="info-user-helper">
										<button class="btn-ql" onclick="showQL()">QUY????N L????I</button>
										<button class="btn-nth" onclick="showNTH()">CA??CH N??NG TH???? HA??NG</button>
									</div>
									<div class="info-user-to-grow-up">
										<span>Ba??n c????n <span class="point-to-grow-up">0</span> ??i????m ?????? n??ng ha??ng cho mi??nh</span>
									</div>
									<div class="btn-mb-area">
										<button class="btn-nth" onclick="showNTH()">CA??CH N??NG TH???? HA??NG</button>
									</div>
								</div>
								<div class="row-info-right">
									<div class="info-user-to-grow-up to-grow-up-mobile">
										<span>Ba??n c????n <span class="point-to-grow-up">0</span> ??i????m<br> ?????? n??ng ha??ng cho mi??nh</span>
									</div>
									<?php include("layouts/svg_main_rank_".(explode('.', $yourIcon))[0].".blade.php"); ?>
								</div>
							</div>
							<div class="row-user-range">
								<div class="text-now-rank">
									<span>HA??NG HI????N TA??I</span>
								</div>
								<div class="user-range-bar">
									<div class="begin-point"><span>{{ $startPoint }}</span></div>
									<div class="point-bar">
										<div class="point-line"></div>
										<div class="point-flag">
											<div class="flag-point">
												<span><!-- this is user rank point --></span>
											</div>
											<div class="flag-shine"></div>
											<div class="flag-bottom">
												<img src="/uploads/academy/bottom-flag.png" alt="" style="width: 100%;">
											</div>
										</div>
									</div>
									<div class="end-point"><span>{{ $endPoint }}</span></div>
								</div>
								<div class="text-next-rank">
									<span>HA??NG TI????P THEO</span>
								</div>
							</div>
							<div id="particles-js" style="position: absolute; top: 0; left: 0; height: 80%; width: 15%;">
							</div>
							<div id="particles-2-js" style="position: absolute; top: 0; right: 0; height: 80%; width: 15%;">
							</div>
						</div>
			<!-- 
			-------------------------------
			---------- Quy????n L????i ----------
			------------------------------- 
			-->
		<div class="ql-ranking" style="overflow-x:auto;">
			<table style="width: 100%;" cellpadding="0" cellspacing="0">
				<tr class="row-ql-ranking sl header">
					<td>QUY????N L????I</td>
					@if(isset($ranks))
					@foreach($ranks as $rank)
					<td>{{ $rank->name }}</td>
					@endforeach
					@endif
				</tr>
				@if(isset($rights))
				@foreach($rights as $right)
				<tr class="row-ql-ranking sc">
					<td>{{ $right->name }}</td>
					@if(isset($rules))
					@foreach($rules as $rule)
					@if($rule->right == $right->name)
					@if($rule->value == 'TRUE')
					<td><img src="/uploads/academy/v-icon.png" style="width: 20px"></td>
					@else
					<td></td>
					@endif
					@endif
					@endforeach
					@endif
				</tr>
				@endforeach
				@endif
			</table>
		</div>

		@if(isset($incentives) && count($incentives) > 0)
		<div class="free-100-lession" style="padding: 20px;">
			<div class="free-header">
				<div class="left-header">CA??C ??U ??A??I ??I??NH KE??M</div>
				<a href="{{ config('const.adpia_youtube') }}" target="_blank"><div class="right-header">Xem to??n b??? danh s??ch</div></a>
			</div>
			<div class="free-lession-video">
				<div class="owl-carousel owl-theme">
					@foreach($incentives as $inc)
					<div class="item">
						<div class="video-content" onclick="showVideoModal('{{ $inc->incentive_link }}')">
							<img src="/uploads/academy/{{ $inc->incentive_banner }}" alt="" style="width: 100%">
							<div class="turn-off-light-vidieo-incentive">
								<div style="width: 20%; margin: auto;">
									<img src="/uploads/academy/play-video-icon.png">
								</div>
							</div>
						</div>
						<div class="video-title">
							{{ $inc->incentive_name }}
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif

		
		<div class="offline-event-box">
			<div class="offline-event-header">
				S???? KI????N S???P DI???N RA
			</div>
			<div class="offline-event-content">
				<div class="offline-event-description">
					<div class="owl-carousel owl-theme">
						@if(isset($offlineEvents))
						@foreach($offlineEvents as $key => $ev)
						<div class="item">
							<div class="offline-event-img" data-banner-mb="/uploads/academy/{{ $ev->event_banner_mobile }}">
								<img src="/uploads/academy/{{ $ev->event_link_content }}" style="width: 100%;">
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>

			<div class="offline-event-content-mb">
				<div class="owl-carousel owl-theme">
					@if(isset($offlineEvents))
					@foreach($offlineEvents as $key => $ev)
					@if($key == 0)
					<div class="item active" data-url="{{ $ev->event_url }}">
						<div><img src="/uploads/academy/{{ $ev->event_banner_mobile }}" alt="" style="width: 100%;"></div>
					</div>
					@else
					<div class="item" data-url="{{ $ev->event_url }}">
						<div><img src="/uploads/academy/{{ $ev->event_banner_mobile }}" alt="" style="width: 100%;"></div>
					</div>
					@endif
					@endforeach
					@endif
				</div>
			</div>

			@if(isset($newbieVideos) && count($newbieVideos) > 0)
			<div class="free-100-lession">
				<div class="free-header">
					<div class="left-header">B??I H???C C?? B???N CHO PUBLISHER M???I B???T ?????U</div>
					<div class="right-header">Kh??a h???c mi???n ph?? 100%</div>
				</div>
				<div class="free-lession-video">
					@foreach($newbieVideos as $video)
					<div class="free-lession-video-item">
					<div class="video-content" onclick="showVideoModal('{{ $video->newbie_video_link }}')">
						<img src="{{ $video->newbie_video_banner }}" alt="" style="width: 100%">
						<div class="turn-off-light-vidieo-incentive">
							<div style="flex: 0 0 40px; margin: auto;">
								<img src="/uploads/academy/play-video-icon.png">
							</div>
						</div>
					</div>
					<div class="video-title">
						{{ $video->newbie_video_title }}
					</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
		</div>
			<!-- 
			----------------------------------
			----------End Quy????n L????i ----------
			----------------------------------
			-->

			<!-- 
			----------------------------------
			----------N??ng Th???? Ha??ng ----------
			----------------------------------
			-->
		<div class="nth-ranking" style="overflow-x:auto;">
			<nav class="tabs">
				<div class="selector"></div>
				@if($ranks)
				@foreach($ranks as $key => $rank)
				<a href="javascript:;" data-level="{{ ($key + 1) }}">{{ $rank->name }}</a>
				@endforeach
				@endif
			</nav>
			@if(isset($lessions))
			@foreach($lessions as $key => $less)
			<table class="tbl-lession" style="width: 100%;" cellpadding="0" cellspacing="0" id="tabs-ls{{($key + 1)}}">
				<tr class="row-nth-ranking sl header">
					<td colspan="4">CA??CH N??NG TH???? HA??NG</td>
				</tr>

				<tr class="row-nth-ranking sl bottom-header">
					<td>{{ $less->lession_name }}</td>
					<td>Video</td>
					<td>PDF</td>
					<td>PowerPoint</td>
				</tr>
				@if(isset($sectionsInLession))
				@php
				$cnt = false;
				@endphp
				@foreach($sectionsInLession as $k => $sec)
				@if($sec->lession_id == $less->id)
				<tr class="row-nth-ranking sc" data-less="{{ ($key + 1) }}_{{ ($k + 1) }}">
					<td><span>{{ $sec->section_name }}</span></td>
					<td><span class="view-video-lession" onclick="showVideo(this, '{{ $sec->section_video }}')"><img src="/uploads/academy/play-video-normal.png" alt="" style="width: 10px;"></span></td>
					<td><img src="/uploads/academy/PDF-icon.png" onclick="downloadPDF(this, '{{ $sec->section_pdf }}')" style="width: 20px; cursor: pointer;"></td>
					<td><img src="/uploads/academy/PPT-icon.png" onclick="downloadPPT(this, '{{ $sec->section_ppt }}')" style="width: 20px; cursor: pointer;"></td>
				</tr>
				@php
				$cnt = true;
				@endphp
				@endif
				@endforeach
				@if(!$cnt)
				<tr class="row-nth-ranking sc">
					<td colspan="4" style="text-align: center;"><span>B??i h???c ??ang ???????c c???p nh???t...</span></td>
				</tr>
				@endif
				@endif
			</table>
			@endforeach
			@endif
		</div>
		<div class="question-box">
			<div class="question-area">
				<div class="question-header">
					C??U HO??I TH??????NG G????P
				</div>
				<div class="question-content">
					@if(isset($ranks))
					@foreach($ranks as $r)
					<div class="qa-group">
						@if(isset($qas))
						@php
						$cnt = false;
						@endphp
						@foreach($qas as $v)
						@if($v->rank_id == $r->id)
						<button class="collapsible"><i class="fa fa-circle" aria-hidden="true"></i>{!! $v->qa_question !!}</button>
						<div class="content">
							<p>{!! $v->qa_answer !!}</p>
						</div>
						@php
						$cnt = true;
						@endphp
						@endif
						@endforeach
						@if(!$cnt)
						<div style="padding: 18px 18px 18px 0;">C??u h???i ??ang ???????c c???p nh???t...</div>
						@endif
						@endif
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="fb-comments-area">
			<div class="fb-comments-content">
				<div class="fb-comments" data-href="{{ asset('academy') }}" data-width="100%" data-numposts="10"></div>
			</div>
		</div>
	</div>
</div>
<div class="academy-flex-item academy-right-flex">
	<div class="top-ranking">
		<table style="width: 100%;" cellspacing="0" cellpadding="0" class="table-top-rank">
			<tr>
				<td colspan="2" class="user-rank-name">
					<span>TH???? HA??NG CU??A BA??N</span>
				</td>
				<td rowspan="2" style="position: relative;">
					<img src="/uploads/academy/bottom-light-ranking.png" alt="" class="bottom-light-rank">
					<img src="/uploads/academy/top-10-ranking.png" alt="" class="flag-rank">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="user-rank-icon">
					<img src="/uploads/academy/{{ $yourIcon }}" alt="" width="60px">
				</td>
			</tr>

			@if(isset($top10))
			@php
			$r = 1;
			@endphp
			@for($k = (count($top10) - 1); $k >= 0 ; $k--)
			@if($k % 2 == 1)
			<tr class="row-top-rank row-sl">
				@else
				<tr class="row-top-rank row-sc">
					@endif
					<td style="height: 35px;">
						<span>{{ $r }}</span>
					</td>
					<td style="height: 35px;">
						<span>{{ $fakeName[$r-1] }}</span>
					</td>
					<td style="height: 35px;" class="point-top-3-ranking">
						<span>{{ $top10[$k] }}</span>
						@if($r == 1)
						<img src="/uploads/academy/gold-medal.png" alt="" style="width: 20px;">
						@elseif($r == 2)
						<img src="/uploads/academy/silver-medal.png" alt="" style="width: 20px;">
						@elseif($r == 3)
						<img src="/uploads/academy/bronze-medal.png" alt="" style="width: 20px;">
						@endif
					</td>
				</tr>
			</tr>
			@php
			$r++;
			@endphp
			@endfor
			@endif
		</table>
	</div>
</div>
</div>
</div>
</div>
</div>
<div class="alert alert-danger" role="alert" style="position: fixed; top: -150px; left: 50%; transform: translateX(-50%); opacity: 0; z-index: 9999;">
	<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Rank cu??a ba??n ch??a ??u?? ?????? xem nh????ng ba??i ho??c na??y. Ha??y c???? g????ng h??n n????a nhe??!.</strong>
</div>
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-header">
			<div style="width: 20%;"></div>
			<div style="width: 60%; background-image: linear-gradient(#fff, rgb(148, 148, 148));; color: rgb(39, 44, 95); text-align: center; border-radius: 0 0 20px 20px;"><h2 style="font-size: 12px; font-weight: 600;">T???NG H???P TH??? H???NG</h2></div>
			<div style="width: 20%;"><span class="close">&times;</span></div>
		</div>
		<div class="modal-body">
			@if(isset($ranks))
			@foreach($ranks->reverse() as $rank)
			@if($rank->name == $yourRank)
			<div style="text-align: center; background: rgb(235, 211, 137); width: 60%; margin: auto; color: rgb(38, 44, 101); border: 2px solid #fff; border-radius: 15px 15px 0 0; border-bottom: none;">{{ auth()->user()->account_id }}</div>
			@endif
			<div><img src="/uploads/academy/{{ $rank->icon }}.mb.png" style="width: 100%;" alt=""></div>
			@if($loop->last)
			@else
			<div style="text-align: center;"><img src="/uploads/academy/arrow_up.png" style="width: 25px; margin: 10px 0" alt=""></div>
			@endif
			@endforeach
			@endif
		</div>
	</div>

</div>
@stop
@section('newpub_script')
<script type="text/javascript" src="{{ url("js/particles.js-master/demo/js/app.js") }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ url("js/academy.js") }}?{{ config('const.asset.version') }}"></script>
<script>
	$(".close-modal-video").click(function(event) {
		$("#modal-video-box").css("display", "none");
		$(".newpub-container").css("filter", "brightness(1)");
		$(".modal-video-content iframe").attr("src", "");
	});

	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
				content.style.maxHeight = null;
			} else {
				content.style.maxHeight = content.scrollHeight + "px";
			} 
		});
	}

	$(".row-nth-ranking").delay(500).hover(function(){
		$(this).children().eq(1).children().children('img').attr("src", "/uploads/academy/play-video-hover.png");
		$(this).children().eq(1).children().children('img').css("width", "40px");
		$(this).children().eq(2).children('img').css("filter", "brightness(1)");
		$(this).children().eq(3).children('img').css("filter", "brightness(1)");
	}, function(){
		$(this).children().eq(1).children().children('img').attr("src", "/uploads/academy/play-video-normal.png");
		$(this).children().eq(1).children().children('img').css("width", "10px");
		$(this).children().eq(2).children('img').css("filter", "brightness(0.5)");
		$(this).children().eq(3).children('img').css("filter", "brightness(0.5)");
	});

	$(".nth-ranking .tabs").on("click","a",function(){
		var index = $(this).attr("data-level");
		var rankIndex = $(".rank-item.active").prevAll().length;
		if(parseInt(index) > parseInt(rankIndex + 1)) {
			$(".alert").stop(true, true).animate({
				top: 10, 
				opacity: 1,
			}, 1000 , function(){
				$(".alert").delay("2000").animate({
					top: -150, 
					opacity: 0,
				}, 1000)
			});
		} else {
			$('.nth-ranking .tabs a').removeClass("active");
			$(this).addClass('active');
			var activeWidth = $(this).innerWidth();
			var itemPos = $(this).position();
			$(".selector").css({
				"left":itemPos.left + "px", 
				"width": activeWidth + "px",
			});

			$(".tbl-lession").css("display", "none");
			$("#tabs-ls" + index).css("display", "table");

			$(".question-content .qa-group").css('display', 'none');
			for(var h = 0; h < $(".nth-ranking .tabs a").length; h++) {
				if($(".nth-ranking .tabs a").eq(h).hasClass('active')) {
					$(".question-content .qa-group").eq(h).css("display", "block");
				}
			}
		}
	});
</script>
<script>
	$(".slide-box .item").click(function(event) {
		$(".loading-event-offlije-slide").css("display", "flex");
		var img = $(this).attr("data-img");
		$(".offline-event-img img").attr("src", img);
		$(".slide-box .item").removeClass('active');
		$(this).addClass('active');
		var url = $(this).attr("data-url");
		if(url) {
			$(".offline-event-content a").attr("href", url);
		} else {
			$(".offline-event-content a").attr("href", "#");
		}
		$(".offline-event-img img").load(function(){
			$(".loading-event-offlije-slide").css("display", "none");
		});
	});

	window.addEventListener('resize', function(){
		if(window.innerWidth <= 1400) {
			$(".tbl-lession .bottom-header td:nth-child(4)").html("PPT");
		}
		if(window.innerWidth > 1150) {
			$("#Layer_1").attr("width", "280");
			$("#Layer_1").attr("height", "280");
			$(".user-rank-name span").html("TH??? H???NG C???A B???N");
		} if(window.innerWidth <= 1150 && window.innerWidth > 500) {
			$("#Layer_1").attr("width", "240");
			$("#Layer_1").attr("height", "240");
			$(".user-rank-name span").html("TH??? H???NG");
		} if(window.innerWidth <= 500 && window.innerWidth > 400) {
			$("#Layer_1").attr("width", "180");
			$("#Layer_1").attr("height", "180");
			$(".user-rank-name span").html("TH??? H???NG");
			$(".offline-event-img img").attr("src", $(".offline-event-img").attr("data-banner-mb"));
		} if(window.innerWidth <= 400) {
			$("#Layer_1").attr("width", "160");
			$("#Layer_1").attr("height", "160");
			$(".user-rank-name span").html("TH??? H???NG");
			$(".offline-event-img img").attr("src", $(".offline-event-img").attr("data-banner-mb"));
		}
	});

	$(function() {
		if(window.innerWidth <= 1400) {
			$(".tbl-lession .bottom-header td:nth-child(4)").html("PPT");
		}
		if(window.innerWidth > 1150) {
			$("#Layer_1").attr("width", "280");
			$("#Layer_1").attr("height", "280");
			$(".user-rank-name span").html("TH??? H???NG C???A B???N");
		} if(window.innerWidth <= 1150 && window.innerWidth > 500) {
			$("#Layer_1").attr("width", "240");
			$("#Layer_1").attr("height", "240");
			$(".user-rank-name span").html("TH??? H???NG");
		} if(window.innerWidth <= 500 && window.innerWidth > 400) {
			$("#Layer_1").attr("width", "180");
			$("#Layer_1").attr("height", "180");
			$(".user-rank-name span").html("TH??? H???NG");
			$(".offline-event-img img").attr("src", $(".offline-event-img").attr("data-banner-mb"));
		} if(window.innerWidth <= 400) {
			$("#Layer_1").attr("width", "160");
			$("#Layer_1").attr("height", "160");
			$(".user-rank-name span").html("TH??? H???NG");
			$(".offline-event-img img").attr("src", $(".offline-event-img").attr("data-banner-mb"));
		}
		$(".btn-mb-area button").click(function(event) {
			if($(this).attr("onclick") == "showNTH()") {
				$(this).attr("onclick", "showQL()");
				$(this).removeClass('btn-nth');
				$(this).addClass('btn-ql');
				$(this).html("QUY???N L???I");
			} else {
				$(this).attr("onclick", "showNTH()");
				$(this).removeClass('btn-ql');
				$(this).addClass('btn-nth');
				$(this).html("C??CH N??NG TH??? H???NG");
			}
		});
	});
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
	modal.style.display = "block";
	$(".right_col").css('filter', 'brightness(0.5)');
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
	$(".right_col").css('filter', 'unset');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
		$(".right_col").css('filter', 'unset');
	}
	if (event.target == document.getElementById("modal-video-box")) {
		document.getElementById("modal-video-box").style.display = "none";
		document.getElementsByClassName("body").style.filter = "brightness(1)";
	}
}

$(function() {
	var load = setTimeout(function(){
		$(".newpub-container").animate({
			opacity: 1
		}, 1000, function() {
			$(".loading-page-icon").css('display', 'none');
			$('.slide-smaller .owl-carousel').trigger('refresh.owl.carousel');
			$('.free-lession-video .owl-carousel').trigger('refresh.owl.carousel');
			$('.offline-event-bottom-list .owl-carousel').trigger('refresh.owl.carousel');
			$('.offline-event-content-mb .owl-carousel').trigger('refresh.owl.carousel');
			$(".offline-event-description .owl-carousel").trigger('refresh.owl.carousel');
		});
	}, 5000);
});
</script>
@stop