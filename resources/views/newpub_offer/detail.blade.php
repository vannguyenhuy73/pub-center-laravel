@extends('newpub_layouts.main')
@section('title', ucfirst($merchantInfo->merchant_id) . ' - ' . $merchantInfo->site_name)
@section('newpub_style')
<style>
	.main-content-left { border-top: unset;
	}
	.main-content-left-box {
		background-color: #f1f1f1;
		border-radius: 20px;
	}
	.collapsible {
		background-color: #ffffff;
		color: #000000;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 16px;
		font-weight: 600;
	}

	.active, .collapsible:hover {
		background-color: #ffffff;
	}

	.collapsible:after {
		content: '\002B';
		color: #ffffff;
		font-weight: bold;
		float: right;
		margin-left: 5px;
		background: #000000;
		padding: 0 6px;
		border-radius: 50%;
		border: 2px solid orangered;
	}

	.active:after {
		content: "\2212";
	}

	.content {
		padding: 0 18px;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
		background-color: #ffffff;
	}
	table {
		width: 100% !important;
	}

	@media (max-width: 550px) {
		.collapsible, .collapsible:hover {
			background-color: rgb(24, 45, 72);
			color: #ffffff;
			border-radius: 40px;
			margin-top: 30px;
			margin-bottom: 20px;
		}
		.collapsible:after {
			color: #ffffff;
		}
		img {
			max-width: 550px;
		}
	}
	
	.bg-red {
		background: #e74c3c!important;
		border: 1px solid #e74c3c!important;
		color: #fff;
	}
	.tick__yes {
		position: absolute;
		top: -20px;
		left: 40%;
		background: #ffffff;
		font-weight: 600;
		border-radius: 25px;
		color: red !important;
		padding: 5px 22px;
	}
	.adpia-promo-code-flip-card {
		flex: calc(100% / 4);
		max-width: calc(100% / 4);
		position: relative;
	}
	.flip-card {
	  background-color: transparent;
	  height: 144px;
	  perspective: 1000px;
	  padding: 10px;
	}
	.flip-card-inner {
	  position: relative;
	  width: 100%;
	  height: 100%;
	  text-align: center;
	  transition: transform 0.6s;
	  transform-style: preserve-3d;
	  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	  border-radius: 5px;
	}
	.flip-card:hover .flip-card-inner {
	  transform: rotateY(180deg);
	}
	.flip-card-front, .flip-card-back {
	  position: absolute;
	  width: 100%;
	  height: 100%;
	  -webkit-backface-visibility: hidden;
	  backface-visibility: hidden;
	  border-radius: 5px;
	  overflow: hidden;
	}
	.flip-card-front {
	  background-color: #bbb;
	  color: black;
	}
	.flip-card-front-box {
		padding: 20px;
		background: orange;
		text-align: center;
	}
	.flip-card-front-head {
		font-size: 20px;
		color: #ffffff;
		font-weight: 600;
		padding: 10px;
		border-bottom: 2px dashed #ffffff;
	}
	.flip-card-front-code {
		font-size: 12px;
		color: #ffffff;
		padding: 10px;
	}
	.flip-card-back {
	  background-color: #2980b9;
	  color: white;
	  transform: rotateY(180deg);
	}
	.flip-card-back {
		padding: 10px;
		height: 100%;
		display: flex;
		align-items: center;
		background: orange;
		flex-wrap: wrap;
	}
	.flip-card-back-detail {
		font-size: 12px;
		flex: 0 0 100%;
		max-width: 100%;
	}
	.flip-card-back-button {
		flex: 0 0 100%;
		max-width: 100%;
		display: flex;
		place-content: center;
	}
	.flip-card-back-copy-code, 
	.flip-card-back-redirect {
		padding: 0 5px;
	}
	.detail-full-info-show-box {
		display: flex;
		flex-wrap: wrap;
	}
	.adpia-promo-code-btn-load-more {
		padding: 10px;
		text-align: center;
	}
	@media (max-width: 1250px) {
		.adpia-promo-code-flip-card {
			flex: 0 0 calc(100% / 3);
			max-width: calc(100% / 3);
		}
	}
	@media (max-width: 1050px) {
		.adpia-promo-code-flip-card {
			flex: 0 0 calc(100% / 2);
			max-width: calc(100% / 2);
		}
	}
	@media (max-width: 800px) {
		.adpia-promo-code-flip-card {
			flex: 0 0 100%;
			max-width: 100%;
		}
	}
	@media (max-width: 750px) {
		.adpia-promo-code-flip-card {
			flex: 0 0 calc(100% / 2);
			max-width: calc(100% / 2);
		}
	}
	@media (max-width: 600px) {
		.adpia-promo-code-flip-card {
			flex: 0 0 100%;
			max-width: 100%;
		}
		.click-me-hand-icon {
			display: none;
		}
	}
	
	@keyframes aniScale {
    0% {
        padding-right: 0px;
    }
    100% {
        padding-right: 5px;
    }
}
</style>
@stop
@section('newpub_main_content')
<div class="main-content-left left-detail">
	<div class="main-content-left-box">
		<div class="detail-breadcrumb-nav">
			<div class="detail-breadcrumb-nav-box">
				<a href="{{ asset('newpub/offer_list') }}"><div class="detail-offer-header">
					<span>Chi???n d???ch</span>
				</div></a>
				<div class="detail-offer-name">
					<a href="https://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000"><span>{{ $merchantInfo->site_name }}</span></a>
				</div>
			</div>
		</div>
		<div class="detail-short-info-offer">
			<div class="detail-short-info-offer-box">
				<div class="detail-short-desc-merchant">
					<div class="detail-short-desc-merchant-box">
						<div class="short-desc-logo">
							<div class="short-desc-icon">
								<img src="{{ $merchantInfo->banner_url }}" alt="">
							</div>
							<div class="short-desc-name">
								<span>{{ ucfirst($merchantInfo->merchant_id) }}</span><br>
								@for ($i = 0; $i <= 5; $i++)
								<img src="{{ asset('images/star.png') }}" alt="">
								@endfor
							</div>
						</div>
						<div class="short-desc-site-desc">
							{{-- <span>{{ mb_substr($merchantInfo->site_desc, 0, 50) }}</span> --}}
						</div>
						<div class="short-desc-commission">
							@if($merchantInfo->com_display)
							<span>Hoa H???ng: <span style="color: #ec2d2a;">{{ $merchantInfo->com_display }}</span></span>
							@else
							<span class="badge bg-red">{{ pgm_get_merchant_com_info($merchantInfo->com_info, '-') }}</span>
							<span>Hoa H???ng: <span style="color: #ec2d2a;">{{ pgm_get_merchant_com_info($merchantInfo->com_info, '-') }}</span></span>
							@endif
						</div>
						<div class="short-desc-approval">
							@if(($merchantInfo->approval_type == 'AUT' && $merchantInfo->subs_status != 'DEN') || $merchantInfo->subs_status == 'APR')
							<div class="approval-main-button">
								<span>???? LI??N K???T</span>
								<div class="approval-icon-button">
									<i class="fa fa-check" aria-hidden="true"></i>
								</div>
							</div>
							@elseif($merchantInfo->approval_type == 'MAN' && $merchantInfo->subs_status == 'REQ')
							<a href="#" data-toggle="modal" data-target=".connect__shopee"><div class="approval-main-button" style="background-color: orange;">
								<span>LI??N K???T</span>
								<div class="approval-icon-button">
									<i class="fa fa-circle" aria-hidden="true" style="color: orange;"></i>
								</div>
							</div></a>
							@else
								<div class="approval-main-button" style="background-color: red;">
									<span>T??? CH???I</span>
									<div class="approval-icon-button">
										<i class="fa fa-circle" aria-hidden="true" style="color: red;"></i>
									</div>
								</div>
							@endif
						</div>
						<div class="short-desc-id-info">
							<div class="offer-id-info-straight">
								<span style="color: grey; font-style: italic;">Merchant ID: <span style="font-weight: 600; color: #000000; font-style: normal;">{{ $merchantInfo->merchant_id }}</span></span><br>
								<span style="color: grey; font-style: italic;">Trang web: <span style="font-weight: 600; color: #000000; font-style: normal;"><a href="{{ $merchantInfo->site_url }}">{{ $merchantInfo->site_url }}</a></span></span><br>
								<span style="color: grey; font-style: italic;">L??nh v???c: <span style="font-weight: 600; color: #000000; font-style: normal;">{{ $merchantInfo->code_name }}</span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="detail-merchant-guide-video">
					<div class="detail-merchant-guide-video-box">
						<div class="offer-guide-video-title">
							<span>VIDEO H?????NG D???N</span>
						</div>
						<div class="offer-guide-video-content">
							<div class="offer-guide-video-item">
								<div class="guide-video-item-banner">
									<a href="https://youtu.be/nU_tKKsS4DY" target="_blank"><img src="http://i3.ytimg.com/vi/nU_tKKsS4DY/maxresdefault.jpg" alt=""></a>
								</div>
								<div class="guide-video-item-name">
									<div class="guide-video-item-name-box">
										<div class="video-item-name-head">
											<div class="video-item-name-title">
												<span>ADPIA ACADEMY</span>
											</div>
											<div class="video-item-name-button">
												<a href="https://www.youtube.com/channel/UCqmtJ0l3dWwPavkN5b8Ov2g/videos" target="_blank"><div style="background-color: #bfbfbf; color: #ffffff; font-size: 12px; height: 100%; padding: 0 5px; border-radius: 10px;">Xem Th??m</div></a>
											</div>
										</div>
										<a href="https://youtu.be/nU_tKKsS4DY" target="_blank"><div class="video-item-name-text">
											<span>[ADPIA ACADEMY] H?????NG D???N R??T TI???N AFFILIATE MARKETING T??? ADPIA NETWORK</span>
										</div></a>
										<a href="https://youtu.be/Qq6NO48oY7A" target="_blank"><div class="video-item-name-text">
											<span>[ADPIA ACADEMY] - S??? H???U ????N H??NG ?????U TI??N TRONG S??? NGHI???P AFFILIATE MARKETING</span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="offer-guide-video-item">
								<div class="guide-video-item-banner">
									<a href="https://youtu.be/7DeuizpUNEc" target="_blank"><img src="http://i3.ytimg.com/vi/7DeuizpUNEc/maxresdefault.jpg" alt=""></a>
								</div>
								<div class="guide-video-item-name">
									<div class="guide-video-item-name-box">
										<div class="video-item-name-head">
											<div class="video-item-name-title">
												<span>ADPIA ACADEMY</span>
											</div>
											<div class="video-item-name-button">
												<a href="https://www.youtube.com/channel/UCqmtJ0l3dWwPavkN5b8Ov2g/videos" target="_blank"><div style="background-color: #bfbfbf; color: #ffffff; font-size: 12px; height: 100%; padding: 0 5px; border-radius: 10px;">Xem Th??m</div></a>
											</div>
										</div>
										<a href="https://youtu.be/7DeuizpUNEc" target="_blank"><div class="video-item-name-text">
											<span>[ADPIA - LIVESTREAM S??? 05] ??? GI???I ????P: T???I SAO 90% PUBLISHER B??? CU???C SAU 03 TH??NG?</span>
										</div></a>
										<a href="https://youtu.be/KW5YoI4nSnY" target="_blank"><div class="video-item-name-text">
											<span>[ADPIA - LIVESTREAM S??? 04] - RA M???T ADPIA ACADEMY ??? H???C FREE, KI???M TI???N NH?? ??</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popular-event-show-mb">
			<div class="popular-event-show-mb-box">
				<div class="event-show-mb-title">
					<span>S??? KI???N N???I B???T</span>
				</div>
				<div class="event-show-mb-slide">
					@if(isset($boards))
					@foreach($boards as $key => $board)
					<div class="event-show-mb-slide-item">
						<div class="event-mb-banner">
							<a href="{{ route('newpub.board.show', $board->article_id) }}"><img src="{{ $board->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $board->image }}" alt=""></a>
						</div>
						<a href="{{ route('newpub.board.show', $board->article_id)  }}"><div class="event-mb-title">
							<span>{{ $board->title}}</span>
						</div></a>
						<div class="event-mb-button">
							<a href="{{ route('offer_list.show', $board->merchant_id) }}" class="btn" style="color: #ffffff !important; border-radius: 20px; background-color: rgb(27, 219, 208);">L???Y LINK</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="detail-full-info-offer">
			<div class="detail-full-info-offer-box" style="position: relative;">
				<div style="position: absolute; top: 20px; right: 50px;" class="click-me-hand-icon">
					<i class="fa fa-hand-o-right" aria-hidden="true" style="font-size: 24px; color: orangered; animation: aniScale .5s ease-in-out infinite alternate;"></i>
				</div>
				<button class="collapsible">TH??NG TIN C?? B???N CHI???N D???CH</button>
				<div class="content">
					<div class="detail-full-info-show">
						@if(isset($programs))
						@foreach($programs as $index => $program)
						{!! $program->pgm_desc_clob  !!}
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="detail-get-link-offer">
			<div class="detail-get-link-offer-box">
				@if(($merchantInfo->approval_type == 'AUT' && $merchantInfo->subs_status != 'DEN') || $merchantInfo->subs_status == 'APR')
				<div class="detail-get-product-link-offer">
					<div class="product-link-offer-title">
						<span>LINK PH??N PH???I</span>
					</div>
					<div class="product-link-offer-setting">
						<label style="color: #199c20;">Link Tracking</label>
						<input type="text" name="link" id="link-checking" class="form-control" onclick="this.focus();this.select()" value="https://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000{{ auth()->user()->account_id && auth()->user()->account_id == 'hoaxiumin' ? '&u_id=hoa1' : '' }}">
						<button type="button" data-clipboard-action="copy" data-clipboard-target="#link-checking" class="btn-copy btn btn-copy-code-offer">COPY CODE</button><br>
						<label style="color: #29c7ca;">Tham S??? Ph???</label>
						@if(auth()->user()->account_id && auth()->user()->account_id == 'hoaxiumin')
						<select class="form-control" id="u_id" style="margin-bottom: 15px" onchange="selectChangePgm(this)">
							<option value="hoa1">hoa1</option>
							<option value="hoa2">hoa2</option>
							<option value="hoa3">hoa3</option>
						</select>
						@else
						<input type="text" style="margin-bottom: 15px" class="form-control" id="u_id">
						@endif
						{{-- <label style="color: #1269c5;">Parking Domain</label><br> --}}
						<input type="radio" class="parking-domain-option" name="parking-domain" id="adpia-check" value="click.adpia.vn/tracking.php" checked style="display: none;"> {{-- click.adpia.vn --}}
						{{-- <input type="radio" class="parking-domain-option" name="parking-domain" style="margin-left: 10px;" id="ktmall-check" value="ktmall.vn/tracking.php"> ktmall.vn --}}
						<input type="radio" class="parking-domain-option" name="parking-domain" style="margin-left: 10px; display: none;" id="{{ $adpia_domain->name}}-check" value="{{ $adpia_domain->url }}"> {{-- {{ $adpia_domain->domain}} --}}
						<input type="hidden" id="deeplink_domain" value="{{ $adpia_domain->url }}">
						@if($domains)
						@foreach($domains as $domain)	
						<input type="radio" alias="{{ $domain->alias_domain }}" name="parking-domain" id="{{ $domain->name }}-check" value="{{ $domain->url }}"> {{ $domain->domain }}
						@endforeach
						@endif
					</div>

					<div class="product-link-offer-generate">
						<label style="color: #000000;" class="title-link-product-generate">Nh???p Link S???n Ph???m</label>
						<input type="text" name="link" id="origin-link" class="form-control" placeholder="{{ $merchantInfo->site_url }}/products...." style="margin-bottom: 5px;">
						<input type="radio" name="shortlink-offer" id="shortlink-none" value="0" checked> Kh??ng r??t g???n link
						<input type="radio" name="shortlink-offer" id="shortlink-offer" value="tinyurl" style="margin-left: 10px;"> R??t g???n link tinyurl
						@if($domains)
						@foreach($domains as $domain)
						<input type="radio" name="shortlink-offer" id="{{ $domain->name }}-short" value="{{ $domain->domain }}" style="margin-left: 10px;"> R??t g???n link {{ $domain->domain }}
						@endforeach
						@endif
						<br>
						<div style="margin-top: 15px;">
							<button type="button" class="btn" style="width: calc(50% - 2px); background-color: #1666bf; color: #ffffff;" onclick="createDeepLink($('#origin-link').val())">T???o Link
							</button>
							<a class="btn" style="width: calc(50% - 2px); background-color: #41ac46; color: #ffffff !important;" href="{{route
								('newpub.link-history')}}" >L???ch s??? r??t g???n
							</a>
						</div>
					</div>
					<div class="link-result-offer-product">
						<label>K???t Qu???</label>
						<input type="text" name="link" id="result-link" onclick="this.focus();this.select()" class="form-control" readonly style="background-color: orangered; color: #ffffff;">
						<button type="button" class="btn btn-copy btn-primary" data-clipboard-action="copy" data-clipboard-target="#result-link" style="width: 100%; margin-top: 10px;"><i class="fa fa-copy"></i> COPY</button>
					</div>
				</div>
				<div class="detail-get-media-link-offer">
					<div class="detail-get-media-link-offer-box">
						<div class="get-banner-link-offer">
							<div class="banner-link-offer-title">
								<span>BANNER LINK</span>
							</div>
							<div class="banner-link-offer-content">
								@if (isset($customBanners))
								@foreach ($customBanners as $cbn)
								<div class="banner-offer-item">
									<div class="banner-offer-item-box" data-id="{{ $merchantInfo->merchant_id }}" data-width="{{ $cbn->width }}" data-height="{{ $cbn->height }}">
										<img src="{{ $cbn->link_url }}" alt="">
									</div>
									<div class="banner-offer-item-text">
										<span>{{ $cbn->width }} X {{ $cbn->height }}</span><br>
										<span>({{ $cbn->cnt }} banner)</span>
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<div class="get-video-link-offer">
							<div class="video-link-offer-title">
								<span>VIDEO LINK</span>
							</div>
							<div class="video-link-offer-content">
								@if (isset($video))
								@foreach($video as $key=>$vd)
								<div class="video-offer-item">
									<div class="video-item-banner" onclick="showVideoPopupOffer('{{ $vd->banner_url }}', '{{ $vd->alt_text }}')">
										<img src="{{$vd->thumbnail}}" alt="">
									</div>
									<div class="video-item-title"  onclick="showVideoPopupOffer('{{ $vd->banner_url }}', '{{ $vd->alt_text }}')">
										<span>{{ mb_strlen($vd->alt_text) > 40 ? mb_substr(mb_strtoupper($vd->alt_text), 0, 40)."..." : mb_strtoupper($vd->alt_text) }}</span>
									</div>
									<div class="video-item-button" link_id="{{ $vd->link_id }}" mc="{{ $vd->merchant_id }}">
										<button onclick="showVideoPopupOffer('{{ $vd->banner_url }}', '{{ $vd->alt_text }}')" class="btn">URL</button>
										<button onclick="showVideoPopupOffer('{{ $vd->banner_url }}', '{{ $vd->alt_text }}')" class="btn" link_id="{{ $vd->link_id }}" mc="{{ $vd->merchant_id }}">Iframe</button>
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
				@elseif($merchantInfo->approval_type == 'MAN' && $merchantInfo->subs_status == 'REQ')
				<div style="background-color: #ffffff; width: 100%; text-align: center; padding: 15px; border-radius: 10px;">
					<span class="text-center" style="font-size: 24px;">B???n ph???i li??n k???t v???i merchant m???i l???y ???????c link ph??n ph???i.</span><br>
					<button class="btn btn-warning btn-round" data-toggle="modal" data-target=".connect__shopee" style="color: #ffffff !important; background-color: orange; margin-top: 10px;"><i class="fa fa-link"></i> Li??n K???t</button>
				</div>
				@else
				<div style="background-color: #ffffff; width: 100%; text-align: center; padding: 15px; border-radius: 10px;">
					<span class="text-center" style="font-size: 24px;">Site c???a b???n ???? b??? b??n ph??a nh?? cung c???p t??? ch???i li??n k???t. Xin vui l??ng li??n h??? v???i AM c???a b???n ????? ???????c kh???c ph???c v?? gi???i ????p!</span>
				</div>
				@endif
			</div>
		</div>
		@if($promoFlag && $promoFlag == true)
		@if(($merchantInfo->approval_type == 'AUT' && $merchantInfo->subs_status != 'DEN') || $merchantInfo->subs_status == 'APR')
		<div class="detail-full-info-offer" style="padding-bottom: 10px;">
			<div class="detail-full-info-offer-box" style="position: relative;">
				<div style="position: absolute; top: 20px; right: 50px;" class="click-me-hand-icon">
					<i class="fa fa-hand-o-right" aria-hidden="true" style="font-size: 24px; color: orangered; animation: aniScale .5s ease-in-out infinite alternate;"></i>
				</div>
				<button class="collapsible promo-code">DANH S??CH M?? GI???M GI??</button>
				<div class="content">
					<div class="detail-full-info-show">
						<div class="detail-full-info-show-box">
							D??? li???u ??ang ???????c t???i...
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endif
	</div>
