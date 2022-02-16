<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $table = 'taffiliate';
    protected $primaryKey = 'affiliate_id';
    public $incrementing = false;
    public $timestamps = false;
//    public $keyType = 'VARCHAR';

    public $fillable = [
        'AFFILIATE_ID',
        'ACCOUNT_ID',
        'SITE_NAME',
        'SITE_URL',
        'CATEGORY1',
        'CATEGORY2',
        'SITE_DESC',
        'DELETE_FLAG',
        'AP_LEVEL',
        'MINISHOP_ONLY_YN',
        'BA_YN' => 'N',
        'FORWARDING_YN',
        'PRICE_YN',
        'SIDE_MER_FORWARD_YN',
        'CASHBACK_YN',
        'PARTNER_ACCOUNT_ID',
        'DELETE_TIME_STAMP'
    ];

    public function getAllAffiliate($accountID)
    {
        return $this->select(['affiliate_id', 'site_name', 'minishop_only_yn'])
            ->where('account_id', $accountID)
            ->where('delete_flag', 'N')
            ->orderBy('affiliate_id', 'DESC')
            ->get();
    }

    public function getAllAffiliateID($accountID)
    {
        return $this->select(['affiliate_id'])
            ->where('account_id', $accountID)
            ->where('delete_flag', 'N')
            ->orderBy('affiliate_id', 'DESC')
            ->get();
    }
}
