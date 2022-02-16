@extends('newpub_layouts.main')
@section('title','Academy Rank')
@section('newpub_style')
<style>
	ol, ul {
		list-style: none;
	}

	blockquote, q {
		quotes: none;
	}

	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	.about {
		margin: 70px auto 40px;
		padding: 8px;
		width: 260px;
		font: 10px/18px 'Lucida Grande', Arial, sans-serif;
		color: #666;
		text-align: center;
		text-shadow: 0 1px rgba(255, 255, 255, 0.25);
		background: #eee;
		background: rgba(250, 250, 250, 0.8);
		border-radius: 4px;
		background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
		background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
		background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
		background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 0 1px rgba(255, 255, 255, 0.1), 0 0 6px rgba(0, 0, 0, 0.2);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 0 1px rgba(255, 255, 255, 0.1), 0 0 6px rgba(0, 0, 0, 0.2);
	}
	.about a {
		color: #333;
		text-decoration: none;
		border-radius: 2px;
		-webkit-transition: background 0.1s;
		-moz-transition: background 0.1s;
		-o-transition: background 0.1s;
		transition: background 0.1s;
	}
	.about a:hover {
		text-decoration: none;
		background: #fafafa;
		background: rgba(255, 255, 255, 0.7);
	}

	.about-links {
		height: 30px;
	}
	.about-links > a {
		float: left;
		width: 50%;
		line-height: 30px;
		font-size: 12px;
	}

	.about-author {
		margin-top: 5px;
	}
	.about-author > a {
		padding: 1px 3px;
		margin: 0 -1px;
	}

	.plans {
		margin: 10px auto;
		/*width: 660px;*/
		zoom: 1;
	}
	.plans:before, .plans:after {
		content: '';
		display: table;
	}
	.plans:after {
		clear: both;
	}

	.plan {
		float: left;
		/*width: 220px;*/
		width: calc(100%/6);
		margin: 10px 0;
		padding: 20px;
		text-align: center;
		background: #fafafa;
		background-clip: padding-box;
		border: solid #453b5d;
		border-width: 2px 0 2px 2px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
	}
	.plan:first-child {
		border-top-left-radius: 7px;
		border-bottom-left-radius: 7px;
	}
	.plan:last-child {
		border-width: 2px;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
	}

	.plan-title {
		position: relative;
		margin: -20px -10px 20px;
		padding: 20px;
		line-height: 1;
		font-size: 16px;
		font-weight: bold;
		color: #595f6b;
		border-bottom: 1px dashed #d2d2d2;
	}
	.plan-title:before {
		content: '';
		position: absolute;
		bottom: -1px;
		left: 0;
		right: 0;
		height: 1px;
		background-size: 3px 1px;
		background-image: -webkit-linear-gradient(left, white, white 33%, #d2d2d2 34%, #d2d2d2);
		background-image: -moz-linear-gradient(left, white, white 33%, #d2d2d2 34%, #d2d2d2);
		background-image: -o-linear-gradient(left, white, white 33%, #d2d2d2 34%, #d2d2d2);
		background-image: linear-gradient(to right, white, white 33%, #d2d2d2 34%, #d2d2d2);
	}

	.plan-price {
		margin: 0 auto 20px;
		width: 90px;
		height: 90px;
		line-height: 90px;
		font-size: 19px;
		font-weight: bold;
		color: white;
		background: #595f6b;
		border-radius: 45px;
	}
	.plan-price > span {
		font-size: 12px;
		font-weight: normal;
		color: rgba(255, 255, 255, 0.9);
	}

	.plan-features {
		margin-bottom: 20px;
		line-height: 2;
		font-size: 12px;
		color: #999;
		text-align: center;
	}
	.plan-features > li > strong {
		font-weight: bold;
		color: #888;
	}

	.plan-button {
		display: inline-block;
		vertical-align: top;
		padding: 0 15px;
		line-height: 30px;
		font-weight: bold;
		color: white;
		text-transform: uppercase;
		text-decoration: none;
		text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
		background: #7c69a3;
		border: 1px solid #222;
		border-bottom-color: black;
		border-radius: 3px;
		background-image: -webkit-linear-gradient(top, #9780cc, #6f5e96);
		background-image: -moz-linear-gradient(top, #9780cc, #6f5e96);
		background-image: -o-linear-gradient(top, #9780cc, #6f5e96);
		background-image: linear-gradient(to bottom, #9780cc, #6f5e96);
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), inset 0 2px rgba(255, 255, 255, 0.1), 0 1px rgba(0, 0, 0, 0.1);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), inset 0 2px rgba(255, 255, 255, 0.1), 0 1px rgba(0, 0, 0, 0.1);
	}
	.plan-button:active {
		color: rgba(255, 255, 255, 0.95);
		background: #6f5e96;
		border-color: black #222 #222;
		background-image: -webkit-linear-gradient(top, #6f5e96, #8770b9);
		background-image: -moz-linear-gradient(top, #6f5e96, #8770b9);
		background-image: -o-linear-gradient(top, #6f5e96, #8770b9);
		background-image: linear-gradient(to bottom, #6f5e96, #8770b9);
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25);
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25);
	}

	.plan-tall {
		margin: 0;
		background-color: white;
		border-width: 2px;
		border-radius: 7px;
	}
	.plan-tall > .plan-title {
		font-size: 18px;
	}
	.plan-tall > .plan-price {
		width: 100px;
		height: 100px;
		line-height: 100px;
		font-size: 21px;
		border-radius: 50px;
	}
	.plan-tall > .plan-features {
		font-size: 13px;
	}
	.plan-tall > .plan-button {
		padding: 0 16px;
		line-height: 32px;
	}
	.plan-tall + .plan {
		border-left: 0;
	}
	.rank-modal .modal-dialog {
		max-width: 350px;
	}
	.right_col {
    	margin: 0 10px;
  	}
  	a.btn {
  		color: #ffffff !important;
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
						ACADEMY RANK
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH THỨ HẠNG CỦA ACADEMY</h4>
					<div style="text-align: right"><button class="btn btn-success" onclick="showFormInsert('{{ route("academy.admin.insertRank") }}')" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button></div>
					<div class="plans">
						@if(isset($ranks))
						@foreach($ranks as $rank)
						<div class="plan">
							<h2 class="plan-title">{{ $rank->name }}</h2>
							<div><img src="/uploads/academy/{{ $rank->icon }}" alt="" style="width: 100%; margin-bottom: 10px;"></div>
							<a href="#" onclick="showFormEdit({{ $rank->id }}, '{{ route('academy.admin.updateRank') }}')" class="btn btn-warning" style="width: 45%" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Sửa</a>
							<a href="index.html" class="btn btn-danger" style="width: 45%"><i class="fa fa-trash"></i> Xóa</a>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Rank Modal -->
<div class="modal fade rank-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT RANK</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="rankForm">
					@csrf
					<div class="form-group row">
						<input type="hidden" class="form-control" name="id">
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-4 col-form-label">Tên Rank</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="name" placeholder="Nhập tên rank">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-4 col-form-label">Số Điểm</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="point" placeholder="Nhập số điểm của rank">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-4 col-form-label">Biểu Tượng</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" name="icon" id="file">
							<div style="margin: 5px 0">
								<img src="" alt="" style="width: 100%;">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close-rank-modal" data-dismiss="modal">Hủy</button>
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
	$(".plan").hover(function() {
		$(".plan").removeClass('plan-tall')
		$(this).addClass('plan-tall');
		$(this).children('div').css('margin', '20px 0px');
	}, function() {
		$(".plan").removeClass('plan-tall')
		$(this).children('div').css('margin', '0px');
	});

	function clearFormInput() {
		$("form input[name=id]").val("");
		$("form input[name=name]").val("");
		$("form input[name=point]").val("");
		$("form img").attr("src", "");
	}

	function showFormEdit(rankId, url) {
		$("#rankForm").attr("action", url);
		$("button[type=submit]").html("Lưu Thay Đổi");
		$(".modal-title").html("CẬP NHẬT RANK");
		$(".modal-header").css({"display":"flex", "background":"#f5f5f5"});
		$(".close").css("margin-left", "auto");
		$.ajax({
			url: 'rank-edit',
			type: 'GET',
			data: {rankId: rankId },
		})
		.done(function(data) {
			var d = JSON.parse(data);
			if(d) {
				$("form input[name=id]").val(d["id"]);
				$("form input[name=name]").val(d["name"]);
				$("form input[name=point]").val(d["point"]);
				$("form img").attr("src", "/uploads/academy/" + d["icon"]);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	$("#rankForm").submit(function(event) {
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
				$(".close-rank-modal").click();
				alert(JSON.parse(data));
				clearFormInput();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		} else {
			alert('Chỉ được upload file ảnh (' + type + ')');
			$('#file').val('');
		}
	});

	$(".close-rank-modal").click(function(event) {
		clearFormInput();
	});

	function showFormInsert(url){
		clearFormInput()
		$("#rankForm").attr("action", url);
		$("button[type=submit]").html("Thêm Mới");
		$(".modal-title").html("THÊM MỚI RANK");
	}
</script>
@endsection