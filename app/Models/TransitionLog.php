<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransitionLog extends Model
{
    protected $table = 'ttranslog';
    public $timestamps = false;

    /**
     * Lấy ra số lượng order
     *
     * @param array $affID
     * @param null $startDate
     * @param null $endDate
     * @return mixed
     */
    public function getOders(array $affID, $startDate = null, $endDate = null)
    {
        $query = $this->selectRaw('count((ORDER_CODE)) as total')
            ->where('DELETE_YN', 'N')
            ->whereIn('affiliate_id', $affID);

        if ($startDate) {
            $query = $query->where('YYYYMMDD', '>=', $startDate);
        } else {
            $query = $query->where('YYYYMMDD', '>=', date('Ym') . '01');
        }

        if ($endDate) {
            $query = $query->where('YYYYMMDD', '<=', $endDate);
        } else {
            $query = $query->where('YYYYMMDD', '<=', date('Ymd'));
        }

        return $query->first()->total;

    }

}
