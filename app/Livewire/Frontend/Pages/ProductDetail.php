<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $id;
    public $product, $features;
    public function mount()
    {
        $id = request()->route('id');
        $this->product = Product::find($id);
        $this->features = Product::all();
    }

    public function render()
    {
        return view('livewire.frontend.pages.product-detail',[
            'product' => $this->product,
            'features' => $this->features,
        ]);
    }
}
