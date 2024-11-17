<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\WishListController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail', [ProductDetailController::class, 'productDetail'])->name('product-detail');
Route::get('/shopping-cart/id=1', [ShoppingCartController::class, 'shoppingCart'])->name('shopping-cart');
Route::get('/wish-list', [WishListController::class, 'wishList'])->name('wish-list');
