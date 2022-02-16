@extends('newpub_layouts.main')
@section('title', 'Newpub Adpia Affiliate Profile')
@section('newpub_style')
<link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
<style>
	.in{
		background: none;
	}
	a.btn {
		color: #ffffff !important;
	}
	@media (max-width: 832px) {
		ul.bar_tabs>li a {
			padding: 10px 10px;
		}
	}
	@media (max-width: 790px) {
		ul.bar_tabs>li a {
			font-size: 12px;
		}
	}
	@media (max-width: 386px) {
		ul.bar_tabs>li a {
			padding: 5px 5px;
		}
	}
	@media (max-width: 366px) {
		ul.bar_tabs {
			padding-left: 0;
		}
	}
	@media (max-width: 352px) {
		ul.bar_tabs>li {
			margin-left: 0;
		}
	}
	@media (max-width: 352px) {
		ul.bar_tabs>li {
			margin-left: 0;
		}
	}
	@media (max-width: 336px) {
		ul.bar_tabs>li a {
			font-size: 10px;
		}
	}
	.newpub-change-password-input {
		position: absolute;
		top: 0;
		right: 10px;
		height: 100%;
		line-height: 34px;
		font-size: 20px;
	}
	.newpub-change-password-input i {
		cursor: pointer;
	}
	.required-symbol {
		color: #ff0000;
	}
	.modal-backdrop {
    	background: #000000;
	}
	body {
		padding-right: 0px !important;
	}
	.avatar-upload-file-button {
		background: blueviolet;
		padding: 10px;
		color: #ffffff;
		border-radius: 5px;
		width: fit-content;
		margin: auto;
		margin-top: 10px;
		transition: all .3s linear;
	}
	.avatar-upload-file-button:hover {
		background: darkorchid;
		cursor: pointer;
		-webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);
		transform: translateY(-4px) scale(1.01);
	}
	.avatar-input-form-data {
		opacity: 0;
		height: 0;
	}
	.avatar-image-preview {
		height: 128px;
		width: 128px;
		margin: auto;
	}
	.avatar-image-preview img {
		height: 100%;
		width: 100%;
		object-fit: cover;
	}
	.p-bottom-10 {
		padding-bottom: 10px;
	}
	.p-top-10 {
		padding-top: 10px;
	}
	#modal-avatar .modal-content {
		position: relative;
	}
	.avatar-loading-text {
		position: absolute;
		top: 50%;
		left: 0;
		text-align: center;
		height: 100%;
		width: 100%;
		display: none;
		font-size: 16px;
		font-weight: 600;
		color: #000000;
	}
