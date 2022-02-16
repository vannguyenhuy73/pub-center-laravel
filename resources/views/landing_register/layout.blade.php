<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giới thiệu Adpia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '407474910089854');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=407474910089854&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
	@yield('link')
	
</head>
<style>
	.owl-theme .owl-nav.disabled + .owl-dots {
	    margin-top: 10px; margin-left: -20px;
	}

	.owl-theme .owl-dots .owl-dot span {
	    width: 10px;
	    height: 10px;
	    margin: 5px 3px;
	    background: #D6D6D6;
	    display: block;
	    -webkit-backface-visibility: visible;
	    transition: opacity 200ms ease;
	    border-radius: 30px;
	}

	a.btn.nut-buoc.active-nut-buoc:hover { color: red!important; }
	.loading{top: 0;bottom: 0;left: 0;right: 0;width: 100%;height: 100%;position: fixed;background:#1d1c1cd6;z-index: 10000;display: none;}
	html, body {
		height: 100%;
		margin: 0;
	}
	.loader {
  		border: 8px solid #f3f3f3;
  		border-radius: 50%;
  		border-top: 8px solid #3498db;
  		width: 50px;
  		height: 50px;
  		-webkit-animation: spin 2s linear infinite; /* Safari */
  		animation: spin 2s linear infinite;
  		position: absolute;
    	top: 40%;
    	left: 50%;
	}

	@-webkit-keyframes spin {
	  	0% { -webkit-transform: rotate(0deg); }
	  	100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  	0% { transform: rotate(0deg); }
	  	100% { transform: rotate(360deg); }
	}
	.item-1 .form-group span{font-size: 11px;color: red}
	.er_name_source, .er_url_source, .er_detail{font-size: 11px;color: red}
	.facebook-defaut{display: none;}
	@media only screen and (max-width: 768px) {
  		.img-form{display: none;}
	}
</style>

<body>
	
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=2682158721995586&autoLogAppEvents=1"></script>
<div class="loading"><div class="loader"></div></div>
@yield('content1')
<div class="section-4" style="background-image: url('{{ asset('assets/config_register/img/big-background.png') }}');padding-bottom: 100px">
	<div class="container">   
		<h4 class="h4-sec4_2 text-white" id="form-buoc-dk" >ĐĂNG KÝ TÀI KHOẢN ADPIA AFFILIATE</h4>
		<p class="p-sec4_3 text-white">(Đăng ký gia nhập cùng ADPIA ngay hôm nay để nhận được hỗ trợ tốt nhất)</p>
		<div class="bao-khung-dki">
			<div class="boc-cac-buoc">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-4 mb-xs">
                        <span class="dk-tk">ĐĂNG KÝ TÀI KHOẢN</span>
                    </div>
                    <div class="col-lg-4 col-md-6 pa-top">
                        <div class="boc-3-buoc">
                            <div class="bao-buoc-1">
                                <button class="btn nut-buoc active-nut-buoc" id="title_buoc1">Bước 1</button>
                            </div>
                            <div class="bao-buoc-1">
                                <button class="btn nut-buoc" id="title_buoc2">Bước 2</button>
                            </div>
                            <div class="bao-buoc-1">
                                <button class="btn nut-buoc" id="title_buoc3">Bước 3</button>
                            </div>  
                        </div>       
                    </div>
                </div>
            </div>	<!-- end boc-cac-buoc -->

				<!-- Bước 1 -->
			<div class="buoc_1 buoc-hd">
            	<div class="row bg-white mr-0 ml-0">					
	                <div class="col-lg-5 img-form">
	                    <img src="{{ asset('images/anh_1_b1.png') }}" alt="" class="img-anh-b1">
	                </div>
	                <div class="col-lg-7 pt-3">
	                    <h4 class="title">HOÀN THIỆN ĐẦY ĐỦ CÁC THÔNG TIN</h4>
	                    <div class="row">
	                        <div class="col-md-6">                                    
	                            <div class="d-flex ">
	                                <div class="item-1">
	                                    <div class="form-group">
	                                    	<span id="er_name">&nbsp;</span>
	                                        <input type="text" class="form-control form-dangnhap ipad-small" id="name" placeholder="Tên Đăng Nhập ..." value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['user_name']:'' }}">
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
	                                    	<span id="er_fullname">&nbsp;</span>
	                                        <input type="text" id="fullname" class="form-control form-dangnhap ipad-small" placeholder="Họ và Tên ..." value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['full_name']:'' }}">
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
	                                    	<span id="er_password">&nbsp;</span>
	                                        <input type="password" id="password" class="form-control form-dangnhap ipad-small" placeholder="Mật Khẩu ..." >
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
	                                    	<span>&nbsp;</span>
	                                        <input type="password" id="re_password" class="form-control form-dangnhap ipad-small" placeholder="Nhập Lại Mật Khẩu ...">
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
	                                    	<span id="er_email">&nbsp;</span>
	                                        <input type="email" class="form-control form-dangnhap ipad-small" placeholder="Email ..." id="email" required value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['email']:'' }}">
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
	                                    	<span id="er_phone">&nbsp;</span>
	                                        <input type="number" class="form-control form-dangnhap ipad-small" id="phone" required placeholder="Số Điện Thoại ..." value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['phone']:'' }}">
	                                    </div>    
	                                </div>
	                                <div class="item-2 ml-1">
	                                    <div class="dau-sao">*</div>    
	                                </div>                                            
	                            </div>    
	                        </div>
	                    </div> 

	                    <h4 class="mt-2 mb-2 text-center" style="font-size: 22px;">THÔNG TIN KHÁC</h4>
	                    <div class="row">
	                        <div class="col-md-6">
	                            <div class="d-flex">
	                                <div class="item-1">
	                                    <div class="form-group">
	                                        <label for="" class="ipad-small">Số điện thoại đăng ký ZALO của bạn *</label>
	                                        <span id="er_zalophone">&nbsp;</span>
	                                        <input type="number" class="form-control form-dangnhap ipad-small" id="zalo_phone" maxlength="11" placeholder="" required value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['zalo_phone']:'' }}">
	                                    </div>
	                                </div>
	                                <div class="item-2">
	                                  
	                                </div>
	                            </div>    
	                        </div>
	                       
	                        <div class="col-md-6 link-fb">
	                        	<div class="d-flex linK-profile">
	                        		<div class="item-1">
	                                    <div class="form-group">
	                                        <label for="" class="ipad-small">Link Profile Facebook *</label>
	                                        <span id="er_link" style="display: block;">&nbsp;</span>
	                                        <input type="url" class="form-control form-dangnhap ipad-small" required id="link" placeholder="" value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['link_facebook']:'' }}">
	                                    </div>
	                                </div>
	                                
	                            </div>     
	                        </div>
	                    </div>
	                    <div class="bao-nut-next">
	                        <button type="submit" class="btn nut-next">NEXT</button>
	                    </div>
	                </div>                 
            	</div>
        	</div>
			<div class="buoc_2">
				<div class="row bg-white mr-0 ml-0">
                    <div class="col-xl-4 pl-0">
                        <img src="{{ asset('images/img-khoi-b2.png') }}" alt="" class="img-khoi-b2">
                    </div>
                    <div class="col-xl-8 pb-4">
                        <h6 class="h6-b2">Lưu ý: Các bạn hãy điền đầy đủ thông tin để nhận được hỗ trợ tốt nhất từ các AM của Adipia</h6>
                        <p class="p-b2_1">1. Sắp tới bạn chọn những phương thức nào để tiếp cận khách hàng của mình? <span style="color: red;">*</span></p>
                        <div class="mb-1">
                        	<div class="f-1">  
                            <label class="bao-ra-1" id="1">Sử dụng Pail Traffic: Facebook Ads, Google Ads, Zalo Ads,GDN,...
                                <input type="radio" checked="checked" name="bao-ra-1" value="Sử dụng Pail Traffic: Facebook Ads, Google Ads, Zalo Ads,GDN,...">
                                <span class="checkmark"></span>
                            </label>
                            </div>
                            <div class="f-1">
                            <label class="bao-ra-1" id="2">Sử dụng email, chatbot, sms,... gửi tin
                                <input type="radio" name="bao-ra-1" value="Sử dụng email, chatbot, sms,... gửi tin">
                                <span class="checkmark" ></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="3">Sở hữu nguồn traffic từ Website, Youtube
                                <input type="radio" name="bao-ra-1" value="Sở hữu nguồn traffic từ Website, Youtube">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="4">Là một KOls có tiếng nói, nhiều người theo dõi
                                <input type="radio" name="bao-ra-1" value="Là một KOls có tiếng nói, nhiều người theo dõi">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="5">Cashback (hoàn tiền khi mua sắm)
                                <input type="radio" name="bao-ra-1" value="Cashback (hoàn tiền khi mua sắm)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="6">Kết hợp nhiều cách để tiếp cận khách hàng
                                <input type="radio" name="bao-ra-1" value="Kết hợp nhiều cách để tiếp cận khách hàng">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="7">Other:....
                                <input type="radio" name="bao-ra-1" value="Other:....">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="f-1">
                            <label class="bao-ra-1" id="8">Chưa biết sử dụng phương thức nào để bán được sản phẩm, cũng như tạo ra được doanh thu
                                <input type="radio" name="bao-ra-1" value="Chưa biết sử dụng phương thức nào để bán được sản phẩm, cũng như tạo ra được doanh thu">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        </div>

						<hr>

                    	<p class="p-b2_2">2. Bạn đang sở hữu nguồn traffic gì?<span style="color: red;">*</span></p>

						<div class="dan-hang-b2">
							<div class="dan-hang-b2-item-1">								
                                <div class="moi active-radio-button" id="rbn_1">
                                    <label class="bao-ra" id="1" for="web">WEBSITE
                                        <input type="radio" value="web" checked="checked" name="moi" id="web">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
							</div>		
							<div class="dan-hang-b2-item-2">								
                                <div class="moi" id="rbn_2">
                                    <label class="bao-ra" id="1" for="social">Social Media
                                        <input type="radio" name="moi" value="social" id="social">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>                              
							</div>		
						</div>
						<div class="dan-hang-b2">
							<div class="dan-hang-b2-item-1">
                                <div class="moi" id="rbn_3">
                                    <label class="bao-ra" id="1" for="yt">Youtube Channel
                                        <input type="radio" name="moi" id="yt" value="youtube">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>                              	
							</div>		
							<div class="dan-hang-b2-item-2">
                                <div class="moi" id="rbn_4">
                                    <label class="bao-ra" id="1" for="no">Chưa sở hữu nguồn traffic nào
                                        <input type="radio" name="moi" value="no" id="no">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
							</div>		
						</div>
                        <div class="more">
                        	
                        </div>
                        <div class="text-center ma-t-35px mt-xs">
                            <button class="btn btn-danger nut-hoan-tt step2">HOÀN TẤT THÔNG TIN</button>
                        </div>
                	</div>
                </div>  
    		</div>
			<div class="buoc_3">
				<div class="row bg-white mr-0 ml-0">       	                
		            <div class="col-md-5">
		                <img src="{{ asset('images/mail-b3.png') }}" alt="" class="img-mail-b3 img-move_1">
		            </div>
		            <div class="col-md-7 text-center">
		                <p style="font-size: 26px;font-weight: 700;margin-top: 17%;">
		                    Bạn vui lòng mở Email<br>
		                    (<span id='contact_mail_show'></span>)<br>
		                    để xác nhận đăng ký thành công
		                </p>
		                <a href="https://mail.google.com/mail/u/0/" class="btn btn-danger" target="_blank">MỞ EMAIL NGAY</a>
		            </div>
		            <div class="col-md-12 pt-2 pb-lg-5 pb-sm-3">
		                <h6 class="h5-buoc3">Chỉ còn 1 bước nữa thôi! Là bạn đã có thể bắt đầu kiếm tiền với Adpia</h6>    
		            </div>
	            </div>
            </div>                            
		</div>
	</div>
