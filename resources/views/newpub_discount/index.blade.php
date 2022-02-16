@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Discount')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/simplePagination.js/1.6/simplePagination.css">
<style>
	.newpub-page-main-content-box {
		display: block;
	}
	.list-event {
		border-bottom: 1px solid #dddddd !important;
		margin-top: 15px;
		overflow-y: hidden;
	}
	.tb-coupoun tbody td {
		color: black;
		vertical-align: middle !important;
		text-align: center;
	}
	.tb-coupoun tbody td.text-left {
		text-align: left;
	}
	.tb-coupoun tbody td a {
		color: black;
	}
	.dt-buttons {
		text-align: right;
	}
	.btn-sm {
		padding: 1px 3px;
	}
	table tr th {
		text-align: center;
		height: 50px;
		line-height: 50px !important;
		background-color: rgb(25, 55, 89);
	}
	table tr th:nth-child(1) {
		width: 50px;
	}
	table tr th:nth-child(2) {
		width: 160px;
	}
	table tr th:nth-child(4) {
		width: 120px;
	}
	table tr th:nth-child(5) {
		width: 140px;
	}
	table tr th:nth-child(6) {
		width: 230px;
	}
	table .input-group {
		margin-bottom: 0;
	}
	table button {
		margin-bottom: 0 !important;
		margin-right: 0 !important;
		border-radius: 0 !important;
	}
	table input {
		color: rgb(183, 183, 183) !important;
	}
	table tr td:nth-child(2) span:nth-child(2) {
		background-color: rgb(249, 104, 62); color: #fff; padding: 5px;
		position: relative;
		text-transform: uppercase;
	}
	table tr td:nth-child(2) span:nth-child(1) {
		border-top: 13px solid transparent;
		border-bottom: 13px solid transparent;
		border-right:8px solid rgb(249, 104, 62);
		width: 0;
		height: 0;
		display: inline-block;
		transform: translateY(8px);
	}
	table tr td:nth-child(2) span:nth-child(3) {
		border-top: 13px solid transparent;
		border-bottom: 13px solid transparent;
		border-left:8px solid rgb(249, 104, 62);
		width: 0;
		height: 0;
		display: inline-block;
		transform: translateY(8px);
	}
	.export-file-button-row:hover {
		background:  olivedrab !important;
	}
