@extends('landing_register.layout')
@section('link')
	<link rel="stylesheet" href="{{ asset('css/landing_second.css') }}">
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
<div style="height:70px"></div>
<div class="section-1" id="gioi-thieu">
    <div class="container">
        <div class="row">
        	<div class="col-lg-4">
        		<div class="bao-text-sec1">
			        <h3 class="h3-sec1_1">Bạn muốn có</h3>
			        <h3 class="h3-sec1_1">thu nhập thụ động</h3>
			        <h3 class="h3-sec1_2">KHÔNG ÁP LỰC RỦI RO</h3>
			        <p class="p_sec1">- Muốn kinh doanh nhưng ÍT VỐN, không muốn GẶP RỦI RO</p>
			        <p class="p_sec1">- Sở hữu nguồn traffic: website, fanpage, blog, kênh youtube,..</p>
			        <p class="p_sec1">- Có kinh nghiệm trong lĩnh vực marketing</p>
			        <div class="bao-dk">
			        	<a href="#form-buoc-dk" class="btn nut-sec1">ĐĂNG KÝ TÀI KHOẢN ADPIA</a>
			        </div>
		        </div>			
        	</div>
        	<div class="col-lg-8">
        		<img src="images/khoi-trai-sec1.png" alt="" class="img-sec1">			
        	</div>        		
        </div>
		
    </div>
</div>
<div class="section-2" id="pub">
    <div class="container">
        <div class="row">
        	<div class="col-lg-6">        		
        		<div class="bao-text_sec2">
        			<h4 class="h4-sec2">THU NHẬP TRUNG BÌNH CỦA</h4>
        			<h1 class="h1-sec2">PUBLISHER</h1>
					<p class="p-sec2_1">(Người kiếm tiền Online qua Affiliate Marketing)</p>	
					<p class="p-sec2_1">
						<i>Rất nhiều publisher đã sở hữu thu nhập<br> hàng nghìn đô sau <span style="color: red;">3 tháng</span></i>
					</p>
        		</div>        			
        	</div>       
        	<div class="col-lg-6">
        		<div class="bao-phai-sec2">
	        		<div class="owl-carousel owl-theme">
					    <div class="item">
					    	<img src="images/slide_1.png" alt="">	
					    </div>
					    <div class="item">
					    	<img src="images/slide_2.png" alt="">
					    </div>
					    <div class="item">
					    	<img src="images/slide_3.png" alt="">
					    </div>
					    <div class="item">
					    	<img src="images/slide_4.png" alt="">
					    </div>				    
					</div>
				</div>
        	</div>                                               
        </div>    	
    </div>
</div>
<div class="section-2b">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 order-lg-2">
				<img src="images/img-sec2.png" alt="" class="img-sec2b">
			</div>
			<div class="col-lg-8 order-lg-1">
				<table>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Không phải trả bất kì khoản phí nào khi tham gia hệ thống tiếp thị liên kết</td>					
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Không cần bỏ tiền đầu tư sản xuất, thuê địa điểm kinh doanh, trả lương nhân viên</td>					
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Rủi ro cực thấp, không phải chịu hao tổn trong việc lưu trữ, vận chuyển sản phẩm</td>				
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Hoa hồng hấp dẫn, thanh toán nhanh chóng, đúng hạn</td>				
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Thị trường rộng lớn, có cơ hội tiếp cận với khách hàng ở khắp các vùng miền</td>				
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Chủ động lựa chọn các sản phẩm và nhà cung cấp từ hệ thống</td>				
					</tr>
					<tr>
						<td class="align-top"><img src="images/icon_1.png" alt=""></td>
						<td class="td-text-sec2b">Được rèn luyện kỹ năng Marketing thông qua hoạt động quảng bá sản phẩm</td>				
					</tr>
				</table>
				<div class="bao-dk-sec2b">
					<a href="#form-buoc-dk" class="btn nut-dk_2">ĐĂNG KÍ TÀI KHOẢN ADPIA</a>	
				</div>		
			</div>
		</div>
	</div>
