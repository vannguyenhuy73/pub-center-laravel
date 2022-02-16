@extends('layouts.app')
@section('title', 'Lấy link giới thiệu')
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
                                <i class="fa fa-plug"></i> Link Giới Thiệu
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
                            <div class="row text-center">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="api_link">Link của bạn </label>
                                        <div class="input-group">
                                            <input onclick="this.focus();this.select();" readonly="" type="text"
                                                   class="form-control code_format"
                                                   value="https://newpub.adpia.vn/register?referral={{ auth()->id() }}"
                                                   id="api_link">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" title="Copy"
                                                        onclick="copyToClipboard($('#api_link').val())"><i
                                                            class="fa fa-copy"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="prod_title text-danger text-uppercase text-center">Chính sách dành cho
                                        Key Affiliate 2019</h3>
                                    <h4 class="prod_title">1. Chính sách thưởng :</h4>
                                    <p>
                                        Key Affiliate được nhận hoa hồng tương ứng mức phần trăm doanh thu phát sinh từ
                                        Affiliate đăng ký qua link giới thiệu của Key Affiliate đó với mức phần trăm
                                        tương ứng như sau.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Mức thưởng</th>
                                                <th>Điều Kiện</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Level 1</td>
                                                <td><span class="text-danger">5% </span></td>
                                                <td>Tổng doanh thu < 50M</td>
                                            </tr>
                                            <tr>
                                                <td>Level 2</td>
                                                <td><span class="text-danger">8% </span></td>
                                                <td>Tổng doanh thu >= 50M</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="prod_title">2. Quy định chung</h4>
                                    <p>Thời gian áp dụng:</p>
                                    <ul>
                                        <li>Thời gian áp dụng chính sách: Từ 01/04/2019</li>
                                    </ul>
                                    <p>Đối tượng áp dụng: </p>
                                    <ul>
                                        <li>Áp dụng chính sách với thành viên Affiliate của ADPIA và ký hợp đồng Cộng
                                            tác viên giới thiệu Affiliate ( Hợp đồng Key Affiliate).
                                        </li>
                                    </ul>
                                    <p>Quyền lợi đặc biệt:</p>
                                    <ul>
                                        <li>Key Affiliate được cung cấp tài khoản KEY AFFILIATE trên trang
                                            Newpub.adpia.vn có chức năng: Lấy link giới thiệu, quản lý danh sách
                                            Affiliate đăng ký qua link giới thiệu, thống kê hoa hồng, tỉ lệ chuyển đổi
                                            đơn hàng.
                                        </li>
                                    </ul>
                                    <p>Điều kiện nhận thưởng</p>
                                    <ul>
                                        <li>Số liệu được sử dụng để tính mức thưởng là tổng số hoa hồng phát sinh trong
                                            tháng kể từ thời điểm Affiliate đăng ký thông qua link giới thiệu của Key
                                            Affiliate.
                                        </li>
                                        <li>Chỉ các đơn hàng được xác nhận thành công từ phía Merchant mới được sử dụng
                                            làm cơ sở để tính thưởng.
                                        </li>
                                        <li>Mọi chính sách ghi nhận đơn hàng, cookies, chính sách quảng cáo của
                                            Affiliate được áp dụng theo chính sách chung của Merchant.
                                        </li>
                                    </ul>
                                    <p>Thời gian áp dụng nhận thưởng:</p>
                                    <ul>
                                        <li>Với mỗi Affiliate đăng ký qua link giới thiệu thì Key Affiliate sẽ được
                                            hưởng hoa hồng chia sẻ của Affiliate đó trong vòng 120 ngày.
                                        </li>
                                    </ul>
                                    <h4 class="prod_title">3. Quy định về giới thiệu Affiliate: </h4>
                                    <ul>
                                        <li>Affiliate mới được giới thiệu phải là Affiliate chưa từng tạo bất kỳ tài
                                            khoản Affiliate nào trên hệ thống ADPIA trước đó (Căn cứ theo số CMT và tài
                                            khoản ngân hàng của Affiliate đăng ký với ADPIA)
                                        </li>
                                        <li>Nghiêm cấm trường hợp Key affiliate tự tạo tài khoản Affiliate thông qua
                                            link giới thiệu của mình để nhận thưởng.
                                        </li>
                                        <li>Không được sử dụng các hình ảnh hoặc thông tin ko đúng sự thật liên quan tới
                                            ADPIA và Merchant của ADPIA nhằm phục vụ cho việc lôi kéo Affiliate đăng ký.
                                        </li>
                                    </ul>
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
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#sider-bar").sticky({topSpacing: 20});
        });


    </script>
@endsection