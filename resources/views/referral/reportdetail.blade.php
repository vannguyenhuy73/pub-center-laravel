@extends('layouts.app')
@section('title', 'Report Detail')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>
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
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row text-center">
                                <div class="row">
                                    <div class="col-xs-12">

                                    </div>
                                </div>
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
                                            <div class="count revenue">N/A
                                                VND
                                            </div>
                                            <h3>Hoa h???ng h??m nay</h3>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-money"></i></div>
                                            <div class="count commission">N/A
                                            </div>
                                            <h3>Hoa h???ng th??ng</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="listconversion"
                                               pag>
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">DATE</th>
                                                <th class="column-title">ACCOUNT ID</th>
                                                <th class="column-title">AFFILIATE</th>
                                                <th class="column-title">CONVERSION</th>
                                                <th class="column-title">REVENUE</th>
                                                <th class="column-title">COMMISSION</th>
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
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".right").sticky({topSpacing: 20, bottomSpacing: 160});
        });
    </script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        function convertDate(yyyymmdd) {
            return yyyymmdd.slice(6, 8) + '-' + yyyymmdd.slice(4, 6) + '-' + yyyymmdd.slice(0, 4);
        }

        function filter() {
            getReport();
        }

        $("#filter-form select").change(function () {
            filter();
        });

        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            $('#start-date').val(picker.startDate.format('YYYYMMDD'));
            $('#end-date').val(picker.endDate.format('YYYYMMDD'));

            filter()
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

        function getReport(page = 1) {
            showLoading();
            $.ajax({
                url: '{{ route('referral.report.detail.handle') }}',
                method: 'POST',
                data: 'date={{ $date }}&_token={{ csrf_token() }}&page=' + page,
                success: function (data) {
                    if (data.status !== 200) {
                        toastr.error("C?? l???i x???y ra xin vui l??ng th??? l???i sau!");
                    }

                    var html = '';

                    if (data.data.data.length < 100) {
                        toggleElement('.btn-next', 'hide');
                    } else {
                        toggleElement('.btn-next', 'show');
                    }
                    var revenue = 0;
                    var commission = 0;
                    data.data.data.forEach(function (element) {

                        html += '<tr class="pointer">' +
                            '<td class=" ">' + convertDate(element.yyyymmdd) + ' </td>' +
                            '<td class="">' + element.account_id + '</a>' + '</td>' +
                            '<td class="">' + element.affiliate_id + '</a>' + '</td>' +
                            '<td class="">' + element.conversion + '</a>' + '</td>' +
                            '<td class=" ">' + addCommas(parseInt(element.revenue).toFixed(0)) + ' </td>' +
                            '<td class=" ">' + addCommas((parseInt(element.comm) * data.data.percent).toFixed(0)) + ' </td>' +
                            '</tr>';

                        revenue += parseInt(element.revenue);
                        commission += parseInt(element.comm);
                    });

                    $('.converions-count').text(data.data.length);
                    $('.revenue').text(addCommas(parseInt(revenue).toFixed(0)) + ' VN??');
                    $('.commission').text(addCommas(parseInt(commission).toFixed(0)) + ' VN??');

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

                    toastr.error('C?? l???i x???y ra, xin vui l??ng th??? l???i sau!');
                }
            });
        }

        function showStatus(status) {
            if (status == 'ACT') {
                return '<span class="label label-success">active</span>';
            }
            return '<span class="label label-danger">deactive</span>';
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
                getReport(page);
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

            getReport(page);

            return false;
        });

        filter();
    </script>
@endsection