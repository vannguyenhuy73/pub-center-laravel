@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Deeplink')
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
	iframe {
		max-width: 100%;
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
						<i class="fa fa-plug"></i> WORDPRESS DEEPLINK PLUGIN
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
					<h3> Download plugin</h3>
					<div class="row text-center" style="margin-bottom: 20px;">
						<a  href="{{ asset('files/adpia_deeplink.zip') }}" class="btn btn-round btn-success" style="color: #ffffff !important;">DOWNLOAD</a>
					</div>
					<h3>Hướng dẫn cài đặt</h3>
					<div class="col-12 ">
						<ul>
							<li>Đây là video hướng dẫn chi tiết cách cài đặt các bạn tham khảo nhé.</li>
						</ul>
						<div class="text-center" style="margin-top: 20px;">
							<iframe width="853" height="480" src="https://www.youtube.com/embed/mFnDsoC4SlQ" frameborder="0"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen>
						</iframe>
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