</style>
@stop
@section('newpub_main_content')
<div class="col-md-12" style="margin: 0 5px;">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Thông tin cá nhân</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
							aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_content1" id="home-tab"
									role="tab" data-toggle="tab"
									aria-expanded="true">Thông tin chung</a>
								</li>
								<li role="presentation" class="">
									<a href="#tab_content2" role="tab"
									id="profile-tab" data-toggle="tab"
									aria-expanded="false">Danh sách Website</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
								aria-labelledby="home-tab">
								<form action="{{ route('newpub.user.update') }}" method="post" role="form">
									@csrf()
									<div class="form-group">
										<label for="">Họ Tên <span class="required-symbol">*</span></label>
										<input type="text" class="form-control"
										placeholder="{{ $user->contact_name }}" readonly>
									</div>

									<div class="form-group">
										<label for="">Account ID <span class="required-symbol">*</span></label>
										<input type="text" class="form-control" name=""
										placeholder="{{ $user->account_id }}" readonly>
									</div>

									<div class="form-group">
										<label for="">Affiliate ID (Hiện Tại) <span class="required-symbol">*</span></label>
										<input type="text" class="form-control" name=""
										placeholder="{{ $user->last_contact_affiliate_id }}"
										readonly>
									</div>

									<div class="form-group {{ $errors->has('site_class') ? 'has-error' : '' }}">
										<label for="">Loại tài khoản <span class="required-symbol">*</span></label>
										<select name="site_class" class="form-control">
											<option value="1" {{ $user->site_class == 1 ? 'selected' : '' }}>
												Cá Nhân
											</option>
											<option value="2" {{ $user->site_class == 2 ? 'selected' : '' }}>
												Doanh Nghiệp
											</option>
											<option value="3" {{ $user->site_class == 3 ? 'selected' : '' }}>
												Kinh Doanh Cá Thể
											</option>
										</select>
										@if($errors->has('site_class'))
										<span class="help-block">{{ $errors->first('site_class') }}</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
										<label for="">Ngày Sinh <span class="required-symbol">*</span></label>
										<input type="date" class="form-control has-feedback-left"
										id="birthday" style="padding-left: 12px" name="birthday"
										value="{{ date('Y-m-d', strtotime($user->birthday)) }}"
										required>
										@if($errors->has('birthday'))
										<span class="help-block">{{ $errors->first('birthday') }}</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
										<label for="">Số điện thoại <span class="required-symbol">*</span></label>
										<input class="form-control" name="contact_phone" type="text" pattern="[0-9]{10}"
										value="{{ $user->contact_phone }}" required>
										@if($errors->has('contact_phone'))
										<span class="help-block">{{ $errors->first('contact_phone') }}</span>
										@endif
									</div>

									<div class="form-group">
										<label for="">Email <span class="required-symbol">*</span></label>
										<input class="form-control" type="email" maxlength="50"
										minlength="8" value="{{ $user->contact_mail }}" readonly>
									</div>

									<div class="form-group {{ $errors->has('email_reception_status') ? 'has-error' : '' }}">
										<label for="">Tần suất nhận Mail <span class="required-symbol">*</span></label>
										<select name="email_reception_status" class="form-control" required>
											<option value="AUT" {{ $user->email_reception_status == 'AUT' ? 'selected' : '' }}>
												Chỉ nhận những email quan trọng (Nên dùng)
											</option>
											<option value="APR" {{ $user->email_reception_status == 'APR' ? 'selected' : '' }}>
												Nhận tất cả email
											</option>
											<option value="DEN" {{ $user->email_reception_status == 'DEN' ? 'selected' : '' }}>
												Không nhận tất cả
											</option>
										</select>
										@if($errors->has('email_reception_status'))
										<span class="help-block">{{ $errors->first('email_reception_status') }}</span>
										@endif
									</div>


									<div class="form-group {{ $errors->has('contact_address1') ? 'has-error' : '' }}">
										<label for="">Địa chỉ <span class="required-symbol">*</span></label>
										<div class="row">
											<div class="col-sm-6">
												<input type="text" placeholder="Địa chỉ chi tiết"
												name="contact_address1" class="form-control"
												value="{{ $user->contact_address1 }}" maxlength="400"
												required>
											</div>

											<div class="col-sm-6">
												<select name="contact_address2" class="form-control"
												required>
												<option disabled>Tỉnh Thành Phố</option>
											</select>

										</div>
									</div>
									@if($errors->has('contact_address1'))
									<span class="help-block">{{ $errors->first('contact_address1') }}</span>
									@endif
								</div>


								<h3 class="prod_title">Thông tin thanh toán
									<small style="color: red">Lưu ý thông tin này sẽ không thể thay đổi
										lại
									</small>
								</h3>

								<div class="form-group {{ $errors->has('owner_name') ? 'has-error' : '' }}">
									<label for="">Chủ tài khoản <span class="required-symbol">*</span></label>
									<input type="text" class="form-control" name="owner_name"
									maxlength="50"
									{{ $user->bank_confirm == 'Y' ? 'disabled' : ''}}
									value="{{ $user->owner_name }}" required
									placeholder="Tên chủ tài khoản">
									@if($errors->has('owner_name'))
									<span class="help-block">{{ $errors->first('owner_name') }}</span>
									@endif
								</div>

								<div class="form-group {{ $errors->has('bank_account_no') ? 'has-error' : '' }}">
									<label for="">Số tài khoản <span class="required-symbol">*</span></label>
									<input type="text" class="form-control" name="bank_account_no"
									maxlength="50" minlength="4" 
									{{ $user->bank_confirm == 'Y' ? 'disabled' : ''}}
									value="{{ old('bank_account_no',$user->bank_account_no) }}"
									required
									placeholder="Nhập số tài khoản">
									@if($errors->has('bank_account_no'))
									<span class="help-block">{{ $errors->first('bank_account_no') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('bank_code') ? 'has-error' : '' }}">
									<label for="">Ngân Hàng <span class="required-symbol">*</span></label>
									<select name="bank_code"
									class="form-control"
									name="bank_code" {{ $user->bank_confirm == 'Y' ? 'disabled' : ''}}>
									<option disabled selected>--Chọn Ngân hàng--</option>
									@foreach($banks as $bank)
									<option value="{{ $bank->code }}" {{ $bank->code == $user->bank_code ? 'selected' : '' }}>{{ $bank->code_name_vnm }}</option>
									@endforeach
								</select>
								@if($errors->has('bank_branch'))
								<span class="help-block">{{ $errors->first('bank_branch') }}</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
								<label for="">Chi Nhánh <span class="required-symbol">*</span></label>
								<input type="text" class="form-control" name="bank_branch"
								{{ $user->bank_confirm == 'Y' ? 'disabled' : ''}}
								maxlength="100"
								value="{{ old('bank_branch', $user->bank_branch) }}" required
								placeholder="Nhập chi nhánh">
								@if($errors->has('bank_branch'))
								<span class="help-block">{{ $errors->first('bank_branch') }}</span>
								@endif
							</div>

							<button type="submit" class="btn btn-primary">Update</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab_content2"
					aria-labelledby="profile-tab" style="overflow: auto;">
					<div>
						<div class="col-sm-12">
							<a class="btn btn-primary pull-right" data-toggle="modal"
							href="#modal-add">Thêm Website</a>
						</div>
					</div>
					<!-- start user projects -->
					<table class="data table table-striped no-margin">
						<thead>
							<tr>
								<th>#</th>
								<th>Affiliate ID</th>
								<th>Tiêu Đề Site</th>
								<th>Link Site</th>
								<th>Tạo Ngày</th>
								<th>Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							@foreach($affiliates as $key => $affiliate)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $affiliate->affiliate_id }}</td>
								<td>{{ $affiliate->site_name }}</td>
								<td>{{ $affiliate->site_url }}</td>
								<td>{{ $affiliate->create_time_stamp }}</td>
								<td>
									<a class="btn btn-primary btn-sm btn-edit"
									data-id="{{ $affiliate->affiliate_id }}">
									<i class="fa fa-edit"> </i>
								</a>
								<a href="#"
								class="btn btn-danger btn-sm {{ auth()->user()->last_contact_affiliate_id ==  $affiliate->affiliate_id ? '' : 'btn-delete'}}"
								data-id="{{ $affiliate->affiliate_id }}" {{ auth()->user()->last_contact_affiliate_id ==  $affiliate->affiliate_id ? 'disabled' : ''}}
								>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- end user projects -->

		</div>
	</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_left text-center">
	<div class="profile_img">
		<div id="crop-avatar" style="width: 200px; height: 200px; margin: auto;">
			<!-- Current avatar -->
			<img class="img-responsive avatar-view img-circle center-block"
			src="{{ $user->avatar == null? asset('assets/images/user.png') : url($user->avatar) }}"
			alt="Avatar"
			title="{{ $user->contact_name }}" style="height: 100%; width: 100%; object-fit: cover;">
		</div>

	</div>
	<a class="btn btn-success change-avatar-button" style="margin-top: 30px" data-toggle="modal" data-target="#modal-avatar">
		<i class="fa fa-edit m-right-xs"></i>Change Avatar
	</a>

		<a class="btn btn-warning" style="margin-top: 30px" data-toggle="modal" href="#modal-pass">
			<i class="fa fa-edit m-right-xs"></i>Change Password
		</a>
	</div>
