<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){


        //Shop Add by Mounth
        $shop = [];
        $year = Carbon::now()->format('Y');
        for ($i=1; $i <= 12 ; $i++) { 
            
            $shop[]=Shop::whereMonth('created_at',$i)->count();
        }



        //Product Count By Shop
        $produc_count = [];
        $shop_name = [];
        $total_shop = Shop::get();
        foreach ($total_shop as $item ) {
            
            $produc_count[]= Product::where('shop_id',$item->id)->get()->count();
            $shop_name[] =$item->shop_name;
        }

        return view('admin.index',compact('shop','year','produc_count','shop_name'));
    }

    public function AdminIndex($name){


        $shop = Shop::where('shop_name', $name)->first();
        $product = Product::where('shop_id',$shop->id)->get();
        $categories = Category::where('shop_id',$shop->id)->get();
        $extras = Product::where('shop_id',$shop->id)->get();
        return view('shop_owner.products.index',compact('shop','product','categories','extras'));
    }
}
