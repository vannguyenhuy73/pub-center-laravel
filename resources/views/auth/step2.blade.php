@extends('auth.layout.index')
@section('content')
	<style>
		.traffic-form-content {
			display: none;
			}
	</style>
	<div class="cleafix">
		<div class="boc-nut-dangki">
			<a class="btn nut-dang active-nut-dang">Đăng ký</a>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="boc-cac-buoc">
		<div class="row justify-content-between">
			<div class="col-lg-4 col-md-4 mb-xs">
				<span class="dk-tk">ĐĂNG KÝ TÀI KHOẢN</span>
			</div>
			<div class="col-lg-4 col-md-6 pa-top">
				<div class="boc-3-buoc">
					<div class="bao-buoc-1">
						<a href="{{route('register')}}" class="btn nut-buoc">Bước 1</a>
					</div>
					<div class="bao-buoc-1">
						<a class="btn nut-buoc active-nut-buoc">Bước 2</a>
					</div>
					<div class="bao-buoc-1">
						<a id="step_3" class="btn nut-buoc">Bước 3</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row bg-white mr-0 ml-0">
		<!-- Begin bước 2 -->
		<div class="col-xl-4 pl-0">
			<img src="{{asset('assets/config_register/img/img-khoi-b2.png')}}" alt="" class="img-khoi-b2">
		</div>
		<div class="col-xl-8 pb-4">
			<form action="" method="POST">
				@csrf()
				@method('POST')
				<input type="hidden" name="step" value="step2">
			<h6 class="h6-b2">Lưu ý: Các bạn hãy điền đầy đủ thông tin để nhận được hỗ trợ tốt nhất từ các AM của Adipia</h6>
			<p class="p-b2_1">1. Sắp tới bạn chọn những phương thức nào để tiếp cận khách hàng của mình? <span style="color: red;">*</span></p>
				<p style="color:red; font-size:12px;">
					@if ($errors->has('radio'))
						{{ $errors->first('radio') }}
					@endif
				</p>
				<div class="mb-1">
				<label class="bao-ra" id="1">Sử dụng Paid Traffic: Facebook Ads, Google Ads, Zalo Ads, GDN,...
					<input type="radio" checked="checked" name="radio" value="Sử dụng Pail Traffic: Facebook Ads, Google Ads, Zalo Ads, GDN,..">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="2">Sử dụng email, chatbot, sms,... gửi tin
					<input type="radio" name="radio" value="Sử dụng email, chatbot, sms,... gửi tin">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="3">Sở hữu nguồn traffic từ Website, Youtube
					<input type="radio" name="radio" value="Sở hữu nguồn traffic từ Website, Youtube">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="4">Là một KOls có tiếng nói, nhiều người theo dõi
					<input type="radio" name="radio" value="Là một KOls có tiếng nói, nhiều người theo dõi">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="5">Cashback (hoàn tiền khi mua sắm)
					<input type="radio" name="radio" value="Cashback (hoàn tiền khi mua sắm)">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="6">Kết hợp nhiều cách để tiếp cận khách hàng
					<input type="radio" name="radio" value="Kết hợp nhiều cách để tiếp cận khách hàng">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="7">Other:....
					<input type="radio" name="radio" value="Other">
					<span class="checkmark"></span>
				</label>
				<label class="bao-ra" id="8">Chưa biết sử dụng phương thức nào để bán được sản phẩm, cũng như tạo ra được doanh thu
					<input type="radio" name="radio" value="Chưa biết sử dụng phương thức nào để bán được sản phẩm, cũng như tạo ra được doanh thu">
					<span class="checkmark"></span>
				</label>
			</div>
			<hr>
			<p class="p-b2_2">2. Bạn đang sở hữu nguồn traffic gì?<span style="color: red;">*</span></p>
			<p style="color:red; font-size:12px;">
				@if ($errors->has('traffic'))
					{{ $errors->first('traffic') }}
				@endif
			</p>
			<div class="dan-hang-b2">
				<div class="dan-hang-b2-item-1">
					<div class="moi active-radio-button" id="rbn_1">
						<label class="bao-ra" id="1">WEBSITE
							<input type="radio" value="web" checked="checked" name="traffic">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="dan-hang-b2-item-2">
					<div class="moi" id="rbn_2">
						<label class="bao-ra" id="1">Social Media
							<input type="radio" value="social" name="traffic">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
			<div class="dan-hang-b2">
				<div class="dan-hang-b2-item-1">
					<div class="moi" id="rbn_3">
						<label class="bao-ra" id="1">Youtube Channel
							<input type="radio" value="youtube" name="traffic">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="dan-hang-b2-item-2">
					<div class="moi" id="rbn_4">
						<label class="bao-ra" id="1">Chưa sở hữu nguồn traffic nào
							<input type="radio" value="no" name="traffic">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
				<!-- form-->
			<div class="option-website" style="display: block;">
				<div class="row">

				</div>
			</div>
			<div class="text-center ma-t-35px mt-xs">
				<button type="submit" class="btn btn-danger nut-hoan-tt">HOÀN TẤT THÔNG TIN</button>
			</div>
			<input type="hidden" value="<?= $accId ?>" name="accId">
			<!-- End bước 2 -->
			</form>
		</div>  <!-- end row bg-white mr-0 ml-0 -->
		@endsection
