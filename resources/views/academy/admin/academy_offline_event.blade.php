@extends('newpub_layouts.main')
@section('title','Academy Online Event')
@section('newpub_style')
<style>
	.pricing-table-title {
		text-transform: uppercase;
		font-weight: 700;
		font-size: 2.6em;
		color: #FFF;
		margin-top: 15px;
		text-align: left;
		margin-bottom: 25px;
		text-shadow: 0 1px 1px rgba(0,0,0,0.4);
	}

	.pricing-table-title a {
		font-size: 0.6em;
	}

	.clearfix:after {
		content: '';
		display: block;
		height: 0;
		width: 0;
		clear: both;
	}
/** ========================
 * Contenedor
 ============================*/
 .pricing-wrapper {
 	width: 100%;
 	margin: 40px auto 0;
 	font-size: 10px;
 }

 .pricing-wrapper ul {
 	list-style-type: none;
 }

 .pricing-wrapper a {
 	color: #e95846;
 	text-decoration: none;
 }

 .pricing-table {
 	margin: 10px 10px;
 	text-align: center;
 	width: 300px;
 	float: left;
 	-webkit-box-shadow: 0 0 15px rgba(0,0,0,0.4);
 	box-shadow: 0 0 15px rgba(0,0,0,0.4);
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .pricing-table:hover {
 	-webkit-transform: scale(1.06);
 	-ms-transform: scale(1.06);
 	-o-transform: scale(1.06);
 	transform: scale(1.06);
 }

 .pricing-title {
 	color: #FFF;
 	background: #e95846;
 	padding: 20px 0;
 	font-size: 2em;
 	text-transform: uppercase;
 	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
 }

 .pricing-table.recommended .pricing-title {
 	background: #2db3cb;
 }

 .pricing-table.recommended .pricing-action {
 	background: #2db3cb;
 }

 .pricing-table .price {
 	background: #403e3d;
 	font-size: 3.4em;
 	font-weight: 700;
 	padding: 20px 0;
 	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
 }

 .pricing-table .price sup {
 	font-size: 0.4em;
 	position: relative;
 	left: 5px;
 }

 .table-list {
 	background: #FFF;
 	color: #403d3a;
 	padding-left: 0;
 }

 .table-list li {
 	font-size: 1.4em;
 	font-weight: 700;
 	padding: 12px 8px;
 }

 .table-list li:before {
 	content: "\f00c";
 	font-family: 'FontAwesome';
 	color: #3fab91;
 	display: inline-block;
 	position: relative;
 	right: 5px;
 	font-size: 16px;
 }

 .table-list li:nth-child(1):before {
 	content: none;
 }

 .table-list li span {
 	font-weight: 400;
 }

 .table-list li span.unlimited {
 	color: #FFF;
 	background: #e95846;
 	font-size: 0.9em;
 	padding: 5px 7px;
 	display: inline-block;
 	-webkit-border-radius: 38px;
 	-moz-border-radius: 38px;
 	border-radius: 38px;
 }

 .table-list li:nth-child(1) span {
 	font-size: 13px;
 } 


 .table-list li:nth-child(2n) {
 	background: #F0F0F0;
 }

 .table-buy {
 	background: #FFF;
 	padding: 15px;
 	text-align: left;
 	overflow: hidden;
 }

 .table-buy p {
 	float: left;
 	color: #37353a;
 	font-weight: 700;
 	font-size: 2.4em;
 }

 .table-buy p sup {
 	font-size: 0.5em;
 	position: relative;
 	left: 5px;
 }

 .table-buy .pricing-action {
 	float: right;
 	color: #FFF;
 	background: #e95846;
 	padding: 10px 16px;
 	-webkit-border-radius: 2px;
 	-moz-border-radius: 2px;
 	border-radius: 2px;
 	font-weight: 700;
 	font-size: 1.4em;
 	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .table-buy .pricing-action:hover {
 	background: #cf4f3e;
 }

 .recommended .table-buy .pricing-action:hover {
 	background: #228799;    
 }

/** ================
 * Responsive
 ===================*/
 @media only screen and (min-width: 768px) and (max-width: 959px) {
 	.pricing-wrapper {
 		width: 768px;
 	}

 	.pricing-table {
 		width: 236px;
 	}

 	.table-list li {
 		font-size: 1.3em;
 	}

 }

 @media only screen and (max-width: 767px) {
 	.pricing-wrapper {
 		width: 420px;
 	}

 	.pricing-table {
 		display: block;
 		float: none;
 		margin: 0 0 20px 0;
 		width: 100%;
 	}
 }

 @media only screen and (max-width: 479px) {
 	.pricing-wrapper {
 		width: 300px;
 	}
 }
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
						ACADEMY OFFLINE EVENT
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH SỰ KIÊN OFFLINE CỦA ACADEMY</h4>
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertOfflineEvent") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					<div class="pricing-wrapper clearfix">
						@if(isset($offlineEvents))
						@foreach($offlineEvents as $key => $oe)
						<div class="pricing-table recommended">
							<h3 class="pricing-title">Event {{ ($key + 1) }}</h3>
							<div class="price"><img src="/uploads/academy/{{ $oe->event_link_banner }}" alt="" style="width: 100%"></div>
							<ul class="table-list">
								<li><span class="unlimited">{{ $oe->event_name }}</span></li>
								<li>Địa Điểm : <span>{{ $oe->event_place }}</span></li>
								<li>Thời Gian : <span>{{ $oe->event_time }}</span></li>
							</ul>
							<div class="table-buy" style="text-align: center;">
								<button class="btn btn-warning" onclick="showFormEdit({{ $oe->id }}, '{{ route('academy.admin.updateOfflineEvent') }}')" style="width: 45%" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
								<button class="btn btn-danger" onclick="deleteOfflineEvent({{ $oe->id }})" style="width: 45%"><i class="fa fa-trash"></i> Xóa</button>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Offline Event Modal -->
<div class="modal fade offline-event-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT OFFLINE EVENT</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="offlineEventForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-3 col-form-label">Tên Sự Kiện</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="event_name" placeholder="Nhập tên sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Địa Điểm</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="event_place" placeholder="Nhập địa điểm diễn ra sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Thời Gian</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="event_time" placeholder="Nhập thời gian diễn ra sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Link Sự Kiện</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="event_url" placeholder="Nhập link của sự kiện">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Banner Nhỏ</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="event_link_banner" id="file_1">
							<div style="margin: 5px 0">
								<img src="" alt="" style="width: 50%;">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Banner Lớn</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="event_link_content" id="file_2">
							<div style="margin: 5px 0">
								<img src="" alt="" style="width: 100%;">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Banner Mobile</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="event_banner_mobile" id="file_3">
							<div style="margin: 5px 0">
								<img src="" alt="" style="width: 50%;">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-offline-event-modal" data-dismiss="modal">Hủy</button>
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
		$("form input[name=event_name]").val("");
		$("form input[name=event_place]").val("");
		$("form input[name=event_time]").val("");
		$("form input[name=event_url]").val("");
		$("form img").attr("src", "");
	}

	function showFormEdit(offlineEventId, url) {
			$("#offlineEventForm").attr("action", url);
			$("button[type=submit]").html("Lưu Thay Đổi");
			$(".modal-title").html("CẬP NHẬT OFFLINE EVENT");
			$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
			$(".close").css("margin-left", "auto");
			$.ajax({
				url: 'offline-event-edit',
				type: 'GET',
				data: {offlineEventId: offlineEventId },
			})
			.done(function(data) {
				var d = JSON.parse(data);
				if(d) {
					$("form input[name=id]").val(d["id"]);
					$("form input[name=event_name]").val(d["event_name"]);
					$("form input[name=event_place]").val(d["event_place"]);
					$("form input[name=event_time]").val(d["event_time"]);
					$("form input[name=event_url]").val(d["event_url"]);
					$("form img").eq(0).attr("src", "/uploads/academy/" + d["event_link_banner"]);
					$("form img").eq(1).attr("src", "/uploads/academy/" + d["event_link_content"]);
					$("form img").eq(2).attr("src", "/uploads/academy/" + d["event_banner_mobile"]);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		$("#offlineEventForm").submit(function(event) {
			event.preventDefault();
			var post_url = $(this).attr("action");
			var request_method = $(this).attr("method");
			var file_data_1 = $('#file_1').prop('files')[0];
			var file_data_2 = $('#file_2').prop('files')[0];
			var file_data_3 = $('#file_3').prop('files')[0];
			if(typeof file_data_1 != 'undefined') {
				var type_1 = file_data_1.type;
			} else {
				var type_1 = "image/jpg";
			}
			if(typeof file_data_2 != 'undefined') {
				var type_2 = file_data_2.type;
			} else {
				var type_2 = "image/jpg";
			}
			if(typeof file_data_3 != 'undefined') {
				var type_3 = file_data_3.type;
			} else {
				var type_3 = "image/jpg";
			}
			var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

			if ((type_1 == match[0] || type_1 == match[1] || type_1 == match[2] || type_1 == match[3]) && (type_2 == match[0] || type_2 == match[1] || type_2 == match[2] || type_2 == match[3]) && (type_3 == match[0] || type_3 == match[1] || type_3 == match[2] || type_3 == match[3])) {
				var form_data = new FormData(this);
				if(typeof file_data_1 != 'undefined') {
					form_data.append('file', file_data_1);
				}
				if(typeof file_data_2 != 'undefined') {
					form_data.append('file', file_data_2);
				}
				if(typeof file_data_3 != 'undefined') {
					form_data.append('file', file_data_3);
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
					$(".close-offline-event-modal").click();
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
				$('#file_1').val('');
				$('#file_2').val('');
				$('#file_3').val('');
			}
		});

		$(".close-offline-event-modal").click(function(event) {
			clearFormInput();
		});

		function showFormInsert(url){
			clearFormInput();
			$("#offlineEventForm").attr("action", url);
			$("button[type=submit]").html("Thêm Mới");
			$(".modal-title").html("THÊM MỚI OFFLINE EVENT");
		}

		function deleteOfflineEvent(id) {
			if(confirm("Sự kiện đã xóa không thể khổi phục lại, bạn có thật sự muốn xóa?")) {
				var _token = $("meta[name=csrf-token]").attr("content");
				$.ajax({
					url: 'offline-event-delete',
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