@extends('layouts.app')
@section('title', 'Offer')
@section('style')
<style>
    .table thead th {
        text-align: left !important;
    }

    .table thead th.last {
        text-align: center !important;
    }

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

    .site-name{
        position: relative;
    }
    .global{
        position: absolute;
        top: 10px;
        font-size: 10px;
        color: green;
    }
    .top-product{
        background-color: white;
        border: 1px solid #e6e9ed;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .top-product img{
        width: 100%;
    }
    .col-md-2{
        margin-left: 45px;
        color: #3e3e3e;
        padding-bottom: 20px;
        padding-top: 15px;
        text-align: center;
    }
    .parents{
        position: relative;
    }
    .text-danger{
        color: red;
    }
    .menu-top{
        text-align: center;
        margin-top: 10px;
    }
    .menu-top li{
        list-style: none;
        display: inline-block;
        padding: 5px 25px 5px 25px;
    }
    .click-style{
        color: red !important;
    }
    .menu-top li {
        font-size: 20px;
        color:#3e3e3e;
        font-weight: 600;
        cursor: pointer;
    }
    .col-md-2 p{
        padding-top: 20px;
        font-size: 12px;
    }
    .block{
        display: block !important;
    }
    .top-detail{
        display: none;
    }
    .col-md-2:hover .hover-child{
        display:block;
    }
    .hover-child{
        background: #181b3bed;
        min-height: 180px;
        text-align: center;
        width: 100%;
        left: 0;
        top: 0;
        position: absolute;
        display: none;
        text-align: center;
        color: #b1b1b1;
    }
    .hover-child>h5{
        color: white;
        font-weight: 600;
        line-height: 0;
        padding-top: 17px;
    }
    .hover-child>p{
        width: 74%;
        margin: 0 auto;
        margin-bottom: 10px;
        overflow:hidden;
        max-height:85px;
    }
    .hover-child>a{
        margin-bottom: 15px;
    }
    .parents>img{
        padding: 10px 0;
        height: 90px;
        object-fit: scale-down;
    }
    @media only screen and (max-width: 1700px) {
        .col-md-2{
           margin-left: 35px;
        }
        .hover-child>p{
            max-height: 72px;
        }
        .hover-child{
            min-height:164px ;
        }
    }

    @media only screen and (max-width: 1400px) {
        .col-md-2{
           margin-left: 30px;
        }
        .hover-child>p{
            max-height: 52px;
        }
        .hover-child{
            min-height: 148px;
        }
    }
    @media only screen and (max-width: 1190px) {
        .top-product{
            display:none;
        }
    }
    .col-sm-12>.pull-center>.btn-group>.btn{
        margin-right: 15px;
        }