</style>
@stop
@section('newpub_main_content')
<hr style="margin-top: 0; margin-left: 15px; margin-right: 15px;">
<div class="newpub-discount-code-wrap">
	<div class="newpub-discount-code-box">
		<div class="newpub-discount-code-header">
			<div class="newpub-discount-code-header-box">
				<div class="newpub-discount-code-logo">
					<div class="newpub-discount-code-logo-stamp">
						<span>Mã Giảm Giá</span>
						<div class="newpub-discount-code-logo-scissors">
							<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/affiliate_document/img/discount-scissors-icon.png" alt="">
						</div>
					</div>
				</div>
				<div class="newpub-discount-code-date-filter">
					<span>NGÀY HẾT HẠN</span>
					<div class="newpub-discount-code-date-filter-input">
						<input type="date" class="form-control center-block" value="" name="to_ed">
					</div>
				</div>
				<div class="newpub-discount-code-excel-export">
					<div class="newpub-discount-code-excel-export-button" onclick="handleShowExportFile(event)" style="position: relative;">
						<div class="excel-button-file-icon">
							<img src="{{ asset('/images/download-file-icon.png') }}" alt="" style="filter: invert(1);">
						</div>
						<div class="excel-button-file-text">
							<span>Tải xuống file</span>
						</div>
						<div class="excel-button-file-download">
							<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/affiliate_document/img/excel-file-download-icon.png" alt="">
						</div>
						<div style="position: absolute; top: 100%; left: 0; width: 100%; display: none;" class="export-file-button">
							<div style="width: 100%;">
								<div style="display: flex; background: mediumseagreen;" onclick="exportExcelFile()" class="export-file-button-row">
									<div style="width: 50px; padding: 10px;">
										<img src="https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/affiliate_document/img/excel-file-icon.png" alt="" style="width: 100%;">
									</div>
									<div style="align-self: center; color: #fff; padding: 10px;">
										<span>File Excel</span>
									</div>
								</div>
								<div style="display: flex; background: mediumseagreen;" onclick="exportXML()" class="export-file-button-row">
									<div style="width: 50px; padding: 10px;">
										<img src="{{ asset('/images/xml-file-icon.png') }}" alt="" style="width: 100%; filter: invert(1);">
									</div>
									<div style="align-self: center; color: #fff; padding: 10px;">
										<span>File XML</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="newpub-discount-code-merchant-filter">
			<div class="newpub-discount-code-merchant-filter-box">
				<div class="newpub-discount-code-merchant-select-all filter-merchant-button" data-mid="all">
					<span>CHỌN TẤT CẢ</span>
				</div>
				<div class="newpub-discount-code-merchant-box">

				</div>
			</div>
		</div>
		<div class="newpub-discount-code-data-table" data-apr-merchants="{{ $apr_merchant_str }}">
			<div class="newpub-discount-code-data-table-box">
				<div style="overflow: auto;">
					<table class="table table-hover table-bordered tb-coupoun table-striped jambo_table bulk_action" style="min-width: 1000px;">
						<thead>
							<tr>
								<th>STT</th>
								<th>NHÀ CUNG CẤP</th>
								<th>NỘI DUNG</th>
								<th>KHUYẾN MÃI</th>
								<th>NGÀY HẾT HẠN</th>
								<th>MÃ GIẢM GIÁ</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="table-paginate-overview"></div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/bundle.js') }}?{{ config('const.asset.version') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}?{{ config('const.asset.version') }}"></script>
