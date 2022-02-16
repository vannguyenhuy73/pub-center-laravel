<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    /**
     * Set table name
     *
     * @var string
     */
    protected $table = 'TAFF_MANAGER_STAFF';

     public function getManager($city)
    {
		$randNum = rand(0,9);
		$southern_provinces = ["Đà Nẵng", "Quảng Nam", "Quảng Ngãi", "Kon Tum", "Bình Định", "Gia Lai", "Phú Yên", "Đắk Lắk", "Khánh Hòa", "Đắk Nông", "Lâm Đồng", "Ninh Thuận", "Bình Định", "Đồng Nai", "Bình Phước", "Tây Ninh", "Hồ Chí Minh", "Bình Dương", "Bà Rịa - Vũng Tàu", "Long An", "Đồng Tháp", "Tiền Giang", "Bến Tre", "Vĩnh Long", "Trà Vinh", "Sóc Trăng", "Hậu Giang", "An Giang", "Kiên Giang", "Cần Thơ", "Bạc Liêu", "Cà Mau"];
		
		if(in_array($city, $southern_provinces)) {
			$managers = $this->newQuery()
            ->where('status', 'A')
            ->where('manager', '!=', 'sonlethanh')
			->where('zone_id', '=', 2)
			->where('mng_active', '=', 'Y')
            ->get(['manager']);
		} else {
			$managers = $this->newQuery()
            ->where('status', 'A')
            ->where('manager', '!=', 'sonlethanh')
			->where('zone_id', '=', 1)
			->where('mng_active', '=', 'Y')
            ->get(['manager']);
		}
		
		if (!$managers) {
			return '';
		}

        $managers = $managers->toArray();

        return $managers[array_rand($managers)]['manager'];

    }
}
