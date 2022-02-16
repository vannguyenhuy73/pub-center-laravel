<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'tcode';

    /**
     * Get Code Name
     *
     * @param $code
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|null|object
     */
    public function getCodeName($code)
    {
        return $this::query()->where('code', $code)->first(['code_name_vnm']);
    }
}
