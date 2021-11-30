<?php

namespace App\Http\Controllers\API;

use App\Models\Shop;
use App\Models\Extra;
use App\Models\ProductExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index($name)
    {
       $shop = Shop::where('shop_name', $name)->firstOrFail();
       
       return $shop;
       
    }

    public function show($token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            return $shop;
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
        
    }
    public function products($token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            return $shop->products;
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
        
    }
    public function product($id,$token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            $product = $shop->products->find($id);
            if($product)
            {
                return $product;
            }
            else
            {
                return "Product Does not exist or Wrong API Key";
            }
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
        
    }

    public function categories($token)
    {

        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            return $shop->categories;
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }

    }

    public function categoryDetails($id,$token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            $category = $shop->categories->find($id);
            if($category)
            {
                return $category;
            }
            else
            {
                return "Category Does not exist or Wrong API Key";
            }
         

        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
    }


    public function extras($token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            return $shop->extras;
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
    }

    public function extraDetails($id,$token)
    {
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
            $extra = $shop->extras->find($id);
            if($extra)
            {
                return $extra;
            }
            else
            {
                return "Extra Does not exist or Wrong API Key";
            }
        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
    }

    public function extraProducts($id, $token)
    {
    
        $shop = Shop::where('token', $token)->first();
       
        if($shop)
        {
           $product = Extra::where('product_id', $id)->get();

            if($product)
            {
                 foreach($product as $item)
                 {
                    $extras[] =  Extra::where('product_id', $id)->get();
                 }
                foreach($extras as $extra)
                {
                   foreach($extra as $item)
                   {
                      $test[] =  $item->extras_id;
                   }
                   $productExtras = ProductExtra::findMany($test);
                    
                }
                return $productExtras;
            }
            else
            {
                return "Product Does not exist or Wrong API Key";
            }


        }
        else
        {
            return "Shop Does not exist or Wrong API key";
        }
    }
}
