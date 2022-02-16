@extends('layouts.app')
@section('title', 'Summary referral')
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
                                        <form action="" method="post" class="form-inline pull-right" role="form"
                                              style="margin-bottom: 30px" id="filter-form">
                                            @csrf
                                            <div class="form-group">
                                                <label class="sr-only" for="">Month</label>
                                                <select name="month" id="" class="form-control">
                                                    @for($i = 1; $i <13; $i++)
                                                        <option value="{{ $i <10 ? '0'. $i:$i }}"
                                                                {{ $i <10 ? ('0'. $i == date('m') ? 'selected':'') :($i == date('m') ? 'selected':'') }}>
                                                            Tháng {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="">Year</label>
                                                <select name="year" id="" class="form-control">
                                                    <option value="2019">2019</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row top_tiles">
                                    <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-users"></i></div>
                                            <div class="count user-count">N/A</div>
                                            <h3>Users</h3>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-line-chart"></i></div>
                                            <div class="count converions-count">N/A</div>
                                            <h3>Conversions</h3>
                                        </div>
                                    </div>

                                    <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-money"></i></div>
                                            <div class="count revenue-today">N/A
                                                VND
                                            </div>
                                            <h3>Hoa hồng Hôm nay</h3>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-money"></i></div>
                                            <div class="count revenue-month">N/A
                                            </div>
                                            <h3>Hoa hồng Tháng</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="listconversion"
                                               pag>
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">ACCOUNT ID</th>
                                                <th class="column-title">AFFILIATE ID</th>
                                                <th class="column-title">STATUS</th>
                                                <th class="column-title">CREATE AT</th>
                                                <th class="column-title">OPTION</th>
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
                                <div class="col-xs-12 col-sm-4">
                                    <div class="right">
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

        function filter() {
            getSummary();
            getAccount();
        }

        $("#filter-form select").change(function () {
            filter();
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
                url: '{{ route('referral.report.summary') }}',
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

                        $('.converions-count').text(data.data.conversion);
                        var commission = 0;
                        var revenue = 0;


                        if (data.data.revenue) {
                            revenue = addCommas(parseInt(data.data.revenue).toFixed(0))
                        }

                        $('.user-count').text(data.data.user);
                        $('.revenue-today').text(addCommas(parseInt(data.data.revenue.today).toFixed(0)) + ' VNĐ');
                        $('.revenue-month').text(addCommas(parseInt(data.data.revenue.month).toFixed(0)) + ' VNĐ');

                        hideLoading();
                    }
                },
                error: function () {
                    hideLoading();

                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                }
            });
        }

        function getAccount(page = 1) {
            showLoading();
            $.ajax({
                url: '{{ route('referral.report.getaccount') }}',
                method: 'POST',
                data: $('#filter-form').serialize() + '&page=' + page,
                success: function (data) {
                    if (data.status != 200) {
                        toastr.error("Có lỗi xảy ra xin vui lòng thử lại sau!");
                    }

                    var html = '';

                    if (data.data.user < 100) {
                        toggleElement('.btn-next', 'hide');
                    } else {
                        toggleElement('.btn-next', 'show');
                    }

                    data.data.forEach(function (element) {
                        console.log(element);

                        html += '<tr class="pointer">' +
                            '<td class=" ">' + element.account_id + ' </td>' +
                            '<td class="">' + element.last_contact_affiliate_id + '</a>' +
                            '</td>' +
                            '<td class=" ">' + showStatus(element.account_status) + ' </td>' +
                            '<td class=" ">' + element.registered_date + ' </td>' +
                            '<td class=" "><a href="{{ route('referral.report') }}?account_id=' + element.account_id + '" class="btn btn-default btn-sm" title="view report"><i class="fa fa-line-chart"></i></a></td>' +
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
                getAccount(page);
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

            getAccount(page);

            return false;
        });

        filter();
    </script>
@endsection