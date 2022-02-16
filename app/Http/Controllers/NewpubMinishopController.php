<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Minishop;
use App\Models\Merchant;
use Auth;
use Session;
use App\Helper\Upload;

class NewpubMinishopController extends Controller
{
    function index()
    {
        $acc_id = Auth()->user()->account_id;

        $affiliate_id = Auth()->user()->last_contact_affiliate_id;

        $shop_embed_code = (new Minishop())->checkIssetCode($acc_id);

        $link = Minishop::checkIssetRegister($acc_id);

        $default_mers = '';

        $adpia_merchant_coupons = Minishop::getAdpiaMerchantCoupon();

        foreach ($adpia_merchant_coupons as $key => $mer) {
            if($key != 0) {
                $default_mers .= ",";
            }
            $default_mers .= $mer->merchant_id;
        }

        $aprMerchants = Minishop::getDiscountAprMerchant($affiliate_id);

        $apr_merchant_str = '';

        $category_list = collect();
        
        foreach ($aprMerchants as $m) {
            if($m->approval_type == config('const.minishop.approval_type.auto') || $m->subs_status == config('const.minishop.subs_status.approval')) {
                $apr_merchant_str .= $m->merchant_id.",";
            }
            $category_list->put($m->merchant_id, ['name' => ucfirst($m->merchant_id), 'status' => $m->subs_status, 'type' => $m->approval_type]);
        }

        foreach ($shop_embed_code as $co) {
            if($co->category_list == 'all') {
                $co->category_list = config('const.minishop.category_list');
            }
            if($co->merchant_list == 'all') {
                $co->merchant_list = $apr_merchant_str . $default_mers;
            }
        }

        $minishopCateList = (new Minishop())->getMinishopCategoryList();

        $listMerchant = Minishop::getMerchantsApproveByAffId($affiliate_id);

        return view('newpub_minishop.index_view', compact('shop_embed_code', 'link', 'category_list', 'adpia_merchant_coupons', 'minishopCateList', 'listMerchant'));
    }

    function preview()
    {
        return view('newpub_minishop.preview');
    }

    function registerCode(Request $request)
    {
        $acc_id = Auth()->user()->account_id;
        $aid = $request->input('affiliate_id');

        $merchants = $request->input('merchants');
        $categories = $request->input('categories');
        $site = $request->input('site');
        $link = $request->input('link');

        $data['ID'] = (new Minishop())->getMaxId() + 1;
        $data['AFFILIATE_ID'] = $aid;
        $data['SITE_NAME'] = strlen($this->getTitle($site)) > 0 ? $this->getTitle($site) : 'unname';
        $data['SITE_URL'] = $site;
        $data['LINK'] = $link;

        $mer_str = '';
        foreach ($merchants as $m) {
            $mer_str .= $m.',';
        }
        $mer_str = mb_substr($mer_str, 0, mb_strlen($mer_str) - 1);

        $cate_str = '';
        foreach ($categories as $c) {
            $cate_str .= $c.',';
        }
        $cate_str = mb_substr($cate_str, 0, mb_strlen($cate_str) - 1);
        $data['MERCHANT_LIST'] = $mer_str;
        $data['CATEGORY_LIST'] = $cate_str;
        $data['STATUS'] = config('const.minishop.approve.active');
        $data['YYYYMMDD'] = date("Ymd");
        $data['TYPE'] = config('const.minishop.register_type.codes');
        $data['ACCOUNT_ID'] = $acc_id;

        $result = (new Minishop())->insertRegisterShop($data);

        if($result) {
            return response()->json(['status' => '200', 'data' => 'Tạo Code thành công! Hãy copy đoạn mã theo hướng dẫn để có thể trải nghiệm Minishop bạn nhé!']);
        }
        return response()->json(['status' => '400', 'data' => 'Có lỗi xảy ra!']);
    }

