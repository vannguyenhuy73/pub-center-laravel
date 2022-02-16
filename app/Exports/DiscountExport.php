<?php

namespace App\Exports;

use App\Models\Discount;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class DiscountExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;


    private $merchantID;

    /**
     * @var
     */
    private $duration = null;

    /**
     * DiscountExport constructor.
     *
     * @param $merchantID
     * @param $start
     * @param $end
     */
    public function __construct($duration, $merchantID = null, $from_sd, $to_sd, $from_ed, $to_ed)
    {
        $this->merchantID = $merchantID;
        $this->duration = $duration;
        $this->from_sd = $from_sd;
        $this->to_sd = $to_sd;
        $this->from_ed = $from_ed;
        $this->to_ed = $to_ed;
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */

    public function collection()
    {
        $query = Discount::where('status', 1);
        if ($this->merchantID != null && $this->merchantID != 'all') {
            $query->whereIn('merchant_id', [ucfirst($this->merchantID), strtolower($this->merchantID)]);
        }

        if ($this->duration == 'expired') {
            $query->where('END_DATE', '<', date('Ymd'));
        }

        if (empty($this->duration) || $this->duration == 'active') {
            $query->where('END_DATE', '>=', date('Ymd'));
        }

        if($this->from_sd){
            $query->where('START_DATE','>=', str_replace('-','',$this->from_sd));
        }

        if($this->to_sd){
            $query->where('START_DATE','<=', str_replace('-','',$this->to_sd));
        }

        if($this->from_ed){
            $query->where('END_DATE','>=', str_replace('-','',$this->from_ed));
        }

        if($this->to_ed){
            $query->where('END_DATE','<=', str_replace('-','',$this->to_ed));
        }

        $result = $query->select('merchant_id', 'title', 'description', 'start_date', 'end_date', 'discount_code', 'origin_url')->get();

        $stt = 0;
        $data = [];
        foreach ($result as $k => $r) {
            $stt++;
            $data[$k]['stt'] = $stt;
            $data[$k]['merchant_id'] = $r->merchant_id;
            $data[$k]['title'] = $r->title;
            $data[$k]['description'] = $r->description;
            $data[$k]['start_date'] = date('d/m/Y', strtotime($r->start_date));
            $data[$k]['end_date'] = date('d/m/Y', strtotime($r->end_date));
            $data[$k]['discount_code'] = $r->discount_code;
            $data[$k]['origin_url'] = $r->origin_url;
            if($r->end_date >= date('Ymd')) {
                $data[$k]['status'] = 'Hoạt động';
            } else {
                $data[$k]['status'] = 'Hết hạn';
            }
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            '#',
            'NHÀ CUNG CẤP',
            'TIÊU ĐỀ',
            'MÔ TẢ',
            'BẮT ĐẦU',
            'KẾT THÚC',
            'MÃ GIẢM GIÁ',
            'ĐƯỜNG DẪN',
            'TRẠNG THÁI'
        ];
    }
}