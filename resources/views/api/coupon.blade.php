@extends('layouts.app')
@section('title', 'Coupon API')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
    <style>
        pre {
            background-color: #333;
        }

        pre code {
            border: none !important;
            color: #ff5d5d;
            box-shadow: none;
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
                                <i class="fa fa-plug"></i> COUPON API DOC
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
                                <div class="col-sm-8">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="api_link">Link API </label>
                                        <div class="input-group">
                                            <input onclick="this.focus();this.select();" readonly="" type="text"
                                                   class="form-control code_format"
                                                   value="https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}"
                                                   id="api_link">
                                            <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" title="Copy"
                                            onclick="copyToClipboard($('#api_link').val())"><i
                                                class="fa fa-copy"></i></button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12 col-xs-12">
                                    <h3>H?????ng d???n</h3>

                                    <h4>T???ng Quan</h4>
                                    <ul>
                                        <li>
                                            Link: <a
                                                    href="https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}">https://adpia.vn/api/v1/coupon?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}</a>
                                        </li>
                                        <li>Method: <code>GET</code>, <code>POST</code></li>
                                        <li>Reponse Type: <code>JSON</code></li>
                                        <li>Limit Request: <code>None</code></li>
                                    </ul>

                                    <h4>Tham s??? truy???n</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Tham s???</th>
                                                <th>Ki???u d??? li???u</th>
                                                <th>B???t bu???c</th>
                                                <th>M???c ?????nh</th>
                                                <th>M?? T???</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><code>token</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td>Token c???a t??i kho???n</td>
                                            </tr>
                                            <tr>
                                                <td><code>affid</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>Affliate ID hi???n t???i c???a t??i kho???n</td>
                                                <td>Affiliate ID c???a t??i kho???n</td>
                                            </tr>
                                            <tr>
                                                <td><code>limit</code></td>
                                                <td><code>Number</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>10</td>
                                                <td>S??? l?????ng coupon tr??? v???</td>
                                            </tr>
                                            <tr>
                                                <td><code>page</code></td>
                                                <td><code>Number</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>1</td>
                                                <td>Trang d??? li???u</td>
                                            </tr>
                                            <tr>
                                                <td><code>page</code></td>
                                                <td><code>Number</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>1</td>
                                                <td>Trang d??? li???u</td>
                                            </tr>
                                            <tr>
                                                <td><code>merchant</code></td>
                                                <td><code>String</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>null</td>
                                                <td>L???c d??? li???u theo Merchant</td>
                                            </tr>
                                            <tr>
                                                <td><code>start_date</code></td>
                                                <td><code>Number</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>null</td>
                                                <td>L???c d??? li???u theo ng??y b???t ?????u c???a coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>end_date</code></td>
                                                <td><code>Number</code></td>
                                                <td><i class="fa fa-times"></i></td>
                                                <td>null</td>
                                                <td>L???c d??? li???u theo ng??y k???t th??c c???a coupon</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h4>Reponse Data</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered jambo_table">
                                            <thead>
                                            <tr>
                                                <th>Tham s???</th>
                                                <th>Ki???u d??? li???u</th>
                                                <th>M?? T???</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><code>DISCOUNT_ID</code></td>
                                                <td><code>Number</code></td>
                                                <td>ID c???a coupon</td>
                                            </tr>


                                            <tr>
                                                <td><code>MERCHANT_ID</code></td>
                                                <td><code>String</code></td>
                                                <td>Merchant</td>
                                            </tr>
                                            <tr>
                                                <td><code>TITLE</code></td>
                                                <td><code>String</code></td>
                                                <td>Ti??u ????? c???a coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>DESCRIPTION</code></td>
                                                <td><code>String</code></td>
                                                <td>M?? t??? c???a coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>START_DATE</code></td>
                                                <td><code>Number</code></td>
                                                <td>Ng??y b???t ?????u ??p d???ng coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>END_DATE</code></td>
                                                <td><code>Number</code></td>
                                                <td>Ng??y k???t th??c ??p d???ng coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>DISCOUNT</code></td>
                                                <td><code>String</code></td>
                                                <td>M???c gi???m gi?? c???a coupon</td>
                                            </tr>


                                            <tr>
                                                <td><code>QUANTITY</code></td>
                                                <td><code>String</code></td>
                                                <td>S??? l?????ng coupon, n???u <code>QUANTITY = 0</code> : Kh??ng gi???i h???n s??? l?????ng</td>
                                            </tr>
                                            <tr>
                                                <td><code>CATEGORY</code></td>
                                                <td><code>String</code></td>
                                                <td>ID Danh m???c Coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>CATEGORY_NAME</code></td>
                                                <td><code>String</code></td>
                                                <td>Danh m???c coupon</td>
                                            </tr>
                                            <tr>
                                                <td><code>NOTE</code></td>
                                                <td><code>String</code></td>
                                                <td>Coupon Note</td>
                                            </tr>
                                            <tr>
                                                <td><code>NOTE</code></td>
                                                <td><code>String</code></td>
                                                <td>Coupon Note</td>
                                            </tr>

                                            <tr>
                                                <td><code>ORIGIN_URL</code></td>
                                                <td><code>String</code></td>
                                                <td>Link g???c c???a coupon</td>
                                            </tr>

                                            <tr>
                                                <td><code>BANNER_URL</code></td>
                                                <td><code>String</code></td>
                                                <td>Banner URL c???a coupon</td>
                                            </tr>

                                            <tr>
                                                <td><code>DEVICE</code></td>
                                                <td><code>Number</code></td>
                                                <td>
                                                    N???n t???ng h??? tr???:
                                                    <ul>
                                                        <li>1: T???t c??? thi???t b???</li>
                                                        <li>2: App only</li>
                                                        <li>3: Web only</li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><code>AFF_LINK</code></td>
                                                <td><code>String</code></td>
                                                <td>Link k??m theo m?? tracking</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <h4>V?? d???</h4>
                                    <p>Request URL: <a href="http://www.adpia.vn/api/v1/coupon/?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}&limit=1&page=1">http://www.adpia.vn/api/v1/coupon/?token={{ \App\Http\Helpers\Apicryption::encrypt(auth()->id(), 'fadsfhakjhdas') }}&limit=1&page=1</a></p>
                                    <p>Response data</p>

                                    <pre><code class="language-json hljs ">{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-number">200</span></span>,
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">total</span>": <span class="hljs-value"><span class="hljs-string">"45"</span></span>,
    "<span class="hljs-attribute">items</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">DISCOUNT_ID</span>": <span class="hljs-value"><span class="hljs-string">"126"</span></span>,
        "<span class="hljs-attribute">MERCHANT_ID</span>": <span class="hljs-value"><span class="hljs-string">"shopee"</span></span>,
        "<span class="hljs-attribute">TITLE</span>": <span class="hljs-value"><span class="hljs-string">"KAZUMY"</span></span>,
        "<span class="hljs-attribute">DESCRIPTION</span>": <span class="hljs-value"><span class="hljs-string">"GI???M 12% T???I ??A 30K ????N T??? 200K"</span></span>,
        "<span class="hljs-attribute">START_DATE</span>": <span class="hljs-value"><span class="hljs-string">"20181113"</span></span>,
        "<span class="hljs-attribute">END_DATE</span>": <span class="hljs-value"><span class="hljs-string">"20181130"</span></span>,
        "<span class="hljs-attribute">DISCOUNT</span>": <span class="hljs-value"><span class="hljs-string">"12%"</span></span>,
        "<span class="hljs-attribute">DISCOUNT_CODE</span>": <span class="hljs-value"><span class="hljs-string">"HOMEKAZUMY15"</span></span>,
        "<span class="hljs-attribute">QUANTITY</span>": <span class="hljs-value"><span class="hljs-string">"0"</span></span>,
        "<span class="hljs-attribute">CATEGORY</span>": <span class="hljs-value"><span class="hljs-string">"DG"</span></span>,
        "<span class="hljs-attribute">NOTE</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">ORIGIN_URL</span>": <span class="hljs-value"><span class="hljs-string">"https://shopee.vn/tongthanhtung"</span></span>,
        "<span class="hljs-attribute">BANNER_URL</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">DEVICE</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">CATEGORY_NAME</span>": <span class="hljs-value"><span class="hljs-string">"??i???n t??? v?? Gia d???ng"</span></span>,
        "<span class="hljs-attribute">AFF_LINK</span>": <span class="hljs-value"><span class="hljs-string">"https://pub.adpia.vn/api/deeplink/?a=A100002861&amp;url=https%3A%2F%2Fshopee.vn%2Ftongthanhtung"</span>
      </span>}
    ]
  </span>}
</span>}</code></pre>
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
            $("#sider-bar").sticky({topSpacing: 20});
        });


    </script>
@endsection