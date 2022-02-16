@extends('newpub_layouts.main')
@section('title', ucfirst($event->title))
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<style>
	span.strong {
		width: 100px;
		font-weight: bold;
	}

	.links {
		color: deepskyblue;
	}

	input[type="radio"] {
		display: none;
	}

	input[type="radio"] + label {
		font-family: Arial, sans-serif;
		font-size: 16px;
	}

	input[type="radio"] + label span {
		box-shadow: 0 0 0 2px #827c7c;
		display: inline-block;
		width: 10px;
		height: 10px;
		margin: -1px 7px 0 0;
		vertical-align: middle;
		cursor: pointer;
		border-radius: 50%;
	}

	input[type="radio"] + label span {
		border: 2px solid #ffffff;
		/*background-color: #827c7c;*/
	}

	input[type="radio"]:checked + label span {
		background-color: red;
	}
	.event-content img{
		max-width: 100%!important;
		height: auto!important;
	}
</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<div class="row">
		<div class="col-md-8 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 style="text-align: center; white-space: unset; width: 100%;">
						{{ ucfirst($event->title) }}
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row event-content">
						{!! $event->content !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="x_panel" id="sider-bar">
				<div class="x_title">
					<h2>
						<i class="fa fa-th"></i> Sự Kiện Khác
					</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content ">


					<ul class="list-group">
						@if(isset($otherEvent))
						@foreach($otherEvent as $event)
						<li class="list-group-item"><a href="{{ route('newpub.event.show', $event->event_id) }}">{{ $event->title }}</a></li>
						@endforeach
						@endif
					</ul>
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
		$("#sider-bar").sticky({topSpacing: 20, bottomSpacing: 160});

		if(window.location.origin != 'https://devnewpub.adpia.vn:6443' && window.location.origin != 'https://newpub.adpia.vn') {
			for (var i = 0; i < $(".event-content a").length; i++) {
				if($(".event-content a").eq(i).attr('href').indexOf('https://newpub.adpia.vn/offer/') != -1) {
					var tmp = $(".event-content a").eq(i).attr('href');
					var str = tmp.replace('https://newpub.adpia.vn/offer/', 'http://pub.adpia.local/newpub/offer_list/');
					$(".event-content a").eq(i).attr('href', str);
				}
			}
		}

		$(".event-content table").wrap('<div style="overflow: auto;"></div>');
	});
</script>
@stop