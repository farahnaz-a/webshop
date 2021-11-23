<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Extra;
use App\Models\Product;
use App\Models\ProductExtra;
use App\Models\Shop;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Str;

class UserController extends Controller
{
    public function index(){

      $shop = Shop::where('user_id',Auth::user()->id)->first();
      $product = [];
      $year = Carbon::now()->format('Y');

      for ($i=1; $i <= 12 ; $i++)
      { 
        $product[]=Product::where('shop_id',$shop->id)->whereMonth('created_at' ,'<=' ,$i)->count();
      }


      $category = Category::where('shop_id',$shop->id)->get();

      $produt_by_category = [];
      $category_product = [];

      foreach ($category as  $item) 
      {
        $produt_by_category [] = Product::where('category_id' , $item->id)->count();
        $category_product [] = $item->name;

      }

      return view('shop_owner.index',compact('product','shop','category_product','produt_by_category'));
    }
 
    public function product(){


        $shop = Shop::where('user_id', Auth::user()->id)->first();
        $product = Product::where('shop_id',$shop->id)->get();
        $categories = Category::where('shop_id',$shop->id)->get();
        $extras = ProductExtra::where('shop_id',$shop->id)->get();

      

        return view('shop_owner.products.index',compact('shop','product','categories','extras'));
    }

    // public function getlist()
    // {
    //   $response = Http::get('https://dgtaltech.com/api/articles',);

    //   foreach ($response->json() as $value) {
     
    //      $collect = collect($value); 
         
    //      echo $collect['title'];
            
    //   }
    //}
 
  public function generateApi($id)
  {
    $shop = Shop::where('id',$id)->first();
    $shop->token =  $shop->shop_name. '-' . Str::random(10);
    $shop->save();
    return redirect()->route('shops.index')->with('success','API key Created Successfully');
  
  }

}
