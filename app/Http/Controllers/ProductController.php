<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

            'product_name' => 'required',
            'details'      => 'required',
            'image'        => 'required|image',
            'size'         => 'required',
            'price'        => 'required',
            'category_id'  => 'required',
        ]);


        $data = Product::create($request->except(['_token','extras_id']) + ['created_at' => Carbon::now()]);

        $image = $request->file('image');
        $filename = $data->id .'.'. $image->extension('image');
        $location = public_path('uploads/product');
        $image->move($location,$filename);
        $data->image = $filename;
        $data->update();


       

        foreach ($request->extras_id as $item) 
        {
         $extras = new Extra();
         $extras->product_id = $data->id;
         $extras->extras_id = $item;
         $extras->save();
        }
        
       

        return redirect()->route('userProducts.index')->with('product_success','Add Product Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $request->validate([

            'product_name' => 'required',
            'details'      => 'required',
            'size'         => 'required',
            'price'        => 'required',
            'category_id'  => 'required',
        ]);


        $data = Product::find($id);
        $data->update($request->except(['_token','extras_id','image']) + ['updated_at' => Carbon::now()]);


        $image = $request->file('image');

        if($image)
        {
            $filename = $data->id .'.'. $image->extension('image');
            $location = public_path('uploads/product');
            $image->move($location,$filename);
            $data->image = $filename;
            $data->update();
        }
       

       
        $extra_delete = Extra::where('product_id',$data->id)->get();

        foreach ($extra_delete as $value) {
            $value->delete();
        }
        
        foreach ($request->extras_id as $item) 
        {
         $extras = new Extra();
         $extras->product_id = $data->id;
         $extras->extras_id = $item;
         $extras->save();
        }

       
       

        return redirect()->route('userProducts.index')->with('product_success','Add Product Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();

        $extra_delete = Extra::where('product_id',$id)->get();

        foreach ($extra_delete as $value) {
            $value->delete();
        }

        return redirect()->route('userProducts.index')->with('product_delete','Deleted Product Successfully');
    }
}
