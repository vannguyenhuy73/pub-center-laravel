@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate Report')
@section('newpub_style')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/simplePagination.js/1.6/simplePagination.css">
<style>
	.mail-list li.active a {
		color: white;
	}
	.table {
		font-size: 12px;
		border-radius: 20px;
		overflow: hidden;
		text-align: center;
	}
	.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td {
		padding: 8px;
		line-height: 1.42857143;
		vertical-align: middle;
		border-top: 1px solid #ddd;
	}
	.table > thead > tr > th {
		text-align: center;
		padding: 15px 5px;.
	}
	.table-responsive {
		border: none;
		overflow: auto;
		-webkit-overflow-scrolling: touch;
	}
	.calendar.left {
		float: left !important;
	}
	.table-header-pink {
		background-color: rgb(252, 227, 220);
	}
	.table-header-blue {
		background-color: rgb(177, 208, 237);
	}
	.table-header-purple {
		background-color: rgb(232, 144, 216);
	}
	.fw-600 {
		font-weight: 600;
	}
	.table-row-light-grey {
		background-color: rgb(249, 249, 249);
	}
	.table-row-dark-grey {
		background-color: rgb(241, 241, 241);
	}
	.simple-pagination {
		margin-bottom: 10px;
	}
	.table-responsive .table {
    	max-width: none;
	}
	@media (max-width: 1210px) {
		.newpub-page-main-content-box {
			flex-direction: column;
		}
	}
