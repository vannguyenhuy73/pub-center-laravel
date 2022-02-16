<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterLog extends Model
{
   	protected $table = 'tregister_log';
   	protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = ['ACCOUNT_ID', 'EMAIL', 'PHONE', 'ZALO_PHONE', 'LINK_PROFILE', 'STEP', 'FULL_NAME'];
}
