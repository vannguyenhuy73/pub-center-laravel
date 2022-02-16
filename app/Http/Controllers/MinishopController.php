<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateMinishop;
use App\Models\Minishop;
use Auth;

class MinishopController extends Controller
{
    public function index()
    {
        $cate = CateMinishop::select('cate','cate_name')
	        ->get();
        
    	return view('minishop.index', compact('cate'));
    }
	
	public function addInfor(Request $request)
	{
		$site_name = explode('https://', $request->site);
		$site_name = !empty($site_name[1])?$site_name[1]:$site_name[0];
		$aff_id = Auth()->user()->last_contact_affiliate_id;
		$date = date('Ymd');
		$start = date("d/m/y");
		
		$result = (new Minishop())->insertMinishop($request, $aff_id, $site_name, $start, $date);
		
		if($result) {
			return redirect()->bacK()->with('success', 'Đã gửi thành công!');
		} else {
			return redirect()->bacK()->with('error', 'Có lỗi xảy ra!');
		}
    }
}