</style>
@stop
@section('newpub_main_content')
<div class="report-left-area">
	<div class="report-left-box">
		<div class="report-commisson-number-card">
			<div class="report-commisson-number-card-box">
				<div class="report-card-box card-red">
					<div class="com-card-value">
						<span>N/A</span>
					</div>
					<div class="com-card-title">
						<div class="com-card-text" style="align-self: center;">
							<span>Số Chuyển Đổi</span>
						</div>
						<div class="com-card-item">
							<img src="{{ asset('images/transfer.png') }}" alt="">
						</div>
					</div>
				</div>
				<div class="report-card-box card-blue">
					<div class="com-card-value">
						<span>N/A</span>
					</div>
					<div class="com-card-title">
						<div class="com-card-text" style="align-self: center;">
							<span>Doanh Số</span>
						</div>
						<div class="com-card-item">
							<img src="{{ asset('images/money.png') }}" alt="">
						</div>
					</div>
				</div>
				<div class="report-card-box card-green">
					<div class="com-card-value">
						<span>N/A</span>
					</div>
					<div class="com-card-title">
						<div class="com-card-text" style="align-self: center;">
							<span>Hoa Hồng</span>
						</div>
						<div class="com-card-item">
							<img src="{{ asset('images/atm.png') }}" alt="">
						</div>
					</div>
				</div>
				<div class="report-card-box card-purple">
					<div class="com-card-value">
						<span>N/A</span>
					</div>
					<div class="com-card-title">
						<div class="com-card-text" style="align-self: center;">
							<span>Tiền Thưởng</span>
						</div>
						<div class="com-card-item">
							<img src="{{ asset('images/atm.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="report-filter-area-550">
			<div class="report-filter-box-550">
				<div class="report-filter-head-550">
					<span>TÌM KIẾM CHI TIẾT</span>
				</div>
				<form action="" method="GET" role="form" id="filter-form-550">
					@csrf
					<div class="report-filter-content-550">
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-input-550" style="position: relative;">
								<input class="form-control" name="search_string_550" style="padding-right: 100px;" placeholder="Nhập tên merchant">
								<div style="position: absolute; top: 0; right: 0; height: 34px; width: 100px;">
									<div style="background: rgba(25, 55, 89, 0.9); height: 100%; border-radius: 4px; line-height: 34px; text-align: center; color: #fff; cursor: pointer; border: 1px solid #fff;" class="btn-search-report">TÌM KIẾM</div>
								</div>
							</div>
						</div>
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-label-550">
								<span>CHỌN THỜI GIAN</span>
							</div>
							<div class="report-filter-form-input-550">
								<div id="reportrange-report-550" class="report-filter-550">
									<i class="fa fa-calendar"></i>&nbsp;
									<span></span> <i class="fa fa-caret-down" style="float: right;"></i>
								</div>
								<input type="hidden" name="start">
								<input type="hidden" name="end">
							</div>
						</div>
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-label-550">
								<span>WEBSITE</span>
							</div>
							<div class="report-filter-form-input-550">
								<select name="affiliate_id" class="form-control">
									<option value="">Tất Cả</option>
									@foreach($affiliates as $affiliateId => $siteName)
									<option value="{{ $affiliateId }}">{{ $siteName }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-label-550">
								<span>CHIẾN DỊCH</span>
							</div>
							<div class="report-filter-form-input-550">
								<select name="offer_type" class="form-control">
									<option value="">Tất Cả</option>
									<option value="CPS">CPS</option>
									<option value="CPA">CPA</option>
									<option value="CPI">CPI</option>
								</select>
							</div>
						</div>
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-label-550">
								<span>MERCHANT ID</span>
							</div>
							<div class="report-filter-form-input-550">
								<select class="form-control" name="merchant_id">
									<option value="">Tất Cả</option>
									@foreach($listMerchant as $merchant)
									<option value="{{ $merchant->merchant_id }}">{{ $merchant->merchant_id }}</option>
									@endforeach
								</select>
								<input type="hidden" name="offer_id">
							</div>
						</div>
						<div class="report-filter-form-group-550">
							<div class="report-filter-form-label-550">
								<span>TRẠNG THÁI</span>
							</div>
							<div class="report-filter-form-input-550">
								<select name="conversion-status" class="form-control" disabled="">
									<option value="">Tất Cả</option>
									<option value="100">Chờ duyệt</option>
									<option value="300">Hủy</option>
									<option value="210">Thành công</option>
								</select>
							</div>
						</div>
					</div>
				</form>
				<div class="report-filter-form-submit-button-550">
					<button class="btn">TÌM KIẾM</button>
				</div>
			</div>
		</div>
		<div class="report-performance-area">
			<div class="report-performance-area-box">
				<div class="report-performance-head">
					<span>BÁO CÁO HIỆU QUẢ</span>
				</div>
				<div style="display: flex; margin-bottom: 10px;">
					<div style="margin-right: 5px; align-self: center;"><span>Hiển thị</span></div>
					<select name="num_record_overview" id="num_record_overview" class="form-control" style="width: 80px;">
						<option value="10" selected="">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
					</select>
					<div style="margin-left: 5px; align-self: center;"><span>(Tổng cộng: <span id="report-total-record">0</span> kết quả)</span></div>
				</div>
				<div class="table-responsive">
					<table class="table table-overview-report">
						<thead class="table-header-pink">
							<tr>
								<th>STT</th>
								<th>MERCHANT ID</th>
								<th>HIỂN THỊ</th>
								<th>CLICK</th>
								<th>CLICK THỰC</th>
								<th>SỐ CHUYỂN ĐỔI</th>
								<th>TỈ LỆ CHUYỂN ĐỔI</th>
								<th>DOANH SỐ (VND)</th>
								<th>HOA HỒNG (VND)</th>
								<th>EPC</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="10" class="text-center table-row-light-grey" style="height: 70px;vertical-align: middle; color: red">Loading...</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-paginate-overview">
					
				</div>
			</div>
		</div>
		<div class="report-bonus-area">
			<div class="report-bonus-area-box">
				<div class="report-bonus-head">
					<span>BÁO CÁO TIỀN THƯỞNG</span>
				</div>
				<div style="display: flex; margin-bottom: 10px;">
					<div style="margin-right: 5px; align-self: center;"><span>Hiển thị</span></div>
					<select name="num_record_bonus" id="num_record_bonus" class="form-control" style="width: 80px;">
						<option value="10" selected="">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
					</select>
					<div style="margin-left: 5px; align-self: center;"><span>(Tổng cộng: <span id="report-bonus-record">0</span> kết quả)</span></div>
				</div>
				<div class="table-responsive">
					<table class="table table-bonus-report">
						<thead class="table-header-purple">
							<tr>
								<th>STT</th>
								<th>THÁNG</th>
								<th>MERCHANT ID</th>
								<th>TIỀN THƯỞNG</th>
								<th>LOẠI TIỀN THƯỞNG</th>
								<th>MÔ TẢ</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="10" class="text-center table-row-light-grey" style="height: 70px;vertical-align: middle; color: red">Loading...</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-paginate-bonus">
					
				</div>
			</div>
		</div>
		<div class="report-detail-area">
			<div class="report-detail-area-box">
				<div class="report-detail-head">
					<span>BÁO CÁO CHI TIẾT</span>
				</div>
				<div style="display: flex; margin-bottom: 10px;">
					<div style="margin-right: 5px; align-self: center;"><span>Hiển thị</span></div>
					<select name="num_record_detail" id="num_record_detail" class="form-control" style="width: 80px;">
						<option value="50" selected="">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
					</select>
				</div>
				<div class="table-responsive">
					<table class="table table-detail-report">
						<thead class="table-header-blue">
							<tr>
								<th>STT</th>
								<th>MERCHANT ID</th>
								<th>ORDER TIME</th>
								<th>TRANSACTION ID</th>
								<th>SHOP NAME</th>
								<th>TÊN SẢN PHẨM</th>
								<th>DOANH SỐ</th>
								<th>HOA HỒNG</th>
								<th>TRẠNG THÁI</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="10" class="text-center" style="height: 70px;vertical-align: middle; color: red">Loading....
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-paginate-bar">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="report-right-area">
	<div class="report-right-box">
		<div class="report-filter-quick">
			<div class="report-filter-quick-title">
				<span>TÌM KIẾM NHANH</span>
			</div>
			<div class="report-filter-quick-input">
				<input type="text" class="form-control" placeholder="Nhập Từ Khóa" name="search_string">
				<button class="btn btn-search-report btn-search-report-pc">TÌM KIẾM</button>
			</div>
		</div>
		<div class="report-filter-detail">
			<form action="" method="GET" role="form" id="filter-form">
				@csrf
				<div class="report-filter-detail-title">
					<span>TÌM KIẾM CHI TIẾT</span>
				</div>
				<div class="report-filter-date">
					<div id="reportrange-report">
						<i class="fa fa-calendar"></i>&nbsp;
						<span></span> <i class="fa fa-caret-down" style="float: right;"></i>
					</div>
					<input type="hidden" name="start">
					<input type="hidden" name="end">
				</div>
				<div class="report-filter-website">
					<span>WEBSITE</span>
					<select name="affiliate_id" id="affiliate_id" class="form-control">
						<option value="">Tất Cả</option>
						@foreach($affiliates as $affiliateId => $siteName)
						<option value="{{ $affiliateId }}">{{ $siteName }}</option>
						@endforeach
					</select>
				</div>
				<div class="report-filter-offer">
					<span>CHIẾN DỊCH</span>
					<select name="offer_type" id="offer_type" class="form-control">
						<option value="">Tất Cả</option>
						<option value="CPS">CPS</option>
						<option value="CPA">CPA</option>
						<option value="CPI">CPI</option>
					</select>
				</div>
				<div class="report-filter-mid">
					<span>MERCHANT ID</span>
					<select class="form-control" name="merchant_id">
						<option value="">Tất Cả</option>
						@foreach($listMerchant as $merchant)
						<option value="{{ $merchant->merchant_id }}">{{ $merchant->merchant_id }}</option>
						@endforeach
					</select>
					<input type="hidden" name="offer_id" id="offer_id">
				</div>
				<div class="report-filter-status">
					<span>TRẠNG THÁI</span>
					<select name="conversion-status" id="offer_status" class="form-control" disabled="">
						<option value="">Tất Cả</option>
						<option value="100">Chờ duyệt</option>
						<option value="300">Hủy</option>
						<option value="210">Thành công</option>
					</select>
				</div>
				<div class="report-filter-detail-submit">
					<button class="btn">TÌM KIẾM</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.tutorialjinni.com/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>
	$(function() {
		var start = moment().subtract(30, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange-report span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
			$('#reportrange-report-550 span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
			$('input[name=start]').val(start.format('YYYYMMDD'));
			$('input[name=end]').val(end.format('YYYYMMDD'));
		}

		$('#reportrange-report').daterangepicker({
			"maxSpan": {
				"days": 30
			},
			"startDate": start,
			"endDate": end,
			"maxDate": end,
			"opens": "left",
			locale: {
				"customRangeLabel": "Thời Gian Cụ Thể",
				"applyLabel": "Áp Dụng",
				"cancelLabel": "Hủy Bỏ",
				"daysOfWeek": ["T2","T3","T4","T5","T6","T7","CN"],
				"monthNames": ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6",
				"Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"
				],
			},
			ranges: {
				'Hôm Nay': [moment(), moment()],
				'Hôm Qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'7 Ngày Trước': [moment().subtract(6, 'days'), moment()],
				'30 Ngày Trước': [moment().subtract(30, 'days'), moment()],
				'Tháng Này': [moment().startOf('month'), moment()],
				'Tháng Trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		$('#reportrange-report-550').daterangepicker({
			"maxSpan": {
				"days": 30
			},
			"startDate": start,
			"endDate": end,
			"maxDate": end,
			"opens": "left",
			locale: {
				"customRangeLabel": "Thời Gian Cụ Thể",
				"applyLabel": "Áp Dụng",
				"cancelLabel": "Hủy Bỏ",
				"daysOfWeek": ["T2","T3","T4","T5","T6","T7","CN"],
				"monthNames": ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6",
				"Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"
				],
			},
			ranges: {
				'Hôm Nay': [moment(), moment()],
				'Hôm Qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'7 Ngày Trước': [moment().subtract(6, 'days'), moment()],
				'30 Ngày Trước': [moment().subtract(30, 'days'), moment()],
				'Tháng Này': [moment().startOf('month'), moment()],
				'Tháng Trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		cb(start, end);
	});
</script>
<script>
	var limit_overview = $("#num_record_overview").val();
	var limit_detail = $("#num_record_detail").val();
	var limit_bonus = $("#num_record_bonus").val();

	function filter(search = false, page = 1, paginate = false) {
		if(search == true) {
			strSearch = ($(window).width() > 1210 ? $("input[name=search_string]").val() : $("input[name=search_string_550]").val());
			refreshInfo();
			refreshSelectOption();
			var data = {'_token': '{{ csrf_token() }}','strSearch': strSearch};
		} else {
			var data = ($(window).width() > 1210 ? $('#filter-form').serialize() : $("#filter-form-550").serialize());
			refreshInfo();
		}
		return $.ajax({
			url: '{{ route('newpub.report.ajax') }}',
			method: 'POST',
			data: data,
			success: function (data) {
				if (data.status != 200) {
					toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
				}

				var html = '';
				var stt = limit_overview * (page - 1);

				data.data.forEach(function (element, index) {

					if(index >= (limit_overview * (page - 1)) && index < (limit_overview * (page - 1)) + limit_overview) {
						stt++;

						html += '<tr class="pointer report-row-custom' + (index % 2 == 0 ? ' table-row-light-grey' : ' table-row-dark-grey') + '" onclick="detailReportFilter(\'' + element.merchant_id + '\')">' +
					'<td>' + stt + '</td>' +
					'<td class="fw-600">' + element.merchant_id.toUpperCase() + '</td>' +
					'<td>' + addCommas(element.imp) + ' </td>' +
					'<td>' + addCommas(element.total_clt) + ' </td>' +
					'<td>' + addCommas(element.clt) + ' </td>' +
					'<td>' + addCommas(element.total_items) + '</td>' +
					'<td>' + (element.clt > 0 ? roundDecimal((element.merchant_id == "comico" ? element.total_items : element.total_ords) / element.clt * 100) : '0') + '% </td>' +
					'<td>' + addCommas(roundDecimal(element.total_sales)) + '</td>' +
					'<td>' + addCommas(roundDecimal(element.total_com)) + '</td>' +
					'<td>' + (element.clt > 0 ? addCommas(roundDecimal(element.total_com / element.clt)) : '0') + ' </td>' +
					'</tr>';
					}
				});

				if(html == '') {
					html = `<td colspan="10" class="text-center table-row-light-grey" style="height: 70px;vertical-align: middle; color: red">Không có dữ liệu nào phù hợp!</td>`;
				}

				$(".table-overview-report tbody").html(html);
				$("#report-total-record").html(data.data.length);

				if(paginate == false) {
					$(".table-paginate-overview").pagination({
						items: data.data.length,
						itemsOnPage: limit_overview,
						displayedPages: 3,
						cssStyle: 'light-theme',
						onPageClick : function(pageNumber){
							showLoading();

							$.when(
								filter(false, pageNumber, true)
							).then(function(){
								hideLoading();
							});
						}
					});
				}
			},
			error: function () {
				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
			}
		});
	}

	$(function() {
		showLoading();

		$.when(
			filter(),
			getSummary(),
			getPubBonus()
		).then(function(){
			hideLoading();
		});
	});
	
	function filter_detail() {
		showLoading();

		$.when(
			getSummary(),
			getConversion()
		).then(function(){
			hideLoading();
		});
	}

	function getConversion(page = 1) {
		return $.ajax({
			url: '{{ route('newpub.report.detail.ajax') }}',
			method: 'POST',
			data: ($(window).width() > 550 ? $('#filter-form').serialize() : $("#filter-form-550").serialize()) + '&page=' + page + "&limit=" + limit_detail,
			success: function (data) {
				if (data.status != 200) {
					toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
				}

				var html = '';
				var stt = limit_detail * (page - 1);

				data.data.data.forEach(function (element, index) {
					let format_date = moment(element.yyyymmdd, "YYYYMMDD");
					let date_time = format_date.format("DD/MM/YYYY")
					stt ++;

					html += '<tr class="pointer' + (index % 2 == 0 ? ' table-row-light-grey' : ' table-row-dark-grey') + '">' +
					'<td>' + stt + '</td>' +
					'<td class="fw-600">' +
					'<a href="{{ route('offer_list.show','') }}/' + element.merchant_id + '">' + element.merchant_id.toUpperCase() + '</a>' +
					'</td>' +
					'<td>' + date_time + ' </td>' +
					'<td>' + element.trlog_id + ' </td>' +
					'<td>' + (element.shop_name || '-') + ' </td>' +
					'<td>' + element.product_name + ' </td>' +
					'<td>' + addCommas(element.sales) + ' </td>' +
					'<td>' + addCommas(roundDecimal(element.commission)) + ' </td>' +
					'<td>' + showConversionStatus2(element.stat) + '</td>' +
					'</tr>';
				});

				if(!html.length) {
					html = `<td colspan="10" class="text-center table-row-light-grey" style="height: 70px;vertical-align: middle; color: red">Merchant không phát sinh hoa hồng nào!</td>`;
				}

				$(".table-detail-report tbody").html(html);
				$(".report-detail-area").css('display', 'block');
			},
			error: function () {
				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
			}
		});
	}

	function getSummary(search = false) {
		if(search == true) {
			strSearch = ($(window).width() > 550 ? $("input[name=search_string]").val() : $("input[name=search_string_550]").val());
			var data = {'_token': '{{ csrf_token() }}','strSearch': strSearch};
		} else {
			var data = ($(window).width() > 550 ? $('#filter-form').serialize() : $("#filter-form-550").serialize());
		}
		return $.ajax({
			url: '{{ route('newpub.report.detail.summary') }}',
			method: 'POST',
			data: data,
			success: function (data) {
				if (data.status != 200) {
					toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
				} else {
					$('.report-card-box.card-red .com-card-value span').text(data.data.count);
					var commission = 0;
					var revenue = 0;

					if (data.data.commission) {
						commission = addCommas(parseInt(data.data.commission).toFixed(0))
					}

					if (data.data.revenue) {
						revenue = addCommas(parseInt(data.data.revenue).toFixed(0))
					}

					$('.report-card-box.card-green .com-card-value span').text( commission + ' VNĐ');
					$('.report-card-box.card-blue .com-card-value span').text(revenue + ' VNĐ');

					$(".table-paginate-bar").pagination({
						items: data.data.count,
						itemsOnPage: limit_detail,
						displayedPages: 3,
						cssStyle: 'light-theme',
						onPageClick : function(pageNumber){
							showLoading();

							$.when(
								getConversion(pageNumber)
							).then(function() {
								hideLoading();
							});
						}
					});
				}
			},
			error: function () {
				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
			}
		});
	}

	function getPubBonus(search = false, page = 1, paginate = false) {
		if(search == true) {
			strSearch = ($(window).width() > 550 ? $("input[name=search_string]").val() : $("input[name=search_string_550]").val());
			var data = {'_token': '{{ csrf_token() }}','strSearch': strSearch};
		} else {
			var data = ($(window).width() > 550 ? $('#filter-form').serialize() : $("#filter-form-550").serialize());
		}
		return $.ajax({
			url: '{{ route('newpub.report.detail.bonus') }}',
			method: 'POST',
			data: data,
			success: function (data) {
				if (data.status != 200) {
					toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
				} else {
					var bonus = 0;
					var html = '';
					var stt = limit_bonus * (page - 1);

					data.data.forEach(function (element, index) {
						if(index >= (limit_bonus * (page - 1)) && index < (limit_bonus * (page - 1)) + limit_bonus) {
							stt ++;

							html += '<tr class="pointer report-row-custom' + (index % 2 == 0 ? ' table-row-light-grey' : ' table-row-dark-grey') + '">' +
							'<td>' + stt + '</td>' +
							'<td>' + element.target_month + '</td>' +
							'<td class="fw-600">' + element.bonus_from.toUpperCase() + ' </td>' +
							'<td>' + addCommas(element.amount) + ' </td>' +
							'<td>' + (element.type == 'incentive' ? 'Ap Incentive' : (element.type == 'brandbonus' ? 'Brand Bonus' : 'Etc')) + ' </td>' +
							'<td>' + element.bonus_desc + '</td>' +
							'</tr>';
						}
						bonus += parseInt(element.amount);
					});

					bonus = addCommas(bonus);

					$('.report-card-box.card-purple .com-card-value span').text( bonus + ' VNĐ');

					$(".report-bonus-area").css('display', 'block');

					if(!html.length) {
						html = `<td colspan="10" class="text-center table-row-light-grey" style="height: 70px;vertical-align: middle; color: red">Bạn chưa có tiền thưởng nào!</td>`;
					}

					$(".table-bonus-report tbody").html(html);
					$("#report-bonus-record").html(data.data.length);

					if(paginate == false) {
						$(".table-paginate-bonus").pagination({
							items: data.data.length,
							itemsOnPage: limit_bonus,
							displayedPages: 3,
							cssStyle: 'light-theme',
							onPageClick : function(pageNumber){
								showLoading();

								$.when(
									getPubBonus(false, pageNumber, true)
								).then(function(){
									hideLoading();
								});
							}
						});
					}
				}
			},
			error: function () {
				toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
			}
		});
	}

	function showLoading() {
		$('.loading').show();
	}

	function hideLoading() {
		$('.loading').hide();
	}

	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	function showConversionStatus2(status) {
		if (status == 100) {
			return '<span class="label label-warning">Chờ duyệt</span>';
		} else if (status == 200) {
			return '<span class="label" style="background: rgb(68, 187, 191);">Tạm duyệt</span>';
		} else if (status == 300 || status == 310) {
			return '<span class="label label-default">Hủy</span>';
		} else if (status == 210) {
			return '<span class="label label-success">Thành công</span>';
		} else if (status == 220) {
			return '<span class="label label-success">Đã Thanh Toán</span>';
		}
		return '<span class="label">Không xác định</span>';
	}

	function detailReportFilter(mid) {
		$("input[name=offer_id]").val(mid);
		filter_detail();
	}

	$(".report-filter-detail-submit button").click(function(event) {
		event.preventDefault();
		$("input[name=offer_id]").val('');
		reloadReport();
	});

	$(".btn-search-report").click(function(event) {
		reloadReport(true);
	});

	function refreshInfo() {
		$(".report-detail-area").css('display', 'none');
		$('.report-card-box.card-red .com-card-value span').text('N/A');
		$('.report-card-box.card-green .com-card-value span').text('N/A');
		$('.report-card-box.card-blue .com-card-value span').text('N/A');
	}

	$(".report-filter-form-submit-button-550 button").click(function(event) {
		event.preventDefault();
		$("input[name=offer_id]").val('');
		reloadReport();
	});

	function refreshSelectOption() {
		$(".report-filter-form-input-550 select").val($(".report-filter-form-input-550 select option:first").val());
		$("#filter-form select").val($("#filter-form select option:first").val());
		var start = moment().subtract(29, 'days');
		var end = moment();
		$('#reportrange-report span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		$('#reportrange-report-550 span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		$('input[name=start]').val(start.format('YYYYMMDD'));
		$('input[name=end]').val(end.format('YYYYMMDD'));
	}

	$("#num_record_overview").change(function(event) {
		limit_overview = $(this).val();
		showLoading();

		$.when(
			filter()
		).then(function(){
			hideLoading();
		});
	});

	$("#num_record_detail").change(function(event) {
		limit_detail = $(this).val();
		showLoading();

		$.when(
			getConversion(),
			getSummary()
		).then(function(){
			hideLoading();
		});
	});

	$("#num_record_bonus").change(function(event) {
		limit_bonus = $(this).val();
		showLoading();

		$.when(
			getPubBonus()
		).then(function(){
			hideLoading();
		});
	});

	function roundDecimal(number) {
		return Math.round(number * 100) / 100;
	}

	function reloadReport(searchFlag = false) {
		showLoading();

		$.when(
			filter(searchFlag),
			getSummary(searchFlag),
			getPubBonus(searchFlag)
		).then(function(){
			hideLoading();
		});
	}

	$("input[name=search_string_550], input[name=search_string]").keypress(function(event) {
		if(event.keyCode === 13) {
			event.preventDefault();
			reloadReport(true);
		}
	});
</script>
@stop
