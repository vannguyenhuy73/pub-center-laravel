@extends('landing_register.layout')
@section('link')
	<link rel="stylesheet" href="{{ asset('css/landing_third.css') }}">
@endsection
@section('style')
<style>
	a.btn.nut-buoc.active-nut-buoc:hover { color: red!important; }

	.owl-theme .owl-nav [class*='owl-'] {
	    color: #FFF;
	    font-size: 14px;
	    margin: 5px;
	    padding: 4px 10px;
	    background: #D6D6D6;
	    display: inline-block;
	    cursor: pointer;
	    border-radius: 50%;
	}

	.owl-carousel .owl-nav .owl-prev { position: absolute; top: 40%; left: -5%; z-index: 2; }

	.owl-carousel .owl-nav .owl-next { position: absolute; top: 40%; right: -5%; z-index: 2; }
	.owl-theme .owl-nav [class*='owl-']:hover {
	    padding-left: 5px !important;
	    padding-right: 7px !important;
	}
</style>
@endsection
@section('content1')
<div class="top-navigation fixed-top nen-menu">
	<div class="container">
		<div class="row">
			<div class="col-12 nav-holder">
				<nav class="navbar navbar-light navbar-expand-lg respon-navbar-toggle">
					<a class="navbar-brand brand-rismer rong-menu" href="#" style="">
						<img src="images/logo_1.png" class="logo_1" >
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="0" href="#gioi-thieu" id="mn1">GIỚI THIỆU</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="1" href="#doi-tac" id="mn2">ĐỐI TÁC</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="2" href="#pub" id="mn3">PUBLISHER</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="2" href="#qua-trinh" id="mn4">QUÁ TRÌNH HOẠT ĐỘNG</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="2" href="#cau-hoi" id="mn5">CÂU HỎI</a>
							</li>
							<li class="nav-item ">
								<a class="btn btn-danger" style="color: white !important" data-scroll-nav="2" href="#form-buoc-dk" >ĐĂNG KÝ</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<div style="height:70px"></div>
<div class="section-1" id="gioi-thieu">
    <div class="container">
        <div class="row">
        	<div class="col-lg-6">
        		<div class="bao-text-sec1">
			        <h3 class="h3-sec1_1">AFFILIATE MARKETING</h3>
			        <h3 class="h3-sec1_2">XU HƯỚNG KIẾM TIỀN ONLINE 2020</h3>
			        <h5 class="h5-sec1"><span class="span_sec1">ADPIA</span> sẽ giúp bạn</h5>
			        <p class="p_sec1">- Gia tăng thêm thu nhập nhờ Affiliate Marketing</p>
			        <p class="p_sec1">- Tận dụng tối đa lượt traffic, lượt theo dõi ở các kênh mạng xã hội của bạn</p>
			        <p class="p_sec1">- Hỗ trợ giải đáp thắc mắc 24/7 với đội ngũ tư vấn chuyên nghiệp, nhiệt tình </p>
			        <div class="bao-dk">
			        	<a href="#form-buoc-dk" class="btn nut-sec1">ĐĂNG KÝ TÀI KHOẢN ADPIA</a>
			        </div>
		        </div>			
        	</div>
        	<div class="col-lg-6">
        		<img src="images/img-sec1.png" alt="" class="img-sec1">			
        	</div>        		
        </div>
		
    </div>
