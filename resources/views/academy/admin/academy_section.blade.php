@extends('newpub_layouts.main')
@section('title','Academy Section')
@section('newpub_style')
<style>
	.right_col {
		margin: 0 10px;
	}
	td {
		line-break: anywhere;
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
						ACADEMY SECTION
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH BÀI HỌC CỦA ACADEMY</h4>
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertSection") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					@if(isset($arrLesson))
					@foreach($arrLesson as $k => $al)
					<h4 style="color: #f00; font-weight: 600;">{{ strtoupper($al->lession_name) }}</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th>STT</th>
								<th>Tên khóa học</th>
								<th>Link Video</th>
								<th>Link PDF</th>
								<th>Link PPT</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(isset($data))
							@foreach($data[$k] as $key => $ls)
							<tr>
								<td>{{ ($key + 1) }}</td>
								<td>{{ $ls->section_name }}</td>
								<td>{{ $ls->section_video }}</td>
								<td>{{ $ls->section_pdf }}</td>
								<td>{{ $ls->section_ppt }}</td>
								<td>
									<button class="btn btn-warning" onclick="showFormEdit({{ $ls->id }}, '{{ route('academy.admin.updateSection') }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
									<button class="btn btn-danger" onclick="deleteSection({{ $ls->id }})"><i class="fa fa-trash"></i> Xóa</button>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Section Modal -->
<div class="modal fade offline-event-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT BÀI HỌC</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="sectionForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Bài Học</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="section_name" placeholder="Nhập tên bài học">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Lesson</label>
						<div class="col-sm-9">
							<select class="form-control" name="lession_id" id="lesson-drop">
								@if(isset($arrLesson))
								@foreach($arrLesson as $al)
								<option value="{{ $al->id }}">{{ $al->lession_name }}</option>
								@endforeach
								@endif()
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Link Video</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="section_video" placeholder="Nhập đường dẫn tới video của khóa học">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Link PDF</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="section_pdf" placeholder="Nhập đường dẫn tới file PDF của khóa học">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Link PPT</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="section_ppt" placeholder="Nhập đường dẫn tới file PPT của khóa học">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-section-modal" data-dismiss="modal">Hủy</button>
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
		$("form input[name=section_name]").val("");
		$("form input[name=section_video]").val("");
		$("form input[name=section_pdf]").val("");
		$("form input[name=section_ppt]").val("");
	}

	function showFormEdit(sectionId, url) {
		$("#sectionForm").attr("action", url);
		$("button[type=submit]").html("Lưu Thay Đổi");
		$(".modal-title").html("CẬP NHẬT BÀI HỌC");
		$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
		$(".close").css("margin-left", "auto");
		$.ajax({
			url: 'section-edit',
			type: 'GET',
			data: {sectionId: sectionId },
		})
		.done(function(data) {
			var d = JSON.parse(data);
			if(d) {
				$("form input[name=id]").val(d["id"]);
				$("form input[name=section_name]").val(d["section_name"]);
				$("form input[name=section_video]").val(d["section_video"]);
				$("form input[name=section_pdf]").val(d["section_pdf"]);
				$("form input[name=section_ppt]").val(d["section_ppt"]);
				$("#lesson-drop").val(d["lession_id"]);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#sectionForm").submit(function(event) {
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
			$(".close-section-modal").click();
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

	$(".close-section-modal").click(function(event) {
		clearFormInput();
	});

	function showFormInsert(url){
		clearFormInput();
		$("#sectionForm").attr("action", url);
		$("button[type=submit]").html("Thêm Mới");
		$(".modal-title").html("THÊM MỚI BÀI HỌC");
	}

	function deleteSection(id) {
		if(confirm("Bài học đã xóa không thể khôi phục lại, bạn có thật sự muốn xóa?")) {
			var _token = $("meta[name=csrf-token]").attr("content");
			$.ajax({
				url: 'section-delete',
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