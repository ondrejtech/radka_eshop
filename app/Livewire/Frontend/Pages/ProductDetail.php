<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\ProductImages;
use App\Models\Frontend\ShoppingCartController;
use Livewire\Component;

class ProductDetail extends Component
{
    public $id;
    public $quantity = 1;
    public $products, $quantityIncrement, $quantityDecrement;
    public function mount()
    {
        $id = request()->route('id');
        $this->products = Product::findOrFail($id);
    }

    public function incrementQuantity()
    {
        $this->quantity++;
        $this->dispatch('message',[
            'text' => 'Množství bylo úspěšně zvýšeno',
            'type' => 'success',
            'status' => '200',
        ]);
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->dispatch('message',[
                'text' => 'Množství bylo úspěšně sníženo',
                'type' => 'success',
                'status' => '200',
            ]);
        }else{
            $this->quantity = 1;
            $this->dispatch('message',[
                'text' => 'Množství nesmí být menší než 1',
                'type' => 'error',
                'status' => '404',
            ]);
        }

    }

    public function addProductToCart()
    {
        if (auth()->check()) {
            $shoppingCart = ShoppingCartController::where('product_id', $this->products->id)->where('user_id', auth()->id())->first();
            if ($shoppingCart) {
                $shoppingCart->quantity = $shoppingCart->quantity + $this->quantity;
                $shoppingCart->total = $shoppingCart->quantity * $this->products->standard_price;
                $shoppingCart->save();
                $this->dispatch('message',[
                    'text' => 'Zboží bylo úspěšně přidáno do košíku',
                    'type' => 'success',
                    'status' => '200',
                ]);
            } else {
                ShoppingCartController::create([
                    'product_id' => $this->products->id,
                    'user_id' => auth()->id(),
                    'quantity' => $this->quantity,
                    'price' => $this->products->standard_price,
                    'total' => $this->quantity * $this->products->standard_price,
                ]);
                $this->dispatch('message',[
                    'text' => 'Zboží bylo úspěšně přidáno do košíku',
                    'type' => 'success',
                    'status' => '200',
                ]);
            }
        }else{
            $this->dispatch('message',[
                'text' => 'Pro přidání zboží do košíku se musíte přihlásit',
                'type' => 'error',
                'status' => '404',
            ]);

            return redirect('admin/login');
        }
    }

    public function addToWishList($product_id)
    {
        if (auth()->check()) {
            $wishList = WishList::where('product_id', $product_id)->where('user_id', auth()->id())->first();
            if ($wishList) {
                $this->dispatch('message',[
                    'text' => 'Zboží již bylo přidáno do seznamu přání',
                    'type' => 'error',
                    'status' => '404',
                ]);
            } else {
                WishList::create([
                    'product_id' => $product_id,
                    'user_id' => auth()->id(),
                ]);
                $this->dispatch('message',[
                    'text' => 'Zboží bylo úspěšně přidáno do seznamu přání',
                    'type' => 'success',
                    'status' => '200',
                ]);
            }
        }else{
            $this->dispatch('message',[
                'text' => 'Pro přidání zboží do seznamu přání se musíte přihlásit',
                'type' => 'error',
                'status' => '404',
            ]);

            return redirect('admin/login');
        }
    }

    public function render()
    {
        return view('livewire.frontend.pages.product-detail', [
            'images' => $this->products->images,
            'product' => $this->products,
        ]);
    }
}
