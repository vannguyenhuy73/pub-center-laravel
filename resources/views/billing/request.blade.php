@extends('layouts.app')
@section('title', 'Yêu cầu rút tiền')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>
        ul.list-action {
            padding-top: 10px;
            margin: 0;
            text-align: center;
        }

        ul.list-action li {
            display: inline-block;
            padding: 10px 30px;
            text-align: center;
        }

        ul.list-action li h3 {
            font-size: 15px;
            margin-top: 15px;
            color: #333333;
        }

        ul.list-action li a {
            /*margin: 0 auto;*/
            margin-top: 10px;
        }

        ul.list-action li .fea-img {
            margin: 0 auto;
            display: block;
            width: 110px;
            height: 77px;
            background-repeat: no-repeat;
            background-position: 0;
            /*background-color: red;*/
            background-image: url("{{ asset('images/commission.png') }}");
        }

        ul.list-action li:hover {
            box-shadow: 0px 0px 138px -49px #4b4b4b;
        }

        ul.list-action li .fea-img.contract {
            background-position: 0 -77px;
        }

        ul.list-action li .fea-img.contract.disabled {
            background-position: 0 -154px;
        }

        ul.list-action li .fea-img.commission.disabled {
            background-position: 0 -231px;
        }

        ul.list-action li .fea-img.commission {
            background-position: 0 -308px;
        }

        ul.list-action li .fea-img.certificate {
            background-position: 0 -458px;
        }

        ul.list-action li .fea-img.certificate.disabled {
            background-position: 0 -387px;
        }

        ul.list-action li a.btn-commission {
            padding: 6px 30px;
            color: white;
        }

        ul.list-action li a.btn-commission.commission {
            background-color: #1b7ed9;
        }

        ul.list-action li a.btn-commission.contract {
            background-color: #5556e8;
        }

        ul.list-action li a.btn-commission.certificate {
            background-color: #21cf80;
        }
    </style>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Yêu cầu rút tiền</h2>
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
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($requested)
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        Tháng này bạn đã yêu cầu rút tiền vào ngày {{ $requested->create_time_stamp }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <h3><strong>Hoa hồng có thể rút: <font color="red">{{ $payable }}
                                            VND</font></strong></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="product_price">
                                        <div class="text-center" style="padding: 30px 0">
                                            <h3 class="box-title" style="margin-top: 0">THỜI GIAN HOẠCH ĐỊNH CẤP HOA
                                                HỒNG</h3>
                                            <p>Ngày 22 hàng tháng (kết quả tháng trước)</p>
                                            <p>Thời gian yêu cầu: Từ ngày 10-12 và 25-27 hàng tháng</p>
                                            <p>Thời gian cấp: Sau 3 ngày làm việc kể từ ngày kết thúc yêu cầu</p>
                                        </div>
                                    </div>
                                    <p class="text-center">Hết hạn yêu cầu hoa hồng. (<font color="red">Thời gian 10-12
                                            và 25-27 hàng tháng</font>)</p>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <ul class="list-action">
                                        <li>
                                            <div class="fea-img commission {{ (!$acceptRequest || $requested) ? 'disabled' : '' }}"></div>
                                            <h3>CẤP HOA HỒNG</h3>
                                            <a data-toggle="modal" href="#modal-request"
                                               {{ (!$acceptRequest || $requested) ? 'disabled' : '' }}
                                               class="btn btn-round btn-commission commission">YÊU CẦU</a>
                                        </li>
                                        <li>
                                            <div class="fea-img contract"></div>
                                            <h3>HỢP ĐỒNG CTV</h3>
                                            <a href="https://adpia.vn/info/HDCTV.doc"
                                               class="btn btn-round btn-commission contract ">DOWNLOAD</a>
                                        </li>
                                        <li>
                                            <div class="fea-img contract certificate {{ auth()->user()->bill_ready_request == 'Y' ? 'disabled' : '' }}"></div>
                                            <h3>CMT CÁ NHÂN</h3>
                                            <a data-toggle="modal" href="#modal-identity"
                                               {{ auth()->user()->bill_ready_request == 'Y' ? 'disabled' : '' }}
                                               class="btn btn-round btn-commission certificate">BỔ SUNG</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <h3>TRƯỜNG HỢP CHUYỂN TIỀN Ở CÁC NGÂN HÀNG NƯỚC NGOÀI</h3>
                                    <p>Có thể đăng ký qua gọi điện thoại, và sẽ được cấp một số tiền đã trừ chi phí
                                        chuyển từ số tiền gốc lẽ ra được nhận</p>
                                    <p>Địa chỉ gửi</p>
                                    <p>
                                        <label>Email:</label> <a href="mailto:affiliate@adpia.vn"><font color="red">affiliate@adpia.vn</font></a>
                                        <br/>
                                        <label>Địa chỉ:</label> Công ty ADPIA Tầng 30 tòa nhà Handico Phạm Hùng, Nam Từ Liêm, Hà Nội
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <img src="{{ asset('images/congtacvien.jpg') }}" alt="Cong tac vien"
                                         class="img-responsive center-block" style="margin-top: 30px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($acceptRequest && !$requested)
        <div class="modal fade" id="modal-request">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" role="form">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Rút Tiền</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <div class="product_price">
                                    <p>Chúng tôi sẽ chuyển tiền cho bạn vào: </p>
                                    <ul>
                                        <li>Tài khoản: <span class="text-danger">{{ auth()->user()->owner_name }}</span></li>
                                        <li>Số tài khoản: <span class="text-danger">{{ auth()->user()->bank_account_no }}</span></li>
                                        <li>Ngân Hàng: <span class="text-danger">{{ getCodeName(auth()->user()->bank_code) }}</span></li>
                                        <li>Chi nhánh: <span class="text-danger">{{ auth()->user()->bank_branch }}</span></li>
                                    </ul>
                                    <p style="color: #b10101;">
                                        <i class="fa fa-hand-o-right"></i>
                                        Nếu thông tin trên không đúng, xin vui lòng liên hệ chúng tôi để đổi.
                                    </p>
                                </div>
                                <ul class="invalid-feedback" style="padding-left: 22px; color: #b10101;">
                                    {{--<li>Bạn chỉ có thể rút tiền khi bạn đã đăng ký đầy đủ thông tin trên hệ thống của--}}
                                        {{--chúng--}}
                                        {{--tôi.--}}
                                    {{--</li>--}}
                                    {{--<li>Nếu bạn chưa ký hợp động đồng cộng tác viên với chúng tôi thì bạn sẽ không thể--}}
                                        {{--rút--}}
                                        {{--tiền--}}
                                    {{--</li>--}}
                                    {{--<li>Số tiền rút phải lớn hơn hoặc bằng 200,000 VNĐ và phải là bội số của 10,000--}}
                                        {{--VNĐ--}}
                                    {{--</li>--}}
                                </ul>
                                <label for="">Số tiền (Tối thiểu 200.000VNĐ)</label>
                                <div class="row">
                                    <div class="col-sx-12 col-sm-6">
                                        <input type="number" class="form-control" name="amount" id="amount"
                                               max="{{ str_replace(',', '', $payable) }}" min="200000" value="0">
                                    </div>
                                    <div class="col-sx-12 col-sm-6" style="padding-top: 5px">
                                        <span class="label label-success" id="amount-money">0 VNĐ</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Rút Tiền</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif

    @if(auth()->user()->bill_ready_request != 'Y')
        <div class="modal fade" id="modal-identity">
            <div class="modal-dialog">
                <form action="{{ route('user.updateidentity') }}" method="post" role="form"
                      enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Cập nhât chứng minh nhân dân</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Mặt Trước (<5MB)</label>
                                <input type="file" name="front-card" required accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="">Mặt Sau (<5MB)</label>
                                <input type="file" name="post-card" required accept="image/*">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endsection
@section('script')
    <script>
        $('#amount').on('keyup',function () {
            value = $(this).val();
            $('#amount-money').text(addCommas(value) + ' VNĐ');
            // document.getElementById('result').innerText = addCommas(document.getElementById('moneyinday').value) + ' VNĐ';
        });
        function addCommas(nStr) {

            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
@endsection