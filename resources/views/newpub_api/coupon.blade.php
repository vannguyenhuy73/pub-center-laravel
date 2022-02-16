@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Coupon API')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
<style>
	pre {
		background-color: #333;
	}

	pre code {
		border: none !important;
		color: #ff5d5d;
		box-shadow: none;
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
						<i class="fa fa-plug"></i> COUPON API DOC
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
						<div class="col-sm-8">
							<div class="form-group has-success">
								<label class="control-label" for="api_link">Link API </label>
								<div class="input-group">
									<input onclick="this.focus();this.select();" readonly="" type="text"
									class="form-control code_format"
									value="https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}"
									id="api_link">
									<span class="input-group-btn">
										<button class="btn btn-success" type="button" title="Copy"
										onclick="copyToClipboard($('#api_link').val())"><i
										class="fa fa-copy"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-12 col-xs-12">
							<h3>Hướng dẫn</h3>

							<h4>Tổng Quan</h4>
							<ul>
								<li>
									Link: <a
									href="https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}">https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}</a>
								</li>
								<li>Method: <code>GET</code>, <code>POST</code></li>
								<li>Reponse Type: <code>JSON</code></li>
								<li>Limit Request: <code>None</code></li>
							</ul>

							<h4>Tham số truyền</h4>
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th>Tham số</th>
											<th>Kiểu dữ liệu</th>
											<th>Bắt buộc</th>
											<th>Mặc định</th>
											<th>Mô Tả</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><code>token</code></td>
											<td><code>String</code></td>
											<td><i class="fa fa-check"></i></td>
											<td></td>
											<td>Token của tài khoản</td>
										</tr>
										<tr>
											<td><code>affid</code></td>
											<td><code>String</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>Affliate ID hiện tại của tài khoản</td>
											<td>Affiliate ID của tài khoản</td>
										</tr>
										<tr>
											<td><code>limit</code></td>
											<td><code>Number</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>10</td>
											<td>Số lượng coupon trả về</td>
										</tr>
										<tr>
											<td><code>page</code></td>
											<td><code>Number</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>1</td>
											<td>Trang dữ liệu</td>
										</tr>
										<tr>
											<td><code>page</code></td>
											<td><code>Number</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>1</td>
											<td>Trang dữ liệu</td>
										</tr>
										<tr>
											<td><code>merchant</code></td>
											<td><code>String</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>null</td>
											<td>Lọc dữ liệu theo Merchant</td>
										</tr>
										<tr>
											<td><code>start_date</code></td>
											<td><code>Number</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>null</td>
											<td>Lọc dữ liệu theo ngày bắt đầu của coupon</td>
										</tr>
										<tr>
											<td><code>end_date</code></td>
											<td><code>Number</code></td>
											<td><i class="fa fa-times"></i></td>
											<td>null</td>
											<td>Lọc dữ liệu theo ngày kết thúc của coupon</td>
										</tr>
									</tbody>
								</table>
							</div>

							<h4>Reponse Data</h4>

							<div class="table-responsive">
								<table class="table table-hover table-bordered jambo_table">
									<thead>
										<tr>
											<th>Tham số</th>
											<th>Kiểu dữ liệu</th>
											<th>Mô Tả</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><code>DISCOUNT_ID</code></td>
											<td><code>Number</code></td>
											<td>ID của coupon</td>
										</tr>


										<tr>
											<td><code>MERCHANT_ID</code></td>
											<td><code>String</code></td>
											<td>Merchant</td>
										</tr>
										<tr>
											<td><code>TITLE</code></td>
											<td><code>String</code></td>
											<td>Tiêu đề của coupon</td>
										</tr>
										<tr>
											<td><code>DESCRIPTION</code></td>
											<td><code>String</code></td>
											<td>Mô tả của coupon</td>
										</tr>
										<tr>
											<td><code>START_DATE</code></td>
											<td><code>Number</code></td>
											<td>Ngày bắt đầu áp dụng coupon</td>
										</tr>
										<tr>
											<td><code>END_DATE</code></td>
											<td><code>Number</code></td>
											<td>Ngày kết thúc áp dụng coupon</td>
										</tr>
										<tr>
											<td><code>DISCOUNT</code></td>
											<td><code>String</code></td>
											<td>Mức giảm giá của coupon</td>
										</tr>


										<tr>
											<td><code>QUANTITY</code></td>
											<td><code>String</code></td>
											<td>Số lượng coupon, nếu <code>QUANTITY = 0</code> : Không giới hạn số lượng</td>
										</tr>
										<tr>
											<td><code>CATEGORY</code></td>
											<td><code>String</code></td>
											<td>ID Danh mục Coupon</td>
										</tr>
										<tr>
											<td><code>CATEGORY_NAME</code></td>
											<td><code>String</code></td>
											<td>Danh mục coupon</td>
										</tr>
										<tr>
											<td><code>NOTE</code></td>
											<td><code>String</code></td>
											<td>Coupon Note</td>
										</tr>
										<tr>
											<td><code>NOTE</code></td>
											<td><code>String</code></td>
											<td>Coupon Note</td>
										</tr>

										<tr>
											<td><code>ORIGIN_URL</code></td>
											<td><code>String</code></td>
											<td>Link gốc của coupon</td>
										</tr>

										<tr>
											<td><code>BANNER_URL</code></td>
											<td><code>String</code></td>
											<td>Banner URL của coupon</td>
										</tr>

										<tr>
											<td><code>DEVICE</code></td>
											<td><code>Number</code></td>
											<td>
												Nền tảng hỗ trợ:
												<ul>
													<li>1: Tất cả thiết bị</li>
													<li>2: App only</li>
													<li>3: Web only</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td><code>AFF_LINK</code></td>
											<td><code>String</code></td>
											<td>Link kèm theo mã tracking</td>
										</tr>

									</tbody>
								</table>
							</div>

							<h4>Ví dụ</h4>
							<p>Request URL: <a href="http://www.adpia.vn/api/v1/coupon/?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}&limit=1&page=1">http://www.adpia.vn/api/v1/coupon/?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}&limit=1&page=1</a></p>
							<p>Response data</p>

							<pre><code class="language-json hljs ">{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-number">200</span></span>,
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">total</span>": <span class="hljs-value"><span class="hljs-string">"45"</span></span>,
    "<span class="hljs-attribute">items</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">DISCOUNT_ID</span>": <span class="hljs-value"><span class="hljs-string">"126"</span></span>,
        "<span class="hljs-attribute">MERCHANT_ID</span>": <span class="hljs-value"><span class="hljs-string">"shopee"</span></span>,
        "<span class="hljs-attribute">TITLE</span>": <span class="hljs-value"><span class="hljs-string">"KAZUMY"</span></span>,
        "<span class="hljs-attribute">DESCRIPTION</span>": <span class="hljs-value"><span class="hljs-string">"GIẢM 12% TỐI ĐA 30K ĐƠN TỪ 200K"</span></span>,
        "<span class="hljs-attribute">START_DATE</span>": <span class="hljs-value"><span class="hljs-string">"20181113"</span></span>,
        "<span class="hljs-attribute">END_DATE</span>": <span class="hljs-value"><span class="hljs-string">"20181130"</span></span>,
        "<span class="hljs-attribute">DISCOUNT</span>": <span class="hljs-value"><span class="hljs-string">"12%"</span></span>,
        "<span class="hljs-attribute">DISCOUNT_CODE</span>": <span class="hljs-value"><span class="hljs-string">"HOMEKAZUMY15"</span></span>,
        "<span class="hljs-attribute">QUANTITY</span>": <span class="hljs-value"><span class="hljs-string">"0"</span></span>,
        "<span class="hljs-attribute">CATEGORY</span>": <span class="hljs-value"><span class="hljs-string">"DG"</span></span>,
        "<span class="hljs-attribute">NOTE</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">ORIGIN_URL</span>": <span class="hljs-value"><span class="hljs-string">"https://shopee.vn/tongthanhtung"</span></span>,
        "<span class="hljs-attribute">BANNER_URL</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">DEVICE</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">CATEGORY_NAME</span>": <span class="hljs-value"><span class="hljs-string">"Điện tử và Gia dụng"</span></span>,
        "<span class="hljs-attribute">AFF_LINK</span>": <span class="hljs-value"><span class="hljs-string">"https://pub.adpia.vn/api/deeplink/?a=A100002861&amp;url=https%3A%2F%2Fshopee.vn%2Ftongthanhtung"</span>
      </span>}
    ]
  </span>}
</span>}</code></pre>
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
	<script src="{{ asset('js/jquery.sticky.js') }}"></script>
	<script>
		$(document).ready(function () {
			$("#sider-bar").sticky({topSpacing: 20});
		});
	</script>
	@stop