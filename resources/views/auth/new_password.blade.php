<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adpia Reset Password</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->

    <!-- Custom Theme Style -->
    {{--<link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">--}}
</head>
<style>
    .error {
        color: red;
    }

    .has-error {
        border: 1px solid red !important;
        margin-bottom: 0px !important;
    }

    .login_content {
        background-color: rgba(19, 98, 121, 0.2);
        padding: 40px;
        color: #ffffff;
        border-radius: 15px;
        margin-top: 150px;
    }

    .input-group {
        margin: 5px 0;
    }

    .input-group .form-control {
        border-radius: 0;
    }

    .input-group span {
        border-radius: 0;
        background-color: #ffffff;
    }

    .btn-facebook {
        background-color: #4367b1;
        color: #ffffff;
    }

    .btn-google, .btn-facebook {
        border-radius: 0;
        height: 35px;
    }

    body {
        background-image: url('{{ asset('images/login.jpg') }}');
        /*background-position: bottom;*/
    }
    .other-action{
        margin: 0;
        padding: 0;
        text-align: center;
    }
    .other-action li{
        display: inline-block;

    }
    .other-action li a{
        color: #dadada;
    }
    .other-action li:first-child{
        margin-right: 3px;
        padding-right: 8px;
        border-right: 1px solid #dddddd;
    }
    .success{
        color: #00af00;
    }
    .show-hide-pass-btn {
        padding: 6px 12px; color: #555; cursor: pointer;
    }

</style>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1711250422442174',
            cookie: true,
            xfbml: true,
            version: 'v2.7'
        });

        FB.AppEvents.logPageView();
        FB.getLoginStatus(function (response) {
            console.log(response)
        });

    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class=" container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 login_content">
                        <form action="{{ route('new-password') }}" method="POST" id="new-password-form">
                            @csrf
                            <div class="title" style="margin-bottom: 20px">
                                <h1 style="font-size: 30px;margin-bottom: 0px">Thay Đổi Mật Khẩu</h1>
                                <span>AFFILIATE MARKETING LEADER</span>
                            </div>
                            <div class="success">Xác nhận email thành công! Hãy điền mật khẩu mới của bạn.</div>
                            <div class="error" id="error-notice"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key" style="width: 14px"></i></span>
                                <div style="display: flex;">
                                    <input type="password" class="form-control" name="password"
                                       placeholder="Mật khẩu mới..." required="">
                                       <span class="show-hide-pass-btn show-hide-pass" onclick="showHidePassword(this, 'password')"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" style="width: 14px"></i></span>
                                <div style="display: flex;"> 
                                    <input type="password" class="form-control" name="repassword"
                                       placeholder="Nhập lại mật khẩu..." required="">
                                       <span class="show-hide-pass-btn show-hide-repass" onclick="showHidePassword(this, 'repassword')"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>

                            <input type="hidden" name="account_id" value="{{ $account_id }}">

                            <div style="margin-top: 10px">
                                <button class="btn btn-danger pull-right btn-submit-form">Xác Nhận</button>
                                <div style="clear: both;"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator" style="margin-top: 30px;">

                                <div style=" background-color: rgba(255,255,255, 0.03);padding: 14px 7px">
                                    <ul class="other-action">
                                        <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{asset('assets/config_register/jquery.3.3.1.min.js')}}"></script>
<script>
    $(".btn-submit-form").click(function(event) {
        event.preventDefault();
        var pass = $('input[name=password]').val();
        var rePass = $('input[name=repassword]').val();

        if(pass.length == 0) {
            $("#error-notice").html('Mật khẩu không được phép để trống!');
            return;
        }

        if((/[^a-zA-Z0-9_-]/u).test(pass)) {
            $("#error-notice").html('Mật khẩu chỉ được chứa chữ cái, chữ số, dấu gạch ngang và dấu gạch dưới!');
            return;
        }

        if(pass.length > 16) {
            $("#error-notice").html('Mật khẩu không dài quá 16 ký tự!');
            return;
        }

        if(pass.length < 6) {
            $("#error-notice").html('Mật khẩu phải dài hơn 6 ký tự!');
            return;
        }

        if(rePass.length == 0) {
            $("#error-notice").html('Bạn cần xác nhận lại mật khẩu mới!');
            return;
        }

        if(pass != rePass) {
            $("#error-notice").html('Nhập lại mật khẩu không trùng khớp!');
            return;
        }

        $("#new-password-form").submit();
    });

    function showHidePassword(obj, input) {
        if($(obj).children('i').attr('class') == 'fa fa-eye') {
            $(obj).children('i').attr('class', 'fa fa-eye-slash');
            $("input[name=" + input + "]").attr("type", "text");
        } else {
            $(obj).children('i').attr('class', 'fa fa-eye');
            $("input[name=" + input + "]").attr("type", "password");
        }
    }
</script>
</body>
</html>