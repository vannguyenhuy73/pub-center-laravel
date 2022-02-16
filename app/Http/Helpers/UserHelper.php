<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 08/01/2019
 * Time: 16:49
 */

namespace App\Http\Helpers;


class UserHelper
{
    /**
     * check info of user
     *
     * @return bool
     */
    public static function checkInfo()
    {
        $user = auth()->user();

        if (empty($user->contact_name) || empty($user->contact_phone) || empty($user->contact_mail)) {
            return false;
        }

        return true;
    }
}