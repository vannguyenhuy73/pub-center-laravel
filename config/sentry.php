<?php

$config = array(
    'dsn' => env('SENTRY_LARAVEL_DSN'),

    // capture release as git sha
    // 'release' => trim(exec('git log --pretty="%h" -n1 HEAD')),

    // Capture bindings on SQL queries
    'breadcrumbs.sql_bindings' => true,

    // Capture default user context
    'user_context' => true,
    'timeout' => 4,
);

if (env('APP_ENV') == 'local') {
    $config['dsn'] = '';
}

return $config;
