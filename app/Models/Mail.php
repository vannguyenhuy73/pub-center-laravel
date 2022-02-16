<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Mail extends Model
{
//    const CREATED_AT = 'CREATE_TIME_STAMP';
    protected $table = 'tmail_header';
    protected $primaryKey = 'mail_id';
    public $sequence = 'SEQ_MAIL_ID';

    public $timestamps = false;

    /**
     *
     * @param $accountID
     * @return mixed
     */
    public function getInboxMailCount($accountID)
    {
        $tmp = \DB::select(\DB::raw("
        SELECT
			(
				SELECT count(*)
				FROM tmail_header
				WHERE (receit_type = 'ACC' or receit_type = 'ACO' or receit_type = 'SPO')
					AND receit_id = :account_id
					AND receit_delete_flag = 'N'
					AND HOLD_YN = 'N'
			) +
			(
				SELECT count(*)
				FROM tmail_header
				WHERE receit_type = 'AFF'
					AND receit_delete_flag = 'N'
					AND receit_id IN
				(
					SELECT affiliate_id
					FROM taffiliate
					WHERE account_id = :account_id
						AND delete_flag = 'N'
					    AND HOLD_YN = 'N'
				)
			) total
			FROM dual
			"), array('account_id' => $accountID));

        return @$tmp[0]->total;
    }

    /**
     * @param $accountID
     * @return mixed
     */
    public function getDrapCount($accountID)
    {
        $tmp = \DB::select(\DB::raw("
        SELECT
			(
				SELECT count(*)
				FROM tmail_header
				WHERE (receit_type = 'ACC' or receit_type = 'ACO' or receit_type = 'SPO')
					AND receit_id = :account_id
					AND receit_delete_flag = 'N'
			) +
			(
				SELECT count(*)
				FROM tmail_header
				WHERE receit_type = 'AFF'
					AND receit_delete_flag = 'N'
					AND receit_id IN
				(
					SELECT affiliate_id
					FROM taffiliate
					WHERE account_id = :account_id
						AND delete_flag = 'N'
				)
			) total
			FROM dual
			"), array('account_id' => $accountID));

        return @$tmp[0]->total;
    }

    public function getInboxMail(string $accID, array $affID)
    {
        array_push($affID, $accID);

        $inboxMail =  $this->whereIn('receit_id', $affID)
            ->where('receit_delete_flag', 'N')
            ->where('hold_yn', 'N')
            ->where('receit_delete_flag', 'N')
            ->orderBy('mail_id', 'DESC')
            ->paginate(7);
            
        return $inboxMail;
    }

    public function getSentMail(string $accID, array $affID)
    {
        array_push($affID, $accID);

        $key = 'sent_mail_'.$accID;
        $sentMail = Cache::get($key);
        if(!$sentMail) {
            $sentMail =  $this->whereIn('sender_id', $affID)
            ->where('receit_delete_flag', 'N')
            ->where('hold_yn', 'N')
            ->where('sender_delete_flag', 'N')
            ->orderBy('mail_id', 'DESC')
            ->paginate(20);
            if($sentMail) {
                Cache::put($key, $sentMail, 24*60);
            }
        }
        return $sentMail;
    }

    public function getSaveMail(string $accID, array $affID)
    {
        array_push($affID, $accID);

        $key = 'save_mail_'.$accID;
        $saveMail = Cache::get($key);
        if(!$saveMail) {
            $saveMail = $this->whereIn('receit_id', $affID)
            ->where('receit_delete_flag', 'N')
            ->where('hold_yn', 'Y')
            ->where('receit_delete_flag', 'N')
            ->orderBy('mail_id', 'DESC')
            ->paginate(20);
            if($saveMail) {
                Cache::put($key, $saveMail, 24*60);
            }
        }
        return $saveMail;
    }

    static function getNofityMailContentById($id) {
        return \DB::connection('mysql')->table('report_mails')
        ->selectRaw('sent_at as send_date, title_mail as title, sender_mail as senderName, content_mail as content')
        ->where('id', '=', $id)
        ->first();
    }
}
