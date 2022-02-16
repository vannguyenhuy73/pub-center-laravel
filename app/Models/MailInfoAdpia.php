<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MailInfoAdpia extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'mail_info_adpias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'account_id',
        'done',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['updated_at', 'created_at'];
}