</div>
@yield('content2')
<div class="plugin_comment_facebook">
	<div class="container">
		<div class="col-md-12">
			<div class="fb-comments" data-href="{{url()->current()}}" data-width="100%" data-numposts="5"></div>
		</div>
	</div>
</div>
<div class="nen-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">				
				<img src="{{ asset('images/logo_2.png') }}" alt="" class="logo-footer">
				<p>Nền tảng tiếp thị liên kết quy mô và uy tín nhất Việt Nam</p>		
			</div>
			<div class="col-lg-4">
				<div class="bao-khoi-footer_2">				
					<p class="p-footer_2">Liên hệ với chúng tôi:</p>
					<table class="table_footer">
						<tr>
							<td class="td_1_footer">
								<a href="https://www.facebook.com/groups/522245648367494/"><img src="images/icon-face_1.png" alt=""></a>
							</td>
							<td class="td_2_footer">
								<a href="https://www.facebook.com/affiliateadpia"><img src="images/icon-face_2.png" alt=""></a>
							</td>
						</tr>
					</table>					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="bao-khoi-footer_3">
					<p class="p-footer_3">Địa chỉ: </p>	
					<p class="p-footer_4">Tầng 30, tòa nhà Handico, Phạm Hùng, Nam Từ Liêm, Hà Nội.</p>
					<p><b>Hotline:</b> <i>024 2260 6075</i></p>
				</div>
			</div>
		</div>
	</div>
