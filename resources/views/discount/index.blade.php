@extends('layouts.app')
@section('title','Mã Giảm Giá')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>
        .list-event {
            border-bottom: 1px solid #dddddd !important;
            margin-top: 15px;
            /*height: 127px;*/
            overflow-y: hidden;
            /*padding-left: 30px;*/
            /*padding-right: 30px;*/
        }

        .tb-coupoun tbody td {
            color: black;
            vertical-align: middle !important;
            text-align: center;
        }

        .tb-coupoun tbody td.text-left {
            text-align: left;
        }

        .tb-coupoun tbody td a {
            color: black;
        }

        .dt-buttons {
            text-align: right;
        }

        .btn-sm {
            padding: 1px 3px;
        }

        .dt-buttons .buttons-excel {

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
                                <i class="fa fa-th"></i> Mã Giảm Giá
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
                                <div class="col-xs-12" style="padding: 5px 10px">
                                    <form action="" method="get" class="form-inline" role="form">
                                        <div class="form-group">
                                            Merchant
                                        </div>
                                        <div class="form-group">
                                            <select name="merchant_id" id="" class="form-control">
                                                <option value="all">Tất cả</option>
                                                @foreach($merchants as $merchant)
                                                    <option value="{{ $merchant->merchant_id }}" {{ $merchant->merchant_id == $merchantID ? 'selected' : '' }} >{{ $merchant->merchant_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Trạng Thái
                                        </div>
                                        <div class="form-group">
                                            <select name="duration" id="" class="form-control">
                                                <option value="all">Tất cả</option>
                                                <option value="active" {{ $duration == 'active' ? 'selected' : '' }}>
                                                    Hoạt động
                                                </option>
                                                <option value="expired" {{ $duration == 'expired' ? 'selected' : '' }}>
                                                    Hết hạn
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            Bắt đầu
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" value="{{ $from_sd }}" name="from_sd">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" value="{{ $to_sd }}" name="to_sd">
                                        </div>
                                        <div class="form-group">
                                            Kết thúc
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" value="{{ $from_ed }}" name="from_ed">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" value="{{ $to_ed }}" name="to_ed">
                                        </div>

                                        <button type="submit" class="btn btn-primary" style="margin-top: 5px">Lọc
                                        </button>
                                        <a href="{{ route('discount.download', Request::query()) }}"
                                           class="btn btn-primary pull-right" style="margin-top: 5px">Xuất Excel</a>
                                    </form>
                                </div>
                            </div>
                            @if(isset($discounts))
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered tb-coupoun table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nhà cung cấp</th>
                                                <th>Nội dung</th>
                                                <th>Bắt đầu</th>
                                                <th>Kết thúc</th>
                                                <th>Trạng thái</th>
                                                <th>Mã giảm giá</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $current = date('Ymd')
                                            @endphp
                                            @foreach($discounts as $key => $discount)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><h4>{{ $discount->merchant_id }}</h4></td>
                                                    <td class="text-left">
                                                        <h4 style="margin-top: 2px; margin-bottom: 2px">
                                                            {{ $discount->title }}
                                                            <span class="btn btn-default btn-sm"
                                                                  title="Copy affiliate Link"
                                                                  onclick="copyToClipboard('https://adpia.vn/api/v1/deeplink/?a={{ auth()->user()->last_contact_affiliate_id }}&url={{ urlencode($discount->origin_url) }}')">
                                                                        <i class="fa fa-copy text-success"></i>
                                                                    </span>
                                                            <a target="_blank" href="{{ $discount->origin_url }}"
                                                               class="btn btn-default btn-sm"
                                                               title="Đi tới link sự kiện" >
                                                                <i class="fa fa-external-link text-primary"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                        <small>{{ $discount->description }}</small>
                                                    </td>
                                                    <td>{{ dateConvert($discount->start_date)}} </td>
                                                    <td> {{ dateConvert($discount->end_date)  }}</td>
                                                    <td> {!! $discount->end_date >= $current ? '<span class="label label-success">Hoạt động</span>' : '<span class="label label-danger">Hết hạn</span>'  !!}</td>
                                                    <td style="max-width: 120px">
                                                        <div class="input-group">
                                                            <input type="text" readonly
                                                                   value="{{ $discount->discount_code }}"
                                                                   class="form-control">
                                                            <span class="input-group-btn">
                                                  <button type="button" class="btn btn-success"
                                                          onclick="copyToClipboard('{{ $discount->discount_code }}')"><i
                                                              class="fa fa-copy"></i></button>
                                          </span>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    {{ $discounts->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script>
    </script>
@endsection