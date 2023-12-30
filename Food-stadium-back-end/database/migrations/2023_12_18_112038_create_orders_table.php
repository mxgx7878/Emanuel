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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_address');
            $table->integer('user_id')->nullable();
            $table->integer('vendor_id');
            $table->double('sub_total' , 8 , 2);
            $table->double('discount', 8 , 2);
            $table->double('total', 8 , 2);
            $table->integer('zipcode');
            $table->string('coupon_code')->nullable();
            $table->text('message')->nullable();
            $table->date('delivery_date');
            $table->tinyInteger('delivery_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