</div>

<div class="main-content-right right-detail">
	<div class="main-content-right-box">
		<div class="popular-event-title">
			<div class="popular-event-title-box">
				<span>S??? KI???N N???I B???T</span>
			</div>
		</div>
		@if(isset($boards[0]))
		<div class="popular-event-top-1">
			<div class="popular-event-top-1-box">
				<div class="event-top-1-img">
					<a href="{{ route('newpub.board.show', $boards[0]	->article_id) }}"><img src="{{ $boards[0]->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $boards[0]->image }}" alt=""></a>
				</div>
				<div class="event-top-1-info">
					<div class="event-top-1-title">
						<span>{{ $boards[0]->title }}</span>
					</div>
					<a href="{{ route('offer_list.show', $boards[0]->merchant_id) }}"><div class="event-top-1-button">
						<span>L???Y LINK</span>
					</div></a>
				</div>
			</div>
		</div>
		@endif
		<div class="list-event-popular">
			<div class="list-event-popular-box">
				@if(isset($boards))
				@foreach($boards as $key => $board)
				@if($key != 0)
				<div class="event-popular-item">
					<div class="event-item-banner">
						<a href="{{ route('newpub.board.show', $board->article_id) }}"><img src="{{ $board->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $board->image }}" alt=""></a>
					</div>
					<div class="event-item-info">
						<div class="event-item-title">
							<span>{{ mb_strlen($board->title) > 25 ? mb_substr($board->title, 0, 25)."..." : $board->title}}</span>
						</div>
						<a href="{{ route('offer_list.show', $board->merchant_id) }}"><div class="event-item-button">
							<span>L???Y LINK</span>
						</div></a>
					</div>
				</div>
				@endif
				@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
{{-- ====================================================================== --}}
<div class="popup-detail-offer-banner">
	<div class="popup-detail-offer-banner-box">
		<div class="detail-offer-banner-single">
			<div class="single-banner-head">
				<span>BANNER LINK</span>
				<span>K??CH TH?????C ( 160 X 600 )</span>
			</div>
			<div class="single-banner-slide">
				<div class="single-banner-item">
					<div class="single-banner-item-box">

					</div>
				</div>
			</div>
			<div class="single-banner-code">
				<button class="btn btn-get-banner-code" style="background-color: #1d232f; color: #fff; border-radius: 20px; outline: none; margin-top: 10px;">GET CODE</button><br>
				<textarea cols="30" rows="3" class="form-control banner-code-box" style="width: 100%; margin-top: 5px; display: none;" onclick="this.focus();this.select()"></textarea>
				<button class="btn btn-copy btn-copy-banner-code" style="background-color: rgb(65, 173, 71); color: #fff; border-radius: 20px; outline: none; display: none; margin: auto; margin-top: 10px;" data-clipboard-action="copy" data-clipboard-target=".banner-code-box">COPY CODE</button>
			</div>
		</div>
		<div class="detail-offer-banner-multi">
			<div class="multi-banner-head">
				<div class="multi-btn-show-current">
					<span>160 x 160</span><br>
					<span>( 4 banner )</span>
				</div>
			</div>
			<div class="multi-banner-show-up">
				<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/upload/Affiliate_160x600-shopee-romano-2406.png" alt="">
				<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/upload/Affiliate_160x600-shopee-romano-2406.png" alt="">
				<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/upload/Affiliate_160x600-shopee-romano-2406.png" alt="">
				<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/upload/Affiliate_160x600-shopee-romano-2406.png" alt="">
			</div>
			<div class="multi-banner-list-other-size">
				@if (isset($customBanners))
				@foreach ($customBanners as $cbn)
				<div class="multi-btn-list-size" data-id="{{ $merchantInfo->merchant_id }}" data-width="{{ $cbn->width }}" data-height="{{ $cbn->height }}">
					<span>{{ $cbn->width }} X {{ $cbn->height }}</span><br>
					<span>( {{ $cbn->cnt }} banner )</span>
				</div>
				@endforeach
				@endif
			</div>
			<div class="video-link-get-code-iframe">
				<div class="video-link-set-size">
					<div class="video-link-set-width">
						<label style="color: #ffffff;">Chi???u D??i (px)</label>
						<input type="number" class="form-control" value="560">
					</div>
					<div class="video-link-set-height">
						<label style="color: #ffffff;">Chi???u R???ng (px)</label>
						<input type="number" class="form-control" value="315">
					</div>
				</div>
				<div class="video-link-load-button">
					<button class="btn btn-success btn-load-changed-code">LOAD CODE</button>
				</div>
				<div class="video-link-result-code">
					<input type="text" class="form-control" id="vd_link_result">
					<button class="btn btn-warning" onclick="copy_clb('vd_link_result')"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
		<div style="position: absolute; top: -20px; right: 20px; background-color: #ffffff; height: 20px; width: 20px; text-align: center; border-radius: 5px 5px 0 0; cursor: pointer;" onclick="closePCPopup()">
			<span style="">X</span>
		</div>
	</div>
</div>
<div class="modal fade connect__shopee" role="dialog" style="padding-top: 5%;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-red" style="padding: 3px !important; border-radius:5px 5px 0 0">
				<h4 class=" text-center" style="color: #ffea00; font-size: 16px;">QUY ?????NH KHI CH???Y CHI???N D???CH</h4>
			</div>
			<div class="modal-body">
				<ul style="color:red">
					<li>
						<p style="color:black; line-height: 1.7">????? ?????m b???o hi???u qu??? c???a chi???n d???ch, b???n c???n ph???i ???????c Adpia ph?? duy???t tr?????c khi c?? th??? li??n k???t v???i Merchant. Adpia nghi??m c???m c??c h??nh vi gian l???n, do ???? b???n c???n tu??n th??? c??c quy ?????nh v??? qu???ng c??o c???a t???ng Merchant v?? ch??nh s??ch ch???ng gian l???n c???a Adpia.</p>
					</li>
					<li>
						<p style="color:black;line-height: 1.7">T???t c??? c??c tr?????ng h???p gian l???n ho???c nghi ng??? gian l???n s??? b??? ng??ng quy???n ch???y chi???n d???ch ngay l???p t???c. T??y v??o m???c ????? vi ph???m, Adpia s??? h???y m???i hoa h???ng ph??t sinh tr?????c ???? c???a Publisher ho???c kh??a t??i kho???n v??nh vi???n.</p>
					</li>
				</ul>
			</div>
			<div class="modal-footer " style="background:#a1a1a1; border-radius:0 0 5px 5px; position: relative; ">
				<a href="{{ route('subscript', $merchantInfo->merchant_id) }}" class="btn tick__yes"  ><i class="fa fa-check" aria-hidden="true"></i> T??I ?????NG ??</a>
				<p style="color:white; text-align: center; font-style: italic; margin-bottom: 0px !important">* B???n c?? th??? li??n h??? Account Manager ????? ???????c duy???t chi???n d???ch nhanh h??n</p>
				<p style="color:white;margin-bottom: 0px !important; text-align: center; font-style:italic;"> Xin c???m ??n!</p>
			</div>
		</div>
	</div>
