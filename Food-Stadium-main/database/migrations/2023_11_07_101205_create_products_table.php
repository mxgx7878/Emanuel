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
            $table->string('title');
            $table->string('description');
            $table->string('feature_image');
            $table->double('product_price',8,2);

            $table->integer('category_id');
            $table->integer('menu_id');
            $table->integer('dietary_id')->nullable();
            $table->integer('store_id');
            $table->tinyInteger('is_trending')->default(0);
            $table->tinyInteger('is_popular')->default(0);
            $table->json('customize_item_id')->nullable();
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
