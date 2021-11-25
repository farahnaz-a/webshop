<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class UserShopDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop       = Shop::where('user_id',Auth::user()->id)->first();
        return view('shop_owner.shop_details',compact('shop'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'shop_name'   => 'required',
            'owner_name'  => 'required',
            'email'       => 'required|unique:users,id,:id',
            'phone_number'=> 'required',
            'address'     => 'required',
            'domain_name' => 'required',
            'image'       => 'image',
            'details'     => 'required',
        ]);



      
        $shop = Shop::where('user_id',Auth::user()->id)->first();

        if ($request->email != null) 
        {
           $user = User::where('id',$shop->user_id)->first();
           $user->email = $request->email;
           $user->update();
        }

        $shop->update($request->except('_token') + ['created_at' => Carbon::now()]);

        // $shop->token = $shop->shop_name. '-' . Str::random(10);

        $image = $request->file('image');
        if ($image) 
        {
            $imageFullName = $shop->id. 'shop.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/shop');
            $image->move($location, $imageFullName);
            $shop->image = $imageFullName;
            $shop->update();
        }

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
