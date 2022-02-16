<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventBannerController extends Controller
{
    public function index()
    {
    	return view('event-banner.index');
    }
}