</div>
@if($merchantInfo->merchant_id != 'earlystart')
<!-- The Modal -->
<div id="exModal-offer" class="ex-modal">
	<div class="ex-modal-content">
		<div class="ex-modal-header">
			<span class="ex-close" onclick="closeExPopup()">&times;</span>
			<h4>TH??NG B??O ?????N T??? ADPIA</h4>
		</div>
		<div class="ex-modal-body">
			<div>
				<strong><p><i class="fa fa-bullhorn" aria-hidden="true"></i> Th??ng b??o</p></strong>
				<p>Hi???n nay, m???t s??? publishers ??ang ch??a hi???u v??? c??ch th???c ghi nh???n hoa h???ng v?? ch??nh s??ch c???a chi???n d???ch <span style="color: #f00;">{{ ucfirst($merchantInfo->merchant_id) }}</span> n??n d???n t???i ????? m???t s??? l?????ng data ch???t l?????ng kh??ng ph?? h???p v???i chi???n d???ch n??y.</p>
				<p>V???y n??n , b???n h??y ?????c k?? n???i dung chi???n d???ch, ????? c?? th??? ?????y s??? m???t c??ch hi???u qu??? nh???t, tr??nh ???????c t??nh tr???ng data r??c.</p>
				<strong><p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Ch??c b???n nhi???u ????n!</p></strong>
			</div>
		</div>
	</div>
</div>
@else
@if ($merchantInfo->merchant_id == 'earlystart')
<!-- The Modal -->
<div id="exModal-offer" class="ex-modal">
	<div class="ex-modal-content">
		<div class="ex-modal-header">
			<span class="ex-close" onclick="closeExPopup()">&times;</span>
			<h4>QUY ?????NH KHI CH???Y CHI???N D???CH MONKEY</h4>
		</div>
		<div class="ex-modal-body" style="max-height: 400px; overflow: auto;">
			<div>
				<strong><p><i class="fa fa-bullhorn" aria-hidden="true"></i> L??u ??</p></strong>
				<p><i class="fa fa-star" aria-hidden="true"></i> Publisher ch???y chi???n d???ch Monkey ph???i s??? d???ng link ???????c ???????c cung c???p t???i trang newpub c???a Adpia, t???o link c?? g???n tracking ??? m???c [Link ph??n ph???i]. N???u ch???y s???n ph???m n??o th?? t???o link s???n ph???m ?????y (link g???c l???y ??? m?? t??? ph??a d?????i).</p>
				<p><i class="fa fa-star" aria-hidden="true"></i> ????n s??? <span style="color: red">KH??NG ???????C GHI NH???N</span> khi:</p>
				<p style="padding-left: 20px;"><i class="fa fa-cog" aria-hidden="true"></i> Publisher ch???y tr???c ti???p b???ng link ??? ph???n [Th??ng Tin Chung] > [Website] m?? kh??ng t???o link c?? g???n tracking</p>
				<p style="padding-left: 20px;"><i class="fa fa-cog" aria-hidden="true"></i> Publisher ch???y b???ng link t??? ngu???n kh??c ngo??i Adpia</p>
				<strong><p><i class="fa fa-bullhorn" aria-hidden="true"></i> C??c s???n ph???m ch??nh c???a Monkey Junior <span style="color: red">(L???y link ??? ph???n n??y n??y ????? t???o link ch???y chi???n d???ch, kh??ng l???y ??? ngu???n kh??c)</span></p></strong>
				<p><i class="fa fa-star" aria-hidden="true"></i> <span style="color: brown">Monkey Junior:</span> https://beyeungoaingu.monkeyjunior.vn/agency_adpia ho???c http://beyeungoaingu.monkeyjunior.vn/agency <span style="color: brown">( H???c ti???ng anh chu???n qu???c t??? t???i nh?? cho tr??? t??? 0 -10 tu???i)</span></p>
				<p><i class="fa fa-star" aria-hidden="true"></i> <span style="color: brown">Monkey Stories:</span> http://truyentranh.monkeystories.vn/agency <span style="color: brown">( Ch????ng tr??nh ti???ng anh to??n di???n cho tr??? t??? 2 -15 tu???i )</span></p>
				<p><i class="fa fa-star" aria-hidden="true"></i> <span style="color: brown">Monkey Math:</span> http://toantienganh.monkeymath.vn/agency <span style="color: brown">( ???ng d???ng h???c to??n, ti???ng anh theo ti??u chu???n M??? cho tr??? 3 - 7 tu???i )</span></p>
				<p><i class="fa fa-star" aria-hidden="true"></i> <span style="color: brown">VMonkey:</span> http://truyentranh.vmonkey.vn/agency  <span style="color: brown">( Kho truy???n ti???ng vi???t t????ng t??c s??? 1 Vi???t Nam )</span></p>
				<strong><p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Ch??c b???n nhi???u ????n!</p></strong>
			</div>
		</div>
	</div>
</div>
@endif
@endif
@stop
@section('newpub_script')
<script>
	$(document).ready(function() {
		setTimeout(function() {
			$('.slick-slider').eq(2).slick('refresh');
		}, 100);
	});
</script>
<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;
	var couponTotalArray = '';
	var currentArray = [];
	var currentMerchant = '{{ $merchantInfo->merchant_id }}';
	var currentAFF = '{{ $aff }}';
	var couponOffset = 0;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function(e) {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
				content.style.maxHeight = null;
			} else {
				content.style.maxHeight = content.scrollHeight + "px";
			}
			
			if(!couponTotalArray) {
				if($(e.target).attr('class').indexOf('promo-code') !== -1) {
					if($(e.target).attr('class').indexOf('active') !== -1) {
						if(currentMerchant == "shopee") {
							getShopeePromoCodeApi(content);
						} else if(currentMerchant == "lazada") {
							getLazadaPromoCodeApi(content);
						} else if(currentMerchant == "sendo") {
							getSendoPromoCodeApi(content);
						} else if(currentMerchant == "tiki") {
							getTikiPromoCodeApi(content);
						}
					}
				}
			}
		});
	}
	
	function loadMoreCoupon(offset) {
		var html = '';
			currentArray.map(function(val, index) {
				if(index >= offset && index < (offset + 16)) {
					let formatDesc = val.desc.replace(' (...chi ti???t)', '')
					.replace('??H t???i thi???u', '. ??H t???i thi???u')
					.replace('Hi???u l???c l??c', '. Hi???u l???c l??c')
					.replace(' Ng??y h???t h???n','. Ng??y h???t h???n')
					.replace(' Ng??nh h??ng', '. Ng??nh h??ng')
					.replace('Gi???m t???i ??a', '. Gi???m t???i ??a')
					.replace('Ch?? ??:', '. Ch?? ??:');
				html += `
					<div class="adpia-promo-code-flip-card">
						<div class="flip-card">
						  <div class="flip-card-inner">
							<div class="flip-card-front">
								<div class="flip-card-front-box">
									<div class="flip-card-front-head">`+val.title+`</div>
									<div class="flip-card-front-code">`+(val.end_date.length > 0 ? ('Ng??y h???t h???n : '+val.end_date) : '??u ????i li???n tay')+`</div>
								</div>
							</div>
							<div class="flip-card-back">
							  <div class="flip-card-back-detail">
								`+(formatDesc.length > 120 ? formatDesc.substr(0, 120)+"..." : formatDesc)+`
							  </div>
							  <div class="flip-card-back-button">
								<div class="flip-card-back-copy-code">
									<span class="btn btn-default" style="padding: 2px 6px;" onclick="getCoupon('`+(val.code.length > 0 ? val.code : 0)+`', '`+val.url+`')">
										<i class="text-success fa `+(val.code.length > 0 ? 'fa-copy' : 'fa-external-link')+`" style="font-size: 12px;"></i>
										<span style="font-size: 10px;">`+(val.code.length > 0 ? 'Code : '+val.code : 'Nh???n ngay ??u ????i')+`</span>
									</span>
								</div>
								<div class="flip-card-back-redirect">
									<span class="btn btn-default" style="padding: 2px 6px;" onclick="copyShortLink('`+val.url+`')">
										<i class="fa fa-link text-info" style="font-size: 12px;"></i>
									</span>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					</div>`;
				}
			});
			
			$(".detail-full-info-show-box").append(html);
			$(".detail-full-info-offer-box .promo-code .content").css('max-height', '100%');
			if(offset + 16 < currentArray.length) {
				$(".adpia-promo-code-btn-load-more div").attr('onclick', 'loadMoreCoupon('+(offset + 16)+')')
			} else {
				$(".adpia-promo-code-btn-load-more").remove();
			}
	}
	
	function getCoupon(code, url) {
		if(code != 0) {
			copyToClipboard(code);
			alert('Sao ch??p m?? th??nh c??ng!');
		}
		
		var linkTracking = 'https://click.adpia.vn/click.php?m=' + currentMerchant + '&a=' + currentAFF + '&l=8888&l_cd1=3&l_cd2=0&tu=' + url;
		
		window.open(linkTracking, '_blank');
	}
	
	function copyShortLink(url) {
		var trackingUrl = 'https://click.adpia.vn/click.php?m=' + currentMerchant + '&a=' + currentAFF + '&l=8888&l_cd1=3&l_cd2=0&tu=' + url;
		showLoading();
		$.ajax({
			url: '{{ route('newpub.shortlink') }}',
			method: 'POST',
			data: {_token: '{{ csrf_token() }}', url: trackingUrl},
			success: function (data) {

				if (data && data.status === 200) {
					copyToClipboard(data.data);
				}
				hideLoading();
			},
			error: function (e) {
				toastr.error('C?? l???i x???y ra, xin vui l??ng th??? l???i sau!');
				hideLoading();
			}
		});
	}
