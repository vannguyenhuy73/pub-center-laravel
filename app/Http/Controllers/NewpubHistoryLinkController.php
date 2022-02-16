<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryLink;
use Auth;

class NewpubHistoryLinkController extends Controller
{
    public function getLinkByAuth($listLink = null)
	{
		$account = Auth::user()->account_id;
		$listLink = (new HistoryLink())::where('account_id', $account)
			->where('status','A')
			->orderBy('created_at','desc')->get();
		
		if(!empty($listLink)) {
			return view('history-link.newpub_index', compact('listLink'));
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

    public function getMultiparLink(Request $request)
	{
		$account = Auth::user()->account_id;
		$page = $request->page;
		$date = $request->date;
		$limit = 25;
		$offset = ($page - 1) * $limit;

		$listLink = (new HistoryLink())::where('account_id', $account)
			->where('status','A');

		if($date) {
			$listLink = $listLink->where('yyyymmdd', $date);
		}

		$listLink = $listLink->orderBy('id','desc')
			->skip($offset)
			->take($limit)
			->get();
		
		if(!empty($listLink)) {
			return json_encode(array('status' => 200, 'data' => json_encode($listLink)));
		}
		
		return json_encode(array('status' => 404, 'data' => 'data null'));
    }

    public function insertMultiLink(Request $request) {
    	$account = Auth::user()->account_id;
		$arrPost = $request->arrPost;

		foreach ($arrPost as $key => $value) {
			$result = (new HistoryLink())->insertLink($value["root_link"], $value["link_click"], $value["short_link"], $account);

			if(!$result) {
				return 'error';
			}
		}

		return 'success';
    }
}
