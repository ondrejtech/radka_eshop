<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImages extends Model
{

    use HasFactory;

    protected $table = 'product_images'; // Ujistěte se, že tabulka existuje

    protected $fillable = ['product_id', 'URL'];

    public function product()
    {
        return $this->belongsTo(Wishlist::class, 'product_id', 'id');
    }

    public function shoppingCarts(): BelongsTo
    {
        return $this->belongsTo(ShoppingCartController::class);
    }
}
