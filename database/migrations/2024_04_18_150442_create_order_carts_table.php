<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
             /* Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('order_cart', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('order_id')->constrained();
                    $table->foreignId('product_id')->constrained();
                    $table->integer('quantity');
                    $table->timestamps();
                });
            }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_carts');
    }
};
