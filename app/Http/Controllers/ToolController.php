<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * show view of tools deeplink
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deepLink()
    {
        return view('tools.deeplink');
    }
}
