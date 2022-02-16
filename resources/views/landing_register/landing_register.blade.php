@extends('landing_register.layout')
@section('link')
	<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection
@section('style')
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
								<a class="nav-link kieu-chu-menu" data-scroll-nav="1" href="#pub" id="mn2">PUBLISHER</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="2" href="#mo-hinh" id="mn3">MÔ HÌNH AFFILIATE</a>
							</li>
							<li class="nav-item margin-chu">
								<a class="nav-link kieu-chu-menu" data-scroll-nav="2" href="#chia-se" id="mn4">CHIA SẺ</a>
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
<div class="section-1" id="gioi-thieu">
    <div class="container">
        <div class="row">
        	<div class="col-xl-12">
        		<img src="{{ asset('images/landing3.png') }}" alt="" class="img_3_sec1">
        	</div>
        	<div class="col-xl-6 offset-xl-6">
        		<div class="boc-khoi-phai_sec1">
	        		<div class="bao-k2_phai_sec1">
	        			<h6 class="h6_sec1_1">SỞ HỮU THU NHẬP KHỦNG</h6>	
	        			<h6 class="h6_sec1_2">NGAY TẠI NHÀ</h6>	
	        			<h5 class="h5_sec1">KHÔNG CẦN ĐẦU TƯ VỐN</h5>
	        			<p class="p_sec1_1">BẠN CHỈ CẦN:</p>	
	        			<p class="p_sec1_1">Có 2-3h online mạng xã hội/ ngày</p>	
	        			<p class="p_sec1_1">Mong muốn có thu nhập mỗi ngày</p>	
	        			<p class="p_sec1_1">Thích tự do, tự chủ, không đi làm thuê, áp lực</p>	
	        			<p class="p_sec1_1">Muốn kinh doanh nhưng ÍT VỐN, sợ RỦI RO</p>	
	        		</div>
	        		<div class="bao-dk">
	    				<a href="#form-buoc-dk" class="btn nut-dk">ĐĂNG KÍ TÀI KHOẢN ADPIA</a>
	    			</div>
        		</div>
        	</div>	
        </div>
    </div>
</div>
<div class="section-2" id="pub">
    <div class="container">
    	<h4 class="h4-sec2">THU NHẬP TRUNG BÌNH CỦA MỖI PUBLISHER </h4>
		<p class="p-sec2_1">(Người kiếm tiền Online qua Affiliate Marketing)</p>
        <div class="row">
        	<div class="col-lg-5">        		
        		<div class="bao-text_sec2">
        			<p>
        				Kiếm tiền online hiện nay không còn quá xa lạ với nhiều nhóm người từ các bạn trẻ, sinh viên, mẹ bỉm sữa, những bạn có nhu cầu muốn có một công việc thụ động hay việc tay trái cho bản thân mà nguồn thu nhập thêm thậm chí lại cao hơn nguồn thu nhập chính.	
        			</p>
        			<p>
        				Nhiều người rất háo hức và tò mò khi nghe những câu chuyện về những bạn suốt ngày cắm mặt vào điện thoại, máy tính, online 24/24 mà hàng tháng số tiền họ kiếm ra hàng chục thậm chí hàng trăm triệu đồng.
        			</p>
        			<p>
        				Đừng chỉ mãi nhìn vào thành công của người khác mà ngưỡng mộ. Bạn cũng có thể làm được. 
        			</p>
        		</div>        			
        	</div>       
        	<div class="col-lg-7">
        		<div class="bao-phai-sec2">
	        		<div class="owl-carousel owl-theme">
					    <div class="item">
					    	<img src="{{ asset('images/slide_1.png') }}" alt="">	
					    </div>
					    <div class="item">
					    	<img src="{{ asset('images/slide_2.png') }}" alt="">
					    </div>
					    <div class="item">
					    	<img src="{{ asset('images/slide_3.png') }}" alt="">
					    </div>
					    <div class="item">
					    	<img src="{{ asset('images/slide_4.png') }}" alt="">
					    </div>				    
					</div>
				</div>
        	</div>                                               
        </div>  	
    </div>  
