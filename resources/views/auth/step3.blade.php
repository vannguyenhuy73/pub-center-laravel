@extends('auth.layout.index')
@section('content')
<div class="cleafix">
	<div class="boc-nut-dangki">
		<a href="" class="btn nut-dang active-nut-dang">Đăng ký</a>
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
					<a href="" class="btn nut-buoc">Bước 1</a>
				</div>
				<div class="bao-buoc-1">
					<a href="" class="btn nut-buoc">Bước 2</a>
				</div>
				<div class="bao-buoc-1">
					<a href="" class="btn nut-buoc active-nut-buoc">Bước 3</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row bg-white mr-0 ml-0">
	<!-- Begin bước 3 -->
	<div class="col-md-5">
		<img src="{{asset('assets/config_register/img/mail-b3.png')}}" alt="" class="img-mail-b3 img-move_1">
	</div>
	<div class="col-md-7 text-center">
		<p style="margin-top: 22%;font-size: 26px;font-weight: 700;">
		Bạn vui lòng mở Email<br>
		({{ $inforMail->contact_mail }})<br>
		để xác nhận đăng ký thành công
		</p>
		<a href="https://mail.google.com/mail/u/0/" class="btn btn-danger" target="_blank">MỞ EMAIL NGAY</a>
	</div>
	<div class="col-md-12 pt-3 pb-5">
		<h6 class="h5-buoc3">Chỉ còn 1 bước nữa thôi! Là bạn đã có thể bắt đầu kiếm tiền với Adpia</h6>
	</div>
	
</div>
@endsection