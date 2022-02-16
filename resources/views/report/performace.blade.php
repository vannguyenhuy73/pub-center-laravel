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
                <div class="col-xs-12 col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Báo cáo hiệu quả</h2>
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
                                <div class="col-xs-12 col-sm-12 product_price">
                                    <form action="" method="GET" role="form" id="filter-form">
                                        @csrf
                                        <div class="col-xs-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="offer_type">Loại</label>
                                                <select name="offer_type" id="offer_type" class="form-control">
                                                    <option value="">Tất Cả</option>
                                                    <option value="cps">CPS</option>
                                                    <option value="cpa">CPA</option>
                                                    <option value="cpi">CPI</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="offer_status">Trạng Thái</label>
                                                <select name="conversion-status" id="offer_status" class="form-control">
                                                    <option value="">Tất Cả</option>
                                                    <option value="100">Chờ duyệt</option>
                                                    <option value="300">Hủy</option>
                                                    <option value="210">Thành công</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" id="start-date" name="start">
                                                <input type="hidden" id="end-date" name="end">
                                                <label for="">Rage Date</label>
                                                <div id="reportrange"
                                                     style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span></span> <i class="fa fa-caret-down"></i>
                                                    <b class="caret"></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Lọc</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="listconversion">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">Offer ID</th>
                                                <th class="column-title">HIỂN THỊ</th>
                                                <th class="column-title">TỔNG CLICK</th>
                                                <th class="column-title">CLICK THỰC</th>
                                                <th class="column-title">TỈ LỆ CLICK/HIỂN THỊ</th>
                                                <th class="column-title">KẾT QUẢ PHÁT SINH</th>
                                                <th class="column-title">TỈ LỆ CHUYỂN ĐỔI</th>
                                                <th class="column-title">DOANH SỐ (VND)</th>
                                                <th class="column-title">HOA HỒNG (VND)</th>
                                                <th class="column-title">EPC</th>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody class="data-content">
                                            <tr>
                                                <td colspan="10" class="text-center"
                                                    style="height: 70px;vertical-align: middle; color: red">Loading....
                                                </td>
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

        /* DATERANGEPICKER */

        function init_daterangepicker() {
            console.log('init_daterangepicker');

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            };
            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2018',
                maxDate: '12/31/2030',
                dateLimit: {
                    days: 90
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'YYYY-MM-DD',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };

            $('#reportrange span').html(moment().subtract(29, 'days').format('YYYY-MM-DD') + ' - ' + moment().format('YYYY-MM-DD'));
            $('#reportrange').daterangepicker(optionSet1, cb);
        }

        init_daterangepicker();

        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            $('#start-date').val(picker.startDate.format('YYYYMMDD'));
            $('#end-date').val(picker.endDate.format('YYYYMMDD'));
            filter()
        });

        $('#offer_status, #offer_type, #offer_id').change(function () {
            filter();
        });

        function filter() {
            showLoading();
            $.ajax({
                url: '{{ route('report.ajax') }}',
                method: 'POST',
                data: $('#filter-form').serialize(),
                success: function (data) {
                    if (data.status != 200) {
                        toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
                    }
                    var html = '';

                    data.data.forEach(function (element) {
                        html += '<tr class="pointer">' +
                            '<td class="">' +
                            '    <a href="{{ route('offer.show', '') }}/' + element.merchant_id + '">' + element.merchant_id + '</a>' +
                            '</td>' +
                            '<td class=" ">' + addCommas(element.imp) + ' </td>' +
                            '<td class=" ">' + addCommas(element.total_clt) + ' </td>' +
                            '<td class=" ">' + addCommas(element.clt) + ' </td>' +
                            '<td class=" ">' + (element.imp > 0 ? (element.clt / element.imp).toFixed(2) : 'N/A') + '% </td>' +
                            '<td class=" ">' + addCommas(element.total_ords) + ' </td>' +
                            '<td class=" ">' + (element.clt > 0 ? (element.total_ords / element.clt).toFixed(2) : 'N/A') + '% </td>' +
                            '<td class=" ">' + addCommas(element.total_sales) + '</td>' +
                            '<td class=" ">' + addCommas(element.total_com) + '</td>' +
                            '<td class=" ">' + (element.clt > 0 ? addCommas((element.total_com / element.clt).toFixed(2)) : 'N/A') + ' </td>' +
                            '</tr>';
                    });

                    hideLoading();

                    $('.data-content').html(html);
                    $(document).ready(function () {
                        $('#listconversion').DataTable();
                    });
                },
                error: function () {
                    hideLoading();
                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                }
            });
        }

        filter();


        $('#filter-form').submit(function (e) {
           filter();

           e.preventDefault();
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