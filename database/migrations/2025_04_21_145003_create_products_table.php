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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_customer', 36);
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->json('product_type_of_material')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color_print')->nullable();
            $table->json('product_finishing')->nullable();
            $table->integer('product_order_quantity')->nullable();
            $table->integer('product_deal_ammount')->nullable();
            $table->integer('product_bid_price')->nullable();
            $table->integer('product_deal_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
