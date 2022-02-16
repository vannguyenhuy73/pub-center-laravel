<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comission extends Model
{
    protected $table = 'tsum_basic';
    public $timestamps = false;

    /**
     * Lấy ra hoa hồng
     *
     * @param array $affID
     * @param null  $startDate
     * @param null  $endDate
     *
     * @return mixed
     */
    public function getComission(array $affID, $startDate = null, $endDate = null)
    {
        $query = DB::table('TTRANSLOG')->selectRaw('nvl(sum(commission), 0) as total')
            ->whereIn('affiliate_id', $affID);

        if ($startDate) {
            $query = $query->where('YYYYMMDD', '>=', $startDate);
        } else {
            $query = $query->where('YYYYMMDD', '>=', date('Ym') . '01');
        }

        if ($endDate) {
            $query = $query->where('YYYYMMDD', '<=', $endDate);
        } else {
            $query = $query->where('YYYYMMDD', '<=', date('Ymd'));
        }

        return $query->first()->total;
    }

    public function getPayAble($accountID)
    {
        //set first day of month
        $date = date('Ym01');

        /**
         * OLD QUERY
         * ______________________________
         * $results = DB::select("select
         * (
         * nvl((select sum(amount)
         * from taff_payable
         * where account_id = ?
         * and PAY_CODE <> 301
         * and yyyymm <= (case when to_char(sysdate, 'dd') between '01' and '04'
         * then to_char(add_months(sysdate, -1), 'yyyymm') else to_char(sysdate, 'yyyymm') end)
         * ), 0)
         * )
         * - nvl((select sum(amount)
         * from tpayment
         * where yyyymmdd < ?
         * and account_id = ?
         * and account_type = 'A'
         * and pay_code <> 105
         * ), 0)
         * total
         * from dual", [$accountID, $date, $accountID]);
         */

        // write raw query
        $results = DB::select("select
                    (
                            nvl((select sum(amount)
                                    from taff_payable
                                    where account_id = ?
                                        and PAY_CODE <> 301
                                        and PAY_CODE <> 601
                            ), 0)
                    )
                    - nvl((select sum(amount)
                                    from tpayment
                                    where   account_id = ?
                                            and account_type = 'A'
                                            and pay_code <> 105
                            ), 0)
                    total
            from dual", [$accountID, $accountID]);

        $payable = 0;
        if ($results) {
            $payable = $results[0]->total ?? 0;
        }

        $bonus = BonusMerchant::getPubBonusAmountTotal();
        $totalBonus = 0;

        foreach($bonus as $b) {
            $totalBonus += $b->amount ?? 0;
        }

        $payable = $totalBonus + $payable;

        return $payable;
    }

    function getCommissionChart(array $affID, $month = null)
    {
        $query = $this->selectRaw('yyyymmdd, sum(commission) as commission')
            ->whereIn('affiliate_id', $affID);

        $start = date('Ym') . '01';
        $end = date('Ym') . '31';
//        $start = 20160101;
//        $end = 20161231;

        if ($month) {
            $start = date('Y') . $month . '01';
            $end = date('Y') . $month . '31';
        }

        $query = $query->whereBetween('yyyymmdd', [$start, $end]);

        return $query->groupBy('yyyymmdd')->get();
    }


    function getCommissionChartNewpub(array $affID, $start, $end)
    {
        $query = DB::table('TTRANSLOG')->selectRaw('yyyymmdd, sum(commission) as commission')
            ->whereIn('affiliate_id', $affID);

        $query = $query->whereBetween('yyyymmdd', [$start, $end]);

        return $query->groupBy('yyyymmdd')->get();
    }
	
	function getReportNet(array $affID, $limit = 10, $offset = 0, $strMerchant = '') {
		return $query = DB::table('TREPORT_NET')
		->selectRaw("TO_CHAR(CREATE_TIME_STAMP, 'YYYYMMDD') YYYYMMDD, MERCHANT_ID, SUM(COMMISSION_NET) as COMMISSION_NET, MAX(YYYYMMDD) as YMD")
		->whereIn('AFFILIATE_ID', $affID)
		->where("MERCHANT_ID", "like", "%".$strMerchant."%")
		->groupBy('MERCHANT_ID', 'CREATE_TIME_STAMP')
		->orderBy('CREATE_TIME_STAMP', 'DESC')
		->offset($offset)
		->limit($limit)
        ->get();
	}
}
