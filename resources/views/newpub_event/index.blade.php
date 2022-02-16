@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Event')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<style>
	.list-event{
		border-bottom: 1px solid #dddddd!important;
		margin-top: 10px;
		/*height: 158px;*/
		overflow-y: hidden;
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
						<i class="fa fa-th"></i> Chiến Dịch Mới
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
					@if(isset($events))
					@foreach($events as $event)
					<div class="col-sm-6 col-xs-12">
						<div class="row list-event">
							<div class="col-sm-4">
								<a href="{{ route('newpub.event.show', $event->event_id) }}">
									<img src="{{ $event->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $event->image }}"
									style="height: 142px;" alt="{{ $event->title }}" class="img-event">
								</a>
							</div>
							<div class="col-sm-8">
								<h2>
									<a href="{{ route('newpub.event.show', $event->event_id)  }}">{{ $event->title }}</a>
								</h2>
								<div class="description">
									{{ str_limit(strip_tags($event->summary), 120, '...') }}
								</div>

							</div>
						</div>
					</div>
					@endforeach
					@endif
					<div class="row">
						<div class="pull-right">
							{{ $events->links() }}
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
</script>
@stop