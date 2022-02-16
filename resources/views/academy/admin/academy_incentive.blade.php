@extends('newpub_layouts.main')
@section('title','Academy Q & A')
@section('newpub_style')
<style>
	.right_col {
		margin: 0 10px;
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
						ACADEMY Q & A
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH Q & A CỦA ACADEMY</h4>
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertIncentive") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th>STT</th>
								<th>BANNER</th>
								<th>TÊN ƯU ĐÃI</th>
								<th>LINK ĐÍCH</th>
								<th>RANK</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(isset($data))
							@foreach($data as $key => $inc)
							<tr>
								<td>{{ ($key + 1) }}</td>
								<td><img src="/uploads/academy/{{ $inc->incentive_banner }}" alt="" style="width: 60px;"></td>
								<td>{{ $inc->incentive_name }}</td>
								<td>{{ $inc->incentive_link }}</td>
								<td>{{ $inc->rank_name }}</td>
								<td>
									<button class="btn btn-warning" onclick="showFormEdit({{ $inc->id }}, '{{ route('academy.admin.updateIncentive') }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
									<button class="btn btn-danger" onclick="deleteOfflineEvent({{ $inc->id }})"><i class="fa fa-trash"></i> Xóa</button>
								</td>
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
<!-- Incentive Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT ƯU ĐÃI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="incentiveForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Ưu Đãi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="incentive_name" placeholder="Nhập tên sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Link Đích</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="incentive_link" placeholder="Nhập địa điểm diễn ra sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Rank Hiển Thị</label>
						<div class="col-sm-9">
							<select class="form-control" name="rank_id" id="rank-drop">
								@if(isset($arrRank))
								@foreach($arrRank as $rank)
								<option value="{{ $rank->id }}">{{ $rank->name }}</option>
								@endforeach
								@endif()
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Banner</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="incentive_banner" id="file">
							<div style="margin: 5px 0">
								<img src="" alt="" style="width: 100%;">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-incentive-modal" data-dismiss="modal">Hủy</button>
						<button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('newpub_script')
<script>
	function clearFormInput() {
		$("form input[name=id]").val("");
		$("form input[name=incentive_name]").val("");
		$("form input[name=incentive_link]").val("");
		$("form img").attr("src", "");
	}

	function showFormEdit(incentiveId, url) {
		$("#incentiveForm").attr("action", url);
		$("button[type=submit]").html("Lưu Thay Đổi");
		$(".modal-title").html("CẬP NHẬT ƯU ĐÃI");
		$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
		$(".close").css("margin-left", "auto");
		$.ajax({
			url: 'incentive-edit',
			type: 'GET',
			data: {incentiveId: incentiveId },
		})
		.done(function(data) {
			var d = JSON.parse(data);
			if(d) {
				$("form input[name=id]").val(d["id"]);
				$("form input[name=incentive_name]").val(d["incentive_name"]);
				$("form input[name=incentive_link]").val(d["incentive_link"]);
				$("#rank-drop").val(d["rank_id"]);
				$("form img").attr("src", "/uploads/academy/" + d["incentive_banner"]);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#incentiveForm").submit(function(event) {
		event.preventDefault();
		var post_url = $(this).attr("action");
		var request_method = $(this).attr("method");
		var file_data = $('#file').prop('files')[0];
		if(typeof file_data != 'undefined') {
			var type = file_data.type;
		} else {
			var type = "image/jpg";
		}
		var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

		if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
			var form_data = new FormData(this);
			if(typeof file_data != 'undefined') {
				form_data.append('file', file_data);
			}
			$.ajax({
				url: post_url,
				type: request_method,
				enctype: 'multipart/form-data',
				data: form_data,
				contentType: false,
				cache: false,
				processData:false
			})
			.done(function(data) {
				$(".close-incentive-modal").click();
				alert(JSON.parse(data));
				clearFormInput();
				window.location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		} else {
			alert('Chỉ được upload file ảnh');
			$('#file').val('');
		}
	});

	$(".close-incentive-modal").click(function(event) {
		clearFormInput();
	});

	function showFormInsert(url){
		clearFormInput();
		$("#incentiveForm").attr("action", url);
		$("button[type=submit]").html("Thêm Mới");
		$(".modal-title").html("THÊM MỚI ƯU ĐÃI");
	}

	function deleteOfflineEvent(id) {
		if(confirm("Ưu đãi đã xóa không thể khổi phục lại, bạn có thật sự muốn xóa?")) {
			var _token = $("meta[name=csrf-token]").attr("content");
			$.ajax({
				url: 'incentive-delete',
				type: 'POST',
				data: {_token: _token, id: id},
			})
			.done(function(data) {
				console.log("success");
				console.log(JSON.parse(data));
				window.location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	}
</script>
@endsection