<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Shop;
use Carbon\Carbon;

class CategoryController extends Controller
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
            'name'  => 'required',
            'image' => 'required|image',
        ]);

        $data = Category::create($request->except('_token') + ['created_at' => Carbon::now()]);
        $shop_name = Shop::find($request->shop_id)->pluck('shop_name');

      
        $image = $request->file('image');
        $filename = $data->id .'.'. $image->extension('image');
        $location = public_path('uploads/product_category');
        $image->move($location,$filename);
        $data->image = $filename;
        $data->update();

        return redirect()->route('userProducts.index')->with('category_success','Add Category Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        $products = Product::where('category_id',$id)->get();

        foreach ($products as $product) {
           
            $product->delete();
        }

        return redirect()->route('userProducts.index')->with('category_delete','Delete Category Successfully');
    }
}
