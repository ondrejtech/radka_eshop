<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\Product;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\ProductImages;
use App\Models\Frontend\ShoppingCartController;
use App\Models\Frontend\WishListModel;
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
            // open session with email
            $cart = session()->get('cart', []);
            $foundKey = null;
            foreach ($cart as $key => $item) {
                if ($item['product_id'] === $this->products->id) {
                    $foundKey = $key;
                    break;
                }
            }
            if ($foundKey !== null) {
                $cart[$foundKey]['name'] = $this->products->name;
                $cart[$foundKey]['quantity'] += $this->quantity;
                $cart[$foundKey]['total'] = $cart[$foundKey]['quantity'] * $this->products->standard_price;
            } else {
                // Pokud produkt neexistuje v košíku, přidejte nový
                $cart[] = [
                    'product_id' => $this->products->id,
                    'name' => $this->products->name,
                    'quantity' => $this->quantity,
                    'price' => $this->products->standard_price,
                    'total' => $this->quantity * $this->products->standard_price,
                ];
            }

            // Uložit aktualizovaný košík zpět do session
            session()->put('cart', $cart);
            $this->dispatch('message',[
                'text' => 'Zboží bylo úspěšně přidáno do košíku',
                'type' => 'success',
                'status' => '200',
            ]);
        }
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
        return view('livewire.frontend.pages.product-detail', [
            'images' => $this->products->images,
            'product' => $this->products,
        ]);
    }
}
