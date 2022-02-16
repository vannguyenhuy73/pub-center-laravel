@extends('layouts.app')
@section('content')
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0; 
		}
		input[type=number] {
		    -moz-appearance:textfield; 
		}
		.loadings{
			display: none;
		}
		.code_copy{position: relative;}
		.btn-cp{position: absolute;top: 25px;right: 5px;}
	</style>
	<div class="right_col" role="main">
		<div class="">
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>
								<i class="fa fa-html5" aria-hidden="true"></i> BANNER PRODUCT
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
												@foreach($category as $cate)
												<option value="{{$cate->category_code}}">{{$cate->code_name}}</option>
												@endforeach
											</select>
										</div>
										<!-- /.col-md-4  s -->
										<div class="loadings">
											<div class="loading"></div>
										</div>
										<div class="col-md-2">
											<label for="count">Chọn số sản phẩm</label>
											<select class="form-control" id="count" name="count">
												<option value="1" >1</option>
												<option value="2" >2</option>
												<option value="3" selected>3</option>
												<option value="4" >4</option>
												<option value="6" >6</option>
												<option value="8" >8</option>
											</select>
										</div>
										<div class="col-md-2">
											<label for="width">Nhập chiều rộng (px)</label>
											<input type="number" id="width" name="width" class="form-control" >
											<!-- /# -->
										</div>
										<div class="col-md-3">
											<label for="url">Link dẫn về trang sản phẩm</label>
											<input type="url" id="url" name="url" class="form-control" >
											<!-- /# -->
										</div>
										<!-- /.col-md-4 -->
										<div class="col-md-1">
											<label class="col-md-12" style="width: 100%;">&nbsp;</label>
											<input type="submit" id="create__link"  value="Tạo banner" class="btn
											btn-success" >
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
								<div class="col-md-12" style="margin-top: 30px;" id="pre__view">
									<iframe id="testimonials" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="testimonials"src="" allowtransparency="true" scrolling="no" style="width:300px;border:none;overflow-y:hidden;overflow-x:hidden;"></iframe>'
								</div>
								<!-- /.col-md-12 -->
							</div>
							<!-- /.col-md-12 -->
							<!--<div class="col-md-12 " style="margin-top: 30px;margin-bottom: 30px;">
								<label for="" class="col-md-12">Hướng dẫn sử dụng:</label>
								<ul>
									<li>Rolling Banner là công cụ cho phép banner thay đổi sau mỗi lần người dùng tải lại trang web. Điều này sẽ giúp website của bạn đỡ nhàm chán và nâng cao tỷ lệ chuyển đổi.</li>
								</ul>
								<div class=" text-center" style="margin-top: 20px;">
									<iframe width="853" height="480" src="https://www.youtube.com/embed/htWN028Qus8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@section('script')
	<script >
		$('.btn-cp').prop('disabled', true);
		function myFunction() {
			$('#view-link').select();
			data = document.execCommand("copy");
			toastr.success("Sao chép thành công!");
		}
		
		$('#create__link').click(function() {
			$('.loadings').css('display','block');
			count = $('#count').val();
			width = $('#width').val();
			url = $('#url').val();
			cate = $('#cate').val();
			if( count != null && cate != null) {
				$('#testimonials').css('width',width+'px');
				src = '{{ route('home') }}/get-product-random/{{ Auth()->user()->last_contact_affiliate_id }}/'+cate+'?url='+encodeURIComponent(url)+'&&count='+count;
			
				$('#testimonials').attr('src', src);
				$('#testimonials').load(function() {
				    a = this.contentWindow.document.body.offsetHeight + 'px';
				    iframe = '<iframe id="testimonials" name="testimonials" src="'+src+'" allowtransparency="true" scrolling="no" style="width:'+width+'px;height:'+a+';border:none;overflow-y:hidden;overflow-x:hidden;"></iframe>';

					$('#view-link').val(iframe);
					$('.loadings').css('display','none');
					$('.btn-cp').prop('disabled', false)
				});
			} else {
				if( count == null) {
					toastr.error("Bạn phải nhập số lượng sản phẩm!");
				}

				if( cate == null) {
					toastr.error("Bạn phải nhập danh mục!");
				}

				$('.loadings').css('display','none');
			}
		})
	</script>
@endsection