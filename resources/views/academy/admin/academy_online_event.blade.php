@extends('newpub_layouts.main')
@section('title','Academy Online Event')
@section('newpub_style')
<style>
	.hover-table-layout {
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-flex-wrap: wrap;
		-moz-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		margin:0 auto;
	}
	.listing-item {
		display: block;
		width:100%;
		margin-bottom:20px;
		float: left;
		background: #fff;
		border-radius:10px;
		z-index:0;
		cursor:pointer;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		transition: all 0.3s ease;
		-webkit-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
		-moz-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
		box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);

	}
	.listing-item:hover,  .listing-item.active{
		-webkit-transform: scale(1.03);
		-moz-transform: scale(1.03);
		transform: scale(1.03);
		-webkit-transition: all 0.3s;
		-moz-transition: all 0.3s;
		transition: all 0.3s;
		z-index:2;

	}
	.listing-item .listing{
		padding:20px;
		position:relative;  
	}
	.listing-item .listing:before{
		content:"";
		position:absolute;
		top:-15px;
		left:-o-calc(50% - 15px);
		left:-moz-calc(50% - 15px);
		left:-webkit-calc(50% - 15px);
		left:calc(50% - 15px);
		border-bottom:20px solid #fff;
		border-left:20px solid transparent;
		border-right:20px solid transparent;
	}
	figure.image img {
		width:100%;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}
	figure.image {
		position: relative;
		margin: 0;
		padding: 0;
	}
	figure.image figcaption {
		position: absolute;
		top: 0;
		width: 100%;
		text-align: center;
		bottom: 4px;
		background: rgba(0,0,0,0.6);
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;

	}
	figcaption .caption{
		position:relative;
		top:50%;
		-moz-transform:translateY(-50%);
		-webkit-transform:translateY(-50%);
		transform:translateY(-50%);

	}
	figcaption h1{
		color:white;
		font-weight:bold;
		font-size:16px;
		text-transform: uppercase;
	}
	figcaption p{
		color:white;
		font-size:12px;
	}
	.listing h4 {

		font-size: 13px;
		text-align: center;
		padding: 5px 10px;
		font-weight: bold;
	}
	/*.listing h4:not(:last-child){
		border-bottom: 1px solid #ccc;
		}*/
		.listing-item:hover figure.image figcaption{
			background: rgba(195, 39, 43, 0.6);
		}
		@media only screen and (min-width:540px){
			.listing-item {
				display: block;
				width: -webkit-calc(100%/3);
				width: -moz-calc(100%/3);
				width: calc(100%/3);
			}
		}
		@media only screen and (min-width:1024px){
			.hover-table-layout{
				padding: 30px;
			}
		}
		.ribbon {
			width: 200px;
			height: 40px;
			margin: 0px auto 0px;
			position: relative;
			color: #fff;
			font: 17px/42px sans-serif;
			text-align: center;
			text-transform: uppercase;
			background: #3D79D0;

			-webkit-animation: main 250ms;
			-moz-animation: main 250ms;
			-ms-animation: main 250ms;
			animation: main 250ms;
		}

		.ribbon i {
			position: absolute;
		}

		.ribbon i:first-child, .ribbon i:nth-child(2) {
			position: absolute;
			left: -10px;
			bottom: -10px;
			z-index: -1;
			border: 10px solid transparent;
			border-right-color: #043140;

			-webkit-animation: edge 500ms;
			-moz-animation: edge 500ms;
			-ms-animation: edge 500ms;
			animation: edge 500ms;
		}

		.ribbon i:nth-child(2) {
			left: auto;
			right: -10px;
			border-right-color: transparent;
			border-left-color: #043140;
		}

		.ribbon i:nth-child(3), .ribbon i:last-child {
			width: 20px;
			bottom: -10px;
			left: -30px;
			z-index: -2;
			border: 20px solid #1D53C0;
			border-left-color: transparent;

			-webkit-animation: back 600ms;
			-moz-animation: back 600ms;
			-ms-animation: back 600ms;
			animation: back 600ms;

			-webkit-transform-origin: 100% 0;
			-moz-transform-origin: 100% 0;
			-ms-transform-origin: 100% 0;
			transform-origin: 100% 0;
		}

		.ribbon i:last-child {
			bottom: -10px;
			left: auto;
			right: -30px;
			border: 20px solid #1D53C0;
			border-right-color: transparent;

			-webkit-transform-origin: 0 0;
			-moz-transform-origin: 0 0;
			-ms-transform-origin: 0 0;
			transform-origin: 0 0;
		}

		@-webkit-keyframes main {
			0% { -webkit-transform: scaleX(0); }
			100% { -webkit-transform: scaleX(1); }
		}

		@-webkit-keyframes edge {
			0%, 50% { -webkit-transform: scaleY(0); }
			100% { -webkit-transform: scaleY(1); }
		}

		@-webkit-keyframes back {
			0%, 75% { -webkit-transform: scaleX(0); }
			100% { -webkit-transform: scaleX(1); }
		}


		@-moz-keyframes main {
			0% { -moz-transform: scaleX(0); }
			100% { -moz-transform: scaleX(1); }
		}

		@-moz-keyframes edge {
			0%, 50% { -moz-transform: scaleY(0); }
			100% { -moz-transform: scaleY(1); }
		}

		@-moz-keyframes back {
			0%, 75% { -moz-transform: scaleX(0); }
			100% { -moz-transform: scaleX(1); }
		}


		@keyframes main {
			0% { transform: scaleX(0); }
			100% { transform: scaleX(1); }
		}

		@keyframes edge {
			0%, 50% { transform: scaleY(0); }
			100% { transform: scaleY(1); }
		}

		@keyframes back {
			0%, 75% { transform: scaleX(0); }
			100% { transform: scaleX(1); }
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
							ACADEMY ONLINE EVENT
						</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH SỰ KIÊN ONLINE CỦA ACADEMY</h4>
						<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertOnlineEvent") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
						<div class="hover-table-layout">
							@if(isset($onlineEvents))
							@foreach($onlineEvents as $key => $oe)
							<div class="listing-item">
								<figure class="image">
									<img src="/uploads/academy/{{ $oe->event_banner }}" alt="image">
								</figure>
								<div class="listing">
									<div class="ribbon">
										Event {{ ($key + 1) }}
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<h4>{{ $oe->event_name }}</h4>
									<div style="text-align: center;">
										<button class="btn btn-warning" onclick="showFormEdit({{ $oe->id }}, '{{ route('academy.admin.updateOnlineEvent') }}')" style="width: 100px;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</button>
										<button class="btn btn-danger" onclick="deleteOnlineEvent({{ $oe->id }})" style="width: 100px;"><i class="fa fa-trash"></i> Xóa</button>
									</div>
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
	<!-- Online Event Modal -->
	<div class="modal fade online-event-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT ONLINE EVENT</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" enctype="multipart/form-data" id="onlineEventForm">
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
							<label for="inputPassword" class="col-sm-3 col-form-label">Link Sự Kiện</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="event_link" placeholder="Nhập link đích của sự kiện">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-3 col-form-label">Banner Sự kiện</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="event_banner" id="file">
								<div style="margin: 5px 0">
									<img src="" alt="" style="width: 100%;">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary close-online-event-modal" data-dismiss="modal">Hủy</button>
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
			$("form input[name=event_link]").val("");
			$("form img").attr("src", "");
		}

		function showFormEdit(onlineEventId, url) {
			$("#onlineEventForm").attr("action", url);
			$("button[type=submit]").html("Lưu Thay Đổi");
			$(".modal-title").html("CẬP NHẬT ONLINE EVENT");
			$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
			$(".close").css("margin-left", "auto");
			$.ajax({
				url: 'online-event-edit',
				type: 'GET',
				data: {onlineEventId: onlineEventId },
			})
			.done(function(data) {
				var d = JSON.parse(data);
				if(d) {
					$("form input[name=id]").val(d["id"]);
					$("form input[name=event_name]").val(d["event_name"]);
					$("form input[name=event_link]").val(d["event_link"]);
					$("form img").attr("src", "/uploads/academy/" + d["event_banner"]);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		$("#onlineEventForm").submit(function(event) {
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
					$(".close-online-event-modal").click();
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

		$(".close-online-event-modal").click(function(event) {
			clearFormInput();
		});

		function showFormInsert(url){
			clearFormInput()
			$("#onlineEventForm").attr("action", url);
			$("button[type=submit]").html("Thêm Mới");
			$(".modal-title").html("THÊM MỚI ONLINE EVENT");
		}

		function deleteOnlineEvent(id) {
			if(confirm("Sự kiện đã xóa không thể khổi phục lại, bạn có thật sự muốn xóa?")) {
				var _token = $("meta[name=csrf-token]").attr("content");
				$.ajax({
					url: 'online-event-delete',
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