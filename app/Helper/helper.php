<?php

use App\Models\Program;

/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 04/09/2018
 * Time: 16:09
 */

############################################################################
##	커미션 정보를 텍스트로 표현한 문자열을 리턴
############################################################################
function pgm_get_com_info($pr, $pp, $delimiter = "<br>")
{
    if ($pp)
        return number_format($pp) . " VND";
    if ($pr)
        return ($pr * 100) . "%";
    else
        return "";
}

/**
 * 머천트의 커미션 정보를 보여줌
 *
 * @param number $pr_max
 * @param number $pr_min
 * @param number $pp_max
 * @param number $pp_min
 * @param stirng $delimiter
 *
 * @return mixed
 */
function pgm_get_merchant_com_info($commission, $delimiter = "<br>")
{
    $data = explode(',', $commission);
    $pr_max = $data[0];
    $pr_min = $data[1];
    $pp_max = $data[2];
    $pp_min = $data[3];

    $com_info = "";

    if ($pr_min)
        $pr_min = $pr_min * 100;

    if ($pr_max)
        $pr_max = $pr_max * 100;

    if ($pp_max || $pp_min)
        $com_info = $delimiter . pgm_number_interval_text($pp_min, $pp_max) . " VND";

    if ($pr_max || $pr_min)
        $com_info .= $delimiter . pgm_interval_text($pr_min, $pr_max) . "%";

    if ($com_info)
        $com_info = substr($com_info, strlen($delimiter));

    return $com_info;
}

############################################################################
##	최소값과 최대값을 텍스트로 표현
############################################################################
function pgm_interval_text($min, $max)
{
    if ($min && $max && $min != $max)
        return ($min) . "~" . ($max);
    else if ($min && !$max)
        return ($min);
    else if (!$min && $max)
        return ($max);
    else if ($min && $max && $min == $max)
        return ($min);
}

function pgm_number_interval_text($min, $max)
{
    if ($min && $max && $min != $max)
        return number_format($min) . "~" . number_format($max);
    else if ($min && !$max)
        return number_format($min);
    else if (!$min && $max)
        return number_format($max);
    else if ($min && $max && $min == $max)
        return number_format($min);
}

//app 배포용
function app_pgm_get_merchant_com_info($pur_unit_price)
{
    $com_info = "";

    //if ($pur_rate) $pur_rate = $pur_rate*100;

    //if ($pur_rate) $com_info.= pgm_interval_text($pur_rate, $pur_rate)."%";
    if ($pur_unit_price)
        $com_info .= pgm_number_interval_text($pur_unit_price, $pur_unit_price) . "원";

    return $com_info;
}

//twitlink 용
function pgm_get_merchant_com_info2($pr_max, $pr_min, $pp_max, $pp_min, $delimiter = "<br>", $cpc = "")
{
    $com_info = "";

    if ($pr_min)
        $pr_min = $pr_min * 100;

    if ($pr_max)
        $pr_max = $pr_max * 100;

    if ($pp_max || $pp_min) {
        if ($cpc)
            $com_info .= "$delimiter<img src='/images/icon_cpc.gif' alt='CPC'>" . pgm_number_interval_text($pp_min, $pp_max) . "원";
        else
            $com_info .= "$delimiter<img src='/images/icon_cpa.gif' alt='CPA'>" . pgm_number_interval_text($pp_min, $pp_max) . "원";
    }

    if ($pr_max || $pr_min)
        $com_info .= "$delimiter<img src='/images/icon_cps.gif' alt='CPS'>" . pgm_interval_text($pr_min, $pr_max) . "%";

    $com_info = substr($com_info, strlen($delimiter));

    return $com_info;
}

/**
 * Convert date YYYYMMDD to DD-MM-YY
 *
 * @param $date YYYYMMDD
 *
 * @return string
 */
function dateConvert($date)
{
    return substr($date, 6, 2) . '/' . substr($date, 4, 2) . '/' . substr($date, 0, 4);
}

/**
 * Get code name in
 *
 * @param $code
 *
 * @return mixed|string
 */
function getCodeName($code)
{
    $code = (new \App\Models\Code())->getCodeName($code);

    if (!$code) {
        return 'undefined';
    }

    return $code->code_name_vnm;
}

/**
 * get Referral
 *
 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
 */
function getReferral()
{
    return \App\Models\Referral::getReferralAcount(auth()->id());
}

/**
 * Get user referraled by userID
 *
 * @param $accountID
 *
 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
 */
