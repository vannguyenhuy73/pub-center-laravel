<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewpubToolController extends Controller
{
    public function deepLink()
    {
        return view('newpub_tools.deeplink');
    }
	
	public function smartUrl()
    {
        return view('newpub_tools.smart_url');
    }
	
	public function promoCode() {
        return view('newpub_tools.promo_code');
    }

    public function generateMultipartLink() {
        return view('newpub_tools.generate_multipart_deeplink');
    }
}
