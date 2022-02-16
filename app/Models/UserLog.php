<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'tuserlog';
    protected $primaryKey = 'userlog_id';
    public $sequence = 'SEQ_USERLOG_ID';
    public $timestamps = false;
    protected $fillable = [
        'ACCOUNT_TYPE',
        'ACCOUNT_ID',
        'LOG_CODE',
        'log_param',
        'log_desc',
        'source_url',
        'remote_addr',
        'create_time_stamp',
        'yyyymmdd',
    ];
}
