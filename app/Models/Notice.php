<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'tnotice';
    public $timestamps = false;
    protected $primaryKey = 'ARTICLE_ID';

    public function getNotice($start, $length)
    {
        $sql = "
            SELECT * from
        (
            SELECT
                ARTICLE_ID, TITLE, WRITER, NREAD, SEO_DESC,
                to_char(CREATE_TIME_STAMP, 'dd-mm-yyyy') WDATE, IMAGE,SUMMARY,
                case when sysdate - CREATE_TIME_STAMP < 7 then 'Y' else 'N' end is_new,
                ROW_NUMBER() OVER (ORDER BY EMP_YN desc, ARTICLE_ID desc) AS RNUM
            FROM TNOTICE
            WHERE DELETE_FLAG!='Y' and substr(SHOW_BOARD_YN, 0,1)='Y'
        )
        where RNUM  BETWEEN :starts AND :length
        ";

        return \DB::select($sql, [':starts' => $start, ':length' => $length]);
    }

    public function getNoticeShow($pg = 7)
    {
        $notice = Notice::where('DELETE_FLAG', '!=','Y')
            ->where('NTYPE','O')
            ->whereRaw("substr(SHOW_BOARD_YN,0,1) = 'Y'")
            ->orderBy('CREATE_TIME_STAMP', 'DESC')
            ->paginate(config('const.notice_data_limit'));
    
        return $notice;
    
    }

    public function getCount()
    {
        $query = $this::where('delete_flag', 'N')
                    ->whereRaw('substr(show_board_yn, 0, 1) = \'Y\'')
                    ->where('ntype', 'O')
                    ->count('article_id');
        return $query;
    }
}
