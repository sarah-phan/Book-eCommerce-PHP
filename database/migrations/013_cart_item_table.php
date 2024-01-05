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
        Schema::dropIfExists('cart_item');
        Schema::create('cart_item', function (Blueprint $table) {
            $table->uuid('cart_item_id')->primary();
            $table->uuid('cart_id');
            $table->uuid('book_id');
            $table->integer('quantity');

            $table->foreign('book_id')->references('book_id')->on('book');
            $table->foreign('cart_id')->references('cart_id')->on('cart');
        });
    }
};
