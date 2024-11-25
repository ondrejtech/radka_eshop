<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Frontend\ShoppingCartController;
use App\Models\Frontend\Transport;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $products, $carts, $transports, $image;
    public $subtotal = null;
    public $subtotalSession = null;

    protected $listeners = [
        'updateQuantity' => '$refresh',
        'updateSubtotal' => 'updateSubtotal',
        'subtotalSession' => 'subtotalSession',
    ];

    public function mount()
    {
        $this->carts = ShoppingCartController::where('user_id', auth()->id())
            ->with('product')
            ->get();

        foreach ($this->carts as $cart) {
            $this->subtotal += $cart->total;
        }

        $this->transports = Transport::all();
        $this->totalPriceSession();
    }

    public function decrementQuantity($cart_id)
    {
        $cart = ShoppingCartController::where('user_id', auth()->id())
            ->where('id', $cart_id)
            ->first();

        if($cart){
            if($cart->quantity < 2){
                $cart->quantity = 1;
                $this->dispatch('message',[
                    'text' => 'Množství nesmí být menší než 1',
                    'type' => 'error',
                    'status' => '400',
                ]);
            }else{
                $cart->quantity--;
                $cart->total = $cart->quantity * $cart->price;
                $this->updateSubtotal();
                $cart->save();
                $this->dispatch('message',[
                    'text' => 'Množství bylo úspěšně sníženo',
                    'type' => 'success',
                    'status' => '200',
                ]);
            }
        }
        $this->dispatch('updateQuantity');
    }

    public function incrementQuantity($cart_id)
    {
        $cart = ShoppingCartController::where('user_id', auth()->id())
            ->where('id', $cart_id)
            ->first();

        if($cart){
            $cart->quantity += 1;
            $cart->total = $cart->quantity * $cart->price;
            $this->updateSubtotal();
            $cart->save();
        }
        $this->dispatch('message',[
            'text' => 'Množství bylo úspěšně zvýšeno',
            'type' => 'success',
            'status' => '200',
        ]);
        $this->dispatch('updateQuantity');
    }

    public function removeItem($cart_id)
    {
        $cart = ShoppingCartController::where('user_id', auth()->id())
            ->where('id', $cart_id)
            ->first();

        if($cart){
            $cart->delete();
            $this->updateSubtotal();

            $this->dispatch('message',[
                'text' => 'Zboží bylo odebráno z košíku',
                'type' => 'success',
                'status' => '200',
            ]);
        }else{
            $this->dispatch('message',[
                'text' => 'Zboží nebylo nalezeno',
                'type' => 'error',
                'status' => '400',
            ]);
        }
        $this->totalPriceSession();
    }


    public function updateSubtotal()
    {
        $this->subtotal = $this->carts->sum('total');
        $this->dispatch('updateSubtotal', $this->subtotal);
    }

    public function decrementQuantitySession($product_id)
    {
        if(session()->has('cart')){
            $foundKey = null;

            foreach(session()->get('cart') as $key => $cart){
                if($cart['product_id'] == $product_id){
                    $foundKey = $key;
                    break;
                }
            }
            $cart = session()->get('cart')[ $foundKey ];
            if($cart['quantity'] < 2){
                $cart[$foundKey]['quantity'] = 1;
                session()->put('cart'.$foundKey, $cart);
                $this->dispatch('message',[
                    'text' => 'Množství nesmí být menší než 1',
                    'type' => 'error',
                    'status' => '400',
                ]);
            }else{
                if($foundKey !== null){
                    $cart['quantity']--;
                    $cart['total'] = $cart['quantity'] * $cart['price'];
                    session()->put('cart.'.$foundKey, $cart);
                    $this->dispatch('message',[
                        'text' => 'Množství bylo úspěšně sníženo',
                        'type' => 'success',
                        'status' => '200',
                    ]);
                }
            }
        }
        $this->totalPriceSession();
    }

    public function incrementQuantitySession(int $product_id)
    {
        if(session()->has('cart')){
            $foundKey = null;

            foreach(session()->get('cart') as $key => $cart){
                if($cart['product_id'] == $product_id){
                    $foundKey = $key;
                    break;
                }
            }
            $cart = session()->get('cart')[ $foundKey ];

            if($foundKey !== null){
                $cart['quantity']++;
                $cart['total'] = $cart['quantity'] * $cart['price'];
                session()->put('cart.'.$foundKey, $cart);
                $this->dispatch('message',[
                    'text' => 'Množství bylo úspěšně zvýšeno',
                    'type' => 'success',
                    'status' => '200',
                ]);
            }
        }
        $this->totalPriceSession();
    }

    public function totalPriceSession()
    {
        $this->subtotalSession = collect(session()->get('cart'))
            ->sum(function ($item){
                return $item['total'];
            });
        $this->dispatch('subtotalSession', $this->subtotalSession);
    }

    public function removeItemSession(int $product_id)
    {
        if(session()->has('cart')){
            $foundKey = null;

            foreach(session()->get('cart') as $key => $cart){
                if($cart['product_id'] == $product_id){
                    $foundKey = $key;
                    break;
                }
            }
            if($foundKey !== null){
                session()->forget('cart.'.$foundKey);
                $this->dispatch('message',[
                    'text' => 'Zboží bylo odebráno z košíku',
                    'type' => 'success',
                    'status' => '200',
                ]);
            }
        }
        $this->totalPriceSession();
    }

    public function render()
    {
        $cartsWithImages = $this->carts->map(function ($cart) {
            $cart->image = $cart->image;  // Získání obrázku pro každý produkt
            return $cart;
        });

        $cartSession = session()->get('cart');

        return view('livewire.frontend.pages.shopping-cart',[
            'text' => $this->carts,
            'products' => $this->products,
            'transports' => $this->transports,
            'subtotal' => $this->subtotal,
            'subtotalSession' => $this->subtotalSession,
            'carts' => $cartsWithImages,
            'cartSession' => $cartSession,
        ]);
    }
}
