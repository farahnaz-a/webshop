<?php

use App\Http\Controllers\API\ShopController;
use Illuminate\Support\Facades\Route;



Route::get('/api={token}', [ShopController::class, 'show']);
Route::get('/products/api={token}', [ShopController::class, 'products']);
Route::get('/product/{id}/api={token}', [ShopController::class, 'product']);