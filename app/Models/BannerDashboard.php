<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class BannerDashboard extends Model
{
    function getBannerNewpub()
    {
        return DB::table('TACADEMY_ONLINE_EVENT')
        ->select('EVENT_BANNER', 'EVENT_LINK')
        ->orderBy('ID', 'DESC')
        ->get();
    }

    function getPopupDashboard()
    {
        return DB::table('TSLIDE')
      ->select('IMAGE', 'LINK', 'END_TIME')
      ->where('POSITION', '=', 'newpub_popup')
      ->where('STATUS', '=', 'ACT')
      ->first();
    }
}