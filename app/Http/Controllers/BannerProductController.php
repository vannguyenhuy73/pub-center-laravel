<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;

class BannerProductController extends Controller
{
    public function getProductRandom(Request $request, $aff_id = null, $cate = 'DT')
    {
    	$data = (new Product())->getProductRandom($cate, $request->count);
    	$url = $request->url;
    	$count = $request->count;

    	return view('banner-product.index', compact('data','aff_id', 'url', 'count'));
    }

}
