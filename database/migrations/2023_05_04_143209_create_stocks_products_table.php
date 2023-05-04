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
        Schema::create('stocks_products', function (Blueprint $table) {
            $table->foreignId('stocks_id')->constrained('stocks')->onDelete('cascade');
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
            $table->bigInteger('balance');
            $table->bigInteger('maximum_stock_level');
            $table->bigInteger('minimum_stock_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_products');
    }
};