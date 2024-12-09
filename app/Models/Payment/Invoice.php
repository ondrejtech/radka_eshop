<?php

namespace App\Models\Payment;

use App\Models\Frontend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Stripe\InvoiceItem;


class Invoice extends Model
{
    use HasFactory;

    // Určujeme název tabulky, pokud neodpovídá konvenci Laravelu
    protected $table = 'invoices';

    // Určujeme sloupce, které budou hromadně přiřazovány
    protected $fillable = [
        'user_id',
        'invoice_number',
        'amount_subtotal',
        'created',
        'currency',
        'status',
        'name',
        'email',
        'phone',
        'address',
        'town',
        'country',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItems::class);
    }
}
