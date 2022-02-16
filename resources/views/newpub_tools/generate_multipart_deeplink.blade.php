@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Generate Multipart Link')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
<style>
	.sorting, .sorting_asc, .sorting_desc {
			background : none !important;
		}
		input, select {
			padding: 5px;
			border: 1px solid #ccc;
		}
		.root, .sort{
			position: relative;
		}
		.root span, .sort span{
			position: absolute;
			top: 8px;
			right: 5px;
		}
		.root .form-control, .sort .form-control{
			font-size: 12px;
		}
	.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
			border-top: 0;
			color: #bc1818;
		}
		table.dataTable thead th, table.dataTable thead td, table.dataTable.no-footer{
			border-style: none;
		}
		.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
			color: #4f4c4c;
			font-size: 12px;
			font-weight: 600;
			padding-top: 30px;
		}
	a {
		color: #5a738e !important;
		text-decoration: none !important;
	}

	.generate-multipart-link-tool {
		position: relative;
	}
	.generate-multipart-link-tool-icon {
		position: absolute;
		top: 15px;
		left: 0;
		width: 50px;
    	height: calc(100% - 15px);
    	text-align: center;
	}
	.generate-multipart-link-tool-icon i {
		font-size: 20px;
		transform: rotate(90deg);
	}
    .generate-multipart-link-tool textarea {
    	padding-left: 50px;
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
						<i class="fa fa-plug"></i> Adpia Generate Multipart Link
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
                                <h3>Công cụ tạo danh sách link</h3>
                                <label class="control-label" for="script_link">Công cụ hỗ trợ tạo một danh sách các link chỉ với một thao tác!</label><br/>
                                <small style="color: #ff0000;">(Công cụ này hiện tại chỉ hỗ trợ 4 trang TMĐT lớn : Shopee, Lazada, Tiki và Sendo)</small>
							</div>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-12 col-xs-12">
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <h3>Tạo Link</h3>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="generate-multipart-link-outer">
                                <div class="generate-multipart-link-inner">
                                	<small style="color: #ff0000;">Lưu ý: Chỉ nên tạo khoảng từ 20 - 30 link trở xuống cùng một lúc để tối ưu hóa tốc độ và tránh xảy ra lỗi!</small>
                                    <div class="generate-multipart-link-tool">
                                    	<div class="generate-multipart-link-tool-icon"><i class="fa fa-link" aria-hidden="true"></i></div>
                                        <textarea class="form-control" rows="6" name="generate_multipart_link_input" placeholder="nhập danh sách link của bạn (lưu ý mỗi link nhập trên một dòng)"></textarea>
                                    </div>
                                    <div style="height: 10px;"></div>
                                    <button class="btn btn-info" onclick="handleSubmit()">Tạo link</button>
                                    <div style="padding-top: 10px; display: none;">
                                    	<label>Kết quả link vừa tạo</label>
                                    	<textarea class="form-control" rows="6" name="generate_multipart_link_output" readonly></textarea>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-sm-12 col-xs-12">
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <h3>Lịch sử tạo link</h3>
                            <hr style="border-top: 2px solid #e6e9ed;">
                            <div class="generate-multipart-link-outer">
                                <div class="generate-multipart-link-inner">
                                    <div class="history-link-main-content">
										<div class="history-link-main-content-box" style="padding: 0;">
											<div style="padding-bottom: 10px;">
												<input class="form-control" type="date" name="history_date_filter" style="width: fit-content; margin-left: auto;" max={{ date('Y-m-d') }}> 
											</div>
											<div style="overflow: auto;">
												<table id="his_link" class="table table-striped	table-bordered" style="width:100%; min-width: 500px;">
													<thead>
														<tr>
															<th>STT</th>
															<th>Link click</th>
															<th>Link rút gọn</th>
															<th>Link gốc</th>
															<th>Ngày tạo</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div>
                                </div>
                            </div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div style="text-align: center;" class="history-load-more-area">
								
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
	$(document).ready(function() {
		var clipboard = new ClipboardJS('.btn-copy');

		clipboard.on('success', function (e) {
			toastr.success('Sao chép thành công!');
		});

		clipboard.on('error', function (e) {
			toastr.error('Error Copy'+ e);

		});

		handleLoadHistory();
	});

	function handleLoadHistory(page = 1, submit = false, date = null) {
		showLoading();
		var rows = '';
		var limit = 25;
		$.ajax({
			url: '{{ route('newpub.multipart-link') }}',
			method: 'GET',
			data: { page: page, date: date },
			success: function (res) {
				var data = JSON.parse(res);
				if(data.status == 200) {
					var history = JSON.parse(data.data);
					if(history && history.length > 0) {
						$.each(history, function(index, value) {
							rows += `
							<tr style="height: 42px;">
								<td align="center">`+(((page -1) * limit) + (index + 1))+`</td>
								<td class="root" style="padding: 0 10px; vertical-align: middle;">
									<input style="min-width: 254px;" type="text" readonly id="root`+(((page -1) * limit) + (index + 1))+`"
									class="form-control"
									value="`+value.link_click+`">
									<span class="btn btn-copy btn-default" data-clipboard-action="copy"
									data-clipboard-target="#root`+(((page -1) * limit) + (index + 1))+`" style="top: 3px;">
									<i class="fa fa-clipboard" aria-hidden="true"></i>
								</span>
								</td>
								<td class="sort" style="padding: 0 10px; vertical-align: middle;">
									<input type="text" style="min-width: 244px;" readonly id="sort`+(((page -1) * limit) + (index + 1))+`"
									class="form-control"
									value="`+value.short_link+`">
									<span class="btn btn-copy btn-default " data-clipboard-action="copy"
									data-clipboard-target="#sort`+(((page -1) * limit) + (index + 1))+`" style="top: 3px;">
									<i class="fa fa-clipboard" aria-hidden="true"></i>
								</span>
							</td>
							<td style="padding: 0 10px; vertical-align: middle;"><a target="_blank" href="`+value.root_link+`">`+(value.root_link.length > 60 ? (value.root_link.substr(0, 60)+'...') : value.root_link )+`</a></td>
								<td>`+(value.yyyymmdd.substr(6, 2) + '/' + value.yyyymmdd.substr(4, 2) + '/' + value.yyyymmdd.substr(0, 4))+`</td>
							</tr>
							`;
						});
					} else {
						if(page == 1) {
							rows += '<tr style="height: 42px;"><td align="center" colspan="5">Không có dữ liệu!</td></tr>';
						}
					}

					$("#his_link tbody").append(rows);

					if(history.length == 25) {
						$(".history-load-more-area").html('<button class="btn btn-primary btn-history-load-more" onclick="historyLoadMore('+(page + 1)+')">Tải thêm</button>')
					} else {
						$(".history-load-more-area").html('');
					}
				}
				hideLoading();

				if(submit == true) {
					toastr.success('Tạo link thành công!');
				}
			},
			error: function (e) {
				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
				hideLoading();
			}
		});
	}

	function handleSubmit() {

		showLoading();

		$("textarea[name=generate_multipart_link_output]").val('');
		$("textarea[name=generate_multipart_link_output]").parent().css('display', 'none');

		var affiliate_id = '{{ \Auth::user()->last_contact_affiliate_id }}';
		var account_id = '{{ \Auth::user()->account_id }}';
		var textData = $("textarea[name=generate_multipart_link_input]").val();
		var arrData = textData.split('\n');
		var arrPost = [];
		var promises = [];

		arrData = arrData.filter(item => item);

		if(arrData.length > 30) {
			toastr.error('Số lượng link quá nhiều, xin vui lòng tạo dưới 30 link một lúc!');
			hideLoading();
			return false;
		}

		$.each(arrData, function(index, value) {
			var origin_url = 'https://adpia.vn/api/v1/deeplink?a='+affiliate_id+'&url='+encodeURIComponent(value.replace("'", ""));
			var request = $.ajax({
				url: '{{ route('newpub.shortlink') }}',
				method: 'POST',
				data: {_token: '{{ csrf_token() }}', url: origin_url},
				success: function (data) {
					if (data && data.status === 200) {
						arrPost.push({
							"root_link": value.replace("'", ""),
							"link_click": origin_url,
							"short_link": data.data,
							"order": index
						});
					}
				},
				error: function (e) {
					toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
					hideLoading();
				}
			});

			promises.push(request);
		});

		$.when.apply(null, promises).done(function() {
			$p = new Promise(function(res, rej) {
				arrPost.sort(function(a, b){
					return parseInt(b.order) - parseInt(a.order);
				});

				res(arrPost);
			});

			$p.then(
				function(res){
					return $.ajax({
						url: '{{ route('newpub.insert-multipart-link') }}',
						method: 'POST',
						data: {_token: '{{ csrf_token() }}', arrPost: res},
						success: function (data) {
							var resultRows = '';
							$("#his_link tbody").html('');
							$("textarea[name=generate_multipart_link_input]").val('');
							arrPost.sort(function(a, b){
								return parseInt(a.order) - parseInt(b.order);
							});
							$.each(arrPost, function(index, value) {
								resultRows += value.short_link+"\n";
							});

							$("textarea[name=generate_multipart_link_output]").val(resultRows);
							$("textarea[name=generate_multipart_link_output]").parent().css('display', 'block');

							handleLoadHistory(1, true);
						},
						error: function (e) {
							toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
							hideLoading();
						}
					})
				},
				function(rej){}
			);
		});
	}

	function historyLoadMore($page) {
		handleLoadHistory($page);
	}

	$("input[name=history_date_filter]").change(function(){
		var dateInput = $(this).val();
		var dateString = dateInput.replaceAll("-", "");

		$("#his_link tbody").html('');

		handleLoadHistory(1, false, dateString);
	});
</script>
@stop