</div>
<div class="section-3" id="mo-hinh">
	<div class="container">
		<h4 class="h4-sec3" style="text-transform: uppercase;">Affiliate Marketing - Xu hướng kiếm tiền online hiện đại </h4>
		<img src="{{ asset('images/mohinh.png') }}" alt="" class="img-mohinh">
		<div class="row">
			<div class="col-lg-4">
				<div class="title-sec3_1">PUBLISHER LÀ GÌ?</div>
				<p class="title-sec3_2">Đơn vị, cá nhân sở hữu website, blog hay các trang mạng xã hội và kiếm tiền trực tiếp thông qua việc phân phối các chiến dịch quảng cáo của nhà cung cấp </p>
			</div>
			<div class="col-lg-4">
				<div class="title-sec3_1">ADPIA LÀ GÌ?</div>
				<p class="title-sec3_2">Là đơn vị kết nối giữa các đối tác (Affiliate) và nhà cung cấp (Merchant), ADPIA đóng vai trò cung cấp nền tảng kĩ thuật như: link quảng cáo, Banner; theo dõi và đánh giá hiệu quả của việc quảng bá, giải quyết tranh chấp, thu tiền và thanh toán hoa hồng cho các bên tham gia</p>
			</div>
			<div class="col-lg-4">
				<div class="title-sec3_1">NHÀ CUNG CẤP (MERCHANT)</div>
				<p class="title-sec3_2">Các cá nhân hoặc doanh nghiệp cung cấp sản phẩm, dịch vụ mong muốn tăng lượt truy cập vào Website, nâng cao hiệu quả kinh doanh, tăng doanh số bán hàng</p>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<a href="#form-buoc-dk" class="btn nut-dk">ĐĂNG KÍ TÀI KHOẢN ADPIA</a>
		</div>
	</div>    
</div>
<div class="section-4">
	<div class="container">
		<h4 class="h4-sec4">3 bước kiếm tiền cùng ADPIA</h4>
		<div class="row">
			<div class="col-lg-4">
				<div class="bao-cot_sec4">
					<img src="{{ asset('images/Group-8.png') }}" alt="" class="img-sec4">
					<img src="{{ asset('images/Shape 2.png') }}" alt="" class="img-sec4_2">
					<p class="p-sec4_1">BƯỚC 1: LIÊN KẾT</p>
					<p class="p-sec4_2">Đăng ký tài khoản Affiliate tại ADPIA, lựa chọn và liên kết với nhà cung cấp phù hợp </p>
				</div>
			</div>
			<div class="col-lg-4">
				<img src="{{ asset('images/Group-2.png') }}" alt="" class="img-sec4">
				<img src="{{ asset('images/Shape 2.png') }}" alt="" class="img-sec4_2">
				<p class="p-sec4_1">BƯỚC 2: QUẢNG BÁ </p>
				<p class="p-sec4_2">Phân tích & lên kế hoạch quảng bá cho sản phẩm.Hành động theo hướng đi cụ thể mà bạn đã lên kế hoạch</p>
				<p class="p-sec4_2">Tối ưu hóa, đánh giá hiệu quả, quản lý và nhân rộng chiến dịch</p>
			</div>

			<div class="col-lg-4">
				<img src="{{ asset('images/hh.png') }}" alt="" class="img-sec4">
				<p class="p-sec4_1">BƯỚC 3: NHẬN HOA HỒNG </p>
				<p class="p-sec4_2">Nhận hoa hồng từ mỗi hành động của người dùng theo yêu cầu: mua hàng, điền form đăng ký, cài đặt,.</p>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content2')
