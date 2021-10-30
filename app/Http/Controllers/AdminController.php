<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function AdminIndex($name){


        $shop = Shop::where('shop_name', $name)->first();
        $product = Product::where('shop_id',$shop->id)->get();
        $categories = Category::where('shop_id',$shop->id)->get();
        $extras = Product::where('shop_id',$shop->id)->get();
        return view('shop_owner.products.index',compact('shop','product','categories','extras'));
    }
}
