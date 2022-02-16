<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryLink;
use Auth;

class HistoryLinkController extends Controller
{
	public function getLinkByAuth($listLink = null)
	{
		$account = Auth::user()->account_id;
		$listLink = (new HistoryLink())::where('account_id', $account)
			->where('status','A')
			->orderBy('created_at','desc')->get();
		
		if(!empty($listLink)) {
			return view('history-link.index', compact('listLink'));
		}
		
		return redirect()->back()->with('error','Bạn chưa có link nào!');
    }
	
	public function insertLinkAjax(Request $request)
	{
		$this->validate($request, [
            'click' => 'required|url|max:3000',
            'short' => 'required|url|max:300',
            'root' => 'required|url|max:3000',
        ]);

		$check = HistoryLink::where('root_link', $request->root)
			->where('short_link', $request->short)->first();
		$account = Auth::user()->account_id;
		if($check === null) {
			$result = (new HistoryLink())->insertLink($request->root, $request->click, $request->short,$account);
			
			if($result) {
				return 'success';
			}
		}
		
		return 'error';
    }
}
