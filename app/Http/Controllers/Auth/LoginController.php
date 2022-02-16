<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\UserLog;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:50',
            'password' => 'required|alpha_dash|max:20',
        ]);

        $remember = false;

        if ($request->get('remember', false)) {
            $remember = true;
        }

        $attempt = [
            'password' => $request->get('password'),
            'account_status' => 'ACT',
            'contact_mail_confirm' => 'Y'
        ];

        $username = $request->get('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $attempt['contact_mail'] = $username;

            //Get user info
            $user = User::query()->where('contact_mail', $attempt['contact_mail'])->first();
        } else {
            $attempt['account_id'] = $username;

            //Get user info
            $user = User::query()->where('account_id', $attempt['account_id'])->first();
        }

        if (!$user) {
            $error = 'Tài khoản không tồn tại trên hệ thống';

            return redirect()->route('login')->with('error', $error);
        }

        if ($user->contact_mail_confirm != 'Y') {
            return redirect()->route('login')->with('error', 'Tài khoản của bạn chưa được xác thực email, vui lòng kiểm tra mail để xác thực');
        }

        if ($user->account_status != 'ACT') {
            return redirect()->route('login')->with('error', 'Tài khoản của bạn đã bị khóa, vui lòng liên hệ với chúng tôi để kháng nghị');
        }

        $test_array = array(
            "PASSWORD" => "123456789",
            "ACCOUNT_STATUS" => "ACT",
            "CONTACT_MAIL_CONFIRM" => "Y",
            "ACCOUNT_ID" => "lmquang96"
        );

        dd(Auth::attempt($test_array));

       if (Auth::attempt($attempt, $remember)) {

            $this->addUserLog($user->account_id, $request->ip());
			
			User::query()->where('account_id', $attempt['account_id'])->update(['last_login_time' => date('Y-m-d H:i:s')]);

            if (!$user->last_contact_affiliate_id) {
                return redirect()->route('home');
            }

            return redirect()->intended('/');
            
        } else {
            $error = 'Thông tin tài khoản không chính xác';

            return redirect()->route('login')->with('error', $error);
        }
    }

    public function username()
    {
        return 'account_id';
    }

    /**
     * Login logging
     *
     * @param $id
     * @param $ip
     * @return bool
     */
    private function addUserLog($id, $ip)
    {
        $userLog = new UserLog();

        $userLog->account_id = $id;
        $userLog->account_type = 'A';
        $userLog->log_code = '100';
        $userLog->source_url = config('app.url');
        $userLog->remote_addr = $ip;
        $userLog->log_param = '';
        $userLog->log_desc = 'login in new pub';
        $userLog->create_time_stamp = date('Y-m-d h:i:s');
        $userLog->yyyymmdd = (int)date('Ymd');

        if ($userLog->save()) {
            return true;
        }

        return false;
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
    
    
}
