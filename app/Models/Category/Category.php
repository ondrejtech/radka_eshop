<?php

namespace App\Models\Category;

use App\Livewire\Frontend\Category\Categories;
use App\Models\Frontend\Product;
use App\Models\Frontend\ProductImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_code',
        'name',
        'parent_id',
    ];

    protected $table = 'categories';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images(): BelongsTo
    {
        return $this->belongsTo(ProductImages::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
