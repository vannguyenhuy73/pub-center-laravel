@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate Dashboard')
@section('newpub_style')
<style>
	:not(a) {
		min-height:0;
		min-width: 0;
	}
	.btn-redirect-newpub-ui {
		position: absolute;
		color: orangered;
		bottom: 25%;
		right: 6%;
		border: 1px solid orangered;
		font-size: 16px;
		padding: 8px;
		border-radius: 15px;
		transition: all 0.4s;
	}
	.btn-redirect-newpub-ui:hover {
		background-color: orangered;
		color: #fff;
		border: 1px solid #fff;
	}
	.slick-dots { 
		right: 50%;
		bottom: 20px;
		height: fit-content;
		width: fit-content;
		transform: translateX(50%);
	}
	.slick-dots li {
		margin: 0;
	}
	.slick-dots li button:before {
		font-size: 40px;
	}
	.slick-dotted.slick-slider {
		margin-bottom: 0;
	}
	.main-content-right {
		flex: 0 0 295px;
	}
	.chart-affiliate-filter-drop-content-item {
		padding: 5px 10px;
		text-align: center;
	}
	.chart-affiliate-filter-drop-content-item:hover {
		background: #e5e5e5;
		cursor: pointer;
	}
</style>
@stop
@section('newpub_main_content')
<div class="main-content-left">
	<div class="main-content-left-box">
		<div class="content-right-event">
			<div class="event-title">
				<span>SỰ KIỆN</span>
			</div>
			<div class="step_5_head">
				<div class="event-banner">
					<div class="owl-carousel owl-theme">
					@if(isset($v2_sliders))
					@foreach ($v2_sliders as $slider)
					<div class="event-banner-item">
						<a target="_blank" href="{{ $slider->link }}">
							<img class="owl-lazy" data-src="{{ $slider->image }}" alt="">
						</a>
					</div>
					@endforeach
					@endif
					</div>
				</div>
				<div class="newpub-guide bottom-guide step_5_detail">
					<div class="newpub-guide-box">
						<span>{{ trans('guide_newbie_detail.step_5') }}</span>
						<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
						<button class="btn btn-success btn-guide-next" data-step="6">Tiếp tục</button>
					</div>
				</div>
			</div>
		</div>
		<div class="main-statistical-number-area">
			<div class="top-sta-number-title">
				<span>THỐNG KẾ DOANH SỐ	</span>
			</div>
			<div class="top-sta-number-extension">
				<a href="#" onclick="showPopupExtension()">
					<div class="extension-box">
						<div class="extension-icon">
							<img src="images/extension_icon.png" alt="">
						</div>
						<div class="extension-name">
							Newpub Generate Link
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="main-statistical-commission-area">
			<div class="sta-commission-box">
				<div class="sta-commission-card">
					<div class="com-card-box card-pink step_1_head">
						<div class="com-card-value">
							<span>{{ $clickCount  }}</span>
						</div>
						<div class="com-card-title">
							<div class="com-card-text">
								<span>Click Phát Sinh</span><br>
								<span>Trong Tháng</span>
							</div>
							<div class="com-card-item">
								<img src="images/left-click.png" alt="">
							</div>
						</div>
						<div class="newpub-guide bottom-guide step_1_detail">
							<div class="newpub-guide-box">
								<span>{{ trans('guide_newbie_detail.step_1') }}</span>
								<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
								<button class="btn btn-success btn-guide-next" data-step="2">Tiếp tục</button>
							</div>
						</div>
					</div>
					<div class="com-card-box card-red step_2_head">
						<div class="com-card-value">
							<span>{{ $orderCount  }}</span>
						</div>
						<div class="com-card-title">
							<div class="com-card-text">
								<span>Số Chuyển Đổi</span><br>
								<span>Trong Tháng</span>
							</div>
							<div class="com-card-item">
								<img src="images/transfer.png" alt="">
							</div>
						</div>
						<div class="newpub-guide bottom-guide step_2_detail">
							<div class="newpub-guide-box">
								<span>{{ trans('guide_newbie_detail.step_2') }}</span>
								<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
								<button class="btn btn-success btn-guide-next" data-step="3">Tiếp tục</button>
							</div>
						</div>
					</div>
					<div class="com-card-box card-blue step_3_head">
						<div class="com-card-value">
							<span>{{ $monthComission }} VND</span>
						</div>
						<div class="com-card-title">
							<div class="com-card-text">
								<span>Hoa Hồng</span><br>
								<span>Tạm Duyệt</span>
							</div>
							<div class="com-card-item">
								<img src="images/money.png" alt="">
							</div>
						</div>
						<div class="newpub-guide bottom-guide step_3_detail">
							<div class="newpub-guide-box">
								<span>{{ trans('guide_newbie_detail.step_3') }}</span>
								<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
								<button class="btn btn-success btn-guide-next" data-step="4">Tiếp tục</button>
							</div>
						</div>
					</div>
					<div class="com-card-box card-green step_4_head">
						<div class="com-card-value">
							<span>{{ $payable }} VND</span>
						</div>
						<div class="com-card-title">
							<div class="com-card-text">
								<span>Số Dư</span><br>
								<span>Có Thể Rút</span>
							</div>
							<div class="com-card-item">
								<img src="images/atm.png" alt="">
							</div>
						</div>
						<div class="newpub-guide bottom-guide step_4_detail">
							<div class="newpub-guide-box">
								<span>{{ trans('guide_newbie_detail.step_4') }}</span>
								<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
								<button class="btn btn-success btn-guide-next" data-step="5">Tiếp tục</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-statistical-chart-area">
			<div class="main-statistical-chart-box">
				<div class="stat-chart-title">
					<span>BIỂU ĐỒ LƯỢNG CHUYỂN ĐỔI</span>
				</div>
				<div class="stat-chart-content step_17_head">
					<div class="chart-content-box">
						<div class="chart-content-filter">
							<div class="chart-left-filter">
								<div class="left-filter-title">
									<span>ĐỒ THỊ</span>
								</div>
							</div>
							<div class="chart-right-filter">
								<div class="chart-right-filter-box">
									<div class="right-filter-title">
										<span>TRẠNG THÁI</span>
									</div>
									<div class="right-filter-commission">
										<div class="filter-commission-show newpub-custom-drop">
											<span class="newpub-custom-drop">HOA HỒNG TẠM DUYỆT</span>
											<i class="fa fa-caret-down newpub-custom-drop" aria-hidden="true"></i>
										</div>
										<div class="filter-commissipn-drop">
											<div class="commissipn-drop-box">
												<a class="filter-com-click" onclick="getClick()">
													<div class="commissipn-drop-item">
														<span>CLICK PHÁT SINH</span>
													</div>
												</a>
											</div>
										</div>
									</div>
									<div class="right-date-commission">
										<div id="reportrange">
											<i class="fa fa-calendar"></i>&nbsp;
											<span></span> <i class="fa fa-caret-down"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="chart-content-note">
							<div class="chart-content-note-box">
								<div class="chart-note-left">
									<div class="note-left-box" style="flex-wrap: wrap;">
										<div class="chart-note-status">
											<span>Trạng thái: Đã phê duyệt + Đang chờ xử lý</span>
										</div>
										<div class="break"></div>
										<div class="chart-note-currency">
											<span>Tiền tệ: VND</span>
										</div>
										<div class="chart-note-time-zone">
											<span>Múi giờ: GMT + 7</span>
										</div>

										<div style="flex-basis: 100%; height: 0;"></div>
										<div class="chart-note-time-zone" style="margin-top: 10px; position: relative; cursor: pointer;" onclick="showChartAffiliateFilterDropContent()">
											<span class="newpub-custom-drop">Website: <span id="chart-affiliate-filter-drop">Toàn bộ</span></span>
											<i class="fa fa-caret-down newpub-custom-drop" aria-hidden="true"></i>
											<div style="position: absolute; top: 30px; left: 0; z-index: 9; display: none;" id="chart-affiliate-filter-drop-content">
												<div style="background: #ffffff; box-shadow: 0px 2px 2px 0px rgb(0 0 0 / 35%); border-radius: 4px;">
													<div class="chart-affiliate-filter-drop-content-item" onclick="chartAffiliateFilterSwitchSite('ALL')">
														Toàn bộ
													</div>
													@foreach(App\Http\Helpers\Helper::getListSite() as $site)
													@if($site->delete_flag == 'N')
														<div class="chart-affiliate-filter-drop-content-item" onclick="chartAffiliateFilterSwitchSite('{{ $site->affiliate_id }}', '{{ $site->site_name }}')">
															{{ $site->site_name }}
														</div>
													@endif
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="chart-note-right">
								</div>
							</div>
						</div>
						<div class="chart-content-chart-shape">
							<div class="chart-shape-box">
								<div id="chartdiv" style="width: 100%;height: 350px; background-color: #fff; padding: 10px;">
									<h3 class="text-center none_data_click">Đang tải...</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="newpub-guide top-guide step_17_detail">
						<div class="newpub-guide-box">
							<span>{{ trans('guide_newbie_detail.step_17') }}</span>
							<button class="btn btn-danger btn-guide-skip">Kết thúc</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-statistical-hot-new-tips">
			<div class="hot-new-tips-box">
				<marquee behavior="scroll" direction="left" scrollamount="3">
					<div class="hot-new-tips-running">
						@if (isset($noticeData))
						@foreach ($noticeData as $no)
						<a href="{{ $no->target_url }}" target="_blank">
							<div class="hot-new-tips-item">
								<div class="hot-new-tips-logo">
									<img src="{{ $no->image }}" alt="">
								</div>
								<div class="hot-new-tips-content">
									<span>{{ $no->title }}</span>
								</div>
							</div>
						</a>
						@endforeach
						@endif
					</div>
				</marquee>
			</div>
		</div>
	</div>
