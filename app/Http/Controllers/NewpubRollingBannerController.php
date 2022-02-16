<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Product;
use Auth;

class NewpubRollingBannerController extends Controller
{
    public function createBanner()
	{
		$data['cate'] = (new Link())->getCateMerchant();

		return view('newpub_tools.rollbanner', compact('data'));
    }
	
	public function getSize(Request $req)
	{
		$data['size'] = (new Link())->getSize($req);

		if (!isset($req->merchant)) {
			$data['merchant'] = (new Link())->getMerchant($req->cate);
		}
		return $data;
    }
	
	public function getBanner(Request $req)
	{
		if($req->size) {
			$size = explode('x', $req->size);
			$width = $size[0];
			$height = $size[1];
		} else {
			return response()->json(['status' => '500', 'message' => 'Đã có lỗi xảy ra. Xin vui lòng thử lại hoặc liên hệ với AM để biết thêm chi tiết!']);
		}
		$cate = $req->cate;
		$uid = $req->uid;
		$aff_id = Auth()->user()->last_contact_affiliate_id;
		$m_id = null;
		
		if(isset($req->m_id) && $req->m_id != "0") {
			$m_id = $req->m_id;
			$iframe = "<iframe style='border:none' src='https://smartlink.adpia.vn/adpia-banner.php?w=".$width."&h=".$height."&cate=".$cate."&m_id=".$m_id."&a=".$aff_id."&u_id=".$uid."' height='".$height."' width='".$width."'></iframe>";
		} else {
			$iframe = "<iframe style='border:none' src='https://smartlink.adpia.vn/adpia-banner.php?w=".$width."&h=".$height."&cate=".$cate."&a=".$aff_id."&u_id=".$uid."'height='".$height."' width='".$width."'></iframe>";
		}
		
		return $iframe;
    }

    public function createCarousel()
    {
    	$data['cate'] = (new Link())->getCateMerchant();
    	
    	return view('newpub_tools.carousel-smart', compact('data'));
    }

    public function getCarousel(Request $req)
	{
		if($req->size) {
			$size = explode('x', $req->size);
			$width = $size[0];
			$height = $size[1];
		} else {
			return response()->json(['status' => '500', 'message' => 'Đã có lỗi xảy ra. Xin vui lòng thử lại hoặc liên hệ với AM để biết thêm chi tiết!']);
		}
		$cate = $req->cate;
		$u_id = $req->u_id;
		$a_id = Auth()->user()->last_contact_affiliate_id;
		$m_id = null;
		
		if(isset($req->m_id) && $req->m_id != "0") {
			$m_id = $req->m_id;
			$iframe = "<iframe style='border:none; max-width: 100%;' src='https://smartlink.adpia.vn/adpia-ads.php?width=".$width."&height=".$height."&cate=".$cate."&m_id=".$m_id."&a_id=".$a_id."&u_id=".$u_id."' height='".$height."' width='".$width."'></iframe>";
		}else {
			$iframe = "<iframe style='border:none; max-width: 100%;' src='https://smartlink.adpia.vn/adpia-ads.php?width=".$width."&height=".$height."&cate=".$cate."&a_id=".$a_id."&u_id=".$u_id."' height='".$height."' width='".$width."'></iframe>";
		}

		$iframe.= "<script>window.addEventListener('load', function (event) { if(document.getElementsByTagName('iframe')[0].offsetWidth < document.getElementsByTagName('iframe')[0].width) { document.getElementsByTagName('iframe')[0].style.height = (document.getElementsByTagName('iframe')[0].height * document.getElementsByTagName('iframe')[0].offsetWidth / document.getElementsByTagName('iframe')[0].width) + 'px' } })</script>";
		
		return $iframe;
    }

    public function bannerProduct()
    {
    	$category =(new Product())->getCateProduct();
    	
    	return view('banner-product.create-link', compact('category'));
    }
}
