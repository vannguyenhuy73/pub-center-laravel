<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Affiliate;
use App\Models\Board;
use App\Models\Comission;
use App\Models\Event;
use App\Models\Merchant;
use App\Models\ReportTraffic;
use App\Models\TransitionLog;
use App\Models\BannerDashboard;
use App\Models\Notice;
use App\Models\Mail;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\ChartRequest;

class NewpubController extends Controller
{
	function index(Request $request)
	{
		$popupBanner = (new BannerDashboard())->getPopupDashboard();

		$account_id = auth()->user()->account_id;
		$affiliates = Helper::getAllAffiliateID();
		$orderCount = (new TransitionLog())->getOders($affiliates);

		$monthComission = number_format((new Comission())->getComission($affiliates));
		$payable = number_format((new Comission())->getPayAble(auth()->id()));

		$start = date('Ym') . '01';
		$end = date('Ym') . '31';
		$clickCount = 0;

		$clickData = (new ReportTraffic())->getSummaryTraffic($affiliates, $start, $end);

		foreach ($clickData as $c) {
			$clickCount += $c->total_click;
		}

		$topMerchant = (new Merchant())->getListTopMerchant();

		$noticeData = (new Notice())->getNoticeShow();

		$affList = Helper::getAllAffiliateID();

		$is_newbie_member = FALSE;
		$user = User::query()->where('account_id', auth()->user()->account_id)->first();
		if ($user) {
			if (!$user->last_contact_affiliate_id) {
				$user->last_contact_affiliate_id = (Affiliate::query()->where('account_id', $user->account_id)->orderBy('create_time_stamp','DESC')->first(['affiliate_id']))->affiliate_id;
				$user->update();
				$is_newbie_member = TRUE;
			}
		}

		$v2_sliders = \DB::table('THOME_SLIDER')->orderBy('POSITION', 'ASC')->get();
		$guide_sliders = \DB::table('TGUIDE_DATA')->where('GUIDE_TYPE', 'slide')->where('GUIDE_STATUS', 'ACTIVE')->get();
		$guide_video = \DB::table('TGUIDE_DATA')->where('GUIDE_TYPE', 'video')->where('GUIDE_STATUS', 'ACTIVE')->first();

		return view('newpub.index', compact(
			'orderCount',
			'clickCount',
			'monthComission',
			'payable',
			'topMerchant',
			'noticeData',
			'popupBanner',
			'is_newbie_member',
			'v2_sliders',
			'guide_sliders',
			'guide_video'
		));
	}

	/**
     * get click per month
     *
     * @param null $month
     *
     * @return mixed
     */
	public function getClick(ChartRequest $request)
	{
		$affiliates = Helper::getAllAffiliateID();
		$account_id = auth()->user()->account_id;
		$input = $request->all();
		$start = $input['start_date'] ?? '';
		$end = $input['end_date'] ?? '';

		if($input['affiliate_id']) {
			$affiliates = [$input['affiliate_id']];
		}

		$from = Carbon::createFromFormat('Ymd', $start)->startOfDay();
		$to = Carbon::createFromFormat('Ymd', $end)->startOfDay();
		$days = range(
			0,
			$from->diffInDays($to)
		);
		$list = [];
		foreach ($days as $day) {
			$dayCarbon = $from->copy()->addDays($day);
			$list[] = [
				'period' => $dayCarbon->format('d/m/Y'),
				'impresion' => 0,
				'unique_click' => 0,
				'total_click' => 0,
				'mobile_click' => 0,
			];
		}
		$data = (new ReportTraffic())->getSummaryTraffic($affiliates, $start, $end);
		foreach ($data as $key => $row) {
			$ddmmyyyy = substr($row['period'], 6, 2) . '/' . substr($row['period'], 4, 2) . '/' . substr($row['period'], 0, 4);

			foreach ($list as $k => $value) {
				if ($value['period'] == $ddmmyyyy) {
					$list[$k]['impresion'] = $row->impresion;
					$list[$k]['unique_click'] = $row->unique_click;
					$list[$k]['total_click'] = $row->total_click;
					$list[$k]['mobile_click'] = $row->mobile_click;
				}
				if(date('Ymd') <= '20200730' && $account_id == 'lmquang96')
				{
					$list[$k]['impresion'] = rand(2200,3500);
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
    public function getRevenue(ChartRequest $request)
    {
    	$affiliates = Helper::getAllAffiliateID();

    	$input = $request->all();
    	$start = $input['start_date'] ?? '';
    	$end = $input['end_date'] ?? '';

    	if($input['affiliate_id']) {
			$affiliates = [$input['affiliate_id']];
		}

    	$from = Carbon::createFromFormat('Ymd', $start)->startOfDay();
    	$to = Carbon::createFromFormat('Ymd', $end)->startOfDay();

    	$days = range(
    		0,
    		$from->diffInDays($to)
    	);

    	$list = [];
    	foreach ($days as $day) {
    		$dayCarbon = $from->copy()->addDays($day);
    		if(date('Ymd') <= '20200730' && auth()->user()->account_id == 'lmquang96') {
    			$list[] = [
    				'period' => $dayCarbon->format('Y-m-d'),
    				'commission' => rand(30000, 150000),
    			];
    		} else {
    			$list[] = [
    				'period' => $dayCarbon->format('d/m/Y'),
    				'commission' => 0,
    			];
    		}
    	}

    	$data = (new Comission())->getCommissionChartNewpub($affiliates, $start, $end);

    	foreach ($data as $key => $row) {
    		$ddmmyyyy = date('d/m/Y', strtotime($row->yyyymmdd));

    		foreach ($list as $k => $value) {
    			if ($value['period'] == $ddmmyyyy) {
    				$list[$k]['commission'] = number_format($row->commission, 2);
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

    	if ($user->update()) {
    		return redirect()->route('home')->with('success', 'Chuyển site thành công');
    	}

    	return redirect()->route('home')->with('error', 'Có lỗi xảy ra, xin vui lòng thử lại');
    }
}