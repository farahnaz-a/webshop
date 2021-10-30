<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductExtra;
use App\Models\Shop;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index(){


      return view('shop_owner.index');
    }
 
    public function product(){


        $shop = Shop::where('user_id', Auth::user()->id)->first();
        $product = Product::where('shop_id',$shop->id)->get();
        $categories = Category::where('shop_id',$shop->id)->get();
        $extras = ProductExtra::where('shop_id',$shop->id)->get();
        return view('shop_owner.products.index',compact('shop','product','categories','extras'));
    }
 

}
