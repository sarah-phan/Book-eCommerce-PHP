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
        Schema::dropIfExists('book_category');
        Schema::create('book_category', function (Blueprint $table) {
            $table->uuid('book_category_id')->primary();
            $table->uuid('book_id');
            $table->uuid('category_id');

            $table->foreign('book_id')->references('book_id')->on('book');
            $table->foreign('category_id')->references('category_id')->on('category');
        });
    }
};