</div>
<div class="section-2">
    <div class="container">
    	<h4 class="h4-sec2">7 LÝ DO BẠN NÊN KIẾM TIỀN QUA ADPIA</h4>
    	<div class="boc-khoi1_sec2">
	        <div class="row">
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon_1.png" alt="" class="img-icon_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Sứ mệnh:</span> Sứ mệnh của Adpia là xây dựng một cộng đồng tiếp thị liên kết công bằng minh bạch. Đảm bảo quyền lợi và là giải pháp tối ưu cho các publisher. Chúng tôi luôn mong muốn mang đến những dịch vụ tốt nhất cho người sử dụng
	        			</div>	
	        		</div>	
	        	</div>
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon_man.png" alt="" class="img-icon_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Chăm sóc, hỗ trợ: </span> Mỗi publisher đều có người chăm sóc, hỗ trợ riêng: Hỗ trợ liên tục 24/7 nhanh chóng, kịp thời, định hướng chiến dịch phù hợp với từng Affiliate. Thảo luận và hỗ trợ các phương pháp, ý tưởng kinh doanh hiệu quả. Hỗ trợ đặt banner, viết content...
	        			</div>	
	        		</div>	
	        	</div> 
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon_money.png" alt="" class="img-icon_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Hoa hồng:</span> Cơ chế nhận hoa hồng hấp dẫn từ 3,5 - 14% và có thể lên đến 32%
	        			</div>	
	        		</div>	
	        	</div>	 
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon_user.png" alt="" class="img-icon_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Hệ thống: </span> Hệ thống xác minh đối soát thông minh, quản lý đơn hàng dễ dàng, chính xác, minh bạch.
	        			</div>	
	        		</div>
	        	</div>	 
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon-special.png" alt="" class="img-icon_2_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Đặc biệt: </span> ADPIA thường xuyên tổ chức các sự kiện offline, gặp gỡ trao đổi kinh nghiệm với sự tham gia của đông đảo publisher và những chuyên gia marketing hàng đầu.
	        			</div>	
	        		</div>
	        	</div>
	        	<div class="col-lg-6">
	        		<div class="d-flex mar-top-sec2">
	        			<div class="bao-icon-sec2"><img src="images/icon_qua.png" alt="" class="img-icon_sec2"></div>	
	        			<div class="bao-text-sec2">
	        				<span style="color: red;">Sản phẩm: </span> Kho sản phẩm, dịch vụ, chiến dịch phong phú và đa dạng với tất cả các ngành hàng hot nhất trên thị trường hiện nay như Tiki, Shopee, Lazada, FPT,..
	        			</div>	
	        		</div>
	        	</div>	                            
	        </div>
    	</div>
    	<img src="images/Shape-9-copy.png" alt="" class="img-sec2">    	
    </div>
</div>
<div class="section-3" id="doi-tac">
	<div class="container">
		<h4 class="h4-sec3">MỘT SỐ ĐỐI TÁC TIÊU BIỂU</h4>
		<div class="bao-slide1_sec3">
			<h6 class="h6-sec3">Những trang thương mại điện tử lớn:</h6>
			<div class="owl-carousel owl-theme">
			    <div class="item">
			    	<img src="images/lazada.png" alt="">	
			    </div>
			    <div class="item">
			    	<img src="images/fpt-shop.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/tiki.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/shopee.png" alt="">
			    </div>
			</div>	
		</div>
		<div class="bao-slide2_sec3">
			<h6 class="h6-sec3">Merchant có hoa hồng cao:</h6>
			<div class="owl-carousel owl-theme">
			    <div class="item">
			    	<img src="images/wefit.png" alt="">	
			    </div>
			    <div class="item">
			    	<img src="images/Layer-96.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/Layer-93.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/Layer-95.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/powerman.png" alt="">
			    </div>
			    <div class="item">
			    	<img src="images/vdong.png" alt="">
			    </div>
			</div>	
		</div>
		<p class="p-sec3">
			" Với hệ thống hơn 200 đối tác liên kết, chiến dịch mới cập nhật thường xuyên, đa dạng lĩnh vực: từ Giáo dục, Thương mại điện tử, Mỹ phẩm, Du lịch, Tài chính, Bảo hiểm - Ngân hàng,...<br>
			Mức hoa hồng chia sẻ lên tới 32% từ các đối tác lớn, uy tín trên thị trường "
		</p>
		<div class="bao-nut-sec3">
			<a href="#form-buoc-dk" class="btn nut-sec1">ĐĂNG KÝ TÀI KHOẢN ADPIA</a>	
		</div>
	</div>
