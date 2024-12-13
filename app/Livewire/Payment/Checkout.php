<?php

namespace App\Livewire\Payment;

use App\Models\Frontend\ShoppingCartController;
use App\Models\Payment\Invoice;
use App\Models\Payment\InvoiceItems;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe as transfer;
use Stripe\Charge;
class Checkout extends Component
{
    public $products, $total, $first_name, $last_name, $email, $phone, $address, $town,$country;

    public function mount()
    {
        $cart = session('cart');

        if (auth()->check()) {
            $this->products = ShoppingCartController::with('images')->where('user_id', auth()->id())->get();
        }else{
            $this->products = collect($cart)->map(function ($item) {
                // Assuming $item has 'name', 'price', and 'quantity', adjust as needed
                return (object) $item;
            });
        }

        $this->calculateTotal();
    }

    public function calculateTotal()
    {

        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price * $product->quantity;
        }
        if($total < 2500){
            $result = $total + 199;
        }else{
            $result = $total;
        }

        $total = number_format($result, 0, ',', ' ');
        $this->total = $total;
    }

    public function checkout()
    {
        if(auth()->check()){
            $id = auth()->id();
        }else{
            $id = null;
        }
        $total = (float) str_replace(' ','',$this->total);
        \Stripe\Stripe::setApiKey('sk_test_51QJNa2Kv73VsZdxgBeBXGcmupT45VxpJuebFcOaaTOyP6JK5FNsZjHTMfGQerK9d5fa5Vpa0cj1sxk0wDo3SwABV00F4mWeGQ7');

        if (is_array($this->total)) {
            dd("Total is an array. Something went wrong.");
        }

        // Vytvoření checkout session
        try{
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'czk',
                        'product_data' => [
                            'name' => 'name',
                        ],
                        'unit_amount' => $total * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success'),
//            'cancel_url' => route('cancel'),
            ]);
        }catch (\Exception $e){
            dd($e->getMessage());
        }

        if($session->mode === 'payment'){
            $invoice = Invoice::create([
                    'use_id' => $id,
                    'invoice_number' => $session->id,
                    'amount_subtotal' => $session->amount_subtotal / 100,
                    'created' => $session->created,
                    'currency' => $session->currency,
                    'status' => $session->mode,
                    'name' => $this->first_name.' '.$this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'town' => $this->town,
                    'country' => $this->country,
                ]);

            foreach ($this->products as $cartItem) {
                InvoiceItems::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $cartItem->product_id, // ID produktu
                    'quantity' => $cartItem->quantity, // Množství
                    'total' => $cartItem->total, // Celková cena
                    'discount' => 0, // Sleva
                    'tax' => 21, // Daň
                ]);
            }

            session()->forget('cart');
        }

            // Přesměrování na Stripe Checkout
            return redirect()->away($session->url);

    }


    public function render()
    {
        return view('livewire.payment.checkout',[
            'products' => $this->products,
            'total' => $this->total,
        ]);
    }
}
