<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayRequest extends Model
{
    protected $table = 'tpayrequest';
    public $timestamps = false;
    public $incrementing = false;
}