</div>
<div class="section-3" id="mo-hinh">
	<div class="container">
		<h4 class="h4-sec3">MÔ HÌNH HOẠT ĐỘNG CỦA AFFILIATE NETWORK</h4>
		<div class="boc-nd-sec3"> 
			<div class="row">
				<div class="col-lg-4">
					<img src="images/mui-ten.png" alt="" class="img-mui-ten">
					<div class="khung-ten-mo-hinh">MERCHANT</div>
					<div class="title-sec3_1">MERCHANT là gì</div>
					<p class="title-sec3_2">Các cá nhân hoặc doanh nghiệp cung cấp sản phẩm, dịch vụ mong muốn tăng lượt truy cập vào Website, nâng cao hiệu quả kinh doanh, tăng doanh số bán hàng</p>
				</div>
				<div class="col-lg-4">
					<img src="images/mui-ten.png" alt="" class="img-mui-ten">
					<div class="khung-ten-mo-hinh">ADPIA</div>
					<div class="title-sec3_1">ADPIA LÀ GÌ?</div>
					<p class="title-sec3_2">Là đơn vị kết nối giữa các đối tác (Affiliate) và nhà cung cấp (Merchant), ADPIA đóng vai trò cung cấp nền tảng kĩ thuật như: link quảng cáo, Banner; theo dõi và đánh giá hiệu quả của việc quảng bá, giải quyết tranh chấp, thu tiền và thanh toán hoa hồng cho các bên tham gia</p>
				</div>
				<div class="col-lg-4">
					<div class="khung-ten-mo-hinh">PUBLISHER</div>
					<div class="title-sec3_1">PUBLISHER LÀ GÌ?</div>
					<p class="title-sec3_2">Đơn vị, cá nhân sở hữu website, blog hay các trang mạng xã hội và kiếm tiền trực tiếp thông qua việc phân phối các chiến dịch quảng cáo của nhà cung cấp </p>
				</div>
			</div>
		</div>	
	</div>    
</div>
<div class="section-4">
	<div class="container">   
		<h4 class="h4-sec4">3 bước kiếm tiền cùng ADPIA</h4>
		<div class="row">
			<div class="col-lg-4">
				<div class="bao-cot_sec4">
					<img src="images/Group-8.png" alt="" class="img-sec4">
					<img src="images/Shape 2.png" alt="" class="img-sec4_2">
					<p class="p-sec4_1">BƯỚC 1: LIÊN KẾT</p>
					<p class="p-sec4_2">Đăng ký tài khoản Affiliate tại ADPIA, lựa chọn và liên kết với nhà cung cấp phù hợp </p>
				</div>
			</div>
			<div class="col-lg-4">
				<img src="images/Group-2.png" alt="" class="img-sec4">
				<img src="images/Shape 2.png" alt="" class="img-sec4_2">
				<p class="p-sec4_1">BƯỚC 2: QUẢNG BÁ </p>
				<p class="p-sec4_2">Phân tích & lên kế hoạch quảng bá cho sản phẩm.Hành động theo hướng đi cụ thể mà bạn đã lên kế hoạch</p>
				<p class="p-sec4_2">Tối ưu hóa, đánh giá hiệu quả, quản lý và nhân rộng chiến dịch</p>
			</div>

			<div class="col-lg-4">
				<img src="images/hh.png" alt="" class="img-sec4">
				<p class="p-sec4_1">BƯỚC 3: NHẬN HOA HỒNG </p>
				<p class="p-sec4_2">Nhận hoa hồng từ mỗi hành động của người dùng theo yêu cầu: mua hàng, điền form đăng ký, cài đặt,.</p>
			</div>
		</div>
		<div class="boc-dk_2">
			<a href="#form-buoc-dk" class="btn nut-dk_2">ĐĂNG KÝ TÀI KHOẢN ADPIA</a>
		</div>
	</div>
