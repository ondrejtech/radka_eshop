<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\WishListController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Route::fallback(function () {
    return view('error404');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product-details/{id}', [\App\Http\Controllers\Frontend\ProductDetailController::class,'productDetail'])->name('product-details');
Route::get('/shopping-cart/id=1', [ShoppingCartController::class, 'shoppingCart'])->name('shopping-cart');
Route::get('/wish-list', [WishListController::class, 'wishList'])->name('wish-list');


//Route::get('/xml', [\App\Http\Controllers\Test::class, 'xml']);
Route::get('/image', [\App\Http\Controllers\ImageScrapeController::class, 'index']);
