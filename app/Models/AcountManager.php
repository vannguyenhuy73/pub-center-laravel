<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcountManager extends Model
{
    protected $table = 'TAFF_MANAGE';
    protected $primaryKey = 'ACCOUNT_ID';
    public $incrementing = false;

    public const CREATED_AT = 'CREATE_TIME_STAMP';
    public const UPDATED_AT = null;

    protected $fillable = ['ACCOUNT_ID', 'MANAGER', 'READED', 'CREATE_TIME_STAMP'];

}
