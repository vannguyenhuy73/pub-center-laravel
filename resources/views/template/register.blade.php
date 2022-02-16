<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mail đăng ký</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="margin: 0;padding: 0;font-family: sans-serif;">
        <img style="background-image: url('{{ Request::root() }}/check-readmail?id={{ $user_id ?? '' }}');" src="{{ Request::root() }}/check-readmail?id={{ $user_id ?? '' }}" alt="">
        <table style="text-align: center;width:100%" >
            <tr >
                <td>
                    <table style="background-color: #f5f5f5;width:100%; padding: 10px 0;justify-content: center;margin:auto; border: none;">
                        <td style=" width:50%"><img src="http://ac.adpia.vn/upload/images/logo_adpia_1.png" alt=""></td>
                        <td style=" width:50%"><h4>AFFILITE MARKETING LEADER</h4></td>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="" colspan="2">
                    <table style="text-align: center;padding: 10px 0; background-color: white;justify-content: center;margin:auto; border: none;" class="content">
                        <tr><td>
                            <div><img src="http://ac.adpia.vn/upload/images/icon-money.png" alt=""></div>
                            <p style="font-family: sans-serif;padding-top: 5px;padding-bottom: 5px; font-weight: 600">Chúc mừng bạn đã đăng ký tài khoản thành công tại Adpia, mời bạn xác thực tài</p>
                            <p style="padding-top: 5px;padding-bottom: 5px;font-weight: 600">khoản đăng ký của mình bằng cách click vào nút xác nhận dưới đây.</p>
                            <div style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="confirm" style="padding: 10px 20px;background-color: #b70000; text-decoration: none; color: white; border-radius: 8px;" href="{{ $link }}">XÁC THỰC TÀI KHOẢN</a>
                            </div>
                            <p style="color: red; font-weight: 600;padding-top: 5px;padding-bottom: 5px;">Nếu không phải vui lòng bỏ qua email này.</p>
                            <p style="color: red;padding-top: 5px;font-weight: 600;padding-bottom: 5px;">Trân trọng.</p>
                        </td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="footer" style="text-align: center;padding-bottom: 20px; width: 100%;background-color: #f5f5f5">
            <tr>
                <td>
                    <div style="padding-top: 20px;"><img src="https://ac.adpia.vn/upload/images/logo_adpia_1-copy.png" alt=""></div>
                    <div style="padding-top: 20px;"><span>AFFILIATE MARKETING LEADER</span></div>
                    <div style="padding-top: 20px;"><span style="font-weight: 700;">Hotline:</span> 024 2260 6075 <span style="font-weight: 700;">Email:</span> affiliate@adpia.vn</div>
                    <div style="padding-top: 20px;"><span style="font-weight: 700;">Địa chỉ:</span>Tầng 30, tòa nhà Handico, Phạm Hùng, Nam Từ Liêm, Hà Nội.</div>
                    <div style="padding-top: 20px;">
                        <a href="https://www.facebook.com/affiliateadpia/" style="border-right: 1px solid black;display: inline-block;padding-left: 7px;padding-right: 7px;">
                            <img style="width: 86%;" src="https://ac.adpia.vn/upload/images/Layer1.png" alt=""/>
                        </a>
                        <a href="https://www.facebook.com/groups/522245648367494" style="border-right: 1px solid black;display: inline-block;padding-left: 7px;padding-right: 7px;">
                            <img style="width: 86%;" src="https://ac.adpia.vn/upload/images/Layer2.png" alt=""/>
                        </a>
                        <a href="https://adpia.vn/" style="border-right: 1px solid black;display: inline-block;padding-left: 7px;padding-right: 7px;">
                            <img style="width: 86%;" src="https://ac.adpia.vn/upload/images/Layer3.png" alt=""/>
                        </a>
                        <a href="https://www.youtube.com/channel/UCduGaK8pJRGosCgtvqJiGAw" style="display: inline-block;padding-left: 7px;padding-right: 7px;">
                            <img style="width: 86%;" src="https://ac.adpia.vn/upload/images/Layeryt.png" alt=""/>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
