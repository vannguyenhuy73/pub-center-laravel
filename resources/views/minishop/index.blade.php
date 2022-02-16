@extends('layouts.app')
@section('content')
	<style>
		.loadings{
			display: none;
		}
	</style>
	<div class="right_col" role="main">
		<div class="">
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>
								<i class="fa fa-html5" aria-hidden="true"></i> MINISHOP PRODUCT
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
								<p style="padding-left: 10px;padding-right: 10px">Minishop là một landing web nhỏ do Adpia cung cấp. Để cài đặt bạn hãy điền vào
								form đăng ký chúng tôi sẽ liên hệ sớm nhất để giúp đỡ bạn.</p>
								<div class="col-md-12" style="margin-bottom: 30px; margin-top: 20px;">
									<form action="{{route('add-minishop')}}" method="post">
										@method('post')
										@csrf()
										<div class="row">
											<div class="col-md-3">
												<label for="cate">Chọn ngành hàng (*)</label>
												<select class="form-control" id="cate" name="cate" required>
													<option selected disabled hidden>Chọn danh mục</option>
													@foreach($cate as $ct)
													<option value="{{$ct->cate}}">{{$ct->cate_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-3">
												<label for="site">Link đặt minishop (*)</label>
												<input type="url" id="site_url" name="site" class="form-control"
													   required
													   placeholder="https://adpia.vn">
											</div>
											<div class="col-md-3">
												<label for="site-deal">Link minishop dự định(*)</label>
												<input type="url" id="link_minishop" name="site_deal"
													   class="form-control" required
													   placeholder="https://adpia.vn/minishop">
											</div>
											<!-- /.col-md-3 -->
											<div class="loadings">
												<div class="loading"></div>
											</div>
											<!-- /.col-md-4 -->
											<div class="col-md-1">
												<label class="col-md-12" >&nbsp;</label>
												<input type="submit" id="create__link"  value="Gửi yêu cầu" class="btn
												btn-success" >
											</div>
											<!-- /.col-md-4 -->
										</div>
									</form>
								</div>
								<!-- /.col-md-12 -->
							<div class="col-md-8 m-auto">
								<p>Đây là một minishop chúng tôi chuẩn bị sẵn hãy bấm <a
											style="color:red" href="https://blog.lastsave.vn/minishop/">vào đây
									</a>để trải nghiệm.</p>
								
							</div>
							<!-- /.col-md-12 -->
							<div class="col-md-12" style="margin-top: 30px;margin-bottom: 30px;">
{{--								<iframe src="http://www.adpia.vn/AdpiaAds/index/A12992921/MB" width="100%"--}}
{{--										height="350px" frameborder="0"></iframe>--}}
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
		$('#create__link').prop('disabled', true);
		$('.btn-cp').prop('disabled', true);
		function myFunction() {
			$('#view-link').select();
			data = document.execCommand("copy");
			toastr.success("Sao chép thành công!");
		}

		$('#cate').change(function(){
			if($(this).val() != '' && $('#link_minishop').val() != '' && $('#site_url').val() != null) {
				$('#create__link').prop('disabled', false);
				$('#cate').css('border-color', '#ccd0d7')
				$('#site_url').css('border-color', '#ccd0d7')
				$('#link_minishop').css('border-color', '#ccd0d7')
			} else{
				$('#create__link').prop('disabled', true);

				if($('#cate').val() == null) {
					$('#cate').css('border-color', 'red')
				} else{
					$('#cate').css('border-color', '#ccd0d7')
				}

				if($('#site_url').val() == '') {
					$('#site_url').css('border-color', 'red')
				}else{
					$('#site_url').css('border-color', '#ccd0d7')
				}

				if($('#link_minishop').val() == '') {
					$('#link_minishop').css('border-color', 'red')
				} else{
					$('#link_minishop').css('border-color', '#ccd0d7')
				}
			}
			
		})
		
		$('#link_minishop, #site_url').keyup(function(){
			
			if($('#link_minishop').val() != '' && $('#site_url').val() != '' && $('#cate').val() != null ) {
				$('#create__link').prop('disabled', false);
				$('#cate').css('border-color', '#ccd0d7')
				$('#site_url').css('border-color', '#ccd0d7')
				$('#link_minishop').css('border-color', '#ccd0d7')
			} else {
				$('#create__link').prop('disabled', true);

				if($('#cate').val() == null) {
					$('#cate').css('border-color', 'red')
				} else{
					$('#cate').css('border-color', '#ccd0d7')
				}

				if($('#site_url').val() == '') {
					$('#site_url').css('border-color', 'red')
				}else{
					$('#site_url').css('border-color', '#ccd0d7')
				}

				if($('#link_minishop').val() == '') {
					$('#link_minishop').css('border-color', 'red')
				} else{
					$('#link_minishop').css('border-color', '#ccd0d7')
				}
			}
		})
	</script>
@endsection