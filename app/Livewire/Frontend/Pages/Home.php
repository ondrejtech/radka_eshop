<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use Livewire\Component;

class Home extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::with('images')->limit(12)->get();
//        dd($this->products);
    }
    public function render()
    {
        return view('livewire.frontend.pages.home',[
            'products' => $this->products,
        ]);
    }
}
