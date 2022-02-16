<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewContent extends Model
{
    protected $table = 'tcontent_new';
    public $primaryKey = 'content_id';
    public $timestamps = false;
}
