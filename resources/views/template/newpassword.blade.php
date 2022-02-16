@extends('template.layout')
@section('content')
    <tr>
        <td style="">
            <table width="650px" bgcolor="white" style="margin: 50px auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="padding: 25px;">

                        <h3 style="text-align: center;color: red ;margin-top:30px;">Mật Khẩu mới của bạn là</h3>

                        <p style="text-align: center;">
                            <p style="border: 1px dotted #dddddd;background-color: #d8d800;padding: 30px;width: 130px;text-align: center; margin: 10px auto">{{ $newPass }}</p>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
