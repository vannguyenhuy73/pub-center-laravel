@extends('layouts.app')
@section('title', ucfirst($notice->title))
@section('style')
    <style>
        span.strong {
            width: 100px;
            font-weight: bold;
        }

        .links {
            color: deepskyblue;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"] + label {
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        input[type="radio"] + label span {
            box-shadow: 0 0 0 2px #827c7c;
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: -1px 7px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
        }

        input[type="radio"] + label span {
            border: 2px solid #ffffff;
            /*background-color: #827c7c;*/
        }

        input[type="radio"]:checked + label span {
            background-color: red;
        }
        .notice-content img{
            max-width: 100%!important;
            height: auto!important;
        }
    </style>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <i class="fa fa-th"></i> {{ ucfirst($notice->title) }}
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
                            <div class="row notice-content">
                                {!! $notice->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="x_panel" id="sider-bar">
                        <div class="x_title">
                            <h2>
                                <i class="fa fa-th"></i> Thông Báo Khác
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content ">


                            <ul class="list-group">
                                @if(isset($otherNotices))
                                    @foreach($otherNotices as $notice)
                                        <li class="list-group-item"><a
                                                    href="{{ route('notice.show', $notice->article_id) }}">{{ $notice->title }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#sider-bar").sticky({topSpacing: 20, bottomSpacing: 160});
        });
    </script>
@endsection