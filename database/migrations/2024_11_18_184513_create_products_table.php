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
            $table->id();
            $table->string('name');
            $table->string('currency', 3)->default('CZK');
            $table->decimal('standard_price', 10, 2)->nullable();
            $table->integer('stock_amount')->default(0);
            $table->string('image_name')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->foreignId('category_code')->nullable()->constrained('categories', 'category_code')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
};
