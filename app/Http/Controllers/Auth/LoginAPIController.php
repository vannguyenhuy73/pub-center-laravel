<?php

namespace App\Http\Controllers\Auth;

use App\Libraries\JWT;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAPIController extends Controller
{

    /**
     * Login by JWT API
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        if (Auth::check()){
            return redirect()->route('offer_list.index');
        }

        try {
            $data = (new JWT())->decodeJWT($request->get('token'));
            $data = json_decode(json_encode($data), true);
            $data = array_merge($data, [
                'account_status' => 'ACT',
                'contact_mail_confirm' => 'Y',
            ]);
            $user = User::query()->where($data)->first();

            if (!$user || !$user instanceof User) {
                return redirect()->back();
            }

            if (Auth::login($user)) {
                return redirect()->route('offer_list.index');
            }

        } catch (\Exception $e) {
            // write log
            \Log::info('Auth failed:' . $request->get('token'));

            return redirect()->back();
        }

        return redirect()->route('offer_list.index');
    }
}
