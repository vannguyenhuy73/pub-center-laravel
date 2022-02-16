<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 29/08/2018
 * Time: 09:10
 */

namespace App\Http\Helpers;


use App\Models\Mail;
use Illuminate\Support\Facades\Cache;
class MailHelper
{
    /**
     * get unread Mail
     *
     * @param $affID
     * @return mixed
     */
    public static function getUnreadMail($affID)
    {
        $key = 'totalUnreadMail'.$affID;
        $total = Cache::get($key);
        if(!$total)
        {

            $tmp = \DB::select(\DB::raw("
                SELECT
                (
                SELECT count(*)
                FROM tmail_header
                WHERE (receit_type = 'ACC' or receit_type = 'ACO' or receit_type = 'SPO')
                AND receit_id = :affiliate_id
                AND read_date IS NULL
                AND receit_delete_flag = 'N'
                ) +
                (
                SELECT count(*)
                FROM tmail_header
                WHERE receit_type = 'AFF'
                AND read_date IS NULL
                AND receit_delete_flag = 'N'
                AND receit_id IN
                (
                SELECT affiliate_id
                FROM taffiliate
                WHERE account_id = :affiliate_id
                AND delete_flag = 'N'
                )
                ) total
                FROM dual
                "), array('affiliate_id' => $affID));
            $total = @$tmp[0]->total;
            Cache::put($key, $total, 20);
            if($total > 99) {
                $total = 99;
            } 
        }

        if($total > 99) {
            $total = 99;
        }
        return $total;
    }

    /**
     * Get last id of content table
     *
     * @return mixed
     */
    public static function getContentID()
    {
        $result = \DB::select("SELECT seq_content_id.NEXTVAL as first_id FROM DUAL");

        return @$result[0]->first_id;
    }

    /**
     * Insert mail
     *
     * @param $senderID
     * @param $receitID
     * @param $sender_type
     * @param $receit_type
     * @param $subject
     * @param $contentID
     * @param string $deletable_flag
     * @param string $email_flag
     * @param string $referer_flag
     * @return bool|mixed
     */
    public static function insert($senderID, $receitID, $sender_type, $receit_type, $subject, $contentID, $deletable_flag = 'N', $email_flag = 'Y', $referer_flag = 'N')
    {
//        validate

        if (!in_array($sender_type, ['AFF','ACC', 'ACO', 'SPO', 'MER', 'APA' , 'APB', 'APM', 'APW', 'APS'])) {
            return false;
        }

        if (!in_array($receit_type, ['AFF','ACC', 'ACO', 'SPO', 'MER', 'APA' , 'APB', 'APM', 'APW', 'APS'])) {
            return false;
        }

        //insert data to mail table
        $mail = new Mail();
        $mail->sender_id = $senderID;
        $mail->receit_id = $receitID;
        $mail->sender_type = $sender_type;
        $mail->receit_type = $receit_type;
        $mail->title = htmlspecialchars($subject);
        $mail->content_id = $contentID;
        $mail->deletable_flag = $deletable_flag;
        $mail->email_flag = $email_flag;
        $mail->referer_flag = $referer_flag;
        $mail->send_date = date('Y-m-d h:i:s');

        if ($mail->save()) {
            return $mail->mail_id;
        }

        return false;
    }
}