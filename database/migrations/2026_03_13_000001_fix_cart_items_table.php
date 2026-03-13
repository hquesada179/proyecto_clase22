<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // La tabla original requería user_id NOT NULL (sin auth) y no tenía quantity.
        // Se recrea con la estructura correcta para el carrito sin autenticación.
        Schema::dropIfExists('cart_items');

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('id')->on('products');
        });
    }
};
