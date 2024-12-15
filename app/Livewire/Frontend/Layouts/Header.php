<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\Category\Category;
use Livewire\Component;

class Header extends Component
{
    public $category;
    public $subcategory = [];
    public function mount()
    {
        $this->category = Category::take(4)->get();
    }

    public function subcategory(int$category_code)
    {
        dd('data');
    }

    public function render()
    {
        return view('livewire.frontend.layouts.header',[
            'category' => $this->category
        ]);
    }
}
