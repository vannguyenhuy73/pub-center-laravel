<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * Set table name
     *
     * @var string
     */
    protected $table = 'TADMIN_USER';

    /**
     * set primary column
     *
     * @var string
     */
    protected $primaryKey = 'MEMBER';

    /**
     * set incrementing column
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * disable auto fill timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get random account manager in the database
     *
     * @return string
     */
    public function getManager()
    {
        $managers =  $this->newQuery()
            ->where('GROUP_ID', 'affiliate')
            ->where('active', 1)
            ->get(['member']);

        if (!$managers) {
            return '';
        }

        $managers = $managers->toArray();

        return $managers[array_rand($managers)]['member'];

    }
}
