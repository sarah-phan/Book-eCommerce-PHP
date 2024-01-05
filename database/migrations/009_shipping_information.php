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
        Schema::dropIfExists('shipping_information');
        Schema::create('shipping_information', function (Blueprint $table) {
            $table->uuid('shipping_information_id')->primary();
            $table->uuid('user_id');
            $table->string('receiver_name');
            $table->string('receiver_phone')->nullable();
            $table->string('address');

            $table->foreign('user_id')->references('user_id')->on('user');
        });
    }
};
