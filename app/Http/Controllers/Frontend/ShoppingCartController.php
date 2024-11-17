<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ShoppingCartController
{
    public function shoppingCart()
    {
        return view('shopping-cart');
    }
}
