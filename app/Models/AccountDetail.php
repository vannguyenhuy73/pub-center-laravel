<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
	protected $table = 'TACCOUNT_DETAIL';
	protected $primaryKey = 'ACCOUNT_ID';
	public $incrementing = false;
	public const CREATED_AT = 'CREATE_TIME_STAMP';
	public const UPDATED_AT = null;
	protected $fillable = ['ACCOUNT_ID', 'ZALO_PHONE', 'FACEBOOK_PROFILE', 'METHOD_AFF', 'SOURCE_TRAFFIC', 'NAME_SOURCE', 'URL_SOURCE', 'DETAIL'];
}