</div>
<div class="main-content-right">
	<div class="main-content-right-box">
		<div class="content-right-top-merchant">
			<div class="top-merchant-title">
				<span>TOP MERCHANT</span>
			</div>
			<div class="top-merchant-item step_6_head">
				@foreach ($topMerchant as $top)
				<a href="{{ route('offer_list.show',$top->merchant_id) }}">
					<div class="merchant-item-box">
						<div class="merchant-item-logo">
							<div class="item-logo-star">
								@for ($i = 0; $i <= 5; $i++)
									<img src="images/star.png" alt="">
								@endfor
							</div>
							<div class="item-logo-icon">
								<img src="{{ $top->banner_url }}" alt="">
							</div>
						</div>
						<div class="merchant-item-info">
							<div class="item-info-name">
								<span>{{ ucfirst($top->merchant_id) }}</span>
							</div>
							<div class="item-info-content">
								<span>Chiến dịch: <span class="item-info-data">{{ $top->adtype }}</span></span><br>
								<span>Hoa hồng: <span class="item-info-data">{{ $top->com_display }}</span></span>
							</div>
						</div>
					</div>
				</a>
				@endforeach
				<div class="merchant-item-view-more">
					<a href="{{ asset('newpub/offer_list') }}"><div class="view-more-box">
						<span>XEM THÊM</span>
					</div></a>
				</div>
				<div class="newpub-guide left-guide step_6_detail">
					<div class="newpub-guide-box">
						<span>{{ trans('guide_newbie_detail.step_6') }}</span>
						<button class="btn btn-danger btn-guide-skip">Bỏ qua</button>
						<button class="btn btn-success btn-guide-next" data-step="7">Tiếp tục</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
