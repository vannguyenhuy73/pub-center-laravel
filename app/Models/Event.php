<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tevent';
    public $timestamps = false;
    protected $primaryKey = 'event_id';

    public function getList($type, $length)
    {
        $event = Event::query()
            ->orderBy('EVENT_ID', 'DESC')
            ->where('VALID_YN', 'Y')
            ->where('EVENT_TYPE','002')
            ->limit(4)
            ->get();

        return $event;
    }
}
