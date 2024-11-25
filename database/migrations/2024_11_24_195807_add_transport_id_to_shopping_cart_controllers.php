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
        Schema::table('shopping_cart_controllers', function (Blueprint $table) {
            $table->foreignId('transport_id')->nullable()->constrained('transports')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shopping_cart_controllers', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropColumn('transport_id');
        });
    }
};
