<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use App\Models\Frontend\ProductImages;
use Livewire\Component;

class ProductDetail extends Component
{
    public $id;
    public $products;
    public function mount()
    {
        $id = request()->route('id');
        $this->products = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.frontend.pages.product-detail', [
            'images' => $this->products->images,
            'product' => $this->products,
        ]);
    }
}
