<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Http\Helpers\Helper;
use App\Models\Board;
use App\Models\Discount;
use App\Models\Link;
use App\Models\Merchant;
use App\Models\MerchantDataFeed;
use App\Models\OfferCategory;
use App\Models\Program;
use App\Models\AccountDomain;
use App\Models\BonusMerchant;
use App\Models\Subscribe;

class NewpubOfferController extends Controller
{
	function index($page = 1, Request $request)
	{
		$limit = 12;

        if($page == 1){
            $start = 1;
        } else {
            $start = ($page -1) * $limit + 1;

        }
        $offerName = $request->get('offer_name', null);
        $offerType = $request->get('offer_type', null);
        $orderBy = $request ->get('order_by', null);
        $offerCategory = $request->get('offer_category', null);
        $sortCommission = $request->get('sort_commission', null);

        $offerName = str_replace("'", "''", $offerName);


        if (strtolower($offerType) == 'all') {
            $offerType = null;
        }

        $cateList = @$this->getCategory()[$offerCategory];
        $queryHttp = $request->all();
        if (strtolower($offerCategory) == 'all' || !$cateList) {
            $offerCategory = null;
        } else {
            $offerCategory = $cateList['child'];
        }

        $merchant = new Merchant();

        //offer
        $offers = $merchant->getList(
            $start,
            $limit,
            [
                'offer_type' => $offerType,
                'category' => $offerCategory,
                'offer_name' => $offerName,
                'order_by' => $orderBy,
                'sort_commission' => $sortCommission
            ]
        );

        $merchantList = [];
        $merchantGlobal = $merchant->getListMerchantGolbal(8);
        $newMerchant = $merchant->getListNewMerchant(8);
        $topMerchant = $merchant->getListTopMerchant(8);

        foreach ($offers as $offer) {
            $merchantList[] = $offer->merchant_id;
        }

        $listSubscribe = Subscribe::query()
            ->where('affiliate_id', Helper::getCurrentAff())
            ->whereIn('merchant_id', $merchantList)->get(['merchant_id', 'subs_status'])->toArray();

        foreach ($offers as $key => $offer) {
            foreach ($listSubscribe as $sub) {
                if ($offer->merchant_id == $sub['merchant_id']) {
                    $offers[$key]->subs_status = $sub['subs_status'];
                }
            }
        }

        //get count
        $count = $merchant->getCountAll($offerType, $offerCategory, $offerName, $orderBy, $sortCommission);
        $link = '';
        $maxPage = 0; //Declaration

        if ($count > 1) {
            $maxPage = ceil($count / $limit);
            $link = '<div class="btn-group">';

            for ($i = 1; $i <= $maxPage; $i++) {
                $link .= '<a class="btn btn-default ' . ($page == $i ? 'btn-success' : '') . '" type="button" href="'
                    . sprintf("%s?%s", route('newpub.offer.paging', $i), http_build_query($queryHttp))
                    .'">' . $i . '</a>';
            }

            $link .= '</div>';
        }

        $categories = $this->getCategory();

		return view('newpub_offer.index', compact('offers', 'categories', 'link', 'maxPage','merchantGlobal','newMerchant','topMerchant'));
	}

	public function show($id, Request $request)
    {
        $aff = Helper::getCurrentAff();
        $merchantInfo = (new Merchant())->getMerchant($id, $aff);

        if (!$merchantInfo) {
            abort(404);
        }
        $bonus_search = $request->get('bonus_search','');
        //auto subscribe if merchant is auto accept
        $merchantInfo->subs_status = $this->handleSubscribe($id, $merchantInfo->approval_type);

        $programs = (new Program())->getProgram($id);
        $boards = (new Board())->getBoardByMerchant($id);
        $dataFeed = MerchantDataFeed::getDataFeed($id);
        $video = (new Link())->getVideoMerchant($id);
        $domains = AccountDomain::query()->where('ACCOUNT_ID','=', auth()->id())
        ->where('STATUS','=','ACT')
        ->orderBy('CREATE_TIME_STAMP','desc')->get();

        $adpia_domain = AccountDomain::query()->where('ACCOUNT_ID','=','adpia')->where('STATUS','=','ACT')->first();
        $lzd_bonus = $bonus = [];
        if($merchantInfo->merchant_id == 'lazada')
        {
            //Show all lazada bonus
            $query = BonusMerchant::query()->where('MERCHANT_ID','=','lazada')->where('STATUS','=','ACT')
            ->whereRaw('sysdate between START_DATE and END_DATE')->orderBy('CREATE_IS','desc');
            if($bonus_search)
            {
                $query->where('title','like','%'.$bonus_search.'%')->orWhere('detail','like','%'.$bonus_search.'%');
            }
            $bonus = $query->selectRaw('id, title, link, image, detail, merchant_id, bonus, to_char(START_DATE,\'YYYY-MM-DD\') as sdate, to_char(END_DATE,\'YYYY-MM-DD\') as edate')->paginate(30);

            $data = [];
            $lzd_bonus['recommend'] = $lzd_bonus['hot'] = [];
            foreach ($bonus as $b) {
                $b->tracking_link = "http://click.adpia.vn/tracking.php?m=lazada&a=".$aff."&l=3333&l_cd1=3&l_cd2=0&tu=".urlencode($b->link);
                $data[] = $b;
            }
            if(count($data) > 3)
            {
                $temp_bonus = $data;
                $lzd_bonus['recommend'] = array_splice($temp_bonus, 0, 4);
                $lzd_bonus['hot'] = count($bonus) >= 6 ? array_splice($data, 4) : $data;
            }
            else
            {
                $lzd_bonus['recommend'] = $lzd_bonus['hot'] = $data;
            }
        }

        $customBanners = (new Link())->getCustomBanner($id);

        $dbDiscount = (new Discount())->getDiscountMerchantBanner($id);
		
		$promoFlag = false;
		
		$promoApiArr = array('shopee', 'lazada', 'tiki', 'sendo');
		
		if(count($dbDiscount) > 0) {
			$promoFlag = true;
		}
		
		if(in_array($id, $promoApiArr)) {
			$promoFlag = true;
		}

        return view('newpub_offer.detail', compact('merchantInfo', 'programs', 'aff', 'boards', 'dataFeed','domains','adpia_domain','video', 'id', 'lzd_bonus','bonus','bonus_search', 'customBanners', 'promoFlag'));
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
	
	private function handleSubscribe($merchantID, $merchantType) {
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

            return 'APR';
        }
		
		if(!$subFlag && $merchantType == 'MAN') {
			$subscribe = new Subscribe();
            $subscribe->affiliate_id = $currentAff;
            $subscribe->merchant_id = $merchantID;
            $subscribe->subs_status = 'REQ';
            $subscribe->status_apply_time_stamp = date('Y-m-d h:i:s');
            $subscribe->status_update_time_stamp = date('Y-m-d h:i:s');
            $subscribe->create_time_stamp = date('Y-m-d h:i:s');
            $subscribe->save();

            return 'REQ';
		}
		
		if($subFlag && $subFlag['subs_status'] == 'REQ' && $merchantType == 'AUT') {
			$subscribe = Subscribe::where('AFFILIATE_ID', '=', $currentAff)
			->where('MERCHANT_ID', '=', $merchantID)
			->update(['SUBS_STATUS' => 'APR']);
			
			return 'APR';
		}
		
		if($subFlag && $subFlag['subs_status'] == 'REQ' && $merchantType == 'MAN') {
			return 'REQ';
		}
		
		if($subFlag && $subFlag['subs_status'] == 'DEN') {
			return 'DEN';
		}
		
		if($subFlag && $subFlag['subs_status'] == 'APR') {
			return 'APR';
		}
	}

