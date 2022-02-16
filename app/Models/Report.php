<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'tdreport_traffic_new';

    public function getPerformance($param = [])
    {
        $addTTQuery = '';
        $addTDQuery = '';
        $addTTWhere = '';
        $addTDWhere = '';
        $addSearch = '';
        $addMID = '';
        $addTDAffID = '';
        $addTTAffID = '';

        if(!empty($param['affiliate_id'])) {
            $addTDAffID .= " td.AFFILIATE_ID = '" . $param['affiliate_id'] . "' ";
            $addTTAffID .= " AFFILIATE_ID = '" . $param['affiliate_id'] . "' ";
        } else {
            for($i = 0; $i < count($param['affID']); $i++) {
                if($i == 0) {
                    $addTDAffID .= " td.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                    $addTTAffID .= " AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                } else {
                    $addTDAffID .= " OR td.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                    $addTTAffID .= " OR AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                }
            }
        }

        if(!empty($param['offerType']) || !empty($param['affiliate_id'])) {
            $addTTQuery = " JOIN TPROGRAM ON TTRANSLOG.APPLIED_PGM_ID = TPROGRAM.PGM_ID AND TTRANSLOG.MERCHANT_ID = TPROGRAM.MERCHANT_ID ";
        }

        if (!empty($param['offerType'])) {
            $addTTWhere .= "AND TPROGRAM.AD_TYPE = '" . $param['offerType'] . "' ";
        }

        if (!empty($param['conversionStatus'])) {
            if ($param['conversionStatus'] == 100) {
                $addTTWhere .= 'AND TTRANSLOG.STAT = 100';
            } else if ($param['conversionStatus'] == 300 || $param['conversionStatus'] == 310) {
                $addTTWhere .= 'AND TTRANSLOG.STAT IN (300, 310) AND DELETE_YN = \'Y\'';
            } else if ($param['conversionStatus'] == 220) {
                $addTTWhere .= 'AND TTRANSLOG.STAT = 220';
            } else if ($param['conversionStatus'] == 210) {
                $addTTWhere .= 'AND TTRANSLOG.STAT = 210';
            }
        }

        if(!empty($param['strSearch'])) {
            $addSearch .= "WHERE MERCHANT_ID LIKE '%" . $param['strSearch'] . "%' ";
        }

        if(!empty($param['merchant_id'])) {
            $addMID .= "WHERE MERCHANT_ID = '".$param['merchant_id']."' ";
        }

        $sql = "select SUM(IMP) imp, SUM(clt) clt, SUM(total_clt) total_clt, SUM(mobile_clt) mobile_clt, SUM(total_ords) total_ords, SUM(total_sales) total_sales ,
                SUM(total_com) total_com, SUM(total_items) total_items, MERCHANT_ID
                from
                (
                    select SUM(td.IMP) imp, SUM(td.CLT) clt, SUM(td.TOTAL_CLT) total_clt, SUM(td.MOBILE_CLT) mobile_clt, 0 total_ords, 0 total_sales, 0 total_com, 0 total_items,
                    td.MERCHANT_ID
                    from TDREPORT_TRAFFIC_NEW td 
                    where ($addTDAffID)
                    AND td.YYYYMMDD >= '" . $param['start'] . "'
                    AND td.YYYYMMDD <= '" . $param['end'] . "'
                    group by td.YYYYMMDD, td.MERCHANT_ID
                    union all
                    select 0 imp, 0 clt, 0 total_clt, 0 mobile_clt, count(ORDER_CODE) total_ords, sum(SALES) total_sales, sum(COMMISSION) total_com, sum(ITEM_COUNT) total_items,
                    MERCHANT_ID from (
					select ORDER_CODE, SALES, COMMISSION, ITEM_COUNT,
                    TTRANSLOG.MERCHANT_ID, YYYYMMDD
                    from TTRANSLOG $addTTQuery
                    where ($addTTAffID)
                    AND YYYYMMDD >= '" . $param['start'] . "'
                    AND YYYYMMDD <= '" . $param['end'] . "'
                    $addTTWhere )
                    group by YYYYMMDD, MERCHANT_ID
                ) $addSearch $addMID
                group by  MERCHANT_ID";
        return \DB::select($sql);
    }

    /**
     * get report conversion
     *
     * @param      $accountID
     * @param      $start
     * @param      $end
     * @param null $offerType
     * @param null $offerID
     * @param null $conversionStatus
     *
     * @return array
     */
    static public function getDetail($param = []) 
    {
        $addWhere = '';
        $addAffID = '';

        if(!empty($param['affiliateId'])) {
            $addAffID .= " TTRANSLOG.AFFILIATE_ID = '" . $param['affiliateId'] . "' ";
        } else {
            for($i = 0; $i < count($param['affID']); $i++) {
                if($i == 0) {
                    $addAffID .= " TTRANSLOG.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                } else {
                    $addAffID .= " OR TTRANSLOG.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                }
            }
        }

        if(!empty($param['sub_id'])) {
            $addWhere.=  'AND TTRANSLOG.SUB_ID = \''.$param['sub_id'].'\' ';
        }

        if (in_array($param['offerType'], ['CPS', 'CPA', 'CPI'])) {
            $addWhere .= ' AND TPROGRAM.AD_TYPE = \'' . $param['offerType'] . '\' ';
        }

        if (!empty($param['offerID'])) {
            $addWhere .= 'AND TTRANSLOG.MERCHANT_ID = \'' . $param['offerID'] . '\' ';
        }

        if (!empty($param['conversionStatus'])) {
            if ($param['conversionStatus'] == 100) {
                $addWhere .= 'AND TTRANSLOG.STAT IN (100, 200)';
            } else if ($param['conversionStatus'] == 300 || $param['conversionStatus'] == 310) {
                $addWhere .= 'AND TTRANSLOG.STAT IN (300, 310)';
            } else if ($param['conversionStatus'] == 220) {
                $addWhere .= 'AND TTRANSLOG.STAT = 220';
            } else if ($param['conversionStatus'] == 210) {
                $addWhere .= 'AND TTRANSLOG.STAT = 210';
            }
        }

        $limitTo = $param['offset'] + $param['limit'];

        $sql = "
            SELECT * FROM (
                SELECT TTRANSLOG.MERCHANT_ID, TTRANSLOG.TRLOG_ID, TTRANSLOG.COMMISSION, TTRANSLOG.SALES, TAFFILIATE.SITE_NAME, TTRANSLOG.STAT,TTRANSLOG.SUB_ID, TTRANSLOG.SHOP_NAME, 
                TTRANSLOG.MERCHANT_ID GROUP_ID, TTRANSLOG.YYYYMMDD, TTRANSLOG.PRODUCT_NAME, 
                row_number() over (order by TTRANSLOG.YYYYMMDD ASC ) r
                FROM TTRANSLOG JOIN TPROGRAM ON TTRANSLOG.MERCHANT_ID = TPROGRAM.MERCHANT_ID
                JOIN TAFFILIATE ON TTRANSLOG.AFFILIATE_ID = TAFFILIATE.AFFILIATE_ID
                WHERE ($addAffID)
                AND TTRANSLOG.YYYYMMDD >= '" . $param['start'] . "'
                AND TTRANSLOG.YYYYMMDD <= '" . $param['end'] . "'
                AND DELETE_YN = 'N'
                $addWhere
                GROUP BY TTRANSLOG.MERCHANT_ID, TTRANSLOG.COMMISSION, TTRANSLOG.SALES ,TTRANSLOG.STAT, TTRANSLOG.TRLOG_ID, TTRANSLOG.YYYYMMDD,TTRANSLOG.SUB_ID, TAFFILIATE.SITE_NAME, TTRANSLOG.PRODUCT_NAME, TTRANSLOG.SHOP_NAME

                ) WHERE r BETWEEN " . $param['offset'] ." AND $limitTo
        ";

        return \DB::select($sql);
    }

    public function getSummary($param = []) 
    {
        $addWhere = '';
        $addAffID = '';

        if(!empty($param['affiliateId'])) {
            $addAffID .= " TTRANSLOG.AFFILIATE_ID = '" . $param['affiliateId'] . "' ";
        } else {
            for($i = 0; $i < count($param['affID']); $i++) {
                if($i == 0) {
                    $addAffID .= " TTRANSLOG.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                } else {
                    $addAffID .= " OR TTRANSLOG.AFFILIATE_ID = '" . $param['affID'][$i] . "' ";
                }
            }
        }

        if(!empty($param['sub_id'])) {
            $addWhere.=  'AND TTRANSLOG.SUB_ID = \''.$param['sub_id'].'\' ';
        }

        if (in_array($param['offerType'], ['CPS', 'CPA', 'CPI'])) {
            $addWhere .= ' AND TPROGRAM.AD_TYPE = \'' . $param['offerType'] . '\' ';
        }

        if (!empty($param['offerID'])) {
            $addWhere .= 'AND TTRANSLOG.MERCHANT_ID = \'' . $param['offerID'] . '\' ';
        }

        if (!empty($param['conversionStatus'])) {
            if ($param['conversionStatus'] == 100) {
                $addWhere .= 'AND TTRANSLOG.STAT IN (100, 200)';
            } else if ($param['conversionStatus'] == 300 || $param['conversionStatus'] == 310) {
                $addWhere .= 'AND TTRANSLOG.STAT IN (\'300\', \'310\')';
            } else if ($param['conversionStatus'] == 220) {
                $addWhere .= 'AND TTRANSLOG.STAT = \'220\'';
            } else if ($param['conversionStatus'] == 210) {
                $addWhere .= 'AND TTRANSLOG.STAT = \'210\'';
            }
        }

        if(!empty($param['strSearch'])) {
            $addWhere .= " AND TTRANSLOG.MERCHANT_ID LIKE '%" . $param['strSearch'] . "%'";
        }

        if(!empty($param['merchant_id'])) {
            $addWhere .= " AND TTRANSLOG.MERCHANT_ID = '".$param['merchant_id']."' ";
        }

        $sql = "
				select count(TRLOG_ID) AS count, sum(COMMISSION) as commission, sum(SALES) as revenue
                from (select DISTINCT TTRANSLOG.TRLOG_ID, TTRANSLOG.COMMISSION, TTRANSLOG.SALES
                from TTRANSLOG join TPROGRAM on TTRANSLOG.MERCHANT_ID = TPROGRAM.MERCHANT_ID
                 where ($addAffID)
                AND TTRANSLOG.YYYYMMDD >= '" . $param['start'] . "'
                AND TTRANSLOG.YYYYMMDD <= '" . $param['end'] . "'
                AND DELETE_YN = 'N'
                $addWhere )
        ";

        return \DB::select($sql);
    }

    static function getPubBonus($param = []) {
        $acc_id = auth()->user()->account_id;
        $query = \DB::table('TBONUS')
        ->select('*')
        ->where('ACCOUNT_ID', '=', $acc_id)
        ->where('STATUS', '=', config('const.report.pub_bonus.status.finish'));
        if(!empty($param['start'])) {
            $query = $query->where('TARGET_MONTH', '>=', $param['start']);
        }

        if(!empty($param['end'])) {
            $query = $query->where('TARGET_MONTH', '<=', $param['end']);
        }

        if(!empty($param['strSearch'])) {
            $query = $query->whereRaw('LOWER(BONUS_FROM) like ?', '%'.$param['strSearch'].'%');
        }

        if(!empty($param['merchant_id'])) {
            $query = $query->where('BONUS_FROM', '=', $param['merchant_id']);
        }
        
        $query = $query->get();
        return $query;
    }

}