<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantDataFeed extends Model
{
    protected $table = 'tmerchant_datafeed';

    /**
     * get Data Feed
     *
     * @param $merchant
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|null|object
     */
    public static function getDataFeed($merchant)
    {
        return static::query()->where(['merchant_id' => $merchant, 'status' => 1])->first();
    }
}
