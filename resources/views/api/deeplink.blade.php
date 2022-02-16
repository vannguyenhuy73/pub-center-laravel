@extends('layouts.app')
@section('title', 'DeepLink API')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
    <style>
        pre {
            background-color: #333;
        }

        pre code {
            border: none !important;
            color: #ff5d5d;
            box-shadow: none;
        }
        .x_content a{
            color: #ff5d5d;
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
                            <h2>
                                <i class="fa fa-plug"></i> DeepLink API Docs
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
                                <div class="col-sm-8">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="api_link">Link API </label>
                                        <div class="input-group">
                                            <input onclick="this.focus();this.select();" readonly="" type="text"
                                                   class="form-control code_format"
                                                   value="https://adpia.vn/api/v1/deeplink"
                                                   id="api_link">
                                            <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" title="Copy"
                                            onclick="copyToClipboard($('#api_link').val())"><i
                                                class="fa fa-copy"></i></button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12 col-xs-12">
                                    <h3>Hướng dẫn</h3>

                                    <h4>Tổng Quan</h4>
                                    <ul>
                                        <li>Mô tả: Deeplink API cho phép bạn chuyển hướng đến bất kỳ một link nào trên
                                            trang của merchant.
                                        </li>
                                        <li>
                                            Link: <a
                                                    href="https://adpia.vn/api/v1/deeplink">https://adpia.vn/api/v1/deeplink</a>
                                        </li>
                                        <li>Method: <code>GET</code>, <code>POST</code></li>
                                        <li>Limit Request: <code>None</code></li>
                                    </ul>

                                    <h4>Tham số truyền</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered jambo_table">
                                            <thead>
                                            <tr>
                                                <th>Tham số</th>
                                                <th>Kiểu dữ liệu</th>
                                                <th>Bắt buộc</th>
                                                <th>Mặc định</th>
                                                <th>Mô Tả</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><code>aff</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td>Affiliate ID của tài khoản</td>
                                            </tr>
                                            <tr>
                                                <td><code>aff_sub</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td><code>null</code></td>
                                                <td>Sub Affiliate ID (Max 560 ký tự)</td>
                                            </tr>
                                            <tr>
                                                <td><code>url</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td><code>null</code></td>
                                                <td>URL mà bạn muốn chuyển hướng đến</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h4>Ví dụ</h4>
                                    <p>Target URL:
                                        <a href="https://shopee.vn/thoitrangbiluxury">https://shopee.vn/thoitrangbiluxury</a>
                                    </p>
                                    <p>Encode URL:
                                        <a href="https://shopee.vn/thoitrangbiluxury">https%3A%2F%2Fshopee.vn%2Fthoitrangbiluxury</a>
                                    </p>
                                    <p>Request URL:
                                        <a href="https://adpia.vn/api/v1/deeplink/?a={{ auth()->user()->last_contact_affiliate_id }}&aff_sub=eb1309b2952a12353d08ecd1b302a428&url=https://shopee.vn/thoitrangbiluxury">
                                            https://adpia.vn/api/v1/deeplink/?a={{ auth()->user()->last_contact_affiliate_id }}&aff_sub=eb1309b2952a12353d08ecd1b302a428&url=https%3A%2F%2Fshopee.vn%2Fthoitrangbiluxury
                                        </a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
