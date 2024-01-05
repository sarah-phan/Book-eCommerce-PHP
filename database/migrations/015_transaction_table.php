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
        Schema::dropIfExists('transaction');
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('transaction_id')->primary();
            $table->uuid('order_id');
            $table->string('payment_type');
            $table->string('payment_status');
            $table->uuid('strip_id');

            $table->foreign('order_id')->references('order_id')->on('order');
        });
    }
};
