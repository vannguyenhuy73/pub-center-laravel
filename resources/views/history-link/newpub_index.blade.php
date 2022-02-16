@extends('newpub_layouts.main')
@section('title', 'Adpia Newpub Affiliate History')
@section('newpub_style')
<style>
	.sorting, .sorting_asc, .sorting_desc {
			background : none !important;
		}
		button, input, select, textarea {
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
</style>
@stop
@section('newpub_main_content')
<div class="history-link-main-content">
	<div class="history-link-main-content-box" style="overflow: auto;">
		<table id="his_link" class="table table-striped	" style="width:100%">
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
				@if(!empty($listLink))
				@foreach($listLink as $key => $link)
				<tr>
					<td>{{$key+1}}</td>
					<td class="root">
						<input style="min-width: 254px;" type="text" readonly id="root{{$key+1}}"
						class="form-control"
						value="{{$link->link_click}}">
						<span class="btn btn-copy btn-default" data-clipboard-action="copy"
						data-clipboard-target="#root{{$key+1}}">
						<i class="fa fa-clipboard" aria-hidden="true"></i>
					</span>
				</td>
				<td class="sort">
					<input type="text" style="min-width: 244px;" readonly id="sort{{$key+1}}"
					class="form-control"
					value="{{$link->short_link}}">
					<span class="btn btn-copy btn-default " data-clipboard-action="copy"
					data-clipboard-target="#sort{{$key+1}}">
					<i class="fa fa-clipboard" aria-hidden="true"></i>
				</span>
			</td>
			<td><a target="_blank" href="{{$link->root_link}}">{{ str_limit
				($link->root_link,
					60)
				}}</a></td>
				<td>{{date("d-m-Y", strtotime($link->created_at))}}</td>
			</tr>
			@endforeach
			@else
			<p>(Không có link nào.)</p>
			@endif
		</tbody>
	</table>
</div>
</div>
@stop
@section('newpub_script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#his_link').DataTable({
			"columns": [
			{ "data": "0" },
			{ "data": "root_link" },
			{ "data": "link_click" },
			{ "data": "short_link" },
			{ "data": "date" },
			],

			"oLanguage": {
				"sLengthMenu": "Show _MENU_",
			}
		});
		var clipboard = new ClipboardJS('.btn-copy');

		clipboard.on('success', function (e) {
			toastr.success('Sao chép thành công!');
		});

		clipboard.on('error', function (e) {
			toastr.error('Error Copy'+ e);

		});
	});
</script>
@stop
