<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use hasFactory;

    protected $table = 'products';

    protected $casts = [
        'id' => 'integer',
        'adult' => 'boolean',
        'categories' => 'array',
        'flags' => 'array',
        'allows_iplatba' => 'boolean',
        'allows_pay_online' => 'boolean',
        'heureka_category_id' => 'integer',
        'zbozi_category_id' => 'integer',
        'google_category_id' => 'integer',
        'glami_category_id' => 'integer',
        'free_shipping' => 'boolean',
        'free_billing' => 'boolean',
        'logistic_weight' => 'decimal:2',
        'atypical_shipping' => 'boolean',
        'atypical_billing' => 'boolean',
        'price' => 'decimal:2',
        'purchase_price' => 'decimal:2',
        'standard_price' => 'decimal:2',
        'stock_amount' => 'integer',
        'visible' => 'boolean',
        'firmy_cz' => 'boolean',
        'heureka_hidden' => 'boolean',
        'heureka_cart_hidden' => 'boolean',
        'zbozi_hidden' => 'boolean',
        'arukereso_hidden' => 'boolean',
        'arukereso_marketplace_hidden' => 'boolean',
        'decimal_count' => 'integer',
        'negative_amount' => 'boolean',
        'price_ratio' => 'decimal:2',
        'min_price_ratio' => 'decimal:2',
        'action_price' => 'decimal:2',
        'action_price_from' => 'date',
        'action_price_until' => 'date',
        'apply_loyalty_discount' => 'boolean',
        'apply_volume_discount' => 'boolean',
        'apply_quantity_discount' => 'boolean',
        'apply_discount_coupon' => 'boolean'
    ];

    protected $fillable = [
        'name',
        'guid',
        'short_description',
        'description',
        'manufacturer',
        'adult',
        'item_type',
        'categories',
        'images',
        'flags',
        'visibility',
        'xml_feed_name',
        'seo_title',
        'meta_description',
        'allows_iplatba',
        'allows_pay_online',
        'internal_note',
        'heureka_category_id',
        'zbozi_category_id',
        'google_category_id',
        'glami_category_id',
        'free_shipping',
        'free_billing',
        'unit',
        'code',
        'logistic_weight',
        'atypical_shipping',
        'atypical_billing',
        'currency',
        'price',
        'purchase_price',
        'standard_price',
        'stock_amount',
        'availability_out_of_stock',
        'visible',
        'firmy_cz',
        'heureka_hidden',
        'heureka_cart_hidden',
        'zbozi_hidden',
        'arukereso_hidden',
        'arukereso_marketplace_hidden',
        'decimal_count',
        'negative_amount',
        'price_ratio',
        'min_price_ratio',
        'action_price',
        'action_price_from',
        'action_price_until',
        'apply_loyalty_discount',
        'apply_volume_discount',
        'apply_quantity_discount',
        'apply_discount_coupon',
        'image_name'
    ];

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id'); // 'product_id' je cizí klíč v tabulce product_images
    }

    public function shoppingCart(): HasMany
    {
        return $this->hasMany(ShoppingCartController::class, 'product_id');
    }
}
