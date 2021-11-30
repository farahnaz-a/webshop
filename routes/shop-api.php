<?php

use App\Http\Controllers\API\ShopController;
use Illuminate\Support\Facades\Route;



Route::get('/api={token}', [ShopController::class, 'show']);
Route::get('/products/api={token}', [ShopController::class, 'products']);
Route::get('/product/{id}/api={token}', [ShopController::class, 'product']);
Route::get('/categories/api={token}', [ShopController::class, 'categories']); 

Route::get('/category-details/{id}/api={token}', [ShopController::class, 'categoryDetails']); 
Route::get('/extras/api={token}', [ShopController::class, 'extras']);
Route::get('/extra-details/{id}/api={token}', [ShopController::class, 'extraDetails']);

Route::get('/extra-products/{id}/api={token}', [ShopController::class, 'extraProducts']);