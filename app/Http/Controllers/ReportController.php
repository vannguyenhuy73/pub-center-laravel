<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Affiliate;
use App\Models\Merchant;
use App\Models\OfferCategory;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
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

        return view('report.performace', compact( 'categories', 'listMerchant', 'affiliates'));
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

        $offerType = $resquest->get('offer_type', null);
        $conversionStatus = $resquest->get('conversion-status', null);

        $conversions = (new Report())->getPerformance(auth()->id(), $start, $end, $offerType, $conversionStatus);

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

        if ($page < 1) {
            $page = 1;
        }

        $offset = 0;
        if($page > 1) {
            $offset = (($page -1) * 100) + 1;
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

        $conversions['data'] = (new Report())->getDetail(auth()->id(), $start, $end, $offerType, $offerID, $conversionStatus, $offset, $sub_id, $affiliateId);
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

        $summary = (new Report())->getSummary(
            auth()->id(),
            $start,
            $end,
            $offerType,
            $offerID,
            $conversionStatus,
            $sub_id,
            $affiliateId
        );

        if ($summary) {
            $summary = $summary[0];
        }

        return response()->json(['status' => 200, 'data' => $summary]);
    }
}
