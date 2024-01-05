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
        Schema::dropIfExists('subcategory_book');
        Schema::create('subcategory_book', function (Blueprint $table) {
            $table->uuid('subcategory_book_id')->primary();
            $table->uuid('subcategory_id');
            $table->uuid('book_id');

            $table->foreign('subcategory_id')->references('subcategory_id')->on('subcategory_table');
            $table->foreign('book_id')->references('book_id')->on('book');
        });
    }
};
