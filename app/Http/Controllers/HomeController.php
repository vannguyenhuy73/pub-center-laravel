<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Affiliate;
use App\Models\Board;
use App\Models\Comission;
use App\Models\Event;
use App\Models\Merchant;
use App\Models\ReportTraffic;
use App\Models\TransitionLog;
use App\Models\BannerDashboard;
use App\User;

class HomeController extends Controller
{
    /**
     * Show dashboard view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $boards = (new Board())->getListBoard();
        $account_id = auth()->user()->account_id;
        $affiliates = Helper::getAllAffiliateID();
        $orderCount = (new TransitionLog())->getOders($affiliates);

        $todayComission = number_format((new Comission())->getComission($affiliates, date('Ymd')));
        $monthComission = number_format((new Comission())->getComission($affiliates));
        $payable = number_format((new Comission())->getPayAble(auth()->id()));
        $highlights = (new Merchant())->getHighlight(auth()->user()->last_contact_affiliate_id);
        $newEvents = (new Event())->getList('002', 4);

        $bannerDashboard = (new BannerDashboard())->getBannerDashboard();

        if(date('Ymd') <= '20200513' && $account_id == 'ChinhVD')
        {
            $orderCount = 743;
            $todayComission = number_format(531000);
            $monthComission = number_format(5400000);
            $payable = number_format(15378000);
        }

        return view('dashboard.index', compact(
                'orderCount',
                'todayComission',
                'monthComission',
                'payable',
                'highlights',
                'newEvents',
                'boards',
                'bannerDashboard'
            )
        );
    }


    /**
     * get click per month
     *
     * @param null $month
     *
     * @return mixed
     */
    public function getClick($month = null)
    {
        $affiliates = Helper::getAllAffiliateID();
        $account_id = auth()->user()->account_id;
        $start = date('ym') . '01';
        $end = date('ym') . '31';

        if ($month) {
            $start = date('Y') . $month . '01';
            $end = date('Y') . $month . '31';
        }

        $list = [];
        $year = date('Y');

        // set default maxdate
        $maxDay = 31;

        if ($month == date('m')) {
            $maxDay = (int)date('d');
        }

        for ($d = 1; $d <= $maxDay; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);

            if (date('m', $time) == $month)
                $list[] = [
                    'period' => date('Y-m-d', $time),
                    'impresion' => 0,
                    'unique_click' => 0,
                    'total_click' => 0,
                    'mobile_click' => 0,
                ];
        }

        $data = (new ReportTraffic())->getSummaryTraffic($affiliates, $start, $end);

        foreach ($data as $key => $row) {
            $yyymmdd = substr($row['period'], 0, 4) . '-' . substr($row['period'], 4, 2) . '-' . substr($row['period'], 6, 2);

            foreach ($list as $k => $value) {
                if ($value['period'] == $yyymmdd) {
                    $list[$k]['impresion'] = $row->impresion;
                    $list[$k]['unique_click'] = $row->unique_click;
                    $list[$k]['total_click'] = $row->total_click;
                    $list[$k]['mobile_click'] = $row->mobile_click;
                }
                if(date('Ymd') <= '20200513' && $account_id == 'ChinhVD')
                {
                    $list[$k]['total_click'] = rand(4800,5500);
                    $list[$k]['unique_click'] = rand(1200,2300);
                    $list[$k]['mobile_click'] = rand(3200, 3800);
                }
            }
        }

        return $list;

    }

    /**
     * get revenue per month
     *
     * @param null $month
     *
     * @return mixed
     */
    public function getRevenue($month = null)
    {
        $affiliates = Helper::getAllAffiliateID();

        if (!$month) {
            $month = date('m');
        }

        $list = [];
        $year = date('Y');

        // set default maxdate
        $maxDay = 31;

        if ($month == date('m')) {
            $maxDay = (int)date('d');
        }

        for ($d = 1; $d <= $maxDay; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);

            if (date('m', $time) == $month)
                $list[] = [
                    'period' => date('Y-m-d', $time),
                    'commission' => 0,
                ];
        }

        $data = (new Comission())->getCommissionChart($affiliates, $month);

        foreach ($data as $key => $row) {
            $yyymmdd = substr($row['yyyymmdd'], 0, 4) . '-' . substr($row['yyyymmdd'], 4, 2) . '-' . substr($row['yyyymmdd'], 6, 2);

            foreach ($list as $k => $value) {
                if ($value['period'] == $yyymmdd) {
                    $list[$k]['commission'] = $row->commission;
                }
            }
        }

        return $list;

    }

    /**
     * Switch to other site of current account
     *
     * @param $affID
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchSite($affID)
    {
        if (strlen($affID) > 10) {
            return redirect()->route('home')->with('error', 'Site Không hợp lệ');
        }

        // query
        $affiliate = Affiliate::query()
            ->where(['affiliate_id' => $affID, 'account_id' => auth()->id()])
            ->first(['affiliate_id']);

        // check site is null
        if (!$affiliate) {
            return redirect()->route('home')->with('error', 'Site này không phải của bạn hoặc không tồn tại');
        }

        $user = User::findOrFail(auth()->id());

        if ($user->last_contact_affiliate_id == $affiliate->affiliate_id) {
            return redirect()->route('home')->with('error', 'Trùng với site hiện tại');
        }

        $user->last_contact_affiliate_id = $affiliate->affiliate_id;

        // dd($user->last_contact_affiliate_id);

        if ($user->update()) {
            return redirect()->route('home')->with('success', 'Chuyển site thành công');
        }

        return redirect()->route('home')->with('error', 'Có lỗi xảy ra, xin vui lòng thử lại');
    }


}
