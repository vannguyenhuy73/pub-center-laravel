<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteCategory extends Model
{
    protected $table = 'Tacategory_ref1';

    public static function getCategoryChild()
    {
        Return \DB::select('SELECT CATEGORY_CODE,CODE_NAME, UPPER_CODE FROM TACATEGORY_REF2');
    }
}
