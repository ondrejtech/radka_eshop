<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class WishListController
{
    public function wishList()
    {
        return view('wish-list');
    }
}
