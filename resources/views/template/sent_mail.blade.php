@extends('template.layout')
@section('content')
    <tr>
        <td>
            <table width="650px" bgcolor="white" style="margin: 50px auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="padding: 25px;">

                        <h3 style="text-align: center;color: red ;margin-top:30px;">Test mail</h3>
                        <p style="text-align: justify">Ngày {{ $data }}</p>
                        <p style="text-align: left">
                           Xin chào!<br/>
                           
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
