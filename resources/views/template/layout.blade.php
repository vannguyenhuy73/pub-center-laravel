<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>adpia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;color: #393939;font-family: sans-serif;background: #e4e4e4">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="" bgcolor="#181818">
            <table width="650px" style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="color: #dddddd;padding-top: 20px;padding-bottom: 0">
                        <div style="float: left"><a href="https://adpia.vn"><img src="{{ config('const.img_adpia') }}/email/logo.png" alt="adpia"/></a></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @yield('content')
    <tr>
        <td style="" bgcolor="#181818">
            <table width="650px" style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="color: #868484;padding-top: 50px;padding-bottom: 0;text-align: center">
                        <div>
                            <a href="{{ config('const.adpia_fanpage') }}"><img src="{{ config('const.img_adpia') }}/email/fb.png" alt="facebook"/></a>
                            <a href="{{ config('const.adpia_youtube') }}"><img src="{{ config('const.img_adpia') }}/email/yt.png" alt="youtube"/></a>
                        </div>
                        <div style="margin-top: 30px;">
                            <div style="color: red"><strong>Công ty Cổ phần ADPIA </strong></div>
                            <div style="color: #868484 !important;"> Địa chỉ: Tầng 30, tòa nhà Handico, Phạm Hùng, Nam Từ Liêm, Hà Nội.</div>
                        </div>
                        <div style="border-bottom: 1px solid #373737;margin-top: 20px;"></div>
                        <div>
                            <a href="{{ url('/') }}"><img src="{{ config('const.img_adpia') }}/email/aff.png" alt="aff"
                                                                style="float: left;"/></a>
                            <a href="{{ config('const.adpia_homepage') }}/nha-cung-cap/"><img src="{{ config('const.img_adpia') }}/email/mer.png" alt="mer"
                                                               style="margin-top: 32px;"/></a>
                            <a href="#"><img src="{{ config('const.img_adpia') }}/email/ct.png" alt="contact"
                                             style="float: right;margin-top: 22px;"/></a>
                            <div style="clear: both"></div>
                        </div>
                        <div style="border-bottom: 1px solid #373737;margin-top: 20px;"></div>
                        <div style="margin-top: 20px;margin-bottom: 40px; color: #868484 !important;">
                            Copyright <font color="red">© 2018</font> by adpia.vn. all right Reserved
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>