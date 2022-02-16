@extends('layouts.app')
@section('css')
@endsection
@section('content')
<style type="text/css" media="screen">
    @media screen and (max-width: 768px) {
        .img-event {
            height: 100% !important;
        }
    }
    .animated{padding-top: 10px;position: relative;}
    .test{width: 100%;background-color: #1d1c1cd6;height: 100%;position: fixed;z-index: 1000;top: 0;left: 0;bottom: 0;right: 0;overflow: hidden; display: none;}
    .target_step1, .target_step3, .guide__step__4 .guide__step__4__detail{position: absolute;top: 115px;color: #302626;left: -1px;background: white;width: 100%;padding-left: 20px;padding-top: 10px;padding-bottom: 10px;border-radius: 14px; line-height: 1.6; padding-right: 20px; font-size: 18px}
    .guide__step__4{position: relative;}
    .guide__step__4 .guide__step__4__detail{top: -175px; }
    .step_7_detail{position: absolute;background: white;top: 70px;left: -15px;width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left: 20px; padding-right: 20px;border-radius: 14px;color: black; line-height: 1.6; font-size: 18px}
    .step__guide__8_detail {width: 280px;display: block; position: absolute; left: 240px; background: white;color: black; z-index: 200000; top: -45px; padding-top: 10px; padding-bottom: 9px; padding-left: 20px; border-radius: 14px; line-height: 1.6; display: none; padding-right: 20px;font-size: 18px;}
    .step__guide__8_detail a,.target_step1 a, .target_step3 a, .guide__step__4__detail a,.step_7_detail a{cursor: pointer;color: red}
    #detail_step12, #detail_step11{top: 0px;}
    .target_step1, .target_step3, .guide__step__4__detail{display: none}
    .mCSB_container, .mCustomScrollBox{overflow: unset !important;}
    .step__guide__8_detail a{font-size: 18px !important;}
    .btn-redirect-newpub-ui {
        position: absolute;
        color: orangered;
        bottom: 25%;
        right: 6%;
        border: 1px solid orangered;
        font-size: 16px;
        padding: 8px;
        border-radius: 15px;
        transition: all 0.4s;
    }
    .btn-redirect-newpub-ui:hover {
        background-color: orangered;
        color: #fff;
        border: 1px solid #fff;
    }
</style>
<div class="test"></div>
<div class="right_col" role="main">
    <div class="top-banner">
        <div class="container">
            @if(isset($bannerDashboard))
            <a target="_blank" href="{{ $bannerDashboard->link }}"><img src="{{ $bannerDashboard->image }}" class="img-responsive center-block" style="margin-bottom: 10px;"></a>
            @endif
        </div>
    </div>
    <div class="">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-line-chart"></i></div>
                    <div class="count">{{ $orderCount  }}</div>
                    <h3>Conversions Tháng này</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12" id='step1'>
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="count">{{ $todayComission }} VND</div>
                    <h3>Hoa Hồng Hôm Nay</h3>
                </div>
                <p class="target_step1" id="detail__step1"><span style="display: block;">Hoa hồng bạn đạt được trong ngày hôm nay.</span>  <a class="cancel__step" style="display: inline-block; " pre='step1'>Đã hiểu!</a><a class="next__step" pre='step1' step='step2' style="display: inline-block;color: green; float: right;">Tiếp tục</a></p>
            </div>
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12" id='step2'>
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="count">{{ $monthComission }} VND</div>
                    <h3>Hoa Hồng Tạm Duyệt</h3>
                </div>
                <p class="target_step1" id="detail__step2"><span style="display: block;">Hoa hồng bạn đạt được trong tháng này. </span> <a class="cancel__step" style="display: inline-block; " pre="step2">Đã hiểu!</a><a class="next__step" pre='step2' step='step3' style="display: inline-block;color: green; float: right;">Tiếp tục</a></p>
            </div>
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12" id='step3'>
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="count">{{ $payable }} VND</div>
                    <h3>Hoa Hồng Đã Duyệt</h3>
                </div>
                <p class="target_step3" id="detail__step3" ><span style="display: block;">Số dư hoa hồng bạn có thể rút ra.</span>  <a class="cancel__step" style="display: inline-block; " pre='step3'>Đã hiểu!</a><a class="next__step" pre='step3' step="step4" style="display: inline-block;color: green; float: right;">Tiếp tục</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Click Tháng Này</h2>
                        <div class="filter">
                            <div class="pull-right"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:280px">
                                <div id="click_chart" class="demo-placeholder">
                                    <h3 class="text-center none_data_click">Đang tải...</h3>
                                </div>
                            </div>
                            <div class="tiles"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hoa Hồng Tạm Duyệt</h2>
                        <div class="filter">
                            <div class="pull-right"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:280px">
                                <div id="revenue_chart" class="demo-placeholder">
                                    <h3 class="text-center none_data_revenue">Đang tải...</h3>
                                </div>
                            </div>
                            <div class="tiles"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 guide__step__4" id='step4'>
                <p class="guide__step__4__detail" id="detail__step4" ><span style="display: block;">Các Offer/Chiến dịch hàng đầu được gợi ý. </span><a pre='step4' class="cancel__step" style="display: inline-block; ">Đã hiểu!</a><a class="next__step" pre='step4' step='step5' style="display: inline-block;color: green; float: right;">Tiếp tục</a> </p>
                <div class="x_panel ">
                    <div class="x_title">
                        <h2>Top Offers
                            <small><a href="{{ route('offer.index') }}">Xem thêm</a></small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content x-offer">
                        @foreach($highlights as $highlight)
                        <article class="media event">
                            <a class="pull-left date" style="width: 100px; background-color: #ffffff" href="{{ route('offer.show', $highlight->merchant_id) }}">
                                <img src="{{ $highlight->banner_url }}" alt="{{ $highlight->site_name }}" class="img-responsive">
                            </a>
                            <div class="media-body">
                                <a class="title" href="{{ route('offer.show', $highlight->merchant_id) }}">{{ $highlight->site_name }}</a>
                                <p><strong>Chiến dịch: </strong> {{ substr($highlight->adtype, 0, 3) }}</p>
                                <p><strong>Hoa hồng: </strong> {{ $highlight->com_display ?: pgm_get_merchant_com_info($highlight->com_info, '-') }}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 guide__step__4" id='step5'>
                <p class="guide__step__4__detail" id="detail__step5"><span style="display: block;">Các chiến dịch mới được khởi động tại Adpia.</span> <a class="cancel__step" pre='step5' style="display: inline-block; ">Đã hiểu!</a><a class="next__step" pre='step5' step='step6' style="display: inline-block;color: green; float: right;">Tiếp tục</a></p>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chiến dịch mới
                            <small><a href="{{ route('event.index') }}">Xem thêm</a></small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content x-event">
                        @if(isset($newEvents))
                            @foreach($newEvents as $newEvent)
                            <div class="row list-event">
                                <div class="col-sm-6">
                                    <a href="{{ route('event.show', $newEvent->event_id) }}"><img src="{{ $newEvent->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $newEvent->image }}" alt="{{ $newEvent->title }}" class="img-event" style="width: 100%;height:100%"></a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="title">
                                        <a href="{{ route('event.show', $newEvent->event_id)  }}">{{ $newEvent->title }}</a>
                                    </div>
                                    <div class="addtional">
                                        <a href="{{ route('offer.show', $newEvent->merchant_id) }}"><img style="background: white" src="{{ $newEvent->merchant_banner }}" class="offer-image" alt="{{ $newEvent->merchant }}"></a>
                                        <a href="{{ route('event.show', $newEvent->event_id) }}" class="badge pull-right">Xem Thêm</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 guide__step__4" id="step6">
                <p class="guide__step__4__detail" id="detail__step6"><span style="display: block;">Các ưu đãi, khuyến mãi hấp dẫn từ các nhà cung cấp dành cho khách hàng, rất hữu ích khi bạn muốn đẩy số cho chiến dịch.</span><a class="cancel__step" pre="step6" style="display: inline-block; ">Đã hiểu!</a><a pre='step6' step='step7' href="#step7" class="next__step" style="display: inline-block;float: right;color: green;">Tiếp tục</a> </p>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tin Khuyến Mại <small><a href="{{ route('board.index') }}">Xem thêm</a></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content x-notice">
                        @if(isset($boards))
                            @foreach($boards as $board)
                            <div class="row list-event">
                                <div class="col-sm-6">
                                    <a href="{{ route('board.show', $board->article_id) }}"><img src="{{ $board->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $board->image }}" alt="{{ $board->title }}" class="img-event" style="width: 100%;height:100%"></a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="title">
                                        <a href="{{ route('board.show', $board->article_id)  }}">{{ $board->title }}</a>
                                    </div>
                                    <div class="addtional">
                                        <a href="{{ route('offer.show', $board->merchant_id) }}"><img src="{{ $board->banner_url }}" class="offer-image" alt="{{ $board->site_name }}"></a>
                                        <a href="{{ route('offer.show', $board->merchant_id) }}" class="badge pull-right">Lấy Link</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="newpub-popup-new-interface" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999999; display: none;">
    <div style="max-width: 100%; width: 800px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px;">
        <div style="position: relative;">
            <img src="https://ac.adpia.vn/upload/images/newpub-popup-new-interface.png" alt="" style="width: 100%;">
            <div id="close-popup-new-interface" style="position: absolute; top: 0; right: 0; transform: translate(40%, -40%); background-color: #000; border: 2px solid #fff; width: 30px; height: 30px; border-radius: 50%; color: #fff; text-align: center;font-weight: 600; font-size: 20px; cursor: pointer;">&#x2715</div>
            <a href="{{ asset('/') }}" onclick="setCookie('popup_ui', 'false', 1)"><div class="btn-redirect-newpub-ui">TRẢI NGHIỆM GIAO DIỆN MỚI</div></a>
        </div>
    </div>
</div>
@endsection
@section('script')
<style>
    .bot_banner{position: fixed; bottom: -3px;left: 275px; z-index: 100}
    .closes{color: black;background: #ccc;border-radius: 50%;position: absolute;top: -11px;right: -4px;padding:1px 6px 2px 6px;cursor: pointer;}
    @media screen and (max-width: 990px) {
        .bot_banner {
            left: 0 !important;
        }
        .closes{right: 0 !important;}
    }
</style>
{{-- <div class="top-banner bot_banner" >
    <div class="container" style="position: relative">
        <a target="_blank" href="https://blog.adpia.vn/lazada-sieu-sinh-nhat-sale-vo-cuc/"><img src="http://ac.adpia.vn/upload/images/LazadaSinhNhat_newpub_1025x120.jpg" class="img-responsive center-block" style="margin-bottom: 10px;"></a>
        <a class="closes">x</a>
    </div>
</div> --}}
<script>
    function showClick(data) {
        Morris.Line({
            element: 'click_chart',
            data: data,
            xkey: 'period',
            ykeys: ['impresion', 'mobile_click', 'total_click', 'unique_click'],
            lineColors: ['#26B99A', '#34495E', '#ff0000', '#ACADAC'],
            pointFillColors: false,
            labels: ['Hiển thị', 'Mobile Click', 'Tổng Click', 'Click Thực'],
            pointSize: 3,
            hideHover: 'auto',
            resize: true
        });
    }

    function getClick(month) {
        $.ajax({
            url: '{{ url('chart/click/') }}/' + month,
            method: 'get',
            success: function (data) {
                if (data.length > 0) {
                    showClick(data);
                    $('.none_data_click').hide()
                }
            }
        })
    }

    function showRevenue(data) {

        Morris.Line({
            element: 'revenue_chart',
            data: data,
            xkey: 'period',
            ykeys: ['commission'],
            lineColors: ['#FF0000', '#34495E', '#ACADAC', '#3498DB'],
            pointFillColors: false,
            labels: ['Hoa hồng tạm tính'],
            pointSize: 3,
            hideHover: 'auto',
            resize: true
        });
    }

    function getRevenue(month) {
        $.ajax({
            url: '{{ url('chart/revenue/') }}/' + month,
            method: 'get',
            success: function (data) {
                if (data.length > 0) {
                    showRevenue(data);
                    $('.none_data_revenue').hide()
                }
            }
        })
    }

    var curentMonth = (new Date()).getMonth() + 1;

    if (curentMonth < 10) {
        curentMonth = '0' + curentMonth;
    }

    getClick(curentMonth);
    getRevenue(curentMonth);

    // var noticeBox = $('.x-notice');
    // var eventBox = $('.x-event');
    // var offerBox = $('.x-offer');

    // var max = Math.max(noticeBox.height(), eventBox.height(), offerBox.height());

    // noticeBox.css('height', max + 'px');
    // eventBox.css('height', max + 'px');
    // offerBox.css('height', max + 'px');

    // $(window).on('resize', function () {
    //     if ($(window).width() < 768) {
    //         noticeBox.css('height', 'auto');
    //         eventBox.css('height', 'auto');
    //         offerBox.css('height', 'auto');
    //     }
    // });
    $('.closes').click(function() {
        $('.bot_banner').css('display','none')
    })
    $(document).ready(function() {
        var cookie = document.cookie;
        var check = new RegExp('guideAdpia'+ '=false', "g");

        if (!document.cookie.match(check)) {
            $('.test').show()
            $('#step1').css({'z-index': '100000'});
            $('#detail__step1').show();
            $('.target_step1 a.next__step, .target_step3 a.next__step, .guide__step__4__detail a.next__step').click(function() {
                step = $(this).attr('step');
                position = $('#'+step).offset().top - 200
                $( "html, body" ).scrollTop( position );
                pre = $(this).attr('pre');
                $('#' + step).css({'z-index': '100000'})
                $('#detail__' + step).show();
                $('#detail__' + pre).hide();
                $('#' + pre).css({'z-index': '0'})

                // $('html, body').animate({scrollTop: $('#' + step).offset().top - $('html, body').offset().top + $('html, body').scrollTop(), scrollLeft: 0},300);
            })

            $('.step_7_detail a, .step__guide__8_detail a.next__step').click(function(){
                $('#parent__steps').css({'z-index': '100000'})
                pre = $(this).attr('pre');
                step = $(this).attr('step');

                if($(window).width() <= 991 ) {
                    $('body').removeClass('nav-md')
                    $('body').addClass('nav-sm')
                    $('.step__guide__8_detail').css({'left':'80px','top':'-11px'})
                }

                if($(window).width() <= 991 && step == 'step11') {
                    step = 'step12';
                }
                $('#detail__' + pre).hide();
                $('#' + pre).css({'z-index': '0'})
                $('#' + step).css({'border': '4px solid red'})
                $('#detail_' + step).css({'display': 'block'})
                $('#detail_' + pre).css({'display': 'none'})
                $('#' + pre).css({'border': 'none'})
                h = $('#mCSB_1_container').height()-400
                if(step == 'step11'){
                    $('#mCSB_1_container').css({'top':'-'+h+'px'})
                }
            })

            $('#done_guide').click(function() {
                $('.step__guide__8_detail').hide();
                $('#step12').css({'border':'none'});
                $('.test').remove();

                document.cookie = 'guideAdpia' + '=false; expires=Thu, 20 Jan 2029 00:00:00 UTC; path=/;';
            })
            $('.cancel__step').click(function() {
                $('.test').remove();
                pre = $(this).attr('pre');
                $('#detail_' + pre).css({'display': 'none'});
                $('#detail__' + pre).hide();
                $('#' + pre).css({'z-index': '0'})
                $('.rm_border').css({'border':'none'});

                document.cookie = 'guideAdpia' + '=false; expires=Thu, 20 Jan 2029 00:00:00 UTC; path=/;';
            })
        }
    })

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $(function() {
        var _c_name = 'popup_ui';
        if(getCookie(_c_name).length == 0) {
            if(getCookie('guideAdpia').length > 0) {
                $("#newpub-popup-new-interface").css('display', 'block');
            }
        }
    });

    $("#close-popup-new-interface").click(function(event) {
        $("#newpub-popup-new-interface").css('display', 'none');
        setCookie('popup_ui', 'false', 1);
    });

    $(document).click(function(e) {
        if ($(e.target).is("#newpub-popup-new-interface")) {
            $("#newpub-popup-new-interface").css('display', 'none');
            setCookie('popup_ui', 'false', 1);
        }
    });

</script>
@stop