</div>
<div class="section-3b" id="pub">
	<div class="container">
		<h4 class="h4-sec3b">PHƯƠNG THỨC HOẠT ĐỘNG CỦA CÁC PUBLISHER</h4>
		<div class="bao-slide_sec3b">
			<div class="owl-carousel owl-theme">
			    <div class="item">
			    	<img src="images/vd1.png" alt="">
			    	<h5 class="h5-sec3b">Review sản phẩm trên Youtube, gắn link Affiliate trong phần mô tả dưới video</h5>		
			    </div>
			    <div class="item">
			    	<img src="images/video2.png" alt="">
			    	<h5 class="h5-sec3b">Review sản phẩm trên Youtube, gắn link Affiliate trong phần mô tả dưới video</h5>		
			    </div>
			    <div class="item">
			    	<img src="images/Layer-108-copy-6.png" alt="">
			    	<h5 class="h5-sec3b">Xây dựng website chia sẻ mã giảm giá, hoàn tiền</h5>
			    </div>
			    <div class="item">
			    	<img src="images/Layer-112.png" alt="">
			    	<h5 class="h5-sec3b">Chạy quảng cáo trên Facebook</h5>
			    </div>
			    <div class="item">
			    	<img src="images/zalo.png" alt="">
			    	<h5 class="h5-sec3b">Chạy quảng cáo trên Zalo</h5>
			    </div>
			    <div class="item">
			    	<img src="images/klook.png" alt="">
					<h5 class="h5-sec3b">Xây dựng website, đặt banner quảng cáo</h5>
			    </div>
			    <div class="item">
			    	<img src="images/fb.png" alt="">
			    	<h5 class="h5-sec3b">Share link, mã giảm giá (sử dụng short link của Alifiate)</h5>
			    </div>
			    <div class="item">
			    	<img src="images/fb1.png" alt="">
			    	<h5 class="h5-sec3b">Share link, mã giảm giá (sử dụng short link của Alifiate)</h5>
			    </div>
			    <div class="item">
			    	<img src="images/fb2.png" alt="">
			    	<h5 class="h5-sec3b">Xây dựng Fanpage, đăng bài chia sẻ, gắn link Affiliate trong bài viết</h5>
			    </div>
			</div>		
		</div>
	</div>
</div>
@endsection
@section('content2')
<div class="section-5" id="qua-trinh">
	<div class="container">
		<h4 class="h4-sec5">Quá trình hoạt động CỦA ADPIA </h4>
		<div class="row">
			<div class="col-lg-3">
				<div class="boc-khoi-tren-sec5_1">
					<div class="bao-item_sec5">
						Được khởi tạo từ năm 2000 bởi công ty LinkPrice Hàn Quốc.    
					</div>
				</div>
				<hr class="hr_sec5">
				<div class="nam_sec5 pb-xs">Năm 2000</div>				
			</div>
			<div class="col-lg-3">
				<div class="boc-khoi-tren-sec5_2">
					<div class="bao-item_sec5">
						Năm 2004 LinkPrice phát triển sang thị trường Trung Quốc lấy tên là Linktech và trở thành công ty đứng thứ 2 trong thị trường tiếp thị liên kết.   
					</div>
				</div>
				<hr class="hr_sec5">
				<div class="nam_sec5 pb-xs">Năm 2004</div>
			</div>
			<div class="col-lg-3">
				<div class="boc-khoi-tren-sec5_3">
					<div class="bao-item_sec5">
						Tiếp nối thành công đó vào năm 2013, mô hình tiếp thị liên kết của công ty LinkPrice phát triển tại Việt Nam dưới sự điều hành của tập đoàn Dreamline Hàn Quốc và trở thành nền tảng tiếp thị liên kết đầu tiên tại Việt Nam.  
					</div>
				</div>	
				<hr class="hr_sec5">
				<div class="nam_sec5 pb-xs">Năm 2013</div>
			</div>
			<div class="col-lg-3">
				<div class="boc-khoi-tren-sec5_4">
					<div class="bao-item_sec5">
						Qua thời gian việt hóa và trải nghiệm người sử dụng tại Việt Nam, Adpia chính thức đi vào hoạt động vào đầu năm 2014 trên tất cả các lĩnh vực: Thương mại điện tử, Du lịch, Giáo dục, Nhân sự, Ngân hàng, Game…	
					</div>
				</div>
				<hr class="hr_sec5">
				<div class="nam_sec5 pb-xs">Năm 2014</div>					
			</div>			
		</div>
		<div class="bao-h6-sec5">
			Bằng việc cung cấp dịch vụ chuyên nghiệp tới những doanh nghiệp tiếp thị liên kết, Adpia là giải pháp truyền thông hiệu quả cao nhất hiện nay tại Việt Nam.
		</div>
		<div class="bao-h5-sec5">
			=> Với điểm mạnh là hệ thống phát triển dựa trên thành công từ các thị trường sôi động như Hàn Quốc, Trung Quốc nên ADPIA Netwwork có khả năng hoạt động LINH HOẠT, NHANH GỌN, CHÍNH XÁC, hoàn toàn dựa trên các nhu cầu nguyện vọng đến từ publisher. Điều quan trọng nhất, ADPIA sẽ là cán cân công bằng đảm bảo quyền lợi tốt nhất cho publisher. 	
		</div>
	</div>