@if (isset($is_newbie_member))
@if ($is_newbie_member === TRUE)
<div class="guide-newbie-dark-layer"></div>
<div class="guide-newbie-mobile">
	<div class="guide-newbie-mobile-box">
		<div class="guide-newbie-mobile-slide">
			<div class="owl-carousel owl-theme">
				@if(isset($guide_sliders))
				@foreach($guide_sliders as $guide)
				<div class="item">
					<div class="guide-newbie-mobile-title">
						<span>{!! $guide->guide_title !!}</span>
					</div>
					<img src="{{ $guide->guide_image }}" alt="">
				</div>
				@endforeach
				@endif
			</div>
		</div>
		<div class="guide-newbie-mobile-control-button">
			<div class="guide-newbie-mobile-control-button-box">
				<div class="newbie-mobile-slide-control-btn slide-skip-btn">BỎ QUA</div>
				<div class="newbie-mobile-slide-control-btn slide-next-btn">TIẾP THEO</div>
			</div>
		</div>
	</div>
</div>
<div class="guide-help-video"></div>
<script src="{{ asset('js/guide_dashboard.js') }}"></script>
@else
@if (isset($popupBanner))
@if (strtotime((new DateTime())->format("Y-m-d")) <= strtotime((new DateTime($popupBanner->end_time))->format("Y-m-d")))
<div class="popup-event-area" id="popup-event">
	<div class="popup-event-box">
		<div>
			<a href="{{ $popupBanner->link }}" target="_blank">
				<img src="{{ $popupBanner->image }}" alt="">
			</a>
			<div class="popup-event-close-button" onclick="closePopupEvent()">
				<span><i class="fa fa-times" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
