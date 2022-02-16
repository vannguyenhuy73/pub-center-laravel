@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Deeplink')
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
	.x_content a{
		color: #ff5d5d;
	}
    table th:nth-child(4) {
        min-width: 150px;
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
						<i class="fa fa-plug"></i> Smart Url
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
                                <h3>Công cụ tự động chuyển link đích thành link phân phối</h3>
								<label class="control-label" for="script_link">Thẻ Script </label>
								<div class="input-group">
									<input onclick="this.focus();this.select();" type="text"
									class="form-control code_format"
									value='<script src="{{ config('const.smart_url_library') }}?aff={{ auth()->user()->last_contact_affiliate_id }}" type="text/javascript"></script>'
									id="script_link" readonly>
									<span class="input-group-btn">
										<button class="btn btn-success" type="button" title="Copy"
										onclick="copyToClipboard($('#script_link').val())"><i
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
								<li>Mô tả: Đoạn script này sẽ tự động chuyển đổi tất cả các link đích của một số trang thương mại điện tử nổi bật trên hệ thống ADPIA, khi người dùng click vào sẽ tự động chuyển sang link phân phối.</br>
								</li>
                                <li>Gắn đoạn script trên vào website của bạn (nên ưu tiên đặt trong thẻ head).</li>
                                <li>Các domain hiện đang được đoạn script này hỗ trợ : </br>
                                    <code>https://www.lazada.vn/</code></br>
                                    <code>https://shopee.vn/</code></br>
                                    <code>https://www.sendo.vn/</code></br>
                                    <code>https://tiki.vn/</code></br>
                                    <code>https://vshopping.com.vn/</code></br>
                                    <code>https://www.yes24.vn/</code>
                                </li>
							</ul>

							<h4>Tham số truyền</h4>
							<div class="table-responsive">
								<table class="table table-hover table-bordered jambo_table">
									<thead>
										<tr>
											<th>Tham Số</th>
											<th>Bắt Buộc</th>
											<th>Mô Tả</th>
                                            <th>Giá Trị</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>aff</td>
											<td><i class="fa fa-check"></i></td>
											<td>Affiliate ID của tài khoản</td>
                                            <td>
                                                <input type="text" class="form-control" value="{{ auth()->user()->last_contact_affiliate_id }}" readonly>
                                            </td>
										</tr>
                                        <tr>
											<td>exclude</td>
											<td><i class="fa fa-times"></i></td>
											<td>Tự động bỏ qua những domain này (link1,link2,...)</td>
                                            <td>
                                                <input type="text" class="form-control" name="exclude_domain" placeholder="VD: https://www.lazada.vn/,https://www.sendo.vn/">
                                            </td>
										</tr>
									</tbody>
								</table>
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
    $("input[name=exclude_domain]").keyup(function(event) {
        var currentScriptStart = '<script src="{{ config("const.smart_url_library") }}?aff={{ auth()->user()->last_contact_affiliate_id }}';
        var currentScriptEnd = '" type="text/javascript"><\/script>';
        var currentScript = currentScriptStart + currentScriptEnd;
        var domains = encodeURIComponent($(this).val());
        if(domains.length == 0) {
            $("#script_link").val(currentScript);
        } else {
            var query_string = (currentScript.indexOf("&exclude=") == -1 ? "&exclude=" : "") + domains;
            $("#script_link").val(currentScriptStart + query_string + currentScriptEnd);
        }
    });
</script>
@stop