<script src="{{ asset('js/simplePagination.js') }}?{{ config('const.asset.version') }}"></script>
<script src="{{ asset('js/jhxlsx/xlsx.core.min.js') }}?{{ config('const.asset.version') }}"></script>
<script src="{{ asset('js/jhxlsx/FileSaver.js') }}?{{ config('const.asset.version') }}"></script>
<script src="{{ asset('js/jhxlsx/jhxlsx.js') }}?{{ config('const.asset.version') }}"></script>
<script>
	var couponTotalArray = '';
	var currentArray = [];
	var c_limit = 20;
	var f_mid = null;
	var f_end_date = null;

	$(document).ready(function() {
		$('.loading').show();
		getAllDiscountCodeAPI();
	});

	function promiseShopee(f) {
		return new Promise(function(resolve, reject) {
			resolve(f);
		});
	}

	function promiseLazada(f) { 
		return new Promise(function(resolve, reject) {
			resolve(f);
		});
	}

	function promiseSendo(f) {
		return new Promise(function(resolve, reject) {
			resolve(f);
		});
	}

	function promiseTiki(f) { 
		return new Promise(function(resolve, reject) {
			resolve(f);
		});
	}

	function promiseFahasa(f) { 
		return new Promise(function(resolve, reject) {
			resolve(f);
		});
	}

	function promiseDB(f) { 
		return new Promise(function(resolve, reject) {
			setTimeout(() => {
				
				resolve(f);
			}, 2000);
		});
	}

	async function getAllDiscountCodeAPI() {
		const x1 = await promiseShopee(get_shopee_promo_code_api());
		const x2 = await promiseLazada(get_lazada_promo_code_api());
		const x3 = await promiseSendo(get_sendo_promo_code_api());
		const x4 = await promiseTiki(get_tiki_promo_code_api());
		const x5 = await promiseFahasa(get_fahasa_promo_code_api());
		const x6 = await promiseDB(dbDiscountCode());
		
		couponTotalArray = couponTotalArray.substring(0, couponTotalArray.length - 1);
		couponTotalArray = "[" + couponTotalArray + "]";
		couponTotalArray = couponTotalArray.replaceAll(",,", ",");
		couponTotalArray = couponTotalArray.replace("[,", "[");
		couponTotalArray = couponTotalArray.replace(",]", "]");
		couponTotalArray = JSON.parse(couponTotalArray);

		couponTotalArray.sort(function (a, b) {
			date1 = a.end_date.split('/');
			date2 = b.end_date.split('/');
			x = date1[2] + date1[1] + date1[0];
			y = date2[2] + date2[1] + date2[0];
			return x < y ? -1 : x > y ? 1 : 0;
		});

		getDiscountCodeByPage(1);

		$(".table-paginate-overview").pagination({
			items: couponTotalArray.length,
			itemsOnPage: c_limit,
			displayedPages: 4,
			cssStyle: 'light-theme',
			prevText: '&laquo',
			nextText: '&raquo',
			onPageClick : function(pageNumber){
				getDiscountCodeByPage(pageNumber);
			}
		});

		$('.loading').hide();
	}

	function getDiscountCodeByPage(page) {
		currentArray = [];

		for(var i = 0; i < couponTotalArray.length; i++) {
			var c_ed = '99999999';

			if(couponTotalArray[i]['end_date'] != '') {
				c_ed = moment(couponTotalArray[i]['end_date'], 'DD/MM/YYYY').format('YYYYMMDD');
			}

			if(f_mid != 'all' && f_mid != null && f_end_date != null) {
				if(couponTotalArray[i]['mid'] == f_mid && c_ed <= f_end_date) {
					currentArray.push(couponTotalArray[i]);
				}
			} else if (f_mid != 'all' && f_mid != null) {
				if(couponTotalArray[i]['mid'] == f_mid) {
					currentArray.push(couponTotalArray[i]);
				}
			} else if(f_end_date != null) {
				if(c_ed <= f_end_date) {
					currentArray.push(couponTotalArray[i]);
				}
			} else {
				currentArray.push(couponTotalArray[i]);
			}
		}

		drawDiscountCodeDataRow(page, currentArray);
	}

	function drawDiscountCodeDataRow(page, currentArray = []) {

		var row = ``;
		var realLength = 0;
		var limit = page * c_limit;
		if(limit > currentArray.length) {
			limit = currentArray.length;
		}

		for(var i = ((page - 1) * c_limit); i < limit; i++) {
			row += drawDiscountCodeRowSchema(i);
		}

		$(".tb-coupoun > tbody").html(row);
	}

	function dbDiscountCode() {
		var tmpArray = [];
		return $.ajax({
			url: 'https://event.adpia.vn/AdpiaWebFrame/getDisCount/{{ auth()->user()->last_contact_affiliate_id }}?check=1',
			type: 'GET',
		})
		.done(function(data) {
			$.each(data, function(index, value) {
				if(index != 'lazada' && index != 'shopee' && index != 'klook') {
					$.each(value, function(c_index, c_value){
						let mid = c_value['merchant_id'];
						let title = c_value['title'];
						let desc = c_value['desciprtion'];
						let discount = c_value['discount'];
						let end_date = moment(c_value['end_date']).format('DD/MM/YYYY');
						let code = c_value['discount_code'];
						let url = c_value['link'];
						tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: url});
					});
				}
			});

			

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

$(".newpub-discount-code-merchant-filter").on('click', '.filter-merchant-button', function(event) {
	$('.loading').show();
	$(".filter-merchant-button").removeClass('filter-merchant-active');
	if($(this).attr('data-mid') != 'all') {
		$(this).addClass('filter-merchant-active');
	} else {
		$(".filter-merchant-button").addClass('filter-merchant-active');
	}

	f_mid = $(this).attr('data-mid');
	var customLength = 0;

	getDiscountCodeByPage(1);

	if(f_end_date != null) {
		for(var k = 0; k < couponTotalArray.length; k++) {
			var edArr = couponTotalArray[k]['end_date'].split('/');
			var c_ed = edArr[2] + edArr[1] + edArr[0];

			if(f_mid != 'all') {
				if(c_ed <= f_end_date && couponTotalArray[k]['mid'] == f_mid) {
					customLength++;
				}
			} else {
				if(c_ed <= f_end_date) {
					customLength++;
				}
			}
		}
	} else {
		for(var k = 0; k < couponTotalArray.length; k++) {
			if(f_mid != 'all') {
				if(couponTotalArray[k]['mid'] == f_mid) {
					customLength++;
				}
			} else {
				customLength++;
			}
		}
	}

	$(".table-paginate-overview").pagination({
		items: customLength,
		itemsOnPage: c_limit,
		displayedPages: 4,
		cssStyle: 'light-theme',
		prevText: '&laquo',
		nextText: '&raquo',
		onPageClick : function(pageNumber){
			getDiscountCodeByPage(pageNumber);
		}
	});

	$('.loading').hide();
});

$("input[name=to_ed]").change(function(event) {
	$('.loading').show();

	var end_date = $(this).val();
	f_end_date = moment(end_date).format('YYYYMMDD');
	var customLength = 0;

	getDiscountCodeByPage(1);

	if(f_mid != null && f_mid != 'all') {
		for(var h = 0; h < couponTotalArray.length; h++) {
			var edArr = couponTotalArray[h]['end_date'].split('/');
			var c_ed = edArr[2] + edArr[1] + edArr[0];

			if(c_ed <= f_end_date && couponTotalArray[h]['mid'] == f_mid) {
				customLength++;
			}
		}
	} else {
		for(var h = 0; h < couponTotalArray.length; h++) {
			var edArr = couponTotalArray[h]['end_date'].split('/');
			var c_ed = edArr[2] + edArr[1] + edArr[0];

			if(c_ed <= f_end_date) {
				customLength++;
			}
		}
	}

	$(".table-paginate-overview").pagination({
		items: customLength,
		itemsOnPage: c_limit,
		displayedPages: 4,
		cssStyle: 'light-theme',
		prevText: '&laquo',
		nextText: '&raquo',
		onPageClick : function(pageNumber){
			getDiscountCodeByPage(pageNumber);
		}
	});

	$('.loading').hide();
});

function drawDiscountCodeRowSchema(i = 0) {
	var row = ``;
	var c_stt = i + 1;
	var c_title = currentArray[i]['title'];
	var c_desc = currentArray[i]['desc']
	.replace(' (...chi tiết)', '')
	.replace('ĐH tối thiểu', '. ĐH tối thiểu')
	.replace('Hiệu lực lúc', '. Hiệu lực lúc')
	.replace(' Ngày hết hạn','. Ngày hết hạn')
	.replace(' Ngành hàng', '. Ngành hàng');
	var c_end_date = currentArray[i]['end_date'];
	if(c_end_date.length == 0) {
		c_end_date = 'Vô thời hạn';
	}
	var c_discount = currentArray[i]['discount'];
	var c_code = currentArray[i]['code'] ? currentArray[i]['code'] : '';
	var c_url = 'https://click.adpia.vn/click.php?m=' + currentArray[i]['mid'] + '&a={{ auth()->user()->last_contact_affiliate_id }}&l=8888&l_cd1=3&l_cd2=0&tu=' + currentArray[i]['url'];
	var c_mid = currentArray[i]['mid'];
	var apr_merchants = $(".newpub-discount-code-data-table").attr('data-apr-merchants').split(',');

	row += `<tr>
	<td style="width: 50px; text-align: center; vertical-align: middle !important;">` + c_stt + `</td>
	<td style="width: 120px; text-align: center; vertical-align: middle !important;"><span></span><span>` + c_mid + `</span><span></span></td>
	<td class="text-left" style="vertical-align: middle !important;">
	<span style="margin-top: 2px; margin-bottom: 2px; font-weight: 600;">
	` + c_title + ($.inArray(c_mid, apr_merchants) != -1 ? ` <span class="btn btn-default btn-sm" title="Copy affiliate Link" onclick="copyShortLink('` + c_url + `')">
	<i class="fa fa-copy text-success"></i>
	</span>` : ``) + `
	</span>
	<br>
	<small>` + c_desc + `</small>
	</td>
	<td style="width: 120px; text-align:center; vertical-align: middle !important; font-weight: 600;">` + c_discount + `</td>
	<td style="width: 120px; text-align:center; vertical-align: middle !important; font-weight: 600;">` + c_end_date + `</td>
	<td style="width: 190px; text-align:center; vertical-align: middle !important; font-weight: 600;">`;

	if($.inArray(c_mid, apr_merchants) != -1) {
		if(c_code.length > 0) {
			row += `<div class="input-group">
			<input type="text" readonly
			value="` + c_code + `"
			class="form-control">
			<span class="input-group-btn">
			<button type="button" class="btn btn-dark"
			onclick="copyToClipboard('` + c_code + `')"><i
			class="fa fa-copy"></i></button>
			</span>
			<span class="input-group-btn"><button class="btn btn-info" onclick="deeplinkRedirect('` + c_url + `')"><i class="fa fa-link" aria-hidden="true"></i></button></span>
			<span style="display: none;">` + c_code + `</span>
			</div>`;
		} else {
			row += `<a href="` + c_url + `" class="btn btn-dark" target="_blank" style="color: #fff !important; width: 100%;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> MUA NGAY</a>`;
		}
	} else {
		row += `<a href="{{ asset('newpub/offer_list') }}/` + c_mid + `" class="btn btn-warning" target="_blank" style="color: #fff !important; width: 100%;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> CHƯA LIÊN KẾT</a>`;
	}

	row += `</td>
	<td style="display: none; width: 500px; vertical-align: middle !important;">` + c_url + `</td>
	</tr>`;
	return row;
}

function exportExcelFile() {
	fnExcelReport();
}

function fnExcelReport()
{
	var tab_text="<table border='2px'><tr><th>STT</th><th>Nhà cung cấp</th><th>Nội dung</th><th>Khuyến mãi</th><th>Ngày hết hạn</th><th>Mã giảm giá</th><th>Link sự kiện</th></tr>";
	var textRange; var j=0;
	tab = document.getElementsByClassName('tb-coupoun')[0];

	for(j = 0 ; j < currentArray.length ; j++)
	{
		tab_text=tab_text+drawDiscountCodeRowSchema(j);
	}

	tab_text=tab_text+"</table>";
	tab_text= tab_text.replace(/<a[^>]*>|<\/a>/g, "");
	tab_text= tab_text.replace(/<img[^>]*>/gi,"");
	tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, "");
	tab_text = tab_text.replace(/<th>/g, "<th style=\"text-align: center; height: 50px; line-height: 50px !important; background-color: rgb(25, 55, 89); color: #ffffff;\">");
	tab_text= tab_text.replace(/MUA NGAY/gi, "");

	var dt = new Date();
	var day = dt.getDate();
	var month = dt.getMonth() + 1;
	var year = dt.getFullYear();
	var hour = dt.getHours();
	var mins = dt.getMinutes();
	var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
	var a = document.createElement('a');
	var data_type = 'data:application/vnd.ms-excel';
	var table_div = document.getElementById('dvData');
	var table_html = encodeURIComponent(tab_text);
	a.href = data_type + ', ' + table_html;
	a.download = 'adpia_ma_giam_gia_' + postfix + '.xls';
	a.click();
}

