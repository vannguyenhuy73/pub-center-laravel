@extends('layouts.app')
@section('title', 'PostBack')
@section('style')
<link rel="stylesheet" href="{{ asset('css/ocean.css') }}">
<style>
    pre {
        background-color: #333;
        padding: 0;
    }

    pre code {
        border: none !important;
        color: #ff5d5d;
        box-shadow: none;
    }

    .from-group-cus {
        padding: 5px 20px;
        /*border: 1px solid #12225b;*/
        border-radius: 3px;
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
                            <i class="fa fa-exchange"></i> Post Back
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
                            <div class="col-xs-12">
                                <p>API cho phép bạn nhận kết quả trực tiếp tại thời điểm 1 giao dịch được thực hiện
                                trên site Merchant</p>
                                <h2>Reponse</h2>
                                <ul class="text-list gray">
                                    <li>Dữ liệu được chuyển trực tiếp tại thời điểm giao dịch theo phương thức HTTP
                                        POST
                                    </li>
                                    <li>Dữ liệu nhận về định dạng POST array</li>
                                </ul>
                                <div class="clfix">
                                    <pre><code class="json hljs">{
                                        <span class="hljs-attr">"day"</span>: <span
                                        class="hljs-string">"20180827"</span>,
                                        <span class="hljs-attr">"time"</span>: <span class="hljs-string">"140039"</span>,
                                        <span class="hljs-attr">"merchant_id"</span>: <span
                                        class="hljs-string">"Adpia"</span>,
                                        <span class="hljs-attr">"order_code"</span>: <span
                                        class="hljs-string">"oc11123"</span>,
                                        <span class="hljs-attr">"product_code"</span>: <span class="hljs-string">"pc11123"</span>,
                                        <span class="hljs-attr">"product_name"</span> : <span class="hljs-string">"test product"</span>,
                                        <span class="hljs-attr">"category_code"</span>: <span
                                        class="hljs-string">"cc11"</span>,
                                        <span class="hljs-attr">"item_count"</span>: <span class="hljs-number">1</span>,
                                        <span class="hljs-attr">"price"</span>: <span class="hljs-number">20000</span>,
                                        <span class="hljs-attr">"commision"</span>: <span class="hljs-number">500</span>,
                                        <span class="hljs-attr">"affiliate_id"</span>: <span class="hljs-string">"A100000000"</span>,
                                        <span class="hljs-attr">"affiliate_user_id"</span>: <span class="hljs-string">"ac_aaa"</span>,
                                        <span class="hljs-attr">"member_id"</span> : <span class="hljs-string">"test_member"</span>,
                                        <span class="hljs-attr">"trlog_id"</span> : <span class="hljs-string">"1000232321232"</span>
                                    }</code></pre>
                                </div>
                                <br>
                                <h2>Trong đó:</h2>
                                <div class="table-responsive" style="background: #ffffff">
                                    <table class="table table-striped table-hover table-bordered jambo_table">
                                        <thead>
                                            <tr class="center">
                                                <th>Key</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="center">
                                                <td>day</td>
                                                <td>Date of sales occurred</td>
                                            </tr>
                                            <tr class="center">
                                                <td>time</td>
                                                <td>Time of sales occurred</td>
                                            </tr>
                                            <tr class="center">
                                                <td>merchant_id</td>
                                                <td>Merchant ID</td>
                                            </tr>
                                            <tr class="center">
                                                <td>order_code</td>
                                                <td>Order code</td>
                                            </tr>
                                            <tr class="center">
                                                <td>product_code</td>
                                                <td>Product code</td>
                                            </tr>
                                            <tr class="center">
                                                <td>product_name</td>
                                                <td>Product name</td>
                                            </tr>
                                            <tr class="center">
                                                <td>category_code</td>
                                                <td>Category code</td>
                                            </tr>
                                            <tr class="center">
                                                <td>item_count</td>
                                                <td>Quantity</td>
                                            </tr>
                                            <tr class="center">
                                                <td>price</td>
                                                <td>Total price</td>
                                            </tr>
                                            <tr class="center">
                                                <td>commision</td>
                                                <td>Commission</td>
                                            </tr>
                                            <tr class="center">
                                                <td>affiliate_id</td>
                                                <td>Adpia affiliate id</td>
                                            </tr>
                                            <tr class="center">
                                                <td>affiliate_user_id</td>
                                                <td>Affiliate User ID</td>
                                            </tr>
                                            <tr class="center">
                                                <td>member_id</td>
                                                <td>Id User Buy</td>
                                            </tr>
                                            <tr class="center">
                                                <td>trlog_id</td>
                                                <td>ID of conversion</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @if ($postBackData)
                                <a data-toggle="modal" href="#modal-add" class="btn btn-success">Xem
                                PostBack</a>
                                @else
                                <a data-toggle="modal" href="#modal-add" class="btn btn-success">Tạo
                                PostBack</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                @csrf
              {{--   @if ($postBackData)
                @method('PATH')
                @endif --}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">PostBack Info</h4>
                    @if($postBackData)
                    <small>
                        Trạng Thái:
                        {!! $postBackData['status'] == 1 ? '<span class="label label-success">approve</span>' : '<span class="label label-warning">pending</span>' !!}
                    </small>
                    @endif
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Đường Dẫn nhận PostBack</label>
                        <input type="url" class="form-control" name="RETURN_URL" id=""
                        placeholder="http://example.vn/cashback.php"
                        value="{{ empty($postBackData['return_url']) ? '' : $postBackData['return_url'] }}"
                        required
                        maxlength="500">
                    </div>
                    <h5>Nhận thông tin</h5>
                    <div class="form-group">
                        <div class="row">
                            <input hidden name="id" value="{{empty($postBackData['affiliate_id'])?"":$postBackData['affiliate_id']}}" placeholder="">
                            <div class="col-sm-4 from-group-cus">
                                <input id="day" value="day" type="checkbox" name="YYYYMMDD" checked disabled>
                                <label for="day">day</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="time" id="time"
                                name="HHMISS" <?php echo empty($postBackData['hhmiss']) ? '' : 'checked' ?>>
                                <label for="time">time</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="merchant_id" name="MERCHANT_ID" id="merchant_id" checked disabled>
                                <label for="merchant_id">merchant_id</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input id="order_code" value="order_code" type="checkbox" name="ORDER_CODE" checked disabled>
                                <label for="order_code">order_code</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="product_code" id="product_code" name="PRODUCT_CODE" checked disabled>
                                <label for="product_code">product_code</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="product_name" id="product_name"
                                name="PRODUCT_NAME" <?php echo empty($postBackData['product_name']) ? '' : 'checked' ?>>
                                <label for="product_name">product_name</label>
                            </div>

                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="category_code" id="category_code"
                                name="CATEGORY_CODE" <?php echo empty($postBackData['category_code']) ? '' : 'checked' ?>>
                                <label for="category_code">category_code</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox"  value="item_count" id="item_count"
                                name="ITEM_COUNT" <?php echo empty($postBackData['item_count']) ? '' : 'checked' ?>>
                                <label for="item_count">item_count</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="price" id="price"
                                name="SALES" <?php echo empty($postBackData['sales']) ? '' : 'checked' ?>>
                                <label for="price">price</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="commision" name="COMMISSION" id="commision" checked disabled>
                                <label for="commision">commision</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="affiliate_id" name="AFFILIATE" id="affiliate_id" checked disabled>
                                <label for="affiliate_id">affiliate_id</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" value="affiliate_user_id" id="affiliate_user_id"
                                name="AFFILIATE_USER_ID" <?php echo empty($postBackData['affiliate_user_id']) ? '' : 'checked' ?>>
                                <label for="affiliate_user_id">affiliate_user_id</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input type="checkbox" id="member_id" value="member_id"
                                name="MBR_ID" <?php echo empty($postBackData['mbr_id']) ? '' : 'checked' ?>>
                                <label for="member_id">member_id</label>
                            </div>
                            <div class="col-sm-4 from-group-cus">
                                <input value="trlog_id" type="checkbox" id="trlog_id"
                                name="TRLOG_ID" <?php echo empty($postBackData['trlog_id']) ? '' : 'checked' ?>>
                                <label for="trlog_id">trlog_id</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save
                        changes
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('script')
<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
    @endif
</script>
@endsection