<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * Table
     *
     * @var string
     */
        protected $table = 'TBOARD';
    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'ARTICLE_ID';

    /**
     * get list board
     *
     * @param int $start
     * @param int $len
     * @return array
     */
    public function getListBoard($start = 0, $len = 4)
    {
        $sql = "SELECT * from
        (
            SELECT B.ARTICLE_ID, B.TITLE, B.ACCOUNT_ID, M.BANNER_URL, B.MERCHANT_ID, B.VDATE,B.IMAGE, B.SUMMARY,
            B.NREAD, B.MREAD, to_char(B.CDATE, 'dd-mm-yyyy') WDATE, B.NOTICE_YN, URL,
            get_merchant_name(B.MERCHANT_ID) SITE_NAME, B.NOTICE_TYPE, B.PRODUCT_TYPE,
            ROW_NUMBER() OVER (ORDER BY CDATE desc, TITLE desc) AS RNUM
            FROM TBOARD B, VMERCHANT_VALID M
            WHERE VDATE <= to_char(sysdate, 'YYYYMMDD') and NOTICE_YN='Y' and ACCOUNT_ID='adpia' and B.MERCHANT_ID!='_deleted_' AND B.MERCHANT_ID = M.MERCHANT_ID
        ) 
        where RNUM  BETWEEN '$start' AND '$len' ";
        $query = \DB::select($sql);
        return $query;
    }

    /**
     * Get list board by merchant
     *
     * @param $merchantID
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBoardByMerchant($merchantID)
    {
        return $this->query()->where([
            'MERCHANT_ID' => $merchantID,
            'NOTICE_YN'=>'Y',
            'ACCOUNT_ID'=> 'adpia'
        ])->limit(10)->orderBy('ARTICLE_ID', 'DESC')->get();
    }
}
