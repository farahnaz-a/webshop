<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Admin Controller
Route::group(['prefix' => 'admin','middleware' => 'auth', 'middleware' => 'CheckAdmin'], function(){

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    //Shop Controller
    Route::resource('shops', ShopController::class);


    //Admin Product Controller
    Route::resource('products', AdminProductController::class);

});



//Admin Controller
Route::group(['prefix' => 'user','middleware' => 'auth'], function(){

    Route::get('/dashboard', [UserController::class, 'index'])->name('shop_owner.dashboard');

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
