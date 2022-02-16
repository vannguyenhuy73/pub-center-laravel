<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Minishop extends Model
{
	protected $table = 'TAFF_LANDINGPAGE';
	
	public function insertMinishop($request, $aff_id, $site_name, $start, $date)
	{
		$sql = "insert into TAFF_LANDINGPAGE (LID, AFFILIATE_ID, SITE_NAME, SITE_URL, LINK, CATEGORY_GROUP,STATUS, START_DATE, YYYYMMDD)values(seq_add_incentive_id.nextval, '$aff_id', '$site_name','$request->site','$request->site_deal', '$request->cate','P', '$start', '$date')";
		
		return \DB::statement($sql);
		
	}

	public function insertRegisterShop($data)
	{
		return DB::table("TREGISTER_MINISHOP")
		->insert($data);
	}

	public function getMaxId()
	{
		if(DB::table('TREGISTER_MINISHOP')->select("ID")->orderBy('ID', 'DESC')->first()) {
			return DB::table('TREGISTER_MINISHOP')
			->select("ID")
			->orderBy('ID', 'DESC')
			->first()
			->id;
		} else {
			return 0;
		}
	}

	public function checkIssetShop($acc_id)
	{
		return DB::table('TREGISTER_MINISHOP')
		->where('TYPE', '=', config('const.minishop.register_type.regis'))
		->where('ACCOUNT_ID', '=', $acc_id)
		->count();
	}

	public function checkIssetCode($acc_id)
	{
		return DB::table('TREGISTER_MINISHOP')
		->select('CATEGORY_LIST', 'MERCHANT_LIST', 'AFFILIATE_ID')
		->where('TYPE', '=', config('const.minishop.register_type.codes'))
		->where('ACCOUNT_ID', '=', $acc_id)
		->get();
	}

	public static function checkIssetRegister($acc_id)
	{
		return DB::table('TREGISTER_MINISHOP')
		->select('LINK')
		->where('TYPE', '=', config('const.minishop.register_type.regis'))
		->where('ACCOUNT_ID', '=', $acc_id)
		->first();
	}

	public static function getAdpiaMerchantCoupon()
	{
		return DB::table('TDISCOUNT')
		->select('TDISCOUNT.MERCHANT_ID', 'TSUBSCRIPT.SUBS_STATUS')
		->join('TSUBSCRIPT', 'TSUBSCRIPT.MERCHANT_ID', '=', 'TDISCOUNT.MERCHANT_ID')
		->where('TDISCOUNT.STATUS', config('const.minishop.status.active'))
		->where('TDISCOUNT.START_DATE', '<=', date('Ymd'))
		->where('TDISCOUNT.END_DATE', '>=', date('Ymd'))
		->whereNotIn('TDISCOUNT.MERCHANT_ID', config('const.minishop.db_discount_merchant_without'))
		->where('TSUBSCRIPT.AFFILIATE_ID', '=', Auth()->user()->last_contact_affiliate_id)
		->orderBy('TDISCOUNT.MERCHANT_ID', 'DESC')
		->groupBy('TDISCOUNT.MERCHANT_ID', 'TSUBSCRIPT.SUBS_STATUS')
		->get();
	}

	public function checkIssetShopName($slug)
	{
		return DB::table('TREGISTER_MINISHOP')
		->where('TYPE', '=', config('const.minishop.register_type.regis'))
		->where('SLUG', '=', $slug)
		->count();
	}

	public function getMinishopCategoryList()
	{
		return DB::table('TMINISHOP_CATEGORY')
		->where('MINISHOP_CATEGORY_STATUS', '=', config('const.minishop.status.active'))
		->orderBy('MINISHOP_CATEGORY_ORDER', 'ASC')
		->get();
	}

	public static function getDiscountAprMerchant($affiliate_id)
	{
		$sql = "
            SELECT
				m.merchant_id, m.approval_type, s.subs_status
			FROM VMERCHANT_VALID m, tmcategory1 c, tsubscript s,
                        (SELECT merchant_id,SUM(cnt) ct
                            FROM
                                (
                                SELECT merchant_id,DECODE(mobile_yn,'Y','1','0') cnt FROM TPROGRAM
                                GROUP BY merchant_id,mobile_yn
                                )
                            GROUP BY merchant_id) t
			WHERE m.merchant_id IN (".config('const.minishop.api_merchant').")
				AND c.category_code = m.category1_id
				AND s.merchant_id(+) = m.merchant_id
                                AND m.merchant_id = t.merchant_id
				AND s.affiliate_id(+) = '".$affiliate_id."'";
		return \DB::select($sql);
	}

	static function getUserCustomProducts($accId)
	{
		return DB::table('TMINISHOP_USER_CUSTOM_PRODUCTS')
		->select('PRODUCTS')
		->where('ACCOUNT_ID', '=', $accId)
		->where('STATUS', '=', 'ACTIVE')
		->first();
	}

	static function updateUserCustomProducts($accId, $products)
	{
		return DB::table('TMINISHOP_USER_CUSTOM_PRODUCTS')
		->where('ACCOUNT_ID', '=', $accId)
		->update(['PRODUCTS' => $products]);
	}

	static function setUserCustomProducts($data)
	{
		return DB::table('TMINISHOP_USER_CUSTOM_PRODUCTS')
		->insert($data);
	}

	static function getUserCustomProductsMaxId() {
		return DB::table('TMINISHOP_USER_CUSTOM_PRODUCTS')->max('ID');
	}

	static function getMerchantsApproveByAffId($affId, $mid = null) {
		$query = DB::table('VMERCHANT_VALID')
		->join('TSUBSCRIPT', 'TSUBSCRIPT.MERCHANT_ID', '=', 'VMERCHANT_VALID.MERCHANT_ID')
		->join('TPROGRAM', 'TPROGRAM.MERCHANT_ID', '=', 'VMERCHANT_VALID.MERCHANT_ID')
		->select('VMERCHANT_VALID.MERCHANT_ID', 'VMERCHANT_VALID.BANNER_URl')
		->where('VMERCHANT_VALID.HIDDEN_FLAG', '!=', 'Y')
		->where('VMERCHANT_VALID.AP_APPROVAL', '=', 'Y')
		->where('TPROGRAM.PGM_STATUS', '=', config('const.minishop.pgm_status.active'))
		->where('TSUBSCRIPT.AFFILIATE_ID', '=', $affId)
		->where('TSUBSCRIPT.SUBS_STATUS', '=', config('const.minishop.subs_status.approval'));
		if($mid) {
			$query->where('VMERCHANT_VALID.MERCHANT_ID', '=', $mid);
		}
		return $query->groupBy('VMERCHANT_VALID.MERCHANT_ID', 'VMERCHANT_VALID.BANNER_URl')
		->get();
	}

	static function getMerchantByUrl($url) {
		return DB::table('VMERCHANT_VALID')
		->join('TMERCHANT_URL_RULE', 'TMERCHANT_URL_RULE.MERCHANT_ID', '=', 'VMERCHANT_VALID.MERCHANT_ID')
		->join('TPROGRAM', 'TPROGRAM.MERCHANT_ID', '=', 'VMERCHANT_VALID.MERCHANT_ID')
		->select('VMERCHANT_VALID.MERCHANT_ID')
		->where('VMERCHANT_VALID.HIDDEN_FLAG', '!=', 'Y')
		->where('VMERCHANT_VALID.AP_APPROVAL', '=', 'Y')
		->where('TPROGRAM.PGM_STATUS', '=', config('const.minishop.pgm_status.active'))
		->where('TMERCHANT_URL_RULE.BEGIN_DATE', '<=', date('Ymd'))
		->where('TMERCHANT_URL_RULE.END_DATE', '>=', date('Ymd'))
		->where('TMERCHANT_URL_RULE.URL_RULE', 'like', '%'.$url.'%')
		->orderBy('TPROGRAM.SORT_NO', 'ASC')
		->first();
	}
}