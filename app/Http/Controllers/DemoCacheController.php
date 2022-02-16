<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Cache;
class DemoCacheController extends Controller
{
    public function index(Request $request)
    {
        $val = ['foo'=>'bar','fool'=>'go away'];
        $key = 'test';
        Cache::put($key, $val, 10);
        $cacheVal = Cache::get($key);
        dd($cacheVal);
    }

}
