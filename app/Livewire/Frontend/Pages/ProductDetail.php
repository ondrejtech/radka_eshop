<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $id;

    public function mount()
    {
       $this->product = Product::find($this->id);
//       dd($this->product);

    }

    public function render()
    {
        return view('livewire.frontend.pages.product-detail');
    }
}
