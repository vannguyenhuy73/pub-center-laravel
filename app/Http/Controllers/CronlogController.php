<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cronlog;

class CronlogController extends Controller
{
    public function index(Request $req)
    {
    	header('Content-Type: image/jpeg');
    	$flat = Cronlog::where('id', $req->id)
          	->update(['READED' => 'Y']);
        $newimage = ImageCreate(1,1);
		$grigio = ImageColorAllocate($newimage,255,255,255);
		ImageJPEG($newimage);
		ImageDestroy($newimage);
		// dd('adsda');
		// return 'đấ';
    }
}
