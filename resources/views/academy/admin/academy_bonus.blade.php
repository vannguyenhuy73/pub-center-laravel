@extends('newpub_layouts.main')
@section('title','Academy Bonus')
@section('newpub_style')
<style>
	.bonus-list-content ul, .bonus-list-content ol{
		/*margin: 0;padding: 0;*/
		list-style: none;
	}
	.bonus-list-content li {
		background: #37BC9B;
		color: #fff;
		counter-increment: myCounter;
		margin: 0 0 30px 0;
		padding: 13px;
		position: relative;
		top: 1em;
		border-radius:  0em 2px 1em 1em;
		padding-left: 2em;
		font-size: 1.2em;
		font-family: Constantia;
	}
	.bonus-list-content li:before{
		content: counter(myCounter, decimal-leading-zero);
		display: inline-block;
		text-align: center;
		font-size: 2em;
		line-height: 1.3em;
		background-color:  #48CFAD;
		padding: 10px;
		font-weight: bold;
		position: absolute; 
		top: 0;
		left: -40px;
		border-radius: 50%;
		font-family: exo;
	}

	.bonus-list-content li:nth-child(even){
		background-color: #434A54;
	}
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
						ACADEMY BONUS
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH BONUS CỦA ACADEMY</h4>
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertBonus") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th style="width: 10%">STT</th>
								<th style="width: 60%">QUYỀN LỢI</th>
								<th style="width: 30%"></th>
							</tr>
						</thead>
						<tbody>
							@if(isset($data))
							@foreach($data as $key => $bonus)
							<tr>
								<td>{{ ($key + 1) }}</td>
								<td>{{ $bonus->name }}</td>
								<td style="text-align: center;">
									<button class="btn btn-warning" onclick="showFormEdit({{ $bonus->id }}, '{{ route('academy.admin.updateBonus') }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
									<button class="btn btn-danger" onclick="deleteBonus({{ $bonus->id }})"><i class="fa fa-trash"></i> Xóa</button>
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
<!-- Bonus Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT QUYỀN LỢI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="bonusForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Quyền Lợi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="bonus_name" placeholder="Nhập tên quyền lợi">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-bonus-modal" data-dismiss="modal">Hủy</button>
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
		$("form input[name=bonus_name]").val("");
	}

	function showFormEdit(bonusId, url) {
		$("#bonusForm").attr("action", url);
		$("button[type=submit]").html("Lưu Thay Đổi");
		$(".modal-title").html("CẬP NHẬT QUYỀN LỢI");
		$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
		$(".close").css("margin-left", "auto");
		$.ajax({
			url: 'bonus-edit',
			type: 'GET',
			data: {bonusId: bonusId },
		})
		.done(function(data) {
			var d = JSON.parse(data);
			if(d) {
				$("form input[name=id]").val(d["id"]);
				$("form input[name=bonus_name]").val(d["name"]);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#bonusForm").submit(function(event) {
		event.preventDefault();
		var post_url = $(this).attr("action");
		var request_method = $(this).attr("method");
		var form_data = new FormData(this);
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
			$(".close-bonus-modal").click();
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
	});

	function showFormInsert(url){
		clearFormInput();
		$("#bonusForm").attr("action", url);
		$("button[type=submit]").html("Thêm Mới");
		$(".modal-title").html("THÊM MỚI QUYỀN LỢI");
	}

	function deleteBonus(id) {
		if(confirm("Quyền lợi đã xóa không thể khổi phục lại, bạn có thật sự muốn xóa?")) {
			var _token = $("meta[name=csrf-token]").attr("content");
			$.ajax({
				url: 'bonus-delete',
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