</div>
@endsection
@section('content2')	
<div class="section-5" id="chia-se">
	<div class="container">
		<h4 class="h4-sec5">CHIA SẺ TỪ CÁC PUBLISHER </h4>
		<p class="p-title_sec5">(Đang hoạt động trong hệ thống ADPIA)</p>
		<div class="row">
			<div class="col-lg-4 pt-3">
				<img src="images/img-sec7_1.png" alt="" class="img-sec5">	
			</div>	
			<div class="col-lg-8 pt-3">
				<h6 class="h6-sec5">TRẦN HOÀNG CHIA SẺ- NHÂN VIÊN VĂN PHÒNG</h6>
				<p class="p-mar-bot">
					1. Mình là nhân viên văn phòng ngày làm 8 tiếng với mức lương cơ bản đủ sống cho cuộc sống độc thân một mình. Đến đầu năm 2019 mình biết đến hệ thống Affiliate Marketing từ lời kể của một cậu em đồng nghiệp cùng công ty. Mình tìm hiểu về Affiliate Marketing và được giới thiệu nền tảng ADPIA Affiliate. Mình bắt đầu từ việc chia sẻ link khuyến mại giảm giá của các sản phẩm lên các hội nhóm trên fb, hoa hồng mình kiếm được từ việc share link này tuy không nhiều nhưng cũng là là những đồng hoa hồng đầu tiên tạo động lực cho mình tìm hiểu sâu thêm về lĩnh vực này.
					<br>
					<span id="more1">Mình tham gia các group về Affiliate và MMO trên fb để học hỏi thêm kinh nghiệm, mình học xây fanpage và học chạy quảng cáo. Mới đầu cũng khá khó khăn vì mình phải tiếp xúc với 1 mảng kiến thức mới, chạy quảng cáo thời gian đầu cũng không hiệu quả lắm do mình không biết cách chạy, không biết cách tối ưu. Mình thật sự phải cảm ơn các bạn hỗ trợ của ADPIA rất nhiều, các bạn tư vấn cho mình rất nhiệt tình. 
					Sau gần 1 năm lăn xả với affiliate, mình đã tích lũy được chút ít kinh nghiệm về marketing, về fb ads và 1 khoản tiền tiết kiệm. Những năm gần đây kiếm tiền affiliate đang là xu hướng kiếm tiền online khá hiệu quả. Mình sẽ còn phải học hỏi thêm nhiều về lĩnh vực này. </span>
				</p>
				<button id="myBtn1">Xem thêm</button>	
			</div>
			<div class="col-lg-4 order-lg-2 pt-3">
				<img src="images/img-sec7_2.png" alt="" class="img-girl">
			</div>
			<div class="col-lg-8 order-lg-1 pt-3">
				<h6 class="h6-sec5">VIỆT DŨNG CHIA SẺ- NHÂN VIÊN CHẠY QUẢNG CÁO FACEBOOK</h6>
				<p class="p-mar-bot">										
					2. Trước đây em làm nhân viên chạy quảng cáo fb cho một công ty thực phẩm chức năng được hơn 3 năm. Em không phải quá xuất sắc, nhưng cũng không phải không làm được việc. Em làm 3 năm trời vẫn chỉ lẹt đẹt làm nhân viên quèn, phận nhân viên quèn bị sếp đì khổ thật sự ý. Vì chán quá không chịu được nữa nên em bỏ việc. Trong lúc đi làm em tích cóp được một khoản nên đánh liều ôm hàng về kinh doanh riêng. Em cũng thuê 2-3 bạn nhân viên về làm cùng, và do không có kinh nghiệm kinh doanh, kinh nghiệm quản lý, em lỗ chổng vó, ôm về 1 đống nợ. <br>
					<span id="more2"> Đợt đấy đang loay hoay tìm việc kiếm tiền, nghĩ đi làm lại ở công ty thì cũng chán, tính em không ưa gò bó, chèn ép. Rồi trong lần nói chuyện với anh làm cùng công ty cũ, anh ý bảo em thử làm Affiliate đi. E nghe theo, lên mạng tìm nền tảng affiliate uy tín thì được đề xuất một vài nền tảng. Cuối cùng e chọn ADPIA vì hoa hồng cũng cao, đối tác toàn mấy đơn vị lớn, mà cái quan trọng nhất là ADPIA thanh toán hoa hồng 2 lần/tháng, với cả lúc em đăng ký xong thì mấy anh chị support bên đấy gọi điện xác nhận rồi hỗ trợ nhiệt tình lắm. Em không biết ở đâu là mấy anh chị chỉ e liền, còn hướng dẫn cho e cách kiếm tiền qua affiliate và gửi cho e tài liệu học tập về marketing nữa.<br> 
					Thời gian đầu e chỉ tập trung chạy fb ads thôi, vì e chuyên fb ads, về sau được anh support khuyên nên đẩy thêm các kênh khác nữa, e nghe theo đẩy web treo banner, đẩy kênh youtube,.. e thu về được doanh thu kha khá sau mấy chiến dịch đấy. 
					Tầm khoảng 3 tháng sau e thì xử xong được đống nợ. Giờ e cũng chẳng đi làm ở đâu nữa, ở nhà phụ giúp vợ làm quán cắt tóc gội đầu với làm affiliate thôi. E đang học thêm về GG ads, Zalo ads, hy vọng có thể đạt được nhiều thành công hơn trong năm tới  </span>
				</p>
				<button id="myBtn2">Xem thêm</button>
			</div>	
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
				<div class="bao-dk-sec2b">
					<a href="#form-buoc-dk" class="btn nut-dk_2">ĐĂNG KÍ TÀI KHOẢN ADPIA</a>	
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