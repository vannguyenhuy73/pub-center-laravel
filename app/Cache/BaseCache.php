<?php

namespace App\Cache;

use Illuminate\Support\Facades\Cache;

class BaseCache
{
    const __EXPIRED = 60 * 60;

    public static function getData($key, $functionData) {

        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = $functionData;
            Cache::put($key, $data, self::__EXPIRED);
        }

        return $data;
    }
}