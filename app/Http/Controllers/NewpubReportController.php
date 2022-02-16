<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Affiliate;
use App\Models\Merchant;
use App\Models\OfferCategory;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewpubReportController extends Controller
{
    /**
     * show view performance report
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = OfferCategory::query()->get(['category_code', 'code_name']);
        $listMerchant = (new Merchant())->getListMerchantValid();

        $affiliateIds = Helper::getAllAffiliateID();
        $affiliates = Affiliate::whereIn('affiliate_id', $affiliateIds)->pluck('site_name', 'affiliate_id')->all();

        return view('newpub_report.performace', compact( 'categories', 'listMerchant', 'affiliates'));
    }

    /**
     * get result return to view
     *
     * @param Request $resquest
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConversion(Request $resquest)
    {
        $start = $resquest->get('start');
        $end = $resquest->get('end');

        if (!$start) {
            $start = date('Ymd', time() - 2592000);
        }

        if (!$end) {
            $end = date('Ymd');
        }

        $affID = Helper::getAllAffiliateID();

        $offerType = $resquest->get('offer_type', null);
        $conversionStatus = $resquest->get('conversion-status', null);
        $merchant_id = $resquest->get('merchant_id', null);
        $affiliate_id = $resquest->get('affiliate_id', null);
        $strSearch = $resquest->get('strSearch');

        $param = [];
        $param['accountID'] = auth()->id();
        $param['start'] = $start;
        $param['end'] = $end;
        $param['offerType'] = $offerType;
        $param['conversionStatus'] = $conversionStatus;
        $param['strSearch'] = strtolower($strSearch);
        $param['merchant_id'] = $merchant_id;
        $param['affiliate_id'] = $affiliate_id;
        $param['affID'] = $affID;

        $conversions = (new Report())->getPerformance($param);

        return response()->json(['status' => 200, 'data' => $conversions]);
    }

    /**
     * Show detail report (report conversions)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail()
    {
        $affiliateIds = Helper::getAllAffiliateID();
        $affiliates = Affiliate::whereIn('affiliate_id', $affiliateIds)->pluck('site_name', 'affiliate_id')->all();
        $categories = OfferCategory::query()->get(['category_code', 'code_name']);
        $listMerchant = (new Merchant())->getListMerchantValid();

        return view('report.detail', compact( 'categories', 'listMerchant', 'affiliates'));
    }

    /**
     * get result return to view
     *
     * @param Request $resquest
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $resquest)
    {
        $start = $resquest->get('start');
        $end = $resquest->get('end');
        $page = $resquest->get('page');
        $limit = $resquest->get('limit');
        $limitMaxValue = config('const.report.detail_records_limit');

        if($limit > $limitMaxValue) {
            $limit = $limitMaxValue;
        }

        if ($page < 1) {
            $page = 1;
        }

        $offset = 0;
        if($page > 1) {
            $offset = (($page -1) * $limit) + 1;
        }

        if (!$start) {
            $start = date('Ymd', time() - 2592000);
        }

        if (!$end) {
            $end = date('Ymd');
        }

        $offerType = $resquest->get('offer_type', null);
        $offerID = $resquest->get('offer_id', null);
        $sub_id = $resquest->get('branch', null);
        $affiliateId = $resquest->get('affiliate_id', null);
        $offerType = strtoupper($offerType);
        $conversionStatus = $resquest->get('conversion-status', null);
        $affID = Helper::getAllAffiliateID();

        $param = [];
        $param['accountID'] = auth()->id();
        $param['start'] = $start;
        $param['end'] = $end;
        $param['offerType'] = $offerType;
        $param['offerID'] = $offerID;
        $param['conversionStatus'] = $conversionStatus;
        $param['offset'] = $offset;
        $param['sub_id'] = $sub_id;
        $param['affiliateId'] = $affiliateId;
        $param['affID'] = $affID;
        $param['limit'] = $limit;

        $conversions['data'] = Report::getDetail($param);
        $conversions['branch'] = '';
        if(!empty($conversions['data'])){
            for ($i = 0; $i < count($conversions['data']); $i++) {
                $branch[] = $conversions['data'][$i]->sub_id;
            }
            $conversions['branch'] = array_unique($branch);

        }
        return response()->json(['status' => 200, 'data' => $conversions]);
    }

    /**
     * Get conversions summary
     *
     * @param Request $resquest
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSummary(Request $resquest)
    {
        $start = $resquest->get('start');
        $end = $resquest->get('end');

        if (!$start) {
            $start = date('Ymd', time() - 2592000);
        }

        if (!$end) {
            $end = date('Ymd');
        }

        $sub_id = $resquest->get('branch', null);
        $offerType = $resquest->get('offer_type', null);
        $offerID = $resquest->get('offer_id', null);
        $affiliateId = $resquest->get('affiliate_id', null);
        $offerType = strtoupper($offerType);
        $conversionStatus = $resquest->get('conversion-status', null);
        $affID = Helper::getAllAffiliateID();
        $strSearch = $resquest->get('strSearch');
        $merchant_id = $resquest->get('merchant_id', null);

        $param = [];
        $param['accountID'] = auth()->id();
        $param['start'] = $start;
        $param['end'] = $end;
        $param['offerType'] = $offerType;
        $param['offerID'] = $offerID;
        $param['conversionStatus'] = $conversionStatus;
        $param['sub_id'] = $sub_id;
        $param['affiliateId'] = $affiliateId;
        $param['affID'] = $affID;
        $param['strSearch'] = strtolower($strSearch);
        $param['merchant_id'] = $merchant_id;

        $summary = (new Report())->getSummary($param);

        if ($summary) {
            $summary = $summary[0];
        }

        return response()->json(['status' => 200, 'data' => $summary]);
    }

    function getPubBonus(Request $request) {
        $start = $request->get('start');
        $end = $request->get('end');

        if (!$start) {
            $start = date('Ymd', time() - config('const.report.last_30_days'));
        }

        if (!$end) {
            $end = date('Ymd');
        }

        $start = date('Ym', strtotime($start));
        $end = date('Ym', strtotime($end));

        $strSearch = $request->get('strSearch');
        $merchant_id = $request->get('merchant_id', null);

        $param = [];
        $param['start'] = $start;
        $param['end'] = $end;
        $param['strSearch'] = strtolower($strSearch);
        $param['merchant_id'] = $merchant_id;

        $pub_bonus = Report::getPubBonus($param);

        if(!$pub_bonus) {
            return response()->json(['status' => 400]);
        }

        return response()->json(['status' => 200, 'data' => $pub_bonus]);
    }
}