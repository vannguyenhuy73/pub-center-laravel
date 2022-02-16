<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewpubNoticeController extends Controller
{
	public function index()
	{
        /*  
        *$boards = Notice::query()->where([
        *   'NOTICE_YN' => 'Y',
        *   'ACCOUNT_ID' => 'adpia',
        *   ['MERCHANT_ID', '!=', '_deleted_']
        *])->orderBy('ARTICLE_ID', 'DESC')->paginate(12, ['article_id', 'image', 'summary', 'title']);
        */ 

        return view('board.index', compact('boards'));
    }

    /**
     *  Show detail notice
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
    	$notice = Notice::query()->findOrFail($id);

    	if ($notice->content_id == null){
    		abort(404);
    	}

    	$otherNotices = Notice::query()->whereKeyNot($id)->limit(10)->orderBy('ARTICLE_ID', 'DESC')->get();

    	$notice->content = $this->readContent($notice->content_id);

    	return view('notice.detail', compact('otherNotices', 'notice'));
    }

    /**
     * recursive content of notice
     *
     * @param $contentID
     * @return mixed|string
     */
    private function readContent($contentID)
    {
    	$content = Content::query()->find($contentID);
    	$contentData = $content->content;

    	if ($content->next) {
    		$contentData .= $this->readContent($content->next);
    	}

    	return $contentData;
    }

    public function getNoticeAjax(Request $request)
    {
        $writer = config('const.notify.sender_name');
        $notice_key = 'notify_publisher';
        $notify_publishers = Cache::get($notice_key);

        $data = array();

        if(!empty($notify_publishers)) {

            $data['data'] = $notify_publishers;

            foreach ($data['data'] as $key => $notice) {
                $data['data'][$key]['writer'] = $writer;
            }
        }
        
        return response()->json(['status' => 200, 'data' => $data]);
    }
}
