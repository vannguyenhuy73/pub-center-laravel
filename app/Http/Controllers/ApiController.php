<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * show view doc for coupon
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coupon()
    {
        return view('api.coupon');
    }

    /**
     * show view doc for deeplink
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deeplink()
    {
        return view('api.deeplink');
    }
}
