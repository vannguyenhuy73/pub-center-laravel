	@extends('newpub_layouts.main')
	@section('title', 'Adpia Newpub Affiliate Billing')
	@section('newpub_style')
	<style>
		.collapsible {
			cursor: pointer;
			width: 100%;
			border: none;
			outline: none;
		}

		.active, .collapsible:hover {
			-webkit-box-shadow: 0px 2px 10px 0px rgba(0, 0, 0,0.35);
			-moz-box-shadow: 0px 2px 10px 0px rgba(0, 0, 0,0.35);
			box-shadow: 0px 2px 10px 0px rgba(0, 0, 0,0.35);
		}

		.content {
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
		}
		.mail-list li.active a {
			color: white;
		}

		.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
			padding: 8px;
			line-height: 1.42857143;
			vertical-align: middle;
			border-top: 1px solid #ddd;
		}

		.table thead th, td {
			text-align: center;
		}
		tr:last-child td {
			text-align: left;
		}

		.calendar.left {
			float: left !important;
		}
		.table-responsive .table {
	    	max-width: none;
		}
		.history-withdraw-money-box {
			background: transparent;
		}
		.history-withdraw-money-box table {
			background: #ffffff;
		}
		
		.load-more-result-button-area div {
			background: #0000ff;
			color: #ffffff;
			text-align: center;
			padding: 5px 30px;;
			border-radius: 5px;
			width: fit-content;
			margin: auto;
		}
		.load-more-result-button-area div:hover {
			cursor: pointer;
			background: rgba(0, 0, 255, 0.8);
		}

		@media (max-width: 550px) {
			.hidden-column-mobile {
				display: none;
			}
		}
	</style>
	@stop
	@section('newpub_main_content')
	<div class="billing-main-content">
		<div class="billing-main-content-box">
			<div class="withdraw-money-area">
				<div class="withdraw-money-area-box">
					<div class="withdraw-money-request">
						<div class="withdraw-money-request-box">
							<div class="request-commisson-number">
								@if($errors->any())
								@foreach($errors->all() as $error)
								@php
								echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>';
								echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>';
								echo "<script type='text/javascript'> toastr.error('".$error."') </script>";
								@endphp
								@endforeach
								@endif
								<span>S??? d?? c?? th??? r??t</span><br>
								<span class="num-commisson-text">{{ $payable }} VND</span>
							</div>
							<div class="request-commission-button">
								<button class="btn btn-info btn-payment-request" style="position: relative; outline: none;" {{ (!$acceptRequest || $requested) ? 'disabled' : '' }}><span>Y??U C???U R??T TI???N</span>
									<div class="input-set-money-payment">
										<div class="input-set-money-payment-box">
											<form action="{{ route('newpub.billing.request.handle') }}" method="post" role="form" id="payment-final-form">
												@csrf
												<span style="white-space: break-spaces;">S??? ti???n thanh to??n t???i thi???u l??</span>
												<span>200.000 VND</span><br>
												<input type="number" class="form-control" style="width: 80%; display: inline-block;" name="amount" id="amount"
												max="{{ str_replace(',', '', $payable) }}" min="200000" value="0" >
												<span style="color: rgb(27, 219, 208);"> VN??</span><br>
												<input type="submit" id="submit-payment-final-form" class="btn btn-success" value="R??T TI???N" style="margin-top: 10px;">
											</form>
										</div>
									</div>
								</button>
							</div>
							<div class="break"></div>
							<div style="height: 60px; width: 100%;">
								<div class="noiti-has-withdraw-money">
									@if($requested)
									<span>B???n ???? y??u c???u r??t {{ $requested->amount }} VND</span>
									@else
									<span>S??? ti???n b???n c?? th??? r??t kh??ng v?????t qu?? s??? d?? hi???n t???i</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="withdraw-money-user-info">
						<div class="withdraw-money-user-info-box">
							@if (auth()->user()->bill_ready_request != config('const.billing.bill_ready_request.yes') || auth()->user()->bill_ready_flag != config('const.billing.bill_ready_flag.yes'))
							<span style="font-style: italic;">Vui l??ng cung c???p ?????y ????? th??ng tin d?????i ????y tr?????c khi b???n <span style="color: #f00; font-weight: 600;">R??T HOA H???NG</span></span>
							@else
							<span style="font-style: italic;">B???n ???? ho??n th??nh gi???y t??? v?? c?? th??? <span style="color: #f00; font-weight: 600;">R??T HOA H???NG</span> ???????c ngay b??y gi???</span>
							@endif
							<div class="collapsible user-info-id-card" style="margin-top: 30px; {{ auth()->user()->bill_ready_request == config('const.billing.bill_ready_request.yes') ? 'pointer-events: none;' : '' }}">
								<div style="flex: 0 0 34px;"><span style="font-family: auto; font-size: 26px;">1</span></div>
								<div style="flex: 0 0 30px; margin: 25px;"><img src="{{ asset('images/id_card_logo.png') }}" alt="" style="width: 100%;"></div>
								<div style="flex: auto; text-align: left; margin-left: 25px;"><span>CMT c?? nh??n</span></div>
								<div style="flex: 0 0 30px;"><button class="btn btn-submit-id-card" style="background-color: rgb(241,241,241); border-radius: 20px; width: 120px; outline: none;">{{ auth()->user()->bill_ready_request == config('const.billing.bill_ready_request.yes') ? 'HO??N TH??NH' : 'S???A' }}</button></div>
							</div>
							<div class="content">
								<div class="upload-id-card-box" style="background-color: rgb(217, 217, 217); display: flex; padding: 10px; border-radius: 10px;">
									<div style="width: 35%; text-align: left; align-self: center;">
										<span>A) Ch???ng Minh Th??</span><br class="break-line-a-b">
										<span>B) C??n C?????c C??ng D??n</span>
									</div>
									<div style="width: 65%;">
										<button class="btn btn-upload-id-card-front" style="width: calc(50% - 2px); background-color: #ffffff; border-radius: 10px;">
											<div style="display: flex;">
												<div style="flex: auto;">
													<span><span style="font-size: 10px;">UPLOAD</span><br><span style="font-weight: 600; font-size: 12px;">M???T TR?????C</span></span>
												</div>
												<div style="font-size: 28px;">
													<i class="fa fa-camera-retro" aria-hidden="true"></i>
												</div>
											</div>
										</button>
										<button class="btn btn-upload-id-card-back" style="width: calc(50% - 2px); background-color: #ffffff; border-radius: 10px;">
											<div style="display: flex;">
												<div style="flex: auto;">
													<span><span style="font-size: 10px;">UPLOAD</span><br><span style="font-weight: 600; font-size: 12px;">M???T SAU</span></span>
												</div>
												<div style="font-size: 28px;">
													<i class="fa fa-camera-retro" aria-hidden="true"></i>
												</div>
											</div>
										</button>
										<form action="{{ route('newpub.user.updateidentity') }}" method="post" role="form"
										enctype="multipart/form-data" id="upload-id-card-form">
										@csrf
										<input type="file" name="front-card" required accept="image/*" style="display: none;">
										<input type="file" name="post-card" required accept="image/*" style="display: none;">
									</form>
								</div>
							</div>
						</div>
						<div class="user-info-CTV">
							<div style="flex: 0 0 34px;"><span style="font-family: auto; font-size: 26px;">2</span></div>
							<div style="flex: 0 0 30px; margin: 25px;"><img src="{{ asset('images/contract_logo.png') }}" alt="" style="width: 100%;"></div>
							<div style="flex: auto; text-align: left; margin-left: 25px;"><span>H???p ?????ng CTV</span></div>
							<div style="flex: 0 0 30px;"><a href="https://adpia.vn/info/HDCTV.doc" class="btn" style="background-color: rgb(241,241,241); border-radius: 20px; width: 120px;">DOWNLOAD</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="info-pay-commission">
			<div class="info-pay-commission-box">
				<div class="info-pay-com-video">
					<div class="info-pay-com-video-box">
						<div class="pay-com-video-title">
							<span>VIDEO H?????NG D???N</span>
						</div>
						<div class="pay-com-video-content">
							<div class="pay-com-video-img">
								<a href="https://youtu.be/nU_tKKsS4DY" target="_blank"><img src="http://i3.ytimg.com/vi/nU_tKKsS4DY/maxresdefault.jpg" alt=""></a>
							</div>
							<div class="pay-com-video-name">
								<div class="pay-com-video-tag">
									<a href="https://www.youtube.com/channel/UCqmtJ0l3dWwPavkN5b8Ov2g/videos" target="_blank">#ADPIA ACADEMY</a>
									<a href="https://www.youtube.com/channel/UCqmtJ0l3dWwPavkN5b8Ov2g/videos" target="_blank">#R??T TI???N</a>
								</div>
								<a href="https://youtu.be/nU_tKKsS4DY" target="_blank"><div class="pay-com-video-name-text">
									<span>[ADPIA ACADEMY] H?????NG D???N R??T TI???N AFFILIATE MARKETING T??? ADPIA NETWORK</span>
								</div></a>
							</div>
						</div>
					</div>
				</div>
				<div class="info-pay-com-rule">
					<div class="info-pay-com-rule-box">
						<div class="pay-com-rule-time">
							<span>TH???I GIAN HO???CH ?????NH C???P HOA H???NG</span>
							<div class="pay-com-rule-time-content">
								<span>Ng??y 22 h??ng th??ng (k???t qu??? th??ng tr?????c)</span><br>
								<span>Th???i gian y??u c???u: T??? ng??y 10-12 v?? 25-27 h??ng th??ng</span><br>
								<span>Th???i gian c???p: Sau 3 ng??y l??m vi???c k??? t??? ng??y k???t th??c y??u c???u</span><br>
								<span style="margin-top: 5px;">H???t h???n y??u c???u hoa h???ng. <span style="color: #ff0000;ss">( Th???i gian 10-12 v?? 25-27 h??ng th??ng )</span></span>
							</div>
						</div>
						<div class="pay-com-rule-international">
							<span>TR?????NG H???P CHUY???N TI???N ??? C??C NG??N H??NG N?????C NGO??I</span>
							<div class="pay-com-rule-time-content">
								<span>C?? th??? ????ng k?? qua g???i ??i???n tho???i, v?? s??? ???????c c???p m???t s??? ti???n ???? tr??? chi ph?? chuy???n t??? s??? ti???n g???c l??? ra ???????c nh???n</span><br>
								<span>?????a ch??? g???i [ Email: <a href="mailto:affiliate@adpia.vn" style="color: #ff0000 !important;">affiliate@adpia.vn</a> ]</span><br>
								<span>?????a ch???: C??ng ty ADPIA T???ng 30 t??a nh?? Handico Ph???m H??ng, Nam T??? Li??m, H?? N???i</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="break"></div>

		<div class="history-withdraw-money">
			<div class="history-withdraw-money-box">
				<div style="font-size: 16px; padding-bottom: 10px; font-weight: 600; color: midnightblue;">HOA H???NG T??? NH?? CUNG C???P</div>
				<div class="report-filter-quick-input" style="padding-bottom: 10px;">
					<input type="text" class="form-control" placeholder="T??n nh?? cung c???p" name="search_merchant" style="background-color: #ffffff; width: 250px; max-width: 100%;">
					<button class="btn btn-search-report btn-search-merchant-billing">T??M KI???M</button>
				</div>
				<table class="table table-striped jambo_table bulk_action" id="net_result">
					<thead>
						<tr class="headings">
							<th class="column-title">#</th>
							<th class="column-title">TH??NG ?????I SO??T</th>
							<th class="column-title">NH?? CUNG C???P</th>
							<th class="column-title">S??? TI???N</th>
							<th class="column-title">NG??Y ?????I SO??T</th>
						</tr>
					</thead>

					<tbody class="data-content">
						@foreach($report_net as $index => $net)
						<tr>
							<td style="text-align: center;">{{ ($index + 1) }}</td>
							<td style="text-align: center;">{{ date('m/Y', strtotime($net->ymd)) }}</td>
							<td style="text-align: center;">{{ $net->merchant_id }}</td>
							<td style="text-align: center;">{{ number_format($net->commission_net) }} VN??</td>
							<td style="text-align: center;">{{ date('d/m/Y', strtotime($net->yyyymmdd)) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@if(count($report_net) == 10)
			<div class="load-more-result-button-area" style="margin: 0 10px;">
				<div onclick="loadMoreNetResult(2)">Xem Th??m K???t Qu???</div>
			</div>
			@endif
		</div>

		<div class="history-withdraw-money">
			<div class="history-withdraw-money-box">
				<div style="font-size: 16px; padding-bottom: 10px; font-weight: 600; color: midnightblue;">L???CH S??? THANH TO??N</div>
				<table class="table table-striped jambo_table bulk_action" id="listbillding">
					<thead>
						<tr class="headings">
							<th class="column-title">#</th>
							<th class="column-title">Y??U C???U NG??Y</th>
							<th class="column-title">TR???NG TH??I</th>
							<th class="column-title">S??? TI???N</th>
							<th class="column-title">NG??Y THANH TO??N</th>
						</th>
					</tr>
				</thead>

				<tbody class="data-content">
					@foreach($paids as $index => $paid)
					<tr>
						<td>{{ ($index + 1) }}</td>
						<td>{{ date('d/m/Y', strtotime($paid->create_time_stamp)) }}</td>
						<td class="hidden-column-mobile">
							@if($paid->done_flag == 'Y')
							<span class="label label-success">???? Thanh To??n</span>
							@else
							<span class="label label-warning">??ang Thanh To??n</span>
							@endif
						</td>
						<td>{{ number_format($paid->amount) }} VN??</td>
						<td>{{ $paid->pay_date != null ? date('d/m/Y', strtotime($paid->pay_date)) : '' }}</td>
					</tr>
					@endforeach
					@php
					$total = 0;
					for($i = 0; $i < count($paids); $i++)
					{
						$total += $paids[$i]['amount'];
					}
					@endphp
					<tr>
						<td colspan="3">{{ __('T???ng') }}</td>
						<td colspan="2">{{ number_format($total) }} VN??</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
	@if (date('Ymd') <= 20210228)
	<!-- The Modal -->
	<div id="exModal-offer" class="ex-modal">
		<div class="ex-modal-content">
			<div class="ex-modal-header">
				<span class="ex-close" onclick="closeExPopup()">&times;</span>
				<h4>TH??NG B??O V??? THANH TO??N HOA H???NG C???A ADPIA</h4>
			</div>
			<div class="ex-modal-body" style="max-height: 400px; overflow: auto;">
				<div>
					<strong><p><i class="fa fa-bullhorn" aria-hidden="true"></i> L??u ??</p></strong>
					<p><i class="fa fa-star" aria-hidden="true"></i> L???ch thanh to??n ?????t 2 th??ng 02 s??? r??i v??o ng??y 23 - 25.</p>
					<p><i class="fa fa-star" aria-hidden="true"></i> L???ch thanh to??n c???a c??c th??ng sau s??? di???n ra b??nh th?????ng.</p>
					<strong><p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Ch??c c??c Publisher tr??n ?????y hoa h???ng!</p></strong>
				</div>
			</div>
		</div>
	</div>
	@endif
	@stop
	@section('newpub_script')
	<script>
		$(function() {
			$(".input-set-money-payment").css({'top': $(".request-commission-button").height() - 5, 'width' : $(".request-commission-button").width()});
			$("#exModal-offer").css('display', 'block');
		});

		$(document).click(function (e) {
			if ($(e.target).is('#exModal-offer')) {
				$("#exModal-offer").css('display', 'none');
			}
		});

		function closeExPopup() {
			$("#exModal-offer").css('display', 'none');
		}
	</script>
	<script>
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.maxHeight){
					content.style.maxHeight = null;
				} else {
					content.style.maxHeight = content.scrollHeight + "px";
				} 
			});
		}

		$(".btn-upload-id-card-front").click(function(event) {
			$("input[name=front-card]").click();
		});
		$("input[name=front-card]").change(function(event) {
			$(".btn-upload-id-card-front").css('background-color', 'springgreen');
			if($(".btn-upload-id-card-back").css('background-color') == 'springgreen' || $(".btn-upload-id-card-back").css('background-color') == 'rgb(0, 255, 127)') {
				$(".btn-submit-id-card").html('HO??N TH??NH');
				$(".btn-submit-id-card").css({
					'background-color': 'rgb(34, 207, 128)',
					'color': '#ffffff'
				});
				$(".btn-submit-id-card").addClass('ready_submit')
			}
		});
		$(".btn-upload-id-card-back").click(function(event) {
			$("input[name=post-card]").click();
		});
		$("input[name=post-card]").change(function(event) {
			$(".btn-upload-id-card-back").css('background-color', 'springgreen');
			if($(".btn-upload-id-card-front").css('background-color') == 'springgreen' || $(".btn-upload-id-card-front").css('background-color') == 'rgb(0, 255, 127)') {
				$(".btn-submit-id-card").html('HO??N TH??NH');
				$(".btn-submit-id-card").css({
					'background-color': 'rgb(34, 207, 128)',
					'color': '#ffffff'
				});
				$(".btn-submit-id-card").addClass('ready_submit')
			}
		});

		$(".btn-submit-id-card").click(function(event) {
			if($(this).hasClass('ready_submit')) {
				$("#upload-id-card-form").submit();
			}
		});


		$("#submit-payment-final-form").click(function(event) {
			$("#payment-final-form").submit();
		});

		$(".btn-payment-request").click(function(event) {
			if($(event.target).hasClass('btn-payment-request') || $(event.target).html() == 'Y??U C???U R??T TI???N') {
				if($(".input-set-money-payment").css('display') == 'none') {
					$(".input-set-money-payment").css('display', 'block');
				} else {
					$(".input-set-money-payment").css('display', 'none');
				}
			}
		});
		
		function loadMoreNetResult(page, strMerchant = '', load = false) {
			$(".load-more-result-button-area div").html('??ang T???i D??? Li???u...');
			if(load) {
				$(".loading").show();
			}
			$.ajax({
				url: '{{ route("newpub.billing.report_net_by_page") }}',
				type: 'GET',
				data: {
					page: page,
					strMerchant: strMerchant
				}
			})
			.done(function(data) {
				if(data) {
					var html = '';
					var stt = (page - 1) * 10 + 1;
					
					data.map(function(val, index) {
						html += `
							<tr>
								<td style="text-align: center;">`+stt+`</td>
								<td style="text-align: center;">`+val.ymd.substr(4, 2)+`/`+val.ymd.substr(0, 4)+`</td>
								<td style="text-align: center;">`+val.merchant_id+`</td>
								<td style="text-align: center;">`+addCommas(Math.round(val.commission_net))+` VN??</td>
								<td style="text-align: center;">`+val.yyyymmdd.substr(6, 2)+`/`+val.yyyymmdd.substr(4, 2)+`/`+val.yyyymmdd.substr(0, 4)+`</td>
							</tr>
						`;
						stt++;
					});
					
					$(".load-more-result-button-area div").html('Xem Th??m K???t Qu???');
					
					if(data.length == 10) {
						$(".load-more-result-button-area div").css('display', 'block');
						$(".load-more-result-button-area div").attr('onclick', 'loadMoreNetResult('+(page + 1)+', "'+strMerchant+'")');
					} else {
						$(".load-more-result-button-area div").css('display', 'none');
					}
					
					$("#net_result tbody").append(html);
					
					$(".loading").hide();
				}
			});
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
		
		$(".btn-search-merchant-billing").click(function() {
			var searchString = $("input[name=search_merchant]").val();
			searchString = searchString.toLowerCase();
			$("#net_result tbody").html('');
			loadMoreNetResult(1, searchString, true);
		});
	</script>
	@stop