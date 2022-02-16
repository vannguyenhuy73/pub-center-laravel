<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportTraffic extends Model
{
    /**
     * set table name
     *
     * @var string
     */
    protected $table = 'tdreport_traffic_new';

    /**
     * get summary click of current user
     *
     * @param $affID
     * @param null $startDate
     * @param null $endDate
     * @return mixed
     */
    public function getClick($affID, $startDate = null, $endDate = null)
    {
        $query = $this->query()->whereIn('affiliate_id', $affID);

        if ($startDate) {
            $query = $query->where('yyyymmdd', '>=', $startDate);
        } else {
            $query = $query->where('yyyymmdd', '>=', date('Ym') . '01');
        }

        if ($endDate) {
            $query = $query->where('yyyymmdd', '>=', $endDate);
        } else {
            $query = $query->where('yyyymmdd', '>=', date('Ymd'));
        }

        return $query = $query->count('TOTAL_CLT');
    }

    /**
     * Get summary traffic of current user
     *
     * @param array $affID
     * @param null $startDate
     * @param null $endDate
     * @return mixed
     */
    function getSummaryTraffic(array $affID, $startDate = null, $endDate = null)
    {
        $query = $this->query()->selectRaw('yyyymmdd as period, sum(IMP) as impresion, sum(CLT) as unique_click, sum(TOTAL_CLT) as total_click, sum(MOBILE_CLT) as mobile_click')
            ->whereIn('affiliate_id', $affID)
            ->groupBy('yyyymmdd');

        if ($startDate) {
            $query = $query->where('yyyymmdd', '>=', $startDate);
        } else {
            $query = $query->where('yyyymmdd', '>=', date('Ym') . '01');
        }

        if ($endDate) {
            $query = $query->where('yyyymmdd', '<=', $endDate);
        } else {
            $query = $query->where('yyyymmdd', '<=', date('Ymd'));
        }

        return $query->get();
    }

}
