
<!DOCTYPE html>
<html>
<head>
    <title>Facebook Login JavaScript Example</title>
    <script type="text/javascript" src="{{ asset('assets/vendors/echarts/test/lib/jquery.min.js') }}"></script>
    <meta charset="UTF-8">
</head>
<body>
<script>
    // Nạp Javascript SDK
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))

            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function () {
        FB.init({
            appId: '1711250422442174', // APP ID ứng dụng của bạn
            cookie: true, // Kích hoạt cookies

            xfbml: true, // plugins xã hội
            version: 'v2.8' // Sử dụng version 2.1
        });

        // Xử lý hàm callback
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    };
    // Kết quả từ FB.getLoginStatus().
    function statusChangeCallback(response) {
        if (response.status === 'connected')
        {
            // Đăng nhập vào ứng dụng của bạn và facebook.
            testAPI();
        }
        else if (response.status === 'not_authorized')
        {
            login();
        }
        else
        {
            login();
        }
    }

    function testAPI() {
        FB.api(
            '/me',
            'GET',
            {"fields": "id,name,email,link"},
            function (response) {
                console.log(response);
                $.ajax({
                    url: '/social_api/login_facebook',
                    method: "GET",
                    data: {email: response.email, name: response.name, id: response.id, link: encodeURI(response.link), refer: ""}
                }).success(function (data) {
                    console.log(data);
                    if (data == 'S')
                    {
                        opener.location.href = 'http://ac.adpia.vn/';
                        window.close();
                    }
                    else
                    {
                        alert(data);
                        window.close();
                        return;
                    }
                });
            }
        );
    }
    function login() {
        FB.login(function (response) {
            // Xử lý các kết quả
            if (response.status === 'connected')
            {
                testAPI();
            }
        }, {scope: 'public_profile,email'});
    }

</script>

<div id="status"></div>
</body>
</html>