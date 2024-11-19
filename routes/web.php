<?php

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


route::get('scan', function(){
    $path = public_path('assets/fonts');
    $jsFiles = array_filter(scandir($path), function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'css';
    });

    dd($jsFiles);
})->name('scan');
