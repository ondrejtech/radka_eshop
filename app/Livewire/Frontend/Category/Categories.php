<?php

namespace App\Livewire\Frontend\Category;


use App\Models\Category\Category;
use App\Models\Frontend\Product;
use Livewire\Component;

class Categories extends Component
{
    public $products, $categories, $id;

    public function mount()
    {
        $id = request()->route('id');
        $this->products = Product::with('images')
            ->where('category_code', $id)->get();

        $this->categories = Category::all();
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
        return view('livewire.frontend.category.category', [
                'products' => $this->products,
                'categories' => $this->categories
            ]);
    }
}