function getReferralAccount($accountID)
{
    return \App\User::query()->where('join_from', $accountID)->get(['account_id']);
}

/**
 * Calculate commission referral
 *
 * @param $commission
 *
 * @return float|int
 */
function calculateCommission($commission)
{
    $info = getReferral();

    if ($info->comm_point != null && $commission > $info->comm_point) {
        return $commission * $info->comm_share / 100;
    }

    return $commission * $info->default / 100;
}

/**
 * Check user referred by accountID
 *
 * @param $accountID
 * @param $referralAC
 *
 * @return bool
 */
function checkReferral($accountID, $referralAC)
{
    return \App\User::query()->where(['account_id' => $accountID, 'join_from' => $referralAC])->exists();
}

/**
 * get percent share
 *
 * @param $commission
 *
 * @return float|int
 */
function getReferralPercent($startDate, $endDate)
{
    $info = getReferral();
    $monthComm = \App\Models\Referral::getMonthConversion(auth()->id(), $startDate, $endDate);

    if ($info->comm_point != null && $monthComm > $info->comm_point) {
        return $info->comm_share / 100;
    }

    return $info->default / 100;
}

/**
 * get count offer
 *
 * @param $whereIn
 *
 * @return mixed
 */
function getOfferCount($whereIn, $param = [])
{
    $where = "";

    if ($whereIn == "('global')") {
        $where .= "AND NATIONALITY != 'VNM'";
    } else {
       $where .= "AND CATEGORY1_ID IN $whereIn";
    }

    if (
        isset($param['offer_type']) &&
        !empty($param['offer_type']) &&
        strtolower($param['offer_type']) != 'all'
    ) {
        $offerType = strtoupper($param['offer_type']);
        $where .= " and (exists (select * from TPROGRAM c where m.MERCHANT_ID=c.merchant_id and c.AD_TYPE='" . strtoupper($offerType) . "'))";
    }

    if (isset($param['offer_name']) && !empty($param['offer_name'])) {
        $where .= " AND LOWER(m.SITE_NAME) LIKE '%" . str_replace("'", "''", mb_strtolower($param['offer_name'])) . "%'";
    }
    $sortCommission = $param['sort_commission'] ?? '';
    if (
        $sortCommission == Program::TYPE_PERCENT ||
        $sortCommission == Program::TYPE_VND
    ) {
        $where .= " AND TRIM(GET_MER_COM_TYPE(m.MERCHANT_ID))='$sortCommission'";
    }

    $sql = "SELECT COUNT(MERCHANT_ID) as count from
        (
            SELECT m.*, to_char(m.CREATE_TIME_STAMP, 'dd/mm/YYYY') ctime,
            GET_SORT_NO(m.MERCHANT_ID) SORT_NO,
            GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,
            GET_MER_COM_INFO(m.MERCHANT_ID) com_info, GET_MER_COM_DISPLAY(m.MERCHANT_ID) as com_display,
            ROW_NUMBER() OVER (ORDER BY GET_SORT_NO(m.MERCHANT_ID) asc ) AS R
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
        )";

   $data = \DB::select($sql)[0];
   return $data->count;
}

function getAccountEmailNotExist($email) {
    $sql ="select * from TACCOUNT_NOT_EXIST where EMAIL = '$email'";

    $data = \DB::select($sql);
    return $data;
}
/**
 * generate JWT token for login in other site
 *
 * @return string
 */
function generateJWT(): string
{
    return (new \App\Libraries\JWT())->generateToken([
        'account_id' => auth()->id(),
        'contact_mail' => auth()->user()->contact_mail,
    ]);
}

function callApi($method, $url, $data = array(), $headers = array())
{
    if (empty($headers)) {
        $headers = array('Content-Type: application/json');
    }
    $curl = curl_init();
    switch ($method) {
        case 'POST':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            if (!empty($data)) {
                if (in_array('Content-Type: application/json', $headers)) {
                    $param = json_encode($data);
                }
                if (in_array('Content-Type: application/x-www-form-urlencoded', $headers)) {
                    $param = http_build_query($data);
                }
                curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
            }
            break;
        case 'PUT':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if (!empty($data)) {
                if (in_array('Content-Type: application/json', $headers)) {
                    $param = json_encode($data);
                }
                if (in_array('Content-Type: application/x-www-form-urlencoded', $headers)) {
                    $param = http_build_query($data);
                }
                curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
            }
            break;
        default:
            if (!empty($data))
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);

    if(!$result) {
        die("Connection Failure");
    }

    curl_close($curl);

    return json_decode($result, true);
}
