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
        Schema::create('customize_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->string('item_name');
            $table->string('item_pic');
            $table->double('item_price',8,2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customize_menus');
    }
};
