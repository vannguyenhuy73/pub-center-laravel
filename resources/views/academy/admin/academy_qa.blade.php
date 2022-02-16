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
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertQA") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					@if(isset($arrRank))
					@foreach($arrRank as $k => $rank)
					<h4 style="color: #f00; font-weight: 600;">{{ mb_strtoupper($rank->name) }}</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th>STT</th>
								<th>CÂU HỎI</th>
								<th>TRẢ LỜI</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(isset($data))
							@foreach($data[$k] as $key => $qa)
							<tr>
								<td>{{ ($key + 1) }}</td>
								<td>{!! $qa->qa_question !!}</td>
								<td>{!! $qa->qa_answer !!}</td>
								<td>
									<button class="btn btn-warning" onclick="showFormEdit({{ $qa->id }}, '{{ route('academy.admin.updateQA') }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
									<button class="btn btn-danger" onclick="deleteQA({{ $qa->id }})"><i class="fa fa-trash"></i> Xóa</button>
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
<!-- Q&A Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT Q&A</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="qaForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Câu Hỏi</label>
						<div class="col-sm-9">
							{{-- <input type="text" class="form-control" name="qa_question" placeholder="Nhập câu hỏi"> --}}
							<textarea class="form-control" name="qa_question" cols="30" rows="3" placeholder="Nhập câu hỏi"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Trả Lời</label>
						<div class="col-sm-9">
							{{-- <input type="text" class="form-control" name="qa_answer" placeholder="Nhập nội dung câu trả lời"> --}}
							<textarea class="form-control" name="qa_answer" cols="30" rows="10" placeholder="Nhập câu trả lời"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Rank</label>
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
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-qa-modal" data-dismiss="modal">Hủy</button>
						<button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('newpub_script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'qa_answer' );
</script>
<script>
	function clearFormInput() {
		$("form input[name=id]").val("");
		// $("form textarea[name=qa_answer]").val("");
		CKEDITOR.instances.qa_answer.setData("");
		$("form textarea[name=qa_question]").val("");
	}

	function showFormEdit(qaId, url) {
		$("#qaForm").attr("action", url);
		$("button[type=submit]").html("Lưu Thay Đổi");
		$(".modal-title").html("CẬP NHẬT BÀI HỌC");
		$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
		$(".close").css("margin-left", "auto");
		$.ajax({
			url: 'qa-edit',
			type: 'GET',
			data: {qaId: qaId },
		})
		.done(function(data) {
			var d = JSON.parse(data);
			if(d) {
				$("form input[name=id]").val(d["id"]);
				$("form textarea[name=qa_question]").val(d["qa_question"]);
				// $("form textarea[name=qa_answer]").val(d["qa_answer"]);
				CKEDITOR.instances.qa_answer.setData(d["qa_answer"]);
				$("#rank-drop").val(d["rank_id"]);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$("#qaForm").submit(function(event) {
		event.preventDefault();
		var post_url = $(this).attr("action");
		var request_method = $(this).attr("method");
		for ( instance in CKEDITOR.instances )
    	{
        	CKEDITOR.instances[instance].updateElement();
    	}
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
			$(".close-qa-modal").click();
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

	$(".close-qa-modal").click(function(event) {
		clearFormInput();
	});

	function showFormInsert(url){
		clearFormInput();
		$("#qaForm").attr("action", url);
		$("button[type=submit]").html("Thêm Mới");
		$(".modal-title").html("THÊM MỚI CÂU HỎI");
	}

	function deleteQA(id) {
		if(confirm("Câu hỏi đã xóa không thể khổi phục lại, bạn có thật sự muốn xóa?")) {
			var _token = $("meta[name=csrf-token]").attr("content");
			$.ajax({
				url: 'qa-delete',
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