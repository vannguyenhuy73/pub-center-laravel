@extends('template.layout')
@section('content')
    <tr>
        <td>
            <table width="650px" bgcolor="white" style="margin: 50px auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="padding: 25px;">

                        <h3 style="text-align: center;color: red ;margin-top:30px;">Yêu cầu lấy lại mật khẩu</h3>
                        <p style="text-align: justify">Dear {{ $name }}</p>
                        <p style="text-align: left">
                            Để đổi lại mật khẩu bạn vui lòng click vào link dưới đây: <br/>
                            <a href="{{ $link }}">{{ $link }}</a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection