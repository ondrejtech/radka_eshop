<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->char('guid', 36);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('manufacturer')->nullable();
            $table->boolean('adult')->nullable()->default(false);
            $table->string('item_type', 50)->nullable();
            $table->json('categories')->nullable();
            $table->string('images', 250)->nullable();
            $table->json('flags')->nullable();
            $table->string('visibility', 50)->nullable();
            $table->string('xml_feed_name')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('allows_iplatba')->nullable()->default(false);
            $table->boolean('allows_pay_online')->nullable()->default(true);
            $table->text('internal_note')->nullable();
            $table->integer('heureka_category_id')->nullable();
            $table->integer('zbozi_category_id')->nullable();
            $table->integer('google_category_id')->nullable();
            $table->integer('glami_category_id')->nullable();
            $table->boolean('free_shipping')->nullable()->default(false);
            $table->boolean('free_billing')->nullable()->default(false);
            $table->string('unit', 50)->nullable();
            $table->string('code', 50)->nullable()->unique('code');
            $table->decimal('logistic_weight', 10)->nullable();
            $table->boolean('atypical_shipping')->nullable()->default(false);
            $table->boolean('atypical_billing')->nullable()->default(false);
            $table->char('currency', 3)->nullable()->default('CZK');
            $table->decimal('price', 10)->nullable();
            $table->decimal('purchase_price', 10)->nullable();
            $table->decimal('standard_price', 10)->nullable();
            $table->integer('stock_amount')->nullable()->default(0);
            $table->string('availability_out_of_stock', 50)->nullable();
            $table->boolean('visible')->nullable()->default(true);
            $table->boolean('firmy_cz')->nullable()->default(false);
            $table->boolean('heureka_hidden')->nullable()->default(false);
            $table->boolean('heureka_cart_hidden')->nullable()->default(false);
            $table->boolean('zbozi_hidden')->nullable()->default(false);
            $table->boolean('arukereso_hidden')->nullable()->default(false);
            $table->boolean('arukereso_marketplace_hidden')->nullable()->default(false);
            $table->tinyInteger('decimal_count')->nullable()->default(0);
            $table->boolean('negative_amount')->nullable()->default(false);
            $table->decimal('price_ratio', 10)->nullable();
            $table->decimal('min_price_ratio', 10)->nullable();
            $table->decimal('action_price', 10)->nullable();
            $table->date('action_price_from')->nullable();
            $table->date('action_price_until')->nullable();
            $table->boolean('apply_loyalty_discount')->nullable()->default(true);
            $table->boolean('apply_volume_discount')->nullable()->default(false);
            $table->boolean('apply_quantity_discount')->nullable()->default(false);
            $table->boolean('apply_discount_coupon')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