@section('script')
	<script>
		$(document).ready(function(){
			// script viết cho radio button phần 1
			$("table tr.tr_1").click(function(){
				var x = document.querySelectorAll(".tr_1");
				console.log(x);
				console.log(x.length);
				for(var i = 0; i < x.length; i++)
				{
					$("table tr.tr_1").eq(i).children().eq(0).children().removeClass('color-red');
				}
				$(this).children().children().addClass('color-red');
			});

			// script viết cho radio button phần 2
			$("table tr.tr_2").click(function(){
				var y = document.querySelectorAll(".tr_2");
				for(var i = 0; i < y.length; i++)
				{
					$("table tr.tr_2").eq(i).children().eq(0).children().removeClass('color-red');
				}

				$("table tr.tr_2").removeClass('active-radio-button');
				$(this).addClass('active-radio-button');
				// $("i.far.fa-circle").addClass('color-red');
				$(this).children().eq(0).children().eq(0).addClass('color-red');

				var tmp = document.querySelectorAll(".traffic-form-content");
				var index = $(this).attr('id').substr(4, 1);
				for(var k = 0; k < tmp.length; k++){
					tmp[k].style.display = "none";
				}
				tmp[index - 1].style.display = "block";
			});

			$(".moi").click(function() {
				var tmp = document.querySelectorAll(".moi");
				var limit = tmp.length;
				var n = 0;
				while(n < limit){
					tmp[n].classList.remove('active-radio-button');
					n++;
				}
			})
		});

		$('#step_3').click(function() {
			toastr.error('Bạn phải hoàn thành từng bước một!');
		})


		web = '<div class="col-md-6">' +
			'<div class="mar-b-5px">' +
			'<input type="text" name="name_source" class="form-control form-b2" placeholder="Tên Website">' +
			'</div>' +
			'<div class="form-group">' +
			'<input type="url" name="url_source" class="form-control form-b2" placeholder="URL Website">' +
			'</div>' +
			'</div>' +
			'<div class="col-md-6">' +
			'<textarea class="form-control form-b2" name="detail" rows="3" id="comment" placeholder="Tóm lược về nội dung Website "></textarea>' +
			'</div>';
		youtube = '<div class="col-md-6">' +
			'<div class="mar-b-5px">' +
			'<input type="text" name="name_source" class="form-control form-b2" placeholder="Tên Kênh">' +
			'</div>' +
			'<div class="form-group">' +
			'<input type="url" name="url_source" class="form-control form-b2" placeholder="URL kênh của bạn">' +
			'</div>' +
			'</div>' +
			'<div class="col-md-6">' +
			'<textarea class="form-control form-b2_2" rows="3" name="detail_yt" id="comment" placeholder="Mô tả nội dung của kênh"></textarea>' +
			'</div>';
		social = '<div class="col-md-6">' +
			'<div class="mar-b-5px">' +
			'<select class="form-control form-b2"  name="name_source" >' +
			'<option value="" disabled selected>Mạng xã hội</option>' +
			'<option value="Facebook">Facebook</option>' +
			'<option value="Zalo">Zalo</option>' +
			'<option value="Twiter">Twiter</option>' +
			'<option value="Instagram">Instagram</option>' +
			'</select>' +
			'</div>' +
			'<div class="form-group" >' +
			'<select class="form-control form-b2"  name="detail">' +
			'<option value="" disabled selected>Phương thức sử dụng</option>' +
			'<option value=Sử dụng quảng cáo trả phí>Sử dụng quảng cáo trả phí</option>' +
			'<option value="Chia sẻ bài lên Profile, Group, Fanpage">Chia sẻ bài lên Profile, Group, Fanpage</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-md-6">' +
			'<input type="url" name="url_source" class="form-control form-b2"  id="comment" placeholder="Đường dẫn URL">' +
			'</div>';
		$('.option-website .row').html(web);
		$('[name=traffic]').click(function() {
			if($(this).val() == 'youtube') {
				$('.option-website .row').html(youtube);
			} else if($(this).val() == 'web') {
				$('.option-website .row').html(web);
			}else if($(this).val() == 'social') {
				$('.option-website .row').html(social);
			}else{
				$('.option-website .row').html('');
			}
		})

		$(".nut-hoan-tt").click(function(){
			$(this).css("pointer-events", "none");
		});

	</script>
@endsection