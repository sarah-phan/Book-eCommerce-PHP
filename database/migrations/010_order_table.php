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
        Schema::dropIfExists('order');
        Schema::create('order', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->uuid('user_id');
            $table->uuid('shipping_information_id');
            $table->string('order_status');
            $table->string('session_id');
            $table->timestamps();
            $table->double('total_price');

            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('shipping_information_id')->references('shipping_information_id')->on('shipping_information');
        });
    }
};
