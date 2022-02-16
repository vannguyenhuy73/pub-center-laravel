<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountDomain extends Model
{
    protected $table = 'TACCOUNT_DOMAIN';
    protected $primaryKey = 'DOMAIN';
    public $incrementing = false;

    public const CREATED_AT = 'CREATE_TIME_STAMP';
    public const UPDATED_AT = null;

    protected $fillable = ['DOMAIN', 'ACCOUNT_ID', 'TYPE', 'ALIAS_DOMAIN', 'STATUS', 'CREATE_TIME_STAMP', 'IS_SSL','NAME','URL'];
}