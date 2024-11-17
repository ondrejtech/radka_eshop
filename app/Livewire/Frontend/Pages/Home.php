<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use Livewire\Component;

class Home extends Component
{
    public function mount()
    {
         $this->products = Product::limit(12)->get();
    }
    public function render()
    {
        return view('livewire.frontend.pages.home',[
            'products' => $this->products,
        ]);
    }
}
