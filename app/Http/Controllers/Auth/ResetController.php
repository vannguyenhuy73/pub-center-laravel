<?php

namespace App\Http\Controllers\Auth;

use App\Models\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ResetController extends Controller
{
    public function index()
    {
        return view('auth.reset');
    }

    public function handle(Request $request)
    {
        $email = $request->get('email', null);

        $user = User::query()->where(['contact_mail' => $email, 'contact_mail_confirm' => 'Y'])->first(['account_id']);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Email này không tồn tại trên hệ thống, hoặc chưa được kích hoạt');
        }

        // hash token
        $hash = md5($user->account_id . time());

        //clear token if exist
        $token = ResetPassword::query()->where('account_id', $user->account_id)->first();

        if ($token) {
            $token->delete();
        }

        //add token
        ResetPassword::create(['account_id' => $user->account_id, 'token' => $hash]);

        // send email now
        Mail::send(new \App\Mail\ResetPassword($user->account_id, $email, $hash));

        return redirect()->route('login')->with('success', 'Chúng tôi đã gửi thành công email xác thực về email của bạn, xin vui lòng kiểm tra');


    }

    public function confirm(Request $request)
    {
        $account_id = $request->get('account_id');
        $token = $request->get('token');

        $result = ResetPassword::query()
            ->where(['account_id' => $account_id, 'token' => $token])
            ->first(['account_id', 'created_at']);

        if (!$result) {
            return redirect()->route('login')->with('error', 'Token không hợp lệ');
        }

        if (strtotime($result->created_at) < time() - 172800) {
            return redirect()->route('reset')->with('error', 'Token đã hết hạn, xin vui lòng gửi lại yêu cầu');
        }

        if (!$result->delete()) {
            return redirect()->route('login')->with('error', 'Có Lỗi xảy ra, xin vui lòng thử lại sau');
        }

        return view('auth.new_password', compact('account_id'));

    }

    public function updateNewPassword(Request $request)
    {
        $password = $request->password;
        $account_id = $request->account_id;

        $account = User::query()
            ->where(['account_id' => $account_id])
            ->first(['account_id', 'contact_name', 'contact_mail', 'password', 'before_password', 'pass_change_time']);

        if (!$account) {
            return redirect()->route('login')->with('error', 'Có Lỗi xảy ra, xin vui lòng thử lại sau');
        }

        $passwordHash = $this->encodePassword($password);

        $account->before_password = $account->password;
        $account->password = $passwordHash;
        $account->pass_change_time = (int)date('Ymd');

        if ($account->update()) {
            return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi!');
        }

        return redirect()->route('login')->with('error', 'Có Lỗi xảy ra, xin vui lòng thử lại sau');
    }

    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * encode password
     *
     * @param $origin
     * @return null
     */
    private function encodePassword($origin)
    {

        $ch = curl_init(env('ENCODE_URL') . $origin);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);

        if (!isset($data['status']) || $data['status'] != 200) {
            return null;
        }

        return $data['data'];
    }

}