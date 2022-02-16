@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate Minishop')
@section('newpub_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
<style>
	:root {
		--mnsc-blue: rgb(6, 73, 143);
		--mnsc-orange: rgb(239, 61, 23);
		--mnsc-pink: rgb(185, 32, 79);
	}
	.mar-bot-50 { margin-bottom: 50px; }
	.mar-top-10 { margin-top: 10px; }
	.mar-top-20 { margin-top: 20px; }
	.f-we-600 { font-weight: 600; }
	.f-sz-10 { font-size: 10px; }
	.f-sz-16 { font-size: 16px; }
	.f-sz-18 { font-size: 18px; }
	.f-sz-20 { font-size: 20px; }
	.f-sz-22 { font-size: 22px; }
	.f-sz-26 { font-size: 26px; }
	.f-sz-120 { font-size: 120px; }
	.f-st-ita { font-style: italic; }
	.f-st-nor { font-style: normal; }
	.ln-he-90 { line-height: 90px; }
	.w-fit-cont { width: fit-content; }
	.mar-auto { margin: auto; }
	.txt-de-un { text-decoration: underline; }
	.txt-al-cen { text-align: center; }
	.bootstrap-select.btn-group .dropdown-menu li.disabled a span {
		color: grey;
	}
	.red-text {
		color: #f00;
	}
	.user-custom-products-box.blur-loading {
		opacity: 0.5;
		pointer-events: none;
	}
</style>
@stop
@section('newpub_main_content')
<div class="newpub-minishop-area">
	<div class="newpub-minishop-box">
		<div class="newpub-minishop-head">
			<div class="newpub-minishop-text">
				<div class="newpub-minishop-text-box">
					<div class="mar-bot-50 mar-top-10"><span class="f-we-600 f-sz-18">MINISHOP - GIA TĂNG DOANH SỐ, THÚC ĐẨY HOA HỒNG</span></div>
					<div class="newpub-minishope-text-center">
						<div class="w-fit-cont mar-auto">
							<div><span class="f-sz-26">Sở hữu <span class="f-we-600" style="color: var(--mnsc-blue);">SHOP BÁN HÀNG</span></span></div>
							<div><span class="f-we-600 f-sz-120 ln-he-90" style="color: var(--mnsc-orange);">Online</span></div>
							<div><span class="f-sz-22 f-st-ita">Ngay cả khi bạn <span class="txt-de-un f-we-600 f-st-nor" style="color: var(--mnsc-blue);">không có Website</span></span></div>
							<div class="newpub-minishop-advantages mar-top-20">
								<div class="newpub-minishop-advantages-item">
									<div class="minishop-advantages-icon">
										<img src="{{ asset('images/minishop_icon_tick.png') }}" alt="">
									</div>
									<div class="minishop-advantages-text">
										<span>Tạo Shop bán hàng Online trong 30s</span>
									</div>
								</div>
								<div class="newpub-minishop-advantages-item">
									<div class="minishop-advantages-icon">
										<img src="{{ asset('images/minishop_icon_tick.png') }}" alt="">
									</div>
									<div class="minishop-advantages-text">
										<span>Tự động tích hợp chương trình khuyến mại từ đối tác</span>
									</div>
								</div>
								<div class="newpub-minishop-advantages-item">
									<div class="minishop-advantages-icon">
										<img src="{{ asset('images/minishop_icon_tick.png') }}" alt="">
									</div>
									<div class="minishop-advantages-text">
										<span>Tự động cập nhật các sản phẩm hot theo ngành hàng</span>
									</div>
								</div>
								<div class="newpub-minishop-advantages-item">
									<div class="minishop-advantages-icon">
										<img src="{{ asset('images/minishop_icon_tick.png') }}" alt="">
									</div>
									<div class="minishop-advantages-text">
										<span>Kết nối trực tiếp với đối tác, không cần tư vấn khách hàng</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="newpub-minishop-image">
				<div class="newpub-minishop-image-box">
					<img src="{{ asset('images/minishop_introduce_img.png') }}" alt="">
				</div>
				<div class="newpub-minishop-create-button-area">
					<a href="#generate-shop"><div class="minishop-create-button">TẠO SHOP</div></a>
				</div>
			</div>
		</div>
		<div class="newpub-minishop-content" id="generate-shop">
			<div class="newpub-minishop-content-title">
				<span class="f-sz-20 f-we-600">CÀI ĐẶT GẮN <span style="color: var(--mnsc-pink);">MINI SHOP</span> LÊN WEBSITE</span>
			</div>
			<div class="newpub-minishop-auto-setting">
				<div class="minishop-setting-form">
					<div class="minishop-setting-form-head">
						<div class="icon_stt">1</div>
						<div class="minishop-setting-form-head-text">
							<span>GIAO DIỆN TRẢI NGHIỆM</span>
						</div>
					</div>
					<div class="minishop-setting-form-sub-head f-sz-16">
						<span>Yêu cầu hỗ trợ cài đặt</span>
					</div>
					<div class="minishop-setting-form-desc">
						<span>Để có thể gắn Minishop lên trang web của mình, bạn thậm chí còn chẳng mất đến một nốt nhạc. Hãy thử đoạn mã sau trên Website của mình và ngắm nhìn nó nhé! Đừng quên điền chính xác đường dẫn tới chúng để chúng tôi có thể support cho bạn mỗi khi cần.</span>
					</div>
					<div class="minishop-setting-form-main get-code">
						@if (count($shop_embed_code) == 0)
						<form action="{{ route('newpub.minishop.register_code') }}" id="myForm">
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Nhà cung cấp muốn MGG</span>
								</div>
								<div class="form-main-input">
									<select class="selectpicker form-control" multiple title="Chọn nhà cung cấp" data-live-search="true" name="merchants[]" id="merchants" required="" onchange="selectAllMultipleDropdown(this)">
										<option value="all">Tất Cả</option>
										@if ($category_list)
										@foreach ($category_list as $key => $ca)
										@if($ca['status'] == config('const.minishop.subs_status.approval') || $ca['type'] == config('const.minishop.auto'))
										<option value="{{ $key }}">{{ $ca['name'] }}</option>
										@else
										<option value="{{ $key }}" disabled="">{{ $ca['name'] }} (Chưa liên kết)</option>
										@endif
										@endforeach
										@endif
										@if ($adpia_merchant_coupons)
										@foreach ($adpia_merchant_coupons as $ad)
										<option value="{{ $ad->merchant_id }}" {{ $ad->subs_status == config('const.minishop.subs_status.approval') ? '' : 'disabled' }}>{{ ucfirst($ad->merchant_id) }} {{ $ad->subs_status == config('const.minishop.subs_status.approval') ? '' : '(Chưa liên kết)' }}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Nhóm sản phẩm</span>
								</div>
								<div class="form-main-input">
									<select class="selectpicker form-control" multiple title="Chọn nhóm sản phẩm" data-live-search="true" name="categories[]" id="categories" required=""
									onchange="selectAllMultipleDropdown(this)">
										<option value="all">Tất Cả</option>
										@if (isset($minishopCateList))
										@foreach ($minishopCateList as $mcat)
											<option value="{{ $mcat->minishop_category_code }}">{{ $mcat->minishop_category_name }}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Affiliate ID</span>
								</div>
								<div class="form-main-input">
									<select class="form-control" name="affiliate_id" id="affiliate_id">
										@php
										$siteList = \App\Http\Helpers\Helper::getListSite();
										@endphp
										@foreach ($siteList as $site)
										@if ($site->delete_flag == 'N')
										<option value="{{ $site->affiliate_id }}">{{ $site->affiliate_id }} ({{ $site->site_name }})</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Website muốn đặt shop</span>
								</div>
								<div class="form-main-input">
									<input type="url" class="form-control" name="site" id="site" required="" placeholder="Link gốc của website chứa shop. VD: https://xyz.com">
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Link cài đặt <span class="f-sz-10">(Dự kiến)</span></span>
								</div>
								<div class="form-main-input">
									<input type="url" class="form-control" name="link" id="link" required="" placeholder="Link đầy đủ của shop. VD: https://xyz.com/minishop">
								</div>
							</div>
							<div class="form-main-button">
								<button class="btn btn-success" id="get-code-minishop">Lấy Mã</button>
							</div>
						</form>
						@else
						@foreach ($shop_embed_code as $co)
						@include('newpub_layouts.minishop_code_php')

						<div style="margin: 10px 0; text-align: center;"><span style="color: var(--mnsc-orange);">(Lưu ý: Nếu muốn sửa đổi nội dung của code, xin vui lòng liên hệ với AM của bạn!)</span></div>
						@endforeach
						@endif
					</div>
				</div>
				<div class="minishop-setting-preview">
					<div class="minishop-setting-preview-pc">
						<div class="macbook">
							<div class="screen">
								<div class="viewport vp-pc-1" style="background-image:url('{{ config('const.ac_adpia')  }}/upload/images/review_minishop_bg.png');">
								</div>
								<div class="preview-pc-button">
									<div class="preview-pc-button-box">
										<a href="{{ asset('newpub/minishop/preview?screen=pc') }}" target="_blank" class="btn btn-warning">Xem Trước</a>
									</div>
								</div>
							</div>
							<div class="base"></div>
							<div class="notch"></div>
						</div>
					</div>
					<div class="minishop-setting-preview-mobile">
						<div class="smartphone">
							<div class="content">
								<img src="{{ config('const.ac_adpia') }}/upload/images/review_minishop_mb_bg.png" alt="">
							</div>
							<div class="preview-mobile-button">
								<div class="preview-mobile-button-box">
									<a href="{{ asset('newpub/minishop/preview?screen=mobile') }}" target="_blank" class="btn btn-warning">Xem Trước</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="newpub-minishop-custom-setting">
				<div class="minishop-setting-form">
					<div class="minishop-setting-form-head">
						<div class="icon_stt">2</div>
						<div class="minishop-setting-form-head-text">
							<span>TẠO WEBSITE BÁN HÀNG DÀNH RIÊNG CHO MÌNH</span>
						</div>
					</div>
					<div class="minishop-setting-form-sub-head f-sz-16">
						<span>Tạo Shop</span>
					</div>
					<div class="minishop-setting-form-desc">
						<span>Bạn chưa có Website? Đừng lo lắng, bạn vẫn có thể đăng ký tạo Shop cho mình một cách đơn giản và nhanh chóng. Hãy cho chúng tôi biết tên Shop, chúng tôi sẽ tạo Shop của riêng bạn trong nháy mắt. Quá tốt phải không nào? Vậy bạn còn chần chừ gì nữa mà không thử nhỉ?</span>
					</div>
					<div class="minishop-setting-form-main">
						@if ($link == null)
						<form action="{{ route('newpub.minishop.register_shop') }}" method="POST" enctype="multipart/form-data" id="minishop-register-shop-form">
							@csrf
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Tên Shop bán hàng</span>
								</div>
								<div class="form-main-input">
									<div class="input-group">
										<span style="font-size: 10px; color: #f00; opacity: 0; display: table-row;" id="isset-shop-name-mess">Tên shop đã tồn tại!</span>
										<input type="text" class="form-control" name="name" id="shop-name" required="" placeholder="Tên thương hiệu hiển thị trên shop">
										<div class="input-group-btn">
											<button class="btn btn-default" id="btn-check-shop-name">
												Kiểm tra
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Nhà cung cấp muốn MGG</span>
								</div>
								<div class="form-main-input">
									<select class="selectpicker form-control" multiple title="Chọn nhà cung cấp" data-live-search="true" name="merchants[]" required="" id="r-merchants-drop" onchange="selectAllMultipleDropdown(this)">
										<option value="all">Tất Cả</option>
										@if ($adpia_merchant_coupons)
										@foreach ($category_list as $key => $ca)
										@if($ca['status'] == config('const.minishop.subs_status.approval') || $ca['type'] == config('const.minishop.auto'))
										<option value="{{ $key }}">{{ $ca['name'] }}</option>
										@else
										<option value="{{ $key }}" disabled="">{{ $ca['name'] }} (Chưa liên kết)</option>
										@endif
										@endforeach
										@endif
										@if ($adpia_merchant_coupons)
										@foreach ($adpia_merchant_coupons as $ad)
										<option value="{{ $ad->merchant_id }}" {{ $ad->subs_status == config('const.minishop.subs_status.approval') ? '' : 'disabled' }}>{{ ucfirst($ad->merchant_id) }} {{ $ad->subs_status == config('const.minishop.subs_status.approval') ? '' : '(Chưa liên kết)' }}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Nhóm sản phẩm</span>
								</div>
								<div class="form-main-input">
									<select class="selectpicker form-control" multiple title="Chọn nhóm sản phẩm" data-live-search="true" name="categories[]" required="" id="r-categories-drop" onchange="selectAllMultipleDropdown(this)">
										<option value="all">Tất Cả</option>
										@if (isset($minishopCateList))
										@foreach ($minishopCateList as $mcat)
											<option value="{{ $mcat->minishop_category_code }}">{{ $mcat->minishop_category_name }}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Affiliate ID</span>
								</div>
								<div class="form-main-input">
									<select class="form-control" name="affiliate_id">
										@php
										$siteList = \App\Http\Helpers\Helper::getListSite();
										@endphp
										@foreach ($siteList as $site)
										@if ($site->delete_flag == 'N')
										<option value="{{ $site->affiliate_id }}">{{ $site->affiliate_id }} ({{ $site->site_name }})</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Logo shop (nếu có)</span>
								</div>
								<div class="form-main-input">
									<button class="btn btn-warning btn-logo-upload" style="width: 100%;"><i class="fa fa-download"></i> Chọn File Logo</button><br>
									<input type="file" class="form-control-file" name="logo_site" id="logo_site" accept=".png,.jpeg,.jpg" style="display: none;">
								</div>
							</div>
							<div class="form-main-group">
								<div class="form-main-label">
									<span>Link Minishop</span>
								</div>
								<div class="form-main-input">
									<input type="text" readonly="" class="form-control" name="link" required="" placeholder="link sẽ được tạo sau khi bạn đăng lý thành công">
								</div>
							</div>
							<div class="form-main-button">
								<button type="submit" class="btn btn-success" id="btn-submit-register-shop">ĐĂNG KÝ</button>
							</div>
						</form>
					</div>
					@else
						<div style="padding: 0 3.5vw;">
							<img src="/images/welcom-minishop-banner.png" alt="" style="width: 100%;">
						</div>
						<div class="form-main-group">
							<div class="form-main-label">
								<span>Link Minishop</span>
							</div>
							<div class="form-main-input link-shop-final">
								<input type="text" readonly="" class="form-control" name="link" id="link-final" required="" placeholder="link sẽ được tạo sau khi bạn đăng lý thành công" value="{{ $link->link }}">
								<button class="btn btn-info btn-copy-link-final"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="form-main-button">
							<button class="btn btn-info" id="user-custom-products-dashboard">SẢN PHẨM CỦA TÔI</button>
						</div></div>
					@endif
				</div>
				<div class="minishop-setting-preview">
					<div class="minishop-setting-preview-pc">
						<div class="macbook">
							<div class="screen">
								<div class="viewport vp-pc-2" style="background-image:url('{{ config('const.ac_adpia')  }}/upload/images/review_minishop_bg.png');">
								</div>
								<div class="preview-pc-button">
									<div class="preview-pc-button-box">
										<a href="{{ asset('newpub/minishop/preview?screen=pc') }}" target="_blank" class="btn btn-warning">Xem Trước</a>
									</div>
								</div>
							</div>
							<div class="base"></div>
							<div class="notch"></div>
						</div>
					</div>
					<div class="minishop-setting-preview-mobile">
						<div class="smartphone">
							<div class="content">
								<img src="{{ config('const.ac_adpia') }}/upload/images/review_minishop_mb_bg.png" alt="">
							</div>
							<div class="preview-mobile-button">
								<div class="preview-mobile-button-box">
									<a href="{{ asset('newpub/minishop/preview?screen=mobile') }}" target="_blank" class="btn btn-warning">Xem Trước</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- The Modal -->
<div id="exModal" class="ex-modal">
	<div class="ex-modal-content">
		<div class="ex-modal-header">
			<span class="ex-close" onclick="closeExPopup()">&times;</span>
			<h4>ĐOẠN MÃ CÀI ĐẶT MINISHOP</h4>
		</div>
		<div class="ex-modal-body">
			@include('newpub_layouts.minishop_code_js')
		</div>
	</div>
</div>

<div class="user-custom-product-modal">
	<div class="user-custom-product-modal-box">
		<div class="user-custom-product-modal-header">
			<div class="user-custom-product-modal-header-box">
				<div class="user-custom-product-modal-title">
					<span>DANH SÁCH SẢN PHẨM</span>
					<button class="btn btn-success add-new-item"><i class="fa fa-plus"></i> Thêm mới</button>
				</div>
				<div class="user-custom-product-modal-close">
					<i class="fa fa-times"></i>
				</div>
			</div>
		</div>
		<div class="user-custom-products-box">
		</div>
		<div class="user-custom-product-fade"></div>
		<div class="user-custom-product-modal-loading">
			<img src="https://media2.giphy.com/media/PnsF0HweRIw2A7K9yp/giphy.gif">
			<div>
				<span>Đang tải tài nguyên...</span>
			</div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/bootstrap-select.js') }}"></script>
<script>
	var shopNameChecking = '';
	$(".minishop-setting-preview-mobile .smartphone").hover(function() {
		$(this).children('.preview-mobile-button').css('display', 'flex');
	}, function() {
		$(this).children('.preview-mobile-button').css('display', 'none');
	});

	$(".minishop-setting-preview-pc .macbook .screen").hover(function() {
		$(this).children('.preview-pc-button').css('display', 'flex');
	}, function() {
		$(this).children('.preview-pc-button').css('display', 'none');
	});

	$("#get-code-minishop").click(function(event) {
		event.preventDefault();
			//set default code
			$("#merchants > option").each(function() {
				$("."+$(this).val()+"-val").html("\"false\"");
			});
			$("#categories > option").each(function() {
				$(".cate-list").html('""');
			});

			var $myForm = $("#myForm");
			var a = $myForm[0].checkValidity();
			var b = $myForm[0].reportValidity();
			if(a == true && b == true) {
				$('.loading').show();
				var merchants = $("#merchants").val();
				var categories = $("#categories").val();
				var site = $("#site").val();
				var link = $("#link").val();
				var aid = $("#affiliate_id").val();

				if(checkUrl(site) == false || checkUrl(link) == false) {
					$('.loading').hide();
					alert('Bạn cần nhập đúng định dạng link!');
					return;
				}
				if(merchants.indexOf('all') >= 0) {
					$("#merchants > option").each(function() {
						if(!$(this).attr('disabled')) {
							$("."+$(this).val()+"-val").html("\"true\"");
						}
					}); 
				} else {
					merchants.forEach(function (val, index) {
						$("."+val+"-val").html("\"true\"");
					});
				}

				var cateList = `"[`;
				if(categories.indexOf('all') >= 0) {
					$("#categories > option").each(function() {
						if($(this).val() == 'all') {
							return;
						}
						cateList += $(this).val() + ',';
					});
				} else {
					categories.forEach(function (val, index) {
						cateList += val + ',';
					});
				}
				if(cateList.length > 2) {
					cateList = cateList.substring(0, cateList.length - 1);
				}
				cateList += `]"`;

				$(".cate-list").html(cateList);

				$(".aid-regis").html(aid);

				$.ajax({
					url: $myForm.attr('action'),
					type: 'POST',
					data: {
						_token: $('meta[name="csrf-token"]').attr('content'),
						merchants: merchants,
						categories: categories,
						site: site,
						link: link,
						affiliate_id: aid
					},
				})
				.done(function(data) {
					if(data) {
						$("#exModal").css('display', 'block');
						$("#get-code-minishop").prop('disabled', 'disabled');
						$('.loading').hide();
						toastr.success(data['data']);
					}
				});
			}
		});

	function closeExPopup() {
		var modal = document.getElementById("exModal");
		modal.style.display = "none";
	}

	$(window).click(function(e) {
		if(e.target == document.getElementById("exModal")) {
			document.getElementById("exModal").style.display = "none";
		}
	});

	$("#link-final").click(function(event) {
		$(this).select();
		document.execCommand("copy");
		toastr.success("Copy thành công!");
	});

	$("#btn-check-shop-name").click(function(event) {
		event.preventDefault();
		if($('#shop-name').val().length > 0) {
			if($('#shop-name').val().length > 15) {
				$("#isset-shop-name-mess").css('opacity', '1');
				$("#isset-shop-name-mess").html('Tên shop không được dài quá 15 ký tự!');
				return;
			}
			if(/[`!@#$%^&*()+\=\[\]{};':"\\|,.<>\/?~]/.test($('#shop-name').val())) {
				$("#isset-shop-name-mess").css('opacity', '1');
				$("#isset-shop-name-mess").html('Tên shop không được chứa ký tự đặc biệt!');
				return;
			}
			if(/[^a-z0-9A-ZàáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳỵỷỹýÀÁÃẠẢĂẮẰẲẴẶÂẤẦẨẪẬÈÉẸẺẼÊỀẾỂỄỆĐÌÍĨỈỊÒÓÕỌỎÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦƯỨỪỬỮỰỲỴỶỸÝ _-]/u.test($('#shop-name').val())) {
				$("#isset-shop-name-mess").css('opacity', '1');
				$("#isset-shop-name-mess").html('Tên shop chỉ chấp nhận tiếng Việt và bảng chữ cái Latinh!');
				return;
			}
			$.ajax({
				url: '{{ route('newpub.minishop.check_shop_name') }}',
				type: 'POST',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					name: $('#shop-name').val()
				},
			})
			.done(function(data) {
				if(data['data'] > 0) {
					$("#isset-shop-name-mess").css('opacity', '1');
					$("#isset-shop-name-mess").html('Tên shop đã tồn tại!');
				} else {
					$("#isset-shop-name-mess").css('opacity', '1');
					$("#isset-shop-name-mess").html('Bạn có thể sử dụng tên shop này!');
					shopNameChecking = $('#shop-name').val();
				}
			});
		} else {
			$("#isset-shop-name-mess").css('opacity', '1');
			$("#isset-shop-name-mess").html('Hãy điền tên shop trước khi kiểm tra!');
			return;
		}
	});

	$('#shop-name').keyup(function(event) {
		if($("#isset-shop-name-mess").css('opacity') ==  '1' && $("#isset-shop-name-mess").html() == 'Bạn có thể sử dụng tên shop này!') {
			$.ajax({
				url: '{{ route('newpub.minishop.clear_session_shop_name') }}',
				type: 'POST',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'), 
					name: shopNameChecking},
			})
			.done(function(data) {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
		}
		$("#isset-shop-name-mess").css('opacity', '0');
		
	});

	$("#btn-submit-register-shop").click(function(event) {
		event.preventDefault();
		$('.loading').show();
		var flag = false;
		if($("#shop-name").val().length == 0) {
			alert('Bạn không được để trống tên shop!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#isset-shop-name-mess").css('opacity') == 0) {
			alert('Bạn hãy kiểm tra tên shop trước!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#isset-shop-name-mess").html() == 'Tên shop đã tồn tại!') {
			alert('Tên shop đã tồn tại!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#isset-shop-name-mess").html() == 'Tên shop không được dài quá 15 ký tự!') {
			alert('Tên shop không được dài quá 15 ký tự!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#isset-shop-name-mess").html() == 'Tên shop không được chứa ký tự đặc biệt!') {
			alert('Tên shop không được chứa ký tự đặc biệt!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#r-merchants-drop").val() == "") {
			alert('Bạn chưa chọn nhà cung cấp!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if($("#r-categories-drop").val() == "") {
			alert('Bạn chưa chọn nhóm sản phẩm!');
			flag = true;
			$('.loading').hide();
			return;
		}
		if(!flag) {
			var file = $("#logo_site")[0].files[0];
			if(file != undefined) {
				var formData = new FormData();
				var fileType = file['type'];
				var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
				if ($.inArray(fileType, validImageTypes) < 0) {
					alert('Logo của shop chỉ chấp nhận file ảnh (*.jpg, *.jpeg, *.png)');
					$('.loading').hide();
					return;
				}
				if(file['size'] > 2024000) {
					alert('Dung lượng của logo không vượt quá 2MB!');
					$('.loading').hide();
					return;
				}
				var _token = $('meta[name="csrf-token"]').attr('content');
				var date = Date.now();
				var newFileName = 'ms' + date + '_' + file['name'];
				formData.append('_token', _token);
				formData.append('files[]', file, newFileName);
				const proxyurl = '{{ config('const.minishop.proxy_url') }}';
				var url = '{{ config('const.minishop.do_upload_image_url') }}';
				$.ajax({
					url: proxyurl + url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					crossDomain: true,
					async: true,
					headers: {
						"cache-control": "no-cache"
					}
				})
				.done(function(data) {
					var formDataPHP = new FormData(document.getElementById("minishop-register-shop-form"));
					formDataPHP.append('date', date);
					$.ajax({
						url: '{{ route('newpub.minishop.register_shop') }}',
						type: 'POST',
						data: formDataPHP,
						processData: false,
						contentType: false
					})
					.done(function(data) {
						window.location.reload();
						$('.loading').hide();
					})
					.fail(function() {
						$('.loading').hide();
						console.log("error");
					});
				})
				.fail(function() {
					$('.loading').hide();
					alert('Lỗi upload ảnh logo của shop, xin vui lòng thử lại hoặc liên hệ với AM để được hỗ trợ kỹ thuật!');
				})
			} else {
				$("#minishop-register-shop-form").submit();
				$('.loading').hide();
			}
		}
	});

	function checkUrl(url)
	{
		var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;

		if(pattern.test(url)){
			return true;
		} else {
			return false;
		}
	}

	$(".btn-copy-link-final").click(function(event) {
		event.preventDefault();
		$("#link-final").select();
		document.execCommand("copy");
		toastr.success("Copy thành công!");
	});

	function selectAllMultipleDropdown(obj) {
		$(obj).on('changed.bs.select', function(e, clickedIndex, isSelected, oldValue) {
			e.preventDefault();
			var customValue = $(obj).val();
			if(clickedIndex == 0) {
				if(customValue.indexOf('all') >= 0) {
					$(obj).selectpicker('selectAll');
				} else {
					$(obj).selectpicker('deselectAll');
				}
			} else {
				if(customValue.indexOf('all') >= 0) {
					var arr = customValue.splice(0, 1);
					$(obj).selectpicker('val', customValue);
				}
			}
		});
	}

	$(".btn-logo-upload").click(function(event) {
		event.preventDefault();
		$("#logo_site").click();
	});

	$("#logo_site").change(function(event) {
		var file = $(this)[0].files[0];
		if(file) {
			var fileName = file.name;
			if(fileName.length > 20) {
				fileName = fileName.substr(0, 20) + "..."
			}
			$(".btn-logo-upload").html('<i class="fa fa-download"></i> 1 Hình Ảnh Đã Được Tải Lên');
		} else {
			$(".btn-logo-upload").html('<i class="fa fa-download"></i> Chọn File Logo');
		}
	});

	function getUserCustomProducts() {
		showLoadingProducts();
		jQuery(".user-custom-products-box").html('');
		$.ajax({
			url: '{{ route('newpub.minishop.get_user_custom_products') }}',
			type: 'GET'
		})
		.done(function(response) {
			var html = '';
			var add_flag = true;

			if(typeof response != "undefined" && response.data.custom_products != null) {

				if(response.status != 200) {
					return;
				}

				$.each(response.data.custom_products, function(index, item) {
					html += `<div class="user-custom-products-item" data-pid="` + item.products_item.pid + `">
						<div class="user-custom-products-item-box">
							<div class="user-custom-products-item-img">
								<a href="` + item.products_item.tracking_url + `" target="_blank"><img src="` + item.products_item.image + `" alt=""></a>
								<div class="share-icon-button adpia-share-custom-social-button-icon" data-index="` + index + `">
									<div class="share-icon-button-box ` + item.products_item.background + `">
										<i class="fa fa-share-alt" aria-hidden="true"></i>
									</div>
								</div>
								<div class="hot-tag-icon">
									<div class="hot-tag-icon-box">
										<span>HOT</span>
									</div>
								</div>
								<div class="update-item-control">
									<div class="update-item-control-box">
										<div class="update-item-control-button edit-item-button" data-id="` + item.products_item.pid + `">
											<i class="fa fa-edit"></i>
										</div>
										<div class="update-item-control-button status-item-button" data-id="` + item.products_item.pid + `" data-status="` + item.products_status + `">
											` + (item.products_status == 'active' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>') + `
										</div>
										<div class="update-item-control-button remove-item-button" data-id="` + item.products_item.pid + `">
											<i class="fa fa-trash"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="user-custom-products-item-content ` + item.products_item.background + `" data-background="` + item.products_item.background + `">
								<div class="user-custom-products-item-title adpia-title-tooltip">
									<span>` + item.products_item.name.substring(0, 45) + (item.products_item.name.length > 55 ? '...' : '') + `</span>
									<span class="adpia-title-tooltip-text">` + item.products_item.name + `</span>
								</div>
								<div class="user-custom-products-item-sale-price">
									<span>` + parseInt(item.products_item.sale_price).toLocaleString() + ` ₫</span>
								</div>
								<div class="user-custom-products-item-origin-price">
									<span>` + (!item.products_item.origin_price ? '' : parseInt(item.products_item.origin_price).toLocaleString() + ' ₫') + `</span>
								</div>
								<div class="user-custom-products-item-merchant-logo" data-mid="` + item.products_item.mid + `">
									<img src="` + item.products_item.mid_logo + `">
								</div>
								<div class="user-custom-products-item-buy-button ` + item.products_item.background + `">
									<button data-tracking-url="` + item.products_item.tracking_url + `" data-origin-url="` + item.products_item.origin_url + `"><i class="fa fa-shopping-cart"></i><span> MUA NGAY</span></button>
								</div>
							</div>
						</div>
					</div>`;
				});

				if(Object.keys(response.data.custom_products).length >= 8) {
					add_flag = false;
				}
			}

			if(add_flag) {
				$(".add-new-item").css('display', 'inline-block');
			}

			hideLoadingProducts();

			jQuery(".user-custom-products-box").html(html);

			jQuery(".user-custom-products-box .user-custom-products-item-img img").on('error', function(event) {
				event.preventDefault();
				$(this).attr('src', '{{ config('const.minishop.default_user_custom_products_image') }}');
			});
		});
	}

	jQuery(".user-custom-products-box").on('click', '.user-custom-products-item-buy-button button', function(event) {
		event.preventDefault();
		window.open($(this).attr("data-tracking-url"), "_blank");
	});

	$("#user-custom-products-dashboard").click(function(event) {
		event.preventDefault();
		getUserCustomProducts();
		$(".user-custom-product-modal").css('display', 'block');
	});

	$(".user-custom-product-modal-close .fa").click(function(event) {
		$(".user-custom-product-modal").css('display', 'none');
		$(".user-custom-product-modal-title").html('<span>DANH SÁCH SẢN PHẨM</span> <button class="btn btn-success add-new-item"><i class="fa fa-plus"></i> Thêm mới</button>');
	});

	$(".user-custom-products-box").on('click', '.remove-item-button', function(event) {
		if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
			showLoadingProducts();
			var pid = $(this).attr('data-id');

			$.ajax({
				url: '{{ route('newpub.minishop.remove_user_custom_products') }}',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}",
					pid: pid
				},
			})
			.done(function(response) {
				hideLoadingProducts();
				toastr.success('Xóa sản phẩm thành công!');

				for(var i = 0; i < $(".user-custom-products-item").length; i++) {
					if($(".user-custom-products-item").eq(i).attr('data-pid') == pid) {
						$(".user-custom-products-item").eq(i).fadeOut(500, function() {
							$(this).remove();
							if($(".user-custom-products-item .user-custom-products-item-img").length == 7) {
								$(".add-new-item").css('display', 'inline-block');
							}
						}).fadeIn(500);
					}
				}
			});
		}
	});

	$(".user-custom-products-box").on('click', '.status-item-button', function() {
		showLoadingProducts();
		var pid = $(this).attr('data-id');
		var products_status = $(this).attr('data-status');
		var element = $(this);

		$.ajax({
			url: '{{ route('newpub.minishop.change_status_user_custom_products') }}',
			type: 'POST',
			data: {
				"_token": "{{ csrf_token() }}",
				pid: pid,
				products_status: products_status
			},
		})
		.done(function(response) {
			if(products_status == 'active') {
				element.html('<i class="fa fa-eye-slash"></i>');
				element.attr('data-status', 'deactive');
			} else {
				element.html('<i class="fa fa-eye"></i>');
				element.attr('data-status', 'active');
			}

			toastr.success('Thay đổi trạng thái thành công!');

			hideLoadingProducts();
		});
	});

	$(".user-custom-product-modal-box").on('click', ".add-new-item", function() {
		$(".user-custom-product-modal-title").fadeOut(500, function() {
        	$(this).html('THÊM MỚI SẢN PHẨM').fadeIn(500);
        	$(".user-custom-products-box").addClass('form-control-data');
    	});

    	addNewUserCustomProducts();
    	$("input[name=image]").attr("required", "required");
	});

	function addNewUserCustomProducts(update_flag = false, preview_product = null) {
		var html = `<div class="user-custom-product-edit">
					<div class="user-custom-product-edit-box">
						<div class="user-custom-product-edit-form">
							<form action="{{ route('newpub.minishop.set_user_custom_products') }}" method="POST" enctype="multipart/form-data" class="edit-product-form">
							@csrf
								<div class="form-group">
									<label for="name">Tên sản phẩm <span class="red-text">*</span></label>
									<input type="text" class="form-control" placeholder="VD: Áo thun phối vạt tay dài nữ - Sweater phông dáng suông thêu chữ basic kiểu dáng korea HOT" name="name" maxlength="200" required>
								</div>
								<div class="form-group">
									<label for="image">Hình ảnh <span class="red-text">*</span></label>
									<input type="hidden" class="form-control" name="old_image">
									<p class="old-image-name" style="line-break: anywhere;"></p>
									<input type="file" class="form-control" name="image" accept="image/*" ` + (update_flag == false ? 'required' : '') + `>
									<small class="form-text text-muted">Kích thước tỉ lệ 1:1, tối thiểu 345px, tối đa 1500px</small><br>
									<small class="form-text text-muted red-text size-img-valid"></small>
								</div>
								<div class="form-group">
									<label for="mid">Nhà cung cấp <span class="red-text">*</span></label>
									<select class="form-control" name="mid" required>
										<option selected disabled hidden value="">-- Chọn nhà cung cấp --</option>
										@foreach ($listMerchant as $merchant)
											<option value="{{ $merchant->merchant_id }}" data-logo="{{ $merchant->banner_url }}">{{ $merchant->merchant_id }}</option>
										@endforeach
									</select>
									<small class="form-text text-muted">Danh cách những nhà cung cấp đã liên kết</small>
									<input type="hidden" name="mid_logo"/>
								</div>
								<div class="form-group">
									<label for="sale_price">Giá bán <span class="red-text">*</span></label>
									<div class="input-icon-group">
										<input type="number" class="form-control" placeholder="VD: 30000" name="sale_price" required pattern="[0-9]*" inputmode="numeric">
										<div style="position: absolute; top: 0; left: 0; width: 30px; background: #ddd;">₫</div>
									</div>
									<small class="form-text text-muted">Giá sản phẩm thấp nhất là 1,000 và cao nhất là 99,999,999</small></br>
									<small class="form-text text-muted red-text sale-price-valid"></small>
								</div>
								<div class="form-group">
									<label for="origin_price">Giá gốc</label>
									<div class="input-icon-group">
										<input type="number" class="form-control" placeholder="VD: 35000" name="origin_price" pattern="[0-9]*" inputmode="numeric">
										<div style="position: absolute; top: 0; left: 0; width: 30px; background: #ddd;">₫</div>
									</div>
									<small class="form-text text-muted">Lưu ý: Nếu sản phẩm không được áp dụng giảm giá, hãy để trống trường này</small></br>
									<small class="form-text text-muted red-text origin-price-valid"></small>
								</div>
								<div class="form-group">
									<label for="origin_url">Đường dẫn sản phẩm <span class="red-text">*</span></label>
									<input type="url" class="form-control" placeholder="VD: https://shopee.vn/%C3%81o-gi%E1%BB%AF-nhi%E1%BB%87t-N%E1%BB%AE-New-Style-i.44651390.1608597910" name="origin_url" required>
									<small class="form-text text-muted red-text origin-url-valid"></small>
								</div>
								<div class="form-group">
									<label for="background">Màu nền <span class="red-text">*</span></label>
									<div class="form-select-color-theme">
										<div class="form-select-color-theme-box">
											<div class="blue-item"></div>
											<div class="orange-item"></div>
											<div class="green-item"></div>
											<div class="purple-item"></div>
										</div>
									</div>
								</div>
								<input type="hidden" name="background" />
								<button type="submit" class="btn btn-success btn-edit-submit"><i class="fa fa-save"></i> Lưu</button>
								<button class="btn btn-danger btn-edit-cancel"><i class="fa fa-times"></i> Hủy</button>
							</form>
						</div>
						<div class="user-custom-product-edit-preview">
							<div class="user-custom-product-edit-preview-box">
								<div class="user-custom-products-item">
									<div class="user-custom-products-item-box">
										<div class="user-custom-products-item-img">
											<img src="{{ config('const.minishop.default_user_custom_products_image') }}" alt="">
											<div class="share-icon-button">
												<div class="share-icon-button-box grey-item">
													<i class="fa fa-share-alt" aria-hidden="true"></i>
												</div>
											</div>
											<div class="hot-tag-icon">
												<div class="hot-tag-icon-box">
													<span>HOT</span>
												</div>
											</div>
										</div>
										<div class="user-custom-products-item-content grey-item">
											<div class="user-custom-products-item-title adpia-title-tooltip">
												<span>Tên sản phẩm</span>
												<span class="adpia-title-tooltip-text">Tên sản phẩm</span>
											</div>
											<div class="user-custom-products-item-sale-price">
												<span>0 ₫</span>
											</div>
											<div class="user-custom-products-item-origin-price">
												<span></span>
											</div>
											<div class="user-custom-products-item-merchant-logo">
												<img src="{{ config('const.minishop.default_user_custom_products_image') }}">
											</div>
											<div class="user-custom-products-item-buy-button grey-item">
												<button>
													<i class="fa fa-shopping-cart"></i>
													<span> MUA NGAY</span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>`;

		jQuery(".user-custom-products-box").fadeOut(500, function() {
			$(this).html(html);
			if(update_flag == true) {
				showEditProductInfo(preview_product);
			}
		}).fadeIn(500);
	}

	jQuery(".user-custom-products-box").on("click", ".btn-edit-cancel", function(event) {
		event.preventDefault();
		jQuery(".user-custom-products-box").fadeOut(500, function() {
			$(".user-custom-products-box").removeClass('form-control-data');
			getUserCustomProducts();
		}).fadeIn(500);
		$(".user-custom-product-modal-title").fadeOut(500, function() {
        	$(this).html('<span>DANH SÁCH SẢN PHẨM</span> <button class="btn btn-success add-new-item"><i class="fa fa-plus"></i> Thêm mới</button>').fadeIn(500);
    	});
	});
</script>
<script>
	jQuery(".user-custom-products-box").on('mouseenter', '.adpia-title-tooltip', function(event) {
		event.preventDefault();
		var height = jQuery(this).children(".adpia-title-tooltip-text").innerHeight();
		jQuery(this).children(".adpia-title-tooltip-text").css('top', (height * -1) + 5);
	});

	jQuery(".user-custom-products-box").on('mouseleave', '.adpia-title-tooltip', function(event) {
		event.preventDefault();
		var height = jQuery(this).children(".adpia-title-tooltip-text").innerHeight();
		jQuery(this).children(".adpia-title-tooltip-text").css('top', (height * -1));
	});

	function hideLoadingProducts() {
		$('.user-custom-product-modal-loading').css('display', 'none');
		$(".user-custom-products-box").removeClass('blur-loading');
	}

	function showLoadingProducts() {
		$('.user-custom-product-modal-loading').css('display', 'block');
		$(".user-custom-products-box").addClass('blur-loading');
	}

	jQuery(".user-custom-products-box").on("click", ".form-select-color-theme-box div", function(event) {
		var background = $(this).attr('class');
		var elm = $(".user-custom-product-edit-preview");
		$(".user-custom-product-edit-preview .share-icon-button-box").attr('class', 'share-icon-button-box ' + background);
		$(".user-custom-product-edit-preview .user-custom-products-item-content").attr('class', 'user-custom-products-item-content ' + background);
		$(".user-custom-product-edit-preview .user-custom-products-item-buy-button").attr('class', 'user-custom-products-item-buy-button ' + background);
		$('input[name="background"]').val(background);
	});

	jQuery(".user-custom-products-box").on("keyup", "input[name=name]", function(event) {
		var name = $(this).val();
		if(name.length == 0) {
			name = 'Tên sản phẩm';
		}
		sub_name = name.substring(0, 45) + (name.length > 45 ? '...' : '');
		$(".user-custom-product-edit-preview .user-custom-products-item-title > span:nth-child(1)").text(sub_name);
		$(".user-custom-product-edit-preview .adpia-title-tooltip-text").text(name);
	});

	jQuery(".user-custom-products-box").on("change", "input[name=image]", function(event) {
		var default_image = '{{ config('const.minishop.default_user_custom_products_image') }}';
		var prevew_product_img = $(".user-custom-product-edit-preview .user-custom-products-item-img img");
		prevew_product_img.attr('src', default_image);
		var file = this.files[0];
		var _URL = window.URL || window.webkitURL;
		$(".size-img-valid").text('');

		if(file == "undefined") {
			prevew_product_img.attr('src', default_image);
			$(".old-image-name").text('');
		} else {
			var minSize = 345;
			var maxSize = 1500;
			var maxFileSize = 2097152;

			$(".old-image-name").text(file.name);

			var fileType = file['type'];
			var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
			if ($.inArray(fileType, validImageTypes) < 0) {
				$(".size-img-valid").text('Hình ảnh sản phẩm bắt buộc phải là file ảnh!');
				return false;
			}
			if(file['size'] > maxFileSize) {
				$(".size-img-valid").text('Dung lượng của logo không vượt quá 2MB!');
				return false;
			}

			var img = new Image();
			var objectUrl = _URL.createObjectURL(file);
			img.src = objectUrl;

			img.onload = function() {
				if(this.height != this.width || this.height < minSize || this.width < minSize || this.height > maxSize || this.width > maxSize) {

					if(this.height != this.width) {
						$(".size-img-valid").text('Kích thước ảnh không đúng tỉ lệ 1:1');
					} else if (this.height < minSize || this.width < minSize) {
						$(".size-img-valid").text('Kích thước ảnh không được nhỏ hơn '+minSize+'px');
					} else if (this.height > maxSize || this.width > maxSize) {
						$(".size-img-valid").text('Kích thước ảnh không được lớn hơn '+maxSize+'px');
					}

					prevew_product_img.attr('src', default_image);
					return false;
				}

				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function(e) {
					prevew_product_img.attr('src', e.target.result);
				}
			}
		}
	});

	jQuery(".user-custom-products-box").on("keyup", "input[name=sale_price]", function(event) {
		var sale_price = $(this).val();
		var valid = /^[1-9][0-9]{3,7}$/.test(sale_price);

		$(".sale-price-valid").html('');
		$(this).css('border', '1px solid #ccc');

		if(!valid && sale_price.length > 0) {
			$(".sale-price-valid").html('Giá sản phẩm không hợp lệ');
			$(this).css('border', '1px solid #f00');
			return false;
		}

		if(sale_price.length == 0) {
			sale_price = 0;
		}

		$(".user-custom-product-edit-preview .user-custom-products-item-sale-price span").text(parseInt(sale_price).toLocaleString() + " ₫");
	});

	jQuery(".user-custom-products-box").on("keyup input", "input[name=origin_price]", function(event) {
		var origin_price = $(this).val();
		var valid = /^[1-9][0-9]{3,7}$/.test(origin_price);

		$(".origin-price-valid").html('');
		$(this).css('border', '1px solid #ccc');

		if(!valid && origin_price.length > 0) {
			$(".origin-price-valid").html('Giá sản phẩm không hợp lệ');
			$(this).css('border', '1px solid #f00');
			return false;
		}

		if(origin_price.length == 0) {
			origin_price = 0;
			$(".user-custom-product-edit-preview .user-custom-products-item-origin-price span").text('');
			return false;
		}

		$(".user-custom-product-edit-preview .user-custom-products-item-origin-price span").text(parseInt(origin_price).toLocaleString() + " ₫");
	});

	jQuery(".user-custom-products-box").on("keyup input", "input[name=origin_url]", function(event) {
		origin_url = $(this).val();
		$(".user-custom-product-edit-preview .user-custom-products-item-buy-button button").attr("data-tracking-url", origin_url);
		$("select[name=mid], input[name=origin_url]").css('border', '1px solid #ccc');
		$(".origin-url-valid").text('');
	});

	$(".user-custom-products-box").on("change", "select[name=mid]", function(event) {
		m_logo = $(this).find(':selected').attr('data-logo');
		$(".user-custom-product-edit-preview .user-custom-products-item-merchant-logo img").attr('src', m_logo);
		$('input[name="mid_logo"]').val(m_logo);
		$("select[name=mid], input[name=origin_url]").css('border', '1px solid #ccc');
		$(".origin-url-valid").text('');
	});

	jQuery(".user-custom-products-box").on('click', '.btn-edit-submit', function(event) {
		event.preventDefault();
		var formElement = $(".edit-product-form")[0];
		$(".origin-url-valid").text('');

		var a = $(".edit-product-form")[0].checkValidity();
		var b = $(".edit-product-form")[0].reportValidity();
		if(a == true && b == true && $(".size-img-valid").text().length == 0 && $(".origin-price-valid").text().length == 0 && $(".sale-price-valid").text().length == 0) {
			if($(".user-custom-product-edit-preview .user-custom-products-item-content.grey-item")[0]) {
				alert("Bạn vui lòng chọn màu nền!");
				return;
			}

			showLoadingProducts();

			$.ajax({
				url: '{{ route('newpub.minishop.check_merchant_approve_by_url') }}',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}",
					"origin_url": $("input[name=origin_url]").val(),
					"mid": $("select[name=mid]").val()
				},
			})
			.done(function(response) {
				if(response['status'] == 100) {
					$(".origin-url-valid").text('Bạn chưa liên kết với nhà cung cấp này!');
					hideLoadingProducts();
					return false;
				} else if(response['status'] == 300){
					$(".origin-url-valid").text('Link sản phẩm không phải của nhà cung cấp bạn chọn!');
					$("input[name=origin_url], select[name=mid]").css("border", "1px solid #f00");
					hideLoadingProducts();
					return false;
				} else if (response['status'] == 400) {
					$(".origin-url-valid").text('Nhà cung cấp này không tồn tại!');
					hideLoadingProducts();
					return false;
				} else {
					var formData = new FormData(formElement);
					$.ajax({
						url: $(".edit-product-form").attr("action"),
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						processData: false
					})
					.done(function(response) {
						if(response.status != 200) {
							toastr.error("Có lỗi xảy ra!");
							hideLoadingProducts();
							return false;
						} else {
							if(response.data == "insert") {
								toastr.success("Thêm mới sản phẩm thành công!");
							} else if(response.data == "update") {
								toastr.success("Cập nhật sản phẩm thành công!");
							}
						}
						jQuery(".user-custom-products-box").fadeOut(500, function() {
							$(".user-custom-products-box").removeClass('form-control-data');
							getUserCustomProducts();
						}).fadeIn(500);

						$(".user-custom-product-modal-title").fadeOut(500, function() {
							$(this).html('<span>DANH SÁCH SẢN PHẨM</span> <button class="btn btn-success add-new-item"><i class="fa fa-plus"></i> Thêm mới</button>').fadeIn(500);
						});
					});
				}
			});
		}
	});

	jQuery(".user-custom-products-box").on('click', '.edit-item-button', function(event) {
		$(".user-custom-product-modal-title").fadeOut(500, function() {
        	$(this).text('SỬA SẢN PHẨM').fadeIn(500);
        	$(".user-custom-products-box").addClass('form-control-data');
    	});

    	var pid = $(this).attr("data-id");

    	for(var i = 0; i < $(".user-custom-products-item").length; i++) {
    		if($(".user-custom-products-item").eq(i).attr("data-pid") == pid) {
    			preview_product = $(".user-custom-products-item").eq(i).clone();
    			break;
    		}
    	}

    	addNewUserCustomProducts(true, preview_product);
	});

	function showEditProductInfo(preview_product) {
		$(".edit-product-form").attr("action", "{{ route('newpub.minishop.update_user_custom_products') }}");
    	$(".user-custom-product-edit-preview-box").html(preview_product);

    	var pid = $(".user-custom-product-edit-preview .user-custom-products-item").attr('data-pid');
    	$(".user-custom-product-edit-preview .update-item-control").remove();

    	for(var i = 0; i < $(".user-custom-products-item").length; i++) {
    		if($(".user-custom-products-item").eq(i).attr("data-pid") == pid) {
    			var elm = $(".user-custom-products-item").eq(i);
    			var	name = elm.find(".adpia-title-tooltip-text").text();
    			var image = elm.find(".user-custom-products-item-img img").attr("src");
    			var mid = elm.find(".user-custom-products-item-merchant-logo").attr("data-mid");
    			var sale_price = elm.find(".user-custom-products-item-sale-price span").text().replace(/,/g, '').replace(/ ₫/g, '');
    			var origin_price = elm.find(".user-custom-products-item-origin-price span").text().replace(/,/g, '').replace(/ ₫/g, '');
    			var origin_url = elm.find(".user-custom-products-item-buy-button button").attr("data-origin-url");
    			var background = elm.find(".user-custom-products-item-content").attr("data-background");
    			var mid_logo = elm.find(".user-custom-products-item-merchant-logo img").attr("src");

    			$("input[name=name]").last().val(name);
    			$("input[name=old_image]").val(image);
    			$(".old-image-name").text(image.split('/')[image.split('/').length - 1]);
    			$("select[name=mid]").val(mid);
    			$("input[name=sale_price]").val(sale_price);
    			$("input[name=origin_price]").val(origin_price);
    			$("input[name=origin_url]").val(origin_url);
    			$("input[name=background]").val(background);
    			$("input[name=mid_logo]").val(mid_logo);

    			$(".edit-product-form").append('<input type="hidden" name="pid" value="' + pid + '" />');
    		}
    	}
	}
</script>
@stop