<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 27/08/2018
 * Time: 11:30
 */

namespace App\Http\Helpers;


use App\Models\Affiliate;
use App\Models\AcountManager;
use App\Models\Notice;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Helper
{
    /**
     * get all affliate of account logging
     *
     * @return array
     */
    public static function getAllAffiliateID()
    {
        $affList = (new Affiliate())->getAllAffiliateID(auth()->id());

        $tmp = [];

        foreach ($affList as $aff) {
            $tmp[] = $aff->affiliate_id;
        }

        return $tmp;
    }

    /**
     * Show all site of account in the system
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getListSite()
    {
        $sites = Affiliate::query()
            ->where('account_id', auth()->id())
            ->get(['affiliate_id', 'site_name', 'delete_flag']);

        return $sites;
    }

    /**
     * get current Aff in the system
     *
     * @return mixed
     */
    public static function getCurrentAff()
    {
        return @auth()->user()->last_contact_affiliate_id;
    }

    public static function generateShortLink($url)
    {
        // $acceptDomains = [
        //     'click.adpia.vn', 'ktmall.vn', 'adpialink.com', 'adpia.vn','adtofb.com'
        // ];

        // // check in array
        // $checkPoint = false;
        // foreach ($acceptDomains as $domain) {
        //     if (strpos($url, $domain) !== false) {
        //         $checkPoint = true;
        //     }
        // }

        // if (!$checkPoint) {
        //     return false;
        // }
        // dd($url);
//        $apiURL = env('BITLY_API_URL');
//
//        $postData = [
//            "long_url" => $url,
//            'title' => \auth()->id() . ' ' . date('Y-m-d')
//        ];
//
//        $curl = curl_init();
//
//        curl_setopt($curl, CURLOPT_URL, $apiURL);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_POST, 1);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
//        curl_setopt($curl, CURLOPT_HEADER, false);
//        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, [
//            'Content-Type: application/json',
//            'Authorization: Bearer ' . env('BITLY_API_TOKEN')
//        ]);
//
//        $result = curl_exec($curl);
//
//        if ($result) {
//            $data = json_decode($result, true);
//                return $data;
//        }
//    end short link old


//         $post = ["dynamicLinkInfo" => [
//                     "domainUriPrefix" => "https://adly.page.link",
//                     "link" =>$url,
//                 ]
//             ];
//         $key = "AIzaSyCHgEqatatHcIfq9-kG7RX2yrFtX9LvIcY";
//         $curl = curl_init();
//             curl_setopt($curl, CURLOPT_URL , "https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=".$key);
//             curl_setopt($curl, CURLOPT_POST, 1);
//             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post));
//             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//             curl_setopt($curl, CURLOPT_HTTPHEADER, [
//                 "content-type: application/json",
//             ]);
//             $result = curl_exec($curl);
            
// //            dd($result);
//         if ($result) {
//             $data = json_decode($result, true);
// //            dd($data['shortLink']);
//             return $data;
//         }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL , "http://tinyurl.com/api-create.php?url=".urlencode($url));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        return ['shortLink'=>$result];
    
    }

    public static function getManagerInfor()
    {
       $managerInfor = AcountManager::query()
           ->join('TAFF_MANAGER_STAFF', 'TAFF_MANAGER_STAFF.MANAGER','=','TAFF_MANAGE.MANAGER')
           ->where('TAFF_MANAGE.ACCOUNT_ID',auth()->id())
           ->get(['TAFF_MANAGER_STAFF.*']);
        return $managerInfor;
    }
    
    public static function getPupup() {
        $data = DB::table('PUPUP_EVENT')
            ->where('type','newpub')
            ->get();
        return $data;
    }

    public static function getNoticeList()
    {
        $notice_key = config('const.notify.notice_key');
        $notify_publishers = Cache::get($notice_key);
        $limit = config('const.notify.limit');

        $current_notify_publishers = array();

        if(!empty($notify_publishers)) {
            $current_notify_publishers = array_slice($notify_publishers, 0, $limit);
        }

        return $current_notify_publishers;
    }
    
}
