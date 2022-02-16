<?php

namespace App\Repositories;
use App\Cache\BaseCache;

class MerchantRepository
{
    const TOKEN_KEY = 'Publisher';
    const LIMIT_DEFAULT = 50;

    public static function getListMerchant($param)
    {
        $param['limit'] = self::LIMIT_DEFAULT;
        $affiliateId = $param['affiliate_id'] ?? '';
        $start = $param['offset'] ?? 0;
        $keyCache = 'list_merchant_key_' . $start . '-' . $affiliateId . '-' . $param['token'];
        $merchants = BaseCache::getData($keyCache,
            call_user_func_array(
                function ($affiliateId, $param) {
                    $where = '';
                    $start = $param['offset'] ?? 0;
                    $end = $start + $param['limit'] - 1;
                    $sql = " SELECT t2.* FROM
                    ( SELECT ROWNUM AS rn, t1.* FROM
                    ( SELECT merchant_id, site_name, return_day, banner_url, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') created_date,
                        CATEGORY1_ID as category_id,
                        GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CATEGORY_NAME,
                        GET_MER_COM_DISPLAY(m.MERCHANT_ID) com_display,
                        SUBSTR((
                        case when m.AD_TYPE='CPC' then 'CPC' else
                        (
                            select
                            c.AD_TYPE
                            from TPROGRAM c
                            where m.MERCHANT_ID=c.merchant_id
                            and c.PGM_STATUS='ACT'
                            and c.HIDDEN_YN='N'
                            and c.AP_APPROVAL='Y'
                            and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                            AND ROWNUM <2
                        )
                        end),0,3) as adtype,
                        (
                            select
                            c.pgm_desc_clob
                            from TPROGRAM c
                            where m.MERCHANT_ID=c.merchant_id
                            and c.PGM_STATUS='ACT'
                            and c.HIDDEN_YN='N'
                            and c.AP_APPROVAL='Y'
                            and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                            AND ROWNUM <2
                        ) as info_campagin_detail,
                        ROWNUM  AS R
                        FROM VMERCHANT_VALID m
                        WHERE m.HIDDEN_FLAG <> 'Y' and (
                            select
                            sup.subs_status
                            from TSUBSCRIPT sup
                            where m.MERCHANT_ID=sup.merchant_id
                            and sup.AFFILIATE_ID='$affiliateId'
                            AND ROWNUM <2
                        )='APR'
                        $where) t1 )
                    t2 where t2.rn between $start and $end";

                    $merchants = \DB::select(\DB::raw($sql));

                    foreach ($merchants as $key => $merchant) {
                        $merchants[$key]->tracking_link = config('const.domain_click') . '/tracking.php?m=' . $merchant->merchant_id .
                        '&a=' . $affiliateId . '&l=0000';
                    }

                    return $merchants;
                },
                [$affiliateId, $param]
            )
        );

        return $merchants;
    }
}
