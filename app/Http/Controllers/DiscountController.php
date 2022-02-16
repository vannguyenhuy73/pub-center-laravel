<?php

namespace App\Http\Controllers;

use App\Exports\DiscountExport;
use App\Models\Discount;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DiscountController extends Controller
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
            ->where('status', 1);

        if ($merchantID && $merchantID != 'all') {
            $query->whereIn('merchant_id', [ucfirst($merchantID), strtolower($merchantID)]);
        }

        if ($duration && $duration == 'expired') {
            $query->where('END_DATE', '<', date('Ymd'));
        }

        if (!$duration || $duration == 'active') {
            $query->where('END_DATE', '>=', date('Ymd'));
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
        $discounts = $query->paginate(30);
        $merchants = (new Merchant())->getListMerchantValid();

        return view('discount.index', compact('discounts', 'merchants', 'duration', 'merchantID','from_sd','to_sd','from_ed','to_ed'));
    }

    public function download(Request $request)
    {
        $merchantID = $request->get('merchant_id');
        $duration = $request->get('duration');

        return Excel::download(new DiscountExport($duration, $merchantID), 'ma-giam-gia.xlsx');
    }

    private function convertDate($date)
    {
        return str_replace('-', '', $date);
    }
}
