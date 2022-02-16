@extends('layouts.app')
@section('title', 'Profile Update')
@section('content')
    <style type="text/css" media="screen">
        .in{
            background: none;
        }
    </style>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

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
                                            <form action="{{ route('user.update') }}" method="post" role="form">
                                                @csrf()
                                                <div class="form-group">
                                                    <label for="">Họ Tên</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ $user->contact_name }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Account ID</label>
                                                    <input type="text" class="form-control" name=""
                                                           placeholder="{{ $user->account_id }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Affiliate ID (Hiện Tại)</label>
                                                    <input type="text" class="form-control" name=""
                                                           placeholder="{{ $user->last_contact_affiliate_id }}"
                                                           readonly>
                                                </div>

                                                <div class="form-group {{ $errors->has('site_class') ? 'has-error' : '' }}">
                                                    <label for="">Loại tài khoản</label>
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
                                                    <label for="">Ngày Sinh</label>
                                                    <input type="date" class="form-control has-feedback-left"
                                                           id="birthday" style="padding-left: 12px" name="birthday"
                                                           value="{{ date('Y-m-d', strtotime($user->birthday)) }}"
                                                           required>
                                                    @if($errors->has('birthday'))
                                                        <span class="help-block">{{ $errors->first('birthday') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
                                                    <label for="">Số điện thoại</label>
                                                    <input class="form-control" name="contact_phone" type="number"
                                                           maxlength="21" minlength="8"
                                                           value="{{ $user->contact_phone }}" required>
                                                    @if($errors->has('contact_phone'))
                                                        <span class="help-block">{{ $errors->first('contact_phone') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input class="form-control" type="email" maxlength="50"
                                                           minlength="8" value="{{ $user->contact_mail }}" readonly>
                                                </div>

                                                <div class="form-group {{ $errors->has('email_reception_status') ? 'has-error' : '' }}">
                                                    <label for="">Tần suất nhận Mail</label>
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
                                                    <label for="">Địa chỉ</label>
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
                                                                <option disabled>--Tỉnh Thành Phố--</option>
                                                                @for($i =0; $i< count($provinces); $i++)
                                                                    <option value="{{ $provinces[$i] }}" {{ $provinces[$i] == $user->contact_address2 ?  'selected' : '' }}>{{ $provinces[$i] }}</option>
                                                                @endfor
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
                                                    <label for="">Chủ tài khoản</label>
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
                                                    <label for="">Số tài khoản</label>
                                                    <input type="text" class="form-control" name="bank_account_no"
                                                           maxlength="50"
                                                           {{ $user->bank_confirm == 'Y' ? 'disabled' : ''}}
                                                           value="{{ old('bank_account_no',$user->bank_account_no) }}"
                                                           required
                                                           placeholder="Nhập số tài khoản">
                                                    @if($errors->has('bank_account_no'))
                                                        <span class="help-block">{{ $errors->first('bank_account_no') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('bank_code') ? 'has-error' : '' }}">
                                                    <label for="">Ngân Hàng</label>
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
                                                    <label for="">Chi Nhánh</label>
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
                                             aria-labelledby="profile-tab">
                                            <div class="row">
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
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view img-circle center-block"
                                             src="{{ $user->avatar == null? asset('assets/images/user.png') : url($user->avatar) }}"
                                             alt="Avatar"
                                             title="{{ $user->contact_name }}">
                                    </div>

                                </div>
                                <a class="btn btn-success" style="margin-top: 30px"><i
                                            class="fa fa-edit m-right-xs"></i>Change Avatar</a>

                                <a class="btn btn-warning" style="margin-top: 30px" data-toggle="modal"
                                   href="#modal-pass"><i
                                            class="fa fa-edit m-right-xs"></i>Change Password</a>
                            </div>
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
                            <label for="site_name">Tiêu đề Site
                                <small style="color: red">Tối đa 200 ký tự</small>
                            </label>
                            <input type="text" class="form-control" name="site_name" id="site_name"
                                   placeholder="Tiêu đề site" required maxlength="200">
                        </div>

                        <div class="form-group">
                            <label for="site_url">Site URL
                                <small style="color: red">Tối đa 300 ký tự</small>
                            </label>
                            <input type="text" class="form-control" name="site_url" id="site_url" placeholder="Site URL"
                                   maxlength="300">
                        </div>

                        <div class="form-group">
                            <label for="">Thể Loại</label>
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
                            <label for="site_desc">Mô Tả
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
                            <label for="site_namei">Tiêu đề Site
                                <small style="color: red">Tối đa 200 ký tự</small>
                            </label>
                            <input type="text" class="form-control" name="site_name" id="site_namei"
                                   placeholder="Tiêu đề site" required maxlength="200">
                        </div>

                        <div class="form-group">
                            <label for="site_urli">Site URL
                                <small style="color: red">Tối đa 300 ký tự</small>
                            </label>
                            <input type="text" class="form-control" name="site_url" id="site_urli"
                                   placeholder="Site URL"
                                   maxlength="300">
                        </div>

                        <div class="form-group">
                            <label for="">Thể Loại</label>
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
                            <label for="site_desc">Mô Tả
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
                            <label for="old_pass">Mật Khẩu hiện tại
                            </label>
                            <input type="password" class="form-control" name="old_pass" id="old_pass"
                                   placeholder="Nhập mật khẩu hiện tại" required maxlength="40">
                        </div>

                        <div class="form-group">
                            <label for="new_pass">Mật khẩu mới
                                <small style="color: red">Tối đa 16 ký tự</small>
                            </label>
                            <input type="password" class="form-control" name="new_pass" id="new_pass"
                                   placeholder="Nhập mật khẩu mới"
                                   maxlength="16" minlength="4" required>
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
@endsection
@section('script')
    <script>
        $('#update_site').submit(function (e) {
            $.ajax({
                url: '{{ route('user.siteupdate') }}',
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
                url: '{{ route('user.siteadd') }}',
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
            var cur = $(this);
            $.ajax({
                url: '{{ route('user.sitedelete') }}',
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
        });

        // update pass
        $('#change_pass').submit(function (e) {
            $.ajax({
                url: '{{ route('user.change_password') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success('Thay đổi mật khẩu thành công');

                    }
                },
                error: function (e) {
                    toastr.error('Thay đổi mật khẩu thất bại, xin vui lòng thử lại sau');
                }
            });

            $('#modal-pass').modal('hide');

            // setTimeout(function () {
            //     window.location.reload()
            // }, 2000);

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
                url: '{{ route('user.siteinfo') }}',
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

    </script>
@endsection
