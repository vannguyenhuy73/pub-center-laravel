<?php
namespace App\Http\Controllers;

use App\Models\Help;
use App\Models\Content;

class GuideController extends Controller
{
	public function index()
	{
		$id ='AC_GUIDE_A001';
		$listGuide = (new Help())->getAllGuide();
		$data = (new Help())->getHelpById($id);
		$content = (new Content)->getContentById($data['content_id']);

		return view('guide.index',compact('data', 'content', 'listGuide'));
	}

	public function getContentApi($id)
	{
		$data = (new Content())->getContentById($id);
		
		if($data != null) {
			return $data;
		}
		else {
			abort(404); 
		}
	}
}