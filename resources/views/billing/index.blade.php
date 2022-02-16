@extends('layouts.app')
@section('title', 'Báo cáo hiệu quả')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>
        .mail-list li.active a {
            color: white;
        }

        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }

        .table thead th {
            text-align: center;
        }

        .calendar.left {
            float: left !important;
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
                            <h2>Lịch sử thanh toán</h2>
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

                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="listbillding">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">YÊU CẦU NGÀY</th>
                                                <th class="column-title">TRẠNG THÁI</th>
                                                <th class="column-title">SỐ TIỀN</th>
                                                <th class="column-title">NGÀY THANH TOÁN</th>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody class="data-content">
                                            @foreach($paids as $index => $paid)
                                                <tr>
                                                    <td>{{ ($index + 1) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($paid->create_time_stamp)) }}</td>
                                                    <td>
                                                        @if($paid->done_flag == 'Y')
                                                            <span class="label label-success">Đã Thanh Toán</span>
                                                        @else
                                                            <span class="label label-warning">Đang Thanh Toán</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($paid->amount) }} VNĐ</td>
                                                    <td>{{ $paid->pay_date != null ? date('d-m-Y', strtotime($paid->pay_date)) : '' }}</td>
                                                </tr>
                                            @endforeach
                                            @php
                                                $total = 0;
                                                for($i = 0; $i < count($paids); $i++)
                                                {
                                                    $total += $paids[$i]['amount'];
                                                }
                                            @endphp
                                                <tr>
                                                    <td colspan="3">{{ __('Tổng') }}</td>
                                                    <td colspan="2">{{ number_format($total) }} VNĐ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12">

                                    </div>
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
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>

        $(document).ready(function () {
            $('#listbillding').DataTable();
        });
    </script>
@endsection