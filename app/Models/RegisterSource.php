<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterSource extends Model
{
	protected $table = 'TRESGISTER_SOURCE';
	protected $fillable = ['ACCOUNT_ID','UTM_MEDIUM', 'UTM_SOURCE', 'UTM_CAMPAIGN', ' UTM_TERM', 'UTM_CONTENT'];

}
