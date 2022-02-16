@extends('layouts.app')
@section('title', ucfirst($merchantInfo->merchant_id) . ' - ' . $merchantInfo->site_name)
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <script src="{{asset('js/clipboard.js')}}" type="text/javascript"></script>
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
        .avatar_video{
            position: relative;
        }
        .avatar_video p{
            color: black;
            font-weight: 600;
            text-align: center;
            height: 52px;
            margin-top: 10px;
        }
        .avatar_video .btn{
            position: absolute;
            width: 100%;
            height: 64%;
            margin: 0 !important;
            padding: 0 !important;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.3);

        }
        .avatar_video .btn i{
            position: relative;
            opacity: 0.7;
            font-size: 50px;
            color: black;
            margin-top: 20%;
            width: 15%;
            height: 28px;
            background-color: white;
        }
        .font-modal {
            vertical-align: middle;
            color: #000000;
        }
        .modal-style-header .btn-default:hover {
            color: #000000;
        }
        .content-body-modal {
            padding: 7px;
        }
        .avatar_video .btn i:hover {
            opacity: 1 !important;
            color: red !important;
        }
        .fa-youtube-play:before {
            position: absolute;
            top: -9px;
            left: -7px;
        }
        #link_click{
            position: relative;
            margin-bottom: 10px;
        }
        .link_click{
            position: absolute;
            bottom: 20px;
            right: 10px
        }
        .link_vd{
            position: absolute;
            top: 40px;
            right: 10px;
        }
        #link_vd{
            position: relative;
            margin-bottom: 10px;

        }
        .link_vds{
            position: absolute;
            top: 124px;
            right: 10px;
        }
        @media only screen and  (max-width: 800px) {
        	.video_repon{
        		width: 100%;
        	}
            .avatar_video .btn{
                height: 85% !important;
            }
        }
        .video_if{
            overflow: auto;
        }
        input[type='number'] {
            -moz-appearance:textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        .list-event .img-event{
            object-fit: scale-down !important;
        }
        table{width: 100% !important; }
        @media (min-width: 768px) {
            .w-800 {
                width: 800px !important;
            }
        }
        /*img{ width: 100%;}*/
        .float-left{float: left;}
        .float-left{float: right;}
        .font-12{font-size: 12px}
        .mg-8{margin:8px;}
        .brand__bonnus .col-md-3{margin-top: 20px;margin-bottom: 20px;}
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
                        <h2><i class="fa fa-th"></i> {{ ucfirst($merchantInfo->merchant_id) . ' - ' . $merchantInfo->site_name }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="panel panel-adpia">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-info"></i> Thông Tin Chung</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="{{ $merchantInfo->banner_url }}" style="margin-top: 90px" alt="{{ $merchantInfo->site_name }}" class="img-responsive center-block">
                                                <div class="sript-status text-center" style="margin-top: 40px">
                                                @if($merchantInfo->approval_type == 'AUT' || $merchantInfo->subs_status == 'APR')
                                                    <button class="btn btn-success btn-round"><i class="fa fa-check"></i> Đã Liên Kết</button>
                                                @else
                                                    <a href="#" class="btn btn-warning btn-round"data-toggle="modal" data-target=".connect__shopee" ><i class="fa fa-link"></i> Liên Kết</a>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <h2 class="prod_title">{{ $merchantInfo->site_name }}</h2>
                                                <p><span class="strong">Merchant ID:</span> {{ $merchantInfo->merchant_id }}</p>
                                                <p><span class="strong">Website: </span><a href="{{ $merchantInfo->site_url }}?utm_source=adpia" target="_blank"><span class="links">{{ $merchantInfo->site_url }}</span></a></p>
                                                <p><span class="strong">Danh Mục: </span> {{ $merchantInfo->code_name }}</p>
                                                <p><span class="strong">Địa Chỉ: </span> {{ $merchantInfo->contact_address }} </p>
                                                <p><span class="strong">Hoa Hồng:</span>
                                                @if($merchantInfo->com_display)
                                                    <span class="badge bg-red">{{ $merchantInfo->com_display }}</span>
                                                @else
                                                    <span class="badge bg-red">{{ pgm_get_merchant_com_info($merchantInfo->com_info, '-') }}</span>
                                                @endif
                                                </p>
                                                <p><span class="strong">Mô Tả: </span> {{ $merchantInfo->site_desc }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-adpia">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Thông Tin Chiến Dịch</h3>
                                    </div>
                                    <div class="panel-body">
                                    @if(isset($programs))
                                        @foreach($programs as $index => $program)
                                        <div class="x_panel" style="height: auto;">
                                            <div class="x_title">
                                                <h2> {{ $program->pgm_name }}<span class="label label-danger" style="color: white">{{ empty($program->com_display) ? pgm_get_com_info($program->pur_rate, $program->pur_unit_price) : $program->com_display}} </span></h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content" style="display: block">
                                                {!! $program->pgm_desc_clob  !!}
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    </div>
                                </div>
                                <div class="row" id="link__get">
                                    <div class="col-xs-12">
                                        <div class="panel panel-adpia">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Link Phân Phối</h3>
                                            </div>
                                            <div class="panel-body">
                                                @if($merchantInfo->approval_type == 'AUT' || $merchantInfo->subs_status == 'APR')
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price">
                                                    <h4>Link Cơ Bản</h4>
                                                    <form action="" method="post" role="form">
                                                        <label for="link">Link Tracking</label>
                                                        <div class="input-group">
                                                            <input type="text" name="link" id="link-checking" class="form-control" onclick="this.focus();this.select()" value="http://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000">
                                                            <span class="input-group-btn">
                                                                <button type="button" data-clipboard-action="copy" data-clipboard-target="#link-checking" class="btn-copy btn btn-primary">
                                                                    <i class="fa fa-copy"></i> Copy code
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <label for="">Tham số phụ</label>
                                                        <div class="form_group">
                                                            <input type="text" style="width: 22%; margin-bottom: 20px" class=" form-control " id="u_id">
                                                        </div>
                                                        <label for="">Parking Domain</label>
                                                        <div class="form_group">
                                                            <input type="radio" name="parking-domain" class="parking-domain" id="adpia-check" value="click.adpia.vn/tracking.php" checked>
                                                            <label for="adpia-check"><span></span>click.adpia.vn</label>
                                                            <input type="radio" name="parking-domain" class="parking-domain" id="ktmall-check" value="ktmall.vn/tracking.php">
                                                            <label for="ktmall-check"><span></span>ktmall.vn</label>
                                                            <input type="radio" name="parking-domain" class="parking-domain" id="{{ $adpia_domain->name}}-check" value="{{ $adpia_domain->url }}">
                                                            <label for="{{ $adpia_domain->name}}-check"><span></span>{{ $adpia_domain->domain}}</label>
                                                            @if($domains)
                                                                @foreach($domains as $domain)
                                                                <input type="radio" alias="{{ $domain->alias_domain }}" name="parking-domain" class="parking-domain" id="{{ $domain->name }}-check" value="{{ $domain->url }}">
                                                                <label for="{{ $domain->name }}-check"><span></span>{{ $domain->domain }}</label>
                                                                @endforeach
                                                            @endif
                                                            <input type="hidden" id="deeplink_domain" value="{{ $adpia_domain->url }}">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price">
                                                    <form action="" method="post" role="form">
                                                        <div class="form-group">
                                                            <label for="link">Nhập Link Sản Phẩm</label>
                                                            <input type="text" name="link" id="origin-link" class="form-control" placeholder="{{ $merchantInfo->site_url }}/products....">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="radio" name="shortlink-offer" id="shortlink-none" value="0" checked>
                                                            <label style="font-size: 14px;font-weight: normal;margin-right: 10px" for="shortlink-none"><span></span> Không rút gọn link</label>
                                                            <input type="radio" name="shortlink-offer" id="shortlink-offer" value="tinyurl">
                                                            <label style="font-size: 14px;font-weight: normal;margin-right: 10px" for="shortlink-offer"><span></span> Rút gọn link tinyurl</label>
                                                            @if($domains)
                                                                @foreach($domains as $domain)
                                                                <input type="radio" name="shortlink-offer" id="{{ $domain->name }}-short" value="{{ $domain->domain }}">
                                                                <label style="font-size: 14px;font-weight: normal;margin-right: 10px" for="{{ $domain->name }}-short"><span></span>Rút gọn link {{ $domain->domain }}</label>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary" onclick="createDeepLink($('#origin-link').val())">Tạo Link
                                                            </button>
                                                            <a class="btn btn-success" href="{{route
                                                            ('link-history')}}" >Lịch sử rút gọn</a>
                                                        </div>
                                                        <div class="form-group box-result-deeplink"style="display: none">
                                                            <label for="">Kết Quả</label>
                                                            <div class="input-group">
                                                                <input type="text" name="link" id="result-link" onclick="this.focus();this.select()" class="form-control" readonly>
                                                                <span class="input-group-btn"><button type="button" class="btn btn-copy btn-primary" data-clipboard-action="copy" data-clipboard-target="#result-link"><i class="fa fa-copy"></i> Copy</button></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price" style="margin-top: 15px">
                                                    <h4>Banner Link</h4>
                                                    <div class="">
                                                        @foreach($banners as $banner)
                                                        <button class="btn btn-danger banner-list"data-toggle="modal"href="#modal-id" data-link="{{ $banner->banner_url }}"data-width="{{ $banner->width }}"data-height="{{ $banner->height }}"data-id="{{ $banner->link_id }}">{{ $banner->width . ' X ' . $banner->height }}</button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if($video != null)
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price" style="margin-top: 15px">
                                                    <h4 id='video'>Video Link</h4>
                                                    <div class="video owl-carousel owl-theme">
                                                        @foreach($video as $key=>$vd)
                                                        <div class="item">
                                                           <div class="avatar_video">
                                                                <img class="rounded" src="{{$vd->thumbnail}}" alt="">
                                                                <p>{{ $vd->alt_text }}</p>
                                                                <div data-toggle="modal" data-target=".show-test" class="btn view__video" data-url="{{ $vd->banner_url }}"><i class="fa fa-youtube-play" aria-hidden="true" ></i></div>
                                                            </div>
                                                            <div class="action_video text-center">
                                                                <a  class=" btn btn-danger url-video" data-toggle="modal" data-target=".show-test" data-video="{{$vd->banner_url}} " data-merchant="{{ $vd->merchant_id }}">URL</a>
                                                                <a data-toggle="modal" data-target=".show-test" link_id="{{ $vd->link_id }}" mc="{{ $vd->merchant_id }}" href="#" class="btn btn-success iframe">Iframe</a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-center">
                                                <h3 class="text-center">Bạn phải liên kết với merchant mới lấy được link phân phối.
                                                </h3>
                                                <a href="#" class="btn btn-warning btn-round" data-toggle="modal" data-target=".connect__shopee" ><i class="fa fa-link"></i> Liên Kết</a>
                                            </div>
                                            @endif
                                            @if($merchantInfo->approval_type == 'AUT' || $merchantInfo->subs_status == 'APR')
                                                    <div class="panel-body">
                                                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price">
                                                            <h4>Datafeed</h4>
                                                            <p style="padding-bottom: 15px"> Merchant: <b style="font-size: 20px">{{ $merchantInfo->merchant_id }}</b></p>
                                                            <p>Số lượng sản phẩm: <font color="red">{{ ($dataFeed  && $dataFeed->product_count) ? number_format($dataFeed->product_count) : '0' }}</font></p>
                                                            <a href="{{ ($dataFeed  && $dataFeed->link_xml) ? $dataFeed->link_xml : 'javascript:;'  }}" class="btn btn-success" {{ ($dataFeed && $dataFeed->link_xml) ?: 'disabled'  }}>Download XML</a>
                                                            <a href="{{ ($dataFeed && $dataFeed->link_csv) ? $dataFeed->link_csv : 'javascript:;' }}" class="btn btn-success" {{ ($dataFeed && $dataFeed->link_csv) ?: 'disabled'  }}>Download CSV</a>
                                                            <p class="text-justify" style="margin: 15px 10px 15px 0px"><strong>Mô tả: </strong> Sử dụng Datafeed cập nhật liên tục thông tin tên sản phẩm, giá bán, trạng thái thay đổi,… từ tất cả sản phẩm của nhà cung cấp. Tính năng tiện lợi cho việc so sánh giá, review sản phẩm cho website.</p>
                                                        </div>
                                                    </div>
                                                @else
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="panel panel-adpia">
                                        @if($merchantInfo->merchant_id == "lazada" && $lzd_bonus)
                                        <div class="panel-heading modal-lazada">
                                            <h3 class="panel-title">Brand bonus</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-12 col-xs-12 col-md-5 search-box row">
                                                <form action="">
                                                    <div class="col-sm-3"><label for="" style="margin-top: 8px">Tìm kiếm </label></div>
                                                    <div class="col-sm-9">
                                                       <div class="form-group input-group">

                                                            <input type="text" class="form-control" value="{{ $bonus_search }}" name="bonus_search">
                                                            <div class="input-group-btn">
                                                              <button class="btn btn-default" type="submit">
                                                                <i class="glyphicon glyphicon-search"></i>
                                                              </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price brand__bonnus">
                                                <h4>Recommendation</h4>

                                                <div class=" owl-carousel owl-theme">
                                                    @foreach($lzd_bonus['recommend'] as $b)
                                                    <div class="item item-recommendation ">
                                                        <p>{{ str_limit($b->title, 20) }}</p>
                                                        <img style="width: 100%; height: 228px; object-fit: cover;" class="img-responsive" src="{{ $b->image }}" alt="">
                                                        <div class="font-12 mg-8">Bắt đầu: {{ $b->sdate }}</div>
                                                        <div class="font-12 mg-8">Kết thúc: {{ $b->edate }}</div>
                                                        <div class="font-12 mg-8">Hoa hồng bonus <strong class="red">{{ $b->bonus }}</strong></div>
                                                        <div class="float-left">
                                                            <a href="#" data-id="{{ $b->id }}" class="detail_infor_bn">Chi tiết</a>
                                                        </div>
                                                        <div class="float-rigth">
                                                            <a href="#" data-link="{{ $b->tracking_link }}" class="tracking_info_btn">Lấy link</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product_price brand__bonnus">
                                                <h4>Hot Bonnus Offer</h4>
                                                <div class="row">
                                                    @foreach($lzd_bonus['hot'] as $b)
                                                    <div class="col-md-3">
                                                        <p>{{ str_limit($b->title, 20) }}</p>
                                                        <img style="width: 100%; height: 228px; object-fit: cover;" class="img-responsive" src="{{ $b->image }}" alt="">
                                                        <!-- <div class="font-12 mg-8">Bắt đầu: {{ $b->sdate }}</div> -->
                                                        <!-- <div class="font-12 mg-8">Kết thúc: {{ $b->edate }}</div> -->
                                                        <div class="font-12 mg-8">Hoa hồng bonus <strong class="red">{{ $b->bonus }}</strong></div>
                                                        <div class="float-left">
                                                            <a href="#" data-id="{{ $b->id }}" class="detail_infor_bn" data-target="#bonnus_infor_detail">Chi tiết</a>
                                                        </div>
                                                        <div class="float-rigth">
                                                            <a href="#" data-link="{{ $b->tracking_link }}" class="tracking_info_btn" >Lấy link</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                {{ $bonus->appends(['bonus_search' => $bonus_search])->links() }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div id="sider-bar">
                                    <div class="panel panel-adpia ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-star"></i> Sự Kiện Nổi Bật</h3>
                                        </div>
                                        <div class="panel-body">
                                            @if(isset($boards))
                                                @foreach($boards as $board)
                                                    <div class="row list-event">
                                                        <div class="col-sm-5">
                                                            <a href="{{ route('board.show', $board->article_id) }}"><img src="{{ $board->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $board->image }}" alt="{{ $board->title }}" class="img-event"></a>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="title">
                                                                <a href="{{ route('board.show', $board->article_id)  }}">{{ $board->title}}</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade show-test" id="show-test" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content content__video">

        </div>
    </div>
</div>
<div class="modal fade" id="modal-banner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Banner Review</h4>
            </div>
            <div class="modal-body">
                <img src="" alt="{{ $merchantInfo->site_name }}" class="image img-responsive center-block">
                <div class="generate" style="margin-top: 20px;">
                    <a href="#" class="btn btn-success center-block generate-code" style="margin-bottom: 20px">Get code</a>
                    <textarea name="res" class="form-control" id="rescode" rows="4" readonly style="display: none" onclick="this.focus();this.select()"></textarea>
                    <a class="btn btn-copy btn-success center-block copy-button" data-clipboard-action="copy" data-clipboard-target="#modal-banner #rescode" style="display: none"><i class="fa fa-copy"></i> Copy code</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade connect__shopee" role="dialog" style="padding-top: 5%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red" style="padding: 3px !important; border-radius:5px 5px 0 0">
                <h4 class=" text-center" style="color: #ffea00; font-size: 16px;">QUY ĐỊNH KHI CHẠY CHIẾN DỊCH</h4>
            </div>
            <div class="modal-body">
                <ul style="color:red">
                    <li>
                        <p style="color:black; line-height: 1.7">Để đảm bảo hiệu quả của chiến dịch, bạn cần phải được Adpia phê duyệt trước khi có thể liên kết với Merchant. Adpia nghiêm cấm các hành vi gian lận, do đó bạn cần tuân thủ các quy định về quảng cáo của từng Merchant và chính sách chống gian lận của Adpia.</p>
                    </li>
                    <li>
                        <p style="color:black;line-height: 1.7">Tất cả các trường hợp gian lận hoặc nghi ngờ gian lận sẽ bị ngưng quyền chạy chiến dịch ngay lập tức. Tùy vào mức độ vi phạm, Adpia sẽ hủy mọi hoa hồng phát sinh trước đó của Publisher hoặc khóa tài khoản vĩnh viễn.</p>
                    </li>
                </ul>
            </div>
            <div class="modal-footer " style="background:#a1a1a1; border-radius:0 0 5px 5px; position: relative; ">
                <a href="{{ route('subscript', $merchantInfo->merchant_id) }}" class="btn tick__yes"  ><i class="fa fa-check" aria-hidden="true"></i> TÔI ĐỒNG Ý</a>
                <p style="color:white; text-align: center; font-style: italic; margin-bottom: 0px !important">* Bạn có thể liên hệ Account Manager để được duyệt chiến dịch nhanh hơn</p>
                <p style="color:white;margin-bottom: 0px !important; text-align: center; font-style:italic;"> Xin cảm ơn!</p>
            </div>
        </div>
    </div>
</div>
@if($id == 'lazada')
<div class="modal fade" id="popup-merchant" style="padding-top: 50px   ">
    <div class="modal-dialog">
        <a href="http://adpia.vn/lazada-3-luu-y" target="_blank" id="popup-link">
            <img src="http://ac.adpia.vn/upload/images/lazada_popup.png" id="img-popup" alt="" class="img-responsive">
        </a>
        <button type="button" class="close__popup btn btn-default" data-dismiss="modal">X</button>
    </div>
</div>
@endif
@if($id == 'shinhanbank')
    <div class="modal fade" id="popup-merchant" style="padding-top: 50px   " role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title font-modal"><i class="glyphicon glyphicon-bullhorn"></i> Thông báo</h4>
                    <button type="button" class="close__popup btn btn-default" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <h4 class="font-modal content-body-modal">
                        Hiện nay, một số publishers đang chưa hiểu về cách thức ghi nhận hoa hồng và chính sách của chiến dịch Shinhanbank nên dẫn tới đổ một số lượng data chất lượng không phù hợp với chiến dịch này.
                        Vậy nên , bạn hãy đọc kĩ nội dung chiến dịch, để có thể đẩy số một cách hiệu quả nhất, tránh được tình trạng data rác.
                        <br /><br />
                        Chúc bạn nhiều đơn!
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- bonnus -->
<div class="modal fade " id="bonnus_infor" role="dialog" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content content__video">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <img src="https://adpia.vn/images/logo-1.png" alt="">
            </div>
            <div class="modal-body">
                <div>
                    <label>Get link:</label>
                    <input type="text" class="form-control" id="link_vd" value="http://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ auth()->user()->last_contact_affiliate_id }}&l=3333&l_cd1=3&l_cd2=0&tu=https%3A%2F%2Fc.lazada.vn%2Ft%2Fc.ZN5RK " name="lname">
                    <button class="btn link_vd" onclick="video()"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail-->
<div class="modal fade " id="bonnus_infor_detail" role="dialog" >
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content content__video">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <img src="https://adpia.vn/images/logo-1.png" alt="">
            </div>
            <div class="modal-body modal__bonus__detail">
                <div>
                    <p><span style="color: black">Offer Name:</span> <span id="modal__bonus__detail__title">Đại Lý Nước Mắm Bé Bầu Ở TP HCM</span></p>
                    <p><span style="color: black">Mô tả:</span><span id="modal__bonus__detail__desc"></span></p>
                    <p><span style="color: black">Link :</span> <a id="modal__bonus__detail__link" href="https://c.lazada.vn/t/c.ZN5RK">https://c.lazada.vn/t/c.ZN5RK</a></p>
                    <p><span style="color: black">Chiến dịch:</span> CPS</p>
                    <p><span style="color: black">Bonnus:</span>Bonus Commission rate <span id="modal__bonus__detail__com"></span></p>
                    <img  class="img-responsive" id="modal__bonus__detail__img" src="http://ac.adpia.vn/upload/images/5c80e21fb464a090b2fa4f2f87df71b4.jpeg" alt="">
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
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <script>
    $(document).ready(function(){
        $('#popup-merchant').modal('show');
        $(".video ").owlCarousel({
            // loop:true,
            autoplay:false,
            margin:20,
            items:3,
            dots:false,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:1
                },
                992:{
                    item:3
                }
            }
        });
        $(".brand__bonnus .owl-carousel").owlCarousel({
            loop:true,
            autoplay:false,
            margin:20,
            items:4,
            dots:false,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:1
                },
                992:{
                    item:3
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#sider-bar").sticky({topSpacing: 20, bottomSpacing: 160});

        //modal lazada
        if($('.modal-lazada').length)
        {
            $('.detail_infor_bn').on('click', function(evt){
                evt.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                        url: 'https://api.adpia.vn/bonus/show_merchant_bonus/'+id,
                        success: function(data){
                            data = JSON.parse(data);
                            $('#modal__bonus__detail__title').text(data.TITLE);
                            $('#modal__bonus__detail__desc').text(data.DETAIL);
                            $('#modal__bonus__detail__link').attr('href', data.LINK).text(data.LINK);
                            $('#modal__bonus__detail__com').text(data.BONUS);
                            $('#modal__bonus__detail__img').attr('src',data.IMAGE);
                            $('#bonnus_infor_detail').modal('show');
                        }
                    })

            });

            $('.tracking_info_btn').on('click', function(evt){
                evt.preventDefault();
                var tracking_link = $(this).attr('data-link');

                $('#link_vd').val(tracking_link);
                $('#bonnus_infor').modal('show');

            });

        }
    });

    var currentAFF = '{{ $aff }}';
    var currentMerchant = '{{ $merchantInfo->merchant_id }}';

    $('.parking-domain').change(function () {
        var value = $(this).val();

        var curLink = $('#link-checking').val();

        var res = curLink.match(/http:\/\/([a-z\.]+)\.(com|vn)\/(tracking\.php|click)/g);
        res = curLink.replace(res, 'http://' + value);

        $('#link-checking').val(res);
        $('#adpia-check').val(myTrim(value));
    });

    function myTrim(x) {
      x.replace(/\n/gm,'');
      return x.replace(/^\s+|\s+$/gm,'');
    }

    function createDeepLink(value) {
        showLoading();
        var shortLink = $('input[name=shortlink-offer]:checked').val();

        if (!value) {
            toastr.error("Mời nhập link sản phẩm");
            hideLoading();
            return;
        }

        if (!value.match(/(http:\/\/|https:\/\/)/g)) {
            toastr.error("Mời nhập đúng định dạng URL");
            hideLoading();
            return;
        }

        var domain = $('#adpia-check').val();
        var origin = 'http://' + domain + '?m=' + currentMerchant + '&a=' + currentAFF + '&l=9999&l_cd1=3&l_cd2=0&tu=' + encodeURIComponent(value);

        if (shortLink && parseInt(shortLink) !== 0) {
            $.ajax({
                url: '{{ route('shortlink') }}',
                method: 'POST',
                data: {_token: '{{ csrf_token() }}', url: origin, domain: shortLink},
                success: function (data) {

                    if (data && data.status === 200) {
                        $('.box-result-deeplink').show();
                        $('#result-link').val(data.data);
                        InserLink(value, data.data, origin)

                        toastr.success("Tạo link thành công!");
                    }

                    hideLoading();
                    return true;
                },
                error: function (e) {

                    if (e.status === 501) {
                        toastr.error('Link này không thuộc trên hệ thống của chúng tôi!');
                        hideLoading();

                        return false;
                    }

                    toastr.error('Có lỗi xảy ra, xin vui lòng thử lại sau!');
                    hideLoading();
                    return false;
                }
            });
        } else {
            $('.box-result-deeplink').show();
            $('#result-link').val(origin);
            toastr.success("Tạo link thành công!");
            hideLoading();
            return true
        }
    }

    // Insert link
    function InserLink(root_link, short_link, link_click) {
        $.ajax({
            url : '{{ route('insert-link-ajax') }}',
            method : 'POST',
            data: {_token: '{{ csrf_token() }}', root: root_link, short: short_link, click: link_click},
            success: function() {
                console.log('success');
            },
            error: function() {
                console.log('error');
            }
        });
    }

    $('.banner-list').click(function () {
        var link = $(this).attr('data-link');
        var id = $(this).attr('data-id');
        var width = $(this).attr('data-width');
        var height = $(this).attr('data-height');
        var genButton = $('#modal-banner .generate-code');

        $('#modal-banner .image').attr('src', link);

        genButton.attr('data-id', id);
        genButton.attr('data-width', width);
        genButton.attr('data-height', height);

        $('#modal-banner').modal('show');

        return false;
    });

    $('#modal-banner .generate-code').click(function () {
        var id = $(this).attr('data-id');
        var width = $(this).attr('data-width');
        var height = $(this).attr('data-height');
        var imageLink = $('#modal-banner .image').attr('src');

        var banner = '<link href="https://adpia.vn/css/adpia_banner_style.css" rel="stylesheet" type="text/css"/>\n';
        banner += '<div class="adpia_banner" style="width:' + width + 'px">\n'
        banner += '<a href="https://adpia.vn/" class="adpia_link"><span class="adpia_bg_hide">Ads by Adpia</span></a>\n';
        banner += '<a href="http://click.adpia.vn/click.php?m=' + currentMerchant + '&a=' + currentAFF + '&l=' + id + '&l_cd2=2">';
        banner += '<img src="' + imageLink + '" border="0" width="' + width + '" height="' + height + '"></a>\n';
        banner += '<img src="https://img.adpia.vn/apshow.php?m_id=' + currentMerchant + '&a_id=' + currentAFF + '&p_id=0000&l_id=' + id + '&l_cd1=G&l_cd2=2" width="1" height="1" border="0" nosave style="display:none">\n';
        banner += '</div>';

        $('#modal-banner #rescode').show();
        $('#modal-banner .copy-button').show();
        toastr.success("Tạo code banner thành công!");

        $('#modal-banner #rescode').val(banner);

        return false;
    });

    $('#modal-banner').on('hidden.bs.modal', function () {
        $('#modal-banner #rescode').hide();
        $('#modal-banner .copy-button').hide();
    });

    $(document).ready(function () {
        $('.tb-coupoun').DataTable({
            retrieve: true,
            paging: true,
            info: true,
            pageLength: 25,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: 'Xuất File Excel',
                className: 'btn btn-primary',
            }]
        });
    });

    var clipboard = new ClipboardJS('.btn-copy');

    clipboard.on('success', function (e) {
        toastr.success('Sao chép thành công!');
    });

    clipboard.on('error', function (e) {
        toastr.error('Error Copy'+ e);

    });

    $('.view__video').click(function() {
        url = $(this).attr('data-url');
        data = '<iframe width="100%" height="600" src="'+url+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $('.content__video').html(data);
    })

    $('a.url-video').click(function() {
        url = $(this).attr('data-video');
        merchant = $(this).attr('data-merchant');
        data = '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                    '<img src="https://adpia.vn/images/logo-1.png" alt="">'+
                '</div>'+
                '<div class="modal-body">'+
                    '<div>'+
                        '<label>Link video</label>'+
                        '<input type="text" class="form-control" id="link_vd" value="'+url+'" name="lname">'+
                        '<button class="btn link_vd" onclick="video()"><i class="fa fa-clipboard" aria-hidden="true"></i></button>'+
                    '</div>'+
                    '<div>'+
                        '<label>Link click</label>'+
                        '<input type="text"  class="form-control" id="link_click" value="http://click.adpia.vn/tracking.php?m='+merchant+'&a='+'{{ App\Http\Helpers\Helper::getCurrentAff() }}'+'&l=0000" name="lname">'+
                        '<button class="btn link_click" onclick="linkClick()"><i class="fa fa-clipboard" aria-hidden="true"></i></button>'+
                    '</div>'+
                '</div>';
        $('.content__video').html(data);

    });

    function video() {
        $('#link_vd').select();
        data = document.execCommand("copy");

        toastr.success("Sao chép thành công!");
    }

    function linkClick() {
        $('#link_click').select();
        data = document.execCommand("copy");

        toastr.success("Sao chép thành công!");
    }

    $('.iframe').click(function() {
        link_id = $(this).attr('link_id');
        mc = $(this).attr('mc');

        data = '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                    '<img src="https://adpia.vn/images/logo-1.png" alt="">'+
                '</div>'+
                '<div class="modal-body">'+
                    '<div class="loadings" >'+
                        '<div class="loading"></div>'+
                    '</div>'+
                    '<div class="row " style="margin-bottom: 20px;">'+
                        '<div class="col-md-3">'+
                            '<label>Chiều dài (px):</label>'+
                            '<input type="number" required="true" min=0 step="1"  data-bind="value:replyNumber" id="w_video" class="s_video form-control "  value="560">'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<label>Chiều rộng (px):</label>'+
                            '<input type="number"  required="true" min=0 step="1"  data-bind="value:replyNumber" id="h_video" class="s_video form-control" value="315">'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<label class="col-md-12">&nbsp;</label>'+
                            '<a  id="get__size" class="get__size btn btn-success">Lấy code</a>'+
                        '</div>'+
                    '</div>'+
                    '<div>'+
                        '<label>Code Iframe</label>'+
                        '<input type="text" class="form-control iframe_vl" id="link_vd" value="">'+
                        '<button class="btn link_vds" onclick="video()"><i class="fa fa-clipboard" aria-hidden="true"></i></button>'+
                    '</div>'+
                    '<div class="video_if">'+

                    '</div>'+
                '</div>';
        $('.content__video').html(data);

        width = $('#w_video').val();
        height = $('#h_video').val();
        getIframe(mc, link_id, width, height);
        getBySize(mc, link_id);
        dsbButton(width, height);

    });

    function getIframe(mc, link_id, width, height) {
        $.ajax({
            url: '{{ route('api-video') }}',
            method: 'POST',
            data: {id: link_id, merchant:mc,aff_id: "{{ App\Http\Helpers\Helper::getCurrentAff() }}", width:width, height:height, _token: '{{ csrf_token() }}'},
            success: function (data) {
                $('.iframe_vl').val(data);
                $('.video_if').html(data);
                $('.loadings').hide();
                $('.get__size').attr('disabled', true)
            },

            error: function() {
                $('.loadings').hide();
                toastr.error("Đã có lỗi xảy ra!");
            }

        });
    }

    function getBySize(mc , link_id) {
        $('#get__size').click(function() {
            $('.loadings').show();
            width = $('#w_video').val();
            height = $('#h_video').val();
            getIframe(mc, link_id, width, height);
            dsbButton(width, height)
        })
    }

    function dsbButton(width, height){
        $('.s_video').keyup(function() {
            w = $('#w_video').val();
            h = $('#h_video').val();
            if(w != width || h != height) {
                console.log('a')
                $('.get__size').attr('disabled', false)
            } else {
                console.log('b')
                $('.get__size').attr('disabled', true)
            }

        })
    }

    $('#u_id').keyup(function() {
        link = "http://click.adpia.vn/tracking.php?m={{ $merchantInfo->merchant_id }}&a={{ $aff }}&l=0000&u_id=";
        id = $(this).val();
        url = link +id;
        $('#link-checking').val(url);
    });

</script>
@endsection
