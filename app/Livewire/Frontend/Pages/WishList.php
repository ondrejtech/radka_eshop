<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\WishListModel;
use Livewire\Component;

class WishList extends Component
{
    public $products, $user, $wishlists;

    public function mount()
    {
        if(!auth()->check()){
            return redirect('admin/login');
        }
        $this->user = auth()->user()->id;
        $this->loadWishList();
    }

    public function wishlistsDel(int $product_id)
    {
        WishListModel::where('user_id', $this->user)
            ->where('product_id', $product_id)
            ->delete();
        $this->loadWishList();
        $this->dispatch('message',[
            'text' => 'Produkt byl úspěšně odebrán ze seznamu přání',
            'type' => 'success',
            'status' => '200',
        ]);
    }

    public function loadWishList()
    {
        $this->products = WishListModel::where('user_id', $this->user)
            ->with('product')
            ->get()
            ->pluck('product');
    }

    public function render()
    {
        return view('livewire.frontend.pages.wish-list',[
            'wishlists' => $this->products,
        ]);
    }
}
