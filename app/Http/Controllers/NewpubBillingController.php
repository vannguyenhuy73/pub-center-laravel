<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Comission;
use App\Models\PayRequest;
use App\Models\BonusMerchant;
use App\User;
use Illuminate\Http\Request;

class NewpubBillingController extends Controller
{
    /**
     * Request billing for current account
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        $affiliates = Helper::getAllAffiliateID();
        $todayComission = number_format((new Comission())->getComission($affiliates, date('Ymd')));
        $monthComission = number_format((new Comission())->getComission($affiliates));
        $payable = number_format((new Comission())->getPayAble(auth()->id()));

        //check requested
        $requested = PayRequest::query()
            ->where('account_id', auth()->id())
            ->where('yyyymmdd', '>=', date('Ym00'))
            ->where('yyyymmdd', '<=', date('Ym31'))
            ->where('done_flag', 'N')
            ->first(['create_time_stamp', 'amount']);

        $acceptRequest = false;

        if (in_array(date('d'), [10, 11, 12, 25, 26, 27])) {
            $acceptRequest = true;
        }

        if(date('Ymd') >= 20210223 && date('Ymd') <= 20210225) {
            $acceptRequest = true;
        }

        if(date('Ymd') >= 20210226 && date('Ymd') <= 20210228) {
            $acceptRequest = false;
        }

        $user = User::query()->findOrFail(auth()->id());
        if(in_array($user->account_id, ['2311408962421006','Nhatlongduong','datlvq']) && date('Ymd') >= '20190522' && date('Ymd') <= '20190531'){
            $acceptRequest = true;
        }
        $paids = PayRequest::query()->where(['account_id' => auth()->id(), 'account_type' => 'A'])
            ->orderBy('YYYYMMDD', 'DESC')
            ->get();
			
		$report_net = (new Comission())->getReportNet($affiliates);

        return view('newpub_billing.request', compact('todayComission', 'monthComission', 'payable', 'acceptRequest', 'requested', 'paids', 'report_net'));
    }

    /**
     * Handle request for Withdrawal
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleRequest(Request $request)
    {
        $amount = (int)$request->get('amount', 0);
        $date_flag = true;

        if ($amount < 200000 || $amount % 10000 !== 0) {
            return redirect()->back()->withErrors('S??? ti???n r??t ph???i l???n h??n ho???c b???ng 200,000 VN?? v?? ph???i l?? b???i s??? c???a 10,000 VN??');
        }

        $user = User::query()->findOrFail(auth()->id());
        if(in_array($user->account_id, ['2311408962421006','Nhatlongduong','datlvq']) && date('Ymd') >= '20190522' && date('Ymd') <= '20190531'){
            $date_flag = true;
        }

        if(date('Ymd') >= 20210223 && date('Ymd') <= 20210225) {
            $date_flag = true;
        } else {
            if(!$date_flag)
            {
                if (!in_array(date('d'), [10, 11, 12, 25, 26, 27])) {
                    return redirect()->route('newpub.billing.request')->withErrors('Ch??ng t??i ch??? m??? c???a ????ng k?? v??o ng??y 10-12 v?? 25-27 h??ng th??ng!');
                }
            }
        }

        if ($user->suspended_flag == 'Y') {
            return redirect()->route('newpub.billing.request')->withErrors('T??i kho???n c???a b???n ???? b??? ch???n thanh to??n, m???i li??n h??? v???i AM ????? bi???t chi ti???t');
        }

        if ($user->bill_ready_flag != 'Y') {
            return redirect()->route('newpub.billing.request')->withErrors('T??i kho???n c???a b???n ch??a ho??n thi???n h??? s??, vui l??ng li??n h??? AM ????? bi???t th??m chi ti???t');
        }

        if(date('Ymd') >= 20210226 && date('Ymd') <= 20210228) {
            return redirect()->route('newpub.billing.request')->withErrors('Ch??ng t??i t???m th???i kh??ng m??? thanh to??n v??o kho???ng th???i gian n??y!');
        }

        $payable = intval((new Comission())->getPayAble(auth()->id()));
        $bonus = BonusMerchant::getPubBonusAmountTotal();
        $totalBonus = 0;

        foreach($bonus as $b) {
            $totalBonus += intval($b->amount);
        }

        $max = $totalBonus + $payable;

        if ($amount > $max) {
            return redirect()->route('newpub.billing.request')->withErrors('B???n ch??? c?? th??? r??t t???i ??a ' . number_format($max) . ' VN??');
        }

        $payRequest = new PayRequest();
        $payRequest->yyyymmdd = date('Ymd');
        $payRequest->account_id = auth()->id();
        $payRequest->account_type = 'A';
        $payRequest->amount = $amount;
        $payRequest->done_flag = 'N';
        $payRequest->request_comment = '';
        $payRequest->create_time_stamp = date('Y-m-d h:i:s');
        $payRequest->contribution = 0;

        if ($payRequest->save()) {
            return redirect()->back()->withSuccess('????ng k?? r??t ti???n th??nh c??ng!');
        }

        return redirect()->back()->withErrors('C?? l???i x???y ra, xin vui l??ng th??? l???i sau');
    }

    /**
     * show list billding
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paids = PayRequest::query()->where(['account_id' => auth()->id(), 'account_type' => 'A'])
            ->orderBy('YYYYMMDD', 'DESC')
            ->get();

        return view('billing.index', compact('paids'));
    }
	
	function getReportNetByPage(Request $request) {
		$page = $request->get('page');
		$strMerchant = $request->get('strMerchant');
		$limit = 10;
		$offset = ($page - 1)*$limit;
		$report_net = (new Comission())->getReportNet(Helper::getAllAffiliateID(), $limit, $offset, $strMerchant);
		return $report_net;
	}
}