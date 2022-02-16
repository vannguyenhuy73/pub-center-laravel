<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'tdiscount';
    protected $primaryKey = 'discount_id';

    static function getDiscountMerchantBanner($mid = null)
    {
        $arrMerchantsWithout = config('const.minishop.db_discount_merchant_without');
        array_push($arrMerchantsWithout, 'shopee');
		array_push($arrMerchantsWithout, 'sendo');
		array_push($arrMerchantsWithout, 'yes24');
        
        $query = Discount::query()->join('TMERCHANT', 'TMERCHANT.MERCHANT_ID', '=', 'TDISCOUNT.MERCHANT_ID')
        ->select('TMERCHANT.BANNER_URL', 'TMERCHANT.MERCHANT_ID', 'TMERCHANT.APPROVAL_TYPE')
        ->where('TDISCOUNT.STATUS', '=', config('const.discount_code.status.active'))
        ->where('TDISCOUNT.END_DATE', '>=', date('Ymd'))
        ->whereNotIn('TDISCOUNT.MERCHANT_ID', $arrMerchantsWithout);
		if($mid != null) {
			$query = $query->where('TDISCOUNT.MERCHANT_ID', '=', $mid);
		}
        return $query->distinct()
        ->get();
    }
}