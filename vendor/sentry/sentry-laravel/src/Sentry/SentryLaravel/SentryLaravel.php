<?php

namespace Sentry\SentryLaravel;

class SentryLaravel
{
    const VERSION = '0.10.1';

    public static function getClient($user_config)
    {
        $config = array_merge(array(
            'sdk' => array(
                'name' => 'sentry-laravel',
                'version' => self::VERSION,
            ),
        ), $user_config);

        return new \Raven_Client($config);
    }
}
