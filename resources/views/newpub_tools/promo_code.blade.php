@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Deeplink')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
<style>
    .promo-code-setting-steps-box {
        display: flex;
        flex-wrap: wrap;
    }
    .promo-code-setting-steps-left {
        flex: 30%;
        max-width: 30%;
    }
    .promo-code-setting-steps-right {
        flex: 70%;
        max-width: 70%;
        padding-left: 20px;
    }
    .promo-code-setting-steps-right img {
        width: 100%;
    }
    .promo-code-guide-video {
        width: 100%;
        max-width: 800px;
        margin: auto;
        padding-top: 20px;
    }
    .promo-code-guide-video-box {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
    }
    .promo-code-guide-video-box iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    @media (max-width: 1000px) {
        .promo-code-setting-steps-right,
        .promo-code-setting-steps-left {
            flex: 100%;
            max-width: 100%;
        }
    }
</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						<i class="fa fa-plug"></i> Adpia Promo Code
					</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-success">
                                <h3>Mã giảm giá dành cho Wordpress</h3>
                                <label class="control-label" for="script_link">Plugin hỗ trợ xây dựng và hiển thị tự động danh sách mã giảm giá từ một số nhà cung cấp thương mại điện tử như trên hệ thống ADPIA </label>
							</div>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-12 col-xs-12">
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <h3>I. Cài Đặt</h3>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="promo-code-setting-steps">
                                <div class="promo-code-setting-steps-box">
                                    <div class="promo-code-setting-steps-left">
                                        <h4>B1. Tải plugin lên trang wordpress</h4>
                                        <p>- Tải plugin về tại <a href="/files/adpia-promo-code.zip" style="color: #0000ff !important;"><code>đây</code></a>.</p>
                                        <p>- Tại giao diện Quản trị, chọn menu <code>Plugin</code> &rarr; <code>Cài mới</code>.</p>
                                        <p>- Chọn <code>Tải plugin lên</code>, nhấn <code>Chọn tệp</code>, lựa chọn file vừa tải về, rồi nhấn <code>Cài đặt</code>.</p>
                                        <p>- Sau khi cài đặt thành công, chọn <code>Kích hoạt plugin</code>.</p>
                                        <p>- <code>Adpia Promo</code> sẽ hiển thị trên thanh menu chính, nhấn chọn <code>Adpia Promo</code>.</p>
                                    </div>
                                    <div class="promo-code-setting-steps-right">
                                        <img src="/images/promo_guide_screen_1.png">
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="promo-code-setting-steps">
                                <div class="promo-code-setting-steps-box">
                                    <div class="promo-code-setting-steps-left">
                                        <h4>B2. Tạo shortcode</h4>
                                        <p>- Nhập Affiliate ID của bạn trên trang <a href="#"><code>https://newpub.adpia.vn/</code></a> vào mục <code>Affiliate ID</code>.</p>
                                        <p>- Chọn nhà cung cấp muốn lấy mã giảm giá tại mục <code>Offer</code>.</p>
                                        <p>- Nhập số lượng mã giảm giá sẽ hiển thị trên một trang vào mục <code>Limit</code>, plugin sẽ tự động phân trang dựa trên số lượng bạn nhập.
                                        <p>- Lựa chọn màu nền chủ đạo cho mã giảm giá khi hiển thị tại mục <code>Background</code>.</p>
                                        <p>- Nhấn lưu thay đổi. Nếu thành công sẽ có thông báo và shortcode của bạn sẽ hiển thị phái bên dưới. Nhấn vào biểu tượng copy bên cạnh.
                                    </div>
                                    <div class="promo-code-setting-steps-right">
                                        <img src="/images/promo_guide_screen_2.png">
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <h3>II. Hướng dẫn sử dụng</h3>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="promo-code-setting-steps">
                                <div class="promo-code-setting-steps-box">
                                    <div class="promo-code-setting-steps-left">
                                        <h4>B1. Thêm shortcode vào bài viết</h4>
                                        <p>- Sau khi copy đoạn shortcode trong phần cài đặt, vào phần <code>Bài viết</code> &rarr; <code>Viết bài mới</code>.</p>
                                        <p>- Dán đoạn shortcode vào trong nội dung bài viết, bạn vẫn có thể soạn thảo thêm nội dung nếu muôn.</p>
                                        <p>- Nhấn <code>Đăng</code> để lưu lại bài viết.</p>
                                    </div>
                                    <div class="promo-code-setting-steps-right">
                                        <img src="/images/promo_guide_screen_3.png">
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="promo-code-setting-steps">
                                <div class="promo-code-setting-steps-box">
                                    <div class="promo-code-setting-steps-left">
                                        <h4>B2. Hiển thị kết quả</h4>
                                        <p>- Xem trang bạn vừa gắn shortcode trên website của bạn.</p>
                                        <p>- Và đây là kết quả.</p>
                                        <p>- Bạn có thể cập nhật lại shortcode, sao chép và dán trên một bài viết khác mà không sợ sẽ ảnh hưởng đến shortcode cũ đã thêm trước đó.</p>
                                        <p>- Nếu có bất kỳ thắc mắc hay góp ý nào về plugin <code>Adpia Promo Code</code>, xin vui lòng liên hệ với AM của bạn để được hõ trợ và giải đáp.</p>
                                        <p>- Chúc bạn thành công!</p>
                                    </div>
                                    <div class="promo-code-setting-steps-right">
                                        <img src="/images/promo_guide_screen_4.png">
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <h3>III. Video hướng dẫn sử dụng plugin</h3>
                            <div class="promo-code-guide-video">
                                <div class="promo-code-guide-video-box">
                                    <iframe width="560" height="315" src="https://www.kapwing.com/e/606a75f7ecdb64003d6231b0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/bundle.js') }}"></script>
<script>

</script>
@stop
