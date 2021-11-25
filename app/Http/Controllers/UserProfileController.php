<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfileImage;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){
        
        $profileImage = UserProfileImage::where('user_id', Auth::user()->id)->first();
    
        return view('shop_owner.profile',compact('profileImage'));
    }


    public function updateImage(Request $request,$id) 
    {
     
        $request->validate([

            'image' => 'required|image',
        ]);

        $profileImage = UserProfileImage::where('user_id', $id)->get()->count();

    
        if ($profileImage <= 0) 
        {
            $profile_image = new UserProfileImage();
            $image = $request->file('image');
            $imageFullName = $id. 'profile_image.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/userProfile');
            $image->move($location, $imageFullName);
            $profile_image->image = $imageFullName;
            $profile_image->user_id = $id;
            $profile_image->save(); 
            return back()->with('upload_image','Upload Image Successfully');    
        } 

        else 
        {
            $profile_image = UserProfileImage::where('user_id',$id)->first();
            $image = $request->file('image');
            $imageFullName = $id. 'profile_image.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/userProfile');
            $image->move($location, $imageFullName);
            $profile_image->image = $imageFullName;
            $profile_image->update();

            return back()->with('update_image','Update Image Successfully');    
        }
    }

    public function updateinfo(Request $request,$id) 
    {
     
        $request->validate([

            'name'  => 'required',
            'email' => 'required',
        ]);

        $user_info = User::where('id',$id)->first();
        $user_info->name = $request->name;
        $user_info->email = $request->email;
        $user_info->update();

        return back()->with('update_info','Update Info Successfully');   


    }

    public function updatepassword(Request $request) 
    {
     
        $request->validate([

            'current_password'  => 'required',
            'password'          => 'required|confirmed',
        ]);


        if (Hash::check($request->current_password, Auth::user()->password) ) 
        {
           $password = User::where('id', Auth::user()->id)->first();

           $password->password = Hash::make($request->password);
           $password->update();

           $user = Auth::user();
           Auth::login($user);

           return back()->with('update_pass','Update Password Successfully');
        } 

        else 
        {
            return back()->with('deny_pass','Current password is incorrect');
        }
        
    }
}
