<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingRegisterController extends Controller
{
    public function index(Request $request)
    {
    	$data['utm_source'] = !empty($request->utm_source)?$request->utm_source:'no';
    	$data['utm_medium'] = !empty($request->utm_medium)?$request->utm_medium:'no';
    	$data['utm_campaign'] = !empty($request->utm_campaign)?$request->utm_campaign:'no';
    	$data['utm_term'] = !empty($request->utm_term)?$request->utm_term:'no';
    	$data['utm_content'] = !empty($request->utm_content)?$request->utm_content:'no';

    	return view('landing_register.landing_register', compact('data'));
    }

    public function landingSecond(Request $request)
    {
    	$data['utm_source'] = !empty($request->utm_source)?$request->utm_source:'no';
    	$data['utm_medium'] = !empty($request->utm_medium)?$request->utm_medium:'no';
    	$data['utm_campaign'] = !empty($request->utm_campaign)?$request->utm_campaign:'no';
    	$data['utm_term'] = !empty($request->utm_term)?$request->utm_term:'no';
    	$data['utm_content'] = !empty($request->utm_content)?$request->utm_content:'no';

    	return view('landing_register.landing_register_second', compact('data'));
    }

    public function landingThird(Request $request)
    {
    	$data['utm_source'] = !empty($request->utm_source)?$request->utm_source:'no';
    	$data['utm_medium'] = !empty($request->utm_medium)?$request->utm_medium:'no';
    	$data['utm_campaign'] = !empty($request->utm_campaign)?$request->utm_campaign:'no';
    	$data['utm_term'] = !empty($request->utm_term)?$request->utm_term:'no';
    	$data['utm_content'] = !empty($request->utm_content)?$request->utm_content:'no';

    	return view('landing_register.landing_register_third', compact('data'));
    }
}