<div class="section-5" id="chia-se">
	<div class="container">
		<h4 class="h4-sec5">Chia sẻ của người thành công </h4>
		<div class="row">
			<div class="col-lg-4 pt-3">
				<img src="{{ asset('images/girl_1.png') }}" alt="" class="img-girl">	
			</div>	
			<div class="col-lg-8 pt-3">
				<h6 class="h6-sec5">NGỌC DUNG CHIA SẺ- MẸ BỈM SỮA</h6>
				<p class="p-mar-bot">
					Mình nghỉ sinh em bé từ giữa năm nay, trong thời gian ở nhà chăm con nhỏ mình hay lướt fb xem phim, đọc báo giải trí. Trước đây mình cũng vài lần đọc qua thông tin về affiliate marketing nhưng chưa có thời gian tìm hiểu sâu về nó. Đến lúc sinh em bé mình hay tham gia các hội nhóm cho mẹ và bé thì thấy các mẹ rất hay chia sẻ cho nhau shop nọ shop kia trên Shopee hay Lazada đang có flash sale giảm giá. Mình nghĩ ngay đến hình thức hoạt động của affiliate. Mình nghĩ sao mình không đăng ký tài khoản affiliate rồi chia sẻ link mua hàng cho các mẹ, các mẹ vừa được mua hàng giảm giá, mà mình cũng nhận được hoa hồng nữa. Sau khi tìm hiểu các hệ thống affiliate nổi tiếng ở VN, mình đã quyết định đăng ký tài khoản ở ADPIA.<br>
					<span id="more1">Mình bắt đầu làm affiliate với với hình thức đơn giản nhất là chia sẻ link mua hàng cho mọi người trong các nhóm mà mình đã tham gia. Trong thời gian đó, số tiền hoa hồng mình kiếm được từ việc làm này không quá lớn, nhưng cũng đủ để mình mua bỉm và sữa cho con. Giờ bé nhà mình lớn hơn chút rồi nên mình đang có ý định đầu tư học hỏi thêm về marketing online để có thể kiếm được nhiều hoa hồng hơn nữa. Hy vọng trong thời gian tới lộc lá vẫn sẽ đến với mình như bây giờ</span>
				</p>
				<button id="myBtn1">Xem thêm</button>	
			</div>
			<div class="col-lg-4 order-lg-2 pt-3">
				<img src="{{ asset('images/girl_2.png') }}" alt="" class="img-girl">
			</div>
			<div class="col-lg-8 order-lg-1 pt-3">
				<h6 class="h6-sec5">THÙY LINH CHIA SẺ- SINH VIÊN ĐẠI HỌC NĂM CUỐI</h6>
				<p class="p-mar-bot">										
					Em là sinh viên đại học năm cuối, trong thời gian học đại học em đã từng làm rất nhiều công việc làm thêm part time, từ nhân viên phục vụ bàn, nhân viên siêu thị, nhân viên chăm sóc khách hàng theo ca. Một phần vì điều kiện gia đình khó khăn, nên em muốn kiếm tiền tự trang trải cuộc sống phụ giúp gia đình. Nhưng tiền lương của em kiếm được hàng tháng chỉ đủ cho em chi tiêu sinh hoạt. Còn học phí vẫn phải xin bố mẹ.<br>
					<span id="more2"> Một lần, trong lúc đang đọc thông tin trên mạng, em tình cờ đọc được một bài báo viết về affiliate marketing. Em đã nghe các bạn đại học nói về affiliate marketing, vì thời điểm đó affiliate marketing bắt đầu phổ biến ở VN, nhưng em chưa bao giờ nghĩ về nó một cách nghiêm túc và chưa bao giờ quan tâm về cách thức hoạt động của nó. 
					Sau khi đọc bài viết ấy em đã tìm hiểu vấn đề này, em tìm thấy một vài hướng dẫn bằng video trên Youtube và một vài nhóm trên facebook, nơi mọi người chia sẻ kinh nghiệm, cách thức làm việc, cũng như lời khuyên cho những người mới bắt đầu. Họ cũng đề xuất các nền tảng Affiliate hoạt động tốt và uy tín ở VN. <br>

					Em nhận ra rằng em có thể làm việc với Affiliate bởi vì nó không có bất kỳ rủi ro nào cả, em không cần đầu tư lớn, em có thể làm việc vào những khoảng thời gian rảnh rỗi, chỉ cần điện thoại có kết nối mạng internet. Sau khi tìm hiểu kỹ các thông tin, em đã quyết định chọn ADPIA. Nền tảng này đã nhận được nhiều phản hồi tích cực. Bên cạnh đó, giao diện của nó cũng đơn giản, dễ hiểu và được nhiều người có kinh nghiệm đề xuất cho những người mới bắt đầu như em. <br>
					Kết quả ban đầu đã vượt qua mọi mong đợi của em. Trong tháng đầu tiên, em chỉ giới thiệu link các sản phẩm khuyến mại giảm giá trên các sàn thương mại điện tử thôi nhưng số tiền em kiếm được từ Affiliate thậm chí còn nhiều hơn tiền lương em đi làm thêm part time. Hai tháng sau, em đã có thể kiếm đủ tiền để đóng học phí và trả tiền phòng trọ, ngoài ra em còn học được cách kiếm nhiều tiền từ Affiliate.
					Hiện tại em, số tiền mỗi tháng em kiếm được từ Affiliate đủ cho em có một cuộc sống đầy đủ, em tự mua được xe máy, tự thuê được một căn chung cư mini. Em cũng tiết kiệm được một khoản tiền, điều này giúp em có thể thực hiện giấc mơ về việc sở hữu chuỗi các thẩm mỹ viện cũng như những mục tiêu mới đang mong chờ em trong tương lai!</span>	
				</p>
				<button id="myBtn2">Xem thêm</button>
			</div>	
		</div>
		<div class="col-md-12 text-center">
			<a href="#form-buoc-dk" class="btn nut-dk">ĐĂNG KÍ TÀI KHOẢN ADPIA</a>
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
				<img src="{{ asset('images/cau-hoi.png') }}" alt="" class="img-sec6">	
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
@endsection