</div>
@yield('utm')

<button class="btn backBottom" id="backBottom">
    <i class="fas fa-chevron-down"></i>
</button>
<button class="btn backTop" id="backTop">
    <i class="fas fa-chevron-up"></i>
</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>       
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
<script>
     $('.bao-phai-sec2 .owl-carousel').owlCarousel({
		    loop:true,
		    // center:true,
		    margin:30,
		    // stagePadding:60,
		    dots:true,
		    nav: false,
		    autoplay:true,
		    autoplayTimeout:2000,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        700:{
		            items:1
		        },
		        1024:{
		            items:1
		        },
		        1200:{
		            items:1
		        },
		    }
		})

     	document.addEventListener("DOMContentLoaded",function(){
		    var trangthai = 'duoi300';
		    var doituongmenu = document.querySelector('.top-navigation.fixed-top.nen-menu');
		    
		    window.addEventListener('scroll',function(){        
		        if( window.pageYOffset > 300) {
		            if( trangthai == 'duoi300') {               
		                trangthai = 'tren300' ;
		                doituongmenu.classList.add('doinenmenu');
		            }           
		        } else if(window.pageYOffset < 300) {
		            if(trangthai == 'tren300') {
		                doituongmenu.classList.remove('doinenmenu');
		                trangthai = 'duoi300';
		            }
		        }
		    })
		},false)

     	$(document).ready(function() {
			$('#navbarNavDropdown ul li a').click(function(event) {
				var vitri = $(this).attr('href');
				var toado = $(vitri).offset().top;
				$('.tt-hoatdong').removeClass('tt-hoatdong');
				$(this).addClass('tt-hoatdong');
				$('body,html').animate({scrollTop: toado}, 800, "easeOutCubic" );			
			})

			$("a.btn.nut-dk").click(function() {
				var vitri = $(this).attr('href');
				var toado = $(vitri).offset().top;
				$('body,html').animate({scrollTop: toado}, 800, "easeOutCubic" );
			});

			$("a.btn.nut-dk_2").click(function() {
				var vitri = $(this).attr('href');
				var toado = $(vitri).offset().top;
				$('body,html').animate({scrollTop: toado}, 800, "easeOutCubic" );
			});

			$(window).scroll(function(event) {
				var pos_body = $('html,body').scrollTop();
				var vt2 = $('.h4-sec2').offset().top -95;
				var vt3 = $('.h4-sec3').offset().top - 95;
				var vt4 = $('.h4-sec4').offset().top - 95;
				var vt5 = $('.h4-sec5').offset().top - 95;

				if (pos_body < vt2) {
					$("#mn2,#mn3").removeClass("tt-hoatdong");
					$("#mn1").addClass("tt-hoatdong");
				}
				else  if ( pos_body < vt3 ) {
					$("#mn1,#mn3").removeClass("tt-hoatdong");
					$("#mn2").addClass("tt-hoatdong");
				}
				else if ( pos_body < vt4 ) {
					$("#mn2,#mn4").removeClass("tt-hoatdong");
					$("#mn3").addClass("tt-hoatdong");
				}
				else if ( pos_body < vt5 ) {
					$("#mn3,#mn5").removeClass("tt-hoatdong")
					$("#mn4").addClass("tt-hoatdong");
				}
				else {
					$("#mn4").removeClass("tt-hoatdong"); 
					$("#mn5").addClass("tt-hoatdong"); 
				}
			});

			$('#backTop').click(function() {
				$('html,body').animate( {
					scrollTop: 0
				},800);
				return false;
			});

			$('#backBottom').click(function() {
				$('html,body').animate( {
					scrollTop: $(document).height()
				},800);
				return false;
			});

			$(document).scroll(function(event) {
				var position = $('html,body').scrollTop();
				var h1 = 0.2*$(document).height();
				var h2 = 0.6*$(document).height();

				if ( position<= h1 ) {
					$('.backBottom').addClass('hien-ra')
				} else { $('.backBottom').removeClass('hien-ra') }

				if ( position >= h2 ) {
					$('.backTop').addClass('hien-ra')
				} else { $('.backTop').removeClass('hien-ra') }
			})

            $(".moi").click(function() {
          
                var tmp = document.querySelectorAll(".moi");
                var limit = tmp.length;
                var n = 0;

                while(n < limit){
                    tmp[n].classList.remove('active-radio-button');
                    n++;
                }

                $(this).addClass('active-radio-button');   
                var cnt = document.querySelectorAll(".traffic-form-content");
                var index = $(this).attr('id').substr(4, 1);
                   
            });

            $(".f-1").click(function() {
                var tmp = document.querySelectorAll(".f-1");
                var limit = tmp.length;
                var n = 0;

                while(n < limit){
                    tmp[n].classList.remove('active-radio-button');
                    n++;
                }

                $(this).addClass('active-radio-button');
                   
            });

            $(".nut-next").prop('disabled', true);

            $('#name, #fullname, #password, #re_password, #email, #phone, #link, #zalo_phone').keyup( function() {
            	if($('#name').val() != '' && $('#fullname').val() != '' && $('#password').val() != '' && $('#re_password').val() != '' && $('#email').val() != '' 
            	&& $('#phone').val() != '' && $('#link').val() != '' && $('#zalo_phone').val() != '' && $('#password').val() === $('#re_password').val()){
            		$(".nut-next").prop('disabled', false);
    
            	} else {
            		$(".nut-next").prop('disabled', true);
            	}
            });

             $('#password, #re_password').keyup( function() {
	        	if ($('#password').val() === $('#re_password').val()) {
	        		$('#password').css("border-color", "green");
	        		$('#re_password').css("border-color", "green");
	        	} else{
	        		$('#password').css("border-color", "red");
	        		$('#re_password').css("border-color", "red");
	        	}
	        });

            $('#password, #re_password').keypress(function () {
			    var maxLength = $(this).val().length;
			    if (maxLength >= 10) {
			        
			        return false;
			    }
			});
			$('#phone, #zalo_phone').keypress(function () {
			    var maxLength = $(this).val().length;
			    if (maxLength >= 11) {
			        return false;
			    }
			});

			$('#link').keypress(function () {
			    var maxLength = $(this).val().length;
			    if (maxLength >=300) {
			        return false;
			    }
			});

            $("button.btn.nut-next").click(function() {
            	$('.loading').css("display",'block')
            	$('html').css("overflow","hidden")
            	name = $("#name").val();
            	phone = $("#phone").val();
            	email = $("#email").val();
            	password = $("#password").val();
            	re_password = $("#re_password").val();
            	fullname = $("#fullname").val();
            	zalo_phone = $("#zalo_phone").val();
            	link = $("#link").val();

            	$.ajax({
            		url: '{{ route('register-ajax') }}',
            		method: 'POST',
            		data: { _token: '{{ csrf_token() }}', name:name, fullname:fullname, zalo_phone:zalo_phone, link:link, password:password, re_password:re_password, email:email,phone:phone},
            		success: function(data) {
            			$(".buoc_1.buoc-hd").removeClass('buoc-hd');
		            	$(".buoc_2").addClass('buoc-hd');
		            	$("button.btn.nut-buoc.active-nut-buoc").removeClass('active-nut-buoc');
		            	$("#title_buoc2").addClass('active-nut-buoc');
		            	$('.loading').css("display",'none')
            			$('html').css("overflow","scroll")
            		},
            		error: function(message,errors) {
            			er = JSON.parse(message.responseText);
            			$('#er_name').text(er.errors.name) 
            			$('#er_email').text(er.errors.email) 
            			$('#er_link').text(er.errors.link) 
            			$('#er_fullname').text(er.errors.fullname) 
            			$('#er_password').text(er.errors.password) 
            			$('#er_zalophone').text(er.errors.zalo_phone) 
            			$('#er_phone').text(er.errors.phone) 
            			$('.loading').css("display",'none')
            			$('html').css("overflow","scroll")

            		}
            	})
            });

            $("#myBtn1").click(function() {
			    var elem1 = $("#myBtn1").text();

			    if (elem1 == "Xem thêm") {
			      $("#myBtn1").text("Thu nhỏ");
			      $("#more1").slideDown();
			    } else {
			      $("#myBtn1").text("Xem thêm");
			      $("#more1").slideUp();
			    }
			});

			$("#myBtn2").click(function() {
			    var elem2 = $("#myBtn2").text();

			    if (elem2 == "Xem thêm") {
			      $("#myBtn2").text("Thu nhỏ");
			      $("#more2").slideDown();
			    } else {
			      $("#myBtn2").text("Xem thêm");
			      $("#more2").slideUp();
			    }
			});

		})	

		web = '<div class="option-website traffic-form-content hd-b2" style="display: block;">'+
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<div class="mar-b-5px">'+ 
                    	'<span class="er_name_source">&nbsp;</span>'+
                      	'<input type="text" class="form-control form-b2" id="" placeholder="Tên Website" name="name_source">'+
                    '</div>'+
                    '<div class="form-group">'+
                    	'<span class="er_url_source">&nbsp;</span>'+                
                        '<input type="url" name="url_source"class="form-control form-b2" id="" placeholder="URL Website">'+
                    '</div>'+   
                '</div>'+    
                '<div class="col-md-6"> '+
                	'<span class="er_detail">&nbsp;</span>'+                               
                    '<textarea class="form-control form-b2" rows="3" id="comment" name="detail" placeholder="Tóm lược về nội dung Website "></textarea>'+
                '</div>'+    
            '</div>'+
        '</div>';

	    social = '<div class="option-website traffic-form-content">'+
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<div class="mar-b-5px">'+    
                        '<select class="form-control form-b2" id="" name="name_source">'+
                            '<option value="Facebook">Facebook</option>'+
                            '<option value="Zalo">Zalo</option>'+
                            '<option value="Twiter">Twiter</option>'+
                            '<option value="Instagram">Instagram</option>'+
                        '</select>'+
                    '</div>'+
                   ' <div class="form-group">'+              
                        '<select class="form-control form-b2" id="" name="detail">'+
                            '<option value="Sử dụng quảng cáo trả phí">Sử dụng quảng cáo trả phí</option>'+
                            '<option value="Chia sẻ bài lên Profile, Group, Fanpage">Chia sẻ bài lên Profile, Group, Fanpage</option>'+
                        '</select>'+
                    '</div>'+   
                '</div>'+    
                '<div class="col-md-6"> '+ 
                	'<span class="er_url_source">&nbsp;</span>'+                              
                    '<input type="url" name="url_source" class="form-control form-b2"  id="url_source" placeholder="Đường dẫn URL">'+
                '</div>'+    
            '</div>'+
        '</div>';

        yt = '<div class="option-website traffic-form-content">'+
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<div class="mar-b-5px">'+
                    	'<span class="er_name_source">&nbsp;</span>'+       
                        '<input type="text" class="form-control form-b2" name="name_source" placeholder="Tên Kênh">'+
                    '</div>'+
                    '<div class="form-group">'+
                    	'<span class="er_url_source">&nbsp;</span>'+           
                        '<input type="url" class="form-control form-b2" name="url_source" placeholder="URL kênh của bạn">'+
                    '</div>'+   
                '</div>'+    
                '<div class="col-md-6">'+  
                	'<span class="er_detail">&nbsp;</span>'+                              
                    '<textarea class="form-control form-b2_2" rows="3" id="comment" name="detail" placeholder="Mô tả nội dung của kênh"></textarea>'+
                '</div>'+    
            '</div>'+
        '</div>';
        $('.more').html(web);

        $('[name=moi]').click(function() {
        	$('[name=moi]').removeAttr("checked");
			if($(this).val() == 'youtube') {
				$('.more').html(yt);
			} else if($(this).val() == 'web') {
				$('.more').html(web);
			}else if($(this).val() == 'social') {
				$('.more').html(social);
			}else{
				$('.more').html('');
			}
			$(this).attr('checked', true);

			$('[name=url_source]').keypress(function () {
		    	var maxLength = $(this).val().length;
			    if (maxLength >=300) {
			        return false;
			    }
			});
		})

        $('[name=name_source]').keyup(function() {
        	if ($('[name=name_source]').val() == '') {
        		$(this).css('border-color','red')
        	}else {
        		$(this).css('border-color','green')
        	}
        })

        $('[name=url_source]').keypress(function () {
		    var maxLength = $(this).val().length;
		    if (maxLength >=300) {
		        return false;
		    }
		});
		
        $('[name=url_source]').keyup(function() {
        	if ($('[name=url_source]').val() == '') {
        		$(this).css('border-color','red')
        	}else {
        		$(this).css('border-color','green')
        	}
        })

        $('[name=detail]').keyup(function() {
        	if ($('[name=detail]').val() == '') {
        		$(this).css('border-color','red')
        	}else {
        		$(this).css('border-color','green')
        	}
        })

		$('.step2').click(function() {
			$('.loading').css("display",'block')
            $('html').css("overflow","hidden")
			name_source = $('[name=name_source]').val();
			url_source = $('[name=url_source]').val();
			detail = $('[name=detail]').val();
			source = $('[name=moi]:checked').val();
			method = $('[name=bao-ra-1]:checked').val();
			utm_source = $('[name=utm_source]').val()
			utm_medium = $('[name=utm_medium]').val()
			utm_campaign = $('[name=utm_campaign]').val()
			utm_content = $('[name=utm_content]').val()
			utm_term = $('[name=utm_term]').val()
			console.log(name_source)
			console.log(url_source)
			console.log(detail)
			$.ajax({
				url: '{{ route('add-user-ajax') }}',
				method: 'post',
				data: { _token: '{{ csrf_token() }}', name_source:name_source, url_source:url_source, detail:detail, traffic:source, radio:method,utm_source:utm_source, utm_term:utm_term, utm_content:utm_content, utm_campaign:utm_campaign, utm_medium:utm_medium},
				success: function(data) {
					$('#contact_mail_show').text(data.contact_mail)
					$(".buoc_2.buoc-hd").removeClass('buoc-hd');
	            	$(".buoc_3").addClass('buoc-hd');
	            	$("button.btn.nut-buoc.active-nut-buoc").removeClass('active-nut-buoc');
	            	$("#title_buoc3").addClass('active-nut-buoc');
	            	$('.loading').css("display",'none')
            		$('html').css("overflow","scroll")
				},
				error: function(message,error) {
					er = JSON.parse(message.responseText);
        			$('.er_name_source').text(er.errors.name_source) 
        			$('.er_url_source').text(er.errors.url_source) 
        			$('.er_detail').text(er.errors.detail)
        			$('.loading').css("display",'none')
        			$('html').css("overflow","scroll")
				}
			})

		})

	link_fb = '<div class="d-flex linK-profile">'+
        		'<div class="item-1">'+
                    '<div class="form-group">'+
                        '<label for="" class="ipad-small">Link Profile Facebook *</label>'+
                        '<span id="er_link" style="display: block;">&nbsp;</span>'+
                        '<input type="url" class="form-control form-dangnhap ipad-small" required id="link" placeholder="" value="{{ !empty(Session::get('user_register_ajax'))?Session::get('user_register_ajax')['link_facebook']:'' }}">'+
                    '</div>'+
                '</div>'

	var width = $(window).width();
	if (width <= 768) {
	    $('.link-fb').html('<input type="hidden" value="https://default.com" id="link">')
	}else {
		$('.link-fb').html(link_fb)
	}

	$(window).on('resize', function() {
		if ($(this).width() <= 768) {
		    $('.link-fb').html('<input type="hidden" value="https://default.com" id="link">')
		}else {
			$('.link-fb').html(link_fb)
		}
	});
</script>
@yield('script')
</body>
</html>