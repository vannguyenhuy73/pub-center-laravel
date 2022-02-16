<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'tshop_product';

     public function getProductRandom($cate = 'DT', $count = 4)
     {
     	$data = Product::join('tmerchant','tmerchant.MERCHANT_ID', '=', 'tshop_product.MERCHANT_ID')
     			->where('tshop_product.category', $cate)
	              ->where('tshop_product.image','!=', NULL)
				->where('tmerchant.deactive_time', NULL)
     			->orderBy('tshop_product.YYYYMMDD', 'DESC')
     			->where('PRICE','!=', NULL)
     			->get();

          if(count($data->toArray()) >= $count) {
               return $data->random($count);
          } else {
               return $data;
          }
     }

     public function getCateProduct()
     {
          $data = Product::select('tshop_product.category','tshop_category.category_code','tshop_category.code_name')
                    ->join('tshop_category','tshop_category.category_code','=','tshop_product.category')
                    ->where('tshop_product.delete_flag', 'N')
                    ->where('tshop_product.price','!=', NULL)
                    ->groupBy('tshop_product.category','tshop_category.category_code','tshop_category.code_name')
                    ->get();

          return $data;
     }
}