function deeplinkRedirect(url) {
	window.open(url, '_blank');
}

function copyShortLink(url) {
	showLoading();
	$.ajax({
		url: '{{ route('newpub.shortlink') }}',
		method: 'POST',
		data: {_token: '{{ csrf_token() }}', url: url},
		success: function (data) {

			if (data && data.status === 200) {
				copyToClipboard(data.data);
			}
			hideLoading();
		},
		error: function (e) {
			toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
			hideLoading();
		}
	});
}
</script>
<script type="text/javascript">
	function jsonp(url, callback) {
	    var callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
	    window[callbackName] = function(data) {
	        delete window[callbackName];
	        document.body.removeChild(script);
	        callback(data);
	    };

	    var script = document.createElement('script');
	    script.src = url + (url.indexOf('?') >= 0 ? '&' : '?') + 'callback=' + callbackName;
	    document.body.appendChild(script);
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

	function get_shopee_promo_code_api() {
		var tmpArray = [];
		var url = "https://data.polyxgo.com/api/v1/datax/shopee_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "shopee";
					let title = "";
					let discount = "";
					if(ev2.coin_percentage) {
						title += 'Hoàn ' + ev2.coin_percentage + '%';
					} else if(ev2.discount_percentage) {
						title += 'Giảm ' + ev2.discount_percentage + '%';
					}

					if(!title) {
						if(ev2.coin_cap) {
							title += 'Hoàn ' + addCommas(ev2.coin_cap) + ' xu';
						} else if(ev2.discount_value) {
							title += 'Giảm ' + addCommas(ev2.discount_value / 10000) + 'đ';
						}
					}

					if(!title) {
						title = 'Voucher';
					}

					if(ev2.coin_cap) {
						discount += addCommas(ev2.coin_cap) + ' xu';
					} else if(ev2.discount_value) {
						discount += addCommas(ev2.discount_value / 10000) + 'đ';
					}

					if(!discount) {
						if(ev2.coin_percentage) {
							discount += ev2.coin_percentage + '%';
						} else if(ev2.discount_percentage) {
							discount += ev2.discount_percentage + '%';
						}
					}

					if(!discount) {
						discount = '0đ';
					}

					let desc = ev2.usage_terms;
					var date = new Date(ev2.end_time * 1000);
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.voucher_code != 'POLYXGO' ? ev2.voucher_code : '';
					let url = 'https://shopee.vn/search?promotionId='+ev2.promotionid+'&signature='+ev2.signature+'&voucherCode='+ev2.voucher_code;
					tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			if(tmpArray) {
				if($(".newpub-discount-code-merchant-box").html().indexOf('data-mid="shopee"') == -1) {
					let html = '<div class="newpub-discount-code-merchant-item filter-merchant-button filter-merchant-active" data-mid="shopee"><img src="https://img.adpia.vn/adpia/logo/shopee.png"></div>';

					$(".newpub-discount-code-merchant-box").append(html);
				}
			}

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

	function get_lazada_promo_code_api() {
		var tmpArray = [];
		var url = "https://data.polyxgo.com/api/v1/datax/lazada_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "lazada";
					let title = "Giảm "+addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : 'đ');
					let desc = "Mã giảm giá lazada "+addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : 'đ')+" đơn hàng từ "+addCommas(ev2.min_spend)+(ev2.min_spend < 1000 ? '%' : 'đ')+" đặt mua sản phẩm tại "+ev2.shop_name;
					let discount = addCommas(ev2.amount)+(ev2.amount < 1000 ? '%' : 'đ');

					var date = new Date(parseInt(ev2.end_time));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			if(tmpArray) {
				if($(".newpub-discount-code-merchant-box").html().indexOf('data-mid="lazada"') == -1) {
					let html = '<div class="newpub-discount-code-merchant-item filter-merchant-button filter-merchant-active" data-mid="lazada"><img src="https://ac.adpia.vn/upload/images/lazada.png"></div>';

					$(".newpub-discount-code-merchant-box").append(html);
				}
			}

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

	function get_sendo_promo_code_api() {
		var tmpArray = [];
		var url = "https://data.polyxgo.com/api/v1/datax/sendo_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "sendo";
					let title = ev2.voucher_type == "cashback" ? "Hoàn " : "Giảm " + addCommas(ev2.discount);
					title += ev2.type == "percent" ? "%" : "đ";
					let desc = "";
					if(ev2.voucher_type == "cashback") {
						desc += "Mã hoàn tiền sendo ";
					} else {
						desc += "Mã giảm giá sendo ";
					}
					desc += addCommas(ev2.discount) + " đơn hàng từ ";
					desc += addCommas(ev2.min_order) + (ev2.type == "percent" ? "%" : "đ");
					let discount = addCommas(ev2.discount) + (ev2.type == "percent" ? "%" : "đ");

					var date = new Date(parseInt(ev2.end_time * 1000));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			if(tmpArray) {
				if($(".newpub-discount-code-merchant-box").html().indexOf('data-mid="sendo"') == -1) {
					let html = '<div class="newpub-discount-code-merchant-item filter-merchant-button filter-merchant-active" data-mid="sendo"><img src="https://ac.adpia.vn/upload/images/sendo.png"></div>';

					$(".newpub-discount-code-merchant-box").append(html);
				}
			}

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

	function get_tiki_promo_code_api() {
		var tmpArray = [];
		var url = "https://data.polyxgo.com/api/v1/datax/tiki_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "tiki";
					let title = "Giảm " + addCommas(ev2.discount) + (ev2.discount < 1000 ? '%' : 'đ');
					let desc = ev2.description;
					let discount = addCommas(ev2.discount) + (ev2.discount < 1000 ? '%' : 'đ');

					var date = new Date(parseInt(ev2.end_time * 1000));
					let end_date = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + '/' + (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '/' + date.getFullYear();
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			if(tmpArray) {
				if($(".newpub-discount-code-merchant-box").html().indexOf('data-mid="tiki"') == -1) {
					let html = '<div class="newpub-discount-code-merchant-item filter-merchant-button filter-merchant-active" data-mid="tiki"><img src="https://ac.adpia.vn/upload/images/tiki_logo.png"></div>';

					$(".newpub-discount-code-merchant-box").append(html);
				}
			}

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

	function get_fahasa_promo_code_api() {
		var tmpArray = [];
		var url = "https://data.polyxgo.com/api/v1/datax/fahasa_vouchers";
		jsonp('https://jsonp.afeld.me/?callback=&url='+encodeURIComponent(url), function(res) {
			var data = JSON.parse(res.value);
			data.forEach(function(ev, index) {
				ev.vouchers.forEach(function(ev2, index2) {
					let mid = "fahasa";
					let title = "Giảm " + addCommas(ev2.amount) + (ev2.amount < 1000 ? '%' : 'đ');
					let desc = ev2.condition;
					let discount = addCommas(ev2.amount) + (ev2.amount < 1000 ? '%' : 'đ');

					let end_date = ev2.end_time.substring(0, 10);
					let code = ev2.code != 'POLYXGO' ? ev2.code : '';
					let url = ev2.link;
					tmpArray.push({mid: mid, title: title, desc: desc, discount: discount, end_date: end_date, code: code, url: encodeURIComponent(url)});
				});
			});

			if(tmpArray) {
				if($(".newpub-discount-code-merchant-box").html().indexOf('data-mid="fahasa"') == -1) {
					let html = '<div class="newpub-discount-code-merchant-item filter-merchant-button filter-merchant-active" data-mid="fahasa"><img src="https://ac.adpia.vn/upload/images/logo_fahasha.png"></div>';

					$(".newpub-discount-code-merchant-box").append(html);
				}
			}

			var tmp = JSON.stringify(tmpArray);
			tmp = tmp.substring(1, tmp.length - 1);
			var result = tmp + ",";
			couponTotalArray += result;
		});
	}

	function exportXML() {
		showLoading();
		$.ajax({
			url: '{{ route('newpub.discount.export_xml') }}',
			type: 'POST',
			data: {
				_token: '{{ csrf_token() }}',
				data: currentArray
			}
		})
		.done(function(res) {
			var data = new Blob([res.res], {type: 'text/xml'});

			saveAs(data, 'mgg_'+(new Date().getTime())+'.xml');

			hideLoading();
		});
	}

	function handleShowExportFile(e) {
		e.preventDefault();
		if($(".export-file-button").css('display') == "none") {
			$(".export-file-button").css('display', 'block');
		} else {
			$(".export-file-button").css('display', 'none');
		}
	}
</script>
@stop