    /**
     * generate short link via bitly api
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * rút gọn link tinyurl
     */
    public function shortLink(Request $request)
    {
        $url = $request->get('url');
        $domain = $request->get('domain');

        if (!$url) {
            return response()->json(['status' => 500, 'data' => 'link is required'], 500);
        }

        if ($data = Helper::generateShortLink($url)) {
            $shortLink = @$data['shortLink'];

            if($domain && $domain != 'tinyurl')
            {
                $shortLink = str_replace("tinyurl.com", $domain, @$data['shortLink']);
            }

            return response()->json(['status' => 200, 'data' => $shortLink], 200);
        }

        return response()->json(['status' => 501, 'data' => 'Link invaild'], 501);
    }

    function getBannerWithSize(Request $request)
    {
    	$id = $request->get('id','');
    	$width = $request->get('width','');
    	$height = $request->get('height','');

    	$banner = (new Link())->getBannerLinkNewpub($id, $width, $height);

    	return response()->json(['status' => 200, 'data' => $banner]);
    }

	public function getCategory()
	{
		return [
			'ecommerce' => [
				'name' => [
					'en' => 'E-commerce',
					'vi' => 'Mua sắm tổng hợp',
				],
				'child' => "('A')",
			],
			'electronic' => [
				'name' => [
					'en' => 'Electronic',
					'vi' => 'Điện tử & Gia dụng',
				],
				'child' => "('G','H','K','L')",
			],
			'travel' => [
				'name' => [
					'en' => 'Travel & Leisure',
					'vi' => 'Du lịch & Đặt phòng',
				],
				'child' => "('R','W')",
			],
			'beauty' => [
				'name' => [
					'en' => 'Beauty & Cosmetic',
					'vi' => 'Mỹ phẩm & Làm đẹp',
				],
				'child' => "('E','F')",
			],
			'fashion' => [
				'name' => [
					'en' => 'Fashion & Accessory',
					'vi' => 'Thời trang & Phụ kiện',
				],
				'child' => "('C','X','D')",
			],
			'finance' => [
				'name' => [
					'en' => 'Finance',
					'vi' => 'Tài chính',
				],
				'child' => "('M','Y')",
			],
			'health' => [
				'name' => [
					'en' => 'Health & Medical',
					'vi' => 'Sức khỏe & Y tế',
				],
				'child' => "('S','P','B')",
			],
			'service' => [
				'name' => [
					'en' => 'Service',
					'vi' => 'Dịch vụ',
				],
				'child' => "('I','J','N','O','Q','c','T','V','Z')",
			],
			'education' => [
				'name' => [
					'en' => 'Education',
					'vi' => 'Khóa học & Giáo dục',
				],
				'child' => "('U','a')",
			],
			'nation' =>[
				'name' => [
					'en' => 'Global Merchant ',
					'vi' => 'Global Merchant',
				],
				'child' => "('global')",
			],
			'mobile' =>[
				'name' => [
					'en' => 'Mobile',
					'vi' => 'Điện thoại',
				],
				'child' => "('p')",
			],
			'book' =>[
				'name' => [
					'en' => 'Book & Ticket',
					'vi' => 'Sách & vé',
				],
				'child' => "('W')",
			],
		];
	}
}
