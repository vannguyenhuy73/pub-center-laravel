<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountNotExist extends Model
{
    protected $table = 'taccount_not_exist';
	protected $fillable = ['account_id', 'email'];
	public $timestamps = false;	
	public $incrementing = false;
	protected $primaryKey = 'account_id';
}
