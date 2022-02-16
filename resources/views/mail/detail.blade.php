@extends('layouts.app')
@section('style')
    <style>
        .mail-list li.active a {
            color: white;
        }
        .view-mail {
            overflow-x: auto;
        }
        .view-mail img{
            max-width: 100%!important;
            height: auto!important;
        }
        .mt-5{
            margin-top:5px;
            margin-bottom:10px;
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
                                <small>Bạn còn {{ \App\Http\Helpers\MailHelper::getUnreadMail(auth()->id()) }} email
                                    chưa đọc
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
                        <div class="x_content">{{--                                </div>--}}
                                <!-- /MAIL LIST -->

                                <!-- CONTENT MAIL -->
                                <div class="col-sm-12 col-xs-12 mail_view">
                                    <div class="inbox-body">
                                        <div class="mail_heading row">
                                            <div class="col-md-8">
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-primary" type="button"><i
                                                                class="fa fa-reply"></i> Reply
                                                    </button>
                                                    <button class="btn btn-sm btn-default" type="button"
                                                            data-placement="top" data-toggle="tooltip"
                                                            data-original-title="Forward"><i class="fa fa-share"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-default" type="button"
                                                            data-placement="top" data-toggle="tooltip"
                                                            data-original-title="Print" onclick="window.print()"><i
                                                                class="fa fa-print"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-default" type="button"
                                                            data-placement="top" data-toggle="tooltip"
                                                            data-original-title="Trash"><i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4 text-right">
                                                <p class="date"> {{ $mailInfo->send_date }}</p>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <h4>{{ $mailInfo->title }}</h4>
                                            </div>
                                        </div>
                                        <div class="sender-info">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12 mt-5 ">
                                                    <strong>{{ $mailInfo->senderName }}</strong>
                                                    to
                                                    <strong>me</strong>
                                                    <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="view-mail">
                                            {!! $content !!}
                                        </div>
                                        {{--<div class="attachment">--}}
                                        {{--<p>--}}
                                        {{--<span><i class="fa fa-paperclip"></i> 3 attachments — </span>--}}
                                        {{--<a href="#">Download all attachments</a> |--}}
                                        {{--<a href="#">View all images</a>--}}
                                        {{--</p>--}}
                                        {{--<ul>--}}
                                        {{--<li>--}}
                                        {{--<a href="#" class="atch-thumb">--}}
                                        {{--<img src="{{ asset('assets/images/inbox.png') }}" alt="img"/>--}}
                                        {{--</a>--}}

                                        {{--<div class="file-name">--}}
                                        {{--image-name.jpg--}}
                                        {{--</div>--}}
                                        {{--<span>12KB</span>--}}


                                        {{--<div class="links">--}}
                                        {{--<a href="#">View</a> ---}}
                                        {{--<a href="#">Download</a>--}}
                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        <div class="btn-group" style="margin-top: 25px">
                                            <button class="btn btn-sm btn-primary" type="button"><i
                                                        class="fa fa-reply"></i> Reply
                                            </button>
                                            <button class="btn btn-sm btn-default" type="button"
                                                    data-placement="top" data-toggle="tooltip"
                                                    data-original-title="Forward"><i class="fa fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-default" type="button"
                                                    data-placement="top" data-toggle="tooltip"
                                                    data-original-title="Print" onclick="window.print()"><i
                                                        class="fa fa-print"></i>
                                            </button>
                                            <button class="btn btn-sm btn-default" type="button"
                                                    data-placement="top" data-toggle="tooltip"
                                                    data-original-title="Trash" onclick=""><i class="fa fa-trash-o"></i>
                                            </button>
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

@stop