<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Models as Database;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->isNotEmpty();
    }

    public function isNotEmpty ()
    {
        Validator::extend('not_empty', function ($attribute, $value, $parameters, $validator) {
            if (empty($value)) {
                return false;
            }

            return true;
        });
    }
}
