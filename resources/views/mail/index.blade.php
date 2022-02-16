@extends('layouts.app')
@section('title', 'Email')
@section('style')
    <style>
        .mail-list li.active a {
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Hòm Thư
                                <small>Bạn còn
                                    <font color="red">{{ \App\Http\Helpers\MailHelper::getUnreadMail(auth()->id()) }}</font>
                                    email chưa đọc
                                </small>
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
                            <div class="row">
                                <div class="col-sm-3 col-xs-12 mail_list_column">
                                    <ul class="list-group mail-list">
                                        <a href="{{ route('mail.create') }}" class="btn btn-success center-block"
                                           style="margin-right: 0px"><i class="fa fa-edit"></i> Soạn Email</a>

                                        <li class="list-group-item {{ $active == 'inbox' ? 'active' : '' }}">
                                            <span class="badge">{{ $inboxCount }}</span>
                                            <a href="{{ route('mail.index') }}">
                                                <i class="fa fa-envelope"></i> Hộp thư đến
                                            </a>
                                        </li>
                                        <li class="list-group-item {{ $active == 'sent' ? 'active' : '' }}">
                                            <a href="{{ route('mail.sent') }}">
                                                <i class="fa fa-send"></i> Hộp thư đi
                                            </a>
                                        </li>
                                        <li class="list-group-item {{ $active == 'save' ? 'active' : '' }}">
                                            <a href="{{ route('mail.save') }}">
                                                <i class="fa fa-warning"></i> Thư đã lưu
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /MAIL LIST -->

                                <!-- CONTENT MAIL -->
                                <div class="col-sm-9 col-xs-12 mail_view">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form action="" method="post" class="form-inline" role="form">
                                                <a href="#" id="selectAll" class="btn btn-default"
                                                   data-status="checked">Chọn tất cả</a>
                                                <a href="#" class="btn btn-danger" id="delete_checked">Xóa</a>
                                                @if ($active == 'inbox')
                                                    <a href="#" class="btn btn-primary" id="save_check">Lưu</a>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="mail_list">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tiêu Đề</th>
                                                <th>Gửi Bởi</th>
                                                <th>Gửi Lúc</th>
                                                <th>Hành Động</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($mails) && count($mails))
                                                @foreach($mails as $mail)
                                                    <tr>
                                                        <td><input type="checkbox" data-id="{{ $mail->mail_id }}">
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('mail.show', $mail->mail_id) }}">{{ $mail->title }}</a>
                                                             @if($mail->read_date == null) <span class="label label-danger">Chưa đọc</span> @endif
                                                        </td>
                                                        <td>{{ $mail->sender_name }}</td>
                                                        <td>{{ date('h:i:m d-m-Y', strtotime($mail->send_date)) }}</td>
                                                        <td>
                                                            <a href="javascript:;"
                                                               onclick="deleteComfirm('{{ route('mail.destroy', [$mail->mail_id, $active == 'inbox' ? 'i' : 's']) }}')"
                                                               class="btn btn-danger btn-sm"> <i
                                                                        class="fa fa-trash"></i></a>
                                                            <a href="{{ route('mail.show', $mail->mail_id) }}"
                                                               class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">Hòm thư trống</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                {{ $mails->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /CONTENT MAIL -->
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
        $('#selectAll').click(function () {

            if ($(this).attr('data-status') == 'checked') {
                $(this).attr('data-status', 'unchecked');
                $(this).text('Bỏ Chọn tất cả');
                $('#mail_list input:checkbox').prop('checked', true);

                return false;
            }
            $(this).attr('data-status', 'checked');
            $(this).text('Chọn tất cả');
            $('#mail_list input:checkbox').prop('checked', false);

            return false
        });

        $('#delete_checked').click(function () {
            if ($('#mail_list input:checkbox:checked').length == 0) {
                toastr.error('Bạn phải chọn ít nhất một email');
                return;
            }

            var checked = [];

            $('#mail_list input:checkbox:checked').each(function (i, e) {
                checked.push($(e).attr('data-id'));
            });

            $.ajax({
                url: '{{ route('mail.destroy.list') }}',
                method: 'POST',
                data: {id: checked, _token: '{{ csrf_token() }}', type: '{{ $active == 'inbox' ? 'I' : 'S' }}'},
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success('Xóa thành công ' + data.message + ', page sẽ load lại sau 2s!');

                        setTimeout(function () {
                            window.location.reload()
                        }, 2000);

                        return true;
                    }
                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');

                    return false;
                }
            });

            return false;
        });

        @if ($active == 'inbox')
        $('#save_check').click(function () {
            if ($('#mail_list input:checkbox:checked').length == 0) {
                toastr.error('Bạn phải chọn ít nhất một email');
                return;
            }

            var checked = [];

            $('#mail_list input:checkbox:checked').each(function (i, e) {
                checked.push($(e).attr('data-id'));
            });

            $.ajax({
                url: '{{ route('mail.save.list') }}',
                method: 'POST',
                data: {id: checked, _token: '{{ csrf_token() }}'},
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success('Lưu thành công ' + data.message + ', page sẽ load lại sau 2s!');

                        setTimeout(function () {
                            window.location.reload()
                        }, 2000);

                        return true;
                    }
                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                    return false;
                }
            });

            return false;
        });
        @endif
    </script>
@endsection