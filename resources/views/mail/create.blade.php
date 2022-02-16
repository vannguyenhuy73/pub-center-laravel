@extends('layouts.app')
@section('title', 'Soạn Email')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/dist/css/select2.min.css') }}">
    <style>
        .mail-list li.active a {
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>
                    </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Tìm!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Hòm Thư
                                <small>Bạn còn {{ \App\Http\Helpers\MailHelper::getUnreadMail(auth()->id()) }} email
                                    chưa đọc
                                </small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                                {{--aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="#">Settings 1</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Settings 2</a>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-3 mail_list_column">
                                    <a href="{{ route('mail.create') }}" class="btn btn-success center-block"
                                       style="margin-right: 0px"><i class="fa fa-edit"></i> Soạn Email</a>
                                    <ul class="list-group mail-list">
                                        <li class="list-group-item active">
                                            <span class="badge">{{ $inboxCount }}</span>
                                            <a href="{{ route('mail.index') }}">
                                                <i class="fa fa-envelope"></i> Hộp thư đến
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('mail.index') }}">
                                                <i class="fa fa-send"></i> Hộp thư đi
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('mail.index') }}">
                                                <i class="fa fa-warning"></i> Thư Nháp
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /MAIL LIST -->

                                <!-- CONTENT MAIL -->
                                <div class="col-sm-9 mail_view">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form action="{{ route('mail.store') }}" method="post" role="form">
                                                @csrf
                                                <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                                    <label for="">Chủ Đề</label>
                                                    <input type="text" class="form-control" name="subject" placeholder="Chủ đề"
                                                           required maxlength="400">
                                                    @if ($errors->has('subject'))
                                                        <span class="help-block">{{ $errors->first('subject') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('receit_id') ? 'has-error' : '' }}">
                                                    <label for="">Đến</label>
                                                    <select name="receit_id" id="" class="form-control">
                                                        <option value="APA">Người quản lý Adpia Affiliate</option>
                                                        @foreach($listMerchant as $merchant)
                                                            <option value="{{ $merchant->merchant_id }}">{{ $merchant->site_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('receit_id'))
                                                        <span class="help-block">{{ $errors->first('receit_id') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                                    <label for="content">Nội dung (Tối đa 4000 ký tự)</label>
                                                    <textarea class="form-control" name="content"
                                                              id="content"></textarea>
                                                    @if ($errors->has('content'))
                                                        <span class="help-block">{{ $errors->first('content') }}</span>
                                                    @endif
                                                </div>

                                                <button type="submit" class="btn pull-right btn-primary">Gửi</button>
                                            </form>
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
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@stop