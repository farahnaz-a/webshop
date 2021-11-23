<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductExtra;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::latest()->get();
        return view('admin.shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'shop_name'   => 'required',
            'owner_name'  => 'required',
            'email'       => 'required|unique:users',
            'phone_number'=> 'required',
            'address'     => 'required',
            'domain_name' => 'required',
            'image'       => 'required|image',
            'details'     => 'required',
        ]);

      
        $reg = new User();
        $reg->name = $request->owner_name;
        $reg->email = $request->email;
        $reg->password = bcrypt('@@Bladepro@123@@');
        $reg->save();


        $shop = Shop::create($request->except('_token') + ['user_id' => $reg->id] + ['created_at' => Carbon::now()]);

        $shop->token = $shop->shop_name. '-' . Str::random(10);

        $image = $request->file('image');
        $imageFullName = $shop->id. 'shop.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/shop');
        $image->move($location, $imageFullName);
        $shop->image = $imageFullName;
        $shop->update();

        return redirect()->route('shops.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop       = Shop::where('id',$id)->first();
        $product    = Product::where('shop_id',$id)->orderBy('created_at', 'asc')->get();
        $categories = Category::where('shop_id',$shop->id)->get();
        $extras     = ProductExtra::where('shop_id',$shop->id)->get();
        return view('admin.shop.shop_details',compact('shop','product','categories','extras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
