<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostBack extends Model
{
    /**
     * set table
     *
     * @var string
     */
    protected $table = 'Tcashback';

    /**
     * disabled primaryKey
     *
     * @var null
     */
    protected $primaryKey = null;

    /**
     * Disabled increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Disabled timestamp
     * @var bool
     */
    public $timestamps = false;

    /**
     * check user has postback
     *
     * @param $affID Affiliate ID
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|null|object
     */
    public function getStatus($affID)
    {
        return self::query()
            ->where('affiliate_id', $affID)
            ->first(['STATUS', 'CREATE_TIME_STAMP', 'UPDATED_TIME_STAMP']);
    }
}
