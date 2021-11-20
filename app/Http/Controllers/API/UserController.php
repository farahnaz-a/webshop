<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all(); 

        return response()->json($users);
    }

    public function details($id)
    {
        $user = User::find($id); 
        return response()->json($user);
    }

}
