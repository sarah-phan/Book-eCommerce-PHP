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
        Schema::dropIfExists('order_item');
        Schema::create('order_item', function (Blueprint $table) {
            $table->uuid('order_item_id')->primary();
            $table->uuid('book_id');
            $table->uuid('order_id');
            $table->integer('quantity');

            $table->foreign('book_id')->references('book_id')->on('book');
            $table->foreign('order_id')->references('order_id')->on('order');
        });
    }
};
