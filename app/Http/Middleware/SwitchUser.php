<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class SwitchUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->account_status != 'ACT') {
            \Auth::logout();
            return redirect('/login');
        }

        if ($request->get('sw_user') && config('app.env') != 'production') {

            if(url()->current() == config("app.url")) {
                return $next($request);
            }

            $accountID = $request->get('sw_user');

            $currentUserId = \Auth::user()->getAuthIdentifier();

            $defaultUserId_session = \Session::get('default_user');

            if (empty($accountID) || strtolower($accountID) == $currentUserId) {
                return $next($request);
            }

            $userLogged = \Auth::loginUsingId($accountID);

            if($userLogged->account_status != 'ACT') {
                \Auth::loginUsingId($currentUserId);
            }

            return $next($request);
        }
        return $next($request);
    }
}