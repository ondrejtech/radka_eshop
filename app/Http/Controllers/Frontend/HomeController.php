<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        return view('home');
    }
}
