<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use App\Models\Frontend\ProductImages;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\WishListModel;
use Livewire\Component;

class Home extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::with('images')->limit(12)->get();
//        dd($this->products);
    }

    public function addToWishList($product_id)
    {
        if(auth()->check()) {
            $userId = auth()->id();
            WishListModel::updateOrCreate([
                'product_id' => $product_id,
                'user_id' => $userId,
            ]);
            $this->dispatch('message',[
                'text' => 'Produkt byl úspěšně přidán do seznamu přání',
                'type' => 'success',
                'status' => '200',
            ]);
        }else{
            return redirect('user/login');
        }
    }

    public function render()
    {
        return view('livewire.frontend.pages.home',[
            'products' => $this->products,
        ]);
    }
}
