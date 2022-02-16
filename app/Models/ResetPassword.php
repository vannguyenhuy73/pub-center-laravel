<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'tpassword_reset';

    protected $primaryKey = 'account_id';

    public $timestamps = true;

    public $incrementing = false;

    protected $fillable = ['account_id', 'token'];
}
