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
                                <div class="col-sm-12 col-xs-12 product_price">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h3 class="x_title">Filter</h3>
                                    </div>
                                    <form action="" method="GET" role="form" id="filter-form">
                                        @csrf
                                        <div class="col-xs-6 col-sm-6 col-md-3">
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

                                        <div class="col-sm-6 col-md-3 col-xs-6">
                                            <div class="form-group">
                                                <label for="offer_status">Offer ID</label>
                                                <select name="offer_id" id="offer_id" class="form-control">
                                                    <option value="">Tất Cả</option>
                                                    @foreach($listMerchant as $merchant)
                                                        <option value="{{ $merchant->merchant_id }}">{{ $merchant->merchant_id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-xs-6">
                                            <div class="form-group">
                                                <label for="offer_status">AID</label>
                                                <select name="affiliate_id" id="affiliate_id" class="form-control">
                                                    <option value="">Tất Cả</option>
                                                    @foreach($affiliates as $affiliateId => $siteName)
                                                        <option value="{{ $affiliateId }}">{{ $siteName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-xs-6">
                                            <div class="form-group">
                                                <label for="branch">Branch</label>
                                                <select name="branch" id="branch" class="form-control">
                                                    <option value="">Tất Cả</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-xs-12">
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

                                        <div class="col-sm-6 col-md-3">
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
                                    </form>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="row top_tiles">
                                        <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-line-chart"></i></div>
                                                <div class="count converions-count">N/A</div>
                                                <h3>Conversions</h3>
                                            </div>
                                        </div>
                                        <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-money"></i></div>
                                                <div class="count revenue-count">0 VND</div>
                                                <h3>Doanh Thu</h3>
                                            </div>
                                        </div>
                                        <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-money"></i></div>
                                                <div class="count commission-count">0 VND</div>
                                                <h3>Hoa Hồng</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="listconversion"
                                               pag>
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">Transaction ID</th>
                                                <th class="column-title">Offer ID</th>
                                                <th class="column-title">Create At</th>
                                                <th class="column-title">Offer Type</th>
                                                <th class="column-title">Web site</th>
                                                <th class="column-title">Doanh Thu</th>
                                                <th class="column-title">Hoa Hồng</th>
                                                <th class="column-title">Trạng Thái</th>
                                                <th class="column-title">Branch</th>
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
                                    <div class="col-xs-12">
                                        <div class="pull-right">
                                            <ul class="pagination pagination-ui" style="display: none">
                                                <li><a href="#" class="btn-pre">&laquo; Pre</a></li>
                                                <li><a href="#" class="btn-next">Next &raquo;</a></li>
                                            </ul>
                                        </div>
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
            //console.log('init_daterangepicker');

            var cb = function (start, end, label) {
                //console.log(start.toISOString(), end.toISOString(), label);
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

            filter();
        });

        function filter() {
            getConversion();
            getSummary();
        }

        filter();

        $('#offer_status, #offer_type, #offer_id, #branch, #affiliate_id').change(function () {
            filter();
        });

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

        function getSummary() {
            showLoading();

            $.ajax({
                url: '{{ route('report.detail.summary') }}',
                method: 'POST',
                data: $('#filter-form').serialize(),
                success: function (data) {
                    if (data.status != 200) {
                        toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
                    } else {

                        if (data.data.count > 100) {
                            toggleElement('.pagination-ui', 'show');
                            toggleElement('.btn-pre', 'hide');
                        }

                        $('.converions-count').text(data.data.count);
                        var commission = 0;
                        var revenue = 0;

                        if (data.data.commission) {
                            commission = addCommas(parseInt(data.data.commission).toFixed(0))
                        }

                        if (data.data.revenue) {
                            revenue = addCommas(parseInt(data.data.revenue).toFixed(0))
                        }

                        $('.commission-count').text( commission + ' VNĐ');
                        $('.revenue-count').text(revenue + ' VNĐ');

                        hideLoading();
                    }
                },
                error: function () {
                    hideLoading();

                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                }
            });
        }

        function getConversion(page = 1) {
            showLoading();
            $.ajax({
                url: '{{ route('report.detail.ajax') }}',
                method: 'POST',
                data: $('#filter-form').serialize() + '&page=' + page,
                success: function (data) {
                    if (data.status != 200) {
                        toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
                    }

                    var html = '';

                    if(data.data.length < 100){
                        toggleElement('.btn-next', 'hide');
                    } else {
                        toggleElement('.btn-next', 'show');
                    }
                    if($('#branch').val() == '') {
                        branchs = '<option value="">Tất cả</option>';
                        if(data.data.branch != '' || data.data.branch[0] != null){
                            for (key in data.data.branch) {
                                branchs += '<option value="'+data.data.branch[key]+'">'+data.data.branch[key]+'</option>';
                            }
                            $('#branch').html(branchs)
                        }
                    }
                    data.data.data.forEach(function (element) {
                        let format_date = moment(element.yyyymmdd, "YYYYMMDD");
                        let date_time = format_date.format("YYYY-MM-DD")
                        html += '<tr class="pointer">' +
                            '<td class=" ">' + element.trlog_id + ' </td>' +
                            '<td class="">' +
                            '    <a href="{{ route('offer.show','') }}/' + element.merchant_id + '">' + element.merchant_id + '</a>' +
                            '</td>' +
                            '<td class=" ">' + date_time + ' </td>' +
                            '<td class=" ">' + element.ad_type + ' </td>' +
                            '<td class=" ">' + element.site_name + ' </td>' +
                            '<td class=" ">' + addCommas(element.sales) + ' </td>' +
                            '<td class=" ">' + addCommas(element.commission) + ' </td>' +
                            '<td class=" ">' + showConversionStatus2(element.stat) + '</td>' +
                            '<td class=" ">' + element.sub_id + '</td>' +
                            '</tr>';
                    });

                    $('.data-content').html(html);
                    hideLoading();


                    $(document).ready(function () {
                        $('#listconversion').DataTable({
                            retrieve: true,
                            paging: false,
                            info: false
                            // pageLength: 25
                        });
                    });
                },
                error: function () {
                    hideLoading();

                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                }
            });
        }

        function toggleElement(element = '.btn-pre', type = 'show') {

            var pageUI = $(element);

            switch (type) {
                case 'show':
                    pageUI.show();
                    break;
                case 'hide':
                    pageUI.hide();
                    break;
            }
        }
        // default page
        var page = 1;

        // handle loadmore data.
        $('.btn-pre').click(function () {
            if (page > 1) {
                page -= 1;
                getConversion(page);
            } else {
                toggleElement('.btn-pre', 'hide');
            }

            return false;
        });

        $('.btn-next').click(function () {
            page += 1;

            if (page >= 2) {
                toggleElement('.btn-pre', 'show');
            }

            getConversion(page);

            return false;
        })

        function showConversionStatus2(status) {
            if (status == 100 || status == 200) {
                return '<span class="label label-warning">Chờ duyệt</span>';
            } else if (status == 300 || status == 310) {
                return '<span class="label label-default">Hủy</span>';
            } else if (status == 210) {
                return '<span class="label label-success">Thành công</span>';
            } else if (status == 220) {
                return '<span class="label label-success">Đã Thanh Toán</span>';
            }
            return '<span class="label">Không xác định</span>';
        }
    </script>
@endsection
