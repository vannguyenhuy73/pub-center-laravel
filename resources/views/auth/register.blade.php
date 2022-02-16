@extends('auth.layout.index')
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
@php
echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>';
echo "<script type='text/javascript'> toastr.error('".$error."') </script>";
@endphp
@endforeach
@endif
    <div class="cleafix">
        <div class="boc-nut-dangki">
            <a  class="btn nut-dang active-nut-dang">Đăng ký</a>
        </div>
        <div class="boc-nut-dangnhap">
            <a href="{{route('login')}}" class="btn nut-dang">Đăng nhập</a>
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
                        <a class="btn nut-buoc active-nut-buoc">Bước 1</a>
                    </div>
                    <div class="bao-buoc-1" id="step_2">
                        <a  class="btn nut-buoc">Bước 2</a>
                    </div>
                    <div class="bao-buoc-1" id="step_3">
                        <a  class="btn nut-buoc">Bước 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-white mr-0 ml-0 pa-b-30px">
        <div class="col-lg-5">
            <img src="{{asset('assets/config_register/img/anh_1_b1.png')}}" alt="" class="img-anh-b1">
        </div>
        <div class="col-lg-7 pt-3">
            <form action="" method="POST" id="form_step1">
                @method('post')
                @csrf()
                <input type="hidden" name="step" value="step1">
                <h4 class="title">HOÀN THIỆN ĐẦY ĐỦ CÁC THÔNG TIN</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('user_name'))
                                            {{ $errors->first('user_name') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="text" required class="form-control form-dangnhap ipad-small" name="user_name" placeholder="Tên Đăng Nhập ..."value="{{ !empty(Session::get('user_register')['user_name'])?Session::get('user_register')['user_name']:old('user_name')}}" id="username">
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('full_name'))
                                            {{ $errors->first('full_name') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="text" id="name" name="full_name" required class="form-control
                                    form-dangnhap ipad-small" placeholder="Họ và Tên ..." value="{{ !empty (Session::get('user_register')['full_name'])?Session::get('user_register')['full_name']:old('full_name')}}" maxlength="50">
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="password" id="password" required class="form-control form-dangnhap ipad-small" name="password" placeholder="Mật Khẩu ..." value="{{ !empty(Session::get('user_register')['password'])?Session::get('user_register')['password']:''}}" maxlength="16" >
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('password_confirmation'))
                                            {{ $errors->first('password_confirmation') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="password" id="password_confirmation" required class="form-control form-dangnhap ipad-small" name="password_confirmation" maxlength="16" placeholder="Nhập Lại Mật Khẩu ..." value="{{ !empty(Session::get('user_register')['password'])?Session::get('user_register')['password']:''}}">
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group" style="position: relative;">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="email" value="{{ !empty(Session::get('user_register')['email'])?Session::get('user_register')['email']:old('email')}}" name="email" required class="form-control form-dangnhap ipad-small" placeholder="Email ..." id="email"  maxlength="50">
									<div class="suggest-email-domain">
									</div>
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('phone'))
                                            {{ $errors->first('phone') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="text" value="{{ !empty(Session::get('user_register')['phone'])?Session::get('user_register')['phone']:old('phone')}}" name="phone" required class="form-control form-dangnhap ipad-small" placeholder="Số Điện Thoại ..." id="phone" maxlength="12">
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('contact_address2'))
                                            {{ $errors->first('contact_address2') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <select name="contact_address2" id="contact_address2" required class="form-control form-dangnhap ipad-small">
                                        <option value="" disabled=""{{ empty(Session::get('user_register')['contact_address2'])?'selected':''}}>Tỉnh/Thành phố</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item-2 ml-1">
                                <div class="dau-sao">*</div>
                            </div>
                        </div>
                    </div>
                </div>  <!-- end row -->
                <h4 class="mt-4 mb-3 text-center">THÔNG TIN KHÁC</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <label for="" class="ipad-small">Số điện thoại đăng ký ZALO của bạn *</label>
                                    <span style="color:red; font-size:12px">
                                        @if ($errors->has('zalo_phone'))
                                            {{ $errors->first('zalo_phone') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="text"  value="{{ !empty(Session::get('user_register')['zalo_phone'])?Session::get('user_register')['zalo_phone']:old('zalo_phone')}}" required name="zalo_phone" class="form-control form-dangnhap ipad-small" placeholder="" id="zalo_phone" maxlength="12" >
                                </div>
                            </div>
                            <div class="item-2"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="item-1">
                                <div class="form-group">
                                    <label for="" class="ipad-small">Link Profile Facebook *</label>
                                    <span style="color:red; font-size:12px; display: block;">
                                        @if ($errors->has('link_facebook'))
                                            {{ $errors->first('link_facebook') }}
                                        @endif
                                        &nbsp;
                                    </span>
                                    <input type="url"  value="{{ !empty(Session::get('user_register')['link_facebook'])?Session::get('user_register')['link_facebook']:old('link_facebook')}}" required name="link_facebook" class="form-control form-dangnhap ipad-small" placeholder="" id="link_facebook"  maxlength="50">
                                </div>
                            </div>
                            <div class="item-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-8" style="padding-top: 10px;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" name="check" class="form-check-input" {{ !empty(Session::get('user_register')['check'])?'checked':''}} value="check">
                                Tôi đồng ý với các <a href="https://adpia.vn/info/AFFILIATE_AGREEMENT.pdf" class="link-dk">điều khoản</a> dành cho đối tác
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-sm-center text-xs-center mt-xs">
                            <button class="btn nut-next">NEXT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>  <!-- end col-lg-7 -->
    </div>  <!-- end row bg-white mr-0 ml-0 -->
@endsection
@section('script')
<script src="{{ asset('js/dvhc_data.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script >
    $(document).ready(function($) {
        var html = '';
        $.each(local.data, function(index, val) {
           html += '<option value="' + val.name + '">' + val.name + '</option>';
       });

        $("select[name=contact_address2]").append(html);
		
		$('input[name=email]').tooltip({'trigger':'focus', 'title': 'Vui lòng nhập chính xác địa chỉ email của bạn. Lưu ý phân biệt chữ hoa, chữ thường.'});
		
		$('input[name=link_facebook]').tooltip({'trigger':'focus', 'title': 'Đường link đẫn đến trang facebook cá nhân của bạn.'});
    });

    $('#step_3 ').click(function() {
        toastr.error('Bạn phải hoàn thành từng bước một!');
    })

	$('#step_2').click(function() {
	    check= $('.form-check-input').val();
	    link_fb = $('#link_facebook').val();
        zalo_phone = $('#zalo_phone').val();
        phone = $('#phone').val();
        email = $('#email').val();
        user_name = $('#username').val();
        full_name = $('#name').val();
        password = $('#password').val();
        password_confirmation = $('#password_confirmation').val();

	    if(check != '' && link_fb != '' && zalo_phone != '' && phone != '' && email != '' && user_name != '' && full_name != '' && password_confirmation != null && password != '') {
	        $('#form_step1').submit();
        } else{
            toastr.error('Bạn phải hoàn thành từng bước một!');
        }

    })

    $('.nut-next').prop('disabled', true);
    $('.form-check-input').change(function() {
        if($(this).is(":checked")){
            $('.nut-next').prop('disabled', false);

        }else{
            $('.nut-next').prop('disabled', true);
        }
    })

    if($('.form-check-input').is(":checked")) {
        $('.nut-next').prop('disabled', false);
    }
</script>
<script>
	$("input[name=email]").keyup(function(e) {
		var domain_list = ['gmail.com', 'yahoo.com', 'hotmail.com', 'icloud.com', 'live.com', 'outlook.com', 'msn.com'];
		var html = '';
		if($(this).val().indexOf("@") != -1 && ($(this).val().split('@')).length == 2) {
			if(($(this).val().split('@'))[1].length == 0) {
				for(var i = 0; i < domain_list.length; i++) {
					if(i == 0) {
						html += '<div class="selected">'+domain_list[i]+'</div>';
					} else {
						html += '<div>'+domain_list[i]+'</div>';
					}
				}
			} else {
				var firstOption = true;
				afterAt = ($(this).val().split('@'))[1];
				for(var i = 0; i < domain_list.length; i++) {
					if(domain_list[i].indexOf(afterAt) != -1) {
						if(firstOption) {
							html += '<div class="selected">'+domain_list[i]+'</div>';
							firstOption = false;
						} else {
							html += '<div>'+domain_list[i]+'</div>';
						}
						
						if(domain_list[i] == afterAt) {
							html = '';
						}
					}
				}
			}
		}
		$(".suggest-email-domain").html(html);
	});
	
	var itemSelected = 0;
	$(window).keyup(function(e){
		if(e.keyCode == 40) {
			if(itemSelected == $(".suggest-email-domain div").length - 1) {
				itemSelected = $(".suggest-email-domain div").length - 1;
			} else {
				itemSelected += 1;
			}
			$(".suggest-email-domain div").removeClass('selected');
			$(".suggest-email-domain div").eq(itemSelected).addClass('selected');
		} else if(e.keyCode == 38) {
			if(itemSelected == 0) {
				itemSelected = 0;
			} else {
				itemSelected -= 1;
			}
			$(".suggest-email-domain div").removeClass('selected');
			$(".suggest-email-domain div").eq(itemSelected).addClass('selected');
		} else if(e.keyCode == 13) {
			var autoCorrect = $(".suggest-email-domain div").eq(itemSelected).html();
			var beforeDomain = $("input[name=email]").val();
			$("input[name=email]").val((beforeDomain.split('@'))[0] + '@' + autoCorrect);
			$(".suggest-email-domain").html('');
		}
	});
	
	$(".suggest-email-domain").on('click', 'div' , function(){
		var autoCorrect = $(this).html();
		var beforeDomain = $("input[name=email]").val();
		$("input[name=email]").val((beforeDomain.split('@'))[0] + '@' + autoCorrect);
		$(".suggest-email-domain").html('');
	});
</script>
@endsection