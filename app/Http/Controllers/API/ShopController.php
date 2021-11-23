<?php

namespace App\Http\Controllers\API;

use App\Models\Shop;
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
}
