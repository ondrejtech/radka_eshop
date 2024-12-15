<?php

namespace App\Livewire\Frontend\Modal;

use App\Models\Frontend\Product;
use Livewire\Component;

class CanvasSearch extends Component
{
    public $search = '';
    public $products = [];

    public function updatedSearch()
    {
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get();
    }
    public function render()
    {
        return view('livewire.frontend.modal.canvas-search',[
            'products' => $this->products
        ]);
    }
}
