<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    /**
     * set table name
     *
     * @var string
     */
    protected $table = 'tmerchant';

    /**
     * disable timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * set primary_key
     *
     * @var string
     */
    public $primaryKey = 'merchant_id';

    /**
     * get list merchant is valid
     *
     * @param null $receitID
     *
     * @return array
     */
    public function getListMerchantValid($receitID = null)
    {
        if (($receitID == 'lpevent') || ($receitID == 'lpevent2'))
            $where = " hidden_flag is not null";
        else
            $where = " hidden_flag != 'Y'";

        if ($receitID)
            $where .= " AND merchant_id = '$receitID'";

        return \DB::select("SELECT merchant_id, site_name
			FROM vmerchant_valid
			WHERE $where
			ORDER BY MERCHANT_ID");
    }

    /**
     * Get list offer show in offer page
     *
     * @param      $start
     * @param $limit
     * @param $paramDefault
     * @return array
     */
    public function getList($start, $limit, $paramDefault)
    {
        $where = '';

        $end = $start + $limit - 1;

        $fun = '';
        $category = $paramDefault['category'] ?? null;
        $offerType = $paramDefault['offer_type'] ?? null;
        $offerName = $paramDefault['offer_name'] ?? null;
        $orderBy = $paramDefault['order_by'] ?? null;
        $sortCommission = $paramDefault['sort_commission'] ?? null;

        if ($offerName) {
            $where .= " AND LOWER(m.SITE_NAME) LIKE '%" . mb_strtolower($offerName) . "%'";
        }

        if ($category == "('global')") {
            $where .= "AND NATIONALITY != 'VNM'";

        } else if ($category) {
            $where .= " AND CATEGORY1_ID IN $category";

        }

        if ($orderBy == 'new') {
            $order = "ORDER BY ctime DESC ";

        } elseif ($orderBy == "top") {
            $fun = "GET_SORT_NO(m.MERCHANT_ID) SORT_NO,";
            $order = "ORDER BY SORT_NO asc";

        } elseif ($orderBy == "cate_name") {
            $order = "order by CAT_NAME1 asc";

        } else {
            $fun = "GET_SORT_NO(m.MERCHANT_ID) SORT_NO,";
            $order = "ORDER BY SORT_NO asc";
        }

        if ($offerType) {
            $offerType = strtoupper($offerType);
            $where .= " and (exists (select * from TPROGRAM c where m.MERCHANT_ID=c.merchant_id and c.AD_TYPE='" . strtoupper($offerType) . "'))";
        }

        if (
            $sortCommission == Program::TYPE_PERCENT ||
            $sortCommission == Program::TYPE_VND
        ) {
            $where .= " AND TRIM(GET_MER_COM_TYPE(m.MERCHANT_ID))='$sortCommission'";
            $order = " ORDER BY GET_MER_COM_SORT(m.MERCHANT_ID) desc";
        }


        $sql = "
        SELECT t2.* FROM
        ( SELECT ROWNUM AS rn, t1.* FROM
        ( SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            $fun
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            SUBSTR((
                select l.BANNER_URL
                from TLINK l
                where l.MERCHANT_ID = m.MERCHANT_ID
                AND l.HIDDEN_YN = 'N'
                AND l.AP_APPROVAL = 'Y'
                AND l.LINK_ID <> '0000'
                AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
                AND l.LINK_TYPE2 = 3
                AND ROWNUM =1
            ),0,3) as video,
            ROWNUM  AS R
            FROM VMERCHANT_VALID m
            WHERE m.HIDDEN_FLAG <> 'Y'
            and (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
            $where $order) t1 )
        t2 where t2.rn between $start and $end
        ";

        return \DB::select(\DB::raw($sql));
    }

    public function  getCountAll($offerType = null, $category = null, $offerName = null, $orderBy = null, $sortCommission = null)
    {
        $where = '';
        $fun = '';

        if ($offerName) {
            $where .= " AND LOWER(m.SITE_NAME) LIKE '%" . mb_strtolower($offerName) . "%'";
        }

        if ($category == "('global')") {
            $where .= "AND NATIONALITY != 'VNM'";

        } else if ($category) {
            $where .= " AND CATEGORY1_ID IN $category";

        }

         if ($orderBy == 'new') {
            $order = "ORDER BY ctime DESC ";
            $orderByTop= 'ROW_NUMBER() OVER (ORDER BY m.CREATE_TIME_STAMP desc ) AS R';

        } elseif ($orderBy == "top") {
            $fun = "GET_SORT_NO(m.MERCHANT_ID) SORT_NO,";
            $order = "ORDER BY SORT_NO asc";
            $orderByTop= 'ROW_NUMBER() OVER (ORDER BY GET_SORT_NO(m.MERCHANT_ID) asc ) AS R';

        } elseif ($orderBy == "cate_name") {
            $order = "order by CAT_NAME1 DESC";
            $orderByTop= 'ROW_NUMBER() OVER (ORDER BY GET_SORT_NO(m.MERCHANT_ID) asc ) AS R';

        } else {
            $fun = "GET_SORT_NO(m.MERCHANT_ID) SORT_NO,";
            $order = "ORDER BY SORT_NO asc";
            $orderByTop= 'ROW_NUMBER() OVER (ORDER BY GET_SORT_NO(m.MERCHANT_ID) asc ) AS R';
        }

        if ($offerType) {
            $offerType = strtoupper($offerType);
            $where .= " and (exists (select * from TPROGRAM c where m.MERCHANT_ID=c.merchant_id and c.AD_TYPE='" . strtoupper($offerType) . "'))";
        }

        if (
            $sortCommission == Program::TYPE_PERCENT ||
            $sortCommission == Program::TYPE_VND
        ) {
            $where .= " AND TRIM(GET_MER_COM_TYPE(m.MERCHANT_ID))='$sortCommission'";
        }


        $sql = "SELECT * from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            $fun
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            $orderByTop
            FROM VMERCHANT_VALID m
            WHERE m.HIDDEN_FLAG <> 'Y'
            and (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
            $where
        )

        $order";

        $result = \DB::select($sql);
        return count($result);
    }

    /**
     * Get mylist
     *
     * @param      $affiliateID
     * @param      $start
     * @param null $active if active = true => My Offers
     * @param null $offerType
     * @param null $category
     * @param null $offerName
     *
     * @return array
     */
    public function myList($affiliateID, $start, $limit, $offerType = null, $category = null, $offerName = null)
    {
        $where = '';
        $end = $start + $limit -1;

        if ($offerName) {
            $where .= " AND m.MERCHANT_ID LIKE '%" . $offerName . "%'";
        }


        if ($category == "('global')") {
            $where .= "AND NATIONALITY != 'VNM'";

        } else if ($category) {
            $where .= " AND CATEGORY1_ID IN $category";

        }


        if ($offerType) {
            $offerType = strtoupper($offerType);
            $where .= " and SUBSTR((
            case when m.AD_TYPE='CPC' then 'CPC' else
            (
                select
                    case when max(c.PUR_RATE)> 0 then 'CPS' else 'CPA' end||case when max(c.PUR_UNIT_PRICE)> 0 then 'CPA' else 'CPS' end
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE<>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
            )
            end),0,3) = '$offerType'";
        }

        $sql = "SELECT * from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, sub.SUBS_STATUS, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            SUBSTR((
                select l.BANNER_URL
                from TLINK l
                where l.MERCHANT_ID = m.MERCHANT_ID
                AND l.HIDDEN_YN = 'N'
                AND l.AP_APPROVAL = 'Y'
                AND l.LINK_ID <> '0000'
                AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
                AND l.LINK_TYPE2 = 3
                AND ROWNUM = 1
            ),0,3) as video,
            ROW_NUMBER() OVER (ORDER BY m.CREATE_TIME_STAMP DESC ) AS R
            FROM VMERCHANT_VALID m
            LEFT JOIN TSUBSCRIPT sub
            ON m.MERCHANT_ID = sub.MERCHANT_ID
            WHERE SUB.AFFILIATE_ID = '$affiliateID'
            AND m.HIDDEN_FLAG <> 'Y'
            AND m.ACCOUNT_STATUS = 'ACT'
            AND (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
            $where
        )
        where R BETWEEN $start AND $end";

        return \DB::select($sql);
    }

    /**
     * Get list offer show in offer page
     *
     * @param      $affiliateID
     * @param      $start
     * @param null $active if active = true => My Offers
     * @param null $offerType
     * @param null $category
     * @param null $offerName
     *
     * @return array
     */
    public function getCount($affiliateID, $active = null, $offerType = null, $category = null,
        $offerName = null)
    {
        $where = '';

        if ($active) {
            $where .= " AND m.ACCOUNT_STATUS = 'ACT'";
        }

        if ($offerName) {
            $where .= " AND m.MERCHANT_ID LIKE '%" . $offerName . "%'";
        }

        if ($category == "('global')") {
            $where .= "AND NATIONALITY != 'VNM'";

        } else if ($category) {
            $where .= " AND CATEGORY1_ID IN $category";

        }

        if ($offerType) {
            $offerType = strtoupper($offerType);
            $where .= " and SUBSTR((
            case when m.AD_TYPE='CPC' then 'CPC' else
            (
                select
                    case when max(c.PUR_RATE)> 0 then 'CPS' else 'CPA' end||case when max(c.PUR_UNIT_PRICE)> 0 then 'CPA' else 'CPS' end
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
            )
            end),0,3) = '$offerType'";
        }

        $sql = "
            SELECT count(m.MERCHANT_ID) as count
            FROM VMERCHANT_VALID m
            LEFT JOIN TSUBSCRIPT sub
            ON m.MERCHANT_ID = sub.MERCHANT_ID
            WHERE SUB.AFFILIATE_ID = '$affiliateID'
            AND m.HIDDEN_FLAG <> 'Y'
            AND (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
            $where
        ";

        $result = \DB::select($sql);

        return @$result[0]->count;
    }

    /**
     * Get info of merchant
     *
     * @param $merchantID
     * @param $affiliateID
     *
     * @return mixed
     */
    public function getMerchant($merchantID, $affiliateID)
    {
        $sql = "
            SELECT
				m.site_name, m.MERCHANT_ID, m.site_url, m.banner_url, m.site_desc, m.contact_mail,
                                m.contact_address1||', '||m.contact_address2 as contact_address,
				m.userlink_support, m.contact_mail, m.adult_flag, m.approval_type,
				m.return_day, c.category_code, c.code_name, s.subs_status, c.code_name,
				GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
				get_mer_com_info(m.merchant_id) com_info, t.ct,
				CASE WHEN s.STATUS_UPDATE_TIME_STAMP <  add_months(sysdate, -1) THEN  'Y' ELSE 'N' END RE_SUBS
			FROM VMERCHANT_VALID m, tmcategory1 c, tsubscript s,
                        (SELECT merchant_id,SUM(cnt) ct
                            FROM
                                (
                                SELECT merchant_id,DECODE(mobile_yn,'Y','1','0') cnt FROM TPROGRAM
                                GROUP BY merchant_id,mobile_yn
                                )
                            GROUP BY merchant_id) t
			WHERE m.merchant_id = :merchantID
				AND c.category_code = m.category1_id
				AND s.merchant_id(+) = m.merchant_id
                                AND m.merchant_id = t.merchant_id
				AND s.affiliate_id(+) = :affiliateID
        ";

        $result = \DB::select($sql, [':merchantID' => $merchantID, ':affiliateID' => $affiliateID]);
        return @$result[0];
    }

    /**
     * Get merchant Highlight
     *
     * @param     $affiliateID
     * @param int $len
     *
     * @return array
     */
    public function getHighlight($affiliateID, $len = 8)
    {
        $sql = "
                SELECT * FROM
                    (
                        SELECT m.merchant_id, m.site_name, m.site_short_desc, m.banner_url,
                        get_mcategory1_name(c.category_code) category_name, m.category1_id, c.code_name,
                        s.subs_status,
                        get_mer_com_info(m.merchant_id) com_info,
                        GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
                             case when m.AD_TYPE='CPC' then 'CPC' else
                        (
                        select
                                case when max(c.PUR_RATE)> 0 then 'CPS' else 'CPA' end||case when max(c.PUR_UNIT_PRICE)> 0 then 'CPA' else 'CPS' end
                            from TPROGRAM c
                            where m.MERCHANT_ID=c.merchant_id
                        and c.PGM_STATUS='ACT'
                        and c.HIDDEN_YN='N'
                        and c.AP_APPROVAL='Y'
                        and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                        )
                        end as adtype,
                        row_number() over (order by a.order_no, m.site_name) r

                        FROM tmerchant m, tmcategory1 c, tsubscript s, tac_merchant_control a
                        WHERE m.merchant_id = a.merchant_id
                        AND s.merchant_id(+) = a.merchant_id
                        AND m.ad_type = 'N'
                        AND m.account_status = 'ACT'
                        AND m.ap_approval = 'Y'
                        AND m.hidden_flag = 'N'
                        AND c.category_code(+) = m.category1_id
                        AND s.affiliate_id(+) = :affiliate
                        AND a.type = 'highlight'
                        AND use_yn = 'Y'
                        ORDER BY a.order_no, m.site_name
                    )
                where r between 0 and :length
                        ";
        return \DB::select($sql, [':affiliate' => $affiliateID, ':length' => $len]);
    }

    public function getListMerchantGolbal($limit = 5)
    {
        $sql = "SELECT * from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            ROW_NUMBER() OVER (ORDER BY m.CREATE_TIME_STAMP DESC ) AS R
            FROM VMERCHANT_VALID m
            WHERE m.HIDDEN_FLAG <> 'Y'
            and (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
            AND NATIONALITY != 'VNM'
        )

        where R BETWEEN 0 AND $limit";

        return \DB::select($sql);
    }

    public function getListNewMerchant($limit = 5)
    {
        $sql = "SELECT * from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            ROW_NUMBER() OVER (ORDER BY m.CREATE_TIME_STAMP DESC ) AS R
            FROM VMERCHANT_VALID m
            WHERE m.HIDDEN_FLAG <> 'Y'
            and (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
        )

        where R BETWEEN 0 AND $limit
        order by ctime desc";

        return \DB::select($sql);
    }

    public function getListTopMerchant($limit = 5)
    {
        $sql = "SELECT * from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_SORT_NO(m.MERCHANT_ID) SORT_NO,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
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
                and c.AD_TYPE <> 'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            )
            end),0,3) as adtype,
            ROW_NUMBER() OVER (ORDER BY GET_SORT_NO(m.MERCHANT_ID) ASC ) AS R
            FROM VMERCHANT_VALID m
            WHERE m.HIDDEN_FLAG <> 'Y'
            and (
                select
                    c.AD_TYPE
                from TPROGRAM c
                where m.MERCHANT_ID=c.merchant_id
                and c.PGM_STATUS='ACT'
                and c.HIDDEN_YN='N'
                and c.AP_APPROVAL='Y'
                and c.AD_TYPE <>'CPO'
                and to_char(sysdate, 'YYYYMMDD') between to_char(c.EFFECTIVE_DATE, 'YYYYMMDD') and to_char(c.EXPIRED_DATE, 'YYYYMMDD')
                AND ROWNUM <2
            ) <> 'CPO'
        )

        where R BETWEEN 0 AND " . config('const.top_merchant_limit') . "
        order by SORT_NO asc";

        return \DB::select($sql);
    }
}