</div>
<div class="section-6" id="cau-hoi">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-4">
				<h4 class="h4-sec6">MỘT SỐ CÂU HỎI THƯỜNG GẶP</h4>	
			</div>
			<div class="col-lg-4">
				<img src="images/img-sec8_1.png" alt="" class="img-sec6">	
			</div>
			<div class="col-lg-8">
				<div id="accordion">
				    <div class="card ma-bottom">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapseOne">
								<i class="fas fa-check-circle"></i>
								<span class="span_sec6_1">1. ADPIA có phải là đa cấp hay không?</span>
							</a>
						</div>
						<div id="collapseOne" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Nhiều người khi được nghe giải thích về Affiliate lần đầu sẽ dễ hiểu nhầm đây là 1 kiểu đa cấp do cùng hình thức nhận hoa hồng khi giới thiệu được sản phẩm. Tuy nhiên, Affiliate Network và đa cấp khác nhau hoàn toàn về nhiều mặt, có thể kể đến một số điểm dưới đây:<br>
								- Cách thức tham gia:<br>
								   Đa cấp: được một người đã gia nhập giới thiệu<br>
								   Affiliate: Tự do tham gia, tự do lựa chọn đối tác, sản phẩm phù hợp.<br>
								- Chi trả hoa hồng:<br>
								  Đa cấp: Chia hoa hồng theo từng cấp từ thấp đến cao.<br>
								  Affiliate: Hoa hồng được trả trực tiếp từ Affiliate Network đến cho Publisher, một tầng duy nhất.<br>
								- Nền tảng hoạt động:<br>
								  Đa cấp: Chủ yếu là offline, hội thảo, ...<br>
								  Affiliate: Các hoạt động đều online<br>
								- Phí tham gia:<br>
								  Đa cấp: Phải đóng rất nhiều phí thường niên để duy trì cấp<br>
								  Affiliate: Tham gia hoàn toàn miễn phí<br>
								Hi vọng với những điểm phân biệt trên đây, bạn có thể nhìn rõ ràng rằng ADPIA không phải là đa cấp đâu nhé !
							</div>
						</div>
				    </div>
				    <div class="card ma-bottom">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
								<i class="fas fa-check-circle"></i>
								<span class="span_sec6_1">2. Đăng ký có mất phí không?</span>
							</a>
						</div>
						<div id="collapseTwo" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Với hệ thống Affiliate marketing tại ADPIA các bạn có thể đăng ký trở thành publisher một cách hoàn toàn MIỄN PHÍ nhé
							</div>
						</div>
				    </div>
				    <div class="card ma-bottom">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
								<i class="fas fa-check-circle"></i>
								<span class="span_sec6_1">3. Tôi không biết gì thì có được đào tạo không?</span>
							</a>
						</div>
					    <div id="collapseThree" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Sau khi bạn đăng ký tài khoản tại ADPIA thành công, ADPIA sẽ gửi đến cho bạn một bộ tài liệu học tập về hình thức hoạt động của Affiliate và những phương pháp kiếm tiền online với Affiliate marketing. Ngoài ra, ADPIA còn có đội ngũ tư vấn hỗ trợ nhiệt tình, giải đáp mọi thắc mắc của các bạn publisher nữa nhé 
							</div>
						</div>
				    </div>
				    <div class="card ma-bottom">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
								<i class="fas fa-check-circle"></i>
								<span class="span_sec6_1">4. Làm sao để có hoa hồng đầu tiên ? Em làm mãi vẫn là con số 0 ?</span>
							</a>
						</div>
					    <div id="collapseFour" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Việc để có hoa hồng đầu tiên thì cực kỳ dễ, nhưng để có nhiều hoa hồng thì bạn cần phải đầu tư thời gian và công sức khá nhiều đấy.Đối với đa phần các bạn Publisher, những đồng hoa hồng đầu tiên luôn là một động lực vô cùng to lớn giúp bạn tiếp tục những bước tiến mới trên con đường chinh phục Affiliate. ADPIA sẽ chia sẻ một số cách dễ nhất để bạn có thể tạo ra hoa hồng đầu tiên nhé.<br>
								- Mua hàng cho mình qua link Affiliate của mình: Nghe có vẻ hơi... vớ vẩn, nhưng đây là cách đầu tiên mà bạn có thể làm để có được phần "chiết khấu" trên những đơn hàng mà mình mua hàng ngày. Chắc chắn không có bạn Publisher nào là chưa từng mua hàng online qua các sàn TMĐT. Vậy vì sao bạn không tận dụng chính điều này để được mua hàng với giá rẻ hơn? Đồng thời test thử xem việc lên hoa hồng ở các chiến dịch TMĐT như thế nào.<br>
								- Share link Affiliate lên Facebook: Spam link quảng cáo là một điều không nên làm quá nhiều, nhưng việc share link affiliate những sản phẩm hấp dẫn lên Facebook để có hoa hồng cũng là một việc dễ dàng mà các bạn newbie có thể làm. Không chỉ Facebook cá nhân, bạn có thể đầu tư công sức, hay cả tiền bạc cho Fanpage, Group để share link<br>
								- Gửi link cho bạn bè người thân khi biết họ có nhu cầu: Tương tự như cách đầu tiên, chắc chắn bạn bè và người thân của bạn cũng luôn có nhu cầu sử dụng các dịch vụ online ... Vậy tại sao bạn không đóng vai trò là một người hỗ trợ họ những thông tin hữu ích nhất? Và khi họ mua hàng qua link của bạn, bạn sẽ nhận được hoa hồng. Đương nhiên hãy luôn ghi nhớ: ĐỪNG SPAM QUÁ NHIỀU nhé<br>
								- Làm thẻ thử chạy quảng cáo: Có nhiều bạn phàn nàn rằng “em không biết chạy quảng cáo”. Nhưng nếu không bao giờ thử làm, bạn sẽ không bao giờ biết làm. Chạy quảng cáo không phải thứ gì đó quá cao siêu như bạn nghĩ. Và nó cũng không tốn quá nhiều tiền. Bạn có thể thử từ ngân sách nhỏ trước, sau khi có hoa hồng đầu tiên, để x5, x10, thậm chí x1000 con số đó lên là cả một sự nỗ lực rất nhiều. Hãy bắt tay vào làm ngay từ hôm nay nhé 
							</div>
						</div>
				    </div>
				</div>
				<div class="bao-nut-sec3">
					<a href="#form-buoc-dk" class="btn nut-sec1">ĐĂNG KÝ TÀI KHOẢN ADPIA</a>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('utm')
