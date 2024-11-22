<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{

    use HasFactory;

    protected $table = 'product_images'; // Ujistěte se, že tabulka existuje

    protected $fillable = ['product_id', 'URL'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
