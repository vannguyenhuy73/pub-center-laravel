<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Adpia Login Affliate Center</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}?{{ config('const.asset.version') }}">
    <link rel="manifest" href="/manifest.webmanifest" />
    <!-- Custom Theme Style -->
    {{--<link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">--}}
</head>
<style>
    .error {
        color: red;
        padding: 10px;
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
                        <form method="POST">
                            @csrf
                            <div class="title" style="margin-bottom: 20px">
                                <h1 style="font-size: 30px;margin-bottom: 0px">Login Affiliate Center</h1>
                                <span>AFFILIATE MARKETING LEADER</span>
                            </div>
                            @if (session('error'))
                                <div class="error">{{ session('error') }}</div>
                            @endif
                            @if (session('success'))
                                <div class="success">{{ session('success') }}</div>
                            @endif
                            <div class="input-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user" style="width: 14px"></i></span>
                                <input id="username" type="text" class="form-control" name="username"
                                       placeholder="username hoặc email" required="" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <div class="help-block">{{ $errors->first('username') }}</div>
                                @endif
                            </div>
                            <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="password" required="">
                                @if ($errors->has('password'))
                                    <div class="help-block">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div style="margin-top: 10px">
                                <input type="checkbox" value="true" name="remember" id="remember" style="margin-top: 11px"> <label for="remember" style="color: #246b94;">Ghi nhớ đăng nhập</label>
                                <button type="submit" class="btn btn-danger pull-right">Đăng Nhập</button>
                                <div style="clear: both;"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator" style="margin-top: 30px;">

                                <div style=" background-color: rgba(255,255,255, 0.03);padding: 14px 7px">
                                    <ul class="other-action">
                                        <li><a href="{{ route('register') }}">Tạo Tài khoản mới</a></li>
                                        <li><a href="{{ route('reset') }}">Quên mật khẩu</a></li>
                                    </ul>
                                    <ul class="other-action" style="padding-top: 10px;">
                                        <li style="padding-right: 0; margin-right: 0; border-right: none;"><a href="{{ route('resend_confirm') }}">Tôi chưa nhận được email xác thực?</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                                <hr/>
                                <h3 class="text-center" style="color: #246b94;font-size: 27px">HOẶC ĐĂNG NHẬP VỚI</h3>
                                <div class="row text-center" style="margin-top: 17px">
                                    <div class="col-xs-6">
                                        <a href="{{ route('facebook.login') }}" class="btn btn-facebook center-block"><i
                                                    class="fa fa-facebook"></i> Facebook</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="{{ route('google.login') }}"
                                           class="btn btn-danger btn-google center-block"><i class="fa fa-google"></i>
                                            Google</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script async src="https://unpkg.com/pwacompat" crossorigin="anonymous"></script>
<script type="module">
    // detect iOS Safari
    if (('standalone' in navigator) && (!navigator.standalone)) {
        import('https://unpkg.com/pwacompat');
    }
</script>
</body>
</html>
