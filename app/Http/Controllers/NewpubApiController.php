<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewpubApiController extends Controller
{
    /**
     * show view doc for coupon
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coupon()
    {
        return view('newpub_api.coupon');
    }

    /**
     * show view doc for deeplink
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deeplink()
    {
        return view('newpub_api.deeplink');
    }
}
