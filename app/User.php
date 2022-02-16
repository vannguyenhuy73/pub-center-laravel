<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'account_id';
    protected $table = 'taccount';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'contact_name',
        'contact_mail',
        'contact_phone',
        'password',
        'site_class',
        'account_status',
        'NATIONALITY',
        'EMAIL_RECEPTION_STATUS',
        'BILL_READY_FLAG',
        'SUSPENDED_FLAG',
        'TAX_FREE_FLAG',
        'SECEDE_YN',
        'SMS_YN',
        'REFER_AFFILIATE_ID',
        'JOIN_FROM',
        'CONTACT_MAIL_CONFIRM',
        'REGISTERED_DATE',
        'FIRST_ORDER',
        'contact_address2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}