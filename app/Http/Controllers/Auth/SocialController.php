<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserLog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{

    /**
     * Generate Facebook Login
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function FaceBookLogin()
    {

        $fb = new \Facebook\Facebook([
            'app_id' => config('services.facebook.client_id'),
            'app_secret' => config('services.facebook.client_secret'),
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(route('facebook.handle'), $permissions);

        return redirect($loginUrl);
    }

    /**
     * Handle Facebook Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function handleFacebook(Request $request)
    {
        $fb = new \Facebook\Facebook([
            'app_id' => config('services.facebook.client_id'),
            'app_secret' => config('services.facebook.client_secret'),
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {

            echo 'Graph returned an error: ' . $e->getMessage();
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        }

        if (!isset($accessToken)) {
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        }

        try {
            $response = $fb->get('/me/?fields=name,email,id', $accessToken->getValue());
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        }

        $me = $response->getGraphUser();
        $id = $me->getId();

        if (!$id) {
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
        }

        $user = User::query()->where(['account_id' => $id, 'ACCOUNT_STATUS' => 'ACT'])->first(['account_id']);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Tài khoản facebook này chưa tồn tại trên hệ thống');
        }

        //log
        $this->addUserLog($id, $request->ip());

        \Auth::loginUsingId($id, true);

        return redirect()->route('home');
    }

    /**
     * Google login
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function googleLogin()
    {
        $client = new \Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope("email");
        $client->addScope("profile");
        $service = new \Google_Service_Oauth2($client);
        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    /**
     * Handle login using google
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogle(Request $request)
    {
        $code = $request->get('code', false);

        try {
            $client = new \Google_Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->setRedirectUri(config('services.google.redirect'));
            $client->addScope("email");
            $client->addScope("profile");
            $client->authenticate($code);

            $service = new \Google_Service_Oauth2($client);
            $user = $service->userinfo->get();

            $id = $user->getId();

            if (!$id) {
                return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử cách khác');
            }

            $user = User::query()->where(['account_id' => $id, 'ACCOUNT_STATUS' => 'ACT'])->first(['account_id']);

            if (!$user) {
                return redirect()->route('login')->with('error', 'Tài khoản google này chưa tồn tại trên hệ thống');
            }

            //log
            $this->addUserLog($id, $request->ip());

            \Auth::loginUsingId($id, true);

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Có lỗi xảy ra, xin vui lòng thử lại sau');
        }
    }

    /**
     * Logging login
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
}
