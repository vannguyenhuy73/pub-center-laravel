<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryLink extends Model
{
	protected $table = 'TLINK_HISTORY';
	protected $primaryKey = 'ID';
	protected $fillable = ['ID', 'ACCOUNT_ID','ROOT_LINK', 'LINK_CLICK', 'SHORT_LINK', 'YYYYMMDD', 'STATUS'];
	
	public function insertLink($root, $click, $short, $account)
	{
		$date =  date('Ymd');
		$sql = "insert into TLINK_HISTORY (ID, ROOT_LINK, LINK_CLICK, SHORT_LINK, YYYYMMDD, STATUS,ACCOUNT_ID)values (SEQ_EVENT_ID.nextval, '$root', '$click','$short', '$date', 'A','$account')";

		return \DB::statement($sql);
		
	}
}