</style>
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-12 top-product" >
                <div class="col-xs-12 menu-top">
                    <ul>
                        <li class="top click-style" data="top-merchant">Top Merchant</li>
                        <li class="top" data="new-merchant">New Merchant</li>
                        <li class="top" data = "merchant-global">Merchant Global</li>
                    </ul>
                </div>
                <div class="top-detail block" id="top-merchant">
                    @foreach ($topMerchant as $top)
                    <div class="col-xs-12 col-md-2 parents">
                        <img src="{{ $top->banner_url }}" alt="">
                        <p>HOA HỒNG: <span class="text-danger">{{ $top->com_display }}</span></p>
                         <div class=" hover-child">
                            <h5>{{ strtoupper($top->merchant_id) }}</h5>
                            <p>{{ $top->site_desc }}</p>
                            <a href="{{ route('offer.show',$top->merchant_id) }}#link__get" class="btn btn-round btn-success btn-sm">Lấy Link</a>
                         </div>
                    </div>
                    @endforeach
                </div>
                <div class="top-detail" id="new-merchant">
                    @foreach ($newMerchant as $new)
                    <div class="col-xs-12 col-md-2 parents">
                        <img src="{{ $new->banner_url }}" alt="">
                        <p>HOA HỒNG: <span class="text-danger">{{ $new->com_display }}</span></p>
                        <div class=" hover-child">
                            <h5>{{ strtoupper($new->merchant_id) }}</h5>
                            <p>{{$new->site_desc}}</p>
                            <a href="{{ route('offer.show',$new->merchant_id) }}#link__get" class="btn btn-round btn-success btn-sm">Lấy Link</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="top-detail" id="merchant-global" >
                    @foreach ($merchantGlobal as $mg)
                    <div class="col-xs-12 col-md-2 parents">
                        <img src="{{ $mg->banner_url }}" alt="">
                        <p>HOA HỒNG: <span class="text-danger">{{$mg->com_display}}</span></p>
                        <div class=" hover-child">
                            <h5>{{strtoupper($mg->merchant_id)}}</h5>
                            <p>{{$mg->site_desc}}</p>
                            <a href="{{ route('offer.show',$mg->merchant_id) }}#link__get" class="btn btn-round btn-success btn-sm">Lấy Link</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách offer</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-xs-12 product_price" style="padding: 30px 0">
                                <form action="{{route('offer.index')}}" method="GET" role="form" class="offer-filter">
                                    <input type="hidden" name="offer_category" id="category-ip" value="all">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="offer_name">Từ Khóa</label>
                                            <input type="text" class="form-control" name="offer_name" id="offer_name" placeholder="Tên offer..." value="{{ request('offer_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="offer_type">Loại</label>
                                            <select name="offer_type" id="offer_type" class="form-control">
                                                <option value="All" {{ request('offer_type') == 'all' ? 'selected' : '' }}>Tất Cả</option>
                                                <option value="cps" {{ request('offer_type') == 'cps' ? 'selected' : '' }}>CPS</option>
                                                <option value="cpa" {{ request('offer_type') == 'cpa' ? 'selected' : '' }}>CPA</option>
                                                <option value="cpi" {{ request('offer_type') == 'cpi' ? 'selected' : '' }}>CPI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="order_by">Order By</label>
                                            <select name="order_by" id="order_by" class="form-control">
                                                <option default value = "all" {{ request('order_by') == 'all' ? 'selected' : '' }}>Order by</option>
                                                <option value="new" {{ request('order_by') == 'new' ? 'selected' : '' }}>New Merchant</option>
                                                <option value="top" {{ request('order_by') == 'top' ? 'selected' : '' }}>Top Merchant</option>
                                                <option value="cate_name" {{ request('order_by') == 'cate_name' ? 'selected' : '' }}>Category Name</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        @foreach($categories as $key => $category)
                                        <button type="button" data-id="{{ $key }}" class="btn btn-default btn-category {{ request('offer_category') == $key ? 'active' : '' }}" style="margin-right: 16px" title="{{ $category['name']['en'] }}">{{ $category['name']['vi'] }} <span style="color: #5e64ad">({{ getOfferCount($category['child'], request()->all()) }} )</span></button>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title" colspan="2">Chiến dịch</th>
                                                <th class="column-title">Hoa hồng</th>
                                                <th class="column-title " colspan="2">Lĩnh Vực</th>
                                                <th class="column-title">Loại</th>
                                                <th class="column-title no-link last">
                                                    <span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)
                                            <tr class="pointer">
                                                <td class="">
                                                    <a href="{{ route('offer.show', $offer->merchant_id) }}">
                                                        <img src="{{ $offer->banner_url }}" alt="{{ $offer->site_name }}" width="120px">
                                                    </a>
                                                </td>
                                                <td class="site-name ">
                                                    <a href="{{ route('offer.show', $offer->merchant_id) }}#link__get">{{ $offer->site_name }}</a>
                                                    @if($offer->nationality != 'VNM')
                                                    <small class="global">global</i></small>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if($offer->com_display)
                                                    <strong>{{ $offer->com_display }}</strong>
                                                    @else
                                                    <strong>{{ pgm_get_merchant_com_info($offer->com_info, '-')}}</strong>
                                                    @endif
                                                </td>
                                                <td class="">{{ $offer->cat_name1 }}</td>
                                                <td>
                                                @if($offer->video)
                                                    <a href="{{ route('offer.show', $offer->merchant_id) }}#video ">
                                                    <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                                @endif
                                                </td>
                                                <td class="a-right a-right "> {{ $offer->adtype }}</td>
                                                <td class="last text-center">
                                                    @if($offer->subs_status = 'APR')
                                                    <a href="{{ route('offer.show', $offer->merchant_id) }}#link__get" class="btn btn-round btn-success btn-sm">Lấy Link</a>
                                                    @elseif($offer->subs_status == '' && $offer->approval_type == 'MAN')
                                                    <a href="#" class="btn btn-round btn-success btn-sm">Liên kết</a>
                                                    @elseif($offer->subs_status == 'REQ')
                                                    <span href="#" class="btn btn-round btn-success btn-sm">Đã gửi yêu cầu</span>
                                                    @else
                                                    <span href="#" class="btn btn-round btn-success btn-sm">Không thể liên kết</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pull-center" style="text-align:center;">
                                    @if ($maxPage > 1)
                                        {!! $link !!}
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
@endsection
@section('script')
<script>
    $('.btn-category').click(function () {
        current = $(this);

        $('.btn-category').removeClass('active');
        current.addClass('active');

        $('#category-ip').val(current.attr('data-id'));

        $('.offer-filter').submit();
    });

    $('.offer-filter input, .offer-filter select').change(function() {
        $('.offer-filter').submit();
    });

    $('.top').click(function () {
        $('.top').removeClass('click-style');
       $(this).addClass('click-style');
       tab = $(this).attr('data');
       $(".top-detail").removeClass("block")
       $("#"+tab).addClass("block")
    })

    // $('.top').each((e, i) => $(i).addClass('click-style'));

</script>
@endsection
