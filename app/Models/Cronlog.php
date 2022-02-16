<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronlog extends Model
{
	// public $incrementing = false;
	protected $primaryKey = 'ID';
    protected $table = 'tmail_cron_log';
    public $timestamps = false;
	public $sequence = 'seq_add_incentive_id';
    protected $fillable = ['EMAIL', 'SUBJECT', 'READED','TYPE','created_at'];

}
