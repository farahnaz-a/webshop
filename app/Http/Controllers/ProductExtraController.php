<?php

namespace App\Http\Controllers;

use App\Models\ProductExtra;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'extras_name'  => 'required|unique:product_extras',
            'price' => 'required',
        ]);

        $data = ProductExtra::create($request->except('_token') + ['created_at' => Carbon::now()]);
        $shop_name = Shop::find($request->shop_id)->pluck('shop_name');
        
        return redirect()->route('userProducts.index')->with('category_success','Add Category Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function show(ProductExtra $productExtra)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductExtra $productExtra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductExtra $productExtra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductExtra $productExtra)
    {
        //
    }
}
