<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserConfirm extends Model
{
    protected $table = 'taccount_confirm';

    protected $primaryKey = 'account_id';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['account_id', 'key'];
}