@endif
@endif
@if(isset($guide_video))
<div class="dashboard-guide-video-area guide-video-show">
	<div class="dashboard-guide-video-box">
		<div class="dashboard-guide-video-head-horizontal">
			<div class="guide-video-button-control">
				<span onclick="hideGuideVideos()">&raquo</span>
			</div>
			<div class="guide-video-title">
				<span>{{ $guide_video->guide_title }}</span>
			</div>
		</div>
		<div class="guide-video-content">
			<img src="{{ $guide_video->guide_image }}" alt="" onclick="showGuideVideoModal()">
			<img src="{{ asset('uploads/academy/play-video-icon.png') }}" alt="" onclick="showGuideVideoModal()">
		</div>
	</div>
</div>
<div class="modal-guide-video-area">
	<div class="modal-guide-video-box">
		<span class="close-modal-guide-video">&times;</span>
		<iframe width="1519" height="554" data-src="{{ $guide_video->guide_content }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-image: url('{{ $guide_video->guide_image }}');"></iframe>
	</div>
</div>
@endif
@endif
@endif
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>
	$(function() {
		$(".filter-commissipn-drop").css({
			width: $(".filter-commission-show").innerWidth(),
			top: $(".filter-commission-show").innerHeight()
		});
	});

	$(".filter-commission-show").click(function(event) {
		if($(".filter-commissipn-drop").hasClass('active'))
		{
			$(this).css('border-radius', '5px');
			$(".filter-commissipn-drop").removeClass('active');
			$(".filter-commissipn-drop").css('display', 'none');
		} else {
			hiddenAllDropdownViewer();
			$(this).css('border-radius', '5px 5px 0 0');
			$(".filter-commissipn-drop").addClass('active');
			$(".filter-commissipn-drop").css('display', 'block');
		}
	});

