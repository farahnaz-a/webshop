<?php

use Illuminate\Support\Facades\Auth;

function shop(){

    return \App\Models\Shop::where('user_id',Auth::user()->id)->first();
}