    function registerShop(Request $request)
    {
        $acc_id = Auth()->user()->account_id;

        $isset = (new Minishop())->checkIssetShop($acc_id);

        if($isset > 0) {
            return redirect()->bacK()->with('error', 'Bạn đã đăng ký Minishop trước đó rồi! Xin vui lòng liên hệ với AM của mình để xóa Minishop cũ hoặc thay đổi nội dung của nó nhé!.');
        }

        $merchants = $request->input('merchants');
        $categories = $request->input('categories');
        $name = $request->input('name');
        $aid = $request->input('affiliate_id');
        $logo = $request->file('logo_site');
        $date = $request->input('date');

        $data['ID'] = (new Minishop())->getMaxId() + 1;
        $data['AFFILIATE_ID'] = $aid;
        $data['SITE_NAME'] = $name;
        $data['SITE_URL'] = config('const.minishop.pub_url');
        $data['LINK'] = config('const.minishop.pub_url').$this->to_slug($name).'/store';

        $mer_str = '';
        foreach ($merchants as $m) {
            $mer_str .= $m.',';
        }
        $mer_str = mb_substr($mer_str, 0, mb_strlen($mer_str) - 1);

        $cate_str = '';
        foreach ($categories as $c) {
            $cate_str .= $c.',';
        }
        $cate_str = mb_substr($cate_str, 0, mb_strlen($cate_str) - 1);
        $data['MERCHANT_LIST'] = $mer_str;
        $data['CATEGORY_LIST'] = $cate_str;
        $data['STATUS'] = config('const.minishop.approve.active');
        $data['YYYYMMDD'] = date("Ymd");
        $data['TYPE'] = config('const.minishop.register_type.regis');
        $data['ACCOUNT_ID'] = $acc_id;
        $data['SLUG'] = $this->to_slug($name);

        if($logo != null) {
            $data['SITE_LOGO'] = config('const.minishop.logo_document_folder').'/'.'ms'.$date.'_'.str_replace(' ', '_', $logo->getClientOriginalName());
        } else {
            $data['SITE_LOGO'] = '';
        }

        try {
            $lastFlag = (new Minishop())->checkIssetShopName($data['SLUG']);
            if($lastFlag > 0) {
                $result = false;    
            } else {
                $result = (new Minishop())->insertRegisterShop($data);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $result = false;
        }
        
        if($result) {
            return redirect()->bacK()->with('success', 'Bạn đã đăng ký thành công!');
        } else {
            return redirect()->bacK()->with('error', 'Có lỗi xảy ra! Xin vui lòng thử lại.');
        }
    }

    function getTitle($url) {
        $page = file_get_contents($url);
        if(strlen($page) > 0) {
            $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
            if(strlen($title) > 0) {
                return $title;  
            }
            return '';
        }
        return '';
    }

    function checkShopNameIsset(Request $request)
    {
        $name = $request->input('name');
        $slug = $this->to_slug($name);
        if(Session::has('minishop_shop_name'.$slug)) {
            $result = 1;
        } else {
            $result = (new Minishop())->checkIssetShopName($slug);
        }
        if($result == 0) {
            session(['minishop_shop_name'.$slug => 'true']);
        }
        return response()->json(['status' => '200', 'data' => $result]);
    }

    function clearShopNameSession(Request $request)
    {
        $name = $request->input('name');
        $slug = $this->to_slug($name);
        Session::forget('minishop_shop_name'.$slug);
        return response()->json(['status' => '200', 'data' => true]);
    }

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    function getUserCustomProducts()
    {
        $accId = Auth()->user()->account_id;
        $affId = Auth()->user()->last_contact_affiliate_id;
        $string_custom_products = Minishop::getUserCustomProducts($accId);
        if($string_custom_products && $string_custom_products->products) {
            $custom_products = json_decode($string_custom_products->products);

            foreach ($custom_products as $products) {
                $origin_url = $products->products_item->origin_url;
                $mid = $products->products_item->mid;
                $tracking_url = 'https://click.adpia.vn/tracking.php?m=' . $mid . '&a=' . $affId . '&l=8888&l_cd1=3&l_cd2=0&tu=' . urlencode($origin_url);
                $products->products_item->tracking_url = $tracking_url;
            }
        } else {
            $custom_products = null;
        }

        return response()->json(['status' => '200', 'data' => array('custom_products' => $custom_products)]);
    }

    function removeUserCustomProducts(Request $request)
    {
        $pid = $request->pid ?? '';
        $accId = Auth()->user()->account_id;
        $string_custom_products = Minishop::getUserCustomProducts($accId);
        $custom_products = json_decode($string_custom_products->products);
        $remove_flag = false;

        foreach ($custom_products as $key => $products) {
            if($products->products_item->pid == $pid) {
                unset($custom_products->$key);
                $remove_flag = true;
                break;
            }
        }

        if($remove_flag) {
            if(Minishop::updateUserCustomProducts($accId, json_encode($custom_products))) {
                return response()->json(['status' => '200', 'data' => 'success']);
            } else {

            }
        }
    }

    function changeStatusUserCustomProducts(Request $request)
    {
        $status = $request->products_status;
        $pid = $request->pid;
        $accId = Auth()->user()->account_id;
        $string_custom_products = Minishop::getUserCustomProducts($accId);
        $custom_products = json_decode($string_custom_products->products);
        $update_flag = false;

        foreach ($custom_products as $key => $products) {
            if($products->products_item->pid == $pid) {
                if($status == 'active') {
                    $products->products_status = 'deactive';
                } else {
                    $products->products_status = 'active';
                }

                $update_flag = true;
                break;
            }
        }

        if($update_flag) {
            if(Minishop::updateUserCustomProducts($accId, json_encode($custom_products))) {
                return response()->json(['status' => '200', 'data' => 'success']);
            } else {

            }
        }
    }

    function setUserCustomProducts(Request $request)
    {
        $name = $request->name ?? '';
        $mid = $request->mid ?? '';
        $sale_price = $request->sale_price ?? '';
        $origin_price = $request->origin_price ?? '';
        $origin_url = $request->origin_url ?? '';
        $background = $request->background ?? '';
        $mid_logo = $request->mid_logo ?? '';

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'ms' . time() . $file->getClientOriginalName();
            $filePath = $file->getPathname();
            Upload::uploadToS3($filePath, 'affiliate_document/multi/' . $fileName);
        }
        if(isset($fileName)) {
            $image = $fileName;
        } else {
            $image = '';
        }
        $image = config('const.minishop.aws_store_img').$image;

        $accId = Auth()->user()->account_id;
        $string_custom_products = Minishop::getUserCustomProducts($accId);

        if($string_custom_products && $string_custom_products->products) {
            $custom_products = json_decode($string_custom_products->products, true);
            if(count($custom_products) >= 8) {
                return response()->json(['status' => '400', 'data' => 'error']);
            }
            $maxPid = end($custom_products)['products_item']['pid'];
        } else {
            $custom_products = array();
            $maxPid = 0;
        }

        $update_flag = false;

        $maxId = Minishop::getUserCustomProductsMaxId();

        if(!$maxId) {
            $maxId = 0;
        }

        $array_item = array(
            'products_item' => array(
                'pid' => intval($maxPid) + 1,
                'name' => $name,
                'image' => $image,
                'sale_price' => $sale_price,
                'origin_price' => $origin_price,
                'origin_url' => $origin_url,
                'background' => $background,
                'mid' => $mid,
                'mid_logo' => $mid_logo
            ),
            'products_status' => 'active'
        );

        array_push($custom_products, $array_item);

        $json_array = json_encode($custom_products);

        if(!$string_custom_products) {
            $json_string = '{"1":' . substr($json_array, 1, strlen($json_array) - 2) . '}';

            $insert_array = array(
                'ID' => intval($maxId) + 1,
                'ACCOUNT_ID' => $accId,
                'PRODUCTS' => $json_string
            );

            if(Minishop::setUserCustomProducts($insert_array)) {
                return response()->json(['status' => '200', 'data' => 'insert']);
            }

            return response()->json(['status' => '400', 'data' => 'error']);
        } else {
            if($string_custom_products->products == "{}") {
                $json_string = '{"1":' . substr($json_array, 1, strlen($json_array) - 2) . '}';
                $json_array = $json_string;
            }

            if(Minishop::updateUserCustomProducts($accId, $json_array)) {
                return response()->json(['status' => '200', 'data' => 'insert']);
            }

            return response()->json(['status' => '400', 'data' => 'error']);
        }
        
        return response()->json(['status' => '400', 'data' => 'error']);
    }

