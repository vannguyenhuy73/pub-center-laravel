@extends('layouts.app')
@section('content')
<style>
	.loadings{
		display: none;
	}
	.code_copy{position: relative;}
	.cp-btn{position: absolute;top: 25px;right: 5px;}
</style>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							<i class="fa fa-clone" aria-hidden="true"></i></i> CAROUSEL BANNER
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
						<p>Dưới đây là tính năng smart carousel do Adpia phát triển.</p>
						<div class="col-md-12" style="margin-bottom: 30px; margin-top: 20px;">
							<div class="row">
								<div class="col-md-3">
									<label for="cate">Chọn danh mục (*)</label>
									<select class="form-control" id="cate" name="cate">
										<option  value="" selected disabled hidden>Chọn danh mục</option>
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
										<option value="" selected disabled hidden>Chọn kích thước</option>
									</select>
									<!-- /# -->
								</div>
								<div class="col-md-2">
									<label for="u_id">Chỉ định người dùng</label>
									<input type="text" id="u_id" name="u_id"   class="form-control" >
									<!-- /# -->
								</div>
								<!-- /.col-md-4 -->
								<div class="col-md-1">
									<label class="col-md-12" style="width: 100%;">&nbsp;</label>
									<input type="submit" id="create__link"  value="Tạo nhanh" class="btn btn-success" >
								</div>
								<!-- /.col-md-4 -->
							</div>
						</div>
						<div class="col-md-10 row">
							<div class="col-md-10 code_copy">
								<label>Lấy mã nhúng:</label>
								<input type="text"  id="view-link" style="display: inline-block !important;" class="form-control">
								<button type="submit" onclick="myFunction()" style="display: inline-block;" class="btn cp-btn"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
							</div>
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
									<li>Smart Carousel là công cụ cho phép banner chuyển động liên tục theo dạng slide.Công cụ này cho phép website của bạn thêm sinh động và tăng tỷ lệ chuyển đổi</li>
								</ul>
								<div class=" text-center" style="margin-top: 20px;">
									<iframe width="100%" height="480" src="https://www.youtube.com/embed/VzQtDBigRWw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function () {
		$('#create__link').prop('disabled', true)
		$('.cp-btn').prop('disabled', true);

	})
	function myFunction() {
		$('#view-link').select();
		data = document.execCommand("copy");
		toastr.success("Sao chép thành công!");
	}
	$('#cate').change( function() {
		$('.loadings').css('display','block');
		dataSize = '';
		merchant = "<option value='0'>Tất cả Merchant</option>";
		data = $(this).val();
		$.ajax({
			url: "{{route('tool.size-banner')}}",
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
				$('#create__link').prop('disabled', false)
			}
		})
	})
	$('#merchant').change(function() {
		merchant = $(this).val();
		cate = $('#cate').val();
		dataSize = '';
		$('.loadings').css('display','block');
		$.ajax({
			url: "{{route('tool.size-banner')}}",
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
	$('#create__link').click(() => {
			$('.loadings').css('display','block');
			cate = $('#cate').val();
			size = $('#size').val();
			u_id = $('#u_id').val();
			m_id = $('#merchant').val();
			$.ajax({
				url : "{{route('tool.get-carousel')}}",
				method: 'get',
				data: {cate:cate, size:size, u_id:u_id, m_id:m_id},
				success: (data) => {
					$("#pre__view").html(data);
					$("#view-link").val(data)
					$('.loadings').css('display','none');
					$('.cp-btn').prop('disabled', false);
				}
			})
			
		})	
</script>
	
@endsection