<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeActiveMail extends Model
{
    protected $table = 'tcode_active_mail';
	protected $fillable = ['email', 'code'];
	public $timestamps = false;	
	public $incrementing = false;
	protected $primaryKey = 'code';
}
