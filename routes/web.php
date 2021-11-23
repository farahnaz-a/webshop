<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExtraController;
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
    return redirect()->route('login');
});

Route::get('/register', function () {
    return redirect()->back();
});

//Admin Controller
Route::group(['prefix' => 'admin','middleware' => ['auth','CheckAdmin']], function(){

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Shop Controller
    
    //Admin Product Controller
    // Route::resource('products', AdminProductController::class);
    Route::resource('shops', ShopController::class);


    //Admin Profile
    Route::get('/profile/index', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/image/{id}', [AdminProfileController::class, 'updateImage'])->name('admin.profileimage');
    Route::post('/profile/info/{id}', [AdminProfileController::class, 'updateinfo'])->name('admin.profileinfo');
    Route::post('/profile/password', [AdminProfileController::class, 'updatepassword'])->name('admin.profilepassword');

    // Route::get('/shop/products/{name}', [AdminProductController::class, 'index'])->name('products.index');

    // Route::get('/shop/products/{name}', [AdminController::class, 'AdminIndex'])->name('adminProducts.index');

    // Route::resource('admincategories', CategoryController::class);

    // Route::resource('adminextras', ProductExtraController::class);

    // Route::resource('adminproducts', ProductController::class);
      
});



Route::get('getlist', [UserController::class, 'getlist']);
//Admin Controller
Route::group(['prefix' => 'user','middleware' => ['auth','CheckUser']], function(){

    Route::get('/dashboard', [UserController::class, 'index'])->name('shop_owner.dashboard');
    Route::get('/generate-api/{id}', [UserController::class, 'generateApi'])->name('generate.api');


    Route::get('/shop/products', [UserController::class, 'product'])->name('userProducts.index');

    Route::resource('categories', CategoryController::class);

    Route::resource('extras', ProductExtraController::class);

    Route::resource('products', ProductController::class);
    
    Route::get('category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('extra/delete/{id}',[ProductExtraController::class, 'destroy'])->name('extra.delete');

});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
