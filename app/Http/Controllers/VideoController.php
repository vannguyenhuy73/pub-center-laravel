<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
class VideoController extends Controller
{
    public function getIframeApi(Request $req)
    {
    	$data = (new Link())->getUrlVideo($req->id, $req->merchant);
    	
    	$result = '<iframe style="border:none" src="'.route('video').'?m='.$req->merchant.'&link_id='.$req->id.'&aff_id='.$req->aff_id.'&w='.$req->width.'&h='.$req->height.'" height="'.$req->height.'" width="'.$req->width.'"></iframe>';

    	return $result;
    }

    public function renderIframeYoutube(Request $req)
    {	
    	$data = (new Link())->getUrlVideo($req->link_id, $req->m);
    	$aff_id = $req->aff_id;
        $h = $req->h;
        $w = $req->w;

        if(count($data) == 0) {
            abort(404);
        }

    	return view('video.index', compact('data','aff_id','h','w'));
    }
}