</script>
<script>
	$(function() {
		var start = moment().startOf('month');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
			if($(".filter-com-click").attr('onclick') == 'getClick()') {
				getRevenue(start.format('YYYYMMDD'), end.format('YYYYMMDD'));
			} else {
				getClick(start.format('YYYYMMDD'), end.format('YYYYMMDD'));
			}
		}

		$('#reportrange').daterangepicker({
			"maxSpan": {
				"days": 29
			},
			"startDate": start,
			"endDate": end,
			"maxDate": end,
			"opens": "center",
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
				'30 Ngày Trước': [moment().subtract(29, 'days'), moment()],
				'Tháng Này': [moment().startOf('month'), moment()],
				'Tháng Trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		cb(start, end);
	});
	function getClick(start_date = null, end_date = null, affiliate_id = null) {
		$("#chartdiv").html('<h3 class="text-center none_data_click">Đang tải...</h3>');
		if(!start_date && !start_date) {
			start_date = moment().startOf('month').format('YYYYMMDD');
			end_date = moment().format('YYYYMMDD');
			$('#reportrange span').html(moment().startOf('month').format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));
		}
		return $.ajax({
			url: '{{ url('newpub/chart/click/') }}',
			data: {
				"_token": $('meta[name="csrf-token"]').attr('content'),
				"start_date": start_date, 
				"end_date": end_date,
				"affiliate_id": affiliate_id
			},
			method: 'post',
			success: function (data) {
				if (data.length > 0) {
					am4core.ready(function() {

						am4core.useTheme(am4themes_material);
						am4core.useTheme(am4themes_animated);

						var chart = am4core.create("chartdiv", am4charts.XYChart);

						chart.data = data;

						var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
						categoryAxis.dataFields.category = "period";

						var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
						valueAxis.renderer.minLabelPosition = 0.01;

						var series1 = chart.series.push(new am4charts.LineSeries());
						series1.dataFields.valueY = "impresion";
						series1.dataFields.categoryX = "period";
						series1.name = "Hiển thị";
						series1.bullets.push(new am4charts.CircleBullet());
						series1.tooltipText = "{name}: [bold]{valueY}[/]";
						series1.legendSettings.valueText = "{valueY}";
						series1.tensionX = 0.8;

						var series2 = chart.series.push(new am4charts.LineSeries());
						series2.dataFields.valueY = "mobile_click";
						series2.dataFields.categoryX = "period";
						series2.name = 'Mobile Click';
						series2.bullets.push(new am4charts.CircleBullet());
						series2.tooltipText = "{name}: [bold]{valueY}[/]";
						series2.legendSettings.valueText = "{valueY}";
						series2.tensionX = 0.8;

						var series3 = chart.series.push(new am4charts.LineSeries());
						series3.dataFields.valueY = "total_click";
						series3.dataFields.categoryX = "period";
						series3.name = 'Tổng Click';
						series3.bullets.push(new am4charts.CircleBullet());
						series3.tooltipText = "{name}: [bold]{valueY}[/]";
						series3.legendSettings.valueText = "{valueY}";
						series3.tensionX = 0.8;

						var series4 = chart.series.push(new am4charts.LineSeries());
						series4.dataFields.valueY = "unique_click";
						series4.dataFields.categoryX = "period";
						series4.name = 'Click Thực';
						series4.bullets.push(new am4charts.CircleBullet());
						series4.tooltipText = "{name}: [bold]{valueY}[/]";
						series4.legendSettings.valueText = "{valueY}";
						series4.tensionX = 0.8;

						chart.cursor = new am4charts.XYCursor();

						let hs1 = series1.segments.template.states.create("hover")
						hs1.properties.strokeWidth = 5;
						series1.segments.template.strokeWidth = 2;

						let hs2 = series2.segments.template.states.create("hover")
						hs2.properties.strokeWidth = 5;
						series2.segments.template.strokeWidth = 2;

						let hs3 = series3.segments.template.states.create("hover")
						hs3.properties.strokeWidth = 5;
						series3.segments.template.strokeWidth = 2;

						let hs4 = series4.segments.template.states.create("hover")
						hs4.properties.strokeWidth = 5;
						series4.segments.template.strokeWidth = 2;

						chart.legend = new am4charts.Legend();
						chart.legend.itemContainers.template.events.on("over", function(event){
							var segments = event.target.dataItem.dataContext.segments;
							segments.each(function(segment){
								segment.isHover = true;
							});
						});

						chart.legend.itemContainers.template.events.on("out", function(event){
							var segments = event.target.dataItem.dataContext.segments;
							segments.each(function(segment){
								segment.isHover = false;
							});
						});

					});

					var index = -1;

					for(var i = 0; i < $("g").length; i++) {
						if($("g").eq(i).attr("aria-labelledby")) {
							index = i;
						}
					}

					$("g").eq(index).css('display', 'none');
				}
			}
		});
	}
	function getRevenue(start_date = null, end_date = null, affiliate_id = null) {
		$("#chartdiv").html('<h3 class="text-center none_data_click">Đang tải...</h3>');
		if(!start_date && !start_date) {
			start_date = moment().startOf('month').format('YYYYMMDD');
			end_date = moment().format('YYYYMMDD');
			$('#reportrange span').html(moment().startOf('month').format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));
		}
		return $.ajax({
			url: '{{ url('newpub/chart/revenue/') }}',
			data: {
				"_token": $('meta[name="csrf-token"]').attr('content'),
				"start_date": start_date, 
				"end_date": end_date,
				"affiliate_id": affiliate_id
			},
			method: 'post',
			success: function (data) {
				if (data.length > 0) {
					am4core.ready(function() {

						am4core.useTheme(am4themes_material);
						am4core.useTheme(am4themes_animated);

						var chart = am4core.create("chartdiv", am4charts.XYChart);

						chart.data = data;

						var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
						categoryAxis.dataFields.category = "period";

						var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
						valueAxis.renderer.minLabelPosition = 0.01;

						var series1 = chart.series.push(new am4charts.LineSeries());
						series1.dataFields.valueY = "commission";
						series1.dataFields.categoryX = "period";
						series1.name = "Hoa hồng tạm duyệt";
						var b = series1.bullets.push(new am4charts.CircleBullet());
						series1.tooltipText = "{name}: [bold]{valueY}[/]";
						series1.legendSettings.valueText = "{valueY}";
						series1.tensionX = 0.8;

						chart.cursor = new am4charts.XYCursor();

						let hs1 = series1.segments.template.states.create("hover")
						hs1.properties.strokeWidth = 5;
						series1.segments.template.strokeWidth = 2;

						chart.legend = new am4charts.Legend();
						chart.legend.itemContainers.template.events.on("over", function(event){
							var segments = event.target.dataItem.dataContext.segments;
							segments.each(function(segment){
								segment.isHover = true;
							});
						});

						chart.legend.itemContainers.template.events.on("out", function(event){
							var segments = event.target.dataItem.dataContext.segments;
							segments.each(function(segment){
								segment.isHover = false;
							});
						});

					});

					var index = -1;

					for(var i = 0; i < $("g").length; i++) {
						if($("g").eq(i).attr("aria-labelledby")) {
							index = i;
						}
					}

					$("g").eq(index).css('display', 'none');
				}
			}
		});
	}

	$(".filter-com-click").click(function(event) {
		$(".filter-commission-show").css('border-radius', '5px');
		$(".filter-commissipn-drop").removeClass('active');
		$(".filter-commissipn-drop").css('display', 'none');
		if($(this).attr('onclick') == 'getClick()') {
			$(this).attr('onclick', 'getRevenue()');
			$(this).children('.commissipn-drop-item').html('<span>HOA HỒNG TẠM DUYỆT</span>');
			$(".filter-commission-show").html('<span>CLICK PHÁT SINH</span><i class="fa fa-caret-down" aria-hidden="true"></i>');
		} else {
			$(this).attr('onclick', 'getClick()');
			$(this).children('.commissipn-drop-item').html('<span>CLICK PHÁT SINH</span>');
			$(".filter-commission-show").html('<span>HOA HỒNG TẠM DUYỆT</span><i class="fa fa-caret-down" aria-hidden="true"></i>');
		}
		$("#chart-affiliate-filter-drop").html('Toàn bộ');
	});

	$(window).click(function(event) {
		if(event.target.id == 'popup-event') {
			$("#popup-event").css('display', 'none');
			checkGuideVideoCookie();
		}
	});

	function closePopupEvent() {
		$("#popup-event").css('display', 'none');
		checkGuideVideoCookie();
	}

	$("#reportrange").click(function(event) {
		hiddenAllDropdownViewer();
	});

	$('.event-banner .owl-carousel').owlCarousel({
		loop:true,
		items:1,
		autoplay: true,
		autoplaySpeed: 3000,
		animateOut: 'fadeOut',
		lazyLoad:true,
		responsive:{
			0:{
				dots: false
			},
			550:{
				dots: true
			}
		}
	});

	function hideGuideVideos() {
		if($(".dashboard-guide-video-area").hasClass('hidden-guide')) {
			$(".dashboard-guide-video-area").css('right', '0');
			$(".dashboard-guide-video-box, .guide-video-button-control").css('transform', 'rotate(0deg)');
			$(".dashboard-guide-video-head-horizontal").css('flex-flow', 'unset');
			$(".guide-video-title").css('margin', 'auto');
			$(".dashboard-guide-video-box").css('border-radius', '10px 0 0 10px');
			$(".dashboard-guide-video-area").removeClass('hidden-guide');
			setCookie('_guide_video_dashboard', 'show', moment().add(1, 'days').startOf('day').toString());
		} else {
			$(".dashboard-guide-video-area").css('right', '-152px');
			$(".dashboard-guide-video-box, .guide-video-button-control").css('transform', 'rotate(-90deg)');
			$(".dashboard-guide-video-head-horizontal").css('flex-flow', 'row-reverse');
			$(".guide-video-title").css('margin', 'auto');
			$(".dashboard-guide-video-box").css('border-radius', '10px 10px 0 0');
			$(".dashboard-guide-video-area").addClass('hidden-guide');
			setCookie('_guide_video_dashboard', 'hide', moment().add(1, 'days').startOf('day').toString());
		}
	}

	function showGuideVideoModal() {
		$(".modal-guide-video-area").css('display', 'block');
		$(".modal-guide-video-box iframe").attr('src', $(".modal-guide-video-box iframe").attr('data-src'));
		$(".modal-guide-video-box iframe").css('height', $(".modal-guide-video-box iframe").innerWidth() * 0.6);
		hideGuideVideos();
	}

	$(".close-modal-guide-video").click(function(event) {
		$(".modal-guide-video-area").css('display', 'none');
		$(".modal-guide-video-box iframe").attr('src', '');
	});

	$(window).click(function(event) {
		if($(event.target).attr('class') == 'modal-guide-video-area' || $(event.target).attr('class') == 'modal-guide-video-box') {
			$(".modal-guide-video-area").css('display', 'none');
			$(".modal-guide-video-box iframe").attr('src', '');
		}
	});

	function checkGuideVideoCookie() {
		var modal_right = 0;
		if(getCookie('_guide_video_dashboard') == 'hide') {
			$(".dashboard-guide-video-area").css('right', '-152px');
			$(".dashboard-guide-video-box, .guide-video-button-control").css('transform', 'rotate(-90deg)');
			$(".dashboard-guide-video-head-horizontal").css('flex-flow', 'row-reverse');
			$(".guide-video-title").css('margin', 'auto');
			$(".dashboard-guide-video-box").css('border-radius', '10px 10px 0 0');
			$(".dashboard-guide-video-area").addClass('hidden-guide');
			modal_right = -152;

		}
		$(".dashboard-guide-video-area").animate({
			right: modal_right
		}, 1000);
	}

	function setCookie(cname, cvalue, expires) {
		document.cookie = cname + "=" + cvalue + ";expires=" + expires + ";path=/";
	}

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	$(".guide-newbie-mobile-slide .owl-carousel").owlCarousel({
		loop:false,
		dots:true,
		items:1,
		lazyLoad:true,
		mouseDrag: false,
		touchDrag: false,
	});

	$(function() {
		if($("#popup-event").length == 0) {
			checkGuideVideoCookie();
		}
	});

	function showChartAffiliateFilterDropContent() {
		if($("#chart-affiliate-filter-drop-content").css("display") == "none") {
			$("#chart-affiliate-filter-drop-content").css("display", "block");
		} else {
			$("#chart-affiliate-filter-drop-content").css("display", "none");
		}
	}

	function chartAffiliateFilterSwitchSite(affiliate_id, site_name = null) {
		if(affiliate_id != "ALL") {
			$("#chart-affiliate-filter-drop").html(site_name);
			if($(".filter-commission-show").text().trim() == "HOA HỒNG TẠM DUYỆT") {
				getRevenue(null, null, affiliate_id);
			} else {
				getClick(null, null, affiliate_id);
			}
		} else {
			$("#chart-affiliate-filter-drop").html('Toàn bộ');
			if($(".filter-commission-show").text().trim() == "HOA HỒNG TẠM DUYỆT") {
				getRevenue();
			} else {
				getClick();
			}
		}
	}
</script>
@stop