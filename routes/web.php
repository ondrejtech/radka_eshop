<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Route::fallback(function () {
    return view('error404');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product-details/{id}', [\App\Http\Controllers\Frontend\ProductDetailController::class,'productDetail'])->name('product-details');
Route::get('/shopping-cart', [ShoppingCartController::class, 'shoppingCart'])->name('shopping-cart');
Route::get('wish-list', [WishListController::class, 'wishList'])->name('wish-list');
Route::get('category/{id}',[CategoryController::class,'viewCategory'])->name('category');
Route::get('xml',[TestController::class,'xml'])->name('xml');
