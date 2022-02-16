<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    const TYPE_PERCENT = 'percent';
    const TYPE_VND = 'vnd';

    /**
     * Set table name
     *
     * @var string
     */
    protected $table = 'tprogram';

    /**
     * Get all program is active of merchant
     *
     * @param $merchantID
     *
     * @return array
     */
    public function getProgram($merchantID)
    {
        $sql = "
        SELECT
				p.pgm_id, p.pgm_name, p.pgm_desc, p.PGM_DESC_CLOB, p.pgm_type,
				p.pur_rate, p.pur_unit_price, p.COM_DISPLAY, p.return_day, p.end_date,
				p.reward_yn, p.gen_type, p.cpa_yn,p.mobile_yn,
				prd.product_cnt
			FROM tprogram p,
				(
					SELECT pgm_id, COUNT(DISTINCT product_code) product_cnt
					FROM tproduct
					WHERE merchant_id = :merchantID
					GROUP BY pgm_id
				) prd
			WHERE merchant_id = :merchantID
				AND pgm_status = 'ACT'
				AND ap_approval = 'Y'
				AND p.hidden_yn = 'N'
				AND TO_CHAR(SYSDATE,'yyyymmdd') BETWEEN begin_date AND end_date
				and prd.pgm_id(+) = p.pgm_id
                and p.pgm_id = '0000'
			ORDER BY p.pgm_id
			";

        $result = \DB::select($sql, [':merchantID'=> $merchantID, ':merchantID'=> $merchantID]);
        // dump($result);
        return $result;
    }
}
