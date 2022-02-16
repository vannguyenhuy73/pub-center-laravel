<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BonusMerchant extends Model 
{
	protected $table = 'TBONUS_MERCHANT';
	protected $primaryKey = 'ID';

	static function getPubBonusAmountTotal()
	{
		$acc_id = auth()->user()->account_id;
		return \DB::table('TBONUS')
		->select('AMOUNT')
		->where('ACCOUNT_ID', '=', $acc_id)
		->where('STATUS', '=', config('const.report.pub_bonus.status.finish'))
		->get();
	}
}