<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 20/11/2018
 * Time: 10:49
 */

namespace App\Http\Helpers;

class Apicryption
{
    const METHOD = 'aes-256-ctr';

    /**
     * Encrypts (but does not authenticate) a message
     *
     * @param $message - plaintext
     * @param $key - salt
     * @return mixed
     * @throws ErrorException
     */
    public static function encrypt($message, $key)
    {
        if (!is_string($message)) {
            throw new ErrorException("Message must be String");
        }

        $hash = base64_encode($message . $key);

        return str_replace("==", "", $hash);
    }

    /**
     * Decrypts (but does not verify) a message
     *
     * @param $message - message
     * @param $key - key salt
     * @return mixed
     * @throws Exception
     */
    public static function decrypt($message, $key)
    {
        $message = base64_decode($message . "==", true);

        if ($message === false) {
            return '';
        }

        return str_replace($key, "", $message);
    }
}