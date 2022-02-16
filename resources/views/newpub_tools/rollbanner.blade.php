@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Rolling Banner')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<style>
	#pre__view{
		width: 100%;
		overflow: auto;
	}
	iframe{border:none;}
	.loadings{
		display: none;
	}
	.code_copy{position: relative;}
	.btn-cp{position: absolute;top: 25px;right: 5px;}
</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						<i class="fa fa-html5" aria-hidden="true"></i> ROLLING BANNER
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
					<p>Adpia cung cấp các banner tiện ích giúp tích hợp vào website của bạn dễ dàng nhất có thể.</p>
					<!-- /.x_content -->
					<div class="col-md-12" style="margin-bottom: 30px; margin-top: 20px;">
						<div class="row">
							<div class="col-md-3">
								<label for="cate">Chọn danh mục (*)</label>
								<select class="form-control" id="cate" name="cate">
									<option value="" selected disabled hidden>Chọn danh mục</option>
									@foreach($data['cate'] as $cate)
									<option value="{{$cate->category1_id}}">{{$cate->cat_name1}}</option>
									@endforeach
								</select>
							</div>
							<!-- /.col-md-4  s -->
							<div class="loadings">
								<div class="loading"></div>
							</div>
							<div class="col-md-2">
								<label for="merchant">Lọc Merchant</label>
								<select class="form-control" id="merchant" name="merchant">
									<option value="0">Tất cả merchant</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="size">Chọn kích thước (*)</label>
								<select name="size" class="form-control" id="size">
									<option value="">Chọn kích thước</option>
								</select>
								<!-- /# -->
							</div><div class="col-md-2">
								<label for="u_id">Chỉ định người dùng</label>
								<input type="text" id="u_id" name="u_id"   class="form-control" >
								<!-- /# -->
							</div>
							<!-- /.col-md-4 -->
							<div class="col-md-1">
								<label class="col-md-12" style="width: 100%;">&nbsp;</label>
								<input type="submit" id="create__link"  value="Tạo banner" class="btn btn-success" >
							</div>
							<!-- /.col-md-4 -->
						</div>
					</div>
					<!-- /.col-md-12 -->
					<div class="col-md-10 row">
						<div class="col-md-10 code_copy">
							<label>Lấy mã nhúng:</label>
							<input type="text"  id="view-link" style="display:
							inline-block !important;" class="form-control">
							<button type="submit" onclick="myFunction()" style="display: inline-block;" class="btn btn-cp"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
						</div>
						<!-- /.col-md-8 -->
					</div>
					<!-- /.col-md-12 -->
					<div class="col-md-12" style="margin-top: 30px;margin-bottom: 30px;">
						<label for="">Xem trước:</label>
						<div class="col-md-12" style="margin-top: 30px;" id="pre__view"></div>
						<!-- /.col-md-12 -->
					</div>
					<!-- /.col-md-12 -->
					<div class="col-md-12 " style="margin-top: 30px;margin-bottom: 30px;">
						<label for="" class="col-md-12">Hướng dẫn sử dụng:</label>
						<ul>
							<li>Rolling Banner là công cụ cho phép banner thay đổi sau mỗi lần người dùng tải lại trang web. Điều này sẽ giúp website của bạn đỡ nhàm chán và nâng cao tỷ lệ chuyển đổi.</li>
						</ul>
						<div class=" text-center" style="margin-top: 20px;">
							<iframe width="100%" height="480" src="https://www.youtube.com/embed/h62GQ2wx3T8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
<script >
	$(document).ready(() => {
		$('#create__link').prop('disabled', true)
		$('.btn-cp').prop('disabled', true)
	})
	$('#cate').change( function() {
		$('.loadings').css('display','block');
		dataSize = '';
		merchant = "<option value='0'>Tất cả Merchant</option>";
		data = $(this).val();
		$.ajax({
			url: "{{route('newpub.tool.size-banner')}}",
			data: {cate:data},
			method: 'get',
			success: function(data) {
				$.each(data['size'], function(key, value) {
					dataSize += "<option value="+value['width']
					+"x"+value['height']+">"
					+value['width']
					+" X "+value['height']+" ("+value['total']+" banners)"
					+"</option>";
				})
				$.each(data['merchant'], function(key, value) {
					merchant += "<option value="+value['merchant_id']+">"+value['merchant_id']+"</option>";
				})
				$('#size').html(dataSize);
				$('#merchant').html(merchant);
				$('.loadings').css('display','none');
				if(data['merchant'].length > 0) {
					$('#create__link').prop('disabled', false);
				} else {
					$('#create__link').prop('disabled', true);
				}
			}
		})
	})

	$('#merchant').change(function() {
		merchant = $(this).val();
		cate = $('#cate').val();
		dataSize = '';
		$('.loadings').css('display','block');
		$.ajax({
			url: "{{route('newpub.tool.size-banner')}}",
			data: {cate:data, merchant:merchant},
			method: 'get',
			success: function(data) {
				$.each(data['size'], function(key, value) {
					dataSize += "<option value="+value['width']
					+"x"+value['height']+">"
					+value['width']
					+" X "+value['height']+" ("+value['total']+" banners)"
					+"</option>";
				})

				$('#size').html(dataSize);
				$('.loadings').css('display','none');
			}
			
		})
	})

	function myFunction() {

		$('#view-link').select();
		data = document.execCommand("copy");
		toastr.success("Sao chép thành công!");
	}
	$('#create__link').click(() => {
		$('.loadings').css('display','block');
		cate = $('#cate').val();
		size = $('#size').val();
		uid = $('#u_id').val();
		m_id = $('#merchant').val();
		$.ajax({
			url : "{{route('newpub.tool.get-banner')}}",
			method: 'get',
			data: {cate:cate, size:size, uid:uid, m_id:m_id},
			success: (data) => {
				if(data['status'] && data['status'] == 500) {
					toastr.error(data['message']);
					$('.loadings').css('display','none');
					$('.btn-cp').prop('disabled', false);
				} else {
					$("#pre__view").html(data);
					$("#view-link").val(data)
					$('.loadings').css('display','none');
					$('.btn-cp').prop('disabled', false);
				}
			}
		})

	})
</script>
@stop