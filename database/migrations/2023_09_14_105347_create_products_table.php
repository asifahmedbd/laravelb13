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
            $table->increments('product_id');
            $table->string('product_title');
            $table->integer('category_id');
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_sku');
            $table->string('product_price');
            $table->integer('product_unit')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->tinyInteger('top_selling')->nullable();
            $table->tinyInteger('is_refundable')->nullable();
            $table->timestamps();
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
