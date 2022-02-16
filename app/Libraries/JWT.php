<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 03/04/2019
 * Time: 13:48
 */

namespace App\Libraries;


class JWT
{
    private static $key;

    /**
     * JWT constructor.
     *
     * @param $key
     */
    public function __construct()
    {
        static::$key = env('ADPIA_SIGNATURE', 'taivt');
    }

    /**
     * generate token
     *
     * @param array $value
     *
     * @return string
     */
    public function generateToken(array $value): string
    {
        return \Firebase\JWT\JWT::encode($value, static::$key);
    }

    /**
     * decode token
     *
     * @param string $hashcode
     *
     * @return \stdClass
     */
    public function decodeJWT(string $hashcode): \stdClass
    {
        return \Firebase\JWT\JWT::decode($hashcode, static::$key, ['HS256']);
    }

}