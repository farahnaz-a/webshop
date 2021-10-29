<?php

use Illuminate\Support\Facades\Auth;

function shop(){

    return \App\Models\Shop::where('user_id',Auth::user()->id)->first();
}

function extras($product_id)
{
    return \App\Models\Extra::where('product_id', $product_id)->get();
}

function getProductExtras($product_id,$extras_id)
{
    return \App\Models\Extra::where('product_id', $product_id)->where('extras_id',$extras_id);
}