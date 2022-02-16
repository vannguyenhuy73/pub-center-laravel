<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'tlink';
    public $timestamps = false;

    public function getBannerLink($merchantID)
    {
        $sql = "
            SELECT * FROM 
            (
                SELECT m.MERCHANT_ID, m.SITE_NAME, l.LINK_ID, l.LINK_TYPE2,
                l.TARGET_URL, l.BANNER_URL, l.BANNER_TEXT, l.HIDDEN_YN,
                l.WIDTH, l.HEIGHT,l.END_DATE,
                to_char(l.CREATE_TS,'DD/MM/YYYY') ctime,
                ROW_NUMBER() OVER (ORDER BY l.CREATE_TS DESC ) R
                FROM TMERCHANT m, TLINK l 
                WHERE m.MERCHANT_ID = l.MERCHANT_ID
                	AND m.ACCOUNT_STATUS = 'ACT'
                	AND m.AP_APPROVAL = 'Y'
                	AND l.HIDDEN_YN = 'N'
                	AND l.AP_APPROVAL = 'Y'
                	AND l.LINK_ID <> '0000'
               	 	AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
               	 	AND l.LINK_TYPE2 = 2
                	AND m.MERCHANT_ID = :merchantID
                
            )
            WHERE R BETWEEN 0 AND 20";

        $result = \DB::select($sql, [':merchantID' => $merchantID]);

        return $result;
    }

    public function getBannerLinkNewPub($merchantID, $width = 0, $height = 0)
    {
        $sql = "
            SELECT * FROM 
            (
                SELECT m.MERCHANT_ID, m.SITE_NAME, l.LINK_ID, l.LINK_TYPE2,
                l.TARGET_URL, l.BANNER_URL, l.BANNER_TEXT, l.HIDDEN_YN,
                l.WIDTH, l.HEIGHT,l.END_DATE,
                to_char(l.CREATE_TS,'DD/MM/YYYY') ctime,
                ROW_NUMBER() OVER (ORDER BY l.CREATE_TS DESC ) R
                FROM TMERCHANT m, TLINK l 
                WHERE m.MERCHANT_ID = l.MERCHANT_ID
                	AND m.ACCOUNT_STATUS = 'ACT'
                	AND m.AP_APPROVAL = 'Y'
                	AND l.HIDDEN_YN = 'N'
                	AND l.AP_APPROVAL = 'Y'
                	AND l.LINK_ID <> '0000'
               	 	AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
               	 	AND l.LINK_TYPE2 = 2
                	AND m.MERCHANT_ID = :merchantID
                	AND l.WIDTH = :width
                	AND l.HEIGHT = :height
            )
            WHERE R BETWEEN 0 AND 20";

        $result = \DB::select($sql, [':merchantID' => $merchantID, ':width' => $width, ':height' => $height]);

        return $result;
    }

    public function getCustomBanner($merchantID)
    {
    	$sql = "
    	select width, height, count(link_id) cnt,
    	(select banner_url from tlink where width = A.width and height = A.height
    	and to_char(sysdate,'YYYYMMDD') between nvl(start_date, to_char(sysdate - 1, 'YYYYMMDD'))
    	and end_date and link_id <> '0000' and LINK_TYPE2 = 2 and HIDDEN_YN = 'N' and ROWNUM = 1 and merchant_id = :merchantID and CREATE_TS = (select MAX(CREATE_TS) FROM TLINK WHERE width = A.width and height = A.height
    	and to_char(sysdate,'YYYYMMDD') between nvl(start_date, to_char(sysdate - 1, 'YYYYMMDD'))
    	and end_date and link_id <> '0000' and LINK_TYPE2 = 2 and HIDDEN_YN = 'N' and merchant_id = :merchantID)) link_url
    	from tlink A
    	where merchant_id = :merchantID and ap_approval = 'Y'
    	and to_char(sysdate,'YYYYMMDD') between nvl(start_date, to_char(sysdate - 1, 'YYYYMMDD'))
    	and end_date and link_id <> '0000' and LINK_TYPE2 = 2 and HIDDEN_YN = 'N'
    	group by width, height order by width asc";

    	$result = \DB::select($sql, [':merchantID' => $merchantID]);

    	return $result;
    }

	public function getVideoMerchant($id)
    {
    	$sql = "
            SELECT * FROM 
            (
                SELECT m.MERCHANT_ID, m.SITE_NAME, l.ALT_TEXT,
                l.TARGET_URL, l.BANNER_URL, l.THUMBNAIL,l.LINK_ID,
                to_char(l.CREATE_TS,'DD/MM/YYYY') ctime, ROW_NUMBER() OVER (ORDER BY l.CREATE_TS DESC ) R 
                FROM TMERCHANT m, TLINK l 
                WHERE 
                m.MERCHANT_ID = l.MERCHANT_ID AND 
                m.ACCOUNT_STATUS = 'ACT' AND 
                m.AP_APPROVAL = 'Y' AND 
                l.HIDDEN_YN = 'N' AND 
                l.AP_APPROVAL = 'Y' AND 
                l.LINK_ID <> '0000' AND 
                l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD') AND
                l.LINK_TYPE2 = 3 AND
                m.MERCHANT_ID = :merchantID
                
            )
            WHERE R BETWEEN 0 AND 20";

        $result = \DB::select($sql, [':merchantID' => $id]);

        return $result;	
    }
    public function getUrlVideo($id, $merchant)
    {
    	$sql = " SELECT l.TARGET_URL, l.BANNER_URL, l.WIDTH, l.HEIGHT,l.MERCHANT_ID
                FROM TMERCHANT m, TLINK l 
                WHERE 
                m.MERCHANT_ID = l.MERCHANT_ID AND 
                m.ACCOUNT_STATUS = 'ACT' AND 
                m.AP_APPROVAL = 'Y' AND 
                l.HIDDEN_YN = 'N' AND 
                l.AP_APPROVAL = 'Y' AND 
                l.LINK_ID = '$id' AND 
                l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD') AND
                l.LINK_TYPE2 = 3 AND
                m.MERCHANT_ID = '$merchant'";

        $result = \DB::select($sql);
        
        return $result;	
    }

	public function getCateMerchant()
	{
		$sql = "SELECT DISTINCT GET_MCATEGORY1_NAME(m.CATEGORY1_ID) CAT_NAME1,  m.CATEGORY1_ID
			    FROM TMERCHANT m
			    INNER JOIN TLINK l
			    	ON m.MERCHANT_ID = l.MERCHANT_ID
			    WHERE m.MERCHANT_ID = l.MERCHANt_ID
			    	AND m.ACCOUNT_STATUS = 'ACT'
			    	AND m.HIDDEN_FLAG = 'N'
			    	AND l.HIDDEN_YN = 'N'
			    	AND l.AP_APPROVAL = 'Y'
			    	AND l.LINK_ID <> '0000'
			    	AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
			    	AND l.LINK_TYPE2 = 2
			    	AND l.CPO_LINK = 'N'";
		
		return  \DB::select($sql);
    }
	//asas
	public function getSize($data)
	{
		$match ="";
		$a_id = Auth()->user()->last_contact_affiliate_id;
		if(isset($data->merchant) && $data->merchant != "0") {
			$match = "AND m.MERCHANT_ID = '$data->merchant'";
		}
		$sql = "SELECT l.HEIGHT,l.WIDTH,  COUNT(*) TOTAL
			    FROM TMERCHANT m
			    INNER JOIN TLINK l
			    	ON m.MERCHANT_ID = l.MERCHANT_ID
			    LEFT JOIN TSUBSCRIPT T
        			ON m.MERCHANT_ID = T.MERCHANT_ID
			    WHERE m.MERCHANT_ID = l.MERCHANt_ID
			    	AND T.AFFILIATE_ID = '$a_id'
        			AND T.SUBS_STATUS = 'APR'
				    AND m.ACCOUNT_STATUS = 'ACT'
				    AND m.HIDDEN_FLAG = 'N'
				    AND l.HIDDEN_YN = 'N'
				    AND l.AP_APPROVAL = 'Y'
				    AND l.LINK_ID <> '0000'
				    AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
				    AND l.LINK_TYPE2 = 2
				    AND l.CPO_LINK = 'N'
	                AND m.CATEGORY1_ID = '$data->cate'
	                $match
				group by l.HEIGHT, l.WIDTH
				ORDER BY l.WIDTH ASC
				";
		
		return  \DB::select($sql);
    }
    
    public function getMerchant($cate)
	{
		$a_id = Auth()->user()->last_contact_affiliate_id;
		$sql = "SELECT m.MERCHANT_ID
			    FROM TMERCHANT m
			    INNER JOIN TLINK l
			    	ON m.MERCHANT_ID = l.MERCHANT_ID
			    LEFT JOIN TSUBSCRIPT T
        			ON m.MERCHANT_ID = T.MERCHANT_ID
			    WHERE m.MERCHANT_ID = l.MERCHANt_ID
			    	AND T.AFFILIATE_ID = '$a_id'
        			AND T.SUBS_STATUS = 'APR'
				    AND m.ACCOUNT_STATUS = 'ACT'
				    AND m.HIDDEN_FLAG = 'N'
				    AND l.HIDDEN_YN = 'N'
				    AND l.AP_APPROVAL = 'Y'
				    AND l.LINK_ID <> '0000'
				    AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
				    AND l.LINK_TYPE2 = 2
				    AND l.CPO_LINK = 'N'
	                AND m.CATEGORY1_ID = '$cate'
				group by m.MERCHANT_ID
				ORDER BY m.MERCHANT_ID ASC
				";
		
		return  \DB::select($sql);
    }
	
	public function getBanner($cate, $width, $height, $m_id, $a_id)
	{
		$match = "";
		
		if($m_id != null) {
			$match = "AND m.MERCHANT_ID= '$m_id'";
		}
		
		$sql = "SELECT * from (
        SELECT l.MERCHANT_ID, l.TARGET_URL, l.BANNER_URL
			    FROM TMERCHANT m
			    INNER JOIN TLINK l
			    	ON m.MERCHANT_ID = l.MERCHANT_ID
			    LEFT JOIN TSUBSCRIPT T
        			ON m.MERCHANT_ID = T.MERCHANT_ID
			    WHERE m.MERCHANT_ID = l.MERCHANt_ID
			    	AND T.AFFILIATE_ID = '$a_id'
        			AND T.SUBS_STATUS = 'APR'
			    	AND m.ACCOUNT_STATUS = 'ACT'
			    	AND m.HIDDEN_FLAG = 'N'
			    	AND l.HIDDEN_YN = 'N'
			    	AND l.AP_APPROVAL = 'Y'
			    	AND l.LINK_ID <> '0000'
			    	AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
			    	AND l.LINK_TYPE2 = 2
			    	AND l.CPO_LINK = 'N'
                    AND l.HEIGHT = '$height'
                    AND l.WIDTH = '$width'
                    AND m.CATEGORY1_ID= '$cate'
                    $match
				ORDER BY dbms_random.value
			) Where rownum = 1";
		$merchantRandom = \DB::select($sql);
		
		return $merchantRandom;
    }

    public function getAllBanner($cate, $width, $height, $m_id, $a_id)
	{
		$match = "";
		
		if($m_id != null) {
			$match = "AND m.MERCHANT_ID= '$m_id'";
		}
		
		$sql = "SELECT l.MERCHANT_ID, l.TARGET_URL, l.BANNER_URL
			    FROM TMERCHANT m
			    INNER JOIN TLINK l
			    	ON m.MERCHANT_ID = l.MERCHANT_ID
			    LEFT JOIN TSUBSCRIPT T
        			ON m.MERCHANT_ID = T.MERCHANT_ID
			    WHERE m.MERCHANT_ID = l.MERCHANt_ID
			    	AND T.AFFILIATE_ID = '$a_id'
        			AND T.SUBS_STATUS = 'APR'
			    	AND m.ACCOUNT_STATUS = 'ACT'
			    	AND m.HIDDEN_FLAG = 'N'
			    	AND l.HIDDEN_YN = 'N'
			    	AND l.AP_APPROVAL = 'Y'
			    	AND l.LINK_ID <> '0000'
			    	AND l.END_DATE >= TO_CHAR(SYSDATE, 'YYYYMMDD')
			    	AND l.LINK_TYPE2 = 2
			    	AND l.CPO_LINK = 'N'
                    AND l.HEIGHT = '$height'
                    AND l.WIDTH = '$width'
                    AND m.CATEGORY1_ID= '$cate'
                    $match
				ORDER BY l.MERCHANT_ID";
		$merchantRandom = \DB::select($sql);
		
		return $merchantRandom;
    }
}
