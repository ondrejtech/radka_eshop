<?php

namespace App\Models\Frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishListModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);  // Assuming a 'product_id' foreign key
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