</div>
</div>
</div>
</div>
</div>

<!-- /page content -->
<div class="modal fade" id="modal-info">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" role="form" id="update_site">
				@csrf()
				<input type="hidden" name="affiliate_id" id="affiliate_id" value="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cập nhật thông tin</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="site_name">Tiêu đề Site <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 200 ký tự</small>
						</label>
						<input type="text" class="form-control" name="site_name" id="site_name"
						placeholder="Tiêu đề site" required maxlength="200">
					</div>

					<div class="form-group">
						<label for="site_url">Site URL <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 300 ký tự</small>
						</label>
						<input type="text" class="form-control" name="site_url" id="site_url" placeholder="Site URL"
						maxlength="300">
					</div>

					<div class="form-group">
						<label for="">Thể Loại <span class="required-symbol">*</span></label>
						<div class="row">
							<div class="col-sm-6">
								<select name="category_site" class="category_site form-control" required>
									@foreach($categories as $category)
									<option value="{{ $category->category_code }}">{{ $category->code_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-6">
								<select name="category_child_site" class="category_child_site form-control"
								required>
								@foreach($categoryChilds as $category)
								<option value="{{ $category->category_code }}"
									data-parent="{{ $category->upper_code }}">{{ $category->code_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="site_desc">Mô Tả <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 400 ký tự</small>
						</label>
						<textarea class="form-control" name="site_desc" id="site_desc" placeholder="Site URL"
						required maxlength="400" rows="4"></textarea>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" role="form" id="add_site">
				@csrf()
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Thêm Website</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="site_namei">Tiêu đề Site <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 200 ký tự</small>
						</label>
						<input type="text" class="form-control" name="site_name" id="site_namei"
						placeholder="Tiêu đề site" required maxlength="200">
					</div>

					<div class="form-group">
						<label for="site_urli">Site URL <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 300 ký tự</small>
						</label>
						<input type="text" class="form-control" name="site_url" id="site_urli"
						placeholder="Site URL"
						maxlength="300">
					</div>

					<div class="form-group">
						<label for="">Thể Loại <span class="required-symbol">*</span></label>
						<div class="row">
							<div class="col-sm-6">
								<select name="category_site" class="category_site form-control" required>
									@foreach($categories as $category)
									<option value="{{ $category->category_code }}">{{ $category->code_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-6">
								<select name="category_child_site" class="category_child_site form-control"
								required>
								@foreach($categoryChilds as $category)
								<option value="{{ $category->category_code }}"
									data-parent="{{ $category->upper_code }}">{{ $category->code_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="site_desc">Mô Tả <span class="required-symbol">*</span>
							<small style="color: red">Tối đa 400 ký tự</small>
						</label>
						<textarea class="form-control" name="site_desc" id="site_desci" placeholder="Site URL"
						required maxlength="400" rows="4"></textarea>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-pass">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" role="form" id="change_pass">
				@csrf()
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Đồi mật khẩu</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="old_pass">Mật Khẩu hiện tại <small style="color: red">*</small>
						</label>
						<div style="position: relative;">
							<input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Nhập mật khẩu hiện tại" required maxlength="40">
							<div class="newpub-change-password-input"><i class="fa fa-eye" onclick="showHidePassword('old_pass', this)"></i></div>
						</div>
					</div>

					<div class="form-group">
						<label for="new_pass">Mật khẩu mới <small style="color: red">*</small>
							<small style="color: red">Tối đa 16 ký tự</small>
						</label>
						<div style="position: relative;">
							<input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Nhập mật khẩu mới" maxlength="16" minlength="6" required>
							<div class="newpub-change-password-input"><i class="fa fa-eye" onclick="showHidePassword('new_pass', this)"></i></div>
						</div>
					</div>

					<div class="form-group">
						<label for="new_pass">Nhập lại mật khẩu <small style="color: red">*</small>
						</label>
						<div style="position: relative;">
							<input type="password" class="form-control" name="renew_pass" id="renew_pass" placeholder="Nhập lại mật khẩu mới">
							<div class="newpub-change-password-input"><i class="fa fa-eye" onclick="showHidePassword('renew_pass', this)"></i></div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-avatar">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" role="form" id="change_avatar">
				@csrf()
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Đồi ảnh đải diện</h4>
				</div>
				<div class="modal-body text-center">
					<div class="">
						<div class="p-bottom-10">
							<span>Dung lượng file tối đa không vượt quá 2MB</span>
						</div>
						<div class="avatar-image-preview">
							<img src="/images/avatar-uploading-icon.png" alt="">
						</div>
						<div class="p-top-10 avatar-upload-status">
							<span>Chọn file ảnh muốn tải lên</span>
						</div>
						<div class="">
							<div class="avatar-upload-file-button">
								CHỌN FILE ẢNH
							</div>
						</div>
					</div>
					@csrf
					<input class="avatar-input-form-data" type="file" class="form-control" name="avatar" id="avatar" required accept="image/*">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" disabled class="btn btn-primary submit-update-avatar-button">Update</button>
				</div>
			</form>
			<div class="avatar-loading-text">
				Đang cập nhật dữ liệu, xin vui lòng chờ...
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('newpub_script')
<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('js/dvhc_data.js') }}"></script>
<script>
	$(document).ready(function() {
		var html = '';

		$.each(local.data, function(index, val) {
			html += '<option value="' + val.name + '"' + (val.name == '{{ $user->contact_address2 }}' ? ' selected' : '' ) + '>' + val.name + '</option>';
		});

		$("select[name=contact_address2]").append(html);
	});

	$('#update_site').submit(function (e) {
		$.ajax({
			url: '{{ route('newpub.user.siteupdate') }}',
			method: 'POST',
			data: $(this).serialize(),
			success: function (data) {
				if (data.status == 200) {
					toastr.success('Update thành công');
				}
			},
			error: function (e) {
				toastr.error('Update thất bại, xin vui lòng thử lại sau');
			}
		});

		$('#modal-info').modal('hide');
		e.preventDefault();
	});

        //add
        $('#add_site').submit(function (e) {
        	$.ajax({
        		url: '{{ route('newpub.user.siteadd') }}',
        		method: 'POST',
        		data: $(this).serialize(),
        		success: function (data) {
        			if (data.status == 200) {
        				toastr.success('Thêm thành công');
        			}
        		},
        		error: function (e) {
        			toastr.error('Thêm thất bại, xin vui lòng thử lại sau');
        		}
        	});

        	$('#modal-add').modal('hide');

        	setTimeout(function () {
        		window.location.reload()
        	}, 2000);

        	e.preventDefault();
        });

        // delete

        $('.btn-delete').click(function () {
        	if(confirm('Website đã xóa không thể khôi phục lại, bạn có chắc chắn muốn xóa?')) {
        		var cur = $(this);
        		$.ajax({
        			url: '{{ route('newpub.user.sitedelete') }}',
        			method: 'POST',
        			data: {affiliate_id: $(this).attr('data-id'), _token: '{{ csrf_token() }}'},
        			success: function (data) {
        				if (data.status == 200) {
        					toastr.success('Xóa thành công');

        					cur.parent().parent().remove();
        				}
        			},
        			error: function (e) {
        				toastr.error('Thêm thất bại, xin vui lòng thử lại sau');
        			}
        		});

        		return false;
        	}
        });

        // update pass
        $('#change_pass').submit(function (e) {
        	e.preventDefault();
        	if($("#new_pass").val() != $("#renew_pass").val()) {
        		alert('Nhập lại mật khẩu không đúng!'); return;
        	}
        	$.ajax({
        		url: '{{ route('newpub.user.change_password') }}',
        		method: 'POST',
        		data: $(this).serialize(),
        		success: function (data) {
        			if (data.status == 200) {
        				toastr.success('Thay đổi mật khẩu thành công');
        				$("body").css('padding-right', '0');
        			}
        		},
        		error: function (e) {
        			toastr.error('Thay đổi mật khẩu thất bại, xin vui lòng thử lại sau');
        			$("body").css('padding-right', '0');
        		}
        	});
        	$(".modal-backdrop").remove();

        	$('#modal-pass').modal('hide');

        	e.preventDefault();
        });

        $('.category_site').change(function () {
        	var cate = $(this).val();
        	var opts = document.getElementById('category_child_site').options;
        	for (i = 0; i < opts.length; i++) {
        		opts[i].style.display = 'none';
        		if (cate == opts[i].getAttribute('data-parent')) {
        			opts[i].style.display = 'block';
        		}
        	}
        });

        function getInfo(id) {
        	$.ajax({
        		url: '{{ route('newpub.user.siteinfo') }}',
        		method: 'POST',
        		data: {
        			affiliate_id: id, _token: '{{ csrf_token() }}'
        		},
        		success: function (data) {
        			if (data.status == 200) {
        				data = data.data;
        				$('#site_name').val(data.site_name);
        				$('#site_url').val(data.site_url);
        				$('#site_desc').val(data.site_desc);

        				$('#category_site').val(data.category1);
        				$('#category_child_site').val(data.category2);
        			}
        		}
        	});
        }

        $('.btn-edit').click(function () {
        	var id = $(this).attr('data-id');
        	$('#affiliate_id').val(id);
        	getInfo(id);
        	$('#modal-info').modal('show');
        	return false;
        });

        function showHidePassword(obj, ico) {
        	if($("#"+obj).attr("type") == "password") {
        		$("#"+obj).attr("type", "text");
        		$(ico).attr('class', 'fa fa-eye-slash');
        	} else {
        		$("#"+obj).attr("type", "password");
        		$(ico).attr('class', 'fa fa-eye');
        	}
        }

		function clearUpdateAvatarModal() {
			$(".avatar-image-preview").css({
				borderRadius: "0",
				overflow: "hidden"
			});
			$(".avatar-image-preview img").attr("src", "/images/avatar-uploading-icon.png");
			$(".avatar-upload-file-button").html("CHỌN FILE ẢNH");
			$(".avatar-upload-status").html("Chọn file ảnh muốn tải lên");
			$(".avatar-upload-status").css('color', '#000000');
			$(".submit-update-avatar-button").attr("disabled", true);
		}

		$(".change-avatar-button").click(function(event) {
			clearUpdateAvatarModal();
		});

		$(".avatar-upload-file-button").click(function(event) {
			$(".avatar-input-form-data").click();
		});

		$("#modal-avatar").on("change", "input[name=avatar]", function(event) {
			var file = this.files[0];
			if(typeof file == "undefined") {
				clearUpdateAvatarModal();
			} else {
				if(!['image/gif', 'image/jpeg', 'image/png'].includes(file["type"])) {
					clearUpdateAvatarModal();
					$(".avatar-upload-status").html("File bạn chọn không phải là file ảnh!");
					$(".avatar-upload-status").css('color', '#ff0000');
				} else {
					if(file["size"] > 2097152) {
						clearUpdateAvatarModal();
						$(".avatar-upload-status").html("File bạn chọn dung lượng vượt quá 2MB!");
						$(".avatar-upload-status").css('color', '#ff0000');
					} else {
						var reader = new FileReader();
						reader.readAsDataURL(file);
						reader.onload = function(e) {
							$(".avatar-image-preview").css({
								borderRadius: "50%",
								overflow: "hidden"
							});

							if (file["size"] > (1024 * 1024)) {
								var fileSize = Math.floor(file["size"] / (1024 * 1024));
								fileSize += "MB";
							} else if(file["size"] > 1024) {
								var fileSize = Math.floor(file["size"] / 1024);
								fileSize += " KB";
							}

							var fileName = file["name"].length > 20 ? file["name"].substr(0, 20) + "..." : file["name"];

							$(".avatar-image-preview img").attr("src", e.target.result);
							$(".avatar-upload-file-button").html("THAY ĐỔI FILE ẢNH");
							$(".avatar-upload-status").html("Tên : " + fileName + "<br>Dung lượng : " + fileSize);
							$(".avatar-upload-status").css('color', '#000000');
							$(".submit-update-avatar-button").attr("disabled", false);
						}
					}
				}
			}
		});

		$(".submit-update-avatar-button").click(function(event) {
			event.preventDefault();
			let dots_num = 0;
    		let dots_text = "";
			$("body").css({ pointerEvents: "none" });
			$("#modal-avatar .modal-body").animate({
				opacity: 0.1
			}, 500, function() {
				$(".avatar-loading-text").css("display", "block");
			});

			let timer = setInterval(function(){
		        dots_text = "";
		        for(var i = 0; i < dots_num; i++) {
		            dots_text += ".";
		        }

		        $(".avatar-loading-text").html("Đang cập nhật dữ liệu, xin vui lòng chờ" + dots_text);

		        dots_num++;

		        if(dots_num > 3) {
		            dots_num = 0;
		        }
		    }, 500);

			var formElement = $("#change_avatar")[0];
			var formData = new FormData(formElement);

			$.ajax({
				url: '{{ route('avatar_update') }}',
				type: 'POST',
				dataType: 'json',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(res) {
				if(res.status == 200) {
					clearInterval(timer);
					$(".avatar-loading-text").html("Cập nhật thành công! Đang tiến hành load lại trang.");
					window.location.reload();
				} else {
					toastr.error('Update thất bại, xin vui lòng thử lại sau');
				}
			});
		});
    </script>
    @stop