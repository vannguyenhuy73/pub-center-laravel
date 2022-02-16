<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'taccount_referral';

    /**
     *
     * @param $accountID
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|null|object
     */
    public static function getReferralAcount($accountID)
    {
        return static::query()->where(['status' => 1, 'account_id' => $accountID])->first();
    }

    /**
     * get total commission, conversion
     *
     * @param      $startDate
     * @param      $endDate
     * @param      $accountID
     * @param null $by
     *
     * @return mixed
     */
    public static function getConversions($startDate, $endDate, $accountID, $by = null)
    {
        $sql = "
            SELECT COUNT(*) count, SUM(COMMISSION) comm  FROM TSUM_BASIC WHERE  AFFILIATE_ID IN (
              SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID IN (
                SELECT TACCOUNT.ACCOUNT_ID FROM TACCOUNT WHERE JOIN_FROM = :accountID
              )
            ) AND YYYYMMDD BETWEEN :startdate AND :enddate
        ";

        if ($by) {
            $sql = "
              SELECT COUNT(*) count, SUM(COMMISSION) comm  FROM TSUM_BASIC WHERE  AFFILIATE_ID IN (
                SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID = :accountID
              ) AND  YYYYMMDD BETWEEN :startdate AND :enddate
            ";
        }

        return \DB::select($sql, [':accountID' => $accountID, ':startdate' => $startDate, ':enddate' => $endDate])[0];
    }

    /**
     * get total conversion in time
     *
     * @param      $startDate
     * @param      $endDate
     * @param      $accountID
     * @param null $by
     *
     * @return mixed
     */
    public static function getMonthConversion($startDate, $endDate, $accountID, $by = null)
    {
        $sql = "
            SELECT SUM(COMMISSION) comm  FROM TSUM_BASIC WHERE  AFFILIATE_ID IN (
              SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID IN (
                SELECT TACCOUNT.ACCOUNT_ID FROM TACCOUNT WHERE JOIN_FROM = :accountID
              )
            ) AND YYYYMMDD BETWEEN :startdate AND :enddate
        ";

        if ($by) {
            $sql = "
              SELECT SUM(COMMISSION) comm  FROM TSUM_BASIC WHERE  AFFILIATE_ID IN (
                SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID = :accountID
              ) AND  YYYYMMDD BETWEEN :startdate AND :enddate
            ";
        }

        return \DB::select($sql, [':accountID' => $accountID, ':startdate' => $startDate, ':enddate' => $endDate])[0];
    }

}