</script>
<script>

	$('.parking-domain-option').change(function () {
		var value = $(this).val();

		var curLink = $('#link-checking').val();

		var res = curLink.match(/http:\/\/([a-z\.]+)\.(com|vn)\/(tracking\.php|click)/g);
		res = curLink.replace(res, 'http://' + value);

		$('#link-checking').val(res);
		// $('#adpia-check').val(myTrim(value));
	});

	function myTrim(x) {
		x.replace(/\n/gm,'');
		return x.replace(/^\s+|\s+$/gm,'');
	}

	$('#u_id').keyup(function() {
		link = "https://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000&u_id=";
		id = $(this).val();
		url = link +id;
		$('#link-checking').val(url);
	});

	function createDeepLink(value) {
		var shortLink = $('input[name=shortlink-offer]:checked').val();
		showLoading();

		if (!value) {
			toastr.error("M???i nh???p link s???n ph???m");
			hideLoading();
			return;
		}

		if (!value.match(/(http:\/\/|https:\/\/)/g)) {
			toastr.error("M???i nh???p ????ng ?????nh d???ng URL");
			hideLoading();
			return;
		}

		if($('#adpia-check').is(':checked')) {
			var domain = $('#adpia-check').val();
		} else if($('#adpiafb-check').is(':checked')) {
			var domain = $('#adpiafb-check').val();
		}
		
		var u_id = $("#u_id").val();

		var origin = 'https://' + domain + '?m=' + currentMerchant + '&a=' + currentAFF + '&l=9999&l_cd1=3&l_cd2=0&u_id='+u_id+'&tu=' + encodeURIComponent(value);

		if (shortLink && parseInt(shortLink) !== 0) {
			console.log(origin);
			$.ajax({
				url: '{{ route('newpub.shortlink') }}',
				method: 'POST',
				data: {_token: '{{ csrf_token() }}', url: origin, domain: shortLink},
				success: function (data) {
					console.log(data);

					if (data && data.status === 200) {
						$('.link-result-offer-product').css('display', 'block');
						$('#result-link').val(data.data);
						InserLink(value, data.data, origin)

						toastr.success("T???o link th??nh c??ng!");
					}

					hideLoading();
					return true;
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
			$('.link-result-offer-product').css('display', 'block');
			$('#result-link').val(origin);
			toastr.success("T???o link th??nh c??ng!");
			hideLoading();
			return true
		}
	}

    // Insert link
    function InserLink(root_link, short_link, link_click) {
    	$.ajax({
    		url : '{{ route('newpub.insert-link-ajax') }}',
    		method : 'POST',
    		data: {_token: '{{ csrf_token() }}', root: root_link, short: short_link, click: link_click},
    		success: function() {
    			console.log('success');
    		},
    		error: function() {
    			console.log('error');
    		}
    	});
    }

    var clipboard = new ClipboardJS('.btn-copy');

    clipboard.on('success', function (e) {
    	toastr.success('Sao ch??p th??nh c??ng!');
    });

    clipboard.on('error', function (e) {
    	toastr.error('Error Copy'+ e);

    });
</script>
<script>
	$(".banner-link-offer-content").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		responsive: [
		{
			breakpoint: 1440,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 1360,
			settings: {
				slidesToShow: 4
			}
		},
		{
			breakpoint: 1210,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 1040,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 860,
			settings: {
				slidesToShow: 4
			}
		},
		{
			breakpoint: 800,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 750,
			settings: {
				slidesToShow: 4
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 3
			}
		}
		]
	});

	$(".video-link-offer-content").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		responsive: [
		{
			breakpoint: 1440,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 1360,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 1210,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 1040,
			settings: {
				slidesToShow: 1
			}
		},
		{
			breakpoint: 860,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 800,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 750,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2
			}
		}
		]
	});

	$(".event-show-mb-slide").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false
	});

	$(".single-banner-slide").on('init', function(event, slick){
		$(".banner-offer-item-box").css('height', $(".banner-offer-item-box").width());
		$(".banner-offer-item-box").css('line-height', $(".banner-offer-item-box").width() + 'px');
	});//width = height

	$(".single-banner-slide").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		arrows: true
	});
</script>
<script>
	$(document).click(function (e) {
		if ($(e.target).is('.popup-detail-offer-banner')) {
			$(".popup-detail-offer-banner").css('display', 'none');
		}
		if ($(e.target).is('#exModal-offer')) {
			$("#exModal-offer").css('display', 'none');
		}
	});

	$(".banner-offer-item-box").click(function(event) {
		if($(window).width() <= 500) {
			toastr.warning("b???n h??y chuy???n sang PC ????? c?? th??? s??? d???ng ch???c n??ng n??y!");
			return;
		}
		$(".video-link-get-code-iframe").css('display', 'none');
		$(".popup-detail-offer-banner").css('display', 'block');
		$(".single-banner-slide").html('');
		$(".single-banner-item-box").html('');
		$(".single-banner-code").css('display', 'block');
		$(".banner-code-box, .btn-copy-banner-code").css('display', 'none');
		$(".multi-banner-list-other-size").css('display', 'flex');
		$(".multi-banner-show-up").html('');
		$(".multi-banner-head").html(`<div class="multi-btn-show-current">
			<span>160 x 160</span><br>
			<span>( 4 banner )</span>
			</div>`);
		var id = $(this).attr('data-id');
		var width = $(this).attr('data-width');
		var height = $(this).attr('data-height');
		showAjaxBanner(id, width, height);
		mh = ($(window).height() - $(".popup-detail-offer-banner-box").height()) / 2;
		$(".popup-detail-offer-banner-box").css('margin-top', mh);
	});

	$(".multi-btn-list-size").click(function(event) {
		$(".single-banner-item-box").html('');
		$(".banner-code-box").css('display', 'none');
		$(".btn-copy-banner-code").css('display', 'none');
		$(".banner-code-box").val('');
		var id = $(this).attr('data-id');
		var width = $(this).attr('data-width');
		var height = $(this).attr('data-height');
		showAjaxBanner(id, width, height);
	});

	function showAjaxBanner(id, width, height) {
		$.ajax({
			url: 'ajax/ajax-banner',
			type: 'GET',
			data: {id: id, width: width, height: height},
		})
		.done(function(data) {
			if(data) {
				$(".single-banner-slide").slick('unslick');
				$(".multi-banner-show-up").html('');
				var rows = ``;
				$.each(data['data'], function(index, val) {
					rows += `<div class="single-banner-item">
					<div class="single-banner-item-box" data-link-id="` + val['link_id'] + `" data-width="` + val['width'] + `" data-height="` + val['height'] + `">
					<img src="` + val['banner_url'] + `" alt="">
					</div>
					</div>`;

					$(".multi-banner-show-up").append('<img src="' + val['banner_url'] + '" alt="">');
				});
				$(".single-banner-slide").html(rows);

				$(".single-banner-head").html('<span>BANNER LINK</span><span>K??CH TH?????C ( ' + data['data'][0]['width'] + ' X ' + data['data'][0]['height'] + ' )</span>');

				$(".multi-btn-show-current span:nth-child(1)").html(data['data'][0]['width'] + ' X ' + data['data'][0]['height']);
				$(".multi-btn-show-current span:nth-child(3)").html('( ' + data['data'].length + ' banner )');

				$(".single-banner-slide").slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: false,
					autoplaySpeed: 2000,
					arrows: true,
				});
			}
		})
		.fail(function() {
			console.log("error");
		});
	}

	$(".single-banner-slide").on('afterChange', function(event, slick, currentSlide){
		getSingleBannerCode(currentSlide);
	});

	$(".btn-get-banner-code").click(function(event) {
		getSingleBannerCode();
	});

	function getSingleBannerCode(index = 0) {
		var id = $(".single-banner-item-box").eq(index).attr('data-link-id');
		var imageLink = $(".single-banner-item-box").eq(index).children('img').attr('src');
		var width = $(".single-banner-item-box").eq(index).attr('data-width');
		var height = $(".single-banner-item-box").eq(index).attr('data-height');
		var banner = '<link href="https://adpia.vn/css/adpia_banner_style.css" rel="stylesheet" type="text/css"/>\n';
		banner += '<div class="adpia_banner" style="width:' + width + 'px">\n'
		banner += '<a href="https://adpia.vn/" class="adpia_link"><span class="adpia_bg_hide">Ads by Adpia</span></a>\n';
		banner += '<a href="https://click.adpia.vn/click.php?m=' + currentMerchant + '&a=' + currentAFF + '&l=' + id + '&l_cd2=2">';
		banner += '<img src="' + imageLink + '" border="0" width="' + width + '" height="' + height + '"></a>\n';
		banner += '<img src="https://img.adpia.vn/apshow.php?m_id=' + currentMerchant + '&a_id=' + currentAFF + '&p_id=0000&l_id=' + id + '&l_cd1=G&l_cd2=2" width="1" height="1" border="0" nosave style="display:none">\n';
		banner += '</div>';
		$(".banner-code-box").css('display', 'block');
		$(".btn-copy-banner-code").css('display', 'block');
		$(".banner-code-box").val(banner);
		toastr.success("T???o code banner th??nh c??ng!");
	}

	function showVideoPopupOffer(url, name) {
		if($(window).width() <= 500) {
			toastr.warning("b???n h??y chuy???n sang PC ????? c?? th??? s??? d???ng ch???c n??ng n??y!");
			return;
		}
		$(".video-link-get-code-iframe").css('display', 'block');
		$(".popup-detail-offer-banner").css('display', 'block');
		$(".single-banner-item-box").html('');
		$(".single-banner-head").html('<span>VIDEO LINK</span>');
		$(".single-banner-slide").slick('unslick');
		$(".single-banner-code").css('display', 'none');
		$(".multi-banner-list-other-size").css('display', 'none');
		var merchant = $(".video-item-button").attr('mc');
		$(".single-banner-slide").html('');
		$(".single-banner-slide").html('<div style="width: 100%; height: 300px; border: 1px solid red; overflow: hidden; position: relative;"><iframe style="border:none; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="' + url + '" frameborder="0" allowfullscreen></iframe>');
		$(".multi-banner-head").html('<span style="color: #ffffff;">' + name + '</span>');
		var rowsInput = `<label style="color: #ffffff; float: left; padding: 10px 0 5px 0;">Link Video</label><br>
		<div style="display: flex; clear: left;"><input type="text" class="form-control" value="` + url + `" id="link_vd">
		<button onclick="copy_clb('link_vd')" class="btn btn-info"><i class="fa fa-clipboard" aria-hidden="true"></i></button></div>
		<label style="color: #ffffff; float: left; padding: 10px 0 5px 0;">Link Click</label><br>
		<div style="display: flex; clear: left;"><input type="text" class="form-control" value="https://click.adpia.vn/tracking.php?m=` + merchant + `&a=` + `{{ App\Http\Helpers\Helper::getCurrentAff() }}` + `&l=0000" id="link_vd_clk">
		<button onclick="copy_clb('link_vd_clk')" class="btn btn-info"><i class="fa fa-clipboard" aria-hidden="true"></i></button></div>`;
		$(".multi-banner-show-up").html(rowsInput);
		link_id = $(".video-item-button").attr('link_id');
		mc = $(".video-item-button").attr('mc');
		width = $('.video-link-set-width input').val();
		height = $('.video-link-set-height input').val();
		mh = ($(window).height() - $(".popup-detail-offer-banner-box").height()) / 2;
		$(".popup-detail-offer-banner-box").css('margin-top', mh);

		getIframe(mc, link_id, width, height);
	}

	function copy_clb(elm) {
		$('#' + elm).select();
		data = document.execCommand("copy");

		toastr.success("Sao ch??p th??nh c??ng!");
	}

	function getIframe(mc, link_id, width, height) {
		$.ajax({
			url: '{{ route('api-video') }}',
			method: 'POST',
			data: {id: link_id, merchant:mc,aff_id: "{{ App\Http\Helpers\Helper::getCurrentAff() }}", width:width, height:height, _token: '{{ csrf_token() }}'},
			success: function (data) {
				$(".video-link-result-code input").val(data);
			},

			error: function() {
				$('.loadings').hide();
				toastr.error("???? c?? l???i x???y ra!");
			}

		});
	}

	$(".btn-load-changed-code").click(function(event) {
		link_id = $(".video-item-button").attr('link_id');
		mc = $(".video-item-button").attr('mc');
		width = $('.video-link-set-width input').val();
		height = $('.video-link-set-height input').val();
		getIframe(mc, link_id, width, height);
		toastr.success("Load th??nh c??ng!");
	});

	function closePCPopup() {
		$(".popup-detail-offer-banner").css('display', 'none');
	}

	if($("#exModal-offer").length > 0) {
		$("#exModal-offer").css('display', 'block');
	}

	function closeExPopup() {
		var modal = document.getElementById("exModal-offer");
		modal.style.display = "none";
	}
	
	function selectChangePgm(obj) {
		link = "https://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000&u_id=";
		id = $(obj).val();
		url = link +id;
		$('#link-checking').val(url);
	}

	function jsonp(url, callback) {
	    var callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
	    window[callbackName] = function(data) {
	        delete window[callbackName];
	        document.body.removeChild(script);
	        callback(data);
	    };

	    var script = document.createElement('script');
	    script.src = url + (url.indexOf('?') >= 0 ? '&' : '?') + 'callback=' + callbackName;
	    document.body.appendChild(script);
	}

	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	function drawMerchantPromoCodeView() {
		var html = '';
		currentArray.map(function(val, index) {
			if(index >= couponOffset && index < (couponOffset + 16)) {
				html += `
				<div class="adpia-promo-code-flip-card">
					<div class="flip-card">
					  <div class="flip-card-inner">
						<div class="flip-card-front">
							<div class="flip-card-front-box">
								<div class="flip-card-front-head">`+val.title+`</div>
								<div class="flip-card-front-code">`+(val.end_date.length > 0 ? ('Ng??y h???t h???n : '+val.end_date) : '??u ????i li???n tay')+`</div>
							</div>
						</div>
						<div class="flip-card-back">
						  <div class="flip-card-back-detail">
							`+(val.desc.length > 120 ? val.desc.substr(0, 120)+"..." : val.desc)+`
						  </div>
						  <div class="flip-card-back-button">
							<div class="flip-card-back-copy-code">
								<span class="btn btn-default" style="padding: 2px 6px;" onclick="getCoupon('`+(val.code.length > 0 ? val.code : 0)+`', '`+val.url+`')">
									<i class="text-success fa `+(val.code.length > 0 ? 'fa-copy' : 'fa-external-link')+`" style="font-size: 12px;"></i>
									<span style="font-size: 10px;">`+(val.code.length > 0 ? 'Code : '+val.code : 'Nh???n ngay ??u ????i')+`</span>
								</span>
							</div>
							<div class="flip-card-back-redirect">
								<span class="btn btn-default" style="padding: 2px 6px;" onclick="copyShortLink('`+val.url+`')">
									<i class="fa fa-link text-info" style="font-size: 12px;"></i>
								</span>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>`;
			}
		});

		$(".detail-full-info-show-box").html(html);

		return true;
	}

	function getShopeePromoCodeApi(content)
	{
		var url = "https://data.polyxgo.com/api/v1/datax/shopee_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "shopee";
					let title = "";
					let discount = "";
					if(ev2.coin_percentage) {
						title += 'Ho??n ' + ev2.coin_percentage + '%';
					} else if(ev2.discount_percentage) {
						title += 'Gi???m ' + ev2.discount_percentage + '%';
					}

					if(!title) {
						if(ev2.coin_cap) {
							title += 'Ho??n ' + addCommas(ev2.coin_cap) + ' xu';
						} else if(ev2.discount_value) {
							title += 'Gi???m ' + addCommas(ev2.discount_value / 10000) + '??';
						}
					}

					if(!title) {
						title = 'Voucher';
					}

					if(ev2.coin_cap) {
						discount += addCommas(ev2.coin_cap) + ' xu';
					} else if(ev2.discount_value) {
						discount += addCommas(ev2.discount_value / 10000) + '??';
					}

					if(!discount) {
						if(ev2.coin_percentage) {
							discount += ev2.coin_percentage + '%';
						} else if(ev2.discount_percentage) {
							discount += ev2.discount_percentage + '%';
						}
					}

					if(!discount) {
						discount = '0??';
					}

					let desc = ev2.usage_terms;
					var date = new Date(ev2.end_time * 1000);
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.voucher_code != 'POLYXGO' ? ev2.voucher_code : '';
					let url = 'https://shopee.vn/search?promotionId='+ev2.promotionid+'&signature='+ev2.signature+'&voucherCode='+ev2.voucher_code;
					currentArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			var x = drawMerchantPromoCodeView();

			content.style.maxHeight = "100%";
			if(couponOffset + 16 < currentArray.length) {
				$(".detail-full-info-show").append(`
					<div class="adpia-promo-code-btn-load-more">
						<div class="btn btn-success" onclick="loadMoreCoupon(`+(couponOffset + 16)+`)">T???i th??m c??n n???a</div>
					</div>
				`);
			}
		});
	}

	function getLazadaPromoCodeApi(content) {
		var url = "https://data.polyxgo.com/api/v1/datax/lazada_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "lazada";
					let title = "Gi???m "+addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : '??');
					let desc = "M?? gi???m gi?? lazada "+addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : '??')+" ????n h??ng t??? "+addCommas(ev2.min_spend)+(ev2.min_spend < 1000 ? '%' : '??')+" ?????t mua s???n ph???m t???i "+ev2.shop_name;
					let discount = addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : '??');

					var date = new Date(parseInt(ev2.end_time));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					currentArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			var x = drawMerchantPromoCodeView();

			content.style.maxHeight = "100%";
			if(couponOffset + 16 < currentArray.length) {
				$(".detail-full-info-show").append(`
					<div class="adpia-promo-code-btn-load-more">
						<div class="btn btn-success" onclick="loadMoreCoupon(`+(couponOffset + 16)+`)">T???i th??m c??n n???a</div>
					</div>
				`);
			}
		});
	}

	function getSendoPromoCodeApi(content) {
		var url = "https://data.polyxgo.com/api/v1/datax/sendo_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "sendo";
					let title = ev2.voucher_type == "cashback" ? "Ho??n " : "Gi???m " + addCommas(ev2.discount);
					title += ev2.type == "percent" ? "%" : "??";
					let desc = "";
					if(ev2.voucher_type == "cashback") {
						desc += "M?? ho??n ti???n sendo ";
					} else {
						desc += "M?? gi???m gi?? sendo ";
					}
					desc += addCommas(ev2.discount) + " ????n h??ng t??? ";
					desc += addCommas(ev2.min_order) + (ev2.type == "percent" ? "%" : "??");
					let discount = addCommas(ev2.discount) + (ev2.type == "percent" ? "%" : "??");

					var date = new Date(parseInt(ev2.end_time * 1000));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					currentArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			var x = drawMerchantPromoCodeView();

			content.style.maxHeight = "100%";
			if(couponOffset + 16 < currentArray.length) {
				$(".detail-full-info-show").append(`
					<div class="adpia-promo-code-btn-load-more">
						<div class="btn btn-success" onclick="loadMoreCoupon(`+(couponOffset + 16)+`)">T???i th??m c??n n???a</div>
					</div>
				`);
			}

		});
	}

	function getTikiPromoCodeApi(content) {
		var url = "https://data.polyxgo.com/api/v1/datax/tiki_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "tiki";
					let title = "Gi???m " + addCommas(ev2.discount) + (ev2.discount < 1000 ? '%' : '??');
					let desc = ev2.description;
					let discount = addCommas(ev2.discount) + (ev2.discount < 1000 ? '%' : '??');

					var date = new Date(parseInt(ev2.end_time * 1000));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					currentArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			var x = drawMerchantPromoCodeView();

			content.style.maxHeight = "100%";
			if(couponOffset + 16 < currentArray.length) {
				$(".detail-full-info-show").append(`
					<div class="adpia-promo-code-btn-load-more">
						<div class="btn btn-success" onclick="loadMoreCoupon(`+(couponOffset + 16)+`)">T???i th??m c??n n???a</div>
					</div>
				`);
			}
		});
	}
</script>
@stop