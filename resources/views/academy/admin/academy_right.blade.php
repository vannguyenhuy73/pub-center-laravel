@extends('newpub_layouts.main')
@section('title','Academy Right')
@section('newpub_style')
<style>
	.right_col {
		margin: 0 10px;
		width: 100%;
	}
</style>
@endsection
@section('newpub_main_content')
<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						<i class="fa fa-graduation-cap"></i>
						ACADEMY RIGHT
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH QUYỀN LỢI CỦA ACADEMY</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th style="width: 30%;">QUYỀN LỢI</th>
								@if(isset($ranks))
								@foreach($ranks as $rank)
								<th style="width: calc(70%/6); text-align: center;">{{ $rank->name }}</th>
								@endforeach
								@endif
							</tr>
						</thead>
						<tbody>
							@if(isset($rights))
							@foreach($rights as $key => $right)
							<tr>
								<td>{{ $right->name }}</td>
								@if(isset($rules))
								@foreach($rules as $rule)
								@if($rule->right_name == $right->name)
								@if($rule->values == 'TRUE')
								<td><input type="checkbox" class="form-control" data-right="{{ $rule->id_right_rank }}" data-rank="{{ $rule->id_name_rank }}" checked=""></td>
								@else
								<td><input type="checkbox" class="form-control" data-right="{{ $rule->id_right_rank }}" data-rank="{{ $rule->id_name_rank }}"></td>
								@endif
								@endif
								@endforeach
								@endif
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('newpub_script')
<script>
	$("input[type=checkbox]").change(function() {
		var rankId = $(this).attr("data-rank");
		var rightId = $(this).attr("data-right");
		var _token = $("meta[name=csrf-token]").attr("content");
		if($(this).is(":checked")) {
			$.ajax({
				url: 'right-change-value',
				type: 'POST',
				data: {_token: _token, rank_id: rankId, right_id: rightId, value: "TRUE"},
			})
			.done(function(data) {
				console.log("success");
				alert(JSON.parse(data));
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		} else {
			$.ajax({
				url: 'right-change-value',
				type: 'POST',
				data: {_token: _token, rank_id: rankId, right_id: rightId, value: "FALSE"},
			})
			.done(function(data) {
				console.log("success");
				alert(JSON.parse(data));
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
</script>
@endsection