    function updateUserCustomProducts(Request $request)
    {
        $pid = $request->pid ?? '';
        $name = $request->name ?? '';
        $mid = $request->mid ?? '';
        $sale_price = $request->sale_price ?? '';
        $origin_price = $request->origin_price ?? '';
        $origin_url = $request->origin_url ?? '';
        $background = $request->background ?? '';
        $mid_logo = $request->mid_logo ?? '';
        $old_image = $request->old_image ?? '';

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'ms' . time() . $file->getClientOriginalName();
            $filePath = $file->getPathname();
            Upload::uploadToS3($filePath, 'affiliate_document/multi/' . $fileName);
        }
        if(isset($fileName)) {
            $image = config('const.minishop.aws_store_img').$fileName;
        } else {
            $image = $old_image;
        }

        $accId = Auth()->user()->account_id;
        $string_custom_products = Minishop::getUserCustomProducts($accId);
        $custom_products = json_decode($string_custom_products->products);
        $update_flag = false;

        foreach ($custom_products as $key => $products) {
            if($products->products_item->pid == $pid) {
                $products->products_item->name = $name;
                $products->products_item->image = $image;
                $products->products_item->mid = $mid;
                $products->products_item->sale_price = $sale_price;
                $products->products_item->origin_price = $origin_price;
                $products->products_item->origin_url = $origin_url;
                $products->products_item->background = $background;
                $products->products_item->mid_logo = $mid_logo;

                $update_flag = true;
                break;  
            }
        }

        if($update_flag) {
            if(Minishop::updateUserCustomProducts($accId, json_encode($custom_products))) {
                return response()->json(['status' => '200', 'data' => 'update']);
            } else {

            }
        }
    }

    function checkMerchantApproveByUrl(Request $request) {
        $url = $request->origin_url;
        $selectMid = $request->mid;
        $base_url = parse_url($url)['scheme'] . "://" . parse_url($url)['host'];

        $result = Minishop::getMerchantByUrl($base_url);

        if($result) {
            $mid = $result->merchant_id;
            if($mid != $selectMid) {
                return response()->json(['status' => '300']);
            }
            $affId = Auth()->user()->last_contact_affiliate_id;

            $merchant = Minishop::getMerchantsApproveByAffId($affId, $mid);

            if($merchant && count($merchant) > 0) {
                return response()->json(['status' => '200']);
            } else {
                return response()->json(['status' => '100']);
            }
        } else {
            return response()->json(['status' => '400']);
        }
    }
}