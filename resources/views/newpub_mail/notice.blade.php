@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Email')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/simplePagination.js/1.6/simplePagination.css">
<style>
	.mail-list li.active a {
		color: white;
	}

</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<style>
		.border__top{
			position:relative;
			width: 100%;
		}
		.border__top:before{
			position:absolute;
			width: 100%;
			content: '';
			border-bottom: 2px solid #E6E9ED;
			/*top: 82px;*/
			left: 0;
		}
		.pt__20{
			padding-top: 20px !important;
			padding-bottom: 10px;
		}
		.pt__20 {
			font-size:14px;
			font-weight: 600;
		}
		.pt__20 p{margin: 0 !important; padding-left: 20px;}
		.paginate, .notice__links{
			display:flex;
			flex-wrap: wrap;
			margin: auto;
			padding-top: 10px;
			width: fit-content;
		}
		.paginate li, .notice__links li {
			list-style:none;
			margin-top: 5px;
		}
		.paginate li a, .notice__links li a {font-size:16px; font-weight:600; cursor:pointer}
		.x_panel{border-radius:30px; }
		.x_title{border:none !important;}
		.none__page{display: none}
		.active__page{display: block!important}
		.isDisabled {
			color: currentColor;
			cursor: not-allowed;
			opacity: 0.5;
			text-decoration: none;
			pointer-events: none;
		}
		@media (max-width: 768px) {
			.paginate, .notice__links{
				width: 100% !important;
			}
		}
		.loading, .loading:before{
			background: none !important;
			position:absolute !important;
		}
	</style>
	<div class="row" style="margin-top: 30px;">
		<div class="col-md-6 col-xs-12 ">
			<div class="loadings">
				<div class="loading"></div>
			</div>
			<div class="x_panel">
				<div class="x_title">
					<p style="font-weight: 600;">Thông báo</p>
				</div>
				<div class="x_content">
					<table class="notice__table" style="width: 100%;"></table>
					<div class="col-sm-12 col-xs-12 ">
						<ul class = "notice__links"></ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="loading__mail">
				<div class="loading"></div>
			</div>
			<div class="x_panel">
				<div class="x_title">
					<p style="font-weight: 600;">Hộp Thư</p>
				</div>
				<div class="x_content">
					<table class="mail__table" style="width: 100%;"></table>
					<div class="col-sm-12 col-xs-12 ">
						<ul class = "paginate"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('js/simplePagination.js') }}?{{ config('const.asset.version') }}"></script>
<script>
	$(document).ready(function (){
		getDataPage()
		clickPage()
	});

	var mailList = [];

	function getDataPage(page = 1) {

			var limit = {{ config('const.notify.limit') }};

			$.ajax({
				url: '{{ route('newpub.mail-ajax') }}',
				success: function(data) {
					$('.loading__mail').hide();

					mailList = data['mail']['data'];

					showMailByPage(page, limit);
					
					$('.paginate').pagination({
						items: data['mail']['data'].length,
						itemsOnPage: limit,
						displayedPages: 4,
						cssStyle: 'light-theme',
						prevText: '&laquo',
						nextText: '&raquo',
						onPageClick : function(pageNumber){
							showMailByPage(pageNumber, limit);
						}
					});
				}
			});
		}

		function clickPage(pages)
		{
			$('.click__page').one("click",function() {
				prPage = $(this).attr('data');
				getDataPage(prPage);
				$('.loading__mail').show();
			});
		}

		// Notice

		$(document).ready( () => {
			getDataNotice();
			clickPageNotice();
		})

		var noticeList = [];

		function getDataNotice(page = 1) {

			var limit = {{ config('const.notify.limit') }};

			$.ajax({
				url: '{{ route('newpub.notice-ajax') }}',
				success: function(data) {
					$('.loadings').hide();

					noticeList = data['data']['data'];

					showNoticeByPage(page, limit);

					$('.notice__links').pagination({
						items: data['data']['data'].length,
						itemsOnPage: limit,
						displayedPages: 4,
						cssStyle: 'light-theme',
						prevText: '&laquo',
						nextText: '&raquo',
						onPageClick : function(pageNumber){
							showNoticeByPage(pageNumber, limit);
						}
					});
				}
			});
		}

		function clickPageNotice(pages)
		{
			$('.click__pagen').one("click",function() {
				prPage = $(this).attr('data');
				getDataNotice(prPage);
				$('.loadings').show();
			});
		}

		function showNoticeByPage(page, limit) {
			var dataTables = '';
			var offset = (page - 1) * limit;
			var length = limit + offset;

			if(length > noticeList.length) {
				length = noticeList.length;
			}

			for(var i = offset; i < length; i++) {
				d = noticeList[i]['date_display'];
				dataTables += '<tr class="border__top">' +
				'<td style="width: 15%;" class="pt__20">' +
				'<img style = "width:100%; height:46px; object-fit:cover" src= ' +
				''+noticeList[i]['image']+' >'+
				'</td>' +
				'<td  class="pt__20">' +
				'<p><a href="'+noticeList[i]['link']+'" target="_blank">'+noticeList[i
				]['title'].slice(0,36)+' ...</a></p>' +
				'<p style="font-weight: 100;line-height: 2;">'+noticeList[i]['writer']+'</p>' +
				'</td>' +
				'<td class="text-center pt__20">'+d+'</td>' +
				'</tr>';
			}

			$('.notice__table').html(dataTables);
		}

		function showMailByPage(page, limit) {

			var dataTable = '';
			var offset = (page - 1) * limit;
			var length = limit + offset;

			if(length > mailList.length) {
				length = mailList.length;
			}

			for(var i = offset; i < length; i++) {

				var d = mailList[i]['date_display'];
				var readed = '<i class="fa fa-envelope" aria-hidden="true"></i>';

				dataTable += '<tr class="border__top">' +
				'<td style="width: 10%;" class="pt__20">' +
				readed +
				'</td>' +
				'<td  class="pt__20">' +
				'<p><a href="mail/view/'+mailList[i]['id'] + '">'+mailList[i]['title'].slice(0,39)+' ...</a></p>' +
				'<p style="font-weight: 100;line-height: 2;">'+mailList[i]['sender_name']+'</p>' +
				'</td>' +
				'<td class="text-center pt__20">'+d+'</td>' +
				'</tr>';

			}

			$('.mail__table').html(dataTable);
		} 
	</script>
	@stop