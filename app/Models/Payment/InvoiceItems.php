<?php

namespace App\Models\Payment;

use App\Models\Frontend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItems extends Model
{
    use HasFactory;

    // Určujeme název tabulky, pokud neodpovídá konvenci Laravelu
    protected $table = 'invoice_items';

    // Určujeme sloupce, které budou hromadně přiřazovány
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'discount',
        'total',
        'tax',
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
