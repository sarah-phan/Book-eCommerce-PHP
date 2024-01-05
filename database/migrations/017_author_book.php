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
        Schema::dropIfExists('author_book');
        Schema::create('author_book', function (Blueprint $table) {
            $table->uuid('author_book_id')->primary();
            $table->uuid('author_id');
            $table->uuid('book_id');

            $table->foreign('author_id')->references('author_id')->on('author');
            $table->foreign('book_id')->references('book_id')->on('book');
        });
    }
};