<input type="hidden" name="utm_source" value="{{ $data['utm_source'] }}">
<input type="hidden" name="utm_medium" value="{{ $data['utm_medium'] }}">
<input type="hidden" name="utm_campaign" value="{{ $data['utm_campaign'] }}">
<input type="hidden" name="utm_content" value="{{ $data['utm_content'] }}">
<input type="hidden" name="utm_term" value="{{ $data['utm_term'] }}">
@endsection
@section('script')
<script>
	 	$('.bao-slide1_sec3 .owl-carousel').owlCarousel({
		    loop:true,
		    margin:30,
		    dots:false,
		    nav: false,
		    navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
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
		            items:2
		        },
		        1024:{
		            items:2
		        },
		        1200:{
		            items:2
		        },
		    }
		})

     	$('.bao-slide2_sec3 .owl-carousel').owlCarousel({
		    loop:true,
		    // center:true,
		    margin:30,
		    // stagePadding:60,
		    dots:false,
		    nav: false,
		    navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
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
		            items:2
		        },
		        1024:{
		            items:2
		        },
		        1200:{
		            items:2
		        },
		    }
		})

		$('.bao-slide_sec3b .owl-carousel').owlCarousel({
		    loop:true,
		    // center:true,
		    margin:30,
		    // stagePadding:60,
		    dots:false,
		    nav: false,
		    navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
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
</script>
@endsection