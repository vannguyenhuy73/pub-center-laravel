@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate Offer')
@section('newpub_style')
<style>
	.newpub-page-main-content-box {
		display: block;
	}
	.card-logo-layer {
		height: 45px;
	}
	.card-logo-layer img {
		margin: auto;
		max-height: 100%;
		max-width: 100%;
		width: unset !important;
	}
	.highlight-badge-offer {
		animation-name: highlight-badge-animate;
		animation-duration: 1.5s;
		animation-iteration-count: infinite;
	}

	@keyframes highlight-badge-animate {
	  0% { transform: scale(1); }
	  50% { transform: scale(1.1) }
	  100% { transform: scale(1) }
	}
</style>
@stop
@section('newpub_main_content')
<hr style="margin-top: 0; margin-left: 15px; margin-right: 15px;">
<div class="quick-merchant-tabs">
	<div class="quick-merchant-content-box">
		<div class="merchant-row-content bg-green">
			<div class="quick-merchant-desc-box">
				<div class="merchant-desc-top merchant-desc-item active">
					<div class="merchant-desc-item-head bg-green">
						<span>TOP MERCHANT</span>
					</div>
					<div class="merchant-desc-item-text">
						<span>Các chiến dịch hiện đang tăng số tốt nhất trên Adpia</span>
					</div>
				</div>
			</div>
			<div class="merchant-content-top merchant-content-item active">
				<div class="mer-item-card top-merchant-card">
					<div class="owl-carousel owl-theme">
						@if (isset($topMerchant))
						@foreach ($topMerchant as $top)
						<div class="item">
							<a href="{{ route('offer_list.show',$top->merchant_id) }}">
								<div class="mer-item-card-box" style="{{ $top->merchant_id == 'tpbank' ? 'position: relative;' : ''  }}">
									<div class="flex-card-1-layer">
										<div class="card-star-layer">
											@for ($i = 0; $i < 5; $i++)
											<img src="{{ asset('images/star.png') }}" alt="">
											@endfor
										</div>
										<div class="card-logo-layer">
											<img data-src="{{ $top->banner_url }}" alt="" src="{{ $top->banner_url }}">
										</div>
									</div>
									<div class="flex-card-2-layer">
										<div class="card-text-layer">
											<span class="card-text-name">{{ ucfirst($top->merchant_id) }}</span><br>
											<span class="card-text-info">Chiến dịch: <span>{{ $top->adtype }}</span></span><br>
											<span class="card-text-info">Hoa hồng: <span>{{ $top->com_display }}</span></span>
										</div>
									</div>
									@if($top->merchant_id == 'tpbank')
										<div style="position: absolute; top: 0; right: 0;" class="highlight-badge-offer">
											<div style="width: 40px;">
												<img src="{{ asset('images/new.svg') }}" alt="" style="width: 100%;">
											</div>
										</div>
									@endif
								</div>
								<div class="line-under-mer-item-card"></div>
							</a>
						</div>
						@endforeach
						@endif
					</div>
					<div class="mer-card-slider left-control">
						<div class="mer-card-slider-box left-control-arrow">
						</div>
					</div>
					<div class="mer-card-slider right-control">
						<div class="mer-card-slider-box right-control-arrow">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="merchant-row-content bg-blue">
			<div class="quick-merchant-desc-box">
				<div class="merchant-desc-new merchant-desc-item active">
					<div class="merchant-desc-item-head bg-blue">
						<span>NEW MERCHANT</span>
					</div>
					<div class="merchant-desc-item-text">
						<span>Các chiến dịch mới liên kết trên Adpia</span>
					</div>
				</div>
			</div>
			<div class="merchant-content-new merchant-content-item active">
				<div class="mer-item-card new-merchant-card">
					<div class="owl-carousel owl-theme">
						@if (isset($newMerchant))
						@foreach ($newMerchant as $new)
						<a href="{{ route('offer_list.show',$new->merchant_id) }}">
							<div class="item">
								<div class="mer-item-card-box">
									<div class="flex-card-1-layer">
										<div class="card-star-layer">
											@for ($i = 0; $i < 5; $i++)
											<img src="{{ asset('images/star.png') }}" alt="">
											@endfor
										</div>
										<div class="card-logo-layer">
											<img data-src="{{ $new->banner_url }}" alt="" src="{{ $new->banner_url }}">
										</div>
									</div>
									<div class="flex-card-2-layer">
										<div class="card-text-layer">
											<span class="card-text-name">{{ ucfirst($new->merchant_id) }}</span><br>
											<span class="card-text-info">Chiến dịch: <span>{{ $new->adtype }}</span></span><br>
											<span class="card-text-info">Hoa hồng: <span>{{ $new->com_display }}</span></span>
										</div>
									</div>
								</div>
								<div class="line-under-mer-item-card"></div>
							</div>
						</a>
						@endforeach
						@endif
					</div>
					<div class="mer-card-slider left-control">
						<div class="mer-card-slider-box left-control-arrow">
						</div>
					</div>
					<div class="mer-card-slider right-control">
						<div class="mer-card-slider-box right-control-arrow">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="list-merchant-area">
	<div class="list-merchant-box">
		<div class="list-merchant-left">
			<div class="list-merchant-left-box">
				<div class="list-offer-title-show-mb">
					<div style="color: #f69d29; font-size: 20px; font-weight: 600; text-align: center; padding-bottom: 20px;">
						<span>DANH SÁCH OFFER</span>
					</div>
				</div>
				<form action="{{route('offer_list.index')}}" method="GET" role="form" class="offer-filter">
					<input type="hidden" name="offer_category" id="category-ip" value="all">
					<div class="list-merchant-filter">
						<div class="list-merchant-title">
							<span>DANH SÁCH OFFER</span>
						</div>
						<div class="list-merchant-filter-input">
							<div class="list-merchant-search">
								<span>TỪ KHÓA</span>
								<input type="text" placeholder="Tên offer..." class="form-control" name="offer_name" id="offer_name" value="{{ request('offer_name') }}">
							</div>
                            <div class="list-merchant-cate-select">
                                <span>SẮP XẾP</span>
                                <select name="sort_commission" id="sort_commission" class="form-control" style="width: 222px;">
                                    <option value="" {{ request('sort_commission') == '' ? 'selected' : '' }}></option>
                                    <option value="percent" {{ request('sort_commission') == 'percent' ? 'selected' : '' }}>Hoa Hồng Theo %</option>
                                    <option value="vnd" {{ request('sort_commission') == 'vnd' ? 'selected' : '' }}>Hoa Hồng Theo vnd</option>
                                </select>
                            </div>
							<div class="list-merchant-cate-select">
								<span>CHIẾN DỊCH</span>
								<select name="offer_type" id="offer_type" class="form-control" style="width: 200px;">
									<option value="All" {{ request('offer_type') == 'all' ? 'selected' : '' }}>Tất Cả</option>
									<option value="cps" {{ request('offer_type') == 'cps' ? 'selected' : '' }}>CPS</option>
									<option value="cpa" {{ request('offer_type') == 'cpa' ? 'selected' : '' }}>CPA</option>
									<option value="cpi" {{ request('offer_type') == 'cpi' ? 'selected' : '' }}>CPI</option>
								</select>
							</div>
						</div>
					</div>
				</form>
				<div class="list-offer-cate-show-mb">
					<div class="list-offer-cate-mb-box">
						@if (isset($categories))
						@foreach ($categories as $key => $cate)
						<div class="offer-cate-mb-item" data-id="{{ $key }}">
							<div class="offer-cate-mb-name">
								<span>{{ $cate['name']['vi'] }}</span>
							</div>
							<div class="offer-cate-mb-total">
								<div class="triangle-top-box" style="width: 0; height: 0; border-left: 5px solid transparent; border-right: 5px solid transparent; border-bottom: 5px solid #ffffff;"></div>
								<div class="mb-total-number">
									<span>{{ getOfferCount($cate['child'], request()->all()) }}</span>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<hr>
				<div class="list-merchant-main-content-area">
					<div class="list-merchant-main-content-box">
						@if (isset($offers))
						@foreach ($offers as $offer)
						<div class="merchant-main-card-item">
							<div class="merchant-main-card-item-box" style="{{ $offer->merchant_id == 'tpbank' ? 'position: relative;' : ''  }}">
								<div class="main-card-item-top">
									<div class="main-card-logo">
										<a href="{{ route('offer_list.show', $offer->merchant_id) }}"><img src="{{ $offer->banner_url }}" alt=""></a>
									</div>
									<div class="main-card-info">
										<span>Hoa hồng: <span style="color: #f00;">
											@if($offer->com_display)
											{{ $offer->com_display }}
											@else
											{{ pgm_get_merchant_com_info($offer->com_info, '-')}}
											@endif
										</span></span><br>
										<span>Chiến dịch: <span style="font-weight: 600;">{{ $offer->adtype }}</span></span>
										<hr>
									</div>
								</div>
								<div class="main-card-item-bottom">
									<div class="card-item-left-text">
										<a href="{{ route('offer_list.show', $offer->merchant_id) }}#link__get"><span style="font-weight: 600;">{{ $offer->site_name }}</span></a><br>
										<span>Lĩnh vực: {{ $offer->cat_name1 }}</span>
									</div>
									<div class="card-item-right-button">
										@for ($i = 0; $i < 5; $i++)
										<img src="{{ asset('images/star.png') }}" alt="">
										@endfor
										@if($offer->subs_status = 'APR')
										<a href="{{ route('offer_list.show', $offer->merchant_id) }}#link__get" class="btn btn-get-link-offer">LẤY LINK</a>
										@elseif($offer->subs_status == '' && $offer->approval_type == 'MAN')
										<a href="#" class="btn btn-get-link-offer">LIÊN KẾT</a>
										@elseif($offer->subs_status == 'REQ')
										<a href="#" class="btn btn-get-link-offer">ĐANG CHỜ PHÊ DUYỆT</a>
										@else
										<a href="#" class="btn btn-get-link-offer">KHÔNG THỂ LIÊN KẾT</a>
										@endif
									</div>
								</div>
								@if($offer->merchant_id == 'tpbank')
									<div style="position: absolute; top: 0; right: 0;" class="highlight-badge-offer">
										<div style="width: 40px;">
											<img src="{{ asset('images/new.svg') }}" alt="" style="width: 100%;">
										</div>
									</div>
								@endif
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="list-merchant-main-paging">
						@if ($maxPage > 1)
						{!! $link !!}
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="list-merchant-right">
			<div class="list-merchant-right-box">
				<div class="list-merchant-cate-title">
					<span>DANH MỤC CHIẾN DỊCH</span>
				</div>
				<hr>
				<div class="list-merchant-cate-content">
					@if (isset($categories))
					@foreach ($categories as $key => $cate)
					<div class="merchant-cate-item">
						<div class="merchant-cate-item-name {{ request('offer_category') == $key ? 'active' : '' }}" data-id="{{ $key }}">
							<div class="merchant-cate-item-name-box">
								<span>{{ $cate['name']['vi'] }}</span>
							</div>
						</div>
						<div class="merchant-cate-item-total">
							<span>{{ getOfferCount($cate['child'], request()->all()) }}</span>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script>
	$(".tabs-top-merchant").click(function(event) {
		$(".tabs-merchant-item").removeClass('active');
		$(this).addClass('active');
		$(".merchant-desc-item").removeClass('active');
		$(".merchant-desc-top").addClass('active');
		$(".merchant-content-item").removeClass('active');
		$(".merchant-content-top").addClass('active');
		$('.mer-item-card .owl-carousel').trigger('refresh.owl.carousel');
	});
	$(".tabs-new-merchant").click(function(event) {
		$(".tabs-merchant-item").removeClass('active');
		$(this).addClass('active');
		$(".merchant-desc-item").removeClass('active');
		$(".merchant-desc-new").addClass('active');
		$(".merchant-content-item").removeClass('active');
		$(".merchant-content-new").addClass('active');
		$('.mer-item-card .owl-carousel').trigger('refresh.owl.carousel');
	});
	$(".tabs-global-merchant").click(function(event) {
		$(".tabs-merchant-item").removeClass('active');
		$(this).addClass('active');
		$(".merchant-desc-item").removeClass('active');
		$(".merchant-desc-global").addClass('active');
		$(".merchant-content-item").removeClass('active');
		$(".merchant-content-global").addClass('active');
		$('.mer-item-card .owl-carousel').trigger('refresh.owl.carousel');
	});
</script>
<script>
	$('.top-merchant-card .owl-carousel, .new-merchant-card .owl-carousel').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		dots:false,
		lazyLoad:true,
		responsive:{
			1500:{
				items:5
			},
			1300:{
				items:4
			},
			1160:{
				items:3
			},
			1080:{
				items:2
			},
			860:{
				items:2
			},
			750:{
				items:1
			},
			640:{
				items:2
			},
			0:{
				items:1
			}
		}
	});

	$(".top-merchant-card .mer-card-slider-box.left-control-arrow").click(function(event) {
		$('.top-merchant-card .owl-carousel').trigger('prev.owl.carousel');
	});

	$(".top-merchant-card .mer-card-slider-box.right-control-arrow").click(function(event) {
		$('.top-merchant-card .owl-carousel').trigger('next.owl.carousel');
	});

	$(".new-merchant-card .mer-card-slider-box.left-control-arrow").click(function(event) {
		$('.new-merchant-card .owl-carousel').trigger('prev.owl.carousel');
	});

	$(".new-merchant-card .mer-card-slider-box.right-control-arrow").click(function(event) {
		$('.new-merchant-card .owl-carousel').trigger('next.owl.carousel');
	});
</script>
<script>
	$('.offer-filter select').change(function() {
		$('.offer-filter input, .offer-filter').submit();
	});

	$('.merchant-cate-item-name').click(function () {
		current = $(this);

		$('.merchant-cate-item-name').removeClass('active');
		current.addClass('active');

		$('#category-ip').val(current.attr('data-id'));

		$('.offer-filter').submit();
	});

	$('.offer-cate-mb-item').click(function () {
		current = $(this);

		$('#category-ip').val(current.attr('data-id'));

		$('.offer-filter').submit();
	});

	$(window).on('load', function() {
		setTimeout(function() {
			$('.mer-item-card .owl-carousel').trigger('refresh.owl.carousel');
		}, 1);
	});
</script>
@stop
