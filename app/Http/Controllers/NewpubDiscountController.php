<?php

namespace App\Http\Controllers;

use App\Exports\DiscountExport;
use App\Models\Discount;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Minishop;
use App\Http\Helpers\Helper;
use App\Models\Subscribe;
use Cache;
use Aws\Laravel\AwsFacade as AWS;

class NewpubDiscountController extends Controller
{
	public function index(Request $request)
	{
		$merchantID = $request->get('merchant_id');
		$duration = $request->get('duration');
		$from_sd = $request->get('from_sd');
		$to_sd = $request->get('to_sd');
		$from_ed = $request->get('from_ed');
		$to_ed = $request->get('to_ed');

		$query = Discount::query()
		->where('status', config('const.discount_code.status.active'));

		if ($merchantID && $merchantID != 'all') {
			$query->whereIn('merchant_id', [ucfirst($merchantID), strtolower($merchantID)]);
		}

		if ($duration && $duration == 'expired') {
			$query->where('END_DATE', '<', date('Ymd'));
		}

		if (!$duration || $duration == 'active') {
			$query->where('END_DATE', '>=', date('Ymd'));
			$duration = 'active';
		}

		if($from_sd){
			$query->where('START_DATE','>=', str_replace('-','',$from_sd));
		}

		if($to_sd){
			$query->where('START_DATE','<=', str_replace('-','',$to_sd));
		}

		if($from_ed){
			$query->where('END_DATE','>=', str_replace('-','',$from_ed));
		}

		if($to_ed){
			$query->where('END_DATE','<=', str_replace('-','',$to_ed));
		}

		$query->orderBy('START_DATE','DESC')->orderBy('END_DATE', 'DESC');
		$discounts = $query->paginate(30)->appends(request()->except('page'));
		$merchants = (new Merchant())->getListMerchantValid();
		$merchantLogo = Discount::getDiscountMerchantBanner();

		$affiliate_id = Auth()->user()->last_contact_affiliate_id;
		$aprMerchants = Minishop::getDiscountAprMerchant($affiliate_id);
		$apr_merchant_str = '';

		foreach ($aprMerchants as $m) {
			if($m->approval_type == config('const.minishop.approval_type.auto') || $m->subs_status == config('const.minishop.subs_status.approval')) {
				$apr_merchant_str .= $m->merchant_id.",";
			}

			$this->subscibe($m->merchant_id, $m->approval_type);
		}

		foreach ($merchantLogo as $l) {
			$apr_merchant_str .= $l->merchant_id.",";
			$this->subscibe($l->merchant_id, $l->approval_type);
		}

		return view('newpub_discount.index', compact('discounts', 'merchants', 'duration', 'merchantID','from_sd','to_sd','from_ed','to_ed', 'merchantLogo', 'apr_merchant_str'));
	}

	public function download(Request $request)
	{
		$merchantID = $request->get('merchant_id');
		$duration = $request->get('duration');
		$from_sd = $request->get('from_sd');
		$to_sd = $request->get('to_sd');
		$from_ed = $request->get('from_ed');
		$to_ed = $request->get('to_ed');

		return Excel::download(new DiscountExport($duration, $merchantID, $from_sd, $to_sd, $from_ed, $to_ed), 'ma-giam-gia.xlsx');
	}

	private function convertDate($date)
	{
		return str_replace('-', '', $date);
	}

	function getDiscountCodesShopeeOrigin()
	{
		$url = config('const.discount_code.shopee_api');

		$discount_codes_origin = $this->getDiscountCodeOrigin($url);

		return response()->json(['status' => 200, 'res' => $discount_codes_origin], 200);
	}

	function getDiscountCodesMultiOrigin()
	{	
		$url = config('const.discount_code.multi_api');

		$discount_codes_origin = $this->getDiscountCodeOrigin($url);

		return response()->json(['status' => 200, 'res' => $discount_codes_origin], 200);
	}

	function getDiscountCodeOrigin($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$discount_codes_origin = curl_exec($ch);
		curl_close($ch);
		return $discount_codes_origin;
	}
	
	function getPromoCodeFromRedis() {
		$promoCode = Cache::get('adpia_promo_code');
		$promoCodeExpires = Cache::get('adpia_promo_code_expires');
		if(!$promoCodeExpires) {
			$data = array('promoCode' => json_decode($promoCode, TRUE), 'expires' => 'true');
			return $data;
		}
		return array('promoCode' => json_decode($promoCode, TRUE));
	}
	
	function setPromoCodeToRedis(Request $request) {
		$discount_codes_data = $request->get('discount_codes_data');
		$discount_code_merchant_tab = $request->get('discount_code_merchant_tab');
		$redis_data = array(
			'discount_codes_data' => $discount_codes_data,
			'discount_code_merchant_tab' => $discount_code_merchant_tab
		);
		Cache::add('adpia_promo_code_expires', json_encode($redis_data), 1);
		Cache::forget('adpia_promo_code');
		Cache::forever('adpia_promo_code', json_encode($redis_data));
		
		$s3 = AWS::createClient('s3');
        $upload = $s3->putObject([
            'Bucket'     => env('AWS_BUCKET'),
            'Key'        => "affiliate_document/multi/adpia_promo_code_api.txt",
            'Body'       => $discount_codes_data
        ]);
        htmlspecialchars($upload->get('ObjectURL'));
	}
	
	function removePromoCodeFromRedis() {
		Cache::forget('adpia_promo_code_expires');
		Cache::forget('adpia_promo_code');
	}

	private function subscibe($merchantID, $merchantType)
    {
        $currentAff = Helper::getCurrentAff();

        $subFlag = Subscribe::query()
            ->where(['merchant_id' => $merchantID, 'affiliate_id' => $currentAff])
            ->first(['subs_status']);

        if (!$subFlag && $merchantType == 'AUT') {
            $subscribe = new Subscribe();
            $subscribe->affiliate_id = $currentAff;
            $subscribe->merchant_id = $merchantID;
            $subscribe->subs_status = 'APR';
            $subscribe->status_apply_time_stamp = date('Y-m-d h:i:s');
            $subscribe->status_update_time_stamp = date('Y-m-d h:i:s');
            $subscribe->create_time_stamp = date('Y-m-d h:i:s');
            $subscribe->save();

            return true;
        }

        return false;
    }

    function convertToXML($data, $xml = false) {
    	
    	if ( $xml === false ) {
	    	$xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root/>');
	    	$xml->addChild('total', count($data));
	    }

    	foreach($data as $key => $value){
	        if(is_array($value)){
	        	if(is_numeric($key)) {
	        		$key = "mgg";
	        	}
	            $this->convertToXML($value, $xml->addChild($key));
	        } else {
	            $xml->addChild($key, htmlspecialchars($value));
	        }
	    }

	    return $xml->asXML();
    }

    function exportXML(Request $request) {
    	header('Content-type:text/xml');

    	$data = $request->get('data');

    	$xml = $this->convertToXML($data, false);

    	$xml = str_replace('</total>', '</total><data>', $xml);

    	$xml = str_replace('</root>', '</data></root>', $xml);

    	$dom = new \DOMDocument();

		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;

		$dom->loadXML($xml);
		$out = $dom->saveXML();

    	return response()->json(['status' => 200, 'res' => $out], 200);
    }
}