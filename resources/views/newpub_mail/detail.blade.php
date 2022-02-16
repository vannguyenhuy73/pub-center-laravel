@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Email')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<style>
	.mail-list li.active a {
		color: white;
	}
	.view-mail {
		overflow-x: auto;
	}
	.view-mail img{
		max-width: 100%!important;
		height: auto!important;
	}
	.mt-5{
		margin-top:5px;
		margin-bottom:10px;
	}
	.envelope-border {
		border-image: 16 repeating-linear-gradient(-45deg, red 0, red 1em, #ddd 0, #ddd 2em,
			#58a 0, #58a 3em, #ddd 0, #ddd 4em);
		border-width: 14px;
		border-color: grey;
		padding: 10px 5px;
	}
</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="x_panel envelope-border">
				<div class="x_title">
					<h2>Hòm Thư</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-sm-12 col-xs-12 mail_view">
						<div class="inbox-body">
							<div class="mail_heading row">
								<div class="col-md-12 col-xs-12">
									<h4>{{ $mailInfo->title }}</h4>
								</div>
							</div>
							<div class="sender-info">
								<div class="row">
									<div class="col-md-12 col-xs-12 mt-5 ">
										<strong>{{ $mailInfo->senderName }}</strong>
										tới
										<strong>tôi</strong>
										<a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
									</div>
								</div>
							</div>
							<div class="view-mail">
								<iframe srcdoc="{{ $mailInfo->content }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
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
@stop