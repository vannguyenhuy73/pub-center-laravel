<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\SumBasic;
use App\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * Show summary info referral
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('referral.index');
    }


    public function getSummary(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');
        $accountID = $request->get('account_id');

        if (!empty($accountID) && !checkReferral($accountID, auth()->id())) {
            return response()->json([
                'status' => 500, 'message' => [],
            ], 500);
        }

        if (!$month || !is_numeric($month) || $month > 12 || !$year || !is_numeric($year) || $year < 2018) {
            return response()->json([
                'status' => 500, 'message' => [],
            ], 500);
        }

        $startDate = '' . $year . '' . $month . '01';
        $endDate = date("Ymd", mktime(0, 0, 0, $month + 1, 0, $year));

        $referralCount = User::query()->where('join_from', auth()->id())->count();
        if (!empty($accountID)) {
            $thisMonthTrans = Referral::getConversions($startDate, $endDate, $accountID, 'account');
            $todayCommission = Referral::getConversions(date('Ymd'), $accountID, 'account');
        } else {
            $thisMonthTrans = Referral::getConversions($startDate, $endDate, auth()->id());
            $todayCommission = Referral::getConversions(date('Ymd'), date('Ymd'), auth()->id());
        }

        // referral share
        $percent = getReferralPercent($startDate, $endDate);

        return response()->json([
            'status' => 200, 'data' => [
                'user' => $referralCount,
                'revenue' => [
                    'today' => $todayCommission->comm * $percent,
                    'month' => $thisMonthTrans->comm * $percent,
                ],
                'conversion' => (int)$thisMonthTrans->count,
            ],
        ]);
    }

    public function getAccount(Request $request)
    {
        $page = $request->get('page');

        if (!$page || !is_numeric($page)) {
            $page = 1;
        }

        $month = $request->get('month');
        $year = $request->get('year');

        if (!$month || !is_numeric($month) || $month > 12 || !$year || !is_numeric($year) || $year < 2018) {
            return response()->json([
                'status' => 500, 'message' => [],
            ], 500);
        }

        $startDate = '' . $year . '' . $month . '01';
        $endDate = date("Ymd", mktime(0, 0, 0, $month + 1, 0, $year));

        $data = User::query()
            ->where('join_from', auth()->id())
            ->whereRaw("REGISTERED_DATE BETWEEN TO_DATE('$startDate', 'YYYYMMDD') AND TO_DATE('$endDate', 'YYYYMMDD')")
            ->paginate(100, ['account_id', 'account_status', 'last_contact_affiliate_id', 'registered_date'], 'page', $page);

        $data = collect($data)->toArray();

        return response()->json(['status' => 200, 'data' => $data['data']]);
    }

    public function getLink()
    {
        return view('referral.getlink');
    }

    public function getConversionSum(Request $request)
    {
        $page = $request->get('page');
        $accountID = $request->get('account_id');


        if (!$page || !is_numeric($page)) {
            $page = 1;
        }

        $month = $request->get('month');
        $year = $request->get('year');

        if (!$month || !is_numeric($month) || $month > 12 || !$year || !is_numeric($year) || $year < 2018) {
            return response()->json([
                'status' => 500, 'message' => [],
            ], 500);
        }

        $startDate = '' . $year . '' . $month . '01';
        $endDate = date("Ymd", mktime(0, 0, 0, $month + 1, 0, $year));

        $where = "
              AFFILIATE_ID IN (
                    SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID IN (
                        SELECT TACCOUNT.ACCOUNT_ID FROM TACCOUNT WHERE JOIN_FROM = '" . auth()->id() . "'
                    )
                 )
              ";

        if (!empty($accountID)) {
            if (!checkReferral($accountID, auth()->id())) {
                return response()->json(['status' => 500, 'message' => ''], 500);
            }

            $where = "
              AFFILIATE_ID IN (
                    SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID = '$accountID'
                 )
              ";
        }

        $data = SumBasic::query()
            ->selectRaw("YYYYMMDD, SUM(ITEM_COUNT) conversion, SUM(SALES) revenue, SUM(COMMISSION) comm")
            ->whereRaw($where)
            ->whereBetween('YYYYMMDD', [$startDate, $endDate])
            ->groupBy('YYYYMMDD')
            ->get();
        $data = collect($data)->toArray();
        $percent = getReferralPercent($startDate, $endDate);

        return response()->json(['status' => 200, 'data' => ['data' => $data, 'percent' => $percent]]);
    }

    public function report(Request $request)
    {
        $accountID = $request->get('account_id');

        if ($accountID && !checkReferral($accountID, auth()->id())) {
            return redirect()->route('referral.index')->with('error', 'Permission denied!');
        }

        return view('referral.report', compact('accountID'));
    }

    public function reportDetail(Request $request)
    {
        $date = $request->get('date');

        return view('referral.reportdetail', compact('date'));
    }

    public function handleReportDetail(Request $request)
    {
        $date = $request->get('date');

        if (!$date || strlen($date) !== 8) {
            return response()->json(['status' => 500, 'message' => ''], 500);
        }

        $where = "
              TSUM_BASIC.AFFILIATE_ID IN (
                    SELECT TAFFILIATE.AFFILIATE_ID FROM TAFFILIATE WHERE ACCOUNT_ID IN (
                        SELECT TACCOUNT.ACCOUNT_ID FROM TACCOUNT WHERE TACCOUNT.JOIN_FROM = '" . auth()->id() . "'
                    )
                 )
              ";
        $data = SumBasic::query()
            ->selectRaw("TAFFILIATE.ACCOUNT_ID, TSUM_BASIC.AFFILIATE_ID, TSUM_BASIC.YYYYMMDD, SUM(TSUM_BASIC.ITEM_COUNT) conversion, SUM(TSUM_BASIC.SALES) revenue, SUM(TSUM_BASIC.COMMISSION) comm")
            ->join('TAFFILIATE', 'TAFFILIATE.AFFILIATE_ID', 'TSUM_BASIC.AFFILIATE_ID')
            ->whereRaw($where)
            ->where('TSUM_BASIC.YYYYMMDD', $date)
            ->groupBy('TSUM_BASIC.AFFILIATE_ID', 'TSUM_BASIC.YYYYMMDD', 'TAFFILIATE.ACCOUNT_ID')
            ->get();

        $data = collect($data)->toArray();

        $startDate = '' . substr($date, 0, 4) . '' . substr($date, 4, 2) . '01';
        $endDate = date("Ymd", mktime(0, 0, 0, ((int)substr($date, 4, 2)) + 1, 0, substr($date, 0, 4)));

        $percent = getReferralPercent($startDate, $endDate);

        return response()->json(['status' => 200, 'data' => ['data' => $data, 'percent' => $percent]]